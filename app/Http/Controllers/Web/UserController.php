<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Imports\UserImport;
use App\Models\Administrador;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Profesor;
use App\Models\Role;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        return view('usuarios.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('usuarios.create', [
            'user' => new User(),
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'telefono' => 'numeric|nullable',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role_id' => 'required'
        ]);

        // return $request->all();

        $password = bcrypt($request->password);
        $request->merge(['password' => $password]);
        $user = User::create($request->all());

        $role_id = $request->role_id;

        if($role_id == 1){//Administrador
            Administrador::create(['user_id' => $user->id]);
        } else if($role_id == 2){//Profesor
            Profesor::create(['user_id' => $user->id]);
        } else if($role_id == 3){//Estudiante
            Estudiante::create(['user_id' => $user->id]);
        } else if($role_id == 4){//Tutor
            Tutor::create(['user_id' => $user->id]);
        }

        return redirect()->route('users.index')
            ->with('msj_ok', 'Creado: ' . $user->name);

    }

    public function show(User $user)
    {
        $cursos = Curso::where('gestion', date('Y'))->get();
        if($user->estudiante){
            $materias = $user->estudiante->materias()->where('gestion', date('Y'))->get();
            $curso = $user->estudiante->cursos()->where('gestion', date('Y'))->first();
            return view('usuarios.show', [
                'user' => $user,
                'materias' => $materias,
                'curso' => $curso,
                'cursos' => $cursos
            ]);
        }else if($user->profesor){
            $curso = $user->profesor->cursos()->where('gestion', date('Y'))->first();
            return view('usuarios.show', [
                'user' => $user,
                'cursos' => $cursos,
                'curso' => $curso
            ]);
        }else{
            return view('usuarios.show', ['user' => $user]);
        }
    }

    public function edit(User $user)
    {
        return view('usuarios.edit', ['user' => $user,]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'telefono' => 'numeric|nullable',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|min:8',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('msj_ok', 'Actualizado: ' . $user->name);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('msj_ok', 'Eliminado: ' . $user->name);
    }

    public function excel()
    {
        // $users = User::paginate(10);
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('usuarios.excel', compact('users'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv|max:2048'
        ]);

        try {
            $file = $request->file('file');
            Excel::import(new UserImport, $file);
            return back()->with('msj_ok', 'Archivo cargado: ' . $file->getClientOriginalName());
        } catch (\Throwable $th) {
            // return "catch : $th";
            return back()->with('msj_error', 'Error al cargar el archivo: ' . $file->getClientOriginalName());
        }
    }

}

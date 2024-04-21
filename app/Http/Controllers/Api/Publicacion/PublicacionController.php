<?php

namespace App\Http\Controllers\Api\Publicacion;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function grupos($user)
    {
        try{
            $grupos = [];

            //Seleccionar todos los nombres de roles:
            $roles = Role::all();
            foreach ($roles as $role) {
                $grupos[] = $role->nombre;
            }

            $user = User::find($user);

            //Seleccionar todas las materias que lleva el profesor:
            $materias = $user->profesor->materias;
            if ($materias->count() > 0){
                foreach ($materias as $materia) {
                    $grupos[] = $materia->nombre_completo;
                }
            }

            //Seleccionar todos los cursos de este año que lleva el profesor:
            $cursos = $user->profesor->cursos;
            if($cursos->count() > 0){
                foreach ($cursos as $curso) {
                    $grupos[] = $curso->nombre_completo;
                }
            }
            
            return response()->json([
                'status_code' => 200,
                'data' => $grupos
            ], 200);

        }catch (\Exception $e){
            return response()->json([
                'status_code' => 500,
                'message' => 'Error al obtener los grupos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function index(User $user)
    {
        
    }

    public function store(Request $request)
    {
        
    }

}

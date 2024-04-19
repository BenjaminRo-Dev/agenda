<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Multimedia;
use App\Models\Publicacion;
use App\Models\Role;
use App\Models\TipoPublicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicacionController extends Controller
{
    public function index()
    {
        return view('publicaciones.index');
    }

    public function show(Publicacion $publicacion)
    {
        return view('publicaciones.show', [
            'publicacion' => $publicacion,
        ]);
    }

    public function create()
    {
        $grupos = ['Administradores', 'Profesores', 'Estudiantes', 'Tutores', 'Todos'];
        return view('publicaciones.create',[
            'publicacion' => new Publicacion(),
            'tipos_publicacion' => TipoPublicacion::all(),
            'grupos' => $grupos,
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'detalle' => 'required',
            'tipo_publicacion_id' => 'required',
            'grupo' => 'required',
            'file.*' => 'nullable|mimes:jpeg,png,jpg,pdf,mp4|max:20480',
        ]);
        
        //CREAR PUBLICACION:
        $publicacion = Publicacion::create([
            'titulo' => $request->titulo,
            'detalle' => $request->detalle,
            'fecha_publicacion' => now(),
            'fecha_actividad' => $request->fecha_actividad,
            'gestion' => date('Y'),
            'user_id' => auth()->user()->id,
            'tipo_publicacion_id' => $request->tipo_publicacion_id,
        ]);

        //GUARDAR MULTIMEDIA:
        //php artisan storage:link
        if ($request->hasFile('file')) {
            // Obtenemos los archivos
            
            $archivos = $request->file('file');
            foreach ($archivos as $archivo) {
                // Guardamos el archivo en el almacenamiento
                $ruta = $archivo->store('public/publicaciones');
                // Obtenemos la URL del archivo
                $url = Storage::url($ruta);
                // Creamos una nueva entrada en la base de datos para el archivo
                $multimedia = Multimedia::create([
                    'url' => $url,
                ]);
                //Insertando en la tabla pivote publicacion_multimedia
                $publicacion->multimedia()->attach($multimedia->id);
            }
        }
        //INSERTAR EN LA RELACION POLIMORFICA (publicable) DE MUCHOS A MUCHOS DE PUBLICACIONES Y ROLES:
        if ($request->grupo == 'Todos') {
            $grupos = Role::all();
        } else {
            $grupo = Role::where('nombre', ucfirst($request->grupo))->first();
            $grupos = $grupo ? [$grupo] : [];
        }
        $publicacion->roles()->attach($grupos);

        return redirect()->route('publicaciones.index')->with('msj_ok', 'Publicación creada.');
    }

    public function edit($id)
    {
        return view('publicaciones.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('publicaciones.index');
    }

    public function destroy($id)
    {
        return redirect()->route('publicaciones.index');
    }
    
}

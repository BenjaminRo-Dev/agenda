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

        $publicacionesRol = $user->role->publicaciones;
        // $publicacionesCurso = $user->estudiante->cursos->first()->publicaciones;
        if($user->isEstudiante()){
            $publicacionesCurso = $user->estudiante->cursos->first()->publicaciones;
        }else{
            $publicacionesCurso = $user->profesor->cursos->first()->publicaciones;
        }

        //Orden descendente de las publicaciones:
        $publicacionesRol = $publicacionesRol->sortByDesc('fecha_publicacion');
        $publicacionesCurso = $publicacionesCurso->sortByDesc('fecha_publicacion');

        //Unir las publicaciones de roles y cursos:
        $publicaciones = $publicacionesRol->merge($publicacionesCurso);

        // $publicaciones = $publicacionesRol->merge($publicacionesCurso);
        //Los datos de la relacion multimedia publicacion de cada publicacion:
        $dataMul = [];
        $autor = "";
        foreach ($publicaciones as $publicacion) {
            $dataMul = $publicacion->multimedia;
            $autor = $publicacion->user->name;
        }


        try{
            return response()->json([
                'status_code' => 200,
                'data' => $publicaciones,
                'autor' => $autor
                // 'dataMul' => $dataMul
            ], 200);

        }catch (\Exception $e){
            return response()->json([
                'status_code' => 500,
                'message' => 'Error al obtener las publicaciones',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        
    }

}

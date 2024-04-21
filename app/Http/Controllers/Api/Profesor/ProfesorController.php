<?php

namespace App\Http\Controllers\Api\Profesor;

use App\Http\Controllers\Controller;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function datosPersonales($idProfesor){
        try {
            $usuarioProfesor = Profesor::find($idProfesor)->user;
            $data = [
                'nombre' => $usuarioProfesor->name,
                'telefono' => $usuarioProfesor->telefono,
                'email' => $usuarioProfesor->email,
            ];

            return response()->json([
                'status_code' => 200,
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al buscar datos personales'], 500);
        }
    }

    public function cursos($user_id)
    {       
        try {
            $profesor = Profesor::where('user_id', $user_id)->first();
            $cursos = $profesor->cursos()->where('gestion', date('Y'))->get();
            $data = [
                'cursos' => $cursos
            ];

            return response()->json([
                'status_code' => 200,
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al buscar cursos'], 500);
        }
    }

    public function estudiantesCurso($idProfesor)
    {
        try {
            $profesor = Profesor::find($idProfesor);
            $cursos = $profesor->cursos()->where('gestion', date('Y'))->get();
            // $data = [];
            if($cursos->count() > 1){
                $data = [
                    'estudiantes' => "Funcionalidad no disponible para más de un curso",
                ];
                
            }else{
                $estudiantes = $cursos[0]->estudiantes;

                // $data = [
                //     'estudiantes' => $estudiantes
                // ];
                $arrEstudiantes = collect();
                foreach ($estudiantes as $estudiante) {
                    $datoEstudiante = $estudiante->user;
                    $arrEstudiantes->push([
                        'nombre' => $datoEstudiante->name,
                        'telefono' => $datoEstudiante->telefono,
                        'email' => $datoEstudiante->email,
                    ]);
                }
                $data = [
                    'estudiantes' => $arrEstudiantes
                ];
            }
            return response()->json([
                'status_code' => 200,
                'data' => $data
            ], 200);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al buscar cursos'], 500);
        }
    }

}

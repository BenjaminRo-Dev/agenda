<?php

namespace App\Http\Controllers\Api\Estudiante;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class MateriaEstudianteController extends Controller
{
    public function index($estudianteId){

        try {
            $estudiante = Estudiante::find($estudianteId);
            $materias = $estudiante->materias;
            return response()->json([
                'status_code' => 200,
                'data' => $materias
            ], 200);
        } catch (\Exception $e) {
            // return response()->json(['message' => 'Error al buscar matérias' . $e ], 500);
            return response()->json(['message' => 'Error al buscar matérias'], 500);
        }

    }
}

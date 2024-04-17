<?php

namespace App\Http\Controllers\Api\Profesor;

use App\Http\Controllers\Controller;
use App\Models\Profesor;
use Illuminate\Http\Request;

class MateriaProfesorController extends Controller
{
    public function index($profesorId){

        try {
            $profesor = Profesor::find($profesorId);
            $materias = $profesor->materias;
            return response()->json([
                'status_code' => 200,
                'data' => $materias
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al buscar matérias'], 500);
        }

    }
}

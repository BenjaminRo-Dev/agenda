<?php

namespace App\Http\Controllers\Api\Profesor;

use App\Http\Controllers\Controller;
use App\Models\Profesor;
use Illuminate\Http\Request;

class CursoProfesorController extends Controller
{
    public function index($userId)
    {
        try {
            $profesor = Profesor::where('user_id', $userId)->first();
            $cursos = $profesor->cursos;
            return response()->json([
                'status_code' => 200,
                'data' => $cursos
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al buscar cursos'], 500);
        }
    }

}

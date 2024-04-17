<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Materia;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function asignarCurso(Request $request)
    {
        $request->validate([
            'profesor' => 'required',
            'curso' => 'required'
        ]);
        
        $profesor = Profesor::find($request->profesor);
        $curso = Curso::find($request->curso);

        //Asignando curso:
        $profesor->cursos()->attach($curso);
        //Asignar materias al profesor:
        // $materias = Materia::where('grado', $curso->grado)->where('paralelo', $curso->paralelo)->get();
        // $profesor->materias()->attach($materias);
        return redirect()->route('users.show', $profesor->user->id)->with('msj_ok', 'Curso asignado con éxito');
    }
}

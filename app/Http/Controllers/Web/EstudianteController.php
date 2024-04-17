<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Materia;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{   
    public function asignarCurso(Request $request)
    {
        $request->validate([
            'estudiante' => 'required',
            'curso' => 'required'
        ]);
        // return $request->all();
        $estudiante = Estudiante::find($request->estudiante);
        $curso = Curso::find($request->curso);

        //Asignando curso:
        $estudiante->cursos()->attach($curso);
        //Asignar materias al estudiante:
        $materias = Materia::where('grado', $curso->grado)->where('paralelo', $curso->paralelo)->get();
        $estudiante->materias()->attach($materias);
        return redirect()->route('users.show', $estudiante->user->id)->with('msj_ok', 'Curso asignado con éxito');
    }
    
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Nivel;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    
    public function create()
    {
        $grados = range(1, 6);
        $paraleos = ['A', 'B', 'C', 'D'];
        $niveles = Nivel::all();

        return view('cursos.create', [
            'grados' => $grados,
            'paralelos' => $paraleos,
            'niveles' => $niveles
        ]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'grado' => 'required|integer|min:1|max:6|digits:1',
            'paralelo' => 'required|string|size:1',
            'nivel_id' => 'required|integer|exists:nivels,id',
            //grado, paralelo, nivel_id, gestion, deben ser unicos:
            'grado' => 'unique:cursos,grado,NULL,id,paralelo,' . $request->paralelo . ',nivel_id,' . $request->nivel_id,
        ]);

        $request->merge(['gestion' => date('Y')]);
        $curso = Curso::create($request->all());
        return redirect()->route('cursos.index')
            ->with('msj_ok', 'Creado: ' . $curso->grado . $curso->paralelo . ' ' . $curso->nivel->nombre);
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')
            ->with('msj_ok', 'Eliminado: ' . $curso->grado . $curso->paralelo . ' ' . $curso->nivel->nombre);
    }
}

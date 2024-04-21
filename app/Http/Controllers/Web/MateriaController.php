<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Materia;
use App\Models\Nivel;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    
    public function index()
    {
        // $materias = Materia::all();
        // $materias = Materia::orderBy('nivel_id')->orderBy('grado')->paginate(10);
        return view('materias.index');
    }

    public function create()
    {
        $grados = range(1, 6);
        $paraleos = ['A', 'B', 'C', 'D'];
        $niveles = Nivel::all();
        return view('materias.create', [
            'grados' => $grados,
            'niveles' => $niveles,
            'paralelos' => $paraleos,
            'materia' => new Materia()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'grado' => 'required|integer|min:1|max:6|digits:1',
            'nivel_id' => 'required|integer|exists:nivels,id',
            'paralelo' => 'required|string|size:1',
            //debe ser unico:
            'nombre' => 'unique:materias,nombre,NULL,id,grado,' . $request->grado . ',nivel_id,' . $request->nivel_id,
        ]);
        $request->merge([
            'gestion' => date('Y'),
            'nombre_completo' => $request->nombre . ' ' . $request->grado . ' ' . $request->paralelo . ' ' . Nivel::find($request->nivel_id)->nombre . ' ' . date('Y'),
        ]);

        $materia = Materia::create($request->all());
        return redirect()->route('materias.index')
            ->with('msj_ok', 'Materia creada: ' . $materia->nombre);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Materia $materia)
    {
        $grados = range(1, 6);
        $niveles = Nivel::all();
        return view('materias.edit', [
            'grados' => $grados,
            'paralelos' => ['A', 'B', 'C', 'D'],
            'niveles' => $niveles,
            'materia' => $materia
        ]);
    }

    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'grado' => 'required|integer|min:1|max:6|digits:1',
            'nivel_id' => 'required|integer|exists:nivels,id',
            //debe ser unico:
            'nombre' => 'unique:materias,nombre,' . $materia->id . ',id,grado,' . $request->grado . ',nivel_id,' . $request->nivel_id,
        ]);
        $materia->update($request->all());
        return redirect()->route('materias.index')
            ->with('msj_ok', 'Materia actualizada: ' . $materia->nombre);
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')
            ->with('msj_ok', 'Materia eliminada: ' . $materia->nombre);
    }
}

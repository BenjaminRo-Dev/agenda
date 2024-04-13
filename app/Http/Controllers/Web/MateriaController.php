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
        $materias = Materia::orderBy('nivel_id')->orderBy('grado')->paginate(10);
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        $grados = range(1, 6);
        $niveles = Nivel::all();
        return view('materias.create', [
            'grados' => $grados,
            'niveles' => $niveles,
            'materia' => new Materia()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'grado' => 'required|integer|min:1|max:6|digits:1',
            'nivel_id' => 'required|integer|exists:nivels,id',
            //debe ser unico:
            'nombre' => 'unique:materias,nombre,NULL,id,grado,' . $request->grado . ',nivel_id,' . $request->nivel_id,
        ]);
        $request->merge(['gestion' => date('Y')]);

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

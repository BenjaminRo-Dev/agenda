<?php

namespace App\Livewire\Materias;

use App\Models\Materia;
use Livewire\Component;
use Livewire\WithPagination;

class ListaMaterias extends Component
{
    use WithPagination;
    
    public $buscar, $nombre = 'nombre';

    public function render()
    {
        $materias = $this->buscar ? $this->buscarMaterias() : $this->obtenerMaterias();

        return view('livewire.materias.lista-materias', compact('materias'));
    }

    public function buscarMaterias()
    {
        $this->validate([
            'buscar' => 'required|string|min:1'
        ]);

        return Materia::whereRaw('LOWER(' . $this->nombre . ') LIKE ?', ['%' . strtolower(trim($this->buscar)) . '%'])
            ->orderBy('' . $this->nombre . '', 'asc')
            ->paginate(25);
    }

    private function obtenerMaterias()
    {
        return Materia::orderBy('' . $this->nombre . '', 'asc')
            ->paginate(25);
    }
}

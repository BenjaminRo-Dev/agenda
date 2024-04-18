<?php

namespace App\Livewire\Publicaciones;

use App\Models\Publicacion;
use Livewire\Component;
use Livewire\WithPagination;

class ListaPublicaciones extends Component
{
    use WithPagination;
    
    public $buscar, $titulo = 'titulo';

    public function render()
    {
        $publicaciones = $this->buscar ? $this->buscarPublicaciones() : $this->obtenerPublicaciones();

        return view('livewire.publicaciones.lista-publicaciones', compact('publicaciones'));
    }

    public function buscarPublicaciones()
    {
        $this->validate([
            'buscar' => 'required|string|min:1'
        ]);

        return Publicacion::whereRaw('LOWER(' . $this->titulo . ') LIKE ?', ['%' . strtolower(trim($this->buscar)) . '%'])
            ->orderBy('' . $this->titulo . '', 'asc')
            ->paginate(25);
    }

    private function obtenerPublicaciones()
    {
        return Publicacion::orderBy('' . $this->titulo . '', 'asc')
            ->paginate(25);
    }
}

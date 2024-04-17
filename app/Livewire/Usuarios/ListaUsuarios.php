<?php

namespace App\Livewire\Usuarios;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListaUsuarios extends Component
{
    use WithPagination;
    
    public $buscar, $name = 'name';

    public function render()
    {
        $usuarios = $this->buscar ? $this->buscarUsuarios() : $this->obtenerUsuarios();

        return view('livewire.usuarios.lista-usuarios', compact('usuarios'));
    }

    public function buscarUsuarios()
    {
        $this->validate([
            'buscar' => 'required|string|min:1'
        ]);

        return User::whereRaw('LOWER(' . $this->name . ') LIKE ?', ['%' . strtolower(trim($this->buscar)) . '%'])
            ->orderBy('id', 'desc')
            ->paginate(25);
    }

    private function obtenerUsuarios()
    {
        return User::orderBy('id', 'desc')
            ->paginate(25);
    }
}
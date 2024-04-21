<?php

namespace App\Http\Controllers\Api\Publicacion;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function grupos(User $user)
    {
        $grupos = [];

        //Seleccionar todos los nombres de roles:
        $roles = Role::all();
        foreach ($roles as $role) {
            $grupos[] = $role->nombre;
        }

        //Seleccionar todas las materias que lleva el profesor:
        $materias = $user->profesor->materias;
        foreach ($materias as $materia) {
            $grupos[] = $materia->nombre;
        }
        




        return response()->json([
            'status_code' => 200,
            'data' => $grupos
        ], 200);
    }

    public function index(User $user)
    {
        
    }

    public function store(Request $request)
    {
        
    }

}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function noAutorizado()
    {
        return view('no-autorizado');
    }
}

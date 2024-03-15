<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pista;

class InicioController extends Controller
{
    public function inicio()
    {
        return view('inicio.index'); 
    }

    public function listar()
    {
        $pistas = Pista::all();
        return view('pistas.index', compact(['pistas'])); 
    }

}

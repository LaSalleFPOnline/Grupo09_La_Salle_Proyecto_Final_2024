<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familia;
use App\Models\Articulo;
use App\Models\Venta;

class TiendaController extends Controller
{
    public function index()
    {
        $familias = Familia::all();
        return view('tienda.index', compact(['familias'])); 
    }

    public function listar($id)
    {
        $articulos = Articulo::where('FamiliaId', $id)->get();
        $familia = Familia::where('CodigoFamilia', $id)->first();
        $nombreFamilia = $familia->DescripcionFamilia;
        $familias = Familia::all();
        return view('tienda.articulos', compact(['articulos', 'familias', 'nombreFamilia'])); 
    }

    public function carrito() {
        $ventas = Venta::where('UserId', 2)->get();
        $familias = Familia::all();
        return view('tienda.carrito', compact(['ventas', 'familias']));
    }

}

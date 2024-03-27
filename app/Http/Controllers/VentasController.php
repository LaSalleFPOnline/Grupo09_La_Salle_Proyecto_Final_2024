<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ValidacionVenta;
use App\Models\Venta;

class VentasController extends Controller
{
    public function listar()
    {
        $Ventas = Venta::all();
        return view('Ventas.index', compact(['Ventas'])); 
    }

    public function crear()
    {
        return view('Ventas.crear');
    }

    public function guardar(ValidacionVenta $request)
    {
        if (Venta::create($request->all())) {
            return redirect()->route('listar_Ventas')->with('mensaje', 'La Venta ha sido creada correctamente');
        } else {
            return response()->json(['mensaje' => 'fallo en el guardado']);
        }
    }

    public function editar($id)
    {
        $Venta = Venta::find($id);

        return view('Ventas.editar', compact(['Venta'])); 
    }

    public function actualizar(ValidacionVenta $request, $id)
    {
        $Venta = Venta::find($id);
        $Venta->update($request->all());
        return redirect()->route('listar_Ventas')->with('mensaje', 'La Venta ha sido actualizada correctamente.');
    } 


    public function eliminar($id) 
    {
        Venta::destroy($id);

        return redirect()->route('listar_Ventas');
    } 
}

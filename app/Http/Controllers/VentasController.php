<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ValidacionVenta;
use App\Models\Venta;

class VentasController extends Controller
{
    public function listar()
    {
        $ventas = Venta::all();
        return view('ventas.index', compact(['ventas'])); 
    }

    public function crear()
    {
        return view('ventas.crear');
    }

    public function guardar(ValidacionVenta $request)
    {
        if (Venta::create($request->all())) {
            return redirect()->route('listar_ventas')->with('mensaje', 'La venta ha sido creada correctamente');
        } else {
            return response()->json(['mensaje' => 'fallo en el guardado']);
        }
    }

    public function editar($id)
    {
        $venta = Venta::find($id);

        return view('ventas.editar', compact(['venta'])); 
    }

    public function actualizar(ValidacionVenta $request, $id)
    {
        $venta = Venta::find($id);
        $venta->update($request->all());
        return redirect()->route('listar_ventas')->with('mensaje', 'La venta ha sido actualizada correctamente.');
    } 


    public function eliminar($id) 
    {
        Venta::destroy($id);

        return redirect()->route('listar_ventas');
    } 
}

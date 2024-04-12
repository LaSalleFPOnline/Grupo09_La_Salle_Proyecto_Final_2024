<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ValidacionCobro;
use App\Models\Cobro;

class CobrosController extends Controller
{
    public function listar()
    {
        $cobros = Cobro::all();
        return view('cobros.index', compact(['cobros'])); 
    }

    public function crear()
    {
        return view('cobros.crear');
    }

    public function guardar(ValidacionCobro $request)
    {
        if (Cobro::create($request->all())) {
            return redirect()->route('listar_cobros')->with('mensaje', 'El Cobro ha sido creada correctamente');
        } else {
            return response()->json(['mensaje' => 'fallo en el guardado']);
        }
    }

    public function editar($id)
    {
        $cobro = Cobro::find($id);

        return view('cobros.editar', compact(['cobro'])); 
    }

    public function actualizar(ValidacionCobro $request, $id)
    {
        $cobro = Cobro::find($id);
        $cobro->update($request->all());
        return redirect()->route('listar_cobros')->with('mensaje', 'El Cobro ha sido actualizada correctamente.');
    } 


    public function eliminar($id) 
    {
        Cobro::destroy($id);

        return redirect()->route('listar_cobros');
    } 
}

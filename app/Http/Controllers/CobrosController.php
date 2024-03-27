<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ValidacionCobro;
use App\Models\Cobro;

class CobrosController extends Controller
{
    public function listar()
    {
        $Cobros = Cobro::all();
        return view('Cobros.index', compact(['Cobros'])); 
    }

    public function crear()
    {
        return view('Cobros.crear');
    }

    public function guardar(ValidacionCobro $request)
    {
        if (Cobro::create($request->all())) {
            return redirect()->route('listar_Cobros')->with('mensaje', 'La Cobro ha sido creada correctamente');
        } else {
            return response()->json(['mensaje' => 'fallo en el guardado']);
        }
    }

    public function editar($id)
    {
        $Cobro = Cobro::find($id);

        return view('Cobros.editar', compact(['Cobro'])); 
    }

    public function actualizar(ValidacionCobro $request, $id)
    {
        $Cobro = Cobro::find($id);
        $Cobro->update($request->all());
        return redirect()->route('listar_Cobros')->with('mensaje', 'La Cobro ha sido actualizada correctamente.');
    } 


    public function eliminar($id) 
    {
        Cobro::destroy($id);

        return redirect()->route('listar_Cobros');
    } 
}

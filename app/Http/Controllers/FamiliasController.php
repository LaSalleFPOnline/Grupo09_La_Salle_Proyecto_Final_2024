<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ValidacionFamilia;
use App\Models\Familia;

class FamiliasController extends Controller
{
    public function listar()
    {
        $familias = Familia::all();
        return view('familias.index', compact(['familias'])); 
    }

    public function crear()
    {
        return view('familias.crear');
    }

    public function guardar(ValidacionFamilia $request)
    {
        if (Familia::create($request->all())) {
            return redirect()->route('listar_familias')->with('mensaje', 'La familia ha sido creada correctamente');
        } else {
            return response()->json(['mensaje' => 'fallo en el guardado']);
        }
    }

    public function editar($id)
    {
        $familia = Familia::find($id);

        return view('familias.editar', compact(['familia'])); 
    }

    public function actualizar(ValidacionFamilia $request, $id)
    {
        $familia = Familia::find($id);
        $familia->update($request->all());
        return redirect()->route('listar_familias')->with('mensaje', 'La Familia ha sido actualizada correctamente.');
    } 

    public function eliminar($id) 
    {
        Familia::destroy($id);

        return redirect()->route('listar_familias');
    } 
}

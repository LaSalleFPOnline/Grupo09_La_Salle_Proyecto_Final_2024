<?php

namespace App\Http\Controllers;

use App\Models\DatoGeneral;
use App\Http\Request\ValidacionDatoGeneral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DatosGeneralesController extends Controller
{

    public function editar()
    {
        $datosGenerales = DatoGeneral::find(1);
        return view('datosgenerales.editar', compact(['datosGenerales']));
    } 

    public function actualizar(ValidacionDatoGeneral $request)
    {
        $datosGenerales = DatoGeneral::find(1);
        $datosGenerales->update($request->all());
        return redirect()->route('editar_datos_generales')->with('mensaje', 'Los datos han sido actualizados correctamente.');
    } 

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ValidacionFamilia;
use App\Models\Familia;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class FamiliasController extends Controller
{
    public function listar()
    {
        $familias = Familia::all();
        Session::flash('familias', $familias);
        return view('familias.index', compact('familias')); 
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
    
    public function informe() {
        
        $familias = Session::get('familias');
        Session::reflash();
        $options = new Options();
        $options->set('tempDir', public_path('temp'));
        $options->set('logOutputFile', storage_path('logs/dompdf_log.txt'));
        $options->set('isHtml5ParserEnabled', true); 
        $options->set('isPhpEnabled', true);
        $pdf = new Dompdf($options);
        $pdf->loadHtml(View::make('familias.informe', compact('familias')));
        $pdf->render();
        return response($pdf->output())->header('Content-Type', 'application/pdf');

    }
}

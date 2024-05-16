<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ValidacionPista;
use App\Models\Pista;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class PistasController extends Controller
{
    public function listar()
    {
        $pistas = Pista::all();
        Session::flash('pistas', $pistas);
        return view('pistas.index', compact('pistas')); 
    }

    public function crear()
    {
        return view('pistas.crear');
    }

    public function guardar(ValidacionPista $request)
    {
        if (Pista::create($request->all())) {
            return redirect()->route('listar_pistas')->with('mensaje', 'La pista ha sido creada correctamente');
        } else {
            return response()->json(['mensaje' => 'fallo en el guardado']);
        }
    }

    public function editar($id)
    {
        $pista = Pista::find($id);

        return view('pistas.editar', compact(['pista'])); 
    }

    public function actualizar(ValidacionPista $request, $id)
    {
        $pista = Pista::find($id);
        $pista->update($request->all());
        return redirect()->route('listar_pistas')->with('mensaje', 'La pista ha sido actualizada correctamente.');
    } 

    public function eliminar($id) 
    {
        Pista::destroy($id);

        return redirect()->route('listar_pistas');
    }
    
    public function informe() {
        
        $pistas = Session::get('pistas');
        Session::reflash();
        $options = new Options();
        $options->set('tempDir', public_path('temp'));
        $options->set('logOutputFile', storage_path('logs/dompdf_log.txt'));
        $options->set('isHtml5ParserEnabled', true); 
        $options->set('isPhpEnabled', true);
        $pdf = new Dompdf($options);
        $pdf->loadHtml(View::make('pistas.informe', compact('pistas')));
        $pdf->render();
        return response($pdf->output())->header('Content-Type', 'application/pdf');

    }
}

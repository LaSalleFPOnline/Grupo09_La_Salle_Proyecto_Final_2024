<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ValidacionArticulo;
use App\Models\Articulo;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class ArticulosController extends Controller
{
    public function listar()
    {
        $articulos = Articulo::all();
        Session::flash('articulos', $articulos);
        return view('articulos.index', compact('articulos')); 
    }

    public function crear()
    {
        return view('articulos.crear');
    }

    public function guardar(ValidacionArticulo $request)
    {
        if (Articulo::create($request->all())) {
            return redirect()->route('listar_articulos')->with('mensaje', 'La articulo ha sido creada correctamente');
        } else {
            return response()->json(['mensaje' => 'fallo en el guardado']);
        }
    }

    public function editar($id)
    {
        $articulo = Articulo::find($id);
        return view('articulos.editar', compact(['articulo'])); 
    }

    public function actualizar(ValidacionArticulo $request, $id)
    {
        $articulo = Articulo::find($id);
        $articulo->update($request->all());
        return redirect()->route('listar_articulos')->with('mensaje', 'La Articulo ha sido actualizada correctamente.');
    } 

    public function eliminar($id) 
    {
        Articulo::destroy($id);

        return redirect()->route('listar_articulos');
    }
    
    public function informe() {
        
        $articulos = Session::get('articulos');
        Session::reflash();
        $options = new Options();
        $options->set('tempDir', public_path('temp'));
        $options->set('logOutputFile', storage_path('logs/dompdf_log.txt'));
        $options->set('isHtml5ParserEnabled', true); 
        $options->set('isPhpEnabled', true);
        $pdf = new Dompdf($options);
        $pdf->loadHtml(View::make('articulos.informe', compact('articulos')));
        $pdf->render();
        return response($pdf->output())->header('Content-Type', 'application/pdf');

    }
}

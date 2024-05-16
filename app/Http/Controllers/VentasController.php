<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ValidacionVenta;
use App\Models\Venta;
use App\Models\Articulo;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class VentasController extends Controller
{
    public function listar()
    {
        $ventas = Venta::all();
        Session::flash('ventas', $ventas);
        return view('ventas.index', compact('ventas')); 
    }

    public function crear()
    {
        return view('ventas.crear');
    }

    public function venta_tienda($articulo) {

        $buscaArticulo = Articulo::where('id', $articulo)->first();
        $datosVenta = [
            'Estado' => 0, /* 0 En carrito, 1 Venta cerrada */
            'UserId' => 2, /* Usuario Login */
            'ArticuloId' => $buscaArticulo->id,
            'Precio' => $buscaArticulo->Precio,
            'Unidades' => 1
        ];
        
        $venta = Venta::create($datosVenta);

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
    
    public function eliminar_venta_carrito($id) 
    {
        Venta::destroy($id);
        $ventas = Venta::where('UserId', 2)->get();
        $familias = Familia::all();
        return view('tienda.carrito', compact(['ventas', 'familias']));
    }


    public function informe() {
        
        $ventas = Session::get('ventas');
        Session::reflash();
        $options = new Options();
        $options->set('tempDir', public_path('temp'));
        $options->set('logOutputFile', storage_path('logs/dompdf_log.txt'));
        $options->set('isHtml5ParserEnabled', true); 
        $options->set('isPhpEnabled', true);
        $pdf = new Dompdf($options);
        $pdf->loadHtml(View::make('ventas.informe', compact('ventas')));
        $pdf->render();
        return response($pdf->output())->header('Content-Type', 'application/pdf');

    }

}

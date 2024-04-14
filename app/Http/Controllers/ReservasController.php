<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ValidacionReserva;
use App\Models\Reserva;
use App\Models\Horario;
use App\Models\Pista;
use App\Models\Usuario;
use Illuminate\Support\Facades\Mail;
use App\Mail\PistaReservada;

class ReservasController extends Controller
{
    public function listar(Request $request)
    {
        if ($request->get('DesdeFecha') == null) {
            $DesdeFecha = date("Y-m-01");
        } else {
            $DesdeFecha = $request->get('DesdeFecha');
        }

        if ($request->get('HastaFecha') == null) {
            $HastaFecha = date("Y-m-t");
        } else {
            $HastaFecha = $request->get('HastaFecha');
        }

        if ($request->get('UserId') == null) {
            $DesdeCliente = 0;
            $HastaCliente = 999999;
        } else {
            $DesdeCliente = $request->get('UserId');
            $HastaCliente = $request->get('UserId');
        }

        if ($request->get('PistaId') == null) {
            $DesdePista = 0;
            $HastaPista = 999999;
        } else {
            $DesdePista = $request->get('PistaId');
            $HastaPista = $request->get('PistaId');
        }

        $clientes = Usuario::all();
        $pistas = Pista::all();
        $reservas = Reserva::
        WhereHas('cliente', function($q) use ($DesdeCliente, $HastaCliente) { $q->whereBetween('UserId', [$DesdeCliente, $HastaCliente]); })
        ->WhereHas('pista', function($q) use ($DesdePista, $HastaPista) { $q->whereBetween('PistaId', [$DesdePista, $HastaPista]); })
        ->whereBetween('Fecha', [$DesdeFecha, $HastaFecha])
        ->get();
        return view('reservas.index', compact(['DesdeFecha', 'HastaFecha', 'DesdeCliente', 'DesdePista', 'clientes', 'pistas', 'reservas'])); 
    }

    public function crear()
    {
        $clientes = Usuario::all();
        $pistas = Pista::all();
        return view('reservas.crear', compact(['clientes', 'pistas']));
    }

    public function guardar(ValidacionReserva $request)
    {
        if (Reserva::create($request->all())) {
            return redirect()->route('listar_reservas')->with('mensaje', 'La reserva ha sido creada correctamente');
        } else {
            return response()->json(['mensaje' => 'fallo en el guardado']);
        }
    }

    public function editar($id)
    {
        $reserva = Reserva::find($id);
        $clientes = Usuario::all();
        $pistas = Pista::all();

        return view('reservas.editar', compact(['reserva', 'clientes', 'pistas'])); 
    }

    public function actualizar(ValidacionReserva $request, $id)
    {
        $reserva = Reserva::find($id);
        $reserva->update($request->all());
        return redirect()->route('listar_reservas')->with('mensaje', 'La reserva ha sido actualizada correctamente.');
    } 


    public function eliminar($id) 
    {
        $reserva = Reserva::find($id);
        $reserva->forceDelete();

        return redirect()->route('listar_reservas');
    } 

    public function reservar(Request $request) 
    {

        $fecha = $request->get('fecha');
        $hoy = date('Y-m-d');
        $fechahoy = $hoy;
        if ($fecha == null) {
            $fecha = $hoy;
        }
        if ($fecha != $hoy) {
            $hoy = $fecha;
        }
        $reservas = Reserva::where('Fecha', $hoy)->get();
        $horario = Horario::all();
        $pistas = Pista::all();
        $cliente = 2;

        return view('reservas.reservar', compact(['reservas', 'horario', 'pistas', 'fechahoy', 'fecha', 'cliente']));
    }

    public function crear_reserva_web($cliente, $pista, $fecha, $hora) {

        $reserva = Reserva::where('UserId', $cliente)
        ->where('PistaID', $pista)
        ->where('Fecha', $fecha)
        ->where('Hora', $hora)
        ->first();

        if (!$reserva) {
            $nuevaReserva = new Reserva();
            $nuevaReserva->UserId = $cliente;
            $nuevaReserva->PistaID = $pista;
            $nuevaReserva->Fecha = $fecha;
            $nuevaReserva->Hora = $hora;
            $nuevaReserva->save();
            $buscaCliente = Usuario::where('UserId', $cliente)->first();
            $nombre = $buscaCliente->Nombre;
            $enlace = 'http://grupo09lasalle.mywebcommunity.org/reservarpista/cancelarreserva/' . $nuevaReserva->ReservaId;
                
            /*Mail::to($buscaCliente->Email)->send(new PistaReservada($buscaCliente->Nombre, $pista, $fecha, $hora, $enlace));*/

            $correo_html = view('plantillascorreo.pistareservada', compact('nombre', 'pista', 'fecha', 'hora', 'enlace'))->render();

            return response()->json([
                'nombre' => $nombre,
                'pista' => $pista,
                'fecha' => $fecha,
                'hora' => $hora,
                'enlace' => $enlace,
                'email_html' => $correo_html
            ]);
            
        }        
    }

    public function cancelar_reserva($id) {
        Reserva::where('ReservaId', $id)
        ->forceDelete();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ValidacionReserva;
use App\Models\Reserva;
use App\Models\Horario;
use App\Models\Pista;

class ReservasController extends Controller
{
    public function listar()
    {
        $Reservas = Reserva::all();
        return view('Reservas.index', compact(['Reservas'])); 
    }

    public function crear()
    {
        return view('Reservas.crear');
    }

    public function guardar(ValidacionReserva $request)
    {
        if (Reserva::create($request->all())) {
            return redirect()->route('listar_Reservas')->with('mensaje', 'La Reserva ha sido creada correctamente');
        } else {
            return response()->json(['mensaje' => 'fallo en el guardado']);
        }
    }

    public function editar($id)
    {
        $Reserva = Reserva::find($id);

        return view('Reservas.editar', compact(['Reserva'])); 
    }

    public function actualizar(ValidacionReserva $request, $id)
    {
        $Reserva = Reserva::find($id);
        $Reserva->update($request->all());
        return redirect()->route('listar_Reservas')->with('mensaje', 'La Reserva ha sido actualizada correctamente.');
    } 


    public function eliminar($id) 
    {
        Reserva::destroy($id);

        return redirect()->route('listar_Reservas');
    } 

    public function reservar() 
    {

        $hoy = date("Y-m-d");
        $reservas = Reserva::where('Fecha', $hoy)->get();
        $horario = Horario::all();
        $pistas = Pista::all();
        $cliente = 1;

        return view('reservas.reservar', compact(['reservas', 'horario', 'pistas', 'hoy', 'cliente']));
    }

    public function crear_reserva($cliente, $pista, $fecha, $hora) {

        $reserva = Reserva::where('UserId', $cliente)
        ->where('PistaID', $pista)
        ->where('Fecha', $fecha)
        ->where('Hora', $hora)
        ->first();

        if ($reserva) {
            /*$turno->CodigoZona = $CodigoZona;
            $turno->save();*/
        } else {
            $nuevaReserva = new Reserva();
            $nuevaReserva->UserId = $cliente;
            $nuevaReserva->PistaID = $pista;
            $nuevaReserva->Fecha = $fecha;
            $nuevaReserva->Hora = $hora;
            $nuevaReserva->save();
        }
        
    }

    public function cancelar_reserva($id) {
        Reserva::where('ReservaId', $id)
        ->forceDelete();
    }
}

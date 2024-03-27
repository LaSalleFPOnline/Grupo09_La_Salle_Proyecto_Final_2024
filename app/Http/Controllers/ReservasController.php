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

        $horario = Horario::all();
        $pistas = Pista::all();

        return view('reservas.reservar', compact(['horario', 'pistas']));
    }
}

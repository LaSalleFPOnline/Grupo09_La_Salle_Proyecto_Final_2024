@extends('layouts.plantilla')
@section('title', 'Datos generales')
@section('content')
<form action="{{ route('actualizar_datos_generales', 1) }}" method="POST">
    @csrf @method("put")
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Tiempo de reserva</label>
            <input type="time" name="TiempoReserva" class="form-control float-right" value="{{ old('TiempoReserva', $datosGenerales->TiempoReserva) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Hora de inicio de reservas</label>
            <input type="time" name="HoraInicio" class="form-control float-right" value="{{ old('HoraInicio', $datosGenerales->HoraInicio) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Hora fin de reservas</label>
            <input type="time" name="HoraFin" class="form-control float-right" value="{{ old('HoraFin', $datosGenerales->HoraFin) ?? '' }}">
        </div>        
    </div>
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <button class="btn btn-block btn-primary" type="submit">
                <i class="fa fa-save"></i> Guardar
            </button>
        </div>
    </div>
</form>
@if ($errors->any())
<div class="row">
    <ul>
        @foreach ($errors->all() as $error)
            <li class="errorMessage">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection

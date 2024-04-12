@extends('layouts.plantilla')
@section('title', 'Editar reserva')
@section('content')
<form action="{{ route('actualizar_reserva', $reserva->ReservaId) }}" method="POST">
    @csrf @method("put")
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Reserva</label>
            <input type="text" name="ReservaId" class="form-control float-right" value="{{ old('ReservaId', $reserva->ReservaId) ?? '' }}" readonly>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Cliente</label>
            <input type="text" name="UserId" class="form-control float-right" value="{{ old('UserId', $reserva->UserId) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Pista</label>
            <input type="text" name="PistaId" class="form-control float-right" value="{{ old('PistaId', $reserva->PistaId) ?? '' }}">
        </div>        
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Fecha</label>
            <input type="date" name="Fecha" class="form-control float-right" value="{{ old('Fecha', $reserva->Fecha) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Hora</label>
            <input type="hour" name="Hora" class="form-control float-right" value="{{ old('Hora', $reserva->Hora) ?? '' }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <a class="btn btn-block btn-warning" href="{{ route('listar_reservas') }}">
                <i class="fa fa-fw fa-reply-all"></i> Volver atrás
            </a>
        </div>
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

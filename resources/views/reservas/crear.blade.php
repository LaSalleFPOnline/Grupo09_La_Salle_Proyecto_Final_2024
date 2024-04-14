@extends('layouts.plantilla')
@section('title', 'Crear reserva')
@section('content')
<form action="{{ route('guardar_reserva') }}" method="POST">
    @csrf
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Cliente</label>
            <select class="form-select" name="UserId">
                <option value="">Seleccionar...</option>
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->UserId }}" {{ old('UserId') == $cliente->UserId ? 'selected' : '' }}>{{ $cliente->UserId . " - " . $cliente->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Pista</label>
            <select class="form-select" name="PistaId">
                <option value="">Seleccionar...</option>
                @foreach($pistas as $pista)
                <option value="{{ $pista->CodigoPista }}" {{ old('PistaId') == $pista->CodigoPista ? 'selected' : '' }}>{{ $pista->CodigoPista . " - " . $pista->DescripcionPista }}</option>
                @endforeach
            </select>  
        </div>          
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Fecha</label>
            <input type="date" name="Fecha" class="form-control float-right" value="{{ old('Fecha') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Hora</label>
            <input type="time" name="Hora" class="form-control float-right" value="{{ old('Hora') }}">
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

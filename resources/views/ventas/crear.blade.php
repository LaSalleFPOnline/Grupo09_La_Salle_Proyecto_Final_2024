@extends('layouts.plantilla')
@section('title', 'Crear venta')
@section('content')
<form action="{{ route('guardar_venta') }}" method="POST">
    @csrf
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Cliente</label>
            <input type="text" name="UserId" class="form-control float-right" value="{{ old('UserId') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Artículo</label>
            <input type="text" name="ArticuloId" class="form-control float-right" value="{{ old('ArticuloId') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Reserva</label>
            <input type="text" name="ReservaId" class="form-control float-right" value="{{ old('ReservaId') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Precio</label>
            <input type="text" name="Precio" class="form-control float-right" value="{{ old('Precio') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Unidades</label>
            <input type="text" name="Unidades" class="form-control float-right" value="{{ old('Unidades') }}">
        </div>
    </div>
    <input type="hidden" name="Linea" value="1">
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <a class="btn btn-block btn-warning" href="{{ route('listar_ventas') }}">
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
<div class="form-group row">
    <ul>
        @foreach ($errors->all() as $error)
            <li class="errorMessage">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection

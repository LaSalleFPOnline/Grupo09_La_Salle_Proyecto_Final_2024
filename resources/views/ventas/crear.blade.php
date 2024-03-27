@extends('layouts.plantilla')
@section('title', 'Crear venta')
@section('content')
<form action="{{ route('guardar_venta') }}" method="POST">
    @csrf
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Código</label>
            <input type="text" name="CodigoVenta" class="form-control float-right" value="{{ old('CodigoVenta') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Linea</label>
            <input type="text" name="LineaVenta" class="form-control float-right" value="{{ old('LineaVenta') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>usuario</label>
            <input type="text" name="UsuarioVenta" class="form-control float-right" value="{{ old('UsuarioVenta') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Articulo</label>
            <input type="text" name="ArticuloVenta" class="form-control float-right" value="{{ old('ArticuloVenta') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Reserva</label>
            <input type="text" name="ReservaVenta" class="form-control float-right" value="{{ old('ReservaVenta') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Precio</label>
            <input type="text" name="PrecioVenta" class="form-control float-right" value="{{ old('PrecioVenta') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Unidades</label>
            <input type="text" name="UnidadesVenta" class="form-control float-right" value="{{ old('UnidadesVenta') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <a class="btn btn-block btn-warning" href="{{ route('listar_Ventas') }}">
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

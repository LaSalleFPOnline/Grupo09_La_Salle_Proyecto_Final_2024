@extends('layouts.plantilla')
@section('title', 'Editar venta')
@section('content')
<form action="{{ route('actualizar_venta', $venta->VentaId) }}" method="POST">
    @csrf @method("put")
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Venta</label>
            <input type="text" name="VentaId" class="form-control float-right" value="{{ $venta->VentaId }}" readonly>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Línea</label>
            <input type="text" name="Linea" class="form-control float-right" value="{{ $venta->Linea }}" readonly>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Cliente</label>
            <input type="text" name="UserId" class="form-control float-right" value="{{ old('UsuarioId', $venta->UserId) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Artículo</label>
            <input type="text" name="ArticuloId" class="form-control float-right" value="{{ old('ArticuloId', $venta->ArticuloId) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Reserva</label>
            <input type="text" name="ReservaId" class="form-control float-right" value="{{ old('ReservaId', $venta->ReservaId) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Precio</label>
            <input type="text" name="Precio" class="form-control float-right" value="{{ old('Precio', $venta->Precio) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Unidades</label>
            <input type="text" name="Unidades" class="form-control float-right" value="{{ old('Unidades', $venta->Unidades) ?? '' }}">
        </div>
    </div>
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
<div class="row">
    <ul>
        @foreach ($errors->all() as $error)
            <li class="errorMessage">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection

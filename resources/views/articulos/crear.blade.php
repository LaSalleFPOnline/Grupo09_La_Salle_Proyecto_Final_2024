@extends('layouts.plantilla')
@section('title', 'Crear articulo')
@section('content')
<form action="{{ route('guardar_articulo') }}" method="POST">
    @csrf
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Codigo</label>
            <input type="text" name="CodigoArticulo" class="form-control float-right" value="{{ old('CodigoArticulo') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Descripcion</label>
            <input type="text" name="DescripcionArticulo" class="form-control float-right" value="{{ old('DescripcionArticulo') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Familia</label>
            <input type="text" name="FamiliaArticulo" class="form-control float-right" value="{{ old('FamiliaArticulo') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Stock</label>
            <input type="text" name="StockArticulo" class="form-control float-right" value="{{ old('StockArticulo') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Precio</label>
            <input type="text" name="PrecioArticulo" class="form-control float-right" value="{{ old('PrecioArticulo') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <a class="btn btn-block btn-warning" href="{{ route('listar_articulos') }}">
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

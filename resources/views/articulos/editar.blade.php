@extends('layouts.plantilla')
@section('title', 'Editar articulo')
@section('content')
<form action="{{ route('actualizar_articulo', $articulo->id) }}" method="POST">
    @csrf @method("put")
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Codigo</label>
            <input type="text" name="CodigoArticulo" class="form-control float-right" value="{{ old('CodigoArticulo', $articulo->CodigoArticulo) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Descripcion</label>
            <input type="text" name="DescripcionArticulo" class="form-control float-right" value="{{ old('DescripcionArticulo', $articulo->DescripcionArticulo) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Familia</label>
            <input type="text" name="FamiliaArticulo" class="form-control float-right" value="{{ old('FamiliaArticulo', $articulo->FamiliaArticulo) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Stock</label>
            <input type="text" name="StockArticulo" class="form-control float-right" value="{{ old('StockArticulo', $articulo->StockArticulo) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Precio</label>
            <input type="text" name="PrecionArticulo" class="form-control float-right" value="{{ old('PrecioArticulo', $articulo->PrecioArticulo) ?? '' }}">
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

@extends('layouts.plantilla')
@section('title', 'Crear pista')
@section('content')
<form action="{{ route('guardar_pista') }}" method="POST">
    @csrf
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Código</label>
            <input type="text" name="CodigoPista" class="form-control float-right" value="{{ old('CodigoPista') }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Descripción</label>
            <input type="text" name="DescripcionPista" class="form-control float-right" value="{{ old('DescripcionPista') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <a class="btn btn-block btn-warning" href="{{ route('listar_pistas') }}">
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

@extends('layouts.plantilla')
@section('title', 'Editar cobro')
@section('content')
<form action="{{ route('actualizar_cobro', $cobro->id) }}" method="POST">
    @csrf @method("put")
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Código</label>
            <input type="text" name="CodigoCobro" class="form-control float-right" value="{{ old('CodigoCobro', $cobro->CodigoCobro) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Venta</label>
            <input type="text" name="VentaCobro" class="form-control float-right" value="{{ old('VentaCobro', $cobro->VentaCobro) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Importe</label>
            <input type="text" name="ImporteCobro" class="form-control float-right" value="{{ old('ImporteCobro', $cobro->ImporteCobro) ?? '' }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <a class="btn btn-block btn-warning" href="{{ route('listar_Cobros') }}">
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

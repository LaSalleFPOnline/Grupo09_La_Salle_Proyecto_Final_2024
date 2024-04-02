@extends('layouts.plantilla')
@section('title', 'Editar usuario')
@section('content')
<form action="{{ route('actualizar_usuario', $usuario->id) }}" method="POST">
    @csrf @method("put")
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Id Usuario</label>
            <input type="text" name="UserId" class="form-control float-right" value="{{ old('UserId', $usuario->UserId) ?? ''  }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Nombre</label>
            <input type="text" name="Nombre" class="form-control float-right" value="{{ old('Nombre', $usuario->Nombre) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Email</label>
            <input type="email" name="Email" class="form-control float-right" value="{{ old('Email', $usuario->Email) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Password</label>
            <input type="password" name="Password" class="form-control float-right" value="{{ old('Password', $usuario->Password) ?? '' }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 form-check form-check-inline">
            <label class="form-check-label">Es Admin</label>
            <input type="hidden" name="IsAdmin" value="0">
            <input type="checkbox" name="IsAdmin" class="form-check-input" value="1" @if(old('IsAdmin', $usuario->IsAdmin)) checked @endif>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <a class="btn btn-block btn-warning" href="{{ route('listar_usuarios') }}">
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

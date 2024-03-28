@extends('layouts.plantilla')
@section('title', 'Usuarios')
@section('content')
<div class="form-group row">
    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
        <a class="btn btn-block btn-success" href="{{ route('crear_usuario') }}">
            <i class="fas fa-plus-circle"></i> Crear usuario 
        </a>
    </div>
</div>
<table class="table table-responsive table-striped table-borderer table-hover table-sm text-nowrap">
    <thead class="thead-dark">
        <tr>
            <th>Id Usuario</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Password</th>
            <th>Administrador</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->UserId }}</td>
                <td>{{ $usuario->Nombre }}</td>
                <td>{{ $usuario->Email }}</td>
                <td>{{ $usuario->Password }}</td>
                <td>{{ $usuario->IsAdmin }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('editar_usuario', ['id' => $usuario->id]) }}" title="Editar usuario">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('eliminar_usuario', ['id' => $usuario->id, 'id' => $usuario->id]) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-block btn-danger btn-sm" type="submit" title="Eliminar usuario">
                        <i class="fas fa-trash"></i>
                    </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="form-group row">
    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
        <a class="btn btn-warning" href="{{ route('inicio') }}">
            <i class="fa fa-fw fa-reply-all"></i> Volver al inicio
        </a>
    </div>
</div>       
@endsection
@extends('layouts.plantilla')
@section('title', 'Familias')
@section('content')
<div class="form-group row">
    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
        <a class="btn btn-block btn-success" href="{{ route('crear_familia') }}">
            <i class="fas fa-plus-circle"></i> Crear familia 
        </a>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
        <a href="{{ route('informe_familias') }}" target="_blank" class= "btn btn-danger form-control" title="Ver informe">
            <i class="fas fa-file-pdf"></i>
        </a>
    </div>
</div>
<table class="table table-responsive table-striped table-borderer table-hover table-sm text-nowrap">
    <thead class="thead-dark">
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($familias as $familia)
            <tr>
                <td>{{ $familia->CodigoFamilia }}</td>
                <td>{{ $familia->DescripcionFamilia }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('editar_familia', ['id' => $familia->id]) }}" title="Editar familia">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('eliminar_familia', ['id' => $familia->id, 'id' => $familia->id]) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-block btn-danger btn-sm" type="submit" title="Eliminar familia">
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
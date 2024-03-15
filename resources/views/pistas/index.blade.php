@extends('layouts.plantilla')
@section('title', 'Pistas')
@section('content')
<div class="form-group row">
    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
        <a class="btn btn-block btn-success" href="{{ route('crear_pista') }}">
            <i class="fas fa-plus-circle"></i> Crear pista 
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
        @foreach($pistas as $pista)
            <tr>
                <td>{{ $pista->CodigoPista }}</td>
                <td>{{ $pista->DescripcionPista }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('editar_pista', ['id' => $pista->id]) }}" title="Editar pista">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('eliminar_pista', ['id' => $pista->id, 'id' => $pista->id]) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-block btn-danger btn-sm" type="submit" title="Eliminar pista">
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
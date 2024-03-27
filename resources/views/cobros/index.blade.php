@extends('layouts.plantilla')
@section('title', 'Cobros')
@section('content')
<div class="form-group row">
    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
        <a class="btn btn-block btn-success" href="{{ route('crear_cobro') }}">
            <i class="fas fa-plus-circle"></i> Crear cobro 
        </a>
    </div>
</div>
<table class="table table-responsive table-striped table-borderer table-hover table-sm text-nowrap">
    <thead class="thead-dark">
        <tr>
            <th>Código</th>
            <th>Venta</th>
            <th>Importe</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Cobros as $cobro)
            <tr>
                <td>{{ $cobro->CodigoCobro }}</td>
                <td>{{ $cobro->VentaCobro }}</td>
                <td>{{ $cobro->ImporteCobro }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('editar_cobro', ['id' => $cobro->id]) }}" title="Editar cobro">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('eliminar_cobro', ['id' => $cobro->id, 'id' => $cobro->id]) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-block btn-danger btn-sm" type="submit" title="Eliminar cobro">
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
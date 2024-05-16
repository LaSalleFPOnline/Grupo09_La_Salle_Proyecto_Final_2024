@extends('layouts.plantilla')
@section('title', 'Ventas')
@section('content')
<div class="form-group row">
    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
        <a class="btn btn-block btn-success" href="{{ route('crear_venta') }}">
            <i class="fas fa-plus-circle"></i> Crear venta 
        </a>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
        <a href="{{ route('informe_ventas') }}" target="_blank" class= "btn btn-danger form-control" title="Ver informe">
            <i class="fas fa-file-pdf"></i>
        </a>
    </div>
</div>
<table class="table table-responsive table-striped table-borderer table-hover table-sm text-nowrap">
    <thead class="thead-dark">
        <tr>
            <th>Venta</th>
            <th>Estado</th>
            <th>Cliente</th>
            <th>Artículo</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $venta)
            <tr>
                <td>{{ $venta->VentaId }}</td>
                <td>{{ $venta->Estado }}</td>
                <td>{{ $venta->cliente->Nombre }}</td>
                <td>{{ $venta->articulo->DescripcionArticulo }}</td>
                <td>{{ $venta->Precio }}</td>
                <td>{{ $venta->Unidades }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('editar_venta', ['id' => $venta->VentaId]) }}" title="Editar venta">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('eliminar_venta', ['id' => $venta->VentaId]) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-block btn-danger btn-sm" type="submit" title="Eliminar venta">
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
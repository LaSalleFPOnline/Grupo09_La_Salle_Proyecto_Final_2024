@extends('layouts.plantilla')
@section('title', 'Articulos')
@section('content')
<div class="form-group row">
    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
        <a class="btn btn-block btn-success" href="{{ route('crear_articulo') }}">
            <i class="fas fa-plus-circle"></i> Crear articulo 
        </a>
    </div>
</div>
<table class="table table-responsive table-striped table-borderer table-hover table-sm text-nowrap">
    <thead class="thead-dark">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Familia</th>
            <th>Stock</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articulos as $articulo)
            <tr>
                <td>{{ $articulo->CodigoArticulo }}</td>
                <td>{{ $articulo->DescripcionArticulo }}</td>
                <td>{{ $articulo->FamiliaArticulo }}</td>
                <td>{{ $articulo->StockArticulo }}</td>
                <td>{{ $articulo->PrecioArticulo }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('editar_articulo', ['id' => $articulo->id]) }}" title="Editar articulo">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('eliminar_articulo', ['id' => $articulo->id, 'id' => $articulo->id]) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-block btn-danger btn-sm" type="submit" title="Eliminar articulo">
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
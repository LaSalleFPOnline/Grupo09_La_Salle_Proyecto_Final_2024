@extends('layouts.tienda')
@section('title', $nombreFamilia)
@section('content')
<table class="table table-responsive table-striped table-borderer table-hover table-sm text-nowrap">
    <thead style="background-color:#FEB237">
        <tr>
            <th>Foto</th>
            <th>Descripcion</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articulos as $articulo)
            <tr>
                <td><img src="{{ $articulo->Imagen }}" style="height:100px"></td>
                <td>{{ $articulo->DescripcionArticulo }}</td>
                <td>{{ $articulo->Precio }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
@extends('layouts.tienda')
@section('title', 'Carrito de la compra')
@section('content')
<table class="table table-responsive table-striped table-borderer table-hover table-sm text-nowrap">
    <thead style="background-color:#FEB237">
        <tr>
            <th>Artículo</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $venta)
            <tr>
                <td>{{ $venta->articulo->DescripcionArticulo }}</td>
                <td style="text-align:right">{{ number_format($venta->Precio, 2, ',', '.') }} €</td>
                <td style="text-align:center">{{ number_format($venta->Unidades, 0, ',', '.') }}</td>

                <td>
                    <form action="{{ route('eliminar_venta_carrito', ['id' => $venta->VentaId]) }}" method="POST">
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
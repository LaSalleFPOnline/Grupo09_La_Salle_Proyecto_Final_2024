@extends('layouts.tienda')
@section('title', $nombreFamilia)
@section('content')
<table class="table table-responsive table-striped table-borderer table-hover table-sm text-nowrap">
    <thead style="background-color:#FEB237">
        <tr>
            <th>Foto</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($articulos as $articulo)
            <tr>
                <td><img src="{{ $articulo->Imagen }}" style="height:100px"></td>
                <td>{{ $articulo->DescripcionArticulo }}</td>
                <td style="text-align:right">{{ number_format($articulo->Precio, 2, ',', '.') }} €</td>
                <td>
                    <form action="{{ route('venta_tienda', ['id' => $articulo->id]) }}" method="POST">
                        @csrf @method('POST')
                        <button id="venta_carrito" class="btn btn-block btn-danger btn-sm" type="submit" title="Añadir al carrito" data-articulo="{{ $articulo->id }}">
                            <i class="fas fa-cart-plus"></i>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '#venta_carrito', function() {
        event.preventDefault();

        const celda = $(this);
        const articulo = celda.data('articulo');

        $.ajax({
            type: 'GET',
            url: "/ventas/venta_tienda/" + articulo + "/",
            success: function(response) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    text: 'El artículo se ha añadido al carrito',
                    showConfirmButton: false,
                    timer: 2500
                });
            }
        });
    });
</script>
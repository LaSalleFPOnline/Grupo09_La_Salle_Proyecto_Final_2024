@extends('layouts.plantilla')
@section('title', 'Reservas')
@section('content')
<div class="form-group row">
    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
        <a class="btn btn-block btn-success" href="{{ route('crear_reserva') }}">
            <i class="fas fa-plus-circle"></i> Crear reserva 
        </a>
    </div>
</div>
<table class="table table-responsive table-striped table-borderer table-hover table-sm text-nowrap">
    <thead class="thead-dark">
        <tr>
            <th>Reserva</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Pista</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservas as $reserva)
            <tr>
                <td>{{ $reserva->ReservaId }}</td>
                <td>{{ $reserva->UserId }}</td>
                <td>{{ $reserva->Fecha }}</td>
                <td>{{ $reserva->Hora }}</td>
                <td>{{ $reserva->PistaId }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('editar_reserva', ['id' => $reserva->ReservaId]) }}" title="Editar reserva">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('eliminar_reserva', ['id' => $reserva->ReservaId, 'id' => $reserva->ReservaId]) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-block btn-danger btn-sm" type="submit" title="Eliminar reserva">
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
@extends('layouts.plantilla')
@section('title', 'Reservas')
@section('content')
<form>
<div class="form-group row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Desde fecha</label>
            <input type="date" name="DesdeFecha" class="form-control" value="{{ $DesdeFecha }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Hasta fecha</label>
            <input type="date" name="HastaFecha" class="form-control" value="{{ $HastaFecha }}">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Cliente</label>
            <select class="form-select" name="UserId">
                <option value="">Seleccionar...</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->UserId }}" {{ $DesdeCliente == $cliente->UserId ? 'selected' : '' }}>{{ $cliente->UserId . " - ". $cliente->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <label>Pista</label>
            <select class="form-select" name="PistaId">
                <option value="">Seleccionar...</option>
                @foreach($pistas as $pista)
                    <option value="{{ $pista->CodigoPista }}" {{ $DesdePista == $pista->CodigoPista ? 'selected' : '' }}>{{ $pista->CodigoPista . " - " . $pista->DescripcionPista }}</option>
                @endforeach
            </select>
        </div>
</div>
<div class="form-group row">
    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
        <button class="btn btn-primary form-control" type="submit" title="Buscar">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>
    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
        <a href="{{ route('crear_reserva') }}" class="btn btn-success form-control" title="Crear reserva">
            <i class="fas fa-plus-circle"></i>
        </a>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
        <a href="{{ route('informe_reservas') }}" target="_blank" class= "btn btn-danger form-control" title="Ver informe">
            <i class="fas fa-file-pdf"></i>
        </a>
    </div>
</div>
<table class="table table-responsive table-striped table-borderer table-hover table-sm text-nowrap">
    <thead class="thead-dark">
        <tr>
            <th>Nº</th>
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
                <td>{{ $reserva->cliente->Nombre }}</td>
                <td>{{ Date('d/m/Y', strtotime($reserva->Fecha)) }}</td>
                <td>{{ date('H:i', strtotime($reserva->Hora)) }}</td>
                <td>{{ $reserva->pista->DescripcionPista }}</td>
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
@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Entrega de material</h1>
    </div>
    <div class="container">        
        <div class="row">
            <div class="col">Código</div>
            <div class="col">{{ $boleta->codigo }}</div>
            <div class="col">Fecha</div>
            <div class="col">{{ $boleta->fecha }}</div>
            <div class="col">turno</div>
            <div class="col">{{ $boleta->turno }}</div>
        </div>
        <div class="row">
            <div class="col">Asignado a</div>
            <div class="col">{{ $boleta->recibidoPor }}</div>
        </div>
    </div>

    {{ Form::open([
        'route' => 'bolsave', 
        'method' => 'POST'
    ]) }}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Cant. Solicitada</th>
                <th>Cant. Entregada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detalleBoleta as $detalle)
                <tr>
                    <td>{{ $detalle->codigoArticulo }}</td>
                    <td>{{ $detalle->descripcionArticulo }}</td>
                    <td>{{ $detalle->cantidadSolicitada }}</td>
                    <td>{{ Form::number($detalle->codigoArticulo, $detalle->cantidadSolicitada, ['min'=>1,'max'=>50]) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col"><a class="btn btn-primary" href="/Polvorinero">Volver</a></div>
        <div class="col"><button type="submit" class="btn btn-primary">Entregar</button></div>
    </div>
    {{ Form::hidden('boleta_id', $boleta->id) }}
    {{ Form::close() }}
@endsection
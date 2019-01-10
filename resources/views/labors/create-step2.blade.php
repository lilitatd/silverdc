@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="hero-element-mini">
            <h1 class="hero-title white">Nueva labor - paso 2
            </h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                Código
            </div>
            <div class="col-sm">
                {{ $labor->codigo }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                Tipo
            </div>
            <div class="col-sm">
                {{ $labor->tipo }}
            </div>
            <div class="col-sm">
                Dureza
            </div>
            <div class="col-sm">
                {{ $labor->dureza }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                nivel
            </div>
            <div class="col-sm">
                {{ $labor->nivel }}
            </div>
            <div class="col-sm">
                Veta
            </div>
            <div class="col-sm">
                {{ $labor->veta }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                Ancho
            </div>
            <div class="col-sm">
                {{ $labor->ancho }}
            </div>
            <div class="col-sm">
                Alto
            </div>
            <div class="col-sm">
                {{ $labor->alto }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                Número de taladros
            </div>
            <div class="col-sm">
                {{ $labor->nroTaladros }}
            </div>
            <div class="col-sm">
                Cantidad de Anfo
            </div>
            <div class="col-sm">
                {{ $labor->cantidadAnfo }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                Avance
            </div>
            <div class="col-sm">
                {{ $labor->avance }}
            </div>
            <div class="col-sm">
                Avance total
            </div>
            <div class="col-sm">
                {{ $labor->avanceTotal }}
            </div>
        </div>
    </div>

    <div>
    <table border="1">
        <thead>
            <tr>                
                <th colspan="3">Resumen consumo explosivos por voladura</th>
            </tr>
            <tr>
                <th>Explosivos</th>
                <th>Cantidad</th>
                <th>Unidad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Anfo</td>
                <td>{{ $labor->cantidadAnfo }} </td>
                <td>Kg/vol</td>
            </tr>
            <tr>
                <td>Dinamita 7/8"x8"</td>
                <td>{{ $labor->nroTaladros }} </td>
                <td>Pza/vol</td>
            </tr>
            <tr>
                <td>MS (tubo + Capsula det.)</td>
                <td>4</td>
                <td>Pza/vol</td>
            </tr>
            <tr>
                <td>LP (tubo + Capsula det.)</td>
                <td>{{ $labor->nroTaladros - 4 }} </td>
                <td>Pza/vol</td>
            </tr>
            <tr>
                <td>Cordón detonante</td>
                <td>6 </td>
                <td>m/vol</td>
            </tr>
            <tr>
                <td>Guía</td>
                <td>4 </td>
                <td>m/vol</td>
            </tr>
            <tr>
                <td>Capsula detonante Nro 6</td>
                <td>2</td>
                <td>Pzas/vol</td>
            </tr>
        </tbody>
    </table>
    </div>
        
    <form action="/labors/create-step2" method="post">
        {{ csrf_field() }}
        <!-- Valores ocultos para el request -->
        {{ Form::hidden('planeacion_id', $planeacion->id) }}
        {{ Form::hidden('codigo', $labor->codigo) }}
        {{ Form::hidden('tipo', $labor->tipo) }}
        {{ Form::hidden('dureza', $labor->dureza) }}
        {{ Form::hidden('nivel', $labor->nivel) }}
        {{ Form::hidden('veta', $labor->veta) }}
        {{ Form::hidden('ancho', $labor->ancho) }}
        {{ Form::hidden('alto', $labor->alto) }}
        {{ Form::hidden('nroTaladros', $labor->nroTaladros) }}
        {{ Form::hidden('cantidadAnfo', $labor->cantidadAnfo) }}
        {{ Form::hidden('avance', $labor->avance) }}
        {{ Form::hidden('avanceTotal', $labor->avanceTotal) }}
        {{ Form::hidden('ejecutor', $labor->ejecutor) }}
        {{ Form::hidden('diasTrabajo', $planeacion->diasTrabajo) }}
        <button type="submit" class="btn btn-primary">Grabar: </button>
    </form>
@endsection
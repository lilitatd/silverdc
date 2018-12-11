@extends('layouts.app')

@section('content')
    <h1>Cálculo del número de taladros</h1>
    <hr>
    <form action="/labors/create-step2" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="codigo">Codigo labor: {{{ $labor->codigo or '' }}}</label>
        </div>
        <div class="form-group">
            <label for="ancho">Ancho [m]: {{{ $labor->ancho or '' }}}</label>            
        </div>
        <div class="form-group">
            <label for="alto">Alto[m]: {{{ $labor->alto or '' }}}</label>
        </div>
        <div class="form-group">
            <label for="dureza">Dureza de la roca: {{{ $labor->dureza }}}</label>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <?php
            $factorM1 = 1;
            $factorM2 = 2;
            $factorM3 = 3;
            $factorM4 = 4;
            $factorM5 = 5;
            $numeroTaladros = $labor->numeroTaladros;
            $material1 = $numeroTaladros*$factorM1;
            $material2 = $numeroTaladros*$factorM2;
            $material3 = $numeroTaladros*$factorM3;
            $material4 = $numeroTaladros*$factorM4;
            $material5 = $numeroTaladros*$factorM5;

            echo "<p>Nro de taladros: ".$numeroTaladros."<br>";
            echo "Material1: ".$material1."<br>";
            echo "Material2: ".$material2."<br>";
            echo "Material3: ".$material3."<br>";
            echo "Material4: ".$material4."<br>";
            echo "Material5: ".$material5."</p>";
        ?>
        <button type="submit" class="btn btn-primary">Grabar: </button>
    </form>
@endsection
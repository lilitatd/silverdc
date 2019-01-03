@extends('layouts.app')

@section('content')
    <br>
    <div class="row">
        <div class="col">
            <h1 class="text-center">Cálculo del número de taladros: {{ $planeacion->id }}</h1>
        </div>
    </div>
    <hr>
    @include('common.errors')
    {!! Form::open([
        'url' => '/labors/create-step1',
        'method' => 'POST'])
    !!}    
        <div class="form-group">
            {!! Form::label('codigo', 'Código') !!}
            {!! Form::text('codigo',
                null,  
                ['class' => 'form-control']) 
            !!}
        </div>
        <div class="form-group">
            {!! Form::label('nivel', 'Nivel') !!}
            {!! Form::text('nivel',
                null,  
                ['class' => 'form-control']) 
            !!}
        </div>
        <div class="form-group">
            {!! Form::label('veta', 'Veta') !!}
            {!! Form::text('veta',
                null,  
                ['class' => 'form-control']) 
            !!}
        </div>
        <div class="form-row">
            <div class="col-sm-12 col-md-4 form-group">
            {!! Form::label('tipo', 'Tipo') !!}
            {!! Form::select('tipo', 
                ['A' => 'A (2,20x2,40 m)',
                'B' => 'B (1,50x1,80 m)',
                'C' => 'C (1,50x1,50 m)', 
                'D' => 'D (3,0x3,0 m)'],null,['class' => 'form-control']) 
            !!}
            </div>
            <div class="col-md-4 col-sm-12 form-group">
            {!! Form::label('dureza', 'Dureza de la roca') !!}
            {!! Form::select('dureza', 
                ['0.75' => 'Muy blanda',
                '0.7' => 'Blanda',
                '0.65' => 'Int. blanda', 
                '0.6' => 'Int. dura',
                '0.55' => 'Dura',
                '0.5' => 'Muy Dura'],null,['class' => 'form-control']) 
            !!}
            </div>
            <div class="col-sm-12 col-md-4 form-group">
            {!! Form::label('ejecutor', 'Ejecutor') !!}
            {!!Form::select('ejecutor', $users_array, null,['class' => 'form-control']) !!}
            </div>
        </div>
        </div>
        <br>
        {{ Form::hidden('planeacion_id', $planeacion->id ) }}
        <div class="row">
            <div class="col-md-12 col-sm-12 d-flex justify-content-sm-center">
                {!! Form::submit('Calcular', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        
    {{ Form::close() }}
@endsection
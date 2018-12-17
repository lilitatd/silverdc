@extends('layouts.app')

@section('content')
    <h1>Cálculo del número de taladros: {{ $planeacion->id }}</h1>
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
            {!! Form::label('nivel', 'Nivel') !!}
            {!! Form::text('nivel',
                null,  
                ['class' => 'form-control']) 
            !!}
            {!! Form::label('veta', 'Veta') !!}
            {!! Form::text('veta',
                null,  
                ['class' => 'form-control']) 
            !!}
            {!! Form::label('tipo', 'Tipo') !!}
            {!! Form::select('tipo', 
                ['A' => 'A (2,20x2,40 m)',
                'B' => 'B (1,50x1,80 m)',
                'C' => 'C (1,50x1,50 m)', 
                'D' => 'D (3,0x3,0 m)']) 
            !!}

            {!! Form::label('dureza', 'Dureza de la roca') !!}
            {!! Form::select('dureza', 
                ['0.75' => 'Muy blanda',
                '0.7' => 'Blanda',
                '0.65' => 'Int. blanda', 
                '0.6' => 'Int. dura',
                '0.55' => 'Dura',
                '0.5' => 'Muy Dura']) 
            !!}
            {!! Form::label('ejecutor', 'Ejecutor') !!}
            {!!Form::select('ejecutor', $users_array, null) !!}
        </div>
        {{ Form::hidden('planeacion_id', $planeacion->id ) }}
        {!! Form::submit('Calcular', ['class' => 'btn btn-primary']) !!}
    {{ Form::close() }}
@endsection
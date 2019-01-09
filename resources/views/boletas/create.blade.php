@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Crear nueva boleta</h1>
    </div>
    {!!Form::open(['route' => ['boletas.store'],
        'method' => 'POST']) !!}
        <div class="form-row">
            <div class="form-group col-sm-12 col-md-6">
                {!! Form::label('labor', 'Labor') !!}
                {!! Form::select('labor', $labors_array,
                null,
                ['class' => 'form-control'])
                !!}
            </div>
            <div class="form-group col-sm-12 col-md-6">
                {!! Form::label('codigo', 'Código') !!}
                {!! Form::text('codigo',
                null,  
                ['class' => 'form-control']) 
                !!}
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-sm-12 col-md-6">
                {!! Form::label('turno', 'Turno') !!}
                {!! Form::select('turno', ['1er 00:00 - 08:00' => '1er 00:00 - 08:00', '2do 08:00 - 16:00' => '2do 08:00 - 16:00', '3er 16:00 - 00:00' => '3er 16:00 - 00:00'], 
                null,  
                ['class' => 'form-control']) 
                !!}
            </div>
        </div>    
        <br>
        {!!Form::submit('Crear boleta', ['class'=>'btn btn-primary'])!!}
    {!!Form::close()!!}
@endsection
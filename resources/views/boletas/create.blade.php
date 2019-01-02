@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Crear nueva boleta</h1>
    </div>
    {!!Form::open([
        'route' => ['boletas.store'],
        'method' => 'POST']) !!}
        {!! Form::label('labor', 'Labor') !!}
        {!! Form::select('labor', $labors_array,
            null,
            ['class' => 'form-control'])
        !!}
        {!! Form::label('codigo', 'Código') !!}
        {!! Form::text('codigo',
            null,  
            ['class' => 'form-control']) 
        !!}
        {!! Form::label('destino', 'Destino') !!}
        {!! Form::text('destino',
            null,  
            ['class' => 'form-control']) 
        !!}
        {!! Form::label('ficha', 'Ficha') !!}
        {!! Form::text('ficha',
            null,  
            ['class' => 'form-control']) 
        !!}
        {!! Form::label('uso', 'Uso') !!}
        {!! Form::text('uso',
            null,  
            ['class' => 'form-control']) 
        !!}
        {!! Form::label('equipo', 'Equipo') !!}
        {!! Form::text('equipo',
            null,  
            ['class' => 'form-control']) 
        !!}
        {!! Form::label('numeroSHP', 'Número SHP') !!}
        {!! Form::text('numeroSHP',
            null,  
            ['class' => 'form-control']) 
        !!}
        {!! Form::label('cuenta', 'Cuenta') !!}
        {!! Form::text('cuenta',
            null,  
            ['class' => 'form-control']) 
        !!}
        {!! Form::label('centro', 'Centro') !!}
        {!! Form::text('centro',
            null,  
            ['class' => 'form-control']) 
        !!}
        {!! Form::label('subCentro', 'subCentro') !!}
        {!! Form::text('subCentro',
            null,  
            ['class' => 'form-control']) 
        !!}
    {!!Form::submit('Crear boleta', ['class'=>'btn btn-primary'])!!}
    {!!Form::close()!!}
@endsection
@extends('layouts.app')

@section('title', ' - Labores')

@section('content')
	<h1>Crear nueva labor (id: {{ $planeacion_id }})</h1>
	<hr>
	@include('common.errors')
	{!! Form::open(['route' => 'labors.store', 'method' => 'POST']) !!}
		<div class="form-group">
			{!! Form::hidden('planeacion_id', $planeacion_id, ['class' => 'form-control']) !!}
			{!! Form::label('codigo', 'Código') !!}
			{!! Form::text('codigo', null, ['class' => 'form-control']) !!}
			{!! Form::label('tipo', 'Tipo') !!}
			{!! Form::text('tipo', null, ['class' => 'form-control']) !!}
			{!! Form::label('nivel', 'Nivel') !!}
			{!! Form::text('nivel', null, ['class' => 'form-control']) !!}
			{!! Form::label('veta', 'Veta') !!}
			{!! Form::text('veta', null, ['class' => 'form-control']) !!}
			{!! Form::label('ancho', 'Ancho') !!}
			{!! Form::text('ancho', null, ['class' => 'form-control']) !!}
			{!! Form::label('alto', 'Alto') !!}
			{!! Form::text('alto', null, ['class' => 'form-control']) !!}
		</div>
		{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@endsection
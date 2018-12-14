@extends('layouts.app')

@section('title', ' - Planeaciones')

@section('content')
	@include('common.errors')
	{!! Form::model($planeacion, ['route' => ['planeacions.update', $planeacion], 'method' => 'PUT']) !!}
	<div class="form-group">
			{!! Form::label('nombre', 'Nombre') !!}
			{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
			{!! Form::label('diasTrabajo', 'Días de trabajo') !!}
			{!! Form::text('diasTrabajo', null, ['class' => 'form-control']) !!}
			{!! Form::label('gestion', 'Gestión') !!}
			{!! Form::selectRange('gestion', 2018, 2030) !!}
			{!! Form::label('mes', 'Mes') !!}
			{!! Form::select('mes', ['Enero' => 'Enero', 'Febrero' => 'Febrero', 'Marzo' => 'Marzo', 'Abril' => 'Abril', 'Mayo' => 'Mayo', 'Junio' => 'Junio', 'Julio' => 'Julio', 'Agosto' => 'Agosto', 'Septiembre' => 'Septiembre', 'Octubre' => 'Octubre', 'Noviembre' => 'Noviembre', 'Diciembre' => 'Diciembre']) !!}
		</div>
		{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@endsection
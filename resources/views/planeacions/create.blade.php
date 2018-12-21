@extends('layouts.app')

@section('title', ' - Planeaciones')

@section('content')
	@include('common.errors')
	<br><br>
	<div class="col-md-12">
	{!! Form::open(['route' => 'planeacions.store', 'method' => 'POST']) !!}
		<div class="form-group">
			{!! Form::label('nombre', 'Nombre') !!}
			{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('diasTrabajo', 'Días de trabajo') !!}
			{!! Form::text('diasTrabajo', null, ['class' => 'form-control']) !!}
		</div>
			<!--{!! Form::label('fecha', 'Fecha') !!}
			{!! Form::date('fecha', \Carbon\Carbon::now()) !!}
			{!! Form::label('avanceTotal', 'Avance total') !!}
			{!! Form::text('avanceTotal', null, ['class' => 'form-control']) !!}
			{!! Form::label('avancePorDia', 'Avance por día') !!}
			{!! Form::text('avancePorDia', null, ['class' => 'form-control']) !!}-->
		<div class="form-group">
			{!! Form::label('gestion', 'Gestión') !!}
			{!! Form::selectRange('gestion', 2018, 2030) !!}
		</div>
		<div class="form-group">
			{!! Form::label('mes', 'Mes') !!}
			{!! Form::select('mes', ['Enero' => 'Enero', 'Febrero' => 'Febrero', 'Marzo' => 'Marzo', 'Abril' => 'Abril', 'Mayo' => 'Mayo', 'Junio' => 'Junio', 'Julio' => 'Julio', 'Agosto' => 'Agosto', 'Septiembre' => 'Septiembre', 'Octubre' => 'Octubre', 'Noviembre' => 'Noviembre', 'Diciembre' => 'Diciembre']) !!}
		</div>
			<!--{!! Form::label('est', 'Est') !!}
			{!! Form::text('est', null, ['class' => 'form-control']) !!}-->
		
		{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
	</div>
	</div>
@endsection
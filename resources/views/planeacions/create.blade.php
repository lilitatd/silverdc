@extends('layouts.app')

@section('title', ' - Planeaciones')

@section('content')
<<<<<<< Updated upstream
=======
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach				
			</ul>
		</div>
	@endif
>>>>>>> Stashed changes
	{!! Form::open(['route' => 'planeacions.store', 'method' => 'POST']) !!}
		<div class="form-group">
			{!! Form::label('nombre', 'Nombre') !!}
			{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
			{!! Form::label('fecha', 'Fecha') !!}
			{!! Form::date('fecha', \Carbon\Carbon::now()) !!}
			{!! Form::label('avanceTotal', 'Avance total') !!}
			{!! Form::text('avanceTotal', null, ['class' => 'form-control']) !!}
			{!! Form::label('avancePorDia', 'Avance por día') !!}
			{!! Form::text('avancePorDia', null, ['class' => 'form-control']) !!}
			{!! Form::label('diasTrabajo', 'Días de trabajo') !!}
			{!! Form::text('diasTrabajo', null, ['class' => 'form-control']) !!}
			{!! Form::label('gestion', 'Gestión') !!}
			{!! Form::selectRange('gestion', 2018, 2030) !!}
			{!! Form::label('mes', 'Mes') !!}
			{!! Form::select('mes', ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']) !!}
			{!! Form::label('est', 'Est') !!}
			{!! Form::text('est', null, ['class' => 'form-control']) !!}
		</div>
		{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@endsection
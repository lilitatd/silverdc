@extends('layouts.app')

@section('title', ' - Lista de usuarios')

@section('content')
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="hero-element-mini">
			<h1 class="hero-title white">Crear nuevo usuario
			</h1>
			</div>
		</div>
	</div>
	@include('common.errors')
	<br>
	{!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
		<div class="form-row">
            <div class="form-group col-sm-12 col-md-6">
				{!! Form::label('name', 'Nombre') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-sm-12 col-md-6">
				{!! Form::label('email', 'Correo electrónico') !!}
				{!! Form::text('email', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-row">
            <div class="form-group col-sm-12 col-md-6">
				{!! Form::label('password', 'Contraseña') !!}
				{!! Form::password('password', ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-sm-12 col-md-6">
				{!! Form::label('password_confirmation', 'Repita la Contraseña') !!}
				{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-sm-12 col-md-6">
				{!! Form::label('role', 'Tipo') !!}
				@if (Auth::user()->role == 'SuperAdmin')
				{!! Form::text('role', 'Admin', ['class' => 'form-control', 'readonly']) !!}			
				@endif
				@if (Auth::user()->role == 'Admin')
					{!! Form::select('role', ['Seccional'=>'Seccional',
					'Supervisor' => 'Supervisor',
					'Polvorinero' => 'Polvorinero',
					'Operador' => 'Operador'], 
					null,
					['class' => 'form-control']) !!}			
				@endif
			</div>
			<div class="form-group col-sm-12 col-md-6">
				{!!Form::submit('Crear usuario', ['class'=>'btn btn-primary'])!!}
			</div>
		</div>
	{!! Form::close() !!}

@endsection
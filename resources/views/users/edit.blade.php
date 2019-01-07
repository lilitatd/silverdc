@extends('layouts.app')

@section('title', ' - Lista de usuarios')

@section('content')
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="hero-element-mini">
			<h1 class="hero-title white">Editar usuario
			</h1>
			</div>
		</div>
	</div>
	@include('common.errors')
	<br>
	{!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT']) !!}
		<div class="form-row">
            <div class="form-group col-sm-12 col-md-6">
				{!! Form::label('name', 'Nombre') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-sm-12 col-md-6">
				{!! Form::label('email', 'Correo electrónico') !!}
				{!! Form::text('email', null, ['class' => 'form-control', 'readonly']) !!}
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
				{!! Form::text('role', null, ['class' => 'form-control', 'readonly']) !!}			
			</div>
			<div class="form-group col-sm-12 col-md-6">
				{!!Form::submit('Editar', ['class'=>'btn btn-primary'])!!}
				<a href="/" class="btn btn-primary">Volver</a>
			</div>
		</div>
	{!! Form::close() !!}


@endsection
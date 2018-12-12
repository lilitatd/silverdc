@extends('layouts.app')

@section('title', ' - Nuevo material')

@section('content')
	@include('common.errors')
	{!! Form::open(['route' => 'articulos.store', 'method' => 'POST']) !!}
		<div class="form-group">
			{!! Form::label('nroArticulo', 'Código') !!}
			{!! Form::text('nroArticulo', null, ['class' => 'form-control']) !!}
			{!! Form::label('descripcion', 'Descripción') !!}
			{!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
			{!! Form::label('unidadMedida', 'Unidad de medida') !!}
			{!! Form::text('unidadMedida', null, ['class' => 'form-control']) !!}
			{!! Form::label('precioCompra', 'Precio de compra') !!}
			{!! Form::text('precioCompra', null, ['class' => 'form-control']) !!}
			{!! Form::label('precioVenta', 'Precio de venta') !!}
			{!! Form::text('precioVenta', null, ['class' => 'form-control']) !!}
		</div>
		{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@endsection
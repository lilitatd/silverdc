@extends('layouts.app')

@section('title', ' - Lista de materiales')

@section('content')
	@include('common.success')
	@if (count($articulos) > 0)
		<div class="text-center">
			<h1>LISTA DE MATERIALES</h1>			
		</div>
		<div class="text-right">
			<a href="/articulos/create" class="w3-button w3-circle w3-black">+</a>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Código</th>
					<th>Descripción</th>
					<th>Unidad Medida</th>
					<th>Precio Compra</th>
					<th>Precio Venta</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				@foreach($articulos as $articulo)
				<tr>
					<td>{{$articulo->nroArticulo}}</td>
					<td>{{$articulo->descripcion}}</td>
					<td>{{$articulo->unidadMedida}}</td>
					<td>{{$articulo->precioCompra}}</td>
					<td>{{$articulo->precioVenta}}</td>
					<td><a href="/articulos/{{$articulo->id}}" class="btn btn-primary">Ver más...</a>
				</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="text-center">
			<p>No existen materiales</p>
			<p>Pulsa el botón (+) para crear un material</p>
		</div>
		<div class="text-right">
			<a href="/articulos/create" class="w3-button w3-circle" style="background-color:#dbe8ff">+</a>
		</div>
	@endif
@endsection
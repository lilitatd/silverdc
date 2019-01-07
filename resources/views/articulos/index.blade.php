@extends('layouts.app')

@section('title', ' - Lista de materiales')

@section('content')
	@include('common.success')
	@include('common.errors')
	@if (count($articulos) > 0)
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="hero-element-mini">
				<h1 class="hero-title white">Lista de materiales
				</h1>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col d-flex justify-content-end">
				<a href="/articulos/create" style="color: blue;" title="Crear usuario">
		          <span class="fa fa-plus"> </span>
		        </a>
			</div>
		</div>
		<br>
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
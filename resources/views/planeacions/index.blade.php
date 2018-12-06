@extends('layouts.app')

@section('title', ' - Lista de planeaciones')

@section('content')
	@include('common.success')
	<div class="text-center"><h1>LISTA DE PLANEACIONES</h1></div>
	<div class="text-right"><a href="/planeacions/create" class="w3-button w3-circle" style="background-color:#dbe8ff">+</a></div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Fecha</td>
				<td>Avance total</td>
				<td>Avance día</td>
				<td>Gestión</td>
				<td>Mes</td>
				<td>Acción</td>
			</tr>
		</thead>
		<tbody>
			@foreach($planeaciones as $planeacion)
			<tr>
				<td>{{$planeacion->nombre}}</td>
				<td>{{$planeacion->fecha}}</td>
				<td>{{$planeacion->avanceTotal}}</td>
				<td>{{$planeacion->avancePorDia}}</td>
				<td>{{$planeacion->gestion}}</td>
				<td>{{$planeacion->mes}}</td>
				<td><a href="/planeacions/{{$planeacion->id}}" class="btn btn-primary">Ver más...</a>
			</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection
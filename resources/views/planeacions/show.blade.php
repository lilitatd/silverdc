@extends('layouts.app')

@section('title', '- Planeación')

@section('content')
	<table class="table table-bordered">
		<tbody>
			<tr>
				<th>Nombre</th>
				<td>{{$planeacion->nombre}}</td>
			</tr>
			<tr>
				<th>Fecha</th>
				<td>{{$planeacion->fecha}}</td>				
			</tr>
			<tr>
				<th>Avance total</th>
				<td>{{$planeacion->avanceTotal}}</td>
			</tr>
			<tr>
				<th>Avance día</th>
				<td>{{$planeacion->avancePorDia}}</td>
			</tr>
			<tr>
				<th>Gestión</th>
				<td>{{$planeacion->gestion}}</td>
			</tr>
			<tr>
				<th>Mes</th>
				<td>{{$planeacion->mes}}</td>
			</tr>
		</tbody>
	</table>
	<div class="text-center">
		<a href="/planeacions/{{$planeacion->id}}/edit" class="btn btn-primary">Editar</a>
	</div>
@endsection
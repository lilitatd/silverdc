@extends('layouts.app')

@section('title', ' - Lista de planeaciones')

@section('content')
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
@extends('layouts.app')

@section('title', ' - Planeaciones seccional')

@section('content')
	@include('common.success')
	@if (count($planeaciones) > 0)
		<div class="text-center"><h1>LISTA DE PLANEACIONES</h1>
			<br>
			<h2>PENDIENTES DE APROBACION</h2>
		</div>
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
					<td>
						@if ($planeacion->estado == "Revision")
						<div class="btn-group"> <a href="/seccional/{{$planeacion->id}}" class="btn btn-primary">V</a>&nbsp;<a href="/seccional/{{$planeacion->id}}/aprobar" class="btn btn-primary">A</a>
						</div>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="text-center">
			<p>No existen planeaciones pendientes de aprobacion.</p>
			<p></p>
		</div>		
	@endif
@endsection
<script>
    function confirmDelete()
  {
  var x = confirm("¿Estas seguro de eliminar?");
  if (x)
    return true;
  else
    return false;
  }
</script>
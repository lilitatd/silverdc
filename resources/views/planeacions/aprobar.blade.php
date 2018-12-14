@extends('layouts.app')

@section('title', '- Planeación')

@section('content')
    <div class="text-center"><h2>APROBAR PLANEACION</h2></div>
	@include('common.success')
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
        <a href="/planeacions/{id}/aprobar2">Aprobar</a>
    </div>
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
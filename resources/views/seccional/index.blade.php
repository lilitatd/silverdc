@extends('layouts.app')

@section('title', ' - Planeaciones seccional')

@section('content')
	<br>
	@include('common.success')
	@if (count($planeaciones) > 0)
		<div class="hero-element-mini">
			<div class="row-wrap">
				
				<h1 class="hero-title white">Lista de planeaciones
				</h1>
				<p class="hero-copy white">pendientes de aprobación</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12">
				<table class="table table-bordered" id="pendientes_aprb" style="width: 100%;">
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
								<a href="/seccional/{{$planeacion->id}}" class="" style="color: black;" title="Ver planeación"><span class="fa fa-eye"></span></a>
								<a href="/seccional/{{$planeacion->id}}/aprobar" class="" style="color: green;" title="Aprobar planeación" onclick="return confirm('¿Está seguro de aprobar la planeación?')"><span class="fa fa-check"></span></a>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		
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
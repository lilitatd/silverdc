@extends('layouts.app')

@section('title', ' - Lista de planeaciones')

@section('content')
	@include('common.success')
	@if (count($planeaciones) > 0)
		<div class="text-center"><h1>LISTA DE PLANEACIONES</h1></div>
		<div class="text-right"><a href="/planeacions/create" class="w3-button w3-circle w3-black">+</a></div>
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
				<tr @if ($planeacion->estado == 'Aprobado') bgcolor="#cdf7e3" @endif>
					<td>{{$planeacion->nombre}}</td>
					<td>{{$planeacion->fecha}}</td>
					<td>{{$planeacion->avanceTotal}}</td>
					<td>{{$planeacion->avancePorDia}}</td>
					<td>{{$planeacion->gestion}}</td>
					<td>{{$planeacion->mes}}</td>
					<td>
						@if ($planeacion->estado == "Pendiente")
						<div class="btn-group"> <a href="/planeacions/{{$planeacion->id}}" class="btn btn-primary">V</a>&nbsp;
						<a href="/planeacions/{{$planeacion->id}}/edit" class="btn btn-primary">Ed</a>&nbsp;
						{!! Form::open([
							'route' => ['planeacions.destroy', $planeacion->id], 
							'method' => 'DELETE', 
							'class' => 'form-inline', 
							'onsubmit' => 'confirmDelete()'
						]) !!}
						{!! Form::submit('El', [
							'class' => 'btn btn-danger'
						]) !!}
						{!! Form::close() !!}
							&nbsp;<a href="/planeacions/{{$planeacion->id}}/revision" class="btn btn-primary">A</a>
						</div>
						@endif
						@if ($planeacion->estado == 'Aprobado')
							<a href="/planeacions/{{$planeacion->id}}/boleta" class="btn btn-primary">B</a>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="text-center">
			<p>No existen planeaciones</p>
			<p>Pulsa el botón (+) para crear una planeación</p>
		</div>
		<div class="text-right">
			<a href="/planeacions/create" class="w3-button w3-circle w3-black">+</a>
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
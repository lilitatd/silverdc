@extends('layouts.app')

@section('title', ' - Lista de planeaciones')

@section('content')

	@if (count($planeaciones) > 0)
		<br>
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<h1 class="text-center">LISTA DE PLANEACIONES</h1>
			</div>
		</div>
		<!-- <div class="text-right"><a href="/planeacions/create" class="w3-button w3-circle w3-black">+</a></div> -->
		<br>
		<div class="row">
			<div class="col d-flex justify-content-end">
				<a href="/planeacions/create" style="color: blue;" title="Crear planeación">
		          <span class="fa fa-plus"> </span>
		        </a>
			</div>
		</div>
		<br>
		<div class="row ">
			<div class="col-sm-12 col-md-12">
			<table class="table table-striped table-bordered" style="width:100%;" id="planeaciones">
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
				<tr @if ($planeacion->estado == 'Aprobado') style="background-color: #cdf7e3;" @endif>
					<td>{{$planeacion->nombre}}</td>
					<td>{{$planeacion->fecha}}</td>
					<td>{{$planeacion->avanceTotal}}</td>
					<td>{{$planeacion->avancePorDia}}</td>
					<td>{{$planeacion->gestion}}</td>
					<td>{{$planeacion->mes}}</td>
					<td>
						@if ($planeacion->estado == "Pendiente")
 						<a href="/planeacions/{{$planeacion->id}}" class="" style="color: black;"><span class="fa fa-eye"></span></a>
						<a href="/planeacions/{{$planeacion->id}}/edit" class="" style="color: blue;"><span class="fa fa-pencil"> </span></a>
						{!! Form::open([
							'route' => ['planeacions.destroy', $planeacion->id], 
							'method' => 'DELETE', 
							'class' => 'form-inline', 
							'onsubmit' => 'confirmDelete()',
							'style'=>'display: none;',
							'id'=>'form_1'
						]) !!}
						<!-- {!! Form::submit('El', [
							'class' => 'btn btn-danger'
						,'style'=>'visibility: hidden;','id'=>'el_p']) !!} -->
						{!! Form::close() !!}
						
						<a href="#" class="" onclick="$('#form_1').submit();" style="color: red;"><span class="fa fa-trash"> </span></a>
						<a href="/planeacions/{{$planeacion->id}}/revision" class="" style="color: green;"><span class="fa fa-check"></span></a>
						@endif
						@if ($planeacion->estado == 'Aprobado')
							<a href="/planeacions/{{$planeacion->id}}/boleta" class="" style="color: black;" ><span class="fa fa-list-ul"></span></a>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
			</table>
			</div>
		</div>
		
		
	@else
		<br>
		<div class="row">
			<div class="text-center col-sm-12 col-md-11">
				<p>No existen planeaciones</p>
				<p>Pulsa el botón (+) para crear una planeación</p>
			</div>
			<div class="text-right col-sm-12 col-md-1 vertical-center justify-content-sm-center">
				<a href="/planeacions/create" style="color: blue;">
		          <span class="fa fa-plus"> </span>
		        </a>
			</div>
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
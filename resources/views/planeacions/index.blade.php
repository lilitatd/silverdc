@extends('layouts.app')

@section('title', ' - Lista de planeaciones')

@section('content')
	@include('common.success')
	<div class="col-md-12 col-sm-12">	
	
	@if (count($planeaciones) > 0)
		<br>
		<div class="row container">
			<div class="col-sm-12 col-md-12">
				<h1 class="text-center">LISTA DE PLANEACIONES</h1>
			</div>
		</div>
		<!-- <div class="text-right"><a href="/planeacions/create" class="w3-button w3-circle w3-black">+</a></div> -->
		<br>
		<div class="row">
			<div class="col-sm-3 col-md-2 offset-sm-10 offset-md-10 offset-lg-12 justify-content-center">
				<a href="/planeacions/create" style="color: blue;">
		          <span class="glyphicon glyphicon-plus"> </span>
		        </a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 table-responsive">
				<table class="table-bordered table table-fixed" style="">
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
								<div class="btn-group"> <a href="/planeacions/{{$planeacion->id}}"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;&nbsp;
								<a href="/planeacions/{{$planeacion->id}}/edit">
		          					<i class="glyphicon glyphicon-pencil" style="color: blue;"></i>
		        				</a>&nbsp;
								{!! Form::open([
									'route' => ['planeacions.destroy', $planeacion->id], 
									'method' => 'DELETE', 
									'class' => 'form-inline', 
									'onsubmit' => 'confirmDelete()'
								]) !!}
								{!! Form::submit('El', [
									'class' => 'btn btn-danger','style'=>'display: none;','id'=>'el_sbmt'
								]) !!}
									&nbsp;<a href="#" onclick="$('#el_sbmt').submit();"><i class="glyphicon glyphicon-trash" style="color: red;"></i></a>
								{!! Form::close() !!}
									&nbsp;<a href="/planeacions/{{$planeacion->id}}/revision" class=""><i class="glyphicon glyphicon-ok" style="color: green;"></i></a>
								</div>
								@endif
								@if ($planeacion->estado == 'Aprobado')
									<a href="/planeacions/{{$planeacion->id}}/boleta"><i class="glyphicon glyphicon-list-alt" style="color: green;"></i></a>
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
		          <span class="glyphicon glyphicon-plus"> </span>
		        </a>
			</div>
		</div>
					
	@endif
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
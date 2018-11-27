@extends('layouts.app')

@section('title', ' - Planeaciones')

@section('content')
<form class="form-group" method="POST" action="/planeaciones">
	@csrf
	<div class = "form-group">
		<label for="">Nombre</label>
		<input type="text" class="form-control" name="nombre">
		<label for="">Fecha</label>
		<input type="date" name="fecha">
		<label for="">Avance Total</label>
		<input type="text" class="form-control" name="avanceTotal">
		<label for="">Avance por día</label>
		<input type="text" class="form-control" name="avancePorDia">
		<label for="">Días de trabajo</label>
		<input type="text" class="form-control" name="diasTrabajo">
		<label for="">Gestión</label>
		<input type="text" class="form-control" name="gestion">
		<label for="">Mes</label>
		<input type="text" class="form-control" name="mes">
		<label for="">Est</label>
		<input type="text" class="form-control" name="est">
		
	</div>
	<button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
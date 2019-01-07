@extends('layouts.app')

@section('title', ' - Lista de usuarios')

@section('content')
	@include('common.errors')
	@include('common.success')
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="hero-element-mini">
			<h1 class="hero-title white">Lista de usuarios
			</h1>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col d-flex justify-content-end">
			<a href="/users/create" style="color: blue;" title="Crear usuario">
	          <span class="fa fa-plus"> </span>
	        </a>
		</div>
	</div>
	<br>
	<div class="row ">
		<div class="col-sm-12 col-md-12">
		<table class="table table-striped table-bordered" style="width:100%;" id="users">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Tipo</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->role}}</td>
						<td>
							<a href="/users/{{$user->id}}/edit" class="" style="color: blue;" title="Editar">
								<span class="fa fa-pencil"></span>
							</a>
							{!! Form::open([
								'route' => ['users.destroy', $user->id], 
								'method' => 'DELETE', 
								'class' => 'form-inline', 
								'onsubmit' => 'return confirmDelete()',
								'style'=>'display: none;',
								'id'=>'form_1'
							]) !!}		
							<!-- {!! Form::submit('El', [
							'class' => 'btn btn-danger'
						,'style'=>'visibility: hidden;','id'=>'el_p']) !!} -->						
							{!! Form::close() !!}
							<a href="#" class="" onclick="$('#form_1').submit();" style="color: red;" title="Eliminar">
									<span class="fa fa-trash"> </span>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		</div> <!-- div col -->
	</div> <!-- div row -->
@endsection
<script>

  function confirmDelete()
  {
  var x = confirm("¿Estás seguro de Eliminar el usuario?");
  if (x)
    return true;
  else
    return false;
  }

</script>
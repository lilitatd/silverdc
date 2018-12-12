@extends('layouts.app')

@section('title', '- Material')

@section('content')
	@include('common.success')
	<table class="table table-bordered">
		<tbody>
			<tr>
				<th>Código</th>
				<td>{{$articulo->nroArticulo}}</td>
			</tr>
			<tr>
				<th>Fecha</th>
				<td>{{$articulo->descripcion}}</td>				
			</tr>
			<tr>
				<th>Avance total</th>
				<td>{{$articulo->unidadMedida}}</td>
			</tr>
			<tr>
				<th>Avance día</th>
				<td>{{$articulo->precioCompra}}</td>
			</tr>
			<tr>
				<th>Gestión</th>
				<td>{{$articulo->precioVenta}}</td>
			</tr>
		</tbody>
	</table>
	<div class="text-center">
		<a href="/articulos/{{$articulo->id}}/edit" class="btn btn-primary">Editar</a>

		{!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['articulos', $articulo->id],
                            'style' => 'display:inline',
                            'onsubmit' => 'confirmDelete()'
            ]) !!}
        	{!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!}
        {!! Form::close() !!}
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
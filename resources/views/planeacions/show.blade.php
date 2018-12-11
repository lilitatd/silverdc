@extends('layouts.app')

@section('title', '- Planeación')

@section('content')
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
		<a href="/planeacions/{{$planeacion->id}}/edit" class="btn btn-primary">Editar</a>

		{!! Form::open(['route' => ['planeacions.destroy', $planeacion->id], 'method' => 'DELETE']) !!}
			{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
	</div>
	<h1>Labores <a href="{{ url('labors/create-step1') }}" class="btn btn-primary pull-right btn-sm">@lang('sylverdc.addnew') @lang('sylverdc.labor')</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>Nro</th>
                <th>Código</th>
                <th>Tipo</th>
                <th>Veta</th>
                <th>@lang('sylverdc.actions')</th>
            </tr>
            </thead>
            <tbody>
            @php $x=0; @endphp
            @foreach($labors as $item)
                @php $x++;@endphp
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('labor', $item->id) }}">{{ $item->codigo }}</a></td>
                    <td>{{ $item->tipo }}</td>
                    <td>{{ $item->veta }}</td>
                    <td>
                        <a href="{{ url('labors/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Editar</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['labors', $item->id],
                            'style' => 'display:inline',
                            'onsubmit' => 'confirmDelete()'
                        ]) !!}
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $labors->render() !!} </div>
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
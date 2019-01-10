@extends('layouts.app')

@section('title', '- Planeación')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="hero-element-mini">
            <h1 class="hero-title white">Planeación - Añadir labores
            </h1>
            </div>
        </div>
    </div>
	@include('common.success')
    <br>
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
	<h1>Labores <a href="{{ url('labors/create-step1/'.$planeacion->id) }}" class="btn btn-primary pull-right btn-sm">@lang('sylverdc.addnew') @lang('sylverdc.labor')</a></h1>
    <div class="table">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <table class="table table-bordered" style="width: 100%;" id="ver_lbrs">
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
                            'method'=>'POST',
                            'url' => '/labors/delete'
                        ]) !!}
                            {{ Form::hidden('labor_id', $item->id) }}
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            </div>
        </div>
        
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
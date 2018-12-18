@extends('layouts.app')

@section('title', ' - Reporte')

@section('content')
	<div class="text-center">--Reporte por precios --</div>
	@include('common.errors')
	<div class="row">
		{{ Form::open ([
								'route' => 'repsearch', 
								'method' => 'GET',
								'class' => 'form-inline pull-right'])
		}}
			<div class="col">
				<div class="form-group">
					{!! Form::label('dateFrom', 'Desde') !!}
					{{ Form::date('dateFrom', \Carbon\Carbon::now(), ['class' => 'form-control', 'id'=>'datetimepicker']) }}				
				</div>				
			</div>
			<div class="col">
				<div class="form-group">
					{!! Form::label('dateTo', 'Hasta') !!}
					{{ Form::date('dateTo', \Carbon\Carbon::now(), ['class' => 'form-control', 'id'=>'datetimepicker']) }}				
				</div>				
			</div>
			<div class="col">
				<div class="form-group">
					<button type="submit" class="btn btn-default">
						<span class="fa fa-search"></span>
					</button>
				</div>				
			</div>
		{{ Form::close() }}
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Planeación</th>
				<th>Tipo</th>
				<th>Labor</th>
				<th>Código</th>
				<th>Descripción</th>
				<th>Cant. Sol.</th>
				<th>Cant. Ent.</th>
				<th>Precio Est.</th>
				<th>Precio</th>
				<th>Diferencia</th>
			</tr>
		</thead>
		<tbody>
			@php
				$sumPrecioEstimado = 0;
				$sumPrecio = 0;
				$sumDiferencia = 0;
			@endphp
			@foreach ($auxDetalleBoletas as $detalleBoleta)
				<tr>
					<td>{{ $detalleBoleta['planeacion'] }}</td>
					<td>{{ $detalleBoleta['tipo'] }}</td>
					<td>{{ $detalleBoleta['labor'] }}</td>
					<td>{{ $detalleBoleta['codigo'] }}</td>
					<td>{{ $detalleBoleta['descripcionArticulo'] }}</td>
					<td>{{ $detalleBoleta['cantidadSolicitada'] }}</td>
					<td>{{ $detalleBoleta['cantidadEntregada'] }}</td>
					<td>{{ $detalleBoleta['precioEstimado'] }}</td>
					<td>{{ $detalleBoleta['precio'] }}</td>
					<td>{{ $detalleBoleta['diferenciaPrecio'] }}</td>
				</tr>
				@php
					$sumPrecioEstimado += $detalleBoleta['precioEstimado'];
					$sumPrecio += $detalleBoleta['precio'];
					$sumDiferencia += $detalleBoleta['diferenciaPrecio'];
				@endphp
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<th>Total</th>
				<th>{{ $sumPrecioEstimado }}</th>
				<th>{{ $sumPrecio }}</th>
				<th>{{ $sumDiferencia }}</th>
			</tr>
		</tfoot>
	</table>
	fdsafsa
@endsection

<script type="text/javascript">
	$('#datetimepicker').datetimepicker({
    	format: 'yyyy-mm-dd'
	});
</script>
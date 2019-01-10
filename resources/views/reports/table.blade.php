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
		<tfoot class="thead-light">
			<tr>
				<th colspan="7">TOTAL</th>
				<th>{{ $sumPrecioEstimado }}</th>
				<th>{{ $sumPrecio }}</th>
				<th>{{ $sumDiferencia }}</th>
			</tr>
		</tfoot>
	</table>
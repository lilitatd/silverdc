@extends('layouts.app')

@section('content')
	@if (count($boletas) == 0) 
		<div class="text-center">
			<p>No existen boletas creadas</p>
		</div>
	@else
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h1>
							Lista de boletas
							{{ Form::open([
								'route' => 'bolsearch', 
								'method' => 'GET',
								'class' => 'form-inline pull-right']) }}
								<div class="form-group">
									{{ Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Código']) }}
								</div>
								<div class="form-group">
									{{ Form::text('asignado', null, ['class' => 'form-control', 'placeholder' => 'Asignado a:']) }}
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default">
										<span class="glyphicon glyphicon-search"></span>
									</button>
								</div>
							{{ Form::close() }}
						</h1>
					</div>
				</div>
				<div class="col-md-8">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Código</th>
								<th>Asignado a:</th>
								<th>Estado</th>
								@if (Auth::user()->role == 'Polvorinero')
									<th>Acciones</th>
								@endif
							</tr>
						</thead>
						<tbody>
							@foreach ($boletas as $boleta)
								<tr>
									<td>{{ $boleta->codigo }}</td>
									<td>{{ $boleta->recibidoPor }}</td>
									<td>{{ $boleta->estado }}</td>
									@if (Auth::user()->role == 'Polvorinero')
										<td>
											<a class="btn btn-primary" href="/boletas/{{ $boleta->id }}">Ver</a>
										</td>
									@endif
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $boletas->render() }}
				</div>
			</div>
		</div>
	@endif
@endsection
@extends('layouts.app')

@section('content')
<br>
	@if (count($boletas) == 0)
		<div class="row">
			<div class="col">
				<p class="text-center">No existen boletas creadas</p>
			</div>
		</div>
	@else
		<div class="container">
			
					<!-- <div class="page-header"> -->
						<div class="row justify-content-sm-center d-flex">
							<div class="col-md-5 col-sm-12">
								<h1>Lista de boletas</h1>
							</div>
							<div class="col-md-7 col-sm-12">
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
										<span class="fa fa-search"></span>
									</button>
								</div>
							{{ Form::close() }}
							</div>
						</div>
					<!-- </div> -->
					<div class="row">
				<div class="col-md-12 col-sm-12">
					<table class="table table-bordered" style="width: 100%;" id="list_blts">
						<thead>
							<tr>
								<th>Código</th>
								<th>Turno</th>
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
									<td>{{ $boleta->turno }}</td>
									<td>{{ $boleta->recibidoPor }}</td>
									<td>{{ $boleta->estado }}</td>
									@if (Auth::user()->role == 'Polvorinero')
										<td>
											<a href="/boletas/{{ $boleta->id }}" style="color: black;" title="Ver boleta"><span class="fa fa-eye"></span></a>
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
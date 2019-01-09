@extends('layouts.app')

@section('title', '- Planeación')

@section('content')
<br>
	@include('common.success')
    <div class="text-center"><h2>Planeación: {{$planeacion->nombre}} </h2></div>
    <div class="container">
        <div class="row">
            <div class="col">Fecha</div>
            <div class="col">{{$planeacion->fecha}}</div>
            <div class="col">Días trabajo</div>
            <div class="col">{{$planeacion->diasTrabajo}}</div>
        </div>
        <div class="row">
            <div class="col">Avance total</div>
            <div class="col">{{$planeacion->avanceTotal}}</div>
            <div class="col">Avance día</div>
            <div class="col">{{$planeacion->avancePorDia}}</div>
        </div>
        <div class="row">
            <div class="col">Gestión</div>
            <div class="col">{{$planeacion->gestion}}</div>
            <div class="col">Mes</div>
            <div class="col">{{$planeacion->mes}}</div>
        </div>
    </div>
    <br>
	<h1>Labores</h1>
    <div class="table">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            
        </div>
    </div>
        <table class="table table-bordered" style="width: 100%;" id="planeacion_lbrs">
            <thead>
            <tr>
                <th>Nro</th>
                <th>Tipo</th>
                <th>Nivel</th>
                <th>Veta</th>
                <th>Código</th>
                <th>Ejecutor</th>
                <th>Avance<br>total</th>
                <!--<th>@lang('sylverdc.actions')</th>-->
            </tr>
            </thead>
            <tbody>
            @php $x=0; $total = 0; 
                $lastType = 'A';
                $totalGral = 0;
            @endphp
            @foreach($labors as $item)
                @php 
                    $x++;
                    if ($x == 1) {
                        $lastType = $item->tipo;
                    }
                    if ($lastType != $item->tipo) {
                        echo '<thead class="thead-light">';
                        echo '<tr>';
                        echo '<th colspan="6">Total labores tipo <strong>'.$lastType.'</strong></th>';
                        echo '<th align="right">'.number_format($total, 2).'</th>';
                        echo '</tr>';
                        echo '</thead>';
                        $total = 0;
                        $lastType = $item->tipo;
                    }
                    $total += $item->avanceTotal;
                    $totalGral += $item->avanceTotal;
                @endphp
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td>{{ $item->nivel }}</td>
                    <td>{{ $item->veta }}</td>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->ejecutor }}</td>
                    <td>{{ number_format($item->avanceTotal, 2) }}</td>
                </tr>
            @endforeach
            @php 
                echo '<thead class="thead-light">';
                echo '<tr>';
                echo '<th colspan="6">Total labores tipo <strong>'.$lastType.'</strong></th>';
                echo '<th>'.number_format($total, 2).'</th>';
                echo '</tr>';
                echo '</thead>';
            @endphp
            </tbody>
            <tfoot class="table-dark">
                <tr>
                    <td colspan="6"><strong>TOTAL GENERAL</strong></td>
                    <td><strong>{{ number_format($totalGral,2) }}</strong></td>
                </tr>
            </tfoot>
        </table>
        
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
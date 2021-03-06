@extends('layouts.app')

@section('title', '- Planeación')

@section('content')
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
	<h1>Labores</h1>
    <div class="table">
        <table class="table table-bordered table-striped">
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
                        echo "<tr>";
                        echo '<td colspan=6>Total</td>';
                        echo '<td>'.$total.'</td>';
                        echo "</tr>";
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
                    <td>{{ $item->avanceTotal }}</td>
                </tr>
            @endforeach
            @php 
                echo "<tr>";
                echo '<td colspan=6>Total</td>';
                echo '<td>'.$total.'</td>';
                echo "</tr>";
            @endphp
            </tbody>
            <tfoot class="table-dark">
                <tr>
                    <td colspan="6">TOTAL</td>
                    <td>{{ $totalGral }}</td>
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
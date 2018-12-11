@extends('layouts.app')

@section('content')
    <h1>Cálculo del número de taladros</h1>
    <hr>
    <form action="/labors/create-step1" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="codigo">Codigo labor</label>
            <input type="text" value="{{{ $labor->codigo or '' }}}" class="form-control" id="taskTitle"  name="codigo">
        </div>
        <div class="form-group">
            <label for="ancho">Ancho [m]</label>
            <input type="text" value="{{{ $labor->ancho or '' }}}" class="form-control" name="ancho">
        </div>
        <div class="form-group">
            <label for="alto">Alto</label>
            <input type="text"  value="{{{ $labor->alto or '' }}}" class="form-control" name="alto"/>
        </div>
        <div class="form-group">
            <label for="dureza">Dureza de la roca</label><br/>
            <select class="form-control" name="dureza">
                <option {{{ (isset($labor->dureza) && $labor->dureza == 'Blanda') ? "selected=\"selected\"" : "" }}}>Blanda</option>
                <option {{{ (isset($labor->dureza) && $labor->dureza == 'Semidura') ? "selected=\"selected\"" : "" }}}>Semidura</option>
                <option {{{ (isset($labor->dureza) && $labor->dureza == 'Dura') ? "selected=\"selected\"" : "" }}}>Dura</option>
            </select>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>
@endsection
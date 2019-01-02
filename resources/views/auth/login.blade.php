@extends('layouts.app')

@section('content')
    <div class="row vertical-center">
        <div class="col-md-7 col-lg-7 col-sm-12 align-self-center container">
            <div class="card">
                <div class="card-header text-center">
                    {{ __('SILVER DC - INGRESO AL SISTEMA') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <div class="col-md-9 col-lg-9 col-sm-12">
                                <img src="{{ asset('images/pas-logo.svg') }}" alt="" class="img-fluid">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-4 col-sm-12 col-lg-3"> <!-- offset-lg-1 offset-md-1 -->
                                <label for="email" class="col-form-label text-md-left">{{ __('Usuario') }}</label>
                            </div>
                            <div class="col-md-7 col-lg-7 col-sm-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Ingrese Usuario" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-4 col-sm-12 col-lg-3"> <!-- offset-lg-1 offset-md-1 -->
                                <label for="password" class=" col-form-label text-md-left">{{ __('Contraseña') }}</label>
                            </div>
                            <div class="col-md-7 col-lg-7 col-sm-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Ingrese Contraseña">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group row justify-content-center">
                                <div class="col-md-auto col-sm-auto col-lg-auto d-flex align-items-center"> <!-- offset-lg-1 offset-md-1 -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-center" for="remember">
                                            {{ __('Recuerdame') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex col-sm-12 col-md-7 col-lg-7 justify-content-sm-start justify-content-md-end justify-content-lg-end">
                                    <a class="" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="justify-content-center"> 
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ingresar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->

    <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/main.min.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/normalize.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/main.css') }}" rel="stylesheet"> -->
</head>
<body>

    <!-- <img class="img-fluid" src="{{ asset('Images/topo-map.png') }}" style="background-repeat: repeat; "> -->
    <div id="app">
    
        <!-- Authentication Links -->
        @guest

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li> -->
        @else
            <!-- <div class="row-wrap">
                
            </div> -->

            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!-- {{ config('app.name', 'Laravel') }} -->
                        <img src="{{ asset('images/pas-logo.svg') }}" alt="" class="" style="height: 49px;" />
                    </a>
                    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav ml-auto">
                            @if (Auth::user()->role == 'Supervisor')
                                <li class="nav-item">
                                    <a class="link-nav-item nav-link" href="/planeacions">PLANEACIONES</a>
                                </li>
                                <li class="nav-item">
                                    <a class="link-nav-item nav-link" href="/boletas">BOLETAS</a>
                                </li>
                            @endif
                            @if (Auth::user()->role == 'Seccional')
                                <li class="nav-item">
                                    <a class="link-nav-item nav-link" href="/Seccional">Planeaciones pendientes</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown" style="margin-right: 10px;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle link-nav-item text-uppercase" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  v-pre>
                                    <span class="glyphicon glyphicon-user" style="margin-left: 10px;"></span>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> 
        @endguest
                
        <main>
            <div class="container">
                <div class="row">
                        @yield('content')
                </div>
            </div>
        </main>

<!--        <footer>
            @include('includes.footer')
        </footer> -->
    </div>
</body>
</html>

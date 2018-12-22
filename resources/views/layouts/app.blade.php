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
    
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/main.css') }}" rel="stylesheet"> -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
    
    
    <!-- <link href="{{ asset('css/normalize.css') }}" rel="stylesheet"> -->
    
</head>
<body style="background-image: url(../images/topo-map.png);">

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
            <header role="banner" style="height: 100px !important;" class="navbar-laravel">
                <div class="row-wrap" style="height: 100px !important;">
                    <div class="header-left">
                        <h1 class="logo"><a href="/"><img src="{{ asset('images/pas-logo.svg') }}" alt="PanAmSilver logo" title="" /></a></h1>
                    </div>
                    <div class="header-right">
                        <nav role="navigation">
                            <ul class="nav-items">
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
                        </nav>
                        <div class="utility-nav">
                            <button class="mobile-menu" aria-label="Open Menu"><span></span></button>
                        </div>
                    </div>
                </div>
            </header>

 
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

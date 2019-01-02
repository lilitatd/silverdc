<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css" rel="stylesheet"> -->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app-main.css') }}" rel="stylesheet">
</head>
<body class="" style="">

    <div id="app">
        
        @guest

        @else
        <!-- <div class="wrapper"> -->
        <header role="banner" style="height: 100px;" class="">
            <div class="row-wrap" style="">
                <div class="header-left" style="height: 100px;">
                    <h1 class="logo"><a href="/"><img src="{{ asset('images/pas-logo.svg') }}" alt="PanAmSilver logo" title="" /></a></h1>
                </div>
                <div class="header-right" style="height: 100px;">
                    <nav role="navigation" style="height: 100%;">
                        <ul class="nav-items" style="">
                            @if (Auth::user()->role == 'Supervisor')
                                <li class="nav-item" style="">
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
                                    <span class="fa fa-user"></span>
                                    &nbsp{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="">
                                    <a class="dropdown-item" href="{{ route('logout') }}" style="padding: 15px;" 
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
        <!-- </div> -->

    </div>

    <div id="sidr-main" class="sidr right sidr-vsb" style="transition: right 0.2s ease 0s; right: 0px;">
           <div class="sidr-inner">
              <ul class="sidr-class-nav-items">
                 <li class="sidr-class-nav-item sidr-class-dropdown sidr-class-link">
                    <a class="sidr-class-nav-link" href="/planeacions" aria-expanded="false">Planeaciones</a>
                    <div class="sidr-class-dropdown-holder">
                    </div>
                 </li>
                 <li class="sidr-class-nav-item sidr-class-dropdown sidr-class-link">
                    <a class="sidr-class-nav-link" href="/boletas" aria-expanded="false">Boletas</a>
                    <div class="sidr-class-dropdown-holder">
                    </div>
                 </li>
                 <li class="sidr-class-nav-item sidr-class-dropdown sidr-class-link">
                    <a class="sidr-class-nav-link" href="#" aria-expanded="false">{{ Auth::user()->name }}<!-- <span class="fa fa-user" style="width: 20px; margin: 0px !important;"></span> --></a>
                    <div class="sidr-class-dropdown-holder">
                       <ul class="sidr-class-dropdown-menu">
                          <li class="sidr-class-dropdown-item"><a class="sidr-class-dropdown-item-link sidr-class-link" href="{{ route('logout') }}" title="Cerrar sesión" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                       </ul>
                    </div>
                 </li>
              </ul>
           </div>
        </div>

        @endguest
        <main class="container">
            @yield('content')
        </main>
    <!-- </div> -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="{{ asset('js/boards.js') }}" defer></script>
    <script src="{{ asset('js/app-main.js') }}" defer></script>

</body>
</html>

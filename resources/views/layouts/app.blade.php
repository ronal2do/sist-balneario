<!DOCTYPE html>
<html lang="en" ng-app="sistema">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/sweetalert.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Sistema
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                @if (Auth::guest())
                    
                    @else 
                        @if  (Auth::user()->role == '1')
                         <li><a href="{{ url('/home') }}">Home</a></li>

                        @endif
                    @endif
                    <li><a href="{{ url('/mapa') }}">Mapa</a></li>
                    @if (Auth::guest())
                    
                    @else 
                        @if  (Auth::user()->role == '1')
                        <li><a href="{{ url('/cadastrar') }}">Cadastrar</a></li>
                        <li><a href="{{ url('/importar') }}">Importar</a></li>

                        @endif
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                       <!--  <li><a href="{{ url('/register') }}">Registrar</a></li> -->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/assets/js/angular.min.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src='/assets/js/ngMask.min.js'></script>
    <script src='/assets/js/sweetalert.min.js'></script>
    <script src='/assets/js/markerclusterer.js'></script>
    {{-- <script src="{{ elixir('assets/js/app.js') }}"></script> --}}
           <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtw4sSBBpA73vpTNXXBz40goq3b7BePEk">
    </script>
    @yield('post-script')

    @include('sweet::alert')
</body>
</html>

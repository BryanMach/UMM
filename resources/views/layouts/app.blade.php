<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Unidad de marina mercante', 'Unidad de Marina Mercante') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .sidebar,
        .right-sidebar {
            height: 100vh;
            background-color: #fff;
            border-right: 1px solid #ddd;
            position: fixed;
            top: 0;
        }

        .right-sidebar {
            width: 200px;
            right: 0;
            border-left: 1px solid #ddd;
        }

        .sidebar a,
        .right-sidebar a {
            color: #333;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }

        .sidebar a:hover,
        .right-sidebar a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>


<body>
    <div id="app" class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">-->
        <div class="container">
            <!--<a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('Unidad de Marina Mercante', 'Unidad de Marina Mercante') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <!--<ul class="navbar-nav mr-auto">

                    </ul>-->

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @if (!Auth::check())
                        <li><a class="nav-link" href="{{ url('/login') }}">_Ingresar</a></li>
                        <li><a class="nav-link" href="{{ url('/register') }}">_Registrarse</a></li>
                    @else
                        <!--<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>-->
                    @endif
                </ul>
            </div>
        </div>
    </div>
    </div>
    @if ($nivel == 2)
        <div class="right-sidebar">
            <div class="sidebar-header text-center p-3">
                <h4>Registros de personal </h4>
            </div>
            <div class="sidebar-content">
                <a href="personal">Personal</a>
                <a href="usuarios">Usuarios</a>
                <a href="bases-operativas" class="active">Bases de operaciones</a>
                <h5 class="px-3 pt-3">Registros de embarcaciones</h5>
                <a href="propietario">Propietarios</a>
                <a href="artefactos">Artefactos</a>
                <a href="lista-propietarios">Listas de propietarios de embarcaciones</a>
                <a href="imprimir">Certificaciones</a>
                <a href="imprimir">Alertas de Vencimiento</a>
            </div>
        </div>
        @if ($nivel == 3)
            <div class="right-sidebar">
                <div class="sidebar-header text-center p-3">
                    <h4>Registros de personal</h4>
                </div>
                <div class="sidebar-content">
                    <a href="bases-operativas" class="active">Bases de operaciones</a>
                    <h5 class="px-3 pt-3">Registros de embarcaciones</h5>
                    <a href="propietario">Propietarios</a>
                    <a href="artefactos">Artefactos</a>
                    <a href="lista-propietarios">Listas de propietarios de embarcaciones</a>
                    <a href="imprimir">Certificaciones</a>
                    <a href="imprimir">Alertas de Vencimiento</a>

                </div>
            </div>
        @else
            <div class="right-sidebar">
                <div class="sidebar-header text-center p-3">
                    <h4>Registros de personal</h4>
                </div>
                <div class="sidebar-content">
                    <a href="bases-operativas" class="active">Bases de operaciones</a>
                    <h5 class="px-3 pt-3">Registros de embarcaciones</h5>
                    <a href="propietario">Propietarios</a>
                    <a href="artefactos">Artefactos</a>
                    <a href="lista-propietarios">Listas de propietarios de embarcaciones</a>
                    <a href="imprimir">Certificaciones</a>
                    <a href="imprimir">Alertas de Vencimiento</a>

                </div>
            </div>
        @endif
    @endif

    <main class="py-4">
        {{-- ver por que no ome wopermite tener una condicional aqui --}}
        {{-- @dd(Auth::user()->id) --}}
        {{-- @if (Auth::user()->id != 1)
                extends('adminlte::page')
            @else
                yield('content')
            @endif --}}
        {{-- @extends('adminlte::page') --}}
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

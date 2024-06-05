<!--<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Unidad de marina mercante', 'Unidad de Marina Mercante') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div id="app" class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="container">
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav ml-auto">
                    
                    </ul>
                </div>-->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"> <h1>Registro nuevo</h1> </div>
                    <div class="card-body">
                        <!--@php
                            $l=Auth::user()->id;
                            //$l=RouteServiceProvider::HOME();
                            //dd($l);
                        @endphp-->
                        <a href="{{ url('/admin/perf45r') }}" title="Back"><button class="btn btn-warning btn-sm">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Cancelar</button></a>
                        <br>
                        <br>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/registro/guardarRegistro') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.registros.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!--
    </div>
</div>


    <main class="py-4">
        {{-- ver por que no ome wopermite tener una condicional aqui --}}
        {{-- @dd(Auth::user()->id) --}}
        {{-- @if (Auth::user()->id == 0) --}}
        @extends('adminlte::page')
        {{-- @else
                @yield('')
            @endif --}}

    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>-->

@extends('layouts.app')

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

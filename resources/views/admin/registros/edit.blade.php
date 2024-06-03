@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Editar Propietario #{{ $propietario->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/propietario') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retroceder</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/propietario/' . $propietario->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.propietario.form', ['formMode' => 'edit'])

                        </form>
                        {{---en este apartado recomiendo usar los shows de cada tabla con un botón para modificar
                            cada sector redireccionando a su vista edit--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

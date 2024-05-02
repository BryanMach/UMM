@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Artefacto {{ $artefacto->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/artefactos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retroceder</button></a>
                        <a href="{{ url('/admin/artefactos/' . $artefacto->id . '/edit') }}" title="Editar Artefacto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('admin/artefactos' . '/' . $artefacto->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Borrar Artefacto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $artefacto->id }}</td>
                                    </tr>
                                    <tr><th> IdUsuarios </th><td> {{ $artefacto->idUsuarios }} </td></tr><tr><th> IdBaseOperativa </th><td> {{ $artefacto->idBaseOperativa }} </td></tr><tr><th> Matricula </th><td> {{ $artefacto->matricula }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

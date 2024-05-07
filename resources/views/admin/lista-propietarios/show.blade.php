@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">ListaPropietario {{ $listapropietario->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/lista-propietarios') }}" title="Back"><button
                                class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Retroceder</button></a>
                        <a href="{{ url('/admin/lista-propietarios/' . $listapropietario->id . '/edit') }}"
                            title="Editar ListaPropietario"><button class="btn btn-primary btn-sm"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('admin/listapropietarios' . '/' . $listapropietario->id) }}"
                            accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Borrar ListaPropietario"
                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Borrar</button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $listapropietario->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> IdPropietario </th>
                                        <td> {{ $listapropietario->idPropietario }} </td>
                                    </tr>
                                    <tr>
                                        <th> IdArtefacto </th>
                                        <td> {{ $listapropietario->idArtefacto }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Propietario y su embarcación</div>
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
                                    <tr><td>
                                        <form method="POST" action="{{ url('admin/imprimir-certificado-registro')}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $listapropietario->id }}">
                                            <input type="hidden" name="idPropietario" value="{{ $listapropietario->idPropietario }}">
                                            <input type="hidden" name="idArtefacto" value="{{ $listapropietario->idArtefacto }}">
                                            <label for="correlativo">Ingrese un el número correlativo de la hoja en la que imprimirá este certificado:</label>
                                            <input type="text" id="correlativo" name="correlativo" pattern="[0-9]*" inputmode="number" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            <!--<div class="form-group {{ $errors->has('idPropietario') ? 'has-error' : '' }}">
                                                <select name="idPropietario" id="idPropietario" value="{{ $listapropietario->idPropietario }}">
                                                    <option value="{{ $listapropietario->idPropietario }}"></option>
                                                </select>
                                                {!! $errors->first('idPropietario', '<p class="help-block">:message</p>') !!}
                                            </div>
                                            <div class="form-group {{ $errors->has('idArtefacto') ? 'has-error' : '' }}">
                                                <select name="idArtefacto" id="idArtefacto">
                                                    <option value="{{ $listapropietario->idArtefacto }}"></option>
                                                </select>
                                                {!! $errors->first('idArtefacto', '<p class="help-block">:message</p>') !!}
                                            </div>-->
                                                        <input class="btn btn-primary" type="submit" value="Emitir certificado de seguridad">
                                        </form>
                                    </td>
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

  @extends('layouts.app')
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
                                      <tr>
                                          <td>
                                              <form method="POST" action="{{ url('admin/imprimir-certificado-registro') }}"
                                                  accept-charset="UTF-8" class="form-horizontal"
                                                  enctype="multipart/form-data">
                                                  {{ csrf_field() }}
                                                  <input type="hidden" name="id" value="{{ $listapropietario->id }}">
                                                  <input type="hidden" name="idPropietario"
                                                      value="{{ $listapropietario->idPropietario }}">
                                                  <input type="hidden" name="idArtefacto"
                                                      value="{{ $listapropietario->idArtefacto }}">
                                                  <label for="correlativo">Ingrese el número correlativo de la hoja en la
                                                      que
                                                      imprimirá este certificado de Registro:</label>
                                                  <input type="text" id="correlativo" name="correlativo" pattern="[0-9]*"
                                                      inputmode="number" required
                                                      oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                  <input class="btn btn-primary" type="submit"
                                                      value="Emitir certificado de registro">
                                              </form>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <form method="POST"
                                                  action="{{ url('admin/imprimir-certificado-seguridad') }}"
                                                  accept-charset="UTF-8" class="form-horizontal"
                                                  enctype="multipart/form-data">
                                                  {{ csrf_field() }}
                                                  <input type="hidden" name="id" value="{{ $listapropietario->id }}">
                                                  <input type="hidden" name="idPropietario"
                                                      value="{{ $listapropietario->idPropietario }}">
                                                  <input type="hidden" name="idArtefacto"
                                                      value="{{ $listapropietario->idArtefacto }}">
                                                  <label for="correlativo">Ingrese el número correlativo de la hoja en la
                                                      que
                                                      imprimirá este certificado de Seguridad de la navegación:</label>
                                                  <input type="text" id="correlativo" name="correlativo"
                                                      pattern="[0-9]*" inputmode="number" required
                                                      oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                  <input class="btn btn-primary" type="submit"
                                                      value="Emitir certificado de seguridad">
                                              </form>
                                          </td>
                                      </tr>
                                  </tbody>
                                  <tr>
                                      <td>
                                          <form method="POST"
                                              action="{{ url('admin/imprimir-certificado-francobordo') }}"
                                              accept-charset="UTF-8" class="form-horizontal"
                                              enctype="multipart/form-data">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="id" value="{{ $listapropietario->id }}">
                                              <input type="hidden" name="idPropietario"
                                                  value="{{ $listapropietario->idPropietario }}">
                                              <input type="hidden" name="idArtefacto"
                                                  value="{{ $listapropietario->idArtefacto }}">
                                              <label for="correlativo">Ingrese el número correlativo de la hoja en la que
                                                  imprimirá este certificado de Francobordo:</label>
                                              <input type="text" id="correlativo" name="correlativo" pattern="[0-9]*"
                                                  inputmode="number" required
                                                  oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                              <input class="btn btn-primary" type="submit"
                                                  value="Emitir certificado de francobordo">
                                          </form>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <form method="POST" action="{{ url('admin/imprimir-certificado-arqueo') }}"
                                              accept-charset="UTF-8" class="form-horizontal"
                                              enctype="multipart/form-data">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="id" value="{{ $listapropietario->id }}">
                                              <input type="hidden" name="idPropietario"
                                                  value="{{ $listapropietario->idPropietario }}">
                                              <input type="hidden" name="idArtefacto"
                                                  value="{{ $listapropietario->idArtefacto }}">
                                              <label for="correlativo">Ingrese el número correlativo de la hoja en la que
                                                  imprimirá este certificado de arqueo:</label>
                                              <input type="text" id="correlativo" name="correlativo" pattern="[0-9]*"
                                                  inputmode="number" required
                                                  oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                              <input class="btn btn-primary" type="submit"
                                                  value="Emitir certificado de arqueo">
                                          </form>
                                      </td>
                                  </tr>
                              </table>
                          </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endsection

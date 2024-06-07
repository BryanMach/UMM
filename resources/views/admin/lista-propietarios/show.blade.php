  @extends('layouts.app')
  <style>
      body {
          font-family: Arial, sans-serif;
          background-color: #f8f9fa;
      }

      .sidebar {
          height: 100vh;
          background: linear-gradient(to bottom, white, rgb(16, 232, 200));
          padding: 30px;
          border-right: 1px solid #dee2e6;
      }

      .profile-img {
          width: 200px;
          height: 200px;
          border-radius: 50%;
          object-fit: cover;
      }

      .sidebar h3 {
          margin-top: 15px;
          font-size: 1.75rem;
          color: #000;
      }

      .sidebar .role {
          color: #9370DB;
          font-size: 1.1rem;
          margin-bottom: 20px;
      }

      .sidebar .description {
          color: #6c757d;
          font-size: 20px;

      }

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

      .main-content {
          margin-left: 220px;
          margin-right: 200px;
          padding: 20px;
      }

      .search-bar {
          display: flex;
          align-items: center;
          margin-left: 15%;
          margin-top: 5%;
      }

      .search-bar input {
          flex-grow: 1;
          margin-right: 10px;
      }

      .table-container {
          background-color: #fff;
          border: 1px solid #ddd;
          padding: 20px;
          border-radius: 5px;
      }

      .table-responsive {
          margin-top: 20px;
      }
  </style>
   @if ($nivel == 2)
      <div class="right-sidebar">
          <div class="sidebar-header text-center p-3">
              <h4>Registros de personal </h4>
          </div>
          <div class="sidebar-content">
              <a href="{{ url('/admin/personal') }}">Personal</a>
              <a href="{{ url('/admin/usuarios') }}">Usuarios</a>
              <a href="{{ url('/admin/bases-operativas') }}" class="active">Bases de operaciones</a>
              <h5 class="px-3 pt-3">Registros de embarcaciones</h5>
              <a href="{{ url('/admin/propietario') }}">Propietarios</a>
              <a href="{{ url('/admin/artefactos') }}">Artefactos</a>
              <a href="{{ url('/admin/lista-propietarios') }}">Listas de propietarios de embarcaciones</a>
              {{-- <a href="imprimir">Certificaciones</a> --}}
              {{-- <a href="imprimir">Alertas de Vencimiento</a> --}}
          </div>
      </div>
  @endif
  @if ($nivel == 3)
      <div class="right-sidebar">
          <div class="sidebar-content">
              <h5 class="px-3 pt-3">Registros de embarcaciones</h5>
              <a href="{{ url('/admin/propietario') }}">Propietarios</a>
              <a href="{{ url('/admin/artefactos') }}">Artefactos</a>
              <a href="{{ url('/admin/lista-propietarios') }}">Listas de propietarios de embarcaciones</a>
              {{-- <a href="imprimir">Certificaciones</a> --}}
              {{-- <a href="imprimir">Alertas de Vencimiento</a> --}}
          </div>
      </div>
    @endif
    @if($nivel == 4)
      <div class="right-sidebar">
          <div class="sidebar-content">
              <h5 class="px-3 pt-3">Registros de embarcaciones</h5>
              <a href="{{ url('/admin/propietario') }}">Propietarios</a>
              <a href="{{ url('/admin/artefactos') }}">Artefactos</a>
              <a href="{{ url('/admin/artefactos') }}">Listas de propietarios de embarcaciones</a>
          </div>
      </div>
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
                                  {{-- @dd($nivel); --}}
                                  @if($nivel!=4)
                      <form method="POST" action="{{ url('admin/listapropietarios' . '/' . $listapropietario->id) }}"
                          accept-charset="UTF-8" style="display:inline">
                          {{ method_field('DELETE') }}
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger btn-sm" title="Borrar ListaPropietario"
                              onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                  aria-hidden="true"></i> Borrar</button>
                      </form>
                      @endif
                      </form>
                      <br />
                      <br />

                      <div class="table-responsive">
                          <table class="table">
                              <tbody>

                                  <tr>
                                      <th> Nombre del Propietario </th>
                                        <td>Nombres: {{ $listapropietario->propietarios->nombre }}
                                        </td>
                                  </tr>
                                  <tr>
                                    <th>@if ($listapropietario->propietarios->tipo==0)
                                        Cédula de Identidad del 
                                    @else
                                        SEPREC del 
                                    @endif
                                    Propietario </th>
                                      <td>{{ $listapropietario->propietarios->identificador }}
                                      </td>
                                </tr>
                                  <tr>
                                      <th> Nombre del Artefacto </th>
                                      <td>{{ $listapropietario->artefactos->nombre }}</td>
                                  </tr>
                                  <tr>
                                    <th> Matrícula del Artefacto </th>
                                    <td>{{ $listapropietario->artefactos->matricula }}</td>
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
                                              <input type="text" id="correlativo" name="correlativo" pattern="[0-9]*"
                                                  inputmode="number" required
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

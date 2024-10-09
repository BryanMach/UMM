  @extends('layouts.app')

  @if ($nivel == 2)
      <div class="right-sidebar">
          <div class="sidebar-header text-center p-3">
              <h4>REGISTRO DE PERSONAL </h4>
          </div>
          <div class="sidebar-content">
              <a href="{{ url('/admin/personal') }}">PERSONAL</a>
              <a href="{{ url('/admin/usuarios') }}">USUARIOS</a>
              <a href="{{ url('/admin/cuenca') }}">CUENCAS</a>
              <a href="{{ url('/admin/bases-operativas') }}">BASES DE OPERACIONES</a>
              <h5 class="px-3 pt-3">REGISTRO DE EMBARCACIONES</h5>
              <a href="{{ url('/admin/propietario') }}">PROPIETARIOS</a>
              <a href="{{ url('/admin/artefactos') }}">ARTEFACTOS NAVALES</a>
              <a href="{{ url('/admin/lista-propietarios') }}">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
              {{-- <a href="{{ url('/admin/') }}imprimir">Certificaciones</a> --}}
              {{-- <a href="{{ url('/admin/') }}imprimir">Alertas de Vencimiento</a> --}}
          </div>
      </div>
  @endif
  @if ($nivel == 3)
      <div class="right-sidebar">
          <div class="sidebar-content">
              <h5 class="px-3 pt-3">REGISTROS DE EMBARCACIONES</h5>
              <a href="{{ url('/admin/propietario') }}">PROPIETARIOS</a>
              <a href="{{ url('/admin/artefactos') }}">ARTEFACTOS NAVALES</a>
              <a href="{{ url('/admin/lista-propietarios') }}">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
              {{-- <a href="{{ url('/admin/') }}imprimir">Certificaciones</a> --}}
              {{-- <a href="{{ url('/admin/') }}imprimir">Alertas de Vencimiento</a> --}}
          </div>
      </div>
  @endif
  @if ($nivel == 4)
      <div class="right-sidebar">
          <div class="sidebar-content">
              <h5 class="px-3 pt-3">REGISTROS DE EMBARCACIONES</h5>
              <a href="{{ url('/admin/propietario') }}">PROPIETARIOS</a>
              <a href="{{ url('/admin/artefactos') }}">ARTEFACTOS NAVALES</a>
              <a href="{{ url('/admin/lista-propietarios') }}">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
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

                          @switch($nivel)
                              @case(3)
                                  <a href="{{ url('/admin/perf45i') }}" title="Back"><button class="btn btn-warning btn-sm">
                                          <i class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                              @break

                              @case(2)
                                  <a href="{{ url('/admin/perf45j') }}" title="Back"><button class="btn btn-warning btn-sm">
                                          <i class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                              @break

                              @case(4)
                                  <a href="{{ url('/admin/perf45r') }}" title="Back"><button class="btn btn-warning btn-sm">
                                          <i class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                              @break

                              @default
                          @endswitch
                          <a href="{{ url('/admin/lista-propietarios/' . $listapropietario->id . '/edit') }}"
                              title="Editar ListaPropietario"><button class="btn btn-primary btn-sm"><i
                                      class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR</button></a>
                          {{-- @dd($nivel); --}}
                          @if ($nivel != 4)
                              <form method="POST"
                                  action="{{ url('admin/listapropietarios' . '/' . $listapropietario->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                  {{ method_field('DELETE') }}
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-danger btn-sm" title="BORRAR ListaPropietario"
                                      onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                          aria-hidden="true"></i> BORRAR</button>
                              </form>
                          @endif
                          </form>
                          <br />
                          <br />

                          <div class="table-responsive">
                              <table class="table">
                                  <tbody>

                                      <tr>
                                          <th> NOMBRE DEL PROPIETARIO</th>
                                          <td>{{ $listapropietario->propietarios->nombre }}
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>{{ $listapropietario->propietarios->identificador }}
                                          </td>
                                      </tr>
                                      <tr>
                                          <th> NOMBRE DEL ARTEFACTO NAVAL</th>
                                          <td>{{ $listapropietario->artefactos->nombre }}</td>
                                      </tr>
                                      <tr>
                                          <th> MATRÍCULA DEL ARTEFACTO NAVAL</th>
                                          <td>{{ $listapropietario->artefactos->matricula }}</td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <form method="POST"
                                                  action="{{ url('admin/imprimir-certificado-registro') }}"
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
                                                  <input type="text" oninput="this.value = this.value.toUpperCase()"
                                                      id="correlativo" name="correlativo" pattern="[0-9]*"
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
                                                  <input type="text" oninput="this.value = this.value.toUpperCase()"
                                                      id="correlativo" name="correlativo" pattern="[0-9]*"
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
                                              <input type="text" oninput="this.value = this.value.toUpperCase()"
                                                  id="correlativo" name="correlativo" pattern="[0-9]*"
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
                                              <input type="text" oninput="this.value = this.value.toUpperCase()"
                                                  id="correlativo" name="correlativo" pattern="[0-9]*"
                                                  inputmode="number" required
                                                  oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                              <input class="btn btn-primary" type="submit"
                                                  value="Emitir certificado de arqueo">
                                          </form>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <form method="POST"
                                              action="{{ url('admin/imprimir-certificado-medio-ambiente') }}"
                                              accept-charset="UTF-8" class="form-horizontal"
                                              enctype="multipart/form-data">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="id" value="{{ $listapropietario->id }}">
                                              <input type="hidden" name="idPropietario"
                                                  value="{{ $listapropietario->idPropietario }}">
                                              <input type="hidden" name="idArtefacto"
                                                  value="{{ $listapropietario->idArtefacto }}">
                                              <label for="correlativo">Ingrese el número correlativo de la hoja en la que
                                                  imprimirá este certificado de medio ambiente:</label>
                                              <input type="text" oninput="this.value = this.value.toUpperCase()"
                                                  id="correlativo" name="correlativo" pattern="[0-9]*"
                                                  inputmode="number" required
                                                  oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                              <input class="btn btn-primary" type="submit"
                                                  value="Emitir certificado de medio ambiente">
                                          </form>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <form method="POST"
                                              action="{{ url('admin/imprimir-certificado-dotacion-minima') }}"
                                              accept-charset="UTF-8" class="form-horizontal"
                                              enctype="multipart/form-data">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="id" value="{{ $listapropietario->id }}">
                                              <input type="hidden" name="idPropietario"
                                                  value="{{ $listapropietario->idPropietario }}">
                                              <input type="hidden" name="idArtefacto"
                                                  value="{{ $listapropietario->idArtefacto }}">
                                              <label for="correlativo">Ingrese el número correlativo de la hoja en la que
                                                  imprimirá este certificado de dotacion minima:</label>
                                              <input type="text" oninput="this.value = this.value.toUpperCase()"
                                                  id="correlativo" name="correlativo" pattern="[0-9]*"
                                                  inputmode="number" required
                                                  oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                              <input class="btn btn-primary" type="submit"
                                                  value="Emitir certificado de dotacion minima">
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
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          const sidebarLinks = document.querySelectorAll('.sidebar-content a');

          sidebarLinks.forEach(link => {
              link.addEventListener('click', function(e) {
                  // Remover la clase 'active' de todos los enlaces
                  sidebarLinks.forEach(l => l.classList.remove('active'));

                  // Añadir la clase 'active' al enlace clickeado
                  this.classList.add('active');

                  // Si quieres mantener la opción activa después de recargar la página,
                  // puedes guardar la URL en localStorage
                  localStorage.setItem('activeLink', this.getAttribute('href'));
              });
          });

          // Verificar si hay una opción activa guardada y aplicarla
          const activeLink = localStorage.getItem('activeLink');
          if (activeLink) {
              const link = document.querySelector(`.sidebar-content a[href="${activeLink}"]`);
              if (link) {
                  link.classList.add('active');
              }
          }
      });
  </script>

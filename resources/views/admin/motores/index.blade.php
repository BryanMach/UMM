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
                      <div class="card-header">MOTORES</div>
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
                                  <a href="{{ url('/admin/perf45r') }}" title="Retornar"><button class="btn btn-warning btn-sm">
                                          <i class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                              @break

                              @default
                          @endswitch
                          <a href="{{ url('/admin/motores/create') }}" class="btn btn-success btn-sm"
                              title="Agregar nuevo Motore">
                              <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR
                          </a>

                          <form method="GET" action="{{ url('/admin/motores') }}" accept-charset="UTF-8"
                              class="form-inline my-2 my-lg-0 float-right" role="search">
                              <div class="input-group">
                                  <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control"
                                      name="search" placeholder="BUSCAR..." value="{{ request('search') }}">
                                  <span class="input-group-append">
                                      <button class="btn btn-secondary" type="submit">
                                          <i class="fa fa-search"></i>
                                      </button>
                                  </span>
                              </div>
                          </form>

                          <br />
                          <br />
                          <div class="table-responsive">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th>Nº</th>
                                          <th>ARTEFACTOS NAVALES</th>
                                          <th>TIPO</th>
                                          <th>MARCA</th>
                                          <th>OPCIONES</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($motores as $item)
                                          <tr>
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $item->artefactos->matricula }}</td>
                                              <td>{{ $item->tipo }}</td>
                                              <td>{{ $item->marca }}</td>
                                              <td>
                                                  <a href="{{ url('/admin/motores/' . $item->id) }}"
                                                      title="Ver Motore"><button class="btn btn-info btn-sm"><i
                                                              class="fa fa-eye" aria-hidden="true"></i> VER</button></a>
                                                  <a href="{{ url('/admin/motores/' . $item->id . '/edit') }}"
                                                      title="Editar Motore"><button class="btn btn-primary btn-sm"><i
                                                              class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                          Editar</button></a>

                                                  <form method="POST"
                                                      action="{{ url('/admin/motores' . '/' . $item->id) }}"
                                                      accept-charset="UTF-8" style="display:inline">
                                                      {{ method_field('DELETE') }}
                                                      {{ csrf_field() }}
                                                      <button type="submit" class="btn btn-danger btn-sm"
                                                          title="BORRAR Motore"
                                                          onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                              class="fa fa-trash-o" aria-hidden="true"></i> BORRAR</button>
                                                  </form>
                                              </td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                              <div class="pagination-wrapper"> {!! $motores->appends(['search' => Request::get('search')])->render() !!} </div>
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

  @extends('layouts.app')
  <style>
      .search-icon {
          cursor: pointer;
          margin-left: 5px;
          font-size: 14px;
      }

      .search-input {
          margin-top: 5px;
          width: 100%;
          padding: 5px;
          font-size: 12px;
          border: 1px solid #ccc;
          border-radius: 3px;
      }
  </style>
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
                      <div class="card-header">ARTEFACTOS NAVALES</div>
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
                          <a href="{{ url('/admin/artefactos/create') }}" class="btn btn-success btn-sm"
                              title="Agregar nuevo Artefacto">
                              <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR
                          </a>
                          <form method="GET" action="{{ url('/admin/artefactos') }}" accept-charset="UTF-8"
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
                              <table class="table" width="100%">
                                  <thead>
                                      <tr>
                                          <th>
                                              Nº
                                          </th>
                                          <th>
                                              USUARIO
                                              <i class="fa fa-search" onclick="toggleSearchInput('search-usuario')"></i>
                                          </th>
                                          <th>
                                              BASE DE OPERACIONES
                                              <i class="fa fa-search" onclick="toggleSearchInput('search-base')"></i>
                                          </th>
                                          <th>
                                              NOMBRE DE EMBARCACIÓN
                                              <i class="fa fa-search" onclick="toggleSearchInput('search-nombre')"></i>
                                          </th>
                                          <th>
                                              NÚMERO DE REGISTRO
                                              <i class="fa fa-search" onclick="toggleSearchInput('search-registro')"></i>
                                          </th>
                                          <th>OPCIONES</th>
                                      </tr>
                                      <!-- Fila de Inputs de Búsqueda -->
                                      <tr id="search-row" style="display: none;">
                                          <td>
                                          </td>
                                          <td>
                                              <form method="GET" action="{{ url('/admin/artefactos') }}">
                                                  <input type="text" name="search-usuario" class="form-control"
                                                      placeholder="Buscar Usuario">
                                              </form>
                                          </td>
                                          <td>
                                              <form method="GET" action="{{ url('/admin/artefactos') }}">
                                                  <input type="text" name="search-base" class="form-control"
                                                      placeholder="Buscar Base">
                                              </form>
                                          </td>
                                          <td>
                                              <form method="GET" action="{{ url('/admin/artefactos') }}">
                                                  <input type="text" name="search-nombre" class="form-control"
                                                      placeholder="Buscar Nombre">
                                              </form>
                                          </td>
                                          <td>
                                              <form method="GET" action="{{ url('/admin/artefactos') }}">
                                                  <input type="text" name="search-registro" class="form-control"
                                                      placeholder="Buscar Registro">
                                              </form>
                                          </td>
                                          <td></td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($artefactos as $item)
                                          @php
                                              $rowClass = ''; // Variable para definir la clase CSS de la fila
                                              $certificadoVencido = false;

                                              foreach ($item->certificado as $certificado) {
                                                  // Verifica que el certificado tiene tipoC y calcula los días
                                                  if ($certificado->tipoC == 1 && $certificado->fechaVencimiento) {
                                                      $diasDiferencia = \Carbon\Carbon::now()->diffInDays(
                                                          \Carbon\Carbon::parse($certificado->fechaVencimiento),
                                                          false,
                                                      );

                                                      if ($diasDiferencia < 15) {
                                                          $rowClass = 'table-danger'; // Clase de Bootstrap para fondo rojo
                                                          $certificadoVencido = true;
                                                          break;
                                                      } elseif ($diasDiferencia < 30) {
                                                          $rowClass = 'table-warning'; // Clase de Bootstrap para fondo amarillo
                                                          $certificadoVencido = true;
                                                      }
                                                  }
                                              }
                                          @endphp
                                          <tr class="{{ $rowClass }}">
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $item->usuarios->usuario }}</td>
                                              <td>{{ $item->baseoperativa->baseOperativa }}</td>
                                              <td>{{ $item->nombre }}</td>
                                              <td>
                                                  @foreach ($item->certificado as $certificado)
                                                      @if ($certificado->tipoC == 1)
                                                          @switch((int) $item->baseoperativa->cuenca->id)
                                                              @case(1)
                                                                  L-{{ $certificado->nreg }}
                                                              @break

                                                              @case(2)
                                                                  P-{{ $certificado->nreg }}
                                                              @break

                                                              @case(3)
                                                                  A-{{ $certificado->nreg }}
                                                              @break

                                                              @default
                                                                  No Registrado
                                                          @endswitch
                                                      @break
                                                  @endif
                                              @endforeach
                                          </td>
                                          <td>
                                              <a href="{{ url('/admin/artefactos/' . $item->id) }}"
                                                  title="Ver Artefacto">
                                                  <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                          aria-hidden="true"></i> VER</button>
                                              </a>
                                              <a href="{{ url('/admin/artefactos/' . $item->id . '/edit') }}"
                                                  title="Editar Artefacto">
                                                  <button class="btn btn-primary btn-sm"><i
                                                          class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                      EDITAR</button>
                                              </a>
                                              <form method="POST"
                                                  action="{{ url('/admin/artefactos' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                  {{ method_field('DELETE') }}
                                                  {{ csrf_field() }}
                                                  <button type="submit" class="btn btn-danger btn-sm"
                                                      title="BORRAR Artefacto"
                                                      onclick="return confirm('Confirm delete?')">
                                                      <i class="fa fa-trash-o" aria-hidden="true"></i> BORRAR
                                                  </button>
                                              </form>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                          <div class="pagination-wrapper"> {!! $artefactos->appends(['search' => Request::get('search')])->render() !!} </div>
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
<script>
    // Función para mostrar/ocultar el input de búsqueda correspondiente
    function toggleSearchInput(inputId) {
        const row = document.getElementById('search-row');
        const input = document.getElementById(inputId);

        // Muestra la fila si está oculta
        row.style.display = row.style.display === 'none' ? '' : 'none';

        // Enfoca el input correspondiente
        if (input) {
            input.focus();
        }
    }
</script>

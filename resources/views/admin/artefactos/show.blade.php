  @extends('layouts.app')
  <style>
      body {
          font-family: Arial, sans-serif;
          background-color: #f8f9fa;
      }

      .right-sidebar {
          width: 250px;
          height: 100vh;
          background-color: #fff;
          border-left: 1px solid #e0e0e0;
          position: fixed;
          top: 0;
          right: 0;
          overflow-y: auto;
          box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
      }

      .sidebar-header,
      .sidebar-content h5 {
          background-color: #99bcfad5;
          color: #333;
          padding: 0.75rem 1rem;
          margin: 0;
          font-size: 1rem;
          font-weight: 600;
          text-transform: uppercase;
          border-bottom: 1px solid #e0e0e0;
      }

      .sidebar-content {
          padding: 0;
      }

      .sidebar-content a {
          color: #333;
          display: block;
          padding: 0.75rem 1.5rem;
          text-decoration: none;
          transition: all 0.3s ease;
          border-left: 4px solid transparent;
      }

      .sidebar-content a:hover,
      .sidebar-content a.active {
          background-color: #f8f9fa;
          border-left-color: #3498db;
      }

      .sidebar-content a.active {
          font-weight: 600;
          background-color: #e9ecef;
          color: #2c3e50;
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
                      <div class="card-header">Artefacto</div>
                      <div class="card-body">

                          <a href="{{ url('/admin/artefactos') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                      class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                          <a href="{{ url('/admin/artefactos/' . $artefacto->id . '/edit') }}"
                              title="Editar Artefacto"><button class="btn btn-primary btn-sm"><i
                                      class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                          @if ($nivel != 4)
                              <form method="POST" action="{{ url('admin/artefactos' . '/' . $artefacto->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                  {{ method_field('DELETE') }}
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-danger btn-sm" title="BORRAR Artefacto"
                                      onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                          aria-hidden="true"></i> BORRAR</button>
                              </form>
                          @endif
                          <br />
                          <br />

                          <div class="table-responsive">
                              <table class="table">
                                  <tbody>

                                      <tr>
                                          <th> USUARIOS </th>
                                          <td> {{ $artefacto->usuarios->usuario }} </td>
                                      </tr>
                                      <tr>
                                          <th>BASE DE OPERACIONES</th>
                                          <td> {{ $artefacto->baseoperativa->baseOperativa }} </td>
                                      </tr>
                                      <tr>
                                          <th> MATRICULA </th>
                                          <td> {{ $artefacto->matricula }} </td>
                                      </tr>
                                      <tr>
                                          <th> NOMBRE </th>
                                          <td> {{ $artefacto->nombre }} </td>
                                      </tr>
                                      <tr>
                                          <th> TIPO </th>
                                          <td> {{ $artefacto->tipo->tipo }} </td>
                                      </tr>
                                      <tr>
                                          <th> MATERIAL </th>
                                          <td> {{ $artefacto->material->material }} </td>
                                      </tr>
                                      <tr>
                                          <th> ESLORA </th>
                                          <td> {{ $artefacto->eslora }} </td>
                                      </tr>
                                      <tr>
                                          <th> MANGA </th>
                                          <td> {{ $artefacto->manga }} </td>
                                      </tr>
                                      <tr>
                                          <th> PUNTAL </th>
                                          <td> {{ $artefacto->puntal }} </td>
                                      </tr>
                                      <tr>
                                          <th> FRANCOBORDO </th>
                                          <td> {{ $artefacto->francobordo }} </td>
                                      </tr>
                                      <tr>
                                          <th> PROPULSION </th>
                                          <td> {{ $artefacto->propulsion }} </td>
                                      </tr>
                                      <tr>
                                          <th> CONSTRUCCION </th>
                                          <td> {{ $artefacto->construccion }} </td>
                                      </tr>
                                      <tr>
                                          <th> TRN </th>
                                          <td> {{ $artefacto->trn }} </td>
                                      </tr>
                                      <tr>
                                          <th> TRB </th>
                                          <td> {{ $artefacto->trb }} </td>
                                      </tr>
                                      <tr>
                                          <th> SERVICIO </th>
                                          <td> {{ $artefacto->servicio->servicio }} </td>
                                      </tr>
                                      <tr>
                                          <th> ASOCIACION </th>
                                          <td> {{ $artefacto->asociacion }} </td>
                                      </tr>
                                      <tr>
                                          <th> OBSERVACIONES </th>
                                          <td> {{ $artefacto->observaciones }} </td>
                                      </tr>
                                      <tr>
                                          <th>Certificados:</th>
                                          <td>
                                              <ul>
                                                  @foreach ($artefacto->certificado as $certificado)
                                                      <li>

                                                          @switch($certificado->tipoC)
                                                              @case(1)
                                                                  CERTIFICADO DE REGISTRO:
                                                              @break

                                                              @case(2)
                                                                  CERTIFICADO DE SEGURIDAD:
                                                              @break

                                                              @case(3)
                                                                  CERTIFICADO DE FRANCOBORDO:
                                                              @break

                                                              @case(4)
                                                                  CERTIFICADO DE ARQUEO:
                                                              @break

                                                              @case(5)
                                                                  CERTIFICADO DE MEDIO AMBIENTE:
                                                              @break

                                                              @case(6)
                                                                  CERTIFICADO DE DOTACION MINIMA:
                                                              @break

                                                              @default
                                                          @endswitch
                                                          NÚMERO DE REGISTRO: {{ $certificado->nreg }},
                                                          NÚMERO DE CERTIFICADO: {{ $certificado->correlativo }},<br>
                                                          FECHA DE EMISIÓN: {{ $certificado->fechaEmision }},
                                                          FECHA DE VENCIMIENTO: {{ $certificado->fechaVencimiento }}
                                                      </li>
                                                  @endforeach
                                              </ul>
                                          </td>
                                      </tr>
                                      <tr>
                                          <th> Foto </th>
                                          <td> <img src="{{ asset('storage/uploads/') . $artefacto->fotoA }}"
                                                  onerror="this.src='{{ asset('images/barcodefecto.png') }}'"
                                                  class="profile-img">
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
      <div class="container">
          <div class="row">
              <div class="col-md-9">
                  <div class="card">
                      <h5>Lista de Propietarios:</h5>
                      @foreach ($artefacto->propietarios as $propietario)
                          <div class="card mb-3">
                              <div class="card-body">
                                  <h5 class="card-title">{{ $propietario->nombre }}</h5>
                                  <p class="card-text">Identificador: {{ $propietario->identificador }}</p>
                                  <p class="card-text">Fecha de Inicio: {{ $propietario->FechaIni }}</p>
                              </div>
                          </div>
                      @endforeach
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

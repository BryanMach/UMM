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
                      <div class="card-header">CERTIFICACION {{ $certificacione->id }}</div>
                      <div class="card-body">

                          <a href="{{ url('/admin/certificaciones') }}" title="Back"><button
                                  class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                  ATRAS</button></a>
                          <a href="{{ url('/admin/certificaciones/' . $certificacione->id . '/edit') }}"
                              title="Editar Certificacione"><button class="btn btn-primary btn-sm"><i
                                      class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR</button></a>

                          <form method="POST" action="{{ url('admin/certificaciones' . '/' . $certificacione->id) }}"
                              accept-charset="UTF-8" style="display:inline">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-danger btn-sm" title="BORRAR Certificacione"
                                  onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                      aria-hidden="true"></i> BORRAR</button>
                          </form>
                          <br />
                          <br />

                          <div class="table-responsive">
                              <table class="table">
                                  <tbody>

                                      <tr>
                                          <th> CUENCA </th>
                                          <td> {{ $certificacione->idCuenca }} </td>
                                      </tr>
                                      <tr>
                                          <th> NUMERO </th>
                                          <td> {{ $certificacione->numero }} </td>
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

  @extends('layouts.app')

  @if ($nivel == 2)
      <div class="right-sidebar">
          <div class="sidebar-header text-center p-3">
              <h4>REGISTRO DE PERSONAL </h4>
          </div>
          <div class="sidebar-content">
              <a href="personal">PERSONAL</a>
              <a href="usuarios">USUARIOS</a>
              <a href="bases-operativas">BASES DE OPERACIONES</a>
              <h5 class="px-3 pt-3">REGISTRO DE EMBARCACIONES</h5>
              <a href="propietario">PROPIETARIOS</a>
              <a href="artefactos">ARTEFACTOS NAVALES</a>
              <a href="lista-propietarios">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
              {{-- <a href="imprimir">Certificaciones</a> --}}
              {{-- <a href="imprimir">Alertas de Vencimiento</a> --}}
          </div>
      </div>
  @endif
  @if ($nivel == 3)
      <div class="right-sidebar">
          <div class="sidebar-content">
              <h5 class="px-3 pt-3">REGISTROS DE EMBARCACIONES</h5>
              <a href="propietario">PROPIETARIOS</a>
              <a href="artefactos">ARTEFACTOS NAVALES</a>
              <a href="lista-propietarios">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
              {{-- <a href="imprimir">Certificaciones</a> --}}
              {{-- <a href="imprimir">Alertas de Vencimiento</a> --}}
          </div>
      </div>
  @endif
  @if ($nivel == 4)
      <div class="right-sidebar">
          <div class="sidebar-content">
              <h5 class="px-3 pt-3">REGISTROS DE EMBARCACIONES</h5>
              <a href="propietario">PROPIETARIOS</a>
              <a href="artefactos">ARTEFACTOS NAVALES</a>
              <a href="lista-propietarios">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
          </div>
      </div>
  @endif
  @section('content')
      <div class="container">
          <div class="row">
              <div class="col-md-9">
                  <div class="card">
                      <div class="card-header">Crear nueva Inspeccion</div>
                      <div class="card-body">
                          <a href="{{ url('/admin/inspecciones') }}" title="Back"><button
                                  class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                  VOLVER</button></a>
                          <br />
                          <br />

                          @if ($errors->any())
                              <ul class="alert alert-danger">
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          @endif

                          <form method="POST" action="{{ url('/admin/inspecciones') }}" accept-charset="UTF-8"
                              class="form-horizontal" enctype="multipart/form-data">
                              {{ csrf_field() }}

                              @include ('admin.inspecciones.form', ['formMode' => 'create'])

                          </form>

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

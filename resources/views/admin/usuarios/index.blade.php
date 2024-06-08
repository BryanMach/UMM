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
              <h4>REGISTRO DE PERSONAL </h4>
          </div>
          <div class="sidebar-content">
              <a href="personal">PERSONAL</a>
              <a href="usuarios">USUARIOS</a>
              <a href="bases-operativas" class="active">BASES DE OPERACIONES</a>
              <h5 class="px-3 pt-3">REGISTRO DE EMBARCACIONES</h5>
              <a href="propietario">PROPIETARIOS</a>
              <a href="artefactos">ARTEFACTOS</a>
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
              <a href="artefactos">ARTEFACTOS</a>
              <a href="lista-propietarios">LISTAS DE PROPIETARIOS DE EMBARCAIONES</a>
              {{-- <a href="imprimir">Certificaciones</a> --}}
              {{-- <a href="imprimir">Alertas de Vencimiento</a> --}}
          </div>
      </div>
    @endif
    @if($nivel == 4)
      <div class="right-sidebar">
          <div class="sidebar-content">
              <h5 class="px-3 pt-3">REGISTROS DE EMBARCACIONES</h5>
              <a href="propietario">PROPIETARIOS</a>
              <a href="artefactos">ARTEFACTOS</a>
              <a href="lista-propietarios">LISTAS DE PROPIETARIOS DE EMBARCAIONES</a>
          </div>
      </div>
  @endif
 @section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-9">
              <div class="card">
                  <div class="card-header">USUARIOS</div>
                  <div class="card-body">
                        @switch($nivel)
                          @case(3)
                              <a href="{{ url('/admin/perf45i') }}" title="Back"><button class="btn btn-warning btn-sm">
                                      <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                          @break

                          @case(2)
                              <a href="{{ url('/admin/perf45j') }}" title="Back"><button class="btn btn-warning btn-sm">
                                      <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                          @break

                          @case(4)
                              <a href="{{ url('/admin/perf45r') }}" title="Retornar"><button class="btn btn-warning btn-sm">
                                      <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                          @break

                          @default
                      @endswitch
                      <a href="{{ url('/admin/usuarios/create') }}" class="btn btn-success btn-sm"
                          title="Agregar nuevo Usuario">
                          <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                      </a>

                      <form method="GET" action="{{ url('/admin/usuarios') }}" accept-charset="UTF-8"
                          class="form-inline my-2 my-lg-0 float-right" role="search">
                          <div class="input-group">
                              <input type="text" class="form-control" name="search" placeholder="Buscar..."
                                  value="{{ request('search') }}">
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
                                      <th>PERSONAL</th>
                                      <th>USUARIO</th>
                                      <th>CONTRASEÑA</th>
                                      <th>OPCIONES</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($usuarios as $item)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $item->personals->cargo }}:
                                              {{ $item->personals->grado }}.
                                              {{ $item->personals->nombres }}
                                              {{ $item->personals->apellidos }}</td>
                                              @php
                                                  $n='';
                                              @endphp
                                              @switch($item->nivel)
                                                  @case(2)
                                                  @php
                                                  $n='Jefe';
                                              @endphp
                                                      @break
                                                  @case(3)
                                                  @php
                                                  $n='Archivo interno';
                                              @endphp
                                                      @break
                                                @case(4)
                                                @php
                                                $n='Archivo externo';
                                            @endphp
                                                      @break
                                                  @default
                                                      
                                              @endswitch
                                              
                                          <td>{{ $item->usuario }}</td>
                                          <td>{{ $n }}</td>
                                          <td>{{ $item->contrasena }}</td>
                                          <td>
                                              <a href="{{ url('/admin/usuarios/' . $item->id) }}"
                                                  title="Ver Usuario"><button class="btn btn-info btn-sm"><i
                                                          class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                              <a href="{{ url('/admin/usuarios/' . $item->id . '/edit') }}"
                                                  title="Editar Usuario"><button class="btn btn-primary btn-sm"><i
                                                          class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                      Editar</button></a>

                                              <form method="POST"
                                                  action="{{ url('/admin/usuarios' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                  {{ method_field('DELETE') }}
                                                  {{ csrf_field() }}
                                                  <button type="submit" class="btn btn-danger btn-sm"
                                                      title="Borrar Usuario"
                                                      onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                          class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                              </form>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                          <div class="pagination-wrapper"> {!! $usuarios->appends(['search' => Request::get('search')])->render() !!} </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

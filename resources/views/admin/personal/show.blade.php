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
@if($nivel == 2)
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
@endif
@if($nivel == 3)
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
@else
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
        </div>
    </div>
@endif
  @section('content')
      <div class="container">
          <div class="row">
              <div class="col-md-9">
                  <div class="card">
                      <div class="card-header">Personal {{ $personal->id }}</div>
                      <div class="card-body">

                          <a href="{{ url('/admin/personal') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                      class="fa fa-arrow-left" aria-hidden="true"></i> Retroceder</button></a>
                          <a href="{{ url('/admin/personal/' . $personal->id . '/edit') }}" title="Editar Personal"><button
                                  class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                  Editar</button></a>

                          <form method="POST" action="{{ url('admin/personal' . '/' . $personal->id) }}"
                              accept-charset="UTF-8" style="display:inline">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-danger btn-sm" title="Borrar Personal"
                                  onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                      aria-hidden="true"></i> Borrar</button>
                          </form>
                          <br />
                          <br />

                          <div class="table-responsive">
                              <table class="table">
                                  <tbody>
                                      <tr>
                                          <th>ID</th>
                                          <td>{{ $personal->id }}</td>
                                      </tr>
                                      <tr>
                                          <th> Ci </th>
                                          <td> {{ $personal->ci }} </td>
                                      </tr>
                                      <tr>
                                          <th> Cargo </th>
                                          <td> {{ $personal->cargo }} </td>
                                      </tr>
                                      <tr>
                                          <th> Grado </th>
                                          <td> {{ $personal->grado }} </td>
                                      </tr>
                                      <tr>
                                          <th> Nombre </th>
                                          <td> {{ $personal->nombres }} </td>
                                      </tr>
                                      <tr>
                                          <th> Apellido </th>
                                          <td> {{ $personal->apellidos }} </td>
                                      </tr>
                                      <tr>
                                          <th> Contacto </th>
                                          <td> {{ $personal->contacto }} </td>
                                      </tr>
                                      <tr>
                                          <th> Foto </th>
                                          <td> <img src="{{ asset('storage') . '/' . $personal->foto }}" alt="">
                                          </td>
                                      </tr>
                                      <tr>
                                          <th> Descripcion </th>
                                          <td> {{ $personal->descripcion }} </td>
                                      </tr>
                                      <tr>
                                          <th> Vigencia </th>
                                          <td> {{ $personal->vigencia }} </td>
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

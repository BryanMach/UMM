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
  @if ($nivel == 3)
      <div class="right-sidebar">
          <div class="sidebar-content">
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
          <div class="sidebar-content">
              <h5 class="px-3 pt-3">Registros de embarcaciones</h5>
              <a href="propietario">Propietarios</a>
              <a href="artefactos">Artefactos</a>
              <a href="lista-propietarios">Listas de propietarios de embarcaciones</a>
          </div>
      </div>
  @endif @section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-9">
              <div class="card">
                  <div class="card-header">Artefacto {{ $artefacto->id }}</div>
                  <div class="card-body">

                      <a href="{{ url('/admin/artefactos') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                  class="fa fa-arrow-left" aria-hidden="true"></i> Retroceder</button></a>
                      <a href="{{ url('/admin/artefactos/' . $artefacto->id . '/edit') }}"
                          title="Editar Artefacto"><button class="btn btn-primary btn-sm"><i
                                  class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                      <form method="POST" action="{{ url('admin/artefactos' . '/' . $artefacto->id) }}"
                          accept-charset="UTF-8" style="display:inline">
                          {{ method_field('DELETE') }}
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger btn-sm" title="Borrar Artefacto"
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
                                      <td>{{ $artefacto->id }}</td>
                                  </tr>
                                  <tr>
                                      <th> Usuarios </th>
                                      <td> {{ $artefacto->usuarios->usuario }} </td>
                                  </tr>
                                  <tr>
                                      <th> Base operativa </th>
                                      <td> {{ $artefacto->baseoperativa->baseOperativa }} </td>
                                  </tr>
                                  <tr>
                                      <th> Matricula </th>
                                      <td> {{ $artefacto->matricula }} </td>
                                  </tr>
                                  <tr>
                                      <th> Nombre </th>
                                      <td> {{ $artefacto->nombre }} </td>
                                  </tr>
                                  <tr>
                                      <th> Tipo </th>
                                      <td> {{ $artefacto->tipo->tipo }} </td>
                                  </tr>
                                  <tr>
                                      <th> Material </th>
                                      <td> {{ $artefacto->material->material }} </td>
                                  </tr>
                                  <tr>
                                      <th> Eslora </th>
                                      <td> {{ $artefacto->eslora }} </td>
                                  </tr>
                                  <tr>
                                      <th> Manga </th>
                                      <td> {{ $artefacto->manga }} </td>
                                  </tr>
                                  <tr>
                                      <th> Puntal </th>
                                      <td> {{ $artefacto->puntal }} </td>
                                  </tr>
                                  <tr>
                                      <th> Francobordo </th>
                                      <td> {{ $artefacto->francobordo }} </td>
                                  </tr>
                                  <tr>
                                      <th> Propulsion </th>
                                      <td> {{ $artefacto->propulsion }} </td>
                                  </tr>
                                  <tr>
                                      <th> Construccion </th>
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
                                      <th> Servicio </th>
                                      <td> {{ $artefacto->servicio }} </td>
                                  </tr>
                                  <tr>
                                      <th> Asociacion </th>
                                      <td> {{ $artefacto->asociacion }} </td>
                                  </tr>
                                  <tr>
                                      <th> Observaciones </th>
                                      <td> {{ $artefacto->observaciones }} </td>
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

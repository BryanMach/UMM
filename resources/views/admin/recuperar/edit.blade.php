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
              <h4>REGISTROS DEL PERSONAL </h4>
          </div>
          <div class="sidebar-content">
              <a href="personal">PERSONAL</a>
              <a href="usuarios">USUARIOS</a>
              <a href="bases-operativas" class="active">BASES DE OPERACIONES</a>
              <h5 class="px-3 pt-3">REGISTROS DE EMBARCACIONES</h5>
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
  @else
      <div class="right-sidebar">
          <div class="sidebar-content">
              <h5 class="px-3 pt-3">REGISTROS DE EMBARCACIONES</h5>
              <a href="propietario">PROPIETARIOS</a>
              <a href="artefactos">ARTEFACTOS NAVALES</a>
              <a href="lista-propietarios">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
          </div>
      </div>
  @endif@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-9">
              <div class="card">
                  <div class="card-header">Editar Recuperar{{ $recuperar->id }}</div>
                  <div class="card-body">
                      <a href="{{ url('/admin/recuperar') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                  class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                      <br />
                      <br />
                      @if ($errors->any())
                          <ul class="alert alert-danger">
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      @endif
                      <form method="POST" action="{{ url('/admin/recuperar/' . $recuperar->id) }}"
                          accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                          {{ method_field('PATCH') }}
                          {{ csrf_field() }}
                          @include ('admin.recuperar.form', ['formMode' => 'edit'])
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

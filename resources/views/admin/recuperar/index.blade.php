  @extends('layouts.app')

  @if ($nivel == 2)
      <div class="right-sidebar">
          <div class="sidebar-header text-center p-3">
              <h4>REGISTROS DEL PERSONAL </h4>
          </div>
          <div class="sidebar-content">
              <a href="personal">PERSONAL</a>
              <a href="usuarios">USUARIOS</a>
              <a href="bases-operativas">BASES DE OPERACIONES</a>
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
          <div class="sidebar-header text-center p-3">
              <h4>REGISTROS DEL PERSONAL </h4>
          </div>
          <div class="sidebar-content">
              <a href="personal">PERSONAL</a>
              <a href="usuarios">USUARIOS</a>
              <a href="bases-operativas">BASES DE OPERACIONES</a>
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
          <div class="sidebar-header text-center p-3">
              <h4>REGISTROS DEL PERSONAL </h4>
          </div>
          <div class="sidebar-content">
              <a href="personal">PERSONAL</a>
              <a href="usuarios">USUARIOS</a>
              <a href="bases-operativas">BASES DE OPERACIONES</a>
              <h5 class="px-3 pt-3">REGISTROS DE EMBARCACIONES</h5>
              <a href="propietario">PROPIETARIOS</a>
              <a href="artefactos">ARTEFACTOS NAVALES</a>
              <a href="lista-propietarios">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
              {{-- <a href="imprimir">Certificaciones</a> --}}
          </div>
      </div>
  @endif @section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-9">
              <div class="card">
                  <div class="card-header">RECUPERAR</div>
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
                      <a href="{{ url('/admin/recuperar/create') }}" class="btn btn-success btn-sm"
                          title="Agregar nuevo Recuperar">
                          <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR
                      </a>

                      <form method="GET" action="{{ url('/admin/recuperar') }}" accept-charset="UTF-8"
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
                                      <th>USUARIOS</th>
                                      <th>TABLA</th>
                                      <th>POSICION</th>
                                      <th>OPCIONES</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($recuperar as $item)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $item->idUsuario }}</td>
                                          <td>{{ $item->tabla }}</td>
                                          <td>{{ $item->posicion }}</td>
                                          <td>
                                              <a href="{{ url('/admin/recuperar/' . $item->id) }}"
                                                  title="Ver Recuperar"><button class="btn btn-info btn-sm"><i
                                                          class="fa fa-eye" aria-hidden="true"></i> VER</button></a>
                                              <a href="{{ url('/admin/recuperar/' . $item->id . '/edit') }}"
                                                  title="Editar Recuperar"><button class="btn btn-primary btn-sm"><i
                                                          class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                      Editar</button></a>

                                              <form method="POST"
                                                  action="{{ url('/admin/recuperar' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                  {{ method_field('DELETE') }}
                                                  {{ csrf_field() }}
                                                  <button type="submit" class="btn btn-danger btn-sm"
                                                      title="BORRAR Recuperar"
                                                      onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                          class="fa fa-trash-o" aria-hidden="true"></i> BORRAR</button>
                                              </form>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                          <div class="pagination-wrapper"> {!! $recuperar->appends(['search' => Request::get('search')])->render() !!} </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

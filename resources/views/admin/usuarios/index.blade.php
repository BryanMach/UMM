 @extends('layouts.app')
 @if (Auth::user()->id != 1)
     <div class="right-sidebar">
         <div class="sidebar-header text-center p-3">
             <h4>Registros de personal</h4>
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
             <a href="dashboard">Modo Administrador</a>
         </div>
     </div>
 @else
     <div class="right-sidebar">
         <div class="sidebar-header text-center p-3">
             <h4>Registros de personal</h4>
         </div>
         <div class="sidebar-content">
             <a href="bases-operativas" class="active">Bases de operaciones</a>
             <h5 class="px-3 pt-3">Registros de embarcaciones</h5>
             <a href="propietario">Propietarios</a>
             <a href="artefactos">Artefactos</a>
             <a href="lista-propietarios">Listas de propietarios de embarcaciones</a>
             <a href="imprimir">Certificaciones</a>
             <a href="imprimir">Alertas de Vencimiento</a>
             <a href="dashboard">Modo Administrador</a>
         </div>
     </div>
 @endif

 @section('content')
     <div class="container">
         <div class="row">
             <div class="col-md-9">
                 <div class="card">
                     <div class="card-header">Usuarios</div>
                     <div class="card-body">
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
                                         <th>Personal</th>
                                         <th>Usuario</th>
                                         <th>Contraseña</th>
                                         <th>Opciones</th>
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
                                             <td>{{ $item->usuario }}</td>
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

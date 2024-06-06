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
             @include('admin.sidebar')

             <div class="col-md-9">
                 <div class="card">
                     <div class="card-header">Ubicacion</div>
                     <div class="card-body">
                         <a href="{{ url('/admin/ubicacion/create') }}" class="btn btn-success btn-sm"
                             title="Add New ubicacion">
                             <i class="fa fa-plus" aria-hidden="true"></i> Add New
                         </a>

                         <form method="GET" action="{{ url('/admin/ubicacion') }}" accept-charset="UTF-8"
                             class="form-inline my-2 my-lg-0 float-right" role="search">
                             <div class="input-group">
                                 <input type="text" class="form-control" name="search" placeholder="Search..."
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
                                         <th>#</th>
                                         <th>IdUsuario</th>
                                         <th>IdCuenca</th>
                                         <th>IdBaseOperativa</th>
                                         <th>Actions</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($ubicacion as $item)
                                         <tr>
                                             <td>{{ $loop->iteration }}</td>
                                             <td>{{ $item->idUsuario }}</td>
                                             <td>{{ $item->idCuenca }}</td>
                                             <td>{{ $item->idBaseOperativa }}</td>
                                             <td>
                                                 <a href="{{ url('/admin/ubicacion/' . $item->id) }}"
                                                     title="View ubicacion"><button class="btn btn-info btn-sm"><i
                                                             class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                 <a href="{{ url('/admin/ubicacion/' . $item->id . '/edit') }}"
                                                     title="Edit ubicacion"><button class="btn btn-primary btn-sm"><i
                                                             class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                         Edit</button></a>

                                                 <form method="POST"
                                                     action="{{ url('/admin/ubicacion' . '/' . $item->id) }}"
                                                     accept-charset="UTF-8" style="display:inline">
                                                     {{ method_field('DELETE') }}
                                                     {{ csrf_field() }}
                                                     <button type="submit" class="btn btn-danger btn-sm"
                                                         title="Delete ubicacion"
                                                         onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                             class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                 </form>
                                             </td>
                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                             <div class="pagination-wrapper"> {!! $ubicacion->appends(['search' => Request::get('search')])->render() !!} </div>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection

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
                     <div class="card-header">ubicacion {{ $ubicacion->id }}</div>
                     <div class="card-body">

                         <a href="{{ url('/admin/ubicacion') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                     class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                         <a href="{{ url('/admin/ubicacion/' . $ubicacion->id . '/edit') }}" title="Edit ubicacion"><button
                                 class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                 Edit</button></a>

                         <form method="POST" action="{{ url('admin/ubicacion' . '/' . $ubicacion->id) }}"
                             accept-charset="UTF-8" style="display:inline">
                             {{ method_field('DELETE') }}
                             {{ csrf_field() }}
                             <button type="submit" class="btn btn-danger btn-sm" title="Delete ubicacion"
                                 onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                     aria-hidden="true"></i> Delete</button>
                         </form>
                         <br />
                         <br />

                         <div class="table-responsive">
                             <table class="table">
                                 <tbody>
                                     <tr>
                                         <th>ID</th>
                                         <td>{{ $ubicacion->id }}</td>
                                     </tr>
                                     <tr>
                                         <th> IdUsuario </th>
                                         <td> {{ $ubicacion->idUsuario }} </td>
                                     </tr>
                                     <tr>
                                         <th> IdCuenca </th>
                                         <td> {{ $ubicacion->idCuenca }} </td>
                                     </tr>
                                     <tr>
                                         <th> IdBaseOperativa </th>
                                         <td> {{ $ubicacion->idBaseOperativa }} </td>
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

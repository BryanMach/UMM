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
                     <div class="card-header">Certificacione {{ $certificacione->id }}</div>
                     <div class="card-body">

                         <a href="{{ url('/admin/certificaciones') }}" title="Back"><button
                                 class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                 Retroceder</button></a>
                         <a href="{{ url('/admin/certificaciones/' . $certificacione->id . '/edit') }}"
                             title="Editar Certificacione"><button class="btn btn-primary btn-sm"><i
                                     class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                         <form method="POST" action="{{ url('admin/certificaciones' . '/' . $certificacione->id) }}"
                             accept-charset="UTF-8" style="display:inline">
                             {{ method_field('DELETE') }}
                             {{ csrf_field() }}
                             <button type="submit" class="btn btn-danger btn-sm" title="Borrar Certificacione"
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
                                         <td>{{ $certificacione->id }}</td>
                                     </tr>
                                     <tr>
                                         <th> IdCuenca </th>
                                         <td> {{ $certificacione->idCuenca }} </td>
                                     </tr>
                                     <tr>
                                         <th> Numero </th>
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

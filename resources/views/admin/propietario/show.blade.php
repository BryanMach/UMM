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
                     <div class="card-header">Propietario {{ $propietario->id }}</div>
                     <div class="card-body">

                         <a href="{{ url('/admin/propietario') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                     class="fa fa-arrow-left" aria-hidden="true"></i> Retroceder</button></a>
                         <a href="{{ url('/admin/propietario/' . $propietario->id . '/edit') }}"
                             title="Editar Propietario"><button class="btn btn-primary btn-sm"><i
                                     class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                         <form method="POST" action="{{ url('admin/propietario' . '/' . $propietario->id) }}"
                             accept-charset="UTF-8" style="display:inline">
                             {{ method_field('DELETE') }}
                             {{ csrf_field() }}
                             <button type="submit" class="btn btn-danger btn-sm" title="Borrar Propietario"
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
                                         <td>{{ $propietario->id }}</td>
                                     </tr>
                                     <tr>
                                         <th> Nombre </th>
                                         <td> {{ $propietario->nombre }} </td>
                                     </tr>
                                     <tr>
                                         <th> Tipo </th>
                                         @if ($propietario->tipo == 1)
                                             <td>Empresa</td>
                                         @else
                                             <td>Persona</td>
                                         @endif
                                     </tr>
                                     <tr>
                                         @if ($propietario->tipo == 1)
                                             <th>SEPREC</th>
                                         @else
                                             <th>CI</th>
                                         @endif
                                         <td> {{ $propietario->identificador }} </td>
                                     </tr>
                                     <tr>
                                         @if ($propietario->tipo == 1)
                                             <th>Fecha de constitución</th>
                                         @else
                                             <th>Fecha de nacimiento</th>
                                         @endif
                                         <td> {{ $propietario->FechaIni }} </td>
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

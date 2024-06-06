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
                     <div class="card-header">Create New ubicacion</div>
                     <div class="card-body">
                         <a href="{{ url('/admin/ubicacion') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                     class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                         <br />
                         <br />

                         @if ($errors->any())
                             <ul class="alert alert-danger">
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         @endif

                         <form method="POST" action="{{ url('/admin/ubicacion') }}" accept-charset="UTF-8"
                             class="form-horizontal" enctype="multipart/form-data">
                             {{ csrf_field() }}

                             @include ('admin.ubicacion.form', ['formMode' => 'create'])

                         </form>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection

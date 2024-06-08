 @extends('layouts.app')
 @if (Auth::user()->id != 1)
     <div class="right-sidebar">
         <div class="sidebar-header text-center p-3">
             <h4>REGISTROS DEL PERSONAL</h4>
         </div>
         <div class="sidebar-content">
             <a href="personal">PERSONAL</a>
             <a href="usuarios">USUARIOS</a>
             <a href="bases-operativas" class="active">BASES DE OPERACIONES</a>
             <h5 class="px-3 pt-3">REGISTRO DE EMBARCACIONES</h5>
             <a href="propietario">PROPIETARIOS</a>
             <a href="artefactos">ARTEFACTOS NAVALES</a>
             <a href="lista-propietarios">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
             {{-- <a href="imprimir">Certificaciones</a> --}}
             {{-- <a href="imprimir">Alertas de Vencimiento</a> --}}
             {{-- <a href="dashboard">Modo Administrador</a> --}}
         </div>
     </div>
 @else
     <div class="right-sidebar">
         <div class="sidebar-header text-center p-3">
             <h4>REGISTROS DE PERSONAL</h4>
         </div>
         <div class="sidebar-content">
             <a href="bases-operativas" class="active">BASES DE OPERACIONES</a>
             <h5 class="px-3 pt-3">REGISTROS DE EMBARCAIONES</h5>
             <a href="propietario">PROPIETARIOS</a>
             <a href="artefactos">ARTEFACTOS NAVALES</a>
             <a href="lista-propietarios">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
             {{-- <a href="imprimir">Certificaciones</a> --}}
             {{-- <a href="imprimir">Alertas de Vencimiento</a> --}}
             {{-- <a href="dashboard">Modo Administrador</a> --}}
         </div>
     </div>
 @endif

 @section('content')
     <div class="container">
         <div class="row">
             <div class="col-md-9">
                 <div class="card">
                     <div class="card-header">Crear nuevo Motor</div>
                     <div class="card-body">
                         <a href="{{ url('/admin/motores') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                     class="fa fa-arrow-left" aria-hidden="true"></i> Retroceder</button></a>
                         <br />
                         <br />

                         @if ($errors->any())
                             <ul class="alert alert-danger">
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         @endif

                         <form method="POST" action="{{ url('/admin/motores') }}" accept-charset="UTF-8"
                             class="form-horizontal" enctype="multipart/form-data">
                             {{ csrf_field() }}

                             @include ('admin.motores.form', ['formMode' => 'create'])

                         </form>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection

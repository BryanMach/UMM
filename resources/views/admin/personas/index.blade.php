@extends('layouts.app')

@if ($nivel == 2)
    <div class="right-sidebar">
        <div class="sidebar-header text-center p-3">
            <h5 class="px-3 pt-3 text-left" style="font-size: 1rem; font-weight: 600;">REGISTRO DE PERSONAS </h5>
        </div>
        <div class="sidebar-content">
            <a href="{{ url('/admin/personal') }}">PERSONAL</a>
            <a href="{{ url('/admin/usuarios') }}">USUARIOS</a>
            <a href="{{ url('/admin/cuenca') }}">CUENCAS</a>
            <a href="{{ url('/admin/bases-operativas') }}">BASES DE OPERACIONES</a>
            <h5 class="px-3 pt-3">REGISTRO DE EMBARCACIONES</h5>
            <a href="{{ url('/admin/propietario') }}">PROPIETARIOS</a>
            <a href="{{ url('/admin/artefactos') }}">ARTEFACTOS NAVALES</a>
            <a href="{{ url('/admin/lista-propietarios') }}">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
            {{-- <a href="{{ url('/admin/') }}imprimir">Certificaciones</a> --}}
            {{-- <a href="{{ url('/admin/') }}imprimir">Alertas de Vencimiento</a> --}}
            <h5 class="px-1 pt-1">MODIFICACIONES</h5>
            <a href="{{ url('/admin/cargos') }}">CARGOS DE PERSONAL</a>
            <a href="{{ url('/admin/material') }}">MATERIALES DE EMBARCACIONES</a>
            <a href="{{ url('/admin/servicios') }}">SERVICIOS DE EMBARCACIONES</a>
            <a href="{{ url('/admin/tipo') }}">TIPOS DE EMBARCACIONES</a>
            <h5 class="px-1 pt-1">CARNETIZACION</h5>
            <a href="{{ url('/admin/personas') }}">PERSONAS</a>
            <a href="{{ url('/admin/material') }}"></a>
            <a href="{{ url('/admin/servicios') }}"></a>
            <a href="{{ url('/admin/tipo') }}"></a>

        </div>
    </div>
@endif
@if ($nivel == 3)
    <div class="right-sidebar">
        <div class="sidebar-content">
            <h5 class="px-3 pt-3">REGISTROS DE EMBARCACIONES</h5>
            <a href="{{ url('/admin/propietario') }}">PROPIETARIOS</a>
            <a href="{{ url('/admin/artefactos') }}">ARTEFACTOS NAVALES</a>
            <a href="{{ url('/admin/lista-propietarios') }}">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
            {{-- <a href="{{ url('/admin/') }}imprimir">Certificaciones</a> --}}
            {{-- <a href="{{ url('/admin/') }}imprimir">Alertas de Vencimiento</a> --}}
        </div>
    </div>
@endif
@if ($nivel == 4)
    <div class="right-sidebar">
        <div class="sidebar-content">
            <h5 class="px-3 pt-3">REGISTROS DE EMBARCACIONES</h5>
            <a href="{{ url('/admin/propietario') }}">PROPIETARIOS</a>
            <a href="{{ url('/admin/artefactos') }}">ARTEFACTOS NAVALES</a>
            <a href="{{ url('/admin/lista-propietarios') }}">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
        </div>
    </div>
@endif
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">LISTA DE PERSONAL MERCANTE</div>
                    <div class="card-body">
                        @switch($nivel)
                            @case(3)
                                <a href="{{ url('/admin/perf45i') }}" title="Retornar"><button class="btn btn-warning btn-sm">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                            @break

                            @case(2)
                                <a href="{{ url('/admin/perf45j') }}" title="Retornar"><button class="btn btn-warning btn-sm">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                            @break

                            @case(4)
                                <a href="{{ url('/admin/perf45r') }}" title="Retornar"><button class="btn btn-warning btn-sm">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                            @break

                            @default
                        @endswitch
                        <a href="{{ url('/admin/personas/create') }}" class="btn btn-success btn-sm" title="Agregar">
                            <i class="fa fa-plus" aria-hidden="true"></i> AGREGAR
                        </a>

                        <form method="GET" action="{{ url('/admin/personas') }}" accept-charset="UTF-8"
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
                                        <th>USUARIO</th>
                                        <th>NOMBRE DE LA PERSONA</th>
                                        <th>MATRICULA</th>
                                        <th>AMBITO</th>
                                        <th>OPCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personas as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->usuarios->usuario }}</td>
                                            <td>{{ $item->nombres }} {{ $item->apellido }}</td>
                                            <td>{{ $item->matricula }}</td>
                                            <td>{{ $item->ambito }}</td>
                                            <td>
                                                <a href="{{ url('/admin/personas/' . $item->id) }}" title="Ver Persona">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> VER
                                                    </button>
                                                </a>
                                                <a href="{{ url('/admin/personas/' . $item->id . '/edit') }}"
                                                    title="Editar persona">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR
                                                    </button>
                                                </a>
                                                <form method="POST"
                                                    action="{{ url('/admin/personas' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="BORRAR Persona"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> BORRAR
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper">
                                {!! $personas->appends(['search' => Request::get('search')])->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarLinks = document.querySelectorAll('.sidebar-content a');

        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Remover la clase 'active' de todos los enlaces
                sidebarLinks.forEach(l => l.classList.remove('active'));

                // Añadir la clase 'active' al enlace clickeado
                this.classList.add('active');

                // Si quieres mantener la opción activa después de recargar la página,
                // puedes guardar la URL en localStorage
                localStorage.setItem('activeLink', this.getAttribute('href'));
            });
        });

        // Verificar si hay una opción activa guardada y aplicarla
        const activeLink = localStorage.getItem('activeLink');
        if (activeLink) {
            const link = document.querySelector(`.sidebar-content a[href="${activeLink}"]`);
            if (link) {
                link.classList.add('active');
            }
        }
    });
</script>

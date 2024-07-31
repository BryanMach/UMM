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
            <h4>REGISTRO DE PERSONAL </h4>
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
                    <div class="card-header">PERSONAL</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/personal') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                        <a href="{{ url('/admin/personal/' . $personal->id . '/edit') }}" title="Editar Personal"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                EDITAR</button></a>

                        <form method="POST" action="{{ url('admin/personal' . '/' . $personal->id) }}"
                            accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="BORRAR Personal"
                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> BORRAR</button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th> CI </th>
                                        <td> {{ $personal->ci }} </td>
                                    </tr>
                                    <tr>
                                        <th> CARGO </th>
                                        <td> {{ $personal->cargo->cargo }} </td>
                                    </tr>
                                    <tr>
                                        <th> GRADO </th>
                                        <td> {{ $personal->grado }} </td>
                                    </tr>
                                    <tr>
                                        <th> NOMBRES </th>
                                        <td> {{ $personal->nombres }} </td>
                                    </tr>
                                    <tr>
                                        <th> APELLIDOS </th>
                                        <td> {{ $personal->apellidos }} </td>
                                    </tr>
                                    <tr>
                                        <th> CONTACTO </th>
                                        <td> {{ $personal->contacto }} </td>
                                    </tr>
                                    <tr>
                                        <th> FOTO </th>
                                        <td> <img src="{{ asset('storage') . '/' . $personal->foto }}" alt=""
                                                width="300px" height="300px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> DESCRIPCION </th>
                                        <td> {{ $personal->descripcion }} </td>
                                    </tr>
                                    <tr>
                                        <th> VIGENCIA </th>
                                        <td>
                                            @if ($personal->vigencia == 1)
                                                ESTA PERSONA ACTUALMENTE TRABAJA PARA LA UNIDAD DE MARINA MERCANTE
                                            @else
                                                ESTA PERSONA ACTUALMENTE NO TRABAJA PARA LA UNIDAD DE MARINA MERCANTE
                                            @endif
                                        </td>
                                        <td> {{ $personal->vigencia }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <h5>USUARIOS ASIGNADOS A ESTE PERSONAL</h5>
                                    </tr>
                                    <tr>
                                        <th>NIVEL</th>
                                        <th>USUARIO</th>
                                        <th>CONTRASEÑA</th>
                                        <th>OPCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        @foreach ($usuarios as $item)
                                    <tr>
                                        @php
                                            $n = '';
                                        @endphp
                                        @switch($item->nivel)
                                            @case(2)
                                                @php
                                                    $n = 'Jefe';
                                                @endphp
                                            @break

                                            @case(3)
                                                @php
                                                    $n = 'Archivo interno';
                                                @endphp
                                            @break

                                            @case(4)
                                                @php
                                                    $n = 'Archivo externo';
                                                @endphp
                                            @break

                                            @default
                                        @endswitch
                                        <td>{{ $n }}</td>
                                        <td>
                                            @foreach ($acc as $ac)
                                                @if ($ac->id == $item->id)
                                                    {{ $ac->email }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $item->contrasena }}</td>
                                        <td>
                                            <a href="{{ url('/admin/usuarios/' . $item->id) }}" title="Ver Usuario"><button
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                                    VER</button></a>
                                            <a href="{{ url('/admin/usuarios/' . $item->id . '/edit') }}"
                                                title="Editar Usuario"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Editar</button></a>
                                            <form method="POST" action="{{ url('/admin/usuarios' . '/' . $item->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="BORRAR Usuario"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i> BORRAR</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
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

@extends('layouts.app')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .right-sidebar {
        width: 250px;
        height: 100vh;
        background-color: #fff;
        border-left: 1px solid #e0e0e0;
        position: fixed;
        top: 0;
        right: 0;
        overflow-y: auto;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar-header,
    .sidebar-content h5 {
        background-color: #99bcfad5;
        color: #333;
        padding: 0.75rem 1rem;
        margin: 0;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        border-bottom: 1px solid #e0e0e0;
    }

    .sidebar-content {
        padding: 0;
    }

    .sidebar-content a {
        color: #333;
        display: block;
        padding: 0.75rem 1.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }

    .sidebar-content a:hover,
    .sidebar-content a.active {
        background-color: #f8f9fa;
        border-left-color: #3498db;
    }

    .sidebar-content a.active {
        font-weight: 600;
        background-color: #e9ecef;
        color: #2c3e50;
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
                    <div class="card-header">DATOS ADICIONALES DE LA PERSONA</div>
                    <div class="card-body">

                        @switch($nivel)
                            @case(3)
                                <a href="{{ url('/admin/personas') }}" title="Back"><button class="btn btn-warning btn-sm">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                            @break

                            @case(2)
                                <a href="{{ url('/admin/personas') }}" title="Back"><button class="btn btn-warning btn-sm">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                            @break

                            @case(4)
                                <a href="{{ url('/admin/personas') }}" title="Back"><button class="btn btn-warning btn-sm">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i> ATRAS</button></a>
                            @break

                            @default
                        @endswitch
                        <a href="{{ url('/admin/personas/' . $personas->id . '/edit') }}" title="EDITAR PERSONA"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                EDITAR</button></a>
                        {{-- @dd($nivel); --}}
                        @if ($nivel != 4)
                            <form method="POST" action="{{ url('admin/personas' . '/' . $personas->id) }}"
                                accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="BORRAR persona"
                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i> BORRAR</button>
                            </form>
                        @endif
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                    <tr>
                                        <th> NOMBRE DE LA PERSONA</th>
                                        <td>{{ $personas->nombres }} {{ $personas->apellido }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>CARNET DE IDENTIDAD</th>
                                        <td>{{ $personas->CI }}</td>
                                    </tr>
                                    <tr>
                                        <th>CARGO</th>
                                        <td>{{ $personas->cargo }}</td>
                                    </tr>
                                    <tr>
                                        <th>NACIONALIDAD</th>
                                        <td>{{ $personas->nacionalidad }}</td>
                                    </tr>
                                    <tr>
                                        <th>LUGAR DE NACIMIENTO</th>
                                        <td>{{ $personas->lugarNac }}</td>
                                    </tr>
                                    <tr>
                                        <th>FECHA DE NACIMIENTO</th>
                                        <td>{{ $personas->fechaNac }}</td>
                                    </tr>
                                    <tr>
                                        <th>ESTADO CIVIL</th>
                                        <td>{{ $personas->estadoCiv }}</td>
                                    </tr>
                                    <tr>
                                        <th>FECHA DE VENCIMIENTO DE CARNET</th>
                                        <td>{{ $personas->venCarnet }}</td>
                                    </tr>
                                    <tr>
                                        <th>MATRICULA</th>
                                        <td>{{ $personas->matricula }}</td>
                                    </tr>
                                    <tr>
                                        <th> CARNETS </th>
                                        <td>{{-- {{ $listapropietario->artefactos->matricula }} --}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form method="POST" action="{{ url('admin/imprimir-certificado-registro') }}"
                                                accept-charset="UTF-8" class="form-horizontal"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $listapropietario->id }}">
                                                <input type="hidden" name="idPropietario"
                                                    value="{{ $listapropietario->idPropietario }}">
                                                <input type="hidden" name="idArtefacto"
                                                    value="{{ $listapropietario->idArtefacto }}">
                                                <label for="correlativo">C1</label>
                                                <input type="text" oninput="this.value = this.value.toUpperCase()"
                                                    id="correlativo" name="correlativo" pattern="[0-9]*" inputmode="number"
                                                    required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                <input class="btn btn-primary" type="submit"
                                                    value="Emitir carnet P embarcada">
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form method="POST" action="{{ url('admin/imprimir-certificado-seguridad') }}"
                                                accept-charset="UTF-8" class="form-horizontal"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $listapropietario->id }}">
                                                <input type="hidden" name="idPropietario"
                                                    value="{{ $listapropietario->idPropietario }}">
                                                <input type="hidden" name="idArtefacto"
                                                    value="{{ $listapropietario->idArtefacto }}">
                                                <label for="correlativo">C2</label>
                                                <input type="text" oninput="this.value = this.value.toUpperCase()"
                                                    id="correlativo" name="correlativo" pattern="[0-9]*"
                                                    inputmode="number" required
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                <input class="btn btn-primary" type="submit"
                                                    value="Emitir carnet P terrestre">
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                <tr>
                                    <td>
                                        <form method="POST" action="{{ url('admin/imprimir-certificado-francobordo') }}"
                                            accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $listapropietario->id }}">
                                            <input type="hidden" name="idPropietario"
                                                value="{{ $listapropietario->idPropietario }}">
                                            <input type="hidden" name="idArtefacto"
                                                value="{{ $listapropietario->idArtefacto }}">
                                            <label for="correlativo">C3</label>
                                            <input type="text" oninput="this.value = this.value.toUpperCase()"
                                                id="correlativo" name="correlativo" pattern="[0-9]*" inputmode="number"
                                                required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            <input class="btn btn-primary" type="submit"
                                                value="Emitir carnet T habilitacion">
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <form method="POST" action="{{ url('admin/imprimir-certificado-arqueo') }}"
                                            accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $listapropietario->id }}">
                                            <input type="hidden" name="idPropietario"
                                                value="{{ $listapropietario->idPropietario }}">
                                            <input type="hidden" name="idArtefacto"
                                                value="{{ $listapropietario->idArtefacto }}">
                                            <label for="correlativo">C4</label>
                                            <input type="text" oninput="this.value = this.value.toUpperCase()"
                                                id="correlativo" name="correlativo" pattern="[0-9]*" inputmode="number"
                                                required oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            <input class="btn btn-primary" type="submit"
                                                value="Emitir carnet L embarco">
                                        </form>
                                    </td>
                                </tr>
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

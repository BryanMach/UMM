@extends('layouts.app')

<style>
    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: none;
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #3498db;
        color: #fff;
        font-weight: 600;
    }

    .btn-sm {
        margin-right: 5px;
    }

    .table th {
        font-weight: 600;
        width: 30%;
    }

    .profile-img {
        max-width: 200px;
        height: auto;
        border-radius: 5px;
    }

    .certificate-list {
        list-style-type: none;
        padding-left: 0;
    }

    .certificate-item {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .owner-card {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 15px;
    }
</style>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Main content -->
            <main class="col-12 main-content">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Detalles del Artefacto</h5>
                        <div>
                            <a href="{{ url('/admin/artefactos') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás
                            </a>
                            <a href="{{ url('/admin/artefactos/' . $artefacto->id . '/edit') }}"
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                            </a>
                            @if ($nivel != 4)
                                <form method="POST" action="{{ url('admin/artefactos' . '/' . $artefacto->id) }}"
                                    style="display:inline"
                                    onsubmit="return confirm('¿Está seguro que desea eliminar este artefacto?');">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Borrar
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>USUARIOS</th>
                                        <td>{{ $artefacto->usuarios->usuario }}</td>
                                    </tr>
                                    <tr>
                                        <th>BASE DE OPERACIONES</th>
                                        <td>{{ $artefacto->baseoperativa->baseOperativa }}</td>
                                    </tr>
                                    <tr>
                                        <th>MATRICULA</th>
                                        <td>{{ $artefacto->matricula }}</td>
                                    </tr>
                                    <tr>
                                        <th>NOMBRE</th>
                                        <td>{{ $artefacto->nombre }}</td>
                                    </tr>
                                    <tr>
                                        <th>TIPO</th>
                                        <td>{{ $artefacto->tipo->tipo }}</td>
                                    </tr>
                                    <tr>
                                        <th>MATERIAL</th>
                                        <td>{{ $artefacto->material->material }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ESLORA</th>
                                        <td>{{ $artefacto->eslora }}</td>
                                    </tr>
                                    <tr>
                                        <th>MANGA</th>
                                        <td>{{ $artefacto->manga }}</td>
                                    </tr>
                                    <tr>
                                        <th>PUNTAL</th>
                                        <td>{{ $artefacto->puntal }}</td>
                                    </tr>
                                    <tr>
                                        <th>FRANCOBORDO</th>
                                        <td>{{ $artefacto->francobordo }}</td>
                                    </tr>
                                    <tr>
                                        <th>PROPULSION</th>
                                        <td>{{ $artefacto->propulsion }}</td>
                                    </tr>
                                    <tr>
                                        <th>CONSTRUCCION</th>
                                        <td>{{ $artefacto->construccion }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h5>Información Adicional</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>TRN</th>
                                        <td>{{ $artefacto->trn }}</td>
                                    </tr>
                                    <tr>
                                        <th>TRB</th>
                                        <td>{{ $artefacto->trb }}</td>
                                    </tr>
                                    <tr>
                                        <th>SERVICIO</th>
                                        <td>{{ $artefacto->servicio->servicio }}</td>
                                    </tr>
                                    <tr>
                                        <th>ASOCIACION</th>
                                        <td>{{ $artefacto->asociacion }}</td>
                                    </tr>
                                    <tr>
                                        <th>OBSERVACIONES</th>
                                        <td>{{ $artefacto->observaciones }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5>Foto del Artefacto</h5>
                                <img src="{{ asset('storage/uploads/' . $artefacto->fotoA) }}"
                                    onerror="this.src='{{ asset('images/barcodefecto.png') }}'"
                                    class="profile-img img-fluid" alt="Foto del Artefacto">
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <h5>Certificados</h5>
                                <ul class="certificate-list">
                                    @foreach ($artefacto->certificado as $certificado)
                                        <li class="certificate-item">
                                            <strong>
                                                @switch($certificado->tipoC)
                                                    @case(1)
                                                        CERTIFICADO DE REGISTRO
                                                    @break

                                                    @case(2)
                                                        CERTIFICADO DE SEGURIDAD
                                                    @break

                                                    @case(3)
                                                        CERTIFICADO DE FRANCOBORDO
                                                    @break

                                                    @case(4)
                                                        CERTIFICADO DE ARQUEO
                                                    @break

                                                    @case(5)
                                                        CERTIFICADO DE MEDIO AMBIENTE
                                                    @break

                                                    @case(6)
                                                        CERTIFICADO DE DOTACION MINIMA
                                                    @break
                                                @endswitch
                                            </strong><br>
                                            Número de Registro: {{ $certificado->nreg }}<br>
                                            Número de Certificado: {{ $certificado->correlativo }}<br>
                                            Fecha de Emisión: {{ $certificado->fechaEmision }}<br>
                                            Fecha de Vencimiento: {{ $certificado->fechaVencimiento }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Lista de Propietarios</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($artefacto->propietarios as $propietario)
                            <div class="owner-card">
                                <h6>{{ $propietario->nombre }}</h6>
                                <p class="mb-1">Identificador: {{ $propietario->identificador }}</p>
                                <p class="mb-0">Fecha de Inicio: {{ $propietario->FechaIni }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>

            <!-- Right Sidebar -->
            @if ($nivel == 2 || $nivel == 3 || $nivel == 4)
                <div class="right-sidebar">
                    @if ($nivel == 2)
                        <div class="sidebar-header text-center p-3">
                            <h4>REGISTRO DE PERSONAL</h4>
                        </div>
                        <div class="sidebar-content">
                            <a href="{{ url('/admin/personal') }}">PERSONAL</a>
                            <a href="{{ url('/admin/usuarios') }}">USUARIOS</a>
                            <a href="{{ url('/admin/cuenca') }}">CUENCAS</a>
                            <a href="{{ url('/admin/bases-operativas') }}">BASES DE OPERACIONES</a>
                        </div>
                    @endif
                    <div class="sidebar-content">
                        <h5 class="px-3 pt-3">REGISTRO DE EMBARCACIONES</h5>
                        <a href="{{ url('/admin/propietario') }}">PROPIETARIOS</a>
                        <a href="{{ url('/admin/artefactos') }}">ARTEFACTOS NAVALES</a>
                        <a href="{{ url('/admin/lista-propietarios') }}">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarLinks = document.querySelectorAll('.sidebar-content a');

        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                sidebarLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                localStorage.setItem('activeLink', this.getAttribute('href'));
            });
        });

        const activeLink = localStorage.getItem('activeLink');
        if (activeLink) {
            const link = document.querySelector(`.sidebar-content a[href="${activeLink}"]`);
            if (link) {
                link.classList.add('active');
            }
        }
    });
</script>

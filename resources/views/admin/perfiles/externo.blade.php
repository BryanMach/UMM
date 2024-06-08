<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivo Externo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #e9ecef;
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

        .description td {
            font-family: "Rowdies", sans-serif;
        }

        .main-content {
            padding: 20px;
        }

        .navbar {
            border-bottom: 2px solid #e9ecef;
            background-color: #fff;
        }

        .navbar-brand {
            color: #e74c3c;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #e74c3c;
            font-weight: bold;
            font-size: 1.1rem;
            margin-right: 20px;
        }

        .navbar-nav .nav-link.active {
            color: #c0392b;
            text-decoration: underline;
        }

        .form-inline .form-control {
            border-radius: 20px;
        }

        .table thead th {
            background-color: #f8f9fa;
            font-weight: bold;
            text-align: center;
        }

        .table tbody tr {
            background-color: #eaf2f8;
            text-align: center;
        }

        .table tbody tr td {
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #d1e7f2;
        }

        .btn-outline-secondary {
            border-color: #e74c3c;
            color: #e74c3c;
        }

        .btn-outline-secondary:hover {
            background-color: #e74c3c;
            color: #fff;
        }

        .nav {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .dropdown-menu li {
            padding: 10px 15px;
        }

        .dropdown-menu li a {
            text-decoration: none;
            color: black;
        }

        .dropdown-menu li:hover {
            background-color: #f1f1f1;
        }

        table caption {
            caption-side: top;
            font-weight: bold;
            text-align: center;
            margin-bottom: 0.5em;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar text-center">
                <img src="{{ asset('images/' . $perfil->foto) }}"
                    onerror="this.src='{{ asset('images/Usericono.png') }}'" class="profile-img">
                <h3>{{ $perfil->nombres }} {{ $perfil->apellidos }}</h3>
                <p class="role">{{ $perfil->grado }}</p>
                <table class="description text-left">
                    <tbody>
                        <tr>
                            <td>CARGO</td>
                            <td>{{ $perfil->cargo }}</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>CI</td>
                            <td>{{ $perfil->ci }}</td>
                        </tr>
                        <tr>
                            <td>CONTACTO</td>
                            <td>{{ $perfil->contacto }}</td>
                        </tr>
                    </tbody>
                </table>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-secondary mt-4"><i class="fas fa-power-off"></i>
                        CERRAR SESION</button>
                </form>
            </div>
            <div class="col-md-9 main-content">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="registro">Registro nuevo</a>
                            </li>
                            {{--   .........  --}}
                            {{-- <li class="nav-item">
                                <form method="POST" action="{{ url('/admin/renovar') }}" accept-charset="UTF-8"
                          class="form-inline my-2 my-lg-0 float-right" role="search">
                          <div class="input-group">
                              <input type="text" class="form-control" name="search" placeholder="M-######"
                                  value="{{ request('search') }}">
                              <span class="input-group-append">
                                  <button class="btn btn-secondary" type="submit" title="Corregir registro">
                                    Renovación
                                  </button>
                              </span>
                          </div>
                      </form>
                                 
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ url('/admin/corregir') }}" accept-charset="UTF-8"
                          class="form-inline my-2 my-lg-0 float-right" role="search">
                          <div class="input-group">
                              <input type="text" class="form-control" name="search" placeholder="M-######"
                                  value="{{ request('search') }}">
                              <span class="input-group-append">
                                  <button class="btn btn-secondary" type="submit">
                                    Corrección
                                  </button>
                              </span>
                          </div>
                      </form> --}}
                                {{-- <a class="nav-link" href="#">Corrección</a> --}}
                            </li>
                        </ul>
                        
                    </div>
                </nav>
                <table class="table table-bordered mt-4">
                    {{-- <caption>Información de Propietarios y Embarcaciones</caption> --}}
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>CI</th>
                            <th>PROPIETARIO</th>
                            <th>ARTEFACTO NAVAL</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listapropietarios as $item)
                            {{-- @dd($listapropietarios) --}}
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td><a
                                        href="{{ url('/admin/propietario/' . $item->idPropietario) }}">{{ $item->propietarios->identificador }}</a>
                                </td>
                                <td> {{ $item->propietarios->nombre }}</td>

                                <td><a href="{{ url('/admin/artefactos/' . $item->idArtefacto) }}">{{ $item->artefactos->matricula }}
                                        {{ $item->artefactos->nombre }}</a>
                                </td>
                                <td>
                                    <a href="{{ url('/admin/lista-propietarios/' . $item->id) }}"
                                        title="Ver ListaPropietario"><button class="btn btn-info btn-sm"><i
                                                class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                    {{-- <a href="{{ url('/admin/lista-propietarios/' . $item->id . '/edit') }}"
                                        title="Editar ListaPropietario"><button class="btn btn-primary btn-sm"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            Editar</button></a> --}}
                                    <form method="POST" action="{{ url('/admin/corregir') }}" accept-charset="UTF-8"
                                        style="display:inline">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-primary btn-sm"
                                            title="Corregir registro"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i>Corregir</button>
                                    </form>

                                    {{-- <form method="POST"
                                        action="{{ url('/admin/lista-propietarios' . '/' . $item->id) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            title="Borrar ListaPropietario"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleDropdown(event) {
            event.preventDefault();
            const dropdown = event.target.nextElementSibling;
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }

        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('.dropdown-menu');
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(event.target) && !dropdown.previousElementSibling.contains(event
                        .target)) {
                    dropdown.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>

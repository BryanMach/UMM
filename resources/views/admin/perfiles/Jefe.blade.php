<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidad de Marina Mercante</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
</head>

<body>
    <!--compact('vista','personal','usuario','perfil'));
        'ci', 'cargo', 'grado', 'nombres', 'apellidos', 'contacto', 'foto', 'descripcion', 'vigencia'
    -->
    <div class="col-md-3 sidebar text-center" style="position: fixed;">
        <img src="{{ asset('images/img.jpg' /* . $perfil->foto */) }}"
            onerror="this.src='{{ asset('images/Usericono.png') }}'" class="profile-img">
        <h3>{{ $perfil->nombres }} {{ $perfil->apellidos }}</h3>
        <p class="role">{{ $perfil->grado }}</p>
        <table class="description text-left">
            <tbody>
                <tr>
                    <td>CARGO</td>
                    <td>{{ $perfil->cargo->cargo }}</td>
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
            <button class="btn btn-outline-secondary mt-4"><i class="fas fa-power-off"></i> Cerrar Sesión</button>
        </form>
    </div>
    <div class="search-bar">
        <div class="main-content">
            <h2>PLANILLA DEL PERSONAL</h2>
            {{-- <input type="text" class="form-control" placeholder="Buscar"> --}}
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>CARGO</th>
                            <th>NOMBRE Y APELLIDO</th>
                            <th>CEDULA DE IDENTIDAD</th>
                            <th>OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personal as $item)
                            <tr>
                                <td>{{ $item->cargo->cargo }}</td>
                                <td>{{ $item->nombres }} {{ $item->apellidos }}</td>
                                <td>{{ $item->ci }}</td>
                                <td>
                                    <a href="{{ url('/admin/personal/' . $item->id) }}" title="Ver Personal"><button
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                    <!--<form method="POST"
                                                  action="{{ url('/admin/usuario') }}"                                                 accept-charset="UTF-8" style="display:inline">
                                                  {{ csrf_field() }}
                                                  <input type="hiden" name="" id="" value="{{ asset($item->id) }}">
                                                  <button type="submit" class="btn btn-info btn-sm"
                                                      title="Asignar usuario"><i
                                                          class="fa fa-trash-o" aria-hidden="true"></i> Asignar usuario</button>
                                              </form>
                                            <a href="{{ url('/admin/usuario/' . $item->id) }}" title="Ver Personal"><button
                                                class="btn btn-info btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i> Asignar usuario</button></a>-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="right-sidebar">
        <div class="sidebar-header text-center p-3">
            <h4>REGISTROS DEL PERSONAL</h4>
        </div>
        <div class="sidebar-content">
            <a href="personal">PERSONAL</a>
            <a href="usuarios">USUARIOS</a>
            <a href="bases-operativas" class="active">BASES DE OPERACIONES</a>
            <h5 class="px-3 pt-3">REGISTROS DE EMBARCACIONES</h5>
            <a href="propietario">PROPIETARIOS</a>
            <a href="artefactos">ARTEFACTOS NAVALES</a>
            <a href="lista-propietarios">LISTAS DE PROPIETARIOS DE EMBARCACIONES</a>
            {{-- {{-- <a href="imprimir">Certificaciones</a> --}}
            {{-- <a href="imprimir">Alertas de Vencimiento</a> --}}
            {{-- <a href="dashboard">Modo Administrador</a> --}}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<!-- resources/views/ejemplo.blade.php -->

<!-- resources/views/ejemplo.blade.php -->

<!-- resources/views/ejemplo.blade.php -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de Blade</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        @php
            $mensaje = 'Hola, Mundo!';
            $valor = 2;
            $lista = [1, 2, 3, 4, 5];
            $numero = request('numero', null);
            $datoExtra = request('datoExtra', null);
        @endphp

        <h1>{{ $mensaje }}</h1>

        @if ($valor === 1)
<p>El valor es uno.</p>
@elseif($valor === 2)
<p>El valor es dos.</p>
@else
<p>El valor no es uno ni dos.</p>
@endif

        @switch($valor)
    @case(1)
        <p>Switch: El valor es uno.</p>
    @break

    @case(2)
        <p>Switch: El valor es dos.</p>
    @break

    @default
        <p>Switch: El valor no es uno ni dos.</p>
@endswitch

        <h2>Lista de valores:</h2>
        <ul>
            @foreach ($lista as $item)
<li>{{ $item }}</li>
@endforeach
        </ul>

        @php
            $contador = 0;
        @endphp

        <h2>Contador While:</h2>
        @while ($contador < 5)
<p>Contador: {{ $contador }}</p>
            @php
                $contador++;
            @endphp
@endwhile

        <h2>Contador For:</h2>
        @for ($i = 0; $i < 5; $i++)
<p>Contador: {{ $i }}</p>
@endfor

        <form method="GET" action="">
            <div class="form-group">
                <label for="numero">Ingrese un número:</label>
                <input type="number" class="form-control" id="numero" name="numero" value="{{ old('numero', $numero) }}">
            </div>
            <div class="form-group">
                <label for="datoExtra">Dato adicional:</label>
                <input type="text" class="form-control" id="datoExtra" name="datoExtra" value="{{ old('datoExtra', $datoExtra) }}">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        @if ($numero !== null)
<h2>El número ingresado es: {{ $numero }}</h2>
            @if ($numero % 2 == 0)
<p>El número {{ $numero }} es par.</p>
@else
<p>El número {{ $numero }} es impar.</p>
@endif
@endif

        @if ($datoExtra !== null)
<h2>El dato adicional ingresado es: {{ $datoExtra }}</h2>
@endif
    </div>
</body>
</html>-->

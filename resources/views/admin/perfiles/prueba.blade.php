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
        .sidebar, .right-sidebar {
            height: 100vh;
            background-color: #fff;
            border-right: 1px solid #ddd;
            position: fixed;
            top: 0;
        }
        .sidebar {
            width: 220px;
            left: 0;
        }
        .right-sidebar {
            width: 200px;
            right: 0;
            border-left: 1px solid #ddd;
        }
        .sidebar .profile {
            text-align: center;
            padding: 20px;
        }
        .sidebar .profile img {
            border-radius: 50%;
            width: 100px;
        }
        .sidebar .profile h4 {
            margin-top: 10px;
        }
        .sidebar a, .right-sidebar a {
            color: #333;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }
        .sidebar a:hover, .right-sidebar a:hover {
            background-color: #f1f1f1;
        }
        .sidebar .active {
            background-color: #e9ecef;
            font-weight: bold;
        }
        .main-content {
            margin-left: 220px;
            margin-right: 200px;
            padding: 20px;
        }
        .search-bar {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
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
    <div class="sidebar"><!--Sección de lado derecho-->
        <div class="profile">
            <img src="https://via.placeholder.com/100" alt="User">
            <h4>Nombre de personal</h4>
        </div>
        <a href="#" class="active">Title</a>
        <div class="table-container">
            <h5>Usuario</h5>
            <table class="table table-borderless">
                    <tr>
                        <th>subtítulo</th>
                        <td>dato</td>
                    </tr>
                    <tr>
                        <th>subtítulo</th>
                        <td>dato</td>
                    </tr>
                    <tr>
                        <th>subtítulo</th>
                        <td>dato</td>
                    </tr>
            </table>
            <a href="route('logout')">Salir</a>
        </div>
    </div>
    <div class="main-content"><!--Contenido central sea tabla o botones-->
        <div class="search-bar">
            <h2>Planilla de personal</h2>
            <input type="text" class="form-control" placeholder="Buscar">
            <button class="btn btn-outline-secondary"><i class="fas fa-filter"></i></button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Cargo</th>
                        <th>Nombre y apellido</th>
                        <th>Cédula de identidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Puesto dentro de la unidad</td>
                        <td>un nombre y un apellido</td>
                        <td>123456789 AA</td>
                        <td><span class="badge badge-danger">HVer o realizar seguimiento</span></td>
                    </tr>
                    <tr>
                        <td>Puesto dentro de la unidad</td>
                        <td>un nombre y un apellido</td>
                        <td>123456789 AA</td>
                        <td><span class="badge badge-secondary">Ver o realizar seguimiento</span></td>
                    </tr>
                    <tr>
                        <td>Puesto dentro de la unidad</td>
                        <td>un nombre y un apellido</td>
                        <td>123456789 AA</td>
                        <td><span class="badge badge-warning">MedVer o realizar seguimiento</span></td>
                    </tr>
                    <tr>
                        <td>Puesto dentro de la unidad</td>
                        <td>un nombre y un apellido</td>
                        <td>123456789 AA</td>
                        <td><span class="badge badge-warning">MedVer o realizar seguimiento</span></td>
                    </tr>
                    <tr>
                        <td>Puesto dentro de la unidad</td>
                        <td>un nombre y un apellido</td>
                        <td>123456789 AA</td>
                        <td><span class="badge badge-warning">MedVer o realizar seguimiento</span></td>
                    </tr>
                    <tr>
                        <td>Puesto dentro de la unidad</td>
                        <td>un nombre y un apellido</td>
                        <td>123456789 AA</td>
                        <td><span class="badge badge-secondary">Ver o realizar seguimiento</span></td>
                    </tr>
                    <tr>
                        <td>Puesto dentro de la unidad</td>
                        <td>un nombre y un apellido</td>
                        <td>123456789 AA</td>
                        <td><span class="badge badge-secondary">Ver o realizar seguimiento</span></td>
                    </tr>
                    <tr>
                        <td>Puesto dentro de la unidad</td>
                        <td>un nombre y un apellido</td>
                        <td>123456789 AA</td>
                        <td><span class="badge badge-secondary">Ver o realizar seguimiento</span></td>
                    </tr>
                    <tr>
                        <td>Puesto dentro de la unidad</td>
                        <td>un nombre y un apellido</td>
                        <td>123456789 AA</td>
                        <td><span class="badge badge-danger">HVer o realizar seguimiento</span></td>
                    </tr>
                    <tr>
                        <td>Puesto dentro de la unidad</td>
                        <td>un nombre y un apellido</td>
                        <td>123456789 AA</td>
                        <td><span class="badge badge-danger">HVer o realizar seguimiento</span></td>
                    </tr>
                    <tr>
                        <td>Puesto dentro de la unidad</td>
                        <td>un nombre y un apellido</td>
                        <td>123456789 AA</td>
                        <td><span class="badge badge-danger">HVer o realizar seguimiento</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="right-sidebar">
        <div class="sidebar-header text-center p-3">
            <h4>Acceso a tablas</h4>
        </div>
        <div class="sidebar-content">
            <a href="personal">Personal</a>
            <a href="usuarios">Usuarios</a>
            <a href="bases-operativas" class="active">Bases de operaciones</a>
            <h5 class="px-3 pt-3">Registros</h5>
            <a href="propietarios">Propietarios</a>
            <a href="artefactos">Artefactos</a>
            <a href="lista-propietarios">Listas de propietarios de embarcaciones</a>
            <a href="imprimir">Certificaciones</a>
            <a href="imprimir">Alertas de Vencimiento</a>
            <a href="dashboard">Modo Administrador</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<!-- resources/views/form.blade.php -->

<!-- resources/views/ejemplo.blade.php -->

<!--<!DOCTYPE html>
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
            $valor = 3;
            $lista = [1, 2, 3, 4, 5];
        @endphp

        <h1>{{ $mensaje }}</h1>

        @if($valor === 1)
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
            @foreach($lista as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>

        @php
            $contador = 0;
        @endphp

        <h2>Contador While:</h2>
        @while($contador < 5)
            <p>Contador: {{ $contador }}</p>
            @php
                $contador++;
            @endphp
        @endwhile

        <h2>Contador For:</h2>
        @for($i = 0; $i < 5; $i++)
            <p>Contador: {{ $i }}</p>
        @endfor
    </div>
</body>
</html>-->




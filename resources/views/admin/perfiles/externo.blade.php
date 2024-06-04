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
                <img src="{{ asset('images/foto.jpg') }}" alt="Foto de Perfil" class="profile-img">
                <h3>{{ $perfil->nombres }} {{ $perfil->apellidos }}</h3>
                <p class="role">{{ $perfil->grado }}</p>
                <table class="description text-left">
                    <tbody>
                        <tr>
                            <td>Cargo</td>
                            <td>{{ $perfil->cargo }}</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>CI</td>
                            <td>{{ $perfil->ci }}</td>
                        </tr>
                        <tr>
                            <td>Contacto</td>
                            <td>{{ $perfil->contacto }}</td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-outline-secondary mt-4">Cerrar Sesión</button>
            </div>
            <div class="col-md-9 main-content">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="toggleDropdown(event)">Registro<i
                                        class="fas fa-caret-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Provicional</a></li>
                                    <li><a href="#">Especial</a></li>
                                    <li><a href="#">Permanente</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Renovación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Corrección</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                        </form>
                    </div>
                </nav>
                <table class="table table-bordered mt-4">
                    {{-- <caption>Información de Propietarios y Embarcaciones</caption> --}}
                    <thead>
                        <tr>
                            <th scope="col">PROPIETARIO</th>
                            <th scope="col">EMBARCACION</th>
                            <th scope="col">VIGENCIAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#AHGA68</td>
                            <td>23/09/2022</td>
                            <td>Jacob Marcus</td>
                        </tr>
                        <tr>
                            <td>#AHGA68</td>
                            <td>23/09/2022</td>
                            <td>Jacob Marcus</td>
                        </tr>
                        <tr>
                            <td>#AHGA68</td>
                            <td>23/09/2022</td>
                            <td>Jacob Marcus</td>
                        </tr>
                        <tr>
                            <td>#AHGA68</td>
                            <td>23/09/2022</td>
                            <td>Jacob Marcus</td>
                        </tr>
                        <tr>
                            <td>#AHGA68</td>
                            <td>23/09/2022</td>
                            <td>Jacob Marcus</td>
                        </tr>
                        <tr>
                            <td>#AHGA68</td>
                            <td>23/09/2022</td>
                            <td>Jacob Marcus</td>
                        </tr>
                        <tr>
                            <td>#AHGA68</td>
                            <td>23/09/2022</td>
                            <td>Jacob Marcus</td>
                        </tr>
                        <tr>
                            <td>#AHGA68</td>
                            <td>23/09/2022</td>
                            <td>Jacob Marcus</td>
                        </tr>
                        <tr>
                            <td>#AHGA68</td>
                            <td>23/09/2022</td>
                            <td>Jacob Marcus</td>
                        </tr>
                        <tr>
                            <td>#AHGA68</td>
                            <td>23/09/2022</td>
                            <td>Jacob Marcus</td>
                        </tr>
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

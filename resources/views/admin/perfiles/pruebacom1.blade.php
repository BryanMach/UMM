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

        .sidebar,
        .right-sidebar {
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
    @php
        $idCuenca = request('idCuenca', null);
        $idBaseOperativa = request('idBaseOperativa', null);
    @endphp
    <div class="sidebar">
        <div class="profile">
            <img src="https://via.placeholder.com/100" alt="User">
            <h4>{{ $perfil->grado }} {{ $perfil->nombres }} {{ $perfil->apellidos }}</h4>
        </div>
        <a href="#" class="active">Usuario: {{ $usuario->usuario }}</a>
        <div class="table-container">
            <table class="table table-borderless">
                <tr>
                    <th>CI:</th>
                    <td>{{ $perfil->ci }}</td>
                </tr>
                <tr>
                    <th>Cargo:</th>
                    <td>{{ $perfil->cargo }}</td>
                </tr>
                <tr>
                    <th>Contacto:</th>
                    <td>{{ $perfil->contacto }}</td>
                </tr>
            </table>
        </div>
        <div>
            <a class="btn btn-default btn-flat float-right  btn-block " href="#"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-power-off text-red"></i>
                Salir
            </a>
            <input type="hidden" name="_token" value="wYPQSAtVT40RtK4HcL0s7NqEGk4DAyBtDQJNesfB">
            <form id="logout-form" action="http://localhost/rcumm/public/logout" method="POST" style="display: none;">
                @CSRF
            </form>
        </div>
    </div>
    <div class="search-bar">
        <div class="main-content">
            <h2>Planilla de artefactos</h2>
            <a href="registro"><button class="block mt-1 w-full" action="GET"> Registrar</button></a>
            <!--<div class="form-group {{ $errors->has('idCuenca') ? 'has-error' : '' }}">
                <label for="idCuenca" class="control-label">{{ 'Cuenca' }}</label>
                <select class="form-control" name="idCuenca" id="idCuenca" href="#">
                    @foreach ($cuencas as $cuenca)
@if ($idCuenca != null)
@if ($cuenca->id == $idCuenca)
<option value="{{ $cuenca->id }}" selected>{{ $cuenca->cuenca }}</option>
@else
<option value="{{ $cuenca->id }}">{{ $cuenca->cuenca }}</option>
@endif
@else
<option value="{{ $cuenca->id }}">{{ $cuenca->cuenca }}</option>
@endif
@endforeach
                </select>
                {!! $errors->first('idCuenca', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('idBaseOperativa') ? 'has-error' : '' }}">
                <label for="idBaseOperativa" class="control-label">{{ 'Bases operativas' }}</label>
                <select class="form-control" name="idBaseOperativa" id="idBaseOperativa" href="#">
                    @if ($idCuenca != null)
                        @foreach ($basesoperativas as $base)
@if ($idBaseOperativa != null)
@if ($base->id == $artefacto->idBaseOperativa)
<option value="{{ $base->id }}" selected>{{ $base->baseOperativa }}</option>
@else
<option value="{{ $base->id }}">{{ $base->baseOperativa }}</option>
@endif
@else
<option value="{{ $base->id }}">{{ $base->baseOperativa }}</option>
@endif
@endforeach
@else
@foreach ($basesoperativas as $base)
@if ($idBaseOperativa != null)
@if ($base->id == $artefacto->idBaseOperativa)
<option value="{{ $base->id }}" selected>{{ $base->baseOperativa }}</option>
@else
<option value="{{ $base->id }}">{{ $base->baseOperativa }}</option>
@endif
@else
<option value="{{ $base->id }}">{{ $base->baseOperativa }}</option>
@endif
@endforeach
                    @endif
                </select>
                {!! $errors->first('idBaseOperativa', '<p class="help-block">:message</p>') !!}
            </div>-->
            <!--<input type="text" oninput="this.value = this.value.toUpperCase()"  class="form-control" placeholder="Buscar">-->
            <table class="table">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>CI</th>
                        <th>Propietario</th>
                        <th>Artefacto</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($listapropietarios as $item)
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
                                <a href="{{ url('/admin/lista-propietarios/' . $item->id . '/edit') }}"
                                    title="Editar ListaPropietario"><button class="btn btn-primary btn-sm"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR</button></a>

                                <form method="POST" action="{{ url('/admin/lista-propietarios' . '/' . $item->id) }}"
                                    accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="BORRAR ListaPropietario"
                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                            aria-hidden="true"></i> BORRAR</button>
                                </form>
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
                <input type="text" oninput="this.value = this.value.toUpperCase()"  class="form-control" id="datoExtra" name="datoExtra" value="{{ old('datoExtra', $datoExtra) }}">
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

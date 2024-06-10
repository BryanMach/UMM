<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado Nacional de Arqueo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            line-height: 1.2;
        }

        .container {
            border: 1px solid black;
            padding: 20px;
            margin-top: 20px;
        }

        .header,
        .footer {
            text-align: center;
        }

        .header h5,
        .header h6 {
            margin: 0;
            font-size: 1rem;
        }

        .footer p {
            font-size: 0.85rem;
            margin: 5px 0;
        }

        .section-title {
            background-color: lightgray;
            text-align: center;
            padding: 5px;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .table {
            margin-bottom: 20px;
            border: 2px solid black;
        }

        .table-bordered td,
        .table-bordered th {
            border: 2px solid black;
            padding: 0.5rem;
        }

        th {
            background-color: rgb(209, 246, 252);
            /* Fondo celeste para la cabecera */
        }

        .fuente {
            font-family: 'Bookman Old Style';
            font-size: 24px;
        }

        .fuente1 {
            font-family: 'Bookman Old Style';
            font-size: 18px;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .table-responsive1 {
            width: 100%;
            overflow-x: auto;
        }

        .arqueo-tabla {
            width: 100%;
            border-collapse: collapse;
        }

        .arqueo-tabla thead td,
        .arqueo-tabla tbody td {
            padding: 4px 10px;
        }

        .arqueo-tabla thead strong,
        .arqueo-tabla tbody strong {
            margin-right: 10px;
        }

        .fecha {
            margin-left: 30px;
        }
    </style>
</head>

<body>
    {{-- 'propietario', 'tipo', 'material', 'artefacto', 'basesoperativa', 'cuenca',
        'certificacion','inspeccion','motor', 'datoAdicional' --}}
    <div>
        <div class="header">
            <h4 class="fuente"><strong>ESTADO PLURINACIONAL DE BOLIVIA</strong></h4>
            <h4 class="fuente"><strong>MINISTERIO DE DEFENSA</strong></h4>
            <h4 class="fuente"><strong>DIRECCIÓN GENERAL DE INTERESES MARÍTIMOS,<br> FLUVIALES, LACUSTRES Y DE MARINA
                    MERCANTE</strong>
            </h4>
            <div>
                <table align="right" border=3>
                    <thead>
                        <tr>
                            <th>N° REGISTRO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php
                                switch ($basesoperativa->idCuenca) {
                                    case '1':
                                        # code....
                                        $d = 'A';
                                        break;
                                    case '2':
                                        # code...
                                        $d = 'P';
                                        break;
                                    case '3':
                                        # code...
                                        $d = 'L';
                                        break;
                                    default:
                                        # code...
                                        $d = 'N';
                                        break;
                                }
                            @endphp
                            <td class="text-center">{{ $d }}-{{ $certificacion->nreg }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4 class="fuente"><strong>CERTIFICADO NACIONAL DE ARQUEO</strong></h4>
            <p class="text-left">Expedido en virtud de las disposiciones del Reglamento Nacional de Arqueo para Buques,
             EMBARCACIONES y
                Artefactos Navales.</p>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr class="text-center">
                        <th>NOMBRE DE LA EMBARCACIÓN</th>
                        <th>MATRICULA</th>
                        <th>PUERTO DE REGISTRO</th>
                        <th>AÑO DE CONSTRUCCIÓN</th>
                    </tr>
                    <tr class="text-center">
                        <td>{{ $artefacto->nombre }}</td>
                        <td>{{ $artefacto->matricula }}</td>
                        <td>{{ $basesoperativa->baseOperativa }}</td>
                        <td>{{ $artefacto->construccion }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <h4 class="fuente text-center"><strong>DIMENSIONES PRINCIPALES DE REGISTRO</strong></h4>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>ESLORA</th>
                        <th>MANGA</th>
                        <th>PUNTAL DE TRAZADO</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>{{ $artefacto->eslora }}</td>
                        <td>{{ $artefacto->manga }}</td>
                        <td>{{ $artefacto->puntal }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <h4 class="fuente1 text-center"><strong>LOS ARQUEOS DE LA EMBARCACIÓN SON:</strong></h4>
        </div>
        <div class="table-responsive1">
            <table class="arqueo-tabla">
                <thead>
                    <tr>
                        <td><strong>ARQUEO BRUTO</strong></td>
                        <td>{{ $artefacto->trb }} <strong>TRB</strong></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>ARQUEO NETO</strong></td>
                        <td>{{ $artefacto->trn }} <strong>TRN</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>

        <d>
            <p>Se certifica que los arqueos de esta embarcación han sido determinados de acuerdo con las disposiciones
                del Reglamento Nacional de Arqueo para Buques, Embarcaciones y Artefactos Navales, aprobadas mediante
                RM. 736.</p>
            <p class="text-left"><strong>EXPEDIDO EN: </strong>{{$basesoperativa->departamento}}, BOLIVIA<strong
                    class="fecha">
                    FECHA: </strong>{{ $certificacion->fechaEmision }}</p>
            <p>El suscrito Jefe de la Unidad de Marina Mercante declara que esta debidamente autorizado para expedir el
                presente Certificado.</p>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

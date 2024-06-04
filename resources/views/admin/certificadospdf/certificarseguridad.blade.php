<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de Seguridad</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            border: 1px solid black;
            padding: 20px;
            margin-top: 20px;
        }

        .header,
        .footer {
            text-align: center;
        }

        .section-title {
            background-color: rgb(209, 246, 252);
            text-align: center;
            padding: 5px;
        }

        .table {
            border: 2px solid black;
            margin-bottom: 2px;
            text-align: center;
        }

        .table td,
        .table th {
            padding: 0.5rem;
            border: 1px solid black;
            padding: 0;
            margin: 0;
        }

        th {
            background-color: rgb(209, 246, 252);
            /* Fondo celeste para la cabecera */
        }

        .texto {
            line-height: 1.2;
        }

        .APropietario td {
            white-space: nowrap;
        }

        .fuente {
            font-family: 'Bookman Old Style';
            font-size: 20px;
        }

        .fuente1 {
            font-family: 'Bookman Old Style';
            font-size: 15px;
        }

        .fuente2 {
            font-size: 15px;
        }

        .text-center {
            font-size: 15px;
        }
    </style>
</head>

<body>

    <div>
        <div class="header">
            <h5 class="fuente"><strong>ESTADO PLURINACIONAL DE BOLIVIA</strong></h5>
            <h6 class="fuente"><strong>MINISTERIO DE DEFENSA</strong></h6>
            <h6 class="fuente"><strong>DIRECCIÓN GENERAL DE INTERESES MARÍTIMOS, FLUVIALES, LACUSTRES Y DE MARINA
                    MERCANTE</strong>
            </h6>
            <div>
                <table align="right" border=3>
                    <thead>
                        <tr>
                            <th>N° REGISTRO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">{{ $certificado->nreg }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h5 class="fuente"><strong>CERTIFICADO DE SEGURIDAD DE LA NAVEGACION</strong></h5>
            <h6 class="fuente1"><strong>EXPEDIDO EN CUMPLIMIENTO AL D.S. Nº 3073</strong></h6>
            <h6 class="fuente1"><strong>REGLAMENTO TECNICO A LA LEY N° 165 GENERAL DE TRANSPORTE EN LA</strong></h6>
            <h6 class="fuente1"><strong>MODALIDAD DE TRANSPORTE ACUATICO, TITULO TERCERO, CAPITULO SEGUNDO ART.
                    21</strong></h6>

        </div>

        <div class="text-center">
            <table class="text-center">
                <tbody class="APropietario">
                    <tr>
                        <td>PROPIETARIO (S):</td>
                        <td colspan="3"> <strong>{{ $propietario->nombre }}</strong> </td>
                    </tr>
                    <tr>
                        <td>ANTERIOR PROPIETARIO:</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td>FECHA DE INSPECCIÓN:</td>
                        <td colspan="3"><strong>{{ $inspeccion->año }}</strong></td>
                    </tr>
                    <tr>
                        <td>LUGAR DE INSPECCIÓN:</td>
                        <td colspan="3"><strong>{{ $baseOperativa->nombreBO }}</strong></td>
                    </tr>
                    <tr>
                        <td>BASE DE OPERACIONES:</td>
                        <td colspan="3"><strong>{{ $baseOperativa->nombreBO }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><strong>NOMBRE DE LA EMBARCACIÓN</strong></th>
                        <th><strong>MATRICULA</strong></th>
                        <th><strong>INDICATIVO DE LLAMADA</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $artefacto->nombre }}</td>
                        <td>{{ $artefacto->matricula }}</td>
                        <td>.-.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><strong>SERVICIOS DE LA EMBARCACIÓN</strong></th>
                        <th><strong>TIPO</strong></th>
                        <th><strong>AÑO DE CONSTRUCCIÓN</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $artefacto->servicio }}</td>
                        <td>{{ $tipo->tipo }}</td>
                        <td>{{ $artefacto->año }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><strong>ESLORA</strong></th>
                        <th><strong>MANGA</strong></th>
                        <th><strong>PUNTAL</strong></th>
                        <th><strong>ARQUEO BRUTO</strong></th>
                        <th><strong>ARQUEO NETO</strong></th>
                        <th><strong>FRANCOBORDO</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $artefacto->eslora }}<br>MTS.</td>
                        <td>{{ $artefacto->manga }}<br>MTS.</td>
                        <td>{{ $artefacto->puntal }}<br>MTS.</td>
                        <td>{{ $artefacto->trb }}<br>UNIDAD DE REGISTRO</td>
                        <td>{{ $artefacto->trn }}<br>UNIDAD DE REGISTRO</td>
                        <td>2.75<br>mm</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><strong>TIPO Y MARCA DE<br> MOTOR</strong></th>
                        <th><strong>NÚMERO DE<br> MOTOR</strong></th>
                        <th><strong>POTENCIA <br>PROPULSIVA TOTAL</strong></th>
                        <th><strong>POTENCIA ELÉCTRICA <br> NOMINAL TOTAL</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $motor->tipo }} {{ $motor->marca }}</td>
                        <td>{{ $motor->numero }}</td>
                        <td>{{ $motor->potencia }}</td>
                        <td> .-. </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><strong>MATERIAL DEL<br> CASCO</strong></th>
                        <th><strong>PESO Y ALTURA<br> DE CUBIERTA</strong></th>
                        <th><strong>MERCANCÍAS<br> PELIGROSAS</strong></th>
                        <th><strong>NÚMERO MÁXIMO<br> DE PASAJEROS</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $material->material }}</td>
                        <td>{{ $datoAdicional->altura }} {{ $datosAdicional->peso }}</td>
                        <td>{{ $datoAdicional->merPeligrosa }}</td>
                        <td>{{ $datoAdicional->NumMaxPasajeros }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="fuente2">
            <strong>SE CERTIFICA:</strong>
            <p class="texto">
                QUE LA EMBARCACIÓN, HA SIDO OBJETO DE INSPECCIONES DE CONFORMIDAD CON LO PRESCRITO EN EL REGLAMETO DE
                INSPECCIONES PARA EMBARCACIONES MERCANTES Y QUE DICHA INSPECCION, HA PUESTO DE MANIFIESTO QUE EL ESTADO
                DE CASCO, LA ESTRUCTURA, MAQUINAS Y EL EQUIPO ES SATISFACTORIO Y QUE LA EMBARCACION CUMPLE CON LAS
                PRESCRIPCIONES PERTINENTES EN LAS REGLAMENTACIONES VIGENTES.
                <br>EL PRESENTE CERTIFICADO ES VÁLIDO POR <strong>CINCO AÑOS</strong>, CONFORME AL DECRETO SUPREMO N°
                3073, A
                PARTIR DEL:
                {{ $certificado->fechaEmision }} <br>
                DEBIENDO SOMETERSE A LAS INSPECCIONES ANUALES OBLIGATORIAS EN LAS FECHAS ESTABLECIDAS POR LA AUTORIDAD
                COMPETENTE.
            </p>
            <p class="text-right"><strong>LUGAR Y FECHA:</strong> {{ $datoAdicional->lugar }},
                {{ $certificado->fechaEmision }}</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

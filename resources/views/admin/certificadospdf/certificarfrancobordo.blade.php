<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de Asignación de Francobordo</title>
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

        .small-text {
            font-size: 0.85rem;
        }

        .fuente {
            font-family: 'Bookman Old Style';
            font-size: 24px;
        }

        .wide-spacing td {
            padding: 20px;
        }
    </style>
</head>

<body>

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
<<<<<<< HEAD
                            <td class="text-center">{{ $certificado->nreg }}</td>
=======
                            <td class="text-center">{{ $certificados->nreg }}</td>
>>>>>>> 707f60b686a5b92c334831ea6ac85d501e7bfb58
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4 class="fuente"><strong>CERTIFICADO DE ASIGNACIÓN DE FRANCOBORDO</strong></h4>
            <h4 class="fuente"><strong>PARA LAS EMBARCACIONES NACIONALES</strong></h4>
            <p class="text-left">Expedido en virtud de las disposiciones del Reglamento Nacional para la
                Asignación de Francobordo para embarcaciones mayores a 10 TRB. de navegación interior.</p>

        </div>
        <div class="text-center">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th><strong>NOMBRE DE LA EMBARCACIÓN</strong></th>
                        <th class="align-middle"><strong>MATRICULA</strong></th>
                        <th><strong>PUERTO DE REGISTRO</strong></th>
                        <th><strong>Eslora (L) definida en el Art. 3.3</strong></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
<<<<<<< HEAD
                        <td class="align-middle">{{ $artefacto->nombre }}</td>
                        <td class="align-middle">{{ $artefacto->matricula }}</td>
                        <td>{{ $baseOperativa->nombreBO }}</td>
=======
                        <td class="align-middle">{{ $artefactos->nombre }}</td>
                        <td class="align-middle">{{ $artefacto->matricula }}</td>
                        <td>{{ baseOperativa->nombreBO }}</td>
>>>>>>> 707f60b686a5b92c334831ea6ac85d501e7bfb58
                        <td class="align-middle">{{ $artefacto->eslora }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tabla text-center">
            <table>
                <tbody>
                    <tr>
                        <td>Francobordo asignado como:</td>
                        <td>Tipo de Embarcación:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Embarcación nueva ( )</td>
                        <td>Embarcación Autopropulsada ( )</td>
                        <td>Tanque ( )</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Cerrada ( X )</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Abierta ( )</td>
                    </tr>
                    <tr>
                        <td>Embarcación existente ( X )</td>
                        <td>Embarcación Sin Propulsión ( X )</td>
                        <td>Tanque ( )</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Cerrada ( )</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Abierta ( )</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="small-text">Francobordo asignado (FB) medido desde la línea de cubierta 243,75 mm</p>
        <div>





        </div>
        <div style="height: 220px;"></div>

        <div class="footer">
            <p class="text-left">Se certifica que esta embarcación ha sido inspeccionada y que su francobordo ha sido
                asignado y marcado
                de acuerdo con lo dispuesto en el “Reglamento Nacional para la Asignación de Francobordo”, aprobado por
                RM. 736. <br>
                Este certificado, es emitido el <strong>{{ $certificado->fechaEmision }}</strong>, es válido hasta el
                <strong>{{ $certificado->fechaVecimiento }}</strong><br>

                Expedido en:
                {{ $certificado->fechaEmision }}
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

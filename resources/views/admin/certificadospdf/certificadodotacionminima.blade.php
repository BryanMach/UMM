<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de Dotación Mínima de Seguridad</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header,
        .section-title {
            text-align: center;
            font-weight: bold;
        }

        .section {
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 5px;
        }

        p {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container certificate">
        <div class="row">
            <div class="col-12 header">
                <img src="{{ asset('images/escudoEd.png') }}" alt=""
                    style="width: 250px !important; height: auto !important;">
                <p style="margin-bottom: -5px">ESTADO PLURINACIONAL DE BOLIVIA</p>
                <p style="margin-top: -5px; margin-bottom: 0px">MINISTERIO DE DEFENSA</p>
                <p style="margin-top: 0px; line-height: 1.2; margin-left:-9%">DIRECCIÓN GENERAL DE INTERESES
                    MARÍTIMOS,
                    FLUVIALES,
                    LACUSTRES Y MARINA
                    MERCANTE</p>
                <p>CERTIFICADO DE DOTACIÓN MÍNIMA DE SEGURIDAD</p>
                <table class="text-center"
                    style="border-collapse: collapse;
            margin-right: 0; 
            border: 2px solid black; margin-left: auto;  width: 200px;">
                    <thead>
                        <tr>
                            <th
                                style=" border: 2.5px solid black;
            padding: 2px;  background-color: #ADD8E6; font-weight: bold; font-size: 14px">
                                Nº DE REGISTRO</th>
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
                            <th
                                style=" border: 2.5px solid black; 
            padding: 2px; font-weight: normal; font-size:14px;">
                                {{ $d }}-{{ $certificacion->nreg }}</th>
                        </tr>
                    </tbody>
                </table>
                <p class="text-left"
                    style="font-weight: normal; font-size: 18px; margin-left:-11%; margin-right:-8%; margin-bottom:0px; line-height: 1.2; ">
                    Expedido en virtud
                    de las
                    disposiciones
                    legales de la
                    Autoridad
                    Marítima, Fluvial y
                    Lacustre de
                    Bolivia en materia Naviero-Mercante.</p>
            </div>
        </div>

        <div class="row section">
            <div class="col-12">
                <table class="table table-bordered"
                    style="width: 700px; margin-left:-11%; font-size: 15px; margin-top:-10px;  border: 1.1px solid #424242; margin-bottom: 0px">
                    <tbody>
                        <tr>
                            <th colspan="2"
                                style="background-color: #ADD8E6; padding: 0px; padding-left: 6px; border: 1.1px solid #424242;">
                                1. CARACTERÍSTICAS DE LA EMBARCACIÓN
                            </th>
                        </tr>
                        <tr>
                            <th scope="row"
                                style="width: 50%; padding: 0px; padding-left: 6px; font-weight: normal; border: 1.1px solid #424242;">
                                1.1 NOMBRE DE
                                LA
                                EMBARCACIÓN</th>
                            <td style="width: 50%; padding: 0px; border: 1.1px solid #424242;" class="text-center">
                                {{ $artefacto->nombre }}</td>
                        </tr>
                        <tr>
                            <th scope="row"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal; border: 1.1px solid #424242;">
                                1.2 PUERTO DE
                                REGISTRO</th>
                            <td style="width: 50%; padding: 0px;border: 1.1px solid #424242;" class="text-center">
                                {{ $basesoperativa->baseOperativa }}</td>
                        </tr>
                        <tr>
                            <th scope="row"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                1.3 BASE DE
                                OPERACIONES</th>
                            <td style="width: 50%; padding: 0px;border: 1.1px solid #424242;" class="text-center">
                                {{ $basesoperativa->baseOperativa }}</td>
                        </tr>
                        <tr>
                            <th scope="row"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                1.4 MATRÍCULA</th>
                            <td style="width: 50%; padding: 0px;border: 1.1px solid #424242;" class="text-center">
                                {{ $artefacto->matricula }}</td>
                        </tr>
                        <tr>
                            <th scope="row"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                1.5 TIPO DE
                                EMBARCACIÓN</th>
                            <td style="width: 50%; padding: 0px;border: 1.1px solid #424242;" class="text-center">
                                {{ $tipo->tipo }}</td>
                        </tr>
                        <tr>
                            <th scope="row"
                                style="white-space: nowrap; width: 1%; padding: 0px; padding-left: 6px;font-weight: normal; border: 1.1px solid #424242;">
                                1.6 TRB / TRN</th>
                            <td style="padding: 0;">
                                <table style="width: 100%; border-collapse: collapse;">
                                    <tr>
                                        <td
                                            style="width: 50%; text-align: center; border: none; border-right: 1px solid #424242; padding: 0;">
                                            {{ $artefacto->trb }}</td>
                                        <td style="width: 50%; text-align: center; border: none; padding: 0;">
                                            {{ $artefacto->trn }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <th scope="row"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border-right: 1.1px solid #424242;">
                                1.7 POTENCIA DE
                                PROPULSIÓN</th>
                            <td style="width: 50%; padding: 0px;border: 1.1px solid #424242;" class="text-center">
                                {{ $motor->potencia }} - HP
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"
                                style="white-space: nowrap; width: 1%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                EMBARCACIÓN SOMETIDA A
                                INSPECIONES PERIÓDICAS</th>
                            <td style="padding: 0px;border: 1.1px solid #424242;" class="text-center">SI</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <p
            style="font-weight: normal; font-size: 15px; margin-left:-12%; margin-right:-18%; margin-bottom:0px; text-align: justify; line-height: 1.2; margin-top: 7px">
            LA
            EMBARCACIÓN NOMINADA EN ESTE DOCUMENTO ESTA CONSIDERADA CON DOTACIÓN DE SEGURIDAD, DEBIENDO PARA NAVERGAR
            LLEVAR A BORDO LA DOTACIÓN COMPLETA EN NÚMERO Y CARGOS ESPECIFICADOS EN LA NOMINA DE TRIPULACIÓN.
        </p>

        <div class="row section">
            <div class="col-12">
                <table class="table table-bordered"
                    style="width: 700px; margin-left:-11%; font-size: 15px; margin-top:-12px;  border: 1.1px solid #424242; margin-bottom: 0px;">
                    <tr>
                        <th colspan="3"
                            style="background-color: #ADD8E6; padding: 0px; padding-left: 6px; border: 1.1px solid #424242;">
                            2. NOMINA DE TRIPULACIÓN
                        </th>
                    </tr>
                    <thead>
                        <tr>
                            <th style="width: 50%; padding: 0px; padding-left: 6px; border: 1.1px solid #424242;">CARGO
                            </th>
                            <th style="width: 50%; padding: 0px; padding-left: 6px; border: 1.1px solid #424242;">
                                TRIPULACIÓN MÍNIMA</th>
                            <th style="width: 50%; padding: 0px; padding-left: 6px; border: 1.1px solid #424242;">
                                TRIPULACIÓN COMPLETA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                CAPITÁN/COMANDANTE</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (1) UNO</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (1) UNO</td>
                        </tr>
                        <tr>
                            <td
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                OFICIAL DE CUBIERTA</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (1) UNO</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (2) DOS</td>
                        </tr>
                        <tr>
                            <td
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                TIMONEL</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (1) UNO</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (2) DOS</td>
                        </tr>
                        <tr>
                            <td
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                MAQUINISTA</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (1) UNO</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (2) DOS</td>
                        </tr>
                        <tr>
                            <td
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                COMUNICACIONES</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (1) UNO</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (2) DOS</td>
                        </tr>
                        <tr>
                            <td
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                ELECTRICISTAS</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (1) UNO</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (2) DOS</td>
                        </tr>
                        <tr>
                            <td
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                MÉDICO Y/O ENFERMEROS</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (1) UNO</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (1) UNO</td>
                        </tr>
                        <tr>
                            <td
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                MARINEROS</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (2) DOS</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (6) SEIS</td>
                        </tr>
                        <tr>
                            <td
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                COCINEROS</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (1) UNO</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                (1) UNO</td>
                        </tr>
                        <tr>
                            <td
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: bold;border: 1.1px solid #424242;">
                                OTROS</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: bold;border: 1.1px solid #424242;">
                                (10) DIEZ</td>
                            <td class="text-center"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: bold;border: 1.1px solid #424242;">
                                (17) DIECISIETE</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row section">
            <div class="col-12">
                <table class="table table-bordered"
                    style="width: 700px; margin-left:-11%; font-size: 15p   x; margin-top:-7px;  border: 1.1px solid #424242; margin-bottom: 0px">
                    <tbody>
                        <tr>
                            <th
                                style="background-color: #ADD8E6; padding: 0px; padding-left: 6px; border: 1.1px solid #424242;">
                                3. ÁREA DE NAVEGACIÓN</th>
                        </tr>
                        <td style="width: 50%; padding: 0px; padding-left: 6px;font-weight: bold;border: 1.1px solid #424242;"
                            class="text-center">
                            {{ $cuenca->cuenca }}</td>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row section">
            <div class="col-12">
                <table class="table table-bordered"
                    style="width: 700px; margin-left:-11%; font-size: 15px; margin-top:-7px;  border: 1.1px solid #424242;">

                    <tbody>
                        <tr>
                            <th colspan="2"
                                style="background-color: #ADD8E6; padding: 0px; padding-left: 6px; border: 1.1px solid #424242;">
                                4. REQUERIMINETOS O CONDICIONES ESPECIALES
                            </th>
                        </tr>
                        <tr>
                            <td
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                FECHA DE REGISTRO: <span style="font-weight: bold;">28/ABRIL/2023</span>
                            </td>
                            <td
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                FECHA DE EXPIRACIÓN: <span style="font-weight: bold;">28/ABRIL/2023</span></td>
                        </tr>
                        <tr>
                            <td colspan="2"
                                style="width: 50%; padding: 0px; padding-left: 6px;font-weight: normal;border: 1.1px solid #424242;">
                                LUGAR Y FECHA DE EMISIÓN: <span
                                    style="font-weight: bold;">{{ $basesoperativa->departamento }},
                                    {{ $certificacion->fechaEmision }}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

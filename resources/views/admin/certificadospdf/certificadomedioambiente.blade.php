<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado Medio Ambiente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">



    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .certificate {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            background-size: cover;
            position: relative;
        }

        .certificate h1 {
            font-size: 28px;
            font-weight: bold;
            font-family: "Anton", sans-serif;
        }

        .certificate h2 {
            font-size: 20px;
            margin: 20px 0;
        }

        .certificate h3 {
            font-size: 28px;
            font-weight: bold;
            font-family: "Anton", sans-serif;
        }

        .certificate p {
            font-size: 16px;
            line-height: 1.6;
        }

        .certificate .footer {
            margin-top: 30px;
            font-size: 14px;
        }

        .certificate .serial-number {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 16px;
            font-weight: bold;
        }

        .certificate .header-logo {
            margin-bottom: 20px;
        }

        h1 {
            font-family: 'Anton', Impact, sans-serif !important;

        }
    </style>
</head>

<body>
    <div class="certificate">
        <div class="imagen" style="">
            <img src="{{ asset('images/escudoEd.png') }}" alt=""
                style="width: 250px !important; height: auto !important;">
        </div>

        <h1 style="margin-bottom: 5px;">MINISTERIO DE DEFENSA</h1>
        <h2 style="font-family: 'Berkshire Swash', serif; font-style: italic; font-size: 28px; margin-top: 5px; ">
            Dirección General de
            Intereses Marítimos,
            Fluviales, Lacustres y de Marina Mercante</h2>
        <h3>LA UNIDAD DE MARINA MERCANTE OTORGA EL PRESENTE CERTIFICADO DE:</h3>
        <h2 style="font-size: 28px;">PREVENCIÓN DE LA CONTAMINACIÓN AL MEDIO AMBIENTE ACUÁTICO <br>POR EFECTOS DE LA
            NAVEGACIÓN</h2>
        <h3 class="text-left"
            style="font-family: 'Berkshire Swash', serif; font-style: italic; font-weight: bold; font-size: 28px;">A la
            embarcación tipo
            {{ ucfirst(strtolower($tipo->tipo)) }}:</h3>
        <h2 style="font-size: 32px;"> "{{ $artefacto->nombre }}"</h2>
        <p
            style="font-family: 'Berkshire Swash', serif; font-style: italic; font-size: 22px; text-align: justify; hyphens: auto; word-wrap: break-word;">
            Por haber cumplido satisfactoriamente lo establecido en el "Reglamento Nacional de Inspecciones Técnicas",
            aprobado por R.M. 736, Capítulo IV Ejecución de la Inspección Técnica, artículo 23 Inc. g). Prevención de la
            contaminación del medio acuático.
        </p>
        <p style="font-family: 'Berkshire Swash', serif; font-style: italic; font-size: 22px;">El presente Certificado
            es válido por el
            lapso de un año.</p>
        <div class="footer">
            <p class="text-right" style="font-family: 'Berkshire Swash', serif; font-style: italic; font-size: 22px;">
                @isset($basesoperativa->departamento)
                    {{ $basesoperativa->departamento }}
                @else
                    Bolivia
                @endisset
                , {{ ucfirst(strtolower($certificacion->fechaEmision)) }}
            </p>

        </div>
    </div>
</body>

</html>

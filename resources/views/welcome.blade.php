<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@600&family=Poetsen+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>INICIO</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Righteous&family=Work+Sans:wght@100;300;400;600;800&display=swap');

    * {
        box-sizing: border-box;
        font-family: 'Work Sans';
        margin: 0;
        padding: 0;
    }

    html {
        /* me permite deslizar cuando hago clic en los links del menu */
        scroll-behavior: smooth;
    }

    /* MENU */
    .contenedor-header {
        background: #1e2326;
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 99;
        transition: top 0.3s;
    }

    .contenedor-header header {
        max-width: 1100px;
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
    }

    .contenedor-header header .logo a {
        font-family: 'Righteous';
        font-size: 36px;
        color: #1CB698;
        text-decoration: none;
    }

    .contenedor-header header ul {
        display: flex;
        list-style: none;
        flex-wrap: nowrap;
        justify-content;
        align-items: center;

    }

    .contenedor-header header nav ul li {
        margin-right: 10px;
        /* Espacio entre elementos del menú */
    }

    .contenedor-header header nav ul li:last-child {
        margin-right: 0px;
        /* Elimina el margen derecho del último elemento */
    }

    .contenedor-header header nav ul li a {
        color: #fff;
        padding: 3px;
        transition: .5s;
        text-decoration: none;
    }


    .contenedor-header header nav ul li a:hover {
        color: #1CB698;
    }

    .nav-responsive {
        background-color: #1CB698;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        display: none;
    }

    /* SECCION I N I C I O */
    .inicio {
        background:
            linear-gradient(to top, rgba(5, 145, 225, 0.8), rgba(183, 198, 208, 0.8)),
            url('{{ asset('images/Logotipo UMM-2024 - Transp.png') }}');
        /* Usa asset() para la URL correcta */
        background-size: cover;
        /* También puedes probar con 'contain' */
        background-repeat: no-repeat;
        background-position: center;
        height: 100vh;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        /* Centra el contenido dentro de la sección */
        text-align: center;
        /* Centra el texto */
        padding: 20px;
        /* Añade padding si es necesario */
    }



    .inicio .contenido-banner {
        padding: 30px;
        background-color: #404d54;
        width: 60%;
        height: 80%;
        margin: auto;
        text-align: center;
        border-radius: 40px;
    }

    .inicio .contenido-banner h1 {
        margin-top: 50px;
        font-size: 42px;
        font-family: 'Righteous';
        font-weight: bold;
    }

    .inicio .contenido-banner h2 {
        font-size: 25px;
        font-weight: normal;
    }


    .sobremi {
        background-color: #1e2326;
        color: #fff;
        padding: 50px 20px;
    }

    .sobremi .contenido-seccion {
        max-width: 1100px;
        margin: auto;
    }

    .sobremi h2 {
        font-size: 48px;
        font-family: 'Righteous';
        text-align: center;
        padding: 20px 0;

    }

    .sobremi .contenido-seccion p {
        font: 18px;
        line-height: 22px;
        margin-bottom: 20px;
    }

    .sobremi .contenido-seccion p span {
        color: #1CB698;
        font-weight: bold;
    }

    .sobremi .fila {
        display: flex;
    }

    .sobremi .fila .col {
        width: 50%;
    }

    .sobremi .fila .col h3 {
        font-size: 28px;
        font-family: 'Righteous';
        margin-bottom: 25px;
    }

    .sobremi .fila .col ul {
        list-style: none;
    }

    .sobremi .fila .col ul li {
        margin: 12px 0;
    }

    .sobremi .fila .col ul li strong {
        display: inline-block;
        color: #1CB698;
        width: 130px;
    }

    .sobremi .fila .col ul li span {
        background-color: #1CB698;
        padding: 3px;
        font-weight: bold;
        border-radius: 5px;
    }

    .sobremi .fila .col .contenedor-intereses {
        display: flex;
        flex-wrap: wrap;
    }

    .sobremi .fila .col .contenedor-intereses .interes {
        width: 100px;
        height: 100px;
        background-color: #252A2E;
        border-radius: 10px;
        margin: 0 15px 15px 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: .3s;
    }

    .sobremi .fila .col .contenedor-intereses .interes:hover {
        background-color: #1CB698;
    }

    .sobremi .fila .col .contenedor-intereses .interes i {
        font-size: 30px;
        margin-bottom: 10px;
    }

    .sobremi button {
        cursor: pointer;
        background-color: transparent;
        border: 2px solid #fff;
        width: fit-content;
        display: block;
        margin: 20px auto;
        padding: 10px 22px;
        font-size: 16px;
        color: #fff;
        position: relative;
        z-index: 10;
    }

    .sobremi button .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background-color: #1CB698;
        z-index: -1;
        transition: 1s;
    }

    .sobremi button:hover .overlay {
        width: 100%;
    }

    /* SECCION S K I L L S */
    .skills {
        background-color: #252A2E;
        color: #fff;
        padding: 50px 20px;
    }

    .skills .contenido-seccion {
        max-width: 1100px;
        margin: auto;
    }

    .skills h2 {
        font-size: 48px;
        font-family: 'Righteous';
        text-align: center;
        padding: 20px 0;

    }

    .skills .fila {
        display: flex;
    }

    .skills .fila .col {
        width: 50%;
        padding: 0 20px;
    }

    .skills .fila .col h3 {
        font-size: 28px;
        font-family: 'Righteous';
        margin-bottom: 25px;
    }

    .skills .skill>span {
        display: block;
        margin-bottom: 10px;
        font-size: 24px;
    }

    .skills .skill .barra-skill {
        height: 8px;
        width: 80%;
        background-color: #131517;
        position: relative;
        margin-bottom: 30px;
    }

    .skills .skill .progreso {
        background-color: #1CB698;
        position: absolute;
        top: 0;
        left: 0;
        height: 8px;
    }

    .skills .skill .barra-skill span {
        position: absolute;
        height: 40px;
        width: 40px;
        background-color: #1CB698;
        border-radius: 50px;
        line-height: 40px;
        text-align: center;
        top: -17px;
        right: -15px;
        font-size: 30px;
    }

    /* SECCION CURRICULUM */
    .curriculum {
        background-color: #1e2326;
        color: #fff;
        padding: 50px 20px;
    }

    .curriculum .contenido-seccion {
        max-width: 1100px;
        margin: auto;
    }

    .curriculum h2 {
        font-size: 48px;
        font-family: 'Righteous';
        text-align: center;
        padding: 20px 0;

    }

    .curriculum .fila {
        display: flex;
        justify-content: space-between;
    }

    .curriculum .fila .col {
        width: 49%;
        padding: 0 20px;
    }

    .curriculum .fila .col h3 {
        font-size: 28px;
        font-family: 'Righteous';
        margin-bottom: 25px;
    }

    .curriculum .fila .izquierda {
        border-right: 2px solid #252A2E;
    }

    .curriculum .fila .derecha {
        border-left: 2px solid #252A2E;
    }

    .curriculum .fila .item {
        padding: 25px;
        margin-bottom: 30px;
        background-color: #252A2E;
        position: relative;
    }

    .curriculum .fila .item h4 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .curriculum .fila .item .casa {
        color: #1CB698;
        font-size: 22px;
        font-weight: bold;
        display: block;
    }

    .curriculum .fila .item .fecha {
        display: block;
        color: #1CB698;
        margin-bottom: 10px;
    }

    .curriculum .fila .item p {
        line-height: 24px;
    }

    .curriculum .fila .izq {
        border-right: 2px solid #1CB698;
        margin-right: 20px;
    }

    .curriculum .fila .der {
        border-left: 2px solid #1CB698;
        margin-left: 20px;
    }

    .curriculum .fila .item .conectori {
        height: 2px;
        background-color: #1CB698;
        width: 47px;
        position: absolute;
        top: 50%;
        right: -47px;
        z-index: 5;
    }

    .curriculum .fila .item .conectori .circuloi {
        display: block;
        height: 10px;
        width: 10px;
        border-radius: 50%;
        background-color: #1CB698;
        float: right;
        position: relative;
        bottom: 4px;
    }

    .curriculum .fila .item .conectord {
        height: 2px;
        background-color: #1CB698;
        width: 47px;
        position: absolute;
        top: 50%;
        left: -47px;
        z-index: 5;
    }

    .curriculum .fila .item .conectord .circulod {
        display: block;
        height: 10px;
        width: 10px;
        border-radius: 50%;
        background-color: #1CB698;
        float: left;
        position: relative;
        bottom: 4px;
    }

    /* SECCION PORTFOLIO */
    .portfolio {
        background-color: #252A2E;
        color: #fff;
        padding: 50px 20px;
    }

    .portfolio .contenido-seccion {
        max-width: 1100px;
        margin: auto;
    }

    .portfolio h2 {
        font-size: 48px;
        font-family: 'Righteous';
        text-align: center;
        padding: 20px 0;
    }

    .portfolio .galeria {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .portfolio .galeria .proyecto {
        position: relative;
        max-width: 340px;
        height: fit-content;
        margin: 10px;
        cursor: pointer;
    }

    .portfolio .galeria .proyecto img {
        width: 100%;
        display: block;
    }

    .imagen-seccion {
        text-align: center;
        margin-top: 20px;
    }

    .imagen-seccion img {
        max-width: 80%;
        height: auto;
        border-radius: 10px;
        /* Ajusta el radio del borde según tu preferencia */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Agrega sombra a la imagen */
    }

    .grafico-seccion {
        margin-top: 20px;
        text-align: center;
        margin-right: 10%;
        margin-top: 5%;
    }

    #graficoTorta {
        max-width: 100%;
        width: 450px;
        height: 450px;
        background-color: #f4f4f9;
    }


    .portfolio .galeria .proyecto .overlay {
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
        text-align: center;
        background: linear-gradient(rgba(28, 182, 152, .8), rgba(28, 182, 152, .8));
        display: flex;
        flex-direction: column;
        justify-content: center;
        transition: 1s;
        font-size: 18px;
        letter-spacing: 3px;
        opacity: 0;
    }

    .portfolio .galeria .proyecto .overlay h3 {
        margin-bottom: 20px;
        transition: 1s;
    }

    .portfolio .galeria .proyecto .overlay:hover {
        opacity: 1;
    }

    .portfolio .galeria .proyecto .overlay:hover h3 {
        margin-bottom: 0px;
    }

    /* SECCION CONTACTO */
    .contacto {
        background:
            linear-gradient(to top, rgba(5, 145, 225, 0.8), rgba(183, 198, 208, 0.8)),
            url('{{ asset('images/fondo2.png') }}');
        background-color: #1e2326;
        color: #fff;
        padding: 50px 0;
    }

    .contacto .contenido-seccion {
        max-width: 1100px;
        margin: auto;
    }

    .contacto h2 {
        font-size: 48px;
        /*font-family: 'Righteous';*/
        text-align: center;
        padding: 20px 0;
    }

    .contacto .fila {
        display: flex;
    }

    .contacto .col {
        width: 50%;
        padding: 10px;
        position: relative;
    }

    .contacto .col input,
    .contacto .col textarea {
        display: block;
        width: 100%;
        padding: 18px;
        border: none;
        margin-bottom: 20px;
        background-color: #252A2E;
        color: #fff;
        font-size: 18px;
    }

    .contacto button {
        cursor: pointer;
        background-color: transparent;
        border: 2px solid #fff;
        width: fit-content;
        display: block;
        margin: 20px auto;
        padding: 10px 22px;
        font-size: 16px;
        color: #fff;
        position: relative;
        z-index: 10;
    }

    .contacto button .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background-color: #1CB698;
        z-index: -1;
        transition: 1s;
    }

    .contacto button:hover .overlay {
        width: 100%;
    }

    .contacto .col img {
        width: 100%;
    }

    .contacto .col .info {
        position: absolute;
        top: 40%;
        background-color: #252A2E;
        padding: 20px;
        max-swidth: 350px;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 25px;
    }

    .contacto .col .info ul {
        list-style: none;
    }

    .contacto .col .info ul li {
        margin-bottom: 20px;
        font-family: "Poetsen One", sans-serif;
    }

    .contacto .col .info ul li i {
        color: #1CB698;
        display: inline-block;
        margin-right: 20px;
    }

    footer {
        background-color: #252A2E;
        color: #fff;
        padding: 50px 0 30px 0;
        text-align: center;
        position: relative;
        width: 100%;
    }

    footer .redes {
        margin-bottom: 20px;
    }

    footer .redes a {
        color: #fff;
        display: inline-block;
        text-decoration: none;
        border: 1px solid #fff;
        border-radius: 100%;
        width: 42px;
        height: 42px;
        line-height: 42px;
        margin: 40px 5px;
        font-size: 20px;
        transition: .3s;
    }

    footer .arriba {
        display: block;
        width: 50px;
        height: 50px;
        background-color: #1CB698;
        color: #fff;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: -25px;
        border-radius: 50%;
        line-height: 50px;
        font-size: 18px;
    }

    /* SECCION RESPONSIVE */
    @media screen and (max-width:980px) {
        nav {
            display: none;
        }

        .nav-responsive {
            display: block;
        }

        nav.responsive {
            display: block;
            position: absolute;
            right: 0;
            top: 75px;
            background-color: #252A2E;
            width: 180px;
        }

        nav.responsive ul {
            display: block !important;
        }

        nav.responsive ul li {
            border-bottom: 1px solid #fff;
            padding: 10px;
        }
    }

    @media screen and (max-width:700px) {
        .sobremi .fila {
            display: block;
        }

        .sobremi .fila .col {
            width: fit-content;
        }

        .skills .fila {
            display: block;
        }

        .skills .fila .col {
            width: 100%;
        }

        .curriculum .fila {
            display: block;
        }

        .curriculum .fila .col {
            width: 90%;
        }

        .curriculum .fila .derecha {
            margin-left: 20px;
        }

        .portfolio .galeria {
            display: block;
            width: 100%;
        }

        .portfolio .galeria .proyecto {
            max-width: 100%;
        }

        .portfolio .galeria .proyecto img {
            width: 100%;
        }

        .contacto .fila {
            display: block;
        }

        .contacto .fila .col {
            width: 100%;
        }

    }
</style>

<body>
    <!-- MENU ENCABEZADO -->
    <div class="contenedor-header">
        <header>
            <img src="{{ asset('images/Logotipo UMM-2024 - Transp.png') }}" style="height: 100px; margin-left: -15%">
            <div class="logo" style="margin-left: 5%">
                <a href="#">
                    UNIDAD MARINA MERCANTE
                </a>
            </div>
            <nav id="nav">
                <ul>
                    <li class="text-center"><a href="#sobremi" onclick="seleccionar()">QUIENES SOMOS</a></li>
                    <li class="text-center"><a href="#skills" onclick="seleccionar()">SERVICIOS</a></li>
                    <li class="text-center"><a href="#curriculum" onclick="seleccionar()">EMBARCACIONES CERTIFICADAS</a>
                    </li>
                    <li class="text-center"><a href="#contacto" onclick="seleccionar()">CONTACTO</a></li>
                    <li class="text-center"><a href="http://localhost/UMM/public/login" style="margin-left: 150%">
                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    {{-- @php
                                        use App\Models\Usuarios;

                                        $usuarios = Usuarios::findOrFail(Auth::user()->id);
                                        dd($usuarios);
                                    @endphp --}}

                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                            class="text-sm text-gray-700 dark:text-gray-500 underline">Panel</a>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="text-sm text-gray-700 dark:text-gray-500 underline">Ingresar</a>
                                    @endauth
                                </div>
                            @endif
                    </li>
                </ul>
            </nav>
            <div class="nav-responsive" onclick="mostrarOcultarMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>
        </header>
    </div>

    <!-- SECCION INICIO -->
    <section id="inicio" class="inicio">
        <div class="contenido-banner">
            <h1>UNIDAD MARINA MERCANTE</h1>
            <h2>
                LA UNIDAD DE MARINA MERCANTE ES UN ÓRGANISMO TÉCNICO ESPECIALIZADO,
                RESPONSABLE DE VELAR POR LA SEGURIDAD DE LA NAVEGACIÓN, SALVAGUARDA DE LA VIDA
                HUMANA Y PREVENCIÓN DE LA CONTAMINACIÓN DEL MEDIO AMBIENTE ACUÁTICO POR
                EFECTOS DE LA NAVEGACIÓN A TRAVÉS DEL REGISTRO DE BUQUES; EFECTUANDO EL REGISTRO
                DE LÍNEAS NAVIERAS, AGENCIAS NAVIERAS, FORWARDERS, BROKER, ASTILLEROS NAVALES,
                CARPINTERÍAS DE RIBERA, COOPERATIVAS, ASOCIACIONES Y OTRAS AFINES A LA ACTIVIDAD
                NAVIERO-MERCANTE, CONTRIBUYENDO CON EL DESARROLLO DE LOS INTERESES MARÍTIMOS,
                FLUVIALES, LACUSTRES Y MARINA MERCANTE DEL ESTADO.

            </h2>
        </div>
        <div class="grafico-seccion">
            <h5 style="color: #131517; font-weight: bold">Cuencas registradas</h5>
            <canvas id="graficoTorta" width="450" height="450"></canvas>
        </div>
    </section>

    <!-- SECCION SOBRE MI -->
    <section id="sobremi" class="sobremi">
        <div class="contenido-seccion">
            <h2>Quienes Somos</h2>
            <div class="fila">
                <div class="col izquierda">
                    <h3>Misión</h3>
                    <div class="item izq">
                        <p>Promover, fomentar y normar toda actividad de la marina mercante en los ámbitos marítimo,
                            fluvial y lacustre, velar por la seguridad de la navegación, la vida humana y evitar la
                            contaminación del medio acuático, a fin de contribuir al cumplimiento de la misión de la
                            DGIMFLMM.</p>

                    </div>
                </div>

                <div class="col derecha">
                    <h3>Visión</h3>
                    <div class="item der">
                        <p>Constituirse en el ente rector que administre y norme la actividad de marina mercante a nivel
                            nacional e internacional.</p>
                        <div class="conectord">
                            <div class="circulod"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="imagen-seccion">
            <img src="{{ asset('images/esquema.jpg') }}" alt="Descripción de la imagen">
        </div>
    </section>

    <!-- SECCION SKILLS -->
    <section id="skills" class="curriculum">
        <div class="contenido-seccion">
            <h2>Servicios</h2>
            <div class="fila">
                <div class="col izquierda">
                    <div class="item izq">
                        <span class="casa">Carnetizacíon</span>
                        <p>La unidad marina mercante es la entidad responsable de expedir los carnets
                            de habilitacion para el personal que trabaja en el ámbito maritimo, fluvial
                            y lacustre. Estos carnets son documentos esenciales que certifican la
                            identidad y competencia del personal mercante y sus embarcaciones,
                            garantizando así que cumplen con los requisitos y estándares necesarios para
                            desempeñar sus funciones a bordo de los buques, embarcaciones y artefactos
                            navales.</p>
                        {{-- libretas de embarque --}}
                        <div class="conectori">
                            <div class="circuloi"></div>
                        </div>
                    </div>
                </div>

                <div class="col derecha">
                    <div class="item der">
                        <span class="casa">Certificaciones</span><br>
                        <p>La unidad marina mercante es la entidad responsable de realizar el registro de buques,
                            EMBARCACIONES y artefactos navales, emitiendo los correspondientes Certificados de Registro
                            y Estatutarios en el ámbito nacional e internacional. Asi mismo emite certificados
                            Estatutarios de
                            privilegios marítimos, libretas de embarco y otros de conformidad a
                            disposiciones legales vigentes</p>
                        <div class="conectord">
                            <div class="circulod"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCION CURRICULUM -->
    <section class="skills" id="curriculum">
        <div class="contenido-seccion">
            <h2>Embarcaciones certificadas</h2>
            <table class="table table-md table-dark text-center">
                <thead>
                    <tr>
                        <th scope="col">Embarcacion</th>
                        <th scope="col">NÚMERO DE REGISTRO</th>
                        <th scope="col">Cuenca</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($artefactos as $artefacto)
                        <tr>
                            <th scope="row">{{ $artefacto->nombre }}</th>
                            @foreach($artefacto->certificado as $certificado)
                                    @if($certificado->tipoC==1)
                                    <td>
                                        @switch($artefacto->baseoperativa->cuenca->id)
                                            @case('1')
                                                L-{{ $certificado->nreg }}
                                                @break
                                            @case('2')
                                                p-{{ $certificado->nreg }}
                                                @break
                                            @case('3')
                                                A-{{ $certificado->nreg }}
                                                @break
                                            @default
                                                
                                        @endswitch
                                                
                                            
                                        
                                    </td>
                                    @endif
                                    @endforeach
                            <td>{{ $artefacto->baseoperativa->cuenca->cuenca }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>


    </section>

    <!-- SECCION CONTACTO -->
    <section id="contacto" class="contacto">
        <div class="contenido-seccion">
            <h2>CONTACTO</h2>
            @foreach ($jefe as $item)
                <div class="fila">
                    <!-- Mapa:'ci', 'cargo', 'grado', 'nombres', 'apellidos', 'contacto', 'foto', 'descripcion', 'vigencia' -->
                    <div class="col">
                        <div style="width: 280px; /* Ajusta el ancho según sea necesario */">
                            <img src="{{ asset('images/img.jpg') }}" alt=""
                                style="width: 250px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); border-radius: 8px;">
                        </div>

                        <div class="info">

                            <ul>
                                <li>
                                    <i class="fas fa-address-card"></i>
                                    Señor: {{ $item->grado }} {{ $item->nombres }} {{ $item->apellidos }}
                                </li>
                                <li>
                                    <i class="fas fa-portrait"></i>
                                    Desempeñandose dentro de la Unidad de Marina Mercante como:
                                    {{ $item->cargo->cargo }}
                                </li>
                                <li>
                                    <i class="fa-solid fa-mobile-screen"></i>
                                    Contacto: {{ $item->contacto }}
                                </li>
                                <li>
                                    {{-- <i class="fa-solid fa-envelope"></i> --}}
                                    {{ $item->descripcion }}
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- footer -->
    <footer>
        <a href="#inicio" class="arriba">
            <i class="fa-solid fa-angles-up"></i>
        </a>
        {{--  <div class="redes">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-skype"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#"><i class="fa-solid fa-rss"></i></a>
        </div> --}}
    </footer>

    <script>
        let menuVisible = false;
        //Función que oculta o muestra el menu
        function mostrarOcultarMenu() {
            if (menuVisible) {
                document.getElementById("nav").classList = "";
                menuVisible = false;
            } else {
                document.getElementById("nav").classList = "responsive";
                menuVisible = true;
            }
        }

        function seleccionar() {
            //oculto el menu una vez que selecciono una opcion
            document.getElementById("nav").classList = "";
            menuVisible = false;
        }
        //Funcion que aplica las animaciones de las habilidades
        function efectoHabilidades() {
            var skills = document.getElementById("skills");
            var distancia_skills = window.innerHeight - skills.getBoundingClientRect().top;
            if (distancia_skills >= 300) {
                let habilidades = document.getElementsByClassName("progreso");
                habilidades[0].classList.add("javascript");
                habilidades[1].classList.add("htmlcss");
                habilidades[2].classList.add("photoshop");
                habilidades[3].classList.add("wordpress");
                habilidades[4].classList.add("drupal");
                habilidades[5].classList.add("comunicacion");
                habilidades[6].classList.add("trabajo");
                habilidades[7].classList.add("creatividad");
                habilidades[8].classList.add("dedicacion");
                habilidades[9].classList.add("proyect");
            }
        }


        //detecto el scrolling para aplicar la animacion de la barra de habilidades
        window.onscroll = function() {
            efectoHabilidades();
        }



        document.addEventListener("DOMContentLoaded", function() {
            var prevScrollpos = window.pageYOffset;
            var header = document.querySelector(".contenedor-header");

            window.onscroll = function() {
                var currentScrollPos = window.pageYOffset;
                if (prevScrollpos > currentScrollPos) {
                    header.style.top = "0";
                } else {
                    header.style.top = "-150px"; // Ajusta este valor según la altura de tu header
                }
                prevScrollpos = currentScrollPos;
            };
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('graficoTorta').getContext('2d');
            var counts = @json($counts);
            var graficoTorta = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Cuenca Amazonas', 'Cuenca De la plata', 'Cuenca Lacustre'],
                    datasets: [{
                        
                        data: [counts['LACUSTRE'], counts['DE LA PLATA'], counts['AMAZÓNICA']], // valores aqui debo modificar
                        backgroundColor: [
                            'rgba(225, 46, 10, 0.5)',
                            'rgba(224, 238, 14, 0.5)',
                            'rgba(34, 238, 14, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>

</body>

</html>

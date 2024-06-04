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
        padding: 20px;
        background-color: #404d54;
        width: 40%;
        height: 55%;
        margin: auto;
        text-align: center;
        border-radius: 40px;
    }

    .inicio .contenido-banner h1 {
        margin-top: 40px;
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
<<<<<<< HEAD
    <div class="top-half" style="background: #2805a7">
        <div class="title">Unidad de Marina Mercante</div>
        <div class="button-container">
            <!--<a href="http://localhost/rcumm/public/login">Ingresar</a>-->

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Panel</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Ingresar</a>
                    @endauth
                </div>
            @endif

        </div>
        <div class="subtitle">Autoridad dependiente de la armada boliviana</div>
=======
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
                    <li class="text-center"><a href="#curriculum" onclick="seleccionar()">EMPRESAS CERTIFICADAS</a></li>
                    <li class="text-center"><a href="#contacto" onclick="seleccionar()">CONTACTO</a></li>
                    <li class="text-center"><a href="http://localhost/UMM/public/login"
                            style="margin-left: 150%">INGRESAR</a></li>
                </ul>
            </nav>
            <div class="nav-responsive" onclick="mostrarOcultarMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>
        </header>
>>>>>>> 4041c237a036f1a3cd251845d0a18a474f897f74
    </div>

    <!-- SECCION INICIO -->
    <section id="inicio" class="inicio">
        <div class="contenido-banner">
            <h1>UNIDAD MARINA MERCANTE</h1>
            <h2>
                La Unidad de Marina Mercante como autoridad marítima
                a nivel nacional, responsable de la regulación del personal
                mercante, realiza el control, inspección y registro de
                embarcaciones, buques y otros artefactos navales.

            </h2>
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
                        <div class="conectori">
                            <div class="circuloi"></div>
                        </div>
                    </div>
                    {{--  <div class="item izq">
                        <h4>Arte y Multimedia</h4>
                        <span class="casa">Universidad de Oxford</span>
                        <span class="fecha">2005 - 2008</span>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, cumque repellat, tempora
                            recusandae aliquam nemo esse natus impedit, nostrum temporibus veritatis eaque soluta
                            aperiam id repudiandae fugiat deserunt! Explicabo, veritatis?</p>
                        <div class="conectori">
                            <div class="circuloi"></div>
                        </div>
                    </div> --}}
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
                    {{--   <div class="item der">
                        <h4>Front Developer</h4>
                        <span class="casa">Nombre de Compañía</span>
                        <span class="fecha">2005 - 2008</span>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, cumque repellat, tempora
                            recusandae aliquam nemo esse natus impedit, nostrum temporibus veritatis eaque soluta
                            aperiam id repudiandae fugiat deserunt! Explicabo, veritatis?</p>
                        <div class="conectord">
                            <div class="circulod"></div>
                        </div>
                    </div> --}}
                </div>
            </div>
<<<<<<< HEAD
            
    <div class="container contenedor-principal" style="background: rgb(250, 250, 250);">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <h2 id="pg-registrobuques-titulo"></h2>
                <hr>
                <p id="pg-registrobuques-contenido" class="justificado"></p>
                    <div class="container">
                    <div class="row">
                        <div class="acordion-manual-header col-12" id="acordion-reg-normal-header">Servicios</div>
                        <div class="acordion-manual-contenido-show col-12" id="acordion-reg-normal-contenido">
                            <span id="intro-reg-normal"></span>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <button type="button" class="btn btn-success btn-block" id="btn-show-reg-prov">Registro Provisional</button>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <button type="button" class="btn btn-warning btn-block" id="btn-show-reg-prov-scr">Registro especial</button>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <button type="button" class="btn btn-danger btn-block" id="btn-show-reg-perm">Registro Permanente</button>
                                    </div>
                                </div>
                                <div class="row acordion-manual-subcontenido" id="reg-normal-container">
                                    <h4 id="reg-normal-titulo"></h4>
                                    <hr>
                                    <div id="reg-normal-contenido"></div>
                                </div>
                        </div>
                        <div class="acordion-manual-header col-12" id="acordion-reg-dual-header">¿Quienes somos?</div>
                        <div class="acordion-manual-contenido-hide col-12" id="acordion-reg-dual-contenido">
                            <span id="intro-reg-dual"></span>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <button type="button" class="btn btn-success btn-block" id="btn-show-reg-prov-dual">Registro Provisional Dual</button>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <button type="button" class="btn btn-danger btn-block" id="btn-show-reg-perm-dual">Registro Permanente Dual</button>
                                    </div>
                                </div>
                                <div class="row acordion-manual-subcontenido" id="reg-dual-container">
                                    <h4 id="reg-dual-titulo"></h4>
                                    <hr>
                                    <div id="reg-dual-contenido"></div>
                                </div>
                        </div>
                        <div class="acordion-manual-header col-12" id="acordion-reg-especial-header">Empresas certificadas</div>
                        <div class="acordion-manual-contenido-hide col-12" id="acordion-reg-especial-contenido">
                            <h4 id="reg-especial-titulo"></h4>
                            <hr>
                            <div id="reg-especial-contenido"></div>
=======
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
>>>>>>> 4041c237a036f1a3cd251845d0a18a474f897f74
                        </div>
                    </div>
                </div>

                <div class="col derecha">
                    <div class="item der">
                        <span class="casa">Certificaciones</span><br>
                        <p>La unidad marina mercante es la entidad responsable de realizar el registro de buques,
                            embarcaciones y artefactos navales, emitiendo los correspondientes Certificados de Registro
                            y Estatutarios en el ámbito nacional e internacional. Asi mismo emite certificados
                            Estatutarios de
                            cese de bandera, privilegios marítimos, libretas de embarco y otros de conformidad a
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
            <h2>Empresas certificadas</h2>
            <table class="table table-md table-dark text-center">
                <thead>
                    <tr>
                        <th scope="col">Empresa</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Contacto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                    </tr>
                </tbody>
            </table>

        </div>

    </section>

    <!-- SECCION CONTACTO -->
    <section id="contacto" class="contacto">
        <div class="contenido-seccion">
            <h2>CONTACTO</h2>
            <div class="fila">
                <!-- Mapa -->
                <div class="col">
                    <div><img src="{{ asset('images/foto.jpg') }}" alt=""
                            style="width: 250px; border: 15px solid rgba(127, 71, 7, 0.893);"></div>
                    <div class="info">
                        <ul>
                            <li>
                                <i class="fas fa-address-card"></i>
                                Nombre del de la foto
                            </li>
                            <li>
                                <i class="fas fa-portrait"></i>
                                Cargo del de la foto
                            </li>
                            <li>
                                <i class="fa-solid fa-mobile-screen"></i>
                                Numero de contacto
                            </li>
                            <li>
                                <i class="fa-solid fa-envelope"></i>
                                Email: cw@example.com
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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
</body>

</html>

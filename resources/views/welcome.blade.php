
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidad de Marina Mercante</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #000000;
        }
        .top-half {
            background-color: #1a73e8;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
        }
        .top-half .title {
            font-size: 2.5em;
            font-weight: bold;
            text-shadow: 2px 2px 4px #000000;
            display: inline-block;
        }
        .top-half .subtitle {
            font-size: 1.2em;
            text-shadow: 1px 1px 2px #000000;
            margin-bottom: 20px;
        }
        .top-half .button-container {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .top-half .button-container a {
            background-color: #fff;
            color: #1a73e8;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .bottom-half {
            background: url('ruta-a-tu-imagen-de-fondo.png') no-repeat center center;
            background-size: cover;
            height: calc(100vh - 180px); /* Ajusta según el tamaño del top-half */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .bottom-half .overlay-text {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
            font-size: 2em;
            color: #000000;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://www.ribb.gob.bo/web/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
    <!-- JQVMap -->
    <link rel="stylesheet" href="https://www.ribb.gob.bo/web/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://www.ribb.gob.bo/web/assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
    
    <link href="https://www.ribb.gob.bo/web/css/estilos.css" rel="stylesheet">
    <link href="https://www.ribb.gob.bo/web/css/fonts.css" rel="stylesheet">
    <link href="https://www.ribb.gob.bo/web/css/fonts_icomoon.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.ribb.gob.bo/web/js/funciones.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
</head>
<body>
    <div class="top-half" style="background: #2805a7">
        <div class="title">Unidad de Marina Mercante</div>
        <div class="button-container">
            <a href="http://localhost/rcumm/public/login">Ingresar</a>
        </div>
        <div class="subtitle">Autoridad dependiente de la armada boliviana</div>
    </div>
        <div class="container" style="background: #fff">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <img id="banner-img" src="https://www.ribb.gob.bo/web/img/foto-banner.jpg" width="100%">
                <div class="banner-texto">
                    <!--<span style="font-size: 50px">
                        La Unidad de Marina Mercante
                        
                    </span>-->
                        <br><h5>La Unidad de Marina Mercante como autoridad marítima<br>
                        a nivel nacional, responsable de la regulación del
                        
                        personal<br>mercante, realiza el control, inspección y registro de<br>
                        embarcaciones, buques y otros artefactos navales.</h5>
                </div>
            </div>
            
    <div class="container contenedor-principal" style="background: rgb(250, 250, 250);">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <h2 id="pg-registrobuques-titulo"></h2>
                <hr>
                <p id="pg-registrobuques-contenido" class="justificado"></p>
                    <div class="container">
                    <div class="row">
                        <div class="acordion-manual-header col-12" id="acordion-reg-normal-header">Servicios<span class="ti-angle-up"></span></div>
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
                        <div class="acordion-manual-header col-12" id="acordion-reg-dual-header">¿Quienes somos?<span class="ti-angle-down"></span></div>
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
                        <div class="acordion-manual-header col-12" id="acordion-reg-especial-header">Empresas certificadas}<span class="ti-angle-down"></span></div>
                        <div class="acordion-manual-contenido-hide col-12" id="acordion-reg-especial-contenido">
                            <h4 id="reg-especial-titulo"></h4>
                            <hr>
                            <div id="reg-especial-contenido"></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <h2 id="otros-servicios-titulo"></h2>
                    <hr>
                    <div id="otros-servicios-contenido"></div>
    </div>
<!--  FIN DE LA PAGINA INDIVIDUAL  --> 
</div>
      
      
      
      <!--  INICIO DEL ASIDE O COLUMNA LATERAL  --> 
      
          <!--  MENU LATERAL DERECHO DE CADA PAGINA  --> 
          <!-- 
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    
                    <div class="list-group">
                    <a href="#" class="list-group-item text-white text-center" style="background:  #5cc5ef">
                        <b>REGISTRO DE BUQUES</b></a>
                    <a href="https://www.ribb.gob.bo/web/site/reginfo" class="list-group-item list-group-item-action" style="background: #dff1f8">
                        Tipos de Registro
                    </a>
                    <a href="https://www.ribb.gob.bo/web/site/politicas" class="list-group-item list-group-item-action">Políticas de Descuento</a>
                    <a href="https://www.ribb.gob.bo/web/site/bqactuales" class="list-group-item list-group-item-action">Buques Actuales</a>
                    <a href="https://www.ribb.gob.bo/web/site/forms" class="list-group-item list-group-item-action">Formularios</a>
                    </div>
                </div>
                
            -->
</body>
</html>

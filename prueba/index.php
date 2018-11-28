<?php
ob_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

if (!isset($_SESSION)) {
    session_start();
}

$inc = (!isset($_GET['p'])) ? "index" : $_GET['p'];

if (!file_exists($inc . ".php")) {
    header("Location: .");
}

require_once dirname(__FILE__) . "/inc/connections/conexion.php"; //OK
require_once dirname(__FILE__) . "/inc/funciones.php";
require_once dirname(__FILE__) . "/inc/config.php";
require_once dirname(__FILE__) . "/inc/config_rrss.php";

if ($status_landing == -1) {
    die("");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        <?php echo $title; ?>
    </title>
    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="keywords" content="<?php echo $keywords; ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="shortcut icon" type="image/x-icon" href="/favicon_bb.ico"> -->
    <!-- plugins -->
    <script language="javascript" type="text/javascript" src="assets/js/jquery-2.1.3.min.js"></script>
    <script src="plugins/validate/jquery.validate.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <link href="plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" media="screen">
    <!-- /plugins -->
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets//css/gorda.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Oswald:300,400,700" rel="stylesheet">


    <?php
print_pixel_facebook_main();
print_google_analytics();
?>

    <!--[if lt IE 9]>
	  <script src="js/html5shiv.min.js"></script>
	  <script src="js/respond.min.js" type="text/javascript"></script>
	<![endif]-->
    <!--[if lt IE 10]>
	  <script src="js/placeholder_ie.js" type="text/javascript"></script>
	<![endif]-->
</head>

<body>

    <div class="page">

        <div class="contenedor contenedor-100 margen-bottom">
            <div class="guide guide col-xs-12 col-md-12 col-lg-12" style="margin: 0; padding: 0;">
                <div class="col-xs-12 col-md-12 logo img-center " style="padding: 0; display: table;">
                    <img style="width: 100%; position: fixed;" alt="<?php $cliente?>" src="./assets/img/textura-bg.png" />
                    <img style="width: 188px; top: 15px; left: 109px;" class="logo-2" alt="<?php $cliente?>" src="./assets/img/zeplin/logo.png" />
                </div>
            </div>
        </div>

        <div class="contenedor">
            <div class="guide guide col-xs-12 col-md-12 col-lg-12">
                <div class="row producto-img">
                    <img class="boleto" alt="Boleto" src="./assets/img/zeplin/premios.png" />
                </div>
                <span class="titulo text-center">
                    <p class="row texto-grande-mediano participa-y-gana cra-texto-premio">
                        CONSIGUE UN BOLETO <br> DE LA GORDA DE NAVIDAD
                    </p>
                    <p class="row sorteamos">
                        ¡REGALAMOS 100 <br> BOLETOS!
                    </p>
                </span>
            </div>
        </div>
        <span id="ancla"></span>
        <div class="contenedor">
            <div class="guide guide col-xs-12 col-md-12 col-lg-12">
                <div class="row texto-mediano-mediano  promocion-valida" style="margin-top: 15px;">
                    <?php echo $fechas_promocion ?>
                </div>

                <div class="row texto-mediano-mediano instrucciones cra-texto-white">
                    <p>Introduce aquí tu email y prueba suerte. </p>
                    <p>¡Sabrás si has ganado al instante! </p>
                    <p>Solo por participar recibirás un descuento exclusivo.</p>
                </div>

            </div>

        </div>
        <div class="contenedor cont-esp cra-centro">
            <div class="guide guide col-xs-12 col-md-6 col-lg-6">
                <form class="col-sm-11 col-md-6 form envio-form" id="mc-form">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 ">
                            <p class="cra-texto-formulario">
                                Máximo una participación por persona, email, dispositivo e IP. Introduce un email real:
                                tendrás que confirmar tu participación.
                            </p>
                            <br>
                            <label for="email">
                                ESCRIBE TU NOMBRE
                                <br>
                                <input id="mc-nombre" type="nombre" name="nombre" placeholder="" class="row input-texto form-control texto-pequeno input-lg "
                                    required="required"><br>
                            </label>

                            <label for="email">
                                ESCRIBE TU EMAIL
                                <br>
                                <input id="mc-email" type="email" name="email" placeholder="" class="row form-control input-texto texto-pequeno input-lg "
                                    required="required">
                                    <p style= "color:red; margin-top: 7px;">Por favor, introduce un email real: tendrás que confirmar tu participación.
</p>
                            </label>
                            <div class="form-group div_checks separacion-inf">
                                <div class="checkbox text-left">
                                    <label class="texto-pequeno">
                                        <input type="checkbox" class="row" name="cbox1" id="cbox1"> He leido y
                                        acepto los <a href="https://www.lagordadenavidad.es/terminos-y-condiciones" target="_blank">terminos</a>
                                        y la <a href="https://www.lagordadenavidad.es/politica-privacidad" target="_blank">politica de
                                            privacidad</a>
                                        <!-- cra cambiar en produccion -->
                                    </label>
                                </div>

                                <div class="checkbox text-left">
                                    <label class="texto-pequeno">
                                        <input type="checkbox" class="row" name="cbox2" id="cbox2"> Acepto el envio
                                        de comunicaciones de la Gorda de Navidad
                                        sobre sus productos y/o promociones por medios electronicos
                                    </label>
                                </div>

                                <div class="checkbox text-left">
                                    <label class="texto-pequeno">
                                        <input type="checkbox" class="row" name="cbox3" id="cbox3"> Acepto las <a href="/sorteo/condiciones.php"
                                            target="_blank">bases legales</a> y
                                        <a href="https://www.lagordadenavidad.es/terminos-y-condiciones" target="_blank">condiciones de uso</a>
                                        <!-- cra cambiar en produccion -->
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12" style="">
                            <button class="btn btn-secondary btn-block boton texto-mediano-mediano cra-btn-participar"
                                type="submit" id="load"><span class="">PARTICIPA AHORA</span></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="contenedor cont-esp">
            <div class="guide guide col-xs-12 col-md-12 col-lg-12">

                <div class="row">
                    <span class="titulo text-center">
                        <p class="row texto-grande-mediano aun-no-conoces">
                            ¿AÚN NO CONOCES LOS PREMIOS?
                        </p>
                    </span>
                </div>

                <div class="row white">
                    <section class="listado-premios">
                        <div class="container">
                            <h3 class="title title-lg title-premios primer-premio"><span class="title-content"><strong><span
                                            class="numero-primer-premio">2 PRIMEROS PREMIOS</span></strong> - Valorados
                                    en 101.382 € cada uno.</span></h3>
                            <h3></h3>
                            <div class="row txt-center">
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/1.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 112px;"><strong>BMW 216D Active
                                            Tourer:</strong> ¿Te gusta conducir? Coche para los que valoran la
                                        exclusividad y la calidad. </p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/2.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 112px;"><strong>Gasolina para 1
                                            año:</strong> Un año entero sin pagar el repostaje de tu nuevo coche, ¿lo
                                        imaginas?</p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/3.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 112px;"><strong>Vacaciones pagadas
                                            durante 2 años:</strong> Piensa en tus dos próximos destinos de vacaciones
                                        porque con La Gorda te damos 2 años de vacaciones pagadas.</p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/4.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>Suscripción Netflix
                                            1 año:</strong> Disfruta durante 1 año de cientos de películas y series en
                                        tu TV, ordenador, móvil…</p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/5.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>1 juego de maletas
                                            de viaje:</strong> Maleta grande, mediana, pequeña para las vacaciones que
                                        te regalamos.</p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/6.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>Bicicleta
                                            eléctrica:</strong> Muévete por la ciudad casi sin esfuerzo. </p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 195px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/7.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 168px;"><strong>Cesta de la compra
                                            de 1 año:</strong> ¡No pagues en el súper durante 1 año! </p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 195px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/8.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 168px;"><strong>6 Horas locas en
                                            El Corte Inglés:</strong> ¡Compras, compras y más compras! Te damos 6 horas
                                        para gastar 6.000€ en El Corte Inglés. Disfruta de uno de los días más
                                        divertidos y locos de tu vida.</p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 195px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/9.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 168px;"><strong>1 año de suerte en
                                            La Bruja de Oro:</strong>¡¡Posibilidad de un gran premio incalculable de
                                        millones de €!! 400 décimos de Lotería del Niño 2019 (40 décimos de cada una de
                                        las 10 terminaciones) 4 Sorteos Euromillón (valorados en 500€ cada uno)</p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/10.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>Iphone X 256 Gb:</strong>Dile
                                        “hola” al futuro con el último móvil de Apple. </p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/11.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>Apple MacBook Pro
                                            15” Touch Bar:</strong> Disfruta del rápido y potente portátil de la
                                        manzana. Ahora es más fino y ligero que nunca.</p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/12.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>PlayStation 4 1TB +
                                            Far Cry 5:</strong> Última consola de Sony para que pases buenos momentos
                                        con tu familia y amigos. </p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/13.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>Gafas Realidad
                                            Virtual + VR Worlds:</strong> Vive la auténtica inmersión en el juego.</p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/14.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>Polaroid Snap Touch
                                            Whit:</strong> Cámara digital instantánea. Inmortaliza tus grandes
                                        momentos. </p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/15.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>TV 55” LG:</strong>
                                        Ve al cine sin salir de casa. </p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/16.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 112px;"><strong>Robot Roomba 980:</strong>
                                        Se acabó barrer, que el robot lo haga por ti ¡¡</p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/17.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 112px;"><strong>Cafetera Nespresso
                                            Inissia + 400 capsulas:</strong> Cafetera de diseño y fácil de usar.
                                        Además, disfruta de cápsulas de café grátis todo un año. </p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/18.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 112px;"><strong>1 año GYM Gratis
                                            VIP:</strong> Acceso gratis durante un año a los gimnasios Holiday Gym.
                                        ¡Hora de ponerse en forma!</p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/19.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>Suscripción Diario
                                            MARCA para 1 año:</strong> ¡Recibe todos los días en tu casa el diario
                                        deportivo líder!</p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/20.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>500 L. Coca Cola:</strong>
                                        ¡Y disfruta de la chispa de la vida! </p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/21.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>6 cajas de Pacharán
                                            Basarana:</strong> El pacharán Navarro más premiado del mundo.</p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/22.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 56px;"><strong>4 Jamones:</strong>
                                        Placer español para todo el año. </p>
                                </div>
                                <div class="col-sm-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 155px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/23.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 56px;"><strong>19.470 € en oro:</strong>
                                        Lingotes de oro para pagar los impuestos.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="listado-premios">
                        <div class="container">
                            <h3 class="title title-lg title-premios segundo-premio"><span class="title-content"><span
                                        class="title-content"><strong><span class="numero-segundo-premio">2 SEGUNDOS
                                                PREMIOS</span></strong> - Valorados en 23.227 € cada uno</span></span></h3>
                            <div class="row txt-center">
                                <div class="col-sm-6 col-md-6 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 128px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/24.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 28px;"><strong>Vuelta al mundo:</strong>
                                        Haz realidad tu viaje soñado. </p>
                                </div>
                                <div class="col-sm-6 col-md-6 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 128px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/25.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 28px;"><strong>3.227 € en oro:</strong>
                                        Lingotes de oro para pagar los impuestos.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="listado-premios">
                        <div class="container">
                            <h3 class="title title-lg title-premios tercer-premio"><span class="title-content"><strong><span
                                            class="numero-tercer-premio">2 TERCEROS PREMIOS</span></strong> - Valorados
                                    en 18.781 € cada uno</span></h3>
                            <div class="row txt-center">
                                <div class="col-sm-6 col-md-6 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 128px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/27.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>Coche MINI Cooper -
                                            Renting :</strong> MINI para 4 años o 60.000km con todo pagado: seguro,
                                        revisiones, mantenimiento, ruedas, reparaciones… Solo preocúpate de conducir.
                                    </p>
                                </div>
                                <div class="col-sm-6 col-md-6 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: 128px;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/26.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: 84px;"><strong>2.517 € en oro:</strong>
                                        Lingotes de oro para pagar los impuestos.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="listado-premios">
                        <div class="container">
                            <h3 class="title title-lg title-premios cuarto-premio"><span class="title-content"><strong><span
                                            class="numero-cuarto-premio">200 PREMIOS</span></strong> - Valorados en
                                    20.000 €</span></h3>
                            <div class="row txt-center">
                                <div class="col-sm-12 col-md-12 premio-block fh-elm" data-fh-fixed="true" data-fh-end="true"
                                    style="opacity: 1;">
                                    <div class="img-block fh-part" style="height: auto;">
                                        <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/28.jpg">
                                        </div>
                                    </div>
                                    <p class="title title-sm fh-part" style="height: auto;"><strong>200 Tarjetas
                                            regalos El Corte Inglés (100 € cada tarjeta)</strong></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <br><br>

                <div class="row sube">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                        <!--
                        <button style="margin: 0 auto;" class="btn btn-secondary btn-block texto-mediano-mediano btn-descubrelo"
                            type="button"><span class="">¡QUIERO GANAR UN BOLETO!</span></button>
-->
                        <a href="#ancla" class="btn btn-secondary btn-block texto-mediano-mediano btn-descubrelo">¡QUIERO
                            GANAR UN BOLETO!</a>
                    </div>
                </div>

            </div>

        </div>

        <div class="banda-pie-legal">
        <div ><p><strong>Información básica sobre Protección de Datos</strong></p>

        <p>
			<strong>Responsable:</strong> BERSASORIA SERVICIOS S.L. <a href="https://www.lagordadenavidad.es/politica-privacidad" target="_blank">Más información.</a>
        </p>
        <p>
        <strong>Finalidad:</strong> Las finalidades principales de tratamiento de sus datos personales son: [1] envío de comunicaciones comerciales y promociones y [2] elaboración de perfiles. <a href="https://www.lagordadenavidad.es/politica-privacidad" target="_blank">Más información.</a>
        </p>
        <p>
        <strong>Legitimación:</strong> Tratamos sus datos de carácter personal sobre la base de: [A] su consentimiento (para el envío de comunicaciones comerciales) e [B] interés legítimo de La Gorda de Navidad. <a href="https://www.lagordadenavidad.es/politica-privacidad" target="_blank">Más información.</a>
        </p>
        <p>
        <strong>Destinatarios:</strong> Sus datos únicamente será utilizados por La Gorda de Navidad (BERSASORIA SERVICIOS S.L.), ubicada en España. Sus datos no serán nunca cedidos a empresas externas no pertenecientes esta. <a href="https://www.lagordadenavidad.es/politica-privacidad" target="_blank">Más información.</a>
        </p>
        <p>
        <strong>Derechos:</strong> Acceder, rectificar y suprimir los datos, así como otros derechos, como se explica en la información adicional. <a href="https://www.lagordadenavidad.es/politica-privacidad" target="_blank">Más información.</a>
        </p>
        <p>
        <strong>Información adicional:</strong> Puede consultar la información adicional y detallada sobre Protección de Datos en nuestra Política de Privacidad. <a href="https://www.lagordadenavidad.es/politica-privacidad" target="_blank">Más información.</a>
        </p></div>
        </div>
		
        <?php
// print_barra_footer(); // Viene de config.php
require_once dirname(__FILE__) . "/footer.php";
?>
    </div>

    <script>
      	$("form").on('submit', function (e) {
e.preventDefault();
var btn = $("#load");

$("#mc-form").validate();

if (($("#mc-form").valid())) {

    if ($("#cbox1").is(":checked") && $("#cbox3").is(":checked")) {
        btn.css('display', 'none');
        $.ajax({
            url: "lottery.php",
            data: $('#mc-form').serialize(),
            type: 'POST',
            dataType: 'json',
            success: function (json) {
                console.log(json);
                btn.css('display', 'none');

                switch (json) {
                    case 0:
                        window.location.href = "/sorteo/no_suerte.php";
                        break;
                    case 1:
                        window.location.href = "/sorteo/ganador.php";
                        break;
                    case 2:
                        swal({
                            type: 'error',
                            title: 'Ooops..',
                            text: ' "Ya has participado anteriormente en esta promoción. Te recordamos que solo es posible participar una vez por persona, dispositivo, email e IP. ¡Gracias por participar!"',
                        })
                        break;

                    case 3:
                        swal({
                            type: 'error',
                            title: 'Ooops..',
                            text: ' "Ya has participado anteriormente en esta promoción. Te recordamos que solo es posible participar una vez por persona, dispositivo, email e IP. ¡Gracias por participar!"',
                        })
                        break;

                    case 4:
                        swal({
                            type: 'error',
                            title: 'Ooops..',
                            text: 'Debes rellenar el email. Ej:ejemplo@gmail.com',

                        })
                        break;
                }
                /*
                if (json == 1) {
                window.location.href = "/sorteo/suerte.html";
                } else if (json == 0) {
                window.location.href = "/sorteo/no_suerte.html";
                    }
                */
            },
            error: function (xhr, status) {
                console.log(xhr);

            },
            complete: function (xhr, status) {
                btn.css('display', 'none');
                console.log(xhr);
            }
        });
    }
debugger;
} else {
    if (!$("#cbox1").is(":checked") || !$("#cbox3").is(":checked")) {
        swal({
            type: 'error',
            title: 'Ooops..',
            text: 'Debes aceptar las políticas de privacidad y bases legales',
            footer: '<a href>Why do I have this issue?</a>'
        })
    } else if (!$('#nombre').val()) {
        swal({
            type: 'error',
            title: 'Ooops..',
            text: 'Debes rellenar el nombre',
        })
    } else if (!$('#email').val()) {
        swal({
            type: 'error',
            title: 'Ooops..',
            text: 'Debes rellenar el email. Ej:ejemplo@gmail.com',

        })
    }
}
});
    </script>




</body>

</html>

<?php ob_flush(); // Nativa de PHP ?>
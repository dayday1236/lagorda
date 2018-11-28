<?php
ob_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

if (!isset($_SESSION)) {
    session_start();
}

/* DESACTIVAR LA CAMPAÑA EVITAMOS ACESOS*/
$inc = (!isset($_GET['p'])) ? "index" : $_GET['p'];
if (!file_exists($inc . ".php")) {
    header("Location: .");
}

/* INCLUDES NECESARIOS */
require_once dirname(__FILE__) . "/inc/connections/conexion.php"; //OK
require_once dirname(__FILE__) . "/inc/funciones.php";
require_once dirname(__FILE__) . "/inc/config.php";
require_once dirname(__FILE__) . "/inc/config_rrss.php";
if ($status_landing == -1) {
    die("");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sorteo la Gorda de Navidad</title>

    <!-- JS -->
    <script src="assets/js/jquery-2.1.3.min.js"></script>
    <script src="plugins/validate/jquery.validate.min.js"></script>

    <!-- PLUGINS -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <link href="plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" media="screen">
    <!-- END PLUGINS -->

    <!-- STYLE -->
    <link rel="stylesheet" href="assets/css/main.css">
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
    <?php
print_pixel_facebook_landing(); //QUE PINTA AQUI
?>

</head>

<body>
    <div class="negro">
    </div>

    <div class="container" >
        <div class="row mt-3">
            <div class="mx-auto">
                <img src="assets/img/logo.png" alt="" class="img-logo">
            </div>
        </div>

        <div class="row mt-3">
            <div class="mx-auto">
                <img src="assets/img/premios.png" alt="" class="img-premios">
            </div>
        </div>

        <div class="row mt-5">
            <div class="mx-auto">
                <h2 class=" text-center cm-title-one">CONSIGUE UN BOLETO <br>
                    DE LA GORDA DE NAVIDAD</h2>
            </div>

        </div>

        <div class="row mt-3">
            <div class="text-center mx-auto">
                <h2 class=" text-center cm-title-two">
                    ¡REGALAMOS 10 <br>
                    BOLETOS!
                </h2>
            </div>
        </div>

        <div class="row mt-3">
            <div class=" mx-auto" id="ancla">
                <p class=" text-center cm-date-promo">
                  <!-- <?php echo $fechas_promocion ?> -->
                </p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="mx-auto cm-info">
                <p class="text-center">Introduce aquí tu nombre e email para registrar tu participación</p>

            </div>
        </div>


        <!-- FORMULARIO PARTICIPACIÓN -->
        <div class="row mt-5">
            <div class="container p-5">

                <div class="col-12 col-sm-12 col-md-7  bg-white col-center p-5 ">
                    <div>
                        <p>
                            <strong>Máximo una participación por conexión WiFi, o 4G. Máximo una participación por persona e email. Si participas más de una vez, el sistema solo se contabilizará la primera</strong>
                        </p>
                    </div>


                    <form class="form envio-form" id="form">
                        <div class="form-group">
                            <label for="nombre" class="form-text">ESCRIBE TU NOMBRE</label>
                            <input type="text" class="form-control" id="nombre" name=nombre>

                            <label for="email" class="form-text">ESCRIBE TU EMAIL</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <p class="form-text text-danger text-center">Por favor, introduce un email real: tendrás que
                            confirmar tu participación.</p>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="cbox1" name="cbox1">
                            <label class="form-check-label" for="cbox1">
                                He leído y acepto los términos y la política de privacidad.
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="cbox2" name="cbox2">
                            <label class="form-check-label" for="cbox2">
                                Acepto el envio de comunicaciones de la Gorda de Navidad sobre sus
                                productos y/o promociones por medios electrónicos.
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="cbox3" name="cbox3">
                            <label class="form-check-label" for="cbox3">
                                Acepto las bases legales y condiciones de uso.
                            </label>
                        </div>

                        <button class="btn btn-secondary btn-block boton mt-3" type="submit" id="load"><span>PARTICIPA
                                AHORA</span></button>
                    </form>
                </div>
            </div>
        </div>

        <!-- END FORMULARIO PARTICIPACIÓN -->

        <div class="row mb- p-3">
            <div class="mx-auto cm-info-two">
                <h2 class="text-center">¿AÙN NO CONOCES LOS PREMIOS?</h2>
            </div>
        </div>


        <!-- SECTION PREMIOS -->
        <div class="container bg-white p-3 p-sm-5">
            <section class="listado-premios">
                <div class="container">
                    <h3 class="title title-lg title-premios primer-premio"><span class="title-content"><strong><span
                                    class="numero-primer-premio">2
                                    PRIMEROS PREMIOS</span></strong> - Valorados en 101.382 € cada uno.</span></h3>
                    <h3></h3>
                    <div class="row txt-center">
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part a">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/1.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>BMW 216D Active Tourer:</strong>
                                ¿Te gusta conducir? Coche para los que valoran la exclusividad y la calidad. </p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part a">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/2.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>Gasolina para 1 año:</strong>
                                Un año entero sin pagar el repostaje de tu nuevo coche, ¿lo imaginas?</p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part a">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/3.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>Vacaciones pagadas durante
                                    2
                                    años:</strong> Piensa en tus dos próximos destinos de vacaciones porque con La
                                Gorda te
                                damos 2 años de vacaciones pagadas.</p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part a">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/4.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>Suscripción Netflix 1 año:</strong>
                                Disfruta durante 1 año de cientos de películas y series en tu TV, ordenador, móvil…</p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part a">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/5.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>1 juego de maletas de
                                    viaje:</strong>
                                Maleta grande, mediana, pequeña para las vacaciones que te regalamos.</p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/6.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>Bicicleta eléctrica:</strong>
                                Muévete por la ciudad casi sin esfuerzo. </p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/7.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>Cesta de la compra de 1
                                    año:</strong>
                                ¡No pagues en el súper durante 1 año! </p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/8.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>6 Horas locas en El Corte
                                    Inglés:</strong> ¡Compras, compras y más compras! Te damos 6 horas para gastar
                                6.000€
                                en El Corte Inglés. Disfruta de uno de los días más divertidos y locos de tu vida.</p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/9.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>1 año de suerte en La
                                    Bruja de
                                    Oro:</strong>¡¡Posibilidad de un gran premio incalculable de millones de €!! 400
                                décimos de Lotería del Niño 2019 (40 décimos de cada una de las 10 terminaciones) 4
                                Sorteos
                                Euromillón (valorados en 500€ cada uno)</p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/10.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>Iphone X 256 Gb:</strong>Dile
                                “hola” al futuro con el último móvil de Apple. </p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/11.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>Apple MacBook Pro 15” Touch
                                    Bar:</strong> Disfruta del rápido y potente portátil de la manzana. Ahora es más
                                fino y
                                ligero que nunca.</p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/12.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>PlayStation 4 1TB + Far Cry
                                    5:</strong>
                                Última consola de Sony para que pases buenos momentos con tu familia y amigos. </p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/13.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>Gafas Realidad Virtual + VR
                                    Worlds:</strong> Vive la auténtica inmersión en el juego.</p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/14.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>Polaroid Snap Touch Whit:</strong>
                                Cámara digital instantánea. Inmortaliza tus grandes momentos. </p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/15.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>TV 55” LG:</strong> Ve al
                                cine
                                sin salir de casa. </p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/16.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>Robot Roomba 980:</strong>
                                Se
                                acabó barrer, que el robot lo haga por ti ¡¡</p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/17.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>Cafetera Nespresso Inissia
                                    +
                                    400 capsulas:</strong> Cafetera de diseño y fácil de usar. Además, disfruta de
                                cápsulas
                                de café grátis todo un año. </p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/18.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>1 año GYM Gratis VIP:</strong>
                                Acceso gratis durante un año a los gimnasios Holiday Gym. ¡Hora de ponerse en forma!</p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/19.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>Suscripción Diario MARCA
                                    para 1
                                    año:</strong> ¡Recibe todos los días en tu casa el diario deportivo líder!</p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/20.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>500 L. Coca Cola:</strong>
                                ¡Y
                                disfruta de la chispa de la vida! </p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/21.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>6 cajas de Pacharán
                                    Basarana:</strong>
                                El pacharán Navarro más premiado del mundo.</p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/22.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>4 Jamones:</strong> Placer
                                español para todo el año. </p>
                        </div>
                        <div class="col-6 col-md-4 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/23.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part"><strong>19.470 € en oro:</strong>
                                Lingotes de oro para pagar los impuestos.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="listado-premios">
                <div class="container">
                    <h3 class="title title-lg title-premios segundo-premio"><span class="title-content"><span class="title-content"><strong><span
                                        class="numero-segundo-premio">2 SEGUNDOS PREMIOS</span></strong> - Valorados en
                                23.227 € cada uno</span></span></h3>
                    <div class="row txt-center">
                        <div class="col-sm-6 col-md-6 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/24.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part" style="height: 28px;"><strong>Vuelta al mundo:</strong>
                                Haz
                                realidad tu viaje soñado. </p>
                        </div>
                        <div class="col-sm-6 col-md-6 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
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
                                    class="numero-tercer-premio">2 TERCEROS PREMIOS</span></strong> - Valorados en
                            18.781 € cada uno</span></h3>
                    <div class="row txt-center">
                        <div class="col-sm-6 col-md-6 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/27.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part" style="height: 112px;"><strong>Coche MINI Cooper -
                                    Renting :</strong> MINI para 4 años o 60.000km con todo pagado: seguro, revisiones,
                                mantenimiento, ruedas, reparaciones… Solo preocúpate de conducir. </p>
                        </div>
                        <div class="col-sm-6 col-md-6 fh-elm" data-fh-fixed="true" data-fh-end="true" style="opacity: 1;">
                            <div class="img-block fh-part">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/26.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part" style="height: 112px;"><strong>2.517 € en oro:</strong>
                                Lingotes de oro para pagar los impuestos.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="listado-premios">
                <div class="container">
                    <h3 class="title title-lg title-premios cuarto-premio"><span class="title-content"><strong><span
                                    class="numero-cuarto-premio">200 PREMIOS</span></strong> - Valorados en 20.000 €</span></h3>
                    <div class="row txt-center">
                        <div class="col-sm-12 col-md-12 premio-block fh-elm" data-fh-fixed="true" data-fh-end="true"
                            style="opacity: 1;">
                            <div class="img-block fh-part" style="height: auto;">
                                <div class="vertical-align"> <img class="center-block" src="https://www.lagordadenavidad.es/assets/img/28.jpg">
                                </div>
                            </div>
                            <p class="title title-sm fh-part" style="height: auto;"><strong>200 Tarjetas regalos El
                                    Corte Inglés (100 € cada tarjeta)</strong></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- END SECTION PREMIOS -->

        <!-- BOTON GANAR -->
        <div class=" col-12 col-md-10 col-xs-12 col-center my-5">
            <a href="#ancla" class="btn btn-secondary btn-block texto-mediano-mediano btn-descubrelo">¡QUIERO
                GANAR UN BOLETO!</a>
        </div>
        <!-- END BOTON GANAR -->


    </div>

    <!-- SECCION INFORMACION -->

    <section class="bg-white p-5">
        <div class="container">
            <div>
                <p><strong>Información básica sobre Protección de Datos</strong></p>

                <p>
                    <strong>Responsable:</strong> BERSASORIA SERVICIOS S.L. <a href="https://www.lagordadenavidad.es/politica-privacidad"
                        target="_blank">Más información.</a>
                </p>
                <p>
                    <strong>Finalidad:</strong> Las finalidades principales de tratamiento de sus datos personales
                    son: [1] envío de comunicaciones comerciales y promociones y [2] elaboración de perfiles. <a href="https://www.lagordadenavidad.es/politica-privacidad"
                        target="_blank">Más información.</a>
                </p>
                <p>
                    <strong>Legitimación:</strong> Tratamos sus datos de carácter personal sobre la base de: [A] su
                    consentimiento (para el envío de comunicaciones comerciales) e [B] interés legítimo de La Gorda
                    de Navidad. <a href="https://www.lagordadenavidad.es/politica-privacidad" target="_blank">Más
                        información.</a>
                </p>
                <p>
                    <strong>Destinatarios:</strong> Sus datos únicamente será utilizados por La Gorda de Navidad
                    (BERSASORIA SERVICIOS S.L.), ubicada en España. Sus datos no serán nunca cedidos a empresas
                    externas no pertenecientes esta. <a href="https://www.lagordadenavidad.es/politica-privacidad"
                        target="_blank">Más información.</a>
                </p>
                <p>
                    <strong>Derechos:</strong> Acceder, rectificar y suprimir los datos, así como otros derechos,
                    como se explica en la información adicional. <a href="https://www.lagordadenavidad.es/politica-privacidad"
                        target="_blank">Más información.</a>
                </p>
                <p>
                    <strong>Información adicional:</strong> Puede consultar la información adicional y detallada
                    sobre Protección de Datos en nuestra Política de Privacidad. <a href="https://www.lagordadenavidad.es/politica-privacidad"
                        target="_blank">Más información.</a>
                </p>
            </div>
        </div>
    </section>
    <!-- END SECCION INFORMACION -->



    <!-- FOOTER -->
    <footer>
        <div class="container d-flex justify-content-center">
            <div>
                <p>Siguenos en redes sociales</p>
                <p class="text-muted">¡y entérate de nuevos sorteos como éste!</p>
            </div>
            <div class="d-flex align-items-center">
                <a href="https://facebook.com/lagordadenavidad" target="_blank">
                    <img src="assets/img/facebook.png" alt="facebook de la Gorda de Navidad" class="mx-4">
                </a>
                <a href="https://twitter.com/GordaDeNavidad" target="_blank">
                    <img src="assets/img/twitter.png" alt="Twitter de la Gorda de Navidad" class="mt-3 mt-sm-0">
                </a>


            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- SCRIPTS -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>

    <script>
        //logica formulario
        $("form").on('submit', function (e) {
            e.preventDefault();
            var btn = $("#load");
            $("#form").validate();
            //Validamos
            if ($("#form").valid()) {

                if ($('#cbox1').is(":checked") && $('#cbox3').is(":checked")) {

                    //Bloqueo boton
                    btn.css('display', 'block');

                    //Validamos que los campos no esten vacios
                    if (!$("#nombre").val().trim()) {
                        swal({
                            type: 'error',
                            title: 'Ooops..',
                            text: 'Debes rellenar el nombre',
                        })
                    }
                    else if (!$("#email").val().trim()) {
                        swal({
                            type: 'error',
                            title: 'Ooops..',
                            text: 'Debes rellenar el email. Ej:ejemplo@gmail.com',
                        })
                    } else { //Efectuó petición ajax

                        $.ajax({
                            url: "lottery_registro.php",
                            data: $("#form").serialize(),
                            type: "POST",
                            dataType: "JSON",
                            success: function (json) {
                                console.log(json);
                                btn.css('display', ' block');

                                //Validamos las múltiples respuestas que puede devolver el script de la lotería
                                switch (json) {
                                    case 0:
                                        window.location.href = "/sorteo/registro.php";
                                        break;

                                    case 1:
                                    swal({
                                            type: 'error',
                                            title: 'Ooops..',
                                            text: ' "Ya has participado anteriormente en esta promoción. Te recordamos que solo es posible participar una vez por persona, dispositivo, email e IP. ¡Gracias por participar!"',
                                        })
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

                                }
                            },
                            error: function (xhr, status) {
                                console.log(xhr);

                            },
                            complete: function (xhr, status) {
                                btn.css('display', 'block');
                                console.log(xhr);
                            }
                        });
                    }

                } else {// Si lo checkbox no estan activos validamos los campos

                    if (!$("#cbox1").is(":checked") || !$("#cbox3").is(":checked")) {

                        if (!$("#nombre").val().trim()) {
                            swal({
                                type: 'error',
                                title: 'Ooops..',
                                text: 'Debes rellenar el nombre',
                            })
                        }
                        else if (!$("#email").val().trim()) {
                            swal({
                                type: 'error',
                                title: 'Ooops..',
                                text: 'Debes rellenar el email. Ej:ejemplo@gmail.com',
                            })
                        } else {
                            swal({
                                type: 'error',
                                title: 'Ooops..',
                                text: 'Debes aceptar las políticas de privacidad y bases legales',

                            })
                        }
                    }
                }

            }

        });

    </script>



    <!-- END SCRIPTS -->
</body>

</html>

<?php ob_flush(); // Nativa de PHP ?>
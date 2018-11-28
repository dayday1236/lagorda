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

require_once dirname(__FILE__) . "/inc/connections/conexion.php";
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
		<title><?php echo $title; ?></title>
		<meta name="description" content="<?php echo $description; ?>" />
		<meta name="keywords" content="<?php echo $keywords; ?>" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="image/x-icon" href="/favicon_bb.ico">

		<!-- plugins -->
		<script language="javascript" type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
		<link href="plugins/sweetalert2/sweetalert2.css" rel="stylesheet" media="screen">
        <!-- /plugins -->

        <link rel="stylesheet" href="./assets/css/no_suerte.css">
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
<?php
print_pixel_facebook_landing();
?>
<body>
	<script>
		$(function () {
			$('form').on('submit', function (e) {
				e.preventDefault();
				if ($("#acepto1").is(":checked")) {
					swal({
						title: "",
						text: "Pulsa en el botón para participar en el sorteo",
						type: "info",
						showCancelButton: true,
						cancelButtonText:'Cancelar',
						closeOnConfirm: false,
						confirmButtonText:'Participar',
						confirmButtonColor:'#e11021',
						showLoaderOnConfirm: true,
					},
					function () {
						$.ajax({
							type: "POST",
							url: "lottery.php",
							data: "email=" + $("#mc-email").val() + "&nombre=" + $("#mc-nombre").val(),
							success: function (msg) {
								console.log(msg);
								if (msg == "0") {
									location.href = 'no_suerte.php';
								} else if (msg == "1") {
                                                                	location.href = 'ganador.php';
                                                                } else {
									alert("Se ha producido un error inesperado, por favor, intentelo de nuevo más tarde");
									location.reload();
								}
							}
						});
					});
				} else {
					alert("Debes aceptar los terminos y condiciones");
				}
			});
		})
	</script>


        <div class="page">
            <div class="contenedor contenedor-100">
                <div class="guide guide col-xs-12 col-md-12 col-lg-12" style="margin: 0; padding: 0;">
                    <div class="col-xs-12 col-md-12 logo img-center" style="padding: 0; display: table;">
                        <img style="width: 100%; position: fixed;" alt="<?php $cliente?>" src="./assets/img/textura-bg.png" />
                        <div>
							<img style="width: 188px; top: 15px; left: 109px;" class="logo-2"  alt="<?php $cliente?>" src="./assets/img/logo.png" />
						</div>
                    </div>
                </div>
            </div>

            <div class="contenedor">
                <div class="guide guide col-xs-12 col-md-12 col-lg-12">
                    <div class="row producto-img">
                        <!--<img style="" alt="Pijama Roja" src="./assets/img/pijama-roja-frente.png" />
                        <img style="" alt="Pijama Roja" src="./assets/img/pijama-roja-atras.png" />
                        <img style="" class="center" alt="Pijama Roja" src="./assets/img/pijama-negra-frente.png" />
                        <img style="" alt="Pijama Roja" src="./assets/img/pijama-negra-atras.png" />-->
                        <img style="width: 253px;" class="boleto" alt="Boleto" src="./assets/img/dto.png" />

                    </div>
                    <span class="titulo text-center">
                        <p class="row texto-grande-mediano participa-y-gana">
                            LO SENTIMOS… NO HAS GANADO
                        </p>
                        <p class="row texto-grande sorteamos">
                            ¡¡¡PERO AÚN ESTÁS A TIEMPO!!!
                        </p>
                    </span>

                </div>
            </div>
            <div class="contenedor">
                <div class="guide guide col-xs-12 col-md-12 col-lg-12">
                    <div class="row texto-mediano-mediano instrucciones">
                        <p>Solo por participar tienes un descuento exclusivo <br>
                            del 10%. Canjea el código descuento <b>VOYAGANAR</b> en <br>nuestra web y consigue tu boleto.</p>
                    </div>
                    <div class="row texto-mediano-mediano  promocion-valida" style="margin-top: 15px;">
                        <?php echo $fechas_promocion ?>
                    </div>

                    <div class="row" style="margin-top: 68px;">
                        <div class="col-md-12 col-xs-12" style="">
                            <a href="http://lagordadenavidad.es/comprar/billetes?utm_source=landing&utm_medium=page2&utm_campaign=email_nowin" class="btn btn-secondary btn-block boton-esp texto-mediano-mediano "  type="button"><span class="">¡QUIERO COMPRAR MI BOLETO!</span></a>
                        </div>
                    </div>

                </div>

            </div>

            <?php
// print_barra_footer(); //viene de footer.php
require_once dirname(__FILE__) . "./footer.php";
?>


        </div>



</body>
</html>

<?php ob_flush();?>

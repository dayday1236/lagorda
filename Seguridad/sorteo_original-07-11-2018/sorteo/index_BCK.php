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

require_once(dirname(__FILE__) . "/../connections/conexion.php");
require_once(dirname(__FILE__) . "/inc/funciones.php");
require_once(dirname(__FILE__) . "/config.php");
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $title; ?></title>
		<meta name="description" content="<?php echo $description; ?>" />
		<meta name="keywords" content="<?php echo $keywords; ?>" />
		<base href="http://airshhair.com/sorteo/" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

		<script language="javascript" type="text/javascript" src="js/jquery-2.1.3.min.js"></script>

		<!-- plugins -->
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

		<link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

		<script src="plugins/sweetalert/sweetalert.min.js"></script>
		<link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" media="screen">

		<!-- /plugins -->

		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Lato:300,700' rel='stylesheet' type='text/css'>

		<!-- Facebook Pixel Code -->
		<script>
			!function (f, b, e, v, n, t, s) {
				if (f.fbq)
					return;
				n = f.fbq = function () {
					n.callMethod ?
							n.callMethod.apply(n, arguments) : n.queue.push(arguments)
				};
				if (!f._fbq)
					f._fbq = n;
				n.push = n;
				n.loaded = !0;
				n.version = '2.0';
				n.queue = [];
				t = b.createElement(e);
				t.async = !0;
				t.src = v;
				s = b.getElementsByTagName(e)[0];
				s.parentNode.insertBefore(t, s)
			}(window,
					document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '1008845882549386'); // Insert your pixel ID here.
			fbq('track', 'PageView');
		</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1008845882549386&ev=PageView&noscript=1" /></noscript>
	<!-- DO NOT MODIFY -->
	<!-- End Facebook Pixel Code -->

	<!--[if lt IE 9]>
	  <script src="js/html5shiv.min.js"></script>
	  <script src="js/respond.min.js" type="text/javascript"></script>
	<![endif]-->
	<!--[if lt IE 10]>
	  <script src="js/placeholder_ie.js" type="text/javascript"></script>
	<![endif]-->

</head>

<body>
	<style>
		html, body{
			/*height: 100%;*/
			color: #fff;
			background-color:#050605;
			font-family: Lato;
			margin:0px;padding:0px;
		}
		
		body{
			background-image:url("/sorteo/img/01_BigBen_Home_bg.png");
			background-size:cover;
			background-size: 100% auto;
			background-repeat: no-repeat;
		}

		h1 {
			font-size: 26px;
			font-weight: bold;
			line-height: 1.19;
			text-align: center;
		}

		.img-responsive-center {
			margin: 0 auto;
		}


		form label[for=mc-email]{
			color: #d9534f
		}

		a, a:hover {
			font-family: Lato;
			font-size: 13px;
			color: #ffffff;
			text-decoration:none;
		}

		.boton{
			border-radius: 11.2px;
			background-color: #6042bc;
			font-family: Montserrat;
			font-size: 19.2px;
			font-weight: bold;
			text-align: center;
			color: #ffffff;
			width:100%;
		}

		.div_checks{
			text-align: left;
		}
		.logo{
			padding-top:70px;
			padding-bottom:53px;
		}
		.producto{
			padding-top:34px;
			padding-bottom:17px;
		}
	</style>

	<script>
//		swal({
//			title: "Ajax request example",
//			text: "Submit to run ajax request",
//			type: "info",
//			showCancelButton: true,
//			closeOnConfirm: false,
//			showLoaderOnConfirm: true,
//		},
//				function () {
//					setTimeout(function () {
//						$.ajax({
//							type: "POST",
//							url: "lottery.php",
//							data: "email=" + $("#mc-email").val(),
//							success: function (msg) {
//								console.log(msg);
//								if (msg == "0") {
//									location.href = 'no_suerte.php';
//								} else if (msg == "1") {
//									location.href = 'ganador.php';
//								} else {
//									alert("Se ha producido un error inesperado, por favor, intentelo de nuevo más tarde");
//								}
//							}
//						});
//					}, 2000);
//				});


	</script>		


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
						confirmButtonColor:'#6042bc',
						showLoaderOnConfirm: true,
					},
					function () {
						$.ajax({
							type: "POST",
							url: "lottery.php",
							data: "email=" + $("#mc-email").val(),
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

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<div style="width:60%;text-align: center;margin:auto;">
					<img src="../img/logo_mail.png" class="img-responsive logo">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div style="width:30%;margin-left:18%;">
					<h1 style="text-align:left;font-size:40px;">¿Quieres ganar un<br> Nacon Alpha Pad 400ES?</h1>
				</div>
			</div>
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-10 col-md-offset-1 text-center">
				<div style="width:90%;margin:auto;">
					<h1 style="text-align:center;font-size:36px;color:#f8e84c">¡REGALAMOS 1 PACK<br>CADA HORA!*</h1>
				</div>
			</div>
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<div style="text-align: center;margin:auto;">
					<img src="/sorteo/img/Pack-Uniq-One.png" class="img-responsive producto" style="margin:auto;">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<div style="text-align: center;margin:auto;">
					<p style="font-size:15px;">*Regalamos un pack cada hora entre las 12 de la mañana y las 12 de la noche</p>	
				</div>
			</div>
		</div>		
		<div class="row">
			<div class="col-sm-12 text-center">
				<h1>Introduce aquí tu email y prueba suerte.<br>
					Solo por participar recibirás un premio seguro.<br>
					<span style="color:#a1a1a1;line-height:2em;">Promoción válida del 21 al 25 de Abril, ambos incluidos</span></h1>
				<br /><br />
				<form id="mc-form">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center">
							<div style="width:70%;text-align: center;margin:auto;">
								<input id="mc-email" type="email" name="email" placeholder="Escribe tu email" class="form-control input-lg" required="required">
								<br />
								<div class="form-group div_checks">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="acepto1" id="acepto1"> <a href="/sorteo/condiciones.php" target="_blank"> He leído el aviso legal, así como las condiciones de uso y las acepto</a>
										</label>
									</div>
								</div>
								<br>
								<button type="submit" class="btn btn-lg boton">PARTICIPA AHORA</button>
							</div>
						</div>
					</div>
					<br /><br />
				</form>
			</div><!-- /.col-sm-4 -->
		</div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<a href="https://www.facebook.com/Airsh-Hair-1841944016064820/" target="_blank">
					<p><img src="/sorteo/img/facebook_logo.png" class="img-responsive" style="width:70px;margin:auto;"/></p>
					<p style="font-size:24px;text-align:center;margin-bottom:30px;">Síguenos en Facebook para no <br>perderte más sorteos como este</p>	
				</a>
			</div>
		</div>
	</div>

</body>
</html>

<?php ob_flush(); ?>

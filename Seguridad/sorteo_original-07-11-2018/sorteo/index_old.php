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
		<base href="https://www.bigbenshop.es/sorteo_2/" />
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

		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Lato:300,700' rel='stylesheet' type='text/css'>

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

                    fbq('init', '1538065243172453');
                    fbq('track', "PageView");</script>
	<noscript>
		<img height="1" width="1" alt="1" title="1" style="display:none" src="https://www.facebook.com/tr?id=1538065243172453&ev=PageView&noscript=1"/>
	</noscript>
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
			background-color:#4797d1;
			font-family: 'Open Sans', sans-serif;
			margin:0px;
                        padding:0px;
                        height: 100%;
		}
		
		body{
			/*background-image:url("/sorteo/img/01_BigBen_Home_bg.jpg");*/
			/*background-size: cover;
			background-size: 100% 100%;*/
			background-repeat: no-repeat; 
                        /*background-position: 50%;*/
                        
		}
                
                .container {
                    margin: 0 10%;  
                    
                }
                
                .img-responsive-center {
			margin: 0 auto;
		}

		form label[for=mc-email]{
			color: #d9534f
		}

		a, a:hover {
			color: #ffffff;
			text-decoration:none;
		}

                .Quieres-ganar-un-Na {                    
                    font-size: 190%;
                    font-weight: bold;
                    line-height: 1.42;                    
                    text-align:left;
                    color: #ffffff;
                  }

                .Quieres-ganar-un-Na .text-style-1 {
                    color: #3983c7;
                }
		
                .divlogo {
                    width: 28%;
                    margin: 0 auto;
                    position: relative;
                }
                
		.logo{
			padding-top:60px;
			width: 100%;
		}
                
                .boton {
                    background-color: #4797d1;                                        
                    letter-spacing: 1px;
                    text-align: center;
                    color: #ffffff;
                }  
                
                .boton .texto {
                    font-size: 79%;
                    font-weight: bold;                                        
                }
                
                #mc-email {
                    font-size: 85%;
                }
                
                .checkbox label, .checkbox label a {
                    font-size: 90%;
                    color: #9f9f9f;                    
                }
                
                .checkbox label a {
                    text-decoration: underline;
                }
                
                .introduce-tu-email, .pie-redes-sociales {
                    text-align: left; 
                    font-size: 80%;   
                    line-height: 180%;
                    font-weight: normal;
                    position:relative;
                    z-index:110;
                }
                
                .texto-mediano {
                    font-size: 90%;   
                }                               
                
                .redes-sociales {
                    list-style-type: none;
                    padding-left: 0px;
                }
                
                .participa-ya {
                    margin-top: 4%;
                    margin-bottom: 2%;
                }
                
                .redes-sociales li {
                    display: inline;
                }
                                                      
                .pie-redes-sociales {
                    margin-top: 10%;   
                }
                
                .mitad1 {
                    background: #1d1d1d;
                    margin-top: -5%;
                    padding-top: 5%;        
                    overflow: hidden;
                    position: relative;
                    width: 100%;
                    z-index: 100;
                }
                
                .mitad1 .fondo {
                    background-image: url("/sorteo_2/img/divoom-timebox.png");
                    background-position: top right;
                    background-repeat: no-repeat;    
                    display: block;
                    position: absolute;
                    height: 120%;
                    width: 100%;                    
                }
                                                
                .mitad2 {
                    background: #4797d1;   
                    overflow: hidden;
                }
                
                .mitad2 .fondo {
                    /*background-image: url("/sorteo/img/NACON_mando_02.png");
                    background-position: top right;
                    background-repeat: no-repeat;   
                    background-size: 100% 100%;*/
                    display: block;
                    position: absolute;
                    width: 60%;
                    bottom: 0;
                    right: 0;
                    height: 70%;
                    z-index: 10;
                }
                
                .inclinado {
                        transform:skew(0deg,-10deg);
                        -ms-transform:skew(0deg,-10deg); /* IE 9 */
                        -webkit-transform:skew(0deg,-5deg); /* Safari and Chrome */
                }
                
                .desinclinado {
                        transform:skew(0deg,10deg);
                        -ms-transform:skew(0deg,10deg); /* IE 9 */
                        -webkit-transform:skew(0deg,5deg); /* Safari and Chrome */
                }
                
                .redes-sociales img {
                    height: 40px;   
                    margin-right: 10px;
                }
                
                .separacion-inf {
                    margin-bottom: 15px;                    
                }
                
                .separacion-inf-x2 {
                    margin-bottom: 20px;                    
                }
                
                /* Extra Small */
                @media(max-width:767px){
                    body{font-size: 12px;background-size: 100% 100%;}
                    .divlogo {
                        width: 48% !important;                        
                    }
                    .pie-redes-sociales {
                        margin-top: 16%;   
                    }
                    .introduce-tu-email, .pie-redes-sociales {
                        font-size: 120%;   
                    }
                    .checkbox label, .checkbox label a {
                        font-size: 110%;
                    }
                    .Quieres-ganar-un-Na {                    
                        font-size: 200%;
                    }
                    #mc-email {
                        font-size: 100%;
                    }
                    .mitad2 .fondo {                        
                        width: 100%;
                    }
                }
                /* Small */
                @media(min-width:768px) and (max-width:991px){
                    body{font-size: 14px;background-size: 100% 100%;}
                    .pie-redes-sociales {
                        margin-top: 8%;   
                    }
                    .mitad2 .fondo {                        
                        width: 80%;
                    }
                }

                /* Medium */
                @media(min-width:992px) and (max-width:1199px){
                    body{font-size: 17px;background-size: 100% 100%;}
                    .mitad2 .fondo {                        
                        width: 80%;
                    }
                }

                /* Large */
                @media(min-width:1200px){
                    body{font-size: 20px;background-size: 100% 100%;}
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
						confirmButtonColor:'#4797D1',
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
        
        <div class="mitad1 inclinado">
            <div class="desinclinado">
                <div class="fondo"></div>
                <div class="divlogo separacion-inf">
                        <div style="width:60%;text-align: center;margin:auto;">
                                <img src="img/logo-bigben.png" class="img-responsive logo">
                        </div>
                </div>
                <div class="container col-md-offset-2">
                    <div class="row separacion-inf">
                        <div class="col-xs-12 col-md-4 col-lg-5">
                                <div style="">
                                    <h1 class="Quieres-ganar-un-Na">¡Gana uno de los <br> <span class="text-style-1"> Divoom Timebox <br> que sorteamos! </span>  </h1>
                                    <!--<div class="texto-mediano participa-ya">Participa ya y descubre si has ganado al momento</div>-->
                                </div>
                        </div>
                    </div><!-- /.row -->
                    <div class="row form-enviar">
                        <div class="col-sm-8 col-md-8 col-lg-6 text-left">
                            <form id="mc-form">
                                <div class="row">
                                    <div class=" text-left">
                                            <div style="text-align: left;">
                                                <div class="input-group separacion-inf">
                                                    <input id="mc-email" type="email" name="email" placeholder="Tu email" class="form-control input-lg" required="required">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-secondary btn-lg boton" type="submit"><span class="texto">ENVIAR</span></button>
                                                    </span>
                                                </div>
                                                <div class="form-group div_checks separacion-inf">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="acepto1" id="acepto1"> Acepto las <a href="/sorteo_2/condiciones.php" target="_blank">condiciones de uso</a>
                                                        </label>
                                                    </div>
                                                </div>								
                                            </div>
                                    </div>
                                </div>
                                <div class="row introduce-tu-email">
                                    <!--
                                    <div class="col-sm-12 text-left">
                                        Introduce tu email y prueba suerte.
                                        <br>
                                        Solo por participar recibirás un premio seguro ;-)		
                                    </div>
                                    -->
                                    <div class="col-sm-12 text-left">
                                        Participa ya y descubre si has ganado al momento. ¡Premio asegurado!
                                    </div>                                    
                                </div>
                            </form>
                        </div><!-- /.col-sm-4 -->
                    </div>
                </div>                
            </div>
        </div>
        <div class="mitad2">
            
            <div class="container col-md-offset-2">
                
                <div class="row pie-redes-sociales">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                                <p>
                                    <ul class="redes-sociales">
                                        <li>
                                            <a href="https://twitter.com/bigbenint_esp" target="_blank">
                                                <img class="" src="img/twitter.png" alt="Twitter">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://facebook.com/bigbeninteractiveespana" target="_blank">
                                                <img class="" src="img/facebook.png" alt="Facebook">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://instagram.com/bigbenespana" target="_blank">
                                                <img class="" src="img/instagram.png" alt="Instagram">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.youtube.com/c/BigbenInteractiveEspaña" target="_blank">
                                                <img class="" src="img/youtube-play.png" alt="Youtube">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://es.pinterest.com/Bigbenint_esp/" target="_blank">
                                                <img class="" src="img/pinterest-light.png" alt="Pinterest">
                                            </a>
                                        </li>
                                    </ul>
                                </p>
                                <p>Síguenos en redes sociales <br> para enterarte de nuevos <br> sorteos como este.</p>
                        </div>
                </div>
            </div>
            <div class="fondo"></div>
        </div>
        
	

</body>
</html>

<?php ob_flush(); ?>

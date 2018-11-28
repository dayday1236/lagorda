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

require_once(dirname(__FILE__) . "/inc/conexion.php");
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
		<base href="<?php echo $url_sorteo; ?>" />
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

		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700" rel="stylesheet">


		<?php
                    //print_pixel_facebook();
                    print_google_analytics ();
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
	<style>                               
		html, body{
			/*height: 100%;*/
			color: #141414;
			background-color:#FFF;
			font-family: 'Raleway', sans-serif;
			margin:0px;
                        padding:0px;                        
		}
                
                
		
		body{
			background-image:url("/sorteo/img/fondo.png");
			/*background-size: cover;
			background-size: 100% 100%;*/
			background-repeat: no-repeat; 
                        /*background-position: 50%;*/
                        background-attachment: fixed;
                        
		}
                
                a, a:hover {
			color: #000;
			text-decoration:none;
		}
                
                .page {
                    width: 100%;
                    height: 100%;
                }
                
                .page > .borde-superior {
                    position: relative;
                    width: 100%;
                    height:6px;
                    background-color: #383838;
                    z-index: 100;
                }
                
                .page > .confeti-left {
                    position: fixed;                  
                    left: 0;
                    top: 0;
                    width: 35%;
                    height: 100%;
                    background-image: url("/sorteo/img/confetti-izq.png");
                    background-position: top left;
                    background-repeat: no-repeat;   
                    background-size: 100%;
                    z-index: 50;
                }
                
                .page > .confeti-right {
                    position: fixed;
                    right: 0;
                    top: 0;
                    width: 35%;
                    background-image: url("/sorteo/img/confetti-dcha.png");
                    background-position: top right;
                    background-repeat: no-repeat;   
                    background-size: 100%;
                    height: 100%;
                    z-index: 50;
                }
                
                .contenedor {
                    margin: 0 auto;  
                    display: table;   
                    position: relative;
                    z-index: 500;
                }
                
                .img-center {
                    margin: 0 auto;
		}
                
                .guide > .row {
                    width: 100%;
                    text-align: center;
                    margin: 0 auto;
                }
                
                .logo {
                    
                }
                
                .logo img {
                    margin: 0 auto;
                    max-height: 250px;
                    width: 100%;
                    max-width: 1515px;
                    display: inherit;
                }                          
                /*
                .texto-grande-mediano {
                    font-size: 300%;
                }
                
                .texto-grande {
                    font-size: 250%;
                }
                
                .texto-mediano-grande {
                    font-size: 160%;
                }
                
                .texto-mediano-mediano {
                    font-size: 120%;
                }
                
                .texto-mediano {
                    font-size: 105%;
                }
                
                .texto-normal {
                    font-size: 100%;
                }
                
                .texto-pequeno {
                    font-size: 90%;
                }
                */
                .guide .producto-img {
                    margin-top: 0%;
                    
                }
                
                .guide .producto-img img {
                    width: 1000px;
                    margin-left: 21px;
                }
                
                .guide .producto-img img.center {                    
                    margin-left: 42px;
                }
                /*
                .texto-verde {
                    color: #409a21;
                }
                
                .texto-verde-claro {
                    color: #4da72c;
                }
                */
                .borde-verde-claro {
                    border-color: #409a21 !important;
                }
                
                .fondo-verde-claro {
                    background-color: #4da72c !important;
                }
                
                .participa-y-gana {
                    margin-bottom: 7.3px !important;
                    font-size: 38px;
                    color: #007ac3;
                }
                
                .promocion-valida {
                    color: #007ac3;
                    font-size: 19px;
                }
                
                .participa-y-gana , .sorteamos {
                    font-weight: bold;                    
                }
                
                .texto-negrita {
                    font-weight: bold;
                }
		      
                .texto-producto {
                    font-size: 25px;
                    line-height: 1.44;
                }
                 
                .guide .instrucciones {
                    margin-top: 44px;
                    line-height: 1.53;
                    font-size: 19px;
                    font-weight: 500;
                }
                
                .guide #mc-form {
                    margin-top: 8% !important;
                    width: 100%;
                }
                
                #mc-form > .row {
                    margin-bottom: 3%;
                    margin-left: 0;
                }
                
                .boton {
                    line-height: 1.6em;
                    color: white;
                    font-size: 22.1px;
                    font-weight: bold;
                    
                    padding-top: 6px;
                    padding-bottom: 6px;
                    background-color: #007ac3;                    
                    transition: all .6s ease;
                    
                }
                
                .boton:hover {
                    color: #007ac3;
                    background-color: transparent;
                    background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0));
                    border: 3px #007ac3 solid;
                    padding: 4px;
                }
                
                #mc-email {
                    font-size: 13px;
                    border: solid 2px #007ac3;
                    border-radius: 0 !important;
                    -moz-border-radius: 0 !important;
                    -webkit-border-radius: 0 !important;
                    padding-top: 1.5em !important;
                    padding-bottom: 1.5em !important;
                    margin: 0;
                }
                
                #mc-email::-webkit-input-placeholder { /* Chrome/Opera/Safari */
                    color: #141414;
                }
                
                #mc-email:-moz-placeholder { /* Firefox 19+ */
                    color: #141414;
                }
                
                #mc-email:-ms-input-placeholder { /* IE 10+ */
                    color: #141414;
                }
                
                #mc-email:-moz-placeholder { /* Firefox 18- */
                    color: #141414;
                }
                
                .banda-pie {
                    width: 100%;
                    background-color: #fff;
                    color: #222 !important;
                    margin-bottom: 0%;
                    margin-top: 5%;
                    font-size: 17px;
                    bottom: 0;
                    position: relative;
                    z-index: 500;
                }
                
                .banda-pie .texto {
                    color: #222;
                    padding: 30px 0;
                }
                
                .content-redes-sociales {
                    margin-left: 1.6%;
                    vertical-align: text-bottom;
                }
                
                .content-redes-sociales a {
                    margin-right: .3%;
                }
                
                .checkbox {
                    
                }
                
                .checkbox label {
                    color: #141414;
                    font-size: 14px;
                    font-weight: lighter;
                    margin: 0;
                }
                
                .checkbox label a {
                    color: #141414;
                    
                    text-decoration: underline;
                    
                }
                
                .por-participar {
                    margin-top: 25px !important;
                    font-size: 25px;
                }
                
                .titulo {
                    line-height: 52px;
                }
                
                .titulo p {
                    margin-bottom: 0;
                }
                
                .contenedor-100 {
                    width: 100%;
                    margin-bottom: 64px;
                }
                    
                /* Extra Small */
                @media(max-width:767px){
                    body{font-size: 14px;background-size: 100% 100%;}
                    .divlogo {
                        width: 48% !important;                        
                    }
                    
                    .guide .producto-img img {                    
                        width: 80vw;
                    }
                    
                    .img-mobile {
                        display: block;
                    }
                    
                    .img-normal {
                        display: none;
                    }
                }
                /* Small */
                @media(min-width:768px) and (max-width:991px){
                    body{font-size: 14px;background-size: 100% 100%;}
                    
                    .guide .producto-img img {                    
                        width: 80vw;
                    }
                    
                    .img-mobile {
                        display: block;
                    }
                    
                    .img-normal {
                        display: none;
                    }
                }

                /* Medium */
                @media(min-width:992px) and (max-width:1199px){
                    body{font-size: 17px;background-size: 100% 100%;}
                    .img-mobile {
                        display: none;
                    }
                    
                    .img-normal {
                        display: block;
                    }
                }

                /* Large */
                @media(min-width:1200px){
                    body{font-size: 20px;background-size: 100% 100%;}
                    .img-mobile {
                        display: none;
                    }
                    
                    .img-normal {
                        display: block;
                    }
                }
                
                .logo-2 {
                                      
                        position: absolute;
                        left: 50%;
                        margin-left: -170px;
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
						confirmButtonColor:'#007ac3',
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
									location.href = 'ganador-g.php';
								} else if (msg == "2") {
                                                                        location.href = 'ganador-j.php';
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
                    <div class="col-xs-12 col-md-12 logo img-center " style="padding: 0; display: table;">
                        <img  alt="<?php $cliente ?>" src="img/banner-top.png" />                        
                        <!--<img style="width: 340px; top: 50%; margin-top: -25px;" class="logo-2"  alt="<?php $cliente ?>" src="img/logo.png" />-->
                    </div>
                    
                    
                </div>
            </div>
            
            <div class="contenedor">
                <div class="guide guide col-xs-12 col-md-12 col-lg-12">
                    
                    <span class="titulo text-center">
                        <p class="row texto-grande-mediano participa-y-gana">
                            ¡ENHORABUENA!
                        </p>                        
                        <p class="row texto-mediano-grande texto-producto">
                            HAS GANDO UN CAMISÓN PICARDÍAS <br>EN RASO BURDEOS 😍
                        </p>
                    </span>                     
                    <div class="row producto-img" style="margin-top: 1.5em;">
                        <!--<img style="" alt="Pijama Roja" src="img/pijama-roja-frente.png" />
                        <img style="" alt="Pijama Roja" src="img/pijama-roja-atras.png" />
                        <img style="" class="center" alt="Pijama Roja" src="img/pijama-negra-frente.png" />
                        <img style="" alt="Pijama Roja" src="img/pijama-negra-atras.png" />-->
                        <img style="" class="img-normal" alt="Pijama Roja" src="img/pijama.png" />
                        <img style="" class="img-mobile" alt="Pijama Roja" src="img/pijama-mobile.png" />
                    </div>
                    <div class="row texto-mediano-mediano instrucciones">
                        <p>Te hemos enviado un email con los pasos a seguir para <br>obtener tu regalo. Comprueba tu carperta de SPAM</p>
                    </div>
                    <div class="row texto-mediano-mediano texto-negrita promocion-valida" style="margin-top: 10px;">
                        <?php echo $fechas_promocion ?>
                    </div>
                    <form class="row" id="mc-form">                                                  
                        <div class="" style="margin: 0 auto; width: 70%;">
                            <a style="margin: 0 auto;" class="btn btn-secondary btn-block boton texto-mediano-mediano" href="<?php echo "http://bit.ly/MabelAmazon" ?>"><span class="">VER TODO EL CATÁLOGO</span></a>
                        </div>                        
                    </form>
                   
                </div>
                
            </div>
            
            <?php
                print_barra_footer();
            ?>
            
            
        </div>
        
	

</body>
</html>

<?php ob_flush(); ?>

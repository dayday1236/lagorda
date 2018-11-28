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

		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">


		<?php
                    print_pixel_facebook();
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
			color: #fff;
			background-color:#000;
			font-family: 'Lato', sans-serif;
			margin:0px;
                        padding:0px;
                        
                        
		}
                
                .tapa {
                    width: 100%;
                    position: fixed;
                    height: 100%;
                    opacity: 0.5;
                    background-image: radial-gradient(circle at 50% -35%, #722b07, #f6ac26);
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
			color: #fff;
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
                    margin: 45px auto 0 auto !important;               
                    width: 155px;
                    height: 79px;
                }
                
                .logo img {
                    width: 100%;
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
                .guide {
                    float: none;
                    margin: 0 auto;
                }
                
                .guide .producto-img {
                    margin-top: 8%;
                    
                }
                
                .guide .producto-img img {
                    width: 308px;
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
                    margin-bottom: .4em !important;
                    font-size: 45px;
                    
                }
                
                .participa-y-gana , .sorteamos {
                    font-weight: bold;                    
                }
                
                .texto-negrita {
                    font-weight: bold;
                }
		      
                .texto-producto {
                    font-size: 25px;
                    line-height: 1.25;
                }
                 
                .guide .instrucciones {
                    margin-top: 8%;
                    line-height: 110%;
                    font-size: 21px;
                    font-weight: lighter;
                }
                
                .guide #mc-form {
                    margin-top: 8% !important;
                    width: 80%;
                }
                
                #mc-form > .row {
                    margin-bottom: 1em;
                    margin-left: 0;
                }
                
                .boton {
                    line-height: 1.6em;
                    color: white;
                    font-size: 22.1px;
                    font-weight: bold;
                    
                    padding-top: 6px;
                    padding-bottom: 6px;
                    background-color: #7c101d;
                    background-image: linear-gradient(to right, #7c101d, #ae192b);
                    transition: all .6s ease;
                    
                }
                
                .boton:hover {
                    color: white;
                    background-color: transparent;
                    background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0));
                    border: 3px #ae192b solid;
                    padding: 4px;
                }
                
                #mc-email {
                    font-size: 13px;
                    border-radius: 0 !important;
                    -moz-border-radius: 0 !important;
                    -webkit-border-radius: 0 !important;
                    padding-top: 1.5em !important;
                    padding-bottom: 1.5em !important;
                }
                
                #mc-email::-webkit-input-placeholder { /* Chrome/Opera/Safari */
                    color: #222;
                }
                
                #mc-email:-moz-placeholder { /* Firefox 19+ */
                    color: #222;
                }
                
                #mc-email:-ms-input-placeholder { /* IE 10+ */
                    color: #222;
                }
                
                #mc-email:-moz-placeholder { /* Firefox 18- */
                    color: #222;
                }
                
                .banda-pie {
                    width: 100%;
                    background-color: #000;
                    color: white !important;
                    margin-bottom: 0%;
                    margin-top: 5%;
                    font-size: 17px;
                    bottom: 0;
                    position: relative;
                    z-index: 500;
                }
                
                .banda-pie .texto {
                    color: #fff;
                    padding: 30px 0;
                }
                
                .content-redes-sociales {
                    margin-left: 1.6%;
                    vertical-align: text-bottom;
                }
                
                .content-redes-sociales a {
                    margin-right: .3%;
                }
                
                .checkbox label {
                    color: #fff;
                    font-size: 13px;
                    font-weight: lighter;
                }
                
                .checkbox label a {
                    color: #fff;
                    
                    text-decoration: underline;
                    
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
                    
                }
                /* Small */
                @media(min-width:768px) and (max-width:991px){
                    body{font-size: 14px;background-size: 100% 100%;}
                    
                }

                /* Medium */
                @media(min-width:992px) and (max-width:1199px){
                    body{font-size: 17px;background-size: 100% 100%;}
                    
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
						confirmButtonColor:'#ae192b',
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
        
        <div class="page">
            <div class="tapa"></div>
            
            <div class="contenedor contenedor-100">
                <div class="guide guide col-xs-12 col-md-8 col-lg-8">
                    <div class="col-xs-12 col-md-2 logo img-center ">
                        <img  alt="<?php $cliente ?>" src="img/logo.png" />
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
                            Has ganado una 5$ Canada - Maple Leaf
                        </p>
                    </span>
                    <div class="row producto-img">
                        <img alt="Oregon HR-102" src="img/premio.png" />
                    </div>
                    <div class="row texto-mediano-mediano instrucciones">
                        <p>Te hemos enviado un email con los pasos a seguir para</p>
                        <p>obtener tu regalo. Comprueba tu carperta de SPAM</p>
                    </div>
                    <div class="row texto-mediano-mediano texto-negrita" style="margin-top: 2em;">
                        Promoción válida del ?? al ??
                    </div>
                    <form class="row" id="mc-form">                        
                                            
                        <div class="row">
                            <div class="col-md-10 col-xs-12" style="margin: 22px auto 0em auto; float: none;">
                                <a class="btn btn-secondary btn-block boton texto-mediano-mediano "  href="/"><span class="">VISITA NUESTRA WEB</span></a>                        
                            </div>
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

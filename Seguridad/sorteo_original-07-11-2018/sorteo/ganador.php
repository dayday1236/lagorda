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

		<script language="javascript" type="text/javascript" src="js/jquery-2.1.3.min.js"></script>

		<!-- plugins -->
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

		<link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

		<script src="plugins/sweetalert/sweetalert.min.js"></script>
		<link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" media="screen">

		<!-- /plugins -->

		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Oswald:300,400,700" rel="stylesheet">


		<?php
                    print_pixel_facebook_main();
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
<?php
    print_pixel_facebook_landing();
?>
<body>
	<style>                               
		html, body{
			/*height: 100%;*/
			color: #fff;
			background-color:#c90c1a;
			font-family: 'Oswald', sans-serif;
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
                        
                
                    border-top: 10px #1e1e1c solid;
                
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
                
                .contenedor-x2 {
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
                    width: 100%;
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
                .guide {
                    float: none;
                    margin: 0 auto;
                }
                
                .guide .producto-img {
                    margin-top: 0%;
                    
                }
                
                .guide .producto-img img {
                    width: 369px;
                    margin-left: 0;
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
                    margin-bottom: .4em !important;
                    margin-top: 1.5em;
                    font-weight: bolder;
                    font-size: 44px;
                    color: #fff;
                }
                
                .promocion-valida {
                    color: #fff;
                    font-size: 21px;
                    font-family: 'Open Sans';
                    margin-top: 2em;
                    font-weight: lighter;
                }
                
                .participa-y-gana , .sorteamos {
                    font-weight: normal;                    
                }
                
                .sorteamos {
                    color: #f6a623;
                    font-size: 60px;
                    line-height: 1.26;
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
                    line-height: 1.67;
                    font-size: 21px;
                    font-family: 'Open Sans';
                    font-weight: lighter;
                }
                
                .guide #mc-form {
                    margin-top: 8% !important;
                    padding: 1.5em 3.5em;
                    width: 100%;
                    color: #293341;
                    background-color: #ffffff;
                    box-shadow: 0 2px 17px 0 rgba(0, 0, 0, 0.11);
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
                    background-color: #e11021;                    
                    transition: all .6s ease;
                    font-family: 'Open Sans';
                    
                    border-radius: 100px;
                    -moz-border-radius: 100px;
                    -webkit-border-radius: 100px;
                    
                }
                
                .boton:hover {
                    color: #e11021;
                    background-color: transparent;
                    background-image: linear-gradient(to right, rgba(255,255,255,0), rgba(255,255,255,0));
                    border: 3px #e11021 solid;
                    padding: 4px;
                }
                
                .boton-esp {
                    border: 3px #fff solid;
                    
                    line-height: 1.6em;
                    color: white;
                    font-size: 22.1px;
                    font-weight: normal;
                    
                    padding-top: 6px;
                    padding-bottom: 6px;
                    background-color: #e11021;                    
                    transition: all .6s ease;
                    font-family: 'Open Sans';
                    
                    border-radius: 100px;
                    -moz-border-radius: 100px;
                    -webkit-border-radius: 100px;
                    
                }
                
                .boton-esp:hover {
                    color: #e11021;
                    background-color: white;
                    
                    border: 3px #white solid;
                    padding: 6px;
                }
                
                label {
                    width: 100%;
                    color: #293341;
                    font-family: 'Open Sans';
                    font-size: 16px;
                    font-weight: 500;
                    
                }
                
                .input-texto {
                    font-size: 13px;
                    border: none;
                    border-radius: 0 !important;
                    -moz-border-radius: 0 !important;
                    -webkit-border-radius: 0 !important;
                    padding-top: 1.5em !important;
                    padding-bottom: 1.5em !important;
                    margin: 0;
                    margin-top: 8px;
                    
                    background-color: #f3f3f3;
                    width: 100%;
                }
                
                .input-texto::-webkit-input-placeholder { /* Chrome/Opera/Safari */
                    color: #141414;
                }
                
                .input-texto:-moz-placeholder { /* Firefox 19+ */
                    color: #141414;
                }
                
                .input-texto:-ms-input-placeholder { /* IE 10+ */
                    color: #141414;
                }
                
                .input-texto:-moz-placeholder { /* Firefox 18- */
                    color: #141414;
                }
                
                .banda-pie {
                    width: 100%;
                    background-color: #000;
                    color: #fff !important;
                    margin-bottom: 0%;
                    margin-top: 5%;
                    font-size: 19.2px;
                    bottom: 0;
                    position: relative;
                    z-index: 500;
                    
                    font-family: 'Open Sans';
                }
                
                .banda-pie .texto {
                    color: #fff; 
                    padding: 52px 0;                                        
                }
                
                .subtexto {
                    color: #828282;
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
                    font-weight: 400;
                    margin: 0;
                }
                
                .checkbox label a {
                    color: #293341;
                    font-family: 'Open Sans';
                    font-size: 14px;
                    
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
                
                .cont-esp {
                    width: 70%;
                }
                    
                /* Extra Small */
                @media(max-width:767px){
                    body{font-size: 14px;background-size: 100% 100%;}
                    .divlogo {
                        width: 48% !important;                        
                    }
                    
                    .guide .producto-img img {                    
                        width: 80vw;
                        margin-top: 4.5em !important;
                        margin-left: 0 !important;
                    }
                    
                    .img-mobile {
                        display: block;
                    }
                    
                    .img-normal {
                        display: none;
                    }
                    
                    .cont-esp {
                        width: 90%;
                    }
                    
                    .logo-2 {
                        left: 50% !important;
                        margin-left: -94px !important;
                    }
                    
                    .participa-y-gana {
                        font-size: 28px;
                        line-height: 1.4;
                    }
                    
                    .sorteamos {
                        font-size: 32px;
                        line-height: 1.4;
                    }
                    
                    .instrucciones {
                        font-size: 19px !important;
                        line-height: 1.4 !important;
                    }
                    
                    .instrucciones br {
                        display: none;
                    }
                    
                    .promocion-valida {
                        font-size: 18px !important;
                        line-height: 1.2;
                    }
                    
                    #mc-form {
                        padding: 1.5em !important;
                    }
                    
                    .aun-no-conoces {
                        font-size: 26px;
                        line-height: 1.4;
                    }
                    
                    .texto {
                        font-size: 15px;
                    }
                    
                    .texto table {
                        width: 85%;
                    }
                    
                    .content-redes-sociales a {
                        margin-right: 0;
                    }
                    
                    .content-redes-sociales a img {
                        width: 2.5em;
                    }
                    
                    .contenedor {
                        display: block;
                    }
                    
                    .boton-esp {
                        font-size: 16px;
                    }
                }
                /* Small */
                @media(min-width:768px) and (max-width:991px){
                    body{font-size: 14px;background-size: 100% 100%;}
                    
                    .guide .producto-img img {                    
                        width: 80vw;
                        margin-top: 4.5em !important;
                        margin-left: 0 !important;
                    }
                    
                    .img-mobile {
                        display: block;
                    }
                    
                    .img-normal {
                        display: none;
                    }
                    
                    .cont-esp {
                        width: 90%;
                    }
                    
                    .logo-2 {
                        left: 50% !important;
                        margin-left: -94px !important;
                    }
                    
                    .participa-y-gana {
                        font-size: 28px;
                        line-height: 1.4;
                    }
                    
                    .sorteamos {
                        font-size: 32px;
                        line-height: 1.4;
                    }
                    
                    .instrucciones {
                        font-size: 19px !important;
                        line-height: 1.4 !important;
                    }
                    
                    .instrucciones br {
                        display: none;
                    }
                    
                    .promocion-valida {
                        font-size: 18px !important;
                        line-height: 1.2;
                    }
                    
                    #mc-form {
                        padding: 1.5em !important;
                    }
                    
                    .aun-no-conoces {
                        font-size: 26px;
                        line-height: 1.4;
                    }
                    
                    .texto {
                        font-size: 15px;
                    }
                    
                    .texto table {
                        width: 85%;
                    }
                    
                    .content-redes-sociales a {
                        margin-right: 0;
                    }
                    
                    .content-redes-sociales a img {
                        width: 2.5em;
                    }
                    
                    .contenedor {
                        display: block;
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
                    <div class="col-xs-12 col-md-12 logo img-center " style="padding: 0; display: table;">
                        <img style="width: 100%; position: fixed;" alt="<?php $cliente ?>" src="img/textura-bg.png" />                        
                        <img style="width: 100%; position: fixed;" alt="<?php $cliente ?>" src="img/confeti.png" />
                        <img style="width: 100%; position: fixed; top: 600px;" alt="<?php $cliente ?>" src="img/confeti-copy.png" />
                        <img style="width: 188px; top: 15px; left: 109px;" class="logo-2"  alt="<?php $cliente ?>" src="img/logo.png" />
                    </div>
                    
                    
                </div>
            </div>
            
            <div class="contenedor">
                <div class="guide guide col-xs-12 col-md-12 col-lg-12">
                    <div class="row producto-img">
                        <!--<img style="" alt="Pijama Roja" src="img/pijama-roja-frente.png" />
                        <img style="" alt="Pijama Roja" src="img/pijama-roja-atras.png" />
                        <img style="" class="center" alt="Pijama Roja" src="img/pijama-negra-frente.png" />
                        <img style="" alt="Pijama Roja" src="img/pijama-negra-atras.png" />-->
                        <img style="" class="boleto" alt="Boleto" src="img/boleto-2017-ok-01.png" />
                        
                    </div>
                    <span class="titulo text-center">
                        <p class="row texto-grande-mediano participa-y-gana">
                            ¡ENHORABUENA!
                        </p>             
                        <p class="row texto-grande sorteamos">
                            HAS GANADO UN BOLETO DE <br>LA GORDA DE NAVIDAD
                        </p>
                                               
                        
                    </span> 
                    
                </div>
            </div>
            <div class="contenedor">
                <div class="guide guide col-xs-12 col-md-12 col-lg-12">
                    <div class="row texto-mediano-mediano instrucciones">
                        <p>Te hemos enviado un email con los pasos a seguir para <br>obtener tu regalo. Comprueba tu carperta de SPAM</p>
                    </div>
                    <div class="row texto-mediano-mediano  promocion-valida" style="margin-top: 15px;">
                        <?php echo $fechas_promocion ?>
                    </div>
                    
                    <div class="row" style="margin-top: 68px;">
                        <div class="col-md-12 col-xs-12" style="">
                            <a href="http://lagordadenavidad.es/premios-2017" class="btn btn-secondary btn-block boton-esp texto-mediano-mediano "  type="button"><span class="">VER PREMIOS 2017</span></a>                        
                        </div>
                    </div>
                   
                </div>
                
            </div>
            
            <?php
                print_barra_footer();
            ?>
            
            
        </div>
        
	

</body>
</html>

<?php ob_flush(); ?>

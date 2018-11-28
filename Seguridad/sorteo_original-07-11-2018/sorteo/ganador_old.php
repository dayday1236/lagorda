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
                    font-size: 170%;
                    font-weight: bold;
                    line-height: 1.22;                    
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
                
                .redes-sociales {
                    list-style-type: none;
                    padding-left: 0px;
                }
                
                .redes-sociales li {
                    display: inline;
                }
                                                      
                .pie-redes-sociales {
                    margin-top: 10%; 
                    padding-bottom: 5%;
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
                    background-image: url("/sorteo_2/img/bg-confeti.png");
                    background-position: top right;
                    background-repeat: no-repeat;   
                    background-size: 100% 100%;
                    
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
                    background-image: url("/sorteo_2/img/bg-confeti.png");
                    background-position: top right;
                    background-repeat: no-repeat;    
                    background-size: 100% 100%;
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
                
                .azul-claro {
                    background-color: #4797d1;
                    color: white;
                }
                
                .texto-descuento {
                    line-height: 180%;
                    font-weight: lighter;                    
                }
                
                .negrita {
                    font-weight: bold;                    
                }
                
                .dto20 {
                    position: absolute;
                    display: inline-block;
                    right:2%;
                    top: 20%;
                    margin-left: 10%;   
                    margin-top: 0;
                    width: 30%;
                    text-align: center;
                    z-index: 110;
                }
                
                .dto20 .nacon {
                    width: 100%;
                    margin-top: 5%;
                }
                
                .dto20 .titulo {
                    display: inline-block;
                    padding: 1.5% 3%;                                       
                    background-color: rgba(0, 0, 0, 0.6);
                    margin: 0 auto;
                    font-size: 125%;
                    font-weight: bold;                    
                }
                
                .mini.dto20 {
                    display: none;
                    visibility: hidden;                    
                }

                .normal.dto20 {
                    display: block;
                    visibility:visible;  
                }
                
                /* Extra Small */
                @media(max-width:767px){
                    body{font-size: 12px;background-size: 100% 100%;}
                    .divlogo {
                        width: 48% !important;                        
                    }
                    
                    .pie-redes-sociales {
                        margin-top: 16%; 
                        font-size: 120%;
                        
                    }                                       
                    
                    .mitad2 .fondo {                        
                        width: 100%;
                    }
                    
                    .dto20 {
                        position: relative;
                        display: block;
                        margin: 5% auto;
                        width: 80%;
                    }
                    
                    .dto20 .nacon {
                        width: 100%;
                    }
                    
                    .texto-descuento {
                        font-size: 120%;
                    }
                    
                    .normal.dto20 {
                        display: none;
                        visibility: hidden;                    
                    }
                    
                    .mini.dto20 {
                        display: block;
                        visibility:visible;  
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
                    .dto20 {
                        right:15%;
                        width: 25%;
                    }
                    
                   
                }
	</style>
        
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
                                    <h1 class="Quieres-ganar-un-Na">¡Enhorabuena!<br> <span class="text-style-1"> ¡Has ganado! </span> </h1>
                                </div>
                        </div>
                    </div><!-- /.row -->
                    <div class="row" style="padding-bottom: 5%;">
                        <div class="col-sm-6 col-md-8 col-lg-6 text-left">
                            <div class="row ">
                                <div class="col-sm-12 text-left texto-descuento">
                                    <div class="separacion-inf">Te hemos enviado un email con los pasos a seguir para obtener tu regalo. <br> Comprueba tu Carpeta de SPAM</div>
                                    
                                    <div class="negrita separacion-inf-x2">Promoción válida del 7 al 9 de Julio</div>
                                    
                                    <a href="https://www.bigbenshop.es"><button type="button" class="btn azul-claro btn-lg">VISITA NUESTRA TIENDA</button></a>
                                                                      
                                </div>
                            </div>
                        </div><!-- /.col-sm-4 -->
                        
                        <div class="mini dto20">                            
                            <div class="titulo text-center">Divoom Timebox </div>
                            <img class="nacon" src="img/divoom.png"/>
                        </div>
                    </div>
                </div>                  
            </div>
        </div>
        <div class="mitad2">
            <div class="fondo"></div>
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
            
        </div>
        
        <div class="normal dto20">                            
            <div class="titulo text-center">Divoom Timebox</div>
            <img class="nacon" src="img/divoom.png"/>
        </div>
	

</body>
</html>

<?php ob_flush(); ?>

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

		<link href="https://fonts.googleapis.com/css?family=Asap:400,400i,700,700i" rel="stylesheet">


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
			color: #000;
			background-color:#ffffff;
			font-family: 'Asap', sans-serif;
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
                
                .guide {
                    float: none;
                    margin: 0 auto;
                }
                
                .guide > .row {
                    width: 100%;
                    text-align: center;
                    margin: 0 auto;
                }
                
                .logo {
                    margin: 5% auto !important;
                    width: 32% !important;
                }
                
                .logo img {
                    width: 100%;
                }                                
                
                .texto-grande {
                    font-size: 250%;
                }
                
                .texto-mediano-grande {
                    font-size: 180%;
                }
                
                .texto-mediano-mediano {
                    font-size: 115%;
                }
                
                .texto-mediano {
                    font-size: 105%;
                }
                
                .texto-normal-grande {
                    font-size: 102%;
                }
                
                .texto-normal {
                    font-size: 100%;
                }
                
                .texto-pequeno {
                    font-size: 80%;
                }                               
                
                .texto-verde {
                    color: #409a21;
                }
                
                .texto-verde-claro {
                    color: #4da72c;
                }
                
                .borde-verde-claro {
                    border-color: #409a21 !important;
                }
                
                .fondo-verde-claro {
                    background-color: #4da72c !important;
                }
                
                .participa-y-gana , .sorteamos {
                    font-weight: bold;
                    font-style: italic;
                }
                
                .texto-negrita {
                    font-weight: bold;
                }
                
                .texto-cursiva {
                    font-style: italic;
                }
		      
                .texto-producto {
                    font-style: italic;
                }
                 
                .guide .instrucciones {
                    margin-top: 8%;
                    margin-bottom: 1.2%;
                    line-height: 29px;
                    width: 80%;
                }
                
                .guide .producto-img img {
                    width: 100%;
                }
                
                .guide #mc-form {
                    margin-top: 8% !important;
                    width: 80%;
                }
                
                #mc-form > .row {
                    margin-bottom: 3%;
                    margin-left: 0;
                }
                
                .boton {
                    line-height: 1.6em;
                    color: white;
                    font-weight: bold;
                    -webkit-border-radius: 9.2px;
                    -moz-border-radius: 9.2px;
                    border-radius: 9.2px;
                    width: 70%;
                    margin: 10% auto 2% auto;
                }
                
                .boton a:hover {
                    text-decoration: none !important;
                }
                
                .mc-email {
                    font-size: 100%;
                }
                
                .banda-pie {
                    width: 100%;
                    background-color: #fafafa;
                    margin-bottom: 8%;
                    margin-top: 5%;      
                    position: relative;
                    z-index: 500;
                }
                
                .banda-pie .texto {
                    color: #535353;
                    padding: 2.5% 0;
                }
                
                .content-redes-sociales {
                    margin-left: 1.6%;
                    vertical-align: text-bottom;
                }
                
                .content-redes-sociales a {
                    margin-right: .3%;
                }
                
                .checkbox label {
                    color: #535353;
                }
                
                .checkbox label a {
                    color: #535353;
                    text-decoration: underline;
                }
                
                .titulo {
                    line-height: 52px;
                    margin-bottom: 2%;
                }
                
                .titulo2 {
                    line-height: 48px;
                    margin-bottom: 10%;
                }
                
                .titulo p, .titulo2 p {
                    margin-bottom: 0;
                }
                
                .codigo-descuento {
                    margin-top: 5% !important;
                }
                    
                /* Extra Small */
                @media(max-width:767px){
                    body{font-size: 14px;background-size: 100% 100%;}
                    .divlogo {
                        width: 48% !important;                        
                    }
                    .guide .producto-img {                        
                        width: 90%;
                    }
                }
                /* Small */
                @media(min-width:768px) and (max-width:991px){
                    body{font-size: 14px;background-size: 100% 100%;}
                    .guide .producto-img {                        
                        width: 90%;
                    }
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
	        
        <div class="page">
            <div class="borde-superior"></div>                        
            <div class="confeti-left"></div>            
            <div class="confeti-right"></div>            
            
            <div class="contenedor">
                <div class="guide col-xs-12 col-md-12 col-lg-8">
                    <div class="row logo img-center ">
                        <img alt="Phone Super Market" src="img/logo-p-s.png" />
                    </div>
                    <div class="titulo text-center">
                        <p class="row texto-grande participa-y-gana">
                            ¡ENHORABUENA!
                        </p>
                        <p class="row texto-grande participa-y-gana texto-verde">
                            ¡HAS GANADO!
                        </p>                        
                    </div>                    
                    <div class="row producto-img">
                        <img alt="GANADOR" src="img/reloj-ganador.png" />
                    </div>                    
                    <div class="row texto-mediano instrucciones">
                        Te hemos enviado un email con los pasos a seguir para obtener tu regalo. Comprueba tu carperta de SPAM
                    </div>
                    <div class="row texto-mediano texto-negrita texto-verde-claro">
                        Promoción válida del ?? al ??
                    </div>
                    
                    <a href="<?php echo $url_tienda ?>"><button class="row btn btn-secondary btn-block boton fondo-verde-claro texto-normal-grande negrita" type="button"><span class="">VISITA NUESTRA WEB</span></button></a>
                   
                </div>
                
            </div>
            
            <?php
                print_barra_footer();
            ?>
            
            
        </div>
        
	

</body>
</html>

<?php ob_flush(); ?>

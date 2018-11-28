<?php

require_once dirname(__FILE__) . "/inc/mailchimp/MailChimp.php";

//config lagorda

//$status_landing = 1; 
// -1 - oculta
// 0 - sin ganadores - pero visible
// 1 - activa
$id_sorteo=1;

$query = $db->prepare("SELECT status FROM lottery WHERE Id=?");
$query->execute(array($id_sorteo));
$rstatus = $query->fetch(PDO::FETCH_OBJ)->status;
//print_r($rstatus);
$status_landing = $rstatus;

$dias=array("2017-10-24","2017-10-25","2017-10-26","2017-10-27");

$arr_num_premios_dia = [25,25,25,25];
$max_premios = 100;
$hora_ini = '12:00';
$hora_fin = '23:59';

$fechas_promocion = "Promoción válida del 24 al 27 de Octubre";

$probabilidad_max=3; // Random entre 1 y el valor que determines - número de inscritos ese dia
$probabilidad_min=2; // La probabilidad no puede bajar de este numero

$codigo="CODIGODESC";

$cliente = "LA GORDA DE NAVIDAD";

$title = "Gana 1 BOLETO GRATIS DE LA GORDA DE NAVIDAD!";

$url_tienda = 'http://lagordadenavidad.es/'; 
$url_sorteo = $url_tienda."sorteo/";


$cnd_pixel_actual = true;
$cnd_analytics_actual = true;
$cnd_mailchimp_actual = true;
$cnd_condiciones = true;
$cnd_fechas = true;
$cnd_mails = true;

$cnd_pixel_actual_cj = true;
$cnd_analytics_actual_cj = true;
$cnd_mailchimp_actual_cj = true;
$cnd_condiciones_cj = true;
$cnd_fechas_cj = true;
$cnd_mails_cj = true;

$hoy = date("Y-m-d");

$cnd_dia = in_array($hoy, $dias);

if ($cnd_dia !== FALSE) {
    $indice = array_search($hoy, $dias);
    if (is_array($arr_num_premios_dia)) {
        $num_premios_dia = isset($arr_num_premios_dia[$indice]) ? $arr_num_premios_dia[$indice] : 0;
    }
} else {
    $indice = -1;
    $num_premios_dia = 0;
}

//$horas = array('12:05');

$segundos_diff = strtotime($hora_fin) - strtotime($hora_ini);
$minutos_diff = floor($segundos_diff / 60);

$minutos_entre_premios = floor($minutos_diff / $num_premios_dia);
$cantidad_partes = floor($minutos_diff / $minutos_entre_premios);

$horas = [];

for ($i = 0; $i < $cantidad_partes; $i++) {
    $hora = strtotime($hora_ini) + $minutos_entre_premios * $i * 60;
    $hora_str = date("H:i",$hora);
    $horas[] = $hora_str;
}

//print_r($horas);    


function print_pixel_facebook_main () { //actualizado a La Gorda
    ?>
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '213820232362876');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=213820232362876&ev=PageView&noscript=1"
                   /></noscript>
    <!-- End Facebook Pixel Code -->


    <?php
}

function print_pixel_facebook_landing () { 
?>
        <!-- Facebook Pixel Code -->    
        <script>
            fbq('track', 'Lead');
        </script>
        <!-- End Facebook Pixel Code -->
    <?php    
}

function print_barra_footer () {
    ?>    
    <div class="banda-pie text-center texto-normal">
        <div class="texto">
            <table style="margin: 0 auto;">
                <tr>
                    <td style="text-align: left;">
                        Síguenos en redes sociales
                        <div class="subtexto">¡y entérate de nuevos sorteos como éste!</div>
                    </td>
                    <td style="">
                        <div style="width: 2em;">&nbsp;</div>
                    </td>
                    <td>
                        <span class="content-redes-sociales">
                            <a href="https://facebook.com/lagordadenavidad" target="_blank">
                                <img class="" src="img/facebook.png" alt="Facebook">
                            </a>   
                            
                            <a href="https://twitter.com/GordaDeNavidad" target="_blank">
                                <img class="" src="img/twitter.png" alt="Twitter">
                            </a>
                        </span>
                    </td>
                </tr>                
            </table>                                    
        </div>
    </div>        
    <?php
}

function print_google_analytics () { //actualizado a La Gorda de Navidad - https://analytics.google.com/analytics/web/?authuser=2#management/Settings/a45527613w76225222p78803317/%3Fm.page%3DTrackingCode/
    ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-45527613-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-45527613-1');
        </script>


    <?php
}

use \DrewM\MailChimp\MailChimp;

function registrar_mailchimp($email, $nombre) {
    
    $MailChimp = new MailChimp('a9f32822ecd19e9c0c13b8c744204d99-us12'); //actualizado al mailchimp de complejo castejon - landing octubre
    $list_id = '9120a15878';

    $result1 = $MailChimp->post("lists/$list_id/members", [
                                    'email_address' => $email,
                                    'status'        => 'subscribed',
                            ]);


    $arr_nombre = explode(' ', $nombre);
    $nombre = $arr_nombre[0];

    $apellido = isset($arr_nombre[1]) ? $arr_nombre[1] : "";

    $subscriber_hash = $MailChimp->subscriberHash($email);

    $result2 = $MailChimp->patch("lists/$list_id/members/$subscriber_hash", [
        'merge_fields' => ['FNAME'=>$nombre, 'LNAME'=>$apellido]   
    ]);

    //print_r($result2);
}
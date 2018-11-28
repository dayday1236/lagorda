<?php
$dias=array("2017-06-12");
$horas = array('12:05');
$hora_ini = '12:00';
$hora_fin = '23:59';

$num_premios_dia=5;
$probabilidad_max=3; // Random entre 1 y el valor que determines - número de inscritos ese dia
$probabilidad_min=2; // La probabilidad no puede bajar de este numero
$id_sorteo=1;

$codigo="REGALO2017";

$cliente = "BIG BEN SHOP";
//moneda de plata 5 $ Canada - Maple Leaf
$title = "Gana una de las moneda de plata 5 $ Canada - Maple Leaf";

$url_tienda = 'http://bigandbeauty.com/';
$url_sorteo = $url_tienda."sorteo/";


function print_pixel_facebook () {
    ?>
        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '737287983093976'); // Insert your pixel ID here.
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=737287983093976&ev=PageView&noscript=1"
        /></noscript>
        <!-- DO NOT MODIFY -->
        <!-- End Facebook Pixel Code -->

    <?php
}

function print_barra_footer () {
    ?>    
    <div class="banda-pie text-center texto-normal">
        <div class="texto">
            Síguenos en redes sociales para enterarte de nuevos sorteos como este                    
            <span class="content-redes-sociales">
                <a href="#" target="_blank">
                    <img class="" src="img/facebook.png" alt="Facebook">
                </a>   
                <!--<a href="https://twitter.com/PhoneSMarket" target="_blank">
                    <img class="" src="img/twitter.png" alt="Twitter">
                </a>-->                        
            </span>
        </div>
    </div>        
    <?php
}
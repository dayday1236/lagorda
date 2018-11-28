<?php

//Cambiar los id con los id propios

$idFace = "213820232362876";
$idGoogle = "UA-45527613-1";

function print_pixel_facebook_main()
{ //actualizado a La Gorda
    echo <<< SCRIPT
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
                   src="https://www.facebook.com/tr?id=$idFacebook&ev=PageView&noscript=1"
                   /></noscript>
    <!-- End Facebook Pixel Code -->
SCRIPT;
}

function print_pixel_facebook_landing()
{
    echo <<< SCRIPT

        <!-- Facebook Pixel Code -->
        <script>
            fbq('track', 'Lead');
        </script>
        <!-- End Facebook Pixel Code -->
SCRIPT;
}

function print_google_analytics()
{ //actualizado a La Gorda de Navidad - https://analytics.google.com/analytics/web/?authuser=2#management/Settings/a45527613w76225222p78803317/%3Fm.page%3DTrackingCode/
    echo <<< CODIGOHTML
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=$idGoogle"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-45527613-1');
        </script>
CODIGOHTML;
}

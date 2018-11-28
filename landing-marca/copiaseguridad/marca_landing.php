<?php ?>
<style>
    <?php $btnclass = "btn-red";

if (isset($producto->color_principal_tema) && !empty($producto->color_principal_tema)) {
    echo ".btn-especial { background: #" . $producto->color_principal_tema . "; padding: .8em 4em !important; }";
    echo ".btn-especial a{
color: #fff;
    }

    .btn-especial {
        color: #fff;
    }

    .btn-especial:active,
    .btn-especial:focus,
    .btn-especial:hover {
        background: #fff;
        border-color: #" . $producto->color_principal_tema . ";
        color: #" . $producto->color_principal_tema . ";
        opacity: 1;
    }

    .btn-especial:active a,
    .btn-especial:focus a,
    .btn-especial:hover a {
        color: #" . $producto->color_principal_tema . ";
    }

    ";
    $btnclass = "btn-especial";
}

?>

@import url('https://fonts.googleapis.com/css?family=Montserrat');
@import url('https://fonts.googleapis.com/css?family=Archivo+Black');
.cm-title {
    font-family: 'Montserrat', sans-serif;
    font-family: 'Archivo Black', sans-serif;        font-weight: 900;
        font-size: 2.7em;
        color: red;
        margin-top:10px;
        padding-top: 60px;

    }

    .cm-text {
        font-family: 'Montserrat', sans-serif;

        font-size: 1.8em;
        font-weight: 500;
        /* padding-top: 10px; */
        line-height: 1.4;
        margin-top: 5px;

    }

    @media (max-width: 575.98px) {
        .cm-title {
            font-weight: 900;
            font-size: 2em;
            color: red;
        }

        .cm-text {
            font-size: 1em;
            font-weight: 600;
            /* padding-top: 10px; */
            line-height: 1.4;
            margin-bottom: 6%;


        }
    }


@media (min-width: 575.98px) and (max-width: 780px) {
    .cm-title {
            font-weight: 900;
            font-size: 3em;
            color: red;
        }

        .cm-text {
            font-size: 1.5em;
            font-weight: 600;
            /* padding-top: 10px; */
            line-height: 1.2;
            margin-bottom: 6%;

        }

 }
</style>



<div class="banner-div">
    <div class="row">
        <div class="col-md-12 ">
            <!-- <img src="<?php echo site_url('img_db/productos/marcahead.png'); ?>" style="width:100;" class="hidden-sm"/>
            <img src="<?php echo site_url('img_db/productos/marcahead.png'); ?>" style="width:100;" class="hidden-md"/> -->
            <img src="<?php echo site_url('img_db/productos/marcahead-2.png'); ?>" style="width:100;" class="hidden-sm" />
            <img src="<?php echo site_url('img_db/productos/marcahead-2.png'); ?>" style="width:100;" class="hidden-md" />
        </div>
    </div>
    <div class="row" style="padding:4%;">

        <div class="col-md-6">
            <div class="row mb-5 ">

                <div class="col-md-12 " style="margin-bottom: 25px;">
                    <h2 class="cm-title">¿Y SI ACABA EN 80?</h2>
                </div>

                <div class="col-md-12 ">
                    <p class="mb-5 cm-text"> En MARCA queremos celebrar el 80 ANIVERSARIO repartiendo suerte con EL
                        SUPERGORD@ MARCA, un boleto que incluye:</p>
                </div>


                <!--
                <div class="col-md-12" style="margin-bottom: 25px">
                    <img src="<?php echo site_url('img_db/productos/300marca.png'); ?>" style="width:100;"/>
                </div>

                <div class="col-md-12">
                    <p style="margin-top:2%;font-size: 1.1em;"> En 2018, La Gorda de Navidad viene cargada de más de 200 ganadores, repartidos en 2 primeros premios, 2 segundos premios, 2 terceros premios y más de 200 premios adicionales.</p>
                    <p style="font-weight:bold;margin-top:2%;font-size: 1.1em;">
                        ¡Esta año, La Gorda de Navidad tira el camión por la ventana!
                    </p>
                    <p style="margin-top:2%;font-size: 1.1em;">Y, ahora, con la compra de tu boleto de La Gorda, te llevas una participación de 10€ de la Lotería de Navidad para el próximo 22 de diciembre. Este año, llévate El Gordo y La Gorda de Navidad por sólo 20€.</p>
                </div>
                -->


            </div>
        </div>

        <div class="col-md-6" style="@media (max-width: 575.98px) {margin-top: 9%;}; ">
            <!--            <img src="-->
            <?php //echo site_url('img_db/productos/logo_promocion.jpg'); ?>
            <!--" style="width:80%;margin-bottom:5%" class="center-block img-responsive"/>-->
            <!-- <img src="<?php echo site_url('img_db/productos/logo.png'); ?>" style="width:80%;margin-bottom:5%" class="center-block img-responsive"/>-->
            <img src="<?php echo site_url('img_db/productos/marca-participa.png'); ?>" style="margin-bottom:5%; margin-top: 9%;" class="center-block img-responsive" />
            <!-- <div class="col-md-4 col-md-offset-4 hidden-md" style="margin-top:4%;margin-bottom:4%"><a href="#" style="width:100%;"
                    class="btn <?php echo $btnclass; ?> btn-lg btn-comprar" data-loading-text="CARGANDO..." data-tipo="ficha"
                    data-landing="<?php echo $datos; ?>">COMPRAR</a></div> -->
        </div>


<!--
        <div class="col-md-4 col-md-offset-4 hidden-sm" style="margin-top:4%"><a href="#" style="width:100%;" class="btn <?php echo $btnclass; ?> btn-lg btn-comprar"
                data-loading-text="CARGANDO..." data-tipo="ficha" data-landing="<?php echo $datos; ?>">COMPRAR</a></div> -->


    </div>
    <div>
        <div class="col-md-12 ">
            <!-- <img src="<?php echo site_url('img_db/productos/camion.png'); ?>" style="width:100;" class="hidden-sm"/>
            <img src="<?php echo site_url('img_db/productos/camion_mv.jpg'); ?>" style="width:100;" class="hidden-md"/> -->
            <img src="<?php echo site_url('img_db/productos/camion-sinfondo.png'); ?>" style="width:100;" class="hidden-sm" />
            <img src="<?php echo site_url('img_db/productos/camion-sinfondo.png'); ?>" style="width:100;" class="hidden-md" />
        </div>
    </div>
</div>
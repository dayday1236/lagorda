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

?>@import url('https://fonts.googleapis.com/css?family=Montserrat');
    @import url('https://fonts.googleapis.com/css?family=Archivo+Black');

    .cm-img-fondo {

     background-image: url(img_db/productos/marca-nino.png);
        /* background-position: center center; */
        background-repeat: no-repeat;
        /* background-attachment: fixed; */
        background-size: cover;
        background-color: white;
        height: 600px;
    }

    .zindex{
        z-index: -10;
    }
    .col-center {
    float: none;
    margin: 0 auto;
}

    .cm-title {
        font-family: 'Montserrat', sans-serif;
        font-family: 'Archivo Black', sans-serif;
        font-weight: 900;
        font-size: 3.6em; /*rs*/
        color: red;
        margin-top: 10px;

        padding-top: 20px;
        width: 700px; /*rs*/
    }

    .cm-text {
        font-family: 'Montserrat', sans-serif;
        font-family: 'Archivo Black', sans-serif;
        font-size: 1.7em;
        font-weight: 600;
        /* padding-top: 10px; */
        line-height: 1.4;
        margin-top: 10px;
    }
    .cm-row-img-bruja{
        margin-top: 20px;
    }
    .cm-img-bruja{
        height: 280px;
        width: 500px;
    }

    @media (max-width: 575.98px) {
        .cm-title {
            font-weight: 900;
            font-size: 2em;
            color: red;
            width: auto;
        }

        .cm-text {
            font-size: 1em;
            font-weight: 600;
            /* padding-top: 10px; */
            line-height: 1.4;
            margin-bottom: 6%;
        }
        .cm-img-bruja{
            height: auto;
            width: auto;
        }
        .cm-img-fondo{
            height: 200px;
            margin-top: 20px;
        }
        .cm-row-img-bruja{
            margin-top: 0;
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
        .cm-img-bruja{
            height: auto;
            width: auto;

        }
        .cm-img-fondo{

            margin-top: 25px;
        }
    }
</style>



<div class="banner-div">
    <div class="row">
        <div class="col-md-12 ">
            <!-- <img src="<?php echo site_url('img_db/productos/marcahead.png'); ?>" style="width:100;" class="hidden-sm"/>
            <img src="<?php echo site_url('img_db/productos/marcahead.png'); ?>" style="width:100;" class="hidden-md"/> -->
            <img src="<?php echo site_url('img_db/productos/marca-banner-reducido.png'); ?>" style="width:100;" class="hidden-sm" />
            <img src="<?php echo site_url('img_db/productos/marca-banner-reducido.png'); ?>" style="width:100;" class="hidden-md" />
        </div>
    </div>


    <div class="row " style="padding: 2% 4%; ">

        <div class="col-12 col-sm-12 col-md-5">
            <div class="row">
                    <h2 class="cm-title">¿Y SI ACABA EN 80?</h2>
            </div>
            <div class="row">
                    <p class=" cm-text"> En MARCA queremos celebrar el 80 ANIVERSARIO repartiendo suerte con EL
                            SUPERGORD@ MARCA, un boleto que incluye:</p>
            </div>

            <div class="row cm-row-img-bruja">
                <img src="<?php echo site_url('img_db/productos/marca-bruja.png'); ?>" alt="" class="img-fluid cm-img-bruja">
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-7 zindex col-center">
            <div class="cm-img-fondo" >
                <!-- <img src="<?php echo site_url('img_db/productos/marca-nino.png'); ?>"  alt="niño loteria" class="img-fluid"> -->
            </div>
        </div>


    </div>


    <!--
    <div class="col-md-6">
        <div class="row mb-5 ">

            <div class="col-md-12 " style="margin-bottom: 25px;">
                <h2 class="cm-title">¿Y SI ACABA EN 80?</h2>
            </div>
            <div class="col-md-12 ">
                <p class="mb-5 cm-text"> En MARCA queremos celebrar el 80 ANIVERSARIO repartiendo suerte con EL
                    SUPERGORD@ MARCA, un boleto que incluye:</p>
            </div>
        </div>
    </div>

    <div class="col-md-6" style="@media (max-width: 575.98px) {margin-top: 9%;}; ">
        <img src="<?php echo site_url('img_db/productos/marca2in1.png'); ?>" style="margin-bottom:5%; margin-top: 9%;" class="center-block img-responsive" />
    </div> -->







    <!-- <div class="row">
        <div class="col-md-4 col-md-offset-4 hidden-sm" ><a href="#" style="width:100%;" class="btn <?php echo $btnclass; ?> btn-lg btn-comprar"
                data-loading-text="CARGANDO..." data-tipo="ficha" data-landing="<?php echo $datos; ?>">COMPRAR</a></div>
    </div> -->


    <!-- <div>
        <div class="col-md-12 ">
             <img src="<?php echo site_url('img_db/productos/camion.png'); ?>" style="width:100;" class="hidden-sm"/>
            <img src="<?php echo site_url('img_db/productos/camion_mv.jpg'); ?>" style="width:100;" class="hidden-md"/>
            <img src="<?php echo site_url('img_db/productos/camion-sinfondo.png'); ?>" style="width:100;" class="hidden-sm" />
            <img src="<?php echo site_url('img_db/productos/camion-sinfondo.png'); ?>" style="width:100;" class="hidden-md" />
        </div>
    </div> -->
</div>
<?php
  /**
   * The Header for our theme.
   *
   * Displays all of the <head> section and everything up till <div id="main">
   *
   * @package WordPress
   * @subpackage Gatorade
   * @since Gatorade 1.0
   */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> data-wf-domain="ddks-blank-site-95aee2.webflow.io"
data-wf-page="6005e026c2e3b5ed12e0671a"
data-wf-site="6005e026c2e3b59c35e06719" data-wf-status="1">

<head>
    <?php
      wp_head();
    ?>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="<?php echo get_bloginfo('description', 'display'); ?>">
    <meta name="title" content="<?php echo wp_title('|', true, 'left'); ?>">
    <meta name="language" content="Español">
    <meta charset=”utf-8″ />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
    <link rel="stylesheet" href="<?php echo CSSURL ?>estilos.css?v=<?php echo VCACHE ?>" defer>
    <link rel="stylesheet" href="<?php echo CSSURL ?>style.css?v=<?php echo VCACHE ?>" async>
    <!-- <link rel="stylesheet" href="<?php echo CSSURL ?>admin-colors.css" defer> -->
    <link rel="preload" href="<?php echo FONTSURL ?>Gatorade-Black.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo FONTSURL ?>Gatorade-Medium.woff2" as="font" type="font/woff2" crossorigin>

    <title>
        <?php wp_title('|', true, 'left'); ?>
    </title>
    <?php
    //Mostrar pixel registro
    if(is_page('registro')) {
        if(get_option('pixel_registro')) {
            echo get_option('pixel_registro');
        }
        if(get_option('pixel_registro_head')) {
            echo get_option('pixel_registro_head');
        }
        if(get_option('pixel_registro_head_tag')) {
            echo get_option('pixel_registro_head_tag');
        }
    }
    //Mostrar pixel del evento
    global $post;
    if($post->post_type == "eventos" && is_singular()) {
        if(get_post_meta($post->ID, 'pixel_evento', true)) {
            echo get_post_meta($post->ID, 'pixel_evento', true);
        }
    }
    ?>
</head>
<?php $nombrePais = get_bloginfo(); ?>
<body id="<?php echo $nombrePais; ?>" <?php body_class(); ?>>
    <?php
    //Mostrar pixel registro
    if(is_page('registro')) {
        if(get_option('pixel_registro_body')) {
            echo get_option('pixel_registro_body');
        }
    }
    ?>
    <style>
        .felicitaciones {
            font-size: 32px !important;
        }
    </style>
    <!-- Codigo para redireccionar al usuarios segun pais -->
    <?php
    global $current_user;

    $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (strpos($url,'nueva-contrasena') !== false || strpos($url,'recuperar') !== false || strpos($url,'ingreso') !== false || strpos($url,'politica-privacidad') !== false || strpos($url,'/mx') !== false || strpos($url,'gatorade-5v5-2022') !== false || strpos($url,'gatorade-5v5-2022-br') !== false || strpos($url,'registro-five') !== false || strpos($url,'registro') !== false) {
        //No redirigir
    } else if (is_user_logged_in()) {
      if($current_user->ID) {
        $pais = get_user_meta($current_user->ID, 'user_pais', true); 
        if($pais == '') {
        ?>
        <script>
            if (jQuery('body').hasClass('page-template-page-additionalData')) {
            } else {
                window.location.href = '<?php echo home_url("completar-perfil"); ?>';
            }
        </script>
        <?php
            } else {

                $subsitios = get_sites(array('public'=> 1));
                //Si el pais esta creado en el admin
                if (!empty ($subsitios)) {
                    $sitios_disp = [];
                    foreach( $subsitios as $subsitio ) {
                    $pais_format = str_replace('/','',$subsitio->path);
                    array_push($sitios_disp, $pais_format);
                    }
                    if(array_search($pais,$sitios_disp) > -1){
                    $esta = true;
                    }else {
                    $noesta = false;
                    }
                }

          //Si esta creado se redirecciona al pais
           if(isset($esta)){
            ?>
            <script>
                var url = '<?php echo get_blog_details()->home; ?>' + '/';
                var origin = 'https://' + '<?php echo get_current_site()->domain; ?>' + '/' + '<?php echo $pais ?>' + '/';
                var pais_pais = '<?php echo $pais; ?>';
                //Verfica que la url sea la raiz
                if (url == origin) {
                } else {
                    window.location.href = origin + '?nocache="' + (new Date()).getTime() + '"';
                }
            </script>
            <?php
                    //Si no esta permanece en la apgina actual
                } else { ?>
            <script>
                var url = '<?php echo get_blog_details()->home; ?>' + '/';
                var origin = 'https://' + '<?php echo get_current_site()->domain; ?>' + '/';
                //Verfica que la url sea la raiz
                if (url == origin) {
                } else {
                    window.location.href = origin + '?nocache="' + (new Date()).getTime() + '"';
                }
            </script>
            <?php
                }
                ?>

    <?php     
        }
      }
    } else {
    ?>
    <script>
        jQuery(document).ready(function () {
            jQuery('.content_gen').css('display', 'none');
            jQuery('.country').css('display', 'flex');
            if (localStorage.getItem('pais_elegido')) {
                var pais = localStorage.getItem('pais_elegido');
                var url = '<?php echo get_blog_details()->home; ?>' + '/';
                if (pais == '/') {
                    var origin = 'https://' + '<?php echo get_current_site()->domain; ?>' + '/';
                } else {
                    var origin = 'https://' + '<?php echo get_current_site()->domain; ?>' + '/' + pais + '/';
                }

                //Verfica que la url sea la raiz
                if (url == origin) {
                    jQuery('.country').css('display', 'none');
                } else {
                    jQuery('.country').css('display', 'none');
                    window.location.href = origin + '?nocache="' + (new Date()).getTime() + '"';
                }

                jQuery('.content_gen').css('display', 'block');

            } else {
                jQuery('.content_gen').css('display', 'none');
                jQuery('.country').css('display', 'flex');
                // Obtener pais usuario
                jQuery.get("https://ipinfo.io", function (response) {
                    // console.log(response.country);
                    if (response.country) {
                        switch (response.country) {
                            case 'CO':
                                jQuery('#countryUser').css('display', 'block');
                                jQuery('#countryUser').append('<span class="menu_el_txt"> Colombia</span><br> <a class="paisElegido" pais="co" style="text-decoration:underline">continuar</a>');
                                break;
                            //   case 'MX':
                            //   jQuery('#countryUser').css('display', 'block');
                            //   jQuery('#countryUser').append('<span class="menu_el_txt"> México</span><br> <a class="paisElegido" pais="mx" style="text-decoration:underline">continuar</a>');
                            //   break;
                            case 'CL':
                                jQuery('#countryUser').css('display', 'block');
                                jQuery('#countryUser').append('<span class="menu_el_txt"> Chile</span><br> <a class="paisElegido" pais="cl" style="text-decoration:underline">continuar</a>');
                                break;
                            case 'AR':
                                jQuery('#countryUser').css('display', 'block');
                                jQuery('#countryUser').append('<span class="menu_el_txt"> Chile</span><br> <a class="paisElegido" pais="ar" style="text-decoration:underline">continuar</a>');
                                break;
                            case 'PE':
                                jQuery('#countryUser').css('display', 'block');
                                jQuery('#countryUser').append('<span class="menu_el_txt"> Chile</span><br> <a class="paisElegido" pais="cl" style="text-decoration:underline">continuar</a>');
                                break;
                            default:
                        }
                    }
                }, "jsonp");
            }

            // Elegir pais
            // jQuery(".paisElegido").on("click", function(e) {
            jQuery(document).on("click", ".paisElegido", function (e) {
                e.preventDefault();
                if (localStorage.getItem('pais_elegido')) {
                    var pais = localStorage.getItem('pais_elegido');
                    var url = '<?php echo get_blog_details()->home; ?>' + '/';

                    if (pais == '/') {
                        var origin = 'https://' + '<?php echo get_current_site()->domain; ?>' + '/';
                    } else {
                        var origin = 'https://' + '<?php echo get_current_site()->domain; ?>' + '/' + pais + '/';
                    }

                    //Verfica que la url sea la raiz
                    if (url == origin) {
                        jQuery('.country').css('display', 'none');
                    } else {
                        jQuery('.country').css('display', 'none');
                        window.location.href = origin + '?nocache="' + (new Date()).getTime() + '"';
                    }
                    jQuery('.content_gen').css('display', 'block');
                } else {
                    var pais = jQuery(this).attr('pais');
                    localStorage.setItem('pais_elegido', pais);
                    // location.reload(true);
                    var pais = localStorage.getItem('pais_elegido');
                    var url = '<?php echo get_blog_details()->home; ?>' + '/';

                    if (pais == '/') {
                        var origin = 'https://' + '<?php echo get_current_site()->domain; ?>' + '/';
                    } else {
                        var origin = 'https://' + '<?php echo get_current_site()->domain; ?>' + '/' + pais + '/';
                    }

                    //Verfica que la url sea la raiz
                    if (url == origin) {
                        jQuery('.country').css('display', 'none');
                    } else {
                        jQuery('.country').css('display', 'none');
                        window.location.href = origin + '?nocache="' + (new Date()).getTime() + '"';
                    }
                    jQuery('.content_gen').css('display', 'block');
                }
            });
        });
    </script>
    <?php
    }
    ?>
    <style>
        p.closeMsg img {
          cursor: pointer;
        }
        .swiper-button-prev,
        .swiper-button-next {
            top: 7% !important;
            width: 30px !important;
            height: 100% !important;
        }

        .swiper-button-prev,
        .swiper-container-rtl .swiper-button-next {
            left: 0px !important;
            right: auto;
        }

        .swiper-button-prev:after,
        .swiper-button-next:after {
            font-size: 26px !important;
        }

        .tit_subcategory {
            background: none !important;
        }

        .country {
            width: 100%;
            height: 100%;
            display: none;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            background: black !important;
            z-index: 100;
        }

        .country li {
            margin: 5px 0px;
        }

        .menu_over {
            width: 100vw;
            height: 100vh;
            overflow: scroll;
            position: fixed;
            z-index: 4;
            top: 0;
            left: 0;
            display: none;
        }

        .mo-openid-app-icons.circle {
            display: flex !important;
            flex-direction: row;
            margin: 20px 0px;
            align-items: center;
        }

        span2 {
            display: none !important;
        }

        .mo-openid-app-icons.circle p {
            color: white !important;
            font-family: 'Gatorade black', sans-serif;
            margin: 0px inherit !important;
            font-size: 16px;
            padding-right: 10px;
            padding-left: 10px;
        }

        i.mo-custom-share-icon {
            background-color: white;
            color: #DE7800;
        }

        .section>.slide {
            width: 100%;
        }

        .msgAlert {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0px;
            left: 0px;
            background: #000000d4;
            z-index: 100;
            display: none;
            justify-content: center;
            align-items: center;
        }

        .msgAlertCont {
            flex-direction: column;
            width: 100%;
            max-width: 320px;
            background: white;
            border-radius: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 86px 10px 10px;
        }

        p.closeMsg img {
            width: 42px;
            height: auto;
        }

        p.closeMsg {
            margin: 0px;
            text-align: right;
            position: absolute;
            top: -10px;
            right: -10px;
        }

        p.logoMsg {
            text-align: center;
            position: absolute;
            top: -47px;
            margin: 0px;
        }

        p.logoMsg img {
            width: 130px;
            height: auto;
        }

        p.txtMsg {
            text-align: center;
            color: black;
            margin: 0px;
            font-size: 18px;
            line-height: 21px;
        }

        .msgAlertCont a.contact_submit.w-button {
            position: relative;
            bottom: -20px;
            display: none;
            width: 88%;
            border-radius: 20px;
            margin-top: 10px;
            font-size: 24px;
            padding: 6px;
        }

        .home_banner_img {
            width: 100%;
        }
    </style>
    <div class="msgAlert">
        <div class="msgAlertCont">
            <p class="closeMsg">
                <img src="<?php echo IMGURL ?>close_alert.png" loading="lazy" alt="">
            </p>
            <p class="logoMsg">
                <img src="<?php echo IMGURL ?>logo_alert.png" loading="lazy" alt="">
            </p>
            <p class="txtMsg">Debes registrarte o loguearte para guardar tus <b>Favoritos</b></p>
            <a href="" class="contact_submit w-button aMsg">REGÍSTRATE</a>
        </div>
    </div>
    <div id="loader">
        <img class="animate__animated animate__tada animate__infinite" src="<?php echo IMGURL ?>loader.png" alt=""
            loading="lazy">
    </div>
    <div id="infinite">
        <img src="<?php echo IMGURL ?>infinite.gif" alt="" loading="lazy">
    </div>

    <?php 
      if(wp_is_mobile()) {?>
    <style>
        .country {
            background: url(<?php echo IMGURL ?>desktop/bg-paises.jpg) no-repeat center center !important;
            text-align: center;
            background-size: cover !important;
        }
        body {
            position: relative;
            width: 100%;
            display: block;
            color: white !important;
            background: black !important;
        }

        .the_champ_sharing_container.the_champ_horizontal_sharing {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .the_champ_sharing_title {
            margin-right: 16px;
        }

        .new_text {
            width: 230px;
        }

        .menu_el_txt {
            margin-bottom: 15px;
            font-size: 16px;
            line-height: 18px;
            margin-top: 15px;
        }

        .noregister_cont_btn {
            padding: 3px 20px;
        }

        .foot_cont {
            margin-top: 40px;
        }
    </style>
    <div class="country">
        <img src="<?php echo IMGURL ?>desktop/logo.png" loading="lazy" alt="" class="image-3" width="152"
            height="132" />
        <p id="countryUser" class="menu_el_txt">Vemos que te estás conectando <br> desde
            <?php
        global $current_user;
        // wp_get_current_user();
        if (is_user_logged_in()) {
          $loginUser = "true";
          $idUser = $current_user->ID;
        }
        ?>
        </p>
        <br>
        <div class="noregister_cont">
            <a pais="/" class="noregister_cont_btn btnCustomHome paisElegido">
                <div class="btnCustomHomeText new_text">Permanecer en Latinoamérica</div>
            </a>
        </div>
        <p class="menu_el_txt">Elegir país:</p>
        <?php    
      $subsites = get_sites(array('public'=> 1));
      if (!empty ($subsites)) {
        foreach( $subsites as $subsite ) {
          $subsite_id = get_object_vars( $subsite )["blog_id"];
          $subsite_name = get_blog_details( $subsite_id )->blogname;
          $subsite_link = get_blog_details( $subsite_id )->siteurl;
          if($subsite_name != 'Latinoamérica' && $subsite_name != 'México') {
        ?>
        <div class="noregister_cont">
            <a pais="<?php echo str_replace('/','',$subsite->path); ?>"
                class="noregister_cont_btn btnCustomHome paisElegido">
                <div class="btnCustomHomeText new_text">
                    <?php echo $subsite_name; ?>
                </div>
            </a>
        </div>
        <?php
          }
        }
      }
      ?>

        <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>

    </div>

    <?php
      }elseif(!wp_is_mobile()) {?>
    <style>
        .new_text {
            width: 230px;
        }

        .country {
            background: url(<?php echo IMGURL ?>desktop/BackgroundDesktop.png) no-repeat center center !important;
            text-align: center;
            background-size: cover !important;
        }

        .noregister_cont {
            margin-top: 10px;
        }

        .the_champ_sharing_title {
            font-size: 18px;
        }

        .the_champ_horizontal_sharing .theChampFacebookSvg,
        #the_champ_ss_rearrange .theChampFacebookSvg {
            background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-5%20-5%2042%2042%22%3E%3Cpath%20d%3D%22M17.78%2027.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99%202.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123%200-5.26%201.905-5.26%205.405v3.016h-3.53v4.09h3.53V27.5h4.223z%22%20fill%3D%22%23FFFFFF%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center;
        }

        .the_champ_horizontal_sharing .theChampTwitterSvg,
        #the_champ_ss_rearrange .theChampTwitterSvg {
            background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-4%20-4%2039%2039%22%3E%0A%3Cpath%20d%3D%22M28%208.557a9.913%209.913%200%200%201-2.828.775%204.93%204.93%200%200%200%202.166-2.725%209.738%209.738%200%200%201-3.13%201.194%204.92%204.92%200%200%200-3.593-1.55%204.924%204.924%200%200%200-4.794%206.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942%204.942%200%200%200-.665%202.477c0%201.71.87%203.214%202.19%204.1a4.968%204.968%200%200%201-2.23-.616v.06c0%202.39%201.7%204.38%203.952%204.83-.414.115-.85.174-1.297.174-.318%200-.626-.03-.928-.086a4.935%204.935%200%200%200%204.6%203.42%209.893%209.893%200%200%201-6.114%202.107c-.398%200-.79-.023-1.175-.068a13.953%2013.953%200%200%200%207.55%202.213c9.056%200%2014.01-7.507%2014.01-14.013%200-.213-.005-.426-.015-.637.96-.695%201.795-1.56%202.455-2.55z%22%20fill%3D%22%23FFFFFF%22%3E%3C%2Fpath%3E%0A%3C%2Fsvg%3E) no-repeat center center;
        }

        .the_champ_horizontal_sharing .theChampWhatsappSvg,
        #the_champ_ss_rearrange .theChampWhatsappSvg {
            background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-5%20-5%2040%2040%22%3E%3Cpath%20id%3D%22arc1%22%20stroke%3D%22%23FFFFFF%22%20stroke-width%3D%222%22%20fill%3D%22none%22%20d%3D%22M%2011.579798566743314%2024.396926207859085%20A%2010%2010%200%201%200%206.808479557110079%2020.73576436351046%22%3E%3C%2Fpath%3E%3Cpath%20d%3D%22M%207%2019%20l%20-1%206%20l%206%20-1%22%20stroke%3D%22%23FFFFFF%22%20stroke-width%3D%222%22%20fill%3D%22none%22%3E%3C%2Fpath%3E%3Cpath%20d%3D%22M%2010%2010%20q%20-1%208%208%2011%20c%205%20-1%200%20-6%20-1%20-3%20q%20-4%20-3%20-5%20-5%20c%204%20-2%20-1%20-5%20-1%20-4%22%20fill%3D%22%23FFFFFF%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center;
        }

        .the_champ_horizontal_sharing .theChampEmailSvg,
        #the_champ_ss_rearrange .theChampEmailSvg {
            background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-4%20-4%2043%2043%22%3E%3Cpath%20d%3D%22M%205.5%2011%20h%2023%20v%201%20l%20-11%206%20l%20-11%20-6%20v%20-1%20m%200%202%20l%2011%206%20l%2011%20-6%20v%2011%20h%20-22%20v%20-11%22%20stroke-width%3D%221%22%20fill%3D%22%23FFFFFF%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center;
        }

        .the_champ_horizontal_sharing .theChampSharing {
            background-color: #DE7800;
            background: #DE7800;
            color: #FFFFFF !important;
        }

        .the_champ_sharing_container.the_champ_horizontal_sharing {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .the_champ_sharing_title {
            margin-right: 16px;
        }

        .header {
            display: none;
        }

        .side_buttons {
            display: none;
        }

        body {
            position: relative;
            width: 100%;
            display: block;
            background: white !important;
            color: black !important;
        }

        .fixed_bottom {
            position: fixed;
            bottom: 0px;
            z-index: 101 !important;
        }

        .home {
            width: 100% !important;
            padding-top: 50px !important;
            padding-right: 10%;
            padding-left: 10%;
            padding-bottom: 50px !important;
            max-width: 1400px !important;
            margin: 0 auto !important;
        }
        .name_user_black {
            padding-left: 20px;
            font-family: 'Gatorade black', sans-serif;
            color: #ffffff;
            font-size: 16px;
            font-weight: 900;
            text-align: right;
            text-transform: uppercase;
            width: auto;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 17px;
        }
        
        .home_banner img {
            width: 100%;
        }
        
        .content_cont.bg_content {
            background: black;
            background-image: url(https://g1.tars.dev/co/wp-content/themes/gatorade/assets/images/desktop/bg.png);
            background-position: 100% 100%;
            background-size: 100%;
            background-repeat: repeat-y;
            width: 100% !important;
            padding-top: 50px !important;
            padding-right: 10%;
            padding-left: 10%;
            padding-bottom: 50px !important;
            max-width: 1400px !important;
            margin: 0 auto !important;
            /*padding-top: 50px !important;*/
            /*padding-right: 15%;*/
            /*padding-left: 15%;*/
        }

        .menu_el_txt {
            margin-bottom: 5px;
            margin-top: 15px;
        }

        .image-3 {
            margin-bottom: 45px;
        }

        #countryUser {
            margin-bottom: -13px
        }
    </style>
    <div class="country">
        <img src="<?php echo IMGURL ?>desktop/logo.png" loading="lazy" alt="" class="image-3" width="152"
            height="132" />
        <p id="countryUser" class="menu_el_txt">Vemos que te estás conectando <br> desde
            <?php
        global $current_user;
        // wp_get_current_user();
        if (is_user_logged_in()) {
          $loginUser = "true";
          $idUser = $current_user->ID;
        }
        ?>
        </p>
        <br>
        <div class="noregister_cont">
            <a pais="/" class="noregister_cont_btn btnCustomHome paisElegido">
                <div class="btnCustomHomeText new_text">Permanecer en Latinoamérica</div>
            </a>
        </div>
        <p class="menu_el_txt">Elegir país:</p>
        <?php    
      $subsites = get_sites(array('public'=> 1));
      if (!empty ($subsites)) {
        foreach( $subsites as $subsite ) {
          $subsite_id = get_object_vars( $subsite )["blog_id"];
          $subsite_name = get_blog_details( $subsite_id )->blogname;
          $subsite_link = get_blog_details( $subsite_id )->siteurl;
          if($subsite_name != 'Latinoamérica' && $subsite_name != 'México') {
        ?>
        <div class="noregister_cont">
            <a pais="<?php echo str_replace('/','',$subsite->path); ?>"
                class="noregister_cont_btn btnCustomHome paisElegido">
                <div class="btnCustomHomeText new_text">
                    <?php echo $subsite_name; ?>
                </div>
            </a>
        </div>
        <?php
          }
        }
      }
      ?>
    </div>
    <?php
      }
      ?>
    <div class="menu_over">
        <?php
        global $current_user;
        // wp_get_current_user();
        if (is_user_logged_in()) {
          $loginUser = "true";
          $idUser = $current_user->ID;
          $nameUser = get_user_meta($idUser, 'user_nombre', true).' '. get_user_meta($idUser, 'user_apellido', true);
        }
        ?>
        <div class="content_cont menu_bg">
            <style>
                .side_buttons_link.favorite {
                    display: none;
                }
            </style>
            <div class="menu_cont">
                <?php if (is_user_logged_in()) { ?>
                <div class="menu_cont_user">
                    <h2 class="menu_cont_h2" style="text-transform:uppercase;">HOLA <?php if ($nameUser!='') {echo $nameUser;}else {echo $current_user->user_login; }?>
                    </h2>
                    <p class="menu_cont_p">Bienvenido a Gatorade</p>
                    <div class="menu_cont_h2_line"></div>
                </div>
                <?php } ?>
                <div class="menu_cont_menu">
                    <div class="menu_cont_menu_el">
                        <a href="<?php echo home_url('tarjetas'); ?>" class="menu_el w-inline-block">
                            <div class="menu_el_img">
                                <img src="<?php echo IMGURL; ?>ray.svg"
                                    loading="lazy" alt="" class="menu_el_img_img" />
                            </div>
                            <h3 class="menu_el_txt" style="margin-top:14px;"><?php echo get_option('menu_categorias'); ?></h3>
                        </a>
                    </div>
                    <div class="menu_cont_menu_el">
                        <a href="<?php echo home_url('productos'); ?>" class="menu_el w-inline-block">
                            <div class="menu_el_img">
                                <img src="<?php echo IMGURL; ?>bottle.svg"
                                    loading="lazy" alt="" class="menu_el_img_img" />
                            </div>
                            <h3 class="menu_el_txt" style="margin-top:14px;"><?php echo get_option('menu_productos'); ?></h3>
                        </a>
                    </div>
                    <?php
                    if(get_bloginfo()!="Argentina") {
                    ?>
                    <div class="menu_cont_menu_el">
                      <a href="<?php echo home_url('retos'); ?>" class="menu_el w-inline-block" style="position:relative;">
                        <?php get_template_part( 'template-parts/retos/notificacion' ); ?>
                        <div class="menu_el_img">
                          <img src="<?php echo IMGURL; ?>stars.svg"
                            loading="lazy" alt="" class="menu_el_img_img" />
                        </div>
                        <h3 class="menu_el_txt" style="margin-top:14px;"><?php echo get_option('menu_retos'); ?></h3>
                      </a>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="menu_cont_menu_el">
                        <a href="<?php echo home_url('eventos'); ?>" class="menu_el w-inline-block">
                            <div class="menu_el_img">
                                <img src="<?php echo IMGURL; ?>calendar.svg"
                                    loading="lazy" alt="" class="menu_el_img_img" />
                            </div>
                            <h3 class="menu_el_txt" style="margin-top:14px;"><?php echo get_option('menu_eventos'); ?></h3>
                        </a>
                    </div>
                    <?php
                    if(get_option('pagina_lanzamientos') != '') {
                    ?>
                    <div class="menu_cont_menu_el">
                        <a href="<?php echo home_url('lanzamientos'); ?>" class="menu_el w-inline-block">
                            <div class="menu_el_img">
                                <img src="<?php echo IMGURL; ?>lanzamientos.svg"
                                    loading="lazy" alt="" class="menu_el_img_img" />
                            </div>
                            <h3 class="menu_el_txt" style="margin-top:14px;"><?php echo get_option('menu_lanzamientos'); ?></h3>
                        </a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="foot_menu_mob">
                <?php if (!is_user_logged_in()) { ?>
                <div class="noregister_cont">
                    <a href="<?php echo home_url('registro'); ?>" class="noregister_cont_btn w-inline-block">
                        <div class="noregister_cont_btn_txt">REGÍSTRATE</div>
                    </a>
                    <p class="noregister_cont_p">Para tener una experiencia personalizada</p>
                </div>
                <?php } ?>
                <?php if ($loginUser == 'true') {}?>
                <div class="list_btns_cont" style="<?php echo $estilo; ?>">
                    <a href="<?php echo home_url('contacto'); ?>" class="noregister_cont_btn list_btn w-inline-block">
                        <div class="noregister_cont_btn_txt">CONTÁCTANOS</div>
                    </a>
                    <?php if(get_option('trabaja')) { ?>
                    <a href="<?php echo get_option('trabaja'); ?>" class="noregister_cont_btn list_btn w-inline-block">
                        <div class="noregister_cont_btn_txt">TRABAJA CON NOSOTROS</div>
                    </a>
                    <?php } ?>
                    <a href="<?php echo get_option('politica_privacidad'); ?>"
                        class="noregister_cont_btn list_btn w-inline-block">
                        <div class="noregister_cont_btn_txt list_btn_small">POLÍTICAS DE PRIVACIDAD Y CONDICIONES DE USO
                        </div>
                    </a>
                </div>
                <div class="ray_white_cont">
                    <div class="ray_white_cont_line"></div>
                    <img src="<?php echo IMGURL; ?>ray_white.svg"
                        loading="lazy" alt="" class="ray_white_cont_ing" />
                    <div class="ray_white_cont_line"></div>
                </div>
                <?php get_template_part( 'template-parts/social/social' ); ?>
                <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
            </div>
        </div>
    </div>
    <!--======= Seccion Header =======-->
    <header>
        <?php get_template_part( 'template-parts/login/login' ); ?>
        <?php get_template_part( 'template-parts/navigation/navigation' ); ?>
        <?php get_template_part( 'template-parts/side_buttons/side_buttons' ); ?>
    </header>
    <div class="content_gen">
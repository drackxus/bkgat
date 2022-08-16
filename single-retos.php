<?php
get_header();

global $post;
?>
<style>
    .closeReto {
        margin: 0px;
        text-align: right;
        position: absolute;
        top: -10px;
        right: -10px;
    }
    p.closeReto img {
        width: 42px;
        height: auto;
    }
    p.closeReto img {
        cursor: pointer;
    }
    a.contact_submit.w-button.aMsg {
        color: white !important;
    }
    .titulo_reto {
        text-transform:uppercase;
        color:black;
        font-family:'Gatorade black', sans-serif;
        font-size: 30px;
        line-height: 34px;
    }
    .color_white_btn {
        color: white !important;
    }
    .iti.iti--allow-dropdown.iti--separate-dial-code {
        width: 80%;
        margin: 0 auto;
    }
    .iti.iti--allow-dropdown.iti--separate-dial-code input {
        width: 100%;
    }
    .iti--separate-dial-code .iti__selected-flag {
        background-color: rgba(0, 0, 0, 0.05);
        border-radius: 40px;
    }
    a:-webkit-any-link {
        color: var(--color-orange) !important;
    }
    .check_boxes input[type="checkbox"] {
        width: 20px !important;
        height: 20px !important;
    }
    .check_boxes a {
        width: calc(100% - 30px);
    }
    .check_boxes span, .check_boxes a {
        font-size: 14px;
        line-height: 18px;
    }
    .felicitaciones {
        font-family: 'Gatorade black', sans-serif;
        font-size: 40px;
        text-align: center;
        margin-top: 24px;
        margin-bottom: 8px;
    }

    .the_champ_horizontal_sharing .theChampSharing {
        background-color: var(--color-orange);
        background: var(--color-orange);
    }

    .the_champ_horizontal_sharing .theChampSharing {
        color: var(--color-orange);
    }

    .checkbox {
        height: 35px;
        width: 35px;
        margin-right: 0.4em;
    }

    .msgAlertCont {
        border-radius: 30px;
    }

    a.contact_submit.w-button.aMsg {
        bottom: -31px;
        width: 84%;
    }

    p.txtMsg {
        font-size: 17px;
        line-height: 19px;
        width: 100%;
    }

    .txtMsg h4 {
        font-size: 32px;
        line-height: 34px;
    }

    .list_retos_logrados_el {
        width: 100%;
        border-radius: 10px;
        margin-right: 1%;
        position: relative;
    }

    .list_retos_logrados_el {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 10px 20px;
        border-radius: 10px;
        width: 100%;
        height: 78px;
        background-repeat: no-repeat !important;
        background-size: cover !important;
        background-position: center center !important;
        margin-bottom: 0px;
        border-radius: 15px;
        background: black;
    }

    .list_retos_logrados_el h3 {
        color: white;
        font-family: 'Gatorade black', sans-serif;
        font-size: 13px !important;
        line-height: 14px !important;
        text-align: left;
        margin: 0px;
        width: 50%;
        z-index: 3;
        text-transform: uppercase;
    }

    .list_retos_logrados_el video {
        position: absolute;
        right: 0;
        bottom: 0;
        top: 0;
        right: 0;
        width: 100%;
        height: auto;
        background-size: 100% 100%;
        background-color: black;
        background-position: center center;
        background-size: contain;
        object-fit: cover;
        z-index: 1;
        opacity: 0.8;
        border-radius: 13px;
    }

    .txtMsg .content_cont_h1_line {
        width: 80px;
        height: 3px;
        border-radius: 6px;
        background-color: #f47d30;
        margin: 0 auto;
    }
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
</style>
<style>
    .el_counter_number {
        background-color: white;
        color: #DE7800;
    }

    .side_buttons_link.favorite {
        display: flex;
    }
</style>
<?php
if (wp_is_mobile())
{
?>
    <style>
        .theChampFacebookSvg {
            background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-5%20-5%2042%2042%22%3E%3Cpath%20d%3D%22M17.78%2027.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99%202.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123%200-5.26%201.905-5.26%205.405v3.016h-3.53v4.09h3.53V27.5h4.223z%22%20fill%3D%22%23fff%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center !important;
        }
        .theChampTwitterSvg {
            background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9Ii04IC04IDY0IDY0Ij4NCjxwYXRoIGQ9Ik0gMzggMTkgcSAyIC0xIDQgLTUgcSAtMS41IDIgLTQgMiBxIDEuNSAtMSAzLjUgLTUgcSAtMS41IDIgLTUgMiBjIC01IC01IC0xMyAtMiAtMTIgNiBxIC03IDEgLTE1IC04IHEgLTIgNCAxIDkgcSAtMSAwIC0zIC0xIHEgMCA1IDUgNyBxIC0xIC41IC0zIDAgcSAxIDQgOCA2IHEgLTUgMyAtMTEgMyBjIDE0IDggMzAgMCAzMS41IC0xNCIgc3Ryb2tlLXdpZHRoPSIwLjMiIGZpbGw9IiNmZmYiPjwvcGF0aD4NCjwvc3ZnPg==) left no-repeat !important;
        }
        .theChampWhatsappSvg {
            background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9Ii01IC01IDQwIDQwIj48cGF0aCBpZD0iYXJjMSIgc3Ryb2tlPSIjZmZmIiBzdHJva2Utd2lkdGg9IjIiIGZpbGw9Im5vbmUiIGQ9Ik0gMTEuNTc5Nzk4NTY2NzQzMzE0IDI0LjM5NjkyNjIwNzg1OTA4NSBBIDEwIDEwIDAgMSAwIDYuODA4NDc5NTU3MTEwMDc5IDIwLjczNTc2NDM2MzUxMDQ2Ij48L3BhdGg+PHBhdGggZD0iTSA3IDE5IGwgLTEgNiBsIDYgLTEiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSIyIiBmaWxsPSJub25lIj48L3BhdGg+PHBhdGggZD0iTSAxMCAxMCBxIC0xIDggOCAxMSBjIDUgLTEgMCAtNiAtMSAtMyBxIC00IC0zIC01IC01IGMgNCAtMiAtMSAtNSAtMSAtNCIgZmlsbD0iI2ZmZiI+PC9wYXRoPjwvc3ZnPg==) left no-repeat !important;
        }
        .theChampEmailSvg {
            background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-4%20-4%2043%2043%22%3E%3Cpath%20d%3D%22M%205.5%2011%20h%2023%20v%201%20l%20-11%206%20l%20-11%20-6%20v%20-1%20m%200%202%20l%2011%206%20l%2011%20-6%20v%2011%20h%20-22%20v%20-11%22%20stroke-width%3D%221%22%20fill%3D%22%23fff%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center !important;
        }
        p.suscribe_style {
            text-align: center;
        }

        .evento_form .opciones {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .evento_form label {
            text-align: center;
            font-size: 17px;
            margin-bottom: 10px;
        }

        .evento_form select, .evento_form input[type=text], .evento_form input[type=date], .evento_form input[type=number], .evento_form input[type=email], .evento_form input[type=tel] {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            color: black;
            border-radius: 30px;
            font-size: 15px;
            text-align-last: center;
            color: #4B4B4B;
            font-family: 'Gatorade black', sans-serif;
        }

        .participate_button {
            margin-right: 0px;
            display: block;
            width: 81%;
            margin: 0 auto;
            margin-bottom: 20px;
            padding: 3px 30px 3px;
            margin-top: 30px;
        }

        .participate_-cont {
            flex-direction: column;
            display: flex;
        }

        .participate_-cont p {
            margin-bottom: 13px;
            font-size: 18px;
        }

        .participate_-cont.white a {
            background: white;
            color: black;
        }

        p.instructions {
            text-align: center;
            font-size: 16px;
            line-height: 20px;
        }
        .list_cont_ret {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 10px;
        }
        .list_cont_ret_el {
            width: 100%;
            height: 160px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            text-transform: uppercase;
            color: white !important;
            padding: 20px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-color: #000000a6;
            background-blend-mode: multiply;
        }
        .list_cont_ret_el h3 {
            font-family: 'Gatorade black', sans-serif;
        }
        .detail_reto {
            width: 100%;
        }
        .titulo_reto {
            color: white;
        }
        .side_buttons_link.favorite {
            display: none !important;
        }
    </style>

    <div class="content_cont">
    <div class="detail_reto">
            <h3 class="titulo_reto"><?php echo $post->post_title; ?></h3>
            <?php echo get_the_content($post->ID); ?>
            <?php
                $tipo_reto = get_post_meta($post->ID, 'tipo_retos', true);
 
                if ($tipo_reto == 'contenido')
                {
                    // var_dump('contenido');
                    $categoria = get_post_meta($post->ID, 'categoria_sel', true);
                    $tipo_tarjeta = get_post_meta($post->ID, 'tipo_tarjeta_sel', true);
                    // var_dump($categoria);
                    $args = array(
                        'post_type' => 'tarjetas',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                              'taxonomy'  => 'categoriasTarjetas',
                              'field'     => 'name',
                              'terms'     => $categoria
                            )
                          )
                    );
                    $publicaciones = get_posts($args);
                    ?>
                    <div class="list_cont_ret">
                    <?php
                    foreach ( $publicaciones as $publicacion ) { 
                        if(get_post_meta($publicacion->ID, 'tipo_tarjeta', true) == 'normal') {
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($publicacion->ID), 'full');
                        ?>
                        <a class="list_cont_ret_el" href="<?php echo get_the_permalink($publicacion->ID); ?>" target="_blank" style="background-image: url('<?php echo $image[0]; ?>')">
                            <h3 style="color:white;"><?php echo $publicacion->post_title; ?></h3>
                        </a>
                        <?php
                        }
                        
                    }
                    ?>
                    </div>
                    <?php
                
                }

                if ($tipo_reto == 'campana')
                {
                    // var_dump('campana');
                    $etiquetas_sel = get_post_meta($post->ID, 'etiquetas_sel', true);
                    $etiquetas_sel_list = explode(",", $etiquetas_sel);
                    // var_dump($etiquetas_sel);
                    $args = array(
                        'post_type' => 'tarjetas',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                              'taxonomy'  => 'etiquetasTarjetas',
                              'field'     => 'name',
                              'terms'     => $etiquetas_sel_list
                            )
                          )
                    );
                    $publicaciones = get_posts($args);
                    ?>
                    <div class="list_cont_ret">
                    <?php
                    foreach ( $publicaciones as $publicacion ) { 
                        if(get_post_meta($publicacion->ID, 'tipo_tarjeta', true) == 'normal') {
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($publicacion->ID), 'full');
                        ?>
                        <a class="list_cont_ret_el" href="<?php echo get_the_permalink($publicacion->ID); ?>" target="_blank" style="background-image: url('<?php echo $image[0]; ?>')">
                            <h3 style="color:white;"><?php echo $publicacion->post_title; ?></h3>
                        </a>
                        <?php
                        }
                        
                    }
                   
                }
            ?>
        </div>
    </div>

<?php
} else {
?>
    <style>
        .side_buttons_link.favorite {
            display: flex;
            width: 40px;
            height: 41px;
            margin-left: -2px;
        }

        .suscribe_style {
            margin: 0px;
            font-family: 'Gatorade black';
        }

        .evento_form .opciones {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .evento_form label {
            text-align: center;
            font-size: 17px;
            margin-bottom: 10px;
        }

        .evento_form select, .evento_form input[type=text], .evento_form input[type=date], .evento_form input[type=number], .evento_form input[type=email], .evento_form input[type=tel] {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            color: black;
            border-radius: 30px;
            font-size: 15px;
            text-align-last: center;
            color: #4B4B4B;
            font-family: 'Gatorade black', sans-serif;
        }


        .home_header {
            margin-bottom: 22px;
        }

        .content_cont.bg_content {
            background: black;
            background-image: url("https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6019d7147421c12649fe479c_shutterstock_291093752.png");
            background-position: 100% 100%;
            background-size: 100%;
            background-repeat: repeat-y;
        }

        .content_cont {
            padding: 70px 15% 50px;
        }

        .counter_cont_tit {
            color: black;
        }

        .cont_etiqueta {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        p {
            color: black;
        }

        .el_counter_number {
            background-color: #4d4d4d;
            color: white;
        }

        .el_counter_txt {
            color: #4d4d4d;
        }

        .participate_cont_a {
            width: 100%;
        }

        .text_medium_center {
            color: black;
        }

        .add_event_text {
            color: white;
            white-space: pre-line;
            font-family: 'Gatorade black', sans-serif;
            font-size: 13px;
            text-decoration: none;
            text-transform: uppercase;
            line-height: normal;
            padding-top: 14px;
            padding-left: 12px;
            padding-right: 8px;
        }
        .list_cont_ret {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 10px;
        }
        .list_cont_ret_el {
            width: 32%;
            height: 160px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            text-transform: uppercase;
            color: white !important;
            padding: 20px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-color: #000000a6;
            background-blend-mode: multiply;
        }
        .list_cont_ret_el h3 {
            font-family: 'Gatorade black', sans-serif;
        }
        .detail_reto {
            width: 100%;
        }
    </style>
    <div class="home">

        <?php get_template_part('template-parts/desktop/header'); ?>
        
        <div class="detail_reto">
            <h3 class="titulo_reto"><?php echo $post->post_title; ?></h3>
            <?php echo get_the_content($post->ID); ?>
            <?php
                $tipo_reto = get_post_meta($post->ID, 'tipo_retos', true);
 
                if ($tipo_reto == 'contenido')
                {
                    // var_dump('contenido');
                    $categoria = get_post_meta($post->ID, 'categoria_sel', true);
                    $tipo_tarjeta = get_post_meta($post->ID, 'tipo_tarjeta_sel', true);
                    // var_dump($categoria);
                    $args = array(
                        'post_type' => 'tarjetas',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                              'taxonomy'  => 'categoriasTarjetas',
                              'field'     => 'name',
                              'terms'     => $categoria
                            )
                          )
                    );
                    $publicaciones = get_posts($args);
                    ?>
                    <div class="list_cont_ret">
                    <?php
                    foreach ( $publicaciones as $publicacion ) { 
                        if(get_post_meta($publicacion->ID, 'tipo_tarjeta', true) == 'normal') {
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($publicacion->ID), 'full');
                        ?>
                        <a class="list_cont_ret_el" href="<?php echo get_the_permalink($publicacion->ID); ?>" target="_blank" style="background-image: url('<?php echo $image[0]; ?>')">
                            <h3 style="color:white;"><?php echo $publicacion->post_title; ?></h3>
                        </a>
                        <?php
                        }
                        
                    }
                    ?>
                    </div>
                    <?php
                
                }

                if ($tipo_reto == 'campana')
                {
                    // var_dump('campana');
                    $etiquetas_sel = get_post_meta($post->ID, 'etiquetas_sel', true);
                    $etiquetas_sel_list = explode(",", $etiquetas_sel);
                    // var_dump($etiquetas_sel);
                    $args = array(
                        'post_type' => 'tarjetas',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                              'taxonomy'  => 'etiquetasTarjetas',
                              'field'     => 'name',
                              'terms'     => $etiquetas_sel_list
                            )
                          )
                    );
                    $publicaciones = get_posts($args);
                    ?>
                    <div class="list_cont_ret">
                    <?php
                    foreach ( $publicaciones as $publicacion ) { 
                        if(get_post_meta($publicacion->ID, 'tipo_tarjeta', true) == 'normal') {
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($publicacion->ID), 'full');
                        ?>
                        <a class="list_cont_ret_el" href="<?php echo get_the_permalink($publicacion->ID); ?>" target="_blank" style="background-image: url('<?php echo $image[0]; ?>')">
                            <h3 style="color:white;"><?php echo $publicacion->post_title; ?></h3>
                        </a>
                        <?php
                        }
                        
                    }
                   
                }
            ?>
        </div>

        <?php get_template_part('template-parts/desktop/footer'); ?>
    </div>
<?php
}
?>
<?php
if(!is_user_logged_in()) {
?>
<script>
    jQuery('.msgAlert').css('display', 'flex');
    jQuery('.msgAlert .txtMsg').html("Registrate para acceder a todo el contenido del Mundo Gatorade");
    jQuery('.msgAlert .aMsg').css('display', 'block');
    jQuery('.msgAlert .aMsg').css('color', 'white');
    jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url('registro'); ?>');

    jQuery('.list_cont_ret_el').click(function(e) {
        e.preventDefault();
        // console.log('click');
        jQuery('.msgAlert').css('display', 'flex');
        jQuery('.msgAlert .txtMsg').html("Recuerda que para cumplir el reto debes estar registrado");
        jQuery('.msgAlert .aMsg').css('display', 'block');
        jQuery('.msgAlert .aMsg').css('color', 'white');
        jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url('registro'); ?>');
        var linkReto = jQuery(this).attr('href');
        jQuery('.msgAlert .closeMsg').attr('link', linkReto);
        jQuery('.msgAlert .closeMsg').attr('id', 'closeReto');
        jQuery('.msgAlert .closeMsg').addClass('closeReto');
        jQuery('.msgAlert .closeMsg').removeClass('closeMsg');
    });

    jQuery(document).on('click','#closeReto',function() {
        var aReto = jQuery(this).attr('link');
        // console.log(aReto);
        window.location.href = aReto;
    });
</script>
<?php
}
get_footer();
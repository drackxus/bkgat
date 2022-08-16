<?php
  /**
   * Template Name: Home
   *
   * @package WordPress
   */
  
  get_header();
  global $current_user;
  wp_get_current_user();
  global $post;
    
  $loginUser=false;
  if (is_user_logged_in())
  {
      $loginUser = true;
      $nameUser = $current_user->user_login;
      $idUser = $current_user->ID; 
      $idPost = $post->ID;
      
      $mensaje_favorito_contenido = get_option('mensaje_favorito_contenido');
      $titulo_medalla_favorito_contenido = get_option('titulo_medalla_favorito_contenido');
      $video_medalla_favorito_contenido = get_option('video_medalla_favorito_contenido');
      $imagen_correo_favorito_contenido = get_option('imagen_correo_favorito_contenido');
      $puntos_favorito_contenido = get_option('puntos_favorito_contenido');
      $nombre_reto_favorito_contenido = 'favorito_contenido';
      
      $mensaje_llenar_encuesta = get_option('mensaje_llenar_encuesta');
      $titulo_medalla_llenar_encuesta = get_option('titulo_medalla_llenar_encuesta');
      $video_medalla_llenar_encuesta = get_option('video_medalla_llenar_encuesta');
      $imagen_correo_llenar_encuesta = get_option('imagen_correo_llenar_encuesta');
      $puntos_llenar_encuesta = get_option('puntos_llenar_encuesta');
      $nombre_reto_llenar_encuesta = 'llenar_encuesta';
  }
  else
  {
    $loginUser = false; 
  }
?>
<?php
    if(!wp_is_mobile()) 
    {
?>
        <style>
            .list_card_el video
            {
            background-color: transparent !important;
            }
            #infinite img
            {
            width: 70px;
            }
            .favorite_desktop
            {
            cursor: pointer;
            }
            .list_card_el_bottom_tit
            {
            width: calc(100% - 40px) !important;
            padding-right: 10px;
            font-family: 'Gatorade black', sans-serif;
            color: #000;
            font-size: 16px;
            line-height: 18px;
            font-weight: 900;
            text-transform: uppercase;
            }
            .list_card_el .img_bg
            {
            position: absolute;
            right: 0;
            bottom: 0;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-size: 100% 100%;
            background-color: black;
            background-position: center center;
            background-size: contain;
            object-fit: cover;
            z-index: 1;
            opacity: 1;
            cursor: pointer;
            }
            .list_card_el_bottom
            {
            position: absolute;
            z-index: 2;
            bottom: 0px;
            width: 98%;
            min-height: 130px;
            background: rgb(0,0,0);
            background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.8) 45%, rgba(0,0,0,0) 100%);
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            }
            .list_card_el_bottom > a:first-of-type
            {
            width: calc(100% - 38px);
            }
            #infinite
            {
            bottom: 54px;
            }
            .list_cards
            {
            padding-bottom: 60px;
            }
            .list_card_el
            {
            position: relative;
            height: 500px;
            padding: 5px 5px;
            }
            .list_card_el video
            {
            position: absolute;
            right: 0;
            bottom: 0;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-size: 100% 100%;
            background-color: black;
            background-position: center center;
            background-size: contain;
            object-fit: cover;
            z-index: 1;
            opacity: 1;
            cursor: pointer;
            }
            .list_card_el_bottom
            {
            position: absolute;
            z-index: 2;
            bottom: 0px;
            width: 100%;
            margin-left: -5px;
            }
            .list_card_el_bottom .favorite
            {
            width: 38px;
            height: 38px;
            display: flex;
            }
            .list_card_el_bottom .list_card_el_bottom_tit
            {
            margin-bottom: 0px;
            color: white;
            margin-top: 0px;
            font-size: 14px;
            }
            .no_more_cards
            {
            width: 100%;
            text-align: center;
            color: black;
            }
            .content_gen
            {
            background-image: url(https://uploads-ssl.webflow.com/6005e02…/603018b…_fondo_white.png);
            background-position: 50% 50%;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background: white;
            }
            .home
            {
            width: 100%;
            padding-top: 50px;
            max-width: 100%;
            margin: 0px;
            }
            .list_card_el
            {
            height: 35vw;
            }
            .list_card_el
            {
            width: 24%;
            margin-right: 1%;
            margin-bottom: 1%;
            }
            .fixed_bottom
            {
            position: fixed;
            bottom: 0px;
            z-index: 4;
            }
            .search_cont_header
            {
            margin-right: -10px;
            }
            .hide_block {
                display: none;
            }
        </style>
        <style>
            form#encuesta {
            position: absolute;
            z-index: 9;
            width: 100%;
            bottom: 30px;
            left: 0px;
            }
            .card_tit.card_encuesta {
            width: 100%;
            margin: 0px;
            padding: 30px 30px 50px;
            }
            .pregunta {
            color: white;
            text-transform: uppercase;
            text-align: center;
            padding: 0px 10px;
            }
            /* The container */
            .opciones .container {
            display: block;
            position: relative;
            padding-left: 44px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }
            /* Hide the browser's default radio button */
            .opciones .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            }
            /* Create a custom radio button */
            .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 35px;
            width: 35px;
            color:white;
            background-color: black;
            border-radius: 50%;
            border: 2px solid white;
            }
            /* On mouse-over, add a grey background color */
            .opciones .container:hover input~.checkmark {
            background-color: #ccc;
            }
            /* Whhen the radio button is checked, add a blue background */
            .opciones .container input:checked~.checkmark {
            background-color: var(--color-orange);
            }
            .opciones .container span {
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Gatorade black', sans-serif;
            }
            .opciones {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            width: 100%;
            height: 45px;
            margin-bottom: 30px;
            }
            h3 {
            margin-bottom: 10px;
            }
            input.contact_submit.w-button {
            font-size: 20px;
            padding: 3px 10px;
            margin: 0 auto;
            display: block;
            margin-top: 46px;
            }
            .cont_pregunta {
            margin-bottom: 50px;
            }
        </style>
        <div class="home_home">
            <?php get_template_part( 'template-parts/desktop/header' ); ?>
            <?php get_template_part( 'template-parts/desktop/banner' ); ?>
            <div class="list_cards">
            <?php
            $current_page = 8;
            $args = array(
                'post_type' => array('tarjetas','retos'),
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'rand',
            );
            $tarjetas_home = get_posts($args);
            $count = 1;

            foreach ($tarjetas_home as $tarjeta_home) {            
                $tipo_post = get_post_type($tarjeta_home->ID);
                if($tipo_post == 'retos') {
                    $content = get_post_field('post_content', $tarjeta_home->ID);
                    if($content) {
            ?>
                        <div class="list_card_el <?php echo ($count <= $current_page) ? '': 'hide_block'?>">
                            <div>
                                <input type="hidden" class="postId" value="<?php if ($tarjeta_home->ID){ echo $tarjeta_home->ID; }?>" >    
                                <input type="hidden" class="userId" value="<?php if ($current_user->ID){ echo $current_user->ID; }?>" >
                                <?php
                                if (get_post_meta($tarjeta_home->ID, 'video_background_loop', true)) {
                                ?>
                                <video muted loop poster="<?php echo get_post_meta($tarjeta_home->ID, 'poster', true); ?>" url="<?php echo get_the_permalink($tarjeta_home->ID); ?>" class="detalle_tarjeta">
                                    <source src="<?php echo get_post_meta($tarjeta_home->ID, 'video_background_loop', true); ?>" type="video/mp4">
                                </video>
                                <?php 
                                } else {
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($tarjeta_home->ID), 'single-post-thumbnail');
                                        $image_alt = get_post_meta(get_post_thumbnail_id($tarjeta_home->ID), '_wp_attachment_image_alt', true);
                                        $image_title = get_the_title(get_post_thumbnail_id($tarjeta_home->ID));
                                ?>   
                                <img src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" url="<?php echo get_the_permalink($tarjeta_home->ID); ?>" class="img_bg detalle_tarjeta" title="<?php echo $image_title ?>">
                                <?php
                                }
                                ?>
                                <div class="list_card_el_bottom">
                                    <h1 class="list_card_el_bottom_tit"><?php echo $tarjeta_home->post_title; ?></h1>
                                    <div class="side_buttons_link favorite favorite_desktop w-inline-block" onclick="agregarFav(<?php if ($tarjeta_home->ID){ echo $tarjeta_home->ID; }?>, <?php if ($current_user->ID){ echo $current_user->ID; }?>)">
                                        <img
                                        src="<?php echo IMGURL; ?>favorite.svg"
                                        loading="lazy"
                                        class="side_buttons_link_img"/>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                $count++;
                }
                
                if($tipo_post == 'tarjetas') {
                    // echo get_post_meta($tarjeta_home->ID, 'tipo_tarjeta', true);
                    if (get_post_meta($tarjeta_home->ID, 'tipo_tarjeta', true) == 'normal')
                    {
            ?>
                    <div class="list_card_el <?php echo ($count <= $current_page) ? '': 'hide_block'?>">
                        <div>
                            <input type="hidden" class="postId" value="<?php if ($tarjeta_home->ID){ echo $tarjeta_home->ID; }?>" >    
                            <input type="hidden" class="userId" value="<?php if ($current_user->ID){ echo $current_user->ID; }?>" >
                            <?php
                            if (get_post_meta($tarjeta_home->ID, 'video_background_loop', true)) {
                            ?>
                            <video muted loop poster="<?php echo get_post_meta($tarjeta_home->ID, 'poster', true); ?>" url="<?php echo get_the_permalink($tarjeta_home->ID); ?>" class="detalle_tarjeta">
                                <source src="<?php echo get_post_meta($tarjeta_home->ID, 'video_background_loop', true); ?>" type="video/mp4">
                            </video>
                            <?php 
                            } else {
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($tarjeta_home->ID), 'single-post-thumbnail');
                                    $image_alt = get_post_meta(get_post_thumbnail_id($tarjeta_home->ID), '_wp_attachment_image_alt', true);
                                    $image_title = get_the_title(get_post_thumbnail_id($tarjeta_home->ID));
                            ?>   
                            <img src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" url="<?php echo get_the_permalink($tarjeta_home->ID); ?>" class="img_bg detalle_tarjeta" title="<?php echo $image_title ?>">
                            <?php
                            }
                            ?>
                            <div class="list_card_el_bottom">
                                <h1 class="list_card_el_bottom_tit"><?php echo $tarjeta_home->post_title; ?></h1>
                                <div class="side_buttons_link favorite favorite_desktop w-inline-block" onclick="agregarFav(<?php if ($tarjeta_home->ID){ echo $tarjeta_home->ID; }?>, <?php if ($current_user->ID){ echo $current_user->ID; }?>)">
                                    <img
                                    src="<?php echo IMGURL; ?>favorite.svg"
                                    loading="lazy"
                                    class="side_buttons_link_img"/>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                    }
                    
                    else if(get_post_meta($tarjeta_home->ID, 'tipo_tarjeta', true) == 'encuesta') {
                        $encuesta_elegida = get_post_meta($tarjeta_home->ID, 'encuesta_elegida', true);
                        $encuestas_json = get_user_meta($idUser, 'encuestas', true);

                        $encuestas = json_decode($encuestas_json);

                        if (array_search($encuesta_elegida, array_column($encuestas, 'post')) !== false) {
                            // echo 'sika';
                        } else {
                        ?>
                        <div class="list_card_el <?php echo ($count <= $current_page) ? '': 'hide_block'?>">
                            <div>
                                <?php
                                if (get_post_meta($tarjeta_home->ID, 'video_background_loop', true)) {
                                ?>
                                <video muted loop poster="<?php echo get_post_meta($tarjeta_home->ID, 'poster', true); ?>">
                                    <source src="<?php echo get_post_meta($tarjeta_home->ID, 'video_background_loop', true); ?>" type="video/mp4">
                                </video>
                                <?php 
                                } else {
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($tarjeta_home->ID), 'single-post-thumbnail');
                                    $image_alt = get_post_meta(get_post_thumbnail_id($tarjeta_home->ID), '_wp_attachment_image_alt', true);
                                    $image_title = get_the_title(get_post_thumbnail_id($tarjeta_home->ID));
                                ?>   
                                <img src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" class="img_bg" title="<?php echo $image_title ?>">
                                <?php
                                }
                                ?>
                                <form class="encuesta_form" id="encuesta" name="encuesta" method="post">
                                    <input type="hidden" id="encuestaId" value="<?php echo (get_post_meta($tarjeta_home->ID, 'encuesta_elegida', true)) ? get_post_meta($tarjeta_home->ID, 'encuesta_elegida', true) : ''; ?>">
                                    <input type="hidden" id="userId" value="<?php echo ($current_user->ID) ? $current_user->ID : ''; ?>">
                                    <?php
                                    $id_encuesta = get_post_meta($tarjeta_home->ID, 'encuesta_elegida', true);
                                    if ($id_encuesta) {
                                        
                                        $args = array(
                                            'post_type' => 'encuestas',
                                            'post_status' => 'publish',
                                            'posts_per_page' => '1',
                                            'post__in' => array($id_encuesta),
                                        );
                                        $result = new WP_Query($args);
                                        if ($result->have_posts()):
                                        while ($result->have_posts()): $result->the_post();
                                            if (get_post_meta($post->ID, 'pregunta1', true)) {
                                    ?>
                                            <div class="cont_pregunta">
                                                <h3 class="pregunta"><?php echo get_post_meta($post->ID, 'pregunta1', true); ?></h3>
                                                <div class="opciones">
                                                <?php
                                                    $opciones1 = get_post_meta($post->ID, 'opciones1', true);
                                                    $opciones_lista1 = explode(",", $opciones1);
                                                    foreach ($opciones_lista1 as $key => $value) {
                                                ?>
                                                        <label class="container">
                                                        <input type="radio" name="pregunta1" id="pregunta1>" value="<?php echo $value ?>"
                                                            required>
                                                        <span class="checkmark"><?php echo $value ?></span>
                                                        </label>
                                                <?php
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                            <?php }
                                            if (get_post_meta($post->ID, 'pregunta2', true)) {?>
                                            <div class="cont_pregunta">
                                                <h3 class="pregunta"><?php echo get_post_meta($post->ID, 'pregunta2', true); ?></h3>
                                                <div class="opciones">
                                                <?php
                                                    $opciones2 = get_post_meta($post->ID, 'opciones2', true);
                                                    // var_dump($opciones2);
                                                    $opciones_lista2 = explode(",", $opciones2);
                                                    foreach ($opciones_lista2 as $key => $value) {
                                                ?>
                                                        <label class="container">
                                                        <input type="radio" name="pregunta2" id="pregunta2>" value="<?php echo $value ?>"
                                                            required>
                                                        <span class="checkmark"><?php echo $value ?></span>
                                                        </label>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    <?php 
                                            }
                                                endwhile;
                                            endif;
                                    wp_reset_postdata();
                                    }?>
                                    <input type="submit" value="ENVIAR" class="contact_submit w-button enviar_encuesta">
                                </form>
                                <h2 class="ok" style="margin-top: 100%; color: white; text-align: center; width: 100%; display: none; position: relative; z-index: 9;">Gracias por
                                    llenar la encuesta.
                                </h2>
                            </div>
                        </div>
                    <?php
                        }
            

                    }
                }
                
            }
            ?>
                <div class="more_cards_home">
            </div>
        </div>
        <?php get_template_part( 'template-parts/desktop/footer' ); ?>
        <script>
            //tarjetas iniciales
            var num_elements = 7;
            jQuery( document ).ready(function() {  
            //al pararse sobre el video reproducirlo
            jQuery(document).on("mouseenter", "video",function() {
                jQuery(this)[0].play();
            });
            //al salir del video pausarlo
            jQuery(document).on("mouseleave", "video",function() {
                jQuery(this)[0].pause();
            });
            //scroll infinito
            $.fn.isInViewport = function() {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();
                return elementBottom > viewportTop && elementTop < viewportBottom;
            };
            //mostrar mas tarjetas
            jQuery(window).scroll(function () {
                if (jQuery('.more_cards_home').isInViewport()) {
                    jQuery('.more_cards_home').hide();
                    jQuery('.list_card_el').each(function( index ) {
                        if(index >= num_elements && index <= num_elements+4) {
                            if(jQuery(this).hasClass('hide_block')) {
                                jQuery(this).css('display','block');
                                jQuery(this).removeClass('hide_block');
                            }
                        }
                    });
                    num_elements++;
                    num_elements++;
                    num_elements++;
                    num_elements++;
                    jQuery('.more_cards_home').show();
                    if(jQuery('.no_more_cards').length) {
                    }
                    else {
                        if(jQuery('.list_card_el').hasClass('hide_block')) {
                        } else {
                            jQuery(".list_cards").append('<p class="no_more_cards">No hay más publicaciones disponibles por el momento</p>');
                        }
                    }
                    
                }
            });
        });
        jQuery(document).on("click", ".detalle_tarjeta",function() {
            var url = jQuery(this).attr('url');
            window.location = url;
        }); 
        </script>
        <script>
            function agregarFav(post, user){
                if (user == '' || post == '') {
                    jQuery('.msgAlert').css('display', 'flex');
                    jQuery('.msgAlert .txtMsg').html("Debes registrarte o loguearte para guardar en Favoritos");
                    jQuery('.msgAlert .aMsg').css('display', 'block');
                    jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url('registro'); ?>');
                } else {
                    jQuery.ajax({
                        type: "post",
                        url: MyAjax.url,
                        data: {
                        action: "user_favorites",
                        user: user,
                        post: post,
                        },
                        beforeSend: function() {
                        jQuery('#loader').css('display', 'flex');
                        },
                        error: function(response) {
                        console.log(response);
                        $('#loader').css('display', 'none');
                        },
                        success: function(response) {
                        // Actualiza el mensaje con la respuesta
                        strs = response.replace(/\s/g, "");
                        jQuery('#loader').css('display', 'none');
                        jQuery('.msgAlert').css('display', 'flex');
                        jQuery('.msgAlertCont').css('padding-bottom', '30px');
                        
                        if(strs === '0'){
                            jQuery('.msgAlert .txtMsg').html('Para añadir a favoritos debes iniciar sesión');
                        }
                        if(strs === '1') {
                            jQuery('.msgAlert .txtMsg').html('Añadido a favoritos correctamente');
                        }
                        if(strs === '2') {
                            jQuery('.msgAlert .txtMsg').html('Ha ocurrido un error');
                        }
                        if(strs === '3') {
                            jQuery('.msgAlert .txtMsg').html('Ya existe en favoritos');
                        }
                        if(strs === '4') {
                            jQuery('.msgAlert').css('display', 'none');
                            jQuery('.msgAlert').css('display', 'flex');
                            jQuery('.msgAlert .txtMsg').html(`<h4 class="felicitaciones" style="text-transform:uppercase;">RETO ACTIVADO:</h4><div class="content_cont_h1_line"></div><br><div class="list_retos_logrados_el"> <div><video autoplay muted loop playsinline> <source src="<?php echo $video_medalla_favorito_contenido; ?>" type="video/mp4"> </video></div><h3> <?php echo $titulo_medalla_favorito_contenido; ?> </h3></div><p style="color: black;text-align: center;font-family: 'Gatorade black';font-size: 17px;width: 100%;margin: 0;padding: 20px 0px 8px;line-height: 19px;">¡COMPARTE TU MEDALLA CON TUS AMIGOS E INVITALOS AL DESAFIO!</p><div class="the_champ_sharing_container the_champ_horizontal_sharing" style="padding-bottom:20px;" ss-offset="0" super-socializer-data-href="<?php echo home_url('retos'); ?>"> <div style="font-weight:bold" class="the_champ_sharing_title"></div><ul class="the_champ_sharing_ul" style="display:flex;justify-content:center;align-items:center;width:100%;"> <li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Facebook" title="Facebook" class="theChampSharing theChampFacebookBackground" onclick='theChampPopup("https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url('retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampFacebookSvg"> </ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Twitter" title="Twitter" class="theChampSharing theChampTwitterBackground" onclick='theChampPopup("http://twitter.com/intent/tweet?text=Retos&amp;url=<?php echo home_url(' retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampTwitterSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Whatsapp" title="Whatsapp" class="theChampSharing theChampWhatsappBackground" onclick='theChampPopup("https://web.whatsapp.com/send?text=Retos <?php echo home_url('retos'); ?>")' > <ss style="display:block" class="theChampSharingSvg theChampWhatsappSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Email" title="Email" class="theChampSharing theChampEmailBackground" onclick="window.open('mailto:?subject=' + decodeURIComponent('Retos' ).replace('&amp;', '%26') + '&amp;body=' + decodeURIComponent('<?php echo home_url('retos'); ?>' ), '_blank')"> <ss style="display:block" class="theChampSharingSvg theChampEmailSvg"></ss> </i> </li></ul> <div style="clear:both"></div></div>`);
                        }
                        }
                    });
                }
            } 
        </script>
<?php
    }
    if(wp_is_mobile()) {
?>
        <style>
            div#infinite
            {
            background: #0000001f;
            width: 100%;
            height: 100%;
            align-items: center;
            }
        </style>
        <!-- Fullpage -->
        <link rel="stylesheet" href="<?php echo CSSURL ?>fullpage/fullpage.css" defer/>
        <div id="fullpage">
            <?php
                // update_user_meta($current_user->ID, 'tutorial', 'false');
                $tutorial = get_user_meta($current_user->ID, 'tutorial', true);
                if('true' != $tutorial)
                {
            ?>
            <div class="section tutorial">
                <div class="slide">
                <div class="card card_click">
                    <div class="card_content" id="favorites">
                    <video autoplay muted loop playsinline class="video_bg">
                        <source src="<?php echo CSSURL ?>video_tutorial.mp4" type="video/mp4">
                    </video>
                    </div>
                </div>
                </div>
            </div>
            <?php
                }
            ?>
            <?php
                $current_page = 8;
                $args = array(
                    'post_type' => array('tarjetas','retos'),
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'orderby' => 'rand',
                );
                $tarjetas_home = get_posts($args);
                // var_dump(count($tarjetas_home));
                $count = 1;

                foreach ($tarjetas_home as $tarjeta_home) {            
                    $tipo_post = get_post_type($tarjeta_home->ID);
                    $tipo_tarjeta = get_post_meta($tarjeta_home->ID, 'tipo_tarjeta', true);
                    if($tipo_post == 'retos') {
                        $content = get_post_field('post_content', $tarjeta_home->ID);
                        if($content) {
                    ?>
                        <div class="section" tipo="<?php echo $tipo_tarjeta; ?>">
                            <div class="slide">
                                <div class="card <?php echo ($tipo_tarjeta == 'normal') ? 'card_click' : ''; ?>" onclick="window.location.href = '<?php echo get_the_permalink($tarjeta_home->ID); ?>'">
                                    <div class="card_content" id="favorites">
                                        <input type="hidden" class="postId" value="<?php echo ($tarjeta_home->ID) ? $tarjeta_home->ID : ''; ?>">
                                        <input type="hidden" class="userId" value="<?php echo ($current_user->ID) ? $current_user->ID : ''; ?>">
                                        <?php
                                        if (get_post_meta($tarjeta_home->ID, 'video_background_loop', true))
                                        {
                                        ?>
                                        <video autoplay muted loop playsinline poster="<?php echo get_post_meta($tarjeta_home->ID, 'poster', true); ?>"
                                        class="video_bg">
                                        <source src="<?php echo get_post_meta($tarjeta_home->ID, 'video_background_loop', true); ?>"
                                            type="video/mp4">
                                        </video>
                                        <?php
                                        }
                                        else
                                        {
                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($tarjeta_home->ID), 'single-post-thumbnail');
                                            $image_alt = get_post_meta(get_post_thumbnail_id($tarjeta_home->ID), '_wp_attachment_image_alt', true);
                                            $image_title = get_the_title(get_post_thumbnail_id($tarjeta_home->ID));
                                        ?>
                                        <img src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" class="img_bg" title="<?php echo $image_title ?>">
                                        <?php
                                        }
                                        ?>
                                        <div class="card_tit <?php if ($tipo_tarjeta == 'encuesta') { echo 'card_encuesta'; }?>">
                                            <?php
                                                if ($tipo_tarjeta != 'encuesta')
                                                {
                                            ?>
                                                <h1 class="card_tit_txt">
                                                    <?php echo get_the_title($tarjeta_home->ID);?>
                                                </h1>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="content_cont">
                                    <div class="content_cont_txt"></div>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    
                    if($tipo_post == 'tarjetas') {
                    ?>
                        <div class="section" tipo="<?php echo $tipo_tarjeta; ?>">
                            <div class="slide">
                                <div class="card <?php echo ($tipo_tarjeta == 'normal') ? 'card_click' : ''; ?>">
                                    <div class="card_content" id="favorites">
                                        <input type="hidden" class="postId" value="<?php echo ($tarjeta_home->ID) ? $tarjeta_home->ID : ''; ?>">
                                        <input type="hidden" class="userId" value="<?php echo ($current_user->ID) ? $current_user->ID : ''; ?>">
                                        <?php
                                        if (get_post_meta($tarjeta_home->ID, 'video_background_loop', true))
                                        {
                                        ?>
                                        <video autoplay muted loop playsinline poster="<?php echo get_post_meta($tarjeta_home->ID, 'poster', true); ?>"
                                        class="video_bg">
                                        <source src="<?php echo get_post_meta($tarjeta_home->ID, 'video_background_loop', true); ?>"
                                            type="video/mp4">
                                        </video>
                                        <?php
                                        }
                                        else
                                        {
                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($tarjeta_home->ID), 'single-post-thumbnail');
                                            $image_alt = get_post_meta(get_post_thumbnail_id($tarjeta_home->ID), '_wp_attachment_image_alt', true);
                                            $image_title = get_the_title(get_post_thumbnail_id($tarjeta_home->ID));
                                        ?>
                                        <img src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" class="img_bg" title="<?php echo $image_title ?>">
                                        <?php
                                        }
                                        ?>
                                        <div class="card_tit <?php if ($tipo_tarjeta == 'encuesta') { echo 'card_encuesta'; }?>">
                                            <?php
                                                if ($tipo_tarjeta != 'encuesta')
                                                {
                                            ?>
                                                <h1 class="card_tit_txt">
                                                    <?php echo get_the_title($tarjeta_home->ID);?>
                                                </h1>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="content_cont">
                                    <div class="content_cont_txt"></div>
                                </div>
                            </div>
                        </div>
                    <?php    
                    }
                }
            ?>
        </div>
        <!-- Fullpage -->
        <script src="<?php echo JSURL ?>fullpage/fullpage.min.js" crossorigin="anonymous" defer></script>
        <script src="<?php echo JSURL ?>fullpage/ext.min.js" crossorigin="anonymous" defer></script>
        <script src="<?php echo JSURL ?>fullpage/scroll.min.js" crossorigin="anonymous" defer></script>
        <script>
            jQuery(document).ready(function() {
                init();
                function init() {
                    var myFullpage = new fullpage('#fullpage', {
                        scrollOverflow: true,
                        scrollOverflowOptions: {
                            momentum: false,
                            useTransform: false,
                            useTransition: false,
                            bounce: false,
                            click: true,
                            tap: true,              
                        },
                        dragAndMove: true,
                        css3: true,
                        easing: 'easeInOutCubic',
                        easingcss3: 'ease',
                        scrollingSpeed: 700,
                        scrollOverflowReset: true,
                        navigation: false,
                        slidesNavigation: false,
                        controlArrows: false,
                        loopTop: false,
                        loopBottom: false,
                        continuousVertical: true,
                        loopHorizontal: false,
                        autoScrolling: true,
                        onSlideLeave: function( section, origin, destination, direction){
                            //second
                            if(destination.index == 1 && origin.index == 0 && direction == 'right'){
                                $('#loader').css('display', 'flex');
                                jQuery('.header_nav_close').css('display', 'block');
                                jQuery('.header_nav_close').click(function(){
                                    fullpage_api.moveSlideLeft();
                                });
                            }
                
                            //first
                            if(destination.index == 0 && origin.index == 1 && direction == 'left'){
                                jQuery('.header_nav_close').css('display', 'none');  
                            }
                        },
                        afterSlideLoad: function(section, origin, destination, direction) {
                            console.log('afterslideload');
                            var postId = jQuery(section.item).find('input.postId').val();
                
                            //primera diapositiva
                            if(destination.index == 1){
                                //validar si el detalle ya esta cargado
                                if ( jQuery(section.item).find('.slide.active').find('.content_cont').find('.content_cont_txt').children().length > 0 ) {
                                    fullpage_api.setAllowScrolling(false, 'down');
                                    fullpage_api.setKeyboardScrolling(false, 'down');
                                    fullpage_api.setAllowScrolling(false, 'up');
                                    fullpage_api.setKeyboardScrolling(false, 'up');
                                    $('#loader').css('display', 'none');
                                } else {
                                    $.ajax({
                                        type: "post",
                                        url: MyAjax.url, // Pon aquí tu URL
                                        data: {
                                            action: "get_detail",
                                            postId: postId,
                                        },
                                        beforeSend: function() {
                                            $('#loader').css('display', 'flex');
                                        },
                                        error: function(response) {
                                            $('#loader').css('display', 'none');  
                                            jQuery('.msgAlert').css('display', 'flex');
                                            jQuery('.msgAlertCont').css('padding-bottom', '30px');
                                            jQuery('.msgAlert .txtMsg').html('Parece que tienes problema de conexión a internet');                          
                                        },
                                        success: function(response) {
                                            console.log(response);
                                            jQuery(section.item).find('.slide.active').find('.content_cont').css('visibility','visible');
                                            var xx = jQuery(section.item).find('.slide.active').find('.content_cont').find('.content_cont_txt');
                                            jQuery(xx).append(response);
                                            // jQuery.ajax({
                                            //     type: "post",
                                            //     url: MyAjax.url,
                                            //     data: {
                                            //         action: "test_reto",
                                            //         user: '<?php echo $idUser; ?>',
                                            //         post: postId,
                                            //     },
                                            //     beforeSend: function() {
                                            //         jQuery('#loader').css('display', 'flex');
                                            //     },
                                            //     error: function(response) {
                                            //         console.log(response);
                                            //         jQuery('#loader').css('display', 'none');
                                            //     },
                                            //     success: function(response_json) {
                                            //         jQuery('#loader').css('display', 'none');
                                            //         response = JSON.parse(response_json);
                                            //         // console.log(response);
                                            //         if(response[0].popup == 'visualizaciones') {
                                            //             jQuery('.msgAlert').css('display', 'flex');
                                            //             jQuery('.msgAlert .txtMsg').html('<h4 class="felicitaciones" style="text-transform:uppercase;">RETO ACTIVADO:</h4><div class="content_cont_h1_line"></div><br>'+ response[0].mensaje +'<br><br><div class="list_retos_logrados_el"> <div><video style="filter: brightness(0.4)"> <source src="'+ response[0].video +'" type="video/mp4"> </video></div><h3>'+ response[0].titulo +'</h3></div></div>');
                                            //             jQuery('.msgAlert .aMsg').css('display', 'block');
                                            //             jQuery('.msgAlert .txtMsg').css('margin-bottom', '-10px');
                                            //             jQuery('.msgAlert .txtMsg').css('width', '100%');
                                            //             jQuery('.msgAlert .aMsg').html('Ir a la búsqueda de más contenidos');
                                            //             jQuery('.msgAlert .aMsg').css('font-size', '12px');
                                            //             jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url(); ?>');
                                            //         }
                                                    
                                            //         if(response[0].popup == 'completado') {
                                            //             jQuery('.msgAlert').css('display', 'flex');
                                            //             jQuery('.msgAlert .txtMsg').html(`<h4 class="felicitaciones" style="text-transform:uppercase;">RETO ACTIVADO:</h4><div class="content_cont_h1_line"></div><br><div class="list_retos_logrados_el"> <div><video autoplay muted loop playsinline> <source src="`+ response[0].video +`" type="video/mp4"> </video></div><h3>`+ response[0].titulo +`</h3></div><p style="color: black;text-align: center;font-family: Gatorade black;font-size: 17px;width: 100%;margin: 0;padding: 20px 0px 8px;line-height: 19px;">¡COMPARTE TU MEDALLA CON TUS AMIGOS E INVITALOS AL DESAFIO!</p><div class="the_champ_sharing_container the_champ_horizontal_sharing" style="padding-bottom:20px;" ss-offset="0" super-socializer-data-href="<?php echo home_url('retos'); ?>"> <div style="font-weight:bold" class="the_champ_sharing_title"></div><ul class="the_champ_sharing_ul" style="display:flex;justify-content:center;align-items:center;width:100%;"> <li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Facebook" title="Facebook" class="theChampSharing theChampFacebookBackground" onclick='theChampPopup("https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url('retos'); ?>&quote=¡Hoy supere otro Reto! Únete y Alcanza tu máximo potencial. Acepta el reto <?php echo home_url(); ?>")'> <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampFacebookSvg"> </ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Twitter" title="Twitter" class="theChampSharing theChampTwitterBackground" onclick='theChampPopup("http://twitter.com/intent/tweet?text=¡Hoy supere otro Reto!🏆 únete y Alcanza tu máximo potencial 💪🏼Acepta el reto  👉 <?php echo home_url(); ?>&amp;url=<?php echo home_url('retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampTwitterSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Whatsapp" title="Whatsapp" class="theChampSharing theChampWhatsappBackground" onclick='theChampPopup("https://web.whatsapp.com/send?text=¡Hoy supere otro Reto!🏆 únete y Alcanza tu máximo potencial 💪🏼Acepta el reto  👉 <?php echo home_url('retos'); ?>")' > <ss style="display:block" class="theChampSharingSvg theChampWhatsappSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Email" title="Email" class="theChampSharing theChampEmailBackground" onclick="window.open('mailto:?subject=¡Hoy supere otro Reto!🏆 únete y Alcanza tu máximo potencial 💪🏼Acepta el reto  👉 gatorade.lat&amp;body=' + decodeURIComponent('<?php echo home_url('retos'); ?>' ), '_blank')"> <ss style="display:block" class="theChampSharingSvg theChampEmailSvg"></ss> </i> </li></ul> <div style="clear:both"></div></div>`);
                                            //             jQuery('.msgAlert .aMsg').css('display', 'block');
                                            //             jQuery('.msgAlert .txtMsg').css('margin-bottom', '-32px');
                                            //             jQuery('.msgAlert .txtMsg').css('width', '100%');
                                            //             jQuery('.msgAlert .aMsg').html('IR A TU PERFIL');
                                            //             jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url('perfil'); ?>');
                                            //         }
                                            //     }
                                            // });
                                            setTimeout(function(){ 
                                                
                                                var activeSectionIndex = $(".fp-section.active").index();
                                                var activeSlideIndex = $(".fp-section.active")
                                                    .find(".slide.active")
                                                    .index();
                                                fullpage_api.destroy("all");

                                                //setting the active section as before
                                                $(".section").eq(activeSectionIndex).addClass("active");

                                                //were we in a slide? Adding the active state again
                                                if (activeSlideIndex > -1) {
                                                    $(".section.active")
                                                        .find(".slide")
                                                        .eq(activeSlideIndex)
                                                        .addClass("active");
                                                }

                                                init();

                                                fullpage_api.setAllowScrolling(false, 'down');
                                                fullpage_api.setKeyboardScrolling(false, 'down');
                                                fullpage_api.setAllowScrolling(false, 'up');
                                                fullpage_api.setKeyboardScrolling(false, 'up');
                                                $('#loader').css('display', 'none');
                                            }, 700);  
                                            
                                        },
                                    });

                                }

                            }

                            //segunda diapositiva
                            if(destination.index == 0){
                                // console.log("Primera diapositiva cargada");
                                fullpage_api.setAllowScrolling(true, 'down');
                                fullpage_api.setKeyboardScrolling(true, 'down');
                                fullpage_api.setAllowScrolling(true, 'up');
                                fullpage_api.setKeyboardScrolling(true, 'up');
                                if (jQuery(destination.item).find("video")[0]) {
                                    jQuery(destination.item).find("video")[0].play();
                                }
                            }
                        },
                        afterLoad: function(section, origin, destination, direction) {
                            if(section.index == 0 && origin.index == 1) {
                                if(jQuery(section.item).hasClass('tutorial')) {
                                    <?php
                                    if(is_user_logged_in()) {
                                        update_user_meta($current_user->ID, 'tutorial', 'true');
                                    }
                                    ?>
                                    jQuery(section.item).remove();
                                    fullpage_api.destroy("all");
                    
                                    init();
                                } else {
                                }
                            } else {
                            }
                
                            var params = {
                                origin: origin,
                                destination: destination,
                                direction: direction,
                            };
                            if (origin.isLast == true) {
                                //La llamada AJAX
                                // $.ajax({
                                //     type: "post",
                                //     url: MyAjax.url, // Pon aquí tu URL
                                //     data: {
                                //         action: "more_post_ajax",
                                //         offset: page * ppp + 1,
                                //         ppp: ppp,
                                //     },
                                //     beforeSend: function() {
                                //         $("#infinite").css("display", "flex");
                                //     },
                                //     error: function(response) {
                                //         console.log(response);
                                //         $("#infinite").css("display", "none");
                                //     },
                                //     success: function(response) {
                                //         page++;
                                        
                                        
                                //         $("#fullpage").append(response);
                
                                //         var listItem = $( ".fp-section.active" );
                                //         var ss = $( ".fp-section" ).index( listItem );
                                //         // console.log(ss);
                
                                //         fullpage_api.destroy("all");
                
                                //         //setting the active section as before
                                //         $(".section").eq(ss).addClass("active");
                
                                //         init();
                
                                //         $("#infinite").css("display", "none");
                
                                        
                                //     },
                                // });
                            }
                            if (jQuery(origin.item).find("video")[0]) {
                                jQuery(origin.item).find("video")[0].play();
                            }
                        },
                    });
                }
            });
        </script>
<?php
    }
?>
<script>
    jQuery(document).ready(function() {
        jQuery('.encuesta_form').off('submit').submit(function(event) {
            event.preventDefault();
            var opciones1 = jQuery('input:radio[name=pregunta1]:checked').val();
            var opciones2 = jQuery('input:radio[name=pregunta2]:checked').val();
            var userId = jQuery('#userId').val();
            var encuestaId = jQuery('#encuestaId').val();
            var padre = jQuery(this).parent();
            var ok = jQuery(padre).children('.ok');
            var form = jQuery(padre).children('form');
        // console.log(opciones1 + ' ' + opciones2 + ' ' + userId + ' ' + encuestaId);
        if (jQuery('#userId').val() != "" && jQuery('#encuestaId').val() != "" && jQuery(
                '#opciones1').val() != "" && jQuery('#opciones2').val() != "") {
            jQuery.ajax({
                url: MyAjax.url,
                type: 'post',
                data: {
                    action: 'guardar_encuesta',
                    opciones1: opciones1,
                    opciones2: opciones2,
                    userId: userId,
                    encuestaId: encuestaId
                },
                beforeSend: function() {
                    jQuery('#loader').css('display', 'flex');
                },
                error: function(response) {
                jQuery('.msgAlert').css('display', 'flex');
                jQuery('.msgAlertCont').css('padding-bottom', '30px');
                jQuery('.msgAlert .txtMsg').html(response);
                jQuery('#loader').css('display', 'none');
                },
                success: function(response) {
                    // Actualiza el mensaje con la respuesta
                    strs = response.replace(/\s/g, "");
                    jQuery(event.target).css('display', 'none');
                    jQuery(event.target).parent().find('h2').css('display', 'block');
                    jQuery('.msgAlert').css('display', 'flex');
                    jQuery('.msgAlertCont').css('padding-bottom', '30px');
                    jQuery('#loader').css('display', 'none');
                    if(strs === '0'){
                        jQuery('.msgAlert .txtMsg').html('Ha ocurrido un error');
                    }
                    if(strs === '1'){
                        jQuery('.msgAlert .txtMsg').html('Gracias por llenar la encuesta');
                    }
                    if(strs === '3'){
                        console.log('tres');
                        jQuery('.msgAlert').css('display', 'none');
                        jQuery('.msgAlert').css('display', 'flex');
                        jQuery('.msgAlert .txtMsg').html(`<h4 class="felicitaciones" style="text-transform:uppercase;">RETO ACTIVADO:</h4><div class="content_cont_h1_line"></div><br><div class="list_retos_logrados_el"> <div><video autoplay muted loop playsinline> <source src="<?php echo $video_medalla_llenar_encuesta; ?>" type="video/mp4"> </video></div><h3> <?php echo $titulo_medalla_llenar_encuesta; ?> </h3></div><p style="color: black;text-align: center;font-family: 'Gatorade black';font-size: 17px;width: 100%;margin: 0;padding: 20px 0px 8px;line-height: 19px;">¡COMPARTE TU MEDALLA CON TUS AMIGOS E INVITALOS AL DESAFIO!</p><div class="the_champ_sharing_container the_champ_horizontal_sharing" style="padding-bottom:20px;" ss-offset="0" super-socializer-data-href="<?php echo home_url('retos'); ?>"> <div style="font-weight:bold" class="the_champ_sharing_title"></div><ul class="the_champ_sharing_ul" style="display:flex;justify-content:center;align-items:center;width:100%;"> <li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Facebook" title="Facebook" class="theChampSharing theChampFacebookBackground" onclick='theChampPopup("https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url('retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampFacebookSvg"> </ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Twitter" title="Twitter" class="theChampSharing theChampTwitterBackground" onclick='theChampPopup("http://twitter.com/intent/tweet?text=Retos&amp;url=<?php echo home_url(' retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampTwitterSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Whatsapp" title="Whatsapp" class="theChampSharing theChampWhatsappBackground" onclick='theChampPopup("https://web.whatsapp.com/send?text=Retos <?php echo home_url('retos'); ?>")' > <ss style="display:block" class="theChampSharingSvg theChampWhatsappSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Email" title="Email" class="theChampSharing theChampEmailBackground" onclick="window.open('mailto:?subject=' + decodeURIComponent('Retos' ).replace('&amp;', '%26') + '&amp;body=' + decodeURIComponent('<?php echo home_url('retos'); ?>' ), '_blank')"> <ss style="display:block" class="theChampSharingSvg theChampEmailSvg"></ss> </i> </li></ul> <div style="clear:both"></div></div>`);
                    }
                }
            })

        } else {
            jQuery('.msgAlert').css('display', 'flex');
            jQuery('.msgAlert .txtMsg').html("Debes registrarte o loguearte para responder la encuesta");
            jQuery('.msgAlert .aMsg').css('display', 'block');
            jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url('registro'); ?>');
            jQuery('#loader').css('display', 'none');
        }
        });
    });
</script>
<?php
//Pixel
echo get_option('pixel_home');
get_footer();
?>
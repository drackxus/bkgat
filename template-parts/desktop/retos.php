<?php
global $current_user;
wp_get_current_user();
  
$loginUser=false;
if (is_user_logged_in()) {
    $loginUser = true;
    $nameUser = $current_user->user_login;
    $idUser = $current_user->ID;
  
    //reto editar deportes
	$mensaje_llenar_encuesta = get_option('mensaje_llenar_encuesta');
    $titulo_medalla_llenar_encuesta = get_option('titulo_medalla_llenar_encuesta');
    $video_medalla_llenar_encuesta = get_option('video_medalla_llenar_encuesta');
    $nombre_reto_llenar_encuesta = 'llenar_encuesta';
    
} else {
    $loginUser = false; 
} 
// $tipo_tarjeta = get_post_meta($post->ID, 'tipo_tarjeta', true);
?>

<?php
            // if ($tipo_tarjeta == 'normal') {
        ?>
        <div class="list_card_el">
            <div>
                
                <input type="hidden" class="postId" value="<?php if ($post->ID){ echo $post->ID; }?>" >    
                <input type="hidden" class="userId" value="<?php if ($current_user->ID){ echo $current_user->ID; }?>" >
                <?php
                if (get_post_meta($post->ID, 'video_background_loop', true)) {
                ?>
                <video muted loop poster="<?php echo get_post_meta($post->ID, 'poster', true); ?>" url="<?php echo the_permalink(); ?>" class="detalle_tarjeta">
                    <source src="<?php echo get_post_meta($post->ID, 'video_background_loop', true); ?>" type="video/mp4">
                </video>
                <?php 
                } else {
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                        $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                        $image_title = get_the_title(get_post_thumbnail_id($post->ID));
                ?>   
                <img src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" url="<?php echo the_permalink(); ?>" class="img_bg detalle_tarjeta" title="<?php echo $image_title ?>">
                <?php
                }
                ?>
                <div class="list_card_el_bottom">
                    <h1 class="list_card_el_bottom_tit"><?php echo the_title(); ?></h1>
                    <div class="side_buttons_link favorite favorite_desktop w-inline-block" onclick="agregarFav(<?php if ($post->ID){ echo $post->ID; }?>, <?php if ($current_user->ID){ echo $current_user->ID; }?>)">
                        <img
                        src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6026c3b6fb4589cf42b78ae1_favorite.svg"
                        loading="lazy"
                        class="side_buttons_link_img"/>
                    </div>
                </div>
                
            </div>
        </div>
        <?php
        //   }
        ?>
        <?php
            // if ($tipo_tarjeta == 'encuesta') {
                // var_dump(get_user_meta($idUser, 'encuestas', true));
                $encuesta_elegida = get_post_meta($post->ID, 'encuesta_elegida', true);
                $encuestas = get_user_meta($idUser, 'encuestas', true);
                if(in_array($encuesta_elegida, array_column($encuestas, 'post'))){
                   
                } else {
        ?>
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
                <div class="list_card_el">
                  <div>
                    <?php
                    if (get_post_meta($post->ID, 'video_background_loop', true)) {
                    ?>
                    <video muted loop poster="<?php echo get_post_meta($post->ID, 'poster', true); ?>">
                        <source src="<?php echo get_post_meta($post->ID, 'video_background_loop', true); ?>" type="video/mp4">
                    </video>
                    <?php 
                    } else {
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                        $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                        $image_title = get_the_title(get_post_thumbnail_id($post->ID));
                    ?>   
                    <img src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" class="img_bg" title="<?php echo $image_title ?>">
                    <?php
                    }
                    ?>
                    <form class="encuesta_form" id="encuesta" name="encuesta" method="post">
                        <input type="hidden" id="encuestaId" value="<?php echo (get_post_meta($post->ID, 'encuesta_elegida', true)) ? get_post_meta($post->ID, 'encuesta_elegida', true) : ''; ?>">
                        <input type="hidden" id="userId" value="<?php echo ($current_user->ID) ? $current_user->ID : ''; ?>">
                        <?php
                        if (get_post_meta($post->ID, 'encuesta_elegida', true)) {
                            $id_encuesta = get_post_meta($post->ID, 'encuesta_elegida', true);
                            $args = array(
                                'post_type' => 'encuestas',
                                'post_status' => 'publish',
                                'posts_per_page' => '1',
                                'post__in' => array($id_encuesta),
                            );
                            $result = new WP_Query($args);
                            if ($result->have_posts()):
                            while ($result->have_posts()): $result->the_post();
                                if (get_post_meta($post->ID, 'pregunta1', true)) {?>
                                <div class="cont_pregunta">
                                    <h3 class="pregunta"><?php echo get_post_meta($post->ID, 'pregunta1', true); ?></h3>
                                    <div class="opciones">
                                    <?php
                                        $opciones1 = get_post_meta($post->ID, 'opciones1', true);
                                        // var_dump($opciones1);
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
                                                    foreach ($opciones_lista2 as $key => $value) {?>
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
            // }
        ?>
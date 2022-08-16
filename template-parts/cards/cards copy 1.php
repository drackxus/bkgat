<?php
  // get_header();
  global $current_user;
  wp_get_current_user();
  if (is_user_logged_in()) {
      $loginUser = "true";
      $nameUser = $current_user->user_login;
      $idUser = $current_user->ID;
  } else {
      $loginUser = false;
  } 
  ?>
<div class="section">
  <div class="slide">
    <?php
      if (get_post_meta($post->ID, 'tipo_tarjeta', true) == 'encuesta') {
    ?>
    <style>
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
      padding-left: 63px;
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
      height: 45px;
      width: 45px;
      background-color: transparent;
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
    <?php
      }
    ?>
    <div class="card <?php echo (get_post_meta($post->ID, 'tipo_tarjeta', true) == 'normal') ? 'card_click' : ''; ?>">
      <div class="card_content" id="favorites">
        <input type="hidden" class="postId" value="<?php echo ($post->ID) ? $post->ID : ''; ?>">
        <input type="hidden" class="userId" value="<?php echo ($current_user->ID) ? $current_user->ID : ''; ?>">
        <?php
          if (get_post_meta($post->ID, 'video_background_loop', true)) {
              ?>
        <video autoplay muted loop playsinline poster="<?php echo get_post_meta($post->ID, 'poster', true); ?>"
          class="video_bg">
          <source src="<?php echo get_post_meta($post->ID, 'video_background_loop', true); ?>"
            type="video/mp4">
        </video>
        <?php
          } else {
              $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
              $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
              $image_title = get_the_title(get_post_thumbnail_id($post->ID));?>
        <img src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" class="img_bg"
          title="<?php echo $image_title ?>">
        <?php
          }
          ?>
        <div class="card_tit <?php if (get_post_meta($post->ID, 'tipo_tarjeta', true) == 'encuesta') {
          echo 'card_encuesta';
          }?>">
          <?php
            if (get_post_meta($post->ID, 'tipo_tarjeta', true) == 'normal') {
          ?>
          <h1 class="card_tit_txt">
            <?php the_title();?>
          </h1>
          <?php
            }
          ?>
          <?php
            if (get_post_meta($post->ID, 'tipo_tarjeta', true) == 'encuesta') {
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
            <input type="submit" value="ENVIAR" class="contact_submit w-button enviar_encuesta" id="enviar_encuesta">
          </form>
          <h2 class="ok" style="color: white; text-align: center; width: 100%; display: none;">Gracias por
            llenar la encuesta.<br><br>Puedes deslizar hacia arriba para ver más contenidos.
          </h2>
          <?php
            }
            ?>
        </div>

        <script>
          jQuery(document).ready(function() {
            jQuery('#enviar_encuesta').click(function(event) {
              event.preventDefault();
              var opciones1 = jQuery('input:radio[name=pregunta1]:checked').val();
              var opciones2 = jQuery('input:radio[name=pregunta2]:checked').val();
              var userId = jQuery('#userId').val();
              var encuestaId = jQuery('#encuestaId').val();

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
                          // console.log(response);
                          jQuery('.section.active').find('.slide.active').find('form')
                              .css('display', 'none');
                          jQuery('.section.active').find('.slide.active').find('.ok').css('display', 'block');
                          jQuery('.msgAlert').css('display', 'flex');
                          jQuery('.msgAlertCont').css('padding-bottom', '30px');
                          jQuery('.msgAlert .txtMsg').html(response);
                          jQuery('#loader').css('display', 'none');
                      }
                  })

              } else {
                  jQuery('.msgAlert').css('display', 'flex');
                  jQuery('.msgAlert .txtMsg').html("Debes registrarte o loguearte para guardar en favoritos");
                  jQuery('.msgAlert .aMsg').css('display', 'block');
                  jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url('registro'); ?>');
                  jQuery('#loader').css('display', 'none');
              }
            });
          });
        </script>
      </div>
    </div>
    
  </div>
  <?php
    if (get_post_meta($post->ID, 'tipo_tarjeta', true) == 'normal') {
        ?>
  <div class="slide">
    <div class="content_cont">
      <div class="content_cont_txt"></div>
      <br>
      <?php echo apply_shortcodes('[miniorange_social_sharing]') ?>
      <br>
      <?php get_template_part('template-parts/foot_logos/foot_logos');?>
    </div>
  </div>
  <?php
    }
    ?>
</div>
<?php
  // get_header();
  global $current_user;
  wp_get_current_user();
  if (is_user_logged_in())
  {
      $loginUser = "true";
      $nameUser = $current_user->user_login;
      $idUser = $current_user->ID;
      
      //reto editar deportes
	$mensaje_llenar_encuesta = get_option('mensaje_llenar_encuesta');
    $titulo_medalla_llenar_encuesta = get_option('titulo_medalla_llenar_encuesta');
    $video_medalla_llenar_encuesta = get_option('video_medalla_llenar_encuesta');
    $nombre_reto_llenar_encuesta = 'llenar_encuesta';
  }
  else
  {
      $loginUser = false;
  } 
  $tipo_tarjeta = get_post_meta($post->ID, 'tipo_tarjeta', true);
  ?>
<div class="section" tipo="<?php echo $tipo_tarjeta; ?>">
  <div class="slide">
    <?php
      if ($tipo_tarjeta == 'encuesta')
      {
        $encuesta_elegida = get_post_meta($post->ID, 'encuesta_elegida', true);
        $encuestas = get_user_meta($idUser, 'encuestas', true);
        if(in_array($encuesta_elegida, array_column($encuestas, 'post'))){
           
        } else {
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
      }
      ?>
    <div class="card <?php echo ($tipo_tarjeta == 'normal') ? 'card_click' : ''; ?>">
      <div class="card_content" id="favorites">
        <input type="hidden" class="postId" value="<?php echo ($post->ID) ? $post->ID : ''; ?>">
        <input type="hidden" class="userId" value="<?php echo ($current_user->ID) ? $current_user->ID : ''; ?>">
        <?php
          if (get_post_meta($post->ID, 'video_background_loop', true))
          {
          ?>
        <video autoplay muted loop playsinline poster="<?php echo get_post_meta($post->ID, 'poster', true); ?>"
          class="video_bg">
          <source src="<?php echo get_post_meta($post->ID, 'video_background_loop', true); ?>"
            type="video/mp4">
        </video>
        <?php
          }
          else
          {
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
            $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
            $image_title = get_the_title(get_post_thumbnail_id($post->ID));
          ?>
        <img src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" class="img_bg"
          title="<?php echo $image_title ?>">
        <?php
          }
          ?>
        <div class="card_tit <?php if ($tipo_tarjeta == 'encuesta') { echo 'card_encuesta'; }?>">
          <?php
            if ($tipo_tarjeta == 'normal')
            {
            ?>
          <h1 class="card_tit_txt">
            <?php the_title();?>
          </h1>
          <?php
            }
            ?>
          <?php
            if ($tipo_tarjeta == 'encuesta')
            {
            ?>
          <form class="encuesta_form" id="encuesta" name="encuesta" method="post">
            <input type="hidden" id="encuestaId" value="<?php echo (get_post_meta($post->ID, 'encuesta_elegida', true)) ? get_post_meta($post->ID, 'encuesta_elegida', true) : ''; ?>">
            <input type="hidden" id="userId" value="<?php echo ($current_user->ID) ? $current_user->ID : ''; ?>">
            <?php
              if (get_post_meta($post->ID, 'encuesta_elegida', true))
              {
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
                    if (get_post_meta($post->ID, 'pregunta1', true)) 
                    {
              ?>
            <div class="cont_pregunta">
              <h3 class="pregunta"><?php echo get_post_meta($post->ID, 'pregunta1', true); ?></h3>
              <div class="opciones">
                <?php
                  $opciones1 = get_post_meta($post->ID, 'opciones1', true);
                  // var_dump($opciones1);
                  $opciones_lista1 = explode(",", $opciones1);
                  foreach ($opciones_lista1 as $key => $value)
                  {
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
            <?php 
              }
                if (get_post_meta($post->ID, 'pregunta2', true))
                {
              ?>
            <div class="cont_pregunta">
              <h3 class="pregunta"><?php echo get_post_meta($post->ID, 'pregunta2', true); ?></h3>
              <div class="opciones">
                <?php
                  $opciones2 = get_post_meta($post->ID, 'opciones2', true);
                  // var_dump($opciones2);
                  $opciones_lista2 = explode(",", $opciones2);
                  foreach ($opciones_lista2 as $key => $value)
                  {
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
              }
              ?>
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
      </div>
    </div>
  </div>
  <?php
    if ($tipo_tarjeta == 'normal')
    {
    ?>
  <style>
    .the_champ_sharing_container.the_champ_horizontal_sharing{
    justify-content: left;
    }
    .foot_cont{
    margin-bottom: 0px;
    margin-top: 0px;
    }
  </style>
  <div class="slide">
    <div class="content_cont" style="visibility:hidden;">
      <div class="content_cont_txt"></div>
      
      <br>
      <?php echo apply_shortcodes('[TheChamp-Sharing title="COMPARTIR"]') ?>
      <br>
      <?php get_template_part('template-parts/foot_logos/foot_logos');?>
      <?php
global $current_user;
global $post;
wp_get_current_user();
if (is_user_logged_in()) {
  $loginUser = "true";
  $idUser = $current_user->ID;
  $idPost = $post->ID;
}
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
</style>
    </div>
  </div>
  <?php
    }
    ?>
</div>
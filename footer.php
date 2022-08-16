<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package WordPress
 */

global $current_user;
wp_get_current_user();
if (is_user_logged_in()) {
  $loginUser = "true";
  $idUser = $current_user->ID;
  $emailUser = $current_user->user_email;
    $nameUser = get_user_meta($idUser, 'user_nombre', true).' '. get_user_meta($idUser, 'user_apellido', true);
    //Validar reto
    $mensaje_registrarse = get_option('mensaje_registrarse');   
    $titulo_medalla_registrarse = get_option('titulo_medalla_registrarse');
    $video_medalla_registrarse = get_option('video_medalla_registrarse');
    $imagen_correo_registrarse = get_option('imagen_correo_registrarse');
    $puntos_registrarse = get_option('puntos_registrarse');
    $nombre_reto_registrarse = 'registrarse';
    
    //reto favorito
    $mensaje_favorito_contenido = get_option('mensaje_favorito_contenido');
    $titulo_medalla_favorito_contenido = get_option('titulo_medalla_favorito_contenido');
    $video_medalla_favorito_contenido = get_option('video_medalla_favorito_contenido');
    $nombre_reto_favorito_contenido = 'favorito_contenido';
?>
<style>
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
</style>
<?php
    
    if( get_user_meta($idUser, 'user_nombre', true) != '' &&  get_user_meta($idUser, 'user_apellido', true) != '') {
        if(get_user_meta($idUser, 'registrarse', true) == '1'){
        } else {
            if(get_option('estado_registrarse') != 'pausado') {
                mostrarPopupEmail($mensaje_registrarse, $titulo_medalla_registrarse, $video_medalla_registrarse, $imagen_correo_registrarse, $puntos_registrarse, $idUser, $nombre_reto_registrarse, $emailUser, $nameUser);
                ?>
                <script>
                    jQuery('.msgAlert').css('display', 'none');
        		    jQuery('.msgAlert').css('display', 'flex');
        		    jQuery('.msgAlert .txtMsg').html(`<h4 class="felicitaciones" style="text-transform:uppercase;">RETO ACTIVADO:</h4><div class="content_cont_h1_line"></div><br><div class="list_retos_logrados_el"> <div><video autoplay muted loop playsinline> <source src="<?php echo $video_medalla_registrarse; ?>" type="video/mp4"> </video></div><h3> <?php echo $titulo_medalla_registrarse; ?> </h3></div><p style="color: black;text-align: center;font-family: 'Gatorade black';font-size: 17px;width: 100%;margin: 0;padding: 20px 0px 8px;line-height: 19px;">¡COMPARTE TU MEDALLA CON TUS AMIGOS E INVITALOS AL DESAFIO!</p><div class="the_champ_sharing_container the_champ_horizontal_sharing" style="padding-bottom:20px;" ss-offset="0" super-socializer-data-href="<?php echo home_url('retos'); ?>"> <div style="font-weight:bold" class="the_champ_sharing_title"></div><ul class="the_champ_sharing_ul" style="display:flex;justify-content:center;align-items:center;width:100%;"> <li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Facebook" title="Facebook" class="theChampSharing theChampFacebookBackground" onclick='theChampPopup("https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url('retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampFacebookSvg"> </ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Twitter" title="Twitter" class="theChampSharing theChampTwitterBackground" onclick='theChampPopup("http://twitter.com/intent/tweet?text=Retos&amp;url=<?php echo home_url(' retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampTwitterSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Whatsapp" title="Whatsapp" class="theChampSharing theChampWhatsappBackground" onclick='theChampPopup("https://web.whatsapp.com/send?text=Retos <?php echo home_url('retos'); ?>")' > <ss style="display:block" class="theChampSharingSvg theChampWhatsappSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Email" title="Email" class="theChampSharing theChampEmailBackground" onclick="window.open('mailto:?subject=' + decodeURIComponent('Retos' ).replace('&amp;', '%26') + '&amp;body=' + decodeURIComponent('<?php echo home_url('retos'); ?>' ), '_blank')"> <ss style="display:block" class="theChampSharingSvg theChampEmailSvg"></ss> </i> </li></ul> <div style="clear:both"></div></div>`);
                </script>
                <?php
            }
        }
    }
} else {
    $loginUser = false;
    $idUser = '';
}

?>
</div>
<footer class="footer" class="woowContentFull"></footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="<?php echo JSURL ?>scripts.js" type="text/javascript" async></script>
<script>
  jQuery(document).ready(function() {
    //Cerrar alerta
    jQuery(".closeMsg").on("click", function(event) {
      jQuery(".msgAlert").css('display', 'none');
    });  

    // Favoritos
    jQuery(".favorite.mobile").on("click", function(event) {
      //comprobamos si dentro de la tarjeta existen los input 
      if(jQuery('body').hasClass('single')){
          event.preventDefault();
            //obtenemos el valor de los input
            var user = '<?php echo $idUser; ?>';
            var post = '<?php echo $post->ID; ?>';
            if (user == '' || post == '') {
              jQuery('.msgAlert').css('display', 'flex');
              jQuery('.msgAlert .txtMsg').html("Debes registrarte o loguearte para guardar en favoritos");
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
            })
            }
      } else {
          if (jQuery('.section.fp-section.active') && jQuery('.section.fp-section.active').find('.postId')) {
            event.preventDefault();
            //obtenemos el valor de los input
            var user = jQuery('.section.fp-section.active').find('.userId').val();
            var post = jQuery('.section.fp-section.active').find('.postId').val();
            if (user == '' || post == '') {
              jQuery('.msgAlert').css('display', 'flex');
              jQuery('.msgAlert .txtMsg').html("Debes registrarte o loguearte para guardar en favoritos");
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
            })
            }
          } else {
            jQuery('.msgAlert').css('display', 'flex');
            jQuery('.msgAlertCont').css('padding-bottom', '30px');
            jQuery('.msgAlert .txtMsg').html("Ha ocurrido un error");
            jQuery('#loader').css('display', 'none');
          }
      }
    });
    
  });  
</script>
<?php echo get_option('pixel_general'); ?>
<?php wp_footer(); ?>
</body>
</html>
<?php

/**
 * Displays side buttons
 *
 * @package WordPress
 * 
 */

?>
<!-- Side buttons  -->

<?php
  global $current_user;
  wp_get_current_user();
  if (is_user_logged_in()) {
  //var_dump("Entré al header y soy true");
      $loginUser = "true";
      $nameUser = $current_user->user_login;
      $idUser = $current_user->ID;
  } else {
  
//  var_dump("Entré al header y soy false");
      $loginUser = false;
  }
?>
<style>
.show_whatsapp {
    display: flex !important;
}
</style>
<div class="side_buttons">
    <?php if(get_option('show_whatsapp')){ ?>
    <?php if(get_option('whatsapp') != ''){ ?>
    <a href="<?php echo get_option('whatsapp'); ?>" target="_blank" class="side_buttons_link search w-inline-block show_whatsapp">
        <img src="<?php echo IMGURL; ?>whatsapp.png" width="30" height="30" loading="lazy" data-w-id="e8ceae10-1b4b-3c57-4a9f-debb037209a1" alt="" class="side_buttons_link_img" />
    </a>
    <?php } ?>
    <?php } ?>
    <a href="<?php echo home_url('buscar'); ?>" class="side_buttons_link search w-inline-block">
        <img src="<?php echo IMGURL; ?>search.svg" width="30" height="30" loading="lazy" data-w-id="e8ceae10-1b4b-3c57-4a9f-debb037209a1" alt="" class="side_buttons_link_img" />
    </a>
    <?php if ($loginUser == "true") { ?>
        <a href="<?php echo home_url('perfil'); ?>" class="side_buttons_link user w-inline-block">
        <img src="<?php echo IMGURL; ?>user.svg" width="30" height="30" loading="lazy" data-w-id="7a16e0f7-79c6-d0b0-0c53-b20ac93f3a90" alt="" class="side_buttons_link_img" />
    </a>
      <?php } ?>
      <?php if (!$loginUser == "true") { ?>
        <a href="<?php echo home_url('ingreso'); ?>" class="side_buttons_link user w-inline-block">
        <img src="<?php echo IMGURL; ?>user.svg" width="30" height="30" loading="lazy" data-w-id="7a16e0f7-79c6-d0b0-0c53-b20ac93f3a90" alt="" class="side_buttons_link_img" />
    </a>
      <?php } ?>
    
    <a class="side_buttons_link favorite mobile w-inline-block">
        <img src="<?php echo IMGURL; ?>favorite.svg" width="30" height="30" loading="lazy" data-w-id="19d67c4d-a60a-dadc-45ac-cc759b964ade" alt="" class="side_buttons_link_img" />
    </a>
</div>
<!-- Side buttons  -->
<?php
  global $current_user;
  wp_get_current_user();
  if (is_user_logged_in()) {
      $loginUser = "true";
      $idUser = $current_user->ID;
      $nameUser = get_user_meta($idUser, 'user_nombre', true).' '. get_user_meta($idUser, 'user_apellido', true);
  } else {
      $loginUser = false;
  }
?>
<style>
.image-3 {
    margin-bottom: 0px;
}
.home_header {
    margin-bottom: 20px;
}
.home_header_logo {
    width: 80px;
    padding: 6px;
}
.search_cont_form_btn:hover {
    background-image: url(https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60072340f7a1782076c7ac1b_loupe.svg), linear-gradient(
58deg, #000000, #000000);
  }
  .fixed_bottom {
    position: fixed;
    bottom: 0px;
    z-index: 6;
  }
  .user_button.user_top {
    width: 40px !important;
    height: 38px !important;
}
.search_cont_form_input {
    padding-right: 37px;
}
a:hover, a:active, a:focus {
    color: var(--color-orange);
 }
 .estilo_ingresar:hover{
    color: var(--color-orange) !important;
}
</style>
<div class="home_header">
  <a href="<?php echo home_url(); ?>" class="home_header_logo w-inline-block">
    <img
    src="<?php echo IMGURL ?>desktop/header/logo_black.png"
    loading="lazy"
    alt=""
    class="image-3"
    />
  </a>
  <div class="home_header_right">
    <div class="home_header_right_top">
      <div class="search_cont_header">
        <form method="get" action="<?php echo home_url(); ?>" role="search" class="search_cont_form">
          <input type="search" type="text"
                class="search_cont_form_input w-input"
                maxlength="256"
                name="s"
                placeholder="Buscador  (Tags, Palabras claves)"
                id="search"
                onkeyup="eve()" 
                value="<?php echo get_search_query() ?>" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
          
          <input type="submit" value="" class="search_cont_form_btn w-button" id="sub">
          <script type="text/javascript">
                         
              function eve(){
                if(jQuery('#search').val().length < 3){
                  console.log(jQuery('#search').val())
                  
                    jQuery('#sub').attr('disabled', true);
                  
                }else{
                  
                    jQuery('#sub').attr('disabled', false);
                  
                }
                
                
              }             
            
          </script>
          
        </form>
      </div>
      <?php if ($loginUser == "true") { ?>
        <div class="name_user">HOLA <?php if ($nameUser!=' ') {echo $nameUser;}else {echo $current_user->user_login; }?></div>
        <a href="<?php echo home_url('perfil'); ?>" class="user_button user_top w-inline-block">
        <img
        src="<?php echo IMGURL ?>desktop/header/user.svg"
        loading="lazy"
        data-w-id="034606c6-1c77-3b01-a06d-b7901c11ca0e"
        alt=""
        class="side_buttons_link_img"
        />
      </a>
      <?php } ?>
      <?php if (!$loginUser == "true") { ?>
        <div class="name_user">
          <a class="estilo_ingresar" href="<?php echo home_url('ingreso'); ?>" style="color:black;">INGRESAR</a>
        </div>
        <a href="<?php echo home_url('ingreso'); ?>" class="user_button user_top w-inline-block">
        <img
        src="<?php echo IMGURL ?>desktop/header/user.svg"
        loading="lazy"
        data-w-id="034606c6-1c77-3b01-a06d-b7901c11ca0e"
        alt=""
        class="side_buttons_link_img"
        />
      </a>
      <?php } ?>
   </div>
    <div class="home_header_right_bottom">
      <ul role="list" class="header-right_menu">
        <li class="header_right_menu_el" style="border-left:0px;">
          <a href="<?php echo home_url('productos'); ?>" class="right_menu_el_link"><?php echo get_option('menu_productos'); ?></a>
        </li>
        <li class="header_right_menu_el">
          <a href="<?php echo home_url('tarjetas'); ?>" class="right_menu_el_link"><?php echo get_option('menu_categorias'); ?></a>
        </li>
        <li class="header_right_menu_el">
          <a href="<?php echo home_url('eventos'); ?>" class="right_menu_el_link"><?php echo get_option('menu_eventos'); ?></a>
        </li>
        <?php
        // if(get_bloginfo()!="Argentina") {
        ?>
        <li class="header_right_menu_el">
          <a href="<?php echo home_url('retos'); ?>" class="right_menu_el_link"><?php echo get_option('menu_retos'); ?></a>
          <?php get_template_part( 'template-parts/retos/notificacion' ); ?>
        </li>
        <?php
        // }
        ?>
        <?php
        if(get_option('pagina_lanzamientos') != '') {
        ?>
        <li class="header_right_menu_el">
          <a href="<?php echo home_url('lanzamientos'); ?>" class="right_menu_el_link"><?php echo get_option('menu_lanzamientos'); ?></a>
        </li>
        <?php
        }
        ?>
      </ul>
      <ul role="list" class="header-right_social">
        <li class="header_right_social_el">
          <a href="<?php echo get_option('youtube'); ?>" target="_blank" class="right_social_el_link w-inline-block">
            <img
            src="<?php echo IMGURL ?>desktop/header/youtube.svg"
            loading="lazy"
            alt="Youtube"
            class="social_el_link_img"
            />
          </a>
        </li>
        <li class="header_right_social_el">
          <a href="<?php echo get_option('facebook'); ?>" target="_blank" class="right_social_el_link w-inline-block">
            <img
            src="<?php echo IMGURL ?>desktop/header/facebook.svg"
            loading="lazy"
            alt="Facebook"
            class="social_el_link_img"
            />
          </a>
        </li>
        <li class="header_right_social_el">
          <a href="<?php echo get_option('instagram'); ?>" target="_blank" class="right_social_el_link w-inline-block">
            <img
            src="<?php echo IMGURL ?>desktop/header/instagram.svg"
            loading="lazy"
            alt="Instagram"
            class="social_el_link_img"
            />
          </a>
        </li>
        <li class="header_right_social_el">
          <a href="<?php echo get_option('twitter'); ?>" target="_blank" class="right_social_el_link w-inline-block">
            <img
            src="<?php echo IMGURL ?>desktop/header/twitter.svg"
            loading="lazy"
            alt="Twitter"
            class="social_el_link_img"
            />
          </a>
        </li>
        <?php if(get_option('show_whatsapp')){ ?>
        <?php if(get_option('whatsapp') != ''){ ?>
        <li class="header_right_social_el">
          <a href="<?php echo get_option('whatsapp'); ?>" target="_blank" class="right_social_el_link w-inline-block">
            <img
            src="<?php echo IMGURL ?>whatsapp.png"
            loading="lazy"
            alt="Whatsapp"
            class="social_el_link_img"
            />
          </a>
        </li>
        <?php } ?>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>
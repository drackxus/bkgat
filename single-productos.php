<?php
  get_header(); 
  
global $current_user;
wp_get_current_user();
if (is_user_logged_in()) {
  
  global $post;
  
  $idUser = $current_user->ID;
  
  //Validar reto
    if(get_user_meta($idUser, 'conocer_producto', true) == '1') {
    } else {
        $mensaje_conocer_producto = get_option('mensaje_conocer_producto');   
        $titulo_medalla_conocer_producto = get_option('titulo_medalla_conocer_producto');
        $video_medalla_conocer_producto = get_option('video_medalla_conocer_producto');
        $imagen_correo_conocer_producto = get_option('imagen_correo_conocer_producto');
        $puntos_conocer_producto = get_option('puntos_conocer_producto');
        $nombre_reto_conocer_producto = 'conocer_producto';
        
        if(get_option('estado_conocer_producto') != 'pausado') {
            mostrarPopupEmail($mensaje_conocer_producto, $titulo_medalla_conocer_producto, $video_medalla_conocer_producto, $imagen_correo_conocer_producto, $puntos_conocer_producto, $idUser, $nombre_reto_conocer_producto, $emailUser, $nameUser);
            ?>
            <script>
                jQuery('.msgAlert').css('display', 'none');
    		    jQuery('.msgAlert').css('display', 'flex');
    		    jQuery('.msgAlert .txtMsg').html(`<h4 class="felicitaciones" style="text-transform:uppercase;">RETO ACTIVADO:</h4><div class="content_cont_h1_line"></div><br><div class="list_retos_logrados_el"> <div><video autoplay muted loop playsinline> <source src="<?php echo $video_medalla_conocer_producto; ?>" type="video/mp4"> </video></div><h3> <?php echo $titulo_medalla_conocer_producto; ?> </h3></div><p style="color: black;text-align: center;font-family: 'Gatorade black';font-size: 17px;width: 100%;margin: 0;padding: 20px 0px 8px;line-height: 19px;">¡COMPARTE TU MEDALLA CON TUS AMIGOS E INVITALOS AL DESAFIO!</p><div class="the_champ_sharing_container the_champ_horizontal_sharing" style="padding-bottom:20px;" ss-offset="0" super-socializer-data-href="<?php echo home_url('retos'); ?>"> <div style="font-weight:bold" class="the_champ_sharing_title"></div><ul class="the_champ_sharing_ul" style="display:flex;justify-content:center;align-items:center;width:100%;"> <li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Facebook" title="Facebook" class="theChampSharing theChampFacebookBackground" onclick='theChampPopup("https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url('retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampFacebookSvg"> </ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Twitter" title="Twitter" class="theChampSharing theChampTwitterBackground" onclick='theChampPopup("http://twitter.com/intent/tweet?text=Retos&amp;url=<?php echo home_url(' retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampTwitterSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Whatsapp" title="Whatsapp" class="theChampSharing theChampWhatsappBackground" onclick='theChampPopup("https://web.whatsapp.com/send?text=Retos <?php echo home_url('retos'); ?>")' > <ss style="display:block" class="theChampSharingSvg theChampWhatsappSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Email" title="Email" class="theChampSharing theChampEmailBackground" onclick="window.open('mailto:?subject=' + decodeURIComponent('Retos' ).replace('&amp;', '%26') + '&amp;body=' + decodeURIComponent('<?php echo home_url('retos'); ?>' ), '_blank')"> <ss style="display:block" class="theChampSharingSvg theChampEmailSvg"></ss> </i> </li></ul> <div style="clear:both"></div></div>`);
            </script>
            <?php
        }
    }
} else {
    $loginUser = false;
}
?>
<style>
.the_champ_horizontal_sharing .theChampSharing {
    background-color: var(--color-orange);
    background: var(--color-orange);
}
.the_champ_horizontal_sharing .theChampSharing {
    color: var(--color-orange);
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
    font-size: 28px;
    line-height: 30px;
    margin-top: 0px;
    font-family: 'Gatorade black';
    margin-bottom: 10px;
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
    width: 63px;
    height: 3px;
    border-radius: 6px;
    background-color: #f47d30;
    margin: 0 auto;
}
</style>
<style>
  table {
  margin: 30px 0px;
  }
  table h3 {
  margin: 10px 0px;
  font-family: 'Gatorade black';
  color: white;
  }
  #tabla_completa {
  display: none;
  }
  .prod_tabla_btn {
  cursor: pointer;
  box-shadow: -5px 5px 7px #00000017;
  }
  .content_cont_h2_line{
  width: 86px;
  margin-top: 4px;
  }
  .prod_buy_btn {
    border-radius: 30px;
   
    padding-left: 10px;
  }
  .prod_buy_btn_bg{
  width: 80%;
  margin-right: auto;
  margin-bottom: 15px;
  display:flex;
  justify-content:center;
  margin-left: auto;    
  padding: 8px;
  border-radius: 30px;
  background-color: #f47d30;
  font-family: 'Gatorade black', sans-serif;
  color: #fff;
  font-size: 28px;
  line-height: 28px;
  font-weight: 900;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  --color-orange: #fff;
  }
</style>
<?php
  if (wp_is_mobile()) {
  ?>
<style>
  .side_buttons_link.favorite {
  display: none;
  }
</style>
<link rel="stylesheet" href="<?php echo CSSURL ?>swiper/swiper.css">
<style>
  .swiper-container.swiper-container3 {
  width: calc(100% + 40px);
  padding-top: 20px;
  padding-bottom: 70px;
  margin-left: -20px;
  background-image: url(https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602300930367ca581721d17d_bg_product.png);
  background-position: 0% 62%;
  background-size: 100% 70%;
  background-repeat: no-repeat;
  }
  .foot_cont {
  margin-bottom: 70px;
  margin-top: -45px;
  }
  .swiper-container.swiper-container3 .swiper-slide {
  background-position: center;
  background-size: cover;
  width: 170px;
  /* height: 220px; */
  }
  :root {
  --swiper-theme-color: white;
  --swiper-navigation-size: 28px;
  }
  .swiper-container-3d .swiper-slide-shadow-left {
  background-image: linear-gradient(to left,rgb(0 0 0 / 2%),rgba(0,0,0,0));
  }
  .swiper-container-3d .swiper-slide-shadow-right {
  background-image: linear-gradient(to right,rgb(0 0 0 / 2%),rgba(0,0,0,0));
  }
  .tit_product {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  margin: 30px 0px;
  }
  .tit_product img {
  width: 30px;
  margin-right: 5px;
  }
  .tit_product h1 {
  margin-top: 0px;
  }
  .product_des p {
  text-align: center
  }
  @media screen and (max-width: 767px){}
  .products_el_tit {
  font-size: 19px;
  min-height: 64px;
  height:auto;
  }
  .product_cont_h1.bottom_line{
  font-size: 19px;
  }
  .content_cont_h2_line.rel_white {
  width: 43px;
  }
  
  /*estilos boton comprar*/
  .cart_prod_class{
      height: auto; 
      width: 30px; 
      padding-right: 6px;
  }
  .buy_text{
  font-size: large;
  }
  h3{
  margin: 8px 0px;
  }
</style>
<div class="content_cont fdn_pro2">
  <div class="tit_product">
    <?php 
      $terms = wp_get_post_terms( $post->ID, 'categoriasProductos');
      ?>
    <?php
      switch ($tax->name) {
          case 'Energía':?>
    <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602a6cbcc9070806401af4ba_energy.svg" loading="lazy" alt="">
    <?php
      break;
      case 'Hidratación':?>
    <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602a6cbc400a92843265bf53_drop.svg" loading="lazy" alt="">
    <?php
      break;
      case 'Recuperación':?>
    <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602a6cbc08c4be7b9a087b27_more.svg" loading="lazy" alt="">
    <?php
      break;
      default:?>
    <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602a6cbc08c4be7b9a087b27_more.svg" loading="lazy" alt="">
    <?php
      }
      ?>
    <div>
      <h1 class="product_cont_h1 bottom_line"><?php echo $terms[0]->name; ?></h1>
      <div class="content_cont_h2_line white" style="background-color: #f47d30 !important;"></div>
    </div>
  </div>
  <div class="prod_cont_img">
    <?php 
      $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
      $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
      $image_title = get_the_title(get_post_thumbnail_id($post->ID));
      ?>   
    <img src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>" loading="lazy"
      class="prod_cont_img_img"
      />
    <!--<div class="prod_cont_gal">
      <a href="#" class="prod_cont_gal_el w-inline-block"
        ><img
        src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60233be1dcfdb723b62fa3de_red.png"
        loading="lazy"
        alt=""
        class="prod_cont_gal_el_img" /></a
        ><a href="#" class="prod_cont_gal_el w-inline-block"
        ><img
        src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60233bdfbc44266bf928c2b5_green.png"
        loading="lazy"
        alt=""
        class="prod_cont_gal_el_img" /></a
        ><a href="#" class="prod_cont_gal_el w-inline-block"
        ><img
        src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60233be3360bcaaab00f7620_orange.png"
        loading="lazy"
        alt=""
        class="prod_cont_gal_el_img" /></a
        ><a href="#" class="prod_cont_gal_el w-inline-block"
        ><img
        src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60233be33109a723a694ac6d_purple.png"
        loading="lazy"
        alt=""
        class="prod_cont_gal_el_img"
        /></a>
      </div>-->
  </div>
  <div class="product_tit">
    <h1 class="product_tit_h"><?php echo the_title(); ?></h1>
  </div>
  <div class="product_des">
    <p class="product_des_p">
      <?php echo the_content(); ?>
    </p>
    <?php $imgtabla = get_post_meta($post->ID, 'tabla_nutricional');?>
    <img src="<?php echo $imgtabla[0]; ?>" loading="lazy" class="slider_subcategories_el_img_img"/>
    <div class="prod_btns">
      <?php if(!empty(get_post_meta($post->ID, 'tabla_nutricional_completa', true))){
        ?>
      <div class="prod_tabla_btn">TABLA COMPLETA</div>
      <?php $imgtablacomp = get_post_meta($post->ID, 'tabla_nutricional_completa', true);?>
      <div id="tabla_completa">
        <?php echo $imgtablacomp; ?>
      </div>
      <?php }; ?>
      <!--<a href="<?php echo home_url('lista-tiendas?idProducto='.$post->ID); ?>" class="prod_buy_btn">COMPRAR</a>-->
     <div style="width: 75%;">
      
        <div class="prod_buy_btn">
        <a class="prod_buy_btn_bg" href="<?php echo home_url('lista-tiendas?idProducto='.$post->ID); ?>" class="">
          <!-- imagen carrito de compras-->
          <img class="cart_prod_class" src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602a689e534be64401672a41_cart.png">
          
        
        <div class="buy_text">COMPRAR</div> </a>
        </div>
    </div>
    <div class="content_cont_tit_h2 tit_relacionados">
      <h2 class="content_cont_h2 bottom_line relacionados">
        productos relacionados
      </h2>
      <div class="content_cont_h2_line rel_white"></div>
    </div>
    <!-- Swiper -->
    <div class="swiper-container swiper-container3">
      <div class="swiper-wrapper">
        <?php
          $args = array(
              'post_type' => 'productos',
              'post_status' => 'publish',
              'posts_per_page' => '10'
          );
          $result = new WP_Query($args);
          if ($result->have_posts()) :
              while ($result->have_posts()) : $result->the_post();
              
          ?>  
        <?php foreach(get_posts($args) as $p) : ?>
        <div class="swiper-slide">
          <div class="slider_products_el_img">
            <?php
              $image = wp_get_attachment_image_src(get_post_thumbnail_id($p->ID), 'full');
              $image_alt = get_post_meta(get_post_thumbnail_id($p->ID), '_wp_attachment_image_alt', true);
              $image_title = get_the_title(get_post_thumbnail_id($p->ID));
              ?>
            <!-- <img loading="lazy" src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>" /> -->
            <div style="width:170px;height:230px;margin:0 auto;background:url(<?php echo $image[0] ?>);background-position:center;background-size:contain;background-repeat:no-repeat;">
            </div>
            <h3 class="products_el_tit"><?php echo $p->post_title; ?></h3>
            <a href="<?php echo $p->guid; ?>" class="products_el_know">CONOCE MÁS</a>
            <a href="<?php echo home_url('lista-tiendas?idProducto='.$p->ID); ?>" class="products_el_shop">COMPRAR</a>            
          </div>
        </div>
        <?php endforeach; ?>
        <?php
          endwhile;
          endif;
          wp_reset_postdata();
          ?>
      </div>
      <div class="swiper-button-next swiper-button-next3"></div>
      <div class="swiper-button-prev swiper-button-prev3"></div>
    </div>
  </div>
</div>
<?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>
<script type="text/javascript">
  jQuery( document ).ready(function() {
     jQuery('.header_nav_close').css('display', 'flex');
     jQuery('.header_nav_close').attr('href', '<?php echo home_url('productos'); ?>');
  
     jQuery('.prod_tabla_btn').click(function() {
         jQuery('#tabla_completa').toggle(); 
     });
  });
</script>
<script src="<?php echo JSURL ?>swiper/swiper.js"></script>
<!-- Initialize Swiper -->
<script>
  var swiper3 = new Swiper('.swiper-container.swiper-container3', {
      effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    loop: true,
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 0,
      modifier: 1,
      slideShadows: false,
    }
  });
</script>
<?php
  }else{
  ?>
<style>
  .side_buttons_link.favorite {
  display: none;
  }
  table h3 {
  margin: 10px 0px;
  font-family: 'Gatorade black';
  color: black;
  }
  .products_el_tit{
  margin:0px;
  }
</style>
<link rel="stylesheet" href="<?php echo CSSURL ?>swiper/swiper.css">
<style>
  .swiper-container.swiper-container3 {
  width: calc(100% + 40px);
  padding-top: 20px;
  padding-bottom: 70px;
  margin-left: -20px;
  }
  .swiper-container.swiper-container3 .swiper-slide {
  background-position: center;
  background-size: cover;
  width: 170px;
  /* height: 220px; */
  }
  .swiper-slide{
  width: 33%;
  }
  .slider_products_el_img{
  display: inline-flex;
  }
  .swiper-wrapper{
  margin: auto;
  width: 80%;
  }
  :root {
  --swiper-theme-color: white;
  --swiper-navigation-size: 28px;
  }
  .swiper-container-3d .swiper-slide-shadow-left {
  background-image: linear-gradient(to left,rgb(0 0 0 / 2%),rgba(0,0,0,0));
  }
  .swiper-container-3d .swiper-slide-shadow-right {
  background-image: linear-gradient(to right,rgb(0 0 0 / 2%),rgba(0,0,0,0));
  }
  .tit_product {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  margin: 30px 0px;
  }
  .tit_product img {
  width: 30px;
  margin-right: 5px;
  }
  .tit_product h1 {
  margin-top: 0px;
  }
  .product_des p {
  text-align: left
  }
  @media screen and (max-width: 767px){}
  .products_el_tit {
  font-size: 19px;
  min-height: 64px;
  }
  .product_cont_h1 {
  font-family: 'Gatorade black', sans-serif;
  color: black;
  font-weight: 900;
  }
  .content_cont_h2 {
  font-family: 'Gatorade black', sans-serif;
  color: black;
  line-height: 34px;
  font-weight: 900;
  }
  .flexbox-container {
  display: -ms-flex;
  display: -webkit-flex;
  display: flex;
  }
  .flexbox-container > div {
  width: 50%;
  padding: 10px;
  }
  .flexbox-container > div:first-child {
  margin-right: 20px;
  }
  .product_tit_h {
  font-family: 'Gatorade black', sans-serif;
  color: black;
  font-size: 47px;
  line-height: 47px;
  font-weight: 900;
  text-align: left;
  text-transform: uppercase;
  margin-bottom: 10px;
  }
  p {
  color: black;
  font-family: 'Gatorade med';
  font-weight: 300;
  font-style: normal;
  font-size: 20px;
  margin: 30px -55px;
  line-height: 25px;
  }
  .prod_cont_img {
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  height: 550px;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  }
  .home_banner {
  text-align: center;
  }
  .content_cont_h2_line {
  width: 150px;
  height: 3px;
  border-radius: 6px;
  background-color: #f47d30;
  }
  .prod_tabla_btn {
  width: 80%;
  margin-right: auto;
  margin-bottom: 15px;
  margin-left: auto;
  padding: 8px;
  border-radius: 30px;
  background-color: #fff;
  font-family: 'Gatorade black', sans-serif;
  color: #000;
  font-size: 24px;
  line-height: 24px;
  font-weight: 900;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  }
  .prod_buy_btn {
      
    padding: 0px;
    margin: 0px;
 
  background-color: none;
  font-family: 'Gatorade black', sans-serif;
  color: #fff;
  font-size: 24px;
  line-height: 28px;
  font-weight: 900;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  }
  .prod_cont_gal {
  position: inherit;
  left: auto;
  top: 130px;
  right: 0%;
  bottom: 0%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  width: 200px;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  }
  .content_cont_h2.bottom_line.relacionados {
  text-align: left;
  }
  .content_cont_h2_line.rel_white {
  width: 60px;
  margin-left: 0px;
  background-color: #f47d30;
  }
  .prod_cont_img_img{
  margin-top: -50px;
  }
  .tit_product{
  margin-top: 0px;
  }
  .cart_prod_class{
      height: auto; 
      width: 30px; 
      padding-right: 6px;
  }
</style>
<div class="home">
  <?php get_template_part( 'template-parts/desktop/header' ); ?>
  <?php get_template_part( 'template-parts/desktop/banner' ); ?>
  <div class="flexbox-container">
    <div style="
      padding-left: 0px;">
      <div class="tit_product">
        <?php 
          $terms = wp_get_post_terms( $post->ID, 'categoriasProductos');
          ?>
        <?php
          switch ($terms[0]->name) {
              case 'Energía':?>
        <img src="<?php echo IMGURL ?>desktop/icono.png" loading="lazy" alt="">
        <?php
          break;
          case 'Hidratación':?>
        <img src="<?php echo IMGURL ?>desktop/icono2.png" loading="lazy" alt="">
        <?php
          break;
          case 'Recuperación':?>
        <img src="<?php echo IMGURL ?>desktop/icono3.png" loading="lazy" alt="">
        <?php
          break;
          case 'Equípate con Gatorade':?>
        <img src="<?php echo IMGURL ?>desktop/icono3.png" loading="lazy" alt="">
        <?php
          break;
          default:?>
        <img src="<?php echo IMGURL ?>desktop/icono3.png" loading="lazy" alt="">
        <?php
          }
          ?>
        <div>
          <h2 class="content_cont_h2 bottom_line relacionados" style="margin:0px;     line-height: 20px;
            ">
            <?php echo $terms[0]->name; ?>
          </h2>
          <div class="content_cont_h2_line white" style="background-color: #f47d30 !important;width: 100px;"></div>
        </div>
      </div>
      <div class="prod_cont_img">
        <?php 
          $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
          $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
          $image_title = get_the_title(get_post_thumbnail_id($post->ID));
          ?>   
        <img src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>" loading="lazy"
          class="prod_cont_img_img"
          />
        <!--
          <div class="prod_cont_gal">
              
          <a href="#" class="prod_cont_gal_el w-inline-block"
              ><img
              src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60233be1dcfdb723b62fa3de_red.png"
              loading="lazy"
              alt=""
              class="prod_cont_gal_el_img" /></a
          ><a href="#" class="prod_cont_gal_el w-inline-block"
              ><img
              src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60233bdfbc44266bf928c2b5_green.png"
              loading="lazy"
              alt=""
              class="prod_cont_gal_el_img" /></a
          ><a href="#" class="prod_cont_gal_el w-inline-block"
              ><img
              src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60233be3360bcaaab00f7620_orange.png"
              loading="lazy"
              alt=""
              class="prod_cont_gal_el_img" /></a
          ><a href="#" class="prod_cont_gal_el w-inline-block"
              ><img
              src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60233be33109a723a694ac6d_purple.png"
              loading="lazy"
              alt=""
              class="prod_cont_gal_el_img"
          /></a>
          </div>-->
      </div>
    </div>
    <div>
      <div class="product_tit">
        <h1 class="product_tit_h"><?php echo the_title(); ?></h1>
        <div class="content_cont_h2_line"></div>
      </div>
      <div class="product_des">
        <p class="product_des_p">
          <?php echo the_content(); ?>
        </p>
        <?php $imgtabla = get_post_meta($post->ID, 'tabla_nutricional');?>
        <img src="<?php echo $imgtabla[0]; ?>" loading="lazy" class="slider_subcategories_el_img_img"/>
        <div class="prod_btns">
          <?php if(!empty(get_post_meta($post->ID, 'tabla_nutricional_completa', true))){
            ?>
          <div class="prod_tabla_btn">TABLA COMPLETA</div>
          <?php $imgtablacomp = get_post_meta($post->ID, 'tabla_nutricional_completa', true);?>
          <div id="tabla_completa">
            <?php echo $imgtablacomp; ?>
          </div>
          <?php }; ?>  
          <a class="prod_buy_btn_bg" href="<?php echo home_url('lista-tiendas?idProducto='.$post->ID); ?>" class=""><div class="prod_buy_btn">
          <img class="cart_prod_class" src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602a689e534be64401672a41_cart.png">
          
          </div><div class="">COMPRAR</div> </a>
        </div>
      </div>
    </div>
  </div>
  <div class="content_cont_tit_h2 tit_relacionados">
    <h2 class="content_cont_h2 bottom_line relacionados">
      productos relacionados
    </h2>
    <div class="content_cont_h2_line rel_white"></div>
  </div>
  <!-- Swiper -->
  <div class="">
    <div class="swiper-wrapper">
      <?php
        $idCat= get_post_meta($post->ID,'_yoast_wpseo_primary_categoriasProductos',true);
          $args = array(
              'post_type' => 'productos',
              'post_status' => 'publish',
              'posts_per_page' => '3',
              'post__not_in' => array($post->ID),
        'tax_query' => array(
                  array(
                  'taxonomy'  => 'categoriasProductos',
                  'field'     => 'id',
                  'terms'     => $idCat
                  )
              )
          );
          $result = new WP_Query($args);
          if ($result->have_posts()) :
          ?>  
      <?php foreach(get_posts($args) as $p) : ?>
      <div class="swiper-slide">
        <div class="slider_products_el_img">
          <?php
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($p->ID), 'full');
            $image_alt = get_post_meta(get_post_thumbnail_id($p->ID), '_wp_attachment_image_alt', true);
            $image_title = get_the_title(get_post_thumbnail_id($p->ID));
            ?>
          <!-- <img loading="lazy" src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>" /> -->
          <div style="width:170px;height:230px;margin:0 auto;background:url(<?php echo $image[0] ?>);background-position:center;background-size:contain;background-repeat:no-repeat;">
          </div>
          <h3 class="products_el_tit"><?php echo $p->post_title; ?></h3>
          <a href="<?php echo $p->guid; ?>" class="products_el_know">CONOCE MÁS</a>
          <a href="<?php echo home_url('lista-tiendas?idProducto='.$p->ID); ?>" class="products_el_shop">COMPRAR</a>
        </div>
      </div>
      <?php endforeach; ?>
      <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>
    <div class="swiper-button-next swiper-button-next3"></div>
    <div class="swiper-button-prev swiper-button-prev3"></div>
  </div>
  <?php get_template_part( 'template-parts/desktop/footer' ); ?>
</div>
</div>
<script type="text/javascript">
  jQuery( document ).ready(function() {
     jQuery('.header_nav_close').css('display', 'flex');
     jQuery('.header_nav_close').attr('href', '<?php echo home_url('productos'); ?>');
  
     jQuery('.prod_tabla_btn').click(function() {
         jQuery('#tabla_completa').toggle(); 
     });
  });
</script>
<script src="<?php echo JSURL ?>swiper/swiper.js"></script>
<!-- Initialize Swiper -->
<script>
  var swiper3 = new Swiper('.swiper-container.swiper-container3', {
      centeredSlides: true,
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
    loop: true,
    slidesPerView: 3,
    spaceBetween: 30
  });
</script>
<?php
  }
  ?>
<?php
get_footer();
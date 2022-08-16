<?php
get_header(); 
global $current_user;
$idUser = $current_user->ID;

//reto favorito
$mensaje_favorito_contenido = get_option('mensaje_favorito_contenido');
$titulo_medalla_favorito_contenido = get_option('titulo_medalla_favorito_contenido');
$video_medalla_favorito_contenido = get_option('video_medalla_favorito_contenido');
$nombre_reto_favorito_contenido = 'favorito_contenido';
?>
<style>
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
</style>



<?php get_template_part( 'template-parts/retos/retos2' ); ?>



<?php
if(wp_is_mobile()){	
?>
<style>
i.mo-custom-share-icon {
background-color: white !important ;
color: #DE7800 !important;
}
.side_buttons_link.favorite {
display: flex;
}
.content_cont {
padding-top: 85px;
}
</style>
<div class="content_cont">
<div class="single_text">
  <input type="hidden" class="userId" value="<?php 
  if ($current_user->ID){
      echo $current_user->ID;
  }?>" >
  <input type="hidden" class="postId" value="<?php 
  if ($post->ID){
      echo $post->ID;
  }?>" >
</div>
<?php
  if (get_post_meta($post->ID, 'id_youtube', true)) {
  ?>
<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'id_youtube', true); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php } elseif(get_post_meta($post->ID, 'imagen_alterna', true)) { ?>
<img src="<?php echo get_post_meta($post->ID, 'imagen_alterna', true); ?>" style="width: 100%; height: auto;" alt="">
<?php } ?>
<h1><?php echo the_title(); ?></h1>
<?php echo the_content(); ?>    
<br>
<?php echo apply_shortcodes('[TheChamp-Sharing title="COMPARTIR"]') ?>
<br>
<br>
<?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>
<script>
jQuery( document ).ready(function() {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url('tarjetas'); ?>');
});
</script>
<?php } else{
?>
<style>
.mo-openid-app-icons.circle p{
margin-top: 0% !important;
color: #DE7800 !important
}
.i.mo-custom-share-icon{
background-color: #DE7800 !important;
color: white !important;
}
</style>
<div class="home">
<?php get_template_part( 'template-parts/desktop/header' ); ?>
<style>
  .res_taxonomy {
  padding: 3px;
  position: relative;
  width: 80%;
  height: 160px;
  top: 0;
  left: 0;
  display: block;
  background: black;
  margin: 0px 0px 6px;
  }
  .res_taxonomy img {
  opacity: 0.6;
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
  opacity: 0.6;
  cursor: pointer;
  }
  .home_header {
  margin-bottom: 22px;
  }
  p {
  color: black;
  font-family: 'Gatorade med';
  font-weight: 300;
  font-style: normal;
  font-size: 20px;
  margin: 30px 0px;
  line-height: 25px;
  }
  h1 {
  color: black;
  font-family: 'Gatorade black';
  font-weight: 900;
  font-style: normal;
  font-size: 20px;
  line-height: 25px;
  margin: 30px 0px;
  text-transform: uppercase;
  }
  .flexbox-container {
  display: -ms-flex;
  display: -webkit-flex;
  display: flex;
  margin-bottom:80px;
  }
  .flexbox-container > div:first-child {
  width: 65%;
  margin-right: 20px;
  padding: 10px;
  }
  .flexbox-container > div:last-child {
  width: 35%;
  margin-right: 20px;
  padding: 10px;
  }
  .desktop_content{
  width: 137%;
  }
  .content_rel{
  color: black;
  font-family: 'Gatorade black';
  font-weight: 900;
  font-style: normal;
  font-size: 20px;
  line-height: 25px;
  margin: 30px 0px;
  text-transform: uppercase;
  }
  .side_buttons_link.favorite {
  display: flex;
  width: 40px;
  height: 41px;
  margin-left: -2px;
  }
  .add_event_text{
  color: white;
  white-space: pre-line;
  font-family: 'Gatorade black', sans-serif;
  font-size: 13px;
  text-decoration: none;
  text-transform: uppercase;
  line-height: normal;
  padding-top: 7px;
  padding-left: 12px;
  padding-right: 8px;
  }
  .felicitaciones {
  font-family: 'Gatorade black', sans-serif;
  font-size: 30px;
  text-align: center;
  margin-top: 4px;
  margin-bottom: 8px;
  }
  .msgAlertCont .content_cont_h1_line {
  margin: 0 auto;    
  }
</style>
<?php
  if (get_post_meta($post->ID, 'id_youtube', true)) {
  ?>
<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'id_youtube', true); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php } elseif(get_post_meta($post->ID, 'imagen_alterna', true)) { ?>
<img src="<?php echo get_post_meta($post->ID, 'imagen_alterna', true); ?>" style="width: 100%; height: 350px;
  object-fit: cover;" alt="">
<?php } ?>
<div class="single_text">
  <input type="hidden" class="userId" value="<?php 
    if ($current_user->ID){
        echo $current_user->ID;
    }?>" >
  <input type="hidden" class="postId" value="<?php 
    if ($post->ID){
        echo $post->ID;
    }?>" >
  <div class="flexbox-container">
    <div>
      <h1><?php echo the_title(); ?></h1>
      <?php echo the_content(); ?>
      <div style="display: flex;
        justify-content: space-between;">
        <div style="background: black; display: -webkit-inline-box; padding-right: 18px; border-radius: 41px;">
          <a class="side_buttons_link favorite w-inline-block" onclick="agregarFav(<?php if ($post->ID){ echo $post->ID; }?>, <?php if ($current_user->ID){ echo $current_user->ID; }?>)">
          <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6026c3b6fb4589cf42b78ae1_favorite.svg" width="30" height="30" loading="lazy" data-w-id="19d67c4d-a60a-dadc-45ac-cc759b964ade" alt="" class="side_buttons_link_img" />
          </a>
          <pre class="add_event_text">Agrega este contenido<br>a tus favoritos</pre>
        </div>
        <?php echo apply_shortcodes('[TheChamp-Sharing title="COMPARTIR"]') ?>
        <br>
      </div>
    </div>
    <div>
      <?php
        $idCat= get_post_meta($post->ID,'_yoast_wpseo_primary_categoriasTarjetas',true);?>
      <h1 class="content_rel">CONTENIDO RELACIONADO</h1>
      <div class="desktop_content">
        <?php
        $categoriasTarjetas = wp_get_post_terms($post->ID, 'categoriasTarjetas');
        $categoriasAsc = [];
        foreach($categoriasTarjetas as $catAsc) {
            $categoriasAsc[] = $catAsc->term_id;
        }
        $meta_query[] = array(
            'key' => 'tipo_tarjeta',
            'value' => 'normal',
            'compare' => '=',
            'type' => 'char'
        );
          $args = array(
              'post_type' => 'tarjetas',
              'post_status' => 'publish',
              'posts_per_page' => 2,
              'post__not_in' => array($post->ID),
              'meta_query' => $meta_query,
              'tax_query' => array(
                  array(
                      'taxonomy'  => 'categoriasTarjetas',
                      'field'     => 'id',
                      'terms'     => $categoriasAsc
                  )
              )
          );
          $result = new WP_Query($args);
          if ($result->have_posts()) :
              while ($result->have_posts()) : $result->the_post();
          ?>
        <a href="<?php echo get_permalink($post->ID); ?>" class="res_taxonomy">
          <?php
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'lista-loop');
            $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
            $image_title = get_the_title(get_post_thumbnail_id($post->ID));
            ?>
          <img loading="lazy" src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>" />
          <div class="tit_subcategory">
            <h2 class="content_cont_h3 bottom_line pad topics_el_tit"><?php echo the_title(); ?></h2>
            <div class="content_cont_h3_line"></div>
          </div>
        </a>
        <?php
          endwhile;
          endif;
          wp_reset_postdata();
          ?>
      </div>
    </div>
  </div>
  <br>
  <br>
</div>
<?php get_template_part( 'template-parts/desktop/footer' ); ?>
</div>
<?php
}
?>
<script>
//Favoritos

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
            jQuery('.msgAlert .txtMsg').html('<h4 class="felicitaciones">FELICITACIONES</h4><div class="content_cont_h1_line"></div><br><?php echo $mensaje_favorito_contenido; ?><br><br><div class="list_retos_logrados_el"><div><video autoplay muted loop playsinline><source src="<?php echo $video_medalla_favorito_contenido; ?>" type="video/mp4"></video></div><h3><?php echo $titulo_medalla_favorito_contenido; ?></h3></div>');
        }
      }
    })
  }
}   
</script>
<?php
get_footer();
<?php

/**
 * Template Name: Profile
 *
 * @package WordPress
 */

get_header();


  global $current_user;
  wp_get_current_user();
  if (is_user_logged_in()) {
      $loginUser = "true";
      $idUser = $current_user->ID;
      $emailUser = $current_user->user_email;
      $nameUser = get_user_meta($idUser, 'user_nombre', true).' '. get_user_meta($idUser, 'user_apellido', true);
      $deportes_array = get_user_meta($idUser, 'array_deportes', true);
      $favoritos = get_user_meta($idUser, 'favorite_post_id', true);
      $favoritos_lista = explode(",", $favoritos);

      $inscripciones = get_user_meta($idUser, 'eventos', true);
      
		//reto editar deportes
		$mensaje_editar_deportes = get_option('mensaje_editar_deportes');
        $titulo_medalla_editar_deportes = get_option('titulo_medalla_editar_deportes');
        $video_medalla_editar_deportes = get_option('video_medalla_editar_deportes');
        $nombre_reto_editar_deportes = 'editar_deportes';
      
		//reto actualizar la imagen de perfil
		$mensaje_foto_perfil = get_option('mensaje_foto_perfil');
		$titulo_medalla_foto_perfil = get_option('titulo_medalla_foto_perfil');
		$video_medalla_foto_perfil = get_option('video_medalla_foto_perfil');
		$nombre_reto_foto_perfil = 'foto_perfil';
      
  } else {
      $loginUser = false;
      //echo("<script>location.href = '".home_url('ingreso')."'</script>");
  }
  

?>
<style>
.the_champ_horizontal_sharing .theChampEmailSvg, #the_champ_ss_rearrange .theChampEmailSvg {
    background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-4%20-4%2043%2043%22%3E%3Cpath%20d%3D%22M%205.5%2011%20h%2023%20v%201%20l%20-11%206%20l%20-11%20-6%20v%20-1%20m%200%202%20l%2011%206%20l%2011%20-6%20v%2011%20h%20-22%20v%20-11%22%20stroke-width%3D%221%22%20fill%3D%22%23FFFFFF%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center;
}
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
    font-size: 32px;
    line-height: 34px;
    margin-top: 0px;
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
</style>

<style>
.swiper-button-prev.swiper-button-prev-log {
    top: 21% !important;
}
.list_retos_logrados {
    margin: 10px 0px 0px !important;
    width: 100%;
}
.list_retos_logrados_el video {
    background-size: contain;
    object-fit: cover;
    z-index: 1;
    opacity: 0.8;
    border-radius: 13px;
    position: absolute;
    left: 0%;
    top: 0%;
    right: 0%;
    bottom: 0%;
    z-index: 2;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
    height: 100%;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    max-height: 80px;
}
.name_reto {
    color: white;
    font-family: 'Gatorade black', sans-serif;
    font-size: 15px;
    text-align: center;
    line-height: 18px;
    margin-top: 14px;
    text-transform: uppercase;
    margin-bottom: 0px;
}
.list_retos {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
}
.list_retos_el {
    width: 50%;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-direction: column;
    padding: 16px;
    cursor: pointer;
}
.list_retos_el_img {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    background-position: center center !important;
    display: flex;
    justify-content: center;
    align-items: center;
}
.list_retos_el_img img {
    width: 50%;
    height: auto;
}
.list_retos_logrados {
    margin: 30px 0px;
    width: 100%;

}
.list_retos_logrados_el {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 10px 20px;
    border-radius: 10px;
    width: 100%;
    height: 80px;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    background-position: center center !important;
    margin-bottom: 20px;
    border-radius: 15px;
    background: black;

}
.list_retos_logrados_el h3 {
    color: white;
    font-family: 'Gatorade black', sans-serif;
    font-size: 14px !important;
    line-height: 16px !important;
    text-align: left;
    margin: 0px;
    width: 50%;
    z-index: 3;
    text-transform: uppercase;
}
.list_retos_share {
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f47d30), to(#ff450a));
    background-image: linear-gradient(180deg, #f47d30, #ff450a);
    border-radius: 20px;
    padding: 3px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    right: -64px;
    bottom: -35px;
    width: 35px;
    height: 24px;
    z-index: 2;
}
.list_retos_share img {
    width: 48%;
}
#show_sports:hover {
    color: white;
    background: black;
}

.profile_cont_sports {
    flex-direction: column;
}

.img_favorites {
    position: absolute;
    right: 0;
    bottom: 0;
    top: 0;
    right: 0;
    width: 100% !important;
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
</style>
<style>
    .felicitaciones {
        font-family: 'Gatorade black', sans-serif;
        font-size: 40px;
        text-align: center;
        margin-top: 24px;
        margin-bottom: 8px;
    }
    .compartir_pop.the_champ_horizontal_sharing .theChampFacebookSvg, #the_champ_ss_rearrange .theChampFacebookSvg {
        background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-5%20-5%2042%2042%22%3E%3Cpath%20d%3D%22M17.78%2027.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99%202.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123%200-5.26%201.905-5.26%205.405v3.016h-3.53v4.09h3.53V27.5h4.223z%22%20fill%3D%22%23000000%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center;
    }
    .compartir_pop.the_champ_horizontal_sharing .theChampSharing {
        background-color: white;
        background: white;
        color: #FFFFFF !important;
        border: 1px solid #a2a2a2;
        width: 80px !important;
        height: 80px !important;
        padding: 8px;
    }
    .compartir_pop.the_champ_horizontal_sharing .theChampTwitterSvg, #the_champ_ss_rearrange .theChampTwitterSvg {
        background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-4%20-4%2039%2039%22%3E%0A%3Cpath%20d%3D%22M28%208.557a9.913%209.913%200%200%201-2.828.775%204.93%204.93%200%200%200%202.166-2.725%209.738%209.738%200%200%201-3.13%201.194%204.92%204.92%200%200%200-3.593-1.55%204.924%204.924%200%200%200-4.794%206.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942%204.942%200%200%200-.665%202.477c0%201.71.87%203.214%202.19%204.1a4.968%204.968%200%200%201-2.23-.616v.06c0%202.39%201.7%204.38%203.952%204.83-.414.115-.85.174-1.297.174-.318%200-.626-.03-.928-.086a4.935%204.935%200%200%200%204.6%203.42%209.893%209.893%200%200%201-6.114%202.107c-.398%200-.79-.023-1.175-.068a13.953%2013.953%200%200%200%207.55%202.213c9.056%200%2014.01-7.507%2014.01-14.013%200-.213-.005-.426-.015-.637.96-.695%201.795-1.56%202.455-2.55z%22%20fill%3D%22%23000000%22%3E%3C%2Fpath%3E%0A%3C%2Fsvg%3E) no-repeat center center;
    }
    .compartir_pop.the_champ_horizontal_sharing .theChampWhatsappSvg, #the_champ_ss_rearrange .theChampWhatsappSvg {
        background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-5%20-5%2040%2040%22%3E%3Cpath%20id%3D%22arc1%22%20stroke%3D%22%23000000%22%20stroke-width%3D%222%22%20fill%3D%22none%22%20d%3D%22M%2011.579798566743314%2024.396926207859085%20A%2010%2010%200%201%200%206.808479557110079%2020.73576436351046%22%3E%3C%2Fpath%3E%3Cpath%20d%3D%22M%207%2019%20l%20-1%206%20l%206%20-1%22%20stroke%3D%22%23000000%22%20stroke-width%3D%222%22%20fill%3D%22none%22%3E%3C%2Fpath%3E%3Cpath%20d%3D%22M%2010%2010%20q%20-1%208%208%2011%20c%205%20-1%200%20-6%20-1%20-3%20q%20-4%20-3%20-5%20-5%20c%204%20-2%20-1%20-5%20-1%20-4%22%20fill%3D%22%23000000%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center;
    }
    .compartir_pop.the_champ_horizontal_sharing .theChampEmailSvg, #the_champ_ss_rearrange .theChampEmailSvg {
        background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-4%20-4%2043%2043%22%3E%3Cpath%20d%3D%22M%205.5%2011%20h%2023%20v%201%20l%20-11%206%20l%20-11%20-6%20v%20-1%20m%200%202%20l%2011%206%20l%2011%20-6%20v%2011%20h%20-22%20v%20-11%22%20stroke-width%3D%221%22%20fill%3D%22%23000000%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center;
    }
    .compartir_pop.the_champ_horizontal_sharing li {
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 12px !important;
    }
    .compartir_pop ul.the_champ_sharing_ul {
        display: flex;
        flex-wrap: wrap;
    }
</style>
<link rel="stylesheet" href="<?php echo CSSURL ?>swiper/swiper.css">
<?php
if (wp_is_mobile()) {
?>
<style>
  a#show_sports {
    margin-bottom: 4px;
    width: 70%;
    padding: 2px 20px 0px;
    font-size: 17px;
  }

  .profile_cont_sport_a {
    margin-bottom: 4px;
    width: 70%;
    padding: 2px 20px 0px;
    font-size: 17px;
    --color-orange: #fff;
  }

  .res_taxonomy {
    padding: 3px;
    position: relative;
    width: 100%;
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

  .swiper-container .swiper-slide {
    background-position: center;
    background-size: cover;
    width: 90% !important;
    height: 160px;
  }

  .sports_cont {
    display: none;
    height: 86vh;
    position: fixed;
    z-index: 9;
    top: 11%;
    left: 5%;
    width: 90%;
    margin: 0 auto;
  }

  .sport_selected_el_txt {
    text-transform: uppercase;
  }

  .side_buttons_link.favorite {
    display: none;
  }

  .swiper-container.swiper-container2 {
    width: calc(100% + 40px);
    padding-top: 10px;
    padding-bottom: 10px;
    margin-left: -20px;
  }

  .swiper-container.swiper-container2 .swiper-slide {
    background-position: center;
    background-size: cover;
    width: 90%;
    height: 160px;
  }

  .swiper-container.swiper-container2 .swiper-slide {
    background-position: center;
    background-size: cover;
    width: 90%;
    height: 160px;
  }

  .swiper-button-next,
  .swiper-button-prev {
    color: white !important;
  }

  .sports_list {
    justify-content: center;
  }
</style>
<div class="content_cont bg_content">
  <!-- modal -->
  <div class="sports_cont">
    <a class="header_modal_close w-inline-block" style="top: -10px;right: -10px;">
      <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/601b1cda96beb1661085b4d5_close.svg"
        loading="lazy" alt="" class="header_nav_close_img" />
    </a>
    <div style="overflow-y: scroll;">
      <div class="content_cont_tit_sports center" style="margin: 0px;">
        <h1 class="content_cont_h1_sp center" style="margin: 0px;">
          SELECCIONA TUS<br> DEPORTES FAVORITOS
        </h1>
        <div class="content_cont_h1_line_sp"></div>
      </div>
      <p class="sports_p" style="margin:10px 0px;">Para tener contenidos personalizados</p>
      <div>
        <div class="sports_selected"></div>
        <div class="sports_list" style="margin-top: 0px;">
          <div class="sports_list_el">
            <div class="sports_list_el_img futbol" data-deporte="fútbol">
              <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60252a86d0f212dceb89d3d7_futbol.svg"
                loading="lazy" alt="" class="sports_list_el_img_img" />
            </div>
            <h3 class="sports_list_el_tit">FÚTBOL</h3>
          </div>
          <div class="sports_list_el">
            <div class="sports_list_el_img baloncesto" data-deporte="baloncesto">
              <img
                src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60252a86c957d4ca521ce8e0_baloncesto.svg"
                loading="lazy" alt="" class="sports_list_el_img_img" />
            </div>
            <h3 class="sports_list_el_tit">BALONCESTO</h3>
          </div>
          <div class="sports_list_el">
            <div class="sports_list_el_img running" data-deporte="running">
              <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602528d53caa6c07a5bb88d3_running.svg"
                loading="lazy" alt="" class="sports_list_el_img_img" />
            </div>
            <h3 class="sports_list_el_tit">RUNNING</h3>
          </div>
          <div class="sports_list_el">
            <div class="sports_list_el_img fitness" data-deporte="boxeo">
              <img src="<?php echo IMGURL ?>perfil/boxing.png" loading="lazy" alt="" class="sports_list_el_img_img" />
            </div>
            <h3 class="sports_list_el_tit">BOXEO</h3>
          </div>
          <div class="sports_list_el">
            <div class="sports_list_el_img fitness" data-deporte="fitness">
              <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602528d53caa6cdff4bb88d2_fitness.svg"
                loading="lazy" alt="" class="sports_list_el_img_img" />
            </div>
            <h3 class="sports_list_el_tit">FITNESS</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- modal -->
  <div class="profile_cont">
    <?php if (is_user_logged_in()) { ?>
    <div class="content_cont_tit_h1 center">
      <h1 class="content_cont_h1 center">PERFIL</h1>
      <div class="content_cont_h1_line"></div>
    </div>
    <?php
        $get_author_gravatar = get_avatar_url($idUser, array('size' => 450));
        $avatar_url = get_user_meta($idUser, 'avatar', true);
        ?>
    <div class="profile_cont_img" id="profile_cont_img"
      style="background-image: url(<?php if($avatar_url){ echo $avatar_url; } else { echo $get_author_gravatar; } ?>)">
      <div class="profile_cont_img_change">
        <form enctype="multipart/form-data">
          <label for="sortpicture" style="display:flex;justify-content:center;align-items:center;">
            <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60219da9edf47b3cb65691b7_camera.svg"
              loading="lazy" alt="" class="img_change" />
            <input type="file" name="sortpicture" id="sortpicture" name="upload" accept=".jpg, .jpeg|image/*"
              style="display:none;">
          </label>
        </form>
      </div>
    </div>
    <div class="content_cont_tit_h1 center">
      <h1 class="content_cont_h1 bottom_line"
        style="text-align: center;padding-right: 0px;font-size: 20px;padding: 0px 30px;">
        <?php if ($nameUser!=' ') {echo $nameUser;}else {echo $current_user->user_login; }?>
      </h1>
    </div>
    <div class="profile_cont_sports">
      <a id="show_sports" class="profile_cont_sport_a">MIS DEPORTES</a>
    </div>
    <div class="content_subcategories">
      <div class="content_cont_tit_h2">
        <h2 class="content_cont_h2 bottom_line">MIS FAVORITOS</h2>
        <div class="content_cont_h2_line"></div>
      </div>
      <?php if($favoritos) { ?>
      <!-- Swiper -->
      <div class="swiper-container swiper-container-fav">
        <div class="swiper-wrapper">
          <?php
                $fav_count = 0;
                $args = array(
                    'post_type' => array('tarjetas', 'eventos'),
                    'post_status' => 'publish',
                    'posts_per_page' => '30',
                    'post__in' => $favoritos_lista
                );
                $result = new WP_Query($args);
                if ($result->have_posts()) :
                    while ($result->have_posts()) : $result->the_post();
                    $fav_count++;
                ?>
          <div class="swiper-slide">
            <a href="<?php echo get_permalink($post->ID); ?>" class="res_taxonomy">
              <?php
                      $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'lista-loop');
                      $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                      $image_title = get_the_title(get_post_thumbnail_id($post->ID));
                  ?>
              <img loading="lazy" src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>"
                title="<?php echo $image_title ?>" />
              <div class="tit_subcategory">
                <h2 class="content_cont_h3 bottom_line pad topics_el_tit">
                  <?php echo the_title(); ?>
                </h2>
                <div class="content_cont_h3_line"></div>
              </div>
            </a>
          </div>
          <?php
                endwhile;
                endif;
                wp_reset_postdata();
                ?>
        </div>
        <?php if($fav_count > 3) { ?>
        <div class="swiper-button-next swiper-button-next-fav"></div>
        <div class="swiper-button-prev swiper-button-prev-fav"></div>
        <?php } ?>
      </div>
      <?php } ?>
    </div>

    <div class="content_subcategories">
      <div class="content_cont_tit_h2">
        <h2 class="content_cont_h2 bottom_line">MIS EVENTOS</h2>
        <div class="content_cont_h2_line"></div>
      </div>
      <!-- Swiper -->
      <div class="swiper-container swiper-container-eve">
        <div class="swiper-wrapper">
            <?php
                $eve_count = 0;
                $args = array(
                    'post_type' => 'eventos',
                    'post_status' => 'publish',
                    'posts_per_page' => '30',
                );
                $result_eve = new WP_Query($args);
                if ($result_eve->have_posts()) :
                    while ($result_eve->have_posts()) : $result_eve->the_post();
                        if($inscripciones) {
                            for($i = 0; $i < count($inscripciones); ++$i) {
                            $eve_count++;
                                if($inscripciones[$i]['post'] == $post->ID) {
            ?>
            <div class="swiper-slide">
                <a href="<?php echo get_permalink($post->ID); ?>" class="res_taxonomy">
                    <?php
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'lista-loop');
                        $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                        $image_title = get_the_title(get_post_thumbnail_id($post->ID));
                    ?>
                    <img loading="lazy" src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>"
                    title="<?php echo $image_title ?>" />
                    <div class="tit_subcategory">
                        <h2 class="content_cont_h3 bottom_line pad topics_el_tit">
                            <?php echo the_title(); ?>
                        </h2>
                        <div class="content_cont_h3_line"></div>
                    </div>
                </a>
            </div>
            <?php
                        }
                    }
                }                
            ?>
          <?php
                endwhile;
                endif;
                wp_reset_postdata();
                ?>
        </div>
        <?php if($eve_count > 3) { ?>
        <div class="swiper-button-next swiper-button-next-eve"></div>
        <div class="swiper-button-prev swiper-button-prev-eve"></div>
        <?php } ?>
      </div>
    </div>
    <?php } ?>
    
    <div class="content_subcategories">
        <div class="content_cont_tit_h2">
          <h2 class="content_cont_h2 bottom_line">MIS LOGROS</h2>
          <div class="content_cont_h2_line"></div>
        </div>
        <!-- Swiper -->
        <div class="swiper-container swiper-container-log" style="height:88px;">
            <div class="swiper-wrapper" style="height:88px;">
                <?php
                //Obtenemos el id, el nombre del usuario y el correo
                  $idUser = $current_user->ID;
                  $emailUser = $current_user->user_email;
                  $nameUser = get_user_meta($idUser, 'user_nombre', true);
                  //Consultamos los retos activos y que esten dentro de la fecha
                  $meta_query[] = array(
                      'key' => 'estado',
                      'value' => 'activo',
                      'compare' => '=',
                      'type' => 'char'
                  );
                
                  //Obtenemos los retos
                  $args = array(
                      'post_type' => 'retos',
                      'posts_per_page' => - 1,
                      'post_status' => 'publish',
                      'meta_query' => $meta_query
                  );
                
                  $lista_retos = get_posts($args);
                  $visible_campana = 'false';
                  $visible_rango1 = 'false';
                  $visible_rango2 = 'false';
                  $visible_rango3 = 'false';
                
                    //Si hay retos
                    if (count($lista_retos) > 0)
                    {
                      
                      //Recorremos los retos
                      foreach (get_posts($args) as $p):
                        $tipo_reto = get_post_meta($p->ID, 'tipo_retos', true);
                          
                        
                        if ($tipo_reto == 'contenido')
                        {
                            $retos_contenido_json = get_user_meta($idUser, 'retos_contenido_json', true);
                            $retos_contenido = json_decode($retos_contenido_json);
                            
                            $rango1 = get_post_meta($p->ID, 'rango1', true);
                            $rango1_puntos = get_post_meta($p->ID, 'rango1_puntos', true);
                            $rango1_titulo = get_post_meta($p->ID, 'rango1_titulo', true);
                            $rango1_mensaje_premio = get_post_meta($p->ID, 'rango1_mensaje_premio', true);
                            $rango1_video_premio = get_post_meta($p->ID, 'rango1_video_premio', true);
                            $rango1_imagen_correo = get_post_meta($p->ID, 'rango1_imagen_correo', true);
                        
                            $rango2 = get_post_meta($p->ID, 'rango2', true);
                            $rango2_puntos = get_post_meta($p->ID, 'rango2_puntos', true);
                            $rango2_titulo = get_post_meta($p->ID, 'rango2_titulo', true);
                            $rango2_mensaje_premio = get_post_meta($p->ID, 'rango2_mensaje_premio', true);
                            $rango2_video_premio = get_post_meta($p->ID, 'rango2_video_premio', true);
                            $rango2_imagen_correo = get_post_meta($p->ID, 'rango2_imagen_correo', true);
                        
                            $rango3 = get_post_meta($p->ID, 'rango3', true);
                            $rango3_puntos = get_post_meta($p->ID, 'rango3_puntos', true);
                            $rango3_titulo = get_post_meta($p->ID, 'rango3_titulo', true);
                            $rango3_mensaje_premio = get_post_meta($p->ID, 'rango3_mensaje_premio', true);
                            $rango3_video_premio = get_post_meta($p->ID, 'rango3_video_premio', true);
                            $rango3_imagen_correo = get_post_meta($p->ID, 'rango3_imagen_correo', true);
                            
                            
                            //Si hay retos en curso
                            if(count((array)$retos_contenido) > 0)
                            {
                                foreach($retos_contenido as $ret_cont) {
                                    if ($ret_cont->idReto == $p->ID) {
                                        //Si el reto ya fue cumplido
                                    $visible_rango1 = ($ret_cont->tipo == 'contenido' && $ret_cont->rangos->estado1 == 'completado' && $ret_cont->rangos->popup1 == 'true' && $ret_cont->rangos->email1 == 'true') ? 'true' : 'false';
                                    $visible_rango2 = ($ret_cont->tipo == 'contenido' && $ret_cont->rangos->estado2 == 'completado' && $ret_cont->rangos->popup2 == 'true' && $ret_cont->rangos->email2 == 'true') ? 'true' : 'false';
                                    $visible_rango3 = ($ret_cont->tipo == 'contenido' && $ret_cont->rangos->estado3 == 'completado' && $ret_cont->rangos->popup3 == 'true' && $ret_cont->rangos->email3 == 'true') ? 'true' : 'false';
                                    }
                                }
                            }
                            
                            
                            if($rango1 != '')
                            {
                            ?>
                                <div class="swiper-slide" style="height:88px;">
                                    <div class="list_retos_logrados_el">
                                        <div>
                                            <?php
                                                if ($rango1_video_premio)
                                                {
                                            ?>
                                                <video <?php echo ($visible_rango1 == 'true') ? 'muted autoplay playsinline loop':'style="filter: brightness(0.4)"' ?>>
                                                <source src="<?php echo $rango1_video_premio; ?>" type="video/mp4">
                                                </video>
                                            <?php 
                                                }
                                            ?>
                                        </div>
                                        <h3 style="width:57%;"><?php echo $rango1_titulo; ?></h3>  
                                        <a class="list_retos_share" <?php echo ($visible_rango1 == 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                            <img src="<?php echo IMGURL ?>share.svg" alt="">
                                        </a>
                                    </div>
                                </div>
                            <?php    
                            }
                            
                            if($rango2 != '')
                            {
                            ?>
                                <div class="swiper-slide" style="height:88px;">
                                    <div class="list_retos_logrados_el">
                                        <div>
                                            <?php
                                                if ($rango2_video_premio)
                                                {
                                            ?>
                                                <video <?php echo ($visible_rango2 == 'true') ? 'muted autoplay playsinline loop':'style="filter: brightness(0.4)"' ?>>
                                                <source src="<?php echo $rango2_video_premio; ?>" type="video/mp4">
                                                </video>
                                            <?php 
                                                }
                                            ?>
                                        </div>
                                        <h3 style="width:57%;"><?php echo $rango2_titulo; ?></h3>  
                                        <a class="list_retos_share" <?php echo ($visible_rango2 == 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                            <img src="<?php echo IMGURL ?>share.svg" alt="">
                                        </a>
                                    </div>
                                </div>
                            <?php    
                            }
                            
                            if($rango3 != '')
                            {
                            ?>
                                <div class="swiper-slide" style="height:88px;">
                                    <div class="list_retos_logrados_el">
                                        <div>
                                            <?php
                                                if ($rango3_video_premio)
                                                {
                                            ?>
                                                <video <?php echo ($visible_rango3 = 'true') ? 'muted autoplay playsinline loop':'style="filter: brightness(0.4)"' ?>>
                                                <source src="<?php echo $rango3_video_premio; ?>" type="video/mp4">
                                                </video>
                                            <?php 
                                                }
                                            ?>
                                        </div>
                                        <h3 style="width:57%;"><?php echo $rango3_titulo; ?></h3>  
                                        <a class="list_retos_share" <?php echo ($visible_rango3 = 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                            <img src="<?php echo IMGURL ?>share.svg" alt="">
                                        </a>
                                    </div>
                                </div>
                            <?php    
                            }
                        }
                    
                    
                        if ($tipo_reto == 'campana')
                        {
                            $retos_campana_json = get_user_meta($idUser, 'retos_campana_json', true);
                            $retos_campana = json_decode($retos_campana_json);
                            
                            $video = get_post_meta($p->ID, 'video_premio', true);
                            
                            $dtz = new DateTimeZone("America/Bogota");
                    		$dt = new DateTime("now", $dtz);
                    		$actual = $dt->format("Y-m-d");
                    		$inicio = get_post_meta($p->ID, 'fecha_inicio', true);
                    		$fin = get_post_meta($p->ID, 'fecha_fin', true);
                    		$actual = date('Y-m-d');
                    		
                    		$iniciof = strtotime($inicio);
                    		$finf = strtotime($fin);
                    		$actualf = strtotime($actual);
                    		  
                    		// Compare the timestamp date 
                    		if (($actualf >= $iniciof) && ($actualf <= $finf)){
                                //Si hay retos en curso
                                if(count((array)$retos_campana) > 0)
                                {
                                    foreach($retos_campana as $ret_camp) {
                                        if ($ret_camp->idReto == $p->ID) {
                                            //Si el reto ya fue cumplido
                                            $visible_campana = ($ret_camp->tipo == 'campana' && $ret_camp->popup == 'true') ? 'true' : 'false';
                                        }
                                    }
                                }
                            ?>
                            <div class="swiper-slide" style="height:88px;">
                                <div class="list_retos_logrados_el">
                                    <div>
                                        <?php
                                        if ($video) {
                                        ?>
                                            <video <?php echo ($visible_campana == 'true') ? 'muted autoplay playsinline loop':'style="filter: brightness(0.4)"' ?> >
                                                <source src="<?php echo $video; ?>" type="video/mp4">
                                            </video>
                                        <?php 
                                        }
                                        ?>
                                    </div>
                                    <h3 style="width:57%;"><?php echo get_the_title($p->ID); ?></h3>  
                                    <a class="list_retos_share" <?php echo ($visible_campana == 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                        <img src="<?php echo IMGURL ?>share.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <?php
                    		}
                        }
                      endforeach;
                    }
                    
                    
                
                    $retos2 = ['foto_perfil', 'favorito_contenido', 'conocer_producto', 'editar_deportes', 'inscripcion_evento', 'llenar_encuesta', 'registrarse'];
                    for($i = 0; $i < count($retos2); ++$i){
                    
                        $mensaje = get_option('mensaje_'.$retos2[$i]);
                        $titulo_medalla = get_option('titulo_medalla_'.$retos2[$i]);
                        $video_medalla = get_option('video_medalla_'.$retos2[$i]);
                        $imagen_correo = get_option('imagen_correo_'.$retos2[$i]);
                        $puntos = get_option('puntos_'.$retos2[$i]);
                        $nombre_reto = $retos2[$i];
                        ?>
                        <div class="swiper-slide" style="height:88px;">
                            <div class="list_retos_logrados_el">
                                <div>
                                    <video <?php echo (get_user_meta($idUser, $nombre_reto, true) == '1') ? 'muted autoplay playsinline loop':'style="filter: brightness(0.4)"' ?>>
                                    <source src="<?php echo $video_medalla; ?>" type="video/mp4">
                                    </video>
                                </div>
                                <h3 style="width:57%;"><?php echo $titulo_medalla; ?></h3>  
                                <a class="list_retos_share" <?php echo (get_user_meta($idUser, $nombre_reto, true) == '1') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                    <img src="<?php echo IMGURL ?>share.svg" alt="">
                                </a>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
          
          <div class="swiper-button-next swiper-button-next-log" style="top:17px!important;"></div>
          <div class="swiper-button-prev swiper-button-prev-log"></div>
          
        </div>
      </div>
    <div class="profile_cont_sports" style="margin-top:36px;">
      <a id="logout" class="profile_cont_sport_a" style="color:black!important;background: white !important;">CERRAR SESIÓN</a>
    </div>
    <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
  </div>
</div>
<?php
}else{
?>
<!-- modal 
  <div style="
overflow-y: scroll;">
    -->
<div class="modal_sport">
  <div class="sports_cont">
    <a class="header_modal_close w-inline-block" style="
    top: -10px;
    right: -10px;">
      <img src="<?php echo IMGURL ?>close_desktop.svg" loading="lazy" alt="" class="header_nav_close_img" />
    </a>
    <div class="sports_container">
      <div class="content_cont_tit_sports center">
        <h1 class="content_cont_h1_sp center">
          SELECCIONA TUS <br> DEPORTES FAVORITOS
        </h1>
        <div class="content_cont_h1_line_sp"></div>
      </div>
      <p class="sports_p">Para tener contenidos personalizados</p>
      <div class="sports_selected" style="width:78%">
      </div>
      <div class="sports_list">
        <div class="sports_list_el">
          <div class="sports_list_el_img futbol" data-deporte="fútbol">
            <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60252a86d0f212dceb89d3d7_futbol.svg"
              loading="lazy" alt="" class="sports_list_el_img_img" />
          </div>
          <h3 class="sports_list_el_tit">FÚTBOL</h3>
        </div>
        <div class="sports_list_el">
          <div class="sports_list_el_img baloncesto" data-deporte="baloncesto">
            <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60252a86c957d4ca521ce8e0_baloncesto.svg"
              loading="lazy" alt="" class="sports_list_el_img_img" />
          </div>
          <h3 class="sports_list_el_tit">BALONCESTO</h3>
        </div>
        <div class="sports_list_el">
          <div class="sports_list_el_img running" data-deporte="running">
            <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602528d53caa6c07a5bb88d3_running.svg"
              loading="lazy" alt="" class="sports_list_el_img_img" />
          </div>
          <h3 class="sports_list_el_tit">RUNNING</h3>
        </div>
        <div class="sports_list_el">
          <div class="sports_list_el_img fitness" data-deporte="boxeo">
            <img src="<?php echo IMGURL ?>perfil/boxing.png" loading="lazy" alt="" class="sports_list_el_img_img" />
          </div>
          <h3 class="sports_list_el_tit">BOXEO</h3>
        </div>
        <div class="sports_list_el">
          <div class="sports_list_el_img fitness" data-deporte="fitness">
            <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602528d53caa6cdff4bb88d2_fitness.svg"
              loading="lazy" alt="" class="sports_list_el_img_img" />
          </div>
          <h3 class="sports_list_el_tit">FITNESS</h3>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- modal -->
<div class="home">
  <?php get_template_part( 'template-parts/desktop/header' ); ?>
  <style>
    a#show_sports {
      margin-bottom: 4px;
      width: 70%;
      padding: 10px 20px 10px;
      font-size: 17px;
    }

    .profile_cont_sport_a {
      margin-bottom: 4px;
      width: 70%;
      padding: 10px 20px 10px;
      font-size: 17px;
    }

    h2.content_cont_h2.bottom_line {
      font-size: 31px !important;
    }

    .profile_cont_sports {
      width: 100%;
    }

    .res_taxonomy {
      padding: 3px;
      position: relative;
      width: 100%;
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

    .modal_sport {
      background: #000000a6;
      width: 100%;
      height: 100%;
      position: fixed;
      top: 0%;
      left: 0%;
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9;
    }

    .sports_cont {
      display: none;
      height: 80vh;
      width: 400px;
      margin: 0 auto;
      background-color: white !important;
      max-height: 80%;
    }

    .sports_container {
      overflow-y: auto;
      height: -webkit-fill-available;
    }

    .sports_container::-webkit-scrollbar {
      width: 1px;
    }

    .sports_cont h1 {
      color: black;
      font-size: 23px !important;
      line-height: 25px !important;
      margin-top: 0px !important;
    }

    p.sports_p {
      color: black !important;
      font-size: 15px !important;
      margin-top: 12px !important;
    }

    .sport_selected_el_txt {
      background-color: #d8d8d8;
    }

    .sports_list_el_img {
      background-color: #d8d8d8;
    }

    .sports_list_el_img {
      width: 100px;
      height: 100px;
    }

    .sports_list {
      width: 74%;
      margin: 0 auto;
    }

    h3.sports_list_el_tit {
      color: black;
      margin-top: 10px;
      margin-bottom: 0px;
    }

    .sport_selected_el_txt {
      text-transform: uppercase;
    }

    .side_buttons_link.favorite {
      display: none;
    }

    .profile_cont_img {
      position: relative;
      display: block;
      width: 280px;
      height: 280px;
      margin-right: auto;
      margin-top: 30px;
      margin-left: 0px;
      -webkit-box-pack: end;
      -webkit-justify-content: flex-end;
      -ms-flex-pack: end;
      justify-content: flex-end;
      -webkit-box-align: end;
      -webkit-align-items: flex-end;
      -ms-flex-align: end;
      align-items: flex-end;
      border-radius: 50%;
      background-image: url(https://uploads-ssl.webflow.com/6005e02…/60219cc…_user.png);
      background-position: 50% 50%;
      background-size: cover;
      background-repeat: no-repeat;
    }

    .contact_cont_desk {
      padding-top: 0px;
    }

    .content_cont_h1 {
      font-family: 'Gatorade black', sans-serif;
      color: black;
      font-weight: 900;
    }

    .form_block.form_contact {
      width: 40%;
    }

    .contact_submit {
      width: 69%;
      margin-top: 20px;
      margin-right: auto;
      margin-left: auto;
      padding-top: 14px;
      padding-bottom: 14px;
      border-radius: 30px;
      background-color: #f47d30;
      font-family: 'Gatorade black', sans-serif;
      color: #fff;
      font-size: 25px;
      line-height: 19px;
      font-weight: 900;
      text-align: center;
      text-transform: uppercase;
    }

    .cont_profile {
      margin-right: 730px;
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
      -webkit-justify-content: space-between;
    }

    .flexbox-container>div:last-child {
      width: 60%;
    }

    .flexbox-container>div:first-child {
      width: 40%;
      max-width: 300px;
      margin-right: 65px;
      text-align: center;
      padding: 10px;
    }

    h2.content_cont_h2.bottom_line {
      font-size: 28px;
    }

    h3.content_cont_h3.bottom_line {
      font-size: 24px;
      font-family: 'Gatorade black', sans-serif;
      color: black;
      line-height: 34px;
      text-align: left;
    }

    .profile_cont_sport_a {
      padding: 10px 20px 10px;
      border-radius: 30px;
      background-color: #f47d30;
      font-family: 'Gatorade black', sans-serif;
      color: #fff;
      font-size: 16px;
      line-height: 15px;
      font-weight: 900;
      text-align: center;
      text-decoration: none;
      text-transform: uppercase;
      margin-bottom: 80px;
      margin-top: 6px;
    }

    .profile_cont_sports {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: inline-flex;
      margin-right: auto;
      -webkit-box-pack: center;
      -webkit-justify-content: center;
      -ms-flex-pack: center;
      justify-content: center;
      -webkit-box-align: center;
      -webkit-align-items: center;
      -ms-flex-align: center;
      align-items: center;
    }

    .content_cont_h1.bottom_line {
      margin-bottom: 0px;
      margin-left: 150%;
      text-transform: uppercase;
    }

    .cont_profile_centered {
      margin-bottom: 0px;
      font-size: 38px;
      text-align: center;
      font-family: 'Gatorade black', sans-serif;
      color: black;
      font-weight: 900;
    }

    .swiper-container {
      margin-left: auto;
      margin-right: auto;
      position: relative;
      overflow: hidden;
      list-style: none;
      padding: 0;
      z-index: 1;
      height: 167px;
    }

    .swiper-container.swiper-container2 {
      width: 100%;
      padding-top: 10px;
      padding-bottom: 10px;
      /* margin-left: -20px; */
    }

    .swiper-container.swiper-container2 .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 50%;
      height: 150px;
    }

    .swiper-container.swiper-container2 .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 50%;
      height: 150px;
    }

    .swiper-button-next,
    .swiper-button-prev {
      color: white !important;
    }

    h2.content_cont_h3.bottom_line.pad {
      font-size: 20px;
      line-height: 22px;
    }

    .img_favorites {
      width: 70%;
    }
  </style>
  <div class="flexbox-container">
    <div>
      <div>
        <?php if (is_user_logged_in()) { ?>
        <div>
          <h2 class=" content_cont_h2 bottom_line">PERFIL</h2>
          <div class="content_cont_h1_line"></div>
        </div>
        <?php
        $get_author_gravatar = get_avatar_url($idUser, array('size' => 450));
        $avatar_url = get_user_meta($idUser, 'avatar', true);
        ?>
        <div class="profile_cont_img" id="profile_cont_img"
          style="background-image: url(<?php if($avatar_url){ echo $avatar_url; } else { echo $get_author_gravatar; } ?>)">
          <div class="profile_cont_img_change">
            <form enctype="multipart/form-data">
              <label for="sortpicture" style="display:flex;justify-content:center;align-items:center;cursor:pointer;">
                <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60219da9edf47b3cb65691b7_camera.svg"
                  loading="lazy" alt="" class="img_change" />
                <input type="file" name="sortpicture" id="sortpicture" name="upload" accept=".jpg, .jpeg|image/*"
                  style="display:none;">
              </label>
            </form>
          </div>
        </div>
        <div>
          <h1 class="cont_profile_centered bottom_line" style="font-size: 20px; line-height: 20px;">
            <?php if ($nameUser!=' ') {echo $nameUser;}else {echo $current_user->user_login; }?>
          </h1>
        </div>
        <div class="profile_cont_sports">
          <a id="show_sports" class="profile_cont_sport_a">MIS DEPORTES</a>
          <a id="logout" class="profile_cont_sport_a" style="background: black !important;">CERRAR SESIÓN</a>
        </div>
      </div>
    </div>


    <div>
      <div class="content_subcategories">
        <div class="content_cont_tit_h2">
          <h3 class="content_cont_h3 bottom_line" style="padding-top:20px;">MIS FAVORITOS</h3>
          <div class="content_cont_h2_line"></div>
        </div>
        <?php if($favoritos) { ?>
        <!-- Swiper -->
        <div class="swiper-container swiper-container-fav">
          <div class="swiper-wrapper">
            <?php
                $fav_count = 0;
                $args = array(
                    'post_type' => array('tarjetas', 'eventos'),
                    'post_status' => 'publish',
                    'posts_per_page' => '30',
                    'post__in' => $favoritos_lista
                );
                $result_fav = new WP_Query($args);
                if ($result_fav->have_posts()) :
                    while ($result_fav->have_posts()) : $result_fav->the_post();
                    $fav_count++;
                ?>

            <div class="swiper-slide">
              <a href="<?php echo get_permalink($post->ID); ?>" class="res_taxonomy">
                <?php
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'lista-loop');
                        $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                        $image_title = get_the_title(get_post_thumbnail_id($post->ID));
                    ?>
                <img loading="lazy" src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>"
                  title="<?php echo $image_title ?>" />
                <div class="tit_subcategory">
                  <h2 class="content_cont_h3 bottom_line pad topics_el_tit">
                    <?php echo the_title(); ?>
                  </h2>
                  <div class="content_cont_h3_line"></div>
                </div>
              </a>
            </div>
            <?php
                endwhile;
                endif;
                
                wp_reset_postdata();

                ?>
          </div>
          <?php if($fav_count > 3) { ?>
          <div class="swiper-button-next swiper-button-next-fav"></div>
          <div class="swiper-button-prev swiper-button-prev-fav"></div>
          <?php } ?>
        </div>
        <?php } ?>
      </div>
      <div class="content_subcategories" style="margin-top:0px;">
        <div class="content_cont_tit_h2">
          <h3 class="content_cont_h3 bottom_line" style="margin-top:0px;">MIS EVENTOS</h3>
          <div class="content_cont_h2_line"></div>
        </div>
        <!-- Swiper -->
        <div class="swiper-container swiper-container-eve">
          <div class="swiper-wrapper">
            <?php
                $eve_count = 0;
                $args = array(
                    'post_type' => 'eventos',
                    'post_status' => 'publish',
                    'posts_per_page' => '30',
                );
                $result_eve = new WP_Query($args);
                if ($result_eve->have_posts()) :
                    while ($result_eve->have_posts()) : $result_eve->the_post();
                        if($inscripciones) {
                            for($i = 0; $i < count($inscripciones); ++$i) {
                            $eve_count++;
                                if($inscripciones[$i]['post'] == $post->ID) {
            ?>
                                <div class="swiper-slide">
                                    <a href="<?php echo get_permalink($post->ID); ?>" class="res_taxonomy">
                                        <?php
                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'lista-loop');
                                            $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                                            $image_title = get_the_title(get_post_thumbnail_id($post->ID));
                                        ?>
                                        <img loading="lazy" src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>"
                                        title="<?php echo $image_title ?>" />
                                        <div class="tit_subcategory">
                                        <h2 class="content_cont_h3 bottom_line pad topics_el_tit">
                                            <?php echo the_title(); ?>
                                        </h2>
                                        <div class="content_cont_h3_line"></div>
                                        </div>
                                    </a>
                                </div>
            <?php
                                }
                            }
                        }                
                ?>
            <?php
                endwhile;
                endif;
                wp_reset_postdata();
            ?>
          </div>
          <?php if($eve_count > 3) { ?>
          <div class="swiper-button-next swiper-button-next-eve"></div>
          <div class="swiper-button-prev swiper-button-prev-eve"></div>
          <?php } ?>
        </div>
      </div>
      
      <div class="content_subcategories" style="margin-top:0px;">
        <div class="content_cont_tit_h2">
          <h3 class="content_cont_h3 bottom_line" style="margin-top:0px;">MIS LOGROS</h3>
          <div class="content_cont_h2_line"></div>
        </div>
        <!-- Swiper -->
        <div class="swiper-container swiper-container-log" style="height:88px;">
          <div class="swiper-wrapper" style="height:88px;">
                <?php
                //Obtenemos el id, el nombre del usuario y el correo
                  $idUser = $current_user->ID;
                  $emailUser = $current_user->user_email;
                  $nameUser = get_user_meta($idUser, 'user_nombre', true);
                  //Consultamos los retos activos y que esten dentro de la fecha
                  $meta_query[] = array(
                      'key' => 'estado',
                      'value' => 'activo',
                      'compare' => '=',
                      'type' => 'char'
                  );
                
                  //Obtenemos los retos
                  $args = array(
                      'post_type' => 'retos',
                      'posts_per_page' => - 1,
                      'post_status' => 'publish',
                      'meta_query' => $meta_query
                  );
                
                  $lista_retos = get_posts($args);
                  $visible_campana = 'false';
                  $visible_rango1 = 'false';
                  $visible_rango2 = 'false';
                  $visible_rango3 = 'false';
                  
                
                  //Si hay retos
                  if (count($lista_retos) > 0)
                  {
                      //Recorremos los retos
                      foreach (get_posts($args) as $p):
                        $tipo_reto = get_post_meta($p->ID, 'tipo_retos', true);
                          
                        
                        if ($tipo_reto == 'contenido')
                        {
                            $retos_contenido_json = get_user_meta($idUser, 'retos_contenido_json', true);
                            $retos_contenido = json_decode($retos_contenido_json);
                            
                            $rango1 = get_post_meta($p->ID, 'rango1', true);
                            $rango1_puntos = get_post_meta($p->ID, 'rango1_puntos', true);
                            $rango1_titulo = get_post_meta($p->ID, 'rango1_titulo', true);
                            $rango1_mensaje_premio = get_post_meta($p->ID, 'rango1_mensaje_premio', true);
                            $rango1_video_premio = get_post_meta($p->ID, 'rango1_video_premio', true);
                            $rango1_imagen_correo = get_post_meta($p->ID, 'rango1_imagen_correo', true);
                        
                            $rango2 = get_post_meta($p->ID, 'rango2', true);
                            $rango2_puntos = get_post_meta($p->ID, 'rango2_puntos', true);
                            $rango2_titulo = get_post_meta($p->ID, 'rango2_titulo', true);
                            $rango2_mensaje_premio = get_post_meta($p->ID, 'rango2_mensaje_premio', true);
                            $rango2_video_premio = get_post_meta($p->ID, 'rango2_video_premio', true);
                            $rango2_imagen_correo = get_post_meta($p->ID, 'rango2_imagen_correo', true);
                        
                            $rango3 = get_post_meta($p->ID, 'rango3', true);
                            $rango3_puntos = get_post_meta($p->ID, 'rango3_puntos', true);
                            $rango3_titulo = get_post_meta($p->ID, 'rango3_titulo', true);
                            $rango3_mensaje_premio = get_post_meta($p->ID, 'rango3_mensaje_premio', true);
                            $rango3_video_premio = get_post_meta($p->ID, 'rango3_video_premio', true);
                            $rango3_imagen_correo = get_post_meta($p->ID, 'rango3_imagen_correo', true);
                            
                            //Si hay retos en curso
                            if(count((array)$retos_contenido) > 0)
                            {
                                foreach($retos_contenido as $ret_cont) {
                                    if ($ret_cont->idReto == $p->ID) {
                                        //Si el reto ya fue cumplido
                                        $visible_rango1 = ($ret_cont->tipo == 'contenido' && $ret_cont->rangos->estado1 == 'completado' && $ret_cont->rangos->popup1 == 'true' && $ret_cont->rangos->email1 == 'true') ? 'true' : 'false';
                                        $visible_rango2 = ($ret_cont->tipo == 'contenido' && $ret_cont->rangos->estado2 == 'completado' && $ret_cont->rangos->popup2 == 'true' && $ret_cont->rangos->email2 == 'true') ? 'true' : 'false';
                                        $visible_rango3 = ($ret_cont->tipo == 'contenido' && $ret_cont->rangos->estado3 == 'completado' && $ret_cont->rangos->popup3 == 'true' && $ret_cont->rangos->email3 == 'true') ? 'true' : 'false';
                                    }
                                }
                            }
                            
                            
                            if($rango1 != '')
                            {
                            ?>
                                <div class="swiper-slide" style="height:88px;">
                                    <div class="list_retos_logrados_el">
                                    <div>
                                        <?php
                                            if ($rango1_video_premio)
                                            {
                                        ?>
                                            <video <?php echo ($visible_rango1 == 'true') ? 'muted autoplay playsinline loop':'style="filter: brightness(0.4)"' ?>>
                                            <source src="<?php echo $rango1_video_premio; ?>" type="video/mp4">
                                            </video>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                    <h3><?php echo $rango1_titulo; ?></h3>  
                                    <a class="list_retos_share" <?php echo ($visible_rango1 == 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                        <img src="<?php echo IMGURL ?>share.svg" alt="">
                                    </a>
                                </div>
                                </div>
                            <?php    
                            }
                            
                            if($rango2 != '')
                            {
                            ?>
                                <div class="swiper-slide" style="height:88px;">
                                    <div class="list_retos_logrados_el">
                                    <div>
                                        <?php
                                            if ($rango2_video_premio)
                                            {
                                        ?>
                                            <video <?php echo ($visible_rango2 == 'true') ? 'muted autoplay playsinline loop':'style="filter: brightness(0.4)"' ?>>
                                            <source src="<?php echo $rango2_video_premio; ?>" type="video/mp4">
                                            </video>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                    <h3><?php echo $rango2_titulo; ?></h3>  
                                    <a class="list_retos_share" <?php echo ($visible_rango2 == 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                        <img src="<?php echo IMGURL ?>share.svg" alt="">
                                    </a>
                                </div>
                                </div>
                            <?php    
                            }
                            
                            if($rango3 != '')
                            {
                            ?>
                                <div class="swiper-slide" style="height:88px;">
                                    <div class="list_retos_logrados_el">
                                    <div>
                                        <?php
                                            if ($rango3_video_premio)
                                            {
                                        ?>
                                            <video <?php echo ($visible_rango3 = 'true') ? 'muted autoplay playsinline loop':'style="filter: brightness(0.4)"' ?>>
                                            <source src="<?php echo $rango3_video_premio; ?>" type="video/mp4">
                                            </video>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                    <h3><?php echo $rango3_titulo; ?></h3>  
                                    <a class="list_retos_share" <?php echo ($visible_rango3 = 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                        <img src="<?php echo IMGURL ?>share.svg" alt="">
                                    </a>
                                </div>
                                </div>
                            <?php    
                            }
                        }


                        if ($tipo_reto == 'campana')
                        {
                            $retos_campana_json = get_user_meta($idUser, 'retos_campana_json', true);
                            $retos_campana = json_decode($retos_campana_json);
                            
                            $video = get_post_meta($p->ID, 'video_premio', true);
                            
                            $dtz = new DateTimeZone("America/Bogota");
                    		$dt = new DateTime("now", $dtz);
                    		$actual = $dt->format("Y-m-d");
                    		$inicio = get_post_meta($p->ID, 'fecha_inicio', true);
                    		$fin = get_post_meta($p->ID, 'fecha_fin', true);
                    		$actual = date('Y-m-d');
                    		
                    		$iniciof = strtotime($inicio);
                    		$finf = strtotime($fin);
                    		$actualf = strtotime($actual);
                    		
                    		  
                    		// Compare the timestamp date 
                    		if (($actualf >= $iniciof) && ($actualf <= $finf)){
                    		   //Si hay retos en curso
                               if(count((array)$retos_campana) > 0)
                               {
                                   foreach($retos_campana as $ret_camp) {
                                       if ($ret_camp->idReto == $p->ID) {
                                           //Si el reto ya fue cumplido
                                           $visible_campana = ($ret_camp->tipo == 'campana' && $ret_camp->popup == 'true') ? 'true' : 'false';
                                       }
                                   }
                               }
                        
                            ?>
                            <div class="swiper-slide" style="height:88px;">
                                <div class="list_retos_logrados_el">
                                <div>
                                    <?php
                                    if ($video) {
                                    ?>
                                        <video <?php echo ($visible_campana == 'true') ? 'muted autoplay playsinline loop':'style="filter: brightness(0.4)"' ?> >
                                            <source src="<?php echo $video; ?>" type="video/mp4">
                                        </video>
                                    <?php 
                                    }
                                    ?>
                                </div>
                                <h3><?php echo get_the_title($p->ID); ?></h3>  
                                <a class="list_retos_share" <?php echo ($visible_campana == 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                    <img src="<?php echo IMGURL ?>share.svg" alt="">
                                </a>
                            </div>
                            </div>
                            <?php
                            }
                        }
                      endforeach;
                  }
                  
                    
                $retos2 = ['foto_perfil', 'favorito_contenido', 'conocer_producto', 'editar_deportes', 'inscripcion_evento', 'llenar_encuesta', 'registrarse'];
                for($i = 0; $i < count($retos2); ++$i){
                
                    $mensaje = get_option('mensaje_'.$retos2[$i]);
                    $titulo_medalla = get_option('titulo_medalla_'.$retos2[$i]);
                    $video_medalla = get_option('video_medalla_'.$retos2[$i]);
                    $imagen_correo = get_option('imagen_correo_'.$retos2[$i]);
                    $puntos = get_option('puntos_'.$retos2[$i]);
                    $nombre_reto = $retos2[$i];
                    ?>
                    <div class="swiper-slide" style="height:88px;">
                        <div class="list_retos_logrados_el">
                            <div>
                                <video <?php echo (get_user_meta($idUser, $nombre_reto, true) == '1') ? 'muted autoplay playsinline loop':'style="filter: brightness(0.4)"' ?>>
                                <source src="<?php echo $video_medalla; ?>" type="video/mp4">
                                </video>
                            </div>
                            <h3 style="width:57%;"><?php echo $titulo_medalla; ?></h3>  
                            <a class="list_retos_share" <?php echo (get_user_meta($idUser, $nombre_reto, true) == '1') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                <img src="<?php echo IMGURL ?>share.svg" alt="">
                            </a>
                        </div>
                    </div>
            <?php
                }
                
                ?>
                
            </div>
          
          <div class="swiper-button-next swiper-button-next-log" style="top:18px!important;"></div>
          <div class="swiper-button-prev swiper-button-prev-log"></div>
          
        </div>
      </div>
     
      <?php } ?>
      
      <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
    </div>
  </div>

  <?php get_template_part( 'template-parts/desktop/footer' ); ?>
</div>

</div>

<?php
}
?>


<script type="text/javascript">
  jQuery(document).ready(function () {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
    jQuery('.side_buttons').css('display', 'none');
  });
</script>
<?php
if (wp_is_mobile()) {
?>

<script>
  jQuery('#show_sports').click(function () {
    jQuery('.sports_cont').css('display', 'flex');
    jQuery('body').css('overflow', 'hidden');
    jQuery('.header_nav_right').hide();
  });

  jQuery('.header_nav_nav').click(function () {
    jQuery('.sports_cont').css('display', 'none');
    jQuery('.header_nav_right').show();
  });

  jQuery('.header_modal_close').click(function () {
    jQuery('.sports_cont').css('display', 'none');
    jQuery('body').css('overflow', 'scroll');
    jQuery('.header_nav_right').show();
  });
</script>
<?php
} else {
?>
<script>
  jQuery('#show_sports').click(function () {
    jQuery('.modal_sport').css('display', 'flex');
    jQuery('.sports_cont').show();
    jQuery('body').css('overflow', 'hidden');
  });

  jQuery('.header_modal_close').click(function () {
    jQuery('.sports_cont').hide();
    jQuery('.modal_sport').css('display', 'none');
    jQuery('body').css('overflow', 'scroll');
  });
</script>
<?php
}
?>
<script src="<?php echo JSURL ?>swiper/swiper.js"></script>
<script>
//logout
  jQuery(document).on('click', '#logout', function (e) {

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: {
          action: "logout_user",
        },
        beforeSend: function () {
          $('#loader').css('display', 'flex');
        },
        error: function (response) {
          console.log(response);
        },
        success: function (response) {
          // Actualiza el mensaje con la respuesta
			$('#loader').css('display', 'none');
			strs = response.replace(/\s/g, "");
			if(strs === '1') {
			    window.location = '<?php echo home_url(); ?>';
			}
        }
    });
  });
  //Cambiar imagen perfil
  jQuery(document).on('change', '#sortpicture', function (e) {
    var querytype = jQuery('.support-query').val();
    var file_data = jQuery('#sortpicture').prop('files')[0];
    
    var form_data = new FormData();
    
    form_data.append('file', file_data);
    form_data.append('action', 'actualizar_avatar');
    form_data.append('idUser', <?php echo $idUser; ?>);

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        contentType: false,
        processData: false,
        data: form_data,
        beforeSend: function () {
          $('#loader').css('display', 'flex');
        },
        error: function (response) {
          console.log(response);
        },
        success: function (response) {
          // Actualiza el mensaje con la respuesta
			$('#loader').css('display', 'none');
			strs = response.replace(/\s/g, "");
			if(strs === '0'){
                jQuery('.msgAlert').css('display', 'flex');
                jQuery('.msgAlertCont').css('padding-bottom', '30px');
			    jQuery('.msgAlert .txtMsg').html('Ha ocurrido un error');
			}
			if(strs === '1') {
			    window.location = '<?php echo home_url('perfil'); ?>';
			}
			if(strs.includes("http")) {
				jQuery('#profile_cont_img').first().css('background-image', 'url('+strs+')');
			    jQuery('.msgAlert').css('display', 'none');
			    jQuery('.modal_sport').css('display', 'none');
			    jQuery('.msgAlert').css('display', 'flex');
			    jQuery('.msgAlert .txtMsg').html(`<h4 class="felicitaciones" style="text-transform:uppercase;">RETO ACTIVADO:</h4><div class="content_cont_h1_line"></div><br><div class="list_retos_logrados_el"> <div><video autoplay muted loop playsinline> <source src="<?php echo $video_medalla_foto_perfil; ?>" type="video/mp4"> </video></div><h3> <?php echo $titulo_medalla_foto_perfil; ?> </h3></div><p style="color: black;text-align: center;font-family: 'Gatorade black';font-size: 17px;width: 100%;margin: 0;padding: 0px 0px 8px;line-height: 19px;">¡COMPARTE TU MEDALLA CON TUS AMIGOS E INVITALOS AL DESAFIO!</p><div class="the_champ_sharing_container the_champ_horizontal_sharing" style="padding-bottom:20px;" ss-offset="0" super-socializer-data-href="<?php echo home_url('retos'); ?>"> <div style="font-weight:bold" class="the_champ_sharing_title"></div><ul class="the_champ_sharing_ul" style="display:flex;justify-content:center;align-items:center;width:100%;"> <li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Facebook" title="Facebook" class="theChampSharing theChampFacebookBackground" onclick='theChampPopup("https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url('retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampFacebookSvg"> </ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Twitter" title="Twitter" class="theChampSharing theChampTwitterBackground" onclick='theChampPopup("http://twitter.com/intent/tweet?text=Retos&amp;url=<?php echo home_url(' retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampTwitterSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Whatsapp" title="Whatsapp" class="theChampSharing theChampWhatsappBackground" onclick='theChampPopup("https://web.whatsapp.com/send?text=Retos <?php echo home_url('retos'); ?>")' > <ss style="display:block" class="theChampSharingSvg theChampWhatsappSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Email" title="Email" class="theChampSharing theChampEmailBackground" onclick="window.open('mailto:?subject=' + decodeURIComponent('Retos' ).replace('&amp;', '%26') + '&amp;body=' + decodeURIComponent('<?php echo home_url('retos'); ?>' ), '_blank')"> <ss style="display:block" class="theChampSharingSvg theChampEmailSvg"></ss> </i> </li></ul> <div style="clear:both"></div></div>`);
			}
        }
    });
  });
</script>
<script>
  jQuery(document).ready(function () {

    //Obtener deportes seleccionados por el usuario
    $.ajax({
      type: "post",
      url: MyAjax.url,
      data: {
        action: "get_deportes",
        user: <?php echo $idUser; ?>
    },
      beforeSend: function () {
        $('#loader').css('display', 'flex');
      },
      error: function (response) {
        console.log(response);
      },
      success: function (response) {

        var deport_seleted = JSON.parse(response);


        for (var i in deport_seleted) {
          var el_padre_deport = jQuery('.sports_list').find("div[data-deporte='" + deport_seleted[i] + "']");

          jQuery(el_padre_deport).addClass('active');
          jQuery(el_padre_deport).find('img').addClass('active');

          jQuery(".sports_selected").append('<a class="sports_selected_el w-inline-block" data-deporte="' + deport_seleted[i] + '"><div class="sport_selected_el_txt">' + deport_seleted[i] + '</div><div class="sports_selected_el_x">x</div></a>');
        }
        $('#loader').css('display', 'none');
      }
  });
});
</script>

<script>
  jQuery('.sports_list_el_img').click(function () {
    var deporte = jQuery(this).attr("data-deporte");
    jQuery(this).toggleClass("active");
    jQuery(this).find('img').toggleClass("active");
    if (jQuery(this).hasClass("active") && jQuery(this).find('img').hasClass("active")) {
      jQuery(".sports_selected").append('<a class="sports_selected_el w-inline-block" data-deporte="' + deporte + '"><div class="sport_selected_el_txt">' + deporte + '</div><div class="sports_selected_el_x">x</div></a>');
    } else {
      jQuery(".sports_selected_el").each(function () {
        if (jQuery(this).attr("data-deporte") == deporte) {
          jQuery(this).css('display', 'none');
        }
      });
    }

    guardar_deportes();

  });

  jQuery(document).on("click", ".sports_selected_el", function () {
    var deporte_s = jQuery(this).attr("data-deporte");
    jQuery(".sports_list_el_img").each(function () {
      if (jQuery(this).attr("data-deporte") == deporte_s) {
        jQuery(this).toggleClass("active");
        jQuery(this).find('img').toggleClass("active");
      }
    });
    jQuery(this).remove();

    guardar_deportes();
  });

  function guardar_deportes() {
    var array_deportes = [];
    if (jQuery('.sports_list_el_img.active')) {
      jQuery(".sports_list_el_img.active").each(function () {

        array_deportes.push(jQuery(this).attr("data-deporte"));

      });

      $.ajax({
        type: "post",
        url: MyAjax.url,
        data: {
          action: "array_deportes",
          array_deportes: array_deportes,
          user: <?php echo $idUser; ?>
        },
        beforeSend: function () {
          $('#loader').css('display', 'flex');
        },
        error: function (response) {
          console.log(response);
        },
        success: function (response) {
			// Actualiza el mensaje con la respuesta
			$('#loader').css('display', 'none');
			strs = response.replace(/\s/g, "");
			if(strs === '0'){
                jQuery('.msgAlert').css('display', 'flex');
                jQuery('.msgAlertCont').css('padding-bottom', '30px');
			    jQuery('.msgAlert .txtMsg').html('Ha ocurrido un error');
			    jQuery('body').css('overflow', 'scroll');
			}
			if(strs === '1') {
			    jQuery('body').css('overflow', 'scroll');
			}
			if(strs === '2') {
			    jQuery('.msgAlert').css('display', 'none');
			    jQuery('.modal_sport').css('display', 'none');
			    jQuery('.msgAlert').css('display', 'flex');
			    jQuery('.msgAlert .txtMsg').html(`<h4 class="felicitaciones" style="text-transform:uppercase;">RETO ACTIVADO:</h4><div class="content_cont_h1_line"></div><br><div class="list_retos_logrados_el"> <div><video autoplay muted loop playsinline> <source src="<?php echo $video_medalla_editar_deportes; ?>" type="video/mp4"> </video></div><h3> <?php echo $titulo_medalla_editar_deportes; ?> </h3></div><p style="color: black;text-align: center;font-family: 'Gatorade black';font-size: 17px;width: 100%;margin: 0;padding: 0px 0px 8px;line-height: 19px;">¡COMPARTE TU MEDALLA CON TUS AMIGOS E INVITALOS AL DESAFIO!</p><div class="the_champ_sharing_container the_champ_horizontal_sharing" style="padding-bottom:20px;" ss-offset="0" super-socializer-data-href="<?php echo home_url('retos'); ?>"> <div style="font-weight:bold" class="the_champ_sharing_title"></div><ul class="the_champ_sharing_ul" style="display:flex;justify-content:center;align-items:center;width:100%;"> <li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Facebook" title="Facebook" class="theChampSharing theChampFacebookBackground" onclick='theChampPopup("https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url('retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampFacebookSvg"> </ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Twitter" title="Twitter" class="theChampSharing theChampTwitterBackground" onclick='theChampPopup("http://twitter.com/intent/tweet?text=Retos&amp;url=<?php echo home_url(' retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampTwitterSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Whatsapp" title="Whatsapp" class="theChampSharing theChampWhatsappBackground" onclick='theChampPopup("https://web.whatsapp.com/send?text=Retos <?php echo home_url('retos'); ?>")' > <ss style="display:block" class="theChampSharingSvg theChampWhatsappSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Email" title="Email" class="theChampSharing theChampEmailBackground" onclick="window.open('mailto:?subject=' + decodeURIComponent('Retos' ).replace('&amp;', '%26') + '&amp;body=' + decodeURIComponent('<?php echo home_url('retos'); ?>' ), '_blank')"> <ss style="display:block" class="theChampSharingSvg theChampEmailSvg"></ss> </i> </li></ul> <div style="clear:both"></div></div>`);
			    jQuery('body').css('overflow', 'scroll');
			}
        }
      });
  }
  }
</script>
<?php
if (wp_is_mobile()) {
?>
<script>
  var swiper_fav = new Swiper('.swiper-container.swiper-container-fav', {
    slidesPerView: 'auto',
    spaceBetween: 10,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next.swiper-button-next-fav',
      prevEl: '.swiper-button-prev.swiper-button-prev-fav',
    },
  });

  var swiper_eve = new Swiper('.swiper-container.swiper-container-eve', {
    slidesPerView: 'auto',
    spaceBetween: 10,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next.swiper-button-next-eve',
      prevEl: '.swiper-button-prev.swiper-button-prev-eve',
    },
  });
  
  var swiper_log = new Swiper('.swiper-container.swiper-container-log', {
    slidesPerView: 'auto',
    spaceBetween: 10,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next.swiper-button-next-log',
      prevEl: '.swiper-button-prev.swiper-button-prev-log',
    },
  });
</script>
<?php
} else {
?>
<script>
  var swiper_fav = new Swiper('.swiper-container.swiper-container-fav', {
    slidesPerView: 3,
    spaceBetween: 10,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next.swiper-button-next-fav',
      prevEl: '.swiper-button-prev.swiper-button-prev-fav',
    },
  });

  var swiper_eve = new Swiper('.swiper-container.swiper-container-eve', {
    slidesPerView: 3,
    spaceBetween: 10,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next.swiper-button-next-eve',
      prevEl: '.swiper-button-prev.swiper-button-prev-eve',
    },
  });
  
  var swiper_log = new Swiper('.swiper-container.swiper-container-log', {
    slidesPerView: 2,
    spaceBetween: 10,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next.swiper-button-next-log',
      prevEl: '.swiper-button-prev.swiper-button-prev-log',
    },
  });
</script>
<?php
}
?>
<script>
    jQuery('.list_retos_share').click(function(){
        jQuery('.logoMsg').css('display', 'none');
        jQuery('.msgAlertCont').css('padding', '10px');
        jQuery('.msgAlert').css('display', 'flex');
        jQuery('.msgAlert .txtMsg').html(`<h4 class="felicitaciones" style="text-transform:uppercase;">¡COMPARTE!</h4><br><div class="compartir_pop the_champ_sharing_container the_champ_horizontal_sharing" ss-offset="0" super-socializer-data-href="<?php echo home_url('retos'); ?>"> <div style="font-weight:bold" class="the_champ_sharing_title"></div><ul class="the_champ_sharing_ul"> <li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Facebook" title="Facebook" class="theChampSharing theChampFacebookBackground" onclick='theChampPopup("https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url('retos'); ?>&quote=¡Hoy supere otro Reto! Únete y Alcanza tu máximo potencial. Acepta el reto <?php echo home_url(); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampFacebookSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Twitter" title="Twitter" class="theChampSharing theChampTwitterBackground" onclick='theChampPopup("http://twitter.com/intent/tweet?text=¡Hoy supere otro Reto!🏆 únete y Alcanza tu máximo potencial 💪🏼Acepta el reto  👉 <?php echo home_url(); ?>&amp;url=<?php echo home_url('retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampTwitterSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Whatsapp" title="Whatsapp" class="theChampSharing theChampWhatsappBackground" onclick='theChampPopup("https://web.whatsapp.com/send?text=¡Hoy supere otro Reto!🏆 únete y Alcanza tu máximo potencial 💪🏼Acepta el reto  👉 <?php echo home_url('retos'); ?>")' > <ss style="display:block" class="theChampSharingSvg theChampWhatsappSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Email" title="Email" class="theChampSharing theChampEmailBackground" onclick="window.open('mailto:?subject=¡Hoy supere otro Reto!🏆 únete y Alcanza tu máximo potencial 💪🏼Acepta el reto  👉 gatorade.lat&amp;body=' + decodeURIComponent('<?php echo home_url('retos'); ?>' ), '_blank')"> <ss style="display:block" class="theChampSharingSvg theChampEmailSvg"></ss> </i> </li></ul> <div style="clear:both"></div></div>`);
    });
</script>
<?php
get_footer();
?>
<?php 
get_header(); 

global $current_user;
wp_get_current_user();
if (is_user_logged_in()) {
  $loginUser = "true";
} else {
    $loginUser = false;
}
?>
<style>
.side_buttons_link.favorite {
    display: none;
}
.banner_retos {
    width: 100%;
    margin-top: 26px;
}
.banner_retos img {
    width: 100%;
}
.tab_contenido {
    display: none;
}

.tab_contenido h3 {
    color: white;
    text-align: center;
    text-transform: uppercase;
    margin: 20px 0px 30px;
    font-family: 'Gatorade black', sans-serif;
}

ul.lista_tabs {
    background: #DEDEDE;
    border-radius: 30px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
}
li.tab {
    color: black;
    background: transparent;
    border-radius: 30px;
    padding: 10px 16px;
    width: 50%;
    text-align: center;
    font-family: 'Gatorade black', sans-serif;
    font-size: 16px;
    cursor: pointer;
}
.tab.active {
    background: var(--color-orange);
    color: white;
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

a.contact_submit.w-button {
    width: 100%;
    font-size: 24px;
    margin-bottom: 30px;
}
.list_retos_logrados {
    margin: 30px 0px;
    width: 100%;

}
.list_retos_logrados_el {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    border-radius: 10px;
    width: 100%;
    height: 110px;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    background-position: center center !important;
    background: red;
    margin-bottom: 20px;
}

.list_retos_logrados_el h3 {
    color: white;
    font-family: 'Gatorade black', sans-serif;
    font-size: 22px;
    line-height: 26px;
    text-align: left;
    margin: 0px;
    width: calc(100% - 36px);
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
    right: -28px;
    bottom: -50px;
    width: 46px;
    height: 30px;
}

.list_retos_share img {
    width: 50%;
}

.txt_retos {
    font-family: 'Gatorade black', sans-serif;
    font-size: 30px;
    color: #292929;
}

p.txtMsg {
    margin-top: 12px;
}

p.logoMsg img {
    width: 118px;
    height: auto;
}
</style>
<?php
if (wp_is_mobile()) {
?>
<div class="content_cont bg_content">
    <div class="content_cont_tit_h1">
        <h1 class="content_cont_h1 bottom_line">RETOS</h1>
        <div class="content_cont_h1_line"></div>
    </div>
    <p class="content_cont_p">Navega por nuestra pagina web y logra Todos los retos que tenemos preparados para ti.</p>
    <div class="banner_retos">
        <a>
        <?php if(get_option('banner_retos_mobile')) { ?>
            <img src="<?php echo get_option('banner_retos_mobile'); ?>" alt="">
        <?php } ?>
        </a>
    </div>
    <div class="contenido_retos">
        <ul class="lista_tabs">
            <li class="tab active" tab="retos_semanales">RETOS SEMANALES</li>
            <li class="tab" tab="retos_logrados">RETOS LOGRADOS</li>
        </ul>
        <div class="contenido_tabs">
            <div class="tab_contenido active" tab_contenido="retos_semanales" style="display: block;">
                <h3>Supera estos retos semanales Y posiciónate como el #1</h3>
                <div class="list_retos">
                    <?php
                    $args = array(
                        'post_type' => 'retos',
                        'post_status' => 'publish',
                        'posts_per_page' => '10'
                    );
                    $result = new WP_Query($args);
                    if ($result->have_posts()) :
                        while ($result->have_posts()) : $result->the_post();
                    ?>
                    <?php
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                        $icono = get_post_meta($post->ID, 'icono', true);
                        $tipo_reto = get_post_meta($post->ID, 'tipo_retos', true);
                        $estado_retos = get_post_meta($post->ID, 'estado_retos', true);
                        var_dump($estado_retos);
                        var_dump($current_user->ID);
                        // $test = [];
                        // update_post_meta($post->ID, 'estado_retos', $test);

                        if($estado_retos) {
                          for($i = 0; $i < count($estado_retos); ++$i) {
                            if($estado_retos[$i]->user == $current_user->ID) {
                                $inscrito = 'true';
                                print_r('inscrito');
                            } else {
                                $inscrito = 'false';
                                print_r('no inscrito');
                            }
                          }
                        }
                    ?>
                    <div class="list_retos_el" data-inscrito="<?php echo $inscrito; ?>" data-idReto="<?php echo $post->ID; ?>" data-tipoReto="<?php echo $tipo_reto; ?>">
                        <div class="list_retos_el_img" style="background: url(<?php echo $image[0]; ?>)">
                            <img src="<?php echo $icono; ?>" alt="">
                        </div>
                        <p class="name_reto"><?php echo the_title(); ?></p>
                    </div>
                    <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <div class="tab_contenido" tab_contenido="retos_logrados">
                <div class="list_retos_logrados">
                    <?php
                    $args = array(
                        'post_type' => 'retos',
                        'post_status' => 'publish',
                        'posts_per_page' => '10'
                    );
                    $result = new WP_Query($args);
                    if ($result->have_posts()) :
                        while ($result->have_posts()) : $result->the_post();
                    ?>
                    <?php
                        $images = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                    ?>
                    <div class="list_retos_logrados_el" style="background: url(<?php echo $images[0]; ?>)">
                        <h3><?php echo the_title(); ?></h3>
                        <a href="" class="list_retos_share">
                            <img src="<?php echo IMGURL ?>share.svg" alt="">
                        </a>
                    </div>
                    <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <a href="" class="contact_submit w-button">RANKING DE USUARIOS</a>
    </div>
    
    <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>
<?php
} else {
?>
<style>
.banner_retos {
    margin-bottom: 30px;
}
.tab.active {
    background: rgb(244,125,48);
    background: linear-gradient(90deg, rgba(244,125,48,1) 0%, rgba(255,186,0,1) 100%);
}
li.tab {
    font-size: 20px;
}
.list_retos_el {
    width: 25%;
}
.tab_contenido h3 {
    color: black;
}
.name_reto {
    color: black;
}
a.contact_submit.w-button {
    padding: 5px 30px;
    width: 340px;
    font-size: 24px;
    margin: 0 auto;
    margin-bottom: 30px;
    display: block;
    color: white;
    background: rgb(244,125,48);
    background: linear-gradient(90deg, rgba(244,125,48,1) 0%, rgba(255,186,0,1) 100%);
}
.contenido_tabs {
    width: 92%;
    margin: 0 auto;
}

.contenido_retos {
    padding-bottom: 50px;
}

.list_retos_logrados_el {
    width: 30%;
    border-radius: 10px;
    margin-right: 1%;
}

.list_retos_logrados {
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    flex-wrap: wrap;
}

.tab_contenido h3 {
    color: white;
    line-height: 18px;
    font-size: 18px;
}

</style>
<div class="home">
  <?php get_template_part( 'template-parts/desktop/header' ); ?>
  <div class="banner_retos">
        <a>
        <?php if(get_option('banner_retos_desktop')) { ?>
            <img src="<?php echo get_option('banner_retos_desktop'); ?>" alt="">
        <?php } ?>
        </a>
    </div>
    <div class="contenido_retos">
        <ul class="lista_tabs">
            <li class="tab active" tab="retos_semanales">RETOS SEMANALES</li>
            <li class="tab" tab="retos_logrados">RETOS LOGRADOS</li>
        </ul>
        <div class="contenido_tabs">
            <div class="tab_contenido active" tab_contenido="retos_semanales" style="display: block;">
                <h3>Supera estos retos semanales Y posiciónate como el #1</h3>
                <div class="list_retos">
                    <?php
                    $args = array(
                        'post_type' => 'retos',
                        'post_status' => 'publish',
                        'posts_per_page' => '10'
                    );
                    $result = new WP_Query($args);
                    if ($result->have_posts()) :
                        while ($result->have_posts()) : $result->the_post();
                    ?>
                    <?php
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                        $icono = get_post_meta($post->ID, 'icono', true);
                        $tipo_reto = get_post_meta($post->ID, 'tipo_retos', true);
                        $estado_retos = get_post_meta($post->ID, 'estado_retos', true);
                        var_dump($estado_retos);
                        var_dump($current_user->ID);
                        // $test = [];
                        // update_post_meta($post->ID, 'estado_retos', $test);

                        if($estado_retos) {
                          for($i = 0; $i < count($estado_retos); ++$i) {
                            if($estado_retos[$i]->user == $current_user->ID) {
                                $inscrito = 'true';
                                print_r('inscrito');
                            } else {
                                $inscrito = 'false';
                                print_r('no inscrito');
                            }
                          }
                        }
                    ?>
                    <div class="list_retos_el" data-inscrito="<?php echo $inscrito; ?>" data-idReto="<?php echo $post->ID; ?>" data-tipoReto="<?php echo $tipo_reto; ?>">
                        <div class="list_retos_el_img" style="background: url(<?php echo $image[0]; ?>)">
                            <img src="<?php echo $icono; ?>" alt="">
                        </div>
                        <p class="name_reto"><?php echo the_title(); ?></p>
                    </div>
                    <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <div class="tab_contenido" tab_contenido="retos_logrados">
                <h3 style="text-align: right;">Retos completados (23/300)</h3>
                <div class="list_retos_logrados">
                    <?php
                    $args = array(
                        'post_type' => 'retos',
                        'post_status' => 'publish',
                        'posts_per_page' => '10'
                    );
                    $result = new WP_Query($args);
                    if ($result->have_posts()) :
                        while ($result->have_posts()) : $result->the_post();
                    ?>
                    <?php
                        $images = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                    ?>
                    <div class="list_retos_logrados_el" style="background: url(<?php echo $images[0]; ?>)">
                        <h3><?php echo the_title(); ?></h3>
                        <a href="" class="list_retos_share">
                            <img src="<?php echo IMGURL ?>share.svg" alt="">
                        </a>
                    </div>
                    <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <a href="" class="contact_submit w-button">RANKING DE USUARIOS</a>
    </div>
  <?php get_template_part( 'template-parts/desktop/footer' ); ?>
</div>
<?php
}
?>
<script type="text/javascript">
jQuery( document ).ready(function() {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
});

//Tabs
jQuery(".tab").on("click", function(event) {
    var sel = jQuery(this).attr('tab');
    console.log(sel);
    jQuery('.tab.active').removeClass('active');
    jQuery(this).addClass('active');
    jQuery(".contenido_retos").find(".tab_contenido").hide();
    var sel2 = jQuery(".contenido_retos").find("[tab_contenido='"+ sel +"']");
    jQuery(sel2).show();
    // console.log(sel2);
});

//Participar reto
jQuery(".list_retos_el").on("click", function(event) {
    var idReto = jQuery(this).attr('data-idReto');
    var tipoReto = jQuery(this).attr('data-tipoReto');
    var user = <?php echo $current_user->ID; ?>;
    var inscrito = jQuery(this).attr('data-inscrito');
    console.log(idReto);
    console.log(tipoReto);
    // console.log(inscrito);
    if(user != '') {
      if(idReto !='' && tipoReto != '') {
        if(inscrito == 'true') {
          jQuery('.msgAlert').css('display', 'flex');
          jQuery('.msgAlert .logoMsg').find('img').attr('src','<?php echo IMGURL ?>alert_retos.png');
          jQuery('.msgAlert .txtMsg').html("Ya estas participando en este evento");
          jQuery('.msgAlert .txtMsg').css('margin-bottom', '-37px');
          jQuery('.msgAlert .aMsg').css('display', 'block');
          jQuery('.msgAlert .aMsg').text('IR AL HOME');
          jQuery('.msgAlert .aMsg').css('bottom', '-56px');
          jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url(); ?>');
          $('#loader').css('display', 'none');
        } else {
         $.ajax({
           type: "post",
           url: MyAjax.url,
           data: { action: 'participar_reto', userId: user, idReto: idReto, tipoReto: tipoReto },
           beforeSend: function() {
               $('#loader').css('display', 'flex');
           },
           error: function(response) {
               jQuery('.msgAlert').css('display', 'flex');
               jQuery('.msgAlert .txtMsg').html(response);
           },
           success: function(response) {
            // Actualiza el mensaje con la respuesta
            console.log(response);
            jQuery('.msgAlert').css('display', 'flex');
            jQuery('.msgAlert .logoMsg').find('img').attr('src','<?php echo IMGURL ?>alert_retos.png');
            jQuery('.msgAlert .txtMsg').html("Desde este momento ya estas participando en este reto");
            jQuery('.msgAlert .txtMsg').css('margin-bottom', '-37px');
            jQuery('.msgAlert .aMsg').css('display', 'block');
            jQuery('.msgAlert .aMsg').text('IR AL HOME');
            jQuery('.msgAlert .aMsg').css('bottom', '-56px');
            jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url(); ?>');
            $('#loader').css('display', 'none');
           }
         });
        }
      } else {
        jQuery('.msgAlert').css('display', 'flex');
        jQuery('.msgAlert .txtMsg').html('Ha ocurrido un error');
      }
    } else {
      jQuery('.msgAlert').css('display', 'flex');
      jQuery('.msgAlert .logoMsg').find('img').attr('src','<?php echo IMGURL ?>alert_retos.png');
      jQuery('.msgAlert .txtMsg').html("Debes estar registrado para participar");
      jQuery('.msgAlert .txtMsg').css('margin-bottom', '-37px');
      jQuery('.msgAlert .aMsg').css('display', 'block');
      jQuery('.msgAlert .aMsg').text('REGISTRARME');
      jQuery('.msgAlert .aMsg').css('bottom', '-56px');
      jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url('registro'); ?>');
    }
    
});

jQuery('.msgAlert').css('display', 'flex');
jQuery('.msgAlert .logoMsg').find('img').attr('src','<?php echo IMGURL ?>alert_retos.png');
jQuery('.msgAlert .txtMsg').html("<span class='txt_retos'>¡RETO DEL DÍA!</span><br><br><span class='txt_retos' style='font-size:25px;'>10 ANOTACIONES EN 15 SEGUNDOS DE VÍDEO ¡GO!</span>");
jQuery('.msgAlert .txtMsg').css('margin-bottom', '-37px');
jQuery('.msgAlert .aMsg').css('display', 'block');
jQuery('.msgAlert .aMsg').text('PARTICIPAR');
jQuery('.msgAlert .aMsg').css('bottom', '-56px');
jQuery('.msgAlert .aMsg').attr('href', '#');
</script>
<?php
get_footer();
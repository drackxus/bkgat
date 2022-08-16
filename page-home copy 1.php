<?php
  /**
   * Template Name: Home 4 copy
   *
   * @package WordPress
   */
  
  get_header();
  
  ?>
<style>
  .list_card_el video {
   width: 102%;
  }
  .side_buttons_link.favorite {
  display: flex;
  }
  .card_content {
  position: relative;
  }
  .card_tit {
  bottom: 30px;
  margin-bottom: 0px;
  background-color: transparent;
  }
  /** Safari 9+. Even supported in Safari 13+! */
  @supports (background: -webkit-canvas(squares)) {
  .card_tit {
  bottom: 140px;
  }
  }
</style>
<?php
if(wp_is_mobile()) {
?>

  <!-- Fullpage -->
  <!-- <link rel="stylesheet" href="https://rawgit.com/alvarotrigo/fullPage.js/master/dist/fullpage.css" /> -->
  <link rel="stylesheet" href="<?php echo CSSURL ?>fullpage/fullpage.css" />
  <div id="fullpage">
    <div class="section">
      <div class="slide">
        <div class="card card_click">
          <div class="card_content" id="favorites">
            <video autoplay muted loop playsinline class="video_bg">
                <source src="<?php echo CSSURL ?>video_tutorial.mp4" type="video/mp4">
            </video>
          </div>
        </div>
      </div>
    </div>
    <?php
      $args = array(
          'post_type' => 'tarjetas',
          'post_status' => 'publish',
          'posts_per_page' => '2'
      );
      $result = new WP_Query($args);
      if ($result->have_posts()) :
          while ($result->have_posts()) : $result->the_post();
            if (get_post_meta($post->ID, 'tipo_tarjeta', true) == 'normal') {
              get_template_part( 'template-parts/cards/cards' );
            } else if (get_post_meta($post->ID, 'tipo_tarjeta', true) == 'encuesta') {
              //Reiniciar datos de encuesta
              // $id_encuesta = get_post_meta($post->ID, 'encuesta_elegida', true);
              // $resultados = [];
              // update_post_meta($id_encuesta, 'resultados', $resultados);

              $id_encuesta = get_post_meta($post->ID, 'encuesta_elegida', true);
              $encuesta_resul = get_post_meta($id_encuesta, 'resultados', true);
              if(empty($encuesta_resul)) {
                // print_r('vacia');
                $resultados = [];
                update_post_meta($id_encuesta, 'resultados', $resultados);
                get_template_part( 'template-parts/cards/cards' );
              } else {
                // print_r('no vacia');
                for($i = 0; $i < count($encuesta_resul); ++$i) {
                  if($encuesta_resul[$i]->user == $current_user->ID) {
                    //Ya ha respondido la encuesta
                  } else {
                      get_template_part( 'template-parts/cards/cards' );
                  }
                }
              }
              
            }
          endwhile;
      endif;
    wp_reset_postdata();
    ?>
  </div>
  <!-- Fullpage -->
  <script src="<?php echo JSURL ?>fullpage/fullpage.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo JSURL ?>fullpage/ext.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo JSURL ?>fullpage/scroll.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript">
    jQuery( document ).ready(function() {
      jQuery('.header_nav_close').css('display', 'none');
      jQuery(document).on("click", ".card_click",function() {
          fullpage_api.moveSlideRight();
      });
    });
  </script>
  <script>
    jQuery(document).ready(function() {
    var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
    var page = 1; // What page we are on.
    var ppp = 2; // Post per page
    
    init();
    
    function init() {
        var myFullpage = new fullpage('#fullpage', {
            scrollOverflow: true,
            scrollOverflowOptions: {
              momentum: false,
              useTransform: false,
              useTransition: false,
              bounce: false,
              click: true,
              tap: true,              
            },
            dragAndMove: true,
            css3: true,
            easing: 'easeInOutCubic',
            easingcss3: 'ease',
            scrollingSpeed: 700,
            scrollOverflowReset: true,
            navigation: false,
            slidesNavigation: false,
            controlArrows: false,
            loopTop: false,
            loopBottom: false,
            continuousVertical: true,
            loopHorizontal: false,
            autoScrolling: true,
            onSlideLeave: function( section, origin, destination, direction){
                //second
                if(destination.index == 1 && origin.index == 0 && direction == 'right'){
                  $('#loader').css('display', 'flex');
                    jQuery('.header_nav_close').css('display', 'block');
                    jQuery('.header_nav_close').click(function(){
                        // console.log('close');
                        fullpage_api.moveSlideLeft();
                    });
                }
    
                //first
                if(destination.index == 0 && origin.index == 1 && direction == 'left'){
                    jQuery('.header_nav_close').css('display', 'none');  
                }
            },
            afterSlideLoad: function( section, origin, destination, direction){
                // console.log(section.item);
                var postId = jQuery(section.item).find('input.postId').val();
    
                //primera diapositiva
                if(destination.index == 1){
                  // $('#loader').css('display', 'flex');
                    //validar si el detalle ya esta cargado
                    if ( jQuery(section.item).find('.slide.active').find('.content_cont').find('.content_cont_txt').children().length > 0 ) {
                        //console.log('lleno');
                        fullpage_api.setAllowScrolling(false, 'down');
                        fullpage_api.setKeyboardScrolling(false, 'down');
                        fullpage_api.setAllowScrolling(false, 'up');
                        fullpage_api.setKeyboardScrolling(false, 'up');
                        $('#loader').css('display', 'none');
                    }else {
                        $.ajax({
                        type: "post",
                        url: MyAjax.url, // Pon aquí tu URL
                        data: {
                            action: "get_detail",
                            postId: postId,
                        },
                        beforeSend: function() {
                            // $('#loader').css('display', 'flex');
                        },
                        error: function(response) {
                            console.log(response);
                            // $('#loader').css('display', 'none');
                        },
                        success: function(response) {
                            // console.log(response);
                            var xx = jQuery(section.item).find('.slide.active').find('.content_cont').find('.content_cont_txt');
                            jQuery(xx).append(response);
    
                            setTimeout(function(){ 
                                
                                var activeSectionIndex = $(".fp-section.active").index();
                                // console.log(activeSectionIndex);
                                var activeSlideIndex = $(".fp-section.active")
                                    .find(".slide.active")
                                    .index();
    
                                    fullpage_api.destroy("all");
    
                                //setting the active section as before
                                $(".section").eq(activeSectionIndex).addClass("active");
    
                                //were we in a slide? Adding the active state again
                                if (activeSlideIndex > -1) {
                                    $(".section.active")
                                        .find(".slide")
                                        .eq(activeSlideIndex)
                                        .addClass("active");
                                }
    
                                init();
    
                                fullpage_api.setAllowScrolling(false, 'down');
                                fullpage_api.setKeyboardScrolling(false, 'down');
                                fullpage_api.setAllowScrolling(false, 'up');
                                fullpage_api.setKeyboardScrolling(false, 'up');
                                $('#loader').css('display', 'none');
                                // console.log('resto');
                            }, 700);  
                        },
                    });
    
                    }
    
    
                    
            
                }
    
                //segunda diapositiva
                if(destination.index == 0){
                    // console.log("Primera diapositiva cargada");
                    fullpage_api.setAllowScrolling(true, 'down');
                    fullpage_api.setKeyboardScrolling(true, 'down');
                    fullpage_api.setAllowScrolling(true, 'up');
                    fullpage_api.setKeyboardScrolling(true, 'up');
                    if (jQuery(destination.item).find("video")[0]) {
                        jQuery(destination.item).find("video")[0].play();
                    }
                }
            },
            afterLoad: function(origin, destination, direction) {
                var params = {
                    origin: origin,
                    destination: destination,
                    direction: direction,
                };
                var tt = destination.index;
                if (destination.isLast == true) {
                    //La llamada AJAX
                    $.ajax({
                        type: "post",
                        url: MyAjax.url, // Pon aquí tu URL
                        data: {
                            action: "more_post_ajax",
                            offset: page * ppp + 1,
                            ppp: ppp,
                        },
                        beforeSend: function() {
                            $("#infinite").css("display", "flex");
                        },
                        error: function(response) {
                            console.log(response);
                            $("#infinite").css("display", "none");
                        },
                        success: function(response) {
                            page++;
                            
                            
                            $("#fullpage").append(response);
    
                                //remembering the active section / slide
                                var activeSectionIndex = $(".fp-section.active").index();
                                var activeSlideIndex = $(".fp-section.active")
                                    .find(".slide.active")
                                    .index();

                                    // console.log(activeSectionIndex - 1);

                                    var test = activeSectionIndex - 1;
    
                                    fullpage_api.destroy("all");
    
                                //setting the active section as before
                                $(".section").eq(activeSectionIndex).addClass("active");
    
                                //were we in a slide? Adding the active state again
                                if (activeSlideIndex > -1) {
                                    $(".section.active")
                                        .find(".slide")
                                        .eq(activeSlideIndex)
                                        .addClass("active");
                                }
    
                                init();
    
                                $("#infinite").css("display", "none");

                            
                        },
                    });
                }
                if (jQuery(params.destination.item).find("video")[0]) {
                    jQuery(params.destination.item).find("video")[0].play();
                }
            },
        });
    }
    });
  </script>
<?php
} elseif(!wp_is_mobile()) {
//No es celular 
?>
  <style>
  .list_card_el_bottom {
    position: absolute;
    z-index: 2;
    bottom: 0px;
    width: 98%;
    min-height: 130px;
    background: rgb(0,0,0);
    background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.8) 45%, rgba(0,0,0,0) 100%);
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
	}
    .list_card_el_bottom > a:first-of-type {
        width: calc(100% - 38px);
    }
    #infinite {
    bottom: 54px;
    }
    .list_cards {
    padding-bottom: 60px;
    }
    .list_card_el {
    position: relative;
    height: 500px;
    padding: 5px 5px;
    }
    .list_card_el video {
    position: relative;
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
    opacity: 1;
    cursor: pointer;
    }
    .list_card_el_bottom {
    position: absolute;
    z-index: 2;
    bottom: 0px;
    width: 98%;
    }
    .list_card_el_bottom .favorite {
    width: 38px;
    height: 38px;
    }
    .list_card_el_bottom .list_card_el_bottom_tit {
    margin-bottom: 0px;
    color: white;
    margin-top: 0px;
    font-size: 14px;
    }
    .no_more_cards {
    width: 100%;
    text-align: center;
    color: black;
    }
    .content_gen {
    background-image: url(https://uploads-ssl.webflow.com/6005e02…/603018b…_fondo_white.png);
    background-position: 50% 50%;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background: white;
    }
    .home {
    width: 100%;
    padding-top: 50px;
    padding-right: 150px;
    padding-left: 150px;
    max-width: 1200px;
    margin: 0 auto;
    }
    .list_card_el {
    height: 450px;
    }
    .fixed_bottom {
    position: fixed;
    bottom: 0px;
    z-index: 4;
    }
  </style>
  <div class="home">
    <?php get_template_part( 'template-parts/desktop/header' ); ?>
    <?php get_template_part( 'template-parts/desktop/banner' ); ?>
    <div class="list_cards">
      <?php
        $args = array(
            'post_type' => 'tarjetas',
            'post_status' => 'publish',
            'posts_per_page' => '4'
        );
        $result = new WP_Query($args);
        if ($result->have_posts()) :
            while ($result->have_posts()) : $result->the_post();
        ?>
      <a href="<?php echo the_permalink(); ?>">
        <div class="list_card_el">
          <input type="hidden" class="postId" value="<?php 
              if ($post->ID){
                  echo $post->ID;
              }?>" >    
          <input type="hidden" class="userId" value="<?php 
          if ($current_user->ID){
              echo $current_user->ID;
          }?>" >
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
            <div class="list_card_el_bottom">
              <h1 class="list_card_el_bottom_tit"><?php echo the_title(); ?> </h1>
              <a class="side_buttons_link favorite favorite_desktop w-inline-block">
              <img
                src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6026c3b6fb4589cf42b78ae1_favorite.svg"
                loading="lazy"
                class="side_buttons_link_img"/>
              </a>
            </div>
        </div>
      </a>
      <?php
        endwhile;
        endif;
        wp_reset_postdata();
        ?>
        <div class="more_cards_home">
    </div>
    </div>
    <?php get_template_part( 'template-parts/desktop/footer' ); ?>
  </div>
  <script>
    jQuery( document ).ready(function() {
        var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
        var page = 1; // What page we are on.
        var ppp = 4; // Post per page
    
        //al pararse sobre el video reproducirlo
        jQuery(document).on("mouseenter", "video",function() {
            jQuery(this)[0].play();
        });
        //al salir del vido pausarlo
        jQuery(document).on("mouseleave", "video",function() {
            jQuery(this)[0].pause();
        });
        //scroll infinito
        $.fn.isInViewport = function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
    
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
    
            return elementBottom > viewportTop && elementTop < viewportBottom;
        };
    
        jQuery(window).scroll(function () {
            if (jQuery('.more_cards_home').isInViewport()) {
                // console.log('scroll');
                jQuery('.more_cards_home').hide();
                $.ajax({
                    type: "post",
                    url: MyAjax.url, // Pon aquí tu URL
                    data: {
                        action: "more_post_home",
                        offset: page * ppp + 1,
                        ppp: ppp,
                    },
                    beforeSend: function() {
                        $("#infinite").css("display", "flex");
                    },
                    error: function(response) {
                        console.log(response);
                        $("#infinite").css("display", "none");
                    },
                    success: function(response) {
                        page++;
                        strs = response.replace(/\s/g, "");
                        // Actualiza el mensaje con la respuesta
                        if(strs == '0') {
                            $("#infinite").css("display", "none");
                            page = 1;
                            $(".list_cards").append('<p class="no_more_cards">No hay más publicaciones disponibles por el momento</p>');
                        }else {
                            $(".list_cards").append(response);
                            $("#infinite").css("display", "none");
                            jQuery('.more_cards_home').show();
                        }
                        
                    },
                });
            } else {
            }
        });
    });
  </script>
  <script>
  jQuery(document).ready(function() {
  // Favoritos

  jQuery(document).on("click", ".favorite_desktop",function() {
    // console.log('inic');
    //comprobamos si dentro de la tarjeta existen los input
      //event.preventDefault();
      //obtenemos el valor de los input
      var user = jQuery('.list_card_el').find('.userId').val();
      var post = jQuery('.list_card_el').find('.postId').val();
      // console.log(user);
      // console.log(post);
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
            // console.log(response);
            jQuery('.msgAlert').css('display', 'flex');
            jQuery('.msgAlertCont').css('padding-bottom', '30px');
            jQuery('.msgAlert .txtMsg').html(response);
            jQuery('#loader').css('display', 'none');
          }
        })
      }
  });
  });  
</script>
<?php
}
?>
<script>
  // console.log(window.location.href);
  if (window.location.href.indexOf("/co") > -1 || window.location.href.indexOf("/cl") > -1 || window.location.href.indexOf("/mx") > -1) {
      jQuery('.country').css('display', 'none');
  }else {
      jQuery('.country').css('display', 'flex');
      // Obtener pais usuario
      jQuery.get("https://ipinfo.io", function(response) {
          // console.log(response.country);
          if(response.country) {
          
          switch (response.country) {
              case 'CO':
              jQuery('#countryUser').css('display', 'block');
              jQuery('#countryUser').append('<span> Colombia</span><br> <a href="<?php echo home_url('co'); ?>" style="text-decoration:underline">continuar</a>');
              break;
              case 'MX':
              jQuery('#countryUser').css('display', 'block');
              jQuery('#countryUser').append('<span> México</span><br> <a href="<?php echo home_url('mx'); ?>" style="text-decoration:underline">continuar</a>');
              break;
              case 'CL':
              jQuery('#countryUser').css('display', 'block');
              jQuery('#countryUser').append('<span> Chile</span><br> <a href="<?php echo home_url('cl'); ?>" style="text-decoration:underline">continuar</a>');
              break;
              default:
              
          }
          }
      }, "jsonp");
  }
  
  // Latinoamerica
  jQuery(document).on("click", "#lat",function() {
      jQuery('.country').css('display', 'none');
  });
</script>
<?php
  get_footer();
  ?>
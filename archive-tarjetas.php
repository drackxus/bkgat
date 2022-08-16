<?php
get_header();
?>
<link rel="stylesheet" href="<?php echo CSSURL ?>swiper/swiper.css">
<style>
  .swiper-container.swiper-container1 .swiper-slide {
    height: 154px;
  }
  .home_header {
    background: transparent;
  }
  .img_contenidos {
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
  .content_subcategories a {
    background: black;
  }
</style>
<?php
if(wp_is_mobile())
{
  ?>
  <style>
    .content_cont_h3.bottom_line {
      font-size: 30px;
    }
    .side_buttons_link.favorite {
      display: none;
    }
    .swiper-container.swiper-container1 {
      width: calc(100% + 40px);
      padding-top: 50px;
      padding-bottom: 30px;
      margin-left: -20px;
    }
    .swiper-container.swiper-container1 .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 220px;
      height: 220px;
      border-radius: 50%;
    }
    :root {
      --swiper-theme-color: white;
      --swiper-navigation-size: 28px;
    }
    .swiper-container-3d .swiper-slide-shadow-bottom, .swiper-container-3d .swiper-slide-shadow-left, .swiper-container-3d .swiper-slide-shadow-right, .swiper-container-3d .swiper-slide-shadow-top {
      border-radius: 50%;
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
      height: 200px;
    }
    .swiper-container.swiper-container3 {
      width: calc(100% + 40px);
      padding-top: 10px;
      padding-bottom: 10px;
      margin-left: -20px;
    }
    .swiper-container.swiper-container3 .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 90%;
      height: 200px;
    }
    .question_cont_list_container{
      overflow-y: scroll;
      height: 180px;
    }
    .question_cont_list{
      height:280px;
    }
    .content_cont_h1_line{
      width:55px;
    }
    .content_cont_h2_line{
        width: 30px;
    }
  </style>
  <div class="content_cont bg_content">
    <div class="content_cont_tit_h1">
      <h1 class="content_cont_h1 bottom_line">CONTENIDOS <br>GATORADE</h1>
      <div class="content_cont_h1_line"></div>
    </div>
    <p class="content_cont_p">Encuentra todos los contenidos <br>que Gatorade tiene para ti</p>
    <div class="search_cont">
      <div class="w-form">
        <div class="search_cont_form">
          <input type="text"
          class="search_cont_form_input w-input" maxlength="256"
          placeholder="Buscador  (Tags, Palabras claves)" name="keyword" id="keyword" onkeyup="fetch()" />
          <input type="button" value="" class="search_cont_form_btn w-button" onclick="fetch()"/>
        </div>
      </div>
      <div id="datafetch"></div>
    </div>
    <div class="content_categories">
      <div class="content_cont_tit_h2">
        <h2 class="content_cont_h2 bottom_line">CONTENIDOS DESTACADOS</h2>
        <div class="content_cont_h2_line"></div>
      </div>

      <!-- Swiper -->
      <div class="swiper-container swiper-container1">
        <div class="swiper-wrapper">
          <?php
          $args = array(
            'post_type' => 'tarjetas',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_key' => 'tipo_tarjeta',
            'meta_value' => 'encuesta', 
            'meta_compare' => '!=',
            'meta_query' => array(
              array(
                'key' => 'es_destacado',
                'value' => 'yes',
                'compare' => 'LIKE'
              )
            )
          );
          $result = new WP_Query($args);
          if ($result->have_posts()) :
            while ($result->have_posts()) : $result->the_post();
              ?>
              <div class="swiper-slide">
                <?php
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destacados');
                $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                $image_title = get_the_title(get_post_thumbnail_id($post->ID));
                ?>
                <a href="<?php echo the_permalink(); ?>" >
                  <div style="width:220px;height:220px;border-radius:50%;background:url(<?php echo $image[0] ?>);background-repeat:no-repeat;background-position:center;background-size:cover;">

                  </div>

              <!--   <img loading="lazy" src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>" style="border-radius: 50%;" />
              -->


            <!-- <?= wp_get_attachment_image(get_post_thumbnail_id($post->ID), array(400, 400) ); ?>
            <?php the_post_thumbnail( 'destacados' ); ?> -->
          </a>
        </div>
        <?php
      endwhile;
    endif;
    wp_reset_postdata();
    ?>
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>

</div>
<?php
global $post;

$current = get_the_ID($post->ID);
$cargs = array(
  'child_of'      => 0,
  'orderby'       => 'name',
  'order'         => 'ASC',
  'hide_empty'    => 0,
  'parent' => 0,
  'taxonomy'      => 'categoriasTarjetas', //change this to any taxonomy
);
foreach (get_categories($cargs) as $tax) :
  // List posts by the terms for a custom taxonomy of any post type
  $args = array(
    'post_type'         => 'tarjetas',
    'post_status'       => 'publish',
    'posts_per_page'    => -1,
    'meta_key' => 'tipo_tarjeta',
    'meta_value' => 'encuesta', 
    'meta_compare' => '!=',
    'orderby'           => 'title',
    'tax_query' => array(
      array(
        'taxonomy'  => 'categoriasTarjetas',
        'field'     => 'slug',
        'terms'     => $tax->slug
      )
    )
  );
  if (get_posts($args)) :
    ?>
    <div class="content_subcategories">
      <div class="content_cont_tit_h2 padding_class">
        <?php $category_link = get_category_link($tax->term_id); ?>
        <a href="<?php echo $category_link; ?>">
          <h2 class="content_cont_h2 bottom_line"><?php echo $tax->name; ?></h2>
          <div class="content_cont_h2_line"></div>
        </a>
      </div>
      <?php
      $taxonomyName = "categoriasTarjetas";
      $termchildren = get_term_children( $tax->term_id, $taxonomyName );
      //Si tiene subcategorias
      if(count($termchildren) > 0) {
        ?>
        <!-- Swiper -->
        <div class="swiper-container swiper-container2">
          <div class="swiper-wrapper">
            <?php
            foreach ($termchildren as $child) {
              $term = get_term_by( 'id', $child, $taxonomyName );
              $pages = get_posts(array(
                'post_type' => 'tarjetas',
                'numberposts' => -1,
                'post_status' => 'publish',
                'meta_key' => 'tipo_tarjeta',
                'meta_value' => 'encuesta', 
                'meta_compare' => '!=',
                'tax_query' => array(
                  array(
                    'taxonomy' => 'categoriasTarjetas',
                    'field' => 'term_id',
                    'terms' => $child, /// Where term_id of Term 1 is "1".
                    'include_children' => false
                  )
                )
              ));
              if(count($pages) > 0) {
                ?>
                <div class="swiper-slide" style="width: <?php $pages > 1 ? '90%' : '100%' ?>">
                  <a href="<?php echo get_term_link( $term->name, $taxonomyName ); ?>" style="position:relative;width: 100%;height: 100%;top: 0;left: 0;display: block;">
                    <?php
                    $image_l = get_term_meta($child, 'img_categoria', true);
                    ?>
                    <img loading="lazy" src="<?php echo $image_l; ?>" class="img_contenidos" />
                    <div class="tit_subcategory">
                      <h2 class="content_cont_h3 bottom_line pad"><?php echo $term->name; ?></h2>
                      <div class="content_cont_h3_line"></div>
                    </div>
                  </a>
                </div>
                <?php
              }
            }
            ?>
          </div>
          <?php if(count($termchildren) > 1){ ?>
            <div class="swiper-button-next swiper-button-next2"></div>
            <div class="swiper-button-prev swiper-button-prev2"></div>
          <?php } ?>
        </div>
        <?php
      } else {
        // var_dump($tax->name);
        $contenidos = get_posts(array(
          'post_type' => 'tarjetas',
          'numberposts' => -1,
          'post_status' => 'publish',
          'meta_key' => 'tipo_tarjeta',
            'meta_value' => 'encuesta', 
            'meta_compare' => '!=',
          'tax_query' => array(
            array(
              'taxonomy' => 'categoriasTarjetas',
              'field' => 'term_id',
              'terms' => $tax->term_id, /// Where term_id of Term 1 is "1".
              'include_children' => false
            )
          )
        ));
        // var_dump($contenidos);
        if(count($contenidos) > 0) {
          ?>
          <!-- Swiper -->
          <div class="swiper-container swiper-container3">
            <div class="swiper-wrapper">
              <?php
              foreach($contenidos as $contenido){
                ?>
                <div class="swiper-slide">
                  <a href="<?php echo get_permalink($contenido->ID); ?>" style="position:relative;width: 100%;height: 100%;top: 0;left: 0;display: block;">
                    <?php
                    $image_l = $image = wp_get_attachment_image_src(get_post_thumbnail_id($contenido->ID), 'single-post-thumbnail');;
                    ?>
                    <img loading="lazy" src="<?php echo $image_l[0]; ?>" class="img_contenidos" />
                    <div class="tit_subcategory">
                      <h2 class="content_cont_h3 bottom_line pad"><?php echo $contenido->post_title; ?></h2>
                      <div class="content_cont_h3_line"></div>
                    </div>
                  </a>
                </div>
                <?php
              }
              ?>
            </div>
            <?php if(count($contenidos) > 1){ ?>
            <div class="swiper-button-next swiper-button-next3"></div>
            <div class="swiper-button-prev swiper-button-prev3"></div>
            <?php } ?>
          </div>
          <?php
        }
      }
      ?>


    </div>
    <?php
  endif;
endforeach;
?>
<div class="questions_cont">
  <div class="questions_tit">PREGUNTAS FRECUENTES</div>
  <div>
    <div class="question_cont_list">
      <div class="question_cont_list_container">
        <?php
        $args = array(
          'post_type' => 'preguntas',
          'post_status' => 'publish',
          'posts_per_page' => '10'
        );
        $result = new WP_Query($args);
        if ($result->have_posts()) :
          while ($result->have_posts()) : $result->the_post();
            ?>
            <div data-hover="" data-delay="0" class="question_el w-dropdown">
              <div class="question_el_tit w-dropdown-toggle">
                <div class="question_el_tit_tit"><?php the_title(); ?></div>
              </div>
              <nav class="question_el_cont w-dropdown-list">
                <div class="question_el_cont_det">
                  <div class="question_el_p"><?php the_content(); ?></div>
                </div>
              </nav>
            </div>
            <?php
          endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </div>
      <a href="#" class="question_more w-inline-block">
        <img
        src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6019d40414f3a9c7135aa7ca_arrow_down.svg"
        loading="lazy" alt="" class="question_more_img" />
      </a>
    </div>
  </div>
</div>

<?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>

<script type="text/javascript">
  jQuery( document ).ready(function() {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
  });


  function fetch(){
    if(jQuery('#keyword').val() != ''){
      jQuery.ajax({
        url: MyAjax.url,
        type: 'post',
        data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
        success: function(data) {
          jQuery('#datafetch').show();
          jQuery('#datafetch').html( data );
        }
      });
    } else {
      jQuery('#datafetch').hide();
      jQuery('#datafetch').html();
    }
  }
  jQuery(function($) {
    $('.question_cont_list_container').scroll(function() {
      if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
        $( '.question_more' ).hide();
      //$('.question_cont_list_container').css("height", "225px");
    }else{
      $( '.question_more' ).show();
      //$('.question_cont_list_container').css("height", "180px");
    }
  });
  });


</script>

<script src="<?php echo JSURL ?>swiper/swiper.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper('.swiper-container.swiper-container1', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    loop: false,
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    }
  });

  var swiper2 = new Swiper('.swiper-container.swiper-container2', {
    slidesPerView: 'auto',
    spaceBetween: 10,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next.swiper-button-next2',
      prevEl: '.swiper-button-prev.swiper-button-prev2',
    },
  });
  
  var swiper3 = new Swiper('.swiper-container.swiper-container3', {
    slidesPerView: 'auto',
    spaceBetween: 10,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next.swiper-button-next3',
      prevEl: '.swiper-button-prev.swiper-button-prev3',
    },
  });
</script>

<!--DESKTOP-->

<?php } else {
  ?>
  <style>
      .content_cont.bg_content {
        max-width: 100% !important;
    }
    .swiper-container {
        width: 125% !important;
        margin-left: -12.5% !important;
    }
    .content_cont_h3.bottom_line {
      font-size: 32px;
    }
    .side_buttons_link.favorite {
      display: none;
    }
    .swiper-container.swiper-container1 {
      width: calc(100% + 40px);
      padding-top: 50px;
      padding-bottom: 30px;
      margin-left: -20px;
    }

    .swiper-container.swiper-container1 .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 300px;
      height: 220px;
      border-radius: 50%;
    }

    :root {
      --swiper-theme-color: white;
      --swiper-navigation-size: 28px;
    }

    .swiper-container-3d .swiper-slide-shadow-bottom, .swiper-container-3d .swiper-slide-shadow-left, .swiper-container-3d .swiper-slide-shadow-right, .swiper-container-3d .swiper-slide-shadow-top {
      border-radius: 50%;
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
      width: 100%;
      height: 200px;
    }
    
    .swiper-container.swiper-container3 {
      width: calc(100% + 40px);
      padding-top: 10px;
      padding-bottom: 10px;
      margin-left: -20px;
    }

    .swiper-container.swiper-container3 .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 100%;
      height: 200px;
    }
    .subtitle_contents{
      width: 50%;
    }
    .content_cont_tit_h1{
      width: 18%;
      margin-bottom: -25px;
    }

    .right_menu_el_link {
      font-family: 'Gatorade black', sans-serif;
      color: white;
      font-size: 18px;
      text-align: center;
      text-decoration: none;
      text-transform: uppercase;
    }
    .tit_subcategory{
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
      height: 105%;
      padding: 6px;
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
    }
    .question_cont_list {
      width: 100%;
      padding: 40px 60px 10px;
      border-radius: 30px;
      background-color: transparent;
      overflow-y: scroll;
      height: 213px;
      padding-left: 15%;
      padding-right: 15%;
    }
    .question_cont_list::-webkit-scrollbar {
      width: 1px;
    }
    .question_el_tit_tit {
      width: 100%;
      height: auto;
      font-family: 'Gatorade bold', sans-serif;
      color: white;
      font-size: 24px;
      font-weight: 700;
      text-transform: uppercase;
      white-space: pre-wrap;
      line-height: 26px;
    }
    .questions_tit {
    width: 35%;
    margin-bottom: 40px;
}
    .question_el{
      position: static;
      display: inline-block;
      width: 49%;
      height: auto;
    }

    .content_gen {
      background: black;
      background-image: url("<?php echo IMGURL ?>desktop/bg.png");
      background-position: 100% 100%;
      background-size: 100%;
      background-repeat: repeat-y;
      width: 100%;
    }
    .home {
      background-image: none !important;
      padding-right: 20px;
      padding-left: 20px;
    }
    /*.home_header{*/
    /*  padding-left:15%;*/
    /*  padding-right:15%;*/
    /*}*/
    /*.padding_class{*/
    /*  padding-left:15%;*/
    /*  padding-right:15%;*/
    /*}*/
    h2.content_cont_h2.bottom_line {
      font-size: 24px;
    }
    p.content_cont_p {
      font-size: 18px;
      line-height: 20px;
    }
    h1 {
      color: white;
      font-family: 'Gatorade black';
      font-weight: 900;
      font-style: normal;
      font-size: 25px;
      line-height: 25px;
      margin: 30px 0px;
      text-transform: uppercase;
    }
    .content_cont_h1_line {
      width: 45px;
      height: 3px;
      border-radius: 6px;
      background-color: #f47d30;
    }
    .bg_question_more{
      width: fit-content;
      position: relative;
      margin-right: auto;
      margin-left: auto;
      padding: 4px 18px 0px;
      border-radius: 30px;
      background-color: #f47d30;
      box-shadow: 1px 1px 19px 0 rgba(0, 0, 0, 0.39);
      text-align: center;
      margin-top: 25px;
    }
    .question_more_img {
      width: auto;
      height: 35px;
    }
  </style>
  <div class="content_cont bg_content">
      <!--<div class="home home_bg_black">-->

    <?php get_template_part( 'template-parts/desktop/header_black' ); ?>
    <div class="content_cont_tit_h1 padding_class">
      <h1 class="content_cont_h1 bottom_line">CONTENIDOS GATORADE</h1>
      <div class="content_cont_h1_line"></div>
    </div>
    <div class="subtitle_contents padding_class">
      <p class="content_cont_p">Encuentra todos los contenidos <br> que Gatorade tiene para ti</p>
    </div>

    <div class="content_categories">
      <div class="content_cont_tit_h2 padding_class">
        <h2 class="content_cont_h2 bottom_line ">CATEGORÍA DESTACADOS</h2>
        <div class="content_cont_h2_line"></div>
      </div>

      <!-- Swiper -->
      <div class="swiper-container swiper-container1">
        <div class="swiper-wrapper">
          <?php
          $args = array(
            'post_type' => 'tarjetas',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_key' => 'tipo_tarjeta',
            'meta_value' => 'encuesta', 
            'meta_compare' => '!=',
            'meta_query' => array(
              array(
                'key' => 'es_destacado',
                'value' => 'yes',
                'compare' => 'LIKE'
              )
            )
          );
         $result = new WP_Query($args);
          if ($result->have_posts()) :
            while ($result->have_posts()) : $result->the_post();
              ?>
              <div class="swiper-slide">
                <?php
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destacados');
                $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                $image_title = get_the_title(get_post_thumbnail_id($post->ID));
                ?>
                <a href="<?php echo the_permalink(); ?>" >
                  <div style="width:190px;height:190px;border-radius:50%;background:url(<?php echo $image[0] ?>);background-repeat:no-repeat;background-position:center;background-size:cover;">

                  </div>

              <!--   <img loading="lazy" src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>" style="border-radius: 50%;" />
              -->


            <!-- <?= wp_get_attachment_image(get_post_thumbnail_id($post->ID), array(400, 400) ); ?>
            <?php the_post_thumbnail( 'destacados' ); ?> -->
          </a>
        </div>
        <?php
      endwhile;
    endif;
    wp_reset_postdata();
    ?>
  </div>
  <?php if(count($image) > 5) { ?>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  <?php } ?>
</div>

</div>
<?php
global $post;

$current = get_the_ID($post->ID);
$cargs = array(
  'child_of'      => 0,
  'orderby'       => 'name',
  'order'         => 'ASC',
  'hide_empty'    => 0,
  'parent' => 0,
  'taxonomy'      => 'categoriasTarjetas',
);
foreach (get_categories($cargs) as $tax) :
  // List posts by the terms for a custom taxonomy of any post type
  $args = array(
    'post_type'         => 'tarjetas',
    'post_status'       => 'publish',
    'posts_per_page'    => -1,
    'meta_key' => 'tipo_tarjeta',
    'meta_value' => 'encuesta', 
    'meta_compare' => '!=',
    'orderby'           => 'title',
    'tax_query' => array(
      array(
        'taxonomy'  => 'categoriasTarjetas',
        'field'     => 'slug',
        'terms'     => $tax->slug
      )
    )
  );
  if (get_posts($args)) :
    ?>
    <div class="content_subcategories">
      <div class="content_cont_tit_h2 padding_class">
        <?php $category_link = get_category_link($tax->term_id); ?>
        <a href="<?php echo $category_link; ?>">
          <h2 class="content_cont_h2 bottom_line"><?php echo $tax->name; ?></h2>
          <div class="content_cont_h2_line"></div>
        </a>
      </div>
      <?php
      $taxonomyName = "categoriasTarjetas";
      $termchildren = get_term_children( $tax->term_id, $taxonomyName );
      //Si tiene subcategorias
      if(count($termchildren) > 0) {
        ?>
        <!-- Swiper -->
        <div class="swiper-container swiper-container2">
          <div class="swiper-wrapper">
            <?php
            foreach ($termchildren as $child) {
              $term = get_term_by( 'id', $child, $taxonomyName );
              $pages = get_posts(array(
                'post_type' => 'tarjetas',
                'numberposts' => -1,
                'post_status' => 'publish',
                'meta_key' => 'tipo_tarjeta',
                'meta_value' => 'encuesta', 
                'meta_compare' => '!=',
                'tax_query' => array(
                  array(
                    'taxonomy' => 'categoriasTarjetas',
                    'field' => 'term_id',
                    'terms' => $child, /// Where term_id of Term 1 is "1".
                    'include_children' => false
                  )
                )
              ));
              if(count($pages) > 0) {
                ?>
                <div class="swiper-slide">
                  <a href="<?php echo get_term_link( $term->name, $taxonomyName ); ?>" style="position:relative;width: 100%;height: 100%;top: 0;left: 0;display: block;">
                    <?php
                    $image_l = get_term_meta($child, 'img_categoria', true);
                    ?>
                    <img loading="lazy" src="<?php echo $image_l; ?>" class="img_contenidos" />
                    <div class="tit_subcategory">
                      <h2 class="content_cont_h3 bottom_line pad"><?php echo $term->name; ?></h2>
                      <div class="content_cont_h3_line"></div>
                    </div>
                  </a>
                </div>
                <?php
              }
            }
            ?>
          </div>
          <?php
          if(count($termchildren) > 3){
            ?>
            <div class="swiper-button-next swiper-button-next2"></div>
            <div class="swiper-button-prev swiper-button-prev2"></div>
            <?php
          }
          ?>
        </div>
        <?php
      } else {
        // var_dump($tax->name);
        $contenidos = get_posts(array(
          'post_type' => 'tarjetas',
          'numberposts' => -1,
          'post_status' => 'publish',
          'meta_key' => 'tipo_tarjeta',
            'meta_value' => 'encuesta', 
            'meta_compare' => '!=',
          'tax_query' => array(
            array(
              'taxonomy' => 'categoriasTarjetas',
              'field' => 'term_id',
              'terms' => $tax->term_id, /// Where term_id of Term 1 is "1".
              'include_children' => false
            )
          )
        ));
        // var_dump($contenidos);
        if(count($contenidos) > 0) {
          ?>
          <!-- Swiper -->
          <div class="swiper-container swiper-container3">
            <div class="swiper-wrapper">
              <?php
              foreach($contenidos as $contenido){
                ?>
                <div class="swiper-slide">
                  <a href="<?php echo get_permalink($contenido->ID); ?>" style="position:relative;width: 100%;height: 100%;top: 0;left: 0;display: block;">
                    <?php
                    $image_l = $image = wp_get_attachment_image_src(get_post_thumbnail_id($contenido->ID), 'single-post-thumbnail');;
                    ?>
                    <img loading="lazy" src="<?php echo $image_l[0]; ?>" class="img_contenidos" />
                    <div class="tit_subcategory">
                      <h2 class="content_cont_h3 bottom_line pad"><?php echo $contenido->post_title; ?></h2>
                      <div class="content_cont_h3_line"></div>
                    </div>
                  </a>
                </div>
                <?php
              }
              ?>
            </div>
            <?php if(count($contenidos) > 3) { ?>
            <div class="swiper-button-next swiper-button-next3"></div>
            <div class="swiper-button-prev swiper-button-prev3"></div>
            <?php } ?>
          </div>
          <?php
        }
      }
      ?>


    </div>
    <?php
  endif;
endforeach;
?>
<div class="questions_cont">
  <div class="questions_tit">PREGUNTAS FRECUENTES</div>
  <div class="question_cont_list">
    <?php
    $args = array(
      'post_type' => 'preguntas',
      'post_status' => 'publish',
      'posts_per_page' => '10'
    );
    $result = new WP_Query($args);
    if ($result->have_posts()) :
      while ($result->have_posts()) : $result->the_post();
        ?>
        <div data-hover="" data-delay="0" class="question_el w-dropdown">
          <div class="question_el_tit w-dropdown-toggle">
            <div class="question_el_tit_tit"><?php the_title(); ?></div>
          </div>
          <nav class="question_el_cont w-dropdown-list">
            <div class="question_el_cont_det">
              <div class="question_el_p"><?php the_content(); ?></div>
            </div>
          </nav>
        </div>
        <?php
      endwhile;
    endif;
    wp_reset_postdata();
    ?>

  </div>
</div>
<div class="bg_question_more">
  <img
  src="<?php echo IMGURL ?>desktop/arrow_down.png"
  loading="lazy" alt="" class="question_more_img" />

</div>
<?php get_template_part( 'template-parts/desktop/footer' ); ?>
</div>



<script type="text/javascript">
  jQuery( document ).ready(function() {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
    jQuery('.swiper-button-next2').removeClass('swiper-button-disabled');
    jQuery('.swiper-button-prev2').removeClass('swiper-button-disabled');
  });

  jQuery(function($) {
    $('.question_cont_list').scroll(function() {
      if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
        $( '.bg_question_more' ).hide();
      }else{
        $( '.bg_question_more' ).show();
      }
    });
  });

  function fetch(){
    if(jQuery('#keyword').val() != ''){
      jQuery.ajax({
        url: MyAjax.url,
        type: 'post',
        data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
        success: function(data) {
          jQuery('#datafetch').show();
          jQuery('#datafetch').html( data );
        }
      });
    } else {
      jQuery('#datafetch').hide();
      jQuery('#datafetch').html();
    }
  }
</script>

<script src="<?php echo JSURL ?>swiper/swiper.js"></script>

<!-- Initialize Swiper -->
<script>

  const swiper = new Swiper('.swiper-container.swiper-container1', {
    grabCursor: true,
    centeredSlides: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    loop: false,
    slidesPerView: 5,
    spaceBetween: 30
  });

  const swiper2 = new Swiper('.swiper-container.swiper-container2', {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next.swiper-button-next2',
      prevEl: '.swiper-button-prev.swiper-button-prev2',
    },
    on: {
      init: function () {
        jQuery('.swiper-button-next2').removeClass('swiper-button-disabled');
        jQuery('.swiper-button-prev2').removeClass('swiper-button-disabled');        
      }
    },
  });
  
  const swiper3 = new Swiper('.swiper-container.swiper-container3', {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next.swiper-button-next3',
      prevEl: '.swiper-button-prev.swiper-button-prev3',
    },
    on: {
      init: function () {
        jQuery('.swiper-button-next3').removeClass('swiper-button-disabled');
        jQuery('.swiper-button-prev3').removeClass('swiper-button-disabled');        
      }
    },
  });

</script>
<?php
}
?>
<?php
//Pixel
echo get_option('pixel_categorias');
get_footer();

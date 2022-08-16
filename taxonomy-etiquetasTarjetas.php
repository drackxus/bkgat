<?php
/**
* A Simple Category Template
*/
 
get_header(); ?> 
<style>
    .side_buttons_link.favorite {
    display: none;
}
.content_cont.bg_content {
    background: black;
    background-image: url("https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6019d7147421c12649fe479c_shutterstock_291093752.png");
    background-position: 100% 100%;
    background-size: 100%;
    background-repeat: repeat-y;
    padding-top: 50px !important;
}
.search_cont_form_btn.drop_btn:hover {
    background-image: url(https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6019e0956f4bcf4c0c307c40_arrow_down2.svg), linear-gradient(
58deg
, #000000, #000000);
}
</style>
<?php 
if(wp_is_mobile()){
?>
<style>
.res_taxonomy {
    padding:3px;
    position: relative;
    width: 49%;
    height: 130px;
    top: 0;
    left: 0;
    display: block;
    background: black;
    margin: 4px;
}
.res_taxonomy:nth-child(even) {
  margin-right: 0px;
  margin-left: 3px;
}
.res_taxonomy:nth-child(odd) {
  margin-left: 0px;
  margin-right: 3px;
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
.content_cont.bg_content{
	padding-bottom: 0px;
}
.bg_footer{
	background:black;
    padding:30px 0px;   
    justify-content: space-around;
    display: flex;
}
.topics_more_cont{
    background-color: transparent;
}

.foot_cont{
margin:0px;
}

</style>
<div class="content_cont bg_content">
<div style="display:flex; width:100%;">
	<div class="content_cont_tit_h1"  >
        <h1 class="content_cont_h1 bottom_line" style="margin-top:50px"><?php $tax = $wp_query->get_queried_object(); echo $tax->name; ?></h1>
        <div class="content_cont_h1_line"></div>
    </div>
    
   </div>
   <div class="search_topics_cont" style="display:flex; ">
        <div data-hover="" data-delay="0" class="search_topics_drop w-dropdown">
        	<div class="search_topics_drop_toggle w-dropdown-toggle">
                <div class="search_cont_form_btn drop_btn"></div>
                <div class="search_topics_drop_txt">Selecciona un tema</div>
            </div>
            <nav class="search_topics_result w-dropdown-list">
              <?php 
              $terms = get_terms( array(
                  'taxonomy' => 'etiquetasTarjetas',
                  'hide_empty' => true,
              ) );
              foreach ( $terms as $term ) { ?>
              <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="search_topics_result_el w-dropdown-link"><?php echo $term->name; ?></a>
              <?php
              }
              ?>
            </nav>
        </div>
    </div>
    <div class="content_subcategories fullw">
        <div class="topics_cont">
          <?php 
          if ( have_posts() ) : 
          while ( have_posts() ) : the_post(); 
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
          else: ?>
          <p>Lo sentimos. No hay contenido disponible</p>
          <?php endif; ?>
        </div>
    </div>
    <a href="#" class="topics_more_cont w-inline-block">
      <img
            src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6019e0956f4bcf4c0c307c40_arrow_down2.svg"
            loading="lazy" alt="" class="topisc_more_cont_img" />
    </a>
    
</div>
<div class="bg_footer">
    <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>


<?php
} else {
?>
<style>

/*.content_cont.bg_content {*/
/*    padding-right: 15%;*/
/*    padding-left: 15%;*/
/*}*/
.res_taxonomy {
    padding:3px;
    position: relative;
    width: 32%;
    height: 160px;
    top: 0;
    left: 0;
    display: block;
    background: black;
    margin: 4px;
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
</style>
<div class="content_cont bg_content">
<?php get_template_part( 'template-parts/desktop/header_black' ); ?>
<div style="display:flex; width:100%; margin-top:60px">
	<div class="content_cont_tit_h1" style="width:70%;" >
        <h1 class="" style=" margin-bottom:15px;
    font-size: 30px;"><?php $tax = $wp_query->get_queried_object(); echo $tax->name; ?></h1>
        <div class="content_cont_h1_line"></div>
    </div>
    
   <div class="search_topics_cont" style="display:flex; width:40%; margin-top:25px;">
        <div data-hover="" data-delay="0" class="search_topics_drop w-dropdown">
        	<div class="search_topics_drop_toggle w-dropdown-toggle">
                <div class="search_cont_form_btn drop_btn"></div>
                <div class="search_topics_drop_txt">Selecciona un tema</div>
            </div>
            <nav class="search_topics_result w-dropdown-list">
              <?php 
              $terms = get_terms( array(
                  'taxonomy' => 'etiquetasTarjetas',
                  'hide_empty' => true,
              ) );
              foreach ( $terms as $term ) { ?>
              <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="search_topics_result_el w-dropdown-link"><?php echo $term->name; ?></a>
              <?php
              }
              ?>
            </nav>
        </div>
    </div>
    
   </div>
    <div class="content_subcategories fullw">
        <div class="topics_cont">
          <?php 
          if ( have_posts() ) : 
          while ( have_posts() ) : the_post(); 
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
          else: ?>
          <p>Lo sentimos. No hay contenido disponible</p>
          <?php endif; ?>
        </div>
    </div>
    
	<?php get_template_part( 'template-parts/desktop/footer' ); ?>
</div> 

<?php
}
?>
 <script>
     jQuery( document ).ready(function() {
        jQuery('.header_nav_close').css('display', 'flex');
        jQuery('.header_nav_close').attr('href', '<?php echo home_url('tarjetas'); ?>');
    });
 </script>
<?php get_footer(); ?>
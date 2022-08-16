<?php

/**
 * Template Name: Contacto
 *
 * @package WordPress
 */

get_header();

?>
<style>
    .side_buttons_link.favorite {
    display: none;
}
</style>
<div class="content_cont bg_contact">
  <div class="contact_cont">
    <div class="content_cont_tit_h1 center">
      <h1 class="content_cont_h1 center">CONTACTO</h1>
      <div class="content_cont_h1_line"></div>
    </div>
    <?php
                $args = array(
                    'post_type' => 'promociones',
                    'post_status' => 'publish',
                    'posts_per_page' => '10',
                );
                $result = new WP_Query($args);
                if ($result->have_posts()) :
                    while ($result->have_posts()) : $result->the_post();
                ?>
<h1><?php echo the_title(); ?></h1>
<?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
  </div>
  <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>

<?php

get_footer();
?>

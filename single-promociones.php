<?php


get_header(); 

global $post;

?>
<style>
    .side_buttons_link.favorite {
    display: none;
}
</style>
<div class="content_cont">
    <?php echo the_content(); ?>
    <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>

<?php
get_footer();

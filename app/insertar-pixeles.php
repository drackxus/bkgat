<?php
add_action('wp_head','pixeles', 20);
function pixeles() {
?>
        <!-- Pixeles Code --> 
        <?php echo get_option('pixel_facebook'); ?>
        <?php echo get_option('pixel_google_ads'); ?>
        <?php echo get_option('pixel_dv360'); ?>
        <!-- End Pixeles Code -->
<?php
}























































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































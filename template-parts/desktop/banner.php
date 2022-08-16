<div class="home_banner">
    <?php
    if(get_option('banner_home_desktop')){
    ?>
    <img src="<?php echo get_option('banner_home_desktop'); ?>" loading="lazy" alt="Banner home" class="home_banner_img" title="Banner home">
    <?php } ?>
</div>
<?php

/**
 * Displays top navigation
 *
 * @package WordPress
 * 
 */


global $current_user;
wp_get_current_user();
if (is_user_logged_in()) {
    $loginUser = "true";
    $nameUser = $current_user->user_login;
} else {
    $loginUser = false;
}
?>
<style>
.header_nav_logo_img {
    width: 78%;
    padding-left: 4px;
    padding-top: 5px;
    height: auto;
}
.header_nav_nav_img {
    width: 70%;
    height: auto;
}
</style>
<script type="text/javascript">
 jQuery( document ).ready(function() {
    jQuery('#open_menu').click(function(){
        jQuery('.menu_over').css('display', 'block');
        jQuery('.header_nav_close').css('display', 'block'); 
        jQuery('.favorite').css('display', 'none'); 
        setTimeout(function(){ 
            fullpage_api.setAutoScrolling(false);
        }, 500);
    });


    jQuery('.header_nav_close').click(function(){
        fullpage_api.setAutoScrolling(true);
        setTimeout(function(){ 
            jQuery('.header_nav_close').css('display', 'none');
            jQuery('.menu_over').css('display', 'none');
            jQuery('.favorite').css('display', 'flex');
        }, 500);
    });
});
</script>
<!-- Navigation  -->
<div class="header">
    <div class="header_nav">
        <div class="header_nav_left">
            <div class="header_nav_logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo IMGURL ?>logo.png" width="150" height="45" loading="lazy" alt="" class="header_nav_logo_img" />
                </a>
            </div>
            <div class="header_nav_nav">
                <a id="open_menu" style="padding-top:5px">
                    <img src="<?php echo IMGURL ?>menu.png" width="130" height="35" loading="lazy" alt="" class="header_nav_nav_img" />
                </a>
            </div>
        </div>
        <div class="header_nav_right">
            <a class="header_nav_close w-inline-block">
                <img src="<?php echo IMGURL ?>close.png" width="150" height="auto" loading="lazy" alt="" class="header_nav_close_img" />
            </a>
        </div>
    </div>
</div>
<!-- Navigation  -->
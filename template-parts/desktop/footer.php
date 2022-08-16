<style>
.fixed_bottom {
    width: 210px;
    transition: width 500ms;
    padding-bottom: 15px;
    padding-top: 15px;
}
.fixed_bottom_a {
    width: 120px !important;
    margin-left: 42px;
}
.fixed_bottom_a_img {
    width: 120px !important;
    display: block;
    margin: 0 auto;
}
.fixed_bottom_more {
    position: relative;
    right: -27px;
    width: 25px !important;
    margin-right: 10px;
    margin-left: 10px;
}
.fixed_bottom.activeMenu {
    width: 760px;
}
.fixed_bottom_more {
    width: 24px;
    height: 24px;
    background: url(<?php echo IMGURL ?>more_bottom.svg);
    background-repeat: no-repeat;
    background-size: cover;
    background-repeat: no-repeat;
}

.fixed_bottom_more.activeMenuImg {
    background: url(<?php echo IMGURL ?>less_bottom.svg);
    background-repeat: no-repeat;
    background-size: cover;
    background-repeat: no-repeat;
    right: -5px;
    width: 24px !important;
    height: 24px !important;
}
</style>
<div class="fixed_bottom">
    <?php if(get_option('gatorade')) { ?>
    <a href="<?php echo get_option('gatorade'); ?>" class="fixed_bottom_a w-inline-block" style="padding-top: 4px;
    margin-top: 4px;">
        <img
        src="<?php echo IMGURL ?>logo_gatorade_white.png"
        loading="lazy"
        alt=""
        class="fixed_bottom_a_img" />
    </a>
    <?php } ?>
    <a class="fixed_bottom_more w-inline-block">
    </a>
    <ul role="list" class="fixed_bottom_menu" style="display:none;">

        <li class="fixed_bottom_menu_el" style="border-left:0px;">
            <a href="<?php echo home_url('contacto'); ?>" class="bottom_menu_el_link">CONTACTO</a>
        </li>
        <li class="fixed_bottom_menu_el">
            <a href="<?php echo get_option('politica_privacidad'); ?>" class="bottom_menu_el_link">AVISO DE PRIVACIDAD</a>
        </li>
        <?php if(get_option('trabaja')) { ?>
        <style>
            .fixed_bottom.activeMenu {
               width: 950px;
            }
        </style>
        <li class="fixed_bottom_menu_el">
            <a href="<?php echo get_option('trabaja'); ?>" class="bottom_menu_el_link">TRABAJA CON NOSOTROS</a>
        </li>
        <?php } ?>
        <li class="fixed_bottom_menu_el">
            <a href="<?php echo get_option('terminos_condiciones'); ?>" class="bottom_menu_el_link">TÉRMINOS Y CONDICIONES</a>
        </li>
    </ul>
</div>
<script>
    jQuery( document ).ready(function() {
        jQuery(document).on("click", ".fixed_bottom_more",function() {
            jQuery(this).toggleClass('activeMenuImg');
            jQuery('.fixed_bottom').toggleClass('activeMenu');
            if(jQuery('.fixed_bottom').hasClass('activeMenu')) {
                setTimeout(function(){ 
                    jQuery('.fixed_bottom_menu').css('display', 'flex');
                }, 500);
            } else {
                jQuery('.fixed_bottom_menu').css('display', 'none');
            }
            
        });
    });
</script>
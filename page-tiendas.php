<?php

/**
 * Template Name: Lista Tiendas
 *
 * @package WordPress
 */

get_header();


  global $current_user;
  wp_get_current_user();
    $idProduct = $_GET['idProducto'];
    if(isset($idProduct)){
        //echo $idProduct;
        $getProduct = get_post_meta($idProduct, 'nombre_partner1', true);
        //var_dump($getProduct);
    }else{
        echo 'No se encontro';

    }

?>
<?php 
get_header(); ?>
<style>
    .menu_cont_h2_line.left {
        margin-right: 0px;
        margin-left: 1% !important;
    }
    .menu_cont_h2_line {
        margin-right: 0px;
        margin-left: 1% !important;
    }
    .list_shops_el.w50{
        margin-bottom: 20px;
    }
    .list_shops_el {
        display: flex;
        width: 183px;
        height: 68px;
        justify-content: center;
        align-items: center;
        border-radius: 50px;
        background-color: #fff;
        box-shadow: -4px 4px 10px 0 rgba(0, 0, 0, 0.23);
        margin-bottom: 0px;
    }
    .list_shops_el a {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100px;
    }
    .list_shops_el img {
        max-width: 80px;
    }
    .side_buttons_link.favorite {
        display: none;
    }
    .menu_cont_h2 {
        margin-bottom: 0px;
        font-family: 'Gatorade black', sans-serif;
        color: black;
        font-size: 24px;
        line-height: 38px;
        font-weight: 900;
        text-align: left;
    }
    .flexbox-container {
            display: -ms-flex;
            display: -webkit-flex;
            display: flex;
    }

    .flexbox-container > div {
            width: 50%;
            padding: 10px;
    }

    .flexbox-container > div:first-child {
            margin-right: 20px;
}
</style>
<?php
        if(wp_is_mobile()){
    ?>
    <style>
  
        .content_cont.menu_bg.shops_bg {
            background-position: 50% 425px, 50% 0px;
            background-size: 100% 500px, 100%;
        }
        .list_shops_el {
            display: flex;
            width: 175px;
            height: 75px;
            justify-content: center;
            align-items: center;
            border-radius: 50px;
            background-color: #fff;
            box-shadow: -4px 4px 10px 0 rgba(0, 0, 0, 0.23);
            margin-left: 20px;
        }
        .menu_cont_h2{
            color: #fff;
        }
        .list_shops_el img {
            max-width: 67px;
        }
        .menu_cont_h2_line.left {
            margin-right: 0px;
            margin-left: 7%;
        }
        .shops_-partners {
            margin-top: 143px;
        }
    </style>      
    <div class="content_cont menu_bg shops_bg">
            
        <?php }else{ ?>
            <style>
                .footer_shop{
                    padding-top: 8%;
                }
            </style>
            <div class="home">
            <?php get_template_part( 'template-parts/desktop/header' ); ?>
    <?php get_template_part( 'template-parts/desktop/banner' ); ?>
        <?php }
    ?>

    <div class="menu_cont">
        <div class="menu_cont_user">
        <?php
            if(get_post_meta($idProduct, 'url_tienda1', true) && get_post_meta($idProduct, 'nombre_tienda1', true)){
            $tiendas = 1;
           ?>
        <h2 class="menu_cont_h2">ELIGE TU TIENDA FAVORITA</h2>
        <div class="menu_cont_h2_line left"></div>
        
        <?php } else{?>
        
        <style>
            .shops_-partners {
                margin-top: 303px;
            }
            .menu_cont_h2_line.left {
                display: none;
            
        }
        </style>
        
        <?php }?>
        </div>
        <div class="list_shops">
           <?php
            if(get_post_meta($idProduct, 'url_tienda1', true) && get_post_meta($idProduct, 'nombre_tienda1', true)){

           ?>
            <div class="flexbox-container">
                <div>
                        <div class="list_shops_el">
                            <a href="<?php echo get_post_meta($idProduct, 'url_tienda1', true); ?>" target="_blank">
                                <!--<h2 style="color:black"> /*<?php echo get_post_meta($idProduct, 'nombre_tienda1', true); ?>  </h2>-->
                                <img src="<?php echo get_post_meta($idProduct, 'logo_tienda1', true); ?>" alt="">

                            </a>
                        </div>
                    </div>
            </div>    
            <?php
            }
            ?>
            <?php
            if(get_post_meta($idProduct, 'url_tienda2', true) && get_post_meta($idProduct, 'nombre_tienda2', true)){
            
       
           ?>
                       <style>
            .shops_-partners {
                margin-top: 68px;
            }
            
        </style>
            <div class="flexbox-container">
                <div>
                        <div class="list_shops_el">
                            <a href="<?php echo get_post_meta($idProduct, 'url_tienda2', true); ?>" target="_blank">
                                <!--<h2 style="color:black"> /*<?php echo get_post_meta($idProduct, 'nombre_tienda2', true); ?>  </h2>-->
                                <img src="<?php echo get_post_meta($idProduct, 'logo_tienda2', true); ?>" alt="">

                            </a>
                        </div>
                    </div>
            </div>    
            <?php
            }
            ?>
            <?php
            if(get_post_meta($idProduct, 'url_tienda3', true) && get_post_meta($idProduct, 'nombre_tienda3', true)){

           ?>
            <div class="flexbox-container">
                <div>
                        <div class="list_shops_el">
                            <a href="<?php echo get_post_meta($idProduct, 'url_tienda3', true); ?>" target="_blank">
                                <!--<h2 style="color:black"> /*<?php echo get_post_meta($idProduct, 'nombre_tienda3', true); ?>  </h2>-->
                                <img src="<?php echo get_post_meta($idProduct, 'logo_tienda3', true); ?>" alt="">

                            </a>
                        </div>
                    </div>
            </div>    
            <?php
            }
            ?>
        </div>
    </div>
    <div class="shops_-partners">
        <div class="menu_cont_user">
         <?php
            if(get_post_meta($idProduct, 'url_partner1', true) && get_post_meta($idProduct, 'nombre_partner1', true)){

           ?>
        <h2 class="menu_cont_h2">PARTNERS ONLINE</h2>
        <div class="menu_cont_h2_line"></div>
      
        
        <?php } else {?>
        
        <style>
            .menu_cont_h2_line{
                display:none;
            }
        </style>
        <?php } ?>
        </div>
    </div>
    <div class="lists_partners">
        <?php
            if(get_post_meta($idProduct, 'url_partner1', true) && get_post_meta($idProduct, 'nombre_partner1', true)){

        ?>
        <div class="list_shops_el w50">
            <a href="<?php echo get_post_meta($idProduct, 'url_partner1', true); ?>" target="_blank">
                <!--<h2 style="color:black"> /*<?php echo get_post_meta($idProduct, 'nombre_partner1', true); ?>  </h2>-->
                <img src="<?php echo get_post_meta($idProduct, 'logo_partner1', true); ?>" alt="">

            </a>
        </div>
        <?php
            }
        ?>
        <?php
            if(get_post_meta($idProduct, 'url_partner2', true) && get_post_meta($idProduct, 'nombre_partner2', true)){

        ?>
        <div class="list_shops_el w50">
            <a href="<?php echo get_post_meta($idProduct, 'url_partner2', true); ?>" target="_blank">
                <!--<h2 style="color:black"> /*<?php echo get_post_meta($idProduct, 'nombre_partner2', true); ?>  </h2>-->
                <img src="<?php echo get_post_meta($idProduct, 'logo_partner2', true); ?>" alt="">

            </a>
        </div>
        <?php
            }
        ?>
        <?php
            if(get_post_meta($idProduct, 'url_partner3', true) && get_post_meta($idProduct, 'nombre_partner3', true)){

        ?>
        <div class="list_shops_el w50">
            <a href="<?php echo get_post_meta($idProduct, 'url_partner3', true); ?>" target="_blank">
                <!--<h3 style="color:black"> /*<?php echo get_post_meta($idProduct, 'nombre_partner3', true); ?>  </h3>-->
                <img src="<?php echo get_post_meta($idProduct, 'logo_partner3', true); ?>" alt="">

            </a>
        </div>
        <?php
            }
        ?>
    </div>
    <div class="footer_shop">
        <?php
            if(wp_is_mobile()){
        ?>        
                <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
            <?php }else{ ?>
                <?php get_template_part( 'template-parts/desktop/footer' ); ?>
            <?php }
        ?>
    </div>
    
    </div>
    


<script type="text/javascript">
 jQuery( document ).ready(function() {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url('productos'); ?>');
});
</script>
<?php
get_footer();
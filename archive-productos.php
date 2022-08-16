<?php 
get_header(); 
?>
<!-----Productos Latam ----->
<?php
if( get_bloginfo()=="Latinoamérica" || get_bloginfo()=="Argentina")
{
    if(wp_is_mobile())
    {
    ?>
    <link rel="stylesheet" href="<?php echo CSSURL ?>swiper/swiper.css">
    <style>
    .foot_cont { 
        padding-right: 18px;
        padding-left: 18px;
        margin-top: 5px;
    }
    .content_cont{
        padding-right: 0;
        padding-left: 0;
        padding-top:0;
    }
    .swiper-button-next, .swiper-button-prev {
     display:none;   
    }
    .side_buttons_link.favorite {
        display: flex;
    }
    .content_cont.fdn_pro {
        padding-top: 0px;
        background-image: url(<?php echo IMGURL ?>temp/BackgroundColorBlue.jpg) !important;
        background-position: top top !important;
        background-size: 100% !important;
        background-repeat: no-repeat !important;
    }
    .swiper-container.swiper-container3 {
        width: 100%;
        padding-top: 20px;
        padding-bottom: 30px;
        margin-left: -20px;
        background-image: url(https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602300930367ca581721d17d_bg_product.png);
        background-position: 0% 62%;
        background-size: 100% 70%;
        background-repeat: no-repeat;
    }
    .swiper-slide{
        width:23px;
    }
    .swiper-container.swiper-container3 .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 170px;
        /* height: 220px; */
    }
    
    :root {
        --swiper-theme-color: white;
        --swiper-navigation-size: 28px;
    }
    
    .swiper-container-3d .swiper-slide-shadow-left {
        background-image: linear-gradient(to left,rgb(0 0 0 / 2%),rgba(0,0,0,0));
    }
    
    .swiper-container-3d .swiper-slide-shadow-right {
        background-image: linear-gradient(to right,rgb(0 0 0 / 2%),rgba(0,0,0,0));
    }
    
    .tit_product {
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    
    .tit_product img {
        width: 30px;
        margin-right: 5px;
    }
    
    .tit_product h2 {
        margin-top: 0px;
    }
    @media screen and (max-width: 767px){}
    .products_el_tit {
        font-size: 19px;
        min-height: 64px;
        height:85px;
        
    }
    .content_cont_h1_line{
    	background-color: white;
    }
    .container_products{
    	margin-top: 8.5%;
        justify-content: center;
        display: block;
        position: absolute;
        width: 100%;
        align-items: center;
        height: 100%;
    }
    .product_img{
        max-width: 100%;
        max-height: 75vh;
        display: block;
        padding-top: 23%;
        margin: auto;
    }
    
    .swiper-container.swiper-container3 {
        //width: calc(100% + 40px);
        width:65%;
        
        padding-top: 20px;
        padding-bottom: 30px;
    }
    
    .swiper-container.swiper-container3 .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 100px;
        /* height: 220px; */
    }
    
    :root {
        --swiper-theme-color: white;
        --swiper-navigation-size: 28px;
    }
    
    .swiper-container-3d .swiper-slide-shadow-left {
        background-image: linear-gradient(to left,rgb(0 0 0 / 2%),rgba(0,0,0,0));
    }
    
    .swiper-container-3d .swiper-slide-shadow-right {
        background-image: linear-gradient(to right,rgb(0 0 0 / 2%),rgba(0,0,0,0));
     }
    .swiper-button-next{
       margin-right:0%;
       padding-bottom: 40px;
    }
    .swiper-button-prev{
      margin-left:0%;
      padding-bottom: 40px;
    }
    
    .tit_product {
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    
    .tit_product img {
        width: 30px;
        margin-right: 5px;
    }
    
    .tit_product h2 {
        margin-top: 0px;
    }
    @media screen and (max-width: 767px){}
    .products_el_tit {
        font-size: 19px;
        min-height: 64px;
        
    margin:0px;
    }
    .content_cont_h2_line.white {
        background-color: #f47d30;
    }
    .content_cont_h2 {
        font-family: 'Gatorade black', sans-serif;
        color: black;
        line-height: 34px;
        font-weight: 900;
    }
    .bg-products-latam{
    	position: relative;
        z-index: 1;
        justify-content: center;
        display: block;
    }
    .img_products_latam{
    	z-index: -1;
        position: absolute;
    }
    .content_subcategories {
        width: 100%;
        height: auto;h
        margin-top: 50px;
        display:none;
        margin-bottom: 75px;
    }
    .container_products{
        margin-top: 10%;
        justify-content: center;
        display: block;
        position: absolute;
        width: 100%;
        align-items: center;
        max-height: 100%;
    }
    p::-webkit-scrollbar {
        width: 4px;
    }
    .swiper-container{
        width: 100%;
        height: 150vh;
    }
    .content_subcategories{
        display:block;   
    }
    .text_container_pr{
        margin: 0 8% 0 8%;
        overflow-y: auto;
        min-height: 230px;
        max-height: 300px;
    }
    .text_container_pr::first-child {
        padding-top:0px;
        margin-top:0px;
    }   
    .text_container_pr  p{
        font-size: 5.2vw;
        line-height: 5.3vw;
        word-break: break-word;
        text-align: center;
    }
    .text_container_pr::-webkit-scrollbar {
      width: 2px;
    }
    .text_container_pr::-webkit-scrollbar-thumb {
      background: rgb(224, 217, 201 ,0.8); 
    }
    .name_title_prod{
        
    font-family: 'Gatorade black';
        text-transform: uppercase;
        color:white;
        font-size: 19px;
        text-align: center;
        margin-top: 30px;
    }
    
    strong {
        font-family: 'Gatorade black', sans-serif;
    }
    .slogan{
        position: absolute;
        right: 10px;
        background-color:black;
        margin-top: 65%;
        font-size: 13px;
        line-height: 12px;
        padding: 4px 8px;
        font-family: 'Gatorade black';
    }
    .swiper-pagination-bullet {
        width: 15px;
        height: 16px;
        display: inline-block;
        border-radius: 50%;
        background: #737373;
        opacity: 1;
     }
     .swiper-pagination-bullet:not(:last-child) {
        margin-right:8px;
    }
    .swiper-pagination-bullet-active {
        opacity: 1;
        background: #343434;
    }
    .swiper-pagination-bullets{
        color: black;
        width: 30vw;
        height: 20px;
        background-color: #FFFFFF;
        border-radius: 50px;
        justify-content: center;
        display: flex;
        align-content: center;
        align-items: center;
    }
    </style>
    <div class="content_cont ">
        
        <?php
            global $post;
    
            $current = get_the_ID($post->ID);
            
                // List posts by the terms for a custom taxonomy of any post type   
                $args = array(
                    'post_type'         => 'productoslatam',
                    'post_status'       => 'publish',
                    'posts_per_page'    => -1,
                    'orderby'           => 'title',
                );
        ?>
        <div class="swiper-container">
            <div class="swiper-wrapper">
    
        <?php
        	$result = new WP_Query($args);
                //var_dump($result);
                if ($result->have_posts()) :
                    while ($result->have_posts()) : $result->the_post();
                     //var_dump($post->ID);
                    ?>
                        <div class="swiper-slide">
                            <?php
                              //var_dump($post->ID);
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                ?>
                                
                                <div class="" style="background:url('<?php echo get_post_meta($post->ID, 'bg_mobile', true); ?>'); background-size:cover; background-position: top center;">
                                    <!--<img class="img_products_latam" src="<?php echo get_post_meta( $post->ID, 'bg_mobile', true);?>" loading="lazy" alt="">-->
                                    
                                    	<div style="display:block; width: auto; position: relative;">
                                    	<span class="slogan">LA BEBIDA <br> DEPORTIVA <br> #1 DEL MUNDO</span>
                                            <img class="product_img" style="" src="<?php echo $image[0]; ?>" loading="lazy" alt="">
                                            <div style=" display: flex;
                                                justify-content: center;
                                                align-content: center;
                                                margin: auto;">
                                                <div class="swiper-pagination"></div>
                                                <br>
                                                <div class="name_title_prod">
                                                <?php 
                                                echo the_title();
                                                ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div style="word-break:break-word; margin: 0 0 auto 0; ">
                                            <div class="text_container_pr"><?php 
                                            echo the_content();
                                            ?>
                                            </div>
                            
                                        </div>                
                                    
                                </div>
                                
<?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
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
    
    <script type="text/javascript">
     jQuery( document ).ready(function() {
        jQuery('.header_nav_close').css('display', 'flex');
        jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
    });
    </script>
    
    <script src="<?php echo JSURL ?>swiper/swiper.js"></script>
    
      <!-- Initialize Swiper -->
      <script>
        var swiper3 = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
          loop: true,
          slidesPerView: 1,
          spaceBetween: 0,
          pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
          }
        
        });
        
      </script>
    
    <?php
    }else{
    ?>
    <style>
        @media screen and (min-width: 1780px){
            .container_products {
                max-height: 18vw !important;
            }
            .text_container_pr p {
                font-size: 0.7vw !important;
                line-height: 0.8vw !important;
            }
            .swiper-pagination-bullets {
                width: 6vw !important;
            }
            .text_container_pr {
                height: 20vw !important;
            }
            .slogan {
                position: relative !important;
            }
        }
        body#Latinoamérica .home.home_bg_black {
            width: 100%;
            padding: 0px !important;
            margin: 0px !important;
            max-width: 100% !important;
        }
        .home{
            padding-right: 0;
            padding-left: 0;
            
        }
        .home_header{
            padding-right: 15%;
            padding-left: 15%;
        }
        .side_buttons_link.favorite {
        display: none;
    	}
        .content_subcategories{
            background-image: url(<?php echo IMGURL ?>temp/BackgroundColorBlueconpalabra.jpg);
            background-position: 50% 50%;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
    <link rel="stylesheet" href="<?php echo CSSURL ?>swiper/swiper.css">
    <style>
    
    .swiper-container.swiper-container3 {
        //width: calc(100% + 40px);
        width:65%;
        
        padding-top: 20px;
        padding-bottom: 30px;
    }
    
    .swiper-container.swiper-container3 .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 100px;
        /* height: 220px; */
    }
    
    :root {
        --swiper-theme-color: white;
        --swiper-navigation-size: 28px;
    }
    
    .swiper-container-3d .swiper-slide-shadow-left {
        background-image: linear-gradient(to left,rgb(0 0 0 / 2%),rgba(0,0,0,0));
    }
    
    .swiper-container-3d .swiper-slide-shadow-right {
        background-image: linear-gradient(to right,rgb(0 0 0 / 2%),rgba(0,0,0,0));
     }
    .swiper-button-next{
       margin-right:0%;
       padding-bottom: 40px;
    }
    .swiper-button-prev{
      margin-left:0%;
      padding-bottom: 40px;
    }
    
    .tit_product {
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    
    .tit_product img {
        width: 30px;
        margin-right: 5px;
    }
    
    .tit_product h2 {
        margin-top: 0px;
    }
    @media screen and (max-width: 767px){}
    .products_el_tit {
        font-size: 19px;
        min-height: 64px;
        
    margin:0px;
    }
    .content_cont_h2_line.white {
        background-color: #f47d30;
    }
    .content_cont_h2 {
        font-family: 'Gatorade black', sans-serif;
        color: black;
        line-height: 34px;
        font-weight: 900;
    }
    .bg-products-latam{
    	position: relative;
        z-index: 1;
        justify-content: center;
        display: flex;
    }
    .img_products_latam{
    	z-index: -1;
        position: absolute;
    }
    .content_subcategories {
        width: 100%;
        height: auto;h
        margin-top: 50px;
        display:none;
        margin-bottom: 75px;
    }
    .container_products{
        margin-top: 8%;
        justify-content: left;
        display: flex;
        position: absolute;
        width: 50%;
        align-items: center;
        max-height: 30vw;
    }
    .product_img{
    	max-width: 100%;    
    	max-height: 440px;
        display: block;
    }
    p::-webkit-scrollbar {
        width: 4px;
    }
    .swiper-container{
        width: 100%;
        height: 44vw;
    }
    .content_subcategories{
        display:block;   
    }
    .text_container_pr{
        margin: 0 15% 0 0; overflow-y: auto;height: 28vw;
    }
    
    .text_container_pr:first-child {
        padding-top:0px !important;
        margin-top:0px !important;
    }   
    .text_container_pr  p{
        font-size: 1.2vw;
        line-height: 1.3vw;
    }
    .text_container_pr::-webkit-scrollbar {
        width: 5px;
    }
    .text_container_pr::-webkit-scrollbar-thumb {
        background: rgb(255 255 255 / 20%); 
        border-radius:20px;
    }
    
    .swiper-button-next, .swiper-button-prev {
        display:none;   
    }
    .fixed_bottom {
        margin-left: 15%;
    }
    
    .swiper-pagination-bullet {
        width: 15px;
        height: 16px;
        display: inline-block;
        border-radius: 50%;
        background: #737373;
        opacity: 1;
        margin-right:8px;
    }
    .swiper-pagination-bullet-active {
        opacity: 1;
        background: #343434;
    }
    .swiper-pagination-bullets{
        color: black;
        width: 10vw;
        height: 20px;
        background-color: #FFFFFF;
        border-radius: 50px;
        justify-content: center;
        display: flex;
        align-content: center;
        align-items: center;
    }
    .name_title_prod{
        
        font-family: 'Gatorade black';
        text-transform: uppercase;
        color:white;
        font-size: 19px;
        text-align: center;
    }
    
    strong {
        font-family: 'Gatorade black', sans-serif;
    }
    .slogan{
        position: absolute;
        color:white;
        background-color:black;
        margin-top: 65%;
        font-size: 13px;
        line-height: 12px;
        padding: 4px 8px;
        font-family: 'Gatorade black';
    }
    
    
    </style>
    <div class="home home_bg_black">
        <?php get_template_part( 'template-parts/desktop/header' ); ?>
        <?php get_template_part( 'template-parts/desktop/banner' ); ?>
        <?php
            global $post;
    
            $current = get_the_ID($post->ID);
            
                // List posts by the terms for a custom taxonomy of any post type   
                $args = array(
                    'post_type'         => 'productoslatam',
                    'post_status'       => 'publish',
                    'posts_per_page'    => -1,
                    'orderby'           => 'title',
                );
        ?>
        
         <div class="swiper-container">
            <div class="swiper-wrapper">
    
        <?php
        	$result = new WP_Query($args);
                //var_dump($result);
                if ($result->have_posts()) :
                    while ($result->have_posts()) : $result->the_post();
                     //var_dump($post->ID);
                    ?>
                        <div class="swiper-slide">
                            <?php
                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                            ?>
                                
                            <div class="bg-products-latam">
                                <img class="img_products_latam" src="<?php echo get_post_meta( $post->ID, 'bg_desktop', true);?>" loading="lazy" alt="">
                                <div class="container_products">
                                    <div>
                                    <span class="slogan">LA BEBIDA DEPORTIVA #1 DEL MUNDO</span>
                                    </div>
                                    <div style="display:block; width: 20%;">
                                        <img class="product_img" style="margin: 0 auto;" src="<?php echo $image[0]; ?>" loading="lazy" alt="">
                                        <br>
                                        <div class="name_title_prod">
                                        <?php 
                                        echo the_title();
                                        ?>
                                        </div>
                                    </div>
                                    <div style="width:70%; word-break:break-word; margin: 0 0 auto 30px; ">
                                        <div class="text_container_pr">
                                            <?php echo the_content(); ?>
                                        </div>
                                    </div>                
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
                
            </div>
            <div style="background:black; width:80px; position: absolute; top: calc(90% - -11px); left: calc(50% - 80px);">
                <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        
            <?php get_template_part( 'template-parts/desktop/footer' ); ?>
    </div>
    <script type="text/javascript">
     jQuery( document ).ready(function() {
        jQuery('.header_nav_close').css('display', 'flex');
        jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
    });
    </script>
    
    <script src="<?php echo JSURL ?>swiper/swiper.js"></script>
    
      <!-- Initialize Swiper -->
      <script>
        var swiper3 = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
          loop: true,
          slidesPerView: 1,
          spaceBetween: 0,
          pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
          }
        
        });
        
      </script>
    
    <?php
    }
}else{
?>
<!-----Otros países ----->
<?php
if(wp_is_mobile()){
?>
<style>
.foot_cont {
    margin-bottom: 0px;
    margin-top: 0px;
}
.swiper-button-next{
	display:none !important;
}
.swiper-button-prev{
  	display:none !important;
}
    .side_buttons_link.favorite {
    display: none;
	.recargate{
    	margin-top:10px;
    }
}
</style>
<link rel="stylesheet" href="<?php echo CSSURL ?>swiper/swiper.css">
<?php if(get_option('banner_producto_mobile')) { ?>
<style>
.fdn_gray_tit_banner {
    padding: 84px 5px 18px;
    width: calc(100% + 36px);
    margin-left: -18px;
    background-image: url(https://g1.tars.dev/co/wp-content/themes/gatorade/assets/images/bg_product2.png) !important;
    background-size: 100% 119% !important;
    background-repeat: no-repeat !important;
    background-position: center bottom !important;
}
.content_cont_h1.bottom_line {
    font-size: 40px;
    line-height: 35px;
    margin-top:8px;
}
</style>
<?php } else { ?>
<style>
.fdn_gray_tit_banner {
    padding: 84px 18px 0px;
    width: calc(100% + 36px);
    margin-left: -18px;
    background-image: url(<?php echo IMGURL ?>bg_product2.png) !important;
    background-size: 100% 100% !important;
    background-repeat: no-repeat !important;
    background-position: center bottom !important;
}
</style>
<?php 
}
?>
<style>
.recargate{
    	margin-top:10px;
    }
a.bannerprod_cont.w-inline-block {
    margin-bottom: 0px;
    margin-top: 0px;
}
p.content_cont_p {
    padding-bottom: 26px;
    margin-bottom: 0px;
    font-size: 15px;
}
.content_cont.fdn_pro {
    padding-top: 0px;
    background-image: url(https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6022f98447df35d531e931bb_fdn_prod.jpg) !important;
    background-position: top center !important;
    background-size: 100% !important;
    background-repeat: no-repeat !important;
    background-color:#94231F;
}
.swiper-container.swiper-container3 {
    width: calc(100% + 40px);
    padding-top: 20px;
    padding-bottom: 30px;
    margin-left: -20px;
    background-image: url(https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602300930367ca581721d17d_bg_product.png);
    background-position: 0% 62%;
    background-size: 100% 70%;
    background-repeat: no-repeat;
}
.swiper-slide{
width:23px;
}
.swiper-container.swiper-container3 .swiper-slide {
    background-position: center;
    background-size: cover;
    width: 170px;
    /* height: 220px; */
}

:root {
    --swiper-theme-color: white;
    --swiper-navigation-size: 28px;
}

.swiper-container-3d .swiper-slide-shadow-left {
    background-image: linear-gradient(to left,rgb(0 0 0 / 2%),rgba(0,0,0,0));
}

.swiper-container-3d .swiper-slide-shadow-right {
    background-image: linear-gradient(to right,rgb(0 0 0 / 2%),rgba(0,0,0,0));
}

.tit_product {
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.tit_product img {
    width: 30px;
    margin-right: 5px;
}

.tit_product h2 {
    margin-top: 0px;
}
@media screen and (max-width: 767px){}
.products_el_tit {
    font-size: 19px;
    min-height: 64px;
    height:85px;
    
}
.content_cont_h1_line{
	background-color: white;
}
#containerTit {
 
  height: 64px;
  overflow:hidden;
  padding-bottom: 69px;
 
}

</style>
<div class="content_cont fdn_pro">
    <div class="fdn_gray_tit_banner">
        <div class="">
            <h3 class="content_cont_h2 bottom_line recargate" style="padding-bottom:5px">¡RECÁRGATE <br> ONLINE!</h3>
            <div class="content_cont_h1_line"></div>
        </div>
        <p class="content_cont_p" style="margin:5px 0px;">Bebidas Serie G deportivas para la energía, <br> hidratación y recuperación.</p>
        <?php if(get_option('banner_producto_mobile')) { ?>
        <a class="bannerprod_cont w-inline-block">
            <img src="<?php echo get_option('banner_producto_mobile'); ?>" loading="lazy" class="bannerprod_cont_img"/>
        </a>
        <?php } ?>
    </div>
    <?php
        global $post;

        $current = get_the_ID($post->ID);
        $cargs = array(
            'child_of'      => 0,
            'meta_key'   => 'orden_categorias',
            'orderby'    => 'meta_value_num',
            'order'      => 'ASC',
            'hide_empty'    => 1,
            'taxonomy'      => 'categoriasProductos', //change this to any taxonomy
        );
        foreach (get_categories($cargs) as $tax) :
            // List posts by the terms for a custom taxonomy of any post type   
            $args = array(
                'post_type'         => 'productos',
                'post_status'       => 'publish',
                'posts_per_page'    => -1,
//                'orderby'           => 'title',
                'tax_query' => array(
                    array(
                        'taxonomy'  => 'categoriasProductos',
                        'field'     => 'slug',
                        'terms'     => $tax->slug
                    )
                )
            );
            if (get_posts($args)) :
    ?>
    <div class="content_subcategories">
        <div class="content_cont_tit_h2">
            <?php $category_link = get_category_link($tax->term_id); ?>
            <div class="tit_product">
                <?php
                switch ($tax->name) {
                    case 'Energía':?>
                    <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602a6cbcc9070806401af4ba_energy.svg" loading="lazy" alt="">
                    <?php
                    break;
                    case 'Hidratación':?>
                    <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602a6cbc400a92843265bf53_drop.svg" loading="lazy" alt="">
                    <?php
                    break;
                    case 'Recuperación':?>
                    <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602a6cbc08c4be7b9a087b27_more.svg" loading="lazy" alt="">
                    <?php
                    break;
                    case 'Equípate con Gatorade':?>
                    <img src="<?php echo IMGURL ?>desktop/icono4.png" loading="lazy" alt="">
                    <?php
                    break;
                    default:?>
                    <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/602a6cbc08c4be7b9a087b27_more.svg" loading="lazy" alt="">
                    <?php
                  }
                ?>
                <div>
                    <h1 class="content_cont_h1 bottom_line" style="margin-top: 0px;"><?php echo $tax->name; ?></h1>
                    <div class="content_cont_h1_line white"></div>
                </div>
            </div>
        </div>

        <!-- Swiper -->
        <div class="swiper-container swiper-container3">
            <div class="swiper-wrapper">
            <?php
            $args = array(
                'post_type' => 'productos',
                'post_status' => 'publish',
                'posts_per_page' => '10',
                'tax_query' => array(
                    array(
                        'taxonomy'  => 'categoriasProductos',
                        'field'     => 'slug',
                        'terms'     => $tax->slug
                    )
                )
            );
            $result = new WP_Query($args);
            if ($result->have_posts()) :
                while ($result->have_posts()) : $result->the_post();
                
            ?>  
            <?php foreach(get_posts($args) as $p) : ?>
            <div class="swiper-slide">
                <div class="slider_products_el_img" >        
                    <?php
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($p->ID), 'full');
                        $image_alt = get_post_meta(get_post_thumbnail_id($p->ID), '_wp_attachment_image_alt', true);
                        $image_title = get_the_title(get_post_thumbnail_id($p->ID));
                    ?>
                    <!-- <img loading="lazy" src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>" /> -->
                    <div style="width:170px;height:230px;margin:0 auto;background:url(<?php echo $image[0] ?>);background-position:center;background-size:contain;background-repeat:no-repeat;">
                    </div>
                    <div id="containerTit">
                            <h3 class="products_el_tit"><?php echo $p->post_title; ?></h3>
                    </div>
                    <a href="<?php echo $p->guid; ?>" class="products_el_know">CONOCE MÁS</a>
                    <a href="<?php echo home_url('lista-tiendas?idProducto='.$p->ID); ?>" class="products_el_shop">COMPRAR</a>
                </div>
            </div>
            <?php endforeach; ?>
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
            endif;
        endforeach; 
    ?>
    <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>

<script type="text/javascript">
 jQuery( document ).ready(function() {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
});
</script>


<script src="<?php echo JSURL ?>swiper/swiper.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper3 = new Swiper('.swiper-container.swiper-container3', {
        effect: 'coverflow',
      grabCursor: true,
      centeredSlides: false,
      slidesPerView: 'auto',
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      loop: false,
      spaceBetween: 14,
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 0,
        modifier: 1,
        slideShadows: false,
      }
    });
  </script>
<?php
}else{
?>
<style>
    .side_buttons_link.favorite {
    display: none;
}
</style>
<link rel="stylesheet" href="<?php echo CSSURL ?>swiper/swiper.css">
<style>

.swiper-container.swiper-container3 {
    //width: calc(100% + 40px);
    width:65%;
    
    padding-top: 20px;
    padding-bottom: 30px;
}

.swiper-container.swiper-container3 .swiper-slide {
    background-position: center;
    background-size: cover;
    width: 100px;
    /* height: 220px; */
}

:root {
    --swiper-theme-color: white;
    --swiper-navigation-size: 28px;
}

.swiper-container-3d .swiper-slide-shadow-left {
    background-image: linear-gradient(to left,rgb(0 0 0 / 2%),rgba(0,0,0,0));
}

.swiper-container-3d .swiper-slide-shadow-right {
    background-image: linear-gradient(to right,rgb(0 0 0 / 2%),rgba(0,0,0,0));
 }
.swiper-button-next{
   margin-right:0%;
   padding-bottom: 40px;
}
.swiper-button-prev{
  margin-left:0%;
  padding-bottom: 40px;
}

.tit_product {
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.tit_product img {
    width: 30px;
    margin-right: 5px;
}

.tit_product h2 {
    margin-top: 0px;
}
@media screen and (max-width: 767px){}
.products_el_tit {
    font-size: 19px;
    min-height: 64px;
    
margin:0px;
}
.content_cont_h2_line.white {
    background-color: #f47d30;
}
.content_cont_h2 {
    font-family: 'Gatorade black', sans-serif;
    color: black;
    line-height: 34px;
    font-weight: 900;
}
.content_subcategories {
    width: 100%;
    height: auto;h
    margin-top: 50px;
    margin-bottom: 75px;
}
.products_el_tit{
     line-height: 30px;  
}
#containerTit {
 
  height: 64px;
  overflow:hidden;
 
}
</style>
<div class="home home_bg_black">
    <?php get_template_part( 'template-parts/desktop/header' ); ?>
    <?php get_template_part( 'template-parts/desktop/banner' ); ?>
        <?php
            global $post;
			
            $current = get_the_ID($post->ID);
            $cargs = array(
                'child_of'      => 0,
                'meta_key'   => 'orden_categorias',
                'orderby'    => 'meta_value_num',
                'order'      => 'ASC',
                'hide_empty'    => 1,
                'taxonomy'      => 'categoriasProductos', //change this to any taxonomy
            );
            foreach (get_categories($cargs) as $tax) :
                // List posts by the terms for a custom taxonomy of any post type   
                $args = array(
                    'post_type'         => 'productos',
                    'post_status'       => 'publish',
                    'posts_per_page'    => -1,
                    //'orderby'           => 'title',
                    'tax_query' => array(
                        array(
                            'taxonomy'  => 'categoriasProductos',
                            'field'     => 'slug',
                            'terms'     => $tax->slug
                        )
                    )
                );
                if (get_posts($args)) :
        ?>
        <div class="content_subcategories">
            <div class="content_cont_tit_h2">
                <?php $category_link = get_category_link($tax->term_id); ?>
                <div class="tit_product">
                    <?php
                   switch ($tax->name) {
                        case 'Energía':?>
                        <img src="<?php echo IMGURL ?>desktop/icono.png" loading="lazy" alt="">
                        <?php
                        break;
                        case 'Hidratación':?>
                        <img src="<?php echo IMGURL ?>desktop/icono2.png" loading="lazy" alt="">
                        <?php
                        break;
                        case 'Recuperación':?>
                        <img src="<?php echo IMGURL ?>desktop/icono3.png" loading="lazy" alt="">
                        <?php
                        break;
                        case 'Equípate con Gatorade':?>
                        <img src="<?php echo IMGURL ?>desktop/icono3.png" loading="lazy" alt="">
                        <?php
                        break;
                        default:?>
                        <img src="<?php echo IMGURL ?>desktop/icono3.png" loading="lazy" alt="">
                        <?php
                    }
                    ?>
                    <!--<a href="<?php echo $category_link; ?>">-->
                    <div>
                        <h2 class="content_cont_h2 bottom_line" style="font-size: 20px;"><?php echo $tax->name; ?></h2>
                        <div class="content_cont_h2_line white"></div>
                    </div>
                </div>
            </div>

            <!-- Swiper -->
            <div class="swiper-container swiper-container3">
                <div class="swiper-wrapper">
                <?php
                $args = array(
                    'post_type' => 'productos',
                    'post_status' => 'publish',
                    'posts_per_page' => '10',
                    'tax_query' => array(
                        array(
                            'taxonomy'  => 'categoriasProductos',
                            'field'     => 'slug',
                            'terms'     => $tax->slug
                        )
                    )
                );
                $result = new WP_Query($args);
                if ($result->have_posts()) :
                    while ($result->have_posts()) : $result->the_post();
                    
                ?>  
                <?php foreach(get_posts($args) as $p) : ?>
                <div class="swiper-slide">
                    <div class="slider_products_el_img">        
                        <?php
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($p->ID), 'full');
                            $image_alt = get_post_meta(get_post_thumbnail_id($p->ID), '_wp_attachment_image_alt', true);
                            $image_title = get_the_title(get_post_thumbnail_id($p->ID));
                        ?>
                        <!-- <img loading="lazy" src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>" /> -->
                        <div style="width:170px;height:208px;margin:0 auto;background:url(<?php echo $image[0] ?>);background-position:center;background-size:contain;background-repeat:no-repeat;">
                        </div>
                        <div id="containerTit">
                            <h3 class="products_el_tit"><?php echo $p->post_title; ?></h3>
                        </div>
                       
                        <a href="<?php echo $p->guid; ?>" class="products_el_know">CONOCE MÁS</a>
                        <a href="<?php echo home_url('lista-tiendas?idProducto='.$p->ID); ?>" class="products_el_shop">COMPRAR</a>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
                
                
                <div class="swiper-button-next swiper-button-next3" style="color:black"></div>
                <div class="swiper-button-prev swiper-button-prev3" style="color:black"></div>
            </div>

        </div>
        <?php 
                endif;
            endforeach; 
        ?>
        <?php get_template_part( 'template-parts/desktop/footer' ); ?>
</div>
<script type="text/javascript">
 jQuery( document ).ready(function() {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
});
</script>
 <script type="text/javascript">
     jQuery( document ).ready(function() {
       
    
        var containerHeight = jQuery("#containerTit").height();
        var mtext = jQuery("#containerTit h3");
        console.log(mtext.outerHeight());
        
        while ( mtext.outerHeight() > containerHeight ) {
                mtext.text(function (index, text) {
                    return text.replace(/\W*\s(\S)*$/, '...');
               });
        }
     });    
</script>

<script src="<?php echo JSURL ?>swiper/swiper.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper3 = new Swiper('.swiper-container.swiper-container3', {
        centeredSlides: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
      loop: false,
      slidesPerView: 3,
      spaceBetween: 1
    });
  </script>
<?php
}
}
?>
<?php
//Pixel
echo get_option('pixel_productos');
get_footer();
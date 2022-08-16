<?php 
get_header(); 
?>
<style>
    .search_cont_form_btn:hover {
    background-image: url(https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/60072340f7a1782076c7ac1b_loupe.svg), linear-gradient(
58deg
, #000000, #000000);
}
</style>
<?php

if(wp_is_mobile())
{
?>
<script type="text/javascript">
 jQuery( document ).ready(function() {.search_cont_form_btn.drop_btn:hover {
    background-image: url(https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6019e0956f4bcf4c0c307c40_arrow_down2.svg), linear-gradient(
58deg
, #000000, #000000);
}
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
});
</script>
<style>
    .side_buttons_link.favorite {
    display: none;
}
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
</style>
<?php
    $args = array(
        'post_type' => 'eventos',
        'post_status' => 'publish',
        'posts_per_page' => '10',
        'meta_key' => 'eve_publico',
        'meta_value' => 'Si'
    );
    $result = new WP_Query($args);
    if ($result->have_posts()) :
?>
<div class="content_cont bg_content">
    <div class="content_cont_tit_h1">
        <h1 class="content_cont_h1 bottom_line">EVENTOS & PATROCINIOS</h1>
        <div class="content_cont_h1_line"></div>
    </div>
    <p class="content_cont_p">Encuentra todos los eventos & patrocinios que Gatorade tiene para ti</p>
    <div class="search_cont">
        <div class="w-form">
            <div class="search_cont_form">
                <input type="text"
                    class="search_cont_form_input w-input" maxlength="256" 
                    placeholder="Buscador  (Tags, Palabras claves)" name="keyword" id="keyword" onkeyup="eve()" />
                <input type="button" value="" class="search_cont_form_btn w-button" onclick="eve()"/>
            </div>
        </div>
        <div id="dataeve"></div>
    </div>
    <div class="home_banner">
        <?php
        if(get_option('banner_eventos_mobile')){
        ?>
        <img src="<?php echo get_option('banner_eventos_mobile'); ?>" alt="Banner home" class="home_banner_img" title="Banner home">
        <?php } ?>
    </div>
    <div class="content_subcategories fullw">
        <div class="topics_cont">
        <?php
        $args = array(
            'post_type' => 'eventos',
            'post_status' => 'publish',
            'posts_per_page' => '10',
            'meta_key' => 'eve_publico',
            'meta_value' => 'Si'
        );
        $result = new WP_Query($args);
        if ($result->have_posts()) :
            while ($result->have_posts()) : $result->the_post();
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
        endif;
        wp_reset_postdata();
        ?>
        </div>
    </div>
    <a class="topics_more_cont w-inline-block">
      <img
            src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6019e0956f4bcf4c0c307c40_arrow_down2.svg"
            loading="lazy" alt="" class="topisc_more_cont_img" />
    </a>
    <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>
<script type="text/javascript">
 jQuery( document ).ready(function() {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
});

function eve(){
    if(jQuery('#keyword').val() != ''){
        jQuery.ajax({
            url: MyAjax.url,
            type: 'post',
            data: { action: 'data_eve', keyword: jQuery('#keyword').val() },
            success: function(data) {
                jQuery('#dataeve').show();
                jQuery('#dataeve').html( data );
            }
        });
    } else {
        jQuery('#dataeve').hide();
        jQuery('#dataeve').html();
    }
}
</script>

<?php else: ?>
    <style>
    
    .not_found_h2 {
		color: #FF6700;
		font-size: 20px;
		text-transform: uppercase;
		font-family: 'Gatorade black', sans-serif;
		margin-bottom: 10px;
        margin-top: 5px;
        text-align: center;
	}
	.not_found_h3 {
		color: white;
		font-size: 10px;
		text-transform: uppercase;
		line-height: 10px;
		margin-top: 0px;
        text-align: center;
        margin-bottom: 0px;
	}
    .p_white{
        color: white;
        font-size: 20px;
		text-transform: uppercase;
		font-family: 'Gatorade black', sans-serif;
		margin-bottom: 10px;
        margin-top: 5px;
    }
    .return_home_bottom{
        background: #FF6700;
        margin-top: 15px;
        width: 30px;
        height: 20px;
    }
    .return_home_p{
        color: white;
		font-size: 15px;
		text-transform: uppercase;
		font-family: 'Gatorade black', sans-serif;  
        text-align: center;
        margin-top: 17px;
        background: #FF6700;
        width: 156px;
        margin-left: auto;
        margin-right: auto;
    }
	
    .foot_cont {
        display: none;
    }
    .not_found_content{
        margin-top: 16px;
    }
    .content_cont.bg_content{
        background: url("<?php echo IMGURL ?>messiMobile.png");
        background-size: 100%;
    }
    </style>
  <div class="content_cont bg_content">
    
    <div class="not_found">
    <div class="not_found_content">
        <h3 class="not_found_h3">POR EL MOMENTO NO TENEMOS EVENTOS <br>
            PERO TE INVITAMOS A SEGUIR NAVEGANDO POR
        </h3>
        <p class="not_found_h2"> <span class="p_white"> NUESTRA </span> PÁGINA WEB</p>
        <a href="<?php echo home_url('/'); ?>" class="return_home_bottom">
            <p class="return_home_p"> VOLVER AL HOME </p>
        </a>
    </div>
        <!--<img class="not_found_img" src="<?php echo IMGURL ?>messiMobile.png" alt="">-->
    </div>
    <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
  </div>
  
<?php
  endif;
  ?>     
<?php }else{
?>
<style>
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
.content_cont.bg_content {
background: black;
background-image: url("<?php echo IMGURL ?>desktop/bg.png");
background-position: 100% 100%;
background-size: 100%;
background-repeat: repeat-y;
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
.right_menu_el_link {
    font-family: 'Gatorade black', sans-serif;
    color: white;
    font-size: 18px;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
}
</style>
<?php
        $args = array(
            'post_type' => 'eventos',
            'post_status' => 'publish',
            'posts_per_page' => '10',
            'meta_key' => 'eve_publico',
            'meta_value' => 'Si'
        );
        $result = new WP_Query($args);
        if ($result->have_posts()) :
        ?>
<div class="content_cont bg_content">  
    
<?php get_template_part( 'template-parts/desktop/header_black' ); ?>
<?php get_template_part( 'template-parts/eventos/banner' ); ?>

    <div class="flexbox-container">
        <div class="content_cont_tit_h1">
            <h1 class="content_cont_h1 bottom_line">EVENTOS & PATROCINIOS</h1>
            <div class="content_cont_h1_line"></div>
        </div>
        <div class="search_cont">
            <div class="w-form">
                <div class="search_cont_form">
                    <input type="text"
                        class="search_cont_form_input w-input" maxlength="256" 
                        placeholder="Buscador  (Tags, Palabras claves)" name="keyword" id="keyword" onkeyup="eve()" />
                    <input type="button" value="" class="search_cont_form_btn w-button" onclick="eve()"/>
                </div>
            </div>
            <div id="dataeve"></div>
        </div>
    </div>
    <div class="content_subcategories">
        <div class="topics_cont">
        <?php
        $args = array(
            'post_type' => 'eventos',
            'post_status' => 'publish',
            'posts_per_page' => '10',
            'meta_key' => 'eve_publico',
            'meta_value' => 'Si'
        );
        $result = new WP_Query($args);
        if ($result->have_posts()) :
            
            
            while ($result->have_posts()) : $result->the_post();
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
        else:
        ?>
            <meta http-equiv="refresh" content="10; url=<?php echo home_url('/404'); ?>">      
        <?php
        endif;
        wp_reset_postdata();
        ?>
        </div>
    </div>
    <a class="topics_more_cont w-inline-block">
      <img
            src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6019e0956f4bcf4c0c307c40_arrow_down2.svg"
            loading="lazy" alt="" class="topisc_more_cont_img" />
    </a>
    <?php get_template_part( 'template-parts/desktop/footer' ); ?>
</div>
<script type="text/javascript">
 jQuery( document ).ready(function() {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
});

function eve(){
    if(jQuery('#keyword').val() != ''){
        jQuery.ajax({
            url: MyAjax.url,
            type: 'post',
            data: { action: 'data_eve', keyword: jQuery('#keyword').val() },
            success: function(data) {
                jQuery('#dataeve').show();
                jQuery('#dataeve').html( data );
            }
        });
    } else {
        jQuery('#dataeve').hide();
        jQuery('#dataeve').html();
    }
}
</script>
<?php else: ?>
    <style>
    
    .content_cont.bg_content {
        background: black;
        background-image: url("<?php echo IMGURL ?>desktop/bg.png");
        background-position: 100% 100%;
        background-size: 100%;
        background-repeat: repeat-y;
            padding-top: 50px !important;
            padding-right: 0%;
            padding-left: 0%;
    }

    .home {
        width: 100%;
        padding-top: 50px;
        padding-right: 50px;
        padding-left: 50px;
        max-width: 1200px;
        margin: 0 auto;
        background: black;
        background-image: url("https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6019d7147421c12649fe479c_shutterstock_291093752.png");
        background-position: 100% 100%;
        background-size: 100%;
        background-repeat: repeat-y;
    }
	.home_header{
    	padding-left:15%;
    	padding-right:15%;
    }
    .not_found {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        background: url(https://g1.tars.dev/wp-content/themes/gatorade/assets/images/messi.png);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-size: auto;
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-size: auto;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        padding: 10% 20%;
        margin-top: 30px;
        height: auto;
    }
	.not_found > div {
	width: 50%;
	}
	.not_found > div:last-of-type {
	width: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	}
	.not_found_h2 {
		color: var(--color-orange);
		font-size: 40px;
		text-transform: uppercase;
		font-family: 'Gatorade black', sans-serif;
		margin-bottom: 10px;
        margin-top: 5px;
	}
	.not_found h3 {
		color: white;
		font-size: 26px;
		text-transform: uppercase;
		line-height: 30px;
		margin-top: 0px;
        text-align: center;
        margin-bottom: 0px;
        width: 130%;
	}
    .p_white{
        color: white;
        font-size: 40px;
		text-transform: uppercase;
		font-family: 'Gatorade black', sans-serif;
		margin-bottom: 10px;
        margin-top: 5px;
    }
    .return_home_bottom{
        background: var(--color-orange);
        margin-top: 45px;
        width: 305px;
        height: 55px;
    }
    .retunr_home_p{
        color: white;
		font-size: 30px;
		text-transform: uppercase;
		font-family: 'Gatorade black', sans-serif;  
        text-align: center;      
        margin-top: 17px;
    }
    .img_desk_el{
    	margin-left: 324px;
        margin-top: -11px;
        width: 20%;
    }
</style>
  <div class="content_cont bg_content">
  <?php get_template_part( 'template-parts/desktop/header_black' ); ?>
    <div class="not_found">
		<div>
		</div>
		<div>
        <h3>POR EL MOMENTO NO TENEMOS EVENTOS <br>
            PERO TE INVITAMOS A SEGUIR NAVEGANDO POR
        </h3>
        <p class="not_found_h2"> <span class="p_white"> NUESTRA </span> PÁGINA WEB.</p>
        <div class="img_desk_el">
        	<img loading="lazy" src="<?php echo IMGURL; ?>desktop/eventElementDesk.png" />
        </div>
        <a href="<?php echo home_url('/'); ?>" class="return_home_bottom">
            <p class="retunr_home_p"> VOLVER AL HOME </p>
        </a>
		</div>
	</div>
    <?php get_template_part( 'template-parts/desktop/footer' ); ?>
  </div>

<script type="text/javascript">
 jQuery( document ).ready(function() {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
});

function eve(){
    if(jQuery('#keyword').val() != ''){
        jQuery.ajax({
            url: MyAjax.url,
            type: 'post',
            data: { action: 'data_eve', keyword: jQuery('#keyword').val() },
            success: function(data) {
                jQuery('#dataeve').show();
                jQuery('#dataeve').html( data );
            }
        });
    } else {
        jQuery('#dataeve').hide();
        jQuery('#dataeve').html();
    }
}
</script>    
<?php endif; ?>
<?php }
?>
<?php
//Pixel
echo get_option('pixel_eventos');
get_footer();
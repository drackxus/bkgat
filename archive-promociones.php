<?php 
get_header(); ?>
<style>
    .side_buttons_link.favorite {
    display: none;
}
</style>
<div class="content_cont bg_content">
    <div class="content_cont_tit_h1">
        <h1 class="content_cont_h1 bottom_line">PROMOCIONES</h1>
        <div class="content_cont_h1_line"></div>
    </div>
    <p class="content_cont_p">Encuentra todos las promociones que Gatorade tiene para ti</p>
    <div class="search_cont">
        <div class="w-form">
            <div class="search_cont_form">
                <input type="text"
                    class="search_cont_form_input w-input" maxlength="256" 
                    placeholder="Buscador  (Tags, Palabras claves)" name="keyword" id="keyword" onkeyup="pro()" />
                <input type="button" value="" class="search_cont_form_btn w-button" onclick="pro()"/>
            </div>
        </div>
        <div id="datapro"></div>
    </div>
    <div class="content_subcategories fullw">
        <div class="topics_cont">
        <?php
        $args = array(
            'post_type' => 'promociones',
            'post_status' => 'publish',
            'posts_per_page' => '10'
        );
        $result = new WP_Query($args);
        if ($result->have_posts()) :
            while ($result->have_posts()) : $result->the_post();
        ?>
          <a href="<?php echo $p->guid; ?>" style="position: relative;width: 50%;height: 100%;top: 0;left: 0;display: block;">
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
    <a href="#" class="topics_more_cont w-inline-block">
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

function pro(){
    if(jQuery('#keyword').val() != ''){
        jQuery.ajax({
            url: MyAjax.url,
            type: 'post',
            data: { action: 'data_pro', keyword: jQuery('#keyword').val() },
            success: function(data) {
                jQuery('#datapro').show();
                jQuery('#datapro').html( data );
            }
        });
    } else {
        jQuery('#datapro').hide();
        jQuery('#datapro').html();
    }
}
</script>
<?php
get_footer();
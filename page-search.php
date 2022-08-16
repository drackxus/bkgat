<?php 
/**
 * Template Name: Search
 *
 * @package WordPress
 */
get_header(); ?>

<?php
    /*if(wp_is_mobile()){*/
?> 
<style>
.resultados {
	width: 100%;
	height: auto;
	display: flex;
	justify-content: space-between;
	align-items: flex-start;
	flex-wrap: wrap;
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
	right: auto;
	width: auto;
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
    .side_buttons_link.favorite {
    display: none;
    
}

p.content_cont_p {
    font-size: 20px;
    padding-top: 10px;
    line-height: 18px;
}
.b_gatorade {
    font-family: 'Gatorade black', sans-serif;
   
}
.res_taxonomy {
    padding: 3px;
    position: relative;
    width: 49%;
    height: 130px;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background: black;
    margin: 4px;
}

.content_cont.bg_content {
    background: black;
    background-image: url(https://g1.tars.dev/wp-content/media/2021/03/Editable22.png);
    background-position: 100% 100%;
    background-size: 100%;
    background-repeat: repeat-y;
}
.content_two {
    background: black;
    background-image: url(https://g1.tars.dev/wp-content/media/2021/03/404.png);
    background-position: 100% 100%;
    background-size: 100%;
    background-repeat: repeat-y;
}
.w-form {
    margin: 0px 10px 5px;
}
.footer-logos{
    margin-bottom: 20px;
}
.search_cont_form{
    margin-top: -23px;
    margin-left: -9px;
}
.res_taxonomy:nth-child(even) {
    margin-right: 3px;
    margin-left: 0px;
}
.res_taxonomy:nth-child(odd) {
    margin-right: 0px;
    margin-left: 3px;
}
</style>
    <div>
        <div class="content_cont bg_content">
            <div class="content_cont_tit_h1">
                <p class="content_cont_p">Encuentra tu contenido o <br> producto favorito de <b class="b_gatorade">GATORADE</b> </p>
                <div class="content_cont_h1_line"></div>
            </div>
            <div class="search_cont">
            
                <div class="w-form">
                    <div class="search_cont_form">
                        <input type="text"
                            class="search_cont_form_input w-input" maxlength="256" 
                            placeholder="Buscador  (Tags, Palabras claves)" name="keyword" id="keyword" onkeyup="busc()" />
                        <input type="button" value="" class="search_cont_form_btn w-button" onclick="busc()"/>
                    </div>
                </div>
                <div id="dataeve"></div>

            </div>
            <div class="resultados"></div>
            
            
        </div>
        <div class="footer-logos">
            <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
        </div>
    </div>
    


<script type="text/javascript">
 jQuery( document ).ready(function() {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
});

function busc(){
    if(jQuery('#keyword').val() != ''){
        jQuery.ajax({
            url: MyAjax.url,
            type: 'post',
            data: { action: 'data_busc', keyword: jQuery('#keyword').val() },
            success: function(data) {
                jQuery('.content_cont bg_content').css('display', 'none');
                jQuery('.resultados').show();
                jQuery('.resultados').html( data );
            },
            error: function(data){
                jQuery('.content_cont.bg_content_two').show();
                jQuery('.content_cont.bg_content_two').html ( data );
            }
        });
    } else {
        jQuery('.resultados').hide();
        jQuery('.resultados').html();
    }
}
</script>       

<?php
get_footer();
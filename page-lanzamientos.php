<?php

/**
 * Template Name: Lanzamientos
 *
 * @package WordPress
 */

get_header();
global $post;
?>
<style>
.content_cont.bg_contact {
    background-image: url(none), url(https://uploads-ssl.webflow.com/6005e02…/6019d71…_shutterstock_291093752.png) !important;
    background-position: 50% -390px, 100% 100%;
    background-size: 100%, cover;
    background-repeat: no-repeat, no-repeat;
}
</style>
<?php
if(wp_is_mobile()){
?>
<style>
body {
    background: white !important;
    color: black !important;
}
p {
    color: black;
}
.header_nav_right {
    border-radius: 50%;
    box-shadow: -5px 0px 4px #00000054;
}
.formulado strong {
    font-size: 22px;
    line-height: 25px;
}
.lanzamientos2 {
    font-size: 30px !important;
    line-height: 32px !important;
}
.caracterisiticas_sec {
    margin: 45px 0px;
    transform: translateX(-5%);
    width: 110.8%;
}
.caracterisiticas_sec span {
    margin-top: 0px;
    display: block;
    margin-left: 0px;
    font-size: 14px;
}
.width_full {
    transform: translateX(-4%);
    width: 109.3%;
}
.side_buttons_link.favorite {
    display: none;
}
.line {
    width: 50px;
    height: 4px;
    border-radius: 4px;
    background: var(--color-orange);
}
p.caract_num {
    margin-top: 0px !important;
}
.caracteristica_el {
    width: 180px;
    height: 180px;
}
.caract_img {
    top: 135px;
}
label {
    display: none;
  }
  input:focus + label {
    display: block;
  }
  input:placeholder-shown + label {
    display: none;
  }
  input:not(:placeholder-shown) + label {
    display: block;
  }
  .bottom {
    display: none !important;
  }
  h2 {
    font-family: 'Gatorade black', sans-serif;
    color: #fff;
    font-size: 24px;
    line-height: 24px;
    font-weight: 900;
    text-align: center;
    margin-top: 0px;
  }

  select:focus + label {
    display: block;
  }
  select:placeholder-shown + label {
    display: none;
  }
  select:not(:placeholder-shown) + label {
    display: block;
  }
  select {
    text-align-last:center;
  }
  span {
    margin-top: -27px;
    display: block;
    margin-left: 29px;
    font-size: 14px;
  }
  .content_cont_h1_line {
    width: 68px;
    height: 2px;
    border-radius: 6px;
    background-color: #f47d30;
    margin-top: 4px;
}
.content_cont_h1.center {
    font-size: 30px;
}
</style>
<div class="content_cont bg_contact">
    <div class="contenido_lanza">
        <?php echo $post->post_content; ?>
    </div>
  <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>



<script type="text/javascript">
  jQuery(document).ready(function () {
    jQuery(".header_nav_close").css("display", "flex");
    jQuery(".header_nav_close").attr("href", "<?php echo home_url(); ?>");
    jQuery('.side_buttons_link.favorite').css('display', 'none');
  });
</script>

<?php
}else{
?>
<div class="home">

  <?php get_template_part( 'template-parts/desktop/header' ); ?>
  <div class="contenido_lanza">
  <?php echo $post->post_content; ?>
  </div>
   
<style>
.contenido_lanza p {
    font-family: 'Gatorade med';
    font-weight: 300;
    font-style: normal;
    font-size: 17px;
    color: black;
    margin: 10px 0px;
}
.titulo_lanza {
    margin-top: 360px;
}
.titulo_lanza h1 {
    color: black;
    text-transform: uppercase;
    font-family: 'Gatorade black', sans-serif;
    font-size: 34px;
    margin-bottom: 12px;
}
.titulo_lanza h3 {
    color: black;
    text-transform: uppercase;
    font-family: 'Gatorade black', sans-serif;
    font-size: 19px;
    margin-bottom: 12px;
}
.line {
    width: 50px;
    height: 4px;
    border-radius: 4px;
    background: var(--color-orange);
}
.banner_lanza {
    width: 100%;
    height: 300px;
    position: absolute;
    margin-left: -10%;
    display: block;
    background-size: cover !important;
    background-position: top center !important;
    background-repeat: no-repeat !important;
}
  .side_buttons_link.favorite {
    display: none;
}
.contact_cont_desk{
  padding-top: 0px;
  padding-bottom: 87px;
}
.content_cont_h1 {
    font-family: 'Gatorade black', sans-serif;
    color: black;
    font-weight: 900;
}
.form_block.form_contact {
    width: 40%;
}
.contact_submit {
    width: 69%;
    margin-top: 20px;
    margin-right: auto;
    margin-left: auto;
    padding-top: 14px;
    padding-bottom: 14px;
    border-radius: 30px;
    background-color: #f47d30;
    font-family: 'Gatorade black', sans-serif;
    color: #fff;
    font-size: 25px;
    line-height: 19px;
    font-weight: 900;
    text-align: center;
    text-transform: uppercase;
}
</style>
<div>
  <div class="contact_cont_desk">
  </div>
</div>
<?php get_template_part( 'template-parts/desktop/footer' ); ?>



<script type="text/javascript">
  jQuery(document).ready(function () {
    jQuery(".header_nav_close").css("display", "flex");
    jQuery(".header_nav_close").attr("href", "<?php echo home_url(); ?>");
    jQuery('.side_buttons_link.favorite').css('display', 'none');
  });
</script>
    
</div>
</div>
<?php 
}
?>

<?php
get_footer();
?>
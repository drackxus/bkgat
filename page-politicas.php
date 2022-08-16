<?php
/**
 * Template Name: Politicas
 *
 * @package WordPress
 */

  get_header(); 
  
  global $post;
  ?>
<style>
.side_buttons_link.favorite {
  display: none !important;
 }
</style>
<?php 
if(wp_is_mobile()){
?>
<style>
  .evento_form {
    display: none;
  }
  .evento_form .opciones {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin-bottom: 20px;
  }
  .evento_form label {
    text-align: center;
    font-size: 17px;
    margin-bottom: 10px;
  }
  .evento_form select {
    width: 80%;
    margin: 0 auto;
    text-align: center;
    color: black;
    border-radius: 30px;
    font-size: 15px;
    text-align-last:center;
    color: #4B4B4B;
    font-family: 'Gatorade black', sans-serif;
  }

  .participate_button {
    margin-right: 0px;
    display: block;
    width: 81%;
    margin: 0 auto;
    margin-bottom: 20px;
    padding: 3px 30px 3px;
    margin-top: 30px;
  }

  .participate_-cont {
    flex-direction: column;
    display:flex;
  }

  .participate_-cont p {
    margin-bottom: 13px;
    font-size: 18px;
  } 

  .participate_-cont.white a {
    background: white;
    color: black;
  }  

  p.instructions {
    text-align: center;
    font-size: 16px;
    line-height: 20px;
  }
</style>

<div class="content_cont">
  <?php echo the_content(); ?>
  <br>
  <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>

<?php
} else {
?>
<style>

.side_buttons_link.favorite {
  display: none !important;
}
.home_header {
  margin-bottom: 22px;
}
.content_cont.bg_content {
  background: black;
  background-image: url("https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6019d7147421c12649fe479c_shutterstock_291093752.png");
  background-position: 100% 100%;
  background-size: 100%;
  background-repeat: repeat-y;
}
.content_cont{
	padding:70px 15% 50px;
}
p{
  color:black;
}
</style>
<div class="content_cont ">

    <?php get_template_part( 'template-parts/desktop/header' ); ?>
    
    <div class="flexbox-container" style="display:flex; margin-bottom:80px">
        <div style="width:100%;">
        <?php echo the_content(); ?>
        </div>
    </div>   
  
  <?php get_template_part( 'template-parts/desktop/footer' ); ?>
</div>
<?php
}
?>
<script type="text/javascript">
  jQuery( document ).ready(function() {
     jQuery('.header_nav_close').css('display', 'flex');
     jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
  });
</script>
<?php
get_footer();
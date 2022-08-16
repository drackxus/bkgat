<?php

/**
 * Template Name: LoginF
 *
 * @package WordPress
 */

get_header();

// global $current_user;
// wp_get_current_user();
// if (is_user_logged_in()) {
//     $loginUser = "true";
//     $nameUser = $current_user->user_login; $idUser = $current_user->ID; 
// } else {
// $loginUser = false; 
// } 
?>
<style>
.login_social_cont {
    width: 50%;
}
ul.the_champ_login_ul {
    margin: 3px 0!important;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
ul.the_champ_login_ul li {
    float: none;
    width: 100%!important;
    background: white;
    border-radius: 30px;
    margin-bottom: 12px !important;
}
.theChampGoogleBackground {
    background-color: transparent;
    box-sizing: border-box;
    border: none;
}
div.the_champ_login_container i.theChampFacebookBackground {
    background-color: transparent!important;
    width: 100%;
}
div.theChampFacebookLogoContainer {
    width: 25px;
    height: 25px;
    border-radius: 0px;
    background-color: transparent;
    margin: 0px;
}
.theChampGoogleBackground {
    background-color: transparent;
    border: none;
    width: 100%;
}
.theChampLoginSvg {
    width: 35px;
    height: 35px;
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
  select {
  text-align: center;
  }
  .volver_a {
    color: white;
    text-align: center;
    text-decoration: underline;
    text-transform: uppercase;
    font-size: 26px;
    margin: 20px auto 30px;
    display: block;
  }
  <?php
    if(wp_is_mobile()) {
    ?>  
  #myVideo {
  position: absolute;
  bottom: 0px;
  right: 0px;
  min-width: 100%;
  min-height: 100%;
  height: 100%;
  z-index: -1000;
  }
  <?php } else { ?>
  #myVideo {
  position: absolute;
  bottom: 0px;
  right: 0px;
  min-width: 100%;
  min-height: 100%;
  height: 100%;
  z-index: -1000;
  }
  <?php } ?>
  #video_pattern {
  background:#fff;
  opacity: 0.99;
  left: 0px;
  top: 0px;
  z-index: 1;
  }
  .form_login_social{
  text-align: center
  }
  .pad{
  padding-right:2px;
  padding-left:2px;
  }
  .marginZeroTop{
  margin-top:0px;
  }
  .marginZeroBottom{
  margin-bottom:1px;
  }
  .login_links {
  flex-direction: column;
  }
  h3.login_alert_h {
  margin-bottom: 8px;
  }
  p.login_alert_p {
  margin-top: 0px;
  }
  a.btn.btn-mo.btn-block.btn-social.btn-google.mo_openid_btn-custom-dec.login-button {
  border-color: white !important;
  background-color: white !important;
  color: black !important;
  }
  .lost {
    color: white;
    text-align: center;
    font-size: 16px;
    margin: 10px auto;
    width: 100%;
    display: block;
    text-decoration: underline;
    }
    .registrate_div {
      background: white;
      border-radius: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 6px 12px;
    }
    .registrate_div p {
      color: black;
      font-size: 15px;
      margin: 0px;
      margin-right: 8px;
    }
    
    .registrate_div a {
      color: #F94742;
      text-decoration: underline;
      font-size: 15px;
    }
    .login_alert_p {
      font-size: 15px;
      margin-top: 4px;
    }
    .login_alert {
      margin: 8px auto 40px;
    }
    form#loginform {
    width: 100%;
    height: auto;
}
.field {
    width: 100%;
}
#loginform input[type=text], #loginform input[type=password] {
    width: 100%;
}
</style>

<div class="content_cont bg_login" id="video_pattern">
  <video  autoplay muted loop id="myVideo"  >
    <source src="<?php echo CSSURL ?>video_desktop.mp4" type="video/mp4">
    Tu navegador no implementa el elemento <code>video</code>.
  </video>
  <div class="form_login_cont">
    <div class="form_login_cont_logo">
      <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6023e00d40e9d78a72ffc4bd_logo_login.png" loading="lazy" alt="" class="login_cont_img"/>
    </div>
<?php echo apply_shortcodes('[loginform redirect="http://my-redirect-url.com"]') ?>
  </div>
  <?php if (!is_user_logged_in()) { ?>
  <p class="o_txt marginZeroBottom">o</p>
  <div class="form_login_social form_login_cont">
    <div class="login_social_cont">
      <?php echo apply_shortcodes('[TheChamp-Login show_username="ON"]') ?>
    </div>
    <a class="lost" href="<?php echo home_url('recuperar-contrasena'); ?>">¿Olvidaste tu contraseña?</a>
  </div>
  <div class="login_alert">
    <div class="registrate_div">
      <p>¿No tienes una cuenta?</p>
      <a href="<?php echo home_url('registro'); ?>">Regístrate</a>
    </div>
    <p class="login_alert_p marginZeroTop">para tener una <b>experiencia personalizada</b></p>
  </div>
    <?php
    if(!wp_is_mobile()) {
    ?>  
    <a class="volver_a" href="<?php echo home_url(''); ?>">VOLVER AL INICIO</a>
    <?php } ?>
  <?php } ?>
    <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
  <?php get_template_part( 'template-parts/version/version' ); ?>
</div>
<?php if(isset($_GET['login']) && $_GET['login'] == 'failed') { 
  ?>
  <script>
    jQuery( document ).ready(function() {
      jQuery(".msgAlert").css("display", "flex");
      jQuery(".msgAlert").css("opacity", "1");
      jQuery(".msgAlert p").html('Ha ocurrido un error <?php echo $_GET['reason']?>');
      setTimeout(function () {
        $(".msgAlert").css("opacity", "0");
        $(".msgAlert").css("display", "none");
        $(".msgAlert p").html("");
      }, 5000);
    });
  </script>
<?php } ?>
<script>
  jQuery( document ).ready(function() {
    jQuery('.header_nav_logo').css('display', 'none');
    jQuery('.header_nav_nav').css('display', 'none');
    jQuery('.side_buttons').css('display', 'none');
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
  });
</script>
<?php
get_footer();
?>
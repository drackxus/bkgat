<?php

/**
 * Template Name: Login 3
 *
 * @package WordPress
 */

get_header();
?>
<style>
.show_pass {
  width: 20px;
  height: 20px;
  display: block;
  position: relative;
  top: -41px;
  float: right;
  cursor: pointer;
  right: 7px;
  padding: 2px;
}
.theChampGoogleLogin, .theChampFacebookLogin {
    display: flex;
    justify-content: flax-start;
    align-items: center;
}
.theChampGoogleLogin span, .theChampFacebookLogin span {
    font-size: 16px;
    font-family: Avenir, sans-serif;
    font-style: normal;
    padding-left: 20px;
    color: black;
}
.login_social_cont {
    width: 50%;
}
.theChampFacebookLogoContainer {
    display: flex;
    justify-content: flax-start;
    align-items: center;
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
    border-radius: 8px;
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
    width: 100%;
    height: auto;
    border-radius: 0px;
    background-color: transparent;
    margin: 0px;
    
    justify-content: center;
}
.theChampGoogleBackground {
    background-color: transparent;
    border: none;
    width: 100%;
    justify-content: center;
}
.theChampLoginSvg {
    width: 35px;
    height: 35px;
    margin-left: -30px;
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

.header_nav_left{ 
        display:none;
}
.header_nav_right{
    margin-left: auto;
}
    .login_social_cont {
    width: 99%;
}
.content_cont {
    padding-top: 45px;
}

  #myVideo {
  position: absolute;
  bottom: 0px;
  right: 0px;
    width: 100%;
    height: 100%;
    object-fit:cover;
  z-index: -1000;
  }
<?php } else { ?>
    .form_block {
    width: 44%;
}
.login_alert {
    width: 43%;
}
.login_alert_p {
    padding-right: 10px;
    padding-left: 10px;
}
.login_social_cont {
    width: 72%;
}
    #myVideo {
    position: fixed;
    top: 0px;
    left: 0px;
    min-width: 100vw;
    min-height: auto;
    height: auto;
    z-index: -1000;
    width: 100vw;
}
  <?php } ?>
  #video_pattern {
  background:#F47D30;
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
  font-weight: 100;
  font-family: 'Gatorade light', sans-serif;
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

<div class="content_cont " id="video_pattern">
<video  autoplay muted loop id="myVideo"  >
  <?php
    if(wp_is_mobile()) {      
    ?> 
    <source src="<?php echo CSSURL ?>video.mp4" type="video/mp4">
    <?php
    }else{
    ?>
    <source src="<?php echo CSSURL ?>video_desktop.mp4" type="video/mp4">
    <?php
    }
    ?>
    
    Tu navegador no implementa el elemento <code>video</code>.
  </video>
  <div class="form_login_cont">
    <div class="form_login_cont_logo">
      <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6023e00d40e9d78a72ffc4bd_logo_login.png" loading="lazy" alt="" class="login_cont_img"/>
    </div>
    <?php
    if (is_user_logged_in()) {
    ?>
    <div class="login_alert">
      <h3 class="login_alert_h">HOLA <br /><?php echo $nameUser; ?></h3>
      <br />
      <p class="login_alert_p">
        <a style="color: white; text-decoration: underline" href="<?php echo wp_logout_url( home_url()); ?>" title="Logout">Salir</a>
      </p>
    </div>
    <?php
    }
    if (!is_user_logged_in()) {
    ?>
    <div class="form_block">
        <form name="loginform" id="loginform" method="post">
            <div class="field">
                <input type="text" class="form_login_input w-input"  name="user_login" id="user_login" placeholder="E-mail" required />
                <label for="user_login" class="form_login_label">E-mail</label>
            </div>
            <div class="field">
                <input type="password" class="form_login_input w-input" name="user_login" id="user_pass" placeholder="Contraseña" required />
                <label for="user_pass" class="form_login_label">Contraseña</label>
                <span class="show_pass">
                  <img src="<?php echo IMGURL ?>view.png" alt="">
                </span>
            </div>
            <?php wp_nonce_field('login_user', 'login_user_nonce'); ?>
            <input type="submit" class="login_submit w-button" value="INGRESAR">
        </form>
    </div>
    <?php
    }
    ?>
  </div>
  <?php if (!is_user_logged_in()) { ?>
  <p class="o_txt marginZeroBottom">o</p>
  <div class="form_login_social form_login_cont">
    <div class="login_social_cont">
        <?php echo apply_shortcodes('[TheChamp-Login redirect_url="'.str_replace(array('http://', 'http://www.', 'www.', 'https://', 'http://www.'), '', network_site_url()).'?nocache=true"]') ?>
    </div>
    <a class="lost" href="<?php echo home_url('recuperar-contrasena'); ?>">¿Olvidaste tu contraseña?</a>
  </div>
  <div class="login_alert">
    <div class="registrate_div">
      <p>¿No tienes una cuenta?</p>
      <a href="<?php echo home_url('registro'); ?>">Regístrate</a>
    </div>
    <p class="login_alert_p marginZeroTop">para tener una <b style="font-family: 'Gatorade med', sans-serif !important;">experiencia personalizada</b></p>
  </div>
    
  <?php } ?>
   <!-- Footer con logo de pepsico-->
    <div>
      <?php 
          if(wp_is_mobile()){
            get_template_part( 'template-parts/foot_logos/foot_logos' );
          }else{
          ?>
          <a class="volver_a" href="<?php echo home_url(''); ?>">VOLVER AL INICIO</a>
          
          
          <?php
          get_template_part( 'template-parts/desktop/footer' );
          }
        ?>
      </div>
</div>
<script>
  jQuery( document ).ready(function() {
    jQuery('.header_nav_logo').css('display', 'none');
    jQuery('.header_nav_nav').css('display', 'none');
    jQuery('.side_buttons').css('display', 'none');
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
  });
</script>
<script>
jQuery( document ).ready(function() {
    jQuery('.theChampFacebookLoginSvg').after('<span>Ingresar con Facebook</span>');
    jQuery('.theChampGoogleLoginSvg').after('<span>Ingresar con Google</span>');
    var first = jQuery('.the_champ_login_ul li:first').get();
    jQuery('.the_champ_login_ul li:last').after(first);

    jQuery('.show_pass').click(function(){
      if(jQuery('#user_pass').attr('type') == 'password'){
        jQuery('#user_pass').prop('type', 'text');
      } else {
        jQuery('#user_pass').prop('type', 'password');
      }
    });
});
</script>
<script>
jQuery('form#loginform').on('submit', function (e) {
  e.preventDefault();
  var user_login = jQuery('#user_login').val();
  var user_pass = jQuery('#user_pass').val();
  var login_user_nonce = jQuery('#login_user_nonce').val();
  $.ajax({
    type: "post",
    url: MyAjax.url,
    data: {
      action: "login_user",
      user_login: user_login,
      user_pass: user_pass,
      login_user_nonce: login_user_nonce
    },
    beforeSend: function() {
      $('#loader').css('display', 'flex');
    },
    error: function(response) {
      console.log(response);
    },
    success: function(response) {
      // console.log(response);
      jQuery('.msgAlert').css('display', 'flex');
      jQuery('.msgAlertCont').css('padding-bottom', '30px');
      jQuery('.msgAlert .txtMsg').html(response);
      if(jQuery('.msgAlert .txtMsg').find('a')) {
        jQuery('.msgAlert .txtMsg').find('a').remove();
      }
      jQuery('#user_login').val('');
      jQuery('#user_pass').val('');
      jQuery('#loader').css('display', 'none');

      strs = response.replace(/\s/g, "");

      if (strs == "0") {
        jQuery('.msgAlert .txtMsg').html("Ha ocurrido un error");
        $("#loader").css("display", "none");
      }
      if (strs == "1") {
        jQuery('.msgAlert .txtMsg').html("Ingreso exitoso. Serás redirigido");
        setTimeout(function(){
          window.location="<?php echo home_url(); ?>?nocache=" + (new Date()).getTime();
        }, 1000);
      }
    }
  });
});
</script>
<?php
get_footer();
?>
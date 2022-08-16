<?php
  /**
   * Template Name: Lostpassword
   *
   * @package WordPress
   */
  
get_header();

$redirect = home_url('recuperar-contrasena?data=true');

?>
<style>
#loginform input[type=text], #loginform input[type=password] {
    width: 100%;
}
#loginform input[type=text], #loginform input[type=password] {
    text-align: center;
    border-radius: 17px;
    width: 285px;
    height: 35px;
    border: none;
    font-size: small;
    color: black;
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
  .form_block{
  width:300px;
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
  .fixed_bottom {
    padding-bottom: 15px;
    padding-top: 15px;
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
.content_cont {
    padding-top: 45px;
}
.form_login_cont_logo {
       width: 100%;
     }
/*cambio mensaje de alerta envio de contraseña al correo*/
.msgAlertCont a.contact_submit.w-button
{
position: relative;
bottom: -20px;
display: none;
width: 88%;
border-radius: 10px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
margin-top: 10px;
font-size: 24px;
padding: 6px;
}

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
  .side_buttons_link.favorite {
  display: none;
  }
  .txt_losepassword {
    text-align: center;
    margin-top: 15px;
    font-size: 16px;
    line-height: 20px;
	width: 310px;
}
</style>
<div class="content_cont bg_login" id="video_pattern" >
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
      <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6023e00d40e9d78a72ffc4bd_logo_login.png" loading="lazy" alt="" class="login_cont_img">
    </div>
    <h2>RESTABLECER<br>CONTRASEÑA</h2>
    <p class="txt_losepassword">Escribe tu dirección de correo electrónico y te enviaremos instrucciones para restablecer la contraseña.</p>
    <div class="form_block" style="margin-bottom:30px;">
      <form name="restablecer_form" id="restablecer_form" method="post">
        <div class="field">
          <input type="email" class="form_login_input w-input" name="user_login" placeholder="Correo Electrónico" id="user_login" required />
          <label for="user_login" class="form_login_label">Correo Electrónico</label>
        </div>
        <input type="hidden" name="redirect_to" value="<?php echo $redirect ?>">
        <input type="submit" value="RESTABLECER" name="restablecer" id="restablecer" class="login_submit w-button">
      </form>
    </div>
    <!--<a href="<?php wp_lostpassword_url(); ?>" target="_blank" style="color:#F5A748;text-decoration:underline;">aquí</a>
  --></div>
  <?php
    if(wp_is_mobile()){
    ?>
    <a class="volver_a" href="<?php echo home_url(''); ?>">VOLVER AL INICIO</a>
    <?php
    get_template_part( 'template-parts/foot_logos/foot_logos');
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
jQuery('form#restablecer_form').on('submit', function (e) {
  e.preventDefault();
  var user_login = jQuery('#user_login').val();
  $.ajax({
    type: "post",
    url: MyAjax.url,
    data: {
      action: "restablecer_pass",
      user_login: user_login
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
      jQuery('#loader').css('display', 'none');

      strs = response.replace(/\s/g, "");

      if (strs == "0") {
        jQuery('.msgAlert .txtMsg').html("Ha ocurrido un error");
        $("#loader").css("display", "none");
      }
      if (strs == "1") {
        jQuery('.txt_losepassword').css('display', 'none');
        jQuery('.form_block').css('display', 'none');
        jQuery('.msgAlert .closeMsg').css('display', 'none');
        jQuery('.msgAlert').css('display', 'flex');
        jQuery('.msgAlert .txtMsg').html("Revisa tu buzón de correo electrónico, hemos enviado las instrucciones para restablecer tu contraseña");
        jQuery('.msgAlert .aMsg').css('display', 'block');
        jQuery('.msgAlert .aMsg').text('Volver al Home');
        jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url(); ?>');
      }
    }
  });
});
</script>
<?php
  get_footer();
  ?>
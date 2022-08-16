












































<?php
  /**
   * Template Name: Newpassword
   *
   * @package WordPress
   */
  
get_header();

?>
<style>
.volver_a {
    color: white;
    text-align: center;
    text-decoration: underline;
    text-transform: uppercase;
    font-size: 26px;
    margin: 20px auto 30px;
    display: block;
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
    width: 256px;
    transition: width 500ms;
    padding-bottom: 15px;
    padding-top: 15px;
}
.show_pass {
  width: 20px;
  height: 20px;
  display: block;
  position: relative;
  top: -18px;
  float: right;
  cursor: pointer;
  right: 7px;
  padding: 2px;
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
.foot_cont {
    width: 100%;
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
  <?php } else{ ?>
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
    margin-top: 0px;
    margin-bottom: 15px;
    font-size: 16px;
    line-height: 20px;
  }
  .login_submit{
  	font-size: 14px;
  }
</style>
<?php 
/*Load Scripts for password reset page*/
wp_enqueue_script( 'zxcvbn-async' );
wp_enqueue_script( 'user-profile' );
wp_enqueue_script( 'password-strength-meter' );
wp_enqueue_script( 'user-suggest' );
?>

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
    <h2>ACTUALIZA TU<br>CONTRASEÑA</h2>
    <!--<p class="txt_losepassword">Tu contraseña debe tener al menos siete caracteres. Mezcla de mayúsculas y minúsculas, números y símbolos como ! " ? $ % ^ &) la hará más fuerte.</p>-->
    <p class="txt_losepassword"><b>Introduce tu nueva contraseña</b></p>
    <div class="form_block" style="margin-bottom:30px;">
      <form method="post" id="resetpassform" name="resetpassform">
        <input type="hidden" name="login" value="<?php echo $_GET['login'] ?>" autocomplete="off">
        <input type="hidden" name="key" value="<?php echo strip_tags($_GET['key']); ?>" />
        <div class="field">
          <i class="fa fa-key icon"></i>
          <input type="password" class="form_login_input w-input input" value="" placeholder="Nueva contraseña" id="pass1" name="pass1" required>
          <label for="pass1" class="form_login_label">Nueva contraseña</label>
          <span class="show_pass">
                  <img src="<?php echo IMGURL ?>view.png" alt="">
                </span>
        </div>
        <div class="field">
          <input type="password" class="form_login_input w-input input" value="" placeholder="Confirmar contraseña" id="pass3" name="pass3" required>
          <label for="pass1" class="form_login_label">Confirmar contraseña</label>
          <span class="show_pass">
                  <img src="<?php echo IMGURL ?>view.png" alt="">
                </span>
        </div>
        <p id="pass-strength-result" class="txt_losepassword"><?php _e('Strength indicator'); ?></p>
        <input type="submit" value="ACTUALIZAR CONTRASEÑA" class="login_submit w-button">
      </form>
      <div class="login-error"><div></div></div>
    </div>
  </div>
  <a class="volver_a" href="<?php echo home_url(''); ?>">VOLVER AL INICIO</a>

<?php if(wp_is_mobile()){
      get_template_part( 'template-parts/foot_logos/foot_logos' );
  }else{
      get_template_part( 'template-parts/desktop/footer' );
  }
  ?>
</div>



<script>
jQuery(document).ready(function() {

// function sh-hd-password() {
//   var x = document.getElementById("pass1");
//   if (x.type === "password") {
//     x.type = "text";
//   } else {
//     x.type = "password";
//   }
// }

jQuery( document ).ready(function() {

    jQuery('.show_pass').click(function(){
      if(jQuery('#pass1').attr('type') == 'password'){
        jQuery('#pass1').prop('type', 'text');
      } else {
        jQuery('#pass1').prop('type', 'password');
      }
    });
});

jQuery( document ).ready(function() {

jQuery('.show_pass').click(function(){
  if(jQuery('#pass3').attr('type') == 'password'){
    jQuery('#pass3').prop('type', 'text');
  } else {
    jQuery('#pass3').prop('type', 'password');
  }
});
});



// Submit the password reset form via ajax
$( '#resetpassform' ).submit(function(e){

  e.preventDefault();

  $('.login-error').slideUp();

//check if password fields are empty
if( $('#pass1').val()=='' || $('#pass3').val()=='' ){
  return false;
}

if( $('#pass1').val() !== $('#pass3').val() ){
  
    jQuery('.msgAlert').css('display', 'flex');
    jQuery('.msgAlertCont').css('padding-bottom', '30px');
    jQuery('.msgAlert .txtMsg').html("Las contraseñas no coinciden");
    jQuery('#loader').css('display', 'none');
  return false;
}
if( $('#pass-strength-result').html() =="Muy débil" || $('#pass-strength-result').html() =="Débil" ){
  
    jQuery('.msgAlert').css('display', 'flex');
    jQuery('.msgAlertCont').css('padding-bottom', '30px');
    jQuery('.msgAlert .txtMsg').html("Las contraseña no es lo suficientemente fuerte");
    jQuery('#loader').css('display', 'none');
  return false;
}

var formData= $(this).serialize();


jQuery.ajax({
  type: "post",
  url: MyAjax.url,
  data: {
    form_values: formData, action:'reset_user_pass'
  },
  beforeSend: function() {
    jQuery('#loader').css('display', 'flex');
  },
  error: function(response) {
    // console.log(response);
    console.log('error');
    jQuery('.msgAlert').css('display', 'flex');
    jQuery('.msgAlertCont').css('padding-bottom', '30px');
    jQuery('.msgAlert .txtMsg').html(response);
    jQuery('#loader').css('display', 'none');
  },
  success: function(response) {
    // Actualiza el mensaje con la respuesta
    // console.log(response);
    var resp = response.replace(/\s+/g, '');
    jQuery('.msgAlert').css('display', 'flex');
    jQuery('.msgAlert .txtMsg').html(response);
    if(resp == '1') {
      jQuery('.msgAlert .txtMsg').html('Las contraseñas no coinciden');
    }
    if(resp == '2') {
      jQuery('.msgAlert .txtMsg').html('Contraseña actualizada correctamente');
      jQuery('.msgAlert .aMsg').css('display', 'block');
      jQuery('.msgAlertCont').css('padding-bottom', '30px');
      jQuery('.msgAlert .aMsg').text('INGRESAR');
      jQuery('.msgAlert .aMsg').css('bottom', '-56px');
      jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url('ingreso'); ?>');
    }
    
    jQuery('#loader').css('display', 'none');
  }
});
});
});

</script>
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
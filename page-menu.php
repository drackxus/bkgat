








<?php

/**
 * Template Name: Login
 *
 * @package WordPress
 */

get_header();

global $current_user;
wp_get_current_user();
if (is_user_logged_in()) {
    $loginUser = "true";
    $nameUser = $current_user->user_login; $idUser = $current_user->ID; 
} else {
$loginUser = false; 
} 
?>
<style>
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
<?php
if(wp_is_mobile()) {
?>  
.login_cont_img {
        width: 40%;
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
    position: absolute;
    bottom: 0px;
    right: 0px;
    min-width: 100%;
    min-height: 100%;
    height: 400%;
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
</style>
<div class="content_cont bg_login" id="video_pattern">
<video  autoplay muted loop id="myVideo"  >
  <source src="<?php echo CSSURL ?>video.mp4" type="video/mp4">
  Tu navegador no implementa el elemento <code>video</code>.
</video>

  <div class="form_login_cont">
    <div class="form_login_cont_logo">
      <img
        src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6023e00d40e9d78a72ffc4bd_logo_login.png"
        loading="lazy"
        alt=""
        class="login_cont_img"
      />
    </div>
    <?php if ($loginUser == "true") { ?>
    <div class="login_alert">
      <h3 class="login_alert_h">HOLA <br /><?php echo $nameUser; ?></h3>
      <br />
      <p class="login_alert_p">
        <a style="color: white; text-decoration: underline" href="<?php echo wp_logout_url( home_url()); ?>" title="Logout">Salir</a>
      </p>
    </div>
    <?php } ?>
    <?php if (!$loginUser == "true") { ?>
    <div class="form_block">
      <form id="login_form" name="login_form" method="post">
        <div class="field">
          <input
            type="text"
            class="form_login_input w-input"
            name="user"
            placeholder="E-mail"
            id="user"
            required
          />
          <label for="user" class="form_login_label">E-mail</label>
        </div>
        <div class="field">
          <input
            type="password"
            class="form_login_input w-input"
            name="user"
            placeholder="Contraseña"
            id="pass"
            required
          />
          <label for="pass" class="form_login_label">Contraseña</label>
        </div>

        <input
          type="submit"
          value="INGRESAR"
          class="login_submit w-button"
          id="test"
        />
      </form>
    </div>
    <?php } ?>
  </div>
  <?php if (!$loginUser == "true") { ?>
  <p class="o_txt marginZeroBottom">o</p>
  <div class="form_login_social form_login_cont">
    <div class="login_social_cont">
      <?php echo apply_shortcodes('[miniorange_social_login theme="default" color="FFFFFF"]') ?>
    </div>
    <div class="login_links">
      <a href="<?php echo home_url('registro'); ?>" class="login_links_member pad"
        >¿Aún no eres miembro?</a
      ><a
        href="<?php echo home_url('registro'); ?>"
        class="login_links_register pad"
        >Regístrate</a
      >
    </div>
  </div>
  <div class="login_alert">
    <h3 class="login_alert_h marginZeroBottom">¡ALERTA!</h3>
    <p class="login_alert_p marginZeroTop">
      Registrate para tener una experiencia personalizada
    </p>
  </div>
  <?php } ?>
  <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
  <?php get_template_part( 'template-parts/version/version' ); ?>
</div>

<script>
  jQuery( document ).ready(function() {
    jQuery('.header_nav_logo').css('display', 'none');
    jQuery('.header_nav_nav').css('display', 'none');
    jQuery('.side_buttons').css('display', 'none');
});
</script>
<?php
if(wp_is_mobile()) {
?> 
<script>
  jQuery( document ).ready(function() {
      jQuery('.header_nav_close').css('display', 'flex');
      jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
  });
</script>
<?php
}
?>
<script>
  jQuery(document).ready(function () {
    jQuery("#login_form").on("submit", function (e) {
      e.preventDefault();
      //obtenemos el valor de los input
      if ($("#user") && $("#pass")) {
        var user = $("#user").val();
        var pass = $("#pass").val();
        // console.log(user);
        // console.log(pass);

        $.ajax({
          type: "post",
          url: MyAjax.url,
          data: {
            action: "login_user",
            user: user,
            pass: pass,
          },
          beforeSend: function () {
            $("#loader").css("display", "flex");
          },
          error: function (response) {
            console.log(response);
          },
          success: function (response) {
            // Actualiza el mensaje con la respuesta
            console.log(response);
            $("#user").val("");
            $("#pass").val("");
            $(".msgAlert").css("display", "flex");
            $(".msgAlert").css("opacity", "1");

            strs = response.replace(/\s/g, "");
            if (strs == "1") {
              $(".msgAlert p").html("Acceso exitoso. Serás redirigido");
              $("#loader").css("display", "none");

              setTimeout(function(){
                location.href = '<?php echo home_url('/co'); ?>';
              }, 3000);
            } else {
              $(".msgAlert p").html(response);
              $("#loader").css("display", "none");
            }
            setTimeout(function () {
              $(".msgAlert").css("opacity", "0");
              $(".msgAlert").css("display", "none");
              $(".msgAlert p").html("");
            }, 5000);
          },
        });
      }
    });
  });
</script>
<?php
get_footer();
?>
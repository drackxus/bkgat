<?php

/**
 * Template Name: Completar perfil
 *
 * @package WordPress
 */

get_header();

global $current_user;
wp_get_current_user();
  if (is_user_logged_in()) {
    $loginUser = "true";
    $nameUser = $current_user->user_login;
    $idUser = $current_user->ID;
    //wp_redirect(home_url());
    //exit();
  } else {
    $loginUser = false; 
  } 

 $politica_privacidad = get_option('politica_privacidad');
 $terminos_condiciones = get_option('terminos_condiciones');
 $tratamiento_datos = get_option('tratamiento_datos');
?>
<style>
select {
    background-position-x: 98%;
    background-position-y: 10px;
}
span{
  margin-top: -17px !important;
}
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 20px;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  
border-radius: 15px;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
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
    padding:4px;
    margin-left: 29px;
    font-size: 14px;
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
 
 <?php
}
else{
?>
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
.form_block {
    width: 40%;
}
.fixed_bottom {
    margin-bottom: -50px;
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
.asterisc {
    text-align: center;
    font-size: 13px;
    margin: 0px;
    margin-top: -7px;
}
.check_boxes{
  padding-bottom: 75px;
}
</style>
<div class="content_cont" id="video_pattern" >

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
    <h2>??COMPLETA TU PERFIL!</h2>
   
    <div class="form_block">
      <form id="completar_perfil" name="completar_perfil" method="post">
        <div class="field">
          <input type="text" class="form_login_input w-input" name="nombre" id="nombre" placeholder="Nombre*" required=""
          pattern="[a-zA-Z ]{3,}"
          title="El nombre debe tener como m??nimo 3 car??cteres alfab??ticos">
          <label for="nombre" class="form_login_label">Nombre*</label>
        </div>
        <div class="field">
          <input type="text" class="form_login_input w-input" name="apellido" id="apellido" placeholder="Apellido*" required=""
          pattern="[a-zA-Z ]{3,}"
          title="El apellido debe tener como m??nimo 3 car??cteres alfab??ticos"
          >
          <label for="apellido" class="form_login_label">Apellido*</label>
        </div>
        <div class="field">
           <select class="form_login_input w-input" name="pais" id="pais" placeholder="Pa??s*" required="">
            <option value="ar">Argentina</option>
            <option value="bo">Bolivia</option>
            <option value="br">Brasil</option>
            <option value="cl">Chile</option>
            <option value="co">Colombia</option>
            <option value="cr">Costa rica</option>
            <option value="ec">Ecuador</option>
            <option value="sv">El Salvador</option>
            <option value="gt">Guatemala</option>
            <option value="hn">Honduras</option>
            <option value="mx">M??xico</option>
            <option value="ni">Nicaragua</option>
            <option value="pa">Panam??</option>
            <option value="py">Paraguay</option>
            <option value="pe">Per??</option>
            <option value="pr">Puerto Rico</option>
            <option value="do">Rep??blica Dominicana</option>
            <option value="uy">Uruguay</option>
            <option value="ve">Venezuela</option>
          </select>  
          <label for="pais" class="form_login_label">Pa??s*</label>
        </div>
        <div class="field">
            <input id="celular" name="celular" type="tel" class="form_login_input w-input">
            <label for="celular" class="form_login_label">Pa??s</label>
        </div>
        <div class="field">
          <select class="form_login_input w-input" name="deporte" id="deporte" placeholder="Elije tu deporte favorito" required=""> 
            <?php
            multisite_profession_select();
            function multisite_profession_select(){
                switch_to_blog(1);
                $taxonomies = array('deportesTarjetas');
            
                $check_later = array();
                global $wp_taxonomies;
                foreach($taxonomies as $taxonomy){
                    if (isset($wp_taxonomies[$taxonomy])){
                        $check_later[$taxonomy] = false;
                    } else {
                        $wp_taxonomies[$taxonomy] = true;
                        $check_later[$taxonomy] = true;
                    }
                }
                $args = array('hide_empty' => false, 'orderby' => 'name', 'order' => 'ASC');
                $terms = get_terms($taxonomies, $args );
                foreach($terms as $term){
            ?>
            <option value="<?php echo $term->name; ?>"><?php echo $term->name; ?></option>
            <?php    
                }
                 if (isset($check_later))
                    foreach($check_later as $taxonomy => $unset)
                        if ($unset == true)
                            unset($wp_taxonomies[$taxonomy]);
                // restore_current_blog();
            }
            ?>
          </select> 
          <label for="deporte" class="form_login_label">Deporte favorito*</label>
          <p class="asterisc">*Todo campo con * es obligatorio.</p>
        </div>
        <div class="check_boxes">
            <div class="text_medium_center">
            
                <?php
                if($tratamiento_datos) {
                ?>
                <label class="container" id="colombia" style="display:none;">
                <input type="checkbox" class="checkbox" id="tratamiento_datos" name="tratamiento_datos" value="TRUE" checked="checked" required /><a href="<?php echo $tratamiento_datos; ?>" target="blank_"><span>Autorizo expresamente el tratamiento de mis datos personales</span></a>
                <span class="checkmark"></span>
                </label>
                <?php
                }
                ?>

                <?php
                if($politica_privacidad) {
                ?>
                <label class="container">
                <input type="checkbox" class="checkbox" id="politicas_privacidad" name="politicas_privacidad" value="TRUE" required/><a href="<?php echo $politica_privacidad; ?>" target="blank_"><span>Acepto la Pol??tica de Privacidad y Cookies.</span></a>
                <span class="checkmark"></span>
                </label>
                <?php
                }
                ?>

                <?php
                if($terminos_condiciones) {
                ?>
                <label class="container">
                <input type="checkbox" class="checkbox" id="terminos_condiciones" name="terminos_condiciones" value="TRUE" required/><a href="<?php echo $terminos_condiciones; ?>" target="blank_"><span>Acepto T??rminos y condiciones de la P??gina Web.</span></a>
                <span class="checkmark"></span>
                </label>
                <?php
                }
                ?>
          
            </div>
        </div>
        
        <input type="submit" value="COMPLETAR" class="login_submit w-button" id="test">  
      </form>
      <div>
      <?php 
          if(wp_is_mobile()){
            get_template_part( 'template-parts/foot_logos/foot_logos' );
          }else{
          ?>
          <a class="volver_a" href="<?php echo home_url(''); ?>">VOLVER AL INICIO</a>
          <?php
          }
        ?>
      </div>
    </div>
      
    </div>
      
</div>
<script>
  jQuery( document ).ready(function() {
    jQuery('.header_nav_logo').css('display', 'none');
    jQuery('.header_nav_nav').css('display', 'none');
    jQuery('.side_buttons').css('display', 'none');
    
    jQuery(document).on('change', '#pais', function(event) {
         if(jQuery(this).val()== 'co'){
             jQuery('#colombia').show();
         }else{
             jQuery('#colombia').hide();
         }
    });
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
    jQuery("#completar_perfil").on("submit", function (e) {
      e.preventDefault();
      //obtenemos el valor de los input
      if ($("#nombre") && $("#pais") && $("#apellido")) {
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var pais = $("#pais").val();
        var user_id = <?php echo $current_user->ID; ?>;
        // if($("#celular").val()) {
        //   var celular = $('[name="full_number"]').val();
        // }
        var celular = indicativo_init.getNumber();
        if($("#deporte").val()) {
          var deporte = $("#deporte").val();
        }
        var tratamiento_datos = $("#tratamiento_datos").val();
        var politicas_privacidad = $("#politicas_privacidad").val();
        var terminos_condiciones = $("#terminos_condiciones").val();
        $.ajax({
          type: "post",
          url: MyAjax.url,
          data: {
            action: "completar_perfil",
            nombre: nombre,
            apellido: apellido,
            pais: pais,
            celular: celular,
            deporte: deporte,
            tratamiento_datos: tratamiento_datos,
            politicas_privacidad: politicas_privacidad,
            terminos_condiciones: terminos_condiciones,
            user_id: user_id
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
            $("#nombre").val("");
            $("#apellido").val("");
            $("#pais").val("");
            $("#celular").val("");
            $("#deporte").val("");
            $("#terminos").val("");
            $("#whatsapp").val("");
            $("#email_consent").val("");
            jQuery('.msgAlert').css('display', 'flex');
            jQuery('.msgAlertCont').css('padding-bottom', '30px');
            jQuery('.msgAlert .txtMsg').html(response);
            jQuery('#loader').css('display', 'none');

            strs = response.replace(/\s/g, "");

            if (strs == "0") {
              jQuery('.msgAlert .txtMsg').html("Ha ocurrido un error");
              $("#loader").css("display", "none");
            }
            if (strs == "1") {
              jQuery('.msgAlert .txtMsg').html("Tu perfil se ha completado con exito. Ser??s redirigido");
              $("#loader").css("display", "none");
              setTimeout(function(){
                window.location="<?php echo home_url(); ?>?nocache=" + (new Date()).getTime();
              }, 2000);
            }
          },
        });
      }
    });
  });
</script>
<script>
jQuery(document).on('change','#politicas_privacidad',function(){
    if (jQuery(this).is(':checked'))
    {
        jQuery('#celular').attr('required', true);
    }
    else
    {
        jQuery('#celular').removeAttr('required');
    }
});
</script>
<link rel="stylesheet" href="<?php echo JSURL; ?>indicativos/ind.css">
<link rel="stylesheet" href="<?php echo JSURL; ?>indicativos/demo.css">
<script src="<?php echo JSURL; ?>indicativos/ind.js"></script>
<script>
    var indicativo = document.querySelector("#celular");
    var indicativo_init = window.intlTelInput(indicativo, {
      // allowDropdown: false,
      autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      formatOnDisplay: false,
      hiddenInput: "full_number",
       initialCountry: "mx",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
       placeholderNumberType: "MOBILE",
       preferredCountries: ['co', 'cl', 'mx'],
       separateDialCode: true,
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.0.3/js/utils.js"
    });
    
    jQuery(document).on('change','#pais',function(){
        indicativo_init.setCountry(jQuery(this).val());
    });
  </script>
<?php
get_footer();
?>
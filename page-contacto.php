<?php

/**
 * Template Name: Contacto
 *
 * @package WordPress
 */

get_header();
?>

<?php
if(wp_is_mobile()){
?>
<style>
    .side_buttons_link.favorite {
    display: none;
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
  <div class="contact_cont">
    <div class="content_cont_tit_h1 center">
      <h1 class="content_cont_h1 center">CONTACTO</h1>
      <div class="content_cont_h1_line"></div>
    </div>
    <div class="form_block form_contact">
      <form
        id="contact_form"
        name="contact_form"
        class="form_cont form_cont_contact"
      >
      <div class="field">
        <input type="text" class="form_login_input w-input" name="nombre" id="nombre" placeholder="Nombre*" required="" onkeypress="return (event.charCode > 64 && 
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
        pattern="[a-zA-Z ]{3,}"
        title="El nombre debe tener como mínimo 3 carácteres alfabéticos"
        >
        <label for="nombre" class="form_login_label">Nombre*</label>
      </div>
      <div class="field">
        <input type="text" class="form_login_input w-input" name="email" id="email" placeholder="E-mail" required=""
        title="El email debe tener el formato usuario@dominio.co como mínimo"
        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
        >
        <label for="email" class="form_login_label">E-mail*</label>
      </div>
      <div class="field">
        <select class="form_login_input w-input" name="pais" id="pais" placeholder="País" required="">
          <option value="Argentina">Argentina</option>
          <option value="Bolivia">Bolivia</option>
          <option value="Brazil">Brazil</option>
          <option value="Chile">Chile</option>
          <option value="Colombia">Colombia</option>
          <option value="Costa rica">Costa rica</option>
          <option value="Ecuador">Ecuador</option>
          <option value="El Salvador">El Salvador</option>
          <option value="Guatemala">Guatemala</option>
          <option value="Honduras">Honduras</option>
          <option value="Mexico">Mexico</option>
          <option value="Nicaragua">Nicaragua</option>
          <option value="Panama">Panama</option>
          <option value="Paraguay">Paraguay</option>
          <option value="Peru">Peru</option>
          <option value="Puerto Rico">Puerto Rico</option>
          <option value="Republica dominicana">Republica dominicana</option>
          <option value="Uruguay">Uruguay</option>
          <option value="Venezuela">Venezuela</option>
        </select>  
        <label for="pais" class="form_login_label">País*</label>
      </div>
      <div class="field">
        <input type="text" class="form_login_input w-input" name="asunto" id="asunto" placeholder="Asunto*" required=""
        pattern="[a-zA-Z ]{3,}"
        >
        <label for="asunto" class="form_login_label">Asunto*</label>
      </div>
      <div class="field">
      <textarea placeholder="Mensaje*" maxlength="5000" id="mensaje" name="mensaje" class="form_login_textarea w-input" required></textarea>
        <label for="mensaje" class="form_login_label">Mensaje*</label>
      </div>
        <input
          type="submit"
          value="ENVIAR"
          data-wait=""
          class="contact_submit w-button"
        />
      </form>
    </div>
  </div>
  <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>



<script type="text/javascript">
  jQuery(document).ready(function () {
    jQuery(".header_nav_close").css("display", "flex");
    jQuery(".header_nav_close").attr("href", "<?php echo home_url('perfil'); ?>");
    jQuery('.side_buttons_link.favorite').css('display', 'none');
  });
</script>

<script>
  jQuery(document).ready(function () {
    jQuery("#contact_form").on("submit", function (e) {
      e.preventDefault();
      //obtenemos el valor de los input
      if ($("#nombre") && $("#email") && $("#pais") && $("#asunto") && $("#mensaje")) {
        var nombre = $("#nombre").val();
        var email = $("#email").val();
        var pais = $("#pais").val();
        var asunto = $("#asunto").val();
        var mensaje = $("#mensaje").val();
        console.log(nombre);
        console.log(email);

        $.ajax({
          type: "post",
          url: MyAjax.url,
          data: {
            action: "contact",
            nombre: nombre,
            email: email,
            pais: pais,
            asunto: asunto,
            mensaje: mensaje,
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
            $("#email").val("");
            $("#pais").val("");
            $("#asunto").val("");
            $("#mensaje").val("");
            
            jQuery('.msgAlert').css('display', 'flex');
            jQuery('.msgAlertCont').css('padding-bottom', '30px');
            jQuery('.msgAlert .txtMsg').html(response);
            jQuery('#loader').css('display', 'none');

            strs = response.replace(/\s/g, "");

            if (strs == "0") {
              jQuery('.msgAlert .txtMsg').html("Sus datos de acceso son incorrectos");
              $("#loader").css("display", "none");
            }
            if (strs == "1") {
              jQuery('.msgAlert .txtMsg').html("Acceso exitoso. Serás redirigido");
              $("#loader").css("display", "none");

              setTimeout(function(){
                window.location.replace("<?php echo home_url(); ?>");
              }, 3000);
            }
          },
        });
      }
    });
  });
</script>

<?php
}else{
?>
<div class="home">

  <?php get_template_part( 'template-parts/desktop/header' ); ?>
  <?php get_template_part( 'template-parts/desktop/banner' ); ?>
   
<style>
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
    <div class="content_cont_tit_h1 center">
      <h1 class="content_cont_h1 center">CONTACTO</h1>
      <div class="content_cont_h1_line"></div>
    </div>
    <div class="form_block form_contact">
      <form
        id="contact_form"
        name="contact_form"
        class="form_cont form_cont_contact"
      >
        <div class="field">
          <input
            type="text"
            class="form_login_input w-input"
            name="nombre"
            placeholder="Nombre"
            id="nombre" required
            onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
          />
        </div>
        <div class="field">
          <input
            type="email"
            class="form_login_input w-input"
            name="email"
            placeholder="E-mail"
            id="email" required
          />
        </div>
        <div class="field">
          <input
            type="text"
            class="form_login_input w-input"
            name="pais"
            placeholder="País"
            id="pais" required
          />
        </div>
        <div class="field">
          <input
            type="text"
            class="form_login_input w-input"
            name="asunto"
            placeholder="Asunto"
            id="asunto" required
          />
        </div>
        <div class="field">
        <textarea
          placeholder="Mensaje"
          maxlength="5000"
          id="mensaje"
          name="mensaje"
          class="form_login_textarea w-input" required
        ></textarea>
        </div>
        <input
          type="submit"
          value="ENVIAR"
          data-wait=""
          class="contact_submit w-button"
        />
      </form>
    </div>
  </div>
</div>
<?php get_template_part( 'template-parts/desktop/footer' ); ?>



<script type="text/javascript">
  jQuery(document).ready(function () {
    jQuery(".header_nav_close").css("display", "flex");
    jQuery(".header_nav_close").attr("href", "<?php echo home_url('perfil'); ?>");
    jQuery('.side_buttons_link.favorite').css('display', 'none');
  });
</script>

<script>
  jQuery(document).ready(function () {
    jQuery("#contact_form").on("submit", function (e) {
      e.preventDefault();
      //obtenemos el valor de los input
      if ($("#nombre") && $("#email") && $("#pais") && $("#asunto") && $("#mensaje")) {
        var nombre = $("#nombre").val();
        var email = $("#email").val();
        var pais = $("#pais").val();
        var asunto = $("#asunto").val();
        var mensaje = $("#mensaje").val();
        console.log(nombre);
        console.log(email);

        $.ajax({
          type: "post",
          url: MyAjax.url,
          data: {
            action: "contact",
            nombre: nombre,
            email: email,
            pais: pais,
            asunto: asunto,
            mensaje: mensaje,
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
            $("#email").val("");
            $("#pais").val("");
            $("#asunto").val("");
            $("#mensaje").val("");
            $(".msgAlert").css("display", "flex");
            $("#loader").css("display", "none");

            strs = response.replace(/\s/g, "");

            if (strs == "0") {
              $(".msgAlert p").html("Sus datos de acceso son incorrectos");
              $("#loader").css("display", "none");
            }
            if (strs == "1") {
              $(".msgAlert p").html("Acceso exitoso. Serás redirigido");
              $("#loader").css("display", "none");

              setTimeout(function(){
                window.location.replace("<?php echo home_url(); ?>");
              }, 3000);
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
    
</div>
</div>
<?php 
}
?>

<?php
get_footer();
?>
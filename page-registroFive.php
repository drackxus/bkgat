<?php

/**
 * Template Name: Registro five
 *
 * @package WordPress
 */

if($_GET['id_five']) {
    $id_five = $_GET['id_five'];
    $nombre = get_post_meta($id_five, 'nombre', true);
    $apellido = get_post_meta($id_five, 'apellido', true);
    $correo = get_post_meta($id_five, 'correo', true);
    $celular = get_post_meta($id_five, 'celular', true);
    $fecha_nacimiento = get_post_meta($id_five, 'fecha_nacimiento', true);
    $pais = get_post_meta($id_five, 'pais', true);
    $genero = get_post_meta($id_five, 'genero', true);
    $tryout = get_post_meta($id_five, 'tryout', true);
    $posicion = get_post_meta($id_five, 'posicion', true);
    $tipo_registro = get_post_meta($id_five, 'tipo_registro', true);
    $postmetas = get_post_meta($id_five);
} else {
    wp_redirect(home_url('eventos/gatorade-2022-5v5/'));
    exit;
}
get_header();
?>
<style>
    * {
        box-sizing: border-box;
    }
    body {
        margin: 0;
    }
    .landing_five {
        padding: 0px;
        width: 100%;
        height: auto;
        background-image: url("<?php echo IMGURL; ?>five/landing_bg2.jpg");
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: scroll;
        background-size: cover;
        display: flex;
        justify-content: space-between;
        align-items: stretch;
        align-self: center;
        color:black;
    }
    .landing_five_cont {
        padding: 40px 16px 16px 60px;
        width: 100%;
        height: auto;
        background-image: url("<?php echo IMGURL; ?>five/landing_bg2.jpg");
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: scroll;
        background-size: cover;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .border_black {
        width: 30px;
        height: auto;
        background-color: #000000;
        background-image: url("<?php echo IMGURL; ?>five/cenefa.jpg");
        background-repeat: repeat;
        background-position: center top;
        background-attachment: scroll;
        background-size: contain;
        padding: 0px;
        min-height: 100%;
    }
    .landing_right {
        padding: 0px;
        width: 70px;
        height: auto;
        background-image: url("<?php echo IMGURL; ?>five/right.jpg");
        background-repeat: no-repeat;
        background-position: center top;
        background-attachment: scroll;
        background-size: cover;
    }
    .landing_logo {
        width: 200px;
    }
    .menor {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }
    .input {
        display: block;
        width: 100%;
        padding: 7px 9px;
        border: 1px solid black;
        font-family: Avenir, sans-serif;
        color:#3b3c3c;
        font-weight:300;
    }
    .label {
        display: block;
        width: 100%;
        font-weight: 700;
        text-transform: uppercase;
        height:auto;
        color:black;
        font-family: 'Gatorade black';
        font-size: 18px;
        margin-bottom:3px;
    }
    .form-group {
        width: 48%;
        margin: 0 0 0 0;
        padding: 0 12px 16px 12px;
    }
    .form {
        display: flex;
        width: 80%;
        flex-wrap: wrap;
    }
    .select {
        padding: 7px 9px;
        border: 1px solid black;
        font-family: Avenir, sans-serif;
        color:#3b3c3c;
        font-weight:300;
        background-color: white;
        text-align: left;
        text-align-last: left;
        width:100%;
        background-position-x: 97%;
    }
    .formulario_tit {
        text-align: center;
        font-size: 20px;
        text-transform: uppercase;
        color:black;
        font-size: 23px;
        margin: 10px;
        width:100%;
    }
    .input.input2 {
        display: inline;
        width: auto;
        margin: 0 0 11px 0;
        padding:4px 9px;
    }
    .consentimiento {
        width: 100%;
        margin: 20px 0 20px 0;
        font-family: Avenir, sans-serif;
        font-weight:bold;
        font-size: 16px;
    }
    .link_terminos {
        color: #ffffff;
        font-family: Avenir, sans-serif;
        font-weight:400;
        margin:0px 8px;
        font-size:16px;
        text-decoration:underline;
    }
    .label.label2 {
        text-transform: initial;
        font-family: Avenir, sans-serif;
        font-weight:bold;
        font-size:15px;
        display:flex;
    }
    .radio {
        width: 20px;
        height: 20px;
    }
    .form-group.full {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 12px 0 12px;
    }
    .button.landing_button {
        background-image: url("<?php echo IMGURL; ?>five/btn.png");
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: scroll;
        background-size: cover;
        width: 125px;
        height: 51px;
        margin: 30px 0 30px 0;
        background-color: transparent;
        border: none !important;
        padding: 0px;
        border-radius: 0px;
    }
    .logo_foot {
        margin: 0 auto 0 auto;
    }
    .landing_footer {
        padding: 20px 20px 20px 20px;
        width: 100%;
        height: auto;
        background-color: #000000;
    }
    .border_black_bottom {
        padding: 0px;
        width: 100%;
        height: 30px;
        background-color: #000000;
        background-image: url("<?php echo IMGURL; ?>five/cenefa2.jpg");
        background-repeat: repeat-x;
        background-position: left center;
        background-attachment: scroll;
        background-size: contain;
    }
    .landing_registrate {
        /* width: 218px; */
        height: 56px;
        width: auto;
        margin-bottom:20px;
    }
    #iapuo {
        margin: 0 0 16px 0;
    }
    #iim6g {
        display: flex;
        flex-direction: column;
    }
    #i6wwn {
        width: 170px;
    }
    .txt_orange {
        text-align: center;
        color: #f36c21;
        margin: 16px 0 2px 0;
        font-family: Avenir, sans-serif;
        font-weight:bold;
        font-size:17px;
    }
    .link_email {
        text-align: center;
        color: #ffffff;
        font-weight: 700;
        margin: 10px 0 10px 0;
        font-family: 'Gatorade med';
        text-decoration: underline;
    }
    #no_interes {
        cursor: pointer;
        text-decoration: underline;
        text-align: center;
        display: none;
        margin: 0 auto;
        margin-bottom: 30px;
    }
    h3 {
        color: black;
        text-align:center;
        background: white;
        padding: 5px 10px;
        box-shadow: 6px 7px 1px black;
        width: 78%;
    }
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
    @media (max-width: 992px) {
        .form {
            width: 96%;
        }
        .consentimiento {
            width: 96%;
        }
        .landing_five_cont {
            padding: 40px 16px 16px 30px;
        }
    }
    @media (max-width: 480px) {
        .border_black {
            width: 15px;
            background-size: contain;
        }
        #itj6 {
            background-size: cover;
        }
        .landing_five_cont {
            padding: 40px 16px 16px 16px;
        }
        .landing_right {
            width: 0;
        }
        .form-group {
            width: 100%;
            padding: 0 0 16px 0;
        }
    }
</style>
<div id="ipn4" class="landing_five">
   <div id="itj6" class="landing_five_cont">
        <img src="<?php echo IMGURL; ?>five/logo_tryout.png" id="ig92" class="landing_logo" />
        <?php
            if($pais != 'br') {
        ?>
        <img src="<?php echo IMGURL; ?>five/logo_registrate.png" class="landing_registrate" id="tryout_registro" />
        <img src="<?php echo IMGURL; ?>five/logo_comunidad.png" class="landing_registrate" id="comunidad_registro" />
        <img src="<?php echo IMGURL; ?>five/logo_registrate.png" class="landing_registrate" id="notify_registro" />
        <?php
            } else {
        ?>
        <img src="<?php echo IMGURL; ?>five/logo_registrate_br.png" class="landing_registrate" id="tryout_registro" />
        <img src="<?php echo IMGURL; ?>five/logo_comunidad_br.png" class="landing_registrate" id="comunidad_registro" />
        <img src="<?php echo IMGURL; ?>five/logo_registrate_br.png" class="landing_registrate" id="notify_registro" />
        <?php
            }
        ?>
        <?php
        if($tryout != '' && $tipo_registro == 'Tryout') {
        ?>
        <h3 id="ya_tryouts"><?php echo ($pais != 'br') ? 'Ya estás registrado en una prueba, ten en cuenta que si actualizas la información, perderás este registro.' : 'Você já está registrado para as seletivas, saiba que se você atualizar essa informação perderá o registro.' ?></h3>
        <?php
        }
        if($tipo_registro == 'Community' || $tipo_registro == 'Notifyme') {
        ?>
        <h3 id="ya_tryouts"><?php echo ($pais != 'br') ? 'Ya estás registrado, ten en cuenta que si actualizas la información, perderás este registro.' : 'Você já está registrado, saiba que se você atualizar essa informação perderá o registro.' ?></h3>
        <?php
        }
        ?>
        <br>
      <h1 id="i22r" class="formulario_tit"><?php echo ($pais != 'br') ? 'JUGADOR:' : 'JOGADOR:' ?></h1>
      <form id="form_five" class="form">
         <div id="ib8gf" class="form-group">
            <label id="ihtur" class="label"><?php echo ($pais != 'br') ? 'JUGADOR' : 'E-MAIL DO USUÁRIO' ?></label>
            <input type="email" placeholder="ejemplo@tucorreo.com" id="correo" name="correo" class="input" value="<?php echo $correo; ?>" readonly required/>
         </div>
         <div id="i8ryz" class="form-group">
            <label id="i9jlq" class="label"><?php echo ($pais != 'br') ? 'NOMBRE(S)' : 'NOME(S)' ?></label>
            <input type="text" placeholder="Escribe tu nombre" id="nombre" name="nombre" class="input" value="<?php echo $nombre; ?>" readonly required/>
         </div>
         <div id="icbd7" class="form-group">
            <label id="iwvpf" class="label"><?php echo ($pais != 'br') ? 'APELLIDO(S)' : 'SOBRENOME(S)' ?></label>
            <input type="text" placeholder="Escribe tus apellidos" id="apellido" name="apellido" class="input" value="<?php echo $apellido; ?>" readonly required/>
         </div>
         <div id="icx8v" class="form-group">
            <label id="iotbe" class="label"><?php echo ($pais != 'br') ? 'DOCUMENTO DE IDENTIDAD (OPCIONAL)' : 'DOCUMENTO DE IDENTIDADE (OPCIONAL)' ?></label>
            <input type="text" placeholder="<?php echo ($pais != 'br') ? 'Escribe tu número de identificación' : 'Escreva seu número de identificação' ?>" name="documento_identidad" id="documento_identidad" class="input" />
         </div>
         <div id="iuegl" class="form-group">
            <label id="izu9s" class="label"><?php echo ($pais != 'br') ? 'NÚMERO DE CONTACTO' : 'NÚMERO DE CONTATO' ?></label>
            <input type="tel" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="777777777777" class="input" id="celular" name="celular" value="<?php echo $celular; ?>" readonly />
         </div>
         <div id="posicion_cont" class="form-group">
            <label id="i4hpj" class="label"><?php echo ($pais != 'br') ? 'POSICIÓN EN LA QUE VA A JUGAR' : 'POSIÇÃO EM QUE VAI JOGAR' ?></label>
            <select id="posicion_sel" name="posicion_sel" class="select" required>
            <?php
                if($pais != 'br') {
            ?>
               <option value="">Seleccionar</option>
               <option value="Forward">Delantero</option>
               <option value="Defense">Defensa</option>
               <option value="Keeper">Arquero</option>
            <?php
                } else {
                    if($genero == 'M') {
            ?>
                    <option value="">Selecionar</option>
                    <option value="Forward">Avançado</option>
                    <option value="Keeper">Arqueiro</option>  
            <?php
                    }
                    if($genero == 'F') {
            ?>
                    <option value="">Selecionar</option>
                    <option value="Forward">Avançado</option>
                    <option value="Defense">Defensor</option>
            <?php
                    }
                }
            ?>
            </select>
         </div>
         <div id="tryout_cont" class="form-group">
            <label id="iilfu" class="label"><?php echo ($pais != 'br') ? 'PRUEBA A LA QUE SE REGISTRA (TRYOUT)' : 'TRYOUT A QUE SE INSCREVE (TRYOUT)' ?></label>
            <select id="tryout_sel" name="tryout_sel" class="select" required>
               <option value=""><?php echo ($pais != 'br') ? 'Seleccionar' : 'Selecionar' ?></option>
            </select>
         </div>
        <br>
        <h1 id="i8r8h" class="formulario_tit menor" style="margin-top:40px;margin-bottom:20px;"><?php echo ($pais != 'br') ? 'Solicitud para que el padre, madre o representante legal, confirme el consentimiento del jugador:' : 'Solicite que seus pais ou representante legal confirme o termo de consentimento do jogador:' ?></h1>
        <div class="form-group menor">
            <label id="ileyp" class="label"><?php echo ($pais != 'br') ? 'EMAIL' : 'O EMAIL' ?></label>
            <input type="email" placeholder="ejemplo@tucorreo.com" id="email_parent" name="email_parent" class="input" />
        </div>
        <div class="form-group menor">
            <label class="label"><?php echo ($pais != 'br') ? 'NOMBRE(S)' : 'NOME(S)' ?></label>
            <input type="text" placeholder="<?php echo ($pais != 'br') ? 'Escribe tu nombre' : 'Escreva seu nome' ?>" id="nombre_parent" name="nombre_parent" class="input" />
        </div>
        <div class="form-group menor">
            <label class="label"><?php echo ($pais != 'br') ? 'APELLIDO(S)' : 'SOBRENOME(S)' ?></label>
            <input type="text" placeholder="<?php echo ($pais != 'br') ? 'Escribe tus apellidos' : 'Escreva seus sobrenomes' ?>" id="apellido_parent" name="apellido_parent" class="input" />
        </div>
        <div class="form-group menor">
            <label class="label">País</label>
            <select name="pais_parent" id="pais_parent" class="select" required>
                <option value=""></option>
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
                <option value="mx">México</option>
                <option value="ni">Nicaragua</option>
                <option value="pa">Panamá</option>
                <option value="py">Paraguay</option>
                <option value="pe">Perú</option>
                <option value="pr">Puerto Rico</option>
                <option value="do">República Dominicana</option>
                <option value="uy">Uruguay</option>
                <option value="ve">Venezuela</option>
            </select>
        </div>
        <div class="form-group menor">
            <label class="label"><?php echo ($pais != 'br') ? 'NÚMERO DE CONTACTO' : 'NÚMERO DE CONTATO' ?></label>
            <input type="tel" onkeydown="javascript: return event.keyCode == 69 ? false : true" id="celular_parent" name="celular_parent" class="input" />
            <span id="valid-msg" class="hide">✓ Valido</span>
            <span id="error-msg" class="hide"></span>
        </div>
        <h3 id="i8r8h" class="menor" style="margin-top:40px;margin-bottom:20px;width:100%;font-size:15px;line-height:17px;"><?php echo ($pais != 'br') ? 'Si estás con tu padre, madre o representante legal, completa la información de esta sección. De no ser posible, nosotros lo contactaremos' : 'Complete essa seção somente na presença do seu pai, mãe ou representante legal. Se não for possível, nós iremos entrar em contato.' ?></h3>
        <div id="iacv1" class="consentimiento menor"><?php echo ($pais != 'br') ? 'Yo' : 'Eu' ?>
            <input type="text" placeholder="<?php echo ($pais != 'br') ? 'Nombre del padre / tutor legal' : 'Nome dos pais/responsáveis ​​legais' ?>" id="nombre_consentimiento" class="input input2" />&nbsp;<input type="text" placeholder="<?php echo ($pais != 'br') ? 'Apellido del padre / tutor legal' : 'Sobrenome dos pais/responsáveis ​​legais' ?>"
                id="apellido_consentimiento" class="input input2" /><?php echo ($pais != 'br') ? ', nacido en' : ', nascido em' ?>
            <input type="date" max="<?php echo date("Y-m-d"); ?>" placeholder="<?php echo ($pais != 'br') ? 'Fecha de nacimiento' : 'Data de nascimento' ?>" id="nacimiento_consentimiento" class="input input2" style="padding:2px 9px;"/> <?php echo ($pais != 'br') ? 'con correo electrónico' : 'com e-mail' ?>
            <input type="email" placeholder="ejemplo@tucorreo.com" id="email_consentimiento" class="input input2" /> <?php echo ($pais != 'br') ? 'soy el padre tutor o representante' : 'eu sou o responsável ou representate do' ?>
            <?php echo ($pais != 'br') ? 'legal de' : '' ?>
            <input type="text" placeholder="<?php echo ($pais != 'br') ? 'Nombre completo del menor' : 'Nome completo do menor' ?>" id="menor_nombre_consentimiento" class="input input2" /> <?php echo ($pais != 'br') ? 'y doy mi consentimiento para el procesamiento de sus datos personales, de conformidad con el aviso de privacidad.' : 'e dou meu consentimento para processamento de seus dados pessoais, de acordo com o aviso de privacidade.' ?>
        </div>
         <div id="i2yer" class="form-group full">
             <button type="submit" id="i54su" class="button landing_button" style="background-image:url(<?php echo ($pais != 'br') ? IMGURL.'five/btn.png':IMGURL.'five/btn_br.png'; ?>)"></button>
         </div>
         <a id="no_interes"><?php echo ($pais != 'br') ? 'No estoy interesado en participar' : 'Não tenho interesse em participar' ?></a>
      </form>
   </div>
   <div id="iujll" class="border_black">
   </div>
   <div id="ix88v" class="landing_right">
   </div>
</div>
<div id="iim6g" class="landing_footer">
   <img
      src="<?php echo IMGURL; ?>five/logos_foot.png" id="i6wwn"                                 
      class="logo_foot" />
   <p id="ilkyj" class="txt_orange"><?php echo ($pais != 'br') ? '¿Alguna pregunta? Escribe a' : '' ?></p>
   <?php
   if($pais != 'br') {
    ?>
   <a id="iyhkh" href="mailto:colombia@gatorade5v5.com" class="link_email">COLOMBIA@GATORADE5V5.COM</a>
   <?php
   }
    ?>
</div>
<div id="icv73" class="border_black_bottom">
</div>
<link rel="stylesheet" href="<?php echo JSURL; ?>indicativos/ind.css">
<link rel="stylesheet" href="<?php echo JSURL; ?>indicativos/demo.css">
<script src="<?php echo JSURL; ?>indicativos/ind.js"></script>
<script>
    var pais_el_usu = '<?php echo $pais; ?>';
    var input = document.querySelector("#celular_parent"),
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");

    // here, the index maps to the error code returned from getValidationError - see readme
    var errorMap = ["Numero invalido", "Código de país invalido", "Muy corto", "Muy largo", "Numero invalido"];

    var reset = function() {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
    };

    // on blur: validate
    input.addEventListener('blur', function() {
        reset();
        if (input.value.trim()) {
            if (indicativo_init.isValidNumber()) {
            validMsg.classList.remove("hide");
            } else {
            input.classList.add("error");
            var errorCode = indicativo_init.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
            }
        }
    });

    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);

    var indicativo = document.querySelector("#celular_parent");
        var indicativo_init = window.intlTelInput(indicativo, {
        autoHideDialCode: false,
        formatOnDisplay: false,
        hiddenInput: "full_number",
        initialCountry: "co",
        placeholderNumberType: "MOBILE",
        preferredCountries: ['co', 'cl', 'mx'],
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.0.3/js/utils.js"
    });
    jQuery(document).on('change','#pais_parent',function(){
        indicativo_init.setCountry(jQuery(this).val());
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/locale/es-mx.js"></script>
<script>
    //edad parent
    jQuery("#nacimiento_consentimiento").focusout(function(){
        var fecha_el = jQuery(this).val();
        var a = moment();
        var b = moment(fecha_el).format('MM/DD/YYYY');
        var age = moment.duration(a.diff(b));
        var years = age.years();
        if(years >= 18) {
        }
        else {
            jQuery("#nacimiento_consentimiento").val('');
            
            if(pais_el_usu == 'br') {
                alert('A data de nascimento é inválida');
            } else {
                alert('La fecha de nacimiento es inválida');
            }
        }
    });
    jQuery(document).ready(function () {
        jQuery('.msgAlert .txtMsg').html('');
        jQuery('#celular_parent').attr('type', 'number');
        //ocultar popup
        jQuery(document).on('click','.no_interes',function(e) {
            jQuery('.msgAlert .txtMsg').html('');
            jQuery('.msgAlert').css('display', 'none');
        });
        //no estoy interesado
        jQuery(document).on('click','#no_interes',function(e) {
            jQuery('.msgAlert').css('display', 'flex');
            jQuery('.msgAlertCont a').css('display', 'block');
            jQuery('.msgAlertCont a').html('ACEPTAR');
            jQuery('.msgAlertCont a').removeAttr('href');
            jQuery('.msgAlertCont a').addClass('no_interes');
            
            if(pais_el_usu == 'br') {
                jQuery('.msgAlert .txtMsg').html('Lamentamos que você não tem interesse em participar das seletivas, mas te convidamos a fazer parte da comunidade 5v5.');
            } else {
                jQuery('.msgAlert .txtMsg').html('Lamentamos que no estés interesado en participar en las pruebas, pero te invitamos a ser parte de nuestra comunidad 5v5');
            }
            //comunidad
            community_el();
            setTimeout(function(){ 
                jQuery('.msgAlert .txtMsg').html('');
                jQuery('.msgAlert').css('display', 'none');
            }, 5000);
        });
        //Datos fechas
        var fecha_el = '<?php echo $fecha_nacimiento; ?>';
        var date_min = moment("2005-05-28");
        var date_max = moment("2008-01-17");
        var date_current = moment();
        var date_birth = moment(fecha_el).format('YYYY-MM-DD');
        var age_asp = moment.duration(date_current.diff(date_birth));
        var years_asp = age_asp.years();
        const isAfter = moment(date_birth).isSameOrAfter(date_min);
        const isBefore = moment(date_birth).isSameOrBefore(date_max);
        // console.log(date_birth);
        //Datos paises
        var pais = '<?php echo $pais; ?>';
        var paises_notify = ['kkkkkkk'];
        var paises_externo = ['co'];
        var url_pais_ext = 'https://gatorade5v5.com/';
        //Validacion mayor de edad
        mayor_edad(years_asp);
        function mayor_edad(asp_years) {
            if(asp_years >= 18) {
                jQuery('.menor').each(function( index ) {
                    jQuery(this).css('display','none');
                    jQuery(this).children('input').prop('required',false);
                    jQuery(this).children('select').prop('required',false);
                    jQuery('.consentimiento').children('input').prop('required',false);
                });
                localStorage.setItem('menor','no');
                // console.log('mayor');
            }
            else {
                jQuery('.menor').each(function( index ) {
                    jQuery(this).css('display','block');
                    jQuery(this).children('input').prop('required',true);
                    jQuery(this).children('select').prop('required',true);
                    jQuery('.consentimiento').children('input').prop('required',false);
                });
                localStorage.setItem('menor','si');
                // console.log('menor');
            }
        }
        //Tryout
        function tryout_el() {
            setTimeout(function(){ 
                jQuery('#posicion_sel').prop('required',true);
                jQuery('#posicion_cont').css('display','block');
                jQuery('#tryout_sel').prop('required',true);
                jQuery('#tryout_cont').css('display','block');
                
                localStorage.setItem('tipo_registro', 'Tryout');

                jQuery('#tryout_registro').css('display','block');
                jQuery('#comunidad_registro').css('display','none');
                jQuery('#notify_registro').css('display','none');
                jQuery('#no_interes').css('display','block');
            }, 300);                       
            
        }
        //Community
        function community_el() {
            setTimeout(function(){ 
                jQuery('#posicion_sel').prop('required',false);
                jQuery('#posicion_cont').css('display','none');
                jQuery('#tryout_sel').prop('required',false);
                jQuery('#tryout_cont').css('display','none');

                localStorage.setItem('tipo_registro', 'Community');

                jQuery('#tryout_registro').css('display','none');
                jQuery('#comunidad_registro').css('display','block');
                jQuery('#notify_registro').css('display','none');
                jQuery('#no_interes').css('display','none');
            }, 300);
            
        }
        //Notifyme
        function notifyme_el() {
            setTimeout(function(){ 
                jQuery('#posicion_sel').prop('required',false);
                jQuery('#posicion_cont').css('display','none');
                jQuery('#tryout_sel').prop('required',false);
                jQuery('#tryout_cont').css('display','none');

                localStorage.setItem('tipo_registro', 'Notifyme');

                jQuery('#tryout_registro').css('display','none');
                jQuery('#comunidad_registro').css('display','none');
                jQuery('#notify_registro').css('display','block');
                jQuery('#no_interes').css('display','none');
            }, 300);
        }
        //No hay pruebas disponibles en tu país
        function mensaje_no_hay_pruebas() {
            jQuery('.msgAlert .txtMsg').html('');
            jQuery('.msgAlert').css('display', 'flex');
            jQuery('.msgAlertCont a').css('display', 'block');
            jQuery('.msgAlertCont a').html('ACEPTAR');
            jQuery('.msgAlertCont a').removeAttr('href');
            jQuery('.msgAlertCont a').addClass('no_interes');
            
            if(pais_el_usu == 'br') {
                jQuery('.msgAlert .txtMsg').html('No momento não há seletiva disponível no seu país. Registre-se para receber notificações quando estiverem disponíveis.');
            } else {
                jQuery('.msgAlert .txtMsg').html('No hay pruebas disponibles en tu país por el momento. Regístrate para recibir notificaciones una vez estén disponibles');
            }
        }
        //Validacion general
        if (isAfter && isBefore) {
            // console.log('esta dentro del rango');
            if(paises_notify.indexOf(pais) != -1) {
                // console.log('pais notify');
                notifyme_el();

                mayor_edad(years_asp);
            } else if(paises_externo.indexOf(pais) != -1) {
                // console.log('pais externo');
                window.location.replace(url_pais_ext);
            } else {
                // console.log('pais normal');
                jQuery.ajax({
                    type: "post",
                    url: MyAjax.url,
                    data: {
                        action: "get_tryouts",
                        pais: '<?php echo $pais; ?>',
                        genero: '<?php echo $genero; ?>'
                    },
                    beforeSend: function () {
                        $("#loader").css("display", "flex");
                    },
                    error: function (response) {
                        console.log(response);
                    },
                    success: function (response) {
                        var tryouts = JSON.parse(response);
                        console.log(tryouts);
                        if(jQuery.isArray(tryouts)) {
                            // console.log('es array tryout');
                            if(tryouts.length > 0) {
                                // console.log('si hay tryout');
                                //Validar tryouts
                                if(tryouts.length == 1) {
                                    console.log('solo hay uno');
                                    jQuery('#tryout_sel option').each(function() {
                                        jQuery(this).remove();
                                    });
                                    var active = 0;
                                    var pending = 0;
                                    var other = 0;
                                    for (let index = 0; index < tryouts.length; index++) {
                                        let status = tryouts[index].values.status;
                                        if(status.includes("Active")) {
                                            if(index <= 8) {
                                                jQuery('#tryout_sel').append(new Option(tryouts[index].values.region+' - '+tryouts[index].values.tryoutstartdate, tryouts[index].keys.tryoutid));
                                                active++;
                                            } 
                                        } else if(status.includes("Pending")) {
                                            pending++;
                                        } else {
                                            other++;
                                        }                                    
                                    }
                                    if(active > 0) {
                                        // console.log('se va para tryout');
                                        tryout_el();
                                    }

                                    if(active == 0 && pending > 0) {
                                        // console.log('se va para notifyme');
                                        notifyme_el();
                                        mensaje_no_hay_pruebas();
                                    }

                                    if(other > 0) {
                                        // console.log('se va para community');
                                        community_el();
                                    }


                                } else {
                                    var active = 0;
                                    var pending = 0;
                                    var other = 0;
                                    for (let index = 0; index < tryouts.length; index++) {
                                        let status = tryouts[index].values.status;
                                        if(status.includes("Active")) {
                                            if(index <= 8) {
                                                jQuery('#tryout_sel').append(new Option(tryouts[index].values.region+' - '+tryouts[index].values.tryoutstartdate, tryouts[index].keys.tryoutid));
                                                active++;
                                            } 
                                        } else if(status.includes("Pending")) {
                                            pending++;
                                        } else {
                                            other++;
                                        }                                    
                                    }
                                    if(active > 0) {
                                        // console.log('se va para tryout');
                                        tryout_el();
                                    }

                                    if(active == 0 && pending > 0) {
                                        // console.log('se va para notifyme');
                                        notifyme_el();
                                        mensaje_no_hay_pruebas();
                                    }

                                    if(other > 0) {
                                        // console.log('se va para community');
                                        community_el();
                                    }

                                }
                            } else {
                                // console.log('no hay tryouts');
                                //comunidad
                                community_el();
                                mensaje_no_hay_pruebas();
                            }
                        } else {
                            // console.log('no es array');
                            // console.log('no hay');
                            //comunidad
                            community_el();
                            mensaje_no_hay_pruebas();
                        }

                        
                        jQuery('#loader').css('display', 'none');

                        strs = response.replace(/\s/g, "");
                    }
                });
            }
        } else {
            // console.log('no esta dentro del rango');
            // console.log('edad: '+years_asp);
            if(years_asp <= 12) {
                // console.log('no hay pruebas disponibles');
                jQuery('.msgAlert').css('display', 'flex');
                jQuery('.msgAlertCont').css('padding-bottom', '30px');
                if(pais_el_usu == 'br') {
                    jQuery('.msgAlert .txtMsg').html('Nos desculpe<br>Você não tem a idade necessária para entrar no Mundo Gatorade');
                } else {
                    jQuery('.msgAlert .txtMsg').html('Lo sentimos<br>No cumples con la edad mínima para ingresar al Mundo Gatorade.');
                }
                jQuery('.closeMsg').css('display','none');
            } else {
                // console.log('Registro community');
                community_el();
                mayor_edad(years_asp);
                jQuery('.msgAlert').css('display', 'flex');
                jQuery('.msgAlertCont').css('padding-bottom', '30px');
                if(pais_el_usu == 'br') {
                    jQuery('.msgAlert .txtMsg').html('Nos desculpe<br>Você ultrapassou a idade máxima para entrar no Mundo Gatorade.');
                } else {
                    jQuery('.msgAlert .txtMsg').html('Lo sentimos<br>Superas el rango máximo de edad para ingresar al Mundo Gatorade');
                }
                setTimeout(function(){ 
                    jQuery('.msgAlert').css('display', 'none');
                }, 3000);
            }
        }
    });

    jQuery(document).on('submit','#form_five',function(e) {
        e.preventDefault();
        if(jQuery('#error-msg').val() != '') {
            if(pais_el_usu == 'br') {
                alert('Você deve enviar um número de celular válido');
            } else {
                alert('Debes ingresar un numero de celular valido');
            }
        } else {
            var tryout_sel = '';
            var posicion_sel = '';
            var documento_identidad = '';
            var email_parent = '';
            var nombre_parent = '';
            var apellido_parent = '';
            var pais_parent = '';
            var celular_parent = '';
            var nombre_consentimiento = '';
            var apellido_consentimiento = '';
            var nacimiento_consentimiento = '';
            var email_consentimiento = '';
            var menor_nombre_consentimiento = '';
            if(jQuery('#tryout_sel').val()) {
                var tryout_sel = jQuery('#tryout_sel').val();
            }
            if(jQuery('#posicion_sel').val()) {
                var posicion_sel = jQuery('#posicion_sel').val();
            }
            if(jQuery('#documento_identidad').val()) {
                var documento_identidad = jQuery('#documento_identidad').val();
            }
            if(jQuery('#email_parent').val()) {
                var email_parent = jQuery('#email_parent').val();
            }
            if(jQuery('#nombre_parent').val()) {
                var nombre_parent = jQuery('#nombre_parent').val();
            }
            if(jQuery('#apellido_parent').val()) {
                var apellido_parent = jQuery('#apellido_parent').val();
            }
            if(jQuery('#pais_parent').val()) {
                var pais_parent = jQuery('#pais_parent').val();
            }
            if(jQuery('#celular_parent').val()) {
                var celular_parent = indicativo_init.getNumber();
            }
            if(jQuery('#nombre_consentimiento').val()) {
                var nombre_consentimiento = jQuery('#nombre_consentimiento').val();
            }
            if(jQuery('#apellido_consentimiento').val()) {
                var apellido_consentimiento = jQuery('#apellido_consentimiento').val();
            }
            if(jQuery('#nacimiento_consentimiento').val()) {
                var nacimiento_consentimiento = jQuery('#nacimiento_consentimiento').val();
            }
            if(jQuery('#email_consentimiento').val()) {
                var email_consentimiento = jQuery('#email_consentimiento').val();
            }
            if(jQuery('#menor_nombre_consentimiento').val()) {
                var menor_nombre_consentimiento = jQuery('#menor_nombre_consentimiento').val();
            }
            jQuery.ajax({
                type: "post",
                url: MyAjax.url,
                data: {
                    action: "complete_five",
                    id_five: '<?php echo $id_five; ?>',
                    tryout: tryout_sel,
                    posicion: posicion_sel,
                    documento_identidad: documento_identidad,
                    tipo_registro: localStorage.getItem('tipo_registro'),
                    email_parent: email_parent,
                    nombre_parent: nombre_parent,
                    apellido_parent: apellido_parent,
                    celular_parent: celular_parent,
                    pais_parent: pais_parent,
                    menor: localStorage.getItem('menor'),
                    nombre_consentimiento: nombre_consentimiento,
                    apellido_consentimiento: apellido_consentimiento,
                    nacimiento_consentimiento: nacimiento_consentimiento,
                    email_consentimiento: email_consentimiento,
                    menor_nombre_consentimiento: menor_nombre_consentimiento,
                },
                beforeSend: function() {
                    jQuery('.msgAlert').css('display', 'flex');
                },
                error: function(response) {
                    jQuery('.msgAlert').css('display', 'flex');
                    jQuery('.msgAlert .txtMsg').html(response);
                },
                success: function(response) {
                    // console.log('success');
                    // Actualiza el mensaje con la respuesta
                    strs = response.replace(/\s/g, "");
                    jQuery('#loader').css('display', 'none');
                    if (strs === '0') {
                        jQuery('.msgAlert').css('display', 'flex');
                        jQuery('.msgAlertCont').css('padding-bottom', '30px');
                        if(pais_el_usu == 'br') {
                            jQuery('.msgAlert .txtMsg').html('Ocorreu um erro.');
                        } else {
                            jQuery('.msgAlert .txtMsg').html('Ha ocurrido un error');
                        }
                    }
                    if (strs === '1') {
                        jQuery('.msgAlert').css('display', 'flex');
                        jQuery('.msgAlertCont').css('padding-bottom', '30px');
                        if(pais_el_usu == 'br') {
                            jQuery('.msgAlert .txtMsg').html('Registro completado.');
                        } else {
                            jQuery('.msgAlert .txtMsg').html('Registro completado.');
                        }
                        if(jQuery('body').hasClass('logged-in')) {
                        } else {
                            setTimeout(function(){ 
                                window.location.replace('<?php echo home_url("registro"); ?><?php echo '?nombre='.$nombre.'&apellido='.$apellido.'&correo='.$correo.'&celular='.$celular.'&pais='.$pais; ?>');
                            }, 2000);
                        }
                    }
                }
            });
        }
    });
  </script>
<?php
get_footer();
?>
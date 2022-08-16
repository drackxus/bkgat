<?php
get_header();


$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url,'gatorade-5v5-2022-br') !== false) {
    $pais_el_usu = 'br';
} else {
    $pais_el_usu = 'no_pais';
}

global $post;

$mensaje_popup_registro = get_post_meta($post->ID, 'mensaje_popup_registro', true);

$fecha_evento = get_post_meta($post->ID, 'fecha_evento');
$fecha_max_inscripcion = get_post_meta($post->ID, 'fecha_max_inscripcion');

$Fecha =  $fecha_evento[0];
$fechai = date("Y/m/d h:i:s a", strtotime($Fecha));

$Fecha_m =  $fecha_max_inscripcion[0];
$fecham = date("Y/m/d h:i:s a", strtotime($Fecha_m));

$inscrito = false;
if(isset($_GET['id_five'])) {
    $id_five = $_GET['id_five'];
} else {
    $id_five = '';
}
if($id_five != '') {
    $nombre = get_post_meta($id_five, 'nombre', true);
    $apellido = get_post_meta($id_five, 'apellido', true);
    $correo = get_post_meta($id_five, 'correo', true);
    $celular = '+'.get_post_meta($id_five, 'celular', true);
    $genero = get_post_meta($id_five, 'genero', true);
    $pais = get_post_meta($id_five, 'pais', true);
    $fecha_nacimiento = get_post_meta($id_five, 'fecha_nacimiento', true);
    ?>
    <script>
        jQuery(document).ready(function() {
            jQuery('#País').val('<?php echo $pais; ?>');
            jQuery('#genero').val('<?php echo $genero; ?>');
            indicativo_init.setCountry('<?php echo $pais; ?>');
            indicativo_init.setNumber('<?php echo $celular; ?>');
        });
    </script>
    <?php
}
global $current_user;
wp_get_current_user();
if (is_user_logged_in()) {
    $loginUser = "true";
    $nameUser = get_user_meta($current_user->ID, 'user_nombre', true);
    $mensaje_inscripcion_evento = get_option('mensaje_inscripcion_evento');
    $titulo_medalla_inscripcion_evento = get_option('titulo_medalla_inscripcion_evento');
    $video_medalla_inscripcion_evento = get_option('video_medalla_inscripcion_evento');
    $imagen_correo_inscripcion_evento = get_option('imagen_correo_inscripcion_evento');
    $puntos_inscripcion_evento = get_option('puntos_inscripcion_evento');
    $nombre_reto_inscripcion_evento = 'inscripcion_evento';

    $inscripciones = get_user_meta($current_user->ID, 'eventos_new', true);
    if ($inscripciones) {
        for ($i = 0; $i < count($inscripciones); ++$i) {
            if ($inscripciones[$i]['eventoId'] == $post->ID) {
                $inscrito = true;
            } else {
                $inscrito = false;
            }
        }
    }
} else {
    $loginUser = false;
}
$terminos_evento_pais = array('co'=>'https://gatorade.lat/wp-content/media/2022/01/T.C.-5V5-2022-VF-APROBADO-LEGAL.pdf', 'cl'=>'https://gatorade.lat/wp-content/media/2022/02/Bases_5v5_Gatorade_CL.pdf', 'ar'=>'https://gatorade.lat/wp-content/media/2022/01/Terminos_y_condiciones_5V5_2022_Argentina.pdf', 'br'=>'https://gatorade.lat/wp-content/media/2022/01/Terminos_y_condiciones_5V5_2022_Brasil.pdf','mx'=>'https://gatorade.lat/wp-content/media/2022/02/20220201_BTC_Torneo_Gatorade_5V5_FINAL_2022.pdf','do'=>'https://gatorade.lat/wp-content/media/2022/02/Bases-del-Concurso-5v5-2022.pdf');
?>
<style>
    .color_white_btn {
        color: white !important;
    }
    .iti.iti--allow-dropdown.iti--separate-dial-code {
        width: 80%;
        margin: 0 auto;
    }
    .iti.iti--allow-dropdown.iti--separate-dial-code input {
        width: 100%;
    }
    .iti--separate-dial-code .iti__selected-flag {
        background-color: rgba(0, 0, 0, 0.05);
        border-radius: 40px;
    }
    a:-webkit-any-link {
        color: var(--color-orange) !important;
    }
    .check_boxes input[type="checkbox"] {
        width: 20px !important;
        height: 20px !important;
    }
    .check_boxes a {
        width: calc(100% - 30px);
    }
    .check_boxes span, .check_boxes a {
        font-size: 14px;
        line-height: 18px;
    }
    .felicitaciones {
        font-family: 'Gatorade black', sans-serif;
        font-size: 40px;
        text-align: center;
        margin-top: 24px;
        margin-bottom: 8px;
    }

    .the_champ_horizontal_sharing .theChampSharing {
        background-color: var(--color-orange);
        background: var(--color-orange);
    }

    .the_champ_horizontal_sharing .theChampSharing {
        color: var(--color-orange);
    }

    .checkbox {
        height: 35px;
        width: 35px;
        margin-right: 0.4em;
    }

    .msgAlertCont {
        border-radius: 30px;
    }

    a.contact_submit.w-button.aMsg {
        bottom: -31px;
        width: 84%;
    }

    p.txtMsg {
        font-size: 17px;
        line-height: 19px;
        width: 100%;
    }

    .txtMsg h4 {
        font-size: 32px;
        line-height: 34px;
    }

    .list_retos_logrados_el {
        width: 100%;
        border-radius: 10px;
        margin-right: 1%;
        position: relative;
    }

    .list_retos_logrados_el {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 10px 20px;
        border-radius: 10px;
        width: 100%;
        height: 78px;
        background-repeat: no-repeat !important;
        background-size: cover !important;
        background-position: center center !important;
        margin-bottom: 0px;
        border-radius: 15px;
        background: black;
    }

    .list_retos_logrados_el h3 {
        color: white;
        font-family: 'Gatorade black', sans-serif;
        font-size: 13px !important;
        line-height: 14px !important;
        text-align: left;
        margin: 0px;
        width: 50%;
        z-index: 3;
        text-transform: uppercase;
    }

    .list_retos_logrados_el video {
        position: absolute;
        right: 0;
        bottom: 0;
        top: 0;
        right: 0;
        width: 100%;
        height: auto;
        background-size: 100% 100%;
        background-color: black;
        background-position: center center;
        background-size: contain;
        object-fit: cover;
        z-index: 1;
        opacity: 0.8;
        border-radius: 13px;
    }

    .txtMsg .content_cont_h1_line {
        width: 80px;
        height: 3px;
        border-radius: 6px;
        background-color: #f47d30;
        margin: 0 auto;
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
</style>
<style>
    .el_counter_number {
        background-color: white;
        color: #DE7800;
    }

    .side_buttons_link.favorite {
        display: flex;
    }
</style>
<?php
if (wp_is_mobile())
{
?>
    <style>
        .theChampFacebookSvg {
            background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-5%20-5%2042%2042%22%3E%3Cpath%20d%3D%22M17.78%2027.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99%202.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123%200-5.26%201.905-5.26%205.405v3.016h-3.53v4.09h3.53V27.5h4.223z%22%20fill%3D%22%23fff%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center !important;
        }
        .theChampTwitterSvg {
            background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9Ii04IC04IDY0IDY0Ij4NCjxwYXRoIGQ9Ik0gMzggMTkgcSAyIC0xIDQgLTUgcSAtMS41IDIgLTQgMiBxIDEuNSAtMSAzLjUgLTUgcSAtMS41IDIgLTUgMiBjIC01IC01IC0xMyAtMiAtMTIgNiBxIC03IDEgLTE1IC04IHEgLTIgNCAxIDkgcSAtMSAwIC0zIC0xIHEgMCA1IDUgNyBxIC0xIC41IC0zIDAgcSAxIDQgOCA2IHEgLTUgMyAtMTEgMyBjIDE0IDggMzAgMCAzMS41IC0xNCIgc3Ryb2tlLXdpZHRoPSIwLjMiIGZpbGw9IiNmZmYiPjwvcGF0aD4NCjwvc3ZnPg==) left no-repeat !important;
        }
        .theChampWhatsappSvg {
            background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9Ii01IC01IDQwIDQwIj48cGF0aCBpZD0iYXJjMSIgc3Ryb2tlPSIjZmZmIiBzdHJva2Utd2lkdGg9IjIiIGZpbGw9Im5vbmUiIGQ9Ik0gMTEuNTc5Nzk4NTY2NzQzMzE0IDI0LjM5NjkyNjIwNzg1OTA4NSBBIDEwIDEwIDAgMSAwIDYuODA4NDc5NTU3MTEwMDc5IDIwLjczNTc2NDM2MzUxMDQ2Ij48L3BhdGg+PHBhdGggZD0iTSA3IDE5IGwgLTEgNiBsIDYgLTEiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSIyIiBmaWxsPSJub25lIj48L3BhdGg+PHBhdGggZD0iTSAxMCAxMCBxIC0xIDggOCAxMSBjIDUgLTEgMCAtNiAtMSAtMyBxIC00IC0zIC01IC01IGMgNCAtMiAtMSAtNSAtMSAtNCIgZmlsbD0iI2ZmZiI+PC9wYXRoPjwvc3ZnPg==) left no-repeat !important;
        }
        .theChampEmailSvg {
            background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-4%20-4%2043%2043%22%3E%3Cpath%20d%3D%22M%205.5%2011%20h%2023%20v%201%20l%20-11%206%20l%20-11%20-6%20v%20-1%20m%200%202%20l%2011%206%20l%2011%20-6%20v%2011%20h%20-22%20v%20-11%22%20stroke-width%3D%221%22%20fill%3D%22%23fff%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center !important;
        }
        p.suscribe_style {
            text-align: center;
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

        .evento_form select, .evento_form input[type=text], .evento_form input[type=date], .evento_form input[type=number], .evento_form input[type=email], .evento_form input[type=tel] {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            color: black;
            border-radius: 30px;
            font-size: 15px;
            text-align-last: center;
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
            display: flex;
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
        <?php
        if (get_post_meta($post->ID, 'id_youtube', true)) {
        ?>
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'id_youtube', true); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php 
        }
        ?>
        <?php echo the_content(); ?>
        <input type="hidden" class="postId" value="<?php echo ($post->ID) ? $post->ID:''; ?>">
        <input type="hidden" class="userId" value="<?php echo ($current_user->ID) ? $current_user->ID:''; ?>">
        <?php if ($fecha_evento) { ?>
            <div class="counter_cont">
                <div class="counter_cont_tit">FALTAN:</div>
                <div class="counter_cont_list">
                    <div class="counter_cont_list_el">
                        <div class="el_counter_number" id="dias">00</div>
                        <p class="el_counter_txt">DÍAS</p>
                    </div>
                    <div class="counter_cont_list_el">
                        <div class="el_counter_number" id="horas">00</div>
                        <p class="el_counter_txt">HORAS</p>
                    </div>
                    <div class="counter_cont_list_el">
                        <div class="el_counter_number" id="minutos">00</div>
                        <p class="el_counter_txt">MINUTOS</p>
                    </div>
                </div>
            </div>
            <div class="counter_cont_tit evento_nodisponible" style="text-align:center;line-height: 32px;margin: 20px 0px 30px;">ESTE EVENTO YA NO ESTA DISPONIBLE</div>
            <div class="counter_cont_tit evento_nodisponible_insc" style="text-align:center;line-height: 32px;margin: 20px 0px 30px;">ESTE EVENTO YA NO PERMITE INSCRIPCIONES</div>
        <?php } ?>
        <?php
                    $meta = get_post_meta($post->ID);
                ?>
                <?php
                $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                if (strpos($url,'gatorade-5v5-2022') !== false && $inscrito == false) {
                ?>
                    <form class="evento_form" id="event_especial" name="event_especial">
                        <input type="hidden" name="eventoId" id="eventoId" value="<?php echo ($post->ID) ? $post->ID : ''; ?>">
                        <input type="hidden" name="userId" id="userId" value="<?php echo ($current_user->ID) ? $current_user->ID : ''; ?>">
                        <input type="hidden" name="programName" id="programName" value="<?php echo (get_post_meta($post->ID, 'program_name', true)) ? get_post_meta($post->ID, 'program_name', true) : ''; ?>">
                        <p class="suscribe_style">Gatorade 5v5 2022</p>
                        <br>
                        <?php
                        if(!is_user_logged_in()) {
                        ?>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Nome':'Nombre'; ?></label>
                            <input type="text" name="nombre" id="nombre" class="w-input" value="<?php echo (isset($nombre)) ? $nombre : ''; ?>" required>
                        </div>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Sobrenome':'Apellido'; ?></label>
                            <input type="text" name="apellido" id="apellido" class="w-input" value="<?php echo (isset($apellido)) ? $apellido : ''; ?>" required>
                        </div>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Correio eletrônico':'Correo electrónico'; ?></label>
                            <input type="email" name="correo" id="correo" class="w-input" value="<?php echo (isset($correo)) ? $correo : ''; ?>" <?php echo ($id_five != '') ? 'readonly':''; ?> required>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Data de nascimento':'Fecha de nacimiento'; ?></label>
                            <input type="date" max="<?php echo date("Y-m-d"); ?>" name="fecha_nacimiento" id="fecha_nacimiento" class="w-input" value="<?php echo (isset($fecha_nacimiento)) ? $fecha_nacimiento : ''; ?>" required>
                        </div>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'País':'País'; ?></label>
                            <select name="País" id="País" class="w-input" required>
                                <?php
                                if((strpos($url,'gatorade-5v5-2022-br') !== false)) {
                                ?>
                                <option value="br">Brasil</option>
                                <?php
                                } else {
                                ?>
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
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Celular':'Celular'; ?></label>
                            <input type="tel" name="Celular" id="Celular" class="w-input" onkeydown="javascript: return event.keyCode == 69 ? false : true" required>
                            <span id="valid-msg" class="hide">✓ Valido</span>
                            <span id="error-msg" class="hide"></span>
                        </div>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Gênero':'Genero'; ?></label>
                            <select name="genero" id="genero" class="w-input" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <?php
                            if($terminos_evento_pais['co'] != '') {
                        ?>
                            <div class="check_boxes" id="co_terminos" style="padding-top:10px; padding-bottom:10px;display:none;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="<?php echo $terminos_evento_pais['co']; ?>" target="blank_"><span>Términos y Condiciones evento 5V5 2022</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['cl'] != '') {
                        ?>
                            <div class="check_boxes" id="cl_terminos" style="padding-top:10px; padding-bottom:10px;display:none;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="<?php echo $terminos_evento_pais['cl']; ?>" target="blank_"><span>Términos y Condiciones evento 5V5 2022</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['ar'] != '') {
                        ?>
                            <div class="check_boxes" id="ar_terminos" style="padding-top:10px; padding-bottom:10px;display:none;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="<?php echo $terminos_evento_pais['ar']; ?>" target="blank_"><span>Términos y Condiciones evento 5V5 2022</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['br'] != '') {
                        ?>
                            <div class="check_boxes" id="br_terminos" <?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'style="padding-top:10px; padding-bottom:10px;"':'style="padding-top:10px; padding-bottom:10px;display:none;"'; ?>>
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="<?php echo $terminos_evento_pais['br']; ?>" target="blank_"><span>Termos e Condições do Evento 5V5 2022</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['br'] != '') {
                        ?>
                            <div class="check_boxes" id="br_terminos2" <?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'style="padding-top:10px; padding-bottom:10px;"':'style="padding-top:10px; padding-bottom:10px;display:none;"'; ?>>
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="https://www.pepsico.com.br/pt-br/privacidade" target="blank_"><span>Política de Privacidade e Cookies</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['br'] != '') {
                        ?>
                            <div class="check_boxes" id="br_terminos3" <?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'style="padding-top:10px; padding-bottom:10px;"':'style="padding-top:10px; padding-bottom:10px;display:none;"'; ?>>
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a><span style="color:var(--color-orange);">Quero receber comunicação sobre as novidades da marca e ações da PepsiCo. Seu consentimento para esse fim é voluntário e você é livre para o retirar a qualquer momento.</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['mx'] != '') {
                        ?>
                            <div class="check_boxes" id="mx_terminos" style="padding-top:10px; padding-bottom:10px;display:none;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="<?php echo $terminos_evento_pais['mx']; ?>" target="blank_"><span>Términos y Condiciones evento 5V5 2022</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['do'] != '') {
                        ?>
                            <div class="check_boxes" id="do_terminos" style="padding-top:10px; padding-bottom:10px;display:none;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="<?php echo $terminos_evento_pais['do']; ?>" target="blank_"><span>Términos y Condiciones evento 5V5 2022</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if(!is_user_logged_in()) {
                        ?>
                            <?php
                            if(get_option('tratamiento_datos')) {
                            ?>
                            <div class="check_boxes" id="colombia" style="padding-top:10px; padding-bottom:10px;display:none;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="tratamiento_datos" name="tratamiento_datos" value="TRUE" checked="checked" required /><a href="<?php echo get_option('tratamiento_datos'); ?>" target="blank_"><span>Autorizo expresamente el tratamiento de mis datos personales</span></a>
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                            <?php
                            if(get_option('politica_privacidad') && !strpos($url,'gatorade-5v5-2022-br') !== false) {
                            ?>
                            <div class="check_boxes" id="brasil_politicas" style="padding-top:10px; padding-bottom:10px;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="politicas_privacidad" name="politicas_privacidad" value="TRUE" <?php echo (isset($_GET['id_five'])) ? 'checked':''; ?> required/><a href="<?php echo get_option('politica_privacidad'); ?>" target="blank_"><span><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Aceito a Política de Privacidade e Cookies.':'Acepto la Política de Privacidad y Cookies.'; ?></span></a>
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                            <!-- <?php
                            if(get_option('terminos_condiciones') && !strpos($url,'gatorade-5v5-2022-br') !== false) {
                            ?>
                            <div class="check_boxes" id="brasil_condiciones" style="padding-top:10px; padding-bottom:10px;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_condiciones" name="terminos_condiciones" value="TRUE" <?php echo (isset($_GET['id_five'])) ? 'checked':''; ?> required/><a href="<?php echo get_option('terminos_condiciones'); ?>" target="blank_"><span><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Aceito os Termos e Condições do Site.':'Acepto Términos y condiciones de la Página Web.'; ?></span></a>
                                </div>
                            </div>
                            <?php
                            }
                            ?> -->

                        <?php
                        }
                        ?>
                        <br>
                        <div class="participate_-cont">
                            <input type="submit" value="<?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'MANDAR':'ENVIAR'; ?>" style="cursor:pointer;margin-top:0px" class="participate_button participate_cont_a">
                        </div>
                        <br>
                        <a id="cancelar_registro" style="text-decoration:underline;text-align:center; <?php echo (isset($_GET['id_five'])) ? 'display:block':'display:none'; ?>">Deseo cancelar mi registro</a>
                    </form>
                <?php
                } else  if (get_post_meta($post->ID, 'formulario_elegido', true) && $inscrito == false) {
                        $id_formulario = get_post_meta($post->ID, 'formulario_elegido', true);
                ?>
                    <form class="evento_form" id="formulario" name="formulario" method="post">
                        <input type="hidden" name="eventoId" id="eventoId" value="<?php echo ($post->ID) ? $post->ID : ''; ?>">
                        <input type="hidden" name="formularioId" id="formularioId" value="<?php echo (get_post_meta($post->ID, 'formulario_elegido', true)) ? get_post_meta($post->ID, 'formulario_elegido', true) : ''; ?>">
                        <input type="hidden" name="userId" id="userId" value="<?php echo ($current_user->ID) ? $current_user->ID : ''; ?>">
                        <input type="hidden" name="programName" id="programName" value="<?php echo (get_post_meta($post->ID, 'program_name', true)) ? get_post_meta($post->ID, 'program_name', true) : ''; ?>">
                        <p class="suscribe_style"><?php echo get_the_title($id_formulario); ?></p>
                        <p class="instructions"><?php echo get_post_meta($id_formulario, 'subtitulo', true); ?></p>
                        <?php
                        if (get_post_meta($post->ID, 'formulario_elegido', true)) {
                            $args = array(
                                'post_type' => 'formularios',
                                'post_status' => 'publish',
                                'posts_per_page' => '1',
                                'post__in' => array($id_formulario),
                            );
                            $result = new WP_Query($args);
                            if ($result->have_posts()) :
                                while ($result->have_posts()) : $result->the_post();
                                    $campos = json_decode(get_post_meta($post->ID, 'campos', true));
                                    foreach ($campos as $campo) {
                                        if($campo->tipo_campo == 'Tipo texto') {
                                            if(is_user_logged_in()) {
                                                if($campo->registrado == 'si') {
                                                ?>
                                                    <div class="opciones">
                                                        <label class="container"><?php echo $campo->pregunta; ?></label>
                                                        <input type="text" name="<?php echo $campo->pregunta; ?>" id="" class="w-input" required>
                                                    </div>
                                                <?php
                                                }
                                            }
                                            else {
                                                if($campo->invitado == 'si') {
                                                ?>
                                                    <div class="opciones">
                                                        <label class="container"><?php echo $campo->pregunta; ?></label>
                                                        <input type="text" name="<?php echo $campo->pregunta; ?>" id="" class="w-input" required>
                                                    </div>
                                                <?php
                                                }
                                            }
                                        }

                                        if($campo->tipo_campo == 'Tipo email') {
                                            if(is_user_logged_in()) {
                                                if($campo->registrado == 'si') {
                                                ?>
                                                    <div class="opciones">
                                                        <label class="container"><?php echo $campo->pregunta; ?></label>
                                                        <input type="email" name="<?php echo $campo->pregunta; ?>" id="" class="w-input" required>
                                                    </div>
                                                <?php
                                                }
                                            }
                                            else {
                                                if($campo->invitado == 'si') {
                                                ?>
                                                    <div class="opciones">
                                                        <label class="container"><?php echo $campo->pregunta; ?></label>
                                                        <input type="email" name="<?php echo $campo->pregunta; ?>" id="" class="w-input" required>
                                                    </div>
                                                <?php
                                                }
                                            }
                                        }

                                        if($campo->tipo_campo == 'Tipo fecha') {
                                          if(is_user_logged_in()) {
                                              if($campo->registrado == 'si') {
                                              ?>
                                                  <div class="opciones">
                                                      <label class="container"><?php echo $campo->pregunta; ?></label>
                                                      <input type="date" max="<?php echo date("Y-m-d"); ?>" name="<?php echo $campo->pregunta; ?>" id="" class="w-input" required>
                                                  </div>
                                              <?php
                                              }
                                          }
                                          else {
                                              if($campo->invitado == 'si') {
                                              ?>
                                                  <div class="opciones">
                                                      <label class="container"><?php echo $campo->pregunta; ?></label>
                                                      <input type="date" max="<?php echo date("Y-m-d"); ?>" name="<?php echo $campo->pregunta; ?>" id="" class="w-input" required>
                                                  </div>
                                              <?php
                                              }
                                          }
                                        }

                                        if($campo->tipo_campo == 'Tipo teléfono') {
                                          if(is_user_logged_in()) {
                                              if($campo->registrado == 'si') {
                                              ?>
                                                  <div class="opciones">
                                                      <label class="container"><?php echo $campo->pregunta; ?></label>
                                                      <input type="tel" name="<?php echo $campo->pregunta; ?>" id="<?php echo $campo->pregunta; ?>" class="w-input" required>
                                                  </div>
                                              <?php
                                              }
                                          }
                                          else {
                                              if($campo->invitado == 'si') {
                                              ?>
                                                  <div class="opciones">
                                                      <label class="container"><?php echo $campo->pregunta; ?></label>
                                                      <input type="tel" name="<?php echo $campo->pregunta; ?>" id="<?php echo $campo->pregunta; ?>" class="w-input" required>
                                                  </div>
                                              <?php
                                              }
                                          }
                                        }

                                        if($campo->tipo_campo == 'Tipo lista') {
                                            if(is_user_logged_in()) {
                                                if($campo->registrado == 'si') {
                                                ?>
                                                    <div class="opciones">
                                                        <label class="container"><?php echo $campo->pregunta; ?></label>
                                                        <select name="<?php echo $campo->pregunta; ?>" class="w-input" required>
                                                            <?php
                                                            $opciones_lista1 = explode(",", $campo->opciones);
                                                            foreach ($opciones_lista1 as $key => $value) { ?>
                                                                <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                <?php
                                                }
                                            }
                                            else {
                                                if($campo->invitado == 'si') {
                                                ?>
                                                    <div class="opciones">
                                                        <label class="container"><?php echo $campo->pregunta; ?></label>
                                                        <select name="<?php echo $campo->pregunta; ?>" class="w-input" required>
                                                            <?php
                                                            $opciones_lista1 = explode(",", $campo->opciones);
                                                            foreach ($opciones_lista1 as $key => $value) { ?>
                                                                <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                <?php
                                                }
                                            }
                                        }

                                        if($campo->tipo_campo == 'Tipo país') {
                                          if(is_user_logged_in()) {
                                              if($campo->registrado == 'si') {
                                              ?>
                                                  <div class="opciones">
                                                      <label class="container"><?php echo $campo->pregunta; ?></label>
                                                      <select name="<?php echo $campo->pregunta; ?>" id="<?php echo $campo->pregunta; ?>" class="w-input" required>
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
                                              <?php
                                              }
                                          }
                                          else {
                                              if($campo->invitado == 'si') {
                                              ?>
                                                  <div class="opciones">
                                                      <label class="container"><?php echo $campo->pregunta; ?></label>
                                                      <select name="<?php echo $campo->pregunta; ?>" id="<?php echo $campo->pregunta; ?>" class="w-input" required>
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
                                              <?php
                                              }
                                          }
                                      }

                                    }
                        ?>
                                <?php 
                                endwhile;
                            endif;
                            wp_reset_postdata();
                        }
                        ?>
                        <?php
                        if(!is_user_logged_in()) {
                        ?>
                        <div id="colombia" class="check_boxes" style="padding-top:10px; padding-bottom:10px;">
                            <div style="display:flex;justify-content:flex-start;align-items:center;">
                                <input type="checkbox" class="checkbox" id="tratamiento_datos" name="tratamiento_datos" value="1" required/><a target="_blank"><span>Autorizo expresamente el tratamiento de mis datos personales</span></a>
                            </div>
                        </div>
                        <div class="check_boxes" style="padding-top:10px; padding-bottom:10px;">
                            <div style="display:flex;justify-content:flex-start;align-items:center;">
                                <input type="checkbox" class="checkbox" id="politicas_privacidad" name="politicas_privacidad" value="1" required/><a href="../wp-content/media/2021/09/Política-de-privacidad.pdf" target="_blank"><span>Acepto la Política de Privacidad y Cookies.</span></a>
                            </div>
                        </div>
                        <div class="check_boxes" style="padding-top:10px; padding-bottom:10px;">
                            <div style="display:flex;justify-content:flex-start;align-items:center;">
                            <input type="checkbox" class="checkbox" id="terminos_condiciones" name="terminos_condiciones" value="1" required/><a href="../wp-content/media/2021/06/Términos-de-Uso.pdf" target="_blank"><span>Acepto Términos y condiciones de la Página Web.</span></a>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        if(get_post_meta($post->ID, 'terminos_evento', true)) {
                        ?>
                        <div class="check_boxes" style="padding-top:10px; padding-bottom:10px;">
                            <div style="display:flex;justify-content:flex-start;align-items:center;">
                                <input type="checkbox" class="checkbox" id="terminos_evento" name="terminos_evento" value="1" required/><a href="<?php echo get_post_meta($post->ID, 'terminos_evento', true); ?>" target="_blank"><span>Acepto términos y condiciones del evento</span></a>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <br>
                        <div class="participate_-cont">
                            <input type="submit" value="ENVIAR" id="enviar_form" style="cursor:pointer;margin-top:0px" class="participate_button participate_cont_a">
                        </div>
                    </form>
                    <h2 class="ok" id="inscrito_ok" style="color: black; text-align: center; width: 100%; display: none; color: white !important;">Gracias por inscribirte.</h2>
                <?php
                    }
                ?>
        <?php if (is_user_logged_in() && $inscrito == true) { ?>
            <h2 class="ok" style="color: white; text-align: center; width: 100%;">Ya te encuentras inscrito en este evento</h2>
        <?php } ?>
        <br>
        <br>
        <?php echo apply_shortcodes('[TheChamp-Sharing title="COMPARTIR"]') ?>
        <br>
        <?php get_template_part('template-parts/foot_logos/foot_logos'); ?>
    </div>

<?php
} else {
?>
    <style>
        .side_buttons_link.favorite {
            display: flex;
            width: 40px;
            height: 41px;
            margin-left: -2px;
        }

        .suscribe_style {
            margin: 0px;
            font-family: 'Gatorade black';
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

        .evento_form select, .evento_form input[type=text], .evento_form input[type=date], .evento_form input[type=number], .evento_form input[type=email], .evento_form input[type=tel] {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            color: black;
            border-radius: 30px;
            font-size: 15px;
            text-align-last: center;
            color: #4B4B4B;
            font-family: 'Gatorade black', sans-serif;
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

        .content_cont {
            padding: 70px 15% 50px;
        }

        .counter_cont_tit {
            color: black;
        }

        .cont_etiqueta {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        p {
            color: black;
        }

        .el_counter_number {
            background-color: #4d4d4d;
            color: white;
        }

        .el_counter_txt {
            color: #4d4d4d;
        }

        .participate_cont_a {
            width: 100%;
        }

        .text_medium_center {
            color: black;
        }

        .add_event_text {
            color: white;
            white-space: pre-line;
            font-family: 'Gatorade black', sans-serif;
            font-size: 13px;
            text-decoration: none;
            text-transform: uppercase;
            line-height: normal;
            padding-top: 14px;
            padding-left: 12px;
            padding-right: 8px;
        }
    </style>
    <div class="home">

        <?php get_template_part('template-parts/desktop/header'); ?>
        <?php
        if (get_post_meta($post->ID, 'id_youtube', true)) {
        ?>
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'id_youtube', true); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php } ?>

        <div class="flexbox-container" style="display:flex; margin-bottom:80px">
            <div style="width:75%; padding-right: 3%;">
                <?php echo the_content(); ?>
                <input type="hidden" class="postId" value="<?php echo ($post->ID) ? $post->ID:''; ?>">
                <input type="hidden" class="userId" value="<?php echo ($current_user->ID) ? $current_user->ID:''; ?>">
                <?php if ($fecha_evento && $fecha_max_inscripcion) { ?>
                    <div class="counter_cont">
                        <div class="counter_cont_tit">FALTAN:</div>
                        <div class="counter_cont_list">
                            <div class="counter_cont_list_el">
                                <div class="el_counter_number" id="dias">00</div>
                                <p class="el_counter_txt">DÍAS</p>
                            </div>
                            <div class="counter_cont_list_el">
                                <div class="el_counter_number" id="horas">00</div>
                                <p class="el_counter_txt">HORAS</p>
                            </div>
                            <div class="counter_cont_list_el">
                                <div class="el_counter_number" id="minutos">00</div>
                                <p class="el_counter_txt">MINUTOS</p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div style="display: flex;justify-content: space-between;">
                    <div style="background: black;display: -webkit-inline-box;padding-right: 18px;border-radius: 41px;">
                        <a class="side_buttons_link favorite w-inline-block">
                            <img src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6026c3b6fb4589cf42b78ae1_favorite.svg" width="30" height="30" loading="lazy" data-w-id="19d67c4d-a60a-dadc-45ac-cc759b964ade" alt="" class="side_buttons_link_img" />
                        </a>
                        <pre class="add_event_text">Agrega este evento a tus favoritos</pre>
                    </div>
                    <?php echo apply_shortcodes('[TheChamp-Sharing title="COMPARTIR"]') ?>
                    <br>
                </div>
            </div>
            <div style="width:35%; padding-left:10px; padding-top:30px">
                <div class="counter_cont_tit evento_nodisponible" style="text-align:center;margin:20px 0px 40px;line-height:27px;">ESTE EVENTO YA NO ESTA DISPONIBLE</div>
                <div class="counter_cont_tit evento_nodisponible_insc" style="text-align:center;margin:20px 0px 40px;line-height:27px;">ESTE EVENTO YA NO PERMITE INSCRIPCIONES</div>
                <?php
                    $meta = get_post_meta($post->ID);
                ?>
                <?php
                $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                if (strpos($url,'gatorade-5v5-2022') !== false && $inscrito == false) {
                ?>
                    <form class="evento_form" id="event_especial" name="event_especial">
                        <input type="hidden" name="eventoId" id="eventoId" value="<?php echo ($post->ID) ? $post->ID : ''; ?>">
                        <input type="hidden" name="userId" id="userId" value="<?php echo ($current_user->ID) ? $current_user->ID : ''; ?>">
                        <input type="hidden" name="programName" id="programName" value="<?php echo (get_post_meta($post->ID, 'program_name', true)) ? get_post_meta($post->ID, 'program_name', true) : ''; ?>">
                        <p class="suscribe_style">Gatorade 5v5 2022</p>
                        <br>
                        <?php
                        if(!is_user_logged_in()) {
                        ?>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Nome':'Nombre'; ?></label>
                            <input type="text" name="nombre" id="nombre" class="w-input" value="<?php echo (isset($nombre)) ? $nombre : ''; ?>" required>
                        </div>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Sobrenome':'Apellido'; ?></label>
                            <input type="text" name="apellido" id="apellido" class="w-input" value="<?php echo (isset($apellido)) ? $apellido : ''; ?>" required>
                        </div>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Correio eletrônico':'Correo electrónico'; ?></label>
                            <input type="email" name="correo" id="correo" class="w-input" value="<?php echo (isset($correo)) ? $correo : ''; ?>" <?php echo ($id_five != '') ? 'readonly':''; ?> required>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Data de nascimento':'Fecha de nacimiento'; ?></label>
                            <input type="date" max="<?php echo date("Y-m-d"); ?>" name="fecha_nacimiento" id="fecha_nacimiento" class="w-input" value="<?php echo (isset($fecha_nacimiento)) ? $fecha_nacimiento : ''; ?>" required>
                        </div>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'País':'País'; ?></label>
                            <select name="País" id="País" class="w-input" required>
                                <?php
                                if((strpos($url,'gatorade-5v5-2022-br') !== false)) {
                                ?>
                                <option value="br">Brasil</option>
                                <?php
                                } else {
                                ?>
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
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Celular':'Celular'; ?></label>
                            <input type="tel" name="Celular" id="Celular" class="w-input" onkeydown="javascript: return event.keyCode == 69 ? false : true" required>
                            <span id="valid-msg" class="hide">✓ Valido</span>
                            <span id="error-msg" class="hide"></span>
                        </div>
                        <div class="opciones">
                            <label class="container"><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Gênero':'Genero'; ?></label>
                            <select name="genero" id="genero" class="w-input" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <?php
                            if($terminos_evento_pais['co'] != '') {
                        ?>
                            <div class="check_boxes" id="co_terminos" style="padding-top:10px; padding-bottom:10px;display:none;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="<?php echo $terminos_evento_pais['co']; ?>" target="blank_"><span>Términos y Condiciones evento 5V5 2022</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['cl'] != '') {
                        ?>
                            <div class="check_boxes" id="cl_terminos" style="padding-top:10px; padding-bottom:10px;display:none;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="<?php echo $terminos_evento_pais['cl']; ?>" target="blank_"><span>Términos y Condiciones evento 5V5 2022</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['ar'] != '') {
                        ?>
                            <div class="check_boxes" id="ar_terminos" style="padding-top:10px; padding-bottom:10px;display:none;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="<?php echo $terminos_evento_pais['ar']; ?>" target="blank_"><span>Términos y Condiciones evento 5V5 2022</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['br'] != '') {
                        ?>
                            <div class="check_boxes" id="br_terminos" <?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'style="padding-top:10px; padding-bottom:10px;"':'style="padding-top:10px; padding-bottom:10px;display:none;"'; ?>>
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="<?php echo $terminos_evento_pais['br']; ?>" target="blank_"><span>Termos e Condições do Evento 5V5 2022</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['br'] != '') {
                        ?>
                            <div class="check_boxes" id="br_terminos2" <?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'style="padding-top:10px; padding-bottom:10px;"':'style="padding-top:10px; padding-bottom:10px;display:none;"'; ?>>
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="https://www.pepsico.com.br/pt-br/privacidade" target="blank_"><span>Política de Privacidade e Cookies</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['br'] != '') {
                        ?>
                            <div class="check_boxes" id="br_terminos3" <?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'style="padding-top:10px; padding-bottom:10px;"':'style="padding-top:10px; padding-bottom:10px;display:none;"'; ?>>
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a><span style="color:var(--color-orange);">Quero receber comunicação sobre as novidades da marca e ações da PepsiCo. Seu consentimento para esse fim é voluntário e você é livre para o retirar a qualquer momento.</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['mx'] != '') {
                        ?>
                            <div class="check_boxes" id="mx_terminos" style="padding-top:10px; padding-bottom:10px;display:none;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="<?php echo $terminos_evento_pais['mx']; ?>" target="blank_"><span>Términos y Condiciones evento 5V5 2022</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                            if($terminos_evento_pais['do'] != '') {
                        ?>
                            <div class="check_boxes" id="do_terminos" style="padding-top:10px; padding-bottom:10px;display:none;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_evento_pais" name="terminos_evento_pais" value="TRUE" checked="checked" required /><a href="<?php echo $terminos_evento_pais['do']; ?>" target="blank_"><span>Términos y Condiciones evento 5V5 2022</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if(!is_user_logged_in()) {
                        ?>
                            <?php
                            if(get_option('tratamiento_datos')) {
                            ?>
                            <div class="check_boxes" id="colombia" style="padding-top:10px; padding-bottom:10px;display:none;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="tratamiento_datos" name="tratamiento_datos" value="TRUE" checked="checked" required /><a href="<?php echo get_option('tratamiento_datos'); ?>" target="blank_"><span>Autorizo expresamente el tratamiento de mis datos personales</span></a>
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                            <?php
                            if(get_option('politica_privacidad') && !strpos($url,'gatorade-5v5-2022-br') !== false) {
                            ?>
                            <div class="check_boxes" id="brasil_politicas" style="padding-top:10px; padding-bottom:10px;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="politicas_privacidad" name="politicas_privacidad" value="TRUE" <?php echo (isset($_GET['id_five'])) ? 'checked':''; ?> required/><a href="<?php echo get_option('politica_privacidad'); ?>" target="blank_"><span><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Aceito a Política de Privacidade e Cookies.':'Acepto la Política de Privacidad y Cookies.'; ?></span></a>
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                            <!-- <?php
                            if(get_option('terminos_condiciones') && !strpos($url,'gatorade-5v5-2022-br') !== false) {
                            ?>
                            <div class="check_boxes" id="brasil_condiciones" style="padding-top:10px; padding-bottom:10px;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_condiciones" name="terminos_condiciones" value="TRUE" <?php echo (isset($_GET['id_five'])) ? 'checked':''; ?> required/><a href="<?php echo get_option('terminos_condiciones'); ?>" target="blank_"><span><?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'Aceito os Termos e Condições do Site.':'Acepto Términos y condiciones de la Página Web.'; ?></span></a>
                                </div>
                            </div>
                            <?php
                            }
                            ?> -->

                        <?php
                        }
                        ?>
                        <br>
                        <div class="participate_-cont">
                            <input type="submit" value="<?php echo (strpos($url,'gatorade-5v5-2022-br') !== false) ? 'MANDAR':'ENVIAR'; ?>" style="cursor:pointer;margin-top:0px" class="participate_button participate_cont_a">
                        </div>
                        <br>
                        <a id="cancelar_registro" style="text-decoration:underline;text-align:center; <?php echo (isset($_GET['id_five'])) ? 'display:block':'display:none'; ?>">Deseo cancelar mi registro</a>
                    </form>
                <?php
                } else if (get_post_meta($post->ID, 'formulario_elegido', true) && $inscrito == false) {
                        $id_formulario = get_post_meta($post->ID, 'formulario_elegido', true);
                ?>
                    <form class="evento_form" id="formulario" name="formulario" method="post">
                        <input type="hidden" name="eventoId" id="eventoId" value="<?php echo ($post->ID) ? $post->ID : ''; ?>">
                        <input type="hidden" name="formularioId" id="formularioId" value="<?php echo (get_post_meta($post->ID, 'formulario_elegido', true)) ? get_post_meta($post->ID, 'formulario_elegido', true) : ''; ?>">
                        <input type="hidden" name="userId" id="userId" value="<?php echo ($current_user->ID) ? $current_user->ID : ''; ?>">
                        <input type="hidden" name="programName" id="programName" value="<?php echo (get_post_meta($post->ID, 'program_name', true)) ? get_post_meta($post->ID, 'program_name', true) : ''; ?>">
                        <p class="suscribe_style"><?php echo get_the_title($id_formulario); ?></p>
                        <p class="instructions"><?php echo get_post_meta($id_formulario, 'subtitulo', true); ?></p>
                        <?php
                        if (get_post_meta($post->ID, 'formulario_elegido', true)) {
                            $args = array(
                                'post_type' => 'formularios',
                                'post_status' => 'publish',
                                'posts_per_page' => '1',
                                'post__in' => array($id_formulario),
                            );
                            $result = new WP_Query($args);
                            if ($result->have_posts()) :
                                while ($result->have_posts()) : $result->the_post();
                                    $campos = json_decode(get_post_meta($post->ID, 'campos', true));
                                    foreach ($campos as $campo) {
                                        if($campo->tipo_campo == 'Tipo texto') {
                                            if(is_user_logged_in()) {
                                                if($campo->registrado == 'si') {
                                                ?>
                                                    <div class="opciones">
                                                        <label class="container"><?php echo $campo->pregunta; ?></label>
                                                        <input type="text" name="<?php echo $campo->pregunta; ?>" id="" class="w-input" required>
                                                    </div>
                                                <?php
                                                }
                                            }
                                            else {
                                                if($campo->invitado == 'si') {
                                                ?>
                                                    <div class="opciones">
                                                        <label class="container"><?php echo $campo->pregunta; ?></label>
                                                        <input type="text" name="<?php echo $campo->pregunta; ?>" id="" class="w-input" required>
                                                    </div>
                                                <?php
                                                }
                                            }
                                        }

                                        if($campo->tipo_campo == 'Tipo email') {
                                            if(is_user_logged_in()) {
                                                if($campo->registrado == 'si') {
                                                ?>
                                                    <div class="opciones">
                                                        <label class="container"><?php echo $campo->pregunta; ?></label>
                                                        <input type="email" name="<?php echo $campo->pregunta; ?>" id="" class="w-input" required>
                                                    </div>
                                                <?php
                                                }
                                            }
                                            else {
                                                if($campo->invitado == 'si') {
                                                ?>
                                                    <div class="opciones">
                                                        <label class="container"><?php echo $campo->pregunta; ?></label>
                                                        <input type="email" name="<?php echo $campo->pregunta; ?>" id="" class="w-input" required>
                                                    </div>
                                                <?php
                                                }
                                            }
                                        }

                                        if($campo->tipo_campo == 'Tipo fecha') {
                                          if(is_user_logged_in()) {
                                              if($campo->registrado == 'si') {
                                              ?>
                                                  <div class="opciones">
                                                      <label class="container"><?php echo $campo->pregunta; ?></label>
                                                      <input type="date" max="<?php echo date("Y-m-d"); ?>" name="<?php echo $campo->pregunta; ?>" id="" class="w-input" required>
                                                  </div>
                                              <?php
                                              }
                                          }
                                          else {
                                              if($campo->invitado == 'si') {
                                              ?>
                                                  <div class="opciones">
                                                      <label class="container"><?php echo $campo->pregunta; ?></label>
                                                      <input type="date" max="<?php echo date("Y-m-d"); ?>" name="<?php echo $campo->pregunta; ?>" id="" class="w-input" required>
                                                  </div>
                                              <?php
                                              }
                                          }
                                        }

                                        if($campo->tipo_campo == 'Tipo teléfono') {
                                          if(is_user_logged_in()) {
                                              if($campo->registrado == 'si') {
                                              ?>
                                                  <div class="opciones">
                                                      <label class="container"><?php echo $campo->pregunta; ?></label>
                                                      <input type="tel" name="<?php echo $campo->pregunta; ?>" id="<?php echo $campo->pregunta; ?>" class="w-input" required>
                                                  </div>
                                              <?php
                                              }
                                          }
                                          else {
                                              if($campo->invitado == 'si') {
                                              ?>
                                                  <div class="opciones">
                                                      <label class="container"><?php echo $campo->pregunta; ?></label>
                                                      <input type="tel" name="<?php echo $campo->pregunta; ?>" id="<?php echo $campo->pregunta; ?>" class="w-input" required>
                                                  </div>
                                              <?php
                                              }
                                          }
                                        }

                                        if($campo->tipo_campo == 'Tipo lista') {
                                            if(is_user_logged_in()) {
                                                if($campo->registrado == 'si') {
                                                ?>
                                                    <div class="opciones">
                                                        <label class="container"><?php echo $campo->pregunta; ?></label>
                                                        <select name="<?php echo $campo->pregunta; ?>" class="w-input" required>
                                                            <?php
                                                            $opciones_lista1 = explode(",", $campo->opciones);
                                                            foreach ($opciones_lista1 as $key => $value) { ?>
                                                                <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                <?php
                                                }
                                            }
                                            else {
                                                if($campo->invitado == 'si') {
                                                ?>
                                                    <div class="opciones">
                                                        <label class="container"><?php echo $campo->pregunta; ?></label>
                                                        <select name="<?php echo $campo->pregunta; ?>" class="w-input" required>
                                                            <?php
                                                            $opciones_lista1 = explode(",", $campo->opciones);
                                                            foreach ($opciones_lista1 as $key => $value) { ?>
                                                                <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                <?php
                                                }
                                            }
                                        }

                                        if($campo->tipo_campo == 'Tipo país') {
                                          if(is_user_logged_in()) {
                                              if($campo->registrado == 'si') {
                                              ?>
                                                  <div class="opciones">
                                                      <label class="container"><?php echo $campo->pregunta; ?></label>
                                                      <select name="<?php echo $campo->pregunta; ?>" id="<?php echo $campo->pregunta; ?>" class="w-input" required>
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
                                              <?php
                                              }
                                          }
                                          else {
                                              if($campo->invitado == 'si') {
                                              ?>
                                                  <div class="opciones">
                                                      <label class="container"><?php echo $campo->pregunta; ?></label>
                                                      <select name="<?php echo $campo->pregunta; ?>" id="<?php echo $campo->pregunta; ?>" class="w-input" required>
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
                                              <?php
                                              }
                                          }
                                      }

                                    }
                        ?>
                                <?php 
                                endwhile;
                            endif;
                            wp_reset_postdata();
                        }
                        ?>
                        <?php
                        if(!is_user_logged_in()) {
                        ?>

                           
                            <?php
                            if(get_option('tratamiento_datos')) {
                            ?>
                            <div class="check_boxes" id="colombia" style="padding-top:10px; padding-bottom:10px;display:none;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="tratamiento_datos" name="tratamiento_datos" value="TRUE" checked="checked" required /><a href="<?php echo get_option('tratamiento_datos'); ?>" target="blank_"><span>Autorizo expresamente el tratamiento de mis datos personales</span></a>
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                            <?php
                            if(get_option('politica_privacidad')) {
                            ?>
                            <div class="check_boxes" style="padding-top:10px; padding-bottom:10px;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="politicas_privacidad" name="politicas_privacidad" value="TRUE" <?php echo (isset($_GET['id_five'])) ? 'checked':''; ?> required/><a href="<?php echo get_option('politica_privacidad'); ?>" target="blank_"><span>Acepto la Política de Privacidad y Cookies.</span></a>
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                            <?php
                            if(get_option('terminos_condiciones')) {
                            ?>
                            <div class="check_boxes" style="padding-top:10px; padding-bottom:10px;">
                                <div style="display:flex;justify-content:flex-start;align-items:center;">
                                    <input type="checkbox" class="checkbox" id="terminos_condiciones" name="terminos_condiciones" value="TRUE" <?php echo (isset($_GET['id_five'])) ? 'checked':''; ?> required/><a href="<?php echo get_option('terminos_condiciones'); ?>" target="blank_"><span>Acepto Términos y condiciones de la Página Web.</span></a>
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                        <?php
                        }
                        ?>
                        <?php
                        if(get_post_meta($post->ID, 'terminos_evento', true)) {
                        ?>
                        <div class="check_boxes" style="padding-top:10px; padding-bottom:10px;">
                            <div style="display:flex;justify-content:flex-start;align-items:center;">
                                <input type="checkbox" class="checkbox" id="terminos_evento" name="terminos_evento" value="1" <?php echo (isset($_GET['id_five'])) ? 'checked':''; ?> required/><a href="<?php echo get_post_meta($post->ID, 'terminos_evento', true); ?>" target="_blank"><span>Acepto términos y condiciones del evento</span></a>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <br>
                        <div class="participate_-cont">
                            <input type="submit" value="ENVIAR" id="enviar_form" style="cursor:pointer;margin-top:0px" class="participate_button participate_cont_a">
                        </div>
                    </form>
                    <h2 class="ok" id="inscrito_ok" style="color: black; text-align: center; width: 100%; display: none;">Gracias por inscribirte.</h2>
                <?php
                    }
                ?>
                <?php if (is_user_logged_in() && $inscrito == false && !get_post_meta($post->ID, 'formulario_elegido', true)) { ?>
                    <!-- <div class="participate_-cont">
                        <a id="participate" class="participate_cont_a">PARTICIPAR</a>
                    </div> -->
                <?php } ?>
                <?php if (is_user_logged_in() && $inscrito == true) { ?>
                    <h2 class="ok" style="color: black; text-align: center; width: 100%;">Ya te encuentras inscrito en este evento</h2>
                <?php } ?>
            </div>
        </div>

        <?php get_template_part('template-parts/desktop/footer'); ?>
    </div>
<?php
}
?>
<script type="text/javascript">
    var pais_el_usu = "<?php echo $pais_el_usu; ?>";
    var mensaje_popup_registro = "<?php echo $mensaje_popup_registro; ?>";
    jQuery(document).ready(function() {
        jQuery('.header_nav_close').css('display', 'flex');
        jQuery('.header_nav_close').attr('href', '<?php echo home_url('eventos'); ?>');
        var input = document.querySelector("#Celular"),
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
    });
</script>
<script>
    //cambio pais
    jQuery( document ).ready(function() {
        jQuery(document).on('change', '#País', function(event) {
            if(jQuery(this).val()== 'co'){
                jQuery('#colombia').find('input').prop('required',true);
                jQuery('#colombia').css('display','block');
            }else{
                jQuery('#colombia').css('display','none');
                jQuery('#colombia').find('input').prop('required',false);
            }
        });
    });

    jQuery("#formulario").on("submit", function(event) {
        event.preventDefault();
        
        setTimeout(function(){ 
            jQuery('#loader').css('display', 'flex');
            var dataform = jQuery('#formulario').serializeArray();
            jQuery.ajax({
                type: "post",
                url: MyAjax.url,
                data: {
                    action: "guardar_registro_evento",
                    dataForm: dataform,
                },
                beforeSend: function() {
                   
                },
                error: function(response) {
                    jQuery('.msgAlert').css('display', 'flex');
                    jQuery('.msgAlert .txtMsg').html(response);
                },
                success: function(response) {
                    // Actualiza el mensaje con la respuesta
                    strs = response.replace(/\s/g, "");
                    jQuery('#loader').css('display', 'none');
    
                    if (strs === '0') {
                        if (jQuery('#formulario')) {
                            jQuery('#formulario').css('display', 'none');
                        }
                        jQuery('.msgAlert').css('display', 'flex');
                        jQuery('.msgAlertCont').css('padding-bottom', '30px');
                        if(pais_el_usu != 'br') {
                            jQuery('.msgAlert .txtMsg').html('Ha ocurrido un error');
                        } else {
                            jQuery('.msgAlert .txtMsg').html('Ocorreu um erro.');
                        } 
                    }
                    if (strs === '1') {
                        jQuery('.msgAlert').css('display', 'flex');
                        jQuery('.msgAlertCont').css('padding-bottom', '30px');
                        if(pais_el_usu != 'br') {
                            if(mensaje_popup_registro != '') {
                                jQuery('.msgAlert .txtMsg').html(mensaje_popup_registro);
                            } else {
                                jQuery('.msgAlert .txtMsg').html('Inscrito correctamente');
                            }
                        } else {
                            jQuery('.msgAlert .txtMsg').html('Inscrito com sucesso');
                        } 
                        if (jQuery('#formulario')) {
                            jQuery('#formulario').css('display', 'none');
                        }
                        jQuery('#inscrito_ok').css('display', 'block');
                    }
                    if (strs === '2') {
                        if (jQuery('#formulario')) {
                            jQuery('#formulario').css('display', 'none');
                        }
                        jQuery('#inscrito_ok').css('display', 'block');
                        jQuery('.msgAlert').css('display', 'none');
                        jQuery('.msgAlert').css('display', 'flex');
                        jQuery('.msgAlert .txtMsg').html(`<h4 class="felicitaciones" style="text-transform:uppercase;">RETO ACTIVADO:</h4><div class="content_cont_h1_line"></div><br><div class="list_retos_logrados_el"> <div><video autoplay muted loop playsinline> <source src="<?php echo $video_medalla_inscripcion_evento; ?>" type="video/mp4"> </video></div><h3> <?php echo $titulo_medalla_inscripcion_evento; ?> </h3></div><p style="color: black;text-align: center;font-family: 'Gatorade black';font-size: 17px;width: 100%;margin: 0;padding: 20px 0px 8px;line-height: 19px;">¡COMPARTE TU MEDALLA CON TUS AMIGOS E INVITALOS AL DESAFIO!</p><div class="the_champ_sharing_container the_champ_horizontal_sharing" style="padding-bottom:20px;" ss-offset="0" super-socializer-data-href="<?php echo home_url('retos'); ?>"> <div style="font-weight:bold" class="the_champ_sharing_title"></div><ul class="the_champ_sharing_ul" style="display:flex;justify-content:center;align-items:center;width:100%;"> <li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Facebook" title="Facebook" class="theChampSharing theChampFacebookBackground" onclick='theChampPopup("https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url('retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampFacebookSvg"> </ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Twitter" title="Twitter" class="theChampSharing theChampTwitterBackground" onclick='theChampPopup("http://twitter.com/intent/tweet?text=Retos&amp;url=<?php echo home_url(' retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampTwitterSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Whatsapp" title="Whatsapp" class="theChampSharing theChampWhatsappBackground" onclick='theChampPopup("https://web.whatsapp.com/send?text=Retos <?php echo home_url('retos'); ?>")' > <ss style="display:block" class="theChampSharingSvg theChampWhatsappSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Email" title="Email" class="theChampSharing theChampEmailBackground" onclick="window.open('mailto:?subject=' + decodeURIComponent('Retos' ).replace('&amp;', '%26') + '&amp;body=' + decodeURIComponent('<?php echo home_url('retos'); ?>' ), '_blank')"> <ss style="display:block" class="theChampSharingSvg theChampEmailSvg"></ss> </i> </li></ul> <div style="clear:both"></div></div>`);
                    }
                    if (strs === '3') {
                        if (jQuery('#formulario')) {
                            jQuery('#formulario').css('display', 'none');
                        }
                        jQuery('#inscrito_ok').css('display', 'block');
                        jQuery('.msgAlert').css('display', 'flex');
                        jQuery('.msgAlertCont').css('padding-bottom', '30px');
                        if(pais_el_usu != 'br') {
                            jQuery('.msgAlert .txtMsg').html('El correo electrónico ingresado ya está inscrito');
                        } else {
                            jQuery('.msgAlert .txtMsg').html('O e-mail inserido já está cadastrado');
                        } 
                        
                    }
                }
            });
        }, 3000);
        
        
    });

    jQuery("#event_especial").on("submit", function(event) {
        event.preventDefault();
        if(jQuery('#valid-msg').hasClass('hide')) {
            if(pais_el_usu != 'br') {
                alert('Debes ingresar un numero de celular valido');
            } else {
                alert('Você deve enviar um número de celular válido');
            } 
        } else {
            var nombre = '';
            var apellido = '';
            var correo = '';
            var fecha_nacimiento = '';
            var pais = '';
            var celular = '';
            var genero = '';
            var terminos_condiciones = '';
            var politicas_privacidad = '';
            var terminos_evento_pais = '';
            var id_five = '';

            if(jQuery('#nombre').val()) {
                nombre = jQuery('#nombre').val();
            }
            if(jQuery('#apellido').val()) {
                apellido = jQuery('#apellido').val();
            }
            if(jQuery('#correo').val()) {
                correo = jQuery('#correo').val();
            }
            if(jQuery('#fecha_nacimiento').val()) {
                fecha_nacimiento = jQuery('#fecha_nacimiento').val();
            }
            if(jQuery('#País').val()) {
                pais = jQuery('#País').val();
            }
            if(jQuery('#Celular').val()) {
                celular = indicativo_init.getNumber();         
            }
            if(jQuery('#genero').val()) {
                genero = jQuery('#genero').val();
            }
            if(jQuery('#terminos_condiciones').val()) {
                terminos_condiciones = jQuery('#terminos_condiciones').val();
            }
            if(jQuery('#politicas_privacidad').val()) {
                politicas_privacidad = jQuery('#politicas_privacidad').val();
            }
            if(jQuery('#terminos_evento_pais').val()) {
                terminos_evento_pais = jQuery('#terminos_evento_pais').val();
            }
            if('<?php echo $id_five ?>' != '') {
                id_five = '<?php echo $id_five; ?>';
            }
            
            jQuery.ajax({
                type: "post",
                url: MyAjax.url,
                data: {
                    action: "guardar_registro_five",
                    nombre: nombre,
                    apellido: apellido,
                    correo: correo,
                    fecha_nacimiento: fecha_nacimiento,
                    pais: pais,
                    celular: celular,
                    genero: genero,
                    terminos_condiciones: terminos_condiciones,
                    politicas_privacidad: politicas_privacidad,
                    terminos_evento_pais: terminos_evento_pais,
                    id_five: id_five,
                },
                beforeSend: function() {
                    jQuery('.msgAlert').css('display', 'flex');
                },
                error: function(response) {
                    jQuery('.msgAlert').css('display', 'flex');
                    jQuery('.msgAlert .txtMsg').html(response);
                    console.log('error');
                },
                success: function(response) {
                    var reps_str = JSON.parse(response);
                    // console.log(reps_str);
                    // console.log(typeof reps_str);
                    if(typeof(reps_str) === 'object') {
                        if (reps_str[0]['ID'] != '') {
                            jQuery('.msgAlert').css('display', 'flex');
                            jQuery('.msgAlertCont a').attr('style', 'color: white !important;display: block;');
                            if(pais_el_usu != 'br') {
                                jQuery('.msgAlertCont a').html('ACTUALIZAR');
                                var url_next = '<?php echo home_url("eventos/gatorade-5v5-2022"); ?>'+'/?id_five=' + reps_str[0]['ID'];
                                jQuery('.msgAlertCont a').attr('href',url_next);
                                jQuery('.msgAlertCont a').addClass('actualizar');
                                jQuery('.msgAlert .txtMsg').html('Ya existe un registro con este email. ¿Quiere actualizar los datos?');
                            } else {
                                jQuery('.msgAlertCont a').html('ATUALIZAR');
                                var url_next = '<?php echo home_url("eventos/gatorade-5v5-2022-br"); ?>'+'/?id_five=' + reps_str[0]['ID'];
                                jQuery('.msgAlertCont a').attr('href',url_next);
                                jQuery('.msgAlertCont a').addClass('atualizar');
                                jQuery('.msgAlert .txtMsg').html('Já existe um registro com este e-mail. Deseja atualizar os dados?');
                            } 
                            
                        }
                    }
                    // Actualiza el mensaje con la respuesta
                    strs = response.replace(/\s/g, "");
                    jQuery('#loader').css('display', 'none');

                    if (strs === '0') {
                        if (jQuery('#event_especial')) {
                            jQuery('#event_especial').css('display', 'none');
                        }
                        // jQuery('#inscrito_ok').css('display', 'block');
                        jQuery('.msgAlert').css('display', 'flex');
                        jQuery('.msgAlertCont').css('padding-bottom', '30px');
                        if(pais_el_usu != 'br') {
                            jQuery('.msgAlert .txtMsg').html('Ha ocurrido un error');
                        } else {
                            jQuery('.msgAlert .txtMsg').html('Ocorreu um erro.');
                        } 
                    }
                    if (strs > 0 && strs !== '2') {
                        // console.log('aqui');
                        jQuery('.msgAlert').css('display', 'flex');
                        jQuery('.msgAlertCont').css('padding-bottom', '30px');
                        if(pais_el_usu != 'br') {
                            jQuery('.msgAlert .txtMsg').html('Inscrito correctamente. Te redireccionaremos para completar tu registro...');
                            if (jQuery('#event_especial')) {
                                jQuery('#event_especial').css('display', 'none');
                            }
                            jQuery('#inscrito_ok').css('display', 'block');
                            setTimeout(function(){ 
                                window.location = '<?php echo home_url("registro-five"); ?>'+'?id_five=' + strs;
                            }, 3000);
                        } else {
                            jQuery('.msgAlert .txtMsg').html('Inscrito com sucesso. Vamos redirecioná-lo para concluir seu cadastro...');
                            if (jQuery('#event_especial')) {
                                jQuery('#event_especial').css('display', 'none');
                            }
                            jQuery('#inscrito_ok').css('display', 'block');
                            setTimeout(function(){ 
                                window.location = '<?php echo home_url("registro-five"); ?>'+'?id_five=' + strs;
                            }, 3000);
                        } 
                        
                        
                    }
                }
            });
        }               
    });

    //cancelar registro
    jQuery("#cancelar_registro").on("click", function(e) {
        e.preventDefault();
        jQuery('.msgAlert').css('display', 'flex');
        jQuery('.msgAlertCont a').attr('style', 'color: white !important;display: block;font-size:19px;');
        if(pais_el_usu != 'br') {
            jQuery('.msgAlertCont a').html('CANCELAR MI REGISTRO');
            jQuery('.msgAlertCont a').addClass('cancelar_registro_btn');
            jQuery('.msgAlert .txtMsg').html('¿Estas seguro que deseas cancelar el registro en el evento?<br>Recuerda que ya no estarías habilitado para participar en las actividades');
            jQuery('.msgAlertCont a').removeAttr('href');
        } else {
            jQuery('.msgAlertCont a').html('CANCELAR MINHA INSCRIÇÃO');
            jQuery('.msgAlertCont a').addClass('cancelar_registro_btn');
            jQuery('.msgAlert .txtMsg').html('Tem certeza de que deseja cancelar a inscrição no evento?<br>Lembre-se de que você não poderá mais participar das atividades');
            jQuery('.msgAlertCont a').removeAttr('href');
        }  
        

        //cancelar registro ajax
        jQuery(".cancelar_registro_btn").on("click", function(event) {
            // console.log('cancelar');
            event.preventDefault();
            var id_five = '';        
            if('<?php echo $id_five ?>' != '') {
                id_five = '<?php echo $id_five; ?>';
            }
            
            jQuery.ajax({
                type: "post",
                url: MyAjax.url,
                data: {
                    action: "cancelar_registro_five",
                    id_five: id_five,
                },
                beforeSend: function() {
                    jQuery('.msgAlert').css('display', 'flex');
                },
                error: function(response) {
                    jQuery('.msgAlert').css('display', 'flex');
                    jQuery('.msgAlert .txtMsg').html(response);
                    console.log('error');
                },
                success: function(response) {
                    // Actualiza el mensaje con la respuesta
                    strs = response.replace(/\s/g, "");
                    jQuery('#loader').css('display', 'none');

                    if (strs === '0') {
                        if (jQuery('#event_especial')) {
                            jQuery('#event_especial').css('display', 'none');
                        }
                        // jQuery('#inscrito_ok').css('display', 'block');
                        jQuery('.msgAlert').css('display', 'flex');
                        jQuery('.msgAlertCont').css('padding-bottom', '30px');
                        jQuery('.msgAlertCont a').css('display', 'none');
                        
                        if(pais_el_usu != 'br') {
                            jQuery('.msgAlert .txtMsg').html('Ha ocurrido un error');
                        } else {
                            jQuery('.msgAlert .txtMsg').html('Ocorreu um erro');
                        } 
                    }
                    if (strs === '1') {
                        jQuery('.msgAlert').css('display', 'flex');
                        jQuery('.msgAlertCont').css('padding-bottom', '30px');
                        jQuery('.msgAlertCont a').css('display', 'none');
                        if(pais_el_usu != 'br') {
                            jQuery('.msgAlert .txtMsg').html('Registro cancelado correctamente');
                            setTimeout(function(){ 
                                window.location = '<?php echo home_url("eventos/gatorade-5v5-2022"); ?>';
                            }, 3000);
                        } else {
                            jQuery('.msgAlert .txtMsg').html('Cadastro cancelado com sucesso');
                            setTimeout(function(){ 
                                window.location = '<?php echo home_url("eventos/gatorade-5v5-2022-br"); ?>';
                            }, 3000);
                        } 
                        
                        
                    }
                }
            });
            
            
        });
    });
    
</script>
<script>
    jQuery(document).ready(function() {
        //date input
        jQuery(document).on("change", "#fecha_nacimiento", function() {
            var fecha_el = jQuery(this).val();
            var a = moment();
            var b = moment(fecha_el).format('MM/DD/YYYY');
            var age = moment.duration(a.diff(b));
            var years = age.years();
            if(years >= 18) {
                jQuery('.mensaje_menor').css('display','none');
                jQuery('.terminos_edad').css('display','none');
                jQuery('.info_parent').css('display','none');
                jQuery('.info_parent input').prop('required',false);
            }
            else {
                jQuery('.mensaje_menor').css('display','block');
                jQuery('.terminos_edad').css('display','block');
                jQuery('.info_parent').css('display','block');
                jQuery('.info_parent input').prop('required',true);
            }

            // var a = moment();
            // var b = moment('{dem_pat_birthyear}', 'MM-YYYY');
            // var age = moment.duration(a.diff(b));
            // var years = age.years();
            // var months = age.months();
            // "The age is " + years + " years " + months + " months ";
        });
        // Favoritos
        jQuery(document).on("click", ".side_buttons_link.favorite", function() {
            var user = jQuery('.content_cont').find('.userId').val();
            var post = jQuery('.content_cont').find('.postId').val();
            jQuery.ajax({
                type: "post",
                url: MyAjax.url,
                data: {
                    action: "user_favorites",
                    user: user,
                    post: post,
                },
                beforeSend: function() {
                    jQuery('#loader').css('display', 'flex');
                },
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {
                    // Actualiza el mensaje con la respuesta
                    strs = response.replace(/\s/g, "");
                    jQuery('#loader').css('display', 'none');
                    jQuery('.msgAlert').css('display', 'flex');
                    jQuery('.msgAlertCont').css('padding-bottom', '30px');
                    
                    if(strs === '0'){
                        jQuery('.msgAlert .txtMsg').html('Para añadir a favoritos debes iniciar sesión');
                    }
                    if(strs === '1') {
                        jQuery('.msgAlert .txtMsg').html('Añadido a favoritos correctamente');
                    }
                    if(strs === '2') {
                        jQuery('.msgAlert .txtMsg').html('Ha ocurrido un error');
                    }
                    if(strs === '3') {
                        jQuery('.msgAlert .txtMsg').html('Ya existe en favoritos');
                    }
                }
            });
        });
    });
</script>
<link rel="stylesheet" href="<?php echo JSURL; ?>indicativos/ind.css">
<link rel="stylesheet" href="<?php echo JSURL; ?>indicativos/demo.css">
<script src="<?php echo JSURL; ?>indicativos/ind.js"></script>
<?php 
if(strpos($url,'gatorade-5v5-2022-br') !== false) {
?>
<script>
    var indicativo = document.querySelector("#Celular");
    // if(indicativo) {
        var indicativo_init = window.intlTelInput(indicativo, {
        autoHideDialCode: false,
        formatOnDisplay: false,
        hiddenInput: "full_number",
        placeholderNumberType: "MOBILE",
        onlyCountries: ['br'],
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.0.3/js/utils.js"
        });
    // }
</script>
<?php
} else {
?>
<script>
    var indicativo = document.querySelector("#Celular");
    // if(indicativo) {
        var indicativo_init = window.intlTelInput(indicativo, {
        autoHideDialCode: false,
        formatOnDisplay: false,
        hiddenInput: "full_number",
        initialCountry: "co",
        placeholderNumberType: "MOBILE",
        preferredCountries: ['co', 'cl', 'mx'],
        separateDialCode: true,
        formatOnDisplay: false,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.0.3/js/utils.js"
        });
    // }
</script>
<?php
}
?>
<script>
    var indicativo_parent = document.querySelector("#celular_parent");
    if(indicativo_parent) {
        var indicativo_init_parent = window.intlTelInput(indicativo_parent, {
        autoHideDialCode: false,
        formatOnDisplay: false,
        hiddenInput: "full_number",
        initialCountry: "co",
        placeholderNumberType: "MOBILE",
        preferredCountries: ['co', 'cl', 'mx'],
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.0.3/js/utils.js"
        });
    }
    
    jQuery(document).on('change','#País',function(){
        indicativo_init.setCountry(jQuery(this).val());
        if(jQuery(this).val() == 'co') {
            jQuery('#co_terminos').css('display','block');
        } else {
            jQuery('#co_terminos').css('display','none');
        }
        if(jQuery(this).val() == 'cl') {
            jQuery('#cl_terminos').css('display','block');
        } else {
            jQuery('#cl_terminos').css('display','none');
        }
        if(jQuery(this).val() == 'ar') {
            jQuery('#ar_terminos').css('display','block');
        } else {
            jQuery('#ar_terminos').css('display','none');
        }
        if(jQuery(this).val() == 'mx') {
            jQuery('#mx_terminos').css('display','block');
        } else {
            jQuery('#mx_terminos').css('display','none');
        }
        if(jQuery(this).val() == 'do') {
            jQuery('#do_terminos').css('display','block');
        } else {
            jQuery('#do_terminos').css('display','none');
        }
        if(jQuery(this).val() == 'br') {
            // console.log('brasil');
            jQuery('#br_terminos').css('display','block');
            jQuery('#br_terminos2').css('display','block');
            jQuery('#br_terminos3').css('display','block');
            jQuery('#brasil_politicas').css('display','none');
            jQuery('#brasil_politicas input').prop('required',false);
            jQuery('#brasil_condiciones').css('display','none');
            jQuery('#brasil_condiciones input').prop('required',false);
        } else {
            // console.log('no brasil');
            jQuery('#br_terminos').css('display','none');
            jQuery('#br_terminos2').css('display','none');
            jQuery('#br_terminos3').css('display','none');
            jQuery('#brasil_politicas').css('display','block');
            jQuery('#brasil_politicas input').prop('required',true);
            jQuery('#brasil_condiciones').css('display','block');
            jQuery('#brasil_condiciones input').prop('required',true);
        }
    });

    jQuery(document).on('change','#pais_parent',function(){
        indicativo_init_parent.setCountry(jQuery(this).val());
    });

    jQuery(document).on('change','#terminos_edad',function() {
        if(jQuery(this).is(':checked')) {
            jQuery('.info_parent').css('display','block');
            jQuery('.info_parent input').prop('required',true);
        } else {
            jQuery('.info_parent').css('display','none');
            jQuery('.info_parent input').prop('required',false);
        }
    });
  </script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/locale/es-mx.js"></script>
<script src="https://cdn.jsdelivr.net/npm/countdown@2.6.0/countdown.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment-countdown@0.0.3/dist/moment-countdown.min.js"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('.msgAlert .txtMsg').html('');
        jQuery('#celular_parent').attr('type', 'number');
        jQuery('#Celular').attr('type', 'number');
        const DATE_TARGET = new Date("<?php echo $fechai; ?>");
        const DATE_TARGET_INSC = new Date("<?php echo $fecham; ?>");

        // Milliseconds for the calculations
        const MILLISECONDS_OF_A_SECOND = 1000;
        const MILLISECONDS_OF_A_MINUTE = MILLISECONDS_OF_A_SECOND * 60;
        const MILLISECONDS_OF_A_HOUR = MILLISECONDS_OF_A_MINUTE * 60;
        const MILLISECONDS_OF_A_DAY = MILLISECONDS_OF_A_HOUR * 24

        //===
        // FUNCTIONS
        //===

        /**
         * Method that updates the countdown and the sample
         */
        function updateCountdown() {
            // Calcs
            const NOW = new Date();

            const DURATION = DATE_TARGET - NOW;
            const DURATION_INSC = DATE_TARGET_INSC - NOW;

            const REMAINING_DAYS = Math.floor(DURATION / MILLISECONDS_OF_A_DAY);
            const REMAINING_HOURS = Math.floor((DURATION % MILLISECONDS_OF_A_DAY) / MILLISECONDS_OF_A_HOUR);
            const REMAINING_MINUTES = Math.floor((DURATION % MILLISECONDS_OF_A_HOUR) / MILLISECONDS_OF_A_MINUTE);

            const REMAINING_DAYS_INSC = Math.floor(DURATION_INSC / MILLISECONDS_OF_A_DAY);
            const REMAINING_HOURS_INSC = Math.floor((DURATION_INSC % MILLISECONDS_OF_A_DAY) / MILLISECONDS_OF_A_HOUR);
            const REMAINING_MINUTES_INSC = Math.floor((DURATION_INSC % MILLISECONDS_OF_A_HOUR) / MILLISECONDS_OF_A_MINUTE);

            //validamos si ya paso la fecha limite de inscripcion
            if(REMAINING_DAYS_INSC < 0 && REMAINING_HOURS_INSC < 0 && REMAINING_MINUTES_INSC < 0) {
                jQuery('#formulario').css('display', 'none');
                jQuery('.evento_nodisponible_insc').css('display', 'block');
            } else {
                jQuery('.evento_nodisponible_insc').css('display', 'none');
            }

            //validamos si ya paso el evento
            if (REMAINING_DAYS < 0) {
                jQuery('#dias').html('00');
                jQuery('#formulario').css('display', 'none');
                jQuery('.evento_nodisponible').css('display', 'block');
                jQuery('.evento_nodisponible_insc').css('display', 'none');
            } else {
                jQuery('#dias').html(REMAINING_DAYS);
                jQuery('.evento_nodisponible').css('display', 'none');
            }

            if (REMAINING_HOURS < 0) {
                jQuery('#horas').html('00');
                jQuery('#formulario').css('display', 'none');
                jQuery('.evento_nodisponible').css('display', 'block');
                jQuery('.evento_nodisponible_insc').css('display', 'none');
            } else {
                jQuery('#horas').html(REMAINING_HOURS);
                jQuery('.evento_nodisponible').css('display', 'none');
            }

            if (REMAINING_MINUTES < 0) {
                jQuery('#minutos').html('00');
                jQuery('#formulario').css('display', 'none');
                jQuery('.evento_nodisponible').css('display', 'block');
                jQuery('.evento_nodisponible_insc').css('display', 'none');
            } else {
                jQuery('#minutos').html(REMAINING_MINUTES);
                jQuery('.evento_nodisponible').css('display', 'none');
            }

        }

        //===
        // INIT
        //===
        updateCountdown();
        // Refresh every second
        setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);


    });
</script>
<?php
get_footer();
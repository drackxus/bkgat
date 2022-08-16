<?php
/***
 * @Descripcion: custom-functions.php
 * Contiene las diferentes funciones utiles para presonalizacion de wordpress
 * Opciones de wordpress presonalizadas
 *
 *
***/

 
/* CREAR USER METAS */

function extra_profile_fields( $user ) { ?>
   <style>
    .form-table td {
      padding: 8px 8px !important;
    }
    .form-table th {
      padding: 8px 8px 8px 0 !important;
    }
    </style>
    <h3><?php _e('Datos adicionales'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_nombre">Nombre</label></th>
            <td>
            <input type="text" name="user_nombre" id="user_nombre" value="<?php echo get_user_meta($user->ID, 'user_nombre', true); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="user_apellido">Apellido</label></th>
            <td>
            <input type="text" name="user_apellido" id="user_apellido" value="<?php echo get_user_meta($user->ID, 'user_apellido', true); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="user_celular">Celular</label></th>
            <td>
            <input type="text" name="user_celular" id="user_celular" value="<?php echo get_user_meta($user->ID, 'user_celular', true); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="user_pais">País</label></th>
            <td>
            <input type="text" name="user_pais" id="user_pais" value="<?php echo get_user_meta($user->ID, 'user_pais', true); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="user_deporte">Deporte</label></th>
            <td>
            <input type="text" name="user_deporte" id="user_deporte" value="<?php echo get_user_meta($user->ID, 'user_deporte', true); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="user_terminos">Terminos</label></th>
            <td>
            <input type="text" name="user_terminos" id="user_terminos" value="<?php echo get_user_meta($user->ID, 'user_terminos', true); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="whatsapp_consent">Whatsapp consent</label></th>
            <td>
            <input type="text" name="whatsapp_consent" id="whatsapp_consent" value="<?php echo get_user_meta($user->ID, 'whatsapp_consent', true); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="email_consent">Email consent</label></th>
            <td>
            <input type="text" name="email_consent" id="email_consent" value="<?php echo get_user_meta($user->ID, 'email_consent', true); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="tutorial">Tutorial</label></th>
            <td>
            <input type="text" name="tutorial" id="tutorial" value="<?php echo get_user_meta($user->ID, 'tutorial', true); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="favorite_post_id">Favoritos</label></th>
            <td>
            <input type="text" name="favorite_post_id" id="favorite_post_id" class="regular-text" value="<?php print_r(get_user_meta($user->ID, 'favorite_post_id', true  )); ?>"/>
            </td>
        </tr>
        <tr>
            <th><label for="encuestas">Encuestas</label></th>
            <td>
                <textarea id="encuestas" name="encuestas" rows="4" cols="20"><?php echo get_user_meta($user->ID, 'encuestas', true); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="eventos">Eventos</label></th>
            <td>
            <input type="text" name="eventos" id="eventos" class="regular-text" value="<?php print_r(get_user_meta($user->ID, 'eventos_new', true  )); ?>"/>
            </td>
        </tr>
        <tr>
            <th><label for="notificacion_reto">Notificacion reto</label></th>
            <td>
            <input type="text" name="notificacion_reto" id="notificacion_reto" class="regular-text" value="<?php print_r(get_user_meta($user->ID, 'notificacion_reto', true  )); ?>"/>
            </td>
        </tr>
        <tr>
            <th><label for="gpoints">G-Points</label></th>
            <td>
            <input type="text" name="gpoints" id="gpoints" value="<?php echo get_user_meta($user->ID, 'gpoints', true); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="foto_perfil">Reto cambiar foto de perfil</label></th>
            <td>
            <input type="text" name="foto_perfil" id="foto_perfil" class="regular-text" value="<?php print_r(get_user_meta($user->ID, 'foto_perfil', true  )); ?>"/>
            </td>
        </tr>
        <tr>
            <th><label for="favorito_contenido">Reto favorito al primer contenido</label></th>
            <td>
            <input type="text" name="favorito_contenido" id="favorito_contenido" class="regular-text" value="<?php print_r(get_user_meta($user->ID, 'favorito_contenido', true  )); ?>"/>
            </td>
        </tr>
        <tr>
            <th><label for="conocer_producto">Reto conocer un producto</label></th>
            <td>
            <input type="text" name="conocer_producto" id="conocer_producto" class="regular-text" value="<?php print_r(get_user_meta($user->ID, 'conocer_producto', true  )); ?>"/>
            </td>
        </tr>
        <tr>
            <th><label for="editar_deportes">Reto editar "mis deportes"</label></th>
            <td>
            <input type="text" name="editar_deportes" id="editar_deportes" class="regular-text" value="<?php print_r(get_user_meta($user->ID, 'editar_deportes', true  )); ?>"/>
            </td>
        </tr>
        <tr>
            <th><label for="inscripcion_evento">Reto inscripcion en evento</label></th>
            <td>
            <input type="text" name="inscripcion_evento" id="inscripcion_evento" class="regular-text" value="<?php print_r(get_user_meta($user->ID, 'inscripcion_evento', true  )); ?>"/>
            </td>
        </tr>
        <tr>
            <th><label for="llenar_encuesta">Reto llenar una encuesta</label></th>
            <td>
            <input type="text" name="llenar_encuesta" id="llenar_encuesta" class="regular-text" value="<?php print_r(get_user_meta($user->ID, 'llenar_encuesta', true  )); ?>"/>
            </td>
        </tr>
        <tr>
            <th><label for="registrarse">Reto registrarse como usuario</label></th>
            <td>
            <input type="text" name="registrarse" id="registrarse" class="regular-text" value="<?php print_r(get_user_meta($user->ID, 'registrarse', true  )); ?>"/>
            </td>
        </tr>
        <tr>
            <th><label for="retos_campana_json">Retos campaña</label></th>
            <td>
                <textarea id="retos_campana_json" name="retos_campana_json" rows="4" cols="20"><?php echo get_user_meta($user->ID, 'retos_campana_json', true); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="retos_contenido_json">Retos contenido</label></th>
            <td>
                <textarea id="retos_contenido_json" name="retos_contenido_json" rows="4" cols="20"><?php echo get_user_meta($user->ID, 'retos_contenido_json', true); ?></textarea>
            </td>
        </tr>
    </table>
<?php

}

// Then we hook the function to "show_user_profile" and "edit_user_profile"
add_action( 'show_user_profile', 'extra_profile_fields', 10 );
add_action( 'edit_user_profile', 'extra_profile_fields', 10 );

function save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    /* Edit the following lines according to your set fields */
    update_user_meta( $user_id, 'user_nombre', $_POST['user_nombre'] );
    update_user_meta( $user_id, 'user_apellido', $_POST['user_apellido'] );
    update_user_meta( $user_id, 'user_celular', $_POST['user_celular'] );
    update_user_meta( $user_id, 'user_pais', $_POST['user_pais'] );
    update_user_meta( $user_id, 'user_deporte', $_POST['user_deporte'] );
    update_user_meta( $user_id, 'user_terminos', $_POST['user_terminos'] );
    update_user_meta( $user_id, 'whatsapp_consent', $_POST['whatsapp_consent'] );
    update_user_meta( $user_id, 'email_consent', $_POST['email_consent'] );
    update_user_meta( $user_id, 'tutorial', $_POST['tutorial'] );
    update_user_meta( $user_id, 'favorite_post_id', $_POST['favorite_post_id'] );
    update_user_meta( $user_id, 'notificacion_reto', $_POST['notificacion_reto'] );
    
    update_user_meta( $user_id, 'gpoints', $_POST['gpoints'] );
    update_user_meta( $user_id, 'eventos_new', $_POST['eventos'] );
    update_user_meta( $user_id, 'encuestas', $_POST['encuestas'] );
    update_user_meta( $user_id, 'foto_perfil', $_POST['foto_perfil'] );
    update_user_meta( $user_id, 'favorito_contenido', $_POST['favorito_contenido'] );
    update_user_meta( $user_id, 'conocer_producto', $_POST['conocer_producto'] );
    update_user_meta( $user_id, 'editar_deportes', $_POST['editar_deportes'] );
    update_user_meta( $user_id, 'inscripcion_evento', $_POST['inscripcion_evento'] );
    update_user_meta( $user_id, 'llenar_encuesta', $_POST['llenar_encuesta'] );
    update_user_meta( $user_id, 'registrarse', $_POST['registrarse'] );
            
    
    update_user_meta( $user_id, 'retos_campana_json', $_POST['retos_campana_json'] );
    update_user_meta( $user_id, 'retos_contenido_json', $_POST['retos_contenido_json'] );
    
}

add_action( 'personal_options_update', 'save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_profile_fields' );


 
/*MOSTRAR POPUP RETOS 2*/ 
 
function enviarEmail($mensaje, $imagen, $idUser, $asunto) {
    //Datos para enviar el 
    global $current_user;
    $emailUser = $current_user->user_email;
    $nameUser = get_user_meta($idUser, 'user_nombre', true).' '. get_user_meta($idUser, 'user_apellido', true);
    $to = $emailUser;
    $subject = 'Gatorade - '.$asunto;
    $body .= '<style type="text/css">@font-face {font-family: "Gatorade black";src: url('.FONTSURL.'Gatorade-Black.eot);} @font-face {font-family: "Gatorade medium";src: url('.FONTSURL.'Gatorade-Black.eot);}</style>';
    $body .= '<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">';
    $body .= '<tr>';
    $body .= '<td style="padding:26px;" colspan="3">';
    $body .= '<a href="'.home_url().'">';
    $body .= '<img src="'.IMGURL.'desktop/header/logo_black.png" style="width:66px;margin:0 auto;display:block;"/>';
    $body .= '</a>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr>';
    $body .= '<td colspan="3">';
    $body .= '<img src="'.$imagen.'" style="width:100%;margin:0 auto;display:block;"/>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr>';
    $body .= '<td style="text-align:center" colspan="3">';
    $body .= '<h3 style="color:#FF8901;text-align:center;font-size:28px;font-family:Gatorade,Rockwell,Georgia,serif;text-transform:uppercase;">Hola '.$nameUser.',</h3>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr>';
    $body .= '<td colspan="3">';
    $body .= '<div style="width:60px;background:#FF8901;height:1px;margin:0 auto;"></div>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr>';
    $body .= '<td style="text-align:center" colspan="3">';
    $body .= '<p style="color:black;text-align:center;font-size:18px;padding:8px 40px 20px;font-family:Gatorade,Rockwell,Georgia,serif;">'.$mensaje.'</p>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr>';
    $body .= '<td style="text-align:center" colspan="3">';
    $body .= '<a style="background:black;color:white;text-align:center;font-size:17px;padding:12px 20px 10px;text-decoration:none;font-family:Gatorade,Rockwell,Georgia,serif;" href="'.home_url().'">DESCUBRE MÁS AQUÍ</a>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr>';
    $body .= '<td style="padding:26px;" colspan="3">';
    $body .= '<br>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr style="background:#000000;">';
    $body .= '<td style="text-align:center;padding:10px 6px;" width="33%" colspan="1">';
    $body .= '<a href="'.network_site_url().'wp-content/media/2021/06/Términos-de-Uso.pdf" style="color:#FF8901;text-align:center;font-size:10px;padding:12px 20px 14px;text-decoration:none;font-family:Gatorade,Rockwell,Georgia,serif;">TERMINOS Y CONDICIONES</a>';
    $body .= '</td>';
    $body .= '<td style="text-align:center;padding:10px 6px;" width="33%" colspan="1">';
    $body .= '<a href="'.network_site_url().'wp-content/media/2021/06/Política-de-privacidad.pdf" style="color:#FF8901;text-align:center;font-size:10px;padding:12px 20px 14px;text-decoration:none;font-family:Gatorade,Rockwell,Georgia,serif;">POLÍTICAS DE PRIVACIDAD</a>';
    $body .= '</td>';
    $body .= '<td style="text-align:center;padding:10px 6px;" width="33%" colspan="1">';
    $body .= '<a href="#" style="color:#FF8901;text-align:center;font-size:10px;padding:12px 20px 14px;text-decoration:none;font-family:Gatorade,Rockwell,Georgia,serif;">CANCELAR SUSCRIPCIÓN</a>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr style="background:#000000;">';
    $body .= '<td style="padding:0px 16px 17px;" colspan="3">';
    $body .= '<a href="'.home_url().'">';
    $body .= '<img src="'.IMGURL.'desktop/Logo.png" style="width:33px;margin:0 auto;display:block;"/>';
    $body .= '</a>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '</table>';

    
    $headers = array('Content-Type: text/html; charset=UTF-8');
    //Enviando el correo
    wp_mail( $to, $subject, $body, $headers );
}



/*MOSTRAR POPUP RETOS 2*/ 
 
function mostrarPopupEmail($mensaje, $titulo, $video, $imagen, $puntos, $idUser, $nombre_reto, $emailUser, $nameUser) {
    //popup
    ?>
    
    <?php
    
    //Datos para enviar el 
    global $current_user;
    $emailUser = $current_user->user_email;
    $nameUser = get_user_meta($idUser, 'user_nombre', true).' '. get_user_meta($idUser, 'user_apellido', true);
    $to = $emailUser;
    $subject = 'Gatorade - Reto cumplido';
    $body .= '<style type="text/css">@font-face {font-family: "Gatorade black";src: url('.FONTSURL.'Gatorade-Black.eot);} @font-face {font-family: "Gatorade medium";src: url('.FONTSURL.'Gatorade-Black.eot);}</style>';
    $body .= '<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">';
    $body .= '<tr>';
    $body .= '<td style="padding:26px;" colspan="3">';
    $body .= '<a href="'.home_url().'">';
    $body .= '<img src="'.IMGURL.'desktop/header/logo_black.png" style="width:66px;margin:0 auto;display:block;"/>';
    $body .= '</a>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr>';
    $body .= '<td colspan="3">';
    $body .= '<img src="'.$imagen.'" style="width:100%;margin:0 auto;display:block;"/>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr>';
    $body .= '<td style="text-align:center" colspan="3">';
    $body .= '<h3 style="color:#FF8901;text-align:center;font-size:28px;font-family:Gatorade,Rockwell,Georgia,serif;text-transform:uppercase;">Hola '.$nameUser.',</h3>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr>';
    $body .= '<td colspan="3">';
    $body .= '<div style="width:60px;background:#FF8901;height:1px;margin:0 auto;"></div>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr>';
    $body .= '<td style="text-align:center" colspan="3">';
    $body .= '<p style="color:black;text-align:center;font-size:18px;padding:8px 40px 20px;font-family:Gatorade,Rockwell,Georgia,serif;">'.$mensaje.'</p>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr>';
    $body .= '<td style="text-align:center" colspan="3">';
    $body .= '<a style="background:black;color:white;text-align:center;font-size:17px;padding:12px 20px 10px;text-decoration:none;font-family:Gatorade,Rockwell,Georgia,serif;" href="'.home_url().'">DESCUBRE MÁS AQUÍ</a>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr>';
    $body .= '<td style="padding:26px;" colspan="3">';
    $body .= '<br>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr style="background:#000000;">';
    $body .= '<td style="text-align:center;padding:10px 6px;" width="33%" colspan="1">';
    $body .= '<a href="'.network_site_url().'wp-content/media/2021/06/Términos-de-Uso.pdf" style="color:#FF8901;text-align:center;font-size:10px;padding:12px 20px 14px;text-decoration:none;font-family:Gatorade,Rockwell,Georgia,serif;">TERMINOS Y CONDICIONES</a>';
    $body .= '</td>';
    $body .= '<td style="text-align:center;padding:10px 6px;" width="33%" colspan="1">';
    $body .= '<a href="'.network_site_url().'wp-content/media/2021/06/Política-de-privacidad.pdf" style="color:#FF8901;text-align:center;font-size:10px;padding:12px 20px 14px;text-decoration:none;font-family:Gatorade,Rockwell,Georgia,serif;">POLÍTICAS DE PRIVACIDAD</a>';
    $body .= '</td>';
    $body .= '<td style="text-align:center;padding:10px 6px;" width="33%" colspan="1">';
    $body .= '<a href="#" style="color:#FF8901;text-align:center;font-size:10px;padding:12px 20px 14px;text-decoration:none;font-family:Gatorade,Rockwell,Georgia,serif;">CANCELAR SUSCRIPCIÓN</a>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '<tr style="background:#000000;">';
    $body .= '<td style="padding:0px 16px 17px;" colspan="3">';
    $body .= '<a href="'.home_url().'">';
    $body .= '<img src="'.IMGURL.'desktop/Logo.png" style="width:33px;margin:0 auto;display:block;"/>';
    $body .= '</a>';
    $body .= '</td>';
    $body .= '</tr>';
    $body .= '</table>';

    
    $headers = array('Content-Type: text/html; charset=UTF-8');
    //Enviando el correo
    wp_mail( $to, $subject, $body, $headers );
                                    
                                    
    $new_points = get_user_meta($idUser, 'gpoints', true);
    $new_points = $new_points + $puntos;
    update_user_meta($idUser, 'gpoints', $new_points);
    update_user_meta($idUser, $nombre_reto, 1);
}


/*CREAR DEPORTES POR DEFECTO 2*/ 
add_action('init', 'crear_deportes_defecto');
function crear_deportes_defecto(){
    global $blog_id;

    if ($blog_id == 1) {
        $deportes_default = ["Alpinismo","Atletismo","Bádminton","Baloncesto","Balonmano","Béisbol","Boxeo","Carreras de fondos o medios fondos","Ciclismo","Fitness","Fútbol","Fútbol Americano","Gimnasia Aeróbica","Gimnasia Artística","Golf","Hockey","Karate","Lucha Libre","Montañismo","Natación","Patinaje","Rugby","Running","Sóftbol","Squash","Tenis","Triatlón","Voleibol"];
        $cont = 0;
        foreach($deportes_default as $deporte){
            $termid = term_exists($deporte, 'deportesTarjetas');
            // var_dump($termid['term_id']);
            if ( $termid['term_id'] != null) {
                if(get_term_meta($termid['term_id'], 'id_deporte', true) == ''){
                    update_term_meta($termid['term_id'], 'id_deporte', $cont++);
                }
            }
            else {
                $new_term = wp_insert_term($deporte, 'deportesTarjetas');
                update_term_meta($new_term['term_id'], 'id_deporte', $cont++);
            }
        }
    }
}

//Generar visual para exportar
add_action('admin_head-edit.php','addCustomExportButton');
function addCustomExportButton()
{
    global $current_screen;

    // Not our post type, exit earlier
    // You can remove this if condition if you don't have any specific post type to restrict to. 
    $current_post_type = $current_screen->post_type;
    if ('registros_evento' != $current_screen->post_type) {
        return;
    }
    
    
    $args_eve = array(
        'post_type' => 'eventos',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    );
    $eventos = get_posts($args_eve);
    ?>
        <script type="text/javascript">
            jQuery(document).ready( function($)
            {
                jQuery(jQuery(".wp-header-end")[0]).before('<div style="background: #ffd5c1;padding: 10px;margin:20px 0;"><h2 class="wp-heading-inline" style="margin-top:0px;padding:0;padding-right:20px;display:inline-block;color:#fa5001;margin-bottom:0px;">Generar reporte</h2><p style="margin: 3px 0px;font-size:11p;">*Los campos de fecha son opcionales</p><div style="display:flex;align-items:center;"><form id="export"><label for="" style="margin-right:10px;"><b>Evento:</b></label><select id="nom_evento" style="margin-right:12px;" required></select><label for="" style="margin-right:10px;"><b>Fecha inicio:</b></label><input type="date" id="date_init" name="date_init">&nbsp;&nbsp;<label for="" style="margin-right:10px;"><b>Fecha final:</b></label><input type="date" id="date_end" name="date_end">&nbsp;&nbsp; <button class="button action" type="submit">Descargar reporte</button></form></div></div>');
                jQuery(document).on('submit','#export',function(event){
                    event.preventDefault();
                   var date_init = jQuery('#date_init').val();
                   var date_end = jQuery('#date_end').val();
                   var nom_evento = jQuery('#nom_evento').val();
                   jQuery.ajax({
                        type: "post",
                        url: MyAjax.url,
                        data: {
                        action: "exportar_reporte",
                        date_init: date_init,
                        date_end: date_end,
                        nom_evento: nom_evento,
                        },
                        beforeSend: function() {
                        console.log('before');
                        },
                        error: function(response) {
                        console.log(response);
                        },
                        success: function(response) {
                            window.open(response, '_blank');
                        }
                    });
                });
            });
        </script>
    <?php
    
    foreach($eventos as $evento) {
    ?>
    <script>
        jQuery(document).ready( function($)
        {
            jQuery('#nom_evento').append('<option value="<?php echo $evento->post_title; ?>"><?php echo $evento->post_title; ?></option>');
        });
    </script>
    <?php
    }   
}


?>
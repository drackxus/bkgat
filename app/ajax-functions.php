<?php

/***
 * @Descripcion: ajax-functions.php
 * Contiene las diferentes funciones de ajax
 *
 * Estas funciones ajax son utilizadoas tanto en el front-end como en el back-end
 *
 *
 ***/

/*
|-------------------------------------------------------------------------------
| SALESFORCE
|-------------------------------------------------------------------------------
*/


function getSalesforceToken(){
	$api_endpoint = 'https://mcmqczd118jdz8xqdfsbxdwh96f0.auth.marketingcloudapis.com/v2/token';
	$api_args = array(
		'method'  => 'POST',
		'Content-Type' => 'application/json',
		'timeout'=> 0,
		'body' => array(
            'grant_type' => SALESFORCE_GRANT_TYPE,
            'client_id' => SALESFORCE_CLIENT_ID,
            'client_secret' => SALESFORCE_CLIENT_SECRET,
            'account_id' => SALESFORCE_ACCOUNT_ID,
        ),
	);
	$response = wp_remote_post( $api_endpoint, $api_args );

	$responseString = wp_remote_retrieve_body( $response );
	$r = json_decode($responseString);
	return $r->access_token;
	
}

function saveUserInSalesforce(
		$token, 
		$id, 
		$email,
		$path,
		$first_name, 
		$last_name, 
		$email_consent, 
		$wa_consent, 
		$phone, 
		$date_registered,
		$user_favorite_sport
	){
	$api_endpoint = 'https://mcmqczd118jdz8xqdfsbxdwh96f0.rest.marketingcloudapis.com/interaction/v1/events';
	$body = array(
	'ContactKey' => $email,
	'EventDefinitionKey' =>  SALESFORCE_EVENT_DEFINITION_KEY,
	'Data' => array(
		"id"=> $id,
		"user_email"=> $email,
		"path"=> $path,
		"user_first_name"=> $first_name,
		"user_last_name"=> $last_name,
		"email_consent"=> $email_consent,
		"wa_consent"=> $wa_consent,
		"user_phone"=> $phone,
		"user_registered"=> $date_registered,
		"user_favorite_sport"=> $user_favorite_sport
	)
	);
	$api_args = array(
		'method'  => 'POST',
		'headers' => array(
		'Content-Type' => 'application/json',
		'Authorization' => 'Bearer '. $token,
		),
		'body' => json_encode($body),
		'timeout'=> 30,
		
	);
	$response = wp_remote_post( $api_endpoint, $api_args );
	$responseString = wp_remote_retrieve_body( $response );
	$r = json_decode($responseString);
	if($r->eventInstanceId){
		return $r->eventInstanceId;
	}else{
		return '';
	}
}

function saveEventsNewInSalesforce($events){
    // echo json_encode($events);
	$token = getSalesforceToken();
	$api_endpoint = 'https://mcmqczd118jdz8xqdfsbxdwh96f0.rest.marketingcloudapis.com/messaging/v1/messageDefinitionSends/key:1422/send';
	$api_args = array(
		'method'  => 'POST',
		'headers' => array(
		'Content-Type' => 'application/json',
		'Authorization' => 'Bearer '. $token,
		),
		'body' => json_encode($events),
		'timeout'=> 0,
		
	);
	$response = wp_remote_post( $api_endpoint, $api_args );

	$responseString = wp_remote_retrieve_body( $response );
	
	$r = json_decode($responseString);

    return $r->requestId;
}

//Guardar eventos en salesforce
function saveEventsInSalesforce($events){
	$token = getSalesforceToken();
	$api_endpoint = 'https://mcmqczd118jdz8xqdfsbxdwh96f0.rest.marketingcloudapis.com/data/v1/async/dataextensions/key:'.SALESFORCE_KEY_WEB_SITE;
	$body = array(
		'items' => $events
	);
	$api_args = array(
		'method'  => 'POST',
		'headers' => array(
		'Content-Type' => 'application/json',
		'Authorization' => 'Bearer '. $token,
		),
		'body' => json_encode($body),
		'timeout'=> 0,
		
	);
	$response = wp_remote_post( $api_endpoint, $api_args );

	$responseString = wp_remote_retrieve_body( $response );
	
	$r = json_decode($responseString);
	
	if($r->requestId){
		return $r->requestId;
	}else{
		return '';
	}
}

function saveEventFiveSalesforce($data_five){
	$token = getSalesforceToken();
	$api_endpoint = 'https://mcmqczd118jdz8xqdfsbxdwh96f0.rest.marketingcloudapis.com/data/v1/async/dataextensions/key:5v5UserData_2022/rows';
	$api_args = array(
		'method'  => 'PUT',
		'headers' => array(
		'Content-Type' => 'application/json',
		'Authorization' => 'Bearer '. $token,
		),
		'body' => json_encode($data_five),
		'timeout'=> 0,
	);
	$response = wp_remote_post( $api_endpoint, $api_args );
	$responseString = wp_remote_retrieve_body( $response );
	$r = json_decode($responseString);
    return $r->requestId;
}

function testEventFiveSalesforce($correo){
	$token = getSalesforceToken();
	$api_endpoint = 'https://mcmqczd118jdz8xqdfsbxdwh96f0.rest.marketingcloudapis.com/data/v1/customobjectdata/key/5v5UserData_2022/rowset?$filter=user_email%20eq%20%27'.$correo.'%27';
	$api_args = array(
		'method'  => 'GET',
		'headers' => array(
		'Content-Type' => 'application/json',
		'Authorization' => 'Bearer '. $token,
		),
		'body' => '',
		'timeout'=> 0,
	);
	$response = wp_remote_post( $api_endpoint, $api_args );
	$responseString = wp_remote_retrieve_body( $response );
	$r = json_decode($responseString);
    return $r;
}




/*
|-------------------------------------------------------------------------------
| Function Ajax para restablecer pass
|-------------------------------------------------------------------------------
*/


function restablecer_pass()
{

    $user_login  = isset($_POST['user_login']) ? $_POST['user_login'] : false;
    $user_login = sanitize_text_field($_POST['user_login']);

    $user_retrieve = retrieve_password($user_login);

    if (is_wp_error($user_retrieve)) {
        echo $user_retrieve->get_error_message();
        wp_die();
    } else {
        echo '1';
        wp_die();
    }
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_restablecer_pass', 'restablecer_pass');

// Hook para usuarios logueados
add_action('wp_ajax_restablecer_pass', 'restablecer_pass');


/*
|-------------------------------------------------------------------------------
| Function Ajax para loguear usuario
|-------------------------------------------------------------------------------
*/


function login_user()
{

    if (wp_verify_nonce($_POST['login_user_nonce'], 'login_user')) {

        $user_login  = isset($_POST['user_login']) ? $_POST['user_login'] : false;
        $user_login = sanitize_text_field($_POST['user_login']);

        $user_pass  = isset($_POST['user_pass']) ? $_POST['user_pass'] : false;
        $user_pass = sanitize_text_field($_POST['user_pass']);

        $creds = array();
        $creds['user_login'] = $user_login;
        $creds['user_password'] = $user_pass;
        $creds['remember'] = true;

        $user = wp_signon($creds, false);

        if (is_wp_error($user)) {
            echo $user->get_error_message();
            wp_die();
        } else {
            echo '1';
            wp_die();
        }
    } else {
        wp_die("Error - Verificación nonce no válida ✋");
    }
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_login_user', 'login_user');

// Hook para usuarios logueados
add_action('wp_ajax_login_user', 'login_user');



/*
|-------------------------------------------------------------------------------
| Function Ajax para formulario de contacto
|-------------------------------------------------------------------------------
*/


function contact()
{

    $nombre  = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $nombre = sanitize_text_field($_POST['nombre']);

    $email  = isset($_POST['email']) ? $_POST['email'] : false;
    $email = sanitize_text_field($_POST['email']);

    $pais  = isset($_POST['pais']) ? $_POST['pais'] : false;
    $pais = sanitize_text_field($_POST['pais']);

    $asunto  = isset($_POST['asunto']) ? $_POST['asunto'] : false;
    $asunto = sanitize_text_field($_POST['asunto']);

    $mensaje  = isset($_POST['mensaje']) ? $_POST['mensaje'] : false;
    $mensaje = sanitize_text_field($_POST['mensaje']);

    $user = get_user_by('id', $user_id);
    $new = array(
        'post_title' => $nombre . ' - ' . $email,
        'post_type' => 'contactos',
        'post_status' => 'publish',
        'post_content' => '<h3>Nombre: ' . $nombre . '</h3><h3>Email: ' . $email . '</h3><h3>Pais: ' . $pais . '</h3><h3>Asunto: ' . $asunto . '</h3><h3>Mensaje: ' . $mensaje . '</h3>'
    );

    $post_id = wp_insert_post($new);

    if ($post_id) {
        echo 'Gracias por escribirnos. Pronto te contactáremos';
        wp_die();
    } else {
        echo 'Ha ocurrido un error';
        wp_die();
    }
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_contact', 'contact');

// Hook para usuarios logueados
add_action('wp_ajax_contact', 'contact');




/*
|-------------------------------------------------------------------------------
| Function Ajax registrar usuario
|-------------------------------------------------------------------------------
*/


//Hook para usuarios no logueados
add_action('wp_ajax_nopriv_register', 'register');

// Hook para usuarios logueados
add_action('wp_ajax_register', 'register');

global $current_user;

// Función que procesa la llamada AJAX
function register()
{
    // Check parameters
    $nombre  = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellido  = isset($_POST['apellido']) ? $_POST['apellido'] : false;
    $email  = isset($_POST['email']) ? $_POST['email'] : false;
    $pais  = isset($_POST['pais']) ? $_POST['pais'] : false;
    $celular  = isset($_POST['celular']) ? $_POST['celular'] : false;
    $deporte  = isset($_POST['deporte']) ? $_POST['deporte'] : false;
    $tratamiento_datos  = isset($_POST['tratamiento_datos']) ? $_POST['tratamiento_datos'] : false;
    $politicas_privacidad  = isset($_POST['politicas_privacidad']) ? $_POST['politicas_privacidad'] : false;
    $terminos_condiciones  = isset($_POST['terminos_condiciones']) ? $_POST['terminos_condiciones'] : false;


    $nombre = sanitize_text_field($_POST['nombre']);
    $apellido = sanitize_text_field($_POST['apellido']);
    $email = sanitize_email($_POST['email']);
    $pais = sanitize_text_field($_POST['pais']);
    $celular = sanitize_text_field($_POST['celular']);
    $deporte = sanitize_text_field($_POST['deporte']);
    $tratamiento_datos = sanitize_text_field($_POST['tratamiento_datos']);
    $politicas_privacidad = sanitize_text_field($_POST['politicas_privacidad']);
    $terminos_condiciones = sanitize_text_field($_POST['terminos_condiciones']);

    if ($terminos_condiciones == 'TRUE') {
        $email_consent = 'TRUE';
        $whatsapp = 'TRUE';
    }

    $password = wp_generate_password();

    $userdata = array(
        'user_login' => $email,
        'user_email' => $email,
        'user_pass' => $password
    );

    $user_id = wp_insert_user($userdata);

    //Si todo ha ido bien, agregamos los campos adicionales
    if (!is_wp_error($user_id)) {
        update_user_meta($user_id, 'user_nombre', $nombre);
        update_user_meta($user_id, 'user_apellido', $apellido);
        update_user_meta($user_id, 'user_pais', $pais);
        update_user_meta($user_id, 'user_celular', $celular);
        update_user_meta($user_id, 'user_deporte', $deporte);
        update_user_meta($user_id, 'tratamiento_datos', $tratamiento_datos);
        update_user_meta($user_id, 'politicas_privacidad', $politicas_privacidad);
        update_user_meta($user_id, 'terminos_condiciones', $terminos_condiciones);
        update_user_meta($user_id, 'gpoints', 0);
        update_user_meta($user_id, 'retos_contenido', []);
        update_user_meta($user_id, 'retos_campana', []);

        $deporte_el = get_user_meta($user_id, 'user_deporte', true);
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
        $args       = array('hide_empty' => false);
        $terms      = get_terms($taxonomies, $args );
        
        foreach($terms as $term) {
            if($term->name == $deporte_el) {
                $deporteid = $term->term_id;
                $deporte_id = get_term_meta($deporteid, 'id_deporte', true);
            }
        }    
        restore_current_blog();
        $date_registered = gmdate("Y-m-d\TH:i:s\Z");

        //salesforce
        $token = getSalesforceToken();
 		$saveToSalesforce = saveUserInSalesforce(
 			$token, 
 			$user_id, 
 			$email,
 			$pais, 
 			$nombre, 
 			$apellido, 
 			$email_consent, 
 			$whatsapp, 
 			$celular, 
 			$date_registered,
 			$deporte_id
 		);
 		if($saveToSalesforce != ''){
			update_user_meta($user_id, 'send_to_salesforce', true);
 		}

        wp_new_user_notification($user_id, 'both');

        echo '1';

        wp_die();
    } else {
        echo $user_id->get_error_message();
        wp_die();
    }
}


/*
|-------------------------------------------------------------------------------
| Function Ajax actualizar perfil
|-------------------------------------------------------------------------------
*/


// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_array_deportes', 'array_deportes');

// Hook para usuarios logueados
add_action('wp_ajax_array_deportes', 'array_deportes');

global $current_user;

// Función que procesa la llamada AJAX
function array_deportes()
{
    // Check parameters
    $array_deportes = isset($_POST['array_deportes']) ? $_POST['array_deportes'] : false;
    $user  = isset($_POST['user']) ? $_POST['user'] : false;
    $idUser = $user;
    $emailUser = $current_user->user_email;
    $nameUser = get_user_meta($idUser, 'user_nombre', true) . ' ' . get_user_meta($idUser, 'user_apellido', true);

    if (!$user) {
        echo '0';
    } else {
        update_user_meta($user, 'array_deportes', $array_deportes);

        //Reto editar deportes
        if (get_user_meta($user, 'editar_deportes', true) == '1') {
            echo '1';
        } else {
            update_user_meta($user, 'editar_deportes', 1);
            $mensaje = get_option('mensaje_editar_deportes');
            $titulo_medalla = get_option('titulo_medalla_editar_deportes');
            $video_medalla = get_option('video_medalla_editar_deportes');
            $imagen_correo = get_option('imagen_correo_editar_deportes');
            $puntos = get_option('puntos_editar_deportes');
            $nombre_reto = 'editar_deportes';

            if (get_option('estado_editar_deportes') != 'pausado') {
                mostrarPopupEmail($mensaje, $titulo_medalla, $video_medalla, $imagen_correo, $puntos, $idUser, $nombre_reto, $emailUser, $nameUser);
                echo '2';
            }
        }
    }
    wp_die();
}



/*
|-------------------------------------------------------------------------------
| Function Ajax para traer mas tarjetas movil
|-------------------------------------------------------------------------------
*/

function more_post_ajax()
{
    global $current_user;
    wp_get_current_user();
    if (is_user_logged_in()) {
        $loginUser = "true";
        $nameUser = $current_user->user_login;
        $idUser = $current_user->ID;
    } else {
        $loginUser = false;
    }
    global $post;
    $offset = $_POST["offset"];
    $ppp = $_POST["ppp"];
    header("Content-Type: text/html");
    $current_page = get_query_var('paged');
    $args = array(
        'post_type' => 'tarjetas',
        'post_status' => 'publish',
        'posts_per_page' => $ppp,
        // 'cat' => 1,
        'offset' => $offset,
        'orderby' => 'rand',
        'paged' => $current_page,
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post(); ?>
            <?php
            // get_header();
            global $current_user;
            wp_get_current_user();
            if (is_user_logged_in()) {
                $loginUser = "true";
                $nameUser = $current_user->user_login;
                $idUser = $current_user->ID;
            } else {
                $loginUser = false;
            }

            get_template_part('template-parts/cards/cards');

        endwhile;
    else :
        echo '0';
    endif;
    wp_die();
}
add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');



/*
|-------------------------------------------------------------------------------
| Function Ajax para traer mas tarjetas desktop
|-------------------------------------------------------------------------------
*/

function more_post_home()
{
    global $current_user;
    wp_get_current_user();
    if (is_user_logged_in()) {
        $loginUser = "true";
        $nameUser = $current_user->user_login;
        $idUser = $current_user->ID;
    } else {
        $loginUser = false;
    }
    global $post;
    $offset = $_POST["offset"];
    $ppp = $_POST["ppp"];
    header("Content-Type: text/html");
    $args = array(
        'post_type' => 'tarjetas',
        'post_status' => 'publish',
        'posts_per_page' => $ppp,
        'offset' => $offset,
        'orderby' => 'rand',
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();
            if (get_post_meta($post->ID, 'tipo_tarjeta', true) == 'normal') {
                get_template_part('template-parts/desktop/cards');
            } else if (get_post_meta($post->ID, 'tipo_tarjeta', true) == 'encuesta') {
                $id_encuesta = get_post_meta($post->ID, 'encuesta_elegida', true);
                $encuesta_resul = get_post_meta($id_encuesta, 'resultados', true);
                if (empty($encuesta_resul)) {
                    // print_r('vacia');
                    $resultados = [];
                    update_post_meta($id_encuesta, 'resultados', $resultados);
                    get_template_part('template-parts/desktop/cards');
                } else {
                    // print_r('no vacia');
                    for ($i = 0; $i < count($encuesta_resul); ++$i) {
                        if ($encuesta_resul[$i]->user == $current_user->ID) {
                            //Ya ha respondido la encuesta
                        } else {
                            get_template_part('template-parts/desktop/cards');
                        }
                    }
                }
            }

        endwhile;
    else :
        echo '0';
    endif;
    wp_die();
}
add_action('wp_ajax_nopriv_more_post_home', 'more_post_home');
add_action('wp_ajax_more_post_home', 'more_post_home');



/*
|-------------------------------------------------------------------------------
| Function Ajax para traer mas tarjetas desktop
|-------------------------------------------------------------------------------
*/

function more_post_test()
{
    global $current_user;
    wp_get_current_user();
    if (is_user_logged_in()) {
        $loginUser = "true";
        $nameUser = $current_user->user_login;
        $idUser = $current_user->ID;
    } else {
        $loginUser = false;
    }
    global $post;
    header("Content-Type: text/html");
    $args = array(
        'post_type' => array('tarjetas', 'retos'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );
    $loop = get_posts($args);
    echo json_encode($loop);
    wp_die();
}
add_action('wp_ajax_nopriv_more_post_test', 'more_post_test');
add_action('wp_ajax_more_post_test', 'more_post_test');






/*
|-------------------------------------------------------------------------------
| Function Ajax obtener detalle de tarjeta home
|-------------------------------------------------------------------------------
*/


// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_get_detail', 'get_detail');

// Hook para usuarios logueados
add_action('wp_ajax_get_detail', 'get_detail');

global $current_user;

// Función que procesa la llamada AJAX
function get_detail()
{
    // Check parameters
    $postId = isset($_POST['postId']) ? $_POST['postId'] : false;
    if (!$postId) {
        echo 'Ha ocurrido un error';
    } else {
        $content = get_post_field('post_content', $postId);
        $title =  get_the_title($postId);
        $id_youtube = get_post_meta($postId, "id_youtube", true);
        $imagen_alterna = get_post_meta($postId, "imagen_alterna", true);
        if ($id_youtube) {
            $contenido .= '<iframe width="100%" height="315" src="https://www.youtube.com/embed/' . $id_youtube . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        } elseif ($imagen_alterna) {
            $contenido .= '<img src="' . $imagen_alterna . '" style="width:100%;">';
        }
        $contenido .= '<h1>' . $title . '</h1>';
        $contenido .= $content;
        echo $contenido;
    }
    wp_die();
}




/*
|-------------------------------------------------------------------------------
| Function Ajax para buscar contenido gatorade
|-------------------------------------------------------------------------------
*/


add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
function data_fetch()
{

    $the_query = new WP_Query(array('posts_per_page' => -1, 's' => esc_attr($_POST['keyword']), 'post_type' => 'tarjetas'));
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <h3><a href="<?php echo esc_url(post_permalink()); ?>"><?php the_title(); ?></a></h3>

        <?php endwhile;
        wp_reset_postdata();
    else :
        ?>
        <h5>No se encontraron resultados</h5>
        <?php
    endif;

    die();
}


/*
|-------------------------------------------------------------------------------
| Function Ajax para buscar eventos
|-------------------------------------------------------------------------------
*/


add_action('wp_ajax_data_eve', 'data_eve');
add_action('wp_ajax_nopriv_data_eve', 'data_eve');
function data_eve()
{

    $the_query = new WP_Query(array('posts_per_page' => -1, 's' => esc_attr($_POST['keyword']), 'post_type' => 'eventos'));
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <h3><a href="<?php echo esc_url(post_permalink()); ?>"><?php the_title(); ?></a></h3>

        <?php endwhile;
        wp_reset_postdata();
    endif;

    die();
}
/*
|-------------------------------------------------------------------------------
| Function Ajax para buscador general
|-------------------------------------------------------------------------------
*/


add_action('wp_ajax_data_busc', 'data_busc');
add_action('wp_ajax_nopriv_data_busc', 'data_busc');
function data_busc()
{

    $the_query = new WP_Query(array('posts_per_page' => -1, 's' => esc_attr($_POST['keyword']), 'post_type' => array('tarjetas', 'productos', 'eventos', 'retos')));
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php
            $postType = get_post_type(get_the_ID());
            ?>

            <?php
            if ($postType == 'productos') {
            ?>
                <style>
                    .search_img {
                        background-color: black;
                        width: 100%;
                        margin-top: 15px;
                    }
                </style>
            <?php
            }
            ?>
            <style>

            </style>
            <a href="<?php echo get_permalink($post->ID); ?>" class="res_taxonomy">
                <?php
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                $image_title = get_the_title(get_post_thumbnail_id($post->ID));
                ?>
                <img loading="lazy" src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>" />
                <div class="tit_subcategory">
                    <h2 class="content_cont_h3 bottom_line pad topics_el_tit"><?php echo the_title(); ?></h2>
                    <div class="content_cont_h3_line"></div>
                </div>
            </a>

        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <style>
            .content_cont.bg_content {
                background: black;
                background-image: url(https://g1.tars.dev/wp-content/media/2021/03/404.png);
                background-position: 100% 100%;
                background-size: 100%;
                background-repeat: repeat-y;
            }

            .content_cont_p {
                display: none;
            }

            .content_cont_h1_line {
                display: none;
            }

            .sin_resultados {
                text-align: left;
                font-family: 'Gatorade black', sans-serif;
                line-height: 25px;
                font-size: 28px;
                letter-spacing: 0px;
                color: #FF851A;
                text-transform: uppercase;
                opacity: 1;
                margin-bottom: -20px;
            }

            .contenedor_resultado {
                padding-top: 183px;
                margin-left: 120px;
            }

            .result_no {
                text-align: left;
                font-family: 'Gatorade', sans-serif;
                font-size: 18px;
                color: #FFFFFF;
            }

            .search_img {
                background-color: transparent;
            }
        </style>
        <div class="contenedor_resultado">
            <p class="sin_resultados">
                <b> OOPS NO ENCONTRAMOS RESULTADOS</b>
            </p>
            <p class="result_no">
                Pero no pierdas el impulso sigue recargándote con <b> todos nuestros contenidos. </b>
            </p>
        </div>
        <?php
    endif;

    die();
}

/*
|-------------------------------------------------------------------------------
| Function Ajax para buscar retos
|-------------------------------------------------------------------------------
*/


add_action('wp_ajax_data_ret', 'data_ret');
add_action('wp_ajax_nopriv_data_ret', 'data_ret');
function data_ret()
{

    $the_query = new WP_Query(array('posts_per_page' => -1, 's' => esc_attr($_POST['keyword']), 'post_type' => 'retos'));
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <h3><a href="<?php echo esc_url(post_permalink()); ?>"><?php the_title(); ?></a></h3>

        <?php endwhile;
        wp_reset_postdata();
    endif;

    die();
}


/*
|-------------------------------------------------------------------------------
| Function Ajax para buscar promociones
|-------------------------------------------------------------------------------
*/


add_action('wp_ajax_data_pro', 'data_pro');
add_action('wp_ajax_nopriv_data_pro', 'data_pro');
function data_pro()
{

    $the_query = new WP_Query(array('posts_per_page' => -1, 's' => esc_attr($_POST['keyword']), 'post_type' => 'promociones'));
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <h3><a href="<?php echo esc_url(post_permalink()); ?>"><?php the_title(); ?></a></h3>

<?php endwhile;
        wp_reset_postdata();
    endif;

    die();
}


/*
|-------------------------------------------------------------------------------
| Function Ajax para agregar tarjetas a favoritos
|-------------------------------------------------------------------------------
*/


function user_favorites()
{

    $user  = isset($_POST['user']) ? $_POST['user'] : false;
    $user = sanitize_text_field($_POST['user']);

    $post  = isset($_POST['post']) ? $_POST['post'] : false;
    $post = sanitize_text_field($_POST['post']);
    $favoritos = get_user_meta($user, 'favorite_post_id', true);
    $favoritos_lista = explode(",", $favoritos);

    $idUser = $user;
    $emailUser = $current_user->user_email;
    $nameUser = get_user_meta($idUser, 'user_nombre', true) . ' ' . get_user_meta($idUser, 'user_apellido', true);

    for ($i = 0; $i < count($favoritos_lista); $i++) {
        if ($favoritos_lista[$i] == $post) {
            echo '3';
            wp_die();
        }
    }

    $newPost = $favoritos . ',' . $post;
    if (!$user) {
        echo '0';
        wp_die();
    }
    if (!isset($post)) {
        echo '2';
        wp_die();
    } else {

        //Si todo ha ido bien, agregamos los campos adicionales
        update_user_meta($user, 'favorite_post_id', $newPost);
        //Reto favorito al primer contenido

        if (get_user_meta($user, 'favorito_contenido', true) == '1') {
            echo '1';
        } else {
            update_user_meta($user, 'favorito_contenido', 1);
            $mensaje = get_option('mensaje_favorito_contenido');
            $titulo_medalla = get_option('titulo_medalla_favorito_contenido');
            $video_medalla = get_option('video_medalla_favorito_contenido');
            $imagen_correo = get_option('imagen_correo_favorito_contenido');
            $puntos = get_option('puntos_favorito_contenido');
            $nombre_reto = 'favorito_contenido';

            if (get_option('estado_favorito_contenido') != 'pausado') {
                mostrarPopupEmail($mensaje, $titulo_medalla, $video_medalla, $imagen_correo, $puntos, $idUser, $nombre_reto, $emailUser, $nameUser);
                echo '4';
            }
        }

        wp_die();
    }
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_user_favorites', 'user_favorites');

// Hook para usuarios logueados
add_action('wp_ajax_user_favorites', 'user_favorites');


/*
|-------------------------------------------------------------------------------
| Function Ajax para guardar encuesta
|-------------------------------------------------------------------------------
*/


function guardar_encuesta()
{

    $userId  = isset($_POST['userId']) ? $_POST['userId'] : false;
    $userId = sanitize_text_field($_POST['userId']);

    $encuestaId  = isset($_POST['encuestaId']) ? $_POST['encuestaId'] : false;
    $encuestaId = sanitize_text_field($_POST['encuestaId']);

    $opciones1  = isset($_POST['opciones1']) ? $_POST['opciones1'] : false;
    $opciones1 = sanitize_text_field($_POST['opciones1']);

    $opciones2  = isset($_POST['opciones2']) ? $_POST['opciones2'] : false;
    $opciones2 = sanitize_text_field($_POST['opciones2']);

    $resultados = get_user_meta($userId, 'encuestas', true);

    $idUser = $userId;
    $emailUser = $current_user->user_email;
    $nameUser = get_user_meta($userId, 'user_nombre', true) . ' ' . get_user_meta($userId, 'user_apellido', true);

    if (is_array($resultados)) {
    } else {
        $resultados = [];
        update_user_meta($userId, 'encuestas', json_encode($resultados));
    }

    if (!$userId || !$encuestaId) {
        echo '0';
        wp_die();
    } else {

        array_push($resultados, array(
            'user' => $userId,
            'post' => $encuestaId,
            'opciones1' => $opciones1,
            'opciones2' => $opciones2
        ));

        //Si todo ha ido bien, agregamos los campos adicionales
        update_user_meta($userId, 'encuestas', json_encode($resultados));

        //Reto favorito al primer contenido
        if (get_user_meta($userId, 'llenar_encuesta', true) == '1') {
            echo '1';
        } else {
            update_user_meta($userId, 'llenar_encuesta', 1);
            $mensaje = get_option('mensaje_llenar_encuesta');
            $titulo_medalla = get_option('titulo_medalla_llenar_encuesta');
            $video_medalla = get_option('video_medalla_llenar_encuesta');
            $imagen_correo = get_option('imagen_correo_llenar_encuesta');
            $puntos = get_option('puntos_llenar_encuesta');
            $nombre_reto = 'llenar_encuesta';

            if (get_option('estado_llenar_encuesta') != 'pausado') {
                mostrarPopupEmail($mensaje, $titulo_medalla, $video_medalla, $imagen_correo, $puntos, $idUser, $nombre_reto, $emailUser, $nameUser);
                echo '3';
            }
        }
        wp_die();
    }
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_guardar_encuesta', 'guardar_encuesta');

// Hook para usuarios logueados
add_action('wp_ajax_guardar_encuesta', 'guardar_encuesta');



/*
|-------------------------------------------------------------------------------
| Function Ajax obtener deportes de usuario
|-------------------------------------------------------------------------------
*/


// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_get_deportes', 'get_deportes');

// Hook para usuarios logueados
add_action('wp_ajax_get_deportes', 'get_deportes');

global $current_user;

// Función que procesa la llamada AJAX
function get_deportes()
{


    // Check parameters
    $user  = isset($_POST['user']) ? $_POST['user'] : false;



    if (!$user) {
        echo 'Ha ocurrido un error';
    } else {
        $sel_dep = get_user_meta($user, 'array_deportes', true);
        // echo 'Datos actualizad
        $tt = json_encode($sel_dep);
        echo $tt;
    }
    wp_die();
}


/*
|-------------------------------------------------------------------------------
| Function Ajax para participar reto
|-------------------------------------------------------------------------------
*/


function participar_reto()
{

    $userId  = isset($_POST['userId']) ? $_POST['userId'] : false;
    $userId = sanitize_text_field($_POST['userId']);

    $idReto  = isset($_POST['idReto']) ? $_POST['idReto'] : false;
    $idReto = sanitize_text_field($_POST['idReto']);

    $tipoReto  = isset($_POST['tipoReto']) ? $_POST['tipoReto'] : false;
    $tipoReto = sanitize_text_field($_POST['tipoReto']);

    $estado_retos = get_post_meta($idReto, 'estado_retos', true);
    if ($estado_retos) {
    } else {
        $estado_retos = [];
    }

    if (!$userId || !$idReto || !$tipoReto) {
        echo 'Ha ocurrido un error';
        wp_die();
    } else {

        array_push($estado_retos, (object)[
            'user' => $userId,
            'post' => $idReto,
            'status' => 'pendiente',
        ]);

        //Si todo ha ido bien, agregamos los campos adicionales
        //if (!is_wp_error($user)) {
        update_post_meta($idReto, 'estado_retos', $estado_retos);
        $lista_estado_retos = get_post_meta($idReto, 'estado_retos', true);

        // echo 'Gracias por llenar la encuesta';
        echo $lista_estado_retos;
        wp_die();
        //}

    }
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_participar_reto', 'participar_reto');

// Hook para usuarios logueados
add_action('wp_ajax_participar_reto', 'participar_reto');




/*
|-------------------------------------------------------------------------------
| Function Ajax para guardar pais elegido
|-------------------------------------------------------------------------------
*/


function pais_elegido()
{

    $user  = isset($_POST['user']) ? $_POST['user'] : false;
    $user = sanitize_text_field($_POST['user']);

    $pais  = isset($_POST['pais']) ? $_POST['pais'] : false;
    $pais = sanitize_text_field($_POST['pais']);


    if (!$user || !$pais) {
        echo 'Ha ocurrido un error';
        wp_die();
    } else {
        update_user_meta($user, 'pais_elegido', $pais);
        $paisEl = get_user_meta($user, 'pais_elegido', true);
        echo $paisEl;
        wp_die();
    }
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_pais_elegido', 'pais_elegido');

// Hook para usuarios logueados
add_action('wp_ajax_pais_elegido', 'pais_elegido');




/*
|-------------------------------------------------------------------------------
| Function Ajax completar perfil al ingresar por redes sociales
|-------------------------------------------------------------------------------
*/


//Hook para usuarios no logueados
add_action('wp_ajax_nopriv_completar_perfil', 'completar_perfil');
// Hook para usuarios logueados
add_action('wp_ajax_completar_perfil', 'completar_perfil');

global $current_user;

// Función que procesa la llamada AJAX
function completar_perfil()
{

    // Check parameters
    $nombre  = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellido  = isset($_POST['apellido']) ? $_POST['apellido'] : false;
    $pais  = isset($_POST['pais']) ? $_POST['pais'] : false;
    $celular  = isset($_POST['celular']) ? $_POST['celular'] : false;
    $deporte  = isset($_POST['deporte']) ? $_POST['deporte'] : false;
    $tratamiento_datos  = isset($_POST['tratamiento_datos']) ? $_POST['tratamiento_datos'] : false;
    $politicas_privacidad  = isset($_POST['politicas_privacidad']) ? $_POST['politicas_privacidad'] : false;
    $terminos_condiciones  = isset($_POST['terminos_condiciones']) ? $_POST['terminos_condiciones'] : false;
    $user_id  = isset($_POST['user_id']) ? $_POST['user_id'] : false;

    $nombre = sanitize_text_field($_POST['nombre']);
    $apellido = sanitize_text_field($_POST['apellido']);
    $pais = sanitize_text_field($_POST['pais']);
    $celular = sanitize_text_field($_POST['celular']);
    $deporte = sanitize_text_field($_POST['deporte']);
    $tratamiento_datos = sanitize_text_field($_POST['tratamiento_datos']);
    $politicas_privacidad = sanitize_text_field($_POST['politicas_privacidad']);
    $terminos_condiciones = sanitize_text_field($_POST['terminos_condiciones']);
    $user_id = sanitize_text_field($_POST['user_id']);

    if ($terminos_condiciones == 'TRUE') {
        $email_consent = 'TRUE';
        $whatsapp = 'TRUE';
    }


    //Conexion a la base de datos para traer el email
    // include $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php';
    // $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    // mysqli_select_db($connection, 'wp_gato');
    // $userEmailQuery = "SELECT user_email FROM wp_users WHERE ID = $user_id;";
    // $userEmailQueryResult = mysqli_query($connection, $userEmailQuery);
    // $email = json_encode(mysqli_fetch_object($userEmailQueryResult)->user_email);


    $data_user = get_userdata($user_id);
    $email = $data_user->user_email;

    //Si todo ha ido bien, agregamos los campos adicionales
    if ($user_id) {
        update_user_meta($user_id, 'user_nombre', $nombre);
        update_user_meta($user_id, 'user_apellido', $apellido);
        update_user_meta($user_id, 'user_pais', $pais);
        update_user_meta($user_id, 'user_celular', $celular);
        update_user_meta($user_id, 'user_deporte', $deporte);
        update_user_meta($user_id, 'tratamiento_datos', $tratamiento_datos);
        update_user_meta($user_id, 'politicas_privacidad', $politicas_privacidad);
        update_user_meta($user_id, 'terminos_condiciones', $terminos_condiciones);
        update_user_meta($user_id, 'gpoints', 0);

        $deporte_el = get_user_meta($user_id, 'user_deporte', true);
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
        $args       = array('hide_empty' => false);
        $terms      = get_terms($taxonomies, $args );
        
        foreach($terms as $term) {
            if($term->name == $deporte_el) {
                $deporteid = $term->term_id;
                $deporte_id = get_term_meta($deporteid, 'id_deporte', true);
            }
        }    
        restore_current_blog();    
        
        

        $date_registered = gmdate("Y-m-d\TH:i:s\Z");

        //salesforce
        $token = getSalesforceToken();
		$saveToSalesforce = saveUserInSalesforce(
			$token, 
			$user_id, 
			$email,
			$pais, 
			$nombre, 
			$apellido, 
			$email_consent, 
			$whatsapp, 
			$celular, 
			$date_registered,
			$deporte_id
		);

		if($saveToSalesforce != ''){
			update_user_meta($user_id, 'send_to_salesforce', true);
		}


        echo '1';
        wp_die();
    } else {
        echo '0';
        wp_die();
    }
}



/*
|-------------------------------------------------------------------------------
| Function Ajax actualizar imagen de perfil
|-------------------------------------------------------------------------------
*/
add_action('wp_ajax_actualizar_avatar', 'actualizar_avatar');
add_action('wp_ajax_nopriv_actualizar_avatar', 'actualizar_avatar');
function actualizar_avatar()
{
    if (!function_exists('wp_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
    }

    $idUser  = isset($_POST['idUser']) ? $_POST['idUser'] : false;
    $idUser = sanitize_text_field($_POST['idUser']);
    $emailUser = $current_user->user_email;
    $nameUser = get_user_meta($idUser, 'user_nombre', true) . ' ' . get_user_meta($idUser, 'user_apellido', true);
    $uploadedfile = $_FILES['file'];
    $upload_overrides = array('test_form' => false);
    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
    if ($movefile && !isset($movefile['error'])) {
        update_user_meta($idUser, 'avatar', $movefile['url']);
        //Reto subir foto de perfil
        if (get_user_meta($idUser, 'foto_perfil', true) == '1') {
            echo '1';
        } else {
            update_user_meta($idUser, 'foto_perfil', 1);
            $mensaje = get_option('mensaje_foto_perfil');
            $titulo_medalla = get_option('titulo_medalla_foto_perfil');
            $video_medalla = get_option('video_medalla_foto_perfil');
            $imagen_correo = get_option('imagen_correo_foto_perfil');
            $puntos = get_option('puntos_foto_perfil');
            $nombre_reto = 'foto_perfil';

            if (get_option('estado_foto_perfil') != 'pausado') {
                mostrarPopupEmail($mensaje, $titulo_medalla, $video_medalla, $imagen_correo, $puntos, $idUser, $nombre_reto, $emailUser, $nameUser);
                echo get_user_meta($idUser, 'avatar', true);
            }
        }
    } else {
        echo '0';
    }


    die();
}


/*
|-------------------------------------------------------------------------------
| Function Ajax test reto
|-------------------------------------------------------------------------------
*/

add_action('wp_ajax_test_reto', 'test_reto');
add_action('wp_ajax_nopriv_test_reto', 'test_reto');
function test_reto()
{
    $idUser  = isset($_POST['user']) ? $_POST['user'] : false;
    $idUser = sanitize_text_field($_POST['user']);
    $idPost  = isset($_POST['post']) ? $_POST['post'] : false;
    $idPost = sanitize_text_field($_POST['post']);
    $retosTest = get_user_meta($idUser, 'retos_campana_json', true);
    //Consultamos los retos activos y que esten dentro de la fecha
    $meta_query[] = array(
        'key' => 'estado',
        'value' => 'activo',
        'compare' => '=',
        'type' => 'char'
    );
    //Obtenemos los retos
    $args = array(
        'post_type' => 'retos',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_query' => $meta_query
    );
    $lista_retos = get_posts($args);
    //Si hay retos
    if (count($lista_retos) > 0) {
        //Recorremos los retos
        foreach (get_posts($args) as $p) :
            $tipo_reto = get_post_meta($p->ID, 'tipo_retos', true);
            //Reto campaña    
            if ($tipo_reto == 'campana') {
                $dtz = new DateTimeZone("America/Bogota");
                $dt = new DateTime("now", $dtz);
                $actual = $dt->format("Y-m-d");
                $inicio = get_post_meta($p->ID, 'fecha_inicio', true);
                $fin = get_post_meta($p->ID, 'fecha_fin', true);
                $actual = date('Y-m-d');
                //Convertimos las fechas
                $iniciof = strtotime($inicio);
                $finf = strtotime($fin);
                $actualf = strtotime($actual);
                // Comparando las fechas
                if (($actualf >= $iniciof) && ($actualf <= $finf)) {
                    //Obtenemos los retos de contenido del usuario
                    $retos_campana = get_user_meta($idUser, 'retos_campana_json', true);
                    //Obtenemos la tags del reto
                    $etiquetas_sel = get_post_meta($p->ID, 'etiquetas_sel', true);
                    //Obtenemos las tags del post
                    $etiquetasTarjetas = wp_get_post_terms($idPost, 'etiquetasTarjetas');
                    // echo json_encode($etiquetas_sel);
                    //De string a array
                    $etiquetas_select = explode(",", $etiquetas_sel);
                    //Obtenemos los meta del reto
                    $tipo_reto = get_post_meta($p->ID, 'tipo_retos', true);
                    $etiquetas_sel = get_post_meta($p->ID, 'etiquetas_sel', true);
                    $numero_visualizar = get_post_meta($p->ID, 'numero_visualizar', true);
                    $mensaje = get_post_meta($p->ID, 'mensaje_premio', true);
                    $video = get_post_meta($p->ID, 'video_premio', true);
                    $puntos = get_post_meta($p->ID, 'puntos', true);
                    $imagen_correo = get_post_meta($p->ID, 'imagen_correo', true);
                    $numero_correo = get_post_meta($p->ID, 'numero_correo', true);
                    $mensaje_correo = get_post_meta($p->ID, 'mensaje_correo', true);
                    //Recorremos las tags del reto
                    foreach ($etiquetas_select as $etiq) {
                        //Validamos si el post tiene las tags del reto
                        if (array_search($etiq, array_column($etiquetasTarjetas, 'name')) !== false) {
                            $id = $p->ID;
                            $ret_camp = json_decode($retos_campana);
                            //Si hay retos en curso
                            if (count($ret_camp) > 0) {
                            }
                            else {
                                $registrar_reto = [];
                                $registrar_reto[$id]['idReto'] = $id;
                                $registrar_reto[$id]['estado'] = 'pendiente';
                                $registrar_reto[$id]['tipo'] = 'campana';
                                $registrar_reto[$id]['popup'] = 'false'; 
                                $registrar_reto[$id]['popup_visualizaciones'] = 'false'; 
                                $registrar_reto[$id]['email'] = 'false'; 
                                $registrar_reto[$id]['post'][] = $idPost; 
                                //crear registro con datos iniciales
                                update_user_meta( $idUser, 'retos_campana_json', json_encode($registrar_reto) );
                                $retos_campana = get_user_meta($idUser, 'retos_campana_json', true);
                                $ret_camp = json_decode($retos_campana);
                            }
                            //Recorremos los retos
                            foreach($ret_camp as $ret) {
                                //Si el reto es de tipo campaña
                                if ($ret->tipo == 'campana') {
                                    //Si el id del reto esta dentro del array de retos en curso
                                    if ($ret->idReto == $p->ID) {
                                        //Validando el estado del primer rango
                                        if ($ret->estado != 'completado') {
                                            //Si el id del post esta en el array de retos
                                            if (in_array($idPost, $ret->post)) {
                                                $ret->estado == "pendiente";
                                                update_user_meta($idUser, 'retos_campana_json', json_encode($ret_camp));
                                            } else {
                                                $ret->estado == "pendiente";
                                                $ret->post[] = $idPost;
                                                update_user_meta($idUser, 'retos_campana_json', json_encode($ret_camp));
                                            }
                                            //Variable para saber que popup mostrar
                                            $popup = [];
                                            $popup[0]['popup'] = 'vacio';
                                            //Si no es vacio el rango
                                            if ($numero_correo != '') {
                                                //Si el numero de elementos a visualizar y el numero de elementos visualizados es igual
                                                if ($numero_correo == count($ret->post)) {
                                                    //Si al usuario no se le ha enviado el correo
                                                    if ($ret->email == "false") {
                                                        //Si se establecio la imagen de correo
                                                        if ($imagen_correo != '') {
                                                            //Datos para enviar el correo
                                                            $asunto = 'Reto en curso';
                                                            enviarEmail($mensaje_correo, $imagen_correo, $idUser, $asunto);
                                                            $ret->email = "true";
                                                            update_user_meta($idUser, 'retos_campana_json', json_encode($ret_camp));
                                                        }
                                                    }
                                                    //Si el usuario no ha visto el popup
                                                    if ($ret->popup_visualizaciones == "false") {
                                                        $popup[0]['popup'] = 'visualizaciones';
                                                        $popup[0]['mensaje'] = $mensaje_correo;
                                                        $popup[0]['video'] = $video;
                                                        $popup[0]['titulo'] = $p->post_title;
                                                        $ret->popup_visualizaciones = "true";
                                                        update_user_meta($idUser, 'retos_campana_json', json_encode($ret_camp));
                                                    }
                                                }
                                            }
                                            //Si no es vacio el rango
                                            if ($numero_visualizar != '') {
                                                //Si el numero de elementos a visualizar y el numero de elementos visualizados es igual
                                                if (count($ret->post) >= $numero_visualizar) {
                                                    //Si el usuario no ha visto el popup
                                                    if ($ret->popup == "false") {
                                                        $popup[0]['popup'] = 'completado';
                                                        $popup[0]['mensaje'] = $mensaje_correo;
                                                        $popup[0]['video'] = $video;
                                                        $popup[0]['titulo'] = $p->post_title;
                                                        $ret->popup = "true";
                                                        $ret->estado = "completado";
                                                        update_user_meta($idUser, 'retos_campana_json', json_encode($ret_camp));
                                                        $gpoints = get_user_meta($idUser, 'gpoints', true);
                                                        if ($gpoints == '' || $gpoints == null) {
                                                            $gpoints = 0;
                                                        }
                                                        $winPoints = $gpoints + $puntos;
                                                        update_user_meta($idUser, 'gpoints', $winPoints);
                                                    }
                                                }
                                            }
                                            echo json_encode($popup);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            //Reto contenido
            if ($tipo_reto == 'contenido') {
                //Obtenemos los retos de contenido del usuario
                $retos_contenido = get_user_meta($idUser, 'retos_contenido_json', true);
                //Obtenemos la categoria del reto
                $categoria_sel = get_post_meta($p->ID, 'categoria_sel', true);
                //Obtenemos las categorias del post
                $categoriasTarjetas = wp_get_post_terms($idPost, 'categoriasTarjetas');
                //Recorremos las categorias
                foreach ($categoriasTarjetas as $term) {
                    //Si la categoria del post es igual a la categoria del reto
                    if ($term->name == $categoria_sel) {
                        //Rango 1
                        $rango1 = get_post_meta($p->ID, 'rango1', true);
                        $rango1_puntos = get_post_meta($p->ID, 'rango1_puntos', true);
                        $rango1_titulo = get_post_meta($p->ID, 'rango1_titulo', true);
                        $rango1_mensaje_premio = get_post_meta($p->ID, 'rango1_mensaje_premio', true);
                        $rango1_video_premio = get_post_meta($p->ID, 'rango1_video_premio', true);
                        $rango1_imagen_correo = get_post_meta($p->ID, 'rango1_imagen_correo', true);
                        //Rango 2
                        $rango2 = get_post_meta($p->ID, 'rango2', true);
                        $rango2_puntos = get_post_meta($p->ID, 'rango2_puntos', true);
                        $rango2_titulo = get_post_meta($p->ID, 'rango2_titulo', true);
                        $rango2_mensaje_premio = get_post_meta($p->ID, 'rango2_mensaje_premio', true);
                        $rango2_video_premio = get_post_meta($p->ID, 'rango2_video_premio', true);
                        $rango2_imagen_correo = get_post_meta($p->ID, 'rango2_imagen_correo', true);
                        //Rango 3
                        $rango3 = get_post_meta($p->ID, 'rango3', true);
                        $rango3_puntos = get_post_meta($p->ID, 'rango3_puntos', true);
                        $rango3_titulo = get_post_meta($p->ID, 'rango3_titulo', true);
                        $rango3_mensaje_premio = get_post_meta($p->ID, 'rango3_mensaje_premio', true);
                        $rango3_video_premio = get_post_meta($p->ID, 'rango3_video_premio', true);
                        $rango3_imagen_correo = get_post_meta($p->ID, 'rango3_imagen_correo', true);
                        //Variables
                        $id = $p->ID;
                        $ret_cont = json_decode($retos_contenido);
                        //Si hay retos en curso
                        if (count($ret_cont) > 0) {
                        }
                        else {
                            $registrar_reto = [];
                            $registrar_reto[$id]['idReto'] = $id;
                            $registrar_reto[$id]['tipo'] = 'contenido';
                            $registrar_reto[$id]['rangos']['estado1'] = 'pendiente';
                            $registrar_reto[$id]['rangos']['popup1'] = 'false';
                            $registrar_reto[$id]['rangos']['email1'] = 'false';
                            $registrar_reto[$id]['rangos']['estado2'] = 'pendiente';
                            $registrar_reto[$id]['rangos']['popup2'] = 'false';
                            $registrar_reto[$id]['rangos']['email2'] = 'false';
                            $registrar_reto[$id]['rangos']['estado3'] = 'pendiente';
                            $registrar_reto[$id]['rangos']['popup3'] = 'false';
                            $registrar_reto[$id]['rangos']['email3'] = 'false'; 
                            $registrar_reto[$id]['post'][] = $idPost; 
                            //crear registro con datos iniciales
                            update_user_meta( $idUser, 'retos_contenido_json', json_encode($registrar_reto) );
                            $retos_contenido = get_user_meta($idUser, 'retos_contenido_json', true);
                            $ret_cont = json_decode($retos_contenido);
                        }

                        //Recorremos los retos
                        foreach($ret_cont as $ret) {
                            //Si el reto es de tipo campaña
                            if ($ret->tipo == 'contenido') {
                                //Si el id del reto esta dentro del array de retos en curso
                                if ($ret->idReto == $p->ID) {
                                    //Si el id del post esta en el array de retos
                                    if (in_array($idPost, $ret->post)) {
                                    } else {
                                        $ret->post[] = $idPost;
                                        update_user_meta($idUser, 'retos_contenido_json', json_encode($ret_cont));
                                    }
                                    //Variable para saber que popup mostrar
                                    $popup = [];
                                    $popup[0]['popup'] = 'vacio';
                                    //Si el rango 1 no se ha completado
                                    if($ret->rangos->estado1 != 'completado'){
                                        //Si no es vacio el rango
                                        if ($rango1 != '') {
                                            //Si el numero de elementos a visualizar y el numero de elementos visualizados es igual
                                            if ($rango1 == count($ret->post)) {
                                                //Si al usuario no se le ha enviado el correo
                                                if ($ret->rangos->email1 == "false") {
                                                    //Si se establecio la imagen de correo
                                                    if ($rango1_imagen_correo != '') {
                                                        //Datos para enviar el correo
                                                        $asunto = 'Reto cumplido';
                                                        enviarEmail($rango1_mensaje_premio, $rango1_imagen_correo, $idUser, $asunto);
                                                        $ret->rangos->email1 = "true";
                                                        update_user_meta($idUser, 'retos_contenido_json', json_encode($ret_cont));
                                                    }
                                                }
                                                //Si el usuario no ha visto el popup
                                                if ($ret->rangos->popup1 == "false") {
                                                    $popup[0]['popup'] = 'completado';
                                                    $popup[0]['mensaje'] = $rango1_mensaje_premio;
                                                    $popup[0]['video'] = $rango1_video_premio;
                                                    $popup[0]['titulo'] = $rango1_titulo;
                                                    $ret->rangos->popup1 = "true";
                                                    $ret->rangos->estado1 = "completado";
                                                    update_user_meta($idUser, 'retos_contenido_json', json_encode($ret_cont));
                                                    $gpoints = get_user_meta($idUser, 'gpoints', true);
                                                    if ($gpoints == '' || $gpoints == null) {
                                                        $gpoints = 0;
                                                    }
                                                    $winPoints = $gpoints + $puntos;
                                                    update_user_meta($idUser, 'gpoints', $winPoints);
                                                }
                                            }
                                        }
                                    }
                                    //Si el rango 2 no se ha completado
                                    if($ret->rangos->estado2 != 'completado'){
                                        //Si no es vacio el rango
                                        if ($rango2 != '') {
                                            //Si el numero de elementos a visualizar y el numero de elementos visualizados es igual
                                            if ($rango2 == count($ret->post)) {
                                                //Si al usuario no se le ha enviado el correo
                                                if ($ret->rangos->email2 == "false") {
                                                    //Si se establecio la imagen de correo
                                                    if ($rango2_imagen_correo != '') {
                                                        //Datos para enviar el correo
                                                        $asunto = 'Reto cumplido';
                                                        enviarEmail($rango2_mensaje_premio, $rango2_imagen_correo, $idUser, $asunto);
                                                        $ret->rangos->email2 = "true";
                                                        update_user_meta($idUser, 'retos_contenido_json', json_encode($ret_cont));
                                                    }
                                                }
                                                //Si el usuario no ha visto el popup
                                                if ($ret->rangos->popup2 == "false") {
                                                    $popup[0]['popup'] = 'completado';
                                                    $popup[0]['mensaje'] = $rango2_mensaje_premio;
                                                    $popup[0]['video'] = $rango2_video_premio;
                                                    $popup[0]['titulo'] = $rango2_titulo;
                                                    $ret->rangos->popup2 = "true";
                                                    $ret->rangos->estado2 = "completado";
                                                    update_user_meta($idUser, 'retos_contenido_json', json_encode($ret_cont));
                                                    $gpoints = get_user_meta($idUser, 'gpoints', true);
                                                    if ($gpoints == '' || $gpoints == null) {
                                                        $gpoints = 0;
                                                    }
                                                    $winPoints = $gpoints + $puntos;
                                                    update_user_meta($idUser, 'gpoints', $winPoints);
                                                }
                                            }
                                        }
                                    }
                                    //Si el rango 3 no se ha completado
                                    if($ret->rangos->estado3 != 'completado'){
                                        //Si no es vacio el rango
                                        if ($rango3 != '') {
                                            //Si el numero de elementos a visualizar y el numero de elementos visualizados es igual
                                            if ($rango3 == count($ret->post)) {
                                                //Si al usuario no se le ha enviado el correo
                                                if ($ret->rangos->email3 == "false") {
                                                    //Si se establecio la imagen de correo
                                                    if ($rango3_imagen_correo != '') {
                                                        //Datos para enviar el correo
                                                        $asunto = 'Reto cumplido';
                                                        enviarEmail($rango3_mensaje_premio, $rango3_imagen_correo, $idUser, $asunto);
                                                        $ret->rangos->email3 = "true";
                                                        update_user_meta($idUser, 'retos_contenido_json', json_encode($ret_cont));
                                                    }
                                                }
                                                //Si el usuario no ha visto el popup
                                                if ($ret->rangos->popup3 == "false") {
                                                    $popup[0]['popup'] = 'completado';
                                                    $popup[0]['mensaje'] = $rango3_mensaje_premio;
                                                    $popup[0]['video'] = $rango3_video_premio;
                                                    $popup[0]['titulo'] = $rango3_titulo;
                                                    $ret->rangos->popup3 = "true";
                                                    $ret->rangos->estado3 = "completado";
                                                    update_user_meta($idUser, 'retos_contenido_json', json_encode($ret_cont));
                                                    $gpoints = get_user_meta($idUser, 'gpoints', true);
                                                    if ($gpoints == '' || $gpoints == null) {
                                                        $gpoints = 0;
                                                    }
                                                    $winPoints = $gpoints + $puntos;
                                                    update_user_meta($idUser, 'gpoints', $winPoints);
                                                }
                                            }
                                        }
                                    }
                                    echo json_encode($popup);
                                }
                            }
                        }

                    }
                }
            }
        endforeach;
    }
    die();
}


/*
|-------------------------------------------------------------------------------
| Function Ajax para guardar registro evento
|-------------------------------------------------------------------------------
*/


function guardar_registro_evento()
{
    $dataForm = isset($_POST['dataForm']) ? $_POST['dataForm'] : false;
  
    if (!$dataForm) {
        echo 'Ha ocurrido un error';
        wp_die();
    } else {
        if($dataForm[2]['value'] == '') {
            $contador = 0;
            $registros = get_posts(array(
                'post_type' => 'registros_evento',
                'numberposts' => -1,
                'post_status' => 'publish',
            ));
            foreach($registros as $contenido){
                $registros_user = get_post_meta($contenido->ID, 'info_campos', true);                
                foreach($registros_user as $campo) {
                    if($campo['name'] == 'Correo electrónico') {
                        if($campo['value'] == $dataForm[6]['value']) {
                            $contador++;                        
                        }
                    }
                }
            }
            
            if($contador > 0) {
                echo '3';
                wp_die();
            } else {
                $new = array(
                    'post_title' => 'Nuevo registro - Evento ' .get_the_title($dataForm[0]['value']),
                    'post_type' => 'registros_evento',
                    'post_status' => 'publish',
                );
        
                $post_id = wp_insert_post($new);
        
                if ($post_id) {
                    update_post_meta($post_id, 'info_campos', $dataForm);
                    $array_datos = array(
                        'To' => array(
                            'Address' => $dataForm[6]['value'],
                            'SubscriberKey' => $dataForm[6]['value'],
                            'ContactAttributes' => array(
                                'SubscriberAttributes' => array(
                                    'FirstName' => ucwords($dataForm[4]['value']),
                                    'LastName' => ucwords($dataForm[5]['value']),
                                    'DOB' => date("m/d/Y", strtotime($dataForm[7]['value'])),
                                    'Country' => strtoupper($dataForm[8]['value']),
                                    'Phone' => str_replace("+","",$dataForm[10]['value']),
                                    'GatoradeConsent' => 'TRUE',
                                    'PepsiCoConsent' => 'TRUE',
                                    'PrivacyPolicyConsent' => 'TRUE',
                                    'WhatsAppConsent' => 'TRUE',
                                    'DateOfConsent' => date("m/d/Y"),
                                    'ProgramName' => $dataForm[3]['value'],
                                    'WebsiteRegistered' => 'FALSE'
                                )
                            )
                        )
                    );
    
                    //salesforce
                    saveEventsNewInSalesforce($array_datos);

                    //envio notificacion correo
                    // $mensaje = get_post_meta($dataForm[0][value], 'mensaje_mail', true);
                    // $titulo = get_the_title($dataForm[0][value]);
                    // $enlace = get_the_permalink($dataForm[0][value]);
                    // $fecha = get_post_meta($dataForm[0][value], 'fecha_evento', true);
                    // $nameUser = ucwords($dataForm[4]['value']).' '.ucwords($dataForm[5]['value']);
                    // $imagen = wp_get_attachment_image_src(get_post_thumbnail_id($dataForm[0][value]), 'full');
                    // date_default_timezone_set("America/Bogota");
                    // setlocale(LC_TIME, 'es_ES.UTF-8','esp');
                    // $date_f = date( "d m Y", strtotime($fecha) );
                    // $to_user = $dataForm[6]['value'];    

                    // send_mail_evento($mensaje, $titulo, $enlace, $fecha, $nameUser, $imagen, $date_f, $to_user);

                    echo '1';
                    wp_die();
                } else {
                    echo '0';
                    wp_die();
                }
            
            }
            wp_die();
        } else {
            $user = $dataForm[2]['value'];       
        
            $inscrip = get_user_meta($user, 'eventos_new', true);
            if (is_array($inscrip)) {
            } else {
                $inscrip = [];
                update_user_meta($user, 'eventos_new', $inscrip);
            }

            $formatArray = [];

            for ($i=0; $i < count($dataForm); $i++) { 
                $formatArray[$dataForm[$i]['name']] = $dataForm[$i]['value'];
            }
            array_push($inscrip, $formatArray);
            update_user_meta($user, 'eventos_new', $inscrip);  
            
            $user_info = get_userdata($user);   
            $new = array(
                'post_title' => 'Nuevo registro - Evento ' .get_the_title($dataForm[0]['value']),
                'post_type' => 'registros_evento',
                'post_status' => 'publish',
            );
    
            $post_id = wp_insert_post($new);
    
            if ($post_id) {
                update_post_meta($post_id, 'info_campos', $dataForm);
            }    
            $array_datos = array(
                'To' => array(
                    'Address' => $user_info->user_email,
                    'SubscriberKey' => $user_info->user_email,
                    'ContactAttributes' => array(
                        'SubscriberAttributes' => array(
                            'FirstName' => ucwords(get_user_meta($user, 'user_nombre', true)),
                            'LastName' => ucwords(get_user_meta($user, 'user_apellido', true)),
                            'DOB' => date("m/d/Y", strtotime($dataForm[4]['value'])),
                            'Country' => strtoupper(get_user_meta($user, 'user_pais', true)),
                            'Phone' => str_replace("+","",get_user_meta($user, 'user_celular', true)),
                            'GatoradeConsent' => 'TRUE',
                            'PepsiCoConsent' => 'TRUE',
                            'PrivacyPolicyConsent' => 'TRUE',
                            'WhatsAppConsent' => 'TRUE',
                            'DateOfConsent' => date("m/d/Y"),
                            'ProgramName' => $dataForm[3]['value'],
                            'WebsiteRegistered' => 'TRUE'
                        )
                    )
                )
            );
            
            //salesforce
            saveEventsNewInSalesforce($array_datos);


            //Reto favorito al primer contenido
            if (get_user_meta($user, 'inscripcion_evento', true) == '1') {
                //envio notificacion correo
                // $mensaje = get_post_meta($dataForm[0][value], 'mensaje_mail', true);
                // $titulo = get_the_title($dataForm[0][value]);
                // $enlace = get_the_permalink($dataForm[0][value]);
                // $fecha = get_post_meta($dataForm[0][value], 'fecha_evento', true);
                // $nameUser = ucwords(get_user_meta($user, 'user_nombre', true)).' '.ucwords(get_user_meta($user, 'user_apellido', true));
                // $imagen = wp_get_attachment_image_src(get_post_thumbnail_id($dataForm[0][value]), 'full');
                // date_default_timezone_set("America/Bogota");
                // setlocale(LC_TIME, 'es_ES.UTF-8','esp');
                // $date_f = date( "d m Y", strtotime($fecha) );
                // $to_user = $user_info->user_email;

                // send_mail_evento($mensaje, $titulo, $enlace, $fecha, $nameUser, $imagen, $date_f, $to_user);

                echo '1';
            } else {
                update_user_meta($user, 'inscripcion_evento', 1);
                $mensaje = get_option('mensaje_inscripcion_evento');
                $titulo_medalla = get_option('titulo_medalla_inscripcion_evento');
                $video_medalla = get_option('video_medalla_inscripcion_evento');
                $imagen_correo = get_option('imagen_correo_inscripcion_evento');
                $puntos = get_option('puntos_inscripcion_evento');
                $nombre_reto = 'inscripcion_evento';
    
                if (get_option('estado_inscripcion_evento') != 'pausado') {
                    mostrarPopupEmail($mensaje, $titulo_medalla, $video_medalla, $imagen_correo, $puntos, $idUser, $nombre_reto, $emailUser, $nameUser);
                    echo '2';
                }
                else {
                    //envio notificacion correo
                    // $mensaje = get_post_meta($dataForm[0][value], 'mensaje_mail', true);
                    // $titulo = get_the_title($dataForm[0][value]);
                    // $enlace = get_the_permalink($dataForm[0][value]);
                    // $fecha = get_post_meta($dataForm[0][value], 'fecha_evento', true);
                    // $nameUser = ucwords(get_user_meta($user, 'user_nombre', true)).' '.ucwords(get_user_meta($user, 'user_apellido', true));
                    // $imagen = wp_get_attachment_image_src(get_post_thumbnail_id($dataForm[0][value]), 'full');
                    // date_default_timezone_set("America/Bogota");
                    // setlocale(LC_TIME, 'es_ES.UTF-8','esp');
                    // $date_f = date( "d m Y", strtotime($fecha) );
                    // $to_user = $user_info->user_email;

                    // send_mail_evento($mensaje, $titulo, $enlace, $fecha, $nameUser, $imagen, $date_f, $to_user);
                    echo '1';
                }
            }

            wp_die();
        }

        
    }
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_guardar_registro_evento', 'guardar_registro_evento');

// Hook para usuarios logueados
add_action('wp_ajax_guardar_registro_evento', 'guardar_registro_evento');



/*
|-------------------------------------------------------------------------------
| Function Ajax para cerrar sesion
|-------------------------------------------------------------------------------
*/


function logout_user()
{
    wp_logout();
    echo '1';
    
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_logout_user', 'logout_user');

// Hook para usuarios logueados
add_action('wp_ajax_logout_user', 'logout_user');


/*
|-------------------------------------------------------------------------------
| Function Ajax para guardar registro five
|-------------------------------------------------------------------------------
*/


function guardar_registro_five()
{
    global $current_user;
    wp_get_current_user();

    if(!is_user_logged_in()) {
        $nombre  = isset($_POST['nombre']) ? $_POST['nombre'] : false;
        $nombre = sanitize_text_field($_POST['nombre']);

        $apellido  = isset($_POST['apellido']) ? $_POST['apellido'] : false;
        $apellido = sanitize_text_field($_POST['apellido']);

        $correo  = isset($_POST['correo']) ? $_POST['correo'] : false;
        $correo = sanitize_text_field($_POST['correo']);

        $genero  = isset($_POST['genero']) ? $_POST['genero'] : false;
        $genero = sanitize_text_field($_POST['genero']);

        $pais  = isset($_POST['pais']) ? $_POST['pais'] : false;
        $pais = sanitize_text_field($_POST['pais']);

        $celular  = isset($_POST['celular']) ? $_POST['celular'] : false;
        $celular = sanitize_text_field($_POST['celular']);
        $celular = str_replace("+","",$celular);

        $WebsiteAccount = 'FALSE';

        $fecha_nacimiento  = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : false;
        $fecha_nacimiento = sanitize_text_field($_POST['fecha_nacimiento']);

        $terminos_condiciones  = 'TRUE';

        $politicas_privacidad  = 'TRUE';

        $terminos_evento_pais  = 'TRUE';

    } else {
        $nombre  = get_user_meta($current_user->ID, 'user_nombre', true);

        $apellido  = get_user_meta($current_user->ID, 'user_apellido', true);

        $correo  = $current_user->user_email;

        $genero  = isset($_POST['genero']) ? $_POST['genero'] : false;
        $genero = sanitize_text_field($_POST['genero']);

        $pais  = isset($_POST['pais']) ? $_POST['pais'] : false;
        $pais = sanitize_text_field($_POST['pais']);

        $celular  = isset($_POST['celular']) ? $_POST['celular'] : false;
        $celular = sanitize_text_field($_POST['celular']);
        $celular = str_replace("+","",$celular);

        $WebsiteAccount = 'TRUE';

        $fecha_nacimiento  = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : false;
        $fecha_nacimiento = sanitize_text_field($_POST['fecha_nacimiento']);

        $terminos_condiciones  = 'TRUE';

        $politicas_privacidad  = 'TRUE';

        $terminos_evento_pais  = 'TRUE'; 
    }

    $id_five  = isset($_POST['id_five']) ? $_POST['id_five'] : false;
    $id_five = sanitize_text_field($_POST['id_five']);
  
    if ($nombre == '' || $apellido == '' || $correo == '' || $pais == '' || $celular == '' || $fecha_nacimiento == '' || $terminos_condiciones == '' || $politicas_privacidad == '' || $fecha_nacimiento == '' || $genero == '') {
        echo '0';
        wp_die();
    } else {
        //actualizar datos    
        if($id_five != '') {
            update_post_meta($id_five, 'status', 'Active');
            update_post_meta($id_five, 'nombre', $nombre);
            update_post_meta($id_five, 'apellido', $apellido);
            update_post_meta($id_five, 'correo', $correo);
            update_post_meta($id_five, 'celular', $celular);
            update_post_meta($id_five, 'genero', $genero);
            update_post_meta($id_five, 'pais', $pais);
            update_post_meta($id_five, 'fecha_nacimiento', $fecha_nacimiento);
            update_post_meta($id_five, 'terminos_condiciones', $terminos_condiciones);
            update_post_meta($id_five, 'politicas_privacidad', $politicas_privacidad);
            update_post_meta($id_five, 'terminos_evento_pais', $terminos_evento_pais);
            
            echo $id_five;
            wp_die();
        } else {
            $args = array(
                'post_type' => 'registros_five',
                'posts_per_page' => 1,
                'post_status' => 'publish',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key'   => 'correo',
                        'compare' => '=',
                        'value' => $correo,
                    ),
                    array(
                        'key'     => 'status',
                        'compare' => '!=',
                        'value' => 'Cancelled'
                    )
                )
            );
            $registros_five = get_posts($args);
    
            if(count($registros_five) > 0) {
                echo json_encode($registros_five);
                wp_die();
            } else {
                $args2 = array(
                    'post_type' => 'registros_five',
                    'posts_per_page' => 1,
                    'post_status' => 'publish',
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key'   => 'correo',
                            'value' => $correo,
                            'compare' => '=',
                        ),
                        array(
                            'key'     => 'status',
                            'compare' => '=',
                            'value' => 'Cancelled'
                        )
                    )
                );
                $registros_five2 = get_posts($args2);
                if(count($registros_five2) > 0) {
                    $id_post_update = $registros_five2[0]->ID;
                    update_post_meta($id_post_update, 'status', 'Active');
                    update_post_meta($id_post_update, 'envio_salesforce', '');
                    
                    update_post_meta($id_post_update, 'nombre', $nombre);
                    update_post_meta($id_post_update, 'apellido', $apellido);
                    update_post_meta($id_post_update, 'correo', $correo);
                    update_post_meta($id_post_update, 'celular', $celular);
                    update_post_meta($id_post_update, 'genero', $genero);
                    update_post_meta($id_post_update, 'pais', $pais);
                    update_post_meta($id_post_update, 'fecha_nacimiento', $fecha_nacimiento);
                    update_post_meta($id_post_update, 'terminos_condiciones', $terminos_condiciones);
                    update_post_meta($id_post_update, 'politicas_privacidad', $politicas_privacidad);
                    update_post_meta($id_post_update, 'terminos_evento_pais', $terminos_evento_pais);

                    update_post_meta($id_post_update, 'tryout', '');
                    update_post_meta($id_post_update, 'posicion', '');
                    update_post_meta($id_post_update, 'documento_identidad', '');
                    update_post_meta($id_post_update, 'tipo_registro', '');
                    update_post_meta($id_post_update, 'email_parent', '');
                    update_post_meta($id_post_update, 'nombre_parent', '');
                    update_post_meta($id_post_update, 'apellido_parent', '');
                    update_post_meta($id_post_update, 'celular_parent', '');
                    update_post_meta($id_post_update, 'pais_parent', '');
                    update_post_meta($id_post_update, 'menor', '');
                    update_post_meta($id_post_update, 'nombre_consentimiento', '');
                    update_post_meta($id_post_update, 'apellido_consentimiento', '');
                    update_post_meta($id_post_update, 'nacimiento_consentimiento', '');
                    update_post_meta($id_post_update, 'email_consentimiento', '');
                    update_post_meta($id_post_update, 'menor_nombre_consentimiento', '');

                    echo $id_post_update;
                    wp_die();
                } else {
                    //Buscar registros en Salesforce
                    $correof = str_replace("+","%2B",$correo);;
                    $token_sales = getSalesforceToken();
                    $api_endpoint_sales = 'https://mcmqczd118jdz8xqdfsbxdwh96f0.rest.marketingcloudapis.com/data/v1/customobjectdata/key/5v5UserData_2022/rowset?$filter=user_email%20eq%20%27'.$correof.'%27';
                    $api_args_sales = array(
                        'method'  => 'GET',
                        'headers' => array(
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer '. $token_sales,
                        ),
                        // 'body' => '',
                        'timeout'=> 0,
                    );
                    $response_sales = wp_remote_post( $api_endpoint_sales, $api_args_sales );
                    $responseString_sales = wp_remote_retrieve_body( $response_sales );
                    $r_sales = json_decode($responseString_sales);
                    
                    if($r_sales->items) {
                        $nombre = $r_sales->items[0]->values->firstname;
                        $apellido = $r_sales->items[0]->values->lastname;
                        $correo = $r_sales->items[0]->keys->user_email;
                        $celular = $r_sales->items[0]->values->user_phone;
                        $genero = $r_sales->items[0]->values->gender;
                        $pais = strtolower($r_sales->items[0]->values->countrycode);
                        $fecha_nacimiento = date("Y-m-d", strtotime($r_sales->items[0]->values->dateofbirth));
                        $tipo_registro = ucfirst(strtolower($r_sales->items[0]->values->registered_for));
                        $posicion = ucfirst($r_sales->items[0]->values->position);
                        $tryout = ucfirst($r_sales->items[0]->values->tryoutid);
                        $terminos_condiciones = 'TRUE';
                        $politicas_privacidad = 'TRUE';
                        $terminos_condiciones = 'TRUE';

                        $email_parent = $r_sales->items[0]->values->parentemail;
                        $nombre_parent = $r_sales->items[0]->values->parentfirstname;
                        $apellido_parent = $r_sales->items[0]->values->parentlastname;
                        $celular_parent = $r_sales->items[0]->values->parent_phone;
                        $new = array(
                            'post_title' => $nombre . ' - ' . $apellido,
                            'post_type' => 'registros_five',
                            'post_status' => 'publish'
                        );
                    
                        $post_id = wp_insert_post($new);
                    
                        if ($post_id) {
                            update_post_meta($post_id, 'status', 'Active');
                            update_post_meta($post_id, 'nombre', $nombre);
                            update_post_meta($post_id, 'apellido', $apellido);
                            update_post_meta($post_id, 'correo', $correo);
                            update_post_meta($post_id, 'celular', $celular);
                            update_post_meta($post_id, 'genero', $genero);
                            update_post_meta($post_id, 'pais', $pais);
                            update_post_meta($post_id, 'fecha_nacimiento', $fecha_nacimiento);
                            update_post_meta($post_id, 'terminos_condiciones', $terminos_condiciones);
                            update_post_meta($post_id, 'politicas_privacidad', $politicas_privacidad);
                            update_post_meta($post_id, 'terminos_evento_pais', $terminos_evento_pais);

                            update_post_meta($post_id, 'tipo_registro', $tipo_registro);
                            update_post_meta($post_id, 'posicion', $posicion);
                            update_post_meta($post_id, 'tryout', $tryout);

                            update_post_meta($post_id, 'email_parent', $email_parent);
                            update_post_meta($post_id, 'nombre_parent', $nombre_parent);
                            update_post_meta($post_id, 'apellido_parent', $apellido_parent);
                            update_post_meta($post_id, 'celular_parent', $celular_parent);
                            
                            
                            $args = array(
                                'post_type' => 'registros_five',
                                'posts_per_page' => 1,
                                'post_status' => 'publish',
                                'meta_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'key'   => 'correo',
                                        'compare' => '=',
                                        'value' => $correo,
                                    )
                                )
                            );
                            $registros_five = get_posts($args);
                            echo json_encode($registros_five);
                            wp_die();
                        } else {
                            echo '0';
                            wp_die();
                        }
                    } else {
                        $new = array(
                            'post_title' => $nombre . ' - ' . $apellido,
                            'post_type' => 'registros_five',
                            'post_status' => 'publish'
                        );
                    
                        $post_id = wp_insert_post($new);
                    
                        if ($post_id) {
                            update_post_meta($post_id, 'status', 'Active');
                            update_post_meta($post_id, 'nombre', $nombre);
                            update_post_meta($post_id, 'apellido', $apellido);
                            update_post_meta($post_id, 'correo', $correo);
                            update_post_meta($post_id, 'celular', $celular);
                            update_post_meta($post_id, 'genero', $genero);
                            update_post_meta($post_id, 'pais', $pais);
                            update_post_meta($post_id, 'fecha_nacimiento', $fecha_nacimiento);
                            update_post_meta($post_id, 'terminos_condiciones', $terminos_condiciones);
                            update_post_meta($post_id, 'politicas_privacidad', $politicas_privacidad);
                            update_post_meta($post_id, 'terminos_evento_pais', $terminos_evento_pais);
                            
                            echo $post_id;
                            wp_die();
                        } else {
                            echo '0';
                            wp_die();
                        }

                    }
                }
                
            }   
        }
        
    }
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_guardar_registro_five', 'guardar_registro_five');

// Hook para usuarios logueados
add_action('wp_ajax_guardar_registro_five', 'guardar_registro_five');



/*
|-------------------------------------------------------------------------------
| Function Ajax para completar tryouts
|-------------------------------------------------------------------------------
*/


function complete_five()
{

    $id_five  = isset($_POST['id_five']) ? $_POST['id_five'] : false;
    $id_five = sanitize_text_field($_POST['id_five']);

    $tryout  = isset($_POST['tryout']) ? $_POST['tryout'] : false;
    $tryout = sanitize_text_field($_POST['tryout']);

    $posicion  = isset($_POST['posicion']) ? $_POST['posicion'] : false;
    $posicion = sanitize_text_field($_POST['posicion']);

    $documento_identidad  = isset($_POST['documento_identidad']) ? $_POST['documento_identidad'] : false;
    $documento_identidad = sanitize_text_field($_POST['documento_identidad']);
    
    $terminos_condiciones  = isset($_POST['terminos_condiciones']) ? $_POST['terminos_condiciones'] : false;
    $terminos_condiciones = sanitize_text_field($_POST['terminos_condiciones']);

    $politica_privacidad  = isset($_POST['politica_privacidad']) ? $_POST['politica_privacidad'] : false;
    $politica_privacidad = sanitize_text_field($_POST['politica_privacidad']);

    $tipo_registro  = isset($_POST['tipo_registro']) ? $_POST['tipo_registro'] : false;
    $tipo_registro = sanitize_text_field($_POST['tipo_registro']);

    $email_parent  = isset($_POST['email_parent']) ? $_POST['email_parent'] : false;
    $email_parent = sanitize_text_field($_POST['email_parent']);

    $nombre_parent  = isset($_POST['nombre_parent']) ? $_POST['nombre_parent'] : false;
    $nombre_parent = sanitize_text_field($_POST['nombre_parent']);

    $apellido_parent  = isset($_POST['apellido_parent']) ? $_POST['apellido_parent'] : false;
    $apellido_parent = sanitize_text_field($_POST['apellido_parent']);

    $celular_parent  = isset($_POST['celular_parent']) ? $_POST['celular_parent'] : false;
    $celular_parent = sanitize_text_field($_POST['celular_parent']);
    $celular_parent = str_replace("+","",$celular_parent);

    $pais_parent  = isset($_POST['pais_parent']) ? $_POST['pais_parent'] : false;
    $pais_parent = sanitize_text_field($_POST['pais_parent']);

    $menor  = isset($_POST['menor']) ? $_POST['menor'] : false;
    $menor = sanitize_text_field($_POST['menor']);

    $nombre_consentimiento  = isset($_POST['nombre_consentimiento']) ? $_POST['nombre_consentimiento'] : false;
    $nombre_consentimiento = sanitize_text_field($_POST['nombre_consentimiento']);

    $apellido_consentimiento  = isset($_POST['apellido_consentimiento']) ? $_POST['apellido_consentimiento'] : false;
    $apellido_consentimiento = sanitize_text_field($_POST['apellido_consentimiento']);

    $nacimiento_consentimiento  = isset($_POST['nacimiento_consentimiento']) ? $_POST['nacimiento_consentimiento'] : false;
    $nacimiento_consentimiento = sanitize_text_field($_POST['nacimiento_consentimiento']);

    $email_consentimiento  = isset($_POST['email_consentimiento']) ? $_POST['email_consentimiento'] : false;
    $email_consentimiento = sanitize_text_field($_POST['email_consentimiento']);

    $menor_nombre_consentimiento  = isset($_POST['menor_nombre_consentimiento']) ? $_POST['menor_nombre_consentimiento'] : false;
    $menor_nombre_consentimiento = sanitize_text_field($_POST['menor_nombre_consentimiento']);


    if ($id_five == '' || $tipo_registro == '') {
        echo '0';
        wp_die();
    } else {
        update_post_meta($id_five, 'tryout', $tryout);
        update_post_meta($id_five, 'posicion', $posicion);
        update_post_meta($id_five, 'documento_identidad', $documento_identidad);
        update_post_meta($id_five, 'tipo_registro', $tipo_registro);
        update_post_meta($id_five, 'email_parent', $email_parent);
        update_post_meta($id_five, 'nombre_parent', $nombre_parent);
        update_post_meta($id_five, 'apellido_parent', $apellido_parent);
        update_post_meta($id_five, 'celular_parent', $celular_parent);
        update_post_meta($id_five, 'pais_parent', $pais_parent);
        update_post_meta($id_five, 'menor', $menor);
        update_post_meta($id_five, 'nombre_consentimiento', $nombre_consentimiento);
        update_post_meta($id_five, 'apellido_consentimiento', $apellido_consentimiento);
        update_post_meta($id_five, 'nacimiento_consentimiento', $nacimiento_consentimiento);
        update_post_meta($id_five, 'email_consentimiento', $email_consentimiento);
        update_post_meta($id_five, 'menor_nombre_consentimiento', $menor_nombre_consentimiento);

        
        $nombre  = get_post_meta($id_five, 'nombre', true);
        $apellido  = get_post_meta($id_five, 'apellido', true);
        $correo  = get_post_meta($id_five, 'correo', true);
        $genero  = get_post_meta($id_five, 'genero', true);
        $pais  = get_post_meta($id_five, 'pais', true);
        $celular  = get_post_meta($id_five, 'celular', true);
        $documento_identidad  = get_post_meta($id_five, 'documento_identidad', true);
        $WebsiteAccount = 'TRUE';
        $terminos_condiciones  = 'TRUE';
        $politicas_privacidad  = 'TRUE';
        $fecha_nacimiento  = get_post_meta($id_five, 'fecha_nacimiento', true);
        $nombre_parent  = get_post_meta($id_five, 'nombre_parent', true);
        $apellido_parent  = get_post_meta($id_five, 'apellido_parent', true);
        $email_parent  = get_post_meta($id_five, 'email_parent', true);
        $celular_parent  = get_post_meta($id_five, 'celular_parent', true);
        $pais_parent  = get_post_meta($id_five, 'pais_parent', true);
        $tryout  = get_post_meta($id_five, 'tryout', true);
        $posicion  = get_post_meta($id_five, 'posicion', true);
        $tipo_registro  = get_post_meta($id_five, 'tipo_registro', true);

        $json_data_five = [
            "items" => [
                  [
                    'User_email' => $correo,
                    '5v5ID' => 'w_'.$id_five,
                    'FirstName' => $nombre,
                    'CountryCode' => strtoupper($pais),
                    'LastName' => $apellido,
                    'Gender' => $genero,
                    'GovID' => $documento_identidad,
                    'DateOfBirth' => date("m/d/Y", strtotime($fecha_nacimiento)),
                    'WebsiteConsent' => 'TRUE',
                    '5v5Consent' => 'TRUE',
                    'WAConsent' =>  'TRUE',
                    'user_phone' =>  $celular,
                    'UpdateDate' =>  date("m/d/Y"),                    
                    'InsertDateUTC' => gmdate("Y-m-d\TH:i:s\Z"),
                    'WebsiteAccount' =>  $WebsiteAccount,
                    'Registered_For' =>  $tipo_registro, 
                    'TryoutID' =>  $tryout,
                    'Position' =>  $posicion,
                    'ParentConsentRequired' => '',
                    'ParentEmail' => '',
                    'ParentFirstName' => '',
                    'ParentLastName' => '',
                    'ParentCountryCode' => '',
                    'parent_phone' => '',
                    'Status' => '',
                    'ParentalConsent' => '',

                  ] 
               ] 
         ]; 

        if($menor == 'si') {
            $json_data_five['items'][0]['ParentConsentRequired'] = 'TRUE';
            $json_data_five['items'][0]['ParentEmail'] = $email_parent;
            $json_data_five['items'][0]['ParentFirstName'] = $nombre_parent;
            $json_data_five['items'][0]['ParentLastName'] = $apellido_parent;
            $json_data_five['items'][0]['ParentCountryCode'] = strtoupper($pais_parent);
            $json_data_five['items'][0]['parent_phone'] = $celular_parent;

            if($nombre_consentimiento != '' && $apellido_consentimiento != '' && $nacimiento_consentimiento != '' && $email_consentimiento != '' && $menor_nombre_consentimiento != '') {
                $json_data_five['items'][0]['Status'] = 'Active';
                $json_data_five['items'][0]['ParentalConsent'] = 'TRUE';
            } else {
                $json_data_five['items'][0]['Status'] = 'Pending';
                $json_data_five['items'][0]['ParentalConsent'] = 'FALSE';
            }
        } else {
            $json_data_five['items'][0]['ParentConsentRequired'] = 'FALSE';
            $json_data_five['items'][0]['Status'] = 'Active';
        }
        
        //salesforce
        saveEventFiveSalesforce($json_data_five);
        $token = getSalesforceToken();
        $api_endpoint = 'https://mcmqczd118jdz8xqdfsbxdwh96f0.rest.marketingcloudapis.com/data/v1/customobjectdata/key/5v5UserData_2022/rowset?$filter=user_email%20eq%20%27'.$correo.'%27';
        $api_args = array(
            'method'  => 'GET',
            'headers' => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '. $token,
            ),
            // 'body' => '',
            'timeout'=> 0,
        );
        $response = wp_remote_post( $api_endpoint, $api_args );
        $responseString = wp_remote_retrieve_body( $response );
        $r = json_decode($responseString);
        if($r->items) {
            update_post_meta($id_five, 'envio_salesforce', 'TRUE');
            echo '1';
            wp_die();
        } else {
            saveEventFiveSalesforce($json_data_five);
            update_post_meta($id_five, 'envio_salesforce', 'TRUE');
            echo '1';
            wp_die();
        }
        
    }    
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_complete_five', 'complete_five');

// Hook para usuarios logueados
add_action('wp_ajax_complete_five', 'complete_five');

/*
|-------------------------------------------------------------------------------
| Function Ajax para cancelar registro five
|-------------------------------------------------------------------------------
*/


function cancelar_registro_five()
{

    $id_five  = isset($_POST['id_five']) ? $_POST['id_five'] : false;
    $id_five = sanitize_text_field($_POST['id_five']);

    if ($id_five == '') {
        echo '0';
        wp_die();
    } else {
        update_post_meta($id_five, 'status', 'Cancelled');
        $correo  = get_post_meta($id_five, 'correo', true);

        $json_data_five = [
            "items" => [
                  [
                    'User_email' => $correo,
                    'Status' => 'Cancelled',
                  ] 
               ] 
         ]; 

        //salesforce
        saveEventFiveSalesforce($json_data_five);
        $token = getSalesforceToken();
        $api_endpoint = 'https://mcmqczd118jdz8xqdfsbxdwh96f0.rest.marketingcloudapis.com/data/v1/customobjectdata/key/5v5UserData_2022/rowset?$filter=user_email%20eq%20%27'.$correo.'%27';
        $api_args = array(
            'method'  => 'GET',
            'headers' => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '. $token,
            ),
            // 'body' => '',
            'timeout'=> 0,
        );
        $response = wp_remote_post( $api_endpoint, $api_args );
        $responseString = wp_remote_retrieve_body( $response );
        $r = json_decode($responseString);
        echo '1';
        wp_die();        
    }    
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_cancelar_registro_five', 'cancelar_registro_five');

// Hook para usuarios logueados
add_action('wp_ajax_cancelar_registro_five', 'cancelar_registro_five');


/*
|-------------------------------------------------------------------------------
| Function Ajax para obtener tryouts
|-------------------------------------------------------------------------------
*/


function get_tryouts()
{
    $pais  = isset($_POST['pais']) ? $_POST['pais'] : false;
    $pais = sanitize_text_field($_POST['pais']);
    $pais = strtoupper($pais);

    $genero  = isset($_POST['genero']) ? $_POST['genero'] : false;
    $genero = sanitize_text_field($_POST['genero']);

    //salesforce
    $token_five = getSalesforceToken();
    $api_endpoint_five = 'https://mcmqczd118jdz8xqdfsbxdwh96f0.rest.marketingcloudapis.com/data/v1/customobjectdata/key/5v5TryoutInformation_2022/rowset?$filter=countrycode%20eq%20%27'.$pais.'%27%20AND%20tryoutgender%20eq%20%27'.$genero.'%27';
    $api_args_five = array(
        'method'  => 'GET',
        'headers' => array(
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer '. $token_five,
        ),
        'timeout'=> 0,
    );
    $response_five = wp_remote_post( $api_endpoint_five, $api_args_five );
    $responseString_five = wp_remote_retrieve_body( $response_five );
    $r_five = json_decode($responseString_five);
    echo json_encode($r_five->items);
    wp_die();
    
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_get_tryouts', 'get_tryouts');

// Hook para usuarios logueados
add_action('wp_ajax_get_tryouts', 'get_tryouts');



/*
|-------------------------------------------------------------------------------
| Function Ajax para generar reporte
|-------------------------------------------------------------------------------
*/


function exportar_reporte(){

	$date_init  = isset($_POST['date_init']) ? $_POST['date_init'] : false;
	$date_init = sanitize_text_field($_POST['date_init']);

    $date_end  = isset($_POST['date_end']) ? $_POST['date_end'] : false;
	$date_end = sanitize_text_field($_POST['date_end']);
	
	$nom_eve  = isset($_POST['nom_evento']) ? $_POST['nom_evento'] : false;
	$nom_eve = sanitize_text_field($_POST['nom_evento']);

	

	if (!$nom_eve) {
		echo 'Ha ocurrido un error';
		wp_die();
	} else {
        if($date_init != '' && $date_end != '') {
            $date_query[] = array('after'=> $date_init,'before' => $date_end, 'inclusive' => true);
        }
        $args = array(
            'post_type' => 'registros_evento',
            'posts_per_page' => -1,
            'date_query' => $date_query
        );
        $eventos = get_posts($args);
        $path = wp_upload_dir();
        $outstream = fopen($path['path']."/reporte.csv", "w");        
        $values = [];
        $control_cols = 0;
        for ($i = 0; $i < count($eventos); $i++) {
            $nom_eve_mod = str_replace("Nuevo registro - Evento ","",$eventos[$i]->post_title);
            
            if($nom_eve_mod == $nom_eve) {
                $data = get_post_meta($eventos[$i]->ID, 'info_campos', true);
                $fields = ['Fecha de registro','Evento'];
                $values['fecha_registro'] = $eventos[$i]->post_date;
                $values['evento'] = $nom_eve;
                // var_dump($data);
                foreach($data as $dat) {
                    // if($dat['name'] != 'full_number' || $dat['name'] != 'tratamiento_datos' || $dat['name'] != 'politicas_privacidad' || $dat['name'] != 'terminos_condiciones') {
                        if(!in_array($dat['name'], $fields)) {
                        $fields[] = $dat['name'];
                        }
                        
                        
                        $values[$dat['name']] = $dat['value'];
                        if($dat['value'] == '') {
                            $dat['value'] == 'null';  
                        }
                        
                        if($dat['name'] == 'userId' && $dat['value'] != '') {
                            $the_user = get_user_by( 'id', $dat['value']);
                            $fields[] = 'Nombre';
                            $values['Nombre'] = get_user_meta($dat['value'], 'user_nombre', true);
                            $fields[] = 'Apellido';
                            $values['Apellido'] = get_user_meta($dat['value'], 'user_apellido', true);
                            $fields[] = 'Correo electrónico';
                            $values['Correo electrónico'] = $the_user->user_email;
                            $fields[] = 'País';
                            $values['País'] = get_user_meta($dat['value'], 'user_pais', true);
                            $fields[] = 'Celular';
                            $values['Celular'] = get_user_meta($dat['value'], 'user_celular', true);
                            $fields[] = 'tratamiento_datos';
                            $values['tratamiento_datos'] = 'TRUE';
                            $fields[] = 'politicas_privacidad';
                            $values['politicas_privacidad'] = 'TRUE';
                            $fields[] = 'terminos_condiciones';
                            $values['terminos_condiciones'] = 'TRUE';
                        }
                        
                    // }
                    
                }
                if($control_cols != 1) {
                    $control_cols = 1;
                    // $fields = array_map("utf8_decode", $fields);
                    fputcsv($outstream, $fields);
                }
                
                $values = array_map("utf8_decode", $values);
                fputcsv($outstream, $values);    
            }
            
            
        }
        
        fclose($outstream); 
        echo $path['url'].'/reporte.csv';
        exit;
	}
	
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_exportar_reporte', 'exportar_reporte');
// Hook para usuarios logueados
add_action('wp_ajax_exportar_reporte', 'exportar_reporte');
<?php

/***
 * @Descripcion: TRASHajax-functions.php
 * Contiene las diferentes funciones de ajax
 *
 * Estas funciones ajax son utilizadoas tanto en el front-end como en el back-end
 *
 *
 ***/


 /*
|-------------------------------------------------------------------------------
| Function Ajax para loguear usuario
|-------------------------------------------------------------------------------
*/


function login_user(){

	$user  = isset($_POST['user']) ? $_POST['user'] : false;
	$user = sanitize_text_field($_POST['user']);
	
	$pass  = isset($_POST['pass']) ? $_POST['pass'] : false;
	$pass = sanitize_text_field($_POST['pass']);

	// $credentials = [
	// 'user_login' => $user,
	// 'user_password' => $pass,
	// 'rememberme' => true,
	// ];

	// $signon = wp_signon($credentials, true);

	// if(is_wp_error($signon)){
	
	// echo '0';
	// wp_die();
	// }
	
	// echo '1';
	// wp_die();


	
	$creds = array();
	$creds['user_login'] = $user;
	$creds['user_password'] = $pass;
	$creds['remember'] = true;
	
	$user = wp_signon( $creds, false );

        if ( is_wp_error($user) ) {
            echo $user->get_error_message();
			exit;
        } else {    
            // wp_clear_auth_cookie();
            // do_action('wp_login', $user->ID);
            // wp_set_current_user($user->ID);
            // wp_set_auth_cookie($user->ID, true);
            // $redirect_to = $_SERVER['REQUEST_URI'];
            // wp_safe_redirect($redirect_to);
			echo '1';
            exit;
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


function contact(){

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

	$user = get_user_by( 'id', $user_id );
    $new = array(
        'post_title' => $nombre.' - '.$email,
        'post_type' => 'contactos',
		'post_status' => 'publish',
		'post_content' => '<h3>Nombre: '.$nombre.'</h3><h3>Email: '.$email.'</h3><h3>Pais: '.$pais.'</h3><h3>Asunto: '.$asunto.'</h3><h3>Mensaje: '.$mensaje.'</h3>'
    );

	$post_id = wp_insert_post( $new );
	
	if($post_id) {
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
	$email  = isset($_POST['email']) ? $_POST['email'] : false;
	$pais  = isset($_POST['pais']) ? $_POST['pais'] : false;
	$celular  = $_POST['celular'];
	$deporte  = $_POST['deporte'];
	$terminos  = $_POST['terminos'];
	$whatsapp  = $_POST['whatsapp'];
	$email  = $_POST['email'];

	$nombre = sanitize_text_field($_POST['nombre']);
	$email = sanitize_email($_POST['email']);
	$pais = sanitize_text_field($_POST['pais']);
	$celular = sanitize_text_field($_POST['celular']);
	$deporte = sanitize_text_field($_POST['deporte']);
	$terminos = sanitize_text_field($_POST['terminos']);
	$whatsapp = sanitize_text_field($_POST['whatsapp']);
	$email = sanitize_text_field($_POST['email']);

	if (!$nombre || !$email || !$pais) {
		echo 'Ha ocurrido un error';
	} else {

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
			update_user_meta($user_id, 'user_pais', $pais);
			update_user_meta($user_id, 'user_celular', $celular);
			update_user_meta($user_id, 'user_deporte', $deporte);
			update_user_meta($user_id, 'user_terminos', $terminos);
			update_user_meta($user_id, 'whatsapp_consent', $whatsapp);
			update_user_meta($user_id, 'email_consent', $email);

			wp_new_user_notification($user_id, 'both');

			echo '1';
			wp_die();
		}else {
            if(isset($user_id->errors['existing_user_login'])){
                echo $user_id->errors['existing_user_login'][0];
            }else{
                echo '0';
            }
        	wp_die();
		}
	}
}




// /*
// |-------------------------------------------------------------------------------
// | Function Ajax actualizar perfil
// |-------------------------------------------------------------------------------
// */


// // Hook para usuarios no logueados
// add_action('wp_ajax_nopriv_update_profile', 'update_profile');

// // Hook para usuarios logueados
// add_action('wp_ajax_update_profile', 'update_profile');

// global $current_user;

// // Función que procesa la llamada AJAX
// function update_profile()
// {


// 	// Check parameters
// 	$datosCat  = isset($_POST['datosCat']) ? $_POST['datosCat'] : false;
// 	$datosEti  = isset($_POST['datosEti']) ? $_POST['datosEti'] : false;
// 	$idUser  = isset($_POST['idUser']) ? $_POST['idUser'] : false;

// 	$datosCatf = implode(",", $datosCat);
// 	$datosEtif = implode(",", $datosEti);

// 	if (!$datosCat || !$idUser || !$datosEti) {
// 		echo 'Ha ocurrido un error';
// 	} else {
// 		update_user_meta($idUser, 'interesCategoria', $datosCatf);
// 		update_user_meta($idUser, 'interesEtiqueta', $datosEtif);
// 		echo 'Datos actualizados';
// 	}
// 	wp_die();
// }




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

	

	if (!$array_deportes || !$user) {
		echo 'Ha ocurrido un error';
	} else {
		update_user_meta($user, 'array_deportes', $array_deportes);
		// echo 'Datos actualizados';
		$ar_dep = get_user_meta($user, 'array_deportes', true);
		$tt = json_encode($ar_dep);
		echo "Datos actualizados";
		// echo $tt;
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
	$args = array(
		'post_type' => 'tarjetas',
		'posts_per_page' => $ppp,
		// 'cat' => 1,
		'offset' => $offset,
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

		get_template_part( 'template-parts/cards/cards');

	endwhile;
	else: 
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
		'posts_per_page' => $ppp,
		// 'cat' => 1,
		'offset' => $offset,
	);
	$loop = new WP_Query($args);
	if ($loop->have_posts()) :
	while ($loop->have_posts()) : $loop->the_post(); ?>
		<div class="list_card_el">
            <?php
                if (get_post_meta($post->ID, 'video_background_loop', true)) {
            ?>
                <video muted loop poster="<?php echo get_post_meta($post->ID, 'poster', true); ?>">
                    <source src="<?php echo get_post_meta($post->ID, 'video_background_loop', true); ?>" type="video/mp4">
                </video>
            <?php 
            } else {
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                $image_title = get_the_title(get_post_thumbnail_id($post->ID));
            ?>   
            <img src="<?php echo $image[0] ?>" alt="<?php echo $image_alt ?>" class="img_bg" title="<?php echo $image_title ?>">
            <?php
            }
            ?>
            <div class="list_card_el_bottom">
                <h1 class="list_card_el_bottom_tit"><?php echo the_title(); ?> </h1>
                <a href="#"
                    class="side_buttons_link favorite w-inline-block"
                    ><img
                    src="https://uploads-ssl.webflow.com/6005e026c2e3b59c35e06719/6026c3b6fb4589cf42b78ae1_favorite.svg"
                    loading="lazy"
                    class="side_buttons_link_img"
                /></a>
            </div>
            
        </div>
	<?php
		endwhile;
		else: 
			echo '0';
		 endif;
		wp_die();
}
add_action('wp_ajax_nopriv_more_post_home', 'more_post_home');
add_action('wp_ajax_more_post_home', 'more_post_home');






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
		$title =  get_the_title( $postId );
		$id_youtube = get_post_meta($postId, "id_youtube", true);
		$imagen_alterna = get_post_meta($postId, "imagen_alterna", true);
		// var_dump($imagen_alterna);
		// wp_die();
		if ($id_youtube) {
		$contenido .= '<iframe width="100%" height="315" src="https://www.youtube.com/embed/'.$id_youtube.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		} elseif($imagen_alterna) { 
		$contenido .= '<img src="'.$imagen_alterna.'" style="width:100%;">';
		}
		$contenido .= '<h1>'.$title.'</h1>';
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


add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'tarjetas' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

            <h3><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></h3>

        <?php endwhile;
        wp_reset_postdata();  
    endif;

    die();
}


/*
|-------------------------------------------------------------------------------
| Function Ajax para buscar eventos
|-------------------------------------------------------------------------------
*/


add_action('wp_ajax_data_eve' , 'data_eve');
add_action('wp_ajax_nopriv_data_eve','data_eve');
function data_eve(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'eventos' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

            <h3><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></h3>

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


add_action('wp_ajax_data_busc' , 'data_busc');
add_action('wp_ajax_nopriv_data_busc','data_busc');
function data_busc(){
	
    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => array('tarjetas', 'productos', 'eventos', 'retos')));
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

			<a href="<?php echo get_permalink(); ?>" style="position: relative;min-width: 50%;height: 205px; text-align: center;top: 0;left: 0;display: block;">
				<?php
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'lista-loop');
					$image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
					$image_title = get_the_title(get_post_thumbnail_id($post->ID));
				?>
				<img loading="lazy" src="<?php echo $image[0] ?>" style="height: 205px;" alt="<?php echo $image_alt ?>" title="<?php echo $image_title ?>" />
				<div class="tit_subcategory">
					<h2 class="content_cont_h3 bottom_line pad topics_el_tit"><?php echo the_title(); ?></h2>
					<div class="content_cont_h3_line"></div>
				</div>
			</a>

        <?php endwhile;
		wp_reset_postdata();
	else: ?>
		<style>
			.content_cont.bg_content {
				background: black;
				background-image: url(https://g1.tars.dev/wp-content/media/2021/03/404.png);
				background-position: 100% 100%;
				background-size: 100%;
				background-repeat: repeat-y;
			}
			.content_cont_p{
				display: none;
			}
			.content_cont_h1_line{
				display: none;
			}
			.sin_resultados{
				text-align: left;
				font-family: 'Gatorade black', sans-serif;
				line-height: 25px;
				font-size: 30px;
				letter-spacing: 0px;
				color: #FF851A;
				text-transform: uppercase;
				opacity: 1;
				margin-bottom: -20px;
			}
			.contenedor_resultado{
				padding-top: 190px;
				margin-left: 147px;
			}
			.result_no{
				text-align: left;
				font-family: 'Gatorade', sans-serif;
				font-size: 18px;
				color: #FFFFFF;
			}
		</style>
		<div class="contenedor_resultado">
			<p class="sin_resultados">
				<b> OOPS NO ENCONTRAMOS RESULTADOS</b>
			</p>
			<p class="result_no">
				Pero no pierdas el impulso sigue recargándote con <b> todos nuestros  contenidos. </b>
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


add_action('wp_ajax_data_ret' , 'data_ret');
add_action('wp_ajax_nopriv_data_ret','data_ret');
function data_ret(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'retos' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

            <h3><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></h3>

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


add_action('wp_ajax_data_pro' , 'data_pro');
add_action('wp_ajax_nopriv_data_pro','data_pro');
function data_pro(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'promociones' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

            <h3><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></h3>

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


function user_favorites(){

	$user  = isset($_POST['user']) ? $_POST['user'] : false;
	$user = sanitize_text_field($_POST['user']);
	
	$post  = isset($_POST['post']) ? $_POST['post'] : false;
	$post = sanitize_text_field($_POST['post']);
	$favoritos = get_user_meta($user, 'favorite_post_id', true);
	$newPost = $favoritos.','.$post;

	if (!$user || !$post) {
		echo 'Ha ocurrido un error';
		wp_die();
	} else {

		//Si todo ha ido bien, agregamos los campos adicionales
		//if (!is_wp_error($user)) {
			update_user_meta($user, 'favorite_post_id', $newPost);
			$validacionFavoritos = get_user_meta($user, 'favorite_post_id', true);
			// echo $validacionFavoritos;
			echo "Añadido a favoritos correctamente";
			wp_die();
		//}
	}
	
	
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_user_favorites', 'user_favorites');

// Hook para usuarios logueados
add_action('wp_ajax_user_favorites', 'user_favorites');




/*
|-------------------------------------------------------------------------------
| Function Ajax para inscribir en evento
|-------------------------------------------------------------------------------
*/


function evento_register(){

	$user  = isset($_POST['user']) ? $_POST['user'] : false;
	$user = sanitize_text_field($_POST['user']);

	$post  = isset($_POST['post']) ? $_POST['post'] : false;
	$post = sanitize_text_field($_POST['post']);

	$eventos = get_user_meta($user, 'evento_register', true);
	$newPost = $eventos.','.$post;
	
	
	if (!$user || !$post) {
		echo 'Ha ocurrido un error';
		wp_die();
	} else {

		//Si todo ha ido bien, agregamos los campos adicionales
		//if (!is_wp_error($user)) {
			update_user_meta($user, 'evento_register', $newPost);
			$evento_register = get_user_meta($user, 'evento_register', true);
			// echo $evento_register;
			echo "Se ha inscrito correctamente";
			wp_die();
		//}
	}
	
	
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_evento_register', 'evento_register');

// Hook para usuarios logueados
add_action('wp_ajax_evento_register', 'evento_register');


/*
|-------------------------------------------------------------------------------
| Function Ajax para guardar encuesta
|-------------------------------------------------------------------------------
*/


function guardar_encuesta(){

	$userId  = isset($_POST['userId']) ? $_POST['userId'] : false;
	$userId = sanitize_text_field($_POST['userId']);
	
	$encuestaId  = isset($_POST['encuestaId']) ? $_POST['encuestaId'] : false;
	$encuestaId = sanitize_text_field($_POST['encuestaId']);

	$opciones1  = isset($_POST['opciones1']) ? $_POST['opciones1'] : false;
	$opciones1 = sanitize_text_field($_POST['opciones1']);

	$opciones2  = isset($_POST['opciones2']) ? $_POST['opciones2'] : false;
	$opciones2 = sanitize_text_field($_POST['opciones2']);

	if (!$userId || !$encuestaId || !$opciones1 || !$opciones2) {
		echo 'Ha ocurrido un error';
		wp_die();
	} else {

		$nuevo = array($userId, $encuestaId, $opciones1, $opciones2);

		// $array_resultados = array();
		// $array_resultados = get_post_meta($encuestaId, 'resultados', true);

		update_post_meta($encuestaId, 'resultados', $nuevo);

		$res = get_post_meta($encuestaId, 'resultados', true);

		echo 'Gracias por llenar la encuesta';
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
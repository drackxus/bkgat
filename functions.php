<?php

/**
 * @Descripcion: function.php
 *
 * Funciones especificas para TORUS Tecnologia
 *
 **/

/*
|---------------------------------------------------------------------------
| Definicio de constantes para el manejo de url absolutas
|---------------------------------------------------------------------------
|
*/
// Constante URL del tema
define('WPURL', get_bloginfo('wpurl'));
define('THEMEURL', get_bloginfo('template_url'));
define('BASEPATH', dirname(__FILE__));


// Constante URL CSS
define('CSSURL', THEMEURL . '/assets/css/');

// Constante URL JS
define('JSURL', THEMEURL . '/assets/js/');

// Constante URL IMG
define('IMGURL', THEMEURL . '/assets/images/');

// Constante URL FONTS
define('FONTSURL', THEMEURL . '/assets/fonts/');

// Constante URL FONTS
define('GUTURL', THEMEURL . '/assets/gut/');

// Constante URL APP
define('APPURL', THEMEURL . '/app/');
define('APPPATH', BASEPATH . '/app/');

// Developer mode
define('MODDEV', false);

// Constante version CACHE
define('VCACHE', '1.9.0');


/*
|---------------------------------------------------------------------------
| Llamada a funciones
|---------------------------------------------------------------------------
|
*/

$fileFunctions = array('internal-functions.php', 'custom-functions.php', 'tarjetas.php', 'eventos.php' ,'formularios.php','productos.php', 'productos-latam.php' ,'retos.php', 'perfiles.php', 'preguntas.php', 'contacto.php', 'encuestas.php', 'usuario_registrado.php', 'emails.php', 'config-site.php', 'helpers-functions.php', 'ajax-functions.php', 'insertar-pixeles.php', 'registro-eventos.php', 'evento_especial.php');

foreach ($fileFunctions as $fileName) {
	require_once(APPPATH . $fileName);
}

add_theme_support( 'post-thumbnails' );

// add_image_size( 'lista-loop', 394, 240, TRUE);
// add_image_size( 'lista-eve', 172, 120, TRUE);
// add_image_size( 'destacados', 400, 400, TRUE);
// add_image_size( 'lista-pro', 54, 208, TRUE);



// Register the three useful image sizes for use in Add Media modal
add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
function wpshout_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'lista-loop' => __( 'Lista loop' ),
		'lista-eve' => __( 'Lista eventos' ),
		'destacados' => __( 'Destacados' ),
		'lista-pro' => __( 'Lista productos' ),
    ) );
}

//redirigir al home
// function wpse_lost_password_redirect() {
//     wp_redirect( home_url('registro') ); 
//     exit;
// }
// add_action('after_password_reset', 'wpse_lost_password_redirect');



function ajax_login(){

  // First check the nonce, if it fails the function will break
  check_ajax_referer( 'ajax-login-nonce', 'security' );

  // Nonce is checked, get the POST data and sign user on
  $info = array();
  $info['user_login'] = $_POST['username'];
  $info['user_password'] = $_POST['password'];
  $info['remember'] = true;

  $user_signon = wp_signon( $info, false );
  if ( is_wp_error($user_signon) ){
      echo json_encode(array('loggedin'=>false, 'message'=>__('Usuario o password incorrectos.')));
  } else {
      echo json_encode(array('loggedin'=>true, 'message'=>__('Ingreso exitoso, redirigiendo...')));
  }

  die();
}



function reset_user_pass(){

	parse_str( $_POST['form_values'], $params );

	$user = check_password_reset_key($params['key'], $params['login']);

	if ( is_wp_error($user) ) {
    $status = $user->get_error_message();
    wp_die();
  }

	// check if keys match
	if ( isset($params['pass1']) && $params['pass1'] != $params['pass3'] ){
		$status = '1';
	}else{
	// Update the user pass
		$reset = reset_password($user, $params['pass1']);
    wp_logout();
		
    if ( is_wp_error($reset) ) {
      $status = $reset->get_error_message();
      wp_die();
    }
    $status ='2';
	}

	echo $status;
	wp_die();

}


add_action( 'wp_ajax_nopriv_reset_user_pass', 'reset_user_pass' );
add_action( 'wp_ajax_reset_user_pass', 'reset_user_pass' );



function pippin_login_form_shortcode( $atts, $content = null ) {
 
	// extract( shortcode_atts( array(
  //     'redirect' => ''
  //     ), $atts ) );
 

		// if($redirect) {
		// 	$redirect_url = $redirect;
		// } else {
		// 	$redirect_url = home_url();
		// }
    $redirect_url = home_url();
		// $form = wp_login_form(array('echo' => false, 'redirect' => '/' ));
    $form = '';
        
    if (is_user_logged_in()) {
      $form .= '
    <div class="login_alert">
      <h3 class="login_alert_h">HOLA <br /><?php echo $nameUser; ?></h3>
      <br />
      <p class="login_alert_p">

        <!--<a style="color: white; text-decoration: underline" href="<?php echo wp_logout_url( home_url()); ?>" title="Logout">Salir</a>-->
      </p>
    </div>';
     }
    if (!is_user_logged_in()) {
    $form .= '<div class="form_block">
      <form name="loginform" id="loginform" action="/wp-login.php" method="post">
        <div class="field">
          <input type="text" class="form_login_input w-input"  name="log" id="user_login" placeholder="E-mail" required />
          <label for="user_login" class="form_login_label">E-mail</label>
        </div>
        <div class="field">
          <input type="password" class="form_login_input w-input" name="pwd" id="user_pass" placeholder="Contrase??a" required />
          <label for="user_pass" class="form_login_label">Contrase??a</label>
        </div>
        <input type="submit" name="wp-submit" id="wp-submit" class="login_submit w-button" value="INGRESAR">
				<input type="hidden" name="redirect_to" value="/">
      </form>
    </div>';
    }

	return $form;
}
add_shortcode('loginform', 'pippin_login_form_shortcode');

add_action( 'wp_login', 'misha_collect_login_timestamp', 20, 2 );
 
function misha_collect_login_timestamp( $user_login, $user ) {
 
	update_user_meta( $user->ID, 'last_login', time() );
 
}

// add_filter('login_redirect', 'my_login_redirect', 10, 3);
// function my_login_redirect($redirect_to, $requested_redirect_to, $user) {
//     if (is_wp_error($user)) {
//         //Login failed, find out why...
//         $error_types = array_keys($user->errors);
//         //Error type seems to be empty if none of the fields are filled out
//         $error_type = 'both_empty';
//         //Otherwise just get the first error (as far as I know there
//         //will only ever be one)
//         if (is_array($error_types) && !empty($error_types)) {
//             $error_type = $error_types[0];
//         }
//         $referrer = $_SERVER[ 'HTTP_REFERER' ];
//         wp_redirect( $referrer . "?login=failed&reason=" . $error_type ); 
//         exit;
//     } else {
//         //Login OK - redirect to another page?
//         return home_url();
//     }
// }


 //* Mover javascripts al footer 
//  function scripts_footer() {     
//    remove_action('wp_head', 'wp_print_scripts');     
//    remove_action('wp_head', 'wp_print_head_scripts', 9);     
//    remove_action('wp_head', 'wp_enqueue_scripts', 1);       
//    add_action('wp_footer', 'wp_print_scripts', 5);     
//    add_action('wp_footer', 'wp_enqueue_scripts', 5);     
//    add_action('wp_footer', 'wp_print_head_scripts', 5); 
//   } 
  
//   add_action( 'wp_enqueue_scripts', 'scripts_footer' ); 






function wpse_185243_lastpassword_post( $errors ) {
  // var_dump($errors);
  wp_redirect(home_url());
  // wp_die();
}
add_action( 'lostpassword_post', 'wpse_185243_lastpassword_post' );


//ocultar version wordpress
function bp_remove_scripts( $src ) {
  if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
  $src = remove_query_arg( 'ver', $src );
  return $src;
  }
add_filter( 'style_loader_src', 'bp_remove_scripts');
add_filter( 'script_loader_src', 'bp_remove_scripts');

function bp_remove_generator() {
return '';
}
add_filter('the_generator', 'bp_remove_generator');



//Autenticacion en API
add_filter( 'rest_authentication_errors', function( $result ) {
  // If a previous authentication check was applied,
  // pass that result along without modification.
  if ( true === $result || is_wp_error( $result ) ) {
      return $result;
  }

  // No authentication has been performed yet.
  // Return an error if user is not logged in.
  if ( ! is_user_logged_in() ) {
      return new WP_Error('rest_not_logged_in', __( 'You are not currently logged in.' ), array( 'status' => 401 ));
  }
  
  if ( ! current_user_can( 'administrator' ) ) {
    return new WP_Error( 'rest_not_admin', 'You are not an administrator.', array( 'status' => 401 ) );
  }

  // Our custom authentication check should have no effect
  // on logged-in requests
  return $result;
});

/**
 * Only allow GET requests
 */
add_action( 'rest_api_init', function() {
    
	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
	add_filter( 'rest_pre_serve_request', function( $value ) {
		$origin = get_http_origin();
		if ( $origin ) {
			header( 'Access-Control-Allow-Origin: ' . esc_url_raw( $origin ) );
		}
		header( 'Access-Control-Allow-Origin: ' . esc_url_raw( site_url() ) );
		header( 'Access-Control-Allow-Methods: GET' );

		return $value;
		
	});
}, 15 );



/**
 * Ocultar barra lateral
 */

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
}


// remove dashicons in frontend to non-admin 
function wpdocs_dequeue_dashicon() {
  if (current_user_can( 'update_core' )) {
      return;
  }
  wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );


//ANALYTICS
add_action('wp_head','my_analytics', 20);
function my_analytics() {
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-002BHJC1CP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-002BHJC1CP');
</script>
<?php
}

//Modificando los headers
function add_security_headers() {
    header( "X-Content-Type-Options: nosniff" );
    header( "X-Frame-Options: SAMEORIGIN" );
    header( "X-XSS-Protection: 1;mode=block" );
    header( "Strict-Transport-Security: max-age=10886400" );
    header( "Cache-Control: no-cache, must-revalidate, max-age=0" );
    // header( "Content-Security-Policy: default-src 'self'" );
}
add_action( "send_headers", "add_security_headers" );

//Controlar 404
add_action( 'pre_handle_404', function() {
    global $wp_query;
    
    if(!is_admin()){
        if(!$wp_query->found_posts)
        {
            $url_current = 'https://' . $_SERVER['SERVER_NAME'] . urldecode($_SERVER['REQUEST_URI']);
            $url = get_blog_details()->home.'/Politica_de_Privacidad_ES.pdf';
            if($url_current == $url) {
                wp_redirect(home_url('wp-content/media/2021/09/Poli??tica-de-privacidad.pdf'));
                exit;
            }
            if($wp_query->query_vars['s'] != '' || $wp_query->query_vars['name'] != '')
            {
                wp_redirect(home_url('oops'));
                exit;
            }
        }
        
    }

    return FALSE;
} );



//Desactivar plugin socializer en wp-login
if(!is_admin())
{
    $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (strpos($url, 'wp-login') !== false) {
        add_action( 'login_enqueue_scripts', 'plugin_hide' );
        function plugin_hide() {
            wp_enqueue_script( 'plugin-hide', JSURL. 'plugin_hide.js', array('jquery'), null, true );
        }
        $plugins = get_site_option('active_sitewide_plugins');
        $key = array_search('super-socializer/super_socializer.php', array_keys($plugins));
        if (false !== $key && $key > -1) unset($plugins['super-socializer/super_socializer.php']);
        update_site_option('active_sitewide_plugins', $plugins);
    } else {
        $plugins = get_site_option('active_sitewide_plugins');
        $plugins['super-socializer/super_socializer.php'] = time();
        update_site_option('active_sitewide_plugins', $plugins);
    }
}


function my_redirect_home( $lostpassword_redirect ) {
    $lostpass_page = home_url('recuperar-contrasena');
    wp_redirect($lostpass_page);
    exit;
}
add_filter( 'lostpassword_redirect', 'my_redirect_home' );

if(!is_admin()) {
    $url = (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if (strpos($url,'https%3A%2F%2Fwww.googleapis.com') !== false) {
        $new_url = str_replace("https","http",$url);
        wp_redirect($new_url);
        die;
    }
}


//Estilos landing lanzamientos
add_action( 'enqueue_block_editor_assets', 'misha_block_assets' );
function misha_block_assets(){
	wp_enqueue_style('misha-newsletter-css', GUTURL.'block-newsletter.css', array( 'wp-edit-blocks' ), '3.0');
}

add_action( 'wp_enqueue_scripts', 'misha_block_front_end_assets' );
function misha_block_front_end_assets(){
	wp_enqueue_style('wp-block-misha-newsletter-css', GUTURL.'newsletter.css', array());

}

//Crear pagina lanzamientos con landing por defecto
function pagina_lanzamientos() {
	$queried_post = get_page_by_path('lanzamientos',OBJECT,'page');
	if($queried_post) {
	} else {
		$new = array(
			'post_title' => 'Lanzamientos',
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_content' => "<!-- wp:group -->\n<div class=\"wp-block-group\"><!-- wp:group {\"className\":\"width_full\"} -->\n<div class=\"wp-block-group width_full\"><!-- wp:image {\"id\":1816,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"https://g1.tars.dev/co/wp-content/media/sites/2/2022/05/Enmascarar-grupo-50-1.jpg\" alt=\"\" class=\"wp-image-1816\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:group -->\n\n<!-- wp:heading {\"level\":1,\"className\":\"lanzamientos\"} -->\n<h1 class=\"lanzamientos\" id=\"h-gatorlyte\">GATORLYTE</h1>\n<!-- /wp:heading -->\n\n<!-- wp:html -->\n<div class=\"line line_lan\"></div>\n<!-- /wp:html -->\n\n<!-- wp:paragraph {\"className\":\"lanzamientos\"} -->\n<p class=\"lanzamientos\">FORMULADO CIENT??FICAMENTE<br>PARA UNA REHIDRATACI??N R??PIDA</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Menos az??car y m??s electrolitos son los atributos que definen a Gatorlyte, la bebida deportiva m??s nueva de la marca Gatorade de PepsiCo, la cual fue dise??ada para atletas que buscan una ???rehidrataci??n r??pida???.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:html -->\n<iframe width=\"100%\" height=\"375\" src=\"https://www.youtube.com/embed/N3XXr5-uih8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\"></iframe>\n<!-- /wp:html -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Disponible en sabores d<strong>e lima cereza, naranja y kiwi fresa,</strong> Gatorlyte contiene menos az??car que el Gatorade regular y presenta una mezcla de cinco electrolitos, que incluyen sodio, potasio, calcio, cloruro y magnesio. <strong>Cada botella de 20 onzas contiene 50 calor??as y 12 gramos de az??cares a??adidos, a diferencia de los 48 gramos de az??cares a??adidos del Gatorade original.</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:cover {\"url\":\"https://g1.tars.dev/co/wp-content/media/sites/2/2022/05/Enmascarar-grupo-52-1.jpg\",\"id\":1815,\"dimRatio\":50,\"className\":\"caracterisiticas_sec\"} -->\n<div class=\"wp-block-cover caracterisiticas_sec\"><span aria-hidden=\"true\" class=\"wp-block-cover__gradient-background has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-1815\" alt=\"\" src=\"https://g1.tars.dev/co/wp-content/media/sites/2/2022/05/Enmascarar-grupo-52-1.jpg\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"placeholder\":\"Escribe el t??tulo???\",\"className\":\"lanzamientos2\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center lanzamientos2 has-large-font-size\">CARACTER??STICAS:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns {\"className\":\"col_width\"} -->\n<div class=\"wp-block-columns col_width\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group {\"className\":\"caracteristica_el\"} -->\n<div class=\"wp-block-group caracteristica_el\"><!-- wp:group {\"className\":\"flex_hor\"} -->\n<div class=\"wp-block-group flex_hor\"><!-- wp:paragraph {\"align\":\"center\",\"className\":\"caract_num\"} -->\n<p class=\"has-text-align-center caract_num\">50</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"className\":\"gramos\"} -->\n<p class=\"gramos\"></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"caract_name\"} -->\n<p class=\"has-text-align-center caract_name\">Calorias</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"id\":1833,\"sizeSlug\":\"full\",\"linkDestination\":\"none\",\"className\":\"caract_img\"} -->\n<figure class=\"wp-block-image size-full caract_img\"><img src=\"https://g1.tars.dev/co/wp-content/media/sites/2/2022/05/Imagen-1.png\" alt=\"\" class=\"wp-image-1833\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group {\"className\":\"caracteristica_el\"} -->\n<div class=\"wp-block-group caracteristica_el\"><!-- wp:group {\"className\":\"flex_hor\"} -->\n<div class=\"wp-block-group flex_hor\"><!-- wp:paragraph {\"align\":\"center\",\"className\":\"caract_num\"} -->\n<p class=\"has-text-align-center caract_num\">490</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"className\":\"gramos\"} -->\n<p class=\"gramos\">mg</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"caract_name\"} -->\n<p class=\"has-text-align-center caract_name\">Sodio</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"id\":1842,\"sizeSlug\":\"full\",\"linkDestination\":\"none\",\"className\":\"caract_img\"} -->\n<figure class=\"wp-block-image size-full caract_img\"><img src=\"https://g1.tars.dev/co/wp-content/media/sites/2/2022/05/Imagen-2.png\" alt=\"\" class=\"wp-image-1842\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group {\"className\":\"caracteristica_el\"} -->\n<div class=\"wp-block-group caracteristica_el\"><!-- wp:group {\"className\":\"flex_hor\"} -->\n<div class=\"wp-block-group flex_hor\"><!-- wp:paragraph {\"align\":\"center\",\"className\":\"caract_num\"} -->\n<p class=\"has-text-align-center caract_num\">14</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"className\":\"gramos\"} -->\n<p class=\"gramos\">g</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"caract_name\"} -->\n<p class=\"has-text-align-center caract_name\">Carbohidratos</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"id\":1843,\"sizeSlug\":\"full\",\"linkDestination\":\"none\",\"className\":\"caract_img\"} -->\n<figure class=\"wp-block-image size-full caract_img\"><img src=\"https://g1.tars.dev/co/wp-content/media/sites/2/2022/05/Imagen-3.png\" alt=\"\" class=\"wp-image-1843\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group {\"className\":\"caracteristica_el\"} -->\n<div class=\"wp-block-group caracteristica_el\"><!-- wp:group {\"className\":\"flex_hor\"} -->\n<div class=\"wp-block-group flex_hor\"><!-- wp:paragraph {\"align\":\"center\",\"className\":\"caract_num\"} -->\n<p class=\"has-text-align-center caract_num\">350</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"className\":\"gramos\"} -->\n<p class=\"gramos\">mg</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"caract_name\"} -->\n<p class=\"has-text-align-center caract_name\">Potasio</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"id\":1845,\"sizeSlug\":\"full\",\"linkDestination\":\"none\",\"className\":\"caract_img\"} -->\n<figure class=\"wp-block-image size-full caract_img\"><img src=\"https://g1.tars.dev/co/wp-content/media/sites/2/2022/05/Imagen-4.png\" alt=\"\" class=\"wp-image-1845\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:group --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->\n\n<!-- wp:image {\"id\":1821,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"https://g1.tars.dev/co/wp-content/media/sites/2/2022/05/BANNER1F.png\" alt=\"\" class=\"wp-image-1821\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"formulado\"} -->\n<p class=\"has-text-align-center formulado\"><strong>FORMULADO CIENT??FICAMENTE<br>PARA UNA <mark style=\"background-color:rgba(0, 0, 0, 0)\" class=\"has-inline-color has-luminous-vivid-orange-color\">REHIDRATACI??N R??PIDA</mark></strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:group -->"
		);
		$post_id = wp_insert_post($new);
	}
}
add_action('init', 'pagina_lanzamientos');

?>
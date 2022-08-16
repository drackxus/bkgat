<?php

function registrar_configuraciones() {
    add_option( 'politica_privacidad', '');
    add_option( 'terminos_condiciones', '');
    add_option( 'tratamiento_datos', '');
    add_option( 'facebook', 'https://facebook.com');
    add_option( 'instagram', 'https://instagram.com');
    add_option( 'twitter', 'https://twitter.com');
    add_option( 'youtube', 'https://youtube.com');
    add_option( 'show_whatsapp', '');
    add_option( 'whatsapp', '');
    add_option( 'pepsico', 'https://pepsico.com');
    add_option( 'gatorade', 'https://gatorade.com');
    add_option( 'max_destacados', '4');
    add_option( 'max_categorias', '8');
    add_option( 'banner_producto_desktop', '');
    add_option( 'banner_producto_mobile', '');
    add_option( 'banner_home_desktop', '');
    add_option( 'banner_eventos_desktop', '');
    add_option( 'banner_eventos_mobile', '');
    add_option( 'banner_retos_desktop', '');
    add_option( 'banner_retos_mobile', '');
    add_option( 'trabaja', '');
    add_option( 'menu_productos', 'PRODUCTOS');
    add_option( 'menu_categorias', 'CATEGORÍAS');
    add_option( 'menu_eventos', 'EVENTOS');
    add_option( 'menu_retos', 'RETOS');
    add_option( 'menu_lanzamientos', 'LANZAMIENTOS');
    add_option( 'img_categoria_defecto', 'https://g1.tars.dev/co/wp-content/themes/gatorade/assets/images/img_categoria_defecto.jpg');

    add_option( 'estado_foto_perfil', 'pausado');
    add_option( 'mensaje_foto_perfil', 'Reto cumplido');
    add_option( 'puntos_foto_perfil', '1');
    add_option( 'video_medalla_foto_perfil', '');
    add_option( 'imagen_correo_foto_perfil', '');
    add_option( 'titulo_medalla_foto_perfil', '');
    add_option( 'descripcion_foto_perfil', '');

    add_option( 'estado_favorito_contenido', 'pausado');
    add_option( 'mensaje_favorito_contenido', 'Reto cumplido');
    add_option( 'puntos_favorito_contenido', '1');
    add_option( 'video_medalla_favorito_contenido', '');
    add_option( 'imagen_correo_favorito_contenido', '');
    add_option( 'titulo_medalla_favorito_contenido', '');
    add_option( 'descripcion_favorito_contenido', '');

    add_option( 'estado_editar_deportes', 'pausado');
    add_option( 'mensaje_editar_deportes', 'Reto cumplido');
    add_option( 'puntos_editar_deportes', '1');
    add_option( 'video_medalla_editar_deportes', '');
    add_option( 'imagen_correo_editar_deportes', '');
    add_option( 'titulo_medalla_editar_deportes', '');
    add_option( 'descripcion_editar_deportes', '');

    add_option( 'estado_inscripcion_evento', 'pausado');
    add_option( 'mensaje_inscripcion_evento', 'Reto cumplido');
    add_option( 'puntos_inscripcion_evento', '1');
    add_option( 'video_medalla_inscripcion_evento', '');
    add_option( 'imagen_correo_inscripcion_evento', '');
    add_option( 'titulo_medalla_inscripcion_evento', '');
    add_option( 'descripcion_inscripcion_evento', '');

    add_option( 'estado_conocer_producto', 'pausado');
    add_option( 'mensaje_conocer_producto', 'Reto cumplido');
    add_option( 'puntos_conocer_producto', '1');
    add_option( 'video_medalla_conocer_producto', '');
    add_option( 'imagen_correo_conocer_producto', '');
    add_option( 'titulo_medalla_conocer_producto', '');
    add_option( 'descripcion_conocer_producto', '');

    add_option( 'estado_llenar_encuesta', 'pausado');
    add_option( 'mensaje_llenar_encuesta', 'Reto cumplido');
    add_option( 'puntos_llenar_encuesta', '1');
    add_option( 'video_medalla_llenar_encuesta', '');
    add_option( 'imagen_correo_llenar_encuesta', '');
    add_option( 'titulo_medalla_llenar_encuesta', '');
    add_option( 'descripcion_llenar_encuesta', '');

    add_option( 'estado_registrarse', 'pausado');
    add_option( 'mensaje_registrarse', 'Reto cumplido');
    add_option( 'puntos_registrarse', '1');
    add_option( 'video_medalla_registrarse', '');
    add_option( 'imagen_correo_registrarse', '');
    add_option( 'titulo_medalla_registrarse', '');
    add_option( 'descripcion_registrarse', '');

    add_option( 'pixel_google_ads', '');
    add_option( 'pixel_facebook', '');
    add_option( 'pixel_dv360', '');
    add_option( 'pixel_general', '');
    add_option( 'pixel_home', '');
    add_option( 'pixel_productos', '');
    add_option( 'pixel_categorias', '');
    add_option( 'pixel_aventos', '');
    add_option( 'pixel_registro', '');
    add_option( 'terminos_edad', '');

    add_option( 'pixel_registro_head', '');
    add_option( 'pixel_registro_body', '');
    add_option( 'pixel_registro_head_tag', '');

    add_option( 'pagina_lanzamientos', '');

    $settingsArray = array (
        'politica_privacidad', 
        'terminos_condiciones',
        'tratamiento_datos',
        'facebook', 
        'instagram',
        'twitter',
        'youtube',
        'pepsico',
        'show_whatsapp',
        'whatsapp',
        'gatorade',
        'max_destacados',
        'max_categorias',
        'banner_producto_desktop',
        'banner_producto_mobile',
        'banner_home_desktop',
        'banner_eventos_desktop',
        'banner_eventos_mobile',
        'banner_retos_desktop',
        'banner_retos_mobile',
        'trabaja',
        'menu_productos',
        'menu_categorias',
        'menu_eventos',
        'menu_retos',
        'menu_lanzamientos',
        'img_categoria_defecto',
        'estado_foto_perfil',
        'mensaje_foto_perfil',
        'puntos_foto_perfil',
        'video_medalla_foto_perfil',
        'imagen_correo_foto_perfil',
        'titulo_medalla_foto_perfil',
        'descripcion_foto_perfil',
        'estado_favorito_contenido',
        'mensaje_favorito_contenido',
        'puntos_favorito_contenido',
        'video_medalla_favorito_contenido',
        'imagen_correo_favorito_contenido',
        'titulo_medalla_favorito_contenido',
        'descripcion_favorito_contenido',
        'estado_editar_deportes',
        'mensaje_editar_deportes',
        'puntos_editar_deportes',
        'video_medalla_editar_deportes',
        'imagen_correo_editar_deportes',
        'titulo_medalla_editar_deportes',
        'descripcion_editar_deportes',
        'estado_inscripcion_evento',
        'mensaje_inscripcion_evento',
        'puntos_inscripcion_evento',
        'video_medalla_inscripcion_evento',
        'imagen_correo_inscripcion_evento',
        'titulo_medalla_inscripcion_evento',
        'descripcion_inscripcion_evento',
        'estado_conocer_producto',
        'mensaje_conocer_producto',
        'puntos_conocer_producto',
        'video_medalla_conocer_producto',
        'imagen_correo_conocer_producto',
        'titulo_medalla_conocer_producto',
        'descripcion_conocer_producto',
        'estado_llenar_encuesta',
        'mensaje_llenar_encuesta',
        'puntos_llenar_encuesta',
        'video_medalla_llenar_encuesta',
        'imagen_correo_llenar_encuesta',
        'titulo_medalla_llenar_encuesta',
        'descripcion_llenar_encuesta',
        'estado_registrarse',
        'mensaje_registrarse',
        'puntos_registrarse',
        'video_medalla_registrarse',
        'imagen_correo_registrarse',
        'titulo_medalla_registrarse',
        'descripcion_registrarse',
        'pixel_google_ads',
        'pixel_facebook',
        'pixel_dv360',
        'pixel_general',
        'pixel_home',
        'pixel_categorias',
        'pixel_productos',
        'pixel_eventos',
        'pixel_registro',
        'terminos_edad',
        'pagina_lanzamientos',
        'pixel_registro_head',
        'pixel_registro_body',
        'pixel_registro_head_tag',
  );

  foreach ($settingsArray as $setting) {
      register_setting( 'configuraciones_app', $setting, 'myplugin_callback');
  }
 }
 add_action( 'admin_init', 'registrar_configuraciones' );


 function pagina_configuraciones() {
    add_options_page('Configuración', 'Configuración App', 'manage_options', 'configuraciones', 'contenido_pagina_config');
  }
  add_action('admin_menu', 'pagina_configuraciones');




 function contenido_pagina_config()
{
    $estado_foto_perfil = get_option('estado_foto_perfil');
    $estado_favorito_contenido = get_option('estado_favorito_contenido');
    $estado_llenar_encuesta = get_option('estado_llenar_encuesta');
    $estado_registrarse = get_option('estado_registrarse');
    $estado_editar_deportes = get_option('estado_editar_deportes');
    $estado_inscripcion_evento = get_option('estado_inscripcion_evento');
    $estado_conocer_producto = get_option('estado_conocer_producto');
    //Get the active tab from the $_GET param
    $default_tab = null;
    $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
?>
<style>
    .nav-tab {
        cursor: pointer;
    }
    .contenido_tab {
        display: none;
    }
</style>
<div>
  <?php screen_icon(); ?>
  <form method="post" action="options.php">
    <?php settings_fields( 'configuraciones_app' ); ?>

    <div class="wrap">
        <!-- Print the page title -->
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <!-- Here are our tabs -->
        <nav class="nav-tab-wrapper">
            <a tab="general" class="nav-tab nav-tab-active">General</a>
            <a tab="desktop" class="nav-tab">Desktop</a>
            <a tab="mobile" class="nav-tab">Mobile</a>
            <a tab="retos" class="nav-tab">Retos</a>
            <a tab="deportes" class="nav-tab">Deportes</a>
            <a tab="eventos" class="nav-tab">Eventos</a>
            <a tab="pixeles" class="nav-tab">Pixeles</a>
            <a tab="registro" class="nav-tab">Registro</a>
            <a tab="lanzamientos" class="nav-tab">Lanzamientos</a>
        </nav>

        <div class="tab-content">
            <table class="form-table contenido_tab" role="presentation" tab-cont="desktop">
                <tbody>

                    <tr>
                        <th scope="row">Banners</th>
                        <td>
                            <fieldset>
                                <label for="banner_home_desktop" style="width:13em;font-weight:bold;">Home:</label>
                                <input
                                type="text"
                                id="banner_home_desktop"
                                name="banner_home_desktop"
                                value="<?php echo get_option('banner_home_desktop'); ?>"
                                />
                                <a class="upload_banner_home_desktop button button-secondary"><?php _e('Seleccionar banner'); ?></a>
                                <br><br>
                                <label for="banner_producto_desktop" style="width:13em;font-weight:bold;">Productos:</label>
                                <input
                                type="text"
                                id="banner_producto_desktop"
                                name="banner_producto_desktop"
                                value="<?php echo get_option('banner_producto_desktop'); ?>"
                                />
                                <a class="upload_banner_producto_desktop button button-secondary"><?php _e('Seleccionar banner'); ?></a>
                                <br><br>
                                <label for="banner_eventos_desktop" style="width:13em;font-weight:bold;">Eventos:</label>
                                <input
                                type="text"
                                id="banner_eventos_desktop"
                                name="banner_eventos_desktop"
                                value="<?php echo get_option('banner_eventos_desktop'); ?>"
                                />
                                <a class="upload_banner_eventos_desktop button button-secondary"><?php _e('Seleccionar banner'); ?></a>
                                <br><br>
                                <label for="banner_retos_desktop" style="width:13em;font-weight:bold;">Retos:</label>
                                <input
                                type="text"
                                id="banner_retos_desktop"
                                name="banner_retos_desktop"
                                value="<?php echo get_option('banner_retos_desktop'); ?>"
                                />
                                <a class="upload_banner_retos_desktop button button-secondary"><?php _e('Seleccionar banner'); ?></a>
                            </fieldset>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <table class="form-table contenido_tab" role="presentation" tab-cont="mobile">
                <tbody>

                    <tr>
                        <th scope="row">Banners</th>
                        <td>
                            <fieldset>
                                <label for="banner_producto_mobile" style="width:13em;font-weight:bold;">Productos:</label>
                                <input
                                type="text"
                                id="banner_producto_mobile"
                                name="banner_producto_mobile"
                                value="<?php echo get_option('banner_producto_mobile'); ?>"
                                />
                                <a class="upload_banner_producto_mobile button button-secondary"><?php _e('Seleccionar banner'); ?></a>
                                <br><br>
                                <label for="banner_eventos_mobile" style="width:13em;font-weight:bold;">Eventos:</label>
                                <input
                                type="text"
                                id="banner_eventos_mobile"
                                name="banner_eventos_mobile"
                                value="<?php echo get_option('banner_eventos_mobile'); ?>"
                                />
                                <a class="upload_banner_eventos_mobile button button-secondary"><?php _e('Seleccionar banner'); ?></a>
                                <br><br>
                                <label for="banner_retos_mobile" style="width:13em;font-weight:bold;">Retos:</label>
                                <input
                                type="text"
                                id="banner_retos_mobile"
                                name="banner_retos_mobile"
                                value="<?php echo get_option('banner_retos_mobile'); ?>"
                                />
                                <a class="upload_banner_retos_mobile button button-secondary"><?php _e('Seleccionar banner'); ?></a>
                            </fieldset>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <table class="form-table contenido_tab" role="presentation" tab-cont="retos">
                <tbody>

                    <tr>
                        <th scope="row">Reto "Subir imagen de perfil"</th>
                        <td>
                            <fieldset>
                                <label for="estado_foto_perfil" style="width:13em;font-weight:bold;">Estado:</label>
                                <select name="estado_foto_perfil" id="estado_foto_perfil" required>
                                    <option value="activo" <?php selected( $estado_foto_perfil, 'activo' ); ?>>Activo</option>
                                    <option value="pausado" <?php selected( $estado_foto_perfil, 'pausado' ); ?>>Pausado</option>
                                </select>
                                <br><br>
                                <label for="mensaje_foto_perfil" style="width:13em;font-weight:bold;">Mensaje reto completado (popup y email):</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="mensaje_foto_perfil"
                                name="mensaje_foto_perfil"
                                value="<?php echo get_option('mensaje_foto_perfil'); ?>"
                                />
                                <br><br>
                                <label for="puntos_foto_perfil" style="width:13em;font-weight:bold;">Puntos:</label>
                                <input
                                class="components-text-control__input"
                                type="number"
                                id="puntos_foto_perfil"
                                name="puntos_foto_perfil"
                                value="<?php echo get_option('puntos_foto_perfil'); ?>"
                                />
                                <br><br>
                                <label for="titulo_medalla_foto_perfil" style="width:13em;font-weight:bold;">Titulo medalla:</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="titulo_medalla_foto_perfil"
                                name="titulo_medalla_foto_perfil"
                                value="<?php echo get_option('titulo_medalla_foto_perfil'); ?>"
                                />
                                <br><br>
                                <label for="video_medalla_foto_perfil" style="width:13em;font-weight:bold;">Video medalla:</label>
                                <input 
                                type="text"
                                id="video_medalla_foto_perfil"
                                name="video_medalla_foto_perfil"
                                value="<?php echo get_option('video_medalla_foto_perfil'); ?>"
                                onkeypress="return false;">
                                <input type="button" id="upload_video_medalla_foto_perfil" class="button button-secondary" value="Subir video" />
                                <br><br>
                                <label for="imagen_correo_foto_perfil" style="width:13em;font-weight:bold;">Imagen cabecera email:</label>
                                <input
                                name="imagen_correo_foto_perfil"
                                type="text"
                                id="imagen_correo_foto_perfil"
                                value="<?php echo get_option('imagen_correo_foto_perfil'); ?>" 
                                onkeypress="return false;">
                                <input type="button" id="upload_imagen_correo_foto_perfil" class="button button-secondary" value="Subir imagen" />
                                <br><br>
                                <label for="descripcion_foto_perfil" style="width:13em;font-weight:bold;">Descripción popup:</label>
                                <textarea id="descripcion_foto_perfil" name="descripcion_foto_perfil" rows="3" cols="60" maxlength="60"><?php echo get_option('descripcion_foto_perfil'); ?></textarea>
                                <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
                            </fieldset>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Reto "Favorito al primer contenido"</th>
                        <td>
                            <fieldset>
                                <label for="estado_favorito_contenido" style="width:13em;font-weight:bold;">Estado:</label>
                                <select name="estado_favorito_contenido" id="estado_favorito_contenido" required>
                                    <option value="activo" <?php selected( $estado_favorito_contenido, 'activo' ); ?>>Activo</option>
                                    <option value="pausado" <?php selected( $estado_favorito_contenido, 'pausado' ); ?>>Pausado</option>
                                </select>
                                <br><br>
                                <label for="mensaje_favorito_contenido" style="width:13em;font-weight:bold;">Mensaje reto completado (popup y email):</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="mensaje_favorito_contenido"
                                name="mensaje_favorito_contenido"
                                value="<?php echo get_option('mensaje_favorito_contenido'); ?>"
                                />
                                <br><br>
                                <label for="puntos_favorito_contenido" style="width:13em;font-weight:bold;">Puntos:</label>
                                <input
                                class="components-text-control__input"
                                type="number"
                                id="puntos_favorito_contenido"
                                name="puntos_favorito_contenido"
                                value="<?php echo get_option('puntos_favorito_contenido'); ?>"
                                />
                                <br><br>
                                <label for="titulo_medalla_favorito_contenido" style="width:13em;font-weight:bold;">Titulo medalla:</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="titulo_medalla_favorito_contenido"
                                name="titulo_medalla_favorito_contenido"
                                value="<?php echo get_option('titulo_medalla_favorito_contenido'); ?>"
                                />
                                <br><br>
                                <label for="video_medalla_favorito_contenido" style="width:13em;font-weight:bold;">Video medalla:</label>
                                <input 
                                type="text"
                                id="video_medalla_favorito_contenido"
                                name="video_medalla_favorito_contenido"
                                value="<?php echo get_option('video_medalla_favorito_contenido'); ?>"
                                onkeypress="return false;">
                                <input type="button" id="upload_video_medalla_favorito_contenido" class="button button-secondary" value="Subir video" />
                                <br><br>
                                <label for="imagen_correo_favorito_contenido" style="width:13em;font-weight:bold;">Imagen cabecera email:</label>
                                <input
                                name="imagen_correo_favorito_contenido"
                                type="text"
                                id="imagen_correo_favorito_contenido"
                                value="<?php echo get_option('imagen_correo_favorito_contenido'); ?>" 
                                onkeypress="return false;">
                                <input type="button" id="upload_imagen_correo_favorito_contenido" class="button button-secondary" value="Subir imagen" />
                                <br><br>
                                <label for="descripcion_favorito_contenido" style="width:13em;font-weight:bold;">Descripción popup:</label>
                                <textarea id="descripcion_favorito_contenido" name="descripcion_favorito_contenido" rows="3" cols="60" maxlength="60"><?php echo get_option('descripcion_favorito_contenido'); ?></textarea>
                                <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
                            </fieldset>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Reto "Editar mis deportes"</th>
                        <td>
                            <fieldset>
                                <label for="estado_editar_deportes" style="width:13em;font-weight:bold;">Estado:</label>
                                <select name="estado_editar_deportes" id="estado_editar_deportes" required>
                                    <option value="activo" <?php selected( $estado_editar_deportes, 'activo' ); ?>>Activo</option>
                                    <option value="pausado" <?php selected( $estado_editar_deportes, 'pausado' ); ?>>Pausado</option>
                                </select>
                                <br><br>
                                <label for="mensaje_editar_deportes" style="width:13em;font-weight:bold;">Mensaje reto completado (popup y email):</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="mensaje_editar_deportes"
                                name="mensaje_editar_deportes"
                                value="<?php echo get_option('mensaje_editar_deportes'); ?>"
                                />
                                <br><br>
                                <label for="puntos_editar_deportes" style="width:13em;font-weight:bold;">Puntos:</label>
                                <input
                                class="components-text-control__input"
                                type="number"
                                id="puntos_editar_deportes"
                                name="puntos_editar_deportes"
                                value="<?php echo get_option('puntos_editar_deportes'); ?>"
                                />
                                <br><br>
                                <label for="titulo_medalla_editar_deportes" style="width:13em;font-weight:bold;">Titulo medalla:</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="titulo_medalla_editar_deportes"
                                name="titulo_medalla_editar_deportes"
                                value="<?php echo get_option('titulo_medalla_editar_deportes'); ?>"
                                />
                                <br><br>
                                <label for="video_medalla_editar_deportes" style="width:13em;font-weight:bold;">Video medalla:</label>
                                <input 
                                type="text"
                                id="video_medalla_editar_deportes"
                                name="video_medalla_editar_deportes"
                                value="<?php echo get_option('video_medalla_editar_deportes'); ?>"
                                onkeypress="return false;">
                                <input type="button" id="upload_video_medalla_editar_deportes" class="button button-secondary" value="Subir video" />
                                <br><br>
                                <label for="imagen_correo_editar_deportes" style="width:13em;font-weight:bold;">Imagen cabecera email:</label>
                                <input
                                name="imagen_correo_editar_deportes"
                                type="text"
                                id="imagen_correo_editar_deportes"
                                value="<?php echo get_option('imagen_correo_editar_deportes'); ?>" 
                                onkeypress="return false;">
                                <input type="button" id="upload_imagen_correo_editar_deportes" class="button button-secondary" value="Subir imagen" />
                                <br><br>
                                <label for="descripcion_editar_deportes" style="width:13em;font-weight:bold;">Descripción popup:</label>
                                <textarea id="descripcion_editar_deportes" name="descripcion_editar_deportes" rows="3" cols="60" maxlength="60"><?php echo get_option('descripcion_editar_deportes'); ?></textarea>
                                <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
                            </fieldset>
                        </td>
                    </tr>
                    
                     <tr>
                        <th scope="row">Reto "Inscripción en evento"</th>
                        <td>
                            <fieldset>
                                <label for="estado_inscripcion_evento" style="width:13em;font-weight:bold;">Estado:</label>
                                <select name="estado_inscripcion_evento" id="estado_inscripcion_evento" required>
                                    <option value="activo" <?php selected( $estado_inscripcion_evento, 'activo' ); ?>>Activo</option>
                                    <option value="pausado" <?php selected( $estado_inscripcion_evento, 'pausado' ); ?>>Pausado</option>
                                </select>
                                <br><br>
                                <label for="mensaje_inscripcion_evento" style="width:13em;font-weight:bold;">Mensaje reto completado (popup y email):</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="mensaje_inscripcion_evento"
                                name="mensaje_inscripcion_evento"
                                value="<?php echo get_option('mensaje_inscripcion_evento'); ?>"
                                />
                                <br><br>
                                <label for="puntos_inscripcion_evento" style="width:13em;font-weight:bold;">Puntos:</label>
                                <input
                                class="components-text-control__input"
                                type="number"
                                id="puntos_inscripcion_evento"
                                name="puntos_inscripcion_evento"
                                value="<?php echo get_option('puntos_inscripcion_evento'); ?>"
                                />
                                <br><br>
                                <label for="titulo_medalla_inscripcion_evento" style="width:13em;font-weight:bold;">Titulo medalla:</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="titulo_medalla_inscripcion_evento"
                                name="titulo_medalla_inscripcion_evento"
                                value="<?php echo get_option('titulo_medalla_inscripcion_evento'); ?>"
                                />
                                <br><br>
                                <label for="video_medalla_inscripcion_evento" style="width:13em;font-weight:bold;">Video medalla:</label>
                                <input 
                                type="text"
                                id="video_medalla_inscripcion_evento"
                                name="video_medalla_inscripcion_evento"
                                value="<?php echo get_option('video_medalla_inscripcion_evento'); ?>"
                                onkeypress="return false;">
                                <input type="button" id="upload_video_medalla_inscripcion_evento" class="button button-secondary" value="Subir video" />
                                <br><br>
                                <label for="imagen_correo_inscripcion_evento" style="width:13em;font-weight:bold;">Imagen cabecera email:</label>
                                <input
                                name="imagen_correo_inscripcion_evento"
                                type="text"
                                id="imagen_correo_inscripcion_evento"
                                value="<?php echo get_option('imagen_correo_inscripcion_evento'); ?>" 
                                onkeypress="return false;">
                                <input type="button" id="upload_imagen_correo_inscripcion_evento" class="button button-secondary" value="Subir imagen" />
                                <br><br>
                                <label for="descripcion_inscripcion_evento" style="width:13em;font-weight:bold;">Descripción popup:</label>
                                <textarea id="descripcion_inscripcion_evento" name="descripcion_inscripcion_evento" rows="3" cols="60" maxlength="60"><?php echo get_option('descripcion_inscripcion_evento'); ?></textarea>
                                <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
                            </fieldset>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Reto "Conocer un producto"</th>
                        <td>
                            <fieldset>
                                <label for="estado_conocer_producto" style="width:13em;font-weight:bold;">Estado:</label>
                                <select name="estado_conocer_producto" id="estado_conocer_producto" required>
                                    <option value="activo" <?php selected( $estado_conocer_producto, 'activo' ); ?>>Activo</option>
                                    <option value="pausado" <?php selected( $estado_conocer_producto, 'pausado' ); ?>>Pausado</option>
                                </select>
                                <br><br>
                                <label for="mensaje_conocer_producto" style="width:13em;font-weight:bold;">Mensaje reto completado (popup y email):</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="mensaje_conocer_producto"
                                name="mensaje_conocer_producto"
                                value="<?php echo get_option('mensaje_conocer_producto'); ?>"
                                />
                                <br><br>
                                <label for="puntos_conocer_producto" style="width:13em;font-weight:bold;">Puntos:</label>
                                <input
                                class="components-text-control__input"
                                type="number"
                                id="puntos_conocer_producto"
                                name="puntos_conocer_producto"
                                value="<?php echo get_option('puntos_conocer_producto'); ?>"
                                />
                                <br><br>
                                <label for="titulo_medalla_conocer_producto" style="width:13em;font-weight:bold;">Titulo medalla:</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="titulo_medalla_conocer_producto"
                                name="titulo_medalla_conocer_producto"
                                value="<?php echo get_option('titulo_medalla_conocer_producto'); ?>"
                                />
                                <br><br>
                                <label for="video_medalla_conocer_producto" style="width:13em;font-weight:bold;">Video medalla:</label>
                                <input 
                                type="text"
                                id="video_medalla_conocer_producto"
                                name="video_medalla_conocer_producto"
                                value="<?php echo get_option('video_medalla_conocer_producto'); ?>"
                                onkeypress="return false;">
                                <input type="button" id="upload_video_medalla_conocer_producto" class="button button-secondary" value="Subir video" />
                                <br><br>
                                <label for="imagen_correo_conocer_producto" style="width:13em;font-weight:bold;">Imagen cabecera email:</label>
                                <input
                                name="imagen_correo_conocer_producto"
                                type="text"
                                id="imagen_correo_conocer_producto"
                                value="<?php echo get_option('imagen_correo_conocer_producto'); ?>" 
                                onkeypress="return false;">
                                <input type="button" id="upload_imagen_correo_conocer_producto" class="button button-secondary" value="Subir imagen" />
                                <br><br>
                                <label for="descripcion_conocer_producto" style="width:13em;font-weight:bold;">Descripción popup:</label>
                                <textarea id="descripcion_conocer_producto" name="descripcion_conocer_producto" rows="3" cols="60" maxlength="60"><?php echo get_option('descripcion_conocer_producto'); ?></textarea>
                                <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
                            </fieldset>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Reto "Registrarse como usuario"</th>
                        <td>
                            <fieldset>
                                <label for="estado_registrarse" style="width:13em;font-weight:bold;">Estado:</label>
                                <select name="estado_registrarse" id="estado_registrarse" required>
                                    <option value="activo" <?php selected( $estado_registrarse, 'activo' ); ?>>Activo</option>
                                    <option value="pausado" <?php selected( $estado_registrarse, 'pausado' ); ?>>Pausado</option>
                                </select>
                                <br><br>
                                <label for="mensaje_registrarse" style="width:13em;font-weight:bold;">Mensaje reto completado (popup y email):</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="mensaje_registrarse"
                                name="mensaje_registrarse"
                                value="<?php echo get_option('mensaje_registrarse'); ?>"
                                />
                                <br><br>
                                <label for="puntos_registrarse" style="width:13em;font-weight:bold;">Puntos:</label>
                                <input
                                class="components-text-control__input"
                                type="number"
                                id="puntos_registrarse"
                                name="puntos_registrarse"
                                value="<?php echo get_option('puntos_registrarse'); ?>"
                                />
                                <br><br>
                                <label for="titulo_medalla_registrarse" style="width:13em;font-weight:bold;">Titulo medalla:</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="titulo_medalla_registrarse"
                                name="titulo_medalla_registrarse"
                                value="<?php echo get_option('titulo_medalla_registrarse'); ?>"
                                />
                                <br><br>
                                <label for="video_medalla_registrarse" style="width:13em;font-weight:bold;">Video medalla:</label>
                                <input 
                                type="text"
                                id="video_medalla_registrarse"
                                name="video_medalla_registrarse"
                                value="<?php echo get_option('video_medalla_registrarse'); ?>"
                                onkeypress="return false;">
                                <input type="button" id="upload_video_medalla_registrarse" class="button button-secondary" value="Subir video" />
                                <br><br>
                                <label for="imagen_correo_registrarse" style="width:13em;font-weight:bold;">Imagen cabecera email:</label>
                                <input
                                name="imagen_correo_registrarse"
                                type="text"
                                id="imagen_correo_registrarse"
                                value="<?php echo get_option('imagen_correo_registrarse'); ?>" 
                                onkeypress="return false;">
                                <input type="button" id="upload_imagen_correo_registrarse" class="button button-secondary" value="Subir imagen" />
                                <br><br>
                                <label for="descripcion_registrarse" style="width:13em;font-weight:bold;">Descripción popup:</label>
                                <textarea id="descripcion_registrarse" name="descripcion_registrarse" rows="3" cols="60" maxlength="60"><?php echo get_option('descripcion_registrarse'); ?></textarea>
                                <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
                            </fieldset>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Reto "Llenar una encuesta"</th>
                        <td>
                            <fieldset>
                                <label for="estado_llenar_encuesta" style="width:13em;font-weight:bold;">Estado:</label>
                                <select name="estado_llenar_encuesta" id="estado_llenar_encuesta" required>
                                    <option value="activo" <?php selected( $estado_llenar_encuesta, 'activo' ); ?>>Activo</option>
                                    <option value="pausado" <?php selected( $estado_llenar_encuesta, 'pausado' ); ?>>Pausado</option>
                                </select>
                                <br><br>
                                <label for="mensaje_llenar_encuesta" style="width:13em;font-weight:bold;">Mensaje reto completado (popup y email):</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="mensaje_llenar_encuesta"
                                name="mensaje_llenar_encuesta"
                                value="<?php echo get_option('mensaje_llenar_encuesta'); ?>"
                                />
                                <br><br>
                                <label for="puntos_llenar_encuesta" style="width:13em;font-weight:bold;">Puntos:</label>
                                <input
                                class="components-text-control__input"
                                type="number"
                                id="puntos_llenar_encuesta"
                                name="puntos_llenar_encuesta"
                                value="<?php echo get_option('puntos_llenar_encuesta'); ?>"
                                />
                                <br><br>
                                <label for="titulo_medalla_llenar_encuesta" style="width:13em;font-weight:bold;">Titulo medalla:</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="titulo_medalla_llenar_encuesta"
                                name="titulo_medalla_llenar_encuesta"
                                value="<?php echo get_option('titulo_medalla_llenar_encuesta'); ?>"
                                />
                                <br><br>
                                <label for="video_medalla_llenar_encuesta" style="width:13em;font-weight:bold;">Video medalla:</label>
                                <input 
                                type="text"
                                id="video_medalla_llenar_encuesta"
                                name="video_medalla_llenar_encuesta"
                                value="<?php echo get_option('video_medalla_llenar_encuesta'); ?>"
                                onkeypress="return false;">
                                <input type="button" id="upload_video_medalla_llenar_encuesta" class="button button-secondary" value="Subir video" />
                                <br><br>
                                <label for="imagen_correo_llenar_encuesta" style="width:13em;font-weight:bold;">Imagen cabecera email:</label>
                                <input
                                name="imagen_correo_llenar_encuesta"
                                type="text"
                                id="imagen_correo_llenar_encuesta"
                                value="<?php echo get_option('imagen_correo_llenar_encuesta'); ?>" 
                                onkeypress="return false;">
                                <input type="button" id="upload_imagen_correo_llenar_encuesta" class="button button-secondary" value="Subir imagen" />
                                <br><br>
                                <label for="descripcion_llenar_encuesta" style="width:13em;font-weight:bold;">Descripción popup:</label>
                                <textarea id="descripcion_llenar_encuesta" name="descripcion_llenar_encuesta" rows="3" cols="60" maxlength="60"><?php echo get_option('descripcion_llenar_encuesta'); ?></textarea>
                                <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
                            </fieldset>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <table class="form-table contenido_tab" role="presentation" tab-cont="general">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="img_categoria_defecto">Imagen fondo categoria por defecto:</label>
                        </th>
                        <td>
                            <input
                            class="components-text-control__input"
                            type="text"
                            id="img_categoria_defecto"
                            name="img_categoria_defecto"
                            value="<?php echo get_option('img_categoria_defecto'); ?>"
                            />
                            <a class="upload_img_categoria_defecto button button-secondary"><?php _e('Seleccionar imagen'); ?></a>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">PDF´s Políticas</th>
                        <td>
                            <fieldset>
                                <label for="politica_privacidad" style="width:13em;font-weight:bold;">Política de Privacidad y Cookies:</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="politica_privacidad"
                                name="politica_privacidad"
                                value="<?php echo get_option('politica_privacidad'); ?>"
                                />
                                <a id="upload_politica_privacidad" class="button button-secondary" style="margin-top:9px;"><?php _e('Seleccionar PDF'); ?></a>
                                <br><br>
                                <label for="terminos_condiciones" style="width:13em;font-weight:bold;">Términos y condiciones de la Página Web:</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="terminos_condiciones"
                                name="terminos_condiciones"
                                value="<?php echo get_option('terminos_condiciones'); ?>"
                                />
                                <a id="upload_terminos_condiciones" class="button button-secondary" style="margin-top:9px;"><?php _e('Seleccionar PDF'); ?></a>
                                <br><br>
                                <label for="tratamiento_datos" style="width:13em;font-weight:bold;">Tratamiento de datos personales:</label>
                                <input
                                class="components-text-control__input"
                                type="text"
                                id="tratamiento_datos"
                                name="tratamiento_datos"
                                value="<?php echo get_option('tratamiento_datos'); ?>"
                                />
                                <a id="upload_tratamiento_datos" class="button button-secondary" style="margin-top:9px;"><?php _e('Seleccionar PDF'); ?></a>                               
                                <p class="description" style="margin-left:0em;margin-top:1em;" id="tagline-description">Este PDF se mostrará cuando el usuario de click en la política correspondiente</p>
                            </fieldset>
                            <hr style="width:100%;height:1px;background:#0000003d;margin-top: 20px;">
                        </td>
                    </tr>                    
                    
                    <tr>
                        <th scope="row">Links redes sociales</th>
                        <td>
                            <fieldset>
                                <label for="whatsapp" style="width:13em;font-weight:bold;">Mostrar botón de Whatsapp:</label>
                                <input
                                type="checkbox"
                                id="show_whatsapp"
                                name="show_whatsapp"
                                value="Si"
                                <?php echo (get_option('show_whatsapp') == 'Si') ? 'checked':''; ?>
                                />
                                <br><br>
                                <label for="whatsapp" style="width:13em;font-weight:bold;">Whatsapp (Link):</label>
                                <input
                                type="url"
                                id="whatsapp"
                                name="whatsapp"
                                value="<?php echo get_option('whatsapp'); ?>"
                                />
                                <br><br>
                                <label for="facebook" style="width:13em;font-weight:bold;">Facebook:</label>
                                <input
                                type="url"
                                id="facebook"
                                name="facebook"
                                value="<?php echo get_option('facebook'); ?>"
                                />
                                <br><br>
                                <label for="instagram" style="width:13em;font-weight:bold;">Instagram:</label>
                                <input
                                type="url"
                                id="instagram"
                                name="instagram"
                                value="<?php echo get_option('instagram'); ?>"
                                />
                                <br><br>
                                <label for="twitter" style="width:13em;font-weight:bold;">Twitter:</label>
                                <input
                                type="url"
                                id="twitter"
                                name="twitter"
                                value="<?php echo get_option('twitter'); ?>"
                                />
                                <br><br>
                                <label for="youtube" style="width:13em;font-weight:bold;">Youtube:</label>
                                <input
                                type="url"
                                id="youtube"
                                name="youtube"
                                value="<?php echo get_option('youtube'); ?>"
                                />
                                <br><br>
                                <label for="pepsico" style="width:13em;font-weight:bold;">Logo Pepsico:</label>
                                <input
                                type="url"
                                id="pepsico"
                                name="pepsico"
                                value="<?php echo get_option('pepsico'); ?>"
                                />
                                <br><br>
                                <label for="gatorade" style="width:13em;font-weight:bold;">Logo Gatorade:</label>
                                <input
                                type="url"
                                id="gatorade"
                                name="gatorade"
                                value="<?php echo get_option('gatorade'); ?>"
                                />
                                <br><br>
                            </fieldset>
                            <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">Max. Numero de items carrousel categorías</th>
                        <td>
                            <fieldset>
                                <label for="max_destacados" style="width:13em;font-weight:bold;">Destacados:</label>
                                <input
                                type="number"
                                id="max_destacados"
                                name="max_destacados"
                                value="<?php echo get_option('max_destacados'); ?>"
                                />
                                <br><br>
                                <label for="max_categorias" style="width:13em;font-weight:bold;">Categorías:</label>
                                <input
                                type="number"
                                id="max_categorias"
                                name="max_categorias"
                                value="<?php echo get_option('max_categorias'); ?>"
                                />
                            </fieldset>
                            <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">Menu</th>
                        <td>
                            <fieldset>
                                <label for="trabaja" style="width:13em;font-weight:bold;">Url de boton "Trabaja con nosotros":</label>
                                <input
                                type="text"
                                id="trabaja"
                                name="trabaja"
                                value="<?php echo get_option('trabaja'); ?>"
                                />
                                <br><br>
                                <label for="menu_productos" style="width:13em;font-weight:bold;">Texto menu pagina Productos:</label>
                                <input
                                type="text"
                                id="menu_productos"
                                name="menu_productos"
                                value="<?php echo get_option('menu_productos'); ?>"
                                />
                                <br><br>
                                <label for="menu_categorias" style="width:13em;font-weight:bold;">Texto menu pagina Categorías:</label>
                                <input
                                type="text"
                                id="menu_categorias"
                                name="menu_categorias"
                                value="<?php echo get_option('menu_categorias'); ?>"
                                />
                                <br><br>
                                <label for="menu_eventos" style="width:13em;font-weight:bold;">Texto menu pagina Eventos:</label>
                                <input
                                type="text"
                                id="menu_eventos"
                                name="menu_eventos"
                                value="<?php echo get_option('menu_eventos'); ?>"
                                />
                                <br><br>
                                <label for="menu_retos" style="width:13em;font-weight:bold;">Texto menu pagina Retos:</label>
                                <input
                                type="text"
                                id="menu_retos"
                                name="menu_retos"
                                value="<?php echo get_option('menu_retos'); ?>"
                                />
                                <br><br>
                                <label for="menu_lanzamientos" style="width:13em;font-weight:bold;">Texto menu pagina Lanzamientos:</label>
                                <input
                                type="text"
                                id="menu_lanzamientos"
                                name="menu_lanzamientos"
                                value="<?php echo get_option('menu_lanzamientos'); ?>"
                                />
                            </fieldset>
                            <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <table class="form-table contenido_tab" role="presentation" tab-cont="deportes">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="img_categoria_defecto">Gestionar deportes:</label>
                        </th>
                        <td>
                            <a class="button button-secondary" target="_blank" href="<?php echo get_site_url(1); ?>/wp-admin/edit-tags.php?taxonomy=deportesTarjetas&post_type=tarjetas"><?php _e('Ir a deportes'); ?></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="form-table contenido_tab" role="presentation" tab-cont="eventos">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="terminos_edad">Url términos y condiciones menores de edad eventos:</label>
                        </th>
                        <td>
                        <input
                            class="components-text-control__input"
                            type="text"
                            id="terminos_edad"
                            name="terminos_edad"
                            value="<?php echo get_option('terminos_edad'); ?>"
                            />
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="form-table contenido_tab" role="presentation" tab-cont="pixeles">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="pixel_google_ads">Pixel Google (Ads, Tag, Global site tag ):</label>
                        </th>
                        <td>
                            <textarea id="pixel_google_ads" name="pixel_google_ads" rows="8" cols="60"><?php echo get_option('pixel_google_ads'); ?></textarea>
                            <p class="description" id="tagline-description">Se ubicará dentro de las tags < head >< /head > se carga en todo el sitio y funciona para cualquier plataforma</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="pixel_facebook">Pixel Facebook:</label>
                        </th>
                        <td>
                            <textarea id="pixel_facebook" name="pixel_facebook" rows="8" cols="60"><?php echo get_option('pixel_facebook'); ?></textarea>
                            <p class="description" id="tagline-description">Se ubicará dentro de las tags < head >< /head > se carga en todo el sitio y funciona para cualquier plataforma</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="pixel_dv360">Pixel dv360:</label>
                        </th>
                        <td>
                            <textarea id="pixel_dv360" name="pixel_dv360" rows="8" cols="60"><?php echo get_option('pixel_dv360'); ?></textarea>
                            <p class="description" id="tagline-description">Se ubicará dentro de las tags < head >< /head > se carga en todo el sitio y funciona para cualquier plataforma</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:30px 0px;">
                           <div style="width: 100%; height: 1px; background: #0000003d;"></div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="pixel_general">Pixel General (Todo el sitio):</label>
                        </th>
                        <td>
                            <textarea id="pixel_general" name="pixel_general" rows="4" cols="60"><?php echo get_option('pixel_general'); ?></textarea>
                            <p class="description" id="tagline-description">Se ubicará dentro de las tags < body >< /body > y se carga en todo el sitio</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="pixel_home">Pixel Home:</label>
                        </th>
                        <td>
                            <textarea id="pixel_home" name="pixel_home" rows="4" cols="60"><?php echo get_option('pixel_home'); ?></textarea>
                            <p class="description" id="tagline-description">Se ubicará dentro de las tags < body >< /body > Solo en la página Home</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="pixel_categorias">Pixel Categorías:</label>
                        </th>
                        <td>
                            <textarea id="pixel_categorias" name="pixel_categorias" rows="4" cols="60"><?php echo get_option('pixel_categorias'); ?></textarea>
                            <p class="description" id="tagline-description">Se ubicará dentro de las tags < body >< /body > Solo en la página Categorías</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="pixel_productos">Pixel Productos:</label>
                        </th>
                        <td>
                            <textarea id="pixel_productos" name="pixel_productos" rows="4" cols="60"><?php echo get_option('pixel_productos'); ?></textarea>
                            <p class="description" id="tagline-description">Se ubicará dentro de las tags < body >< /body > Solo en la página Productos</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="pixel_eventos">Pixel Eventos:</label>
                        </th>
                        <td>
                            <textarea id="pixel_eventos" name="pixel_eventos" rows="4" cols="60"><?php echo get_option('pixel_eventos'); ?></textarea>
                            <p class="description" id="tagline-description">Se ubicará dentro de las tags < body >< /body > Solo en la página Eventos</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="form-table contenido_tab" role="presentation" tab-cont="lanzamientos">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="pagina_lanzamientos">Habilitar / Deshabilitar página de lanzamientos:</label>
                        </th>
                        <td>
                            <input type="checkbox" id="pagina_lanzamientos" name="pagina_lanzamientos" value="si" <?php echo (get_option('pagina_lanzamientos') != '') ? 'checked':''; ?>>
                            <p class="description" id="tagline-description">Ocultará o mostrará la opcion "Lanzamientos" en el menu principal</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="form-table contenido_tab" role="presentation" tab-cont="registro">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="pixel_registro">Pixel Registro Facebook:</label>
                        </th>
                        <td>
                            <textarea id="pixel_registro" name="pixel_registro" rows="4" cols="60"><?php echo get_option('pixel_registro'); ?></textarea>
                            <p class="description" id="tagline-description">Se ubicará dentro de las tags < head >< /head ></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="pixel_registro_head">Pixel Registro Google:</label>
                        </th>
                        <td>
                            <textarea id="pixel_registro_head" name="pixel_registro_head" rows="8" cols="60"><?php echo get_option('pixel_registro_head'); ?></textarea>
                            <p class="description" id="tagline-description">Se ubicará dentro de las tags < head >< /head ></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="pixel_registro_body">Pixel Registro Google:</label>
                        </th>
                        <td>
                            <textarea id="pixel_registro_body" name="pixel_registro_body" rows="8" cols="60"><?php echo get_option('pixel_registro_body'); ?></textarea>
                            <p class="description" id="tagline-description">Se ubicará después de la etiqueta de apertura < body ></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="pixel_registro_head_tag">Pixel Registro Google:</label>
                        </th>
                        <td>
                            <textarea id="pixel_registro_head_tag" name="pixel_registro_head_tag" rows="8" cols="60"><?php echo get_option('pixel_registro_head_tag'); ?></textarea>
                            <p class="description" id="tagline-description">Se ubicará dentro de las tags < head >< /head ></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        var tab_active = jQuery('.nav-tab.nav-tab-active').attr('tab');
        jQuery("[tab-cont='"+ tab_active +"']").css('display', 'block');

        jQuery('.nav-tab').click(function(){
            jQuery('.nav-tab').removeClass('nav-tab-active');
            jQuery(this).addClass('nav-tab-active');
            var tab_active = jQuery(this).attr('tab');
            jQuery('.contenido_tab').css('display', 'none');
            jQuery("[tab-cont='"+ tab_active +"']").css('display', 'block');
        });
    </script>
  
    <script>
      jQuery(function ($) {
         //Tratamiento de datos pdf
         $("body").on("click", "#upload_tratamiento_datos", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "PDF",
                library: {
                  type: "application/pdf",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#tratamiento_datos").val(attachment.url);
              })
              .open();
        });
        //Terminos y condiciones pdf
         $("body").on("click", "#upload_terminos_condiciones", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "PDF",
                library: {
                  type: "application/pdf",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#terminos_condiciones").val(attachment.url);
              })
              .open();
        });
        //Politicas de privacidad pdf
        $("body").on("click", "#upload_politica_privacidad", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "PDF",
                library: {
                  type: "application/pdf",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#politica_privacidad").val(attachment.url);
              })
              .open();
        });
         //imagen correo registrarse
        $("body").on("click", "#upload_imagen_correo_registrarse", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Imagen cabecera correo",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#imagen_correo_registrarse").val(attachment.url);
              })
              .open();
        });
        //video medalla registrarse
        $('body').on('click', '#upload_video_medalla_registrarse', function(e) {
            e.preventDefault();
    
            var button = $(this),
                aw_uploader = wp.media({
                    title: 'Video medalla',
                    library: {
                        uploadedTo: wp.media.view.settings.post.id,
                        type: 'video/mp4'
                    },
                    button: {
                        text: 'Usar este video'
                    },
                    multiple: false
                }).on('select', function() {
                    var attachment = aw_uploader.state().get('selection').first().toJSON();
                    $('#video_medalla_registrarse').val(attachment.url);
                })
                .open();
        });
        //imagen correo llenar encuesta
        $("body").on("click", "#upload_imagen_correo_llenar_encuesta", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Imagen cabecera correo",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#imagen_correo_llenar_encuesta").val(attachment.url);
              })
              .open();
        });
        //video medalla lelnar encuesta
        $('body').on('click', '#upload_video_medalla_llenar_encuesta', function(e) {
            e.preventDefault();
    
            var button = $(this),
                aw_uploader = wp.media({
                    title: 'Video medalla',
                    library: {
                        uploadedTo: wp.media.view.settings.post.id,
                        type: 'video/mp4'
                    },
                    button: {
                        text: 'Usar este video'
                    },
                    multiple: false
                }).on('select', function() {
                    var attachment = aw_uploader.state().get('selection').first().toJSON();
                    $('#video_medalla_llenar_encuesta').val(attachment.url);
                })
                .open();
        });
        //imagen correo incripcion evento
        $("body").on("click", "#upload_imagen_correo_conocer_producto", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Imagen cabecera correo",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#imagen_correo_conocer_producto").val(attachment.url);
              })
              .open();
        });
        //video medalla inscripcion evento
        $('body').on('click', '#upload_video_medalla_conocer_producto', function(e) {
            e.preventDefault();
    
            var button = $(this),
                aw_uploader = wp.media({
                    title: 'Video medalla',
                    library: {
                        uploadedTo: wp.media.view.settings.post.id,
                        type: 'video/mp4'
                    },
                    button: {
                        text: 'Usar este video'
                    },
                    multiple: false
                }).on('select', function() {
                    var attachment = aw_uploader.state().get('selection').first().toJSON();
                    $('#video_medalla_conocer_producto').val(attachment.url);
                })
                .open();
        });
        //imagen correo incripcion evento
        $("body").on("click", "#upload_imagen_correo_inscripcion_evento", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Imagen cabecera correo",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#imagen_correo_inscripcion_evento").val(attachment.url);
              })
              .open();
        });
        //video medalla inscripcion evento
        $('body').on('click', '#upload_video_medalla_inscripcion_evento', function(e) {
            e.preventDefault();
    
            var button = $(this),
                aw_uploader = wp.media({
                    title: 'Video medalla',
                    library: {
                        uploadedTo: wp.media.view.settings.post.id,
                        type: 'video/mp4'
                    },
                    button: {
                        text: 'Usar este video'
                    },
                    multiple: false
                }).on('select', function() {
                    var attachment = aw_uploader.state().get('selection').first().toJSON();
                    $('#video_medalla_inscripcion_evento').val(attachment.url);
                })
                .open();
        });
        //imagen correo editar deportes
        $("body").on("click", "#upload_imagen_correo_editar_deportes", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Imagen cabecera correo",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#imagen_correo_editar_deportes").val(attachment.url);
              })
              .open();
        });
        //video medalla foto perfil
        $('body').on('click', '#upload_video_medalla_editar_deportes', function(e) {
            e.preventDefault();
    
            var button = $(this),
                aw_uploader = wp.media({
                    title: 'Video medalla',
                    library: {
                        uploadedTo: wp.media.view.settings.post.id,
                        type: 'video/mp4'
                    },
                    button: {
                        text: 'Usar este video'
                    },
                    multiple: false
                }).on('select', function() {
                    var attachment = aw_uploader.state().get('selection').first().toJSON();
                    $('#video_medalla_editar_deportes').val(attachment.url);
                })
                .open();
        });
        //imagen correo foto perfil
        $("body").on("click", "#upload_imagen_correo_favorito_contenido", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Imagen cabecera correo",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#imagen_correo_favorito_contenido").val(attachment.url);
              })
              .open();
        });
        //video medalla foto perfil
        $('body').on('click', '#upload_video_medalla_favorito_contenido', function(e) {
            e.preventDefault();
    
            var button = $(this),
                aw_uploader = wp.media({
                    title: 'Video medalla',
                    library: {
                        uploadedTo: wp.media.view.settings.post.id,
                        type: 'video/mp4'
                    },
                    button: {
                        text: 'Usar este video'
                    },
                    multiple: false
                }).on('select', function() {
                    var attachment = aw_uploader.state().get('selection').first().toJSON();
                    $('#video_medalla_favorito_contenido').val(attachment.url);
                })
                .open();
        });
        //imagen correo foto perfil
        $("body").on("click", "#upload_imagen_correo_foto_perfil", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Imagen cabecera correo",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#imagen_correo_foto_perfil").val(attachment.url);
              })
              .open();
        });
        //video medalla foto perfil
        $('body').on('click', '#upload_video_medalla_foto_perfil', function(e) {
            e.preventDefault();
    
            var button = $(this),
                aw_uploader = wp.media({
                    title: 'Video medalla',
                    library: {
                        uploadedTo: wp.media.view.settings.post.id,
                        type: 'video/mp4'
                    },
                    button: {
                        text: 'Usar este video'
                    },
                    multiple: false
                }).on('select', function() {
                    var attachment = aw_uploader.state().get('selection').first().toJSON();
                    $('#video_medalla_foto_perfil').val(attachment.url);
                })
                .open();
        });
        //imagen categoria por defecto
        $("body").on("click", ".upload_img_categoria_defecto", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Imagen",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#img_categoria_defecto").val(attachment.url);
              })
              .open();
        });
        
        //banner productos mobile
        $("body").on("click", ".upload_banner_producto_mobile", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_producto_mobile").val(attachment.url);
              })
              .open();
        });

        //banner productos desktop
        $("body").on("click", ".upload_banner_producto_desktop", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_producto_desktop").val(attachment.url);
              })
              .open();
        });

        //banner home desktop
        $("body").on("click", ".upload_banner_home_desktop", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_home_desktop").val(attachment.url);
              })
              .open();
        });

        //banner eventos desktop
        $("body").on("click", ".upload_banner_eventos_desktop", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_eventos_desktop").val(attachment.url);
              })
              .open();
        });

        //banner eventos mobile
        $("body").on("click", ".upload_banner_eventos_mobile", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_eventos_mobile").val(attachment.url);
              })
              .open();
        });
        
        //banner retos desktop
        $("body").on("click", ".upload_banner_retos_desktop", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_retos_desktop").val(attachment.url);
              })
              .open();
        });

        //banner retos mobile
        $("body").on("click", ".upload_banner_retos_mobile", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_retos_mobile").val(attachment.url);
              })
              .open();
        });
      });
    </script>

    <?php  submit_button(); ?>
  </form>
</div>
<?php
} 
?>
<?php

/* CREAR POST TYPE RETOS*/

/*
* Creating a function to create our CPT
*/
 
function custom_post_type_retos() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Retos', 'Post Type General Name'),
            'singular_name'       => _x( 'Reto', 'Post Type Singular Name'),
            'menu_name'           => __( 'Retos'),
            'parent_item_colon'   => __( 'Parent Reto'),
            'all_items'           => __( 'Todos'),
            'view_item'           => __( 'Ver Reto'),
            'add_new_item'        => __( 'Añadir nuevo Reto'),
            'add_new'             => __( 'Añadir nuevo'),
            'edit_item'           => __( 'Editar Reto'),
            'update_item'         => __( 'Actualizar Reto'),
            'search_items'        => __( 'Buscar Reto'),
            'not_found'           => __( 'No hay retos'),
            'not_found_in_trash'  => __( 'No hay retos en la papelera'),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'retos'),
            'description'         => __( 'Retos'),
            'menu_icon'           => 'dashicons-games',
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array('title','editor','thumbnail'),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array(),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 4.3,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'retos', $args );

    }
     
    add_action( 'init', 'custom_post_type_retos', 0 );


  
  
/* CREAR METABOX DURACIÓN RETO */

function opciones_reto_metabox()
{
    add_meta_box('meta-box-visualizacion-opciones', 'VISUALIZACIÓN', 'visualizacion_opciones_callback', 'retos', 'side', 'default');
    add_meta_box('meta-box-reto-opciones', 'OPCIONES RETO', 'reto_opciones_callback', 'retos', 'side', 'default');
}
add_action('add_meta_boxes', 'opciones_reto_metabox');

function visualizacion_opciones_callback($post)
{
    $values = get_post_custom($post->ID);
    $id_youtube = isset($values['id_youtube']) ? esc_attr($values['id_youtube'][0]) : '';
    $video_background_loop = isset($values['video_background_loop']) ? esc_attr($values['video_background_loop'][0]) : '';
    $imagen_alterna = isset($values['imagen_alterna']) ? esc_attr($values['imagen_alterna'][0]) : '';
?>
<style>
.form-table td {
    padding: 12px 8px !important;
    padding-bottom: 13px !important;
}
.form-table tr {
    border-bottom: 1px solid orange;
}
.form-table label  {
    font-weight: bold;
    display: block;
    width: 100%;
    margin-bottom: 6px;
}
.form-table [type=text], .form-table [type=number], .form-table [type=date], .form-table select, .form-table textarea  {
    display: block;
    width: 100%;
    margin-bottom: 6px;
}
.form-table select  {
    width: 87% !important;
}
</style>
<table class="form-table" role="presentation">
  <tbody>

    <tr>
        <td>
            <label for="id_youtube">Id video Youtube:</label>
            <?php if($id_youtube) { ?>
            <iframe src="https://www.youtube.com/embed/<?php echo esc_html($id_youtube); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php } ?>
            <input class="regular-text" type="text" id="id_youtube" name="id_youtube" value="<?php echo esc_html($id_youtube); ?>">
            <p class="description" id="tagline-description">Video que aparecera en el detalle de la tarjeta (Formato horizontal)</p>
        </td>
    </tr>
    
    <tr>
        <td>
            <label for="imagen_alterna">Imagen cabecera detalle:</label>
            <?php if($imagen_alterna) { ?>
            <img src="<?php echo esc_html($imagen_alterna); ?>"/>
            <?php } ?>
            <input class="regulat-text" type="text" id="imagen_alterna" name="imagen_alterna" value="<?php echo esc_html($imagen_alterna); ?>">
            <a href="#" class="upload_imagen_alterna button button-secondary"><?php _e('Seleccionar imagen'); ?></a>
            <p class="description" id="tagline-description">Imagen que aparecera en la parte superior del detalle de la tarjeta en caso de que no haya video de Youtube</p>
        </td>
    </tr>
    
    <tr>
        <td>
            <label for="video_background_loop">Video background:</label>
            <?php if($video_background_loop) { ?>
            <video src="<?php echo esc_html($video_background_loop); ?>"></video>
            <?php } ?>
            <input class="regular-text" type="text" id="video_background_loop" name="video_background_loop" value="<?php echo esc_html($video_background_loop); ?>">
            <a href="#" class="upload_video_button button button-secondary"><?php _e('Seleccionar video'); ?></a>
            <p class="description" id="tagline-description">Video que se reproducira como fondo de tarjeta (Formato vertical)</p>
        </td>
    </tr> 
  </tbody>
</table>
<script>
    jQuery('body').on('click', '.upload_imagen_alterna button', function(e) {
        e.preventDefault();

        var button = jQuery(this),
        aw_uploader = wp.media({
            title: 'Imagen',
            library: {
                uploadedTo: wp.media.view.settings.post.id,
                type: 'image/jpeg'
            },
            button: {
                text: 'Usar esta imagen'
            },
            multiple: false
        }).on('select', function() {
            var attachment = aw_uploader.state().get('selection').first().toJSON();
            jQuery('#imagen_alterna').val(attachment.url);
        })
        .open();
    });
    jQuery('body').on('click', '.upload_video_button', function(e) {
        e.preventDefault();

        var button = jQuery(this),
        aw_uploader = wp.media({
            title: 'Video',
            library: {
                uploadedTo: wp.media.view.settings.post.id,
                type: 'video'
            },
            button: {
                text: 'Usar este video'
            },
            multiple: false
        }).on('select', function() {
            console.log('sel');
            var attachment = aw_uploader.state().get('selection').first().toJSON();
            jQuery('#video_background_loop').val(attachment.url);
        })
        .open();
    });
</script>
<?php
}

function reto_opciones_callback($post)
{
    $values = get_post_custom($post->ID);
    $tipo_retos_sel = get_post_meta($post->ID, 'tipo_retos', true);
    $fecha_inicio = isset($values['fecha_inicio']) ? esc_attr($values['fecha_inicio'][0]) : '';
    $fecha_fin = isset($values['fecha_fin']) ? esc_attr($values['fecha_fin'][0]) : '';
    $puntos = isset($values['puntos']) ? esc_attr($values['puntos'][0]) : '';
    $mensaje_premio = isset($values['mensaje_premio']) ? esc_attr($values['mensaje_premio'][0]) : '';
    $video_premio = isset($values['video_premio']) ? esc_attr($values['video_premio'][0]) : '';
    $numero_visualizar = isset($values['numero_visualizar']) ? esc_attr($values['numero_visualizar'][0]) : '';
    $estado = isset($values['estado']) ? esc_attr($values['estado'][0]) : '';
    $numero_correo = isset($values['numero_correo']) ? esc_attr($values['numero_correo'][0]) : '';
    $imagen_correo = isset($values['imagen_correo']) ? esc_attr($values['imagen_correo'][0]) : '';
    $mensaje_correo = isset($values['mensaje_correo']) ? esc_attr($values['mensaje_correo'][0]) : '';
    $etiquetas_sel = get_post_meta($post->ID, 'etiquetas_sel', true);
    
    $categoria_sel = get_post_meta($post->ID, 'categoria_sel', true);
    
    $rango1 = get_post_meta($post->ID, 'rango1', true);
    $rango1_puntos = get_post_meta($post->ID, 'rango1_puntos', true);
    $rango1_mensaje_premio = get_post_meta($post->ID, 'rango1_mensaje_premio', true);
    $rango1_video_premio = get_post_meta($post->ID, 'rango1_video_premio', true);
    $rango1_titulo = get_post_meta($post->ID, 'rango1_titulo', true);
    $rango1_imagen_correo = get_post_meta($post->ID, 'rango1_imagen_correo', true);
    
    $rango2 = get_post_meta($post->ID, 'rango2', true);
    $rango2_puntos = get_post_meta($post->ID, 'rango2_puntos', true);
    $rango2_mensaje_premio = get_post_meta($post->ID, 'rango2_mensaje_premio', true);
    $rango2_video_premio = get_post_meta($post->ID, 'rango2_video_premio', true);
    $rango2_titulo = get_post_meta($post->ID, 'rango2_titulo', true);
    $rango2_imagen_correo = get_post_meta($post->ID, 'rango2_imagen_correo', true);
    
    $rango3 = get_post_meta($post->ID, 'rango3', true);
    $rango3_puntos = get_post_meta($post->ID, 'rango3_puntos', true);
    $rango3_mensaje_premio = get_post_meta($post->ID, 'rango3_mensaje_premio', true);
    $rango3_video_premio = get_post_meta($post->ID, 'rango3_video_premio', true);
    $rango3_titulo = get_post_meta($post->ID, 'rango3_titulo', true);
    $rango3_imagen_correo = get_post_meta($post->ID, 'rango3_imagen_correo', true);
    
?>
<style>
.form-table td {
    padding: 12px 8px !important;
    padding-bottom: 13px !important;
}
.form-table tr {
    border-bottom: 1px solid orange;
}
.form-table label  {
    font-weight: bold;
    display: block;
    width: 100%;
    margin-bottom: 6px;
}
.form-table [type=text], .form-table [type=number], .form-table [type=date], .form-table select, .form-table textarea  {
    display: block;
    width: 100%;
    margin-bottom: 6px;
}
.form-table select  {
    width: 87% !important;
}
</style>
<script>
    jQuery('#title').prop('required',true);
</script>
<table class="form-table" role="presentation">
  <tbody>

    <tr>
        <td>
            <label for="estado">Estado</label>
            <select name="estado" id="estado" required>
            <option value="activo" <?php selected( $estado, 'activo' ); ?>>Activo</option>
            <option value="pausado" <?php selected( $estado, 'pausado' ); ?>>Pausado</option>
            </select>
        </td>
    </tr>
    
    <tr>
        <td>
            <label for="tipo_retos">Tipo de reto</label>
            <select name="tipo_retos" id="tipo_retos" required>
            <option value="campana" <?php selected( $tipo_retos_sel, 'campana' ); ?>>Campaña</option>
            <option value="contenido" <?php selected( $tipo_retos_sel, 'contenido' ); ?>>Contenido</option>
            </select>
            <p class="description item_campana" id="tagline-description">Un reto de tipo "Campaña" funciona por medio de las Etiquetas (tags) que tenga asociadas la publicación (tarjeta). Son retos que son temporales. </p>
            <p class="description item_contenido" id="tagline-description">Un reto de tipo "Contenido" funciona por medio de la Categoria (tags) que tenga asociada la publicación (tarjeta). Son retos que son permanentes. </p>
        </td>
    </tr>
    
    <tr class="item_campana">
        <td>
            <label for="fecha_inicio">Fecha de inicio:</label>
            <input name="fecha_inicio" type="date" id="fecha_inicio" value="<?php echo esc_html($fecha_inicio); ?>" class="regular-text" required>
            <p class="description" id="tagline-description">Fecha en la que se hará publico el reto</p>
        </td>
    </tr>

    <tr class="item_campana">
        <td>
            <label for="fecha_fin">Fecha de finalización:</label>
            <input name="fecha_fin" type="date" id="fecha_fin" value="<?php echo esc_html($fecha_fin); ?>" class="regular-text" required>
            <p class="description" id="tagline-description">Fecha en la que se ocultará el reto</p>
        </td>
    </tr>

    <tr class="item_campana">
        <td>
            <label for="numero_visualizar">Numero de elementos a visualizar:</label>
            <input name="numero_visualizar" type="number" id="numero_visualizar" value="<?php echo esc_html($numero_visualizar); ?>" class="regular-text" required>
            <p class="description" id="tagline-description">El numero de contendidos que debe visualizar el usuario para cumplir el reto</p>
        </td>
    </tr>

    <tr class="item_campana">
        <td>
            <label for="puntos">Puntos:</label>
            <input name="puntos" type="number" id="puntos" value="<?php echo esc_html($puntos); ?>" class="regular-text" required>
            <p class="description" id="tagline-description">Los puntos que obtendrá el usuario por cumplir el reto</p>
        </td>
    </tr>
    
    <tr class="item_campana">
        <td>
            <label for="mensaje_premio">Mensaje reto cumplido:</label>
            <input name="mensaje_premio" type="text" id="mensaje_premio" value="<?php echo esc_html($mensaje_premio); ?>" class="regular-text" required>
            <p class="description" id="tagline-description">El texto que aparecerá en el popup de reto cumplido</p>
        </td>
    </tr>

    <tr class="item_campana">
        <td>
            <label for="video_premio">Video premio</label>
            <input name="video_premio" type="text" id="video_premio" value="<?php echo esc_html($video_premio); ?>" class="regular-text" required onkeypress="return false;">
            <input type="button" id="upload_video_premio" class="button" value="Subir video" />
        </td>
    </tr>

    <tr class="item_campana">
        <td>
            <label for="mensaje_premio">Elige las etiquetas validas para el reto</label>
            <?php 
                $etiquetas_sel_list = explode(",", $etiquetas_sel);
                $etiquetas_list = get_terms('etiquetasTarjetas');
                foreach($etiquetas_list as $etiqueta) { 
            ?>
                <label for="<?php echo $etiqueta->name; ?>" style="margin-right:14px!important;font-weight:normal !important;">
                <input class="etiqueta" name="<?php echo $etiqueta->name; ?>" type="checkbox" id="<?php echo $etiqueta->name; ?>" value="<?php echo $etiqueta->name; ?>" <?php echo (in_array($etiqueta->name, $etiquetas_sel_list)) ? 'checked' : '' ?>>
                <?php echo $etiqueta->name; ?></label>
            <?php
                }
            ?>
            <input type="hidden" name="etiquetas_sel" id="etiquetas_sel" required="required" title="Elige una de la opciones" class="etiquetas_sel" style="display: block;width: 100%;height: 30px;opacity: 1;padding: 0px;min-height: 0px;" >
            <div id="debug"></div>
            <p class="description">Cada vez que el usuario visualiza un contenido que tenga esta etiqueta se contará para el reto</p>
      </td>
    </tr>
    
    <tr class="item_campana">
        <td>
            <label for="numero_correo">Numero de elementos para email y popup:</label>
            <input name="numero_correo" type="number" id="numero_correo" value="<?php echo esc_html($numero_correo); ?>" class="regular-text" required>
            <p class="description" id="tagline-description">El numero de contenidos que tendrá que ver el usuario para enviar el email y mostrar el popup</p>
        </td>
    </tr>
    
    <tr class="item_campana">
        <td>
            <label for="imagen_correo">Imagen de cabecera email y popup</label>
            <input name="imagen_correo" type="text" id="imagen_correo" value="<?php echo esc_html($imagen_correo); ?>" class="regular-text" required onkeypress="return false;">
            <input type="button" id="upload_imagen_correo" class="button" value="Subir imagen" />	
        </td>		
    </tr>
    
    <tr class="item_campana">
        <td>
            <label for="mensaje_correo">Mensaje email y popup:</label>
            <textarea name="mensaje_correo" id="mensaje_correo" class="regular-text" required/>
                <?php echo esc_html($mensaje_correo); ?>
            </textarea>
            <p class="description" id="tagline-description">El texto que tendrá el email y el popup</p>
        </td>
    </tr>
    
    <tr class="item_contenido">
        <td>
            <label for="categoria_sel">Categoria</label>
            <?php
                //obtener las categorias disponibles
                $terms = get_terms([
                    'taxonomy' => 'categoriasTarjetas',
                    'hide_empty' => false,
                    'parent' => 0
                ]);
                
                $tt = get_post_meta( $post->ID, 'categoria_sel', true);
            ?>
            <select name="categoria_sel" id="categoria_sel" required>
                <?php
                    //Recorremos los categorias
                    foreach ( $terms as $term ) { ?>
                ?>
                <option value="<?php echo $term->name; ?>" <?php echo ($tt == $term->name) ? 'selected' : '' ?>><?php echo $term->name; ?></option>
                <?php
                    }
                ?>
            </select>
            <p class="description">Categoria con la que se validaran las visualizaciones de post (tarjeta). </p>
            <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
        </td>
    </tr>
    
    <tr class="item_contenido">
        <td>
            <label>Rango 1</label>
            <fieldset>
                <label for="rango1">Visualizaciones</label>
                <input name="rango1" type="number" id="rango1" value="<?php echo esc_html($rango1); ?>" class="regular-text" required>
                <label for="rango1_puntos">Puntos</label>
                <input name="rango1_puntos" type="number" id="rango1_puntos" value="<?php echo esc_html($rango1_puntos); ?>" class="regular-text" required>
                <label for="rango1_titulo">Titulo medalla</label>
                <input name="rango1_titulo" type="text" id="rango1_titulo" value="<?php echo esc_html($rango1_titulo); ?>" class="regular-text" required>
                <label for="rango1_mensaje_premio">Mensaje reto cumplido</label>
                <input name="rango1_mensaje_premio" type="text" id="rango1_mensaje_premio" value="<?php echo esc_html($rango1_mensaje_premio); ?>" class="regular-text" required>
                <p class="description" id="tagline-description">Mensaje que aparecerá en el popup</p>
                <br>
                <label for="rango1_video_premio">Video premio</label>
                <input name="rango1_video_premio" type="text" id="rango1_video_premio" value="<?php echo esc_html($rango1_video_premio); ?>" class="regular-text" required onkeypress="return false;">
                <input type="button" id="upload_rango1_video_premio" class="button" value="Subir video" />
                <br>
                <label for="rango1_imagen_correo">Imagen de cabecera email</label>
                <input name="rango1_imagen_correo" type="text" id="rango1_imagen_correo" value="<?php echo esc_html($rango1_imagen_correo); ?>" class="regular-text" onkeypress="return false;">
                <input type="button" id="upload_rango1_imagen_correo" class="button" value="Subir imagen" />
                <p class="description" id="tagline-description">Imagen que aparecerá en el mensaje del email.<br>Este campo es opcional si esta vacio no se envia el mensaje</p>
            </fieldset>
            <br>
            <p class="description" id="tagline-description">Los datos para establecer un rango de visualizaciones</p>
            <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
        </td>
    </tr>
    
    <tr class="item_contenido">
        <td>
            <label>Rango 2</label>
            <fieldset>
                <label for="rango2">Visualizaciones</label>
                <input name="rango2" type="number" id="rango2" value="<?php echo esc_html($rango2); ?>" class="regular-text">
                <label for="rango2_puntos">Puntos</label>
                <input name="rango2_puntos" type="number" id="rango2_puntos" value="<?php echo esc_html($rango2_puntos); ?>" class="regular-text">
                <label for="rango2_titulo">Titulo medalla</label>
                <input name="rango2_titulo" type="text" id="rango2_titulo" value="<?php echo esc_html($rango2_titulo); ?>" class="regular-text">
                <label for="rango2_mensaje_premio">Mensaje reto cumplido</label>
                <input name="rango2_mensaje_premio" type="text" id="rango2_mensaje_premio" value="<?php echo esc_html($rango2_mensaje_premio); ?>" class="regular-text">
                <p class="description" id="tagline-description">Mensaje que aparecerá en el popup</p>
                <br>
                <label for="rango2_video_premio">Video premio</label>
                <input name="rango2_video_premio" type="text" id="rango2_video_premio" value="<?php echo esc_html($rango2_video_premio); ?>" class="regular-text" onkeypress="return false;">
                <input type="button" id="upload_rango2_video_premio" class="button" value="Subir video" />

                <br>
                <label for="rango2_imagen_correo">Imagen de cabecera email</label>
                <input name="rango2_imagen_correo" type="text" id="rango2_imagen_correo" value="<?php echo esc_html($rango2_imagen_correo); ?>" class="regular-text" onkeypress="return false;">
                <input type="button" id="upload_rango2_imagen_correo" class="button" value="Subir imagen" />
                <p class="description" id="tagline-description">Imagen que aparecerá en el mensaje del email.<br>Este campo es opcional si esta vacio no se envia el mensaje</p>
            </fieldset>
            <br>
            <p class="description"id="tagline-description">Los datos para establecer un rango de visualizaciones</p>
            <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
        </td>
    </tr>
    
    <tr class="item_contenido">
        <td>
            <label>Rango 3</label>
            <fieldset>
                <label for="rango3">Visualizaciones</label>
                <input name="rango3" type="number" id="rango3" value="<?php echo esc_html($rango3); ?>" class="regular-text">
                <label for="rango3_puntos">Puntos</label>
                <input name="rango3_puntos" type="number" id="rango3_puntos" value="<?php echo esc_html($rango3_puntos); ?>" class="regular-text">
                <label for="rango3_titulo">Titulo medalla</label>
                <input name="rango3_titulo" type="text" id="rango3_titulo" value="<?php echo esc_html($rango3_titulo); ?>" class="regular-text">
                <label for="rango3_mensaje_premio">Mensaje reto cumplido</label>
                <input name="rango3_mensaje_premio" type="text" id="rango3_mensaje_premio" value="<?php echo esc_html($rango3_mensaje_premio); ?>" class="regular-text">
                <p class="description" id="tagline-description">Mensaje que aparecerá en el popup</p>
                <br>
                <label for="rango3_video_premio">Video premio</label>
                <input name="rango3_video_premio" type="text" id="rango3_video_premio" value="<?php echo esc_html($rango3_video_premio); ?>" class="regular-text" onkeypress="return false;">
                <input type="button" id="upload_rango3_video_premio" class="button" value="Subir video" />

                <br>
                <label for="rango3_imagen_correo">Imagen de cabecera email</label>
                <input name="rango3_imagen_correo" type="text" id="rango3_imagen_correo" value="<?php echo esc_html($rango3_imagen_correo); ?>" class="regular-text" onkeypress="return false;">
                <input type="button" id="upload_rango3_imagen_correo" class="button" value="Subir imagen" />
                <p class="description" id="tagline-description">Imagen que aparecerá en el mensaje del email.<br>Este campo es opcional si esta vacio no se envia el mensaje</p>
            </fieldset>
            <br>
            <p class="description"id="tagline-description">Los datos para establecer un rango de visualizaciones</p>
            <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
        </td>
    </tr>
    
  </tbody>
</table>


<script>
// JavaScript Document
jQuery(document).ready(function($) {
    $('#title').attr('required', true);
});
</script>



<?php
}

function aw_include_script_retos()
{
    wp_enqueue_script( 'awscript_icono', get_stylesheet_directory_uri() . '/assets/js/retos/subir_video_premio.js', array('jquery'), null, false );
    wp_enqueue_script( 'imagen_correo', get_stylesheet_directory_uri() . '/assets/js/retos/subir_imagen_correo.js', array('jquery'), null, false );
    wp_enqueue_script( 'tipo_reto', get_stylesheet_directory_uri() . '/assets/js/retos/tipo_reto.js', array('jquery'), null, false );
}
add_action('admin_enqueue_scripts', 'aw_include_script_retos');


add_action('save_post', 'opciones_reto_save');
function opciones_reto_save($post_id)
{
    // Ignoramos los auto guardados.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Si el usuario actual no puede editar entradas no debería estar aquí.
    if (!current_user_can('edit_posts')) {
        return;
    }

    // AHORA es cuando podemos guardar la información.

    // Nos aseguramos de que hay información que guardar.
    if (isset($_POST['tipo_retos'])) {
        update_post_meta($post_id, 'tipo_retos', $_POST['tipo_retos']);
    }
    
    //Campos campaña
    if (isset($_POST['fecha_inicio'])) {
      update_post_meta($post_id, 'fecha_inicio', $_POST['fecha_inicio']);
    }

    if (isset($_POST['fecha_fin'])) {
      update_post_meta($post_id, 'fecha_fin', $_POST['fecha_fin']);
    }

    if (isset($_POST['puntos'])) {
      update_post_meta($post_id, 'puntos', $_POST['puntos']);
    }

    if (isset($_POST['mensaje_premio'])) {
      update_post_meta($post_id, 'mensaje_premio', $_POST['mensaje_premio']);
    }
    
    if (isset($_POST['video_premio'])) {
      update_post_meta($post_id, 'video_premio', $_POST['video_premio']);
    }

    if (isset($_POST['numero_visualizar'])) {
      update_post_meta($post_id, 'numero_visualizar', $_POST['numero_visualizar']);
    }

    if (isset($_POST['estado'])) {
      update_post_meta($post_id, 'estado', $_POST['estado']);
    }
    
    if (isset($_POST['etiquetas_sel'])) {
      update_post_meta($post_id, 'etiquetas_sel', $_POST['etiquetas_sel']);
    }
    
    if (isset($_POST['numero_correo'])) {
      update_post_meta($post_id, 'numero_correo', $_POST['numero_correo']);
    }
       
    if (isset($_POST['imagen_correo'])) {
      update_post_meta($post_id, 'imagen_correo', $_POST['imagen_correo']);
    }
    
    if (isset($_POST['mensaje_correo'])) {
      update_post_meta($post_id, 'mensaje_correo', $_POST['mensaje_correo']);
    }
    
    //Campos contenido
    if (isset($_POST['categoria_sel'])) {
      update_post_meta($post_id, 'categoria_sel', $_POST['categoria_sel']);
    }
    
    if (isset($_POST['rango1'])) {
      update_post_meta($post_id, 'rango1', $_POST['rango1']);
    }
    if (isset($_POST['rango1_puntos'])) {
      update_post_meta($post_id, 'rango1_puntos', $_POST['rango1_puntos']);
    }
    if (isset($_POST['rango1_titulo'])) {
      update_post_meta($post_id, 'rango1_titulo', $_POST['rango1_titulo']);
    }
    if (isset($_POST['rango1_mensaje_premio'])) {
      update_post_meta($post_id, 'rango1_mensaje_premio', $_POST['rango1_mensaje_premio']);
    }
    if (isset($_POST['rango1_video_premio'])) {
      update_post_meta($post_id, 'rango1_video_premio', $_POST['rango1_video_premio']);
    }
    if (isset($_POST['rango1_imagen_correo'])) {
      update_post_meta($post_id, 'rango1_imagen_correo', $_POST['rango1_imagen_correo']);
    }
    
    if (isset($_POST['rango2'])) {
      update_post_meta($post_id, 'rango2', $_POST['rango2']);
    }
    if (isset($_POST['rango2_puntos'])) {
      update_post_meta($post_id, 'rango2_puntos', $_POST['rango2_puntos']);
    }
    if (isset($_POST['rango2_titulo'])) {
      update_post_meta($post_id, 'rango2_titulo', $_POST['rango2_titulo']);
    }
    if (isset($_POST['rango2_mensaje_premio'])) {
      update_post_meta($post_id, 'rango2_mensaje_premio', $_POST['rango2_mensaje_premio']);
    }
    if (isset($_POST['rango2_video_premio'])) {
      update_post_meta($post_id, 'rango2_video_premio', $_POST['rango2_video_premio']);
    }
    if (isset($_POST['rango2_imagen_correo'])) {
      update_post_meta($post_id, 'rango2_imagen_correo', $_POST['rango2_imagen_correo']);
    }
    
    if (isset($_POST['rango3'])) {
      update_post_meta($post_id, 'rango3', $_POST['rango3']);
    }
    if (isset($_POST['rango3_puntos'])) {
      update_post_meta($post_id, 'rango3_puntos', $_POST['rango3_puntos']);
    }
    if (isset($_POST['rango3_titulo'])) {
      update_post_meta($post_id, 'rango3_titulo', $_POST['rango3_titulo']);
    }
    if (isset($_POST['rango3_mensaje_premio'])) {
      update_post_meta($post_id, 'rango3_mensaje_premio', $_POST['rango3_mensaje_premio']);
    }
    if (isset($_POST['rango3_video_premio'])) {
      update_post_meta($post_id, 'rango3_video_premio', $_POST['rango3_video_premio']);
    }
    if (isset($_POST['rango3_imagen_correo'])) {
      update_post_meta($post_id, 'rango3_imagen_correo', $_POST['rango3_imagen_correo']);
    }
    if (isset($_POST['id_youtube'])) {
        update_post_meta($post_id, 'id_youtube', $_POST['id_youtube']);
    }
    if (isset($_POST['video_background_loop'])) {
        update_post_meta($post_id, 'video_background_loop', $_POST['video_background_loop']);
    }
    if (isset($_POST['imagen_alterna'])) {
        update_post_meta($post_id, 'imagen_alterna', $_POST['imagen_alterna']);
    }
    

}



?>
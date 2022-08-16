<?php

/* CREAR POST TYPE EVENTOS*/

/*
* Creating a function to create our CPT
*/

function custom_post_type_eventos()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Eventos', 'Post Type General Name'),
        'singular_name'       => _x('Evento', 'Post Type Singular Name'),
        'menu_name'           => __('Eventos'),
        'parent_item_colon'   => __('Parent Evento'),
        'all_items'           => __('Todos los Eventos'),
        'view_item'           => __('Ver Evento'),
        'add_new_item'        => __('Añadir nuevo Evento'),
        'add_new'             => __('Añadir nuevo', 'eventos'),
        'edit_item'           => __('Editar Evento'),
        'update_item'         => __('Actualizar Evento'),
        'search_items'        => __('Buscar Evento'),
        'not_found'           => __('No hay eventos'),
        'not_found_in_trash'  => __('No hay eventos en la papelera'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('eventos'),
        'description'         => __('Eventos'),
        'menu_icon'           => 'dashicons-megaphone',
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields'),
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
        'menu_position'       => 4.0,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type('eventos', $args);


    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI

    $labels = array(
        'name' => _x('Categorias', 'taxonomy general name'),
        'singular_name' => _x('Categoria', 'taxonomy singular name'),
        'search_items' =>  __('Buscar Categorias'),
        'all_items' => __('Categorias'),
        'parent_item' => __('Parent Categoria'),
        'parent_item_colon' => __('Parent Categoria:'),
        'edit_item' => __('Editar Categoria'),
        'update_item' => __('Actualizar Categoria'),
        'add_new_item' => __('Añadir nueva Categoria'),
        'new_item_name' => __('Nombre nueva categoria'),
        'menu_name' => __('Categorias'),
    );

    // Now register the taxonomy
    register_taxonomy('categoriasEventos', array('eventos'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'categorias'),
    ));




    // Labels part for the GUI

    $labels = array(
        'name' => _x('Etiquetas', 'taxonomy general name'),
        'singular_name' => _x('Etiqueta', 'taxonomy singular name'),
        'search_items' =>  __('Buscar Etiquetas'),
        'popular_items' => __('Etiquetas populares'),
        'all_items' => __('Todas las Etiquetas'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Editar Etiqueta'),
        'update_item' => __('Actualizar Etiqueta'),
        'add_new_item' => __('Añadir nueva Etiqueta'),
        'new_item_name' => __('Nombre nueva etiqueta'),
        'separate_items_with_commas' => __('Separa las etiquetas con coma'),
        'add_or_remove_items' => __('Añadir o remover etiquetas'),
        'choose_from_most_used' => __('Elije desde las etiquetas mas usadas'),
        'menu_name' => __('Etiquetas'),
    );

    // Now register the non-hierarchical taxonomy like tag

    register_taxonomy('etiquetasEventos', 'eventos', array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'etiquetas'),
    ));
    
    
    register_post_meta('eventos','fecha_evento',array( 'show_in_rest' => true, 'single' => true, 'type' => 'string', ));
    register_post_meta('eventos','fecha_max_inscripcion',array( 'show_in_rest' => true, 'single' => true, 'type' => 'string', ));
    register_post_meta('eventos','aforo',array( 'show_in_rest' => true, 'single' => true, 'type' => 'string', ));
}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */

add_action('init', 'custom_post_type_eventos', 0);




/* CREAR METABOX DE OPCIONES PARA LOS EVENTOS */

function opciones_eventos_metabox()
{
    add_meta_box('meta-box-opciones-eventos', 'Opciones Evento', 'opciones_eventos_callback', 'eventos', 'side', 'default');
    add_meta_box('meta-box-opciones-formulario', 'Opciones Formulario', 'opciones_formulario_callback', 'eventos', 'side', 'default');
    add_meta_box('meta-box-pixel', 'Pixel para evento', 'pixel_callback', 'eventos', 'side', 'default');
    add_meta_box('meta-box-notificacion', 'Notificación mail', 'notificacion_callback', 'eventos', 'side', 'default');
    add_meta_box('meta-box-terminos', 'Términos y condiciones', 'terminos_callback', 'eventos', 'side', 'default');
    add_meta_box('meta-box-popup-registro', 'Mensaje popup registro exitoso', 'popup_registro_callback', 'eventos', 'side', 'default');
}
add_action('add_meta_boxes', 'opciones_eventos_metabox');


function opciones_formulario_callback($post)
{
    $values = get_post_custom($post->ID);

    $formulario_elegido_sel = get_post_meta($post->ID, 'formulario_elegido', true);
?>
<style>
.components-base-control__label {
font-weight: bold;
margin-bottom: 10px;
display: block;
}
</style>
<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <?php
            // Get available products so we can show them in select box
            $args = [
                'post_type' => 'formularios',
                'numberposts' => -1,
                'orderby' => 'id',
                'order' => 'ASC'
            ];

            $formularios = new WP_Query($args);
            ?>
            <label class="components-base-control__label" for="formulario_elegido">Elegir formulario:</label>
            <?php
            $tt = get_post_meta( $post->ID, 'formulario_elegido', true);
            ?>
            <select name="formulario_elegido" id="">
                <option value=""></option>
            <?php while($formularios->have_posts()) : $formularios->the_post(); ?>
                <option value="<?php the_ID() ?>" <?php echo ($tt == get_the_ID()) ? 'selected' : '' ?>><?php the_title() ?></option>
            <?php endwhile; ?>
            </select>
        </div>
    </div>
    <p>El formulario debe ser creado previamente desde la sección "Formularios" en el menu lateral</p>
</div>
<?php }




function opciones_eventos_callback($post)
{
    $values = get_post_custom($post->ID);
    $eve_publico = isset($values['eve_publico']) ? esc_attr($values['eve_publico'][0]) : '';
    $program_name = isset($values['program_name']) ? esc_attr($values['program_name'][0]) : '';
    $id_youtube = isset($values['id_youtube']) ? esc_attr($values['id_youtube'][0]) : '';
    $fecha_evento = isset($values['fecha_evento']) ? esc_attr($values['fecha_evento'][0]) : '';
    $fecha_max_inscripcion = isset($values['fecha_max_inscripcion']) ? esc_attr($values['fecha_max_inscripcion'][0]) : '';
    $logo_partners = isset($values['logo_partners']) ? esc_attr($values['logo_partners'][0]) : '';
    
?>
<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="eve_publico">¿El evento será publico?</label>
            <select name="eve_publico" id="eve_publico" style="width:86%;" class="components-text-control__input">
                <option value="Si" <?php selected( $eve_publico, 'Si' ); ?>>Si</option>
                <option value="No" <?php selected( $eve_publico, 'No' ); ?>>No</option>
            </select>
            <input type="text" style="width:100%;margin:16px 0px;display:none;" name="url_evento" id="url_evento" value="<?php echo get_permalink($post->ID); ?>">
        </div>
    </div>
    <p>Si esta seleccionado, el evento aparecerá en la lista de eventos. De lo contrario solo se podrá acceder si se conoce la url</p>
</div>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="program_name">Program name:</label>
            <input class="components-text-control__input" type="text" id="program_name" name="program_name" validar="true" campo="Program name" value="<?php echo esc_html($program_name); ?>" required>
        </div>
    </div>
    <p>Campo para Salesforce</p>
</div>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="id_youtube">Id video Youtube:</label>
            <?php if($id_youtube) { ?>
            <iframe src="https://www.youtube.com/embed/<?php echo esc_html($id_youtube); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php } ?>
            <input class="components-text-control__input" type="text" id="id_youtube" name="id_youtube" value="<?php echo esc_html($id_youtube); ?>">
        </div>
    </div>
    <p>Video que aparecera en el detalle de la tarjeta (Formato horizontal)</p>
</div>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="fecha_evento">Fecha del evento:</label>
            <input class="components-text-control__input" type="datetime-local" id="fecha_evento" name="fecha_evento" value="<?php echo esc_html($fecha_evento); ?>" validar="true" campo="Fecha del evento">
        </div>
    </div>
    <p>Fecha en la que se realizara el evento</p>
</div>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="fecha_max_inscripcion">Fecha limite de inscripción:</label>
            <input class="components-text-control__input" type="datetime-local" id="fecha_max_inscripcion" name="fecha_max_inscripcion" value="<?php echo esc_html($fecha_max_inscripcion); ?>" validar="true" campo="Fecha limite de inscripción:">
        </div>
    </div>
    <p>Fecha limite para que los usuarios se inscriban</p>
</div>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="logo_partners">Logo partners:</label>
            <?php if($logo_partners) { ?>
            <img src="<?php echo esc_html($logo_partners); ?>"/>
            <?php } ?>
            <input class="components-text-control__input" type="url" id="logo_partners" name="logo_partners" value="<?php echo esc_html($logo_partners); ?>">
            <a href="#" class="upload_partners button button-secondary"><?php _e('Seleccionar'); ?></a>
        </div>
    </div>
    <p>Imagen que aparecera en el pie del evento</p>
</div>

<style>
    .components-editor-notices__dismissible .components-notice, .components-editor-notices__pinned .components-notice {
    min-height: 10px;
    }
    .components-notice-list .components-notice__content {
    margin-top: 2px;
    margin-bottom: 2px;
    }
</style>
<script>
    jQuery(document).load(function(){
        console.log('ready');
        console.log(jQuery('#eve_publico').val());
        if(jQuery('#eve_publico').val()) == "Si") {
            jQuery('#url_evento').css('display','none');
        } else {
            jQuery('#url_evento').css('display','block');
        }
    });
    jQuery(document).on('change', '#eve_publico', function() {
        if(this.value == "Si") {
            jQuery('#url_evento').css('display','none');
        } else {
            jQuery('#url_evento').css('display','block');
        }
    });
</script>
<script>
    window.document.addEventListener('DOMContentLoaded', () => {
        const locks = [];
        
        function lock( lockIt, handle, message ) {
          if ( lockIt ) {
            if ( ! locks[ handle ] ) {
              locks[ handle ] = true;
              wp.data.dispatch( 'core/editor' ).lockPostSaving( handle );
              wp.data.dispatch( 'core/notices' ).createNotice(
                'error',
                message,
                { id: handle, isDismissible: false }
              );
            }
          } else if ( locks[ handle ] ) {
            locks[ handle ] = false;
            wp.data.dispatch( 'core/editor' ).unlockPostSaving( handle );
            wp.data.dispatch( 'core/notices' ).removeNotice( handle );
          }
        }
        
        
        jQuery("[validar=true]").each(function( index ) {
            var campo = jQuery(this).attr('campo');
          if(jQuery(this).val() == '') {
             lock(
                true,
                campo+'-lock',
                'Por favor rellena el campo '+campo,
              ); 
          } else {
              lock(
                false,
                campo+'-lock',
                'Por favor rellena el campo '+campo,
              );
          }
        });
        
        jQuery("[validar=true]").change(function() {
            var campo = jQuery(this).attr('campo');
          if(jQuery(this).val() == '') {
             lock(
                true,
                campo+'-lock',
                'Por favor rellena el campo '+campo,
              ); 
          } else {
              lock(
                false,
                campo+'-lock',
                'Por favor rellena el campo '+campo,
              );
          }
        });
        
        let blocksState = wp.data.select( 'core/block-editor' ).getBlocks();
        
        lock(
            true,
            'contenido-lock',
            'Por favor agrega contenido',
          );
        
       wp.data.subscribe( () => {
           

          // get the current title
          const postTitle = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'title' );
        
          // Lock the post if the title is empty.
          lock(
            ! postTitle,
            'title-lock',
            'Por favor ingresa un título para la publicación',
          );
          
          const newBlocksState = wp.data.select( 'core/block-editor' ).getBlocks();
            if ( blocksState.length !== newBlocksState.length ) {
               // Lock post if there are no custom taxonomy terms selected
              lock(
                false,
                'contenido-lock',
                'Por favor agrega contenido',
              );
            }
        
        
          // get custom taxonomy
          const categoriasEventos = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'categoriasEventos' );
        
          // Lock post if there are no custom taxonomy terms selected
          lock(
            categoriasEventos && ! categoriasEventos.length,
            'categoriasEventos-lock',
            'Por favor elige al menos una categoria',
          );
          
          // get custom taxonomy
          const etiquetasEventos = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'etiquetasEventos' );
        
          // Lock post if there are no custom taxonomy terms selected
          lock(
            etiquetasEventos && ! etiquetasEventos.length,
            'etiquetas-lock',
            'Por favor ingresa al menos una etiqueta',
          );
        
          // get the Featured Image
          const featuredImage = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'featured_media' );
        
          // Lock post if there is no Featured Image selected
          lock(
            featuredImage === 0,
            'featured-image-lock',
            'Por favor añade una imagen destacada',
          );
        
        });
    });
</script>

<?php
}


function pixel_callback($post)
{
    $values = get_post_custom($post->ID);
    $pixel_evento = get_post_meta($post->ID, 'pixel_evento', true);
?>
<style>
.components-base-control__label {
font-weight: bold;
margin-bottom: 10px;
display: block;
}
</style>
<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="formulario_elegido">Pixel para el evento:</label>
            <textarea class="components-text-control__input" name="pixel_evento" id="pixel_evento"><?php echo $pixel_evento; ?></textarea>
        </div>
    </div>
    <p>El pixel será insertado en la etiqueta "< head >"</p>
</div>
<?php 
}

function notificacion_callback($post)
{
    $values = get_post_custom($post->ID);
    $mensaje_mail = get_post_meta($post->ID, 'mensaje_mail', true);
    
?>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="mensaje_mail">Mensaje:</label>
            <textarea class="components-text-control__input" id="mensaje_mail" name="mensaje_mail"><?php echo esc_html($mensaje_mail); ?></textarea>
        </div>
    </div>
</div>

<?php
}


function terminos_callback($post)
{
    $values = get_post_custom($post->ID);
    $terminos_evento = get_post_meta($post->ID, 'terminos_evento', true);
    
?>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="terminos_evento">Url términos y condiciones:</label>
            <input type="text" class="components-text-control__input" id="terminos_evento" name="terminos_evento" value="<?php echo esc_html($terminos_evento); ?>">
        </div>
    </div>
</div>

<?php
}

function popup_registro_callback($post)
{
    $values = get_post_custom($post->ID);
    $terminos_evento = get_post_meta($post->ID, 'mensaje_popup_registro', true);
    
?>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="mensaje_popup_registro">Mensaje:</label>
            <textarea class="components-text-control__input" id="mensaje_popup_registro" name="mensaje_popup_registro"><?php echo esc_html($mensaje_popup_registro); ?></textarea>
        </div>
    </div>
</div>

<?php
}

function aw_include_script_evento()
{
    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }
    wp_enqueue_script('awscript_eventos', get_stylesheet_directory_uri() . '/assets/js/eventos/subir_partners.js', array('jquery'), null, false);
}
add_action('admin_enqueue_scripts', 'aw_include_script_evento');



add_action('save_post', 'opciones_evento_save');
function opciones_evento_save($post_id)
{
    // Ignoramos los auto guardados.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Si el usuario actual no puede editar entradas no debería estar aquí.
    // if (!current_user_can('edit_post')) {
    //     return;
    // }

    // AHORA es cuando podemos guardar la información.

    // Nos aseguramos de que hay información que guardar.
    if (isset($_POST['id_youtube'])) {
        update_post_meta($post_id, 'id_youtube', $_POST['id_youtube']);
    }
    if (isset($_POST['eve_publico'])) {
        update_post_meta($post_id, 'eve_publico', $_POST['eve_publico']);
    }
    if (isset($_POST['program_name'])) {
        update_post_meta($post_id, 'program_name', $_POST['program_name']);
    }
    if (isset($_POST['fecha_evento'])) {
        update_post_meta($post_id, 'fecha_evento', $_POST['fecha_evento']);
    }
    if (isset($_POST['fecha_max_inscripcion'])) {
        update_post_meta($post_id, 'fecha_max_inscripcion', $_POST['fecha_max_inscripcion']);
    }
    if (isset($_POST['aforo'])) {
        update_post_meta($post_id, 'aforo', $_POST['aforo']);
    }
    if (isset($_POST['logo_partners'])) {
        update_post_meta($post_id, 'logo_partners', $_POST['logo_partners']);
    }
    if (isset($_POST['formulario_elegido'])) {
        update_post_meta($post_id, 'formulario_elegido', $_POST['formulario_elegido']);
    }
    if (isset($_POST['pixel_evento'])) {
        update_post_meta($post_id, 'pixel_evento', $_POST['pixel_evento']);
    }
    if (isset($_POST['mensaje_mail'])) {
        update_post_meta($post_id, 'mensaje_mail', $_POST['mensaje_mail']);
    }
    if (isset($_POST['terminos_evento'])) {
        update_post_meta($post_id, 'terminos_evento', $_POST['terminos_evento']);
    }
    if (isset($_POST['mensaje_popup_registro'])) {
        update_post_meta($post_id, 'mensaje_popup_registro', $_POST['mensaje_popup_registro']);
    }
}



?>
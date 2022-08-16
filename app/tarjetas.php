<?php

/* CREAR POST TYPE TARJETAS*/

/*
* Creating a function to create our CPT
*/

function custom_post_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Tarjetas', 'Post Type General Name'),
        'singular_name'       => _x('Tarjeta', 'Post Type Singular Name'),
        'menu_name'           => __('Tarjetas'),
        'parent_item_colon'   => __('Parent Tarjeta'),
        'all_items'           => __('Todas'),
        'view_item'           => __('Ver Tarjeta'),
        'add_new_item'        => __('Añadir nueva Tarjeta'),
        'add_new'             => __('Añadir nueva'),
        'edit_item'           => __('Editar Tarjeta'),
        'update_item'         => __('Actualizar Tarjeta'),
        'search_items'        => __('Buscar Tarjeta'),
        'not_found'           => __('No hay tarjetas'),
        'not_found_in_trash'  => __('No hay tarjetas en la papelera'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('tarjetas'),
        'description'         => __('Tarjetas'),
        'menu_icon'           => 'dashicons-excerpt-view',
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('title', 'editor', 'thumbnail'),
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
        'show_in_rest' => true

    );

    // Registering your Custom Post Type
    register_post_type('tarjetas', $args);


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
    register_taxonomy('categoriasTarjetas', array('tarjetas'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'categoriasTarjetas'),
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

    register_taxonomy('etiquetasTarjetas', 'tarjetas', array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'etiquetasTarjetas'),
    ));
    
    
    
    // Taxonomy deportes
    
    global $blog_id;

    if ($blog_id == 1) {
 
        $labels = array(
            'name' => _x('Deportes', 'taxonomy general name'),
            'singular_name' => _x('Deporte', 'taxonomy singular name'),
            'search_items' =>  __('Buscar Deportes'),
            'all_items' => __('Deportes'),
            'parent_item' => __('Parent Deporte'),
            'parent_item_colon' => __('Parent Deporte:'),
            'edit_item' => __('Editar Deporte'),
            'update_item' => __('Actualizar Deporte'),
            'add_new_item' => __('Añadir nuevo Deporte'),
            'new_item_name' => __('Nombre nuevo deporte'),
            'menu_name' => __('Deportes'),
        );
        
        // Now register the taxonomy
        register_taxonomy('deportesTarjetas', array('tarjetas'), array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'show_in_rest' => false,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'deportesTarjetas'),
        ));
    } 


    
    
}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
add_action('init', 'custom_post_type', 0);




/* CREAR METABOX DE OPCIONES PARA LAS TARJETAS */

function opciones_tarjeta_metabox()
{
    add_meta_box('meta-box-opciones-tipo-tarjeta', 'Tipo de tarjeta', 'opciones_tipo_tarjeta_callback', 'tarjetas', 'side', 'default');
    add_meta_box('meta-box-opciones-tarjeta', 'Opciones Tarjeta', 'opciones_tarjeta_callback', 'tarjetas', 'side', 'default');
    add_meta_box('meta-box-opciones-encuesta', 'Opciones Encuesta', 'opciones_encuesta_callback', 'tarjetas', 'side', 'default');
    add_meta_box('meta-box-opciones-reto', 'Opciones Reto', 'opciones_reto_callback', 'tarjetas', 'side', 'default');
}
add_action('add_meta_boxes', 'opciones_tarjeta_metabox');

function opciones_tipo_tarjeta_callback($post)
{
    var_dump($post->post_content);
    $values = get_post_custom($post->ID);

    $tipo_tarjeta_sel = get_post_meta($post->ID, 'tipo_tarjeta', true);
?>
<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <select name="tipo_tarjeta" id="tipo_tarjeta" style="width:86%;" class="components-text-control__input">
                <option value="normal" <?php selected( $tipo_tarjeta_sel, 'normal' ); ?>>Normal</option>
                <option value="encuesta" <?php selected( $tipo_tarjeta_sel, 'encuesta' ); ?>>Encuesta</option>
                <option value="reto" <?php selected( $tipo_tarjeta_sel, 'reto' ); ?>>Reto</option>
            </select>
        </div>
    </div>
</div>
<?php } 


function opciones_encuesta_callback($post)
{
    $values = get_post_custom($post->ID);

    $encuesta_elegida_sel = get_post_meta($post->ID, 'encuesta_elegida', true);
?>
<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <?php
            // Get available products so we can show them in select box
            $args = [
                'post_type' => 'encuestas',
                'numberposts' => -1,
                'orderby' => 'id',
                'order' => 'ASC'
            ];

            $encuestas = new WP_Query($args);
            ?>
            <label class="components-base-control__label" for="encuesta_elegida">Elegir encuesta:</label>
            <?php
            $tt = get_post_meta( $post->ID, 'encuesta_elegida', true);
            ?>
            <select name="encuesta_elegida" id="">
            <?php while($encuestas->have_posts()) : $encuestas->the_post(); ?>
                <option value="<?php the_ID() ?>" <?php echo ($tt == get_the_ID()) ? 'selected' : '' ?>><?php the_title() ?></option>
            <?php endwhile; ?>
            </select>
        </div>
    </div>
    <p>La encuesta debe ser creada previamente desde la sección "Encuestas" en el menu lateral</p>
</div>
<?php }

function opciones_reto_callback($post)
{
    $values = get_post_custom($post->ID);

    $reto_elegido_sel = get_post_meta($post->ID, 'reto_elegido', true);
?>
<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <?php
            // Get available products so we can show them in select box
            $args = [
                'post_type' => 'retos',
                'numberposts' => -1,
                'orderby' => 'id',
                'order' => 'ASC'
            ];

            $retos = new WP_Query($args);
            ?>
            <label class="components-base-control__label" for="reto_elegido">Elegir reto:</label>
            <?php
            $tt = get_post_meta( $post->ID, 'reto_elegido', true);
            ?>
            <select name="reto_elegido" id="">
            <?php while($retos->have_posts()) : $retos->the_post(); ?>
                <option value="<?php the_ID() ?>" <?php echo ($tt == get_the_ID()) ? 'selected' : '' ?>><?php the_title() ?></option>
            <?php endwhile; ?>
            </select>
        </div>
    </div>
    <p>El reto debe ser creado previamente desde la sección "Retos" en el menu lateral</p>
</div>
<?php } ?>


<?php
function opciones_tarjeta_callback($post)
{
    $values = get_post_custom($post->ID);
    $id_youtube = isset($values['id_youtube']) ? esc_attr($values['id_youtube'][0]) : '';
    $video_background = isset($values['video_background_loop']) ? esc_attr($values['video_background_loop'][0]) : '';
    $es_destacado = isset($values['es_destacado']) ? esc_attr($values['es_destacado'][0]) : '';
    $imagen_alterna = isset($values['imagen_alterna']) ? esc_attr($values['imagen_alterna'][0]) : '';

    $meta_element_class = get_post_meta($post->ID, 'tipo_tarjeta', true); //true ensures you get just one value instead of an array
?>
<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="es_destacado">¿Destacado?:</label>
            <?php if($es_destacado == "yes") { $field_id_checked = 'checked="checked"'; } ?>
            <input class="components-text-control__input" type="checkbox" name="es_destacado" id="es_destacado" value="yes" <?php echo esc_html($field_id_checked); ?>>
        </div>
    </div>
    <p>Aparecera en la sección destacados en la lista de tarjetas</p>
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
            <label class="components-base-control__label" for="imagen_alterna">Imagen cabecera detalle:</label>
            <?php if($imagen_alterna) { ?>
            <img src="<?php echo esc_html($imagen_alterna); ?>"/>
            <?php } ?>
            <input class="components-text-control__input" type="text" id="imagen_alterna" name="imagen_alterna" value="<?php echo esc_html($imagen_alterna); ?>">
            <a href="#" class="upload_imagen_alterna button button-secondary"><?php _e('Seleccionar imagen'); ?></a>
        </div>
    </div>
    <p>Imagen que aparecera en la parte superior del detalle de la tarjeta en caso de que no haya video de Youtube</p>
</div>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="video_background_loop">Video background:</label>
            <?php if($video_background) { ?>
            <video src="<?php echo esc_html($video_background); ?>"></video>
            <?php } ?>
            <input class="components-text-control__input" type="text" id="video_background_loop" name="video_background_loop" value="<?php echo esc_html($video_background); ?>">
            <a href="#" class="upload_video_button button button-secondary"><?php _e('Seleccionar video'); ?></a>
        </div>
    </div>
    <p>Video que se reproducira como fondo de tarjeta (Formato vertical)</p>
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
          const categoriasTarjetas = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'categoriasTarjetas' );
        
          // Lock post if there are no custom taxonomy terms selected
          lock(
            categoriasTarjetas && ! categoriasTarjetas.length,
            'categoriasTarjetas-lock',
            'Por favor elige al menos una categoria',
          );
          
          // get custom taxonomy
          const etiquetasTarjetas = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'etiquetasTarjetas' );
        
          // Lock post if there are no custom taxonomy terms selected
          lock(
            etiquetasTarjetas && ! etiquetasTarjetas.length,
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

function aw_include_script()
{
    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }
    wp_enqueue_script('awscript', get_stylesheet_directory_uri() . '/assets/js/tarjetas/subir_video.js', array('jquery'), null, false);
    wp_enqueue_script( 'awscript_imagen_alterna', get_stylesheet_directory_uri() . '/assets/js/tarjetas/subir_imagen_alterna.js', array('jquery'), null, false );
    wp_enqueue_script( 'tipo_tarjeta', get_stylesheet_directory_uri() . '/assets/js/tarjetas/tipo_tarjeta.js', array('jquery'), null, false );
    wp_enqueue_script( 'img_categoria', get_stylesheet_directory_uri() . '/assets/js/tarjetas/img_categoria.js', array('jquery'), null, false );
}
add_action('admin_enqueue_scripts', 'aw_include_script');



add_action('save_post', 'opciones_tarjeta_save');
function opciones_tarjeta_save($post_id)
{
    // Ignoramos los auto guardados.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Si el usuario actual no puede editar entradas no debería estar aquí.
    if ( !current_user_can( 'edit_post', $post_id )) {
		return $post_id;
	}

    // AHORA es cuando podemos guardar la información.

    // Nos aseguramos de que hay información que guardar.
    if (isset($_POST['id_youtube'])) {
        update_post_meta($post_id, 'id_youtube', $_POST['id_youtube']);
    }
    if (isset($_POST['video_background_loop'])) {
        update_post_meta($post_id, 'video_background_loop', $_POST['video_background_loop']);
    }
    if (isset($_POST['es_destacado'])) {
        update_post_meta($post_id, 'es_destacado', $_POST['es_destacado']);
    }
    if (isset($_POST['imagen_alterna'])) {
        update_post_meta($post_id, 'imagen_alterna', $_POST['imagen_alterna']);
    }
    if (isset($_POST['tipo_tarjeta'])) {
        update_post_meta($post_id, 'tipo_tarjeta', $_POST['tipo_tarjeta']);
    }
    if (isset($_POST['encuesta_elegida'])) {
        update_post_meta($post_id, 'encuesta_elegida', $_POST['encuesta_elegida']);
    }
    if (isset($_POST['reto_elegido'])) {
        update_post_meta($post_id, 'reto_elegido', $_POST['reto_elegido']);
    }
}




//Imagen para categoria
add_action('categoriasTarjetas_add_form_fields', 'add_term_image', 10, 2);
function add_term_image($taxonomy){
    ?>
    <div class="form-field term-group">
        <label for="">Imagen de categoría</label>
        <input type="text" name="img_categoria" id="img_categoria" value="<?php echo get_option('img_categoria_defecto'); ?>" style="width: 77%">
        <input type="button" id="upload_img_categoria" class="button" value="Subir imagen" />
    </div>
    <?php
}

/* Añadir campos adicionales a taxonomia categorias */
add_action('created_categoriasTarjetas', 'save_term_image', 10, 2);
function save_term_image($term_id, $tt_id) {
    if (isset($_POST['img_categoria'])) {
      update_term_meta($term_id, 'img_categoria', $_POST['img_categoria']);
    }
}

add_action('categoriasTarjetas_edit_form_fields', 'edit_image_upload', 10, 2);
function edit_image_upload($term, $taxonomy) {
    // get current group
    $txt_upload_image = get_term_meta($term->term_id, 'img_categoria', true);
?>
    <div class="form-field term-group">
        <label for="">Imagen de categoría</label>
        <input type="text" name="img_categoria" id="img_categoria" value="<?php echo $txt_upload_image ?>" style="width: 77%">
        <input type="button" id="upload_img_categoria" class="button" value="Subir imagen" />
    </div>
<?php
}


add_action('edited_categoriasTarjetas', 'update_image_upload', 10, 2);
function update_image_upload($term_id, $tt_id) {
  if (isset($_POST['img_categoria'])) {
    update_term_meta($term_id, 'img_categoria', $_POST['img_categoria']);
  }
}


// Modificar columnas lista tarjetas
add_filter( 'manage_tarjetas_posts_columns', 'set_custom_edit_tarjetas_columns' );
function set_custom_edit_tarjetas_columns($columns) {
    $columns['tipo_tarjeta'] = __( 'Tipo de tarjeta', 'your_text_domain' );
    return $columns;
}

// Añadir informacion a la columna
add_action( 'manage_tarjetas_posts_custom_column' , 'custom_tarjetas_column', 10, 2 );
function custom_tarjetas_column( $column, $post_id ) {
    switch ( $column ) {
        case 'tipo_tarjeta' :
            echo ucfirst(get_post_meta( $post_id , 'tipo_tarjeta' , true )); 
            break;

    }
}

//Permitir ordenar en la columna
add_filter( 'manage_edit-tarjetas_sortable_columns', 'tipo_tarjeta_sortable_columns');
function tipo_tarjeta_sortable_columns( $columns ) {
  $columns['tipo_tarjeta'] = 'Tipo de Tarjeta';
  return $columns;
}



global $blog_id;

if ($blog_id == 1) {
    
    //Columna ID taxonomy deportes
    function add_deportesTarjetas_columns( $columns ) {
        $columns['id'] = 'Id Deporte';
        return $columns;
    }
    add_filter( 'manage_edit-deportesTarjetas_columns', 'add_deportesTarjetas_columns' );
    
    
    function add_deportesTarjetas_column_content($content,$column_name,$term_id){
        $term= get_term($term_id, 'deportesTarjetas');
        switch ($column_name) {
            case 'id':
                //do your stuff here with $term or $term_id
                $content = get_term_meta($term_id, 'id_deporte', true);
                break;
            default:
                break;
        }
        return $content;
    }
    add_filter('manage_deportesTarjetas_custom_column', 'add_deportesTarjetas_column_content',10,3);


    add_action('deportesTarjetas_add_form_fields', 'add_id_deporte', 10, 2);
    function add_id_deporte($taxonomy){
    ?>
        <style>
            body.taxonomy-deportesTarjetas .term-description-wrap {
                display: none;
            }
            body.taxonomy-deportesTarjetas .form-field.term-slug-wrap {
                display: none;
            }
        </style>
        <div class="form-field term-group">
            <label for="">Id Deporte</label>
            <input type="text" name="id_deporte" id="id_deporte" required>
        </div>
   <?php
    }
    /* Añadir campos adicionales a taxonomia categorias */
    add_action('created_deportesTarjetas', 'save_id_deporte', 10, 2);
    function save_id_deporte($term_id, $tt_id) {
        if (isset($_POST['id_deporte'])) {
          update_term_meta($term_id, 'id_deporte', $_POST['id_deporte']);
        }
    }
    
    add_action('deportesTarjetas_edit_form_fields', 'edit_id_deporte', 10, 2);
    function edit_id_deporte($term, $taxonomy) {
        // get current group
        $txt_id_deporte = get_term_meta($term->term_id, 'id_deporte', true);
    ?>
        <style>
            body.taxonomy-deportesTarjetas .term-description-wrap {
                display: none;
            }
            body.taxonomy-deportesTarjetas .form-field.term-slug-wrap {
                display: none;
            }
        </style>
        <tr class="form-field form-required term-name-wrap">
			<th scope="row"><label for="id_deporte">Id Deporte</label></th>
			<td><input name="id_deporte" id="id_deporte" type="text" size="40" value="<?php echo $txt_id_deporte; ?>">
		</tr>
    <?php
    }
    
    
    add_action('edited_deportesTarjetas', 'update_id_deporte', 10, 2);
    function update_id_deporte($term_id, $tt_id) {
      if (isset($_POST['id_deporte'])) {
        update_term_meta($term_id, 'id_deporte', $_POST['id_deporte']);
      }
    }
}
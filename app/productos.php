<?php

/* CREAR POST TYPE PRODUCTOS */



/*
* Creating a function to create our CPT
*/

function custom_post_type_productos()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Productos', 'Post Type General Name'),
        'singular_name'       => _x('Producto', 'Post Type Singular Name'),
        'menu_name'           => __('Productos'),
        'parent_item_colon'   => __('Parent Producto'),
        'all_items'           => __('Todos'),
        'view_item'           => __('Ver Producto'),
        'add_new_item'        => __('Añadir nuevo Producto'),
        'add_new'             => __('Añadir nuevo'),
        'edit_item'           => __('Editar Producto'),
        'update_item'         => __('Actualizar Producto'),
        'search_items'        => __('Buscar Producto'),
        'not_found'           => __('No hay productos'),
        'not_found_in_trash'  => __('No hay productos en la papelera'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('productos'),
        'description'         => __('Productos'),
        'menu_icon'           => 'dashicons-cart',
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
        'show_in_rest' => true

    );

    // Registering your Custom Post Type
    register_post_type('productos', $args);


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
    register_taxonomy('categoriasProductos', array('productos'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'categoriasProductos'),
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

    register_taxonomy('etiquetasProductos', 'productos', array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'etiquetasProductos'),
    ));

}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */

add_action('init', 'custom_post_type_productos', 0);



/* CREAR METABOX DE OPCIONES PARA LAS PRODUCTOS */

function opciones_producto_metabox()
{
    add_meta_box('meta-box-opciones-producto', 'Opciones Producto', 'opciones_producto_callback', 'productos', 'side', 'default');
    add_meta_box( 'tabla_nutricional_completa_metabox', 'Tabla nutricional completa', 'render_tabla_nutricional_completa_meta_box', 'productos', 'side', 'default' );
    // add_meta_box( 'tiendas__metabox', 'Tiendas', 'render_tiendas_meta_box', 'productos', 'side', 'default' );
}
add_action('add_meta_boxes', 'opciones_producto_metabox');

function opciones_producto_callback($post)
{
    $values = get_post_custom($post->ID);
    $tabla_nutricional_completa = isset($values['tabla_nutricional_completa']) ? esc_attr($values['tabla_nutricional_completa'][0]) : '';
    $tabla_nutricional = isset($values['tabla_nutricional']) ? esc_attr($values['tabla_nutricional'][0]) : '';
    $productos_relacionados = isset($values['productos_relacionados']) ? esc_attr($values['productos_relacionados'][0]) : '';
    $values = get_post_custom($post->ID);

    $nombre_tienda1 = isset($values['nombre_tienda1']) ? esc_attr($values['nombre_tienda1'][0]) : '';
    $url_tienda1 = isset($values['url_tienda1']) ? esc_attr($values['url_tienda1'][0]) : '';
    $logo_tienda1 = isset($values['logo_tienda1']) ? esc_attr($values['logo_tienda1'][0]) : '';
    $nombre_tienda2 = isset($values['nombre_tienda2']) ? esc_attr($values['nombre_tienda2'][0]) : '';
    $url_tienda2 = isset($values['url_tienda2']) ? esc_attr($values['url_tienda2'][0]) : '';
    $logo_tienda2 = isset($values['logo_tienda2']) ? esc_attr($values['logo_tienda2'][0]) : '';
    $nombre_tienda3 = isset($values['nombre_tienda3']) ? esc_attr($values['nombre_tienda3'][0]) : '';
    $url_tienda3 = isset($values['url_tienda3']) ? esc_attr($values['url_tienda3'][0]) : '';
    $logo_tienda3 = isset($values['logo_tienda3']) ? esc_attr($values['logo_tienda3'][0]) : '';

    $nombre_partner1 = isset($values['nombre_partner1']) ? esc_attr($values['nombre_partner1'][0]) : '';
    $url_partner1 = isset($values['url_partner1']) ? esc_attr($values['url_partner1'][0]) : '';
    $logo_partner1 = isset($values['logo_partner1']) ? esc_attr($values['logo_partner1'][0]) : '';
    $nombre_partner2 = isset($values['nombre_partner2']) ? esc_attr($values['nombre_partner2'][0]) : '';
    $url_partner2 = isset($values['url_partner2']) ? esc_attr($values['url_partner2'][0]) : '';
    $logo_partner2 = isset($values['logo_partner2']) ? esc_attr($values['logo_partner2'][0]) : '';
    $nombre_partner3 = isset($values['nombre_partner3']) ? esc_attr($values['nombre_partner3'][0]) : '';
    $url_partner3 = isset($values['url_partner3']) ? esc_attr($values['url_partner3'][0]) : '';
    $logo_partner3 = isset($values['logo_partner3']) ? esc_attr($values['logo_partner3'][0]) : '';
    $mostrar_latam = isset($values['mostrar_latam']) ? esc_attr($values['mostrar_latam'][0]) : '';
?>
<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="mostrar_latam">¿Mostrar en Latam?</label>
            <?php if($mostrar_latam == "yes") { $field_id_checked = 'checked="checked"'; } ?>
            <input class="components-text-control__input" type="checkbox" name="mostrar_latam" id="mostrar_latam" value="yes" <?php echo esc_html($field_id_checked); ?>>
        </div>
    </div>
    <p>Si deseas que el producto aparezca en Latam</p>
</div>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="tabla_nutricional">Tabla nutricional:</label>
            <?php if($tabla_nutricional) { ?>
            <img src="<?php echo esc_html($tabla_nutricional); ?>"/>
            <?php } ?>
            <input class="components-text-control__input" type="text" id="tabla_nutricional" name="tabla_nutricional" value="<?php echo esc_html($tabla_nutricional); ?>">
            <a href="#" class="upload_tabla_nutricional button button-secondary"><?php _e('Seleccionar'); ?></a>
        </div>
    </div>
    <p>Imagen que se mostrara como tabla nutricional</p>
</div>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="productos_relacionados">Productos relacionados:</label>
            <input class="components-text-control__input" type="text" id="productos_relacionados" name="productos_relacionados" value="<?php echo esc_html($productos_relacionados); ?>">
        </div>
    </div>
    <p>Productos relacionados que apareceran en el detalle del producto (ID´s separados por comas)</p>
</div>

<div class="editor-post-link custom_block">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="nombre_tienda1">Nombre Tienda 1: </label>
            <input class="components-text-control__input" type="text" id="nombre_tienda1" name="nombre_tienda1" value="<?php echo esc_html($nombre_tienda1); ?>">
        </div>
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="url_tienda1">Url Tienda 1: </label>
            <input class="components-text-control__input" type="text" id="url_tienda1" name="url_tienda1" value="<?php echo esc_html($url_tienda1); ?>">
        </div>
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="logo_tienda1">Logo Tienda 1: </label>
            <input class="components-text-control__input" type="text" id="logo_tienda1" name="logo_tienda1" value="<?php echo esc_html($logo_tienda1); ?>">
        </div>
    </div>
    <br>
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="nombre_tienda2">Nombre Tienda 2: </label>
            <input class="components-text-control__input" type="text" id="nombre_tienda2" name="nombre_tienda2" value="<?php echo esc_html($nombre_tienda2); ?>">
        </div>
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="url_tienda2">Url Tienda 2: </label>
            <input class="components-text-control__input" type="text" id="url_tienda2" name="url_tienda2" value="<?php echo esc_html($url_tienda2); ?>">
        </div>
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="logo_tienda2">Logo Tienda 2: </label>
            <input class="components-text-control__input" type="text" id="logo_tienda2" name="logo_tienda2" value="<?php echo esc_html($logo_tienda2); ?>">
        </div>
    </div>
    <br>
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="nombre_tienda3">Nombre Tienda 3: </label>
            <input class="components-text-control__input" type="text" id="nombre_tienda3" name="nombre_tienda3" value="<?php echo esc_html($nombre_tienda3); ?>">
        </div>
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="url_tienda3">Url Tienda 3: </label>
            <input class="components-text-control__input" type="text" id="url_tienda3" name="url_tienda3" value="<?php echo esc_html($url_tienda3); ?>">
        </div>
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="logo_tienda3">Logo Tienda 3: </label>
            <input class="components-text-control__input" type="text" id="logo_tienda3" name="logo_tienda3" value="<?php echo esc_html($logo_tienda3); ?>">
        </div>
    </div>
    <!-- <p>Url externa de la tienda</p> -->
</div>

<!-- ******** PARTNERS ONLINE ******** -->
<br>
<div class="editor-post-link custom_block">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="nombre_partner1">Nombre Partner 1: </label>
            <input class="components-text-control__input" type="text" id="nombre_partner1" name="nombre_partner1" value="<?php echo esc_html($nombre_partner1); ?>">
        </div>
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="url_partner1">Url Partner 1: </label>
            <input class="components-text-control__input" type="text" id="url_partner1" name="url_partner1" value="<?php echo esc_html($url_partner1); ?>">
        </div>
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="logo_partner1">Logo Partner 1: </label>
            <input class="components-text-control__input" type="text" id="logo_partner1" name="logo_partner1" value="<?php echo esc_html($logo_partner1); ?>">
        </div>
    </div>
    <br>
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="nombre_partner2">Nombre Partner 2: </label>
            <input class="components-text-control__input" type="text" id="nombre_partner2" name="nombre_partner2" value="<?php echo esc_html($nombre_partner2); ?>">
        </div>
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="url_partner2">Url Partner 2: </label>
            <input class="components-text-control__input" type="text" id="url_partner2" name="url_partner2" value="<?php echo esc_html($url_partner2); ?>">
        </div>
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="logo_partner2">Logo Partner 2: </label>
            <input class="components-text-control__input" type="text" id="logo_partner2" name="logo_partner2" value="<?php echo esc_html($logo_partner2); ?>">
        </div>
    </div>
    <br>
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="nombre_partner3">Nombre Partner 3: </label>
            <input class="components-text-control__input" type="text" id="nombre_partner3" name="nombre_partner3" value="<?php echo esc_html($nombre_partner3); ?>">
        </div>
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="url_partner3">Url Partner 3: </label>
            <input class="components-text-control__input" type="text" id="url_partner3" name="url_partner3" value="<?php echo esc_html($url_partner3); ?>">
        </div>
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="logo_partner3">Logo Partner 3: </label>
            <input class="components-text-control__input" type="text" id="logo_partner3" name="logo_partner3" value="<?php echo esc_html($logo_partner3); ?>">
        </div>
    </div>
    <!-- <p>Url externa de la tienda</p> -->
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
          const categoriasProductos = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'categoriasProductos' );
        
          // Lock post if there are no custom taxonomy terms selected
          lock(
            categoriasProductos && ! categoriasProductos.length,
            'categoriasProductos-lock',
            'Por favor elige al menos una categoria',
          );
          
          // get custom taxonomy
          const etiquetasProductos = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'etiquetasProductos' );
        
          // Lock post if there are no custom taxonomy terms selected
          lock(
            etiquetasProductos && ! etiquetasProductos.length,
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

function aw_include_script_tabla()
{
    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }
    wp_enqueue_script( 'awscript_tabla_nutricional', get_stylesheet_directory_uri() . '/assets/js/productos/subir_tabla_nutricional.js', array('jquery'), null, false );
    wp_enqueue_script( 'awscript_tabla_completa', get_stylesheet_directory_uri() . '/assets/js/productos/subir_tabla_completa.js', array('jquery'), null, false );
}
add_action('admin_enqueue_scripts', 'aw_include_script_tabla');

function render_tabla_nutricional_completa_meta_box()
{
	global $post;
	// Get saved meta data
	$tabla_nutricional_completa_meta_content = get_post_meta($post->ID, 'tabla_nutricional_completa', TRUE); 
	if (!$tabla_nutricional_completa_meta_content) $tabla_nutricional_completa_meta_content = '';
	wp_nonce_field( 'tabla_nutricional_completa'.$post->ID, 'tabla_nutricional_completa_nonce');
	// Render editor meta box
	wp_editor( $tabla_nutricional_completa_meta_content, 'tabla_nutricional_completa', array('textarea_rows' => '5'));
}






add_action('save_post', 'opciones_producto_save');
function opciones_producto_save($post_id)
{
    // Ignoramos los auto guardados.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Si el usuario actual no puede editar entradas no debería estar aquí.
    if (!current_user_can('edit_post')) {
        return;
    }

    // AHORA es cuando podemos guardar la información.

    // Nos aseguramos de que hay información que guardar.
    if (isset($_POST['tabla_nutricional_completa'])) {
        update_post_meta($post_id, 'tabla_nutricional_completa', $_POST['tabla_nutricional_completa']);
    }

    if (isset($_POST['tabla_nutricional'])) {
        update_post_meta($post_id, 'tabla_nutricional', $_POST['tabla_nutricional']);
    }

    if (isset($_POST['productos_relacionados'])) {
        update_post_meta($post_id, 'productos_relacionados', $_POST['productos_relacionados']);
    }
    if(isset( $_POST['tabla_nutricional_completa'])) {
		update_post_meta( $post_id, 'tabla_nutricional_completa', $_POST['tabla_nutricional_completa']);
    }
    if(isset( $_POST['nombre_tienda1'])) {
		update_post_meta( $post_id, 'nombre_tienda1', $_POST['nombre_tienda1']);
    }
    if(isset( $_POST['url_tienda1'])) {
		update_post_meta( $post_id, 'url_tienda1', $_POST['url_tienda1']);
    }
    if(isset( $_POST['logo_tienda1'])) {
		update_post_meta( $post_id, 'logo_tienda1', $_POST['logo_tienda1']);
    }
    if(isset( $_POST['nombre_tienda2'])) {
		update_post_meta( $post_id, 'nombre_tienda2', $_POST['nombre_tienda2']);
    }
    if(isset( $_POST['url_tienda2'])) {
		update_post_meta( $post_id, 'url_tienda2', $_POST['url_tienda2']);
    }
    if(isset( $_POST['logo_tienda2'])) {
		update_post_meta( $post_id, 'logo_tienda2', $_POST['logo_tienda2']);
    }
    if(isset( $_POST['nombre_tienda3'])) {
		update_post_meta( $post_id, 'nombre_tienda3', $_POST['nombre_tienda3']);
    }
    if(isset( $_POST['url_tienda3'])) {
		update_post_meta( $post_id, 'url_tienda3', $_POST['url_tienda3']);
    }
    if(isset( $_POST['logo_tienda3'])) {
		update_post_meta( $post_id, 'logo_tienda3', $_POST['logo_tienda3']);
    }

    if(isset( $_POST['nombre_partner1'])) {
		update_post_meta( $post_id, 'nombre_partner1', $_POST['nombre_partner1']);
    }
    if(isset( $_POST['url_partner1'])) {
		update_post_meta( $post_id, 'url_partner1', $_POST['url_partner1']);
    }
    if(isset( $_POST['logo_partner1'])) {
		update_post_meta( $post_id, 'logo_partner1', $_POST['logo_partner1']);
    }
    if(isset( $_POST['nombre_partner2'])) {
		update_post_meta( $post_id, 'nombre_partner2', $_POST['nombre_partner2']);
    }
    if(isset( $_POST['url_partner2'])) {
		update_post_meta( $post_id, 'url_partner2', $_POST['url_partner2']);
    }
    if(isset( $_POST['logo_partner2'])) {
		update_post_meta( $post_id, 'logo_partner2', $_POST['logo_partner2']);
    }
    if(isset( $_POST['nombre_partner3'])) {
		update_post_meta( $post_id, 'nombre_partner3', $_POST['nombre_partner3']);
    }
    if(isset( $_POST['url_partner3'])) {
		update_post_meta( $post_id, 'url_partner3', $_POST['url_partner3']);
    }
    if(isset( $_POST['logo_partner3'])) {
		update_post_meta( $post_id, 'logo_partner3', $_POST['logo_partner3']);
    }
    if(isset( $_POST['mostrar_latam'])) {
		update_post_meta( $post_id, 'mostrar_latam', $_POST['mostrar_latam']);
    }
}


//Campo personalizado para ordenar categorias
add_action('categoriasProductos_add_form_fields', 'add_term_orden', 10, 2);
function add_term_orden($taxonomy){
    ?>
    <div class="form-field term-group">
        <label for="">Orden de visualización</label>
        <input type="number" name="orden_categorias" id="orden_categorias" value="" style="width: 77%">
        <p>Ingrese un numero</p>
    </div>
    <?php
}


add_action('created_categoriasProductos', 'save_term_orden', 10, 2);
function save_term_orden($term_id, $tt_id) {
    if (isset($_POST['orden_categorias'])) {
      update_term_meta($term_id, 'orden_categorias', $_POST['orden_categorias']);
    }
}

add_action('categoriasProductos_edit_form_fields', 'edit_orden', 10, 2);
function edit_orden($term, $taxonomy) {
    // get current group
    $orden_categorias = get_term_meta($term->term_id, 'orden_categorias', true);
?>
    <div class="form-field term-group">
        <label for="">Orden de visualización</label>
        <input type="number" name="orden_categorias" id="orden_categorias" value="<?php echo $orden_categorias ?>" style="width: 77%">
        <p>Ingrese un numero</p>
    </div>
<?php
}


add_action('edited_categoriasProductos', 'update_orden', 10, 2);
function update_orden($term_id, $tt_id) {
  if (isset($_POST['orden_categorias'])) {
    update_term_meta($term_id, 'orden_categorias', $_POST['orden_categorias']);
  }
}
?>
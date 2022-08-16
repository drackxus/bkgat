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
            'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields'),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array(),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => false,
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
  register_taxonomy('categoriasRetos',array('retos'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'categorias' ),
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
 
  register_taxonomy('etiquetasRetos','retos',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'etiquetas' ),
  ));



     
    }
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
    add_action( 'init', 'custom_post_type_retos', 0 );


  
  
/* CREAR METABOX DURACIÓN RETO */

function opciones_reto_metabox()
{
    add_meta_box('meta-box-opciones-reto', 'Opciones Reto', 'opciones_reto_callback', 'retos', 'side', 'default');
    add_meta_box('meta-box-opciones-tipo-retos', 'Tipo de reto', 'opciones_tipo_retos_callback', 'retos', 'side', 'default');
    add_meta_box('meta-box-comparte-contenido', 'Comparte contenido opciones', 'comparte_contenido_callback', 'retos', 'side', 'default');
    add_meta_box('meta-box-estado-retos', 'Estado retos', 'estaod_retos_callback', 'retos', 'normal', 'default');
}
add_action('add_meta_boxes', 'opciones_reto_metabox');

function opciones_tipo_retos_callback($post)
{
    $values = get_post_custom($post->ID);

    $tipo_retos_sel = get_post_meta($post->ID, 'tipo_retos', true);
?>
<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <select name="tipo_retos" id="tipo_retos" style="width:86%;" class="components-text-control__input">
                <option value="compartir_contenido" <?php selected( $tipo_retos_sel, 'compartir_contenido' ); ?>>Compartir contenidos</option>
                <option value="leer_articulo" <?php selected( $tipo_retos_sel, 'leer_articulo' ); ?>>Leer articulo</option>
                <option value="invita_amigo" <?php selected( $tipo_retos_sel, 'invita_amigo' ); ?>>Invita a un amigo</option>
            </select>
        </div>
    </div>
</div>
<?php } 


function comparte_contenido_callback($post)
{
    $values = get_post_custom($post->ID);
    $numero_compartir = isset($values['numero_compartir']) ? esc_attr($values['numero_compartir'][0]) : '';
    $tipo_contenido_sel = get_post_meta($post->ID, 'tipo_contenido', true);
    $categorias_sel = get_post_meta($post->ID, 'categorias_sel', true);
    $etiquetas_sel = get_post_meta($post->ID, 'etiquetas_sel', true);
?>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="numero_compartir">Numero de elementos a compartir:</label>
            <input class="components-text-control__input" type="number" id="numero_compartir" name="numero_compartir" value="<?php echo esc_html($numero_compartir); ?>">
        </div>
    </div>
    <p>El numero de contendidos que debe compartir el usuario para cumplir el reto</p>
</div>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <select name="tipo_contenido" id="tipo_contenido" style="width:86%;" class="components-text-control__input">
                <option value="todo" <?php selected( $tipo_contenido_sel, 'todo' ); ?>>Todo el contenido</option>
                <option value="categoria" <?php selected( $tipo_contenido_sel, 'categoria' ); ?>>Categorías</option>
                <option value="etiqueta" <?php selected( $tipo_contenido_sel, 'etiqueta' ); ?>>Etiquetas</option>
            </select>
        </div>
    </div>
    <p>Puedes elegir que tipo de contenido deberá compartir el usuario</p>
</div>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;" id="categorias">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <input type="hidden" name="categorias_sel" value="<?php echo esc_html($categorias_sel); ?>" id="categorias_sel" class="categorias_sel">
            <?php 
                $categorias_sel_list = explode(",", $categorias_sel);
                $categorias_list = get_terms('categoriasTarjetas');
                foreach($categorias_list as $categoria) { ?>
                <label for="<?php echo $categoria->name; ?>">
                <?php
                    if (in_array($categoria->name, $categorias_sel_list)) {
                ?>
                <input class="categoria" type="checkbox" name="<?php echo $categoria->name; ?>" id="<?php echo $categoria->name; ?>" value="<?php echo $categoria->name; ?>" checked> 
                <?php echo $categoria->name; ?>
                <?php } else { ?>
                <input class="categoria" type="checkbox" name="<?php echo $categoria->name; ?>" id="<?php echo $categoria->name; ?>" value="<?php echo $categoria->name; ?>"> 
                <?php echo $categoria->name; ?>
                <?php } ?>  
                </label>
                <br>
                <?php
                }
            ?>
        </div>
    </div>
    <p>Puedes elegir que tipo de contenido deberá compartir el usuario</p>
</div>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;" id="etiquetas">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <input type="hidden" name="etiquetas_sel" value="<?php echo esc_html($etiquetas_sel); ?>" id="etiquetas_sel" class="etiquetas_sel">
            <?php 
                $etiquetas_sel_list = explode(",", $etiquetas_sel);
                $etiquetas_list = get_terms('etiquetasTarjetas');
                foreach($etiquetas_list as $etiqueta) { ?>
                <label for="<?php echo $etiqueta->name; ?>">
                <?php
                    if (in_array($etiqueta->name, $etiquetas_sel_list)) {
                ?>
                <input class="etiqueta" type="checkbox" name="<?php echo $etiqueta->name; ?>" id="<?php echo $etiqueta->name; ?>" value="<?php echo $etiqueta->name; ?>" checked> 
                <?php echo $etiqueta->name; ?>
                <?php } else { ?>
                <input class="etiqueta" type="checkbox" name="<?php echo $etiqueta->name; ?>" id="<?php echo $etiqueta->name; ?>" value="<?php echo $etiqueta->name; ?>"> 
                <?php echo $etiqueta->name; ?>
                <?php } ?>  
                </label>
                <br>
                <?php
                }
            ?>
        </div>
    </div>
    <p>Puedes elegir que tipo de contenido deberá compartir el usuario</p>
</div>

<?php
}

function opciones_reto_callback($post)
{
    $values = get_post_custom($post->ID);
    $icono = isset($values['icono']) ? esc_attr($values['icono'][0]) : '';
?>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="icono">Icono reto:</label>
            <input class="components-text-control__input" type="text" id="icono" name="icono" value="<?php echo esc_html($icono); ?>">
            <a href="#" class="upload_icono button button-secondary"><?php _e('Seleccionar icono'); ?></a>
        </div>
    </div>
    <p>Imagen del icono del tipo de evento</p>
</div>


<?php
}

function estado_retos_callback($post)
{
    $values = get_post_custom($post->ID);
    $icono = isset($values['icono']) ? esc_attr($values['icono'][0]) : '';
?>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="icono">Icono reto:</label>
            <input class="components-text-control__input" type="text" id="icono" name="icono" value="<?php echo esc_html($icono); ?>">
            <a href="#" class="upload_icono button button-secondary"><?php _e('Seleccionar icono'); ?></a>
        </div>
    </div>
    <p>Imagen del icono del tipo de evento</p>
</div>


<?php
}

function aw_include_script_retos()
{
    wp_enqueue_script( 'awscript_icono', get_stylesheet_directory_uri() . '/assets/js/retos/subir_icono.js', array('jquery'), null, false );
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
    if (!current_user_can('edit_post')) {
        return;
    }

    // AHORA es cuando podemos guardar la información.

    // Nos aseguramos de que hay información que guardar.
    if (isset($_POST['tipo_retos'])) {
        update_post_meta($post_id, 'tipo_retos', $_POST['tipo_retos']);
    }
    
    if (isset($_POST['icono'])) {
        update_post_meta($post_id, 'icono', $_POST['icono']);
    }

    if (isset($_POST['numero_compartir'])) {
        update_post_meta($post_id, 'numero_compartir', $_POST['numero_compartir']);
    }
    
    if (isset($_POST['tipo_contenido'])) {
        update_post_meta($post_id, 'tipo_contenido', $_POST['tipo_contenido']);
    }
    
    if (isset($_POST['categorias_sel'])) {
        update_post_meta($post_id, 'categorias_sel', $_POST['categorias_sel']);
    }

    if (isset($_POST['etiquetas_sel'])) {
        update_post_meta($post_id, 'etiquetas_sel', $_POST['etiquetas_sel']);
    }
}



?>
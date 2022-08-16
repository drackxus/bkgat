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
}
add_action('add_meta_boxes', 'opciones_tarjeta_metabox');

function opciones_tipo_tarjeta_callback($post)
{
    $values = get_post_custom($post->ID);

    $tipo_tarjeta_sel = get_post_meta($post->ID, 'tipo_tarjeta', true);
?>
<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <select name="tipo_tarjeta" id="tipo_tarjeta" style="width:86%;" class="components-text-control__input">
                <option value="normal" <?php selected( $tipo_tarjeta_sel, 'normal' ); ?>>Normal</option>
                <option value="encuesta" <?php selected( $tipo_tarjeta_sel, 'encuesta' ); ?>>Encuesta</option>
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
<?php } ?>


<?php
function opciones_tarjeta_callback($post)
{
    $values = get_post_custom($post->ID);
    $id_youtube = isset($values['id_youtube']) ? esc_attr($values['id_youtube'][0]) : '';
    $video_background = isset($values['video_background_loop']) ? esc_attr($values['video_background_loop'][0]) : '';
    $poster_video = isset($values['poster_video']) ? esc_attr($values['poster_video'][0]) : '';
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

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="poster_video">Poster video:</label>
            <?php if($poster_video) { ?>
            <img src="<?php echo esc_html($poster_video); ?>"/>
            <?php } ?>
            <input class="components-text-control__input" type="text" id="poster_video" name="poster_video" value="<?php echo esc_html($poster_video); ?>">
            <a href="#" class="upload_poster_video button button-secondary"><?php _e('Seleccionar poster'); ?></a>
        </div>
    </div>
    <p>Imagen que se mostrara mientras carga el video background (Se recomienda el primer frame del video background, fomato vertical)</p>
</div>
<?php
}

function aw_include_script()
{
    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }
    wp_enqueue_script('awscript', get_stylesheet_directory_uri() . '/assets/js/tarjetas/subir_video.js', array('jquery'), null, false);
    wp_enqueue_script( 'awscript_poster', get_stylesheet_directory_uri() . '/assets/js/tarjetas/subir_poster.js', array('jquery'), null, false );
    wp_enqueue_script( 'awscript_imagen_alterna', get_stylesheet_directory_uri() . '/assets/js/tarjetas/subir_imagen_alterna.js', array('jquery'), null, false );
    wp_enqueue_script( 'tipo_tarjeta', get_stylesheet_directory_uri() . '/assets/js/tarjetas/tipo_tarjeta.js', array('jquery'), null, false );
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
    if (!current_user_can('edit_post')) {
        return;
    }

    // AHORA es cuando podemos guardar la información.

    // Nos aseguramos de que hay información que guardar.
    if (isset($_POST['id_youtube'])) {
        update_post_meta($post_id, 'id_youtube', $_POST['id_youtube']);
    }
    if (isset($_POST['video_background_loop'])) {
        update_post_meta($post_id, 'video_background_loop', $_POST['video_background_loop']);
    }
    if (isset($_POST['poster_video'])) {
        update_post_meta($post_id, 'poster_video', $_POST['poster_video']);
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
}



add_action('deportesTarjetas_add_form_fields', 'add_term_image', 10, 2);
function add_term_image($taxonomy){
    ?>
    <div class="form-field term-group">
        <label for="">Upload and Image</label>
        <input type="text" name="txt_upload_image" id="txt_upload_image" value="" style="width: 77%">
        <input type="button" id="upload_image_btn" class="button" value="Upload an Image" />
    </div>
    <?php
}

add_action('created_deportesTarjetas', 'save_term_image', 10, 2);
function save_term_image($term_id, $tt_id) {
    if (isset($_POST['txt_upload_image']) && '' !== $_POST['txt_upload_image']){
        $group = '#' . sanitize_title($_POST['txt_upload_image']);
        add_term_meta($term_id, 'term_image', $group, true);
    }
}

add_action('deportesTarjetas_edit_form_fields', 'edit_image_upload', 10, 2);
function edit_image_upload($term, $taxonomy) {
    // get current group
    $txt_upload_image = get_term_meta($term->term_id, 'term_image', true);
?>
    <div class="form-field term-group">
        <label for="">Upload and Image</label>
        <input type="text" name="txt_upload_image" id="txt_upload_image" value="<?php echo $txt_upload_image ?>" style="width: 77%">
        <input type="button" id="upload_image_btn" class="button" value="Upload an Image" />
    </div>
<?php
}

add_action('edited_deportesTarjetas', 'update_image_upload', 10, 2);
function update_image_upload($term_id, $tt_id) {
    if (isset($_POST['txt_upload_image']) && '' !== $_POST['txt_upload_image']){
        $group = '#' . sanitize_title($_POST['txt_upload_image']);
        update_term_meta($term_id, 'term_image', $group);
    }
}

function image_uploader_enqueue() {
    global $typenow;
    if( ($typenow == 'tarjetas') ) {
        wp_enqueue_media();
        wp_register_script('meta-image', get_stylesheet_directory_uri() . '/assets/js/tarjetas/subir_deporte_icono.js', array('jquery'), null, false);
        wp_localize_script( 'meta-image', 'meta_image',
            array(
                'title' => 'Upload an Image',
                'button' => 'Use this Image',
            )
        );
        wp_enqueue_script( 'meta-image' );
    }
}
add_action( 'admin_enqueue_scripts', 'image_uploader_enqueue' );

?>
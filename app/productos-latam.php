<?php

/* CREAR POST TYPE PRODUCTOS */



/*
* Creating a function to create our CPT
*/

function custom_post_type_productoslatam()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Productos', 'Post Type General Name'),
        'singular_name'       => _x('Producto', 'Post Type Singular Name'),
        'menu_name'           => __('Productos Latam'),
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
    register_post_type('productoslatam', $args);


}

add_action('init', 'custom_post_type_productoslatam', 0);



/* CREAR METABOX DE OPCIONES PARA LAS PRODUCTOS */

function opciones_productolatam_metabox()
{
    add_meta_box('meta-box-opciones-producto-latam', 'Opciones Producto', 'opciones_productolatam_callback', 'productoslatam', 'side', 'default');
}
add_action('add_meta_boxes', 'opciones_productolatam_metabox');

function opciones_productolatam_callback($post)
{
    $values = get_post_custom($post->ID);
    $bg_desktop = isset($values['bg_desktop']) ? esc_attr($values['bg_desktop'][0]) : '';
    $bg_mobile = isset($values['bg_mobile']) ? esc_attr($values['bg_mobile'][0]) : '';
?>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="bg_desktop">Background Desktop:</label>
            <?php if($bg_desktop) { ?>
            <img src="<?php echo esc_html($bg_desktop); ?>"/>
            <?php } ?>
            <input class="components-text-control__input" type="text" id="bg_desktop" name="bg_desktop" value="<?php echo esc_html($bg_desktop); ?>">
            <a href="#" class="upload_bg_desktop button button-secondary"><?php _e('Seleccionar'); ?></a>
        </div>
    </div>
    <p>Imagen que se mostrara como fondo</p>
</div>

<div class="editor-post-link custom_block" style="border-bottom:1px solid orange;">
    <div class="components-base-control">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="bg_mobile">Background Mobile:</label>
            <?php if($bg_mobile) { ?>
            <img src="<?php echo esc_html($bg_mobile); ?>"/>
            <?php } ?>
            <input class="components-text-control__input" type="text" id="bg_mobile" name="bg_mobile" value="<?php echo esc_html($bg_mobile); ?>">
            <a href="#" class="upload_bg_mobile button button-secondary"><?php _e('Seleccionar'); ?></a>
        </div>
    </div>
    <p>Imagen que se mostrara como fondo</p>
</div>


<script>
jQuery(function($) {
    $('body').on('click', '.upload_bg_desktop', function(e) {
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'Background Desktop',
                library: {
                    uploadedTo: wp.media.view.settings.post.id,
                    type: 'image/jpeg'
                },
                button: {
                    text: 'Usar'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#bg_desktop').val(attachment.url);
            })
            .open();
    });
});
</script>

<script>
jQuery(function($) {
    $('body').on('click', '.upload_bg_mobile', function(e) {
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'Background Mobile',
                library: {
                    uploadedTo: wp.media.view.settings.post.id,
                    type: 'image/jpeg'
                },
                button: {
                    text: 'Usar'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#bg_mobile').val(attachment.url);
            })
            .open();
    });
});
</script>

<?php
}

add_action('save_post', 'opciones_productolatam_save');
function opciones_productolatam_save($post_id)
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
    if(isset( $_POST['bg_desktop'])) {
		update_post_meta( $post_id, 'bg_desktop', $_POST['bg_desktop']);
    }
    if(isset( $_POST['bg_mobile'])) {
		update_post_meta( $post_id, 'bg_mobile', $_POST['bg_mobile']);
    }
}


?>
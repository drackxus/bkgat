<?php

/* CREAR POST TYPE REGISTRO EVENTOS*/



/*
* Creating a function to create our CPT
*/

function custom_post_type_registros_evento()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Registros eventos', 'Post Type General Name'),
        'singular_name'       => _x('Registro evento', 'Post Type Singular Name'),
        'menu_name'           => __('Registros eventos'),
        'parent_item_colon'   => __('Parent Registro evento'),
        'all_items'           => __('Todos'),
        'view_item'           => __('Ver Registro evento'),
        'add_new_item'        => __('Añadir nuevo Registro evento'),
        'add_new'             => __('Añadir nuevo'),
        'edit_item'           => __('Editar Registro evento'),
        'update_item'         => __('Actualizar Registro evento'),
        'search_items'        => __('Buscar Registro evento'),
        'not_found'           => __('No hay registros de eventos'),
        'not_found_in_trash'  => __('No hay registros de eventos en la papelera'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('registros_evento'),
        'description'         => __('Registros eventos'),
        'menu_icon'           => 'dashicons-groups',
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('title'),
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
        'menu_position'       => 4.0,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'capabilities' => array(
            'create_posts' => 'do_not_allow', // Removes support for the "Add New" function ( use 'do_not_allow' instead of false for multisite set ups )
            'publish_posts' => 'do_not_allow',
            'update_posts' => 'do_not_allow'
            // 'edit_posts' => 'do_not_allow',
        ),
        'map_meta_cap' => true, // Set to `false`, if users are not allowed to edit/delete existing posts
        'show_in_rest' => true

    );

    // Registering your Custom Post Type
    register_post_type('registros_evento', $args);


    
}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */

add_action('init', 'custom_post_type_registros_evento', 0);





/* CREAR METABOX DE DATOS */

function datos_registros_evento_metabox()
{
    add_meta_box('meta-box-datos-registros_evento', 'Datos del registro', 'datos_registros_evento_callback', 'registros_evento', 'normal', 'default');
}
add_action('add_meta_boxes', 'datos_registros_evento_metabox');

function datos_registros_evento_callback($post)
{
    $values = get_post_custom($post->ID);
    $info_campos2 = isset($values['info_campos2']) ? esc_attr($values['info_campos2'][0]) : '';
    $info_campos = get_post_meta($post->ID, 'info_campos', true) ? get_post_meta($post->ID, 'info_campos', true) : '';
?>

<style>
.form-table td {
  padding: 8px 8px !important;
}
.form-table th {
  padding: 8px 8px 8px 0 !important;
}
</style>
<script>
    jQuery('#title').prop('required',true);
</script>
<table class="form-table" role="presentation">
    <tbody>
        <?php
        foreach($info_campos as $campo) {
        ?>
        <tr>
          <th scope="row"><b style="text-transform:capitalize;"><?php echo $campo['name']; ?>:</b></th>
          <td>
          <?php echo $campo['value']; ?>
          </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>




<?php
}

add_action('save_post', 'datos_registros_evento_save');
function datos_registros_evento_save($post_id)
{
    
}


?>
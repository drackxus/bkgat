<?php

/* CREAR POST TYPE TARJETAS*/



/*
* Creating a function to create our CPT
*/

function custom_post_type_preguntas()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Preguntas', 'Post Type General Name'),
        'singular_name'       => _x('Pregunta', 'Post Type Singular Name'),
        'menu_name'           => __('Preguntas'),
        'parent_item_colon'   => __('Parent Pregunta'),
        'all_items'           => __('Todas'),
        'view_item'           => __('Ver Pregunta'),
        'add_new_item'        => __('Añadir nueva Pregunta'),
        'add_new'             => __('Añadir nueva'),
        'edit_item'           => __('Editar Pregunta'),
        'update_item'         => __('Actualizar Pregunta'),
        'search_items'        => __('Buscar Pregunta'),
        'not_found'           => __('No hay preguntas'),
        'not_found_in_trash'  => __('No hay preguntas en la papelera'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('preguntas'),
        'description'         => __('Preguntas'),
        'menu_icon'           => 'dashicons-excerpt-view',
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('title', 'editor'),
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
        'show_in_rest' => false

    );

    // Registering your Custom Post Type
    register_post_type('preguntas', $args);

}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */

add_action('init', 'custom_post_type_preguntas', 0);

?>
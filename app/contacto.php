<?php

/* CREAR POST TYPE TARJETAS*/



/*
* Creating a function to create our CPT
*/

function custom_post_type_contacto()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Contactos', 'Post Type General Name'),
        'singular_name'       => _x('Contacto', 'Post Type Singular Name'),
        'menu_name'           => __('Contactos'),
        'parent_item_colon'   => __('Parent Contacto'),
        'all_items'           => __('Todas'),
        'view_item'           => __('Ver Contacto'),
        'add_new_item'        => __('Añadir nuevo Contacto'),
        'add_new'             => __('Añadir nuevo'),
        'edit_item'           => __('Editar Contacto'),
        'update_item'         => __('Actualizar Contacto'),
        'search_items'        => __('Buscar Contacto'),
        'not_found'           => __('No hay contactos'),
        'not_found_in_trash'  => __('No hay contactos en la papelera'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('contactos'),
        'description'         => __('Contactos'),
        'menu_icon'           => 'dashicons-email-alt',
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
    register_post_type('contactos', $args);

}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */

add_action('init', 'custom_post_type_contacto', 0);






?>
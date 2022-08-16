
<?php
/* CREAR POST TYPE PERFILES */

/*
* Creating a function to create our CPT
*/

function custom_post_type_perfiles()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Perfiles', 'Post Type General Name'),
        'singular_name'       => _x('Perfil', 'Post Type Singular Name'),
        'menu_name'           => __('Perfiles'),
        'parent_item_colon'   => __('Parent Perfil'),
        'all_items'           => __('Todos'),
        'view_item'           => __('Ver Perfil'),
        'add_new_item'        => __('Añadir nuevo Perfil'),
        'add_new'             => __('Añadir nuevo'),
        'edit_item'           => __('Editar Perfil'),
        'update_item'         => __('Actualizar Perfil'),
        'search_items'        => __('Buscar Perfil'),
        'not_found'           => __('No hay perfiles'),
        'not_found_in_trash'  => __('No hay perfiles en la papelera'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('perfiles'),
        'description'         => __('Perfiles'),
        'menu_icon'           => 'dashicons-awards',
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('title', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        // 'taxonomies'          => array('categoriasTarjetas', 'etiquetasTarjetas'),
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
        'show_in_rest' => false,

    );

    // Registering your Custom Post Type
    register_post_type('perfiles', $args);


    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI
}

add_action('init', 'custom_post_type_perfiles', 0);



/* CREAR METABOX USUARIO */

function usuario_metabox()
{
    add_meta_box('usuario_completo', 'Usuario', 'usuario_callback', 'perfiles', 'side', 'high');
}
add_action('add_meta_boxes', 'usuario_metabox');

function usuario_callback($post)
{
    $values    = get_post_custom($post->ID);
    $usuario      = isset($values['usuario']) ? esc_attr($values['usuario'][0]) : '';
    $id_usuario     = isset($values['id_usuario']) ? esc_attr($values['id_usuario'][0]) : '';
    $points_usuario     = '10';
?>
    <h3>G points: <?php echo $points_usuario; ?></h3>
    <h4>ID: <?php echo $id_usuario; ?></h4>
    <h4>Nombre: <?php echo $usuario; ?></h4>
<?php
}



/* CREAR METABOX TARJETAS */

function tarjetas_metabox()
{
    add_meta_box('tarjetas_completo', 'Favoritos', 'tarjetas_callback', 'perfiles', 'normal', 'high');
}
add_action('add_meta_boxes', 'tarjetas_metabox');

function tarjetas_callback($postT)
{
    $values    = get_post_custom($postT->ID);
    $usuario      = isset($values['usuario']) ? esc_attr($values['usuario'][0]) : '';
    $id_usuario     = isset($values['id_usuario']) ? esc_attr($values['id_usuario'][0]) : '';

    $favoritos = get_user_meta($id_usuario, 'favorite_post_id', true);
    $favoritos_lista = explode(",", $favoritos);

    $args = array(
        'post_type' => 'tarjetas',
        'post_status' => 'publish',
        'posts_per_page' => '10',
        'post__in' => $favoritos_lista
    );
    $result = new WP_Query($args);
    if ($result->have_posts()) :
        
    ?>
    <ul>
        <?php 
        while ($result->have_posts()) : $result->the_post();
        ?>
        <li>- <a href="<?php echo the_permalink(); ?>" target="_blank"><?php echo the_title(); ?></a></li>
        <?php endwhile; ?>
    </ul>
    <?php
    endif;
    wp_reset_postdata();
    ?>
<?php
}



/* CREAR METABOX EVENTOS */

function eventos_metabox()
{
    add_meta_box('eventos_completo', 'Eventos', 'eventos_callback', 'perfiles', 'normal', 'high');
}
add_action('add_meta_boxes', 'eventos_metabox');

function eventos_callback($post)
{
    $values    = get_post_custom($postT->ID);
    $usuario      = isset($values['usuario']) ? esc_attr($values['usuario'][0]) : '';
    $id_usuario     = isset($values['id_usuario']) ? esc_attr($values['id_usuario'][0]) : '';

    // var_dump($id_usuario);

    $eventos = get_user_meta($id_usuario, 'evento_register', true);
    $eventos_lista = explode(",", $eventos);
    // var_dump($eventos);

    $args = array(
        'post_type' => 'eventos',
        'post_status' => 'publish',
        'posts_per_page' => '10',
        'post__in' => $eventos_lista
    );
    $result = new WP_Query($args);
    if ($result->have_posts()) :
        
    ?>
    <ul>
        <?php 
        while ($result->have_posts()) : $result->the_post();
        ?>
        <li>- <a href="<?php echo the_permalink(); ?>" target="_blank"><?php echo the_title(); ?></a></li>
        <?php endwhile; ?>
    </ul>
    <?php
    endif;
    wp_reset_postdata();
    ?>
<?php
}






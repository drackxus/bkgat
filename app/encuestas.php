<?php

/* CREAR POST TYPE ENCUESTAS*/



/*
* Creating a function to create our CPT
*/

function custom_post_type_encuestas()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Encuestas', 'Post Type General Name'),
        'singular_name'       => _x('Encuesta', 'Post Type Singular Name'),
        'menu_name'           => __('Encuestas'),
        'parent_item_colon'   => __('Parent Encuesta'),
        'all_items'           => __('Todas'),
        'view_item'           => __('Ver Encuesta'),
        'add_new_item'        => __('Añadir nueva Encuesta'),
        'add_new'             => __('Añadir nueva'),
        'edit_item'           => __('Editar Encuesta'),
        'update_item'         => __('Actualizar Encuesta'),
        'search_items'        => __('Buscar Encuesta'),
        'not_found'           => __('No hay encuestas'),
        'not_found_in_trash'  => __('No hay encuestas en la papelera'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('encuestas'),
        'description'         => __('Encuestas'),
        'menu_icon'           => 'dashicons-chart-pie',
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
        'show_in_rest' => true

    );

    // Registering your Custom Post Type
    register_post_type('encuestas', $args);


    
}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */

add_action('init', 'custom_post_type_encuestas', 0);





/* CREAR METABOX DE OPCIONES PARA LAS ENCUESTAS */

function opciones_encuestas_metabox()
{
    add_meta_box('meta-box-opciones-encuestas', 'Opciones Encuesta', 'opciones_encuestas_callback', 'encuestas', 'normal', 'default');
    add_meta_box('meta-box-opciones-encuestas_resultados', 'Resultados Encuesta', 'resultados_encuestas_callback', 'encuestas', 'normal', 'default');
}
add_action('add_meta_boxes', 'opciones_encuestas_metabox');

function opciones_encuestas_callback($post)
{
    $values = get_post_custom($post->ID);
    $pregunta1 = isset($values['pregunta1']) ? esc_attr($values['pregunta1'][0]) : '';
    $opciones1 = isset($values['opciones1']) ? esc_attr($values['opciones1'][0]) : '';

    $pregunta2 = isset($values['pregunta2']) ? esc_attr($values['pregunta2'][0]) : '';
    $opciones2 = isset($values['opciones2']) ? esc_attr($values['opciones2'][0]) : '';
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
        <tr>
          <th scope="row"><label for="pregunta1">Pregunta 1:</label></th>
          <td>
            <input name="pregunta1" type="text" id="pregunta1" value="<?php echo esc_html($pregunta1); ?>" class="regular-text" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="opciones1">Opciones 1:</label></th>
          <td>
            <input name="opciones1" type="text" id="opciones1" value="<?php echo esc_html($opciones1); ?>" class="regular-text" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="pregunta2">Pregunta 2:</label></th>
          <td>
            <input name="pregunta2" type="text" id="pregunta2" value="<?php echo esc_html($pregunta2); ?>" class="regular-text">
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="opciones2">Opciones 2:</label></th>
          <td>
            <input name="opciones2" type="text" id="opciones2" value="<?php echo esc_html($opciones2); ?>" class="regular-text">
          </td>
        </tr>
    </tbody>
</table>




<?php
}





function resultados_encuestas_callback($post)
{
    $values = get_post_custom($post->ID);
    $resultados = isset($values['resultados']) ? esc_attr($values['resultados'][0]) : '';
    $lista_resultados = get_post_meta($post->ID, 'resultados', true);
?>
<?php
    // var_dump($lista_resultados[0]);
    ?>
<div class="editor-post-link custom_block">
<?php
    if($lista_resultados) {
    ?>
    <table width="100%">
        <thead>
            <tr>
                <td><b>USUARIO</b></td>
                <td><b>RESPUESTA 1</b></td>
                <td><b>RESPUESTA 2</b></td>
            </tr>
        </thead>
        <tbody>
        <?php
        for($i = 0; $i < count($lista_resultados); ++$i) { ?>
            <tr>
                <td><a href="wp-admin/profile.php?wp_http_referer=%2Fwp-admin%2Fusers.php"></a><?php print_r($lista_resultados[$i]->user) ?></td>
                <td><?php print_r($lista_resultados[$i]->opciones1) ?></td>
                <td><?php print_r($lista_resultados[$i]->opciones2) ?></td>
            </tr>
        <?php        
        }
        ?>
        </tbody>
    </table>
    <?php
    }
    ?>
</div>



<?php
}

add_action('save_post', 'opciones_encuestas_save');
function opciones_encuestas_save($post_id)
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
    if (isset($_POST['pregunta1'])) {
        update_post_meta($post_id, 'pregunta1', $_POST['pregunta1']);
    }
    if (isset($_POST['opciones1'])) {
        update_post_meta($post_id, 'opciones1', $_POST['opciones1']);
    }

    if (isset($_POST['pregunta2'])) {
        update_post_meta($post_id, 'pregunta2', $_POST['pregunta2']);
    }
    if (isset($_POST['opciones2'])) {
        update_post_meta($post_id, 'opciones2', $_POST['opciones2']);
    }
}


?>
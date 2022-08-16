<?php

/* CREAR POST TYPE FORMULARIOS*/



/*
* Creating a function to create our CPT
*/

function custom_post_type_registros()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Registros five', 'Post Type General Name'),
        'singular_name'       => _x('Registro five', 'Post Type Singular Name'),
        'menu_name'           => __('Registros five'),
        'parent_item_colon'   => __('Parent registro five'),
        'all_items'           => __('Todos'),
        'view_item'           => __('Ver registro five'),
        'add_new_item'        => __('Añadir nuevo registro five'),
        'add_new'             => __('Añadir nuevo'),
        'edit_item'           => __('Editar registro five'),
        'update_item'         => __('Actualizar registro five'),
        'search_items'        => __('Buscar registro five'),
        'not_found'           => __('No hay registros five'),
        'not_found_in_trash'  => __('No hay registros five en la papelera'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('registros'),
        'description'         => __('Registros five'),
        'menu_icon'           => 'dashicons-list-view',
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
        'show_in_rest' => true

    );

    // Registering your Custom Post Type
    register_post_type('registros_five', $args);


    
}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */

add_action('init', 'custom_post_type_registros', 0);


/* CREAR METABOX DE OPCIONES PARA LAS ENCUESTAS */

function opciones_registro_five_metabox()
{
    add_meta_box('meta-box-subtitulo-registro-five', 'Información', 'metabox_subtitulo_registro_five_callback', 'registros_five', 'normal', 'default');
}
add_action('add_meta_boxes', 'opciones_registro_five_metabox');

function metabox_subtitulo_registro_five_callback($post)
{
    $values = get_post_custom($post->ID);
    $status = get_post_meta($post->ID, 'status', true) ? get_post_meta($post->ID, 'status', true) : '';
    $nombre = get_post_meta($post->ID, 'nombre', true) ? get_post_meta($post->ID, 'nombre', true) : '';
    $apellido = get_post_meta($post->ID, 'apellido', true) ? get_post_meta($post->ID, 'apellido', true) : '';
    $correo = get_post_meta($post->ID, 'correo', true) ? get_post_meta($post->ID, 'correo', true) : '';
    $celular = get_post_meta($post->ID, 'celular', true) ? get_post_meta($post->ID, 'celular', true) : '';
    $genero = get_post_meta($post->ID, 'genero', true) ? get_post_meta($post->ID, 'genero', true) : '';
    $pais = get_post_meta($post->ID, 'pais', true) ? get_post_meta($post->ID, 'pais', true) : '';
    $fecha_nacimiento = get_post_meta($post->ID, 'fecha_nacimiento', true) ? get_post_meta($post->ID, 'fecha_nacimiento', true) : '';
    $terminos_condiciones = get_post_meta($post->ID, 'terminos_condiciones', true) ? get_post_meta($post->ID, 'terminos_condiciones', true) : '';
    $politicas_privacidad = get_post_meta($post->ID, 'politicas_privacidad', true) ? get_post_meta($post->ID, 'politicas_privacidad', true) : '';
    $terminos_evento_pais = get_post_meta($post->ID, 'terminos_evento_pais', true) ? get_post_meta($post->ID, 'terminos_evento_pais', true) : '';
    $nombre_parent = get_post_meta($post->ID, 'nombre_parent', true) ? get_post_meta($post->ID, 'nombre_parent', true) : '';
    $apellido_parent = get_post_meta($post->ID, 'apellido_parent', true) ? get_post_meta($post->ID, 'apellido_parent', true) : '';
    $email_parent = get_post_meta($post->ID, 'email_parent', true) ? get_post_meta($post->ID, 'email_parent', true) : '';
    $celular_parent = get_post_meta($post->ID, 'celular_parent', true) ? get_post_meta($post->ID, 'celular_parent', true) : '';
    $tryout = get_post_meta($post->ID, 'tryout', true) ? get_post_meta($post->ID, 'tryout', true) : '';
    $posicion = get_post_meta($post->ID, 'posicion', true) ? get_post_meta($post->ID, 'posicion', true) : '';
    $tipo_registro = get_post_meta($post->ID, 'tipo_registro', true) ? get_post_meta($post->ID, 'tipo_registro', true) : '';
    $menor = get_post_meta($post->ID, 'menor', true) ? get_post_meta($post->ID, 'menor', true) : '';
    $nombre_consentimiento = get_post_meta($post->ID, 'nombre_consentimiento', true) ? get_post_meta($post->ID, 'nombre_consentimiento', true) : '';
    $apellido_consentimiento = get_post_meta($post->ID, 'apellido_consentimiento', true) ? get_post_meta($post->ID, 'apellido_consentimiento', true) : '';
    $nacimiento_consentimiento = get_post_meta($post->ID, 'nacimiento_consentimiento', true) ? get_post_meta($post->ID, 'nacimiento_consentimiento', true) : '';
    $email_consentimiento = get_post_meta($post->ID, 'email_consentimiento', true) ? get_post_meta($post->ID, 'email_consentimiento', true) : '';
    $menor_nombre_consentimiento = get_post_meta($post->ID, 'menor_nombre_consentimiento', true) ? get_post_meta($post->ID, 'menor_nombre_consentimiento', true) : '';
    $envio_salesforce = get_post_meta($post->ID, 'envio_salesforce', true) ? get_post_meta($post->ID, 'envio_salesforce', true) : '';
?>
<style>
.form-table td {
  padding: 8px 8px !important;
}
.form-table th {
  padding: 8px 8px 8px 0 !important;
}
</style>
<table class="form-table" role="presentation">
    <tbody>
        <tr>
          <th scope="row"><label for="envio_salesforce">Envio Salesforce:</label></th>
          <td>
            <input type="text" name="envio_salesforce" id="envio_salesforce" class="regular-text" value="<?php echo esc_html($envio_salesforce); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="status">Status:</label></th>
          <td>
            <input type="text" name="status" id="status" class="regular-text" value="<?php echo esc_html($status); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="nombre">Nombre:</label></th>
          <td>
            <input type="text" name="nombre" id="nombre" class="regular-text" value="<?php echo esc_html($nombre); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="apellido">Apellido:</label></th>
          <td>
            <input type="text" name="apellido" id="apellido" class="regular-text" value="<?php echo esc_html($apellido); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="correo">Correo:</label></th>
          <td>
            <input type="email" name="correo" id="correo" class="regular-text" value="<?php echo esc_html($correo); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="genero">Genero:</label></th>
          <td>
            <input type="text" name="genero" id="genero" class="regular-text" value="<?php echo esc_html($genero); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="celular">Celular:</label></th>
          <td>
            <input type="text" name="celular" id="celular" class="regular-text" value="<?php echo esc_html($celular); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="pais">País:</label></th>
          <td>
            <input type="text" name="pais" id="pais" class="regular-text" value="<?php echo esc_html($pais); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="fecha_nacimiento">Fecha nacimiento:</label></th>
          <td>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="regular-text" value="<?php echo esc_html($fecha_nacimiento); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="terminos_condiciones">Terminos y condiciones:</label></th>
          <td>
            <input type="text" name="terminos_condiciones" id="terminos_condiciones" class="regular-text" value="<?php echo esc_html($terminos_condiciones); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="politicas_privacidad">Politicas de privacidad:</label></th>
          <td>
            <input type="text" name="politicas_privacidad" id="politicas_privacidad" class="regular-text" value="<?php echo esc_html($politicas_privacidad); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="terminos_evento_pais">Terminos evento pais:</label></th>
          <td>
            <input type="text" name="terminos_evento_pais" id="terminos_evento_pais" class="regular-text" value="<?php echo esc_html($terminos_evento_pais); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="tipo_registro">Tipo de registro:</label></th>
          <td>
            <input type="text" name="tipo_registro" id="tipo_registro" class="regular-text" value="<?php echo esc_html($tipo_registro); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="tryout">Tryout:</label></th>
          <td>
            <input type="text" name="tryout" id="tryout" class="regular-text" value="<?php echo esc_html($tryout); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="posicion">Posición:</label></th>
          <td>
            <input type="text" name="posicion" id="posicion" class="regular-text" value="<?php echo esc_html($posicion); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="menor">Menor:</label></th>
          <td>
            <input type="text" name="menor" id="menor" class="regular-text" value="<?php echo esc_html($menor); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="nombre_parent">Nombre acudiente:</label></th>
          <td>
            <input type="text" name="nombre_parent" id="nombre_parent" class="regular-text" value="<?php echo esc_html($nombre_parent); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="apellido_parent">Apellido acudiente:</label></th>
          <td>
            <input type="text" name="apellido_parent" id="apellido_parent" class="regular-text" value="<?php echo esc_html($apellido_parent); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="email_parent">Correo acudiente:</label></th>
          <td>
            <input type="text" name="email_parent" id="email_parent" class="regular-text" value="<?php echo esc_html($email_parent); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="celular_parent">Celular acudiente:</label></th>
          <td>
            <input type="text" name="celular_parent" id="celular_parent" class="regular-text" value="<?php echo esc_html($celular_parent); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="nombre_consentimiento">Nombre consentimiento:</label></th>
          <td>
            <input type="text" name="nombre_consentimiento" id="nombre_consentimiento" class="regular-text" value="<?php echo esc_html($nombre_consentimiento); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="apellido_consentimiento">Apellido consentimiento:</label></th>
          <td>
            <input type="text" name="apellido_consentimiento" id="apellido_consentimiento" class="regular-text" value="<?php echo esc_html($apellido_consentimiento); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="nacimiento_consentimiento">Fecha Nacimiento consentimiento:</label></th>
          <td>
            <input type="date" name="nacimiento_consentimiento" id="nacimiento_consentimiento" class="regular-text" value="<?php echo esc_html($nacimiento_consentimiento); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="email_consentimiento">Email consentimiento:</label></th>
          <td>
            <input type="email" name="email_consentimiento" id="email_consentimiento" class="regular-text" value="<?php echo esc_html($email_consentimiento); ?>" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="menor_nombre_consentimiento">Nombre menor consentimiento:</label></th>
          <td>
            <input type="text" name="menor_nombre_consentimiento" id="menor_nombre_consentimiento" class="regular-text" value="<?php echo esc_html($menor_nombre_consentimiento); ?>" required>
          </td>
        </tr>
    </tbody>
</table>
<?php
}


add_action('save_post', 'opciones_registro_five_save');
function opciones_registro_five_save($post_id)
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
    if (isset($_POST['fecha_nacimiento'])) {
        update_post_meta($post_id, 'fecha_nacimiento', $_POST['fecha_nacimiento']);
    }
    if (isset($_POST['pais'])) {
        update_post_meta($post_id, 'pais', $_POST['pais']);
    }
}


?>
<?php

/* CREAR POST TYPE FORMULARIOS*/



/*
* Creating a function to create our CPT
*/

function custom_post_type_formularios()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Formularios', 'Post Type General Name'),
        'singular_name'       => _x('Formulario', 'Post Type Singular Name'),
        'menu_name'           => __('Formularios'),
        'parent_item_colon'   => __('Parent formulario'),
        'all_items'           => __('Todas'),
        'view_item'           => __('Ver formulario'),
        'add_new_item'        => __('Añadir nuevo formulario'),
        'add_new'             => __('Añadir nuevo'),
        'edit_item'           => __('Editar formulario'),
        'update_item'         => __('Actualizar formulario'),
        'search_items'        => __('Buscar formulario'),
        'not_found'           => __('No hay formularios'),
        'not_found_in_trash'  => __('No hay formularios en la papelera'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('formularios'),
        'description'         => __('Formularios'),
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
    register_post_type('formularios', $args);


    
}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */

add_action('init', 'custom_post_type_formularios', 0);


/* CREAR METABOX DE OPCIONES PARA LAS ENCUESTAS */

function opciones_formulario_metabox()
{
    add_meta_box('meta-box-subtitulo-formulario', 'Subtitulo formulario', 'metabox_subtitulo_formulario_callback', 'formularios', 'normal', 'default');
    add_meta_box('meta-box-opciones-formulario', 'Opciones Formulario', 'metabox_opciones_formulario_callback', 'formularios', 'normal', 'default');
}
add_action('add_meta_boxes', 'opciones_formulario_metabox');

function metabox_subtitulo_formulario_callback($post)
{
    $values = get_post_custom($post->ID);
    $subtitulo = get_post_meta($post->ID, 'subtitulo', true) ? get_post_meta($post->ID, 'subtitulo', true) : '';
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
          <th scope="row"><label for="subtitulo">Subtitulo:</label></th>
          <td>
            <input type="text" name="subtitulo" id="subtitulo" class="regular-text" value="<?php echo esc_html($subtitulo); ?>">
          </td>
        </tr>
    </tbody>
</table>
<?php
}

function metabox_opciones_formulario_callback($post)
{
    $values = get_post_custom($post->ID);
    $campos = get_post_meta($post->ID, 'campos', true) ? get_post_meta($post->ID, 'campos', true) : '[{"tipo_campo":"Tipo texto","pregunta":"Nombre","opciones":"","invitado":"si","registrado":"no"},{"tipo_campo":"Tipo texto","pregunta":"Apellido","opciones":"","invitado":"si","registrado":"no"},{"tipo_campo":"Tipo email","pregunta":"Correo electrónico","opciones":"","invitado":"si","registrado":"no"},{"tipo_campo":"Tipo fecha","pregunta":"Fecha de nacimiento","opciones":"","invitado":"si","registrado":"si"},{"tipo_campo":"Tipo país","pregunta":"País","opciones":"","invitado":"si","registrado":"no"},{"tipo_campo":"Tipo teléfono","pregunta":"Celular","opciones":"","invitado":"si","registrado":"no"}]';
?>
<style>
.form-table td {
  padding: 8px 8px !important;
}
.form-table th {
  padding: 8px 8px 8px 0 !important;
}
#lista_campos_form th {
    text-align: left !important;
    line-height: 18px;
    padding: 6px;
}
#lista_campos_form tr {
    line-height: 34px !important;
}
#lista_campos_form td {
    line-height: 24px;
    padding: 6px;
}
.quit {
    color: red;
    font-weight: bold;
    cursor: pointer;
}
.quit:hover {
    text-decoration: underline;
}
</style>
<script>
    jQuery('#title').prop('required',true);
</script>
<table class="form-table" role="presentation">
    <tbody>
        <tr>
          <th scope="row"></th>
          <td>
            <input name="campos" type="hidden" id="campos" value="<?php echo esc_html($campos); ?>" class="regular-text" required>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="etiqueta1">Tipo de campo:</label></th>
          <td>
            <select name="tipo_campo" id="tipo_campo">
                <option value="Tipo texto">Tipo texto</option>
                <option value="Tipo lista">Tipo lista</option>
                <option value="Tipo fecha">Tipo fecha</option>
                <option value="Tipo país">Tipo país</option>
                <option value="Tipo email">Tipo email</option>
                <option value="Tipo teléfono">Tipo teléfono</option>
            </select>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="invitado">¿Campo para invitado?</label></th>
          <td>
            <input type="checkbox" name="invitado" id="invitado" class="regular-text">
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="registrado">¿Campo para registrado?</label></th>
          <td>
            <input type="checkbox" name="registrado" id="registrado" class="regular-text">
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="pregunta">Pregunta:</label></th>
          <td>
            <input type="text" name="pregunta" id="pregunta" placeholder="Pregunta" class="regular-text">
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="opciones">Opciones:</label></th>
          <td>
            <input type="text" name="opciones" id="opciones" class="regular-text" placeholder="uno,dos,tres">
            <small class="description" style="display:block;">Este campo solo se tomará en cuenta cuando este seleccionado 'Tipo lista' y se debe separar los elementos por medio de comas</small>
          </td>
        </tr>
        <tr>
          <th scope="row">
          </th>
          <td>
          <input type="button" name="anadir_campo" id="anadir_campo" value="Añadir campo" class="button">
          </td>
        </tr>
    </tbody>
</table>
<br>
<br>
<br>
<table id="lista_campos_form" style="width:100%;">
    <thead scope="row">
        <tr>
            <th><b>TIPO DE CAMPO</b></th>
            <th><b>PREGUNTA</b></th>
            <th><b>OPCIONES</b></th>
            <th><b>¿CAMPO PARA INVITADO?</b></th>
            <th><b>¿CAMPO PARA REGISTRADO?</b></th>
            <th><b></b></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(json_decode($campos)) {
            if(count(json_decode($campos)) > 0) {
            $index = 0;
                foreach(json_decode($campos, true) as $campo) {
                    echo '<tr>';
                    echo '<td>'.$campo['tipo_campo'].'</td>';
                    echo '<td>'.$campo['pregunta'].'</td>';
                    echo '<td>'.$campo['opciones'].'</td>';
                    echo '<td>'.$campo['invitado'].'</td>';
                    echo '<td>'.$campo['registrado'].'</td>';
                    echo '<td><span class="quit" index_el="'.$index.'">X</span></td>';
                    echo '</tr>';
                    $index++;
                }
            }
        }
        ?>
    </tbody>
</table>
<script>
    if(jQuery('#campos').val() == '') {
        var list_campos = [];
    } else {
        var list_campos = JSON.parse(jQuery('#campos').val());
    }

    jQuery(document).on("click", ".quit", function() {
        list_campos.splice(jQuery(this).attr('index_el'), 1);
        jQuery(this).parent().parent().remove();
        //Valor al input hidden
        jQuery('#campos').val(JSON.stringify(list_campos));
    });

    jQuery("#anadir_campo").click(function() {
        if (jQuery('#invitado').is(":checked")) {
            var invitado = 'si';
        }
        else {
           var invitado = 'no';
        }
        if (jQuery('#registrado').is(":checked")) {
            var registrado = 'si';
        }
        else {
           var registrado = 'no';
        }
        var numberEl = jQuery('document #lista_campos_form tr').size();
        console.log();
        jQuery('#lista_campos_form tbody').append('<tr><td>'+jQuery("#tipo_campo").val()+'</td><td>'+jQuery("#pregunta").val()+'</td><td>'+jQuery("#opciones").val()+'</td><td>'+invitado+'</td><td>'+registrado+'</td><td><span class="quit" index_el="'+numberEl+'">X</span></td></tr>');
        list_campos.push({ tipo_campo: jQuery("#tipo_campo").val(), pregunta: jQuery("#pregunta").val(), opciones: jQuery("#opciones").val(), invitado: invitado, registrado: registrado });
        console.log(list_campos);
        jQuery('#campos').val(JSON.stringify(list_campos));
    });
</script>
<?php
}

add_action('save_post', 'opciones_formulario_save');
function opciones_formulario_save($post_id)
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
    if (isset($_POST['campos'])) {
        update_post_meta($post_id, 'campos', $_POST['campos']);
    }
    if (isset($_POST['subtitulo'])) {
        update_post_meta($post_id, 'subtitulo', $_POST['subtitulo']);
    }
}


?>
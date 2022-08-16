<?php

function registrar_configuraciones_retos() {
    // $default_img_cat = IMGURL.'img_categoria_defecto.jpg';
    // var_dump($default_img_cat);
    add_option( 'facebook', 'https://facebook.com');
    $settingsArray = array (
      'facebook'
  );

  foreach ($settingsArray as $setting) {
      register_setting( 'configuraciones_app', $setting, 'myplugin_callback_retos');
  }
 }
 add_action( 'admin_init', 'registrar_configuraciones_retos' );


 function pagina_configuraciones_retos() {
    add_options_page('Configuración Retos', 'Configuración Retos', 'manage_options', 'configuraciones_retos', 'contenido_pagina_retos');
  }
  add_action('admin_menu', 'pagina_configuraciones_retos');




 function contenido_pagina_retos()
{
?>
<div>
  <?php screen_icon(); ?>
  <form method="post" action="options.php">
    <?php settings_fields( 'configuraciones_app' ); ?>
    <h2>Configuraciones</h2>

    <table class="form-table" role="presentation">
  <tbody>

    <tr>
      <th scope="row"><label for="estado">Estado</label></th>
      <td>
        <select name="estado" id="estado" required>
          <option value="activo" <?php selected( $estado, 'activo' ); ?>>Activo</option>
          <option value="pausado" <?php selected( $estado, 'pausado' ); ?>>Pausado</option>
        </select>
      </td>
    </tr>
    
    <tr>
      <th scope="row"><label for="tipo_retos">Tipo de reto</label></th>
      <td>
        <select name="tipo_retos" id="tipo_retos" required>
          <option value="campana" <?php selected( $tipo_retos_sel, 'campana' ); ?>>Campaña</option>
          <option value="contenido" <?php selected( $tipo_retos_sel, 'contenido' ); ?>>Contenido</option>
        </select>
        <p class="description item_campana" id="tagline-description">Un reto de tipo "Campaña" funciona por medio de las Etiquetas (tags) que tenga asociadas la publicación (tarjeta). Son retos que son temporales. </p>
        <p class="description item_contenido" id="tagline-description">Un reto de tipo "Contenido" funciona por medio de la Categoria (tags) que tenga asociada la publicación (tarjeta). Son retos que son permanentes. </p>
      </td>
    </tr>
    
    <!-- Cmapos campaña-->
    <tr class="item_campana">
      <th scope="row"><label for="fecha_inicio">Fecha de inicio:</label></th>
      <td>
        <input name="fecha_inicio" type="date" id="fecha_inicio" value="<?php echo esc_html($fecha_inicio); ?>" class="regular-text" required>
        <p class="description" id="tagline-description">Fecha en la que se hará publico el reto</p>
      </td>
    </tr>

    <tr class="item_campana">
      <th scope="row"><label for="fecha_fin">Fecha de finalización:</label></th>
      <td>
        <input name="fecha_fin" type="date" id="fecha_fin" value="<?php echo esc_html($fecha_fin); ?>" class="regular-text" required>
        <p class="description" id="tagline-description">Fecha en la que se ocultará el reto</p>
      </td>
    </tr>

    <tr class="item_campana">
      <th scope="row"><label for="numero_visualizar">Numero de elementos a visualizar:</label></th>
      <td>
        <input name="numero_visualizar" type="number" id="numero_visualizar" value="<?php echo esc_html($numero_visualizar); ?>" class="regular-text" required>
        <p class="description" id="tagline-description">El numero de contendidos que debe visualizar el usuario para cumplir el reto</p>
      </td>
    </tr>

    <tr class="item_campana">
      <th scope="row"><label for="puntos">Puntos:</label></th>
      <td>
        <input name="puntos" type="number" id="puntos" value="<?php echo esc_html($puntos); ?>" class="regular-text" required>
        <p class="description" id="tagline-description">Los puntos que obtendrá el usuario por cumplir el reto</p>
      </td>
    </tr>
    
    <tr class="item_campana">
      <th scope="row"><label for="mensaje_premio">Mensaje reto cumplido:</label></th>
      <td>
        <input name="mensaje_premio" type="text" id="mensaje_premio" value="<?php echo esc_html($mensaje_premio); ?>" class="regular-text" required>
        <p class="description" id="tagline-description">El texto que aparecerá en el popup de reto cumplido</p>
      </td>
    </tr>

    <tr class="item_campana">
      <th scope="row">
        <label for="video_premio">Video premio</label>
      </th>
      <td>
          <input name="video_premio" type="text" id="video_premio" value="<?php echo esc_html($video_premio); ?>" class="regular-text" required onkeypress="return false;">
          <input type="button" id="upload_video_premio" class="button" value="Subir video" />			
      </td>
    </tr>

    <tr class="item_campana">
      <th scope="row">Elige las etiquetas validas para el reto</th>
      <td>
        <fieldset>
          <legend class="screen-reader-text"><span>Elige las etiquetas validas para el reto</span></legend>
          <?php 
            $etiquetas_sel_list = explode(",", $etiquetas_sel);
            $etiquetas_list = get_terms('etiquetasTarjetas');
            foreach($etiquetas_list as $etiqueta) { 
          ?>
              <label for="<?php echo $etiqueta->name; ?>" style="margin-right:14px!important;">
              <input class="etiqueta" name="<?php echo $etiqueta->name; ?>" type="checkbox" id="<?php echo $etiqueta->name; ?>" value="<?php echo $etiqueta->name; ?>" <?php echo (in_array($etiqueta->name, $etiquetas_sel_list)) ? 'checked' : '' ?>>
              <?php echo $etiqueta->name; ?></label>
          <?php
            }
          ?>
          <input type="text" name="etiquetas_sel" id="etiquetas_sel" required="required" title="Elige una de la opciones" class="etiquetas_sel" style="display: block;width: 100%;height: 30px;opacity: 1;padding: 0px;min-height: 0px;" >
          <div id="debug"></div><p class="description">Cada vez que el usuario visualiza un contenido que tenga esta etiqueta se contará para el reto</p>
        </fieldset>
      </td>
    </tr>
    
    <tr class="item_campana">
      <th scope="row"><label for="numero_correo">Numero de elementos para email y popup:</label></th>
      <td>
        <input name="numero_correo" type="number" id="numero_correo" value="<?php echo esc_html($numero_correo); ?>" class="regular-text" required>
        <p class="description" id="tagline-description">El numero de contenidos que tendrá que ver el usuario para enviar el email y mostrar el popup</p>
      </td>
    </tr>
    
    <tr class="item_campana">
      <th scope="row">
        <label for="imagen_correo">Imagen de cabecera email y popup</label>
      </th>
      <td>
          <input name="imagen_correo" type="text" id="imagen_correo" value="<?php echo esc_html($imagen_correo); ?>" class="regular-text" required onkeypress="return false;">
          <input type="button" id="upload_imagen_correo" class="button" value="Subir imagen" />			
      </td>
    </tr>
    
    <tr class="item_campana">
      <th scope="row"><label for="mensaje_correo">Mensaje email y popup:</label></th>
      <td>
        <textarea name="mensaje_correo" id="mensaje_correo" class="regular-text" required/>
            <?php echo esc_html($mensaje_correo); ?>
        </textarea>
        <p class="description" id="tagline-description">El texto que tendrá el email y el popup</p>
      </td>
    </tr>
    
    <!-- Campos contenido-->
    <tr class="item_contenido">
      <th scope="row"><label for="categoria_sel">Categoria</label></th>
      <td>
          <?php
                //obtener las categorias disponibles
	            $terms = get_terms([
                    'taxonomy' => 'categoriasTarjetas',
                    'hide_empty' => false,
                    'parent' => 0
                ]);
                
                $tt = get_post_meta( $post->ID, 'categoria_sel', true);
          ?>
        <select name="categoria_sel" id="categoria_sel" required>
            <?php
	            //Recorremos los categorias
            	foreach ( $terms as $term ) { ?>
            ?>
            <option value="<?php echo $term->name; ?>" <?php echo ($tt == $term->name) ? 'selected' : '' ?>><?php echo $term->name; ?></option>
            <?php
            	}
            ?>
        </select>
        <p class="description">Categoria con la que se validaran las visualizaciones de post (tarjeta). </p>
        <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
      </td>
    </tr>
    
    <tr class="item_contenido">
        <th scope="row">Rango 1</th>
        <td>
            <fieldset>
                <label for="rango1" style="width:10em;font-weight:bold;">Visualizaciones</label>
                <input name="rango1" type="number" id="rango1" value="<?php echo esc_html($rango1); ?>" class="regular-text" required>
                <br><br>
                <label for="rango1_puntos" style="width:10em;font-weight:bold;">Puntos</label>
                <input name="rango1_puntos" type="number" id="rango1_puntos" value="<?php echo esc_html($rango1_puntos); ?>" class="regular-text" required>
                <br><br>
                <label for="rango1_titulo" style="width:10em;font-weight:bold;">Titulo medalla</label>
                <input name="rango1_titulo" type="text" id="rango1_titulo" value="<?php echo esc_html($rango1_titulo); ?>" class="regular-text" required>
                <br><br>
                <label for="rango1_mensaje_premio" style="width:10em;font-weight:bold;">Mensaje reto cumplido</label>
                <input name="rango1_mensaje_premio" type="text" id="rango1_mensaje_premio" value="<?php echo esc_html($rango1_mensaje_premio); ?>" class="regular-text" required>
                <p class="description" style="margin-left:10.4em;margin-top:-0.4em;" id="tagline-description">Mensaje que aparecerá en el popup</p>
                <br>
                <label for="rango1_video_premio" style="width:10em;font-weight:bold;">Video premio</label>
                <input style="width:47%;" name="rango1_video_premio" type="text" id="rango1_video_premio" value="<?php echo esc_html($rango1_video_premio); ?>" class="regular-text" required onkeypress="return false;">
                <input type="button" id="upload_rango1_video_premio" class="button" value="Subir video" />
                <br><br>
                <label for="rango1_imagen_correo" style="width:10em;font-weight:bold;">Imagen de cabecera email</label>
                <input style="width:47%;" name="rango1_imagen_correo" type="text" id="rango1_imagen_correo" value="<?php echo esc_html($rango1_imagen_correo); ?>" class="regular-text" onkeypress="return false;">
                <input type="button" id="upload_rango1_imagen_correo" class="button" value="Subir imagen" />
                <p class="description" style="margin-left:10.4em;margin-top:-0.4em;" id="tagline-description">Imagen que aparecerá en el mensaje del email.<br>Este campo es opcional si esta vacio no se envia el mensaje</p>
            </fieldset>
            <br>
            <p class="description" style="margin-left:10.4em;" id="tagline-description">Los datos para establecer un rango de visualizaciones</p>
            <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
        </td>
    </tr>
    
    <tr class="item_contenido">
        <th scope="row">Rango 2</th>
        <td>
            <fieldset>
                <label for="rango2" style="width:10em;font-weight:bold;">Visualizaciones</label>
                <input name="rango2" type="number" id="rango2" value="<?php echo esc_html($rango2); ?>" class="regular-text">
                <br><br>
                <label for="rango2_puntos" style="width:10em;font-weight:bold;">Puntos</label>
                <input name="rango2_puntos" type="number" id="rango2_puntos" value="<?php echo esc_html($rango2_puntos); ?>" class="regular-text">
                <br><br>
                <label for="rango2_titulo" style="width:10em;font-weight:bold;">Titulo medalla</label>
                <input name="rango2_titulo" type="text" id="rango2_titulo" value="<?php echo esc_html($rango2_titulo); ?>" class="regular-text">
                <br><br>
                <label for="rango2_mensaje_premio" style="width:10em;font-weight:bold;">Mensaje reto cumplido</label>
                <input name="rango2_mensaje_premio" type="text" id="rango2_mensaje_premio" value="<?php echo esc_html($rango2_mensaje_premio); ?>" class="regular-text">
                <p class="description" style="margin-left:10.4em;margin-top:-0.4em;" id="tagline-description">Mensaje que aparecerá en el popup</p>
                <br>
                <label for="rango2_video_premio" style="width:10em;font-weight:bold;">Video premio</label>
                <input style="width:47%;" name="rango2_video_premio" type="text" id="rango2_video_premio" value="<?php echo esc_html($rango2_video_premio); ?>" class="regular-text" onkeypress="return false;">
                <input type="button" id="upload_rango2_video_premio" class="button" value="Subir video" />
                 <br><br>
                <label for="rango2_imagen_correo" style="width:10em;font-weight:bold;">Imagen de cabecera email</label>
                <input style="width:47%;" name="rango2_imagen_correo" type="text" id="rango2_imagen_correo" value="<?php echo esc_html($rango2_imagen_correo); ?>" class="regular-text" onkeypress="return false;">
                <input type="button" id="upload_rango2_imagen_correo" class="button" value="Subir imagen" />
                <p class="description" style="margin-left:10.4em;margin-top:-0.4em;" id="tagline-description">Imagen que aparecerá en el mensaje del email.<br>Este campo es opcional si esta vacio no se envia el mensaje</p>
            </fieldset>
            <br>
            <p class="description" style="margin-left:10.4em;"id="tagline-description">Los datos para establecer un rango de visualizaciones</p>
            <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
        </td>
    </tr>
    
    <tr class="item_contenido">
        <th scope="row">Rango 3</th>
        <td>
            <fieldset>
                <label for="rango3" style="width:10em;font-weight:bold;">Visualizaciones</label>
                <input name="rango3" type="number" id="rango3" value="<?php echo esc_html($rango3); ?>" class="regular-text">
                <br><br>
                <label for="rango3_puntos" style="width:10em;font-weight:bold;">Puntos</label>
                <input name="rango3_puntos" type="number" id="rango3_puntos" value="<?php echo esc_html($rango3_puntos); ?>" class="regular-text">
                <br><br>
                <label for="rango3_titulo" style="width:10em;font-weight:bold;">Titulo medalla</label>
                <input name="rango3_titulo" type="text" id="rango3_titulo" value="<?php echo esc_html($rango3_titulo); ?>" class="regular-text">
                <br><br>
                <label for="rango3_mensaje_premio" style="width:10em;font-weight:bold;">Mensaje reto cumplido</label>
                <input name="rango3_mensaje_premio" type="text" id="rango3_mensaje_premio" value="<?php echo esc_html($rango3_mensaje_premio); ?>" class="regular-text">
                <p class="description" style="margin-left:10.4em;margin-top:-0.4em;" id="tagline-description">Mensaje que aparecerá en el popup</p>
                <br>
                <label for="rango3_video_premio" style="width:10em;font-weight:bold;">Video premio</label>
                <input style="width:47%;" name="rango3_video_premio" type="text" id="rango3_video_premio" value="<?php echo esc_html($rango3_video_premio); ?>" class="regular-text" onkeypress="return false;">
                <input type="button" id="upload_rango3_video_premio" class="button" value="Subir video" />
                 <br><br>
                <label for="rango3_imagen_correo" style="width:10em;font-weight:bold;">Imagen de cabecera email</label>
                <input style="width:47%;" name="rango3_imagen_correo" type="text" id="rango3_imagen_correo" value="<?php echo esc_html($rango3_imagen_correo); ?>" class="regular-text" onkeypress="return false;">
                <input type="button" id="upload_rango3_imagen_correo" class="button" value="Subir imagen" />
                <p class="description" style="margin-left:10.4em;margin-top:-0.4em;" id="tagline-description">Imagen que aparecerá en el mensaje del email.<br>Este campo es opcional si esta vacio no se envia el mensaje</p>
            </fieldset>
            <br>
            <p class="description" style="margin-left:10.4em;"id="tagline-description">Los datos para establecer un rango de visualizaciones</p>
            <hr style="width:100%;height:1px;background: #0000003d;margin-top: 20px;">
        </td>
    </tr>
    
  </tbody>
</table>
  
    <script>
      jQuery(function ($) {
        //imagen categoria por defecto
        $("body").on("click", ".upload_img_categoria_defecto", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Imagen",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#img_categoria_defecto").val(attachment.url);
              })
              .open();
        });
        
        //banner productos mobile
        $("body").on("click", ".upload_banner_producto_mobile", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_producto_mobile").val(attachment.url);
              })
              .open();
        });

        //banner productos desktop
        $("body").on("click", ".upload_banner_producto_desktop", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_producto_desktop").val(attachment.url);
              })
              .open();
        });

        //banner home desktop
        $("body").on("click", ".upload_banner_home_desktop", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_home_desktop").val(attachment.url);
              })
              .open();
        });

        //banner eventos desktop
        $("body").on("click", ".upload_banner_eventos_desktop", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_eventos_desktop").val(attachment.url);
              })
              .open();
        });

        //banner eventos mobile
        $("body").on("click", ".upload_banner_eventos_mobile", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_eventos_mobile").val(attachment.url);
              })
              .open();
        });
        
        //banner retos desktop
        $("body").on("click", ".upload_banner_retos_desktop", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_retos_desktop").val(attachment.url);
              })
              .open();
        });

        //banner retos mobile
        $("body").on("click", ".upload_banner_retos_mobile", function (e) {
          e.preventDefault();

          var button = $(this),
            aw_uploader = wp
              .media({
                title: "Banner",
                library: {
                  type: "image/jpeg",
                },
                button: {
                  text: "Usar",
                },
                multiple: false,
              })
              .on("select", function () {
                var attachment = aw_uploader
                  .state()
                  .get("selection")
                  .first()
                  .toJSON();
                $("#banner_retos_mobile").val(attachment.url);
              })
              .open();
        });
      });
    </script>

    <?php  submit_button(); ?>
  </form>
</div>
<?php
} 
?>















































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































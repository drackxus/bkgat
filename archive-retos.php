<?php 
get_header(); 

global $current_user;
wp_get_current_user();
if (is_user_logged_in()) {
  $loginUser = "true";
  $idUser = $current_user->ID;
  //Actlizamos la fecha de notificaciones
  update_user_meta($idUser, 'notificacion_reto', date("Y-m-d"));
} else {
    $loginUser = false;
}
?>
<style>
.banner_retos img {
    width: 100%;
}
a.contact_submit.w-button {
    border-radius: 16px;
}
.the_champ_sharing_title {
    display: none;
}
.felicitaciones {
    font-family: 'Gatorade black', sans-serif;
    font-size: 40px;
    text-align: center;
    margin-top: 24px;
    margin-bottom: 8px;
}
.compartir_pop.the_champ_horizontal_sharing .theChampFacebookSvg, #the_champ_ss_rearrange .theChampFacebookSvg {
    background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-5%20-5%2042%2042%22%3E%3Cpath%20d%3D%22M17.78%2027.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99%202.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123%200-5.26%201.905-5.26%205.405v3.016h-3.53v4.09h3.53V27.5h4.223z%22%20fill%3D%22%23000000%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center;
}
.compartir_pop.the_champ_horizontal_sharing .theChampSharing {
    background-color: white;
    background: white;
    color: #FFFFFF !important;
    border: 1px solid #a2a2a2;
    width: 80px !important;
    height: 80px !important;
    padding: 8px;
}
.compartir_pop.the_champ_horizontal_sharing .theChampTwitterSvg, #the_champ_ss_rearrange .theChampTwitterSvg {
    background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-4%20-4%2039%2039%22%3E%0A%3Cpath%20d%3D%22M28%208.557a9.913%209.913%200%200%201-2.828.775%204.93%204.93%200%200%200%202.166-2.725%209.738%209.738%200%200%201-3.13%201.194%204.92%204.92%200%200%200-3.593-1.55%204.924%204.924%200%200%200-4.794%206.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942%204.942%200%200%200-.665%202.477c0%201.71.87%203.214%202.19%204.1a4.968%204.968%200%200%201-2.23-.616v.06c0%202.39%201.7%204.38%203.952%204.83-.414.115-.85.174-1.297.174-.318%200-.626-.03-.928-.086a4.935%204.935%200%200%200%204.6%203.42%209.893%209.893%200%200%201-6.114%202.107c-.398%200-.79-.023-1.175-.068a13.953%2013.953%200%200%200%207.55%202.213c9.056%200%2014.01-7.507%2014.01-14.013%200-.213-.005-.426-.015-.637.96-.695%201.795-1.56%202.455-2.55z%22%20fill%3D%22%23000000%22%3E%3C%2Fpath%3E%0A%3C%2Fsvg%3E) no-repeat center center !important;
}
.compartir_pop.the_champ_horizontal_sharing .theChampWhatsappSvg, #the_champ_ss_rearrange .theChampWhatsappSvg {
    background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-5%20-5%2040%2040%22%3E%3Cpath%20id%3D%22arc1%22%20stroke%3D%22%23000000%22%20stroke-width%3D%222%22%20fill%3D%22none%22%20d%3D%22M%2011.579798566743314%2024.396926207859085%20A%2010%2010%200%201%200%206.808479557110079%2020.73576436351046%22%3E%3C%2Fpath%3E%3Cpath%20d%3D%22M%207%2019%20l%20-1%206%20l%206%20-1%22%20stroke%3D%22%23000000%22%20stroke-width%3D%222%22%20fill%3D%22none%22%3E%3C%2Fpath%3E%3Cpath%20d%3D%22M%2010%2010%20q%20-1%208%208%2011%20c%205%20-1%200%20-6%20-1%20-3%20q%20-4%20-3%20-5%20-5%20c%204%20-2%20-1%20-5%20-1%20-4%22%20fill%3D%22%23000000%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center !important;
}
.compartir_pop.the_champ_horizontal_sharing .theChampEmailSvg, #the_champ_ss_rearrange .theChampEmailSvg {
    background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-4%20-4%2043%2043%22%3E%3Cpath%20d%3D%22M%205.5%2011%20h%2023%20v%201%20l%20-11%206%20l%20-11%20-6%20v%20-1%20m%200%202%20l%2011%206%20l%2011%20-6%20v%2011%20h%20-22%20v%20-11%22%20stroke-width%3D%221%22%20fill%3D%22%23000000%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center !important;
}
div.the_champ_horizontal_sharing li {
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 12px !important;
}
ul.the_champ_sharing_ul {
    display: flex;
    flex-wrap: wrap;
}
</style>
<?php
if (wp_is_mobile()) {
?>
<style>
.msgAlertCont {
    max-width: 260px !important;
}
.list_retos_logrados {
    margin: 10px 0px 0px !important;
    width: 100%;
    height: 300px!important;
}
.list_retos_logrados_el video {
    position: absolute;
    right: 0;
    bottom: 0;
    top: 0;
    right: 0;
    width: 100%;
    height: auto;
    background-size: 100% 100%;
    background-color: black;
    background-position: center center;
    background-size: contain;
    object-fit: cover;
    z-index: 1;
    opacity: 0.8;
    border-radius: 13px;
    cursor:pointer;
}
.side_buttons_link.favorite {
    display: none;
}
.banner_retos {
    width: 100%;
    margin-top: 26px;
}
.banner_retos img {
    width: 100%;
}
.tab_contenido {
    display: block;
}

.tab_contenido h3 {
    color: white;
    text-align: center;
    text-transform: uppercase;
    margin: 20px 0px 30px;
    font-family: 'Gatorade black', sans-serif;
}

ul.lista_tabs {
    background: #DEDEDE;
    border-radius: 30px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
}
li.tab {
    color: black;
    background: transparent;
    border-radius: 30px;
    padding: 10px 16px;
    width: 50%;
    text-align: center;
    font-family: 'Gatorade black', sans-serif;
    font-size: 16px;
    cursor: pointer;
}
.tab.active {
    background: var(--color-orange);
    color: white;
}
.name_reto {
    color: white;
    font-family: 'Gatorade black', sans-serif;
    font-size: 15px;
    text-align: center;
    line-height: 18px;
    margin-top: 14px;
    text-transform: uppercase;
    margin-bottom: 0px;
}
.list_retos {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
}
.list_retos_el {
    width: 50%;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-direction: column;
    padding: 16px;
    cursor: pointer;
}
.list_retos_el_img {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    background-position: center center !important;
    display: flex;
    justify-content: center;
    align-items: center;
}

.list_retos_el_img img {
    width: 50%;
    height: auto;
}

a.contact_submit.w-button {
    width: 100%;
    font-size: 20px;
    margin-bottom: 30px;
    padding: 5px;
}
.list_retos_logrados {
    margin: 30px 0px;
    width: 100%;

}
.list_retos_logrados_el {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 10px 20px;
    border-radius: 10px;
    width: 100%;
    height: 88px;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    background-position: center center !important;
    margin-bottom: 20px;
    border-radius: 15px;
    background: black;

}

.list_retos_logrados_el h3 {
    color: white;
    font-family: 'Gatorade black', sans-serif;
    font-size: 14px !important;
    line-height: 16px !important;
    text-align: left;
    margin: 0px;
    width: 50%;
    z-index: 3;
    text-transform: uppercase;
}

.list_retos_share {
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f47d30), to(#ff450a));
    background-image: linear-gradient(180deg, #f47d30, #ff450a);
    border-radius: 20px;
    padding: 3px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    right: -64px;
    bottom: -35px;
    width: 35px;
    height: 24px;
    z-index: 2;
}

.list_retos_share img {
    width: 48%;
}

.txt_retos {
    font-family: 'Gatorade black', sans-serif;
    font-size: 30px;
    color: #292929;
}

p.txtMsg {
    margin-top: 12px;
}

p.logoMsg img {
    width: 118px;
    height: auto;
}
.contenido_retos {
    padding-bottom: 0px;
}

.list_retos_logrados_el {
    width: 100%;
    border-radius: 10px;
    margin-right: 1%;
    position: relative;
}

.list_retos_logrados {
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    flex-wrap: wrap;
    height: 430px;
    overflow-y: scroll;
}

h3 {
    color: white;
    line-height: 18px;
    font-size: 18px;
    text-transform: uppercase;
    text-align: center;
}
.down {
    width: 40px;
    display: block;
    margin: 0 auto;
}
.down.up {
    width: 40px;
    display: block;
    margin: 0 auto;
    transform: rotateZ(180deg);
}
.felicitaciones {
    font-size: 35px;
}
.tit_retos_logrados {
    font-size: 20px !important;
    line-height: 22px !important;
    color: white !important;
    font-family: 'Gatorade black' !important;
    font-weight: bold !important;
    margin-bottom: 10px;
    text-align: center;
    margin-top: 30px !important;
}
.line_retos_logrados {
    width: 50px;
    height: 3px;
    background: var(--color-orange);
    border-radius:2px;
    float: left;
    margin-bottom: 26px;
    border: none;
}
</style>
<div class="content_cont bg_content">
    <div class="content_cont_tit_h1">
        <h1 class="content_cont_h1 bottom_line">RETOS</h1>
        <div class="content_cont_h1_line"></div>
    </div>
    <p class="content_cont_p">Navega por nuestra pagina web y logra Todos los retos que tenemos preparados para ti.</p>
    <div class="banner_retos">
        <a>
        <?php if(get_option('banner_retos_mobile')) { ?>
            <img src="<?php echo get_option('banner_retos_mobile'); ?>" alt="">
        <?php } ?>
        </a>
    </div>
    <div class="contenido_retos">
        <div class="tab_contenido" tab_contenido="retos_logrados">
            <h3 class="tit_retos_logrados">ACTIVA LOS RETOS DEL MUNDO GATORADE Y ALCANZA TU GRANDEZA</h3>
            <img src="<?php echo IMGURL ?>down_arrow.png" class="down up"/>
            <div class="list_retos_logrados">
                <?php
                //Obtenemos el id, el nombre del usuario y el correo
                  $idUser = $current_user->ID;
                  $emailUser = $current_user->user_email;
                  $nameUser = get_user_meta($idUser, 'user_nombre', true);
                  //Consultamos los retos activos y que esten dentro de la fecha
                  $meta_query[] = array(
                      'key' => 'estado',
                      'value' => 'activo',
                      'compare' => '=',
                      'type' => 'char'
                  );
                
                  //Obtenemos los retos
                  $args = array(
                      'post_type' => 'retos',
                      'posts_per_page' => - 1,
                      'post_status' => 'publish',
                      'meta_query' => $meta_query
                  );
                
                  $lista_retos = get_posts($args);
                  $visible_campana = 'false';
                  $visible_rango1 = 'false';
                  $visible_rango2 = 'false';
                  $visible_rango3 = 'false';
                
                  //Si hay retos
                  if (count($lista_retos) > 0)
                  {
                      //Recorremos los retos
                      foreach (get_posts($args) as $p):
                        $tipo_reto = get_post_meta($p->ID, 'tipo_retos', true);
                          
                        
                        if ($tipo_reto == 'contenido')
                        {
                            $retos_contenido_json = get_user_meta($idUser, 'retos_contenido_json', true);
                            $retos_contenido = json_decode($retos_contenido_json);
                            
                            $rango1 = get_post_meta($p->ID, 'rango1', true);
                            $rango1_puntos = get_post_meta($p->ID, 'rango1_puntos', true);
                            $rango1_titulo = get_post_meta($p->ID, 'rango1_titulo', true);
                            $rango1_mensaje_premio = get_post_meta($p->ID, 'rango1_mensaje_premio', true);
                            $rango1_video_premio = get_post_meta($p->ID, 'rango1_video_premio', true);
                            $rango1_imagen_correo = get_post_meta($p->ID, 'rango1_imagen_correo', true);
                        
                            $rango2 = get_post_meta($p->ID, 'rango2', true);
                            $rango2_puntos = get_post_meta($p->ID, 'rango2_puntos', true);
                            $rango2_titulo = get_post_meta($p->ID, 'rango2_titulo', true);
                            $rango2_mensaje_premio = get_post_meta($p->ID, 'rango2_mensaje_premio', true);
                            $rango2_video_premio = get_post_meta($p->ID, 'rango2_video_premio', true);
                            $rango2_imagen_correo = get_post_meta($p->ID, 'rango2_imagen_correo', true);
                        
                            $rango3 = get_post_meta($p->ID, 'rango3', true);
                            $rango3_puntos = get_post_meta($p->ID, 'rango3_puntos', true);
                            $rango3_titulo = get_post_meta($p->ID, 'rango3_titulo', true);
                            $rango3_mensaje_premio = get_post_meta($p->ID, 'rango3_mensaje_premio', true);
                            $rango3_video_premio = get_post_meta($p->ID, 'rango3_video_premio', true);
                            $rango3_imagen_correo = get_post_meta($p->ID, 'rango3_imagen_correo', true);
                            
                            
                            //Si hay retos en curso
                            if(count((array)$retos_contenido) > 0)
                            {
                                foreach($retos_contenido as $ret_cont) {
                                    if ($ret_cont->idReto == $p->ID) {
                                        //Si el reto ya fue cumplido
                                    $visible_rango1 = ($ret_cont->tipo == 'contenido' && $ret_cont->rangos->estado1 == 'completado' && $ret_cont->rangos->popup1 == 'true' && $ret_cont->rangos->email1 == 'true') ? 'true' : 'false';
                                    $visible_rango2 = ($ret_cont->tipo == 'contenido' && $ret_cont->rangos->estado2 == 'completado' && $ret_cont->rangos->popup2 == 'true' && $ret_cont->rangos->email2 == 'true') ? 'true' : 'false';
                                    $visible_rango3 = ($ret_cont->tipo == 'contenido' && $ret_cont->rangos->estado3 == 'completado' && $ret_cont->rangos->popup3 == 'true' && $ret_cont->rangos->email3 == 'true') ? 'true' : 'false';
                                    }
                                }
                            }
                            
                            
                            if($rango1 != '')
                            {
                            ?>
                            <div style="width:100%;margin-bottom:0px;">
                                 <div class="list_retos_logrados_el" style="height:82px;">
                                    <div>
                                        <?php
                                            if ($rango1_video_premio)
                                            {
                                        ?>
                                            <video onclick="location.href='<?php echo get_the_permalink($p->ID); ?>'" <?php echo ($visible_rango1 == 'true') ? 'muted autoplay playsinline loop style="cursor:pointer;"':'style="filter: brightness(0.4)"' ?>>
                                            <source src="<?php echo $rango1_video_premio; ?>" type="video/mp4">
                                            </video>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                    <h3><?php echo $rango1_titulo; ?></h3>  
                                    <a class="list_retos_share" <?php echo ($visible_rango1 == 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                        <img src="<?php echo IMGURL ?>share.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <?php    
                            }
                            
                            if($rango2 != '')
                            {
                            ?>
                            <div style="width:100%;margin-bottom:0px;">
                                 <div class="list_retos_logrados_el" style="height:82px;">
                                    <div>
                                        <?php
                                            if ($rango2_video_premio)
                                            {
                                        ?>
                                            <video onclick="location.href='<?php echo get_the_permalink($p->ID); ?>'" <?php echo ($visible_rango2 == 'true') ? 'muted autoplay playsinline loop style="cursor:pointer;"':'style="filter: brightness(0.4)"' ?>>
                                            <source src="<?php echo $rango2_video_premio; ?>" type="video/mp4">
                                            </video>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                    <h3><?php echo $rango2_titulo; ?></h3>  
                                    <a class="list_retos_share" <?php echo ($visible_rango2 == 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                        <img src="<?php echo IMGURL ?>share.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <?php    
                            }
                            
                            if($rango3 != '')
                            {
                            ?>
                            <div style="width:100%;margin-bottom:0px;">
                                 <div class="list_retos_logrados_el" style="height:82px;">
                                    <div>
                                        <?php
                                            if ($rango3_video_premio)
                                            {
                                        ?>
                                            <video onclick="location.href='<?php echo get_the_permalink($p->ID); ?>'" <?php echo ($visible_rango3 = 'true') ? 'muted autoplay playsinline loop style="cursor:pointer;"':'style="filter: brightness(0.4)"' ?>>
                                            <source src="<?php echo $rango3_video_premio; ?>" type="video/mp4">
                                            </video>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                    <h3><?php echo $rango3_titulo; ?></h3>  
                                    <a class="list_retos_share" <?php echo ($visible_rango3 = 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                        <img src="<?php echo IMGURL ?>share.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <?php    
                            }
                        }


                        if ($tipo_reto == 'campana')
                        {
                            $retos_campana_json = get_user_meta($idUser, 'retos_campana_json', true);
                            $retos_campana = json_decode($retos_campana_json);
                            
                            $video = get_post_meta($p->ID, 'video_premio', true);
                            
                            $dtz = new DateTimeZone("America/Bogota");
                    		$dt = new DateTime("now", $dtz);
                    		$actual = $dt->format("Y-m-d");
                    		$inicio = get_post_meta($p->ID, 'fecha_inicio', true);
                    		$fin = get_post_meta($p->ID, 'fecha_fin', true);
                    		$actual = date('Y-m-d');
                    		
                    		$iniciof = strtotime($inicio);
                    		$finf = strtotime($fin);
                    		$actualf = strtotime($actual);
                    		  
                    		// Compare the timestamp date 
                    		if (($actualf >= $iniciof) && ($actualf <= $finf)){
                                //Si hay retos en curso
                                if(count((array)$retos_campana) > 0)
                                {
                                    foreach($retos_campana as $ret_camp) {
                                        if ($ret_camp->idReto == $p->ID) {
                                            //Si el reto ya fue cumplido
                                        $visible_campana = ($ret_camp->tipo == 'campana' && $ret_camp->popup == 'true') ? 'true' : 'false';
                                        }
                                    }
                                }
                        
                            ?>
                            <div style="width:100%;margin-bottom:0px;">
                                <div class="list_retos_logrados_el" style="height:82px;">
                                    <div>
                                        <?php
                                        if ($video) {
                                        ?>
                                            <video onclick="location.href='<?php echo get_the_permalink($p->ID); ?>'" <?php echo ($visible_campana == 'true') ? 'muted autoplay playsinline loop style="cursor:pointer;"':'style="filter: brightness(0.4)"' ?> >
                                                <source src="<?php echo $video; ?>" type="video/mp4">
                                            </video>
                                        <?php 
                                        }
                                        ?>
                                    </div>
                                    <h3><?php echo get_the_title($p->ID); ?></h3>  
                                    <a class="list_retos_share" <?php echo ($visible_campana == 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                        <img src="<?php echo IMGURL ?>share.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <?php
                    		}
                        }
                
                        
                      endforeach;
                  }
                  
                    $retos2 = ['foto_perfil', 'favorito_contenido', 'conocer_producto', 'editar_deportes', 'inscripcion_evento', 'llenar_encuesta', 'registrarse'];
                    for($i = 0; $i < count($retos2); ++$i){
                
                    $mensaje = get_option('mensaje_'.$retos2[$i]);
                    $titulo_medalla = get_option('titulo_medalla_'.$retos2[$i]);
                    $video_medalla = get_option('video_medalla_'.$retos2[$i]);
                    $descripcion = get_option('descripcion_'.$retos2[$i]);
                    $imagen_correo = get_option('imagen_correo_'.$retos2[$i]);
                    $puntos = get_option('puntos_'.$retos2[$i]);
                    $nombre_reto = $retos2[$i];
                    ?>
                    <div class="list_retos_logrados_el">
                        <div>
                            <video class="video_without_single" info="<?php echo $descripcion; ?>" <?php echo (get_user_meta($idUser, $nombre_reto, true) == '1') ? 'muted autoplay playsinline loop':'style="filter: brightness(0.4)"' ?>>
                                <source src="<?php echo $video_medalla; ?>" type="video/mp4">
                            </video>
                        </div>
                        <h3 style="width:57%;"><?php echo $titulo_medalla; ?></h3>  
                        <a class="list_retos_share" <?php echo (get_user_meta($idUser, $nombre_reto, true) == '1') ? 'style="display:flex;"':'style="display:none;"' ?>>
                            <img src="<?php echo IMGURL ?>share.svg" alt="">
                        </a>
                    </div>
                <?php
                    }
                ?>
            	</div>
        	</div>
        	<img src="<?php echo IMGURL ?>down_arrow.png" class="down"/>
        </div>
        <a href="<?php echo home_url('ranking'); ?>" class="contact_submit w-button">RANKING DE USUARIOS</a>
    </div>
    
    <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>
<?php
} else {
?>
<style>
a.contact_submit.w-button {
    border-radius: 16px;
}
.banner_retos {
    margin-bottom: 30px;
}
.tab.active {
    background: rgb(244,125,48);
    background: linear-gradient(90deg, rgba(244,125,48,1) 0%, rgba(255,186,0,1) 100%);
}
li.tab {
    font-size: 20px;
}
.list_retos_el {
    width: 25%;
}
.tab_contenido h3 {
    color: black;
}
.name_reto {
    color: black;
}
a.contact_submit.w-button {
    padding: 5px 30px;
    width: 340px;
    font-size: 24px;
    margin: 0 auto;
    margin-bottom: 30px;
    display: block;
    color: white;
    background: rgb(244,125,48);
    background: linear-gradient(90deg, rgba(244,125,48,1) 0%, rgba(255,186,0,1) 100%);
}
.contenido_tabs {
    width: 92%;
    margin: 0 auto;
}

.contenido_retos {
    padding-bottom: 0px;
}

.list_retos_logrados_el {
    width: 32.3%;
    border-radius: 10px;
    margin-right: 1%;
    position: relative;
}

.list_retos_logrados {
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    flex-wrap: wrap;
}

.tab_contenido h3 {
    color: white;
    line-height: 18px;
    font-size: 18px;
}
.list_retos_logrados {
    margin: 30px 0px;
    width: 100%;

}
.list_retos_logrados_el {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 10px 20px;
    border-radius: 10px;
    width: 100%;
    height: 88px;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    background-position: center center !important;
    margin-bottom: 20px;
    border-radius: 15px;
    background: black;

}

.list_retos_logrados_el h3 {
    color: white;
    font-family: 'Gatorade black', sans-serif;
    font-size: 14px !important;
    line-height: 16px !important;
    text-align: left;
    margin: 0px;
    width: 50%;
    z-index: 3;
    text-transform: uppercase;
}

.list_retos_share {
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f47d30), to(#ff450a));
    background-image: linear-gradient(180deg, #f47d30, #ff450a);
    border-radius: 20px;
    padding: 3px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    right: -64px;
    bottom: -35px;
    width: 35px;
    height: 24px;
    z-index: 2;
}

.list_retos_share img {
    width: 48%;
}

.txt_retos {
    font-family: 'Gatorade black', sans-serif;
    font-size: 30px;
    color: #292929;
}

p.txtMsg {
    margin-top: 12px;
}

p.logoMsg img {
    width: 118px;
    height: auto;
}
.contenido_retos {
    padding-bottom: 0px;
}

.list_retos_logrados_el {
    width: 32.3%;
    border-radius: 10px;
    margin-right: 1%;
    position: relative;
}
.list_retos_logrados_el video {
    background-size: contain;
    object-fit: cover;
    z-index: 1;
    opacity: 0.8;
    border-radius: 13px;
    position: absolute;
    left: 0%;
    top: 0%;
    right: 0%;
    bottom: 0%;
    z-index: 2;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
    height: 100%;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    max-height: 87px;
    cursor:pointer;
}
.tit_retos_logrados {
    font-size: 23px !important;
    line-height: 25px !important;
    color: black !important;
    font-family: 'Gatorade black' !important;
    font-weight: bold !important;
    margin-bottom: 10px;
}
.line_retos_logrados {
    width: 50px;
    height: 3px;
    background: var(--color-orange);
    border-radius:2px;
    float: left;
    margin-bottom: 26px;
    border: none;
}
.gpoints_text {
    text-align: right;
    font-size: 18px !important;
    padding-right: 13px;
}
.vert_line {
    width: 3px;
    height: 20px;
    background: black;
    display: inline-block;
    position: relative;
    top: 4px;
    margin: 0px 4px;
}
.recompensas {
    color: #616161;
    font-family: 'Gatorade light' !important;
    text-transform: uppercase;
    cursor: pointer;
}
</style>
<div class="home">
  <?php get_template_part( 'template-parts/desktop/header' ); ?>
  <div class="banner_retos">
        <a>
        <?php if(get_option('banner_retos_desktop')) { ?>
            <img src="<?php echo get_option('banner_retos_desktop'); ?>" alt="">
        <?php } ?>
        </a>
    </div>
    <div class="contenido_retos">
        <div class="tab_contenido" tab_contenido="retos_logrados">
            <?php if(is_user_logged_in()) { ?>
            <h3 class="tit_retos_logrados gpoints_text">G-POINTS: <?php echo get_user_meta($idUser, 'gpoints', true); ?> <span class="vert_line"></span> <span class="recompensas">recompensas</span></h3>
            <?php } ?>
            <!-- <hr class="line_retos_logrados">   -->
            <div class="list_retos_logrados">
                <?php
                //Obtenemos el id, el nombre del usuario y el correo
                  $idUser = $current_user->ID;
                  $emailUser = $current_user->user_email;
                  $nameUser = get_user_meta($idUser, 'user_nombre', true);
                  //Consultamos los retos activos y que esten dentro de la fecha
                  $meta_query[] = array(
                      'key' => 'estado',
                      'value' => 'activo',
                      'compare' => '=',
                      'type' => 'char'
                  );
                
                  //Obtenemos los retos
                  $args = array(
                      'post_type' => 'retos',
                      'posts_per_page' => - 1,
                      'post_status' => 'publish',
                      'meta_query' => $meta_query
                  );
                
                  $lista_retos = get_posts($args);
                  $visible_campana = 'false';
                  $visible_rango1 = 'false';
                  $visible_rango2 = 'false';
                  $visible_rango3 = 'false';
                
                  //Si hay retos
                  if (count($lista_retos) > 0)
                  {
                      //Recorremos los retos
                      foreach (get_posts($args) as $p):
                        $tipo_reto = get_post_meta($p->ID, 'tipo_retos', true);
                          
                        
                        if ($tipo_reto == 'contenido')
                        {
                            $retos_contenido_json = get_user_meta($idUser, 'retos_contenido_json', true);
                            $retos_contenido = json_decode($retos_contenido_json);
                            
                            $rango1 = get_post_meta($p->ID, 'rango1', true);
                            $rango1_puntos = get_post_meta($p->ID, 'rango1_puntos', true);
                            $rango1_titulo = get_post_meta($p->ID, 'rango1_titulo', true);
                            $rango1_mensaje_premio = get_post_meta($p->ID, 'rango1_mensaje_premio', true);
                            $rango1_video_premio = get_post_meta($p->ID, 'rango1_video_premio', true);
                            $rango1_imagen_correo = get_post_meta($p->ID, 'rango1_imagen_correo', true);
                        
                            $rango2 = get_post_meta($p->ID, 'rango2', true);
                            $rango2_puntos = get_post_meta($p->ID, 'rango2_puntos', true);
                            $rango2_titulo = get_post_meta($p->ID, 'rango2_titulo', true);
                            $rango2_mensaje_premio = get_post_meta($p->ID, 'rango2_mensaje_premio', true);
                            $rango2_video_premio = get_post_meta($p->ID, 'rango2_video_premio', true);
                            $rango2_imagen_correo = get_post_meta($p->ID, 'rango2_imagen_correo', true);
                        
                            $rango3 = get_post_meta($p->ID, 'rango3', true);
                            $rango3_puntos = get_post_meta($p->ID, 'rango3_puntos', true);
                            $rango3_titulo = get_post_meta($p->ID, 'rango3_titulo', true);
                            $rango3_mensaje_premio = get_post_meta($p->ID, 'rango3_mensaje_premio', true);
                            $rango3_video_premio = get_post_meta($p->ID, 'rango3_video_premio', true);
                            $rango3_imagen_correo = get_post_meta($p->ID, 'rango3_imagen_correo', true);
                            
                            
                            //Si hay retos en curso
                            if(count((array)$retos_contenido) > 0)
                            {
                                foreach($retos_contenido as $ret_cont) {
                                    if ($ret_cont->idReto == $p->ID) {
                                        //Si el reto ya fue cumplido
                                    $visible_rango1 = ($ret_cont->tipo == 'contenido' && $ret_cont->rangos->estado1 == 'completado' && $ret_cont->rangos->popup1 == 'true' && $ret_cont->rangos->email1 == 'true') ? 'true' : 'false';
                                    $visible_rango2 = ($ret_cont->tipo == 'contenido' && $ret_cont->rangos->estado2 == 'completado' && $ret_cont->rangos->popup2 == 'true' && $ret_cont->rangos->email2 == 'true') ? 'true' : 'false';
                                    $visible_rango3 = ($ret_cont->tipo == 'contenido' && $ret_cont->rangos->estado3 == 'completado' && $ret_cont->rangos->popup3 == 'true' && $ret_cont->rangos->email3 == 'true') ? 'true' : 'false';
                                    }
                                }
                            }
                            
                            
                            if($rango1 != '')
                            {
                            ?>
                                <div class="list_retos_logrados_el">
                                    <div>
                                        <?php
                                            if ($rango1_video_premio)
                                            {
                                        ?>
                                            <video onclick="location.href='<?php echo get_the_permalink($p->ID); ?>'" <?php echo ($visible_rango1 == 'true') ? 'muted autoplay playsinline loop style="cursor:pointer;"':'style="filter: brightness(0.4)"' ?>>
                                            <source src="<?php echo $rango1_video_premio; ?>" type="video/mp4">
                                            </video>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                    <h3><?php echo $rango1_titulo; ?></h3>  
                                    <a class="list_retos_share" <?php echo ($visible_rango1 == 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                        <img src="<?php echo IMGURL ?>share.svg" alt="">
                                    </a>
                                </div>
                            <?php    
                            }
                            
                            if($rango2 != '')
                            {
                            ?>
                                <div class="list_retos_logrados_el">
                                    <div>
                                        <?php
                                            if ($rango2_video_premio)
                                            {
                                        ?>
                                            <video onclick="location.href='<?php echo get_the_permalink($p->ID); ?>'" <?php echo ($visible_rango2 == 'true') ? 'muted autoplay playsinline loop style="cursor:pointer;"':'style="filter: brightness(0.4)"' ?>>
                                            <source src="<?php echo $rango2_video_premio; ?>" type="video/mp4">
                                            </video>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                    <h3><?php echo $rango2_titulo; ?></h3>  
                                    <a class="list_retos_share" <?php echo ($visible_rango2 == 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                        <img src="<?php echo IMGURL ?>share.svg" alt="">
                                    </a>
                                </div>
                            <?php    
                            }
                            
                            if($rango3 != '')
                            {
                            ?>
                                <div class="list_retos_logrados_el">
                                    <div>
                                        <?php
                                            if ($rango3_video_premio)
                                            {
                                        ?>
                                            <video onclick="location.href='<?php echo get_the_permalink($p->ID); ?>'" <?php echo ($visible_rango3 = 'true') ? 'muted autoplay playsinline loop style="cursor:pointer;"':'style="filter: brightness(0.4)"' ?>>
                                            <source src="<?php echo $rango3_video_premio; ?>" type="video/mp4">
                                            </video>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                    <h3><?php echo $rango3_titulo; ?></h3>  
                                    <a class="list_retos_share" <?php echo ($visible_rango3 = 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                        <img src="<?php echo IMGURL ?>share.svg" alt="">
                                    </a>
                                </div>
                            <?php    
                            }
                        }


                        if ($tipo_reto == 'campana')
                        {
                            $retos_campana_json = get_user_meta($idUser, 'retos_campana_json', true);
                            $retos_campana = json_decode($retos_campana_json);
                            
                            $video = get_post_meta($p->ID, 'video_premio', true);
                            
                            $dtz = new DateTimeZone("America/Bogota");
                    		$dt = new DateTime("now", $dtz);
                    		$actual = $dt->format("Y-m-d");
                    		$inicio = get_post_meta($p->ID, 'fecha_inicio', true);
                    		$fin = get_post_meta($p->ID, 'fecha_fin', true);
                    		$actual = date('Y-m-d');
                    		
                    		$iniciof = strtotime($inicio);
                    		$finf = strtotime($fin);
                    		$actualf = strtotime($actual);
                    		
                    		// Compare the timestamp date 
                    		if (($actualf >= $iniciof) && ($actualf <= $finf)){
                                //Si hay retos en curso
                                if(count((array)$retos_campana) > 0)
                                {
                                    foreach($retos_campana as $ret_camp) {
                                        if ($ret_camp->idReto == $p->ID) {
                                            //Si el reto ya fue cumplido
                                            $visible_campana = ($ret_camp->tipo == 'campana' && $ret_camp->popup == 'true') ? 'true' : 'false';
                                        }
                                    }
                                }
                            ?>
                            <div class="list_retos_logrados_el">
                                <div>
                                    <?php
                                    if ($video) {
                                    ?>
                                        <video onclick="location.href='<?php echo get_the_permalink($p->ID); ?>'" <?php echo ($visible_campana == 'true') ? 'muted autoplay playsinline loop style="cursor:pointer;"':'style="filter: brightness(0.4)"' ?> >
                                            <source src="<?php echo $video; ?>" type="video/mp4">
                                        </video>
                                    <?php 
                                    }
                                    ?>
                                </div>
                                <h3><?php echo get_the_title($p->ID); ?></h3>  
                                <a class="list_retos_share" <?php echo ($visible_campana == 'true') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                    <img src="<?php echo IMGURL ?>share.svg" alt="">
                                </a>
                            </div>
                            <?php
                    		}
                        }
                
                        
                      endforeach;
                  }
                  
                    $retos2 = ['foto_perfil', 'favorito_contenido', 'conocer_producto', 'editar_deportes', 'inscripcion_evento', 'llenar_encuesta', 'registrarse'];
                    for($i = 0; $i < count($retos2); ++$i){
                    
                        $mensaje = get_option('mensaje_'.$retos2[$i]);
                        $titulo_medalla = get_option('titulo_medalla_'.$retos2[$i]);
                        $descripcion = get_option('descripcion_'.$retos2[$i]);
                        $video_medalla = get_option('video_medalla_'.$retos2[$i]);
                        $imagen_correo = get_option('imagen_correo_'.$retos2[$i]);
                        $puntos = get_option('puntos_'.$retos2[$i]);
                        $nombre_reto = $retos2[$i];
                        ?>
                        <div class="list_retos_logrados_el">
                            <div>
                                <video class="video_without_single" info="<?php echo $descripcion; ?>" <?php echo (get_user_meta($idUser, $nombre_reto, true) == '1') ? 'muted autoplay playsinline loop':'style="filter: brightness(0.4)"' ?>>
                                <source src="<?php echo $video_medalla; ?>" type="video/mp4">
                                </video>
                            </div>
                            <h3 style="width:57%;"><?php echo $titulo_medalla; ?></h3>  
                            <a class="list_retos_share" <?php echo (get_user_meta($idUser, $nombre_reto, true) == '1') ? 'style="display:flex;"':'style="display:none;"' ?>>
                                <img src="<?php echo IMGURL ?>share.svg" alt="">
                            </a>
                        </div>
                <?php
                    }
                
                ?>
            	</div>
        	</div>
        </div>
        <a href="<?php echo home_url('ranking'); ?>" class="contact_submit w-button">RANKING DE USUARIOS</a>
        <?php get_template_part( 'template-parts/desktop/footer' ); ?>
    </div>
</div>
<?php
}
?>
<script type="text/javascript">
jQuery( document ).ready(function() {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
});
jQuery('.list_retos_share').click(function(){
    jQuery('.logoMsg').css('display', 'none');
    jQuery('.msgAlertCont').css('padding', '10px');
    jQuery('.msgAlertCont').children('video').remove();
    jQuery('.msgAlert').css('display', 'flex');
    jQuery('.msgAlert .txtMsg').html(`<h4 class="felicitaciones" style="text-transform:uppercase;">¡COMPARTE!</h4><br><div class="compartir_pop the_champ_sharing_container the_champ_horizontal_sharing" ss-offset="0" super-socializer-data-href="<?php echo home_url('retos'); ?>"> <div style="font-weight:bold" class="the_champ_sharing_title"></div><ul class="the_champ_sharing_ul"> <li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Facebook" title="Facebook" class="theChampSharing theChampFacebookBackground" onclick='theChampPopup("https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url('retos'); ?>&quote=¡Hoy supere otro Reto! Únete y Alcanza tu máximo potencial. Acepta el reto <?php echo home_url(); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampFacebookSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Twitter" title="Twitter" class="theChampSharing theChampTwitterBackground" onclick='theChampPopup("http://twitter.com/intent/tweet?text=¡Hoy supere otro Reto!🏆 únete y Alcanza tu máximo potencial 💪🏼Acepta el reto  👉 <?php echo home_url(); ?>&amp;url=<?php echo home_url('retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampTwitterSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Whatsapp" title="Whatsapp" class="theChampSharing theChampWhatsappBackground" onclick='theChampPopup("https://web.whatsapp.com/send?text=¡Hoy supere otro Reto!🏆 únete y Alcanza tu máximo potencial 💪🏼Acepta el reto  👉 <?php echo home_url('retos'); ?>")' > <ss style="display:block" class="theChampSharingSvg theChampWhatsappSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Email" title="Email" class="theChampSharing theChampEmailBackground" onclick="window.open('mailto:?subject=¡Hoy supere otro Reto!🏆 únete y Alcanza tu máximo potencial 💪🏼Acepta el reto  👉 gatorade.lat&amp;body=' + decodeURIComponent('<?php echo home_url('retos'); ?>' ), '_blank')"> <ss style="display:block" class="theChampSharingSvg theChampEmailSvg"></ss> </i> </li></ul> <div style="clear:both"></div></div>`);
});
jQuery('.video_without_single').click(function() {
    var info = jQuery(this).attr('info');
    var video = jQuery(this);
    jQuery('.msgAlertCont').css('padding', '86px 20px 20px');
    jQuery('.logoMsg').css('display', 'block');
    jQuery('.msgAlert').css('display', 'flex');
    jQuery('.msgAlertCont').children('video').remove();
    jQuery('.msgAlert .txtMsg').before(jQuery(video).clone());
    jQuery('.msgAlert .txtMsg').html(info);
    jQuery('.msgAlertCont').children('video').css('width', '100%');
    jQuery('.msgAlertCont').children('video').css('border-radius', '10px');
});
</script>
<?php
get_footer();
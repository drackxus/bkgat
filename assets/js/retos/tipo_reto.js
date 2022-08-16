jQuery( window ).load(function() {
    
    var chek = [];
    jQuery(".etiqueta:checked").each(function(){
    	    chek.push(jQuery(this).val());
    	});
    jQuery(".etiquetas_sel").val(chek);
    
    jQuery(".etiqueta").change(function(){
        var chek = [];
        jQuery(".etiqueta:checked").each(function(){
        	    chek.push(jQuery(this).val());
        	});
        jQuery(".etiquetas_sel").val(chek);
    });
    
    
    
    if(jQuery('#tipo_retos').val() == 'campana'){
        jQuery('#fecha_inicio').attr('required', true);
        jQuery('#fecha_fin').attr('required', true);
        jQuery('#numero_visualizar').attr('required', true);
        jQuery('#puntos').attr('required', true);
        jQuery('#mensaje_premio').attr('required', true);
        jQuery('#video_premio').attr('required', true);
        jQuery('#etiquetas_sel').attr('required', true);
        jQuery('#numero_correo').attr('required', true);
        jQuery('#imagen_correo').attr('required', true);
        
        jQuery('#categoria_sel').removeAttr('required');
        jQuery('#rango1').removeAttr('required');
        jQuery('#rango1_puntos').removeAttr('required');
        jQuery('#rango1_titulo').removeAttr('required');
        jQuery('#rango1_mensaje_premio').removeAttr('required');
        jQuery('#rango1_video_premio').removeAttr('required');
        
        jQuery('.item_campana').each(function(){
            jQuery(this).show();
        });
        jQuery('.item_contenido').each(function(){
            jQuery(this).hide();
        });
    }
    if(jQuery('#tipo_retos').val() == 'contenido') {
        jQuery('#categoria_sel').attr('required', true);
        jQuery('#rango1').attr('required', true);
        jQuery('#rango1_puntos').attr('required', true);
        jQuery('#rango1_titulo').attr('required', true);
        jQuery('#rango1_mensaje_premio').attr('required', true);
        jQuery('#rango1_video_premio').attr('required', true);
        
        jQuery('#fecha_inicio').removeAttr('required');
        jQuery('#fecha_fin').removeAttr('required');
        jQuery('#numero_visualizar').removeAttr('required');
        jQuery('#puntos').removeAttr('required');
        jQuery('#mensaje_premio').removeAttr('required');
        jQuery('#video_premio').removeAttr('required');
        jQuery('#etiquetas_sel').removeAttr('required');
        jQuery('#numero_correo').removeAttr('required');
        jQuery('#imagen_correo').removeAttr('required');
        jQuery('.item_campana').each(function(){
            jQuery(this).hide();
        });
        jQuery('.item_contenido').each(function(){
            jQuery(this).show();
        });
    }
    
});

jQuery(document).on('change','#tipo_retos',function(){
    if(jQuery('#tipo_retos').val() == 'campana'){
        jQuery('#fecha_inicio').attr('required', true);
        jQuery('#fecha_fin').attr('required', true);
        jQuery('#numero_visualizar').attr('required', true);
        jQuery('#puntos').attr('required', true);
        jQuery('#mensaje_premio').attr('required', true);
        jQuery('#video_premio').attr('required', true);
        jQuery('#etiquetas_sel').attr('required', true);
        jQuery('#numero_correo').attr('required', true);
        jQuery('#imagen_correo').attr('required', true);
        
        jQuery('#categoria_sel').removeAttr('required');
        jQuery('#rango1').removeAttr('required');
        jQuery('#rango1_puntos').removeAttr('required');
        jQuery('#rango1_titulo').removeAttr('required');
        jQuery('#rango1_mensaje_premio').removeAttr('required');
        jQuery('#rango1_video_premio').removeAttr('required');
        
        jQuery('.item_campana').each(function(){
            jQuery(this).show();
        });
        jQuery('.item_contenido').each(function(){
            jQuery(this).hide();
        });
    }
    if(jQuery('#tipo_retos').val() == 'contenido') {
        jQuery('#categoria_sel').attr('required', true);
        jQuery('#rango1').attr('required', true);
        jQuery('#rango1_puntos').attr('required', true);
        jQuery('#rango1_titulo').attr('required', true);
        jQuery('#rango1_mensaje_premio').attr('required', true);
        jQuery('#rango1_video_premio').attr('required', true);
        
        jQuery('#fecha_inicio').removeAttr('required');
        jQuery('#fecha_fin').removeAttr('required');
        jQuery('#numero_visualizar').removeAttr('required');
        jQuery('#puntos').removeAttr('required');
        jQuery('#mensaje_premio').removeAttr('required');
        jQuery('#video_premio').removeAttr('required');
        jQuery('#etiquetas_sel').removeAttr('required');
        jQuery('#numero_correo').removeAttr('required');
        jQuery('#imagen_correo').removeAttr('required');
        jQuery('.item_campana').each(function(){
            jQuery(this).hide();
        });
        jQuery('.item_contenido').each(function(){
            jQuery(this).show();
        });
    }
});
jQuery( window ).load(function() {
    if(jQuery('#tipo_tarjeta').val() == 'normal'){
        jQuery('#meta-box-opciones-tarjeta').show();
        jQuery('#meta-box-opciones-encuesta').hide();
        jQuery('#meta-box-opciones-reto').hide();
    } else if(jQuery('#tipo_tarjeta').val() == 'encuesta') {
        jQuery('#meta-box-opciones-encuesta').show();
        jQuery('#meta-box-opciones-tarjeta').hide();
        jQuery('#meta-box-opciones-reto').hide();
    } else if(jQuery('#tipo_tarjeta').val() == 'reto') {
        jQuery('#meta-box-opciones-reto').show();
        jQuery('#meta-box-opciones-encuesta').hide();
        jQuery('#meta-box-opciones-tarjeta').hide();
    }
    
    jQuery('#tipo_tarjeta').on('change', function() {
        if(this.value == 'normal') {
            jQuery('#meta-box-opciones-tarjeta').show();
            jQuery('#meta-box-opciones-encuesta').hide();
            jQuery('#meta-box-opciones-reto').hide();
        } else if(this.value == 'encuesta') {
            jQuery('#meta-box-opciones-encuesta').show();
            jQuery('#meta-box-opciones-tarjeta').hide();
            jQuery('#meta-box-opciones-reto').hide();
        } else if(this.value == 'reto') {
            jQuery('#meta-box-opciones-reto').show();
            jQuery('#meta-box-opciones-encuesta').hide();
            jQuery('#meta-box-opciones-tarjeta').hide();
        }
    });

});
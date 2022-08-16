jQuery(function($) {
    $('body').on('click', '.upload_tabla_nutricional_completa', function(e) {
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'Tabla nutricional completa',
                library: {
                    uploadedTo: wp.media.view.settings.post.id,
                    type: 'image/jpeg'
                },
                button: {
                    text: 'Usar'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#tabla_nutricional_completa').val(attachment.url);
            })
            .open();
    });
});
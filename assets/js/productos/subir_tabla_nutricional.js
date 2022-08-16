jQuery(function($) {
    $('body').on('click', '.upload_tabla_nutricional', function(e) {
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'Tabla nutricional',
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
                $('#tabla_nutricional').val(attachment.url);
            })
            .open();
    });
});
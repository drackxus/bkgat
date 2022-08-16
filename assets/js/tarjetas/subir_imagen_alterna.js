jQuery(function($) {
    $('body').on('click', '.upload_imagen_alterna', function(e) {
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'Imagen',
                library: {
                    uploadedTo: wp.media.view.settings.post.id,
                    type: 'image/jpeg'
                },
                button: {
                    text: 'Usar esta imagen'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#imagen_alterna').val(attachment.url);
            })
            .open();
    });
});
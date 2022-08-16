jQuery(function($) {
    $('body').on('click', '#upload_img_categoria', function(e) {
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
                $('#img_categoria').val(attachment.url);
            })
            .open();
    });
});
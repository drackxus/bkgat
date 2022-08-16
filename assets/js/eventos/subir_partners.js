jQuery(function($) {
    $('body').on('click', '.upload_partners', function(e) {
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'Logo partners',
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
                $('#logo_partners').val(attachment.url);
            })
            .open();
    });
});
jQuery(function($) {
    $('body').on('click', '#upload_video_premio', function(e) {
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'Video',
                library: {
                    uploadedTo: wp.media.view.settings.post.id,
                    type: 'video/mp4'
                },
                button: {
                    text: 'Usar este video'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#video_premio').val(attachment.url);
            })
            .open();
    });
    
    $('body').on('click', '#upload_rango1_video_premio', function(e) {
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'Video',
                library: {
                    uploadedTo: wp.media.view.settings.post.id,
                    type: 'video/mp4'
                },
                button: {
                    text: 'Usar este video'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#rango1_video_premio').val(attachment.url);
            })
            .open();
    });
    
    $('body').on('click', '#upload_rango2_video_premio', function(e) {
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'Video',
                library: {
                    uploadedTo: wp.media.view.settings.post.id,
                    type: 'video/mp4'
                },
                button: {
                    text: 'Usar este video'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#rango2_video_premio').val(attachment.url);
            })
            .open();
    });
    
    $('body').on('click', '#upload_rango3_video_premio', function(e) {
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'Video',
                library: {
                    uploadedTo: wp.media.view.settings.post.id,
                    type: 'video/mp4'
                },
                button: {
                    text: 'Usar este video'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#rango3_video_premio').val(attachment.url);
            })
            .open();
    });
});
$(function() {
    console.log("bjbk");

    if(jQuery('.wp-admin.post-type-tarjetas')){
    setTimeout(function() {
        Tour.run([{
                element: $('#meta-box-video-youtube'),
                content: 'Desde aqui podras crear o editar el contenido de tu publicacion',
                position: 'top',
                close: false,
                language: 'es'
            },
            {
                element: $('#meta-box-video-loop'),
                content: 'and the second one<br>description might be <strong>HTML</strong>',
                position: 'top',
                close: false,
                language: 'es'
            },
            {
                element: $('#meta-box-poster-video'),
                content: 'and the second one<br>description might be <strong>HTML</strong>',
                position: 'top',
                close: false,
                language: 'es'
            }
        ]);
        console.log("gg");


    }, 4000);

}



});
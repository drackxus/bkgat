<?php
global $current_user;
if (is_user_logged_in()) {
    $idUser = $current_user->ID;
    $user = get_user_by( 'id', $idUser );
    $title_search = $user->data->user_nicename;
    $title_f = sanitize_title( $title_search, '', 'save' );
    if ( ! function_exists( 'post_exists' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/post.php' );
    }
    $exist = post_exists( $title_f, '', '', 'perfiles' );

    if($exist > 0) {

    } else {
        $new = array(
            'post_title' => $title_f,
            'post_type' => 'perfiles',
            'post_status' => 'publish'
        );
        $post_id = wp_insert_post( $new );
        update_post_meta($post_id, 'id_usuario', $user->data->ID);
    }
}
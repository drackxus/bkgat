<?php

global $current_user;
wp_get_current_user();
if (is_user_logged_in()) {
    $loginUser = "true";
    $nameUser = $current_user->user_login;
} else {
    $loginUser = false;
}
?>
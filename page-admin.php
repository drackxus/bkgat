<?php

/**
 * Template Name: Admin
 *
 * @package WordPress
 */

get_header();

?>
<style>
    .header, .side_buttons {
    display: none !important;
}
.content_gen {
    padding: 30px;
}

.content_gen h2 {
    font-size: 32px;
    text-align: center;
}

.content_gen h3 {
    font-size: 23px;
    text-align: center;
}

.content_gen .list_country {
    margin-top: 50px;
}

.content_gen .list_country li {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

.content_gen .list_country li a {
    font-size: 26px;
}
</style>
<h2 class="has-text-align-center">Bienvenido</h2>
<h3>Selecciona el país que deseas administrar</h3>
<p class="has-text-align-center">Recuerda que debes estar autorizado para editar cada país</p>
<ul class="list_country">
<li>
<a href="<?php echo home_url('/co/wp-admin'); ?>">Colombia</a>
</li>
<li>
<a href="<?php echo home_url('/mx/wp-admin'); ?>">México</a>
</li>
<li>
<a href="<?php echo home_url('/ar/wp-admin'); ?>">Argentina</a>
</li>
</ul>

<?php
get_footer();
?>
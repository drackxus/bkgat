<?php 
/**
 * Template Name: Ranking
 *
 * @package WordPress
 */
get_header(); ?>
<style>
.side_buttons_link.favorite {
    display: none;
}
.banner_retos {
    width: 100%;
    margin-top: 26px;
}
.banner_retos img {
    width: 100%;
}
.list_ranking {
    width: 100%;
    margin: 0 auto;
    padding: 20px 5px;
}
.list_ranking_gen {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
    flex-wrap: wrap;
    height: 390px;
    overflow-y: hidden;
    margin-bottom: 12px;
}
.list_ranking_gen:hover {
    overflow-y: scroll;
}
.list_ranking_gen li {
    display: flex;
    padding: 16px 0px 12px;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
    flex-wrap: wrap;
    border-bottom: 1px solid #737373;
}
.content_cont_h1_line {
    width: 55px;
}
.user_img img {
    width: 48px;
    height: 48px;
    border-radius: 50%;
}
.user_name {
    color: #FFF !important;
    font-family: 'Gatorade black';
    font-size: 16px;
    text-transform: uppercase;
    /* margin-left: 30px; */
    line-height: 18px;
    margin: 0;
    margin-left: 10px;
}
.user_name span:nth-of-type(1) {
    color: #FF851A;
    font-family: 'Gatorade black';
    font-size: 16px;
    text-align: center;
    margin:0px;
    width: 38px;
    margin-right: 4px;
}
.user_name span:nth-of-type(2) {
    color: #FFF !important;
    font-family: 'Gatorade black';
    font-size: 11px;
    text-transform: uppercase;
}
.down {
    width: 60px;
    display: block;
    margin: 0 auto;
}
</style>
<?php
if (wp_is_mobile()) {
?>
<div class="content_cont bg_content">
    <div class="content_cont_tit_h1">
        <h1 class="content_cont_h1 bottom_line">RANKING DE USUARIOS</h1>
        <div class="content_cont_h1_line"></div>
    </div>
    <?php get_template_part( 'template-parts/mobile/banner_retos' ); ?>
    
    	
<div class="list_ranking">
    <ul class="list_ranking_gen">
        <?php
        $index = 1;
        $args = array(
            'role'    => 'subscriber',
            'number' => 10,
            'meta_key' => 'gpoints',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        );
        $usuarios = get_users($args);
        foreach ($usuarios as $usuario) {
            $get_author_gravatar = get_avatar_url($usuario->ID, array('size' => 450));
            $avatar_url = get_user_meta($usuario->ID, 'avatar', true);
        ?>
        <li>
            <div class="user_img" style="background: url()">
                <img src="<?php if($avatar_url){ echo $avatar_url; } else { echo $get_author_gravatar; } ?>" />
            </div>
            <?php
            $nameUser = get_user_meta($usuario->ID, 'user_nombre', true).' '. get_user_meta($usuario->ID, 'user_apellido', true);
            ?>
            <p class="user_name"><?php echo $nameUser; ?><br><span><?php echo '#'.$index++; ?></span></span><span><?php echo get_user_meta($usuario->ID, 'gpoints', true); ?> G-POINTS</span></p>
        </li>
        <?php
        }
        ?>
    </ul>
    <img src="<?php echo IMGURL ?>down_arrow.png" class="down"/>
</div>

    <?php get_template_part( 'template-parts/foot_logos/foot_logos' ); ?>
</div>
<?php
} else {
?>
<style>
.banner_retos {
    margin-bottom: 30px;
}
h1 {
    color: #FF851A;
    font-size: 32px;
    text-align: center;
}
.list_ranking {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    min-width: 384px;
}
.list_ranking_gen {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
    flex-wrap: wrap;
    height: 386px;
    overflow-y: hidden;
    margin-bottom: 70px;
}
.list_ranking_gen:hover {
    overflow-y: scroll;
}
.list_ranking_gen li {
    display: flex;
    padding: 10px 0px 6px;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
    flex-wrap: wrap;
    border-bottom: 1px solid #cecece;
}
.user_img img {
    width: 52px;
    height: 52px;
    border-radius: 50%;
}
.user_index {
    color: #414141;
    font-family: 'Gatorade black';
    font-size: 22px;
    text-align: center;
    margin:0px;
    width: 60px;
}
.user_name {
    color: #414141 !important;
    font-family: 'Gatorade black';
    font-size: 18px;
    text-transform: uppercase;
    /* margin-left: 30px; */
    line-height: 18px;
    margin: 0;
    margin-left: 10px;
}
.user_name span {
    color: #414141 !important;
    font-family: 'Gatorade black';
    font-size: 11px;
    text-transform: uppercase;
}
</style>
<div class="home">
  <?php get_template_part( 'template-parts/desktop/header' ); ?>
  <?php get_template_part( 'template-parts/desktop/banner_retos' ); ?>
 <div class="list_ranking">
    <h1>RANKING DE USUARIOS</h1>
    <ul class="list_ranking_gen">
        <?php
        $index = 1;
        $args = array(
            'role'    => 'subscriber',
            'number' => 10,
            'meta_key' => 'gpoints',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        );
        $usuarios = get_users($args);
        foreach ($usuarios as $usuario) {
            $get_author_gravatar = get_avatar_url($usuario->ID, array('size' => 450));
            $avatar_url = get_user_meta($usuario->ID, 'avatar', true);
        ?>
        <li>
            <div class="user_img" style="background: url()">
                <img src="<?php if($avatar_url){ echo $avatar_url; } else { echo $get_author_gravatar; } ?>" />
            </div>
            <p class="user_index"><?php echo '#'.$index++; ?></p>
            <?php
            $nameUser = get_user_meta($usuario->ID, 'user_nombre', true).' '. get_user_meta($usuario->ID, 'user_apellido', true);
            ?>
            <p class="user_name"><?php echo $nameUser; ?><br><span><?php echo get_user_meta($usuario->ID, 'gpoints', true); ?> G-POINTS</span></p>
        </li>
        <?php
        }
        ?>
    </ul>
</div>
  <?php get_template_part( 'template-parts/desktop/footer' ); ?>
</div>
<?php
}
?>
<script type="text/javascript">
 jQuery( document ).ready(function() {
    jQuery('.header_nav_close').css('display', 'flex');
    jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
});

j

</script>
<?php
get_footer();
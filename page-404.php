<?php
/**
 * Template Name: Page 404
 *
 * @package WordPress
 */

get_header();
?>
	<style>
    .home {
    width: 100%;
    padding-top: 50px;
    padding-right: 50px;
    padding-left: 50px;
    max-width: 1200px;
    margin: 0 auto;
    }
	.not_found {
    width: calc(100% + 100px);
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    background: url(<?php echo IMGURL ?>404.jpg);
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    margin-left: -50px;
    margin-right: -50px;
    padding: 120px 90px;
    margin-top: 30px;
}
	.not_found > div {
	width: 50%;
	}
	.not_found > div:last-of-type {
	width: 50%;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	}
	.not_found h2 {
		color: var(--color-orange);
		font-size: 40px;
		text-transform: uppercase;
		font-family: 'Gatorade black', sans-serif;
		line-height: 38px;
		margin-bottom: 10px;
	}
	.not_found h3 {
		color: white;
		font-size: 26px;
		text-transform: uppercase;
		line-height: 26px;
		margin-top: 0px;
	}
  </style>
  <?php
if(wp_is_mobile()){
?>
<style>
.not_found {
    padding: 60px 20px;
	width: calc(100% + 40px);
	margin-left: -20px;
	margin-right: -20px;
	background-position-x: 46%;
}
.not_found h2 {
    font-size: 26px;
    line-height: 28px;
}

.not_found h3 {
    font-size: 18px;
    line-height: 21px;
}

.not_found > div:first-of-type {
	width: 40%;
	}
	.not_found > div:last-of-type {
	width: 60%;
	}
  </style>
<div class="content_cont">
	<div class="not_found">
		<div>
		</div>
		<div>
			<h2>¡oops no encontramos resultados!</h2>
			<h3>pero no pierdas el impulso sígue recargandote con <br><span style="font-family: 'Gatorade black', sans-serif;">todos nuestros contenidos.</span></h3>
		</div>
	</div>
</div>
<script>
    jQuery( document ).ready(function() {
        jQuery('.header_nav_close').css('display', 'flex');
        jQuery('.header_nav_close').attr('href', '<?php echo home_url(); ?>');
    });
</script>
<?php } else { ?>
<style>
.home_header{
	padding-left:15% !important;
	padding-right:15% !important;
}
</style>
  <div class="home">
    <?php get_template_part( 'template-parts/desktop/header' ); ?>
    <div class="not_found">
		<div>
		</div>
		<div>
		<h2>¡oops no encontramos resultados!</h2>
		<h3>pero no pierdas el impulso sígue recargandote con <br><span style="font-family: 'Gatorade black', sans-serif;">todos nuestros contenidos.</span></h3>
		</div>
	</div>
    <?php get_template_part( 'template-parts/desktop/footer' ); ?>
  </div>
  <script>
    console.log('gggg');
    jQuery('head').find('script').remove();
  </script>
<?php } ?>

<?php
get_footer(); 
?>
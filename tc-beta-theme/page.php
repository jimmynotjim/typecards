<?php get_header(); ?>
<div role="main">
	<?php if ( is_user_logged_in() ) {
		include_once( 'includes/inc-anatomy-cards.php' );
	} else {
		echo '<div class="card-holder on"><section class="card"><article>';
		echo '<h1 class="beta-logo">typecards</h1>';
		wp_login_form();
		echo '</article></section></div>';
	} ?>
</div><!--main-->
<?php get_footer(); ?>
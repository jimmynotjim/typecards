<?php
	if ( is_page('api') ) :
		header('Content-Type: application/json; charset=utf8');
		json_function();
	else :
	get_header();
?>

<div role="main" class="main-app">
	<?php include_once( 'includes/inc-app-cards.php'); ?>
	<?php include_once( 'includes/inc-anatomy-cards.php' ); ?>
</div>

<?php
	get_footer();
	endif;
?>
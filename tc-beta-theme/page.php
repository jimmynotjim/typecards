<?php
if ( !is_page( 'api' ) ) {
	get_header(); ?>
	<div role="main">
	<?php
	if ( is_user_logged_in() ) {
		include_once( 'includes/inc-anatomy-cards.php' );
	} else {
		echo '<div class="card-holder on"><section class="card"><article>';
		echo '<h1 class="beta-logo">typecards</h1>';
		wp_login_form();
		echo '</article></section></div>';
	} ?>
	</div>
	<?php get_footer(); ?>
			<script>
			$(document).ready(function() {
				jQuery.ajax({
					'url': 'http://sm.local/api',
					'dataType': 'json',
					'success': function(data) {
						console.log(data);
					},
					'error': function() {
						console.log('error');
						console.log(arguments);
					}
				});
			});
		</script> <?php
} else {
    header('Content-Type: application/json; charset=utf8');
	json_function();
} ?>
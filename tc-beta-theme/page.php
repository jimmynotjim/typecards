<?php get_header(); ?>
<div role="main" id="main" class="wrap">
	<?php include_once( 'includes/inc-site-nav.php' ); ?>
	<div class="top-level-cards">
	<?php
		if ( is_page( 'anatomy' ) ) {
			include_once( 'includes/inc-anatomy-cards.php' );
		}
		elseif ( is_page( 'quiz' ) ) {
			include_once( 'includes/inc-quiz-cards.php' );
		}
		else {
			echo '<p>Nothing here</p>';
		}
	?>
	</div>
</div><!--main-->
<?php get_footer(); ?>
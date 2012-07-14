<?php get_header(); ?>
<div role="main" id="main" class="wrap">
	<section id="content">
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
	</section><!--content/main column-->
</div><!--main-->
<?php get_footer(); ?>
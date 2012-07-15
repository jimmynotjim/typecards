<div class="slider inactive" id="slider1">
	<ul class="cards">
	<?php 
		$quizArgs = array(
			'post_type'			=> 'quiz',
			'posts_per_page'	=> 10,
			'orderby'			=> 'rand'
		);
		query_posts($quizArgs);
		if( have_posts() ) while( have_posts() ) : the_post(); 
		$answer1 = get_post_meta( $post->ID, 'answer1', true );
		$answer2 = get_post_meta( $post->ID, 'answer2', true );
		$answer3 = get_post_meta( $post->ID, 'answer3', true );
		$answer4 = get_post_meta( $post->ID, 'answer4', true );
	?>
		<li class="<?php the_title(); ?> card-holder">
			<section class="card">
				<article class="card-front">
					<div class="card-body">
						<?php
							if( has_post_thumbnail($post->ID) ) {
								echo get_the_post_thumbnail( $post->ID, 'sm' );
							}
						?>
						<ol class="answer-options">
							<li class="single-answer correct"><?php echo $answer1; ?></li>
							<li class="single-answer incorrect"><?php echo $answer2; ?></li>
							<li class="single-answer incorrect"><?php echo $answer3; ?></li>
							<li class="single-answer incorrect"><?php echo $answer4; ?></li>
						</ol>
					</div>
					<a href="#" class="menu-btn">Menu</a>
				</article>
			</section>
		</li>
		<?php endwhile; ?>
	</ul>
	<nav class="card-nav">
		<a href="#" id="prev" onclick="mySwipe.prev(); return false;">Prev</a>
		<a href="#" id="next" onclick="mySwipe.next(); return false;">Next</a>
	</nav>
</div>

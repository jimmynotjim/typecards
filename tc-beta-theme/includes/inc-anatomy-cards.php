<div class="slider" id="slider2">
	<ul class="cards anatomy">
	<?php 
		$anatomyArgs = array(
			'post_type'			=> 'anatomy',
			'posts_per_page'	=> 10,
			'orderby'			=> 'rand'
		);
		query_posts($anatomyArgs);
		if( have_posts() ) while( have_posts() ) : the_post(); 
		$aka = get_post_meta( $post->ID, 'anatomy-aka', true );
		$altSpell = get_post_meta( $post->ID, 'anatomy-alt-spell', true );
		$example = get_post_meta( $post->ID, 'anatomy-examples', true );
		$references = get_post_meta( $post->ID, 'anatomy-references', true );
		$refArray = explode( ',', $references );
	?>
		<li class="<?php the_title(); ?> card-holder">
			<section class="card">
				<article class="card-front">
					<div class="card-body">
						<h1 class="card-title">Type Anatomy</h1>
						<?php
							if( has_post_thumbnail($post->ID) ) {
								echo get_the_post_thumbnail( $post->ID, 'lg' );
							}
						?>
					</div>
					<a href="#" class="menu-btn">Menu</a>
				</article>
				<article class="card-back hidden">
					<div class="card-body">
						<h1 class="card-title"><?php the_title(); ?></h1>
						<h2 class="meta-title">Definition:</h2>
						<?php
							the_content(); 
							
							if( $aka ) {
							echo '<h2 class="meta-title">Also Known As:</h2>';
							echo '<p>'. $aka .'</p>';
							}
							
							if( $altSpell ) {
							echo '<h2 class="meta-title">Alternate Spelling:</h2>';
							echo '<p>'. $altSpell .'</p>';
							}
							
							if( $example ) {
							echo '<h2 class="meta-title">Examples:</h2>';
							echo '<p>'. $example .'</p>';
							}
							
							if( $references ) {
									echo '<h2 class="meta-title">References:</h2>';
									echo '<p>';
									foreach( $refArray as $reference ):
										echo '<a href="'. $reference .'" title="'. $reference. '" class="ref-link">'. $reference .'</a>';
									endforeach;
									echo '</p>';
							}
						?>
					</div>
					<div class="top-shadow"></div>
					<div class="bottom-shadow"></div>
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

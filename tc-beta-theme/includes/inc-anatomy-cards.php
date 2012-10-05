<div class="slider swipe" id="slider">
	<ul class="cards swipe-wrap">
	<?php
		$anatomyArgs = array(
			'post_type'			=> 'anatomy',
			'posts_per_page'	=> -1,
			'orderby'			=> 'title',
			'order'				=> 'ASC'
		);
		query_posts($anatomyArgs);
		if( have_posts() ) while( have_posts() ) : the_post();
		$aka = get_post_meta( $post->ID, 'anatomy-aka', true );
		$altSpell = get_post_meta( $post->ID, 'anatomy-alt-spell', true );
		$example = get_post_meta( $post->ID, 'anatomy-examples', true );
		$references = get_post_meta( $post->ID, 'anatomy-references', true );
		$refArray = explode( ',', $references );
	?>
		<li class="card-holder">
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
					<!--<a href="#" class="menu-btn">Menu</a>-->
				</article>
				<article class="card-back hidden">
					<div class="card-body">
						<h1 class="term-title"><?php the_title(); ?></h1>
						<?php
							if( has_post_thumbnail($post->ID) ) {
								echo get_the_post_thumbnail( $post->ID, 'sm' );
							}
						?>
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
										$refURL = preg_replace('/([A-Za-z.]*-)/', '', $reference);
										$refTitle = preg_replace('/(-[A-Za-z.:\/]*)/', '', $reference);
										echo '<a href="'. $refURL .'" title="'. $refTitle. '" class="ref-link">'. $refTitle .'</a>';
										//echo '<span>'. $refURL .'</span>';
									endforeach;
									echo '</p>';
							}
						?>
					</div>
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

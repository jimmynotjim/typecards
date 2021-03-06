<div class="slider swipe" id="anatomy_slider" style="visibility: hidden;">
	<ul class="cards swipe-wrap">
	<?php
		$c = 1;
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
		<li class="card-holder<?php if ($c == 1) { echo ' on'; } ?>" id="<?php the_title(); ?>">
			<section class="card">
				<article class="card-back hidden">
					<div class="card-body">
						<h1 class="term-title"><?php the_title(); ?></h1>
						<?php
						if( has_post_thumbnail($post->ID) ) {
							$charImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'lg');
							echo '<img src="'. $charImg[0] .'" class="character-small" />';
						}
						?>
						<h2 class="meta-title">Definition</h2>
						<?php
						the_content();

						if( $aka ) {
						echo '<h2 class="meta-title">Also Known As</h2>';
						echo '<p>'. $aka .'</p>';
						}

						if( $altSpell ) {
						echo '<h2 class="meta-title">Alternate Spelling</h2>';
						echo '<p>'. $altSpell .'</p>';
						}

						if( $example ) {
						echo '<h2 class="meta-title">Examples</h2>';
						echo '<p>'. $example .'</p>';
						}
						?>
					</div>
				</article>
				<article class="card-front">
					<div class="card-body">
						<?php
						if( has_post_thumbnail($post->ID) ) {
							$charImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'lg');
							echo '<img src="'. $charImg[0] .'" class="character" />';
						}
						?>
					</div>
					<button href="#" class="menu-btn"><span>Menu</span></button>
				</article>
			</section>
		</li>
		<?php $c++; ?>
		<?php
			endwhile;
			wp_reset_query();
		?>
	</ul>
	<nav class="card-nav">
		<a href="#" id="prev" onclick="anatomySwipe.prev(); return false;">Prev</a>
		<a href="#" id="next" onclick="anatomySwipe.next(); return false;">Next</a>
	</nav>
</div>

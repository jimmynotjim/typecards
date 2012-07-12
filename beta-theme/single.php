<?php get_header(); ?>
<div role="main" id="main" class="wrap">
	<section id="content">
	<?php 
		if( have_posts() ) while( have_posts() ) : the_post(); 
		$aka = get_post_meta( $post->ID, 'anatomy-aka', true );
		$altSpell = get_post_meta( $post->ID, 'anatomy-alt-spell', true );
		$example = get_post_meta( $post->ID, 'anatomy-examples', true );
		$references = get_post_meta( $post->ID, 'anatomy-references', true );
	?>
		<article class="card-front">
			<h1 class="card-title">Type Anatomy</h1>
			<?php
				if( has_post_thumbnail( $page->ID ) ) {
					echo get_the_post_thumbnail( $page->ID, 'lg' );
				}
			?>
		</article>
		<article class="card-back">
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
				echo '<p><a href="'. $references .'" title="'. $references. '">'. $references .'</a></p>';
				}
			?>
		</article>
		<div class="pagination">
		<?php previous_post_link('%link', 'Prev'); ?>
		<?php next_post_link('%link', 'Next'); ?>
		</div>
		
		<?php endwhile; ?>
		</article><!--page content-->
	</section><!--content/main column-->
</div><!--main-->
<?php get_footer(); ?>
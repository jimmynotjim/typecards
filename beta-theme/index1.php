<?php get_header(); ?>
<div role="main" id="main" class="wrap">
	<section id="content">
		<article>
		<?php if( have_posts() ) while( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		</article><!--page content-->
	</section><!--content/main column-->
</div><!--main-->
<?php get_footer(); ?>
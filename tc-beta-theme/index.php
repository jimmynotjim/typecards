<?php get_header(); ?>
<div role="main" class="main">
	<section class="" id="app-menu">
		<h1 class="beta-logo">typecards</h1>
		<nav class="app-nav">
			<button id="search-terms">Find a Term</button>
			<button id="all-cards">All Cards</button>
			<button id="text-size">Text Size</button>
		</nav>
<!--		<div class="text-size-controls">
			<button id="size-smaller">Smaller</button>
			<button id="size-larger">Larger</button>
		</div>-->
		<aside class="terms-nav hidden">
			<nav class="scrolling-list">
				<ul class="menu">
				<?php
					$i = 0;
					$anatomyArgs = array(
						'post_type'			=> 'anatomy',
						'posts_per_page'	=> -1,
						'orderby'			=> 'title',
						'order'				=> 'ASC'
					);
					query_posts($anatomyArgs);
					if( have_posts() ) while( have_posts() ) : the_post();
				?>
					<li><a href="#" id="<?php echo $i; ?>" class="shortcut" onclick="mySwipe.slide(<?php echo $i; ?>, 400); return false;"><?php the_title(); ?></a></li>
					<?php $i++; ?>
				<?php
					endwhile;
					wp_reset_query();
				?>
				</ul>
			</nav>
			<button class="dismiss">Dismiss</button>
		</aside>
		<?php //if( $_COOKIE['dismissInstructions'] != 1 ) { ?>
		<aside class="instructions">
			<span class="details">Swipe to navigate through the cards, tap to flip a card and view it's details.</span>
			<button class="dismiss">Dismiss</button>
		</aside>
		<?php //} ?>
	</section>
	<?php include_once( 'includes/inc-anatomy-cards.php' ); ?>
</div><!--main-->
<?php get_footer(); ?>

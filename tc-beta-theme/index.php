<?php get_header(); ?>
<div role="main" class="main">
	<div class="slider swipe" id="app_slider">
		<ul class="cards swipe-wrap">
			<li class="card-holder" id="app-menu">
				<section class="card">
					<article>
						<h1 class="beta-logo">typecards</h1>
						<nav class="app-nav">
							<input class="search-terms" type="text" placeholder="Search Terms" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
							<button id="all-cards">All Cards</button>
							<button>...</button>
						</nav>
						<?php if( $_COOKIE['dismissInstructions'] != 1 ) { ?>
						<aside class="instructions">
							<span class="details">Swipe to navigate through the cards, tap to flip a card and view its details.</span>
							<button class="dismiss">Dismiss</button>
						</aside>
						<?php } ?>
					</article>
				</section>
			</li>
		</ul>
	</div>
	<?php include_once( 'includes/inc-anatomy-cards.php' ); ?>
</div>
<?php get_footer(); ?>

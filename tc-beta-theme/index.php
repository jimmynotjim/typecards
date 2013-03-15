<?php get_header(); ?>
<div role="main" class="main">
	<div class="slider swipe" id="app_slider">
		<ul class="cards swipe-wrap">
			<li class="card-holder" id="app-menu">
				<section class="card">
					<article>
						<h1 class="beta-logo">typecards</h1>
						<nav class="app-nav">
							<input class="search-terms" type="text" placeholder="Search Terms">
							<button id="all-cards">All Cards</button>
							<button onclick="appSwipe.slide(1, 400); return false;">Settings</button>
							<button onclick="appSwipe.slide(1, 400); return false;">Instructions</button>
							<button onclick="appSwipe.slide(1, 400); return false;">About</button>
						</nav>
				<!--		<div class="text-size-controls">
							<button id="size-smaller">Smaller</button>
							<button id="size-larger">Larger</button>
						</div>
							<div>
								<p>typecards began as a tool to help me better understand typography. With a little help from some good friends it's grown into a tool I hope you find useful too. Over time it will grow to include more than just Anatomy Terms and hopefully become your goto source on all things type.</p>
								<p>This is a beta release, there's sure to be bugs and incomplete information. Please report any inconcistencies to <a href="mailto:help@typecardsapp.com">help@typecardsapp.com</a>.</p>
							</div>
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
									<li><a href="#" id="<?php echo $i; ?>" class="shortcut" onclick="anatomySwipe.slide(<?php echo $i; ?>, 400); return false;"><?php the_title(); ?></a></li>
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
						<?php //} ?>-->
					</article>
				</section>
			</li>
			<li class="card-holder">
				<section class="card">
					<article>
						<h1>About typecards</h1>
						<p>typecards is an experiment using html and javascript to create a navtive app like experience, on any device. This is a beta release, there's sure to be bugs and incomplete information. Please report any inconcistencies to <a href="mailto:help@typecardsapp.com">help@typecardsapp.com</a>.</p>
						<dl>
							<dt>Web</dt><dd><a href="http://typecardsapp.com">typecardsapp.com</a></dd>
							<dt>Twitter</dt><dd>@typecards</dd>
							<dt>AppNet</dt><dd>@typecards</dd>
						<dl>
						<h2>A <strong>James Wilson</strong> Project</h2>
						<dl>
							<dt>Web</dt><dd>jimmynotjim.com</dd>
							<dt>Twitter</dt><dd>@jimmynotjim</dd>
							<dt>AppNet</dt><dd>@jimmynotjim</dd>
						</dl>
						<button onclid="appSwipe(0, 400); return false;">Back</button>

					</article>
				</section>
			</li>
		</ul>
	</div>
	<?php include_once( 'includes/inc-anatomy-cards.php' ); ?>
</div><!--main-->
<?php get_footer(); ?>

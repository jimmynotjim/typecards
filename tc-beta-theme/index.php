<?php get_header(); ?>
<div role="main" class="main">
	<div class="slider swipe" id="app_slider">
		<ul class="cards swipe-wrap">
			<li class="card-holder" id="app-menu">
				<section class="card">
					<article>
<!--
						<?php if( $_COOKIE['dismissInstructions'] != 1 ) { ?>
						<aside class="instructions">
							<span class="details">Swipe to navigate through the cards, tap to flip a card and view its details.</span>
							<button class="dismiss">Dismiss</button>
						</aside>
						<?php } ?> -->
						<h1 class="beta-logo">typecards</h1>
						<nav class="app-nav">
							<input class="search-terms" type="text" placeholder="Search Terms" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
							<button id="clear-search"><span>Clear</span></button>
							<button id="all-cards">All Cards</button>
							<button id="inst-button" onclick="appSwipe.slide(1, 400); return false;">Instructions</button>
<!--							<button onclick="appSwipe.slide(1, 400); return false;">Settings</button>	-->
							<button id="about-button" onclick="appSwipe.slide(1, 400); return false;">About</button>
						</nav>
					</article>
				</section>
			</li>
			<li class="card-holder">
				<section class="card">
					<article id="instructions" class="active">
						<div class="card-body">
							<button onclick="appSwipe.slide(0, 400); return false;" class="menu-back"><span>Back</span></button>
							<h2 class="extras-title">Instructions</h2>
							<p>typecards is a digital typographic reference that goes with you on all your devices. Use the flash cards to build your typographic knowledge or search for terms and keywords to discover oddities like what that little hook on a ‘g’ is really called.</p>
							<p>Pull down the cards to get started or enter a search term to jump to a specific card. After that you can swipe to navigate through the cards and tap a card to flip it and view its details.</p>
						</div>
					</article>
					<article id="about">
						<div class="card-body">
							<button onclick="appSwipe.slide(0, 400); return false;" class="menu-back"><span>Back</span></button>
							<h2 class="extras-title">About</h2>
							<p>typecards is an experiment by @jimmynotjim using html and javascript to create a navtive app like experience, on any device. It's a work in progress and considered a beta release so there's sure to be bugs and incomplete information. Please report any inconcistencies to <a href="mailto:help@typecardsapp.com">help@typecardsapp.com</a>.</p>
							<h2 class="extras-title">Online</h2>
							<dl class="app-details">
								<dt>Web</dt><dd><a href="http://typecardsapp.com">typecardsapp.com</a></dd>
								<dt>Twitter</dt><dd><a href="http://twitter.com/typecards">@typecards</a></dd>
								<dt>AppNet</dt><dd><a href="http://alpha.app.net/typecards">@typecards</a></dd>
							</dl>
							<dl class="my-details">
								<dt>Web</dt><dd><a href="http://jimmynotjim.com">jimmynotjim.com</a></dd>
								<dt>Twitter</dt><dd><a href="http://twitter.com/jimmynotjim">@jimmynotjim</a></dd>
								<dt>AppNet</dt><dd><a href="http://alpha.app.net/jimmynotjim">@jimmynotjim</a></dd>
							</dl>
						</div>
					</article>
				</section>
			</li>
		</ul>
	</div>
	<?php include_once( 'includes/inc-anatomy-cards.php' ); ?>
</div>
<?php get_footer(); ?>

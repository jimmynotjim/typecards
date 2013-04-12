<?php get_header(); ?>
<div role="main" id="main" class="wrap">
	<div class="info">
		<hgroup class="logo">
				<h1 class="logo-type">typecards</h1>
				<h2 class="tag-line">Master the finer details of typography</h2>
		</hgroup>
		<section class="details">
			<p>typecards is an experiment using html and javascript to create a native app like experience on (almost) any device. It's still considered a work in progress, but feel free to check it out. For best results on iOS, save it to your homescreen.</p>
			<a href="http://typecardsapp.com/app/" class="button">Launch the App</a>
			<span class="try">or <br/>Go ahead and try the demo</span>
		</section>
	</div>
	<section class="phone">
		<div class="main-app">
			<?php include_once( 'includes/inc-app-cards.php'); ?>
			<?php include_once( 'includes/inc-anatomy-cards.php' ); ?>
		</div>
	</section>
	<section class="signup">
		<?php include_once( 'includes/inc-email-signup.php' ); ?>
	</section><!-- signup -->
</div><!--main-->
<footer class="main-footer">
	<span>Typecards is a web experiment from <a href="http://jimmynotjim.com">James Wilson (jimmynotjim)</a>. To keep an eye on the progress follow my <a href="http://twitter.com/jimmynotjim">twitter</a> or <a href="http://dribbble.com/jimmynotjim">dribbble</a> streams.</span>
	<a href="http://www.bostonbuilt.org">
	<script type='text/javascript'>(function(){document.write("<img src='http://bostonbuilt.org/icon.php?q=b_logo_small.png&u=" + window.location.host + "' class='boston' />");})();</script></a>
</footer>
<?php get_footer(); ?>
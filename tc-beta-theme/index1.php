<?php get_header(); ?>
<div role="main" id="main" class="wrap">
	<hgroup class="logo">
			<h1 class="logo-type">typecards</h1>
			<h2 class="tag-line">Master the finer details of typography</h2>
	</hgroup>
	<section class="phone">
		<aside class="try"></aside>
		<?php include_once( 'includes/inc-anatomy-cards.php' ); ?>
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
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title('-', true, 'right'); ?>Type Cards</title>
	<meta name="description" content="Master the finer details of typography">
	<meta name="keywords" content="type, typography, study, cards">

	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="apple-touch-startup-image" href="<?php bloginfo( 'template_url' ); ?>/assets/img/iphone-splash.png">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/typecards-icon114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/typecards-icon144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/typecards-icon114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/typecards-icon144.png" />
	

	<link rel="shortcut icon" type="image/ico" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/favicon.ico" />
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/css/style.css" />

	<!-- Scripts -->
	
	<!-- Modernizr -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/libs/modernizr-2.5.2.min.js"></script>
  
  	<!-- Box Model Shim -->
	<!--[if lt IE 8]>
		<sript src="<?php bloginfo('template_url'); ?>/assets/js/borderBoxModel-min.js"></script>
	<![endif]-->

	<!-- Typkit Code -->
	<script type="text/javascript" src="http://use.typekit.com/fhw4ytw.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	<!--Analytics-->
	<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-33078147-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

	</script>
  
  <?php wp_head(); ?>
  
</head>
<body 
	<?php page_bodyclass(); 
	if (is_single() ) {
		post_class();
	} 
	?> >
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
	<title>Type Cards</title>
	<meta name="description" content="Master the finer details of typography">
	<meta name="keywords" content="type, typography, study, cards">

	<meta name="viewport" content="initial-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<!--	<link href="<?php bloginfo( 'template_url' ); ?>/assets/img/iphone-splash.png" media="(device-width: 320px)" rel="apple-touch-startup-image">
	<link href="<?php bloginfo( 'template_url' ); ?>/assets/img/iphone-splash.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
-->	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/typecards-icon-114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/typecards-icon-144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/typecards-icon-114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/typecards-icon-144.png" />

	<link rel="shortcut icon" type="image/ico" href="<?php bloginfo( 'template_url' ); ?>/assets/img/icons/favicon.ico" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/css/style.css?v=b0.78" />
<!--	<link rel="stylesheet" href="http://rawgithub.com/twitter/typeahead.js/master/src/css/typeahead.css" /> -->

	<!-- Scripts -->

	<!-- jquery -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<!-- Modernizr -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/libs/modernizr-2.5.2.min.js"></script>

	<!-- Typkit Code -->
	<script type="text/javascript" src="http://use.typekit.com/fhw4ytw.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<!-- iOS Detection -->
	<?php if (!current_user_can( 'manage_options' )) { ?>
	<script>/*
		if ((navigator.userAgent.indexOf('iPhone') != -1) || (navigator.userAgent.indexOf('iPod') != -1) || (navigator.userAgent.indexOf('iPad') != -1)) {
			if (window.navigator.standalone == true) {
				initialize();
			}else{
				document.write('<p class="safari-message">Im a web app still in beta, please add me to your home screen to enjoy me in full screen mode</p>');
			}
		}else{
			document.location.href='http://typecardsapp.com';
		}*/
	</script>
	<?php } ?>

	<!-- Google Analytics -->
	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-33078147-2']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	</script>

  <?php wp_head(); ?>

</head>
<body>

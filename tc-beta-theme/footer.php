	<!-- jquery -->
<!--	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>	-->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/libs/jquery-1.7.2.min.js?v=1"></script>

	<!-- swipe.js -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/swipe.js?v=1"></script>
	<script>
		window.mySwipe = new Swipe(document.getElementById('slider'), {
			gutter: 10,
			callback: function(e, pos) {

				var i = cards.length;
				while (i--) {
					cards[i].className = 'card-holder';
				}
				var c = e;
				var p = c-1;
				var n = c+1;
				cards[c].className = 'card-holder on';
				if( cards[p] != null) cards[p].className = 'card-holder on';
				if( cards[n] != null) cards[n].className = 'card-holder on';
			}
		}),
		cards = document.getElementById('slider').getElementsByTagName('li');
	</script>

	<!-- jgestures.js -->
<!--	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/libs/jgestures.min.js"></script>	-->

	<!-- custom scripts -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/scripts.js?v=1"></script>

  <?php wp_footer(); ?>

</body>
</html>

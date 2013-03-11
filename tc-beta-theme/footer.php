	<!-- jquery -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	<!-- jquery cookie -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/jquery.cookie.js"></script>

	<script src="<?php bloginfo('template_url'); ?>/assets/js/FastClick.js"></script>
	<script>
		if(window.addEventListener) {
			window.addEventListener('load', function() {
				'use strict';

				new FastClick(document.body);
			}, false);
		}
	</script>

	<!-- swipe.js -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/swipe.js?v=1"></script>
	<script>
		window.mySwipe = new Swipe(document.getElementById('slider'), {
			gutter: 10,
			callback: function() { //swap transform and backface styles on current, previous and next cards to prevent crashing
				setTimeout(function(){ //timeout needed to prevent stuttering while swiping cards
					var pos = mySwipe.getPos();

					var i = cards.length;
					while (i--) {
						cards[i].className = 'card-holder';
					}
					var c = pos;
					var p = c - 1;
					var n = c + 1;
					console.log(c, p, n);
					cards[c].className = 'card-holder on';
					if( cards[p] != null) cards[p].className = 'card-holder on';
					if( cards[n] != null) cards[n].className = 'card-holder on';
				}, 20);
				setTimeout(function(){
					$('.card').removeClass('flipped')
				}, 5);
			}
		}),
		cards = document.getElementsByClassName('card-holder');
	</script>

	<!-- custom scripts -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/scripts.js"></script>


  <?php wp_footer(); ?>

</body>
</html>

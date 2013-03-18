	<!-- jquery cookie -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/jquery.cookie.js"></script>

	<!-- typeahead stuff -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/libs/typeahead.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/libs/hogan-2.0.0.min.js"></script>
	<script>
		$('.search-terms').typeahead({
			name: 'anatomy-terms',
			limit: 4,
			template: [
				'<p onclick="anatomySwipe.slide({{id}}, 400);">{{value}}</p>'
			],
			engine: Hogan,
			prefetch: 'http://beta.typecardsapp.com/api/'
		});
	</script>

	<!-- FastClick stuff -->
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
		window.anatomySwipe = new Swipe(document.getElementById('anatomy_slider'), {
			gutter: 10,
			callback: function() { //swap transform and backface styles on current, previous and next cards to prevent crashing
				setTimeout(function(){ //timeout needed to prevent stuttering while swiping cards
					var pos = anatomySwipe.getPos();

					var i = cards.length;
					while (i--) {
						cards[i].className = 'card-holder';
					}
					var c = pos;
					var p = c - 1;
					var n = c + 1;

					cards[c].className = 'card-holder on';
					if( cards[p] != null) cards[p].className = 'card-holder on';
					if( cards[n] != null) cards[n].className = 'card-holder on';
				}, 20);
				setTimeout(function(){
					$('.card').removeClass('flipped')
				}, 5);
			}
		}),
		cards = $('#anatomy_slider').find('.card-holder');
	</script>

	<!-- custom scripts -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/scripts-ck.js"></script>

	<?php wp_footer(); ?>

</body>
</html>

	<!-- jquery -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<!-- jquery cookie -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/jquery.cookie.js"></script>

	<script src="http://rawgithub.com/twitter/typeahead.js/master/dist/typeahead.js"></script>
	<script src="http://twitter.github.com/hogan.js/builds/2.0.0/hogan-2.0.0.js"></script>

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

		window.appSwipe = new Swipe(document.getElementById('app_slider'), {
			gutter: 10
		});
	</script>

	<!-- custom scripts -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/scripts-ck.js"></script>

	<script>
		$('.search-terms').typeahead({
			template: [
				'<p onclick="anatomySwipe.slide({{id}}, 400);">{{value}}</p>'
			],
			engine: Hogan,
			local: [
				{
					value: 'Arm',
					tokens: ['Arm', 'Crossbar', 'Cross stroke'],
					id: 0
				},
				{
					value: 'Crossbar',
					tokens: ['Crossbar', 'bar', 'arm', 'cross stroke'],
					id: 1
				},
				{
					value: 'Spur',
					tokens: ['Spur', 'barb', 'cats ear'],
					id: 2
				}
			]
		});
		$(document).ready( function() {
			$(window).click( function(e) {
				if( $(e.toElement).parent('.tt-suggestion').length ) {
					$('#anatomy_slider').css('-webkit-transform', 'translate3d(0,0,0)').css('-webkit-transition', 500).removeClass('inactive');
				}
			});
		});
	</script>

  <?php wp_footer(); ?>

</body>
</html>

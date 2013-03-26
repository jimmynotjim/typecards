	<!-- jquery cookie -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/jquery.cookie.js"></script>

	<!-- app init -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/app.js"></script>
	<script>
		var tc = $.typecards();
		tc.on();
		console.log('figured out init and card height, now set char margins')
	</script>

	<!-- typeahead stuff -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/libs/typeahead.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/libs/hogan-2.0.0.min.js"></script>
	<script>
		var termsArray = <?php json_function(); ?>;
		$('.search-terms').typeahead({
			name: 'anatomy-terms',
			limit: 4,
			template: [
				'<p>{{value}}</p>'
			],
			engine: Hogan,
			local: termsArray

		}).on('typeahead:selected', function($e) {
			$('.search-terms').blur();
			var selectedValue = $($e.target).val();
			var getSelectedIndex = function(val) {
				var index = null;
				$.each(termsArray, function(i, v) {
					if (v.value === val) {
						index = i; return false;
					}
				});
				return index;
			}
			var selectedIndex = getSelectedIndex(selectedValue);
			anatomySwipe.slide(selectedIndex, 0);
			tc.close(0.6);
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

					cards[pos].className = 'card-holder on';
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

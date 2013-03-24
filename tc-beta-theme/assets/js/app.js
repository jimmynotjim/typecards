(function($){
	$.typecards = function() {
		var tc = {
			//setup
			menuState: 'closed',
			speed: 0.4,
			vpHeight:	function() {
				return $(window).height();
			},
			margTop: function() {
				return (tc.vpHeight() > 300) ? ( tc.vpHeight() - 300 ) * 0.5 : 0;
			},
			offSet:	function() {
				return (tc.vpHeight() < 600) ? tc.vpHeight() * 0.85 : tc.vpHeight() * 0.90;
			},
			setCardHeight: function() {
				$(tc.main).height( tc.vpHeight() );
			},
			setCharMargin: function() {
				var margTop	= (tc.vpHeight() > 300) ? ( tc.vpHeight() - 300 ) * 0.5 : 0;
				$(tc.char).css('margin-top', margTop);
			},
			setAppStyles: function() {
				var css = '.main{height:' + tc.vpHeight() +'px;} .character{margin-top:' + tc.margTop() + 'px;} #anatomy_slider.open{-webkit-transform:translate3d(0,-' + tc.offSet() +'px,0); -moz-transform:translate3d(0,-' + tc.offSet() +'px,0); ransform:translate3d(0,-' + tc.offSet() +'px,0);}';

				if ( $('#app-styles').length === 0 ) {
					$('body').append('<style id="app-styles">' + css + '</style>');
				} else {
					$('#app-styles').html(css);
				}
			},
			initiateResizeListener: function() {
				$(window).resize(function() {
					tc.setAppStyles();
				});
			},
			isOpen: function() {
				if (tc.menuState === 'open' ) { return true; }
				else { return false; }
			},
			showMenu: function() {
				$('#anatomy_slider').addClass('open');
			},
			hideMenu: function() {
				$('#anatomy_slider').removeClass('open');
			},
			addAnimations: function(speed) {
				var css = '#anatomy_slider{-webkit-transition: all ' + speed + 's;-moz-transition: all ' + speed + 's;transition:all ' + speed + 's;}';
				$('body').append('<style id="animations">' + css + '</style>');
			},
			removeAnimations: function(speed) {
				setTimeout(function() {
					$('#animations').remove();
				}, (speed * 1000) );
			},
			openMenu: function(speed) {
				tc.addAnimations(speed);
				tc.showMenu();
				tc.removeAnimations(speed);
				tc.menuState = 'open';
			},
			closeMenu: function(speed) {
				tc.addAnimations(speed);
				tc.hideMenu();
				tc.removeAnimations(speed);
				tc.menuState = 'closed';
			},
			triggerMenu: function() {
				if (tc.menuState === 'open') { tc.closeMenu(tc.speed); }
				else { tc.openMenu(tc.speed); }
			},
			flipCard: function(target) {
				var $parCard = $(target).closest('.card');
				$parCard.toggleClass('flipped');
			},
			isMenuTrigger: function(target) {
				var triggers = $('.menu-btn, #all-cards');
				if ( target.closest(triggers).length ) { return true; }
				else { return false; }
			},
			isFlipTrigger: function(target) {
				if ( target.closest('.card-body').length ) { return true; }
				else { return false; }
			},
			initiateClickListeners: function() {
				$('body').on( 'click', function(e) {
					var target = $(e.target);
					if ( tc.isMenuTrigger(target) ) {
						tc.triggerMenu(0.5);
					} else if ( tc.isFlipTrigger(target) ) {
						if ( tc.menuState === 'closed'){
							tc.flipCard(target);
						} else {
							tc.closeMenu(0.5);
						}
					}
				});
			},
			initiateTouchListeners: function() {
				var touch, yOrg, yCur, yDif, yDis, yEnd, transDis;
				var offSetHalf	= tc.offSet() * 0.5;
				var speedHalf = tc.speed * 0.5;

				$('.menu-btn').on('touchstart', function(e) {

					touch = event.touches[0];
					yOrg = touch.pageY;
					yCur = yOrg;

					e.preventDefault();
				});

				$('.menu-btn').on('touchmove', function(e){

					touch	= event.touches[0];
					yCur	= touch.pageY;
					yDif	= (yCur - yOrg);

					if (yDif > 0) {
						yDis		= yDif;
						transDis	= 'translate3d(0,-' + (tc.offSet() - yDis) + 'px,0)';
					} else {
						yDis		= (yDif * -1);
						transDis	= 'translate3d(0,-' + yDis + 'px,0)';
					}

					if (yCur < tc.offSet() && yDif > 0 && tc.menuState === 'open') {
						$('#anatomy_slider').css('-webkit-transform',transDis);
					} else if (yDif < 0 && yCur > (tc.vpHeight() - tc.offSet()) && tc.menuState === 'closed') {
						$('#anatomy_slider').css('-webkit-transform',transDis);
					}

					e.preventDefault();
				});

				$('.menu-btn').on('touchend', function(){
					yEnd = yCur;

					if( yEnd === yOrg && tc.menuState === 'closed'){
						$('#anatomy_slider').removeAttr('style');
						tc.openMenu(tc.speed);
					} else if( yEnd === yOrg && tc.menuState === 'open' ){
						$('#anatomy_slider').removeAttr('style');
						tc.closeMenu(tc.speed);
					} else {

						if(yCur < offSetHalf) {
							$('#anatomy_slider').removeAttr('style');
							tc.openMenu(speedHalf);
						} else {
							$('#anatomy_slider').removeAttr('style');
							tc.closeMenu(speedHalf);
						}
					}
				});
			},

			//initiate
			init: function() {
				tc.setAppStyles();
				tc.initiateResizeListener();
				tc.initiateClickListeners();
				tc.initiateTouchListeners();
				setTimeout(function() {
					tc.openMenu(0.5);
				}, 300);
			}
		};

		return {
			on: tc.init,
			trigger: tc.triggerMenu,
			open: tc.openMenu,
			close: tc.closeMenu
		};
	};

})(jQuery);


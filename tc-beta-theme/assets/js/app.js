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
				$('.main').height( tc.vpHeight() );
			},
			setCharMargin: function() {
				var margTop	= (tc.vpHeight() > 300) ? ( tc.vpHeight() - 300 ) * 0.5 : 0;
				$('.character').css('margin-top', margTop);
			},
			setAppStyles: function() {
				var css = '.main{height:' + tc.vpHeight() +'px;} .character{margin-top:' + tc.margTop() + 'px;}';

				if ( $('#app-styles').length === 0 ) {
					$('head').append('<style id="app-styles">' + css + '</style>');
				} else {
					$('#app-styles').html(css);
				}
			},
			initiateResizeListener: function() {
				$(window).resize(function() {
//					tc.setCardHeight();
//					tc.setCharMargin();
					tc.setAppStyles();
				});
			},
			isOpen: function() {
				if (tc.menuState === 'open' ) { return true; }
				else { return false; }
			},
			showMenu: function(speed) {
				var animations = tc.addAnimations(speed);
				var translate = tc.translateOpen();
				$('#anatomy_slider').attr('style', translate + animations);
			},
			hideMenu: function(speed) {
				var animations = tc.addAnimations(speed);
				var translate = tc.translateClosed();
				$('#anatomy_slider').attr('style', translate + animations);
			},
			addAnimations: function(speed) {
				return '-webkit-transition: all ' + speed + 's;-moz-transition: all ' + speed + 's;transition:all ' + speed + 's;';
			},
			translateOpen: function() {
				return '-webkit-transform:translate3d(0,-' + tc.offSet() +'px,0); -moz-transform:translate3d(0,-' + tc.offSet() +'px,0); transform:translate3d(0,-' + tc.offSet() +'px,0);';
			},
			translateClosed: function() {
				return '-webkit-transform:translate3d(0,0,0); -moz-transform:translate3d(0,0,0); transform:translate3d(0,0,0);';
			},
			removeAnimations: function(speed) {
				var translate = ( tc.menuState === 'open' ) ? tc.translateOpen() : tc.translateClosed();
				setTimeout(function() {
					$('#anatomy_slider').attr('style', translate);
				}, (speed * 1000) );
			},
			openMenu: function(speed) {
				tc.menuState = 'open';
				tc.showMenu(speed);
				tc.removeAnimations(speed);
			},
			closeMenu: function(speed) {
				tc.menuState = 'closed';
				tc.hideMenu(speed);
				tc.removeAnimations(speed);
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
						e.preventDefault();
						tc.triggerMenu(0.5);
					} else if ( tc.isFlipTrigger(target) ) {
						e.preventDefault();

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
					var css;

					if (yDif > 0) {
						yDis		= yDif;
						transDis	= 'translate3d(0,-' + (tc.offSet() - yDis) + 'px,0)';
					} else {
						yDis		= (yDif * -1);
						transDis	= 'translate3d(0,-' + yDis + 'px,0)';
					}

					if (yCur < tc.offSet() && yDif > 0 && tc.menuState === 'open') {
						css = '-webkit-transform:' + transDis + '; -moz-transform:' + transDis + '; ransform:' + transDis + ';';
						$('#anatomy_slider').attr('style', css);
					} else if (yDif < 0 && yCur > (tc.vpHeight() - tc.offSet()) && tc.menuState === 'closed') {
						css = '-webkit-transform:' + transDis + '; -moz-transform:' + transDis + '; ransform:' + transDis + ';';
						$('#anatomy_slider').attr('style', css);
					}

					e.preventDefault();
				});

				$('.menu-btn').on('touchend', function(){
					yEnd = yCur;

					if( yEnd === yOrg && tc.menuState === 'closed'){
						tc.openMenu(tc.speed);
					} else if( yEnd === yOrg && tc.menuState === 'open' ){
						tc.closeMenu(tc.speed);
					} else {

						if(yCur < offSetHalf) {
							tc.openMenu(speedHalf);
						} else {
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


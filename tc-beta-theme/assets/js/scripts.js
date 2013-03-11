$(document).ready(function(){

/* Setup Layout for viewport size */

var slideOffset = function(vpHeight) {
	var offset = vpHeight * 0.85;
	var css = '#slider.inactive { -webkit-transform:translate3d(0,-' + offset +'px,0); -moz-transform:translate3d(0,-' + offset +'px,0)}';
	var head = document.getElementsByTagName('head')[0];
	var style = document.createElement('style');

	style.type = 'text/css';
	if (style.styleSheet){
	style.styleSheet.cssText = css;
	} else {
	style.appendChild(document.createTextNode(css));
	}

	head.appendChild(style);
};

var cardHeight = function() {
	var vpHeight = $(window).height();

	$('.main').height(vpHeight);
	slideOffset(vpHeight);
};

var charMargin = function() {
	var vpHeight	= $(window).height();
	var margTop		= (vpHeight - 300) * 0.5;
	if (vpHeight > 300) { //max .character height + .card-body padding
		$('.character').css('margin-top', margTop);
	}
	else { // no margin if .character is less than 100% in height
		$('.character').css('margin-top', 0);
	}
};

cardHeight();
charMargin();

/*
$(window).bind( 'orientationchange', function(e){
	cardHeight();
	cardWidth();
	charMargin();
});
*/

$(window).resize(function() {
	cardHeight();
	charMargin();
});

$('.card-body').on('click', function() {
	var $parCard = $(this).closest('.card');

	if ( $('#slider').hasClass('inactive') ) {
		$('#slider').removeClass('inactive');
	} else {
		$parCard.toggleClass('flipped');
		$parCard.find('.card-back').toggleClass('hidden visible');
	}
});

$('.menu-btn').on('click', function() {
	$('#slider').toggleClass('inactive');
	return false;
});

$('#slider.inactive').on('click', function() {
	$(this).removeClass('inactive');
	return false;
});

$('.shortcut').on('click', function() {
//	var slides = '.card-holder';
//	var $parSlide = $(this).parents(slides);
	$('#slider').removeClass('inactive');
//	$(slides).removeClass('on');
//	$parSlide.addClass('on');

//	var skipTo = $(this).attr('id');
//	mySwipe.slide(skipTo, 400);

//	return false;
});

$('.instructions .dismiss').on('click', function() {
	$.cookie('dismissInstructions', 1, { expires: 365 });
	$(this).parents('.instructions').toggleClass('hidden');
}).bind('tap', function(event){
	event.stopPropagation();
});

$('.phone').mouseenter(function() {
	$('.card-nav').addClass('active');
}).mouseleave(function() {
	$('.card-nav').removeClass('active');
});

});
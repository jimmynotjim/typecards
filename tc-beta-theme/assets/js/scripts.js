$(document).ready(function(){

var vpHeight	= $(window).height();
var offSet		= (vpHeight < 600) ? vpHeight * 0.85 : vpHeight * 0.90;

/* Setup Layout for viewport size */

var slideOffset = function() {
	var css = '#anatomy_slider.inactive { -webkit-transform:translate3d(0,-' + offSet +'px,0); -moz-transform:translate3d(0,-' + offSet +'px,0)}';
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
	$('.main').height(vpHeight);
	slideOffset();
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
	vpHeight	= $(window).height();
	offSet		= (vpHeight < 600) ? vpHeight * 0.85 : vpHeight * 0.90;
	cardHeight();
	charMargin();
});

$('.card-body').on('click', function() {
	var $parCard = $(this).closest('.card');

	if ( $('#anatomy_slider').hasClass('inactive') ) {
		$('#anatomy_slider').removeClass('inactive');
	} else {
		$parCard.toggleClass('flipped');
		$parCard.find('.card-back').toggleClass('hidden visible');
	}
});
/*
$('.shortcut').on('click', function() {
//	var slides = '.card-holder';
//	var $parSlide = $(this).parents(slides);
//	$(slides).removeClass('on');
//	$parSlide.addClass('on');

//	var skipTo = $(this).attr('id');
//	mySwipe.slide(skipTo, 400);

//	return false;
});
*/
$('.instructions .dismiss').on('click', function() {
	$.cookie('dismissInstructions', 1, { expires: 365 });
	$('.instructions').toggleClass('hidden');
}).bind('tap', function(event){
	event.stopPropagation();
});

$('.terms-nav .dismiss').on('click', function() {
	$('.terms-nav').toggleClass('hidden');
});

$('#search-terms').on('click', function() {
	$('.terms-nav').toggleClass('hidden');
});

$('.phone').mouseenter(function() {
	$('.card-nav').addClass('active');
}).mouseleave(function() {
	$('.card-nav').removeClass('active');
});

var touch, yOrg, yCur, yDif, yDis, yEnd, transDis;
var offSetHalf	= offSet * 0.5;
var transOpen	= 'translate3d(0,-' + offSet + 'px,0)';
var transClosed = 'translate3d(0,0,0)';
var speedSet	= 500;
var speed		= speedSet + 'ms';
var hfSpeed		= (speedSet * 0.5) + 'ms';
var navOpen		= true;

$('.menu-btn, #all-cards, .shortcut').on('click', function() {
	if (navOpen === true) {
        $('#anatomy_slider').css('-webkit-transform',transClosed).css('-webkit-transition',speed).removeClass('inactive');
        navOpen = false;
	} else {
        $('#anatomy_slider').css('-webkit-transform',transOpen).css('-webkit-transition',hfSpeed).addClass('inactive');
        navOpen = true;
	}
	return false;
});

$('.shortcut').on('click', function() {
	$('.terms-nav').addClass('hidden');
});

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
		transDis	= 'translate3d(0,-' + (offSet - yDis) + 'px,0)';
	} else {
		yDis		= (yDif * -1);
		transDis	= 'translate3d(0,-' + yDis + 'px,0)';
	}

	if (yCur < offSet && yDif > 0 && navOpen === true) {
		$('#anatomy_slider').css('-webkit-transform',transDis);
	} else if (yDif < 0 && yCur > (vpHeight - offSet) && navOpen === false) {
		$('#anatomy_slider').css('-webkit-transform',transDis);
	}

	e.preventDefault();
});

$('.menu-btn').on('touchend', function(){
    yEnd = yCur;

    if( yEnd === yOrg && navOpen === false ){
        $('#anatomy_slider').css('-webkit-transform',transOpen).css('-webkit-transition',speed).addClass('inactive');
        navOpen = true;
    } else if( yEnd === yOrg && navOpen === true ){
        $('#anatomy_slider').css('-webkit-transform',transClosed).css('-webkit-transition',speed).removeClass('inactive');
        navOpen = false;
    } else {

        if(yCur < offSetHalf) {
            $('#anatomy_slider').css('-webkit-transform',transOpen).css('-webkit-transition',hfSpeed).addClass('inactive');
            navOpen = true;
        } else {
            $('#anatomy_slider').css('-webkit-transform',transClosed).css('-webkit-transition',hfSpeed).removeClass('inactive');
            navOpen = false;
        }
    }
});

$('#anatomy_slider').on('webkitTransitionEnd', function() {
    $('.touch #anatomy_slider').css('-webkit-transition', '0');
});

});
jQuery.event.special.tap = {
	setup: function (a, b) {
		var c = this,
			d = jQuery(c);
		if (window.Touch) {
			d.bind("touchstart", jQuery.event.special.tap.onTouchStart);
			d.bind("touchmove", jQuery.event.special.tap.onTouchMove);
			d.bind("touchend", jQuery.event.special.tap.onTouchEnd);
		} else {
			d.bind("click", jQuery.event.special.tap.click);
		}
	},
	click: function (a) {
		a.type = "tap";
		jQuery.event.handle.apply(this, arguments);
	},
	teardown: function (a) {
		if (window.Touch) {
			$elem.unbind("touchstart", jQuery.event.special.tap.onTouchStart);
			$elem.unbind("touchmove", jQuery.event.special.tap.onTouchMove);
			$elem.unbind("touchend", jQuery.event.special.tap.onTouchEnd);
		} else {
			$elem.unbind("click", jQuery.event.special.tap.click);
		}
	},
	onTouchStart: function (a) {
		this.moved = false;
	},
	onTouchMove: function (a) {
		this.moved = true;
	},
	onTouchEnd: function (a) {
		if (!this.moved) {
			a.type = "tap";
			jQuery.event.handle.apply(this, arguments);
		}
	}
};


$(document).ready(function(){

// Truncate long links
// Borrowed From http://jsfiddle.net/vsujC/
// --------------------------------------------------------
$('.ref-link').text(function(index, oldText) {
	if (oldText.length > 32) {
		return oldText.substring(0, 32) + '...';
	}
	return oldText;
});

// Keep internal links in full screen mode, external links in Safari
// Borrowed From http://stackoverflow.com/a/7390672
// --------------------------------------------------------
/*
var a=document.getElementsByTagName("a");
for(var i=0;i<a.length;i++) {
	if(!a[i].onclick && a[i].getAttribute("target") != "_blank") {
		a[i].onclick=function() {
				window.location=this.getAttribute("href");
				return false;
		}
	}
}
 */

var cardHeight = function(){
	var vpHeight = $(window).height();

	$('.card-holder').height(vpHeight);
};

var cardWidth = function(){
	var vpWidth = $(window).width();

	$('.card-holder').width(vpWidth);
};

var charMargin = function(){
	var vpHeight = $(window).height();
	var margTop = (vpHeight - 300) * 0.5;
	if(vpHeight > 300) { //max .character height + .card-body padding
		$('.character').css('margin-top', margTop);
	}
	else { // no margin if .character is less than 100% in height
		$('.character').css('margin-top', 0);
	}
};

cardHeight();
//cardWidth();
charMargin();

/*
$(window).bind( 'orientationchange', function(e){
	cardHeight();
	cardWidth();
	charMargin();
});
*/
$(window).resize(function(){
	cardHeight();
	charMargin();
});

$('#slider li:nth-child(1), #slider li:nth-child(2)').addClass('on');

$('.card-body').bind('tap', function() {
	$(this).parents('.card').toggleClass('flipped');
	$(this).parents('.card').children('.card-back').toggleClass('hidden visible');
});
/*
$('.card-back.hidden').bind('touchstart', function(event) {
	event.preventDefault();
});
 */

$('a').bind('tap', function(event){
	event.stopPropagation();
});

/*
$('.menu-btn').click(function() {
//	$('.site-nav').toggleClass('inactive');
	$('.top-level-cards').toggleClass('inactive');
	return false;
});
 */

$('.instructions .dismiss').bind('tap', function() {
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
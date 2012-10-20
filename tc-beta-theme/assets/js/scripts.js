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

$('#slider li:nth-child(1), #slider li:nth-child(2)').addClass('on');

$('.card-body').click(function() {
	$(this).parents('.card').toggleClass('flipped');
//	$(this).parents('.card').children('.card-back').toggleClass('hidden visible');
});
/*
$('a').click(function(event){
	event.stopPropagation();
});


$('.menu-btn').click(function() {
//	$('.site-nav').toggleClass('inactive');
	$('.top-level-cards').toggleClass('inactive');
	return false;
});
 */

$('.dismiss').click(function() {
    $(this).parents('.instructions').toggleClass('hidden');
}).click(function(event){
    event.stopPropagation();
});

$('.phone').mouseenter(function() {
	$('.card-nav').addClass('active');
}).mouseleave(function() {
	$('.card-nav').removeClass('active');
});


});
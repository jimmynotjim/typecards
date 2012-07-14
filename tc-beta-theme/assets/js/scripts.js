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

var a=document.getElementsByTagName("a");
for(var i=0;i<a.length;i++) {
    if(!a[i].onclick && a[i].getAttribute("target") != "_blank") {
        a[i].onclick=function() {
                window.location=this.getAttribute("href");
                return false; 
        }
    }
}

$('.anatomy .card article').click(function() {
	$(this).parent().toggleClass('flipped');
	$(this).parent().children('.card-back').toggleClass('hidden visible');
});

$('a').click(function(event){
	event.stopPropagation();
});

$('.menu-btn').click(function() {
	$('.site-nav').toggleClass('inactive');
	$('.cards').toggleClass('inactive');
});

$('.phone').mouseenter(function() {
	$('.card-nav').addClass('active');
}).mouseleave(function() {
	$('.card-nav').removeClass('active');
})


// Swap Cards on tap/click **Removed in favor of CSS3 flip cards, may keep for older browsers**
/*$('.card-front').click(function() {
	$(this).toggle(0, function(){
		$(this).parent().children('.card-back').toggle(0);
	});
});

$('.card-back').click(function() {
	$(this).toggle(0, function(){
		$(this).parent().children('.card-front').toggle(0);
	});
});*/


});
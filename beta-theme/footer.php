	<!-- jquery -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	
	<!-- swipe.js -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/swipe.js"></script>
	<script>
		window.mySwipe = new Swipe(document.getElementById('slider'));
	</script>
	

	<!-- custom scripts -->
	<script src="<?php bloginfo( 'template_url' ); ?>/assets/js/scripts.js"></script>
	
	<!-- iOS - All Clicks (Full Screen) Stay in Full-Screen Mode) -->
	<script>
	(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")
	</script>
		
  <?php wp_footer(); ?>
  
</body>
</html>

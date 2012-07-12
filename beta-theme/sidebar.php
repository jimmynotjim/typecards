<aside id="sidebar">
	<?php if ( is_home() ) {
		include_once( 'includes/inc-fs-main.php' );
		include_once( 'includes/inc-fb-lb.php' );
	}
	
	elseif ( is_page( 'degrees' ) || is_page( 'answers' ) ) {
		include_once( 'includes/inc-w-main.php' );
		include_once( 'includes/inc-fs-sec.php' );
		include_once( 'includes/inc-news-list.php' );
		include_once( 'includes/inc-blog-list.php' );
	}
	
	elseif ( is_page( 'careers' ) ) {
		include_once( 'includes/inc-w-main.php' );
		include_once( 'includes/inc-fs-sec.php' );
		include_once( 'includes/inc-degree-list.php' );
		include_once( 'includes/inc-news-list.php' );
		include_once( 'includes/inc-blog-list.php' );
	}
	
	elseif ( is_page( 'blog' ) ) {
		//include_once( 'includes/inc-w-main.php' );
		include_once( 'includes/inc-career-list.php' );
		include_once( 'includes/inc-answer-list.php' );
		include_once( 'includes/inc-news-list.php' );
		include_once( 'includes/inc-fb-lb.php' );
	}
		
	elseif ( is_page( 'news' ) ) {
		include_once( 'includes/inc-w-main.php' );
		include_once( 'includes/inc-career-list.php' );
		include_once( 'includes/inc-answer-list.php' );
		include_once( 'includes/inc-blog-list.php' );
		include_once( 'includes/inc-fb-lb.php' );
	}
		
	elseif ( is_page( 'about' ) ) {
		//include_once( 'includes/inc-w-main.php' );
		include_once( 'includes/inc-career-list.php' );
		include_once( 'includes/inc-degree-list.php' );
		include_once( 'includes/inc-answer-list.php' );
	}
	
	elseif ( is_page( 'contact' ) ) {
		//include_once( 'includes/inc-w-main.php' );
		include_once( 'includes/inc-career-list.php' );
		include_once( 'includes/inc-answer-list.php' );
	}
	
	elseif ( is_404() ) {
		include_once( 'includes/inc-w-main.php' );
		include_once( 'includes/inc-degree-list.php' );
		include_once( 'includes/inc-career-list.php' );
		include_once( 'includes/inc-answer-list.php' );
		include_once( 'includes/inc-news-list.php' );
		include_once( 'includes/inc-blog-list.php' );
	}
	
	elseif ( is_single() ) {
		
		if ( is_singular( 'degrees' ) ) {
			include_once( 'includes/inc-w-main.php' );
			include_once( 'includes/inc-fs-sec.php' );
			include_once( 'includes/inc-degree-list.php' );
			include_once( 'includes/inc-news-list.php' );
			include_once( 'includes/inc-blog-list.php' );
		}
		
		elseif ( is_singular( 'careers' ) ) {
			include_once( 'includes/inc-w-main.php' );
			include_once( 'includes/inc-fs-sec.php' );
			include_once( 'includes/inc-career-list.php' );
			include_once( 'includes/inc-news-list.php' );
			include_once( 'includes/inc-blog-list.php' );
		}
		
		elseif ( is_singular( 'answers' ) ) {
			include_once( 'includes/inc-w-main.php' );
			include_once( 'includes/inc-fs-sec.php' );
			include_once( 'includes/inc-degree-list.php' );
			include_once( 'includes/inc-news-list.php' );
			include_once( 'includes/inc-blog-list.php' );
		}
		
		else {
			//include_once( 'includes/inc-w-main.php' );
			include_once( 'includes/inc-career-list.php' );
			include_once( 'includes/inc-answer-list.php' );
			include_once( 'includes/inc-news-list.php' );
			include_once( 'includes/inc-fb-lb.php' );
		}
	}
	
	else { 
		include_once( 'includes/inc-w-main.php' );
		include_once( 'includes/inc-fs-sec.php' );
		include_once( 'includes/inc-news-list.php' );
		include_once( 'includes/inc-blog-list.php' );
	}
	?>
</aside><!--sidebar-->
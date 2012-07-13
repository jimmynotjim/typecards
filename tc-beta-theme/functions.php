<?php

// BEGIN: Output reference links from custom metabox
// ---------------------------------------------------------

/*if(!function_exists('the_refrence_links')){

	function the_refrence_links(){

		$link_string = get_post_meta($post->ID, 'linkslist', true);

		$links_array = explode(',', $link_string);

		$output = '<ul>';

		foreach($links_array as $link):

			$output ,= '<li><a href="' .$link .'">' .$link .'</a></li>';

		endforeach;

		$output .= '</ul>';

		echo $output;

	}

}*/


/* BEGIN: Add Current Page to body class
   ---------------------------------------------------------------------------------------------------- */

function page_bodyclass() {  // add class to <body> tag
	global $wp_query;
	$page = '';
	if (is_front_page() ) {
    	   $page = 'home';
	} elseif (is_page()) {
   	   $page = $wp_query->query_vars["pagename"];
	}
	if ($page)
		echo 'class= "'. $page. '"';
}


/* BEGIN: Add category nicenames in body and post class
   ---------------------------------------------------------------------------------------------------- */
function category_id_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category)
		$classes[] = $category->category_nicename;
	return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');


/* =BEGIN: Add Class to first Paragraph in WordPress the_content();
    Source: http://webdevbits.com/wordpress/add-class-to-first-paragraph-in-wordpress-the_content/
   ---------------------------------------------------------------------------------------------------- */
function first_paragraph($content){
  // Testing to see if the content is a Page or Custom Post Type of school, if so, display the text normally (without the class = intro).
  if ( is_page('intro') || ('school' == get_post_type() ) ) {
    return preg_replace('/<p([^>]+)?>/', '<p$1>', $content, 1);
  } else {
    return preg_replace('/<p([^>]+)?>/', '<p$1 class="intro">', $content, 1);
  }
}
add_filter('the_content', 'first_paragraph');


 /* BEGIN: Sidbars
   ---------------------------------------------------------------------------------------------------- */

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Pages',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}


 /* BEGIN: Custom Menus
   ---------------------------------------------------------------------------------------------------- */

add_theme_support( 'menus' );

 /* BEGIN: Add class to excerpt
   ---------------------------------------------------------------------------------------------------- */


function add_class_to_excerpt( $excerpt ) {
    return str_replace('<p', '<p class="meta excerpt"', $excerpt);
}
add_filter( 'the_excerpt', 'add_class_to_excerpt' );


 /* BEGIN: Remove brakcets from ellipse and add custom read more link
   ---------------------------------------------------------------------------------------------------- */

function excerpt_ellipse($text) {
	return str_replace('[...]', '&#8230; <a href="'. get_permalink().'" class="more">Read More</a>', $text);
}
add_filter('get_the_excerpt', 'excerpt_ellipse');


 /* BEGIN: Add next and prev classes to previous/next post links
   ---------------------------------------------------------------------------------------------------- */

function add_class_prev_link($class) {
	return str_replace('<a', '<a class="prev"', $class);
}
add_filter('previous_post_link', 'add_class_prev_link');

function add_class_next_link($class) {
	return str_replace('<a', '<a class="next"', $class);
}
add_filter('next_post_link', 'add_class_next_link');

 /* BEGIN: Add Post Thumbnails
   ---------------------------------------------------------------------------------------------------- */

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50, true );
add_image_size( 'lg', 640, 640, true );
add_image_size( 'sm', 320, 320, true );


 /* BEGIN: Catch the First Image in a Post
   ---------------------------------------------------------------------------------------------------- */
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = bloginfo( 'template_url' ) .'/assets/img/logo-ghost-lg.png';
  }
  return $first_img;
}
 

/* BEGIN: Old User Avatar
	Avatars must be 127x127 and placed in the *themes/ht-theme/assets/img/authors* directory
	When calling make sure to include a user ID or variable to pull it from the loop
   ---------------------------------------------------------------------------------------------------- */
   
function old_avatar($ID) {
$user = get_userdata($ID);
$img_name = $user->nickname;

if ( '' != locate_template( 'assets/img/authors/'.$img_name.'.jpg' ) ) {
	echo '<img src="'.get_bloginfo( "template_url" ).'/assets/img/authors/'.$img_name.'.jpg" />';
}

else { echo '<img src="'.get_bloginfo( "template_url" ).'/assets/img/authors/missing.jpg" />';
}

}

/* End Old User Avatar */


/* BEGIN: List of Contributors w/ avatars
   ---------------------------------------------------------------------------------------------------- */

function contributors() {

$args = array(
	'number' 		=> '8',
	'orderby'		=> 'display_name',
	'order'			=> 'ASC',
	'role'			=> 'author',
);

$authors = get_users( $args );

foreach($authors as $author) {

echo "<li>";
echo "<a href=\"".get_bloginfo('url')."/author/";
echo $author->user_nicename;
echo "\">";
user_avatar( $author->ID );
echo "</a>";
echo "<h2>";
echo "<a href=\"".get_bloginfo('url')."/author/";
echo $author->user_nicename;
echo "\">";
the_author_meta('display_name', $author->ID);
echo "</a>";
echo "</h2>";
echo "</li>";
}
}

/* End Contributors */


/* BEGIN: Pagination
   ---------------------------------------------------------------------------------------------------- */

function pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

	if(1 != $pages) {
		 echo '<div class="pagination">';
	     if($paged > 1 /* && $showitems < $pages // Disabled the secondary check to force the link to be displayed. */) echo '<a href="'.get_pagenum_link($paged - 1).'" class="prev">Previous</a>';
	     if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<a href="'.get_pagenum_link(1).'" class="page-numbers">1</a> <span class="more">…</span>';
	
	     for ($i=1; $i <= $pages; $i++)
	     {
	         if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
	         {
	             echo ($paged == $i)? '<span class="page-numbers current">'.$i.'</span>':'<a href="'.get_pagenum_link($i).'" class="page-numbers">'.$i.'</a>'; // This line displays the page number links
	         }
	     }

	     if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<span class="more">…</span> <a href="'.get_pagenum_link($pages).'" class="page-numbers">'.$pages.'</a>';
	     if ($paged < $pages /* && $showitems < $pages // Disabled the secondary check to force the link to be displayed. */) echo '<a href="'.get_pagenum_link($paged + 1).'" class="next">Next</a>';
	     echo '</div>';
	}
}

/* End Pagination */


/* BEGIN: Include external function calls
   ---------------------------------------------------------------------------------------------------- */

require_once ( get_template_directory() . '/user_avatar.php' );
require_once ( get_template_directory() . '/cpt_anatomy.php' );
require_once ( get_template_directory() . '/cpt_color.php' );

/* End External Functions */


?>
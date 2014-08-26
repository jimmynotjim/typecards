<?php

/* Disable WordPress Admin Bar for all users but admins. */
if (!current_user_can('administrator')):
  show_admin_bar(false);
endif;


/* BEGIN: Remove wlwmanifest and rsd
  ------------------------------------------------------------------------------------------------------ */

remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');


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


 /* BEGIN: Add Post Thumbnails
   ---------------------------------------------------------------------------------------------------- */

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50, true );
add_image_size( 'lg', 512,512, true );
add_image_size( 'sm', 258,258, true );


/* BEGIN: Include external function calls
   ---------------------------------------------------------------------------------------------------- */

require_once ( get_template_directory() . '/cpt_anatomy.php' );
require_once ( get_template_directory() . '/cpt_quizes.php' );
require_once ( get_template_directory() . '/json_function.php' );

/* End External Functions */


?>
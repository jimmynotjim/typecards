<?php
function json_function() {

	$a = array();
	$c = 0;
	$anatomyArgs = array(
		'post_type'			=> 'anatomy',
		'posts_per_page'	=> -1,
		'orderby'			=> 'title',
		'order'				=> 'ASC'
	);
	query_posts($anatomyArgs);
	if( have_posts() ) while( have_posts() ) : the_post();
	$title = strtolower( get_the_title() );
	$ID = get_the_ID();
	$aka = get_post_meta( $ID, 'anatomy-aka', true );
	$aka = str_replace('\'', '', $aka);
//	$altSpell = get_post_meta( $ID, 'anatomy-alt-spell', true );
//	$example = get_post_meta( $ID, 'anatomy-examples', true );
//	$references = get_post_meta( $ID, 'anatomy-references', true );
//	$refArray = explode( ',', $references );
	$akaArray = ( $aka != '' ) ? explode(', ', $aka) : '';
	$tokenArray = ( $aka != '' ) ? $akaArray : array();

		array_unshift( $tokenArray, $title ) ;
		$item = array('id' => $c,'value' => $title, 'tokens' => $tokenArray, 'aka' => $akaArray);
		array_push( $a, $item );
		$c++;

	endwhile;
	wp_reset_query();

	$json = json_encode($a);

	echo $json;
}
?>

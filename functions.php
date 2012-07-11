<?php

/**
 * Enqueues jQuery with the Basic Theme so that it's loaded on page request.
 */
function basic_add_jquery() {

	wp_enqueue_script( 'jquery' );	
	
} // end basic_remove_jquery
add_action( 'wp_enqueue_scripts', 'basic_add_jquery' );

/**
 * Writes a simple meta description to the head element using the description of the blog
 * specified in the 'General Settings.'
 */
function basic_meta_description() {
	
	echo '<meta name="description" content="' . get_bloginfo( 'description' ) . '" />';
	
} // end basic_meta_description
add_action( 'wp_head', 'basic_meta_description' );

?> 
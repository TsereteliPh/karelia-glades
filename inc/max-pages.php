<?php
add_action( 'wp_ajax_max_pages', 'max_pages' );
add_action( 'wp_ajax_nopriv_max_pages', 'max_pages' );
function max_pages() {
	$args = json_decode( stripslashes( $_POST['query'] ), true );

	$query = new WP_Query( $args );

	echo $query->max_num_pages;
	wp_die();
}

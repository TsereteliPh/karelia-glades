<?php
add_action( 'wp_ajax_load_cat', 'load_cat' );
add_action( 'wp_ajax_nopriv_load_cat', 'load_cat' );
function load_cat() {
	$args = json_decode( stripslashes( $_POST['query'] ), true );

	$query = new WP_Query( $args );

	$return_html = '';

	if ( $query->have_posts() ) {
		while( $query->have_posts() ) {
			$query->the_post();
			if ( $args['post_type'] == 'villas' ) {
				$return_html .= get_template_part('layouts/partials/cards/villa-card', null, array(
					'class' => 'villas__item'
				));
			}
		}

		wp_reset_postdata();
	}

	echo $return_html;
	wp_die();
}

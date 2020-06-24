<?php // Custom shortcodes for the file!

/* For page parents */
function post_categories_func( $atts ){
	$a = shortcode_atts( array(
        'post_type' => 'page'
    ), $atts );

    $taxonomy =  $a['post_type'] . '_taxonomy';
	$terms = get_terms( $taxonomy ); // Get all terms of a taxonomy

	if( is_wp_error($terms) )
    	return false;

	$content = '<ul class="category-list">';
		foreach($terms as $term):
			$content .= '<li><a class="btn btn-primary btn-lg" href="' . $term->slug . '">' . $term->name . '</a></li>';
		endforeach;
	$content .= '</ul>';

	return $content;
}
add_shortcode( 'post_category_list', 'post_categories_func' );

/* Shortcodes for. Quarterly Updates */


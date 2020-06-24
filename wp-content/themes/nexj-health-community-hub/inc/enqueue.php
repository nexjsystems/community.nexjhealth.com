<?php

/**
 * Enqueue scripts and styles.
 */
function nexj_health_third_party_scripts() {
	wp_enqueue_style( 'open-iconic-bootstrap', get_template_directory_uri() . '/assets/css/open-iconic-bootstrap.css', array(), 'v4.0.0', 'all' );
	
	wp_enqueue_style( 'bootstrap-4', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), 'v4.0.0', 'all' );
	
	wp_enqueue_style( 'wp-bootstrap-4-style', get_stylesheet_uri(), array(), '1.0.2', 'all' );

	wp_enqueue_style( 'prism', get_template_directory_uri() . '/assets/css/prism.css', array(), 'v4.0.0', 'all' );

	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.css', array(), 'v5.0.10', 'all' );

	//wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/assets/css/lightbox.min.css', array(), 'v5.0.10', 'all' );

	wp_enqueue_script( 'bootstrap-4-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), 'v4.0.0', true );

	wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), 'v4.0.0', true );

	wp_enqueue_script( 'prism-js', get_template_directory_uri() . '/assets/js/prism.js', array('jquery'), 'v4.0.0', true );

	wp_enqueue_script( 'theia-js', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.min.js', array('jquery'));


	wp_enqueue_script( 'fontawesome-js', get_template_directory_uri() . '/assets/js/fontawesome.min.js', array('jquery'));

	wp_enqueue_script( 'countdown-js', get_template_directory_uri() . '/assets/js/countdown.min.js', array('jquery'));

	wp_enqueue_script( 'resize-js', get_template_directory_uri() . '/assets/js/ResizeSensor.min.js', array('jquery'));

	//wp_enqueue_script( 'lightbox-js', get_template_directory_uri() . '/assets/js/lightbox.min.js', array('jquery'));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nexj_health_third_party_scripts' );

/**
 * Enqueue scripts and styles custom to this theme.
 */
function nexj_health_scripts() {
	
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), 'v1.0.0', 'all' );


	if ( 'documents' == get_post_type() )
		wp_enqueue_style( 'print_qu', get_template_directory_uri() . '/assets/css/print-qu.css', array(), 'v1.0.0', 'all' );


	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), 'v1.0.0', true );
}

add_action('wp_enqueue_scripts', 'nexj_health_scripts', 101);


/**
 * Registers an editor stylesheet for the theme.
 */
function wp_bootstrap_4_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'wp_bootstrap_4_add_editor_styles' );
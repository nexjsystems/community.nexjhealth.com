<?php

/* =================================================================== */
/* ======================== Custom Post Types ======================== */
/* =================================================================== */

function cptui_register_my_cpts() {

	/**
	 * Post Type: Snippets.
	 */

	/*$labels = array(
		"name" => __( "Snippets", "nh-documentaion" ),
		"singular_name" => __( "Snippet", "nh-documentaion" ),
	);

	$args = array(
		"label" => __( "Snippets", "nh-documentaion" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "snippet", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor" ),
		"taxonomies" => array( "snippets_taxonomy" ),
	);

	register_post_type( "snippets", $args ); */

	/**
	 * Post Type: FAQs.
	 */

	$labels = array(
		"name" => __( "FAQs", "nh-documentaion" ),
		"singular_name" => __( "FAQ", "nh-documentaion" ),
	);

	$args = array(
		"label" => __( "FAQs", "nh-documentaion" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "faq/%faqs_taxonomy%", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array( "faqs_taxonomy" ),
	);

	register_post_type( "faqs", $args );

	/**
	 * Post Type: Documents.
	 */

	$labels = array(
		"name" => __( "Documents", "nh-documentaion" ),
		"singular_name" => __( "Document", "nh-documentaion" ),
	);

	$args = array(
		"label" => __( "Documents", "nh-documentaion" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "document", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array( "documents_taxonomy" ),
	);

	register_post_type( "documents", $args );

	/**
	 * Post Type: Authoring Tools.
	 */

	$labels = array(
		"name" => __( "Build Programs", "nh-documentaion" ),
		"singular_name" => __( "Build Program", "nh-documentaion" ),
	);

	$args = array(
		"label" => __( "Build Programs", "nh-documentaion" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "build-program/%authoring_taxonomy%", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array( "authoring_taxonomy" ),
	);

	register_post_type( "authoring", $args );

	/**
	 * Post Type: Internal.
	 */

	$labels = array(
		"name" => __( "Internal", "nh-documentaion" ),
		"singular_name" => __( "Internal", "nh-documentaion" ),
	);

	$args = array(
		"label" => __( "Internal Pages", "nh-documentaion" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "internal", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array( "internal_taxonomy" ),
	);

	register_post_type( "internal", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

/* =================================================================== */
/* ======================== Custom Taxonomies ======================== */
/* =================================================================== */

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Snippet Types.
	 */

	/* $labels = array(
		"name" => __( "Snippet Types", "nh-documentaion" ),
		"singular_name" => __( "Snippet Type", "nh-documentaion" ),
	);

	$args = array(
		"label" => __( "Snippet Types", "nh-documentaion" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Snippet Types",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'snippets', 'with_front' => true,  'hierarchical' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "snippets_taxonomy",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "snippets_taxonomy", array( "snippets" ), $args ); */

	/**
	 * Taxonomy: FAQ Types.
	 */

	$labels = array(
		"name" => __( "FAQ Types", "nh-documentaion" ),
		"singular_name" => __( "FAQ Type", "nh-documentaion" ),
	);

	$args = array(
		"label" => __( "FAQ Types", "nh-documentaion" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "FAQ Types",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'faqs', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "faqs_taxonomy",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "faqs_taxonomy", array( "faqs" ), $args );

	/**
	 * Taxonomy: Document Types.
	 */

	$labels = array(
		"name" => __( "Document Types", "nh-documentaion" ),
		"singular_name" => __( "Document Type", "nh-documentaion" ),
	);

	$args = array(
		"label" => __( "Document Types", "nh-documentaion" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Document Types",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'documents', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "documents_taxonomy",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "documents_taxonomy", array( "documents" ), $args );

	/**
	 * Taxonomy: Authoring Tools.
	 */

	$labels = array(
		"name" => __( "Program Tools", "nh-documentaion" ),
		"singular_name" => __( "Program Tool", "nh-documentaion" ),
	);

	$args = array(
		"label" => __( "Program Tools", "nh-documentaion" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Authoring Tools",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'build-programs', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "authoring_taxonomy",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "authoring_taxonomy", array( "authoring" ), $args );

	/**
	 * Taxonomy: Internal Type.
	 */

	$internal = array(
		"name" => __( "Internal Types", "nh-documentaion" ),
		"singular_name" => __( "Internal Type", "nh-documentaion" ),
	);

	$args = array(
		"label" => __( "Internal Types", "nh-documentaion" ),
		"labels" => $internal,
		"public" => true,
		"hierarchical" => false,
		"label" => "Internal Types",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "internal_taxonomy",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "internal_taxonomy", array( "internal" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes' );


/* Update the Custom Post Type premalinks to include the taxonomies in the uri on a single page
https://wordpress.stackexchange.com/questions/108642/permalinks-custom-post-type-custom-taxonomy-post */
function wpa_cpt_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'faqs' ) {
        $terms = wp_get_object_terms( $post->ID, 'faqs_taxonomy' );
        if( $terms ){
            return str_replace( '%faqs_taxonomy%' , $terms[0]->slug , $post_link );
        }
    } else if ( is_object( $post ) && $post->post_type == 'authoring' ) {
        $terms = wp_get_object_terms( $post->ID, 'authoring_taxonomy' );
        if( $terms ){
            return str_replace( '%authoring_taxonomy%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'wpa_cpt_permalinks', 1, 2 );
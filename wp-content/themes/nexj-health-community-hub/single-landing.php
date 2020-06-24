<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * 
 * Template Name: Landing Page Template 
 * Template Post Type: internal 
 */

get_header('landing'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php get_template_part('template-parts/content-landing_single_view'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php
get_footer('landing');

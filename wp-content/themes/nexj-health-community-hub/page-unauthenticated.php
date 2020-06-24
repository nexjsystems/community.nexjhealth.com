<?php
/**
 * Template Name: Unauthenticated Page
 *
 * @package WordPress
 * @subpackage NexJ Health
 * @since NexJ Health 1.0
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

get_header('unauthenticated'); ?>

<div class="unauthenticated-container">

	<div class="background-content" style=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/guy.png"></div>

	<div class="form-page-content">
		<div class="form-header">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/NexJ Health Logo white.png">
			<h1>Welcome to the NexJ Health Community Hub</h1>
			<h2><?php echo get_the_title(); ?></h2>
		</div>
		<div class="form-content">
			<?php echo do_shortcode(get_field('short_code')); ?>
		</div>
	</div>

	<?php get_footer('unauthenticated');

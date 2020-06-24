<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-view'); ?>>
	<header class="entry-header">
		<div class="logo-container">
			<img src="<?php echo get_field('logo')['url']; ?>" class="logo">
		</div>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<img class="logo-light" src="<?php echo get_field('single_view_light_logo')['url']; ?>">
		<div class="entry-content-left table">
			<div class="table-row">
				<div class="table-cell bottom entry-content-interior">
					<h1 style="color: <?php echo get_field('primary_colour'); ?>;"><?php echo get_field('title'); ?></h1>
					<h2 style="color: <?php echo get_field('primary_colour'); ?>;"><?php echo get_field('single_view_subheader'); ?></h2>
					<p><?php echo get_field('side_content'); ?></p>
					<?php if (get_field('multiple_buttons')) {?>
						<div class="action-btns">
							<a href="<?php echo get_field('link'); ?>" class="btn" style="background-color: <?php echo get_field('primary_colour'); ?>;" target="_blank"><?php echo get_field('button_text'); ?></a>
							<a href="<?php echo get_field('link_two'); ?>" class="btn" style="background-color: <?php echo get_field('secondary_colour'); ?>;" target="_blank"><?php echo get_field('button_text_two'); ?></a>
						</div>
					<?php } else { ?>
						<a href="<?php echo get_field('link'); ?>" class="btn" style="background-color: <?php echo get_field('primary_colour'); ?>;" target="_blank"><?php echo get_field('button_text'); ?></a>
					<?php } ?>
				</div>
			</div>
			<footer class="table-row">
				<div class="table-cell bottom entry-footer" style="background-color: <?php echo get_field('secondary_colour'); ?>;">
					<p>Terms of Use  |  Privacy Policy</p>
					<p>Copyright © 2018. Powered by NexJ Connected Wellness</p>
				</div><!-- .entry-footer -->
			</footer>
		</div>
		<div class="entry-content-right">
			<div class="content-image" style="background-image: url(<?php echo get_field('single_view_background')['url']; ?>);"></div><!-- .entry-content -->
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

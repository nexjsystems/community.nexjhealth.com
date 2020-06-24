<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

?>

<script type="text/javascript">
	(function($){
		$(document).ready(function(){
			$('#input_3_53').val('<?php echo um_user('first_name') . " " . um_user('last_name'); ?>');
		});
	})(jQuery)
</script>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="hero-stripes">
		<div class="hero-stripe-bottom"></div>
		<div class="hero-stripe-top"></div>
	</div>
	<div class="form-container">
		<header class="entry-header">
			<img src="<?php echo get_template_directory_uri(); ?>/images/NexJ-Health-Logo-white.png" class="nav-logo-form" alt="NexJ Health Documentation" itemprop="logo">
			<h1>Dear <?php echo um_user('first_name'); ?>,</h1>
			<p>Thank you for giving us the opportunity to serve you better. Please help us by taking a few minutes to tell us about the service that you have received so far from the team at NexJ Health. We appreciate your business and want to make sure we meet your expectations.</p>
			<span class="signature">
				<p>Sincerely,</p>
				<p>NexJ Health Customer Success Team</p>
			</span>
		</header><!-- .entry-header -->
		<section class="entry-content">
			<?php the_content(); ?>
		</section><!-- .entry-content -->
	</div><!-- .form-container -->
</article><!-- #post-<?php the_ID(); ?> -->

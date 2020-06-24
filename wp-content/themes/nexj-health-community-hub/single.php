<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * 
 * Template Post Type: faqs, snippets
 * @package WP_Bootstrap_4
 */

get_header(); ?>

<?php
	$default_sidebar_position = get_theme_mod( 'default_sidebar_position', 'right' );
?>

	<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?php echo the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>

	<div class="fixed-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?php echo the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
				<div class="col-md-9 wp-bp-content-width">

				<div id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
					while ( have_posts() ) : the_post();
						switch (get_post_type()) {
							case 'faqs':
								get_template_part( 'template-parts/content-faq' );
								break;
							default:
								(wp_get_post_terms($post->ID, 'authoring_taxonomy')[0]->slug != 'workbook-html-snippets')?
									get_template_part( 'template-parts/content', get_post_type() ):
										get_template_part( 'template-parts/content-snippet' );
								break;
						}

					endwhile; // End of the loop.
					?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<!-- /.col-md-9 -->

			<div class="col-md-3 order-md-first wp-bp-sidebar-width stick">
				<aside id="secondary" class="category-sidebar-container">
					<?php _get_category_sidebar(get_post_type()); ?>
				</aside>
			</div>
			<!-- /.col-md-3 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->

	<!-- /.container -->
	<script type="text/javascript">
		(function($){
		    $(window).scroll(function () {
			    var scroll = $(window).scrollTop(),
			    	$title = $('.page-title'),
			    	titleHeight = $title.position()['top'] + $title.outerHeight(),
			    	$banner = $('.fixed-title');

			    if( ( titleHeight - scroll - 47 ) < 0 ){
			    	$banner.addClass('fixed-top');
			    } else {
			    	$banner.removeClass('fixed-top');
			    }
			});
		})(jQuery)
	</script>

<?php
get_footer();

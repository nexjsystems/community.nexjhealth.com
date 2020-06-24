<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

get_header(); ?>

	<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?php echo single_cat_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>

	<div class="fixed-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?php echo single_cat_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">

			<div class="col-md-9 wp-bp-content-width">
			
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<?php if(get_field('description', get_queried_object())) the_field('description', get_queried_object()); ?>

						<?php //$posts = count(get_posts()); wp_reset_query();?>

						<?php
						if ( have_posts() ) : 
							/* Start the Loop */ ?>

							<?php
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								/*(get_post_type() === 'post')?
									get_template_part( 'template-parts/content', get_post_format() ):
										get_template_part( 'template-parts/content', 'loop_custom');*/
								
								if(get_post_type() === 'post') {
									get_template_part( 'template-parts/content', get_post_format() );
								} else {
									get_template_part( 'template-parts/content', 'loop_custom');
								}

							endwhile;

							the_posts_navigation( array(
								'next_text' => esc_html__( 'Newer Posts', 'wp-bootstrap-4' ),
								'prev_text' => esc_html__( 'Older Posts', 'wp-bootstrap-4' ),
							) );

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
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

<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP_Bootstrap_4
 */

get_header(); ?>

	<div class="container">
		<div class="row">

			<div class="col-md-12 wp-bp-content-width">

				<section id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
					if ( have_posts() ) : ?>
						<div class="grid">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();


								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile; ?>
						</div>
						<div class="mt-3r">
							<?php
							the_posts_navigation( array(
								'next_text'         => esc_html__( 'Newer Posts', 'wp-bootstrap-4' ),
								'prev_text'         => esc_html__( 'Older Posts', 'wp-bootstrap-4' ),
							) );
							?>
						</div>
						<?php
					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

					</main><!-- #main -->
				</section><!-- #primary -->
			</div>
			<!-- /.col-md-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->

<?php
get_footer();

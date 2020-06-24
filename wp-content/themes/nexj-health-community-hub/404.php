<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_4
 */

get_header('404'); ?>

	<div class="background-content" style=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/guy.png"></div>

	<div class="solid-background-full table-full-height">
		<div class="table-full-height-center">

			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h1><span>Oops</span>... looks like nothing is here</h1>
						<div class="text">
						<?php if(is_user_logged_in()): ?>
							<p><a href="/">Click here</a> to make your way home</p>
							<?php if($_SERVER['HTTP_REFERER']): ?>
								<p>You can go back to the previous page by clicking <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">here</a></p>
							<?php endif; ?>
						<?php else: ?>
							<p><a href="<?php echo get_home_url(); ?>/login">Click here</a> to login in</p>
						<?php endif; ?>
						</div>
					</div>
					
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->

		</div>
	</div>
	<!-- /.solid-background-full -->
<?php
get_footer('404');

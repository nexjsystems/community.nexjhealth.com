<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

/* First find out how many sections there are and build an object holding
	- Section Names
	- 
 * Next set up the Intoduction
 * Iterate through the Index array that had been set up
 * Include the Background and Summary
 * Iterate through what was completed section
 * Iterate throug
 */

$data = [
	'current_quarter' 	=> get_field('current_quarter'),
	'current_year' 		=> get_field('year')
];

//Temp information processing
/*$data['current_quarter'] = get_field('current_quarter');
$data['current_year'] = get_field('year');
$following_year = get_field('year');*/

if( $data['current_quarter'][1] == '4' ) {
	$data['following_year'] = $data['current_year'] + 1;
	$data['next_quarter'] = 'Q1';
} else {
	$data['next_quarter'] = 'Q' . ($data['current_quarter'][1] + 1);
} ?>

<script type="text/javascript">

	(function($){

		$(document).ready(function(){

			//var offsetHeight = document.getElementById("pageNavigation").offsetTop;
			//track scrolling
			$('body').scrollspy({
			    target: '#pageNavigation',
			    offset: 52
			});
			// When the user scrolls the page, execute myFunction 
			window.onscroll = function() {myFunction()};

			 $("#pageNavigation a, .qu-index a").click(function (e){
			 	e.preventDefault();
			 	var div = $(this).attr('href');
                $('html, body').animate({
                    scrollTop: $(div).offset().top - 50
                }, 750);
            });

			$(".scroll-to-top").click(function (e){
			 	e.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 750);
            });

            $(document).scroll(function(e){
            	if( $(window).scrollTop() > $('#page-content').offset().top ) {
            		$(".scroll-to-top").addClass('scroll-visible');
            	} else {
            		$(".scroll-to-top").removeClass('scroll-visible');
            	}
            });

			// Get the navbar
			var navbar = document.getElementById("pageNavigation");
			// Get the content
			var content = document.getElementById("page-content");

			// Get the offset position of the navbar
			var sticky = navbar.offsetTop;

			// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
			function myFunction() {
			  if (window.pageYOffset >= sticky) {
			    navbar.classList.add("fixed-top");
			    content.classList.add("stuck");
			  } else {
			    navbar.classList.remove("fixed-top");
			    content.classList.remove("stuck");
			  }
			}
		});
	})(jQuery)
	
</script>

<article id="post-<?php the_ID(); ?>" <?php post_class('quarterly-update'); ?>>
	<div class="update-body">
		<div class="scroll-to-top">
			<a href="#scroll-to-top">Back to Top</a>
		</div>
		<header class="entry-header">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="table-container">
							<div class="table-item">
								<img class="qu-header-img no-print" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Quarterly-Update-Graphic.png">
								<img class="qu-header-img print" src="<?php echo get_stylesheet_directory_uri(); ?>/images/NexJ Health Logo.png">
							</div>

							<div class="table-item">
								<h1>NexJ Connected Wellness</h1>
								<p><strong>New Features and Improvements</strong></p>
								<p>Delivered in <strong><?php echo $data['current_quarter'] . ' ' . $data['current_year'] ?></strong> and Planned for <strong><?php echo $data['next_quarter'] . ' ' . $data['following_year']; ?></strong></p>
							</div>
						</div>
					</div>
				</div>
			</div>
				
		</header><!-- .entry-header -->

		<nav id="pageNavigation" class="update-navigation navbar">
			<ul class="scroll-navigation list-inline ml-auto mr-auto">
		        <li class="list-inline-item nav-item">
		            <a class="nav-link" href="#index_0">Index</a>
		        </li>
		        <li class="list-inline-item nav-item">
		            <a class="nav-link" href="#background_1">Background</a>
		        </li>
		        <li class="list-inline-item nav-item">
		            <a class="nav-link" href="#executive-summary_2">Executive Summary</a>
		        </li>
		        <li class="list-inline-item nav-item">
		            <a class="nav-link" href="#delivered_3">Delivered</a>
		        </li>
		        <li class="list-inline-item nav-item">
		            <a class="nav-link" href="#scheduled_4">Scheduled</a>
		        </li>
		    </ul>
	    </nav>

		<div class="page-break"></div> <!-- .pagebreak -->

		<div id="page-content" class="entry-content">

			<div class="container">
				<div class="row">

					<section id="index_0" class="qu-index section-qu col-md-12">
						<?php _quarterly_update_index( get_field('section_delivered'), get_field('section_scheduled'), $data ); ?>
					</section>

					<div class="page-break"></div> <!-- .pagebreak -->

					<section id="background_1" class="section-one section-qu col-md-12">
						<h2 class="section-title">1. Background</h2>
						<?php echo get_field('content_background'); ?>
					</section>

					<div class="page-break"></div> <!-- .pagebreak -->

					<section id="executive-summary_2" class="section-two section-qu col-md-12">
						<h2 class="section-title">2. Executive Summary</h2>
						<?php echo get_field('content_summary'); ?>
					</section>

					<div class="page-break"></div> <!-- .pagebreak -->

					<section id="delivered_3" class="section-three section-qu col-md-12">
						<h2 class="section-title">3. DELIVERED IN <?php echo $data['current_quarter'] ?> <?php echo $data['current_year']; ?></h2>
						<p><?php echo get_field('content_delivered'); ?></p>
						<?php /* Loop the first section */
						 _quarterly_update_section( get_field('section_delivered'), '3' );
						 ?>
					</section>

					<section id="scheduled_4" class="section-four section-qu col-md-12">
						<h2 class="section-title">4. SCHEDULED FOR <?php echo $data['next_quarter'] ?> <?php echo (empty($data['following_year']))? $data['current_year']: $data['following_year']; ?></h2>
						<p><?php echo get_field('content_scheduled'); ?></p>
						<?php /* Loop the first section */
						 _quarterly_update_section( get_field('section_scheduled'), '4' );
						 ?>
					</section>

				</div><!-- .row -->
			</div><!-- .container -->

		</div><!-- .entry-content -->
	</div>
	<!-- /.card-body -->

</article><!-- #post-<?php the_ID(); ?> -->

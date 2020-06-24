<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_4
 */

?>

	<?php if(!is_home() && !is_front_page()) echo '</div><!-- #content -->' ; ?>

	<footer id="colophon" class="site-footer">

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="table-container">
						<div class="table-item text-center">
							<img class="qu-footer-img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/NexJ Health Logo.png">
							<hr>
							<a href="https://www.nexjhealth.com" target="_blank">www.<strong>nexjhealth</strong>.com</a>
						</div>
						<div class="table-item">
							<h2>About NexJ Health Inc.</h2>
							<p>NexJ Health Inc. is a provider of participant-facing population health management
		 solutions that deliver participant engagement for chronic disease management. At NexJ
		 Health, we believe that the most efficient and cost-effective way to offset the rise in
		chronic disease is to empower participants, with the support of their families, friends,
		 and healthcare professionals, to actively participate in managing their own chronic
		 condition(s). By engaging participants through NexJ Connected Wellness, participants
		 are more likely to achieve their health goals, payers can lower costs, providers can
		 improve care to participants, and pharmaceutical manufacturers and pharmacies can
		 improve medication adherence.</p>
		 					<span class="text-muted">© <?php echo date('Y'); ?> NexJ Health Inc. All rights reserved. All trademarks are the property of their respective owners </span>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<!-- /.container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

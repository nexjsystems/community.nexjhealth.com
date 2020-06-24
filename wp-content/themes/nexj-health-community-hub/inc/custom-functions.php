<?php

function _snippet_modal($title, $img, $i) { ?>
<div class="modal fade" id="<?php echo strtolower( str_replace(' ', '_', $title) ) . '-' . $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $title; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<img src="<?php echo $img;?>" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<?php 
}

/* Custom Post Sorting
 * The point of this is to sort all posts in the required
 * and override any default query settings
 */
add_action( 'pre_get_posts', 'my_change_sort_order'); 
function my_change_sort_order($query){
	//Set the order ASC
   $query->set( 'order', 'ASC' );
	//Snippets order by title else by menu order
	(is_archive() && is_tax('snippets_taxonomy') || get_post_type() === 'snippets')?
		$query->set( 'orderby', 'title' ):
			$query->set( 'orderby', 'menu_order' );

   	//If Documents
   if(is_archive() && is_tax('documents_taxonomy')) {
   		$query->set( 'order', 'ASC' );
		$query->set( 'orderby', 'menu_order' );
   }
   		//echo '<h1>Working</h1>';
};

function _get_category_sidebar($tax) {
	$taxonomy =  $tax . '_taxonomy';
	$args = array( 'taxonomy' => $taxonomy );
	if( $tax == 'authoring') $args['orderby'] = 'term_order';

	$terms = get_terms( $args ); // Get all terms of a taxonomy 
	$categories =  wp_get_post_terms( get_the_ID(), $taxonomy); // Get the post category

	get_search_form();
	
	if ( $terms && !is_wp_error( $terms ) ) : ?>
	    <ul class="category-sidebar">
	        <?php foreach ( $terms as $term ) { ?>
	        	<?php
	        		$posts = null;
	        		$post_classes = array();
	        		$current_id = get_the_ID();
	        		if( $term->slug === $categories[0]->slug ):
	        			array_push ($post_classes, 'active');
			        	$args = array(
							'post_type' => get_post_type(),
							'tax_query' => array(
								array(
									'taxonomy' 	=> $taxonomy,
									'field'    	=> 'slug',
									'terms'		=> $term->slug
								),
							),
							'posts_per_page' => -1
						);

						$query = new WP_Query( $args );

						if ( $query->have_posts() ) :
							$posts = '<ul class="category_sidebar_posts">';
							while ( $query->have_posts() ) : $query->the_post();
								if(get_field('skip')) continue;
	        					$category_classes = array();
								if(get_the_ID() == $current_id && is_single()) array_push ($category_classes, 'active');
		            			$posts = $posts . '<li class="' . implode(" ", $category_classes) . '"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
		            		endwhile;
		            		$posts = $posts . '</ul>';
		            	endif; 

	        			wp_reset_query();
					endif;
				?>
	            <li class="<?php echo implode(" ", $post_classes) ?>" ><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a>
	            	<?php if($posts) echo $posts; ?>
	            </li>
	        <?php 
	    	} ?>
	    </ul>
	<?php endif;
}

function _quarterly_update_index($first, $second, $data) { ?>

	<ul>
		<li class="chapter"><a href="#background_1">1. Background</a></li>
		<li class="chapter"><a href="#executive-summary_2">2. Executive Summary</a></li>
		<li class="chapter"><a href="#delivered_3">3. DELIVERED IN <?php echo $data['current_quarter']; ?> <?php echo $data['current_year']; ?></a>
			<ul>
				<?php foreach( get_field('section_delivered') as $i => $section ):

				$i = $i + 1;
				$current_section = '3.' . $i . '.'; ?>
				<li class="sub-section"><a href="#<?php echo strtolower( str_replace ( ' ', '_', $section['title'] ) ) . '_' . str_replace ( '.', '_', $current_section); ?>"><?php echo $current_section; ?> <?php echo $section['title']; ?></a>
				<?php

				// add in the page content

				if( $section['sub-sections'] == 'true' ):?>
					<ul>
					<?php foreach( $section['sub-section'] as $j => $sub_section ):

						$j = $j + 1;
						$current_section = '3.' . $i . '.' . $j . '.';

						?>
						<li class="sub-section"><a href="#<?php echo strtolower( str_replace ( ' ', '_', $section['title'] ) ) . '_' . str_replace ( '.', '_', $current_section); ?>"><?php echo $current_section; ?> <?php echo $sub_section['title']; ?></a></li>
						<?php
					endforeach; ?>
					</ul>
				<?php endif;?>
				</li>
				<?php
			endforeach; ?>
			</ul>
		</li>

		<li class="chapter"><a href="#scheduled_4">4. SCHEDULED FOR <?php echo $data['next_quarter']; ?> <?php echo (empty($data['following_year']))? $data['current_year']: $data['following_year']; ?></a>
			<ul>
				<?php foreach( get_field('section_scheduled') as $i => $section ):

				$i = $i + 1;
				$current_section = '4.' . $i . '.'; ?>
				<li class="sub-section"><a href="#<?php echo strtolower( str_replace ( ' ', '_', $section['title'] ) ) . '_' . str_replace ( '.', '_', $current_section); ?>"><?php echo $current_section; ?> <?php echo $section['title']; ?></a>
				<?php

				// add in the page content

				if( $section['sub-sections'] == 'true' ):?>
					<ul>
					<?php foreach( $section['sub-section'] as $j => $sub_section ):

						$j = $j + 1;
						$current_section = '4.' . $i . '.' . $j . '.';

						?>
						<li class="sub-section"><a href="#<?php echo strtolower( str_replace ( ' ', '_', $section['title'] ) ) . '_' . str_replace ( '.', '_', $current_section); ?>"><?php echo $current_section; ?> <?php echo $sub_section['title']; ?></a></li>
						<?php
					endforeach; ?>
					</ul>
				<?php endif;?>
				</li>
				<?php
			endforeach; ?>
			</ul>
		</li>
	</ul>


	<?php return false;
}

function _quarterly_update_section($content, $number) {
	foreach($content as $i => $section ):
		$i = $i + 1;
		$current_section = $number . '.' . $i . '.';
		$parent_class = 'item-section item-section-qu item-parent-qu';
		if($i === 1) $parent_class = $parent_class . ' first-qu-item';
		?>
		<div id="<?php echo strtolower( str_replace ( ' ', '_', $section['title'] ) ) . '_' . str_replace ( '.', '_', $current_section ); ?>" class="<?php echo $parent_class; ?>">
			<div class="row">
				<div class="col-md-12">
					<h2><span style="font-weight: 400;"><?php echo $current_section; ?></span> <?php echo $section['title']; ?></h2>
				</div>
				<?php if($section['feature']): ?>
					<div class="col-md-12">
						<?php echo svg_icon($section['feature']);?>
					</div>
				<?php endif; ?>
				<?php if($section['capabilities']): ?>
					<div class="col-md-12">
						<div class="capabilities">
							<h3>New Capabilities Added:</h3>
							<?php echo $section['capabilities']; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div> 

		<?php // add in the page content

		if( $section['sub-sections'] == 'true' ):
			foreach( $section['sub-section'] as $j => $sub_section ):
				$j = $j + 1;
				if($j > 1) echo '<div class="page-break"></div> <!-- .pagebreak -->';
				$current_section = $number . '.' . $i . '.' . $j . '.'; ?>
					<div id="<?php echo strtolower( str_replace ( ' ', '_', $section['title'] ) ) . '_' . str_replace ( '.', '_', $current_section ); ?>" class="item-subsection item-section-qu item-child-qu">
						<div class="row">
							<div class="col-md-12">
								<h2><?php echo $current_section; ?>  <?php echo $sub_section['title']; ?></h2>
							</div>
							<?php if($sub_section['feature']): ?>
								<div class="col-md-12">
									<?php echo svg_icon($sub_section['feature']);?>
								</div>
							<?php endif; ?>
							<?php if($sub_section['capabilities']): ?>
								<div class="col-md-12">
									<div class="capabilities">
										<h3>New Capabilities Added:</h3>
										<?php echo $sub_section['capabilities']; ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php
			endforeach;
		endif; ?>
		<div class="page-break"></div> <!-- .pagebreak -->
	<?php endforeach;
	return false;
}

/* Overridden Functions */

function wp_bootstrap_4_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) { ?>

		<span class="cat-links">
			<span class="badge badge-light badge-pill"><?php the_category( '</span> <span class="badge badge-light badge-pill">' ); ?></span>
		</span>

	<?php } else {
		$tax = get_the_taxonomies();
		if(count($tax) > 0): ?>
			<span class="cat-links">
				<span class="badge badge-light badge-pill">
					<?php foreach($tax as $cat )
							echo str_replace(array('Types:', '>.'), array('-', '>'), $cat); ?>
				</span>
			</span>
		<?php endif;
	} ?>
	<span class="comments-link text-right"><a href="<?php the_permalink(); ?>">Continue to post</a></span>
	<?php 
}

function svg_icon($id) {
	$icon = _icon_map($id);
	$src = get_stylesheet_directory_uri() . '/assets/icons/' . $icon['img'];
	$content = '<div class="table-container">
					<div class="table-item">
						<div class="svg-icon">
								<img class="img-hex"
								src="' . $src . '.svg"
								alt="' . $icon['title'] . '">
						</div>
					</div>
					<div class="table-item table-item-middle">
						<p>' . $icon['description'] . '</p>
					</div>
				</div>';
	return $content;
}

function _icon_map($id = null) {

	$map = array(
		'1-ie' => array(
			'title' 		=> 'Interactive Education',
			'img'			=> '1-ie',
			'description'	=> 'With the NexJ Health Pro iPad app, use plain language infographic teaching decks with your patients to educate them about their condition and treatment options. After the visit, send the audio-visual record of the conversation to your patient so that they may refer to it and share with their Circle of Care.'
		),
		'1-hl' => array(
			'title' 		=> 'Health Library',
			'img'			=> '1-hl',
			'description'	=> 'Deliver trusted educational content to participants in the form of documents, videos, and hyperlinks using the Health Library. Participants can access this information to learn more about their condition or treatment.'
		),
		'1-wb' => array(
			'title' 		=> 'Workbooks',
			'img'			=> '1-wb',
			'description'	=> 'Workbooks deliver guided educational content in the form of interactive self- assessments, multi-media content, and links to external content. Participants can track as they complete steps and their Circle of Care can monitor their progress.'
		),
		'1-ms' => array(
			'title' 		=> 'Medical Summary',
			'img'			=> '1-ms',
			'description'	=> 'The Medical Summary provides an accurate and consolidated view of a participant’s health history and current health status to inform them about their health and condition.'
		),
		'1-pr' => array(
			'title' 		=> 'Profile',
			'img'			=> '1-pr',
			'description'	=> 'The Profile enables participants and Healthcare Professionals to share information about themselves including contact information, their bio, demographics, emergency contact, and other identifiable information.'
		),
		'1-pp' => array(
			'title' 		=> 'Personality Portrait',
			'img'			=> '1-pp',
			'description'	=> 'The Personality Portrait provides healthcare professionals the opportunity to gain insight about their participants’ personality traits, needs and values. This feature was developed leveraging IBM Watson Personality Assessment technology and is available upon request.'
		),
		'1-hd' => array(
			'title' 		=> 'Clinical Documents',
			'img'			=> '1-hd',
			'description'	=> 'Clinical notes enable healthcare professionals to document their interactions, discussions and observations with their participants. Clinical notes may be documented as free-text or structured leveraging questionnaires.'
		),
		'1-cf' => array(
			'title' 		=> 'Community Formus',
			'img'			=> '1-cf',
			'description'	=> 'hex-blue'
		),
		'2-cp' => array(
			'title' 		=> 'Care Plan',
			'img'			=> '2-cp',
			'description'	=> 'Written in easy to understand lay-language, Care Plans enable healthcare providers to better support patients through transitions in care, including post-discharge through the provision of condition specific information, including a roadmap to health.'
		),
		'2-qu' => array(
			'title' 		=> 'Questionnaires',
			'img'			=> '2-qu',
			'description'	=> 'Questionnaires are instrumental in assessing risks, determining program efficacy and driving program logic. Using the Questionnaire Authoring Tool organizations can create and deliver their own questionnaires to their participant population.'
		),
		'2-sc' => array(
			'title' 		=> 'Scheduling',
			'img'			=> '2-sc',
			'description'	=> 'Patients can request and cancel appointments online using the NexJ Connected Wellness scheduling capability. Providers can manage their calendars and can easily view and approve requested appointments. Patients receive appointment reminders, reducing the likelihood of no-shows.'
		),
		'2-cc' => array(
			'title' 		=> 'Circle of Care',
			'img'			=> '2-cc',
			'description'	=> 'The Circle of Care enables the participant to explicitly consent to sharing their health information with whomever they choose, including: family, friends, advocates and healthcare professionals.'
		),
		'2-me' => array(
			'title' 		=> 'Messaging',
			'img'			=> '2-me',
			'description'	=> 'Messaging provides a streamlined, in-application messaging system to communicate between your circle of care for participants, your collection of patients as a healthcare professional or your web of professionals for an administrator.'
		),
		'2-vc' => array(
			'title' 		=> 'Video Chat',
			'img'			=> 'Video Chat enables individuals to securely communicate with a single member of their Circle of Care using video and audio from their desktop or android mobile device.',
			'description'	=> 'hex-blue'
		),
		'2-ca' => array(
			'title'			=> 'Communication Analysis powered by IBM Watson',
			'img'			=> '2-ca',
			'description'	=> 'Communication Analysis enables healthcare professionals to identify emotions such as anger, disgust, fear, joy and sadness within individual messages as well as across an entire conversation with a participant. This feature is developed leveraging IBM Watson APIs and is available upon request by organizations for an additional fee per use.'
		),
		'3-wt' => array(
			'title' 		=> 'Wellness Trackers',
			'img'			=> '3-wt',
			'description'	=> 'Participants and their Healthcare Professionals co-establish a wellness plan personalized to the Participant\'s goals and needs. Participants track their behaviours, biometrics and psychometrics to achieve their tracker targets and wellness goal. Tracker data can be self-reported by the participant, clinically derived, or synced from wearable and health monitoring devices.'
		),
		'3-cwi' => array(
			'title' 		=> 'Consumer Wearable Integration',
			'img'			=> '3-cwi',
			'description'	=> 'Participants can track and capture their health activities and measurements automatically by synchronizing their personal wearable device (e.g., Fitbit, Garmin), Bluetooth-enabled blood glucometer, blood pressure cuff, etc., to NexJ Connected Wellness.'
		),
		'3-pd' => array(
			'title' 		=> 'Population Dashboard',
			'img'			=> '3-pd',
			'description'	=> 'The population dashboard enables healthcare professionals to efficiently manage a population of participants. On the dashboard, healthcare professionals can filter their population to see who is on track and who is not and be able to send a personalized batch message of encouragement.'
		),
		'3-ra' => array(
			'title' 		=> 'Reporting & Analytics',
			'img'			=> '3-ra',
			'description'	=> 'Ad-hoc Reporting enables clients to build, save and run their own reports on user
demographics, content usage and system usage at their convenience.'
		),
		'3-po' => array(
			'title' 		=> 'Population Dashboard',
			'img'			=> '3-po',
			'description'	=> 'The population dashboard enables healthcare professionals to efficiently manage a population of participants. On the dashboard, healthcare professionals can filter their population to see who is on track and who is not and be able to send a personalized batch message of encouragement.'
		),
		'3-ga' => array(
			'title' 		=> 'Gamification',
			'img'			=> '3-ga',
			'description'	=> 'Points enable participants to be rewarded for their activity on NexJ Connected Wellness, especially those activities that lead to sustainable behaviour change.'
		),
		'3-pa' => array(
			'title' 		=> 'Proactive Alerts',
			'img'			=> '3-pa',
			'description'	=> 'This new feature will give organizations the ability to configure alert notifications based on a defined set of rules in order to proactively alert Coaches or Healthcare Professionals to take action based on patient progress.'
		),
		'3-no' => array(
			'title' 		=> 'Notifications',
			'img'			=> '3-no',
			'description'	=> 'The app tour introduces new participants to the program or intervention they are joining and the features available to them as part of that program on NexJ Connected Wellness.'
		)
	);

	//if there is an id return the item else the entire map
	return ($id)? $map[$id]: $map;
}
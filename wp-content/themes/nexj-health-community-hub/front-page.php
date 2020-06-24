<?php

if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
}
else {
    if ( ! is_page_template() ) {
        get_header();

        $date1 = new DateTime(get_field('upcoming_ga', 'option'));
        $now = new DateTime();
        $date = (($date1->format('U') - $now->format('U')) > 0 )?
            get_field('upcoming_ga', 'option'): 
                get_field('next_ga', 'option'); ?>

        <section id="home-page_search" class="home-page_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Welcome to NexJ Health Community Hub!</h1>
                        <h2>What can we help you with?</h2>
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>

        </section>

        <section id="home-page_quarterly" class="home-page_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Q4 - Quarterly Update</h2>
                        <p>Access the 2018 Q4 Quarterly Update to learn about the new features and improvements we have added to NexJ Connected Wellness.</p>
                        <a href="/document/2018-q4-quarterly-update/" class="btn btn-secondary">View Q4 Update</a>
                    </div>
                    <div class="col-md-6">

                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/QU Graphic.svg" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <section id="home-page_news" class="home-page_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mr-auto ml-auto">
                        <div class="home-section_title">
                            <h2 class="text-center">Stay In The Loop</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 mr-auto ml-auto">
                        <div class="home-section_title">
                            <p class="text-center">Our release date for the next GA will be on <strong><?php echo $date; ?></strong> which leaves us with: </p>
                            <div id="ga-clock" class="ml-auto mr-auto text-center" style="font-size: 3rem; font-weight: 100; opacity: 0.75; background: #f5f5f5; border: solid;"></div>
                        </div>
                    </div>
                </div><?php /*
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item title-item">Recent Press Releases</li>
                            <li class="list-group-item" target="_blank"><a href="https://www.nexjhealth.com/press-room/press-releases/nexj-health-selected-call-check-program-jersey-channel-island/">NexJ Health Selected for Call & Check Program in Jersey Channel Island</a></li>
                            <li class="list-group-item"><a href="https://www.nexjhealth.com/press-room/press-releases/dr-paul-grundy-godfather-patient-centered-medical-home-joins-nexj-health-senior-fellow/" target="_blank">Dr. Paul Grundy, “Godfather of the Patient Centered Medical Home”, Joins NexJ Health as Senior Fellow</a></li>
                            <li class="list-group-item"><a href="https://www.nexjhealth.com/press-room/press-releases/ottawa-regional-cancer-foundation-launches-nexj-connected-wellness-expand-access-cancer-coaching-support/" target="_blank">Ottawa Regional Cancer Foundation Launches NexJ Connected Wellness to Expand Access to Cancer Coaching and Support</a></li>
                          </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item title-item">Popular Topics</li>
                            <li class="list-group-item"><a href="<?php echo get_home_url(); ?>/authoring-tools/questionnaires/">Questionnaires</a></li>
                            <li class="list-group-item"><a href="<?php echo get_home_url(); ?>/faqs/accounts/">Accounts</a></li>
                            <li class="list-group-item"><a href="<?php echo get_home_url(); ?>/snippets/elements/">Snippet Elements</a></li>
                          </ul>
                        </div>
                    </div>
                </div> */?>
            </div>
        </section>

        <section id="home-page_authoring" class="home-page_section">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h2>Build Your Own Program</h2>
                            <p>Learn how to use NexJ Connected Wellness Authoring tools to optimize your program delivery.</p>
                        </div>
                    </div>
                </div>


                <br>
                <br>


                <div class="row">
                    <div class="col-md-3 ml-auto">
                        <div class="svg-icon">
                            <img class="img-hex" src="/wp-content/themes/nexj-health-community-hub/assets/icons/1-wb.svg" alt="Workbooks" onerror="this.src='/wp-content/themes/nexj-health-community-hub/assets/icons/1-wb.png'">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="svg-icon">
                            <img class="img-hex" src="/wp-content/themes/nexj-health-community-hub/assets/icons/2-qu.svg" alt="Questionnaires" onerror="this.src='/wp-content/themes/nexj-health-community-hub/assets/icons/2-qu.svg'">
                        </div>
                    </div>
                    <div class="col-md-3 mr-auto">
                        <div class="svg-icon">
                            <img class="img-hex" src="/wp-content/themes/nexj-health-community-hub/assets/icons/3-wt.svg" alt="Questionnaires" onerror="this.src='/wp-content/themes/nexj-health-community-hub/assets/icons/3-wt.svg'">
                        </div>
                    </div>
                </div>

                <br>
                <br>

                <div class="row">
                    <div class="col-md-4 ml-auto mr-auto text-center">
                        <a class="btn btn-secondary btn-block" href="<?php echo get_home_url(); ?>/build-programs/">View All</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="home-page_snippets" class="home-page_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center pb-5">HTML Snippets for Workbooks</h2>
                    </div>
                     <div class="col-md-5 ml-auto">
                        <div class="content">
                            <h3>Snippets Guide</h3>
                            <p>Build the layout you would like to use for your next workbook.</p>
                            <a class="btn btn-primary" href="<?php echo get_home_url(); ?>/build-programs/workbook-html-snippets/">Select Snippets</a>
                        </div>
                    </div>

                    <div class="col-md-5 mr-auto">
                        <div class="fake-browser-ui">
                            <div class="frame">
                                <span class="buttons"></span>
                                <span class="buttons"></span>
                                <span class="buttons"></span>
                            </div>

                            <span class="address"></span>

                            <span class="background"></span>

                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/CW Graphic.svg" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="home-page_faq" class="home-page_section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Have Questions?</h2>
                        <p>Check out our <a href="<?php echo get_home_url(); ?>/faqs/common-questions">FAQ page</a></p>
                    </div>
                    <div class="col-md-6">
                        <h2>Cant Find Your Answer?</h2>
                        <p>Contact us directly</p>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery("#ga-clock")
                    .countdown("<?php echo $date; ?>", function(event) {
                        jQuery(this).html( event.strftime(
                            '<ul class="clock-container list-inline">' +
                            '<li class="clock-item list-inline-item">%D <span>Days</span></li>' +
                            '<li class="clock-item list-inline-item">%H <span>Hours</span></li>' + 
                            '<li class="clock-item list-inline-item">%M <span>Minutes</span></li>' +
                            '<li class="clock-item list-inline-item">%S <span>Seconds</span></li>' +
                            '</ul>'
                            ));
                });
            });
        </script>
        <?php
        get_footer();
    }
    else {
        include( get_page_template() );
    }
}
?>

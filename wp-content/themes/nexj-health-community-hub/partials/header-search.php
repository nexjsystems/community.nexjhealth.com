<section id="home-page_search" class="home-page_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<h1><?php printf( esc_html__( 'Search Results for: %s', 'wp-bootstrap-4' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<h2>Search Again</h2>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</section>
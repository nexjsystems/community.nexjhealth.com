<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

/** 
 * TODO: Temporary fix that will allow categories to be invisible until we have enough content
 * Also found in _get_category_sidebar() custom-functions.php
 */
if(get_field('skip')) return;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php the_title( '<h2 class="entry-title card-title h3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="text-dark"><i class="far fa-file-alt"></i> ', '</a></h2>' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php

			if(get_field('snippet_type') == "single"): ?>

				<div class="codeblock">
			    			<figure>
							  <figcaption><h3><?php echo get_field('title'); ?></h3></figcaption>
							  
							  	<?php echo get_field('description');
							  	if(get_field('screenshot')):?>
								<img src="<?php echo get_field('screenshot');?>" class="img-fluid">
								<hr>
								<?php endif; ?>
							    <pre class="line-numbers language-markup">
<code id="1-id"><?php echo htmlspecialchars( get_field('html') ); ?></code>
								</pre>
							</figure>
						</div>

						<a href="#" class="copy-button btn btn-primary" data-item="1-id">Copy Code</a>
						<p class="text-muted">* please note that this button is not supported in IE 10 or lower</p>

			<?php else: ?>
					<?php the_field('content'); ?>
				<?php foreach(get_field('snippet_block') as $i => $snippet ){ ?>
					<div class="snippet-container">
						<div class="codeblock">
			    			<figure>
							  <figcaption><h3><?php echo $snippet['title']; ?></h3></figcaption>
							  
							  	<?php if($snippet['screenshot']):?>
								<img src="<?php echo $snippet['screenshot'];?>" class="img-fluid">
								<br>
								<br>
								<?php endif; echo $snippet['description']; ?>
							    <pre class="line-numbers language-markup">
<code id="<?php echo $i ?>-id" class="line-numbers"><?php echo htmlspecialchars( $snippet['html']); ?></code>
								</pre>
							</figure>
						</div>
							
						<a href="#" class="copy-button btn btn-primary" data-item="<?php echo $i ?>-id">Copy Code</a>
						<p class="text-muted">* please note that this button is not supported in IE 10 or lower</p>
					</div>
					<hr>
					<?php
				}

			endif;
		?>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

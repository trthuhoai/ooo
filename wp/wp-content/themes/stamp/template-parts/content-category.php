<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stamp
 */

?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="card">
						<div class="card-body card-body-lg">
							<?php
							if ( is_singular() ) :
								the_title( '<h1 class="entry-title">', '</h1>' );
							else :
								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							endif;
							?>
							<?php stamp_post_thumbnail( 'thumbnail', array('class' => 'img-fluid') ); ?>
						</div>
					</div>
				</article>
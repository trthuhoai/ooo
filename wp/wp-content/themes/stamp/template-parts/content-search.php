<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stamp
 */

?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="card">
						<div class="card-body card-body-lg">
							<?php the_title( sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							<div class="card-content">
								<?php stamp_post_thumbnail( 'thumbnail', array('class' => 'img-fluid') ); ?>

								<?php the_excerpt(); ?>

							</div>
						</div>
					</div>
				</article>
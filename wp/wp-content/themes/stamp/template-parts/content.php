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
								the_title( '<h1 class="card-title">', '</h1>' );
							else :
								the_title( '<h2 class="card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							endif;
							?>
							<div class="card-content">
								<p>公開日時 : <?php the_time("Y.m.d"); ?></p>
								<?php stamp_post_thumbnail( 'thumbnail', array('class' => 'img-fluid') ); ?>

								<?php
								the_content( sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'stamp' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								) );

								?>
							</div>
						</div>
					</div>
				</article>
<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stamp
 */

?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="card">
						<div class="card-body card-body-lg">
							<?php the_title( '<h1 class="card-title">', '</h1>' ); ?>
							<div class="card-content">
								<?php stamp_post_thumbnail( 'thumbnail', array('class' => 'img-fluid') ); ?>

								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</article>

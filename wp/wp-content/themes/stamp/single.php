<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package stamp
 */

get_header();
?>

		<main id="main">
			<div class="row">
				<div class="col-sm-9 col-md-12">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

					endwhile; // End of the loop.
					?>
				</div>
<!--
				<div class="col-sm-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">サブメニュー</h5>
							<ul>
								<li><a href="">リンク</a></li>
								<li><a href="">リンク</a></li>
								<li><a href="">リンク</a></li>
							</ul>
						</div>
					</div>
				</div>
-->
			</div>
		</main>
	</div>

<?php get_footer(); ?>

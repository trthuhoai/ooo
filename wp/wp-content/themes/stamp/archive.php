<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stamp
 */

get_header();
?>

		<main id="main">
			<div class="row">
				<div class="col-sm-9 col-md-12">
					<?php if ( have_posts() ) :

						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );

						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'category' );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
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
<?php get_footer(); ?>

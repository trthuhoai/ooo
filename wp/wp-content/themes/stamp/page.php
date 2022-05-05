<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );


					endwhile;
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
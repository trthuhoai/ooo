<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package stamp
 */

get_header();
?>

		<main id="main">
			<div class="row">
				<div class="col-sm-9 col-md-12">
					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( '検索結果: %s', 'stamp' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

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

<?php 
 /* Template Name: TEMPLATE CONTACT */
get_header();
?>
		<main id="main">
			<div class="row">
				<div class="col-sm-9 col-md-12">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="card">
							<div class="card-body card-body-lg">
								<h2 class="card-title">お問い合わせフォーム</h2>
								<p class="card-text">お問い合わせをされる前に、よくある質問をご確認ください。</p>
								<div class="card-content">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</article>
				</div>
			</div>
		</main>
	</div>

<?php get_footer(); ?>
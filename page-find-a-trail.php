<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-full" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div id="trail-maps" class="trail-maps-header">
					
						<h1>Find a trail to run</h1>
						<p>Find your next trail below</p>
					
					</div> <!-- end #trail-maps .trail-maps-header -->
					
					<article class="trail-space">
						<h3>Coming soon.</h3>
					</article>

					<?php endwhile; else : ?>

							<article id="post-not-found" class="hentry">
								<header class="article-header">
									<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
								</header> <?php // end .article-header ?>
								<section class="entry-content">
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section> <?php // end .entry-content ?>
								<footer class="article-footer">
										<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
								</footer> <?php // end .article-footer ?>
							</article>

					<?php endif; ?>

				</div> <?php // end #main .wrap-main ?>

				<?php get_sidebar(); ?>

			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

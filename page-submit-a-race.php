<?php /*
* EVENT SUBMISSION FORM
*/ ?>

<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
						
						<div class="event-form-wrap">
							<?php the_content(); ?>
						</div> <?php // end .event-form-wrap ?>
						
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

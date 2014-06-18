<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="" role="main">

					<article id="post-not-found" class="hentry">

						<header class="article-header">

							<h1><?php _e( 'Epic 404 - Article Not Found', 'bonestheme' ); ?></h1>

						</header>

						<section class="entry-content">

							<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'bonestheme' ); ?></p>

						</section>

						<section class="search">

								<p><?php get_search_form(); ?></p>

						</section>

						<footer class="article-footer">

								<p><?php _e( 'This is the 404.php template.', 'bonestheme' ); ?></p>

						</footer>

					</article>

				</div> <?php // end #main ?>

			</div> <?php // end #inner-content ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

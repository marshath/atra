<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="" role="main">

					<article id="post-not-found" class="hentry">

						<header class="article-header">
							<h1 class="page-title"><?php _e( 'Epic 404 - Page Not Found', 'bonestheme' ); ?></h1>
						</header>

						<section class="entry-content">
							<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'bonestheme' ); ?></p>
						</section>

						<div class="search-404">
							<?php get_search_form(); ?>
						</div>

						<footer class="article-footer">
							<p><img src="<?php echo home_url( '/' ); ?>wp-content/uploads/2014/07/bg-print.png" /></p>
						</footer>

					</article>

				</div> <?php // end #main ?>

			</div> <?php // end #inner-content ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

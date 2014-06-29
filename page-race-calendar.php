<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div id="event-search" class="event-search">
					
						<h1>Find a Trail Race</h1>
						
						<form action="#" method="post" class="event-search-form">
							<fieldset>
								<label for="screen-reader">Sign up for our newsletter</label>
								<div class="event-search-wrap">
									<input type="text" placeholder="Search for a Trail Race" id="search-field" class="hm-event-search-input">
									<button type="submit" class="btn event-search-btn">Go!</button>
								</div>
							</fieldset>
						</form> <!-- end .event-search-form -->
						
						<p>You can also find <a href="#">a complete list of events</a>, <a href="#">international races</a> or <a href="#">submit a race</a>.</p>
					
					</div> <!-- end #event-search .event-search -->
					
					<?php 
					//---------------------------------------------
					// ----------- Race Calendar Banner -----------
					//---------------------------------------------
					if ( (is_page('race-calendar')) ) {
						if ( is_active_sidebar( 'sidebar-events' ) ) : ?>
						
							<div class="banner-ad">
								<?php dynamic_sidebar( 'banner-events' ); ?>
							</div>
	
						<?php endif; 
					} ?>
					
					<?php 
					//----------------------------------------
					// ----------- Table of Events -----------
					//---------------------------------------- ?>
					<table>
						<tr><td>Table</td><td>Table</td></tr>
						<tr><td>Table</td><td>Table</td></tr>
					</table>

						<?php comments_template(); // ------- comments template ------- ?>

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

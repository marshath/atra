<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<?php 
					//---------------------------------------------
					// ----------- Race Calendar Banner -----------
					//---------------------------------------------
					if ( (is_page('resources')) ) {
						if ( is_active_sidebar( 'banner-resources' ) ) : ?>
						
							<h3>Resources Banner</h3>
							<?php dynamic_sidebar( 'banner-resources' ); ?>
							
						<?php else : ?>
	
							<div class="no-widgets">
								<p><?php _e( 'BANNER - RESOURCES: This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
							</div>
	
						<?php endif; 
					} ?>

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
					
					<?php 
					//---------------------------------------
					// ----------- Resource Lists -----------
					//--------------------------------------- ?>
					
					<h1>Resources</h1>
					
					<div class="half">
						<div id="beginning-running" class="resource-item">
							<?php the_field('get_started_running'); ?>
						</div>
						
						<div id="trail-maintenance" class="resource-item">
							<?php the_field('trail_maintenance'); ?>
						</div>
						
						<div id="organizations" class="resource-item">
							<?php the_field('organization_links'); ?>
						</div>
						
						<div id="mut" class="resource-item">
							<?php the_field('mut_articles'); ?>
						</div>
					</div>
					
					<div class="half">
						<div id="books" class="resource-item">
							<?php the_field('book_links'); ?>
						</div>
						
						<div id="magazines" class="resource-item">
							<?php the_field('magazines_links'); ?>
						</div>
						
						<div id="ultrarunning" class="resource-item">
							<?php the_field('ultrarunning_links'); ?>
						</div>
						
						<div id="camps" class="resource-item">
							<?php the_field('camp_links'); ?>
						</div>
						
						<div id="blogs" class="resource-item">
							<?php the_field('running_blog_links'); ?>
						</div>
					</div>

				</div> <?php // end #main .wrap-main ?>

				<?php get_sidebar(); ?>

			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

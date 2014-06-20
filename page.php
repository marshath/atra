<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">

					<?php while (have_posts()) : the_post(); ?>
					
						<?php if ( (is_page('resources')) ) { // ----------- Resources Banner Ad -----------
							if ( is_active_sidebar( 'banner-resources' ) ) : ?>
						
								<h3>Resources Banner</h3>
								<?php dynamic_sidebar( 'banner-resources' ); ?>
								
							<?php else : ?>
		
								<div class="no-widgets">
									<p><?php _e( 'BANNER - RESOURCES: This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
								</div>
		
							<?php endif; 
						} // end RESOURCES BANNER ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<header class="article-header">
							<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
						</header> <!-- end .article-header -->
						
						<section class="entry-content" itemprop="articleBody">
							<?php the_content(); ?>

							<?php 
							//---------------------------------------
							// ----------- Resources Page -----------
							//---------------------------------------
							if ( (is_page('resources')) ) { ?>
								
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
								
							<?php } // end RESOURCES Page ?>
					
						</section> <?php // end .entry-content ?>
						
					</article>

					<?php endwhile; ?>

				</div> <?php // end #main .wrap-main ?>

				<?php get_sidebar(); ?>

			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

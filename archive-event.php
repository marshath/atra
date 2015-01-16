<?php /*
* EVENT ARCHIVE TEMPLATE
*/ ?>

<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">

					<div id="event-search" class="event-search">
						
						<h1>Find a Trail Race</h1>
						<?php get_search_form(); ?>
					
					</div> <!-- end #event-search .event-search -->
						
					<?php 
					//---------------------------------------------
					// ----------- Race Calendar Banner -----------
					//---------------------------------------------
					if ( is_active_sidebar( 'sidebar-events' ) ) : ?>
						<div class="banner-ad">
							<?php dynamic_sidebar( 'banner-events' ); ?>
						</div>
					<?php endif; ?>
						
						<?php 
						//----------------------------------------
						// ----------- Table of Events -----------
						//---------------------------------------- ?>
						
						<?php get_template_part('content', 'event-breadcrumb'); // include the event breadcrumb trail ?>
						
						<div class="events-wrap">
							<h2><?php get_template_part('content', 'event-title'); // include the event list title ?></h2>
							<?php get_template_part('content', 'event-legend'); // include the event legend ?>
							
							<table>
								<thead>
									<?php get_template_part('content', 'event-table-head'); // include the event table head row ?>
								</thead>
								<tbody>
									
								<?php query_posts($query_string . '&meta_key=event_date&orderby=meta_value&order=asc&posts_per_page=100'); // event archive sorting ?>
								
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<?php get_template_part('content', 'event-table'); // include the repeatable event list table rows ?>
								<?php endwhile; ?>
									
								</tbody>
								<tfoot>
									<?php get_template_part('content', 'event-table-head'); // include the event table head row ?>
								</tfoot>
							</table>
							
							<?php get_template_part('content', 'event-legend'); // include the event legend ?>
						</div> <?php // end .events-wrap ?>
						
						<?php bones_page_navi(); ?>
						
								<?php else : // do not delete - closes table from above ?>
									
								</tbody>
								<tfoot>
									<?php get_template_part('content', 'event-table-head'); // include the event table head row ?>
								</tfoot>
							</table>
							
							<?php get_template_part('content', 'event-legend'); // include the event legend ?>
						</div> <?php // end .events-wrap ?>

						<article id="post-not-found" class="hentry">
							<header class="page-title">
								<h1><?php _e( 'Oops, no events were found!', 'bonestheme' ); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e( 'Uh Oh. Try double checking things or search for something different.', 'bonestheme' ); ?></p>
							</section>
						</article>

								<?php endif; ?>

					</div> <?php // end #main ?>

				<?php get_sidebar(); ?>

			</div> <?php // end #inner-content ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>
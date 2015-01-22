<?php /*
Template Name: Event Calendar Pages
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
					if ( is_active_sidebar('sidebar-events') ) : ?>
						<div class="banner-ad">
							<?php dynamic_sidebar('banner-events'); ?>
						</div>
					<?php endif; ?>
					
					<?php 
					//----------------------------------------
					// ----------- Table of Events -----------
					//---------------------------------------- ?>
					
					<?php get_template_part('content', 'event-breadcrumb'); // include the event breadcrumb trail ?>
					
					<div class="events-wrap">
						
						<h2><?php get_template_part('content', 'event-title'); // include the event title ?></h2>
						<?php get_template_part('content', 'event-legend'); // include the event legend ?>
						<table>
							<thead>
								<?php get_template_part('content', 'event-table-head'); // include the event table head row ?>
							</thead>
							<tbody>

								<?php //************************************
								// set up or arguments for our custom query
								//******************************************
								$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
								
								//--------- is page the Race Calendar ---------//
								if (is_page('race-calendar')) {
									$today = date("Ymd");
									//'BETWEEN' comparison with 'type' date only works with dates in format Ymd. 
									//See http://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters 
									$date1 = date("Ymd", strtotime($today . "-1 Week")); 
									$date2 = date("Ymd", strtotime($today . "+51 Weeks"));
									
									$query_args = array( 
										'post_type' => 'event',
										'posts_per_page' => 100,
										'orderby' => 'meta_value',
										'order' => 'ASC',
										'paged' => $paged,
										'meta_query' => array( 
											array( 
												'key' => 'event_date',
												'value' => array($date1,$date2),
												'type' => 'date',
												'compare' => 'BETWEEN'
											)
										)
									);
								} 
								//--------- is page the Future Events ---------//
								if (is_page('future-events')) {
									$today = date("Y");
									$date1 = date("Y", strtotime($today . "+1 Year"));
									$date2 = $date1 . '0101';
									$eventdate = 'event_date_' . $date1;
									
									$query_args= array( 
										'post_type' => 'event',
										'posts_per_page' => 100,
										'orderby' => 'meta_value',
										'order' => 'ASC',
										'paged' => $paged,
										'meta_query' => array( 
											array( 
												'key' => $eventdate,
												'value' => $date2,
												'type' => 'date',
												'compare' => '>='
											)
										)
									);
								}
								//--------- is page the Historical Events Archive ---------//
								if (is_page('historical-events-archive')) {
									$today = date("Ymd");
									$date1 = date("Ymd", strtotime($today . "-50 Years")); 
									$date2 = date("Ymd", strtotime($today . "-1 Week"));
									
									$query_args = array( 
										'post_type' => 'event',
										'posts_per_page' => 100,
										'orderby' => 'meta_value',
										'order' => 'ASC',
										'paged' => $paged,
										'meta_query' => array( 
											array( 
												'key' => 'event_date',
												'value' => array($date1,$date2),
												'type' => 'date',
												'compare' => 'BETWEEN'
											)
										)
									);
								} ?>
								  
							<?php //**********************************
							// create a new instance of WP_Query
							//**********************************
							$the_query = new WP_Query( $query_args ); ?>
					
							<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
								<?php get_template_part('content', 'event-table'); // include the repeatable event list table rows ?>
							<?php endwhile; ?>
					
							</tbody>
							<tfoot>
								<?php get_template_part('content', 'event-table-head'); // include the event table head row ?>
							</tfoot>
						</table>
						
							<?php else: ?>
								
						<article>
							<h1>Sorry...</h1>
							<p><?php _e('There were no events found.'); ?></p>
						</article>
						  		
						  	<?php endif; ?>
						
						<?php get_template_part('content', 'event-legend'); // include the event legend ?>
					
					</div> <?php // end .events-wrap ?>
                    
                    <?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1 ?>
                        <?php global $the_query; // Add pagination to the list
							
						$big = 999999999; // need an unlikely integer
						
						echo '<nav class="pagination">
							<ul class="page_numbers">';
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $the_query->max_num_pages,
								'prev_text'    => '&larr;',
								'next_text'    => '&rarr;',
								'end_size'     => 3,
								'mid_size'     => 3,
								'type'         => 'list'
							) );
						echo '</ul>
						</nav>'; ?>
					<?php } ?>

				</div> <?php // end #main .wrap-main ?>

				<?php get_sidebar(); ?>

			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>
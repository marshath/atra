<?php /*
* HISTORICAL EVENTS CALENDAR PAGE
*/ ?>

<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">

					<div id="event-search" class="event-search">
						
						<h1>Find a Trail Race</h1>
						<?php // ---- Display searchform.php ----- ?>
						<form role="search" method="get" class="event-search-form" action="<?php echo home_url( '/event/' ); ?>">
							<fieldset>
								<input type="hidden" value="1" name="sentence" />
								<label for="screen-reader">Search for a trail race.</label>
								<div class="event-search-wrap">
									<input type="text" placeholder="<?php the_search_query(); ?>" id="s" name="s" class="event-search-input" value="">
									
									<h4 id="search-toggle" class="search-toggle"><a href="#">Advanced Search</a></h4>
									<div id="search-filter" class="search-filter">
										<p>Filter by:</p>
										<?php $taxonomies = get_object_taxonomies('event');
											foreach($taxonomies as $tax){
												echo buildSelect($tax);
											}
										?>
									</div>
					
									<button type="submit" class="btn event-search-btn">
										<span class="search-icon" aria-hidden="true" data-icon="&#xe602;"></span>  
										<span class="search-text">Search</span>
									</button>
								</div>
							</fieldset>
						</form> <!-- end .event-search-form -->
					
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
					<div class="event-links">
						<p>View: <a href="/race-calendar/">Upcoming Events</a> | <a href="/race-calendar/future-events/"><?php $todayear = date("Y"); $dateyear = date("Y", strtotime($todayear . "+1 Year")); echo $dateyear; ?> Events</a> | <a href="/race-calendar/historical-events-archive/" class="current-page">Historical Events Archive</a></p>
					</div> <!-- end .event-links -->
					
					<div class="events-wrap">
						
						<h2>Historical Events Archive</h2>
						<?php get_template_part('content', 'race-legend'); // include the race legend ?>
						<table>
							<thead>
								<tr>
									<th>Date</th>
									<th>Name/Link</th>
									<th>Distance(s)</th>
									<th>Type</th>
									<th>State</th>
									<th>Country</th>
								</tr>
							</thead>
							<tbody>

							<?php //************************************
							// set up or arguments for our custom query
							//******************************************
							$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
							  
							$today = date("Ymd");
							//'BETWEEN' comparison with 'type' date only works with dates in format Ymd. 
							//See http://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters 
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
							
							//**********************************
							// create a new instance of WP_Query
							//**********************************
							$the_query = new WP_Query( $query_args );
							?>
					
							<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
							
							<tr class="<?php // Display the ATRA Approved Event
								$terms = get_the_terms( $post->ID, 'qualifications'); // Display the Qualifications
							    if ($terms) {
							        $terms_slugs = array();
							        foreach ( $terms as $term ) {
							            $terms_slugs[] = $term->slug;
							        }
							        $series = $terms_slugs[0];      
							        echo "{$series} ";
							    } else {
							        echo "";
							    } // end Qualifications ?>">
								<td>
									<?php // Display the Event Date
									$endDateText = date_i18n("M d, Y", strtotime(get_field('event_date')));
									echo $endDateText;
									 // end Event Date ?>
								</td>
								<td><?php // Display the Event Name and Link ?>
									<p class="<?php // Display the ATRA Approved Event
									$certs = get_the_terms( $post->ID , 'qualifications' );
									foreach ( $certs as $cert ) {
										echo $cert->slug; echo "-icon ";
									} ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
								</td><?php // end Event Name and Link ?>
								<td>
									<ul class="list-commas">
										<?php $terms = get_the_terms( $post->ID, 'distances'); // Display the Event Distance
									    if ($terms) {
									        $terms_slugs = array();
									        foreach ( $terms as $term ) {
									            $terms_slugs[] = $term->name;
									        }
									        $series = $terms_slugs[0];      
									        echo "<li>{$series}</li>";
									    } else {
									        echo "";
										} // end Event Distance
										// Display the Other Distances 1, if available
										$o1dist = get_post_meta($post->ID, 'other_distance1', true);
										if ($o1dist) {
											echo "<li>"; echo esc_html( get_post_meta( get_the_ID(), 'other_distance1', true ) ); echo "</li>";
										} else {
											echo "";
										} // end Other Distances 1
										// Display the Other Distances 2, if available
										$o2dist = get_post_meta($post->ID, 'other_distance2', true);
										if ($o2dist) {
											echo "<li>"; echo esc_html( get_post_meta( get_the_ID(), 'other_distance2', true ) ); echo "</li>"; 
										} else {
											echo "";
										} // end Other Distances 2 ?>
									</ul><?php // end Event Distance ?>
								</td>
								<td>
									<?php // Display the Event Type
									echo "<p>"; echo get_field('event_type'); echo "</p>";
									// end Event Type ?>
								</td>
								<td>
									<span class="uppercase"><?php // Make the State Slug Uppercase
										$terms = get_the_terms( $post->ID, 'states'); // Display the State Slug
									    if ($terms) {
									        $terms_slugs = array();
									        foreach ( $terms as $term ) {
									            $terms_slugs[] = $term->slug;
									        }
									        $series = $terms_slugs[0];      
									        echo "{$series}";
									    } else {
									        echo "";
									   } // end Display State?>
								   </span>
								</td>
								<td>
									<?php // Display the Event Country
									echo "<p>"; echo get_field('event_country');
									 // end Event Country ?>
								</td>
							</tr>
								
							<?php endwhile; ?>
					
							</tbody>
							<tfoot>
								<tr>
									<th>Date</th>
									<th>Name/Link</th>
									<th>Distance(s)</th>
									<th>Type</th>
									<th>State</th>
									<th>Country</th>
								</tr>
							</tfoot>
						</table>
						
						<?php else: ?>
						  <article>
						    <h1>Sorry...</h1>
						    <p><?php _e('There were no events found.'); ?></p>
						  </article>
						<?php endif; ?>
						
						<?php get_template_part('content', 'race-legend'); // include the race legend ?>
					
					</div> <?php // end .events-wrap ?>

					<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
					  <?php bones_page_navi(); ?>
					<?php } ?>

				</div> <?php // end #main .wrap-main ?>

				<?php get_sidebar(); ?>

			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>
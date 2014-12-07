<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div id="event-search" class="event-search">

						<h1>Find a Trail Race</h1>
						<?php get_search_form(); ?>

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
					<div class="events-wrap">
						<h2>Complete Event Catalog</h2>
						<table>
							<thead>
								<tr>
									<th>ESP</th>
									<th>Date</th>
									<th>Name/Link</th>
									<th>Distance(s)</th>
									<th>Type</th>
									<th>State</th>
									<th>Country</th>
								</tr>
							</thead>
							<tbody>

							<?php // ******** Display Events ******** 
								$boardies = array('post_type' => 'event', 'posts_per_page' => 50); 
								$boards = new WP_Query( $boardies );
								while ( $boards->have_posts() ) : $boards->the_post();
								 ?>
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
										<td></td> <?php // leave blank cell for ATRA badge ?>
										<td>
											<?php // Display the Event Date
											$endDateText = date_i18n("M d, Y", strtotime(get_field('event_date')));
											echo $endDateText;
											 // end Event Date ?>
										</td>
										<td><?php // Display the Event Name and Link ?>
											<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
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
							<?php bones_page_navi(); ?>
							</tbody>
							<tfoot>
								<tr>
									<th>ESP</th>
									<th>Date</th>
									<th>Name/Link</th>
									<th>Distance(s)</th>
									<th>Type</th>
									<th>State</th>
									<th>Country</th>
								</tr>
							</tfoot>
						</table>
						<p><b>ESP</b> = Meets ATRA's <a href="<?php echo home_url(); ?>/about-atra/events-standards-program/">Event Standards Program</a> requirements.</p>
					
					<?php wp_reset_postdata(); // end Display Events ?>
					</div> <?php // end .events-wrap ?>

					<?php endwhile; else : ?>

						<article id="post-not-found" class="hentry">
							<header class="article-header">
								<h1><?php _e( 'Oops, Event Not Found!', 'bonestheme' ); ?></h1>
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

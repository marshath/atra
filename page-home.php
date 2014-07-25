<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

					<?php while (have_posts()) : the_post(); ?>

				<div id="event-search" class="event-search">
				
					<h1>Find a Trail Race</h1>
					<?php get_search_form(); ?>
					
				</div> <!-- end #event-search .hm-event-search -->
				<div id="featured" class="featured-events">
				
					<h2>Featured Events</h2>
					<p>Races that meet the <a href="#">ATRA events standards</a>.</p>
					
					<?php 
					//----------------------------------------
					// ----------- Table of Events -----------
					//---------------------------------------- ?>
					<table>
						<thead>
							<tr>
								<th>Date</th>
								<th>Name/Link</th>
								<th>Distance(s)</th>
								<th>Type</th>
								<th>State</th>
							</tr>
						</thead>
						<tbody>
					
						<?php // ******** Display Events ******** 
							$boardies = array('post_type' => 'event', 'qualifications' => 'meets-atra-event-standards', 'orderby' => rand, 'posts_per_page' => 3); 
							$boards = new WP_Query( $boardies );
							while ( $boards->have_posts() ) : $boards->the_post();
							 ?>
								<tr>
									<td>
										<?php // Display the Event Date
										$endDateText = date_i18n("M d", strtotime(get_field('event_date')));
										echo $endDateText;
										 // end Event Date ?>
									</td>
									<td><?php // Display the Event Name and Link ?>
										<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
									</td><?php // end Event Name and Link ?>
									<td>
										<ul class="list-commas">
											<?php $terms = get_the_terms( $post->ID , 'distances' ); // Display the Event Distances
												foreach ( $terms as $term ) {
													echo '<li>'; echo $term->name; echo '</li>';
											} // end Event Distance ?>
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
								</tr>
							<?php endwhile; ?>
						<?php wp_reset_postdata(); // end Display Events ?>
						
						</tbody>
						<tfoot>
							<tr>
								<th>Date</th>
								<th>Name/Link</th>
								<th>Distance(s)</th>
								<th>Type</th>
								<th>State</th>
							</tr>
						</tfoot>
					</table>
					
				</div> <!-- end #events-featured .hm-event-featured -->
				<div id="trails" class="trail-maps">
				
					<h2>Find a trail to run</h2>
					<p>Get in-depth information about each trail, amenities, and directions.</p>
					<p><a href="<?php echo home_url(); ?>/find-a-trail/" class="btn">Find now!</a></p>
					<p>You can also find international trails or submit a trail.</p>
					
				</div> <!-- end #trail-maps .hm-trail-maps -->
				<div id="members" class="member-list">
					
					<h2>ATRA Members</h2>
					<p>We love all our members. Without whom, things wouldn't be possible.<br>
					<a href="#">Interested in becoming a member?</a></p>
					
					<div class="half">
						<div id="member-all-terrain" class="resource-item">
							<?php the_field('members_all-terrain', 114); // ------- All-terrain Members ?>
						</div>
					</div>
					
					<div class="half">
						<div id="member-steep-rocky" class="resource-item">
							<?php the_field('members_steep-rocky', 114); // ------- Steep Rocky Members  ?>
						</div>
						
						<div id="member-single-track" class="resource-item">
							<?php the_field('members_single-track', 114); // ------- Singel Track Members  ?>
						</div>
					
						<div id="member-race" class="resource-item">
							<?php the_field('members_race', 114); // ------- Race Members ?>
						</div>
					
						<div id="member-club" class="resource-item">
							<?php the_field('members_club', 114); // ------- Club Members  ?>
						</div>
					</div>
					
				</div> <!-- end #member-list .hm-member-list -->

				<?php endwhile; ?>

				<?php get_sidebar(); ?>

			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

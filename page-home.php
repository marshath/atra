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
					<p>Races that meet the <a href="<?php echo home_url(); ?>/about-atra/events-standards-program/">ATRA events standards</a>.</p>

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
							$boardies = array('post_type' => 'event', 'qualifications' => 'meets-atra-event-standards', 'posts_per_page' => 5, 'orderby' => 'rand'); 
							$boards = new WP_Query( $boardies );
							while ( $boards->have_posts() ) : $boards->the_post();
							?>
								<tr>
									<td>
										<?php // Display the Event Date
										$endDateText = get_post_meta($post->ID, 'event_date', true);
										    if ($endDateText) {
												$endDateText = date_i18n("M d, Y", strtotime(get_field('event_date')));
												echo $endDateText;
											} else {
													echo "";
											}
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
								</tr>
							<?php endwhile; ?>
						<?php wp_reset_postdata(); // end Display Events ?>

						</tbody>
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
					<?php the_field('membership_description', 114); // ------- Membership Description ?>
					<!-- <p><a href="<?php echo home_url(); ?>/membership/">Interested in becoming a member?</a></p> -->

					<div class="half">
						<div id="member-all-terrain" class="resource-item">
							<?php the_field('members_all-terrain', 114); // ------- All-terrain Members ?>
						</div>
						
						<div id="member-steep-rocky" class="resource-item">
							<?php the_field('members_steep-rocky', 114); // ------- Steep Rocky Members  ?>
						</div>
						
						<div id="member-switchback" class="resource-item">
							<?php the_field('members_switchback', 114); // ------- Switchback Members  ?>
						</div>

						<div id="member-single-track" class="resource-item">
							<?php the_field('members_single-track', 114); // ------- Singel Track Members  ?>
						</div>
					</div>

					<div class="half">
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

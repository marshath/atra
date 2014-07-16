<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

					<?php while (have_posts()) : the_post(); ?>

				<div id="event-search" class="event-search">
				
					<h1>Find a Trail Race</h1>
					
					<form action="#" method="post" class="event-search-form">
						<fieldset>
							<label for="screen-reader">Sign up for our newsletter</label>
							<div class="event-search-wrap">
								<input type="text" placeholder="Search for a Trail Race" id="search-field" class="event-search-input">
								<button type="submit" class="btn event-search-btn"><span class="search-icon" aria-hidden="true" data-icon="&#xe602;"></span> <span class="search-text">Search</span></button>
							</div>
						</fieldset>
					</form> <!-- end .hm-event-search-form -->
					
					<p>You can also find <a href="<?php echo home_url(); ?>/race-calendar/">a complete list of events</a><!--, <a href="http://localhost:8888/trailrunner.com/archive/international/">international races</a>--> or <a href="<?php echo home_url(); ?>/race-calendar/submit-a-race/">submit a race</a>.</p>
					
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
							$boardies = array('post_type' => 'event', 'orderby' => rand, 'posts_per_page' => 3); 
							$boards = new WP_Query( $boardies );
							while ( $boards->have_posts() ) : $boards->the_post();
							 ?>
								<tr>
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
										<ul class="list-commas"><?php // Display the Event Distance ?>
											<li><?php echo implode(get_field('race_distance'), '</li><li>'); echo '</li><li>'; echo implode(get_field('marathon_distance'), '</li><li>'); echo '</li><li>'; echo get_field('other_distance1');  echo '</li><li>'; echo get_field('other_distance2'); ?></li>
										</ul><?php // end Event Distance ?>
									</td>
									<td>
										<?php // Display the Event Type
										echo "<p>"; echo get_field('event_type'); echo "</p>";
										// end Event Type ?>
									</td>
									<td>
										<?php // Display the Event State
										echo "<p>"; echo get_field('event_state'); echo "</p>";
										// end Event State ?>
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
					<img src="http://placehold.it/600x200">
					<h2>Find a trail to run</h2>
					<p>Get in-depth information about each trail, amenities, and directions.</p>
					<p><a href="http://localhost:8888/trailrunner.com/find-a-trail/" class="btn">Find now!</a></p>
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

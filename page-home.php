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
								<button type="submit" class="btn event-search-btn">Go!</button>
							</div>
						</fieldset>
					</form> <!-- end .hm-event-search-form -->
					
					<p>You can also find <a href="#">a complete list of events</a>, <a href="#">international races</a> or <a href="#">submit a race</a>.</p>
					
				</div> <!-- end #event-search .hm-event-search -->
				<div id="featured" class="featured-events">
				
					<h2>Featured Events</h2>
					<p>Races that meet the <a href="#">ATRA events standards</a>.</p>
					<table>
						<tr><td>Table</td><td>Table</td></tr>
						<tr><td>Table</td><td>Table</td></tr>
					</table>
					
				</div> <!-- end #events-featured .hm-event-featured -->
				<div id="trails" class="trail-maps">
				
					<h2>Find a trail to run</h2>
					<p>Get in-depth information about each trail, amenities, and directions.</p>
					<p><a href="#" class="btn">Find now!</a></p>
					<p>You can also find international trails or submit a trail.</p>
					
				</div> <!-- end #trail-maps .hm-trail-maps -->
				<div id="members" class="member-list">
					
					<h2>ATRA MEMBERS</h2>
					<p>We love all our members. Without whom, things wouldn't be possible.<br>
					<a href="#">Interested in becoming a member?</a></p>
					
					<div id="member-all-terrain" class="resource-item">
						<?php the_field('members_all-terrain', 114); // ------- All-terrain Members ?>
					</div>
					
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
					
				</div> <!-- end #member-list .hm-member-list -->

				<?php endwhile; ?>

				<?php get_sidebar(); ?>

			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

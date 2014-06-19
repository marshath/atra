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
					
					<ul class="member-list-corp">
						<h3>Corporate Members</h3>
						<li>Acidotic Racing</li>
						<li>Active at Altitude</li>
						<li>Atlas Snow-Shoe</li>
						<li>AZ Trail Race</li>
						<li>Badwater&reg;</li>
						<li>Basno</li>
						<li>Beach Running Championships</li>
						<li>Brazen Racing</li>
						<li>Desert Dash</li>
						<li>Fire Tool</li>
						<li>Fleet Feet-Boulder, CO</li>
						<li>GECKO</li>
						<li>Great Lakes Endurance</li>
						<li>Greater Omaha Area Trail Runners (G.O.A.T.z)</li>
						<li>ICESPIKE</li>
						<li>Injinji</li>
						<li>Inov-8</li>
						<li>International Mountain Biking Association </li>
						<li>International Skyrunning Federation</li>
						<li>iRunFar.com</li>
						<li>Junction 311 Endurance Sports</li>
						<li>La Sportiva</li>
						<li>LIVEALITY</li>
						<li>Marathon Majic, LLC</li>
						<li>Milt's Stop and Eat</li>
						<li>Monkey Races, LLC</li>
						<li>Mountain Ultra Trail Blog (Richard Bolt)</li>
						<li>OrthoLite</li>
						<li>Pikes Peak Marathon, Inc.</li>
						<li>PikesPeakSports.US</li>
						<li>Project Athena</li>
						<li>Ragnar Events LLC</li>
						<li>Rainshadow Running Club LLC</li>
						<li>Recover-Ease</li>
						<li>Run the Alps</li>
						<li>Runner's World</li>
						<li>RunningShoes.com</li>
						<li>Running Times</li>
						<li>Running USA</li>
						<li>Sage to Summit</li>
						<li>Salomon Running </li>
						<li>Shadowcliff Lodge</li>
						<li>Skelton Law Racing Series</li>
						<li>Snowshoe Magazine</li>
						<li>Switch Vision</li>
						<li>TCR Race Productions</li>
						<li>Tejas Trails</li>
						<li>Trail Runner Magazine</li>
						<li>UltraRunning Magazine</li>
						<li>Ultraspire</li>
						<li>Vail Mountain Running Series</li>
						<li>Vasque</li>
						<li>VFuel</li>
						<li>Wicked Fast Sports Nutrition</li>
						<li>Wilkes Barre Racing</li>
					</ul>
					
					<ul class="member-list-club">
						<h3>Club Members</h3>
						<li>Estes Park Running Club</li>
						<li>Gadsden Runners Club</li>
						<li>Greater Long Island Running Club</li>
						<li>Houston Area Trail Runners </li>
						<li>Mountain Divas</li>
						<li>Northern Arizona Trailrunners Assoc</li>
						<li>Project Athena Foundation</li>
						<li>Run Momma Run</li>
						<li>Sterling College</li>
						<li>Trailhead Running</li>
						<li>Trail Runner</li>
						<li>Trail Runners Club</li>
						<li>Trail WhipAss</li>
					</ul>
					
					<ul class="member-list-race">
						<h3>Race Members</h3>
						<li>A Spring Beauty Ultra Run</li>
						<li>Andes Adventures</li>
						<li>Angel Fire Endurance Run</li>
						<li>Angry Tortoise 25K</li>
						<li>Autumn Trail Series</li>
						<li>Bear Chase Race</li>
						<li>Chesebro5030</li>
						<li>Cheyenne Creek Trails "Driftless"1/2 Marathon</li>
						<li>Cow Pie Trail Run</li>
						<li>Dirt Devil Race Series</li>
						<li>Green Lakes Endurance Runs</li>
						<li>Hampshire 100</li>
						<li>Hardscrabble Mountain Trail Run</li>
						<li>Moab Trail Marathon</li>
						<li>Mt Ashland Hill Climb Run</li>
						<li>Quadzilla 15K</li>
						<li>River, Roots & Ruts Trail Half-Marathon</li>
						<li>River Valley Run</li>
						<li>Ruidoso Grindstone Trail Runs</li>
						<li>Run at the Rock</li>
						<li>Running DAVENTURA</li>
						<li>Save the Wildlife 5K</li>
						<li>South Shore Trail Series</li>
						<li>Taos Ski Valley Up and Over 10K</li>
						<li>Teva Paint Mines 6K</li>
						<li>TransRockies</li>
						<li>Vail Victory Races / Trail Marathon</li>
						<li>Vasque Golden Leaf Half Marathon</li>
						<li>WRUT 'n Run</li>
						<li>XTERRA SoCal Trail Run Series</li>
					
					</ul>
					
				</div> <!-- end #member-list .hm-member-list -->

				<?php endwhile; ?>

				<?php get_sidebar(); ?>

			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

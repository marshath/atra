<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">
				<div id="main" role="main">
					
					<h1><?php wp_title(''); ?></h1>

					<?php while (have_posts()) : the_post(); ?>

					<div id="event-search" class="event-search">
					
						<h2>Find a Trail Race</h2>
						<?php get_search_form(); ?>
						
					</div> <!-- end #event-search .hm-event-search -->
					<div id="featured" class="featured-events">
	
						<h2>Featured Events</h2>
						<?php get_template_part('content', 'event-legend'); // include the race legend ?>
	
						<?php 
						//----------------------------------------
						// ----------- Table of Events -----------
						//---------------------------------------- ?>
						<table>
							<thead>
								<?php get_template_part('content', 'event-table-head'); // include the event list table head ?>
							</thead>
							<tbody>
	
							<?php // ******** Display Events ******** 
								$today = date("Ymd");
								//'BETWEEN' comparison with 'type' date only works with dates in format Ymd. 
								//See http://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters 
								$date1 = date("Ymd", strtotime($today . "+3 Weeks")); 
								$date2 = date("Ymd", strtotime($today . "+26 Weeks"));
								
								$boardies = array( 
									'post_type' => 'event',
									'posts_per_page' => 5,
									'orderby' => 'meta_value',
									'order' => 'ASC',
									'meta_query' => array( 
										array( 
											'key' => 'event_date',
											'value' => array($date1,$date2),
											'type' => 'date',
											'compare' => 'BETWEEN'
										)
									),
									'tax_query' => array(
										array(
											'taxonomy' => 'qualifications',
											'field' => 'slug',
											'terms' => array('meets-atra-event-standards','atra-race-member')
										)
									)
								);
								
								$boards = new WP_Query( $boardies );
								while ( $boards->have_posts() ) : $boards->the_post(); ?>
								
									<?php get_template_part('content', 'event-table'); // include the event list table head ?>
									
								<?php endwhile; ?>
							<?php wp_reset_postdata(); // end Display Events ?>
	
							</tbody>
						</table>
	
					</div> <!-- end #events-featured .hm-event-featured -->
						
						
					<?php  // display the finder callouts
						get_template_part('content', 'home'); ?>
	
	
					<?php 
					//--------------------------------
					// ----------- Members -----------
					//-------------------------------- ?>
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
					
				</div> <?php // end #main .main ?>
			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

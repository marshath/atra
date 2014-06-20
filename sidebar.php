			<div id="sidebar1" class="sidebar" role="complementary">
			
				<?php 
				//----------------------------------------
				// ----------- About ATRA Menu -----------
				//----------------------------------------
				if ( (is_page('about-atra')) or (127 == $post->post_parent) ) {  ?>
				
					<div class="sidebar-connect">
						<h3>More about ATRA</h3>
						<ul>
							<li><a href="/trailrunner.com/about-atra/">About ATRA</a></li>
							<li><a href="/trailrunner.com/about-atra/board-members-and-meeting-minutes/">Board Members and Meeting Minutes</a></li>
							<li><a href="/trailrunner.com/about-atra/events-standards-program/">Events Standards Program</a></li>
							<li><a href="/trailrunner.com/about-atra/partner-organizations/">Partner Organizations</a></li>
							<li><a href="/trailrunner.com/about-atra/contact-us/">Contact Us</a></li>
					</div> <!-- end .sidebar-connect -->

				<?php } ?>
			
				<?php 
				//-------------------------------------------------
				// ----------- Social Marketing Sidebar -----------
				//-------------------------------------------------
				if ( (is_page('resources')) ) { 
					if ( is_active_sidebar( 'sidebar-marketing' ) ) : ?>
				
					<div class="sidebar-connect">
						<?php dynamic_sidebar( 'sidebar-marketing' ); ?>
					</div> <!-- end .sidebar-connect -->
						
					<?php else : ?>

						<div class="no-widgets">
							<p><?php _e( 'SOCIAL MARKETING: This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; 
		
				} ?>
			
				<?php 
				//------------------------------------------------
				// ----------- Become a Member Sidebar -----------
				//------------------------------------------------
				if ( (!is_page('find-a-trail')) ) { 
					if ( is_active_sidebar( 'sidebar-members' ) ) : ?>
				
					<div class="sidebar-member">
						<?php dynamic_sidebar( 'sidebar-members' ); ?>
					</div> <!-- end .sidebar-member -->
						
					<?php else : ?>

						<div class="no-widgets">
							<p><?php _e( 'BECOME A MEMBER: This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; 
		
				} ?>
			
				<?php 
				//---------------------------------------------
				// ----------- Social Media Sidebar -----------
				//---------------------------------------------
				if ( (is_page('race-calendar')) or (119 == $post->post_parent) ) {
					if ( is_active_sidebar( 'sidebar-socials' ) ) : ?>
				
					<div class="sidebar-social">
						<?php dynamic_sidebar( 'sidebar-socials' ); ?>
					</div> <!-- end .sidebar-connect -->
						
					<?php else : ?>

						<div class="no-widgets">
							<p><?php _e( 'SOCIAL MEDIA: This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; 
		
				} ?>
			
				<?php 
				//-------------------------------------------------
				// ----------- Race Calendar Sidebar AD -----------
				//-------------------------------------------------
				if ( (is_page('race-calendar')) or (119 == $post->post_parent) ) {
					if ( is_active_sidebar( 'sidebar-events' ) ) : ?>
					
						<?php dynamic_sidebar( 'sidebar-events' ); ?>
						
					<?php else : ?>

						<div class="no-widgets">
							<p><?php _e( 'SIDEBAR - EVENTS: This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; 
				} ?>
			
				<?php 
				//----------------------------------------------
				// ----------- Trail News Sidebar AD -----------
				//----------------------------------------------
				if ( (is_single()) ) { ?>
				
					<?php if ( is_active_sidebar( 'sidebar-news' ) ) : ?>
					
						<?php dynamic_sidebar( 'sidebar-news' ); ?>
	
					<?php else : ?>
	
						<div class="no-widgets">
							<p><?php _e( 'SIDEBAR - NEWS: This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>
	
					<?php endif; 
				}?>
			
				<?php 
				//---------------------------------------------
				// ----------- Resources Sidebar AD -----------
				//---------------------------------------------
				if ( (is_page('resources')) ) {
					if ( is_active_sidebar( 'sidebar-resources' ) ) : ?>
					
						<?php dynamic_sidebar( 'sidebar-resources' ); ?>
	
					<?php else : ?>
	
						<div class="no-widgets">
							<p><?php _e( 'SIDEBAR - RESOURCES: This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>
	
					<?php endif;
				} ?>
			
				<?php 
				//---------------------------------------------
				// ----------- Trail News Blog Roll -----------
				//---------------------------------------------
				if ( (!is_page('find-a-trail')) ) { ?>
					<div class="sidebar-news">
						<h4>Trail News</h4>
						<p>Keep up with the latest news and event information.</p>
						<ul>
						<?php
							$args = array( 'numberposts' => '4', 'post_status' => 'publish' );
							$recent_posts = wp_get_recent_posts( $args );
							foreach( $recent_posts as $recent ){
								echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Read '.esc_attr($recent["post_title"]).'" ><figure>' .  get_the_post_thumbnail($recent["ID"], "thumbnail") . '</figure><p>' . $recent["post_title"] . '</p></a></li>';
							}
						?>
						</ul>
					</div> <!-- end .sidebar-news -->
		
				<?php } ?>

			</div> <?php // end #sidebar1 ?>
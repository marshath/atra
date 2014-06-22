			<div id="sidebar1" class="sidebar" role="complementary">
			
				<?php 
				//----------------------------------------
				// ----------- About ATRA Menu -----------
				//----------------------------------------
				if ( (is_page('about-atra')) or (127 == $post->post_parent) ) {  ?>
				
					<div class="sidebar-about-us">
						<h4>More about ATRA</h4>
						<ul>
						<?php
							wp_list_pages("title_li=&include=127"); // About ATRA link
							wp_list_pages("title_li=&child_of=127"); // About ATRA children links ?>
						</ul>
					</div> <!-- end .sidebar-about-us -->

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
				//----------------------------------------------
				// ----------- Board Meeting Minutes -----------
				//----------------------------------------------
				if ( (is_page('board-members-and-meeting-minutes')) ) { ?>
					<?php the_field('meeting_minute_links'); ?>
				<?php } ?>
			
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
					
						<div class="sidebar-ad">
							<?php dynamic_sidebar( 'sidebar-events' ); ?>
						</div>
						
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
					
						<div class="sidebar-ad">
							<?php dynamic_sidebar( 'sidebar-news' ); ?>
						</div>
	
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
					
						<div class="sidebar-ad">
							<?php dynamic_sidebar( 'sidebar-resources' ); ?>
						</div>
	
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
			<div id="sidebar1" class="sidebar" role="complementary">
			
				<?php if ( (is_page('resources')) ) { // ---- Connect with ATRA ?>
				
					<div class="sidebar-connect">
						<h3>Connect with ATRA</h3>
						<p>and improve your performance</p>
						<ul>
							<li class="facebook">F</li>
							<li class="twitter">T</li>
							<li class="google">G</li>
							<li class="rss">R</li>
						</ul>
					</div> <!-- end .sidebar-connect -->
		
				<?php } ?>
			
				<?php if ( (!is_page('find-a-trail')) ) { // ---- Become a Member ?>
				
					<div class="sidebar-member">
						<h3>Benefits of being a Member</h3>
						<p>By becoming a member, you help ensure we continue to grow as an organization. You get preferred access to this and special discounts on that. Find out about more of the benefits that come with your support.</p>
						<p><a href="#" class="btn">I'll show my support</a></p>
					</div> <!-- end .sidebar-member -->
		
				<?php } ?>
			
				<?php if ( (is_page('race-calendar')) or (119 == $post->post_parent) ) {  // ---- Join the Conversation ?>
				
					<div class="sidebar-social">
						<h3>Join the Conversation</h3>
						<p>Follow our conversation on social media to stay informed.</p>
						<ul>
							<li class="facebook">F</li>
							<li class="twitter">T</li>
							<li class="google">G</li>
							<li class="rss">R</li>
						</ul>
					</div> <!-- end .sidebar-connect -->
		
				<?php } ?>
			
				<?php 
				//----------------------------------------------
				// ----------- Race Calendar Sidebar AD -----------
				//----------------------------------------------
				if ( (is_page('race-calendar')) or (119 == $post->post_parent) ) {
					if ( is_active_sidebar( 'sidebar-events' ) ) : ?>
					
						<h3>Race Calendar Sidebar</h3>
						<?php dynamic_sidebar( 'sidebar-events' ); ?>
						
					<?php else : ?>

						<div class="no-widgets">
							<p><?php _e( 'SIDEBAR - EVENTS: This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; 
				} ?>
			
				<?php 
				//-------------------------------------------
				// ----------- Trail News Sidebar AD -----------
				//-------------------------------------------
				if ( (is_single()) ) { ?>
				
					<?php if ( is_active_sidebar( 'sidebar-news' ) ) : ?>
					
						<h3>Trail News Sidebar</h3>
						<?php dynamic_sidebar( 'sidebar-news' ); ?>
	
					<?php else : ?>
	
						<div class="no-widgets">
							<p><?php _e( 'SIDEBAR - NEWS: This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>
	
					<?php endif; 
				}?>
			
				<?php 
				//------------------------------------------
				// ----------- Resources Sidebar AD -----------
				//------------------------------------------
				if ( (is_page('resources')) ) {
					if ( is_active_sidebar( 'sidebar-resources' ) ) : ?>
					
						<h3>Resources Sidebar</h3>
						<?php dynamic_sidebar( 'sidebar-resources' ); ?>
	
					<?php else : ?>
	
						<div class="no-widgets">
							<p><?php _e( 'SIDEBAR - RESOURCES: This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>
	
					<?php endif;
				} ?>
				
				<?php if ( (!is_page('find-a-trail')) ) { // ---- Recent Trail News --Blog posts-- ?>
					<div class="sidebar-news">
						<h3>Trail News</h3>
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
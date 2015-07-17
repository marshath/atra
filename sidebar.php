			<div id="sidebar1" class="sidebar" role="complementary">
			
				<?php 
				//----------------------------------------
				// ----------- About ATRA Menu -----------
				//----------------------------------------
				if ( (is_page('about-atra')) or (127 == $post->post_parent) ) {  ?>
				
					<div class="sidebar-about-us">
						<h4>More about ATRA</h4>
						<ul class="bullets">
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
				if ( (is_page (array('find-a-trail', 'resources')) ) ) { 
					if ( is_active_sidebar('sidebar-marketing') ) : ?>
				
					<div class="sidebar-connect">
						<?php dynamic_sidebar('sidebar-marketing'); ?>
					</div> <!-- end .sidebar-connect -->

					<?php endif; 
		
				} ?>
			
				<?php 
				//----------------------------------------------
				// ----------- Board Meeting Minutes -----------
				//----------------------------------------------
				if (is_page('board-members-and-meeting-minutes')) { ?>
					<div class="sidebar-meeting-minutes">
						<?php the_field('meeting_minute_links'); ?>
					</div>
				<?php } ?>
			
				<?php 
				//------------------------------------------------
				// ----------- Become a Member Sidebar -----------
				//------------------------------------------------
				if (!is_page (array('membership', 'board-members-and-meeting-minutes', 'contact-us')) ) { 
					if ( is_active_sidebar('sidebar-members') ) : ?>
				
					<div class="sidebar-member">
						<img src="<?php echo get_template_directory_uri(); ?>/library/images/img-stars.svg" class="bene-icon">
						<?php dynamic_sidebar('sidebar-members'); ?>
					</div> <!-- end .sidebar-member -->

					<?php endif; 
		
				} ?>
			
				<?php 
				//---------------------------------------------
				// ----------- Social Media Sidebar -----------
				//---------------------------------------------
				if (is_page (array('race-calendar', 'membership', 'contact-us', 'partner-organizations', 'events-standards-program', 'about-atra')) ) {
					if ( is_active_sidebar('sidebar-socials') ) : ?>
				
					<div class="sidebar-social">
						<?php dynamic_sidebar('sidebar-socials'); ?>
					</div> <!-- end .sidebar-connect -->

					<?php endif; 
		
				} ?>
			
				<?php 
				//-------------------------------------------------
				// ----------- Race Calendar Sidebar AD -----------
				//-------------------------------------------------
				if ( (is_page('race-calendar')) or (119 == $post->post_parent) or (is_post_type_archive('event')) ) {
					if ( is_active_sidebar('sidebar-events') ) : ?>
					
						<div class="sidebar-ad">
							<?php dynamic_sidebar('sidebar-events'); ?>
						</div>

					<?php endif; 
				} ?>
			
				<?php 
				//---------------------------------------------
				// ----------- Find a Trail Sidebar AD -----------
				//---------------------------------------------
				if ( (is_page('find-a-trail')) ) {
					if ( is_active_sidebar('sidebar-trail') ) : ?>
					
						<div class="sidebar-ad">
							<?php dynamic_sidebar('sidebar-trail'); ?>
						</div>
	
					<?php endif;
				} ?>
			
				<?php 
				//---------------------------------------------
				// ----------- Find a Trail Shoe Sidebar AD -----------
				//---------------------------------------------
				if ( (is_page('find-a-trail-shoe')) ) {
					if ( is_active_sidebar('sidebar-trailshoe') ) : ?>
					
						<div class="sidebar-ad">
							<?php dynamic_sidebar('sidebar-trailshoe'); ?>
						</div>
	
					<?php endif;
				} ?>
			
				<?php 
				//---------------------------------------------
				// ----------- Resources Sidebar AD -----------
				//---------------------------------------------
				if ( (is_page('resources')) ) {
					if ( is_active_sidebar('sidebar-resources') ) : ?>
					
						<div class="sidebar-ad">
							<?php dynamic_sidebar('sidebar-resources'); ?>
						</div>
	
					<?php endif;
				} ?>
			
				<?php 
				//---------------------------------------------
				// ----------- Trail News Blog Roll -----------
				//---------------------------------------------
				if (!is_page (array('find-a-trail', 'membership', 'resources', 'about-atra', 'events-standards-program', 'partner-organizations', 'contact-us', 'board-members-and-meeting-minutes')) ) { ?>
					<div class="sidebar-news">
						<div class="news-header">
							<h4>Trail News</h4>
							<p>The latest news and event information.</p>
						</div>
						<ul>
							<?php $args = array( 'numberposts' => '4', 'post_status' => 'publish' );
								$recent_posts = wp_get_recent_posts( $args );
								foreach( $recent_posts as $recent ){
									echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Read '.esc_attr($recent["post_title"]).'" ><figure>' .  get_the_post_thumbnail($recent["ID"], "thumbnail") . '</figure><p>' . $recent["post_title"] . '</p></a></li>';
							} ?>
						</ul>
					</div> <!-- end .sidebar-news -->
		
				<?php } ?>
			
				<?php 
				//-----------------------------------
				// ----------- Contact Us -----------
				//-----------------------------------
				if (is_page (array('membership', 'about-atra','partner-organizations', 'events-standards-program', 'board-members-and-meeting-minutes')) ) {
					if ( is_active_sidebar('sidebar-contact') ) : ?>
					
						<div class="sidebar-contact">
							<?php dynamic_sidebar('sidebar-contact'); ?>
						</div>
						
					<?php endif;
				} ?>

			</div> <?php // end #sidebar1 ?>
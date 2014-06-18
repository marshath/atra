			<div id="sidebar1" class="sidebar" role="complementary">
			
				<?php 
				//----------------------------------------------
				// ----------- Race Calendar Sidebar -----------
				//----------------------------------------------
				if ( (is_page('race-calendar')) ) {
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
				// ----------- Trail News Sidebar -----------
				//-------------------------------------------
				if ( (is_single()) or (is_page('trail-news')) ) {
					if ( is_active_sidebar( 'sidebar-news' ) ) : ?>
					
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
				// ----------- Resources Sidebar -----------
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

			</div> <?php // end #sidebar1 ?>
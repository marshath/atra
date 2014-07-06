			<div id="sidebar1" class="sidebar" role="complementary">
			
				<?php 
				//-------------------------------------------------
				// ----------- Social Marketing Sidebar -----------
				//-------------------------------------------------
				if ( is_active_sidebar( 'sidebar-marketing' ) ) : ?>
				
					<div class="sidebar-connect">
						<?php dynamic_sidebar( 'sidebar-marketing' ); ?>
					</div> <!-- end .sidebar-connect -->

				<?php endif; ?>
			
				<?php 
				//-----------------------------------
				// ----------- Search Box -----------
				//-----------------------------------?>
				
				<div id="news-search" class="news-search">
				
					<h4>Find a Trail Race</h4>
					<?php get_search_form(); ?>
					
				</div> <!-- end #event-search .hm-event-search -->
			
				<?php 
				//----------------------------------------------
				// ----------- Trail News Sidebar AD -----------
				//----------------------------------------------
				
				if ( is_active_sidebar( 'sidebar-news' ) ) : ?>
				
					<div class="sidebar-ad">
						<?php dynamic_sidebar( 'sidebar-news' ); ?>
					</div>

				<?php endif; ?>
			
				<?php 
				//---------------------------------------------------
				// ----------- Trail News Blog Categories -----------
				//--------------------------------------------------- ?>
				<div class="sidebar-catgories">
					<div class="cat-header">
						<h4>Categories</h4>
					</div>
					<ul>
						<?php wp_list_categories('exclude=4,7&title_li='); ?>
					</ul>
				</div> <!-- end .sidebar-catgories -->

			</div> <?php // end #sidebar1 ?>
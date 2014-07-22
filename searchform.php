	<?php 
	//-----------------------------------------------------
	// ----------- Race Calendar Callout Search -----------
	//-----------------------------------------------------
	
	if (is_page( array('home', '119')) or (is_page_template('archive-event')) ) { ?>
		
		<?php get_template_part ('http://localhost:8888/trailrunner.com/atra14/wp-content/themes/bones/searchform-event.php'); ?>
         <form role="search" method="get" class="event-search-form" action="<?php echo home_url( '/event/' ); ?>">
			<fieldset>
				<input type="hidden" value="1" name="sentence" />
				<label for="screen-reader">Search for a trail race.</label>
				<div class="event-search-wrap">
					<input type="text" placeholder="<?php the_search_query(); ?>" id="s" name="s" class="event-search-input" value="">
					<button type="submit" class="btn event-search-btn">
						<span class="search-icon" aria-hidden="true" data-icon="&#xe602;"></span>  
						<span class="search-text">Search</span>
					</button>
				</div>
			</fieldset>
		</form> <!-- end .event-search-form -->
		
	<?php } else {
	
	//--------------------------------------------------
	// ----------- Trail News Sidebar Search -----------
	//-------------------------------------------------- ?>
		<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			<input type="hidden" value="post" name="post_type" id="post_type" /> <?php // --- filter search results - trail news only --- ?>
			<label>
				<span class="screen-reader-text">Search for:</span>
				<input type="search" class="search-field" placeholder="<?php the_search_query(); ?>" value="" name="s" title="Search for:" />	
			</label>
			<input type="submit" class="search-submit btn" value="Search" />
		</form>
	
	<?php } ?>
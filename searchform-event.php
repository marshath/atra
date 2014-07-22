	<?php 
	//-----------------------------------------------------
	// ----------- Race Calendar Callout Search -----------
	//----------------------------------------------------- ?>

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
		
	<?php } ?>
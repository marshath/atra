<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div id="event-search" class="event-search">
					
						<h1>Find a Trail Race</h1>
						
						<form action="#" method="post" class="event-search-form">
							<fieldset>
								<label for="screen-reader">Sign up for our newsletter</label>
								<div class="event-search-wrap">
									<input type="text" placeholder="Search for a Trail Race" id="search-field" class="hm-event-search-input">
									<button type="submit" class="btn event-search-btn">Go!</button>
								</div>
							</fieldset>
						</form> <!-- end .event-search-form -->
						
						<p>You can also <!-- find <a href="http://localhost:8888/trailrunner.com/archive/international/">international races</a> or --> <a href="http://localhost:8888/trailrunner.com/race-calendar/submit-a-race/">submit a race</a>.</p>
					
					</div> <!-- end #event-search .event-search -->
					
					<?php 
					//---------------------------------------------
					// ----------- Race Calendar Banner -----------
					//---------------------------------------------
					if ( (is_page('race-calendar')) ) {
						if ( is_active_sidebar( 'sidebar-events' ) ) : ?>
						
							<div class="banner-ad">
								<?php dynamic_sidebar( 'banner-events' ); ?>
							</div>
	
						<?php endif; 
					} ?>
					
					<?php 
					//----------------------------------------
					// ----------- Table of Events -----------
					//---------------------------------------- ?>
					<div class="events-wrap">
						<h2>Complete Event Catalog</h2>
						<table>
							<thead>
								<tr>
									<th>*</th>
									<th>Date</th>
									<th>Name/Link</th>
									<th>Distance(s)</th>
									<th>Type</th>
									<th>State</th>
									<th>Country</th>
								</tr>
							</thead>
							<tbody>
							
							<?php // ******** Display Events ******** 
								$boardies = array('post_type' => 'event'); 
								$boards = new WP_Query( $boardies );
								while ( $boards->have_posts() ) : $boards->the_post();
								 ?>
									<tr>
										<td>
											<?php // Display the ATRA Approved Event ?>
										</td>
										<td>
											<?php // Display the Event Date
											$endDateText = date_i18n("M d, Y", strtotime(get_field('event_date')));
											echo $endDateText;
											 // end Event Date ?>
										</td>
										<td><?php // Display the Event Name and Link ?>
											<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
										</td><?php // end Event Name and Link ?>
										<td>
											<ul class="list-commas"><?php // Display the Event Distance ?>
												<li><?php echo implode(get_field('race_distance'), '</li><li>'); echo '</li><li>'; echo implode(get_field('marathon_distance'), '</li><li>'); echo '</li><li>'; echo get_field('other_distance1');  echo '</li><li>'; echo get_field('other_distance2'); ?></li>
											</ul><?php // end Event Distance ?>
										</td>
										<td>
											<?php // Display the Event Type
											echo "<p>"; echo get_field('event_type'); echo "</p>";
											// end Event Type ?>
										</td>
										<td>
											<?php // Display the Event State
											echo "<p>"; echo get_field('event_state'); echo "</p>";
											// end Event State ?>
										</td>
										<td>
											<?php // Display the Event Country
											echo "<p>"; echo get_field('event_country');
											 // end Event Country ?>
										</td>
									</tr>
								<?php endwhile; ?>
							<?php wp_reset_postdata(); // end Display Events ?>
							
							</tbody>
							<tfoot>
								<tr>
									<th>*</th>
									<th>Date</th>
									<th>Name/Link</th>
									<th>Distance(s)</th>
									<th>Type</th>
									<th>State</th>
									<th>Country</th>
								</tr>
							</tfoot>
						</table>
					</div> <?php // end .events-wrap ?>

					<?php endwhile; else : ?>

							<article id="post-not-found" class="hentry">
								<header class="article-header">
									<h1><?php _e( 'Oops, Event Not Found!', 'bonestheme' ); ?></h1>
								</header> <?php // end .article-header ?>
								<section class="entry-content">
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section> <?php // end .entry-content ?>
								<footer class="article-footer">
										<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
								</footer> <?php // end .article-footer ?>
							</article>

					<?php endif; ?>

				</div> <?php // end #main .wrap-main ?>

				<?php get_sidebar(); ?>

			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

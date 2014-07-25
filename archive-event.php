<?php /*
* EVENT ARCHIVE TEMPLATE
*/ ?>

<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">

					<div id="event-search" class="event-search">
						
						<h1>Find a Trail Race</h1>
						<?php // Display the advanced search form -- also in searchform.php ?>
						<form role="search" method="get" class="event-search-form" action="<?php echo home_url( '/event/' ); ?>">
							<fieldset>
								<input type="hidden" value="1" name="sentence" />
								<label for="screen-reader">Search for a trail race.</label>
								<div class="event-search-wrap">
									<input type="text" placeholder="<?php the_search_query(); ?>" id="s" name="s" class="event-search-input" value="">
									
									<h4 id="search-toggle" class="search-toggle"><a href="#">Advanced Search</a></h4>
									<div id="search-filter" class="search-filter">
										<?php $taxonomies = get_object_taxonomies('event');
											foreach($taxonomies as $tax){
												echo buildSelect($tax);
											}
										?>
									</div>
									
									<button type="submit" class="btn event-search-btn">
										<span class="search-icon" aria-hidden="true" data-icon="&#xe602;"></span>  
										<span class="search-text">Search</span>
									</button>
								</div>
								<p><a href="<?php echo home_url(); ?>/race-calendar/submit-a-race/">Submit a race &raquo;</a></p>
							</fieldset>
						</form> <!-- end .event-search-form -->
					
					</div> <!-- end #event-search .event-search -->
						
					<?php 
					//---------------------------------------------
					// ----------- Race Calendar Banner -----------
					//---------------------------------------------
					if ( is_active_sidebar( 'sidebar-events' ) ) : ?>
					
						<div class="banner-ad">
							<?php dynamic_sidebar( 'banner-events' ); ?>
						</div>

					<?php endif; ?>
						
						<?php 
						//----------------------------------------
						// ----------- Table of Events -----------
						//---------------------------------------- ?>
						<div class="events-wrap">
							<h2>Complete Event Catalog</h2>
							<table>
								<thead>
									<tr>
										<th>ESP</th>
										<th>Date</th>
										<th>Name/Link</th>
										<th>Distance(s)</th>
										<th>Type</th>
										<th>State</th>
										<th>Country</th>
									</tr>
								</thead>
								<tbody>
						
									<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								
									<?php // ******** Display Events ******** ?>
									<tr class="<?php // Display the ATRA Approved Event
											$terms = get_the_terms( $post->ID , 'qualifications' );
											foreach ( $terms as $term ) {
												echo $term->slug; echo " ";
											} ?>">
										<td>
											
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
											<ul class="list-commas">
												<?php $terms = get_the_terms( $post->ID , 'distances' ); // Display the Event Distance
													foreach ( $terms as $term ) {
														echo '<li>'; echo $term->name; echo '</li>';
												} // end Event Distance ?>
											</ul><?php // end Event Distance ?>
										</td>
										<td>
											<?php // Display the Event Type
											echo "<p>"; echo get_field('event_type'); echo "</p>";
											// end Event Type ?>
										</td>
										<td>
											<span class="uppercase"><?php // Make the State Slug Uppercase
												$terms = get_the_terms( $post->ID, 'states'); // Display the State Slug
												if ($terms) {
													$terms_slugs = array();
													foreach ( $terms as $term ) {
														$terms_slugs[] = $term->slug;
													}
													$series = $terms_slugs[0];
													echo "{$series}";
												} else {
													echo "";
												} // end Display State?>
											</span>
										</td>
										<td>
											<?php // Display the Event Country
											echo "<p>"; echo get_field('event_country');
											 // end Event Country ?>
										</td>
									</tr>
								
									<?php endwhile; ?>
								</tbody>
								<tfoot>
									<tr>
										<th>ESP</th>
										<th>Date</th>
										<th>Name/Link</th>
										<th>Distance(s)</th>
										<th>Type</th>
										<th>State</th>
										<th>Country</th>
									</tr>
								</tfoot>
							</table>
							<p><b>ESP</b> = Meets ATRA's <a href="<?php echo home_url(); ?>/about-atra/events-standards-program/">Event Standards Program</a> requirements.</p>
						</div> <?php // end .events-wrap ?>
						
						<?php bones_page_navi(); ?>
						<?php else : // do not delete - closes table from above ?>
								</tbody>
								<tfoot>
									<tr>
										<th>ESP</th>
										<th>Date</th>
										<th>Name/Link</th>
										<th>Distance(s)</th>
										<th>Type</th>
										<th>State</th>
										<th>Country</th>
									</tr>
								</tfoot>
							</table>
							<p><b>ESP</b> = Meets ATRA's <a href="<?php echo home_url(); ?>/about-atra/events-standards-program/">Event Standards Program</a> requirements.</p>
						</div> <?php // end .events-wrap ?>

						<article id="post-not-found" class="hentry">
							<header class="page-title">
								<h1><?php _e( 'Oops, no post found!', 'bonestheme' ); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e( 'Uh Oh. Try double checking things or search for something different.', 'bonestheme' ); ?></p>
							</section>
						</article>

						<?php endif; ?>

					</div> <?php // end #main ?>

				<?php get_sidebar(); ?>

			</div> <?php // end #inner-content ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

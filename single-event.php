<?php /*
* EVENTS TEMPLATE
*/ ?>

<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">
					
				<?php 
				//---------------------------------------------
				// ----------- Race Calendar Banner -----------
				//---------------------------------------------
				if ( is_active_sidebar( 'sidebar-events' ) ) : ?>
					<div class="banner-ad">
						<?php dynamic_sidebar( 'banner-events' ); ?>
					</div>
				<?php endif; ?>
				

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<div id="post-<?php the_ID(); ?>" <?php post_class('single-title'); ?> itemscope itemtype="http://schema.org/Event">
					
						<header class="event-header">
							<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
						</header><?php // end .event-header ?>
						
						<section class="entry-content">
								 
							<figure class="featured-image">
								<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									the_post_thumbnail("atra-700");
									} ?>
							</figure>
						
							<div class="content-top">
								<div class="event-date half">
									<p><?php // Display the Event Date
										$endDateText = date_i18n('M d, Y', strtotime(get_field('event_date')));
										$dateDateText = date_i18n('Y-m-d', strtotime(get_field('event_date')));
										$dateDateTime = get_field('start_time');
										$dateDateTimer = substr( $dateDateTime, 0, -3);
										echo '<meta itemprop="startDate" content="' . $dateDateText . 'T' . $dateDateTimer . '">' . $endDateText . ' at ' . $dateDateTime ; ?></p>
								</div>
								<div class="event-smedia half">
									<?php // Go to www.addthis.com/dashboard to customize your tools ?>
									<div class="share-text">Share: </div><div class="addthis_sharing_toolbox"></div>
								</div>
							</div> <?php // end .content-top ?>
							
							<div class="content-venue">
								<div class="half" itemprop="location" itemscope itemtype="http://schema.org/Place">
									<p class="screen-reader-text" itemprop="name"><?php the_title(); ?></p>
									<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
										<?php if (the_field('event_street')) { ?>
										<p><span itemprop="streetAddress"><?php echo the_field('event_street'); ?></span></p><?php } ?>
										<p><span itemprop="addressLocality"><?php echo the_field('event_city'); ?></span> <?php // Make the State Slug Uppercase
												$terms = get_the_terms( $post->ID, 'states'); // Display the State Slug
												if ($terms) {
													$terms_slugs = array();
													foreach ( $terms as $term ) {
														$terms_slugs[] = $term->slug;
													}
													$series = $terms_slugs[0];      
											        $series = strtoupper($series); // make uppercase
											        echo "<span itemprop='addressRegion'>{$series}</span>, ";
												} else {
													echo "";
												} // end Display State?> <span itemprop="postalCode"><?php echo the_field('event_zip'); ?></span></p>
										<p><?php echo the_field('event_country'); ?></p>
									</div>
								</div> <?php // end .event-location ?>
								<div class="half">
									<p><a href="<?php echo the_field('event_website'); ?>" target="_blank" rel="external"><?php echo the_field('event_website'); ?></a></p>
									<p><a href="mailto:<?php echo the_field('rd_email'); ?>">Contact Race Director</a></p>
								</div> <?php // end .event-contact ?>
							</div> <?php //  end .content-venue ?>
							
							<div class="content-details">
								<div class="half">
									<?php // Display the Facebook page, if available
									$fbpage = get_post_meta($post->ID, 'event_facebook_page', true);
									if ($fbpage) {
										echo "<p><a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_facebook_page', true ) ); echo "' target='_blank'>Event Facebook page</a></p>";
									} else {
										echo "";
									} // end Facebook page 
									// Display the Twitter feed, if available
									$twitfeed = get_post_meta($post->ID, 'event_twitter_feed', true);
									if ($twitfeed) {
										echo "<p><a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_twitter_feed', true ) ); echo "' target='_blank'>Event Twitter feed</a></p>";
									} else {
										echo "";
									} // end Twitter feed ?>
									<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
										<p><b>Entry Fee</b> <span itemprop="priceCurrency" content="USD">$</span><span itemprop="price" content="<?php echo the_field('entry_fee'); ?>"><?php echo the_field('entry_fee'); ?></span><link itemprop="url" href="<?php echo the_field('event_website'); ?>" /><br>
										<small>(Lowest or Early Registration)</small></p>
										<p class="screen-reader-text"><link itemprop="availability" href="<?php echo the_field('event_website'); ?>" /></p>
									</div>
									<?php $entryfee2 = get_post_meta($post->ID, 'entry_fee_2', true); // Display the Entry Fee 2, if available
										if ($entryfee2) { ?>
											<p><b>Entry Fee 2</b> $<?php echo the_field('entry_fee_2'); ?><br>
										<small>(Highest or Late Registration)</small></p>
									<?php } ?>
									<p><b>Prize Money:</b> <span class="capitalize"><?php echo get_field('prize_money'); ?></span></p>
									<p><b>Distance(s):</b></p>
									<ul class="list-commas">
										<?php $termsd = get_the_terms( $post->ID, 'distances'); // Display the Event Distance
									    if ($termsd) {
									        $termsd_slugs = array();
									        foreach ( $termsd as $termd ) {
										        echo "<li>$termd->name</li>";
									        }
									    } else {
									        echo "";
										} // end Event Distance
										// Display the Other Distances 1, if available
										$o1dist = get_post_meta($post->ID, 'other_distance1', true);
										if ($o1dist) {
											echo "<li>"; echo esc_html( get_post_meta( get_the_ID(), 'other_distance1', true ) ); echo "</li>";
										} else {
											echo "";
										} // end Other Distances 1
										// Display the Other Distances 2, if available
										$o2dist = get_post_meta($post->ID, 'other_distance2', true);
										if ($o2dist) {
											echo "<li>"; echo esc_html( get_post_meta( get_the_ID(), 'other_distance2', true ) ); echo "</li>"; 
										} else {
											echo "";
										} // end Other Distances 2 ?>
									</ul> <?php // end .list-commas ?>
								</div>
								<div class="half">
									<?php // Display the Event Series, if available
										$eseries = get_post_meta($post->ID, 'event_series', true);
										if ($eseries) {
											echo "<p><b>Series:</b> "; echo esc_html( get_post_meta( get_the_ID(), 'event_series', true ) ); echo "</p>";
										} else {
											echo "";
										}
									// end Event Series ?>
									<p><b>Type:</b> <?php echo the_field('event_type'); ?></p>
									<?php // Display the Participant Limit, if available
										$eplimit = get_post_meta($post->ID, 'event_participant_limit', true);
										if ($eplimit) {
											echo "<p><b>Participant Limit:</b> "; echo esc_html( get_post_meta( get_the_ID(), 'event_participant_limit', true ) ); echo "</p>";
										} else {
											echo "";
										} // end Participant Limit 
										 // Display the Course Map, if available
										$couse_map = get_post_meta($post->ID, 'course_map', true);
										if ($couse_map) {
											echo "<p><b>Course Map:</b> <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'course_map', true ) ); echo "'>Download Map</a></p>";
										} else {
											echo "";
										} // end Course Map 
										// Display the Starting Elevation, if available
										$elevation_start = get_post_meta($post->ID, 'starting_elevation', true);
										if ($elevation_start) {
											echo "<p><b>Starting Elevation:</b> "; echo esc_html( get_post_meta( get_the_ID(), 'starting_elevation', true ) ); echo "</p>";
										} else {
											echo "";
										} // end Starting Elevation 
										// Display the Highest Elevation, if available
										$elevation_high = get_post_meta($post->ID, 'high_point', true);
										if ($elevation_high) {
											echo "<p><b>High Point:</b> "; echo esc_html( get_post_meta( get_the_ID(), 'high_point', true ) ); echo "</p>";
										} else {
											echo "";
										} // end Highest Elevation 
										// Display the Course Trail Percentage, if available
										$elevation_percent = get_post_meta($post->ID, 'course_trail_percentage', true);
										if ($elevation_percent) {
											echo "<p><b>Percent of the course on un-paved trails:</b> "; echo esc_html( get_post_meta( get_the_ID(), 'course_trail_percentage', true ) ); echo "</p>";
										} else {
											echo "";
										} // end Course Trail Percentage 
										// Display the Men's Record, if available
										$men_record = get_post_meta($post->ID, 'mens_record', true);
										if ($men_record) {
											echo "<p><b>Men's Record:</b> "; echo esc_html( get_post_meta( get_the_ID(), 'mens_record', true ) ); echo "</p>";
										} else {
											echo "";
										} // end Men's Record
										// Display the Masters Men Record, if available
										$masters_men_record = get_post_meta($post->ID, 'masters_men_record', true);
										if ($masters_men_record) {
											echo "<p><b>Masters Men Record:</b> "; echo esc_html( get_post_meta( get_the_ID(), 'masters_men_record', true ) ); echo "</p>";
										} else {
											echo "";
										} // end Masters Men Record 
										// Display the Women's Record, if available
										$women_record = get_post_meta($post->ID, 'womens_record', true);
										if ($women_record) {
											echo "<p><b>Women's Record:</b> "; echo esc_html( get_post_meta( get_the_ID(), 'womens_record', true ) ); echo "</p>";
										} else {
											echo "";
										} // end Women's Record 
										// Display the Masters Women Record, if available
										$masters_women_record = get_post_meta($post->ID, 'masters_women_record', true);
										if ($masters_women_record) {
											echo "<p><b>Masters Women Record:</b> "; echo esc_html( get_post_meta( get_the_ID(), 'masters_women_record', true ) ); echo "</p>";
										} else {
											echo "";
									} // end Masters Women Record ?>
								</div>
							</div> <?php // end .content-details ?>
							
							<div class="content-desc" itemprop="description">
								<p><b>Description:</b> <?php echo the_field('event_description'); ?></p>
							</div> <?php // end .content-desc ?>
							
							<div class="content-photos">
								<h3>Photos</h3>
								
								<?php // Display the first photo, if available
								$eventpic1 = get_post_meta($post->ID, 'event_photo_1', true);
								if ($eventpic1) { ?>
								
								<div itemprop="image">
									<a href="<?php echo get_field('event_photo_1'); ?>"><img src="<?php echo get_field('event_photo_1'); ?>" alt="Race event photo" /></a>
								</div>
								
								<?php } else {
									echo "<p>No photos available.</p>";
								} // end first photo 
								// Display the second photo, if available
								$eventpic2 = get_post_meta($post->ID, 'event_photo_2', true);
								if ($eventpic2) { ?>
								
								<div itemprop="image">
									<a href="<?php echo get_field('event_photo_2'); ?>"><img src="<?php echo get_field('event_photo_2'); ?>" alt="Race event photo" /></a>
								</div>
								
								<?php } else {
									echo "";
								} // end second photo 
								// Display the third photo, if available
								$eventpic3 = get_post_meta($post->ID, 'event_photo_3', true);
								if ($eventpic3) { ?>
								
								<div itemprop="image">
									<a href="<?php echo get_field('event_photo_3'); ?>"><img src="<?php echo get_field('event_photo_3'); ?>" alt="Race event photo" /></a>
								</div>
								
								<?php } else {
									echo "";
								} // end third photo ?>
								
							</div> <?php // end .content-photos ?>
							<div class="content-googlemap">
								
								<h3>Map</h3>
								<figure>
									<div class="event-map"> <?php // delete to remove over-riding map ?>
										<iframe width="100%" height="410" frameborder="0" scrolling="no" style="border:0"
									
										<?php //******* RACE MAP TOGGLE *******
											// Display the Trail Run Project map, if available
											$trp_map = get_post_meta($post->ID, 'trailrunproject_map', true);
											if ($trp_map) {
												
												echo 'src="'; echo $trp_map; echo '"'; ?>
											
											<?php } else { // else show a google map ?>
											
												src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC9cvNE5qB0ZeGAaxaHEAOnV8ynEebTASw&q=<?php echo the_field('event_city'); ?>+<?php echo $series; ?>+<?php echo the_field('event_zip'); ?>&maptype=satellite"
												
											<?php } // end race map toggle ?>
									
										></iframe>
									</div>
								</figure>
							</div> <?php // end .content-googlemap ?>
							<div class="content-archive">
								<div class="half">
							
									<h3>Event Dates</h3>
									<?php // Display the Event Date 2018, if available
									$event_date2018 = get_post_meta($post->ID, 'event_date_2018', true);
									if ($event_date2018) {
										echo "<p>Held on "; $date2018Text = date_i18n("M d, Y", strtotime(get_field('event_date_2018'))); echo $date2018Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2018 
									// Display the Event Date 2017, if available
									$event_date2017 = get_post_meta($post->ID, 'event_date_2017', true);
									if ($event_date2017) {
										echo "<p>Held on "; $date2017Text = date_i18n("M d, Y", strtotime(get_field('event_date_2017'))); echo $date2017Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2017 
									// Display the Event Date 2016, if available
									$event_date2016 = get_post_meta($post->ID, 'event_date_2016', true);
									if ($event_date2016) {
										echo "<p>Held on "; $date2016Text = date_i18n("M d, Y", strtotime(get_field('event_date_2016'))); echo $date2016Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2016 
									// Display the Event Date 2015, if available
									$event_date2015 = get_post_meta($post->ID, 'event_date_2015', true);
									if ($event_date2015) {
										echo "<p>Held on "; $date2015Text = date_i18n("M d, Y", strtotime(get_field('event_date_2015'))); echo $date2015Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2015 
									// Display the Event Date 2014, if available
									$event_date2014 = get_post_meta($post->ID, 'event_date_2014', true);
									if ($event_date2014) {
										echo "<p>Held on "; $date2014Text = date_i18n("M d, Y", strtotime(get_field('event_date_2014'))); echo $date2014Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2014 
									// Display the Event Date 2013, if available
									$event_date2013 = get_post_meta($post->ID, 'event_date_2013', true);
									if ($event_date2013) {
										echo "<p>Held on "; $date2013Text = date_i18n("M d, Y", strtotime(get_field('event_date_2013'))); echo $date2013Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2013 
									// Display the Event Date 2012, if available
									$event_date2012 = get_post_meta($post->ID, 'event_date_2012', true);
									if ($event_date2012) {
										echo "<p>Held on "; $date2012Text = date_i18n("M d, Y", strtotime(get_field('event_date_2012'))); echo $date2012Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2012 
									// Display the Event Date 2011, if available
									$event_date2011 = get_post_meta($post->ID, 'event_date_2011', true);
									if ($event_date2011) {
										echo "<p>Held on "; $date2011Text = date_i18n("M d, Y", strtotime(get_field('event_date_2011'))); echo $date2011Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2011 
									// Display the Event Date 2010, if available
									$event_date2010 = get_post_meta($post->ID, 'event_date_2010', true);
									if ($event_date2010) {
										echo "<p>Held on "; $date2010Text = date_i18n("M d, Y", strtotime(get_field('event_date_2010'))); echo $date2010Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2010 
									// Display the Event Date 2009, if available
									$event_date2009 = get_post_meta($post->ID, 'event_date_2009', true);
									if ($event_date2009) {
										echo "<p>Held on "; $date2009Text = date_i18n("M d, Y", strtotime(get_field('event_date_2009'))); echo $date2009Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2009 
									// Display the Event Date 2008, if available
									$event_date2008 = get_post_meta($post->ID, 'event_date_2008', true);
									if ($event_date2008) {
										echo "<p>Held on "; $date2008Text = date_i18n("M d, Y", strtotime(get_field('event_date_2008'))); echo $date2008Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2008 
									// Display the Event Date 2007, if available
									$event_date2007 = get_post_meta($post->ID, 'event_date_2007', true);
									if ($event_date2007) {
										echo "<p>Held on "; $date2007Text = date_i18n("M d, Y", strtotime(get_field('event_date_2007'))); echo $date2007Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2007 
									// Display the Event Date 2006, if available
									$event_date2006 = get_post_meta($post->ID, 'event_date_2006', true);
									if ($event_date2006) {
										echo "<p>Held on "; $date2006Text = date_i18n("M d, Y", strtotime(get_field('event_date_2006'))); echo $date2006Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2006 
									// Display the Event Date 2005, if available
									$event_date2005 = get_post_meta($post->ID, 'event_date_2005', true);
									if ($event_date2005) {
										echo "<p>Held on "; $date2005Text = date_i18n("M d, Y", strtotime(get_field('event_date_2005'))); echo $date2005Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2005 
									// Display the Event Date 2004, if avai dlable
									$event_date2004 = get_post_meta($post->ID, 'event_date_2004', true);
									if ($event_date2004) {
										echo "<p>Held on "; $date2004Text = date_i18n("M d, Y", strtotime(get_field('event_date_2004'))); echo $date2004Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2004 
									// Display the Event Date 2003, if available
									$event_date2003 = get_post_meta($post->ID, 'event_date_2003', true);
									if ($event_date2003) {
										echo "<p>Held on "; $date2003Text = date_i18n("M d, Y", strtotime(get_field('event_date_2003'))); echo $date2003Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2003 
									// Display the Event Date 2002, if available
									$event_date2002 = get_post_meta($post->ID, 'event_date_2002', true);
									if ($event_date2002) {
										echo "<p>Held on "; $date2002Text = date_i18n("M d, Y", strtotime(get_field('event_date_2002'))); echo $date2002Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2002 
									// Display the Event Date 2001, if available
									$event_date2001 = get_post_meta($post->ID, 'event_date_2001', true);
									if ($event_date2001) {
										echo "<p>Held on "; $date2001Text = date_i18n("M d, Y", strtotime(get_field('event_date_2001'))); echo $date2001Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2001 
									// Display the Event Date 2000, if available
									$event_date2000 = get_post_meta($post->ID, 'event_date_2000', true);
									if ($event_date2000) {
										echo "<p>Held on "; $date2000Text = date_i18n("M d, Y", strtotime(get_field('event_date_2000'))); echo $date2000Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 2000 
									// Display the Event Date 1999, if available
									$event_date1999 = get_post_meta($post->ID, 'event_date_1999', true);
									if ($event_date1999) {
										echo "<p>Held on "; $date1999Text = date_i18n("M d, Y", strtotime(get_field('event_date_1999'))); echo $date1999Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 1999 
									// Display the Event Date 1998, if available
									$event_date1998 = get_post_meta($post->ID, 'event_date_1998', true);
									if ($event_date1998) {
										echo "<p>Held on "; $date1998Text = date_i18n("M d, Y", strtotime(get_field('event_date_1998'))); echo $date1998Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 1998 
									// Display the Event Date 1997, if available
									$event_date1997 = get_post_meta($post->ID, 'event_date_1997', true);
									if ($event_date1997) {
										echo "<p>Held on "; $date1997Text = date_i18n("M d, Y", strtotime(get_field('event_date_1997'))); echo $date1997Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 1997 
									// Display the Event Date 1996, if available
									$event_date1996 = get_post_meta($post->ID, 'event_date_1996', true);
									if ($event_date1996) {
										echo "<p>Held on "; $date1996Text = date_i18n("M d, Y", strtotime(get_field('event_date_1996'))); echo $date1996Text; echo "</p>";
									} else {
										echo "";
									} // end Event Date 1996 ?>
									
								</div> <?php // end .half ?>
								
								<?php //-----------------------------
									//-------- Event Results ----------//
									//------------------------------- ?>
									
								<div class="half">
									<h3>Event Results</h3>
						
									<?php // Display the Results 2018, if available
									$results2018 = get_post_meta($post->ID, 'event_results_2018', true);
									if ($results2018) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2018', true ) ); echo "' target='_blank'>2018 Results</a>";
									} else {
										echo "";
									} // end Results 2018 
									// Display the Results 2017, if available
									$results2017 = get_post_meta($post->ID, 'event_results_2017', true);
									if ($results2017) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2017', true ) ); echo "' target='_blank'>2017 Results</a>";
									} else {
										echo "";
									} // end Results 2017 
									// Display the Results 2016, if available
									$results2016 = get_post_meta($post->ID, 'event_results_2016', true);
									if ($results2016) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2016', true ) ); echo "' target='_blank'>2016 Results</a>";
									} else {
										echo "";
									} // end Results 2016 
									// Display the Results 2015, if available
									$results2015 = get_post_meta($post->ID, 'event_results_2015', true);
									if ($results2015) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2015', true ) ); echo "' target='_blank'>2015 Results</a>";
									} else {
										echo "";
									} // end Results 2015 
									// Display the Results 2014, if available
									$results2014 = get_post_meta($post->ID, 'event_results_2014', true);
									if ($results2014) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2014', true ) ); echo "' target='_blank'>2014 Results</a>";
									} else {
										echo "";
									} // end Results 2014 
									// Display the Results 2013, if available
									$results2013 = get_post_meta($post->ID, 'event_results_2013', true);
									if ($results2013) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2013', true ) ); echo "' target='_blank'>2013 Results</a>";
									} else {
										echo "";
									} // end Results 2013 
									// Display the Results 2012, if available
									$results2012 = get_post_meta($post->ID, 'event_results_2012', true);
									if ($results2012) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2012', true ) ); echo "' target='_blank'>2012 Results</a>";
									} else {
										echo "";
									} // end Results 2012 
									// Display the Results 2011, if available
									$results2011 = get_post_meta($post->ID, 'event_results_2011', true);
									if ($results2011) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2011', true ) ); echo "' target='_blank'>2011 Results</a>";
									} else {
										echo "";
									} // end Results 2011 
									// Display the Results 2010, if available
									$results2010 = get_post_meta($post->ID, 'event_results_2010', true);
									if ($results2010) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2010', true ) ); echo "' target='_blank'>2010 Results</a>";
									} else {
										echo "";
									} // end Results 2010 
									// Display the Results 2009, if available
									$results2009 = get_post_meta($post->ID, 'event_results_2009', true);
									if ($results2009) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2009', true ) ); echo "' target='_blank'>2009 Results</a>";
									} else {
										echo "";
									} // end Results 2009 
									// Display the Results 2008, if available
									$results2008 = get_post_meta($post->ID, 'event_results_2008', true);
									if ($results2008) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2008', true ) ); echo "' target='_blank'>2008 Results</a>";
									} else {
										echo "";
									} // end Results 2008 
									// Display the Results 2007, if available
									$results2007 = get_post_meta($post->ID, 'event_results_2007', true);
									if ($results2007) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2007', true ) ); echo "' target='_blank'>2007 Results</a>";
									} else {
										echo "";
									} // end Results 2007 
									// Display the Results 2006, if available
									$results2006 = get_post_meta($post->ID, 'event_results_2006', true);
									if ($results2006) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2006', true ) ); echo "' target='_blank'>2006 Results</a>";
									} else {
										echo "";
									} // end Results 2006 
									// Display the Results 2005, if available
									$results2005 = get_post_meta($post->ID, 'event_results_2005', true);
									if ($results2005) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2005', true ) ); echo "' target='_blank'>2005 Results</a>";
									} else {
										echo "";
									} // end Results 2005 
									// Display the Results 2004, if avai dlable
									$results2004 = get_post_meta($post->ID, 'event_results_2004', true);
									if ($results2004) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2004', true ) ); echo "' target='_blank'>2004 Results</a>";
									} else {
										echo "";
									} // end Results 2004 
									// Display the Results 2003, if available
									$results2003 = get_post_meta($post->ID, 'event_results_2003', true);
									if ($results2003) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2003', true ) ); echo "' target='_blank'>2003 Results</a>";
									} else {
										echo "";
									} // end Results 2003 
									// Display the Results 2002, if available
									$results2002 = get_post_meta($post->ID, 'event_results_2002', true);
									if ($results2002) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2002', true ) ); echo "' target='_blank'>2002 Results</a>";
									} else {
										echo "";
									} // end Results 2002 
									// Display the Results 2001, if available
									$results2001 = get_post_meta($post->ID, 'event_results_2001', true);
									if ($results2001) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2001', true ) ); echo "' target='_blank'>2001 Results</a>";
									} else {
										echo "";
									} // end Results 2001 
									// Display the Results 2000, if available
									$results2000 = get_post_meta($post->ID, 'event_results_2000', true);
									if ($results2000) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_2000', true ) ); echo "' target='_blank'>2000 Results</a>";
									} else {
										echo "";
									} // end Results 2000 
									// Display the Results 1999, if available
									$results1999 = get_post_meta($post->ID, 'event_results_1999', true);
									if ($results1999) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_1999', true ) ); echo "' target='_blank'>1999 Results</a>";
									} else {
										echo "";
									} // end Results 1999 
									// Display the Results 1998, if available
									$results1998 = get_post_meta($post->ID, 'event_results_1998', true);
									if ($results1998) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_1998', true ) ); echo "' target='_blank'>1998 Results</a>";
									} else {
										echo "";
									} // end Results 1998 
									// Display the Results 1997, if available
									$results1997 = get_post_meta($post->ID, 'event_results_1997', true);
									if ($results1997) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_1997', true ) ); echo "' target='_blank'>1997 Results</a>";
									} else {
										echo "";
									} // end Results 1997 
									// Display the Results 1996, if available
									$results1996 = get_post_meta($post->ID, 'event_results_1996', true);
									if ($results1996) {
										echo "<p>View <a href='"; echo esc_html( get_post_meta( get_the_ID(), 'event_results_1996', true ) ); echo "' target='_blank'>1996 Results</a>";
									} else {
										echo "";
									} // end Results 1996 ?>
									
								</div> <?php // end .half ?>
							</div> <?php // end .content-archive event_results ?>
						</div> <?php // end .entry-content ?>
						
						<?php comments_template(); ?>
						
						<footer class="article-footer">
						</footer> <?php // end .article-footer ?>

					</article>

				<?php endwhile; ?>
				<?php else : ?>

					<article id="post-not-found" class="hentry">
						<header class="article-header">
							<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
						</section>
						<footer class="article-footer">
								<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
						</footer>
					</article>

				<?php endif; ?>

			</div> <?php // end #inner-content .wrap ?>

			<?php get_sidebar(); ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

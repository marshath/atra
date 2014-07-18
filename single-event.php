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
				
					<article id="post-<?php the_ID(); ?>" <?php post_class('single-title'); ?> role="article" itemscope itemtype="http://schema.org/SportsEvent">
					
						<header class="event-header">
							<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
						</header><?php // end .event-header ?>
						
						<section class="entry-content">
							<div class="content-top">
							
								<figure>
									<?php $location = get_field('event_google_map');
									if( !empty($location) ): ?>
									<div class="event-map">
										<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
									</div>
									<?php endif; ?>
								</figure>

								<div class="event-date" itemprop="startDate" <? // -------- content="2013-09-14T21:30" -------- ?>>
									<p><?php // Display the Event Date
										$endDateText = date_i18n("M d, Y", strtotime(get_field('event_date')));
										echo $endDateText;
										 // end Event Date ?> at <?php echo the_field('start_time'); ?></p>
								</div>
								<div class="event-smedia">
									<!-- Go to www.addthis.com/dashboard to customize your tools -->
									<div class="share-text">Share: </div><div class="addthis_sharing_toolbox"></div>
								</div>
							</div> <!-- end .content-top -->
							
							<div class="content-venue">
								<div class="half" itemprop="location" itemscope itemtype="http://schema.org/Place">
									<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
										<p><span itemprop="streetAddress"><?php echo the_field('event_street'); ?></span></p>
										<p><span itemprop="addressLocality"><?php echo the_field('event_city'); ?></span>, <span itemprop="addressRegion"><?php echo the_field('event_state'); ?></span> <span itemprop="postalCode"><?php echo the_field('event_zip'); ?></span></p>
										<p><?php echo the_field('event_country'); ?></p>
									</div>
								</div> <!-- end .event-location -->
								<div class="half">
									<p><a href="<?php echo the_field('event_website'); ?>" target="_blank"><?php echo the_field('event_website'); ?></a></p>
									<p><a href="mailto:<?php echo the_field('rd_email'); ?>">E-mail Race Director</a></p>
								</div> <!-- end .event-contact -->
							</div> <!-- end .content-venue -->
							
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
									<p><b>Entry Fee:</b> <span itemprop="price"><?php echo the_field('entry_fee'); ?></span></p>
									<p><b>Type:</b> <?php echo the_field('event_type'); ?></p>
									<p><b>Distance(s):</b></p>
									<ul class="list-commas">
										<?php // Display the Race Distances, if available
										$rdist = get_post_meta($post->ID, 'race_distance', true);
					                	if ($rdist) {
											echo '<li>'; echo implode('</li><li>', get_field('race_distance')); echo '</li>';
										} else {
											echo "";
										} // end Race Distances
										// Display the Marathon Distances, if available
										$mdist = get_post_meta($post->ID, 'marathon_distance', true);
					                	if ($mdist) {
											echo '<li>'; echo implode('</li><li>', get_field('marathon_distance')); echo '</li>'; 
										} else {
											echo "";
										} // end Marathon Distances 
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
									</ul> <!-- end .list-commas -->
								</div>
								<div class="half">
									<?php // Display the Course Map, if available
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
											echo "<p><b>Unpaved Trails on Course:</b> "; echo esc_html( get_post_meta( get_the_ID(), 'course_trail_percentage', true ) ); echo "</p>";
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
							</div> <!-- end .content-details -->
							
							<div class="content-desc" itemprop="description">
								<p><b>Description:</b> <?php echo the_field('event_description'); ?></p>
							</div> <!-- end .content-desc -->
							
							<div class="content-photos">
								<h3>Photos</h3>
								
								<?php // Display the first photo, if available
								$eventpic1 = get_post_meta($post->ID, 'event_photo_1', true);
								if ($eventpic1) { ?>
								
								<div itemprop="image">
									<?php $image1 = get_field('event_photo_1'); ?><a href="<?php echo $image1['url']; ?>"><img src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>" /></a>
								</div>
								
								<?php } else {
									echo "";
								} // end first photo 
								// Display the second photo, if available
								$eventpic2 = get_post_meta($post->ID, 'event_photo_2', true);
								if ($eventpic2) { ?>
								
								<div itemprop="image">
									<?php $image2 = get_field('event_photo_2'); ?><a href="<?php echo $image2['url']; ?>"><img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" /></a>
								</div>
								
								<?php } else {
									echo "";
								} // end second photo 
								// Display the third photo, if available
								$eventpic3 = get_post_meta($post->ID, 'event_photo_3', true);
								if ($eventpic3) { ?>
								
								<div itemprop="image">
									<?php $image3 = get_field('event_photo_3'); ?><a href="<?php echo $image3['url']; ?>"><img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>" /></a>
								</div>
								
								<?php } else {
									echo "";
								} // end third photo ?>
								
							</div> <!-- end .content-photos -->
							
							<div class="content-archive">
							
								<h3>Event Dates &amp; Results</h3>
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
					
							</div> <!-- end .content-archive -->
						</section> <!-- end .entry-content -->
						
						<?php comments_template(); ?>
						
						<footer class="article-footer">
						</footer> <!-- end .article-footer -->

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

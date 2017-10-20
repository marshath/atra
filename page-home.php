<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">
				<div id="main" role="main">
					
					<h1><?php wp_title(''); ?></h1>

					<?php while (have_posts()) : the_post(); ?>

					<div id="event-search" class="event-search">
					
						<h2>Find a Trail Race</h2>
						<?php get_search_form(); ?>
						
					</div> <?php // end #event-search .hm-event-search ?>
					
					<div id="featured" class="featured-events">
	
						<h2>Featured Events</h2>
						<?php get_template_part('content', 'event-legend'); // include the race legend ?>
	
						<?php 
						//----------------------------------------
						// ----------- Table of Events -----------
						//---------------------------------------- ?>
						<table>
							<thead>
								<?php get_template_part('content', 'event-table-head'); // include the event list table head ?>
							</thead>
							<tbody>
	
							<?php // ******** Display Events ******** 
								$today = date("Ymd");
								//'BETWEEN' comparison with 'type' date only works with dates in format Ymd. 
								//See http://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters 
								$date1 = date("Ymd", strtotime($today . "+3 Weeks")); 
								$date2 = date("Ymd", strtotime($today . "+26 Weeks"));
								
								$boardies = array( 
									'post_type' => 'event',
									'posts_per_page' => 9,
									'orderby' => 'meta_value',
									'order' => 'ASC',
									'meta_query' => array( 
										array( 
											'key' => 'event_date',
											'value' => array($date1,$date2),
											'type' => 'date',
											'compare' => 'BETWEEN'
										)
									),
									'tax_query' => array(
										array(
											'taxonomy' => 'qualifications',
											'field' => 'slug',
											'terms' => array('meets-atra-event-standards','atra-race-member')
										)
									)
								);
								
								$boards = new WP_Query( $boardies );
								while ( $boards->have_posts() ) : $boards->the_post(); ?>
								
									<?php get_template_part('content', 'event-table'); // include the event list table head ?>
									
								<?php endwhile; ?>
							<?php wp_reset_postdata(); // end Display Events ?>
	
							</tbody>
						</table>
	
					</div> <?php // end #events-featured .hm-event-featured ?>
						
						
					<?php 
					//-------------------------------------
					// ------------- Trekker --------------
					//------------------------------------- ?>
						
					<?php // check if the repeater field has rows of data
					if( have_rows('home_callout_1') ):
					
					 	// loop through the rows of data
					    while ( have_rows('home_callout_1') ) : the_row();
					
					        // display a callout
					        
							echo '<div id="google-tracker" class="hm-features" style="background-image: url(', the_sub_field('home_callout_1_image'), '); background-size: cover;">
								<div class="explore__gradient">
			
									<h2>', the_sub_field('home_callout_1_title'), '</h2>
									<p>', the_sub_field('home_callout_1_content'), '</p>
									<p><a href="', the_sub_field('home_callout_1_link'), '" class="btn">', the_sub_field('home_callout_1_button'), '</a></p>
								
								</div>
							</div>';
					        
					    endwhile;
					
					else :
					
					    // no rows found
					
					endif; // end #google-tracker .hm-features ?>
					
					
					<?php 
					//------------------------------------------
					// ------------ Newsletter Form ------------
					//------------------------------------------ ?>
					<div id="newsletter" class="hm-features hm-features__newsletter">
						
						<?php $callout = get_field('home_callout_2');
							if( $callout ) {
								echo $callout;
							} else {
								// nothing found
							} ?>
						
						<?php // Begin Constant Contact form ?>
						<div class="ctct-embed-signup">
							
							<?php // Thank you message ?>
							<span id="success_message" style="display:none;">
							    <div class="signup-success">Thank you for signing up!!!</div>
							</span>
							
							<form data-id="embedded_signup:form" class="ctct-custom-form Form" name="embedded_signup" method="POST" action="https://visitor2.constantcontact.com/api/signup">
							
							    <?php // The following code must be included to ensure your sign-up form works properly. ?>
							    <input data-id="ca:input" type="hidden" name="ca" value="2589cc0d-7ae3-44ac-8e19-68104d80e97e">
							    <input data-id="list:input" type="hidden" name="list" value="1968659447">
							    <input data-id="source:input" type="hidden" name="source" value="EFD">
							    <input data-id="required:input" type="hidden" name="required" value="list,email">
							    <input data-id="url:input" type="hidden" name="url" value="">
							
							    <?php // First Name ?>
							    <p data-id="First Name:p" class="first-name"><label data-id="First Name:label" data-name="first_name">First Name</label> <input data-id="First Name:input" type="text" name="first_name" value="" placeholder="First Name" maxlength="50"></p>
							
							    <?php // Last Name ?>
							    <p data-id="Last Name:p" class="last-name"><label data-id="Last Name:label" data-name="last_name">Last Name</label> <input data-id="Last Name:input" type="text" name="last_name" value="" placeholder="Last Name" maxlength="50"></p>
							
							    <?php // Email Address ?>
							    <p data-id="Email Address:p" ><label data-id="Email Address:label" data-name="email" class="ctct-form-required">Email Address</label> <input data-id="Email Address:input" type="text" name="email" value="" placeholder="Email Address" maxlength="80"></p>
							
							    <?php // Submit button ?>
							    <button type="submit" class="btn" data-enabled="enabled">Sign Up</button>
							
							    <?php // Fine Print ?>
							    <p class="small">By submitting this form, you are granting: American Trail Running Assoc., PO Box 9454, Colorado Springs, Colorado, 80932, United States, trailrunner.com permission to email you. You may unsubscribe via the link found at the bottom of every email.  (See our <a href="http://www.constantcontact.com/legal/privacy-statement" target="_blank" rel="external">Email Privacy Policy</a> for details.) Emails are serviced by Constant Contact.</p>
							
							</form>
							<?php // required script to make the sign-up form work ?>
							<script type='text/javascript'>
								var localizedErrMap = {};
								localizedErrMap['required'] = 		'This field is required.';
								localizedErrMap['ca'] = 			'An unexpected error occurred while attempting to send email.';
								localizedErrMap['email'] = 			'Please enter your email address in name@email.com format.';
								localizedErrMap['birthday'] = 		'Please enter birthday in MM/DD format.';
								localizedErrMap['anniversary'] = 	'Please enter anniversary in MM/DD/YYYY format.';
								localizedErrMap['custom_date'] = 	'Please enter this date in MM/DD/YYYY format.';
								localizedErrMap['list'] = 			'Please select at least one email list.';
								localizedErrMap['generic'] = 		'This field is invalid.';
								localizedErrMap['shared'] = 		'Sorry, we could not complete your sign-up. Please contact us to resolve this.';
								localizedErrMap['state_mismatch'] = 'Mismatched State/Province and Country.';
								localizedErrMap['state_province'] = 'Select a state/province';
								localizedErrMap['selectcountry'] = 	'Select a country';
								var postURL = 'https://visitor2.constantcontact.com/api/signup';
							</script>
							<script type='text/javascript' src='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/js/signup-form.js'></script>
							
						</div><?php // End CTCT Sign-Up Form ?>

					</div> <?php // end #newsletter .hm-features .hm-features__newsletter ?>

					<?php 
					//--------------------------------
					// ----------- Content -----------
					//-------------------------------- ?>	
					<section id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
						<section class="entry-content homepage-about">
							<?php the_content(); ?>
						</section>
					</section>
					
					
					<?php 
					//--------------------------------
					// ----------- Members -----------
					//-------------------------------- ?>
					<div id="members" class="member-list">
	
						<h2>ATRA Members</h2>
						<?php the_field('membership_description', 114); // ------- Membership Description ?>
						<!-- <p><a href="<?php echo home_url(); ?>/membership/">Interested in becoming a member?</a></p> -->
	
						<div class="half">
							<div id="member-all-terrain" class="resource-item">
								<?php the_field('members_all-terrain', 114); // ------- All-terrain Members ?>
							</div>
							
							<div id="member-steep-rocky" class="resource-item">
								<?php the_field('members_steep-rocky', 114); // ------- Steep Rocky Members  ?>
							</div>
							
							<div id="member-switchback" class="resource-item">
								<?php the_field('members_switchback', 114); // ------- Switchback Members  ?>
							</div>
	
							<div id="member-single-track" class="resource-item">
								<?php the_field('members_single-track', 114); // ------- Singel Track Members  ?>
							</div>
						</div>
	
						<div class="half">
							<div id="member-race" class="resource-item">
								<?php the_field('members_race', 114); // ------- Race Members ?>
							</div>
	
							<div id="member-club" class="resource-item">
								<?php the_field('members_club', 114); // ------- Club Members  ?>
							</div>
						</div>
	
					</div> <!-- end #member-list .hm-member-list -->
	
					<?php endwhile; ?>
	
					<?php get_sidebar(); ?>
					
				</div> <?php // end #main .main ?>
			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

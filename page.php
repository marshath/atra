<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">

					<?php while (have_posts()) : the_post(); ?>
					
						<?php if ( (is_page('resources')) ) { // ----------- Resources Banner Ad -----------
							if ( is_active_sidebar( 'banner-resources' ) ) : ?>
						
								<div class="banner-ad">
									<?php dynamic_sidebar( 'banner-resources' ); ?>
								</div>
		
							<?php endif; 
						} // end RESOURCES BANNER ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<header class="article-header">
							<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
						</header> <!-- end .article-header -->
						
						<section class="entry-content" itemprop="articleBody">
							<?php the_content(); ?>

							<?php 
							//---------------------------------------
							// ----------- Resources Page -----------
							//---------------------------------------
							if ( (is_page('resources')) ) { ?>
								
								<div class="half">
									<div id="beginning-running" class="resource-item">
										<?php the_field('get_started_running'); ?>
									</div>
									
									<div id="trail-maintenance" class="resource-item">
										<?php the_field('trail_maintenance'); ?>
									</div>
									
									<div id="organizations" class="resource-item">
										<?php the_field('organization_links'); ?>
									</div>
									
									<div id="mut" class="resource-item">
										<?php the_field('mut_articles'); ?>
									</div>
								</div>
								
								<div class="half">
									<div id="books" class="resource-item books">
										<?php the_field('book_links'); ?>
									</div>
									
									<div id="magazines" class="resource-item">
										<?php the_field('magazines_links'); ?>
									</div>
									
									<div id="ultrarunning" class="resource-item">
										<?php the_field('ultrarunning_links'); ?>
									</div>
									
									<div id="camps" class="resource-item">
										<?php the_field('camp_links'); ?>
									</div>
									
									<div id="blogs" class="resource-item">
										<?php the_field('running_blog_links'); ?>
									</div>
								</div>
								
							<?php } // end RESOURCES Page ?>

							<?php 
							//-------------------------------------------
							// ----------- Board Members Page -----------
							//-------------------------------------------
							if ( (is_page('board-members-and-meeting-minutes')) ) { ?>
								<div class="board-members-wrap">
									<h2>Board Member Profiles</h2>
									<ul>
									
									<?php // ******** Display Board Members ******** 
									$boardies = array('post_type' => 'boardmember', 'roles' => 'board-member'); 
									$boards = new WP_Query( $boardies );
									while ( $boards->have_posts() ) : $boards->the_post(); ?>
										<li>
											<figure><?php the_post_thumbnail("atra-300"); ?></figure>
											<h3><?php the_title(); ?></h3>
											<h5><?php the_field('board_title'); ?></h5>
											<div class="board-social">
												<ul>
														
													<?php // Display the Facebook account, if available
													$socialFace = get_post_meta($post->ID, 'facebook_profile', true);
													if ($socialFace) {
														echo "<li class='facebook'><a href='"; echo esc_html( get_post_meta( get_the_ID(), 'facebook_profile', true ) ); echo "'><span class='social-text'>Facebook</span></a></li>";
													} else {
														echo "";
													} // end Facebook account ?>
														
													<?php // Display the Twitter account, if available
													$socialTwitter = get_post_meta($post->ID, 'twitter_profile', true);
													if ($socialTwitter) {
														echo "<li class='twitter'><a href='"; echo esc_html( get_post_meta( get_the_ID(), 'twitter_profile', true ) ); echo "'><span class='social-text'>Twitter</span></a></li>";
													} else {
														echo "";
													} // end Twitter account ?>
														
													<?php // Display the Google Plus account, if available
													$socialGoog = get_post_meta($post->ID, 'google_plus_profile', true);
													if ($socialGoog) {
														echo "<li class='google'><a href='"; echo esc_html( get_post_meta( get_the_ID(), 'google_plus_profile', true ) ); echo "'><span class='social-text'>Google+</span></a></li>";
													} else {
														echo "";
													} // end Google Plus account ?>
														
													<?php // Display the Instagram account, if available
													$socialInsta = get_post_meta($post->ID, 'instagram_profile', true);
													if ($socialInsta) {
														echo "<li class='instagram'><a href='"; echo esc_html( get_post_meta( get_the_ID(), 'instagram_profile', true ) ); echo "'><span class='social-text'>Instagram</span></a></li>";
													} else {
														echo "";
													} // end Instagram account ?>
														
													<?php // Display the Email account, if available
													$socialEmail = get_post_meta($post->ID, 'email_address', true);
													if ($socialEmail) {
														echo "<li class='email'><a href='mailto:"; echo esc_html( get_post_meta( get_the_ID(), 'email_address', true ) ); echo "'><span class='social-text'>Email</span></a></li>";
													} else {
														echo "";
													} // end Email account ?>
													
												</ul>
											</div>
											<p><?php the_field('member_description'); ?></p>
										</li>
										<?php endwhile; ?>
									<?php wp_reset_postdata(); // end Display Board Members ?>
									
									</ul>
								</div> <?php // end #board-members .entry-content ?>
								<div class="advisors-wrap">
									<h2>Advisors</h2>
									<ul>
									
									<?php // ******** Display Advisors ******** 
									$adviseries = array('post_type' => 'boardmember', 'roles' => 'advisor');
									$advises = new WP_Query( $adviseries );
									while ( $advises->have_posts() ) : $advises->the_post(); ?>
										<li>
											<h3><?php the_title(); ?></h3>
											<div class="board-social">
												<ul>	
													<?php // Display the Facebook account, if available
													$socialFace = get_post_meta($post->ID, 'facebook_profile', true);
													if ($socialFace) {
														echo "<li class='facebook'><a href='"; echo esc_html( get_post_meta( get_the_ID(), 'facebook_profile', true ) ); echo "'><span class='social-text'>Facebook</a></span></li>";
													} else {
														echo "";
													} // end Facebook account ?>
														
													<?php // Display the Twitter account, if available
													$socialTwitter = get_post_meta($post->ID, 'twitter_profile', true);
													if ($socialTwitter) {
														echo "<li class='twitter'><a href='"; echo esc_html( get_post_meta( get_the_ID(), 'twitter_profile', true ) ); echo "'><span class='social-text'>Twitter</a></span></li>";
													} else {
														echo "";
													} // end Twitter account ?>
														
													<?php // Display the Google Plus account, if available
													$socialGoog = get_post_meta($post->ID, 'google_plus_profile', true);
													if ($socialGoog) {
														echo "<li class='google'><a href='"; echo esc_html( get_post_meta( get_the_ID(), 'google_plus_profile', true ) ); echo "'><span class='social-text'>Google+</a></span></li>";
													} else {
														echo "";
													} // end Google Plus account ?>
														
													<?php // Display the Instagram account, if available
													$socialInsta = get_post_meta($post->ID, 'instagram_profile', true);
													if ($socialInsta) {
														echo "<li class='instagram'><a href='"; echo esc_html( get_post_meta( get_the_ID(), 'instagram_profile', true ) ); echo "'><span class='social-text'>Instagram</a></span></li>";
													} else {
														echo "";
													} // end Instagram account ?>
														
													<?php // Display the Email account, if available
													$socialEmail = get_post_meta($post->ID, 'email_address', true);
													if ($socialEmail) {
														echo "<li class='email'><a href='mailto:"; echo esc_html( get_post_meta( get_the_ID(), 'email_address', true ) ); echo "'><span class='social-text'>Email</span></a></li>";
													} else {
														echo "";
													} // end Email account ?>
												</ul>
											</div>
										</li>
									<?php endwhile; ?>
									<?php wp_reset_postdata();  // end Display Advisors ?>
									
									</ul>
								</div> <?php // end #advisors .entry-content ?>
								
							<?php } // end BOARD MEMBERS Page ?>

							<?php 
							//---------------------------------------------------
							// ----------- Partner Organizations Page -----------
							//---------------------------------------------------
							if ( (is_page('partner-organizations')) ) { ?>
							
							<div id="partner-organizations" class="partner-wrap">
							
								<ul>
								<?php $partners = new WP_Query( 'post_type=partner' ); // display partner organizations ?>
									<?php while ( $partners->have_posts() ) :
									$partners->the_post(); ?>
									<li>
										<a href="<?php the_field('partner_website'); ?>" target="_blank">
											<figure><?php the_post_thumbnail("thumbnail"); ?></figure>
										</a>
										<h3><?php the_title(); ?></h3>
										<p><?php the_field('partner_description'); ?><br>
										<a href="<?php the_field('partner_website'); ?>" target="_blank"><?php the_field('partner_website'); ?></a></p>
									</li>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
								</ul>
								
							</div>
								
							<?php } // end PARTNER ORTGANIZATIONS Page ?>

							<?php 
							//----------------------------------------
							// ----------- Membership Page -----------
							//----------------------------------------
							if ( (is_page('membership')) ) { ?>
					
								<h2>ATRA Members</h2>
								<p>We love all our members. Without whom, things wouldn't be possible.</p>

								<div class="half">

									<div id="member-all-terrain" class="resource-item">
										<?php the_field('members_all-terrain'); ?>
									</div>

									<div id="member-steep-rocky" class="resource-item">
										<?php the_field('members_steep-rocky'); ?>
									</div>

									<div id="member-single-track" class="resource-item">
										<?php the_field('members_single-track'); ?>
									</div>

								</div>
								<div class="half">

									<div id="member-race" class="resource-item">
										<?php the_field('members_race'); ?>
									</div>

									<div id="member-club" class="resource-item">
										<?php the_field('members_club'); ?>
									</div>

								</div>
								
							<?php } // end MEMBERSHIP Page ?>
					
						</section> <?php // end .entry-content ?>
						
					</article>

					<?php endwhile; ?>

				</div> <?php // end #main .wrap-main ?>
				
				<?php get_sidebar();?>

			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

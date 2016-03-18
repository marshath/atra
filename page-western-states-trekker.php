<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">

					<?php while (have_posts()) : the_post(); ?>
					
						<?php /********* BEGIN BANNER ADS ***********/
							if ( is_active_sidebar( 'banner-westernstates' ) ) : ?>
								<div class="banner-ad">
									<?php dynamic_sidebar( 'banner-westernstates' ); ?>
								</div>
						<?php endif; // end Banner Ad ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<header class="article-header">
							<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
						</header> <?php // end .article-header ?>
								 
						<figure class="featured-image">
							<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
								the_post_thumbnail("atra-700");
								} ?>
						</figure>
									
						<?php // Go to www.addthis.com/dashboard to customize your tools ?>
						<div class="addthis_native_toolbox"></div>
						
						<section class="entry-content" itemprop="articleBody">
							<?php the_content(); ?>
						</section> <?php // end .entry-content ?>
								   
					   <?php // Go to www.addthis.com/dashboard to customize your tools ?>
					   <div class="addthis_sharing_toolbox"></div>
						
					</article>

					<?php endwhile; ?>
					
					<?php 
					//------------------------------------------
					// ----------- Trail Run Project -----------
					//------------------------------------------ ?>
					<div class="content-googlemap">
						
						<h3>Western States Course Map</h3>
						<figure>
							<div class="event-map"> <?php // delete to remove over-riding map ?>
								<iframe width="100%" height="410" frameborder="0" scrolling="no" style="border:0" src="http://www.trailrunproject.com/widget?v=2&type=trail&id=7002898&w=100%&h=380px"></iframe>
							</div>
						</figure>
					</div> <?php // end .content-googlemap ?>

				</div> <?php // end #main .wrap-main ?>
				
				<div id="sidebar1" class="sidebar" role="complementary">
					
					<?php 
					//---------------------------------
					// ----------- Sponsors -----------
					//--------------------------------- ?>
					<div class="sidebar-trekker-sponsors">
						<h4>Trekker Expedition Sponsors</h4>
						<?php if( have_rows('wst_sponsor_list') ): ?>
						<ul class="trekker-sponsors">
							
							<?php while( have_rows('wst_sponsor_list') ): the_row();
								// vars
								$name = get_sub_field('wst_sponsor_name');
								$url = get_sub_field('wst_sponsor_url');
								$logo = get_sub_field('wst_sponsor_logo');
							?>
							
							<li><a href="<?php echo $url; ?>" target="_blank" rel="external" title="<?php echo $name; ?>"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" /></a></li>
							
							<?php endwhile; ?>
							
						</ul>
						<?php endif; ?>
					</div> <?php // end .sidebar-trekker-sponsors ?>
					
					<?php 
					//-------------------------------------
					// ----------- Trekker News -----------
					//------------------------------------- ?>
					<div class="sidebar-news">
						<div class="news-header">
							<h4>Trekker News</h4>
							<p>The latest Western States Trekker news.</p>
						</div> <?php // end .news-header ?>
						<ul>
							<?php $args = array( 'numberposts' => '4', 'post_status' => 'publish', 'category_name' => 'trekker' );
								$recent_posts = wp_get_recent_posts( $args );
								if ($recent_posts) { // if trekker posts are available
									foreach( $recent_posts as $recent ){
										echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Read '.esc_attr($recent["post_title"]).'"><figure>' .  get_the_post_thumbnail($recent["ID"], "thumbnail") . '</figure><p>' . $recent["post_title"] . '</p></a></li>';
									}
								} else { // if trekker posts are NOT available
									echo 'Check back soon for the latest Trekker news!';
								} ?>
						</ul>
					</div> <?php // end .sidebar-news ?>
					
					<?php 
					//-----------------------------------
					// ----------- Sidebar AD -----------
					//-----------------------------------
						if ( is_active_sidebar('sidebar-westernstates') ) : ?>
					<div class="sidebar-ad">
						<?php dynamic_sidebar('sidebar-westernstates'); ?>
					</div>
						<?php endif; ?>
					
					<?php 
					//-------------------------------
					// ----------- Photos -----------
					//------------------------------- ?>
					<div class="sidebar-trekker-photos">
						<h4>Trekker Photos</h4>
						<?php $images = get_field('wst_image_gallery');
						if( $images ): ?>
						<ul class="trekker-photos">
							<?php foreach( $images as $image ): ?>
							<li>
								<a href="<?php echo $image['url']; ?>" title="<?php echo $image['title']; ?>" rel="gallery" class="gallery">
									<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
								</a>
							</li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					</div> <?php // end .sidebar-trekker-photos ?>
					
				</div>

			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

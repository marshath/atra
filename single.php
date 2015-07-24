<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
						<?php 
						//----------------------------------------------
						// ----------- Trail News Banner AD -----------
						//----------------------------------------------
						
						if ( is_active_sidebar( 'banner-news' ) ) : ?>
						
							<div class="banner-ad">
								<?php dynamic_sidebar( 'banner-news' ); ?>
							</div>
		
						<?php endif; ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('single-title'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
			
								<header class="article-header">
							   
									<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
									
									<div class="byline-group">
										<figure class="byline-figure"><?php userphoto_the_author_photo(); ?></figure>
										<p class="byline">Posted <?php the_time('F j, Y'); ?><br>
										by <?php the_author_posts_link('author') ?></p>
									</div>
									
									<div class="byline-cat">
										<p class="footer-category"><?php printf( '' . __('Category', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?></p>
									</div>
								 
								</header> <?php // end .article-header ?>
			
								<section class="entry-content" itemprop="articleBody">
								 
								<figure class="featured-image">
									<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
										the_post_thumbnail("atra-700");
										} ?>
								</figure>
								
								<?php // Go to www.addthis.com/dashboard to customize your tools ?>
								<div class="addthis_native_toolbox"></div>
									
								 <?php
								   // the content (pretty self explanatory huh)
								   the_content();
			
								   /*
									* Link Pages is used in case you have posts that are set to break into
									* multiple pages. You can remove this if you don't plan on doing that.
									*
									* Also, breaking content up into multiple pages is a horrible experience,
									* so don't do it. While there are SOME edge cases where this is useful, it's
									* mostly used for people to get more ad views. It's up to you but if you want
									* to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
									*
									* http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
									*
								   */
								   wp_link_pages( array(
									 'before'	   => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
									 'after'	   => '</div>',
									 'link_before' => '<span>',
									 'link_after'  => '</span>',
								   ) );
								 ?>
							  </section> <?php // end .entry-content ?>
			
							   <footer class="article-footer">
								   
								   <?php // Go to www.addthis.com/dashboard to customize your tools ?>
								   <div class="addthis_sharing_toolbox"></div>
			
								 <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
			
							   </footer> <?php // end .article-footer ?>
			
								<div class="featured-posts">
									<h3>Recent News</h3>
									<ul class="featured-posts">
										<?php
											$this_post = $post->ID;
											function custom_excerpt_length ($length) {
												return 20;
											}
											add_filter('excerpt_length', 'custom_excerpt_length', 20);
											function custom_reading_link($read) {
												return '';
											}
											add_filter('excerpt_more', 'auto_excerpt_more');
											$args = array( 'numberposts' => '2', 'post_status' => 'publish', 'post__not_in' => array($this_post) );
											$recent_posts = wp_get_recent_posts( $args );
											foreach( $recent_posts as $recent ){
												echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Read ' . esc_attr($recent["post_title"]).'" ><figure>' .  get_the_post_thumbnail($recent["ID"], "atra-300") . '</figure><h4>' . $recent["post_title"] . '</h4><p>' . '</p></a></li>';
											}
										?>
									</ul>
								</div><!-- .sidebar-post-lists -->
			
							   <?php comments_template(); ?>
			
							 </article> <?php // end article ?>

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
					

				</div> <?php // end #main ?>

				<?php get_sidebar('single'); ?>

			</div> <?php // end #inner-content ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

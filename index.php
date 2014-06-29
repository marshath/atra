<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

					<div id="main" class="wrap-main" role="main">
			
						<?php 
						//----------------------------------------------
						// ----------- Trail News Banner AD -----------
						//----------------------------------------------
						
						if ( is_active_sidebar( 'banner-news' ) ) : ?>
						
							<div class="banner-ad">
								<?php dynamic_sidebar( 'banner-news' ); ?>
							</div>
		
						<?php endif; ?>
						
						<header class="page-header">
							<h1 class="page-title" itemprop="headline">Trail News</h1>
						</header> <!-- end .page-header -->

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'news-list' ); ?> role="article">
	
								<header class="entry-header">
	
									<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									<p class="byline">
										<?php printf( __( 'Posted', 'bonestheme' ) . ' <time class="updated" datetime="%1$s" pubdate>%2$s</time> ' . __('by', 'bonestheme' ) . ' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>
	
								</header>
							
								<figure>
									<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									  the_post_thumbnail('medium');
									} ?>
								</figure>
	
								<section class="entry-content">
									<?php the_excerpt(); ?>
								</section>
	
							</article>

						<?php endwhile; ?>

								<?php bones_page_navi(); ?>

						<?php else : ?>

								<article id="post-not-found" class="hentry">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
									</footer>
								</article>

						<?php endif; ?>


					</div> <?php // end #main ?>

				<?php get_sidebar('single'); ?>

			</div> <?php // end #inner-content ?>

		</div> <?php // end #content ?>


<?php get_footer(); ?>

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
										<?php printf( __( '%1$s %2$s', 'bonestheme' ),
											// the time the post was published
											'Posted on <time class="updated entry-time post-date" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
											// the author of the post - hidden text
											'by <span class="entry-author author post-author vcard" itemprop="author" itemscope itemptype="http://schema.org/Person"><span class="fn"><a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" title="" rel="author" itemprop="name">' . get_the_author('ID') . '</a></span></span>' );
										?> 
									</p>
									<?php edit_post_link( __( 'Edit Post &raquo;' ), '<p><span class="edit-link">', '</span></p>' ); ?>
									
								</header>
							
								<figure>
									<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									  the_post_thumbnail('atra-300');
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

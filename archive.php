<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

					<div id="main" class="wrap-main" role="main">
			
						<?php 
						//----------------------------------------------
						// ----------- Trail News Banner AD -----------
						//---------------------------------------------- ?>
						
							<div class="banner-ad">
								<?php dynamic_sidebar( 'banner-news' ); ?>
							</div>
			
						<?php 
						//------------------------------------------------
						// ----------- Determine archive title -----------
						//------------------------------------------------ ?>
						
							<header class="article-header">
								<?php if (is_category()) { ?>
								<h1 class="page-title"><?php _e( 'Posts Categorized:', 'bonestheme' ); ?> <?php single_cat_title(); ?></h1>

								<?php } elseif (is_tag()) { ?>
								<h1 class="page-title"><?php _e( 'Posts Tagged:', 'bonestheme' ); ?> <?php single_tag_title(); ?></h1>

								<?php } elseif (is_author()) {
									global $post;
									$author_id = $post->post_author;
									?>
								<h1 class="page-title"><?php _e( 'Posts By:', 'bonestheme' ); ?> <?php the_author_meta('display_name', $author_id); ?></h1>
									
								<?php } elseif (is_day()) { ?>
								<h1 class="page-title"><?php _e( 'Daily Archives:', 'bonestheme' ); ?> <?php the_time('l, F j, Y'); ?></h1>

								<?php } elseif (is_month()) { ?>
								<h1 class="page-title"><?php _e( 'Monthly Archives:', 'bonestheme' ); ?><?php the_time('F Y'); ?></h1>

								<?php } elseif (is_year()) { ?>
								<h1 class="page-title"><?php _e( 'Yearly Archives:', 'bonestheme' ); ?> <?php the_time('Y'); ?></h1>
								<?php } ?>
							</header> <!-- end .page-header -->

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'news-list' ); ?> role="article">
	
							<header class="entry-header">
	
								<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<p class="byline">
									<p class="byline">Posted <?php the_time('F j, Y'); ?> by <?php the_author_posts_link('author') ?></p>
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

						<?php else : ?>

								<article id="post-not-found" class="hentry">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
									</footer>
								</article>

						<?php endif; ?>

					</div> <?php // end #main ?>

				<?php get_sidebar('single'); ?>

			</div> <?php // end #inner-content ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

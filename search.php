 <?php if($_GET['post_type']=='post'){ ?>
 
         <?php get_header(); ?>

				<div id="content">
		
					<div id="inner-content" class="wrap">
		
						<div id="main" class="wrap-main" role="main">
						
						<header class="article-header">
							<h1 class="page-title"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>
						</header>
		
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
								<article id="post-<?php the_ID(); ?>" <?php post_class('news-list'); ?> role="article">
			
									<header class="entry-header">
		
										<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
										<p class="byline">
											Posted <?php the_time('F j, Y'); ?> by <?php the_author_posts_link('author') ?>
										</p>
		
									</header>
								
									<figure>
										<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
										  the_post_thumbnail('atra-700');
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
									<header class="article-title">
										<h2 class="entry-title"><?php _e( 'Sorry, No Results.', 'bonestheme' ); ?></h2>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Try your search again.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
										<p><?php _e( 'This is the error message in the search.php template.', 'bonestheme' ); ?></p>
									</footer>
								</article>
		
							<?php endif; ?>
		
						</div> <?php // end #main ?>
		
						<?php get_sidebar('single'); ?>
		
					</div> <?php // end #inner-content ?>
		
				</div> <?php // end #content ?>
		
		<?php get_footer(); ?>
		
    <?  } else {
         include('archive-event.php'); // Event search results
      }; // use custom archive template  ?>
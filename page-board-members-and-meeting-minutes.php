<?php get_header(); ?>

		<div id="content">

			<div id="inner-content" class="wrap">

				<div id="main" class="wrap-main" role="main">

					<?php while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<header class="article-header">
							<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
						</header> <!-- end .article-header -->
						
						<section class="entry-content" itemprop="articleBody">
							<h2>Board Member Profiles</h2>
							<p><?php the_title(); ?></p>
							<p><?php the_field('board_title'); ?></p>
							<p><?php the_field('facebook_profile'); ?></p>
							<p><?php the_field('twitter_profile'); ?></p>
							<p><?php the_field('goole_plus_profile'); ?></p>
							<p><?php the_field('instagram_profile'); ?></p>
							<p><?php the_field('email_address'); ?></p>
							<p><?php the_field('member_description'); ?></p>
						</section> <?php // end .entry-content ?>
						
						<section class="entry-content" itemprop="articleBody">
							<h2>Advisor Profiles</h2>
							<p><?php the_title(); ?></p>
							<p><?php the_field('board_title'); ?></p>
							<p><?php the_field('facebook_profile'); ?></p>
							<p><?php the_field('twitter_profile'); ?></p>
							<p><?php the_field('goole_plus_profile'); ?></p>
							<p><?php the_field('instagram_profile'); ?></p>
							<p><?php the_field('email_address'); ?></p>
							<p><?php the_field('member_description'); ?></p>
						</section> <?php // end .entry-content ?>
						
					</article>

					<?php endwhile; ?>

				</div> <?php // end #main .wrap-main ?>

				<?php get_sidebar(); ?>

			</div> <?php // end #inner-content .wrap ?>

		</div> <?php // end #content ?>

<?php get_footer(); ?>

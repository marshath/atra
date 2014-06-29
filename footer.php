			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap">

					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => '',                              // remove nav container
    					'container_class' => 'footer-links',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
        				'after' => '',                                  // after the menu
        				'link_before' => '',                            // before each link
        				'link_after' => '',                             // after each link
        				'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>

				</div>

			</footer>
			
			

			<div class="partners-footer">

				<div class="wrap">
				
					<ul class="footer-partner">
					<?php $partners = new WP_Query( 'post_type=partner' ); ?>
						<?php while ( $partners->have_posts() ) :
						$partners->the_post(); ?>
						<li>
							<a href="<?php the_field('partner_website'); ?>" target="_blank">
								<img src="<?php $image = get_field('parter_logo'); echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
							</a>
						</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					</ul>
					
				</div>

				<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'description' ); ?>. All rights reserved.</p>

			</div>

		</div><!-- end .page-wrap -->
		
		<?php get_template_part('footer-plugins'); ?>
		
		<?php // Insert Google Analytics Here ?>
		<?php // end analytics ?>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html>

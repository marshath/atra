<?php /*
	   *
	   * BLOG POST AUTHOR BIO 
	   *
	   */ ?>
				
				<div id="post-author" class="post-author-box" itemprop="author" itemscope itemptype="http://schema.org/Person">
						
					<figure class="author-img" itemprop="image"><?php userphoto_the_author_photo(); ?></figure>
						
					<?php // ABOUT THE AUTHOR
						// vars
						$athr = get_the_author('ID'); ?>

					<h3>About <span class="screen-reader-text">the author</span> <?php
						if (is_archive()) {
							// the author of the post - hidden text
							printf ('<span rel="author" itemprop="name">' . get_the_author('ID') . '</span>' );
						} else {
							// the author of the post - hidden text
							printf ('<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" title="Posts by ' . get_the_author('ID') . '" rel="author" itemprop="name">' . get_the_author('ID') . '</a>' );
						} ?></h3>
						
					<div class="author-social">
					<?php //author social media links
						printf ('<p>Follow<span class="screen-reader-text"> ' . $athr . ' on</span>:</p><ul>');
						// the author social profiles, if they have them
						if ($social = get_the_author_meta('facebook')) { 		// author Facebook profile
							printf ('<li class="facebook"><a href="' . $social . '" title="Follow ' . $athr . ' on Facebook" rel="external"><span class="social-text">Facebook</span></a></li>');
						};
						if ($social = get_the_author_meta('twitter')) { 	 	// author Twitter profile
							printf ('<li class="twitter"><a href="' . $social . '" title="Follow ' . $athr . ' on Twitter" rel="external"><span class="social-text">Twitter</span></a></li>');
						};
						if ($social = get_the_author_meta( 'googleplus' )) { 	// author Google+ profile
							printf ('<li class="google"><a href="' . $social . '" title="Follow ' . $athr . ' on Google Plus" rel="external"><span class="social-text">Google Plus</span></a></li>');
						};
						printf ('</ul>');
					?>
					</div>
					
											
					
					<p class="author__desc" itemprop="description"><?php echo get_the_author_meta( 'description' ); ?></p>

				</div> <?php // end #post-author .vcard .post-author ?>
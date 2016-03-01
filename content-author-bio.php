<?php /*
	   *
	   * BLOG POST AUTHOR BIO 
	   *
	   */ ?>
				
				<div id="post-author" class="vcard post-author">
						
					<figure class="author-img"><?php userphoto_the_author_photo(); ?></figure>
						
					<?php // ABOUT THE AUTHOR
						// vars
						$athr = get_the_author('ID'); ?>

					<h3>About <span class="screen-reader-text">the author</span> <?php the_author_posts_link('author') ?></h3>					
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
						if ($social = get_the_author_meta( 'email' )) { 		// author Email
							printf ('<li class="email"><a href="mailto:' . $social . '" title="Contact ' . $athr . '"><span class="social-text">Email</span></a></li>');
						};
						printf ('</ul>');
					?>
					</div>
					
											
					
					<p class="author__desc"><?php echo get_the_author_meta( 'description' ); ?></p>

				</div> <?php // end #post-author .vcard .post-author ?>
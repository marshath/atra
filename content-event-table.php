<?php
/**
 * The template used for the repeatable event list table rows
 */
?>

								<tr class="<?php // Display the Qualifications for the Event
									$terms = get_the_terms( $post->ID, 'qualifications'); // Display the Qualifications
								    if ($terms) {
								        $terms_slugs = array();
								        foreach ( $terms as $term ) {
								            $terms_slugs[] = $term->slug;
								        }
								        $series = $terms_slugs[0];      
								        echo "{$series} ";
								    } else {
								        echo "";
								    } // end Qualifications ?>">
									<td>
										<?php // Display the Event Date
										if ( (is_page('future-events')) ) {
											
											$today = date("Y"); // get the date and format for next years column title
											$date1 = date("Y", strtotime($today . "+1 Year"));
											$eventdate = 'event_date_' . $date1;
											
											$endDateText = date_i18n("M d, Y", strtotime(get_field($eventdate)) );
											echo $endDateText;
											
										} else {
											
											$endDateText = date_i18n("M d, Y", strtotime(get_field('event_date')));
											echo $endDateText;
											
										} // end Event Date ?>
									</td>
									<td><?php // Display the Event Name and Link ?>
										<p class="<?php // Display the ATRA Approved Event
										$certs = get_the_terms( $post->ID , 'qualifications' );
										foreach ( $certs as $cert ) {
											echo $cert->slug; echo "-icon ";
										} ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
									</td><?php // end Event Name and Link ?>
									<td>
										<ul class="list-commas">
											<?php $terms = get_the_terms( $post->ID, 'distances'); // Display the Event Distance
										    if ($terms) {
										        $terms_slugs = array();
										        foreach ( $terms as $term ) {
										        	echo "<li>$term->name</li>";
										        }
										    } else {
										        echo "";
											} // end Event Distance
											// Display the Other Distances 1, if available
											$o1dist = get_post_meta($post->ID, 'other_distance1', true);
											if ($o1dist) {
												echo "<li>"; echo esc_html( get_post_meta( get_the_ID(), 'other_distance1', true ) ); echo "</li>";
											} else {
												echo "";
											} // end Other Distances 1
											// Display the Other Distances 2, if available
											$o2dist = get_post_meta($post->ID, 'other_distance2', true);
											if ($o2dist) {
												echo "<li>"; echo esc_html( get_post_meta( get_the_ID(), 'other_distance2', true ) ); echo "</li>"; 
											} else {
												echo "";
											} // end Other Distances 2 ?>
										</ul><?php // end Event Distance ?>
									</td>
									<td>
										<?php // Display the Event Type
										echo "<p>"; echo get_field('event_type'); echo "</p>";
										// end Event Type ?>
									</td>
									<td>
										<span class="uppercase"><?php // Make the State Slug Uppercase
											$terms = get_the_terms( $post->ID, 'states'); // Display the State Slug
										    if ($terms) {
										        $terms_slugs = array();
										        foreach ( $terms as $term ) {
										            $terms_slugs[] = $term->slug;
										        }
										        $series = $terms_slugs[0];      
										        echo "{$series}";
										    } else {
										        echo "";
										   } // end Display State?>
									   </span>
									</td>
									<?php if ( is_page('home') ) return false; // If this page is not the homepage
									echo '<td>'; // Display the Event Country
										echo "<p>"; echo get_field('event_country');
									echo '</td>'; 
									// end Event Country ?>
								</tr>
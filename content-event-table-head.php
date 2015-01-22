<?php
/**
 * The template used for the event table header row
 */
?>

									<tr>
										<th>Date</th>
										<th>Name/Link</th>
										<th>Distance(s)</th>
										<th>Type</th>
										<th>State</th>
										<?php if ( is_page('home') ) return false; // If this page is not the homepage
											echo '<th>Country</th>'; ?>
									</tr>
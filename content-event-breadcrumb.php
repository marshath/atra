<?php
/**
 * The template used for the event list breadcrumb trail
 */
?>
					
					<div class="event-links">
						<p>View: 
							
							<?php //********************************
							// is current page the Race Calendar
							//************************************ ?>
							<a href="/race-calendar/"
								<?php if (is_page('race-calendar')) {
									echo 'class="current-page"';
								} ?>
							>Upcoming Events</a> | 
							
							<?php //********************************
							// is current page the Future Events
							//************************************ ?>
							<a href="/race-calendar/future-events/"
								<?php if (is_page('future-events')) {
									echo 'class="current-page"';
								} ?>
							><?php $todayear = date("Y"); $dateyear = date("Y", strtotime($todayear . "+1 Year")); echo $dateyear; ?> Events</a> | 
							
							<?php //*******************************************
							// // is current page the Historical Events Archive
							//*********************************************** ?>
							<? // <a href="/race-calendar/historical-events-archive/" ?>
							<a href="/race-calendar/historical-events-archive/"
								<?php if (is_page('historical-events-archive')) {
									echo 'class="current-page"';
								} ?>
							>Historical Events Archive</a>
							
						</p>
					</div> <!-- end .event-links -->
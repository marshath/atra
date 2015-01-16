<?php
/**
 * The template used for the event list title
 */
?>

<?php //********************************
// is current page the Race Calendar
//************************************
if (is_page('race-calendar')) {
	echo 'Upcoming Events';
}
//********************************
// is current page the Future Events
//************************************
elseif (is_page('future-events')) {
	$todayear = date("Y");
	$dateyear = date("Y", strtotime($todayear . "+1 Year"));
	echo $dateyear;
	echo ' Events';
}
//*******************************************
// is current page the Historical Events Archive
//***********************************************
elseif (is_page('historical-events-archive')) {
	echo 'Search Results';
}
//*******************************************
// else the page is the Event Archives
//***********************************************
else {
	echo 'Historical Events Archive';
} ?>
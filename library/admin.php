<?php
/* This file handles the admin area and functions. You can use this file to make changes to the dashboard. 
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/

/************* DASHBOARD WIDGETS *****************/

// LOAD ADVANCED CUSTOM FIELDS PLUGIN
define( 'ACF_LITE', true ); // hide the ACF menu item in the left sidebar of the Admin Area


function disable_default_dashboard_widgets() {
	
	/************* DISABLE DEFAULT DASHBOARD WIDGETS *************/
	remove_meta_box('dashboard_primary', 'dashboard', 'side'); // wordpress news
	// remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); // incoming links
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // quick press
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); // drafts
	// remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // comments
	// remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // recent activity
	
	/************* DISABLE WELCOME PANEL *************/
	remove_action('welcome_panel', 'wp_welcome_panel');
	
	/************* DISABLE SIDEBAR MENU ITEMS *************/
	// remove_menu_page('index.php'); // dashboard
	// remove_menu_page('edit.php'); // posts
	// remove_menu_page('edit-comments.php'); // comments
	// remove_menu_page('themes.php'); // appearance
	remove_menu_page('plugins.php'); // plugins
	// remove_menu_page('users.php'); //users
	remove_menu_page('tools.php'); //tools
	// remove_menu_page('options-general.php'); // settings
	// remove_menu_page('wpseo_dashboard'); // Yoast SEO
}
// removing the dashboard widgets
add_action( 'admin_menu', 'disable_default_dashboard_widgets' );


// REMOVE APPEARANCE SUBMENU ITEMS
function remove_theme_submenus() {
    global $submenu; 
    unset($submenu['themes.php'][5]); // appearance > themes
    unset($submenu['themes.php'][6]); // appearance > customize
    // unset($submenu['themes.php'][7]); // appearance > widgets
    // unset($submenu['themes.php'][10]); // appearance > menus
    unset($submenu['themes.php'][11]); // appearance > editor
    // unset($submenu['themes.php'][20]); // appearance > background
}
// removing appearance submenu items
add_action('admin_init', 'remove_theme_submenus');


// REMOVE ADMIN BAR MENU ITEMS
function my_remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('themes'); // view sites > themes
	$wp_admin_bar->remove_menu('customize'); // view sites > customize
	// $wp_admin_bar->remove_menu('widgets'); // view sites > widgets
	// $wp_admin_bar->remove_menu('menus'); // view sites > menus
	$wp_admin_bar->remove_menu('customize-background'); // view sites > background
	$wp_admin_bar->remove_menu('updates'); // updates
	// $wp_admin_bar->remove_menu('comments'); // comments
	$wp_admin_bar->remove_menu('new-content'); // new post
	// $wp_admin_bar->remove_menu('edit'); // edit post 
	// $wp_admin_bar->remove_menu('wpseo-menu'); // Yoast SEO 
}
// removing admin bar links
add_action('wp_before_admin_bar_render', 'my_remove_admin_bar_links');

/*
For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/


/************* CUSTOM DASHBOARD WIDGETS *****************/

// calling all custom dashboard widgets
function bones_custom_dashboard_widgets() {
	/* Be sure to drop any other created Dashboard Widgets
	* in this function and they will all load. */
}

// adding any custom widgets
add_action( 'wp_dashboard_setup', 'bones_custom_dashboard_widgets' );


/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
function bones_login_css() {
	wp_enqueue_style( 'bones_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function bones_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function bones_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'bones_login_css', 10 );
add_filter( 'login_headerurl', 'bones_login_url' );
add_filter( 'login_headertitle', 'bones_login_title' );


/************* CUSTOMIZE ADMIN *******************/

// Custom Backend Footer
function bones_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="http://33degreesds.com" target="_blank">33 Degrees Design Studio</a></span>.', 'bonestheme' );
}

// adding it to the admin area
add_filter( 'admin_footer_text', 'bones_custom_admin_footer' );

?>

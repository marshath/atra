<?php
/* Custom Post Types, Categories, and Taxonomies

*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the Post Types
function custom_post_boardmember() { 

	// *************************
	// Registering BOARD MEMBERS 
	// *************************
	register_post_type( 'boardmember', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Board Members', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Board Member', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Board Members', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Board Member', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Board Members', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Board Member', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Board Member', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Board Member', 'bonestheme' ), /* Search Board Member Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'These are the board members and advisors', 'bonestheme' ), /* Board Member Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 22, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-board.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'boardmember', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'boardmember', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail', 'sticky')
		) /* end of options */
	); /* end of register Board Members */
	
	// *******************
	// Registering PARTERS 
	// *******************
	register_post_type( 'partner', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Partners', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Partner', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Partners', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Partner', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Partners', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Partner', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Partner', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Partner', 'bonestheme' ), /* Search Partner Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'These are ATRAs partner organizations', 'bonestheme' ), /* Partner Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 23, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-partners.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'partner', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'partner', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'sticky')
		) /* end of options */
	); /* end of register Partners */
	
	// ******************
	// Registering EVENTS 
	// ******************
	register_post_type( 'event', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Events', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Event', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Events', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Event', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Events', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Event', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Event', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Event', 'bonestheme' ), /* Search Event Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'These are the race events', 'bonestheme' ), /* Event Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 21, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-events.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'event', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'event', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail', 'sticky')
		) /* end of options */
	); /* end of register Events */
	
	// *************************
	// Registering SPLASH IMAGES 
	// *************************
	register_post_type( 'splash', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Splash Images', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Splash Image', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Splash Images', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Splash Image', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Splash Images', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Splash Image', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Splash Image', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Splash Image', 'bonestheme' ), /* Search Splash Image Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'These are the splash images for the homepage and events', 'bonestheme' ), /* Splash Image Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 24, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-splash.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'splash', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'splash', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'thumbnail', 'sticky')
		) /* end of options */
	); /* end of register Splash Images */
	
	
	// ****************************************************
	// Add the default Categories or Tags to the post types 
	// ****************************************************
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'boardmember' );
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type( 'post_tag', 'boardmember' );
	
}


	// *****************************************
	// adding the function to the Wordpress init 
	// *****************************************
	add_action( 'init', 'custom_post_boardmember');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	
	// **********************************
	// Registering ROLES -> Board Members
	// **********************************
	register_taxonomy( 'roles', 
		array('boardmember'), /* if you change the name of register_post_type( 'boardmember', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Roles', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Role', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Roles', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Roles', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Role', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Role:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Role', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Role', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Role', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Role Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'role' ),
		)
	);	
	
	
	// **************************************
	// Registering QUALIFICATIONS -> Events
	// **************************************
	register_taxonomy( 'qualifications', 
		array('event'), /* if you change the name of register_post_type( 'boardmember', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Qualifications', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Qualification', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Qualifications', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Qualifications', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Qualification', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Qualification:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Qualification', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Qualification', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Qualification', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Qualification Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'qualification' ),
		)
	);
	
	
	// ************************************
	// Registering LOCATION - Splash Images
	// ************************************
	register_taxonomy( 'locations', 
		array('splash'), /* if you change the name of register_post_type( 'boardmember', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Locations', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Location', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Locations', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Locations', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Location', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Location:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Location', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Location', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Location', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Location Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'location' ),
		)
	);	

?>

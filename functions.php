<?php
/* Functions document
	- Thumbnail sizes
	- Sidebar widgets
	- Custom fonts
*/
// update_option('siteurl','https://localhost:8888/trailrunner.com/atra14/');
// update_option('home','https://localhost:8888/trailrunner.com/atra14/');

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
require_once( 'library/custom-post-type.php' ); // board members, events, splash images

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
require_once( 'library/admin.php' );


/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

	// let's get language support going, if you need it
	// load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

	// launching operation cleanup
	add_action( 'init', 'bones_head_cleanup' );
	// A better title
	add_filter( 'wp_title', 'rw_title', 10, 3 );
	// remove WP version from RSS
	add_filter( 'the_generator', 'bones_rss_version' );
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
	// clean up gallery output in wp
	add_filter( 'gallery_style', 'bones_gallery_style' );

	// enqueue base scripts and styles
	add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
	// ie conditional wrapper

	// launching this stuff after theme setup
	bones_theme_support();

	// adding sidebars to Wordpress (these are created in functions.php)
	add_action( 'widgets_init', 'bones_register_sidebars' );

	// cleaning up random code around images
	add_filter( 'the_content', 'bones_filter_ptags_on_images' );
	// cleaning up excerpt
	add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );



/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}


/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'atra-700', 732, 360, true );
add_image_size( 'atra-300', 300, 225, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'atra-700' => __('732px by 360px'),
		'atra-300' => __('300px by 225px'),
	) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/


/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {

	// ***************************
	// Registering EVENTS - BANNER 
	// ***************************
	register_sidebar(array(
		'id' => 'banner-events',
		'name' => __( 'Events – Banner', 'bonestheme' ),
		'description' => __( 'Member banner ad space (728x90 px) on all Event pages.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
	// ****************************
	// Registering EVENTS - SIDEBAR 
	// ****************************
	register_sidebar(array(
		'id' => 'sidebar-events',
		'name' => __( 'Events – Sidebar', 'bonestheme' ),
		'description' => __( 'The sidebar area on all Event pages. Ad space (336x280 px)', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// *******************************
	// Registering FIND A TRAIL - BANNER 
	// *******************************
	register_sidebar(array(
		'id' => 'banner-trail',
		'name' => __( 'Find a Trail – Banner', 'bonestheme' ),
		'description' => __( 'Member banner ad space (728x90 px) on all Find a Trail pages.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// ********************************
	// Registering FIND A TRAIL - SIDEBAR 
	// ********************************
	register_sidebar(array(
		'id' => 'sidebar-trail',
		'name' => __( 'Find a Trail – Sidebar', 'bonestheme' ),
		'description' => __( 'The sidebar area on all Find a Trail pages. Ad space (336x280 px)', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// *******************************
	// Registering FIND A TRAIL SHOE - BANNER 
	// *******************************
	register_sidebar(array(
		'id' => 'banner-trailshoe',
		'name' => __( 'Find a Trail Shoe – Banner', 'bonestheme' ),
		'description' => __( 'Member banner ad space (728x90 px) on all Find a Trail Shoe pages.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// ********************************
	// Registering FIND A TRAIL SHOE - SIDEBAR 
	// ********************************
	register_sidebar(array(
		'id' => 'sidebar-trailshoe',
		'name' => __( 'Find a Trail Shoe – Sidebar', 'bonestheme' ),
		'description' => __( 'The sidebar area on all Find a Trail Shoe pages. Ad space (336x280 px)', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// *******************************
	// Registering TRAIL NEWS - BANNER 
	// *******************************
	register_sidebar(array(
		'id' => 'banner-news',
		'name' => __( 'Trail News – Banner', 'bonestheme' ),
		'description' => __( 'Member banner ad space (728x90 px) on all Trail News (blog) pages.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// ********************************
	// Registering TRAIL NEWS - SIDEBAR 
	// ********************************
	register_sidebar(array(
		'id' => 'sidebar-news',
		'name' => __( 'Trail News – Sidebar', 'bonestheme' ),
		'description' => __( 'The sidebar area on all Trial News (blog) pages. Ad space (336x280 px)', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// *******************************
	// Registering RESOURCES - BANNER 
	// *******************************
	register_sidebar(array(
		'id' => 'banner-resources',
		'name' => __( 'Resources – Banner', 'bonestheme' ),
		'description' => __( 'Member banner ad space (728x90 px) on all Resource pages.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// *******************************
	// Registering RESOURCES - SIDEBAR 
	// *******************************
	register_sidebar(array(
		'id' => 'sidebar-resources',
		'name' => __( 'Resources – Sidebar', 'bonestheme' ),
		'description' => __( 'The sidebar area on all Resource pages. Ad space (336x280 px)', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// *******************************
	// Registering WESTERN STATES TRAIL - BANNER 
	// *******************************
	register_sidebar(array(
		'id' => 'banner-westernstates',
		'name' => __( 'Western States Trail – Banner', 'bonestheme' ),
		'description' => __( 'Member banner ad space (728x90 px) on the Western States Trail pages.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// *******************************
	// Registering WESTERN STATES TRAIL - SIDEBAR 
	// *******************************
	register_sidebar(array(
		'id' => 'sidebar-westernstates',
		'name' => __( 'Western States Trail – Sidebar', 'bonestheme' ),
		'description' => __( 'The sidebar area on the Western States Trail pages. Ad space (336x280 px)', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// *******************************
	// Registering EVENT LIABILITY - BANNER 
	// *******************************
	register_sidebar(array(
		'id' => 'banner-eli',
		'name' => __( 'Event Liability – Banner', 'bonestheme' ),
		'description' => __( 'Member banner ad space (728x90 px) on the Event Liability Insurance page.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// ***************************************
	// Registering EVENT LIABILITY - SIDEBAR 
	// ***************************************
	register_sidebar(array(
		'id' => 'sidebar-eli',
		'name' => __( 'Event Liability – Sidebar', 'bonestheme' ),
		'description' => __( 'The sidebar area on for Event Liability Insurance.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// ***************************************
	// Registering BECOMING A MEMBER - SIDEBAR 
	// ***************************************
	register_sidebar(array(
		'id' => 'sidebar-members',
		'name' => __( 'Become a Member', 'bonestheme' ),
		'description' => __( 'The sidebar about becoming an ATRA member.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// **********************************
	// Registering SOCIAL MEDIA - SIDEBAR 
	// **********************************
	register_sidebar(array(
		'id' => 'sidebar-socials',
		'name' => __( 'Social Media', 'bonestheme' ),
		'description' => __( 'The sidebar area on for Social Media.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// ***************************************
	// Registering MARKETING - SIDEBAR 
	// ***************************************
	register_sidebar(array(
		'id' => 'sidebar-marketing',
		'name' => __( 'Social Marketing', 'bonestheme' ),
		'description' => __( 'The sidebar area on for Marketing.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	// ***************************************
	// Registering CONTACT US - SIDEBAR 
	// ***************************************
	register_sidebar(array(
		'id' => 'sidebar-contact',
		'name' => __( 'Contact Us', 'bonestheme' ),
		'description' => __( 'The sidebar area on for Contact Us.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
} // don't remove this bracket!


/************************************************************/
/************* RACE CALENDAR SEARCH FILTERING ***************/
/************************************************************/

function buildSelect($tax){	
	$terms = get_terms($tax);
	$x = '<select name="'. $tax .'">';
	$x .= '<option value="">Select '. ucfirst($tax) .'</option>';
	foreach ($terms as $term) {
		$x .= '<option value="' . $term->slug . '">' . $term->name . '</option>';	
	}
	$x .= '</select>';
	return $x;
}

/************* INSERTED IMAGES AND FIGURES *********************/
class CTF_Insert_Figure {

	/**
		* Initialize the class
	*/
	public function __construct() {
		add_filter( 'image_send_to_editor', array( $this, 'insert_figure' ), 10, 9 );
	}
	
	/**
		* Insert the figure tag to attched images in posts
		*
		* @since  1.0.0
		* @access public
		* @return string return custom output for inserted images in posts
	*/
	public function insert_figure($html, $id, $caption, $title, $align, $url) {
		// remove protocol
		$url = str_replace(array('http://','https://'), '//', $url);
		$html5 = "<figure id='post-$id' class='align-$align media-$id'>";
		$html5 .= "<img src='$url' alt='$title' />";
		if ($caption) {
			$html5 .= "<figcaption>$caption</figcaption>";
		}
		$html5 .= "</figure>";
		return $html5;
	}
}

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
	<article  class="cf">
		<header class="comment-author vcard">
			<?php /*
				this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
				echo get_avatar($comment,$size='32',$default='<path_to_url>' );
			*/ ?>
			<?php // custom gravatar call ?>
			<?php
				// create variable
				$bgauthemail = get_comment_author_email();
			?>
			<img data-gravatar="//www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
			<?php // end custom gravatar call ?>
			<?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
			<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

		</header>
		<?php if ($comment->comment_approved == '0') : ?>
		<div class="alert alert-info">
			<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
		</div>
		<?php endif; ?>
		<section class="comment_content cf">
			<?php comment_text() ?>
		</section>
		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

add_action('pre_comment_on_post', 'block_wp_comments'); // block comments

function block_wp_comments() { 
	wp_die( __('Sorry, comments are closed for this item.') ); 
}

/* DON'T DELETE THIS CLOSING TAG */ ?>

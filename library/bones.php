<?php
/* This is the core Bones file where most of the main functions & features reside. If you have any custom functions, it's best to put them in the functions.php file.

  - head cleanup (remove rsd, uri links, junk css, ect)
  - enqueueing scripts & styles
  - theme support functions
  - custom menu output & fallbacks
  - related post function
  - page-navi function
  - removing <p> from around images
  - customizing the post excerpt
  - custom google+ integration
  - adding custom fields to user profiles

*/

/*********************
WP_HEAD GOODNESS
Cleans up the Wordpress head
*********************/

function bones_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
} /* end bones head cleanup */

// A better title
function rw_title( $title, $sep, $seplocation ) {
  global $page, $paged;

  // Don't affect in feeds.
  if ( is_feed() ) return $title;

  // Add the blog's name
  if ( 'right' == $seplocation ) {
    $title .= get_bloginfo( 'name' );
  } else {
    $title = get_bloginfo( 'name' ) . $title;
  }

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );

  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title .= " {$sep} {$site_description}";
  }

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 ) {
    $title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
  }

  return $title;

} // end better title

// remove WP version from RSS
function bones_rss_version() { return ''; }

// remove WP version from scripts
function bones_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

// remove injected CSS for recent comments widget
function bones_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function bones_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

// remove injected CSS from gallery
function bones_gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}


/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function bones_scripts_and_styles() {

/*   global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

  if (!is_admin()) {

		// modernizr (without media query polyfill)
		wp_register_script( 'bones-modernizr', get_stylesheet_directory_uri() . '/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

		// register main stylesheet
		wp_register_style( 'bones-stylesheet', get_stylesheet_directory_uri() . '/library/style.css', array(), '', 'all' );

		// ie-only style sheet
		wp_register_style( 'bones-ie-only', get_stylesheet_directory_uri() . '/library/style-ie.css', array(), '' );

    // comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
		  wp_enqueue_script( 'comment-reply' );
    }

		//adding scripts file in the footer
		wp_register_script( 'bones-js', get_stylesheet_directory_uri() . '/library/js/scripts.js', array( 'jquery' ), '', true );

		// enqueue styles and scripts
		wp_enqueue_script( 'bones-modernizr' );
		wp_enqueue_style( 'bones-stylesheet' );
		wp_enqueue_style( 'bones-ie-only' );

		$wp_styles->add_data( 'bones-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bones-js' );

	} */
}

/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function bones_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );

	// default thumb size
	// set_post_thumbnail_size(125, 125, true);

	// wp custom background (thx to @bransonwerner for update)
/*	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',    // background image default
	    'default-color' => '',    // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);
*/
	// rss thingy
	add_theme_support('automatic-feed-links');

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// adding post format support
	// add_theme_support( 'post-formats',
	//	array(
			// 'aside',             // title less blurb
			// 'gallery',           // gallery of images
			// 'link',              // quick link to other site
			// 'image',             // an image
			// 'quote',             // a quick quote
			// 'status',            // a Facebook like status update
			// 'video',             // video
			// 'audio',             // audio
			// 'chat'               // chat transcript
	//	)
	// );

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'bonestheme' ),   // main nav in header
			'footer-links' => __( 'Footer Links', 'bonestheme' ), // secondary nav in footer
			'legal-links' => __( 'Legal Links', 'bonestheme' ) // legal links in footer
		)
	);
} /* end bones theme support */

 
/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using bones_related_posts(); )
function bones_related_posts() {
	echo '<ul id="bones-related-posts">';
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) {
			$tag_arr .= $tag->slug . ',';
		}
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 5, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts( $args );
		if($related_posts) {
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
				<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; }
		else { ?>
			<?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'bonestheme' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_postdata();
	echo '</ul>';
} /* end bones related posts function */


/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
//function bones_page_navi() {
//  global $wp_query;
//  $bignum = 999999999;
//  if ( $wp_query->max_num_pages <= 1 )
//    return;
//  echo '<nav class="pagination">';
//  echo paginate_links( array(
//    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
//    'format'       => '',
//    'current'      => max( 1, get_query_var('paged') ),
//    'total'        => $wp_query->max_num_pages,
//    'prev_text'    => '&larr;',
//    'next_text'    => '&rarr;',
//    'type'         => 'list',
//    'end_size'     => 3,
//    'mid_size'     => 3
//  ) );
//  echo '</nav>';
//} /* end page navi */


function bones_page_navi() {
    global $wpdb, $wp_query;

    //Check for custom query variable, if set, assign to navi_query, if not, assign main wp_query to navi_query
    if (isset($custom_query) && $custom_query != '') {
        $navi_query = $custom_query;
    } else {
        $navi_query = $wp_query;
    }
    //change $posts_per_page variable to be set with the new navi_query
    $posts_per_page = intval($navi_query->query_vars['posts_per_page']);
    $paged = intval(get_query_var('paged'));
    $numposts = $navi_query->found_posts; //update with navi_query
    $max_page = $navi_query->max_num_pages; //update with navi_query
    if ( $numposts <= $posts_per_page ) { return; }
    if(empty($paged) || $paged == 0) {
        $paged = 1;
    }
    $pages_to_show = 7;
    $pages_to_show_minus_1 = $pages_to_show - 1;
    $half_page_start = floor($pages_to_show_minus_1 / 2);
    $half_page_end = ceil($pages_to_show_minus_1 / 2);
    $start_page = $paged - $half_page_start;
    if($start_page <= 0) {
        $start_page = 1;
    }
    $end_page = $paged + $half_page_end;
    if(($end_page - $start_page) != $pages_to_show_minus_1) {
        $end_page = $start_page + $pages_to_show_minus_1;
    }
    if($end_page > $max_page) {
        $start_page = $max_page - $pages_to_show_minus_1;
        $end_page = $max_page;
    }
    if($start_page <= 0) {
        $start_page = 1;
    }

    echo $before.'<nav class="pagination"><ul class="page_numbers">'.'';
    if ($start_page >= 2 && $pages_to_show < $max_page) {
        $first_page_text = __( 'First', 'bonestheme' );
        echo '<li><a class="page-numbers" href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
    }
    echo '<li>';
	previous_posts_link('&laquo;');
    echo '</li>';
    for($i = $start_page; $i <= $end_page; $i++) {
        if($i == $paged) {
            echo '<li><span class="page-numbers current">'.$i.'</span></li>';
        } else {
            echo '<li><a class="page-numbers" href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
        }
    }
    echo '<li>';
	next_posts_link('&raquo;', $max_page);
    echo '</li>';
    if ($end_page < $max_page) {
        $last_page_text = __( 'Last', 'bonestheme' );
        echo '<li><a class="next page-numbers" href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
    }
    echo '</ul></nav>'.$after.'';
} /* end page navi */


/*********************
EXTEND MEDIA LIBRARY FILE TYPES
*********************/
// Added to extend allowed files types in Media upload
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	
	// Add *.GPX files to Media upload
	$existing_mimes['gpx'] = 'application/postscript';
	
	return $existing_mimes;
}

/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bones_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function bones_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __( 'Read ', 'bonestheme' ) . get_the_title($post->ID).'">'. __( 'Read more &raquo;', 'bonestheme' ) .'</a>';
}

?>
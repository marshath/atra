<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<?php // Google Chrome Frame for IE ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php wp_title(''); ?></title>

	<?php // mobile metadata ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<?php // icons & favicons ?>
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<![endif]-->
	<?php // or, set /favicon.ico for IE10 win ?>
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
	
	<?php // site styles ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">	
	<?php // Loads IE Styles and HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
			<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style-ie.css" type="text/css" media="screen" />
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
	<![endif]-->

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php get_template_part('header-social'); ?>
	<?php get_template_part('header-plugins'); ?>
	
	<?php // wordpress head functions ?>
	<?php wp_head(); ?>
	<?php // end of wordpress head ?>

</head>

<body <?php body_class(); ?>>

	<?php // Insert Google Tag Manager Here ?>
	<?php // end tag manager ?>
	
	<div id="container" class="page-wrap">

		<header class="header" role="banner">
		
		<h3 id="menu-toggle"><a href="#"><span class="menu-icon" aria-hidden="true" data-icon="&#xe603;"></span> <span class="menu-text">Menu</span></a></h3>

			<div id="inner-header" class="inner-header">

				<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
				<div id="logo" class="logo"><a href="<?php echo home_url(); ?>" rel="nofollow">American Trail Running Association (ATRA)</a></div>

				<?php // Need to look at replacing with the customizable navigation ?>
				<nav role="navigation">
					<?php wp_nav_menu(array(
					'container' => false,                           // remove nav container
					'container_class' => 'row',                     // class of container (should you choose to use it)
					'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
					'menu_class' => 'nav header-nav',      			// adding custom nav class
					'menu_id' => 'nav-menu',      					// adding custom nav id
					'theme_location' => 'main-nav',                 // where it's located in the theme
					'before' => '',                                 // before the menu
					'after' => '',                                  // after the menu
					'link_before' => '',                            // before each link
					'link_after' => '',                             // after each link
					'depth' => 0,                                   // limit the depth of the nav
					'fallback_cb' => ''                             // fallback function (if there is one)
					)); ?>
					
				</nav>

			</div>

		</header>
		<div class="headroom"<?php
		
			// Custom header backgrounds via Splash Images post type
			if (is_page('home')) {
				$bgimages=array('post_type'=>'splash', 'locations' => 'home-page', 'orderby'=>'rand', 'posts_per_page'=>'1');
				$bgimg=new WP_Query($bgimages);
				while ($bgimg->have_posts()) : $bgimg->the_post();
					$page_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
					$page_bg_image_url = $page_bg_image[0]; // this returns just the URL of the image
				endwhile; ?>
			 style="background: url('<?php echo $page_bg_image_url; ?>') center center;	background-size: cover;"
			<?php } // Closing homepage background
			
			if (is_page(array('119', '123', '6529')) or (is_post_type_archive('event')) ) {
				$bgimages=array('post_type'=>'splash', 'locations' => 'event-page', 'orderby'=>'rand', 'posts_per_page'=>'1');
				$bgimg=new WP_Query($bgimages);
				while ($bgimg->have_posts()) : $bgimg->the_post();
					$page_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
					$page_bg_image_url = $page_bg_image[0]; // this returns just the URL of the image
				endwhile; ?>
			 style="background: url('<?php echo $page_bg_image_url; ?>') center center;	background-size: cover;"
			<?php } // Closing Race Calendar and Find a Trail background 
			
		?>></div><?php // Leave empty carrot to close opening div ?>

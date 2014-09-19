<?php
/**
 * @package WordPress
 * @subpackage TheDarkroom
 */
 ?>


<?php 
/**
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );


/**
 * Register widgetized area and update sidebar with default widgets
 */
function imminimal_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Sidebar 1', 'imminimal' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array (
		'name' => __( 'Sidebar 2', 'imminimal' ),
		'id' => 'sidebar-2',
		'description' => __( 'An optional second sidebar area', 'imminimal' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );	
}
add_action( 'init', 'imminimal_widgets_init' );



// Enable support for post-thumbnails

add_theme_support('post-thumbnails');

// If we want to ensure that we only call this function if
// the user is working with WP 2.9 or higher,
// let's instead make sure that the function exists first

if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 300, 300, true ); // Normal post thumbnails
    add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size
	}
		

// WP 3.0 Support 
add_custom_background(); // This Enables the Appearance > Background

define( 'HEADER_IMAGE', '%s/images/logo.png' ); // The default logo located in themes folder
define( 'HEADER_IMAGE_WIDTH', apply_filters( '', 990 ) ); // Width of header image
define( 'HEADER_IMAGE_HEIGHT', apply_filters( '',	153 ) ); // Height of header image
define( 'NO_HEADER_TEXT', true );
add_custom_image_header( '', 'admin_header_style' ); // This Enables the Appearance > Header

//Dashboard Customization
//Logos

add_action('login_head', 'my_custom_login_logo');

function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/im-login.png) !important; }
    </style>';
}

//Replaces wp-logo.gif (size 30x31)

add_action('admin_head', 'my_custom_logo');

function my_custom_logo() {
   echo '
      <style type="text/css">
         #header-logo { background-image: url('.get_bloginfo('template_directory').'/images/im-logo.png) !important; width:160px }
      </style>
   ';
}

function custom_dashboard_help() {
      echo '<div style="overflow:hidden"><img src="'.get_bloginfo('template_directory').'/images/widget.gif"></div><p>For support, upgrades, search engine optimization (SEO) or custom features:</p>
	  <p style="font-size:140%"><a href="http://www.immersionmedia.com/">ImmersionMedia.com</a> <br>+1 (949) 422-4875</p>';
	
}
//Add read more link to excerpt
function new_excerpt_more($more) {
    global $post;
	return '... <a href="'. get_permalink($post->ID) . '" class="readmore">Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
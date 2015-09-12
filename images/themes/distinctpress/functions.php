<?php

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/inc/' );
require_once dirname( __FILE__ ) . '/admin/inc/options-framework.php';

/** Load the Core Files */
require_once( trailingslashit( get_template_directory() ) . 'includes/init.php' );
require_once( trailingslashit( get_template_directory() ) . 'includes/widgets.php' );
require_once( trailingslashit( get_template_directory() ) . 'admin/customizer/customizer.php' );

define('DISTINCTIVETHEMES_THEME', 'DistinctPress');
define('DISTINCTIVETHEMES_THEME_DIR', get_stylesheet_directory_uri());
define('DISTINCTIVETHEMES_THEME_LOGO', DISTINCTIVETHEMES_THEME_DIR.'/images/headers/header-default.png');

new DistinctPress();

/** Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'distinctpress_theme_setup' );

/** Theme setup function. */
function distinctpress_theme_setup() {	

	/** Add theme support for Feed Links. */
	add_theme_support( 'automatic-feed-links' );		

	/** Set content width. */
	distinctpress_set_content_width( 640 );	

	/** Add custom image sizes. */
	add_action( 'init', 'distinctpress_add_image_sizes' );

	$custom_header_support = array( 	

	'default-image' => '%s/images/headers/header-default.png',
	'default-text-color' => '',
	'width' => apply_filters( 'distinctpress_header_image_width', 280 ),
	'height' => apply_filters( 'distinctpress_header_image_height', 80 ),
	'flex-height' => true,
	'header-text' => false,
	'wp-head-callback' => 'distinctpress_header_style',
	'admin-head-callback' => 'distinctpress_admin_header_style',
	'admin-preview-callback' => 'distinctpress_admin_header_image'
	);

	add_theme_support( 'custom-header', $custom_header_support );

	add_theme_support( 'post-thumbnails' );

}

/** Adds custom image sizes */
function distinctpress_add_image_sizes() {

	add_image_size( 'distinctpress-full-featured', 640, 300, true );
	add_image_size( 'distinctpress-featured', 200, 200, true );
	add_image_size( 'distinctpress-featured-widget', 60, 60, true );

}

function distinctpress_customize_css() {
	?>

         <style type="text/css">
            #header, .header-menu ul ul.sub-menu, .header-menu ul ul.sub-menu li, .header-menu ul ul.children li { background:<?php echo get_option('header_background_colour'); ?>; }
            #footer { background:<?php echo get_option('footer_background_colour'); ?>; }
            #loop-nav-next-prev a, #loop-nav-singlular-post a, #respond input[type="submit"], a.comment-reply-link, a.more-link:link, a.more-link:visited, #scrollUp { background:<?php echo get_option('accent_colour'); ?>; }
			.entry-content a:hover { color:<?php echo get_option('accent_colour'); ?>; }
         </style>

    <?php

}

add_action( 'wp_head', 'distinctpress_customize_css');

function distinctpress_scripts() {
	wp_enqueue_style( 'distinctpress-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'distinctpress_scripts' );

?>
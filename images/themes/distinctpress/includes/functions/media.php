<?php

/** Register Distinctive Alpha Core scripts. */
add_action( 'wp_enqueue_scripts', 'distinctpress_register_scripts', 1 );

/** Load Distinctive Alpha Core scripts. */
add_action( 'wp_enqueue_scripts', 'distinctpress_enqueue_scripts' );

/** Register JavaScript and Stylesheet files for the framework. */
function distinctpress_register_scripts() {

	/** Register the 'common' scripts. */
	wp_enqueue_script( 'distinctpress-js-common', esc_url( DISTINCTPRESS_JS_URI . 'common.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'distinctpress-js-init', esc_url( DISTINCTPRESS_JS_URI . 'init.js' ), array( 'jquery' ), '1.0', true );	

	/** Register '960.css' for grid. And Font */
	wp_enqueue_style( 'distinctpress-css-960', esc_url( DISTINCTPRESS_CSS_URI . '960.css' ) );
	wp_enqueue_style( 'distinctpress-css-responsive', esc_url( DISTINCTPRESS_CSS_URI . 'responsive.css' ) );
	wp_enqueue_style( 'distinctpress-css-elusive', esc_url( DISTINCTPRESS_CSS_URI . 'elusive-webfont.css' ) );
	
	/** Register Google Fonts. */
	wp_enqueue_style( 'distinctpress-google-fonts', esc_url( 'http://fonts.googleapis.com/css?family=Cantarell:400,700|Fjalla+One' ) );
}

/** Tells WordPress to load the scripts needed for the framework using the wp_enqueue_script() function. */
function distinctpress_enqueue_scripts() {

	/** Load the comment reply script on singular posts with open comments if threaded comments are supported. */
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

?>
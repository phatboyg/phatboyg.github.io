<?php

/** Core Theme Framework */
class DistinctPress {	

	/** Constructor Method */
	function __construct() {

		/** Define a Global variable Standard Class */
		global $distinctpress;
		$distinctpress = new stdClass;		

		/** Define framework, parent theme, and child theme constants. */
		add_action( 'after_setup_theme', array( &$this, 'constants' ), 1 );		

		/** Load the core functions required by the rest of the framework. */
		add_action( 'after_setup_theme', array( &$this, 'core' ), 2 );

		/** Language functions and translations setup. */
		add_action( 'after_setup_theme', array( &$this, 'i18n' ), 3 );	

		/** Load the framework functions. */
		add_action( 'after_setup_theme', array( &$this, 'functions' ), 12 );

	}

	/** Define Constant Paths */
	function constants() {

		define( 'DISTINCTPRESS_DIR', trailingslashit( get_template_directory() ) );
		define( 'DISTINCTPRESS_LIB_DIR', trailingslashit( DISTINCTPRESS_DIR . 'includes' ) );
		define( 'DISTINCTPRESS_FUNCTIONS_DIR', trailingslashit( DISTINCTPRESS_LIB_DIR . 'functions' ) );
		define( 'DISTINCTPRESS_ADMIN_DIR', trailingslashit( DISTINCTPRESS_LIB_DIR . 'admin' ) );
		define( 'DISTINCTPRESS_JS_DIR', trailingslashit( DISTINCTPRESS_LIB_DIR . 'js' ) );
		define( 'DISTINCTPRESS_CSS_DIR', trailingslashit( DISTINCTPRESS_LIB_DIR . 'css' ) );	

		define( 'DISTINCTPRESS_URI', trailingslashit( get_template_directory_uri() ) );
		define( 'DISTINCTPRESS_LIB_URI', trailingslashit( DISTINCTPRESS_URI . 'includes' ) );
		define( 'DISTINCTPRESS_ADMIN_URI', trailingslashit( DISTINCTPRESS_LIB_URI . 'admin' ) );
		define( 'DISTINCTPRESS_JS_URI', trailingslashit( DISTINCTPRESS_LIB_URI . 'js' ) );
		define( 'DISTINCTPRESS_CSS_URI', trailingslashit( DISTINCTPRESS_LIB_URI . 'css' ) );	

	}	

	/** Loads the core framework functions. */
	function core() {

		/** Load the core framework functions. */
		require_once( DISTINCTPRESS_FUNCTIONS_DIR . 'core.php' );	

	}

	

	/** Loads translation files */
	function i18n() {
		/** Translations can be filed in the /languages/ directory */
		load_theme_textdomain( 'distinctpress', DISTINCTPRESS_DIR . 'languages' );
		
		/** Get the user's locale. */
		$locale = get_locale();	

		/** Locate a locale-specific functions file. */
		$locale_functions = DISTINCTPRESS_DIR . 'languages/$locale.php';		

		/** If the locale file exists and is readable, load it. */
		if ( !empty( $locale_functions ) && is_readable( $locale_functions ) ) {
			require_once( $locale_functions );
		}

	}

	

	/** Loads the framework functions. */
	function functions() {
		/** Load media-related functions. */

		require_once( DISTINCTPRESS_FUNCTIONS_DIR . 'media.php' );	

		/** Load utility functions. */
		require_once( DISTINCTPRESS_FUNCTIONS_DIR . 'utility.php' );
		require_once( DISTINCTPRESS_FUNCTIONS_DIR . 'retina.php' );
		/** Load menus functions. */
		require_once( DISTINCTPRESS_FUNCTIONS_DIR . 'menus.php' );			

		/** Load sidebars functions. */
		require_once( DISTINCTPRESS_FUNCTIONS_DIR . 'sidebars.php' );

		/** Load featured image functions. */
		require_once( DISTINCTPRESS_FUNCTIONS_DIR . 'featured-image.php' );	

		/** Load custom header functions. */
		require_once( DISTINCTPRESS_FUNCTIONS_DIR . 'custom-header.php' );

	}		

}

?>
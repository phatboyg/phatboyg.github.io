<?php

/**

 * The core functions file for the DistinctPress framework. Functions defined here are generally

 * used across the entire framework to make various tasks faster. This file should be loaded

 * prior to any other files because its functions are needed to run the framework.

 *

 * @package DistinctPress

 * @subpackage Functions

 */



/** Function for setting the content width of a theme. */

function distinctpress_set_content_width( $width = '' ) {

	global $content_width;

	$content_width = absint( $width );

}



/** Function for getting the theme's content width. */

function distinctpress_get_content_width() {

	global $content_width;

	return $content_width;

}



/** Function for getting the theme's data */

function distinctpress_theme_data( $path = 'template' ) {

	global $distinctpress;

	

	/** If 'template' is requested, get the parent theme data. */

	if ( 'template' == $path ) {



		/** If the parent theme data isn't set, let grab it. */

		if ( empty( $distinctpress->theme_data ) ) {

			

			$distinctpress_theme_data = array();

			$theme_data = wp_get_theme();

			$distinctpress_theme_data['Name'] = $theme_data->get( 'Name' );

			$distinctpress_theme_data['ThemeURI'] = $theme_data->get( 'ThemeURI' );

			$distinctpress_theme_data['AuthorURI'] = $theme_data->get( 'AuthorURI' );

			$distinctpress_theme_data['Description'] = $theme_data->get( 'Description' );

					

		}
 

	}	



	/* Return false for everything else. */

	return false;

}

?>
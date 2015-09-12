<?php

/**

 * The menus functions deal with registering nav menus within WordPress for the core framework.

 *

 * @package DistinctPress

 * @subpackage Functions

 */



/** Register nav menus. */

add_action( 'init', 'distinctpress_register_menus' );



/** Registers the the core menus */

function distinctpress_register_menus() {



	/* Register the 'primary' menu. */

	register_nav_menu( 'distinctpress-primary-menu', __( 'DistinctPress Primary Menu', 'distinctpress' ) );

	

}

?>
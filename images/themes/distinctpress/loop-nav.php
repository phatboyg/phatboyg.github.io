<?php 
if ( !is_singular() ) :
	distinctpress_loop_nav();
elseif ( is_singular( 'post' ) ) :
		distinctpress_loop_nav_singular_post();
endif;
?>
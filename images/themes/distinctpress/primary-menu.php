<?php

function distinctpress_primary_menu_cb() { wp_page_menu(); } ?>

<div class="grid_11">
  <div class="header-menu">
    <div class="header-menu-data">
      <?php if ( has_nav_menu( 'distinctpress-primary-menu' ) ): 
      $args = array(
        'container' => 'div',
        'container_class' => 'primary-container',
        'menu_id'    => 'nav',
        'theme_location' => 'distinctpress-primary-menu',
        'menu_class' => 'sf-header-menu',
        'depth' => 0,
        'fallback_cb' => 'distinctpress_primary_menu_cb'
        );
      wp_nav_menu( $args );
      else:
        distinctpress_primary_menu_cb();	
      endif; ?>
    </div>
  </div>
</div>
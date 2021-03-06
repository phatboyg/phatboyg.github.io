<?php if ( is_category() ) : ?>      



<div class="container_16 clearfix">

  <div id="loop-meta" class="grid_16">

    <h1 class="loop-meta-title"><?php printf( __( 'Category Archives: %s', 'distinctpress' ), '<span>' . ucwords( strtolower ( single_cat_title( '', false ) ) ) . '</span>' ); ?></h1>

    <div class="loop-meta-description"><?php echo category_description(); ?></div>

  </div> <!-- end #loop-meta -->

</div> <!-- end .container_16 -->



<?php elseif ( is_tag() ) : ?>



<div class="container_16 clearfix">

  <div id="loop-meta">

    <h1 class="loop-meta-title"><?php printf( __( 'Tag Archives: %s', 'distinctpress' ), '<span>' . ucwords( strtolower ( single_tag_title( '', false ) ) ) . '</span>' ); ?></h1>

    <div class="loop-meta-description"><?php echo tag_description(); ?></div>

  </div> <!-- end #loop-meta -->

</div> <!-- end .container_16 -->



<?php 

elseif ( is_author() ) :

$user_id = get_query_var( 'author' );

?>



<div class="container_16 clearfix">

  <div id="loop-meta">

    <h1 class="loop-meta-title"><?php printf( __( 'Author Archives: %s', 'distinctpress' ), '<span>' . ucwords( strtolower ( get_the_author_meta( 'display_name', $user_id ) ) ) . '</span>' ); ?></h1>

    <div class="loop-meta-description"><?php echo wpautop( get_the_author_meta( 'description', $user_id ) ); ?></div>

  </div> <!-- end #loop-meta -->

</div> <!-- end .container_16 -->



<?php elseif ( is_search() ) : ?>



<div class="container_16 clearfix">

  <div id="loop-meta">

    <h1 class="loop-meta-title"><?php printf( __( 'Search Results: %s', 'distinctpress' ), '<span>' . ucwords( strtolower ( esc_attr ( get_search_query() ) ) ) . '</span>' ); ?></h1>

    <div class="loop-meta-description"><?php printf( __( 'You are browsing the search results for %s', 'distinctpress' ), esc_attr( get_search_query() ) ); ?></div>

  </div> <!-- end #loop-meta -->

</div> <!-- end .container_16 -->



<?php elseif ( is_day() ) : ?>



<div class="container_16 clearfix">

  <div id="loop-meta">

    <h1 class="loop-meta-title"><?php printf( __( 'Daily Archives: %s', 'distinctpress' ), '<span>' . get_the_date() . '</span>' ); ?></h1>

    <div class="loop-meta-description"><?php _e( 'You are browsing the site archives by date.', 'distinctpress' ); ?></div>

  </div> <!-- end #loop-meta -->

</div> <!-- end .container_16 -->



<?php elseif ( is_month() ) : ?>



<div class="container_16 clearfix">

  <div id="loop-meta">

    <h1 class="loop-meta-title"><?php printf( __( 'Monthly Archives: %s', 'distinctpress' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?></h1>

    <div class="loop-meta-description"><?php _e( 'You are browsing the site archives by month.', 'distinctpress' ); ?></div>

  </div> <!-- end #loop-meta -->

</div> <!-- end .container_16 -->



<?php elseif ( is_year() ) : ?>



<div class="container_16 clearfix">

  <div id="loop-meta">

    <h1 class="loop-meta-title"><?php printf( __( 'Yearly Archives: %s', 'distinctpress' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?></h1>

    <div class="loop-meta-description"><?php _e( 'You are browsing the site archives by year.', 'distinctpress' ); ?></div>

  </div> <!-- end #loop-meta -->

</div> <!-- end .container_16 -->



<?php elseif ( is_archive() ) : ?>



<div class="container_16 clearfix">

  <div id="loop-meta">

    <h1 class="loop-meta-title"><?php _e( 'Archives', 'distinctpress' ); ?></h1>

    <div class="loop-meta-description"><?php _e( 'You are browsing the site archives.', 'distinctpress' ); ?></div>

  </div> <!-- end #loop-meta -->

</div> <!-- end .container_16 -->



<?php elseif ( is_404() ) : ?>



<div class="container_16 clearfix">

  <div id="loop-meta">

    <h1 class="loop-meta-title"><?php _e( '404', 'distinctpress' ); ?></h1>

    <div class="loop-meta-description"><?php _e( 'Whoah! You broke something!', 'distinctpress' ); ?></div>

  </div> <!-- end #loop-meta -->

</div> <!-- end .container_16 -->



<?php endif; ?>
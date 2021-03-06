<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  

  <h1 class="entry-title entry-title-single"><?php the_title(); ?></h1>

  

  <div class="entry-meta">

    

	<?php if ( 'attachment' == get_post_type() ) : ?>

	<?php echo distinctpress_post_date() . distinctpress_post_comments() . distinctpress_post_author(); ?>

    <?php if ( is_sticky() ) : printf( '<span class="entry-meta-sep"> &sdot; </span> <span class="entry-meta-featured"><i class="el-icon-star meta-icon"></i>%1$s</span>', __( 'distinctpress-featured', 'distinctpress' ) ); endif; ?>

    <?php endif; ?>      

    

	<?php echo distinctpress_post_edit_link(); ?>

  

  </div><!-- .entry-meta -->

  

  <?php distinctpress_loop_nav_singular(); ?>

  

  <div class="entry-content entry-attachment">

  	<p><a href="<?php echo wp_get_attachment_url( $post->ID ); ?>"><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></a></p>

    <?php the_excerpt(); ?>

	<div class="clear"></div>				

  </div> <!-- end .entry-content -->

  

  <?php echo distinctpress_link_pages(); ?>

  

  <?php if ( 'post' == get_post_type() ) : ?>

  <div class="entry-meta-bottom">

  <?php echo distinctpress_post_category() . distinctpress_post_tags(); ?>

  </div><!-- .entry-meta -->

  <?php endif; ?>     



</div> <!-- end #post-<?php the_ID(); ?> .post_class -->



<?php distinctpress_loop_nav_singular_attachment(); ?>



<?php comments_template( '', true ); ?>
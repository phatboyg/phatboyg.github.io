<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



  <?php distinctpress_full_featured_image(); ?>



  <?php $entry_title = ( 'page' == get_post_type() && distinctpress_post_edit_link() == "" )? 'entry-title entry-title-page' : 'entry-title'; ?>



  <h2 class="<?php echo $entry_title; ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

  

  <?php if ( 'post' == get_post_type() ) : ?>  

  <div class="entry-meta">  



	<?php echo distinctpress_post_date() . distinctpress_post_comments() . distinctpress_post_author(); ?>

    <?php if ( is_sticky() ) : printf( '<span class="entry-meta-sep"> &sdot; </span> <span class="entry-meta-featured"><i class="el-icon-star meta-icon"></i>%1$s</span>', __( 'distinctpress-featured', 'distinctpress' ) ); endif; ?>    

	<?php echo distinctpress_post_edit_link(); ?>  



  </div><!-- .entry-meta -->  

  <?php elseif ( 'page' == get_post_type() && distinctpress_post_edit_link() != "" ) : ?>  

  <div class="entry-meta">

    <?php echo distinctpress_post_edit_link(); ?>

  </div>  

  <?php endif;?>  



  <div class="entry-content">    	

    <?php distinctpress_post_style(); ?>

    <?php echo distinctpress_link_pages(); ?>      

    <div class="clear"></div>

  </div> <!-- end .entry-content -->



  <div class="entry-meta-bottom">

    <?php if ( 'post' == get_post_type() ) : ?>  

    <?php echo distinctpress_post_category() . distinctpress_post_tags(); ?>  

    <?php endif; ?>

  </div><!-- .entry-meta-bottom -->



</div> <!-- end #post-<?php the_ID(); ?> .post_class -->
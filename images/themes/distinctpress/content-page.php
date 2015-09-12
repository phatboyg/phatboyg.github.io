<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  

  <?php $entry_title = ( distinctpress_post_edit_link() == "" )? 'entry-title entry-title-single entry-title-page' : 'entry-title entry-title-single'; ?>

  <h1 class="<?php echo $entry_title; ?>"><?php the_title(); ?></h1>

  

  <div class="entry-content">

  	<?php the_content(); ?>

	<div class="clear"></div>				

  </div> <!-- end .entry-content -->

  

  <?php echo distinctpress_link_pages(); ?>

  

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->



<?php comments_template( '', true ); ?>
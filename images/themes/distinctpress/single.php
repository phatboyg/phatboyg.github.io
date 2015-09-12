<?php get_header();

get_template_part( 'loop-meta' ); ?>  

<div id="mainwrap" class="container_16 clearfix">  
  <div class="grid_11">
    <div id="content">
	  <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'single' ); ?>
      <?php endwhile; ?>
    <?php else : ?>
      <?php get_template_part( 'loop-error' ); ?>
    <?php endif; ?>
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>  

<?php get_footer(); ?>
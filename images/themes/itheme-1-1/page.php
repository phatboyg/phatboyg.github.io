<?php get_header(); ?>

  <div id="content">



  <?php if (ls_getinfo('isref')) { ?>

  <p>You searched for <i><?php ls_getinfo('terms'); ?></i> at <?php ls_getinfo('referrer'); ?>, you might also find these related posts of interest:</p>

  <ul>

  <?php ls_related(5, 10, '<li>', '</li>', '', '', false, false); ?>

  </ul>   

  <?php } ?>

    

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  

    <div class="post" id="post-<?php the_ID(); ?>">

        <h2><?php the_title(); ?></h2>

		

		<div class="entry">

		<?php the_content('<p>Continue reading &raquo;</p>'); ?>

		<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

		<?php edit_post_link('Edit', '<p>', '</p>'); ?>

		</div><!--/entry -->

	

	</div><!--/post -->

	

		<?php endwhile; endif; ?>



  </div><!--/content -->

  

  <div id="footer"><a href="http://www.ndesign-studio.com/resources/wp-themes/">WP Theme</a> &amp; <a href="http://www.ndesign-studio.com/stock-icons/">Icons</a> by <a href="http://www.ndesign-studio.com">N.Design Studio</a></div>

</div><!--/left-col -->



<?php get_sidebar(); ?>

  

<?php get_footer(); ?>
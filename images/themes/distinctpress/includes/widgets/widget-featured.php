<?php

/*---------------------------------------------------------------------------------*/
/* Featured Widget */
/*---------------------------------------------------------------------------------*/

add_action( 'widgets_init', '_featured_widgets' );

function _featured_widgets() {
	register_widget( 'Featured_Widget' );
}

class featured_widget extends WP_Widget {

	function Featured_Widget() {
		$widget_ops = array( 'classname' => 'featured-post-widget', 'description' => __('A widget that displays your featured posts.', '') );	
		$this->WP_Widget( 'featured_widget', __('DistinctiveThemes Featured Posts', ''), $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		if(isset($instance['title'])) { $title = apply_filters('widget_title', $instance['title'] ); } else { $title = 'Featured Posts'; }
		if(isset($instance['postcount'])) { $postcount = $instance['postcount']; } else { $postcount = '5'; }
		if(isset($instance['blogcategory'])) { $blogcategory = $instance['blogcategory']; }

		echo $before_widget;

		if ( isset($title) )
			echo $before_title . $title . $after_title;
		?>

		<ul class="featured">
			<?php 
			global $paged; 
			global $post;
			$category_id = get_cat_ID( $blogcategory );
			if(isset($instance['postcount'])) { $postcount = sanitize_text_field($instance['postcount']); } else { $postcount = '5'; }
			$arguments = array(
			 'post_type' => 'post',
			 'post_status' => 'publish',
			 'showposts' => $postcount,
			 'cat' => $category_id,
			 );
			 $blog_query = new WP_Query($arguments);

			 if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post(); ?>

				 <li class="featured-widget-item">
				 	<a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>" class="recentthumbs"><?php if ( has_post_thumbnail() ) {?><?php the_post_thumbnail( 'distinctpress-featured-widget' ); } else { ?><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/noimg.gif" /><?php } ?></a>
					 <div class="featured-widget-item-inn">
					 <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					 <p><?php the_time('M j, y') ?> &bull; <?php the_category(', ') ?></p>
					 </div>
				 </li>
			<?php endwhile; ?>
			<?php endif; ?>
		</ul>

		<?php
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['postcount'] = ( ! empty( $new_instance['postcount'] ) ) ? absint( $new_instance['postcount'] ) : '';
		$instance['blogcategory'] = ( ! empty( $new_instance['blogcategory'] ) ) ? sanitize_text_field( $new_instance['blogcategory'] ) : '';

		return $instance;
	}

	function form($instance) {
		if(isset($instance['title'])) { $title = esc_attr($instance['title']); }
		if(isset($instance['blogcategory'])) { $blogcategory = esc_attr($instance['blogcategory']); } ?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', '') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if(isset($instance['title'])) { echo $instance['title']; } ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('blogcategory'); ?>"><?php _e('Blog Category:',''); ?></label>
		<?php
		if(isset($instance['postcount'])) { $postcount = $instance['postcount']; } else { $postcount = '5'; }
		$_categories = array();
		$_categories_obj = get_categories('hide_empty=0');
		foreach ($_categories_obj as $_cat) {
			$_categories[$_cat->cat_ID] = $_cat->cat_name;}
			$categories_tmp = array_unshift($_categories, "Select a category:"); ?>

            <select id="<?php echo $this->get_field_id('blogcategory'); ?>" name="<?php echo $this->get_field_name('blogcategory'); ?>">

			<?php
			foreach ($_categories as $_category) {
				if ($blogcategory == $_category) {
					$selected_option = 'selected="selected"';
				} else {
					$selected_option = '';
				} ?>
				<option value="<?php echo $_category; ?>" <?php echo $selected_option; ?>><?php echo $_category; ?></option>
				<?php
			} ?>
			</select>
        </p>
        <p>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of posts', '') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php if(isset($instance['postcount'])) { echo $instance['postcount']; } ?>" />
		</p>
        <?php
	}	

}

?>
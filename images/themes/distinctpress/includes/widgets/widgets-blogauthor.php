<?php

/*---------------------------------------------------------------------------------*/
/* Blog Author
/*---------------------------------------------------------------------------------*/

class BlogAuthorInfo extends WP_Widget {

   function BlogAuthorInfo() {
	   $widget_ops = array('description' => 'This is a DistinctiveThemeshemes Blog Author Info widget.' );
	   parent::WP_Widget(false, __('DistinctiveThemes Blog Author Info', ''),$widget_ops);      
   }

   function widget($args, $instance) {  
	extract( $args );
	if(isset($instance['title'])) { $title = $instance['title']; }
	if(isset($instance['bio'])) { $bio = $instance['bio']; }
	if(isset($instance['custom_email'])) { $custom_email = $instance['custom_email']; }
	if(isset($instance['avatar_size'])) { $avatar_size = $instance['avatar_size']; } else { $avatar_size = 48; }
	if(isset($instance['avatar_align'])) { $avatar_align = $instance['avatar_align']; } else { $avatar_align = 'left'; }
	if(isset($instance['read_more_text'])) { $read_more_text = $instance['read_more_text']; }
	if(isset($instance['read_more_url'])) { $read_more_url = $instance['read_more_url']; }
	if(isset($instance['page'])) { $page = $instance['page']; }

	if ( ( $page == "home" && is_home() ) || ( $page == "single" && is_single() ) || $page == "all" ) {

	?>

		<?php echo $before_widget; ?>

		<?php if ($title) { echo $before_title . sanitize_title($title) . $after_title; } ?>		

		<span class="<?php echo $avatar_align; ?> bags2"><?php if ( $custom_email ) echo get_avatar( $custom_email, $size = $avatar_size ); ?></span>

		<p style="padding-bottom:0;"><?php echo sanitize_text_field($bio); ?><br/>

		<?php if ( $read_more_url ) echo '<a href="' . htmlspecialchars($read_more_url) . '">' . sanitize_text_field($read_more_text). '</a>'; ?></p>

		<div class="fix"></div>

		<?php echo $after_widget; ?>   

    <?php

	}

   }

   function update($new_instance, $old_instance) {   
   	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
	$instance['bio'] = ( ! empty( $new_instance['bio'] ) ) ? sanitize_text_field( $new_instance['bio'] ) : '';
	$instance['custom_email'] = ( ! empty( $new_instance['custom_email'] ) ) ? sanitize_email( $new_instance['custom_email'] ) : '';
	$instance['avatar_size'] = ( ! empty( $new_instance['avatar_size'] ) ) ? absint( $new_instance['avatar_size'] ) : '';
	$instance['avatar_align'] = ( ! empty( $new_instance['avatar_align'] ) ) ? sanitize_text_field( $new_instance['avatar_align'] ) : '';
	$instance['read_more_text'] = ( ! empty( $new_instance['read_more_text'] ) ) ? sanitize_text_field( $new_instance['read_more_text'] ) : '';
	$instance['page'] = ( ! empty( $new_instance['page'] ) ) ? sanitize_text_field( $new_instance['page'] ) : '';
	$instance['read_more_url'] = ( ! empty( $new_instance['read_more_url'] ) ) ? esc_url_raw( $new_instance['read_more_url'] ) : '';
   	return $instance;
   }



   function form($instance) {        

	if(isset($instance['title'])) { $title = esc_attr($instance['title']); } else { $title = ''; }
	if(isset($instance['bio'])) { $bio = esc_textarea($instance['bio']); }  else { $bio = ''; }
	if(isset($instance['custom_email'])) { $custom_email = esc_attr($instance['custom_email']); }  else { $custom_email = ''; }
	if(isset($instance['avatar_size'])) { $avatar_size = esc_attr($instance['avatar_size']); } else { $avatar_size = 48; }
	if(isset($instance['avatar_align'])) { $avatar_align = esc_attr($instance['avatar_align']); } else { $avatar_align = 'left'; }
	if(isset($instance['read_more_text'])) { $read_more_text = esc_attr($instance['read_more_text']); }  else { $read_more_text = ''; }
	if(isset($instance['read_more_url'])) { $read_more_url = esc_url($instance['read_more_url']); }  else { $read_more_url= ''; }
	if(isset($instance['page'])) { $page = esc_attr($instance['page']); }  else { $page = ''; }

		?>

		<p>

		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',''); ?></label>

		   <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />

		</p>

		<p>

		   <label for="<?php echo $this->get_field_id('bio'); ?>"><?php _e('Bio:',''); ?></label>

			<textarea name="<?php echo $this->get_field_name('bio'); ?>" class="widefat" id="<?php echo $this->get_field_id('bio'); ?>"><?php echo $bio; ?></textarea>

		</p>

		<p>

		   <label for="<?php echo $this->get_field_id('custom_email'); ?>"><?php _e('<a href="http://www.gravatar.com/">Gravatar</a> E-mail:',''); ?></label>

		   <input type="text" name="<?php echo $this->get_field_name('custom_email'); ?>"  value="<?php echo $custom_email; ?>" class="widefat" id="<?php echo $this->get_field_id('custom_email'); ?>" />

		</p>

		<p>

		   <label for="<?php echo $this->get_field_id('avatar_size'); ?>"><?php _e('Gravatar Size:',''); ?></label>

		   <input type="text" name="<?php echo $this->get_field_name('avatar_size'); ?>"  value="<?php echo $avatar_size; ?>" class="widefat" id="<?php echo $this->get_field_id('avatar_size'); ?>" />

		</p>

		<p>

			<label for="<?php echo $this->get_field_id('avatar_align'); ?>"><?php _e('Gravatar Alignment:',''); ?></label>

			<select name="<?php echo $this->get_field_name('avatar_align'); ?>" class="widefat" id="<?php echo $this->get_field_id('avatar_align'); ?>">

				<option value="left" <?php if($avatar_align == "left"){ echo "selected='selected'";} ?>><?php _e('Left', ''); ?></option>

				<option value="right" <?php if($avatar_align == "right"){ echo "selected='selected'";} ?>><?php _e('Right', ''); ?></option>            

			</select>

		</p>

		<p>

		   <label for="<?php echo $this->get_field_id('read_more_text'); ?>"><?php _e('Read More Text (optional):',''); ?></label>

		   <input type="text" name="<?php echo $this->get_field_name('read_more_text'); ?>"  value="<?php echo $read_more_text; ?>" class="widefat" id="<?php echo $this->get_field_id('read_more_text'); ?>" />

		</p>

		<p>

		   <label for="<?php echo $this->get_field_id('read_more_url'); ?>"><?php _e('Read More URL (optional):',''); ?></label>

		   <input type="text" name="<?php echo $this->get_field_name('read_more_url'); ?>"  value="<?php echo $read_more_url; ?>" class="widefat" id="<?php echo $this->get_field_id('read_more_url'); ?>" />

		</p>

		<p>

			<label for="<?php echo $this->get_field_id('page'); ?>"><?php _e('Visible Pages:',''); ?></label>

			<select name="<?php echo $this->get_field_name('page'); ?>" class="widefat" id="<?php echo $this->get_field_id('page'); ?>">

				<option value="all" <?php if($page == "all"){ echo "selected='selected'";} ?>><?php _e('All', ''); ?></option>

				<option value="home" <?php if($page == "home"){ echo "selected='selected'";} ?>><?php _e('Home only', ''); ?></option>            

				<option value="single" <?php if($page == "single"){ echo "selected='selected'";} ?>><?php _e('Single only', ''); ?></option>            

			</select>

		</p>

		<?php

	}

} 



register_widget('BlogAuthorInfo');

?>
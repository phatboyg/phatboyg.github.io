<?php

/** DistinctPress Post Date */
function distinctpress_post_date() {

	$post_date = esc_html( get_the_date() ) . " " . esc_attr( get_the_time() );	

	/** Output */
	$output = sprintf( '<span class="entry-date" title="%1$s"><a href="%2$s" title="%3$s" rel="bookmark"><i class="el-icon-time-alt meta-icon"></i>%1$s</a></span>', $post_date, esc_url( get_permalink() ), the_title_attribute( 'echo=0' ) );

	return $output;

}

/** DistinctPress Post Author */
function distinctpress_post_author() {	

	$output = sprintf( '<span class="entry-meta-sep"> &sdot; </span><span class="entry-author author vcard"><a href="%1$s" title="'. __( 'by %2$s', 'distinctpress' ) .'" rel="author"><i class="el-icon-user meta-icon"></i>%2$s</a></span>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) );

	return $output;

}

/** DistinctPress Post Edit Link */
function distinctpress_post_edit_link() {

	/** Manipulation */
	ob_start();

	if ( 'post' == get_post_type() ) :
	edit_post_link( __( 'Edit', 'distinctpress' ), '<span class="entry-meta-sep"> &sdot; </span><span class="edit-link">', '</span>' );
	else:
	edit_post_link( __( 'Edit', 'distinctpress' ), '<span class="edit-link">', '</span>' );
	endif;
	$output = ob_get_clean();	

	return $output;

}

/** DistinctPress Post Comments */
function distinctpress_post_comments() {	

	if ( ( ! comments_open() || post_password_required() ) ) {
		return;
	}

	ob_start();

	comments_number( __( 'Leave a Comment', 'distinctpress' ), __( '1 Comment', 'distinctpress' ), __( '% Comments', 'distinctpress' ) );
	$comments = ob_get_clean();

	/** Output */
	$comments = sprintf( '<a href="%s"><i class="el-icon-comment meta-icon"></i>%s</a>', esc_url( get_comments_link() ), $comments );
	$output = sprintf( '<span class="entry-meta-sep"> &sdot; </span><span class="comments-link">%1$s</span>', $comments );

	return $output;

}

/** DistinctPress Post Categories */
function distinctpress_post_category() {	

	$categories_list = get_the_category_list( ', ' );
	if ( ! $categories_list ) {
		return;
	}

	$output = sprintf( '<span class="cat-links"><span class="%1$s"><i class="el-icon-folder-sign meta-icon"></i>'. __( 'Posted in:', 'distinctpress' ) .'</span> %2$s</span>', 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );

	return $output;

}

/** DistinctPress Post Tags */
function distinctpress_post_tags() {	

	$tags_list = get_the_tag_list( '', ', ' );
	if ( ! $tags_list ) {
		return;
	}	

	$output = sprintf( '<span class="entry-meta-sep"> &sdot; </span><span class="tag-links"><span class="%1$s"><i class="el-icon-tag meta-icon"></i>'. __( 'Tagged:', 'distinctpress' ) .'</span> %2$s</span>', 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );

	return $output;

}

/** DistinctPress Link Pages */
function distinctpress_link_pages() {

	return wp_link_pages( array(
		'before' => '<div class="page-link"><span class="assistive-text">'. __( 'Pages:', 'distinctpress' ) .'</span>',
		'after' => '</div>',
		'link_before' => '<span>',
		'link_after' => '</span>',
		'echo' => 0
		)
	);

}

/** DistinctPress Post Style */
function distinctpress_post_style() {

		the_excerpt( __( 'Read More', 'distinctpress' ) . ' <span class="meta-nav">&rarr;</span>' );

}

/** DistinctPress Featured Image */
function distinctpress_full_featured_image() {	

	$img = distinctpress_get_image( array( 'format' => 'html', 'size' => 'distinctpress-full-featured', 'attr' => array( 'class' => 'full-entry-image' ) ) );	

	if( empty( $img ) ):
		return;
	endif;	

	printf( '<div class="entry-featured-image"><a href="%s" title="%s">%s</a><div class="image-rollover"><a href="%s" title="%s"><i class="el-icon-link rollover-icon"></i></a></div></div>', esc_url( get_permalink() ), the_title_attribute( 'echo=0' ), $img, esc_url( get_permalink() ), the_title_attribute( 'echo=0' ) );

}

/** DistinctPress Featured Image */
function distinctpress_featured_image() {
	$img = distinctpress_get_image( array( 'format' => 'html', 'size' => 'distinctpress-featured', 'attr' => array( 'class' => 'entry-image' ) ) );

	if( empty( $img ) ):
		return;
	endif;

	printf( '<div class="entry-featured-image"><a href="%s" title="%s">%s</a></div>', esc_url( get_permalink() ), the_title_attribute( 'echo=0' ), $img );

}

/** DistinctPress Loop Navigation */
function distinctpress_loop_nav() {

	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) :
			distinctpress_loop_nav_next_prev();
	endif;

}

/** DistinctPress Loop Navigation Numeric */
function distinctpress_loop_nav_numeric() {

	global $wp_query;
	$big = 999999999; // Need an unlikely integer

	$args = array(
		'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages
	); ?>

	<div id="loop-nav-numeric" class="nav-numeric">
	  <h3 class="assistive-text"><?php _e( 'Post Navigation', 'distinctpress' ); ?></h3>
	  <?php echo paginate_links( $args ); ?>
	  <div class="clear"></div>
	</div> <!-- end #loop-nav-numeric -->

<?php	
}

/** DistinctPress Loop Navigation Next/Prev */
function distinctpress_loop_nav_next_prev() {

	ob_start();
	next_posts_link( '<span class="meta-nav"></span> '. __( 'Older Posts', 'distinctpress' ) );
	$next_posts_link = ob_get_clean();

	ob_start();
	previous_posts_link( __( 'Newer Posts', 'distinctpress' ) .' <span class="meta-nav"></span>' );
	$previous_posts_link = ob_get_clean();	

	$next_posts_link = ( empty( $next_posts_link ) )? '&nbsp;' : $next_posts_link;
	$previous_posts_link = ( empty( $previous_posts_link ) )? '&nbsp;' : $previous_posts_link;

?>

	<div id="loop-nav-next-prev" class="clearfix">
	  <h3 class="assistive-text"><?php _e( 'Post Navigation', 'distinctpress' ); ?></h3>
	  <div class="loop-nav-previous grid_8 alpha">
	    <?php echo $next_posts_link; ?>
	  </div>
	  <div class="loop-nav-next grid_8 omega">
		  <?php echo $previous_posts_link; ?>
	  </div>
	</div> <!-- end #loop-nav-next-prev -->
<?php

}

/** DistinctPress Loop Navigation Singular Post */
function distinctpress_loop_nav_singular_post() {

	ob_start();
	previous_post_link( '%link', '<span class="meta-nav"></span> '. __( 'Previous Post', 'distinctpress' ) );
	$previous_post_link = ob_get_clean();	  

	ob_start();
	next_post_link( '%link', __( 'Next Post', 'distinctpress' ) . ' <span class="meta-nav"></span>' );
	$next_post_link = ob_get_clean();

	$previous_post_link = ( empty( $previous_post_link ) )? '&nbsp;' : $previous_post_link;
	$next_post_link = ( empty( $next_post_link ) )? '&nbsp;' : $next_post_link;

?>

	<div id="loop-nav-singlular-post" class="clearfix">
	  <h3 class="assistive-text"><?php _e( 'Post Navigation', 'distinctpress' ); ?></h3>
	  <div class="loop-nav-previous grid_7 alpha">
	    <?php echo $previous_post_link; ?>
	  </div>
	  <div class="loop-nav-next grid_7 omega hangright">
		<?php echo $next_post_link; ?>
	  </div>
	</div><!-- end #loop-nav-singular-post -->

<?php

}

/** DistinctPress Loop Navigation Singular */
function distinctpress_loop_nav_singular() {

	global $post;

?>

	<div id="loop-nav-singular">
	  <h3 class="assistive-text"><?php _e( 'Post Navigation', 'distinctpress' ); ?></h3>
	  <div class="loop-nav-standard"><a href="<?php echo get_permalink( $post->post_parent ); ?>" rel="gallery"> <?php _e( '&larr; Return to', 'distinctpress' ); ?> <?php echo get_the_title( $post->post_parent ); ?></a></div>
	</div><!-- end #loop-nav-singular -->

<?php

}

/** DistinctPress Loop Navigation Singular Attachment */
function distinctpress_loop_nav_singular_attachment() {	

	ob_start();
	previous_image_link( 'thumbnail' );
	$previous_image_link = ob_get_clean();

	ob_start();
	next_image_link( 'thumbnail' );
	$next_image_link = ob_get_clean();

	$previous_image_link = ( empty( $previous_image_link ) )? '&nbsp;' : '<p>' . $previous_image_link . '</p>';
	$next_image_link = ( empty( $next_image_link ) )? '&nbsp;' : '<p>' . $next_image_link . '</p>';

?>

	<div id="loop-nav-singlular-attachment" class="clearfix">
	  <h3 class="assistive-text"><?php _e( 'Attachment Navigation', 'distinctpress' ); ?></h3>
	  <div class="loop-nav-previous grid_6 alpha">
	    <?php echo $previous_image_link; ?>
	  </div>
	  <div class="loop-nav-next grid_5 omega">
		  <?php echo $next_image_link; ?>
	  </div>
	</div><!-- end #loop-nav-singular-attachment -->

<?php

}

/** DistinctPress Author */
function distinctpress_author() {
if ( get_the_author_meta( 'description' ) ) : ?>

	<div id="author-info" class="clearfix">
	  <div id="author-avatar" class="grid_3 alpha">
	    <div id="author-avatar-inside">
		  <?php echo get_avatar( get_the_author_meta( 'user_email' ), 80 ); ?>
	    </div>
	  </div> <!-- #author-avatar -->
	  <div id="author-description" class="grid_13 omega">
	      <h3><?php printf( __( 'About %s', 'distinctpress' ), get_the_author() ); ?></h3>
	      <p><?php the_author_meta( 'description' ); ?></p>
	      <div id="author-link">
	        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php printf( __( 'View all posts by %s', 'distinctpress' ) . ' <span class="meta-nav"><i class="el-icon-chevron-right author-icon"></i></span>', get_the_author() ); ?></a>
	      </div> <!-- #author-link	-->  
	  </div> <!-- #author-description -->
	</div> <!-- #author-info -->

<?php endif;

}

/** DistinctPress Footer */
add_action( 'distinctpress_footer', 'distinctpress_footer_init' );

function distinctpress_footer_init() {

	$distinctpress_theme_data = distinctpress_theme_data(); ?>

	<div class="grid_5">
		<?php if(of_get_option('show_social_footer')) { ?>
		<div id="footer-social">
			<?php if(of_get_option('facebook_url') and of_get_option('facebook_url')!="") { ?>
			<a class="social-icon facebooklink" title="Facebook" href="<?php echo esc_url(get_option('facebook_url')); ?>"><i class="el-icon-facebook"></i></a>
			<?php } ?>
			<?php if(of_get_option('twitter_url') and of_get_option('twitter_url')!="") { ?>
			<a class="social-icon twitterlink" title="Twitter"  href="<?php echo esc_url(get_option('twitter_url')); ?>"><i class="el-icon-twitter"></i></a>
			<?php } ?>
			<?php if(of_get_option('gplus_url') and of_get_option('gplus_url')!="") { ?>
			<a class="social-icon gpluslink" title="Google Plus"  href="<?php echo esc_url(get_option('gplus_url')); ?>"><i class="el-icon-googleplus"></i></a>
			<?php } ?>
			<?php if(of_get_option('linkedin_url') and of_get_option('linkedin_url')!="") { ?>
			<a class="social-icon linkedinlink" title="LinkedIn"  href="<?php echo esc_url(get_option('linkedin_url')); ?>"><i class="el-icon-linkedin"></i></a>
			<?php } ?>
			<?php if(of_get_option('pinterest_url') and of_get_option('pinterest_url')!="") { ?>
			<a class="social-icon pinterestlink" title="Pinterest"  href="<?php echo esc_url(get_option('pinterest_url')); ?>"><i class="el-icon-pinterest"></i></a>
			<?php } ?>
			<?php if(of_get_option('youtube_url') and of_get_option('youtube_url')!="") { ?>
			<a class="social-icon youtubelink" title="Youtube"  href="<?php echo esc_url(get_option('youtube_url')); ?>"><i class="el-icon-youtube"></i></a>
			<?php } ?>
			<?php if(of_get_option('rss_url') and of_get_option('rss_url')!="") { ?>
			<a class="social-icon rsslink" title="RSS"  href="<?php echo esc_url(get_option('rss_url')); ?>"><i class="el-icon-rss"></i></a>
			<?php } ?>
		</div>
		<?php } ?>
	</div>

	<div id="copyright" class="grid_11">
	  <?php _e( 'Designed by', 'distinctpress' )?> <a href="http://www.distinctivethemes.com" title="DistinctiveThemes">DistinctiveThemes</a> &sdot; Powered By <a href="http://wordpress.org/" title="WordPress">WordPress</a>
	</div>

<?php	

}

/** DistinctPress Comment List */
function distinctpress_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) {
		case 'pingback':
		case 'trackback': ?>

			<li class="post pingback">
				<p><?php _e( 'Pingback:', 'distinctpress' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'distinctpress' ), '<span class="edit-link">', '</span>' ); ?></p>
				<?php
				break;
				default: ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>" class="comment">
					<div class="comment-meta">
						<div class="comment-author vcard">
							<?php
                            $avatar_size = 60;
                            if ( '0' != $comment->comment_parent ) {
                            	$avatar_size = 60;
                            }
                            echo get_avatar( $comment, $avatar_size );

                            printf( '%1$s on %2$s <span class="says">%3$s</span>',
                            	sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
                            	sprintf( '<a href="%1$s"><span pubdate datetime="%2$s">%3$s</span></a>', esc_url( get_comment_link( $comment->comment_ID ) ), get_comment_time( 'c' ), sprintf( '%1$s at %2$s', get_comment_date(), get_comment_time() ) ),
								__( 'said:', 'distinctpress' )
                            );

                            edit_comment_link( __( 'Edit', 'distinctpress' ), '<span class="edit-link">', '</span>' ); ?>
						</div> <!-- end .comment-author .vcard -->

						<?php if ( $comment->comment_approved == '0' ) : ?>
						<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'distinctpress' ); ?></em><br />
						<?php endif; ?>
					</div> <!-- end .comment-meta -->
					<div class="comment-content">
					  <?php comment_text(); ?>
                    </div> <!-- end .comment-content -->
					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'distinctpress' ) . '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- .reply -->
				</div><!-- end #comment-<?php comment_ID(); ?> -->
		<?php
		break;

	} // switch ( $comment->comment_type )

}

/** Filter 'wp_title' to output contextual content. */
add_filter( 'wp_title', 'distinctpress_wp_title', 10, 2 );

function distinctpress_wp_title( $title, $separator ) {

	if ( is_feed() ) {
		return $title;
	}

	global $paged, $page;

	if ( is_search() ) {

		/** If we're a search, let's start over: */
		$title = sprintf( 'Search results for %s', '"' . get_search_query() . '"' );

		/** Add a page number if we're on page 2 or more: */
		if ( $paged >= 2 ) {
			$title .= " ". $separator ." " . sprintf( 'Page %s', $paged );
		}

		/** Add the site name to the end: */
		$title .= " ". $separator ." " . get_bloginfo( 'name', 'display' );

		/** We're done. Let's send the new title back to wp_title(): */
		return $title;	

	}

	/** Otherwise, let's start by adding the site name to the end: */
	$title .= get_bloginfo( 'name', 'display' );

	/** If we have a site description and we're on the home/front page, add the description: */
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " ". $separator ." " . $site_description;
	}

	/** Add a page number if necessary: */
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " $separator " . sprintf( 'Page %s', max( $paged, $page ) );
	}

	/** Return the new title to wp_title(): */
	return $title;

}

/** Sets the post excerpt length. */
add_filter( 'excerpt_length', 'distinctpress_excerpt_length' );

function distinctpress_excerpt_length( $length ) {
	return 65;
}

/** Returns a "Read more" link for content */
add_filter( 'the_content_more_link', 'distinctpress_content_more_link', 10, 2 );

function distinctpress_content_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, '<span>'. __( 'Read More &rarr;', 'distinctpress' ) .'</span>', $more_link );
}

/** Returns a "Read more" link for excerpts */
function distinctpress_continue_reading_link() {
	return '<span class="more-link-wrap"><a href="'. esc_url( get_permalink() ) . '" class="more-link"><span>'. __( 'Read More &rarr;', 'distinctpress' ) .'</span></a></span>';
}

/** Replaces "[...]" (appended to automatically generated excerpts) with distinctpress_continue_reading_link(). */
add_filter( 'excerpt_more', 'distinctpress_auto_excerpt_more' );
function distinctpress_auto_excerpt_more( $more ) {
	return ' <span class="ellipsis">&hellip;</span> ' . distinctpress_continue_reading_link();
}	

/** Adds a pretty "Read more" link to custom post excerpts. */
add_filter( 'get_the_excerpt', 'distinctpress_custom_excerpt_more' );

function distinctpress_custom_excerpt_more( $output ) {

	if ( has_excerpt() && ! is_attachment() ) {
		$output .= ' <span class="ellipsis">&hellip;</span> ' . distinctpress_continue_reading_link();
	}

	return $output;

}

/** Remove WP Gallery CSS */
add_filter( 'use_default_gallery_style', '__return_false' );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if(of_get_option('custom_favicon') and of_get_option('custom_favicon')!=""): ?>
	<link rel="shortcut icon" href="<?php echo stripslashes(of_get_option('custom_favicon')); ?>" />
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper" id="top-bar">

	<div class="container_16 clearfix">

		<?php if(of_get_option('show_social_header')) { ?>
		<div id="header-social">
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

</div>

<div class="wrapper">  

	<div id="header">
		<div class="container_16 clearfix">
		<?php get_template_part( 'custom', 'header' ); ?>
		<?php get_template_part( 'primary', 'menu' ); ?>
		</div>
	</div>
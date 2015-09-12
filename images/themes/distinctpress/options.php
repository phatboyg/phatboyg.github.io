<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'distinctpress'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Heading Options', 'distinctpress'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Favicon', 'distinctpress'),
		'desc' => __('This creates a full size uploader that previews the image.', 'distinctpress'),
		'id' => 'custom_favicon',
		'std' => '',
		'type' => 'upload');



	$options[] = array(
		'name' => __('Social Profiles', 'distinctpress'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Show Social Icons In Header', 'distinctpress'),
		'desc' => __('Click To Enable / Disable', 'distinctpress'),
		'id' => 'show_social_header',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Show Social Icons In Footer', 'distinctpress'),
		'desc' => __('Click To Enable / Disable', 'distinctpress'),
		'id' => 'show_social_footer',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Facebook Profile URL', 'distinctpress'),
		'desc' => __('Place URL Here', 'distinctpress'),
		'id' => 'facebook_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter Profile URL', 'distinctpress'),
		'desc' => __('Place URL Here', 'distinctpress'),
		'id' => 'twitter_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Google Plus Profile URL', 'distinctpress'),
		'desc' => __('Place URL Here', 'distinctpress'),
		'id' => 'gplus_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('LinkedIn Profile URL', 'distinctpress'),
		'desc' => __('Place URL Here', 'distinctpress'),
		'id' => 'linkedin_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Pinterest Profile URL', 'distinctpress'),
		'desc' => __('Place URL Here', 'distinctpress'),
		'id' => 'pinterest_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('YouTube Profile URL', 'distinctpress'),
		'desc' => __('Place URL Here', 'distinctpress'),
		'id' => 'youtube_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('RSS URL', 'distinctpress'),
		'desc' => __('Place URL Here', 'distinctpress'),
		'id' => 'rss_url',
		'std' => '',
		'type' => 'text');

$options[] = array(
		'name' => __('Single Post', 'distinctpress'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Show Author Info', 'distinctpress'),
		'desc' => __('Click To Enable / Disable', 'distinctpress'),
		'id' => 'show_author_info',
		'std' => '1',
		'type' => 'checkbox');


	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	$options[] = array(
		'name' => __('Default Text Editor', 'distinctpress'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'distinctpress' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	return $options;
}
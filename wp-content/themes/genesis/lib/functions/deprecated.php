<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Deprecated
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    https://my.studiopress.com/themes/genesis/
 */

/**
 * Deprecated. Output the title, wrapped in title tags.
 *
 * @since 2.1.0
 * @deprecated 2.6.0
 */
function genesis_do_title() {

	_deprecated_function( __FUNCTION__, '2.6.0', "add_theme_support( 'title-tag' )" );

	if ( get_theme_support( 'title-tag' ) ) {
		return;
	}
	echo '<title>';
	wp_title( '' );
	echo '</title>';

}

/**
 * Deprecated. Legacy filter function that would return a filtered document title.
 *
 * @since 1.0.0
 * @deprecated 2.6.0
 *
 * @param string $title       Existing page title.
 * @param string $sep         Optional. Separator character(s).
 * @param string $seplocation Optional. Separator location - "left" or "right".
 * @return string Page title.
 */
function genesis_default_title( $title, $sep = '&raquo;', $seplocation = '' ) {

	_deprecated_function( __FUNCTION__, '2.6.0', 'Genesis_SEO_Document_Title_Parts' );

	return $title;

}

/**
 * Deprecated. Return registered image sizes.
 *
 * Return a two-dimensional array of just the additionally registered image sizes, with width, height and crop sub-keys.
 *
 * @since 1.0.0
 * @deprecated 2.5.0
 *
 * @global array $_wp_additional_image_sizes Additionally registered image sizes.
 *
 * @return array Two-dimensional, with `width`, `height` and `crop` sub-keys.
 */
function genesis_get_additional_image_sizes() {

	_deprecated_function( __FUNCTION__, '2.5.0', 'wp_get_additional_image_sizes' );

	return wp_get_additional_image_sizes();
}

/**
 * Deprecated. A list of Genesis contributors for the current development cycle.
 *
 * @since 2.0.0
 * @deprecated 2.5.0
 *
 * @return array List of contributors.
 */
function genesis_contributors() {

	_deprecated_function( __FUNCTION__, '2.5.0', 'Genesis_Contributors::find_contributors' );

	$people = require GENESIS_CONFIG_DIR . '/contributors.php';
	$genesis_contributors = new Genesis_Contributors( $people );

	// The original function didn't contain the logic to shuffle the list, so we use the un-shuffled list here.
	foreach ( $genesis_contributors->find_by_role( 'contributor' ) as $key => $contributor ) {
		// The collection object currently returns an array of Genesis_Contributor object, so it can't
		// support a to_array() method where this logic would go.
		$contributors[ $key ]['name'] = $contributor->get_name();
		$contributors[ $key ]['url'] = $contributor->get_profile_url();
		$contributors[ $key ]['gravatar'] = $contributor->get_avatar_url();
	}

	return $contributors;
}

/**
 * Deprecated. Register the scripts that Genesis will use.
 *
 * @since 2.0.0
 * @deprecated 2.5.0
 */
function genesis_register_scripts() {

	_deprecated_function( __FUNCTION__, '2.5.0' );

}

/**
 * Deprecated. Enqueue the scripts used on the front-end of the site.
 *
 * Includes comment-reply, superfish and the superfish arguments.
 *
 * Applies the `genesis_superfish_enabled`, and `genesis_superfish_args_uri`. filter.
 *
 * @since 1.0.0
 * @deprecated 2.5.0
 */
function genesis_load_scripts() {

	_deprecated_function( __FUNCTION__, '2.5.0' );

}

/**
 * Deprecated. Conditionally enqueue the scripts used in the admin.
 *
 * Includes Thickbox, theme preview and a Genesis script (actually enqueued in genesis_load_admin_js()).
 *
 * @since 1.0.0
 * @deprecated 2.5.0
 *
 * @param string $hook_suffix Admin page identifier.
 */
function genesis_load_admin_scripts( $hook_suffix ) {

	_deprecated_function( __FUNCTION__, '2.5.0' );

}

/**
 * Deprecated. Enqueues the custom script used in the admin, and localizes several strings or values used in the scripts.
 *
 * Applies the `genesis_toggles` filter to toggleable admin settings, so plugin developers can add their own without
 * having to recreate the whole setup.
 *
 * @since 1.8.0
 * @deprecated 2.5.0
 */
function genesis_load_admin_js() {

	_deprecated_function( __FUNCTION__, '2.5.0', 'genesis_scripts()->enqueue_and_localize_admin_scripts()' );

	genesis_scripts()->enqueue_and_localize_admin_scripts();

}

/**
 * Deprecated. Load the html5 shiv for IE8 and below. Can't enqueue with IE conditionals.
 *
 * @since 2.0.0
 * @deprecated 2.3.0
 */
function genesis_html5_ie_fix() {

	_deprecated_function( __FUNCTION__, '2.3.0' );

}

/**
 * Deprecated. Echo custom rel="author" link tag.
 *
 * If the appropriate information has been entered, either for the homepage author, or for an individual post/page
 * author, echo a custom rel="author" link.
 *
 * @since 1.9.0
 * @deprecated 2.2.0
 */
function genesis_rel_author() {

	_deprecated_function( __FUNCTION__, '2.2.0' );

}

/**
 * Deprecated. Echo custom rel="publisher" link tag.
 *
 * If the appropriate information has been entered and we are viewing the front page, echo a custom rel="publisher" link.
 *
 * @since 2.0.2
 * @deprecated 2.2.0
 */
function genesis_rel_publisher() {

	_deprecated_function( __FUNCTION__, '2.2.0' );

}

/**
 * Deprecated. Echo or return a pages or categories menu.
 *
 * The array of menu arguments (and their defaults) are:
 *
 *  - theme_location => ''
 *  - type           => 'pages'
 *  - sort_column    => 'menu_order, post_title'
 *  - menu_id        => false
 *  - menu_class     => 'nav'
 *  - echo           => true
 *  - link_before    => ''
 *  - link_after     => ''
 *
 * Themes can short-circuit the function early by filtering on `genesis_pre_nav` or on the string of list items via
 * `genesis_nav_items`. They can also filter the complete menu markup via `genesis_nav`. The `$args` (merged with
 * defaults) are available for all filters.
 *
 * @since 1.0.0
 * @deprecated 2.2.0
 *
 * @see genesis_do_nav()
 * @see genesis_do_subnav()
 *
 * @param array $args Menu arguments.
 * @return null|string HTML for menu, unless `genesis_pre_nav` filter returns something truthy.
 */
function genesis_nav( $args = array() ) {

	_deprecated_function( __FUNCTION__, '2.2.0', 'genesis_nav_menu' );

	if ( isset( $args['context'] ) ) {
		_deprecated_argument( __FUNCTION__, '1.2', __( 'The argument, "context", has been replaced with "theme_location" in the $args array.', 'genesis' ) );
	}

	// Default arguments.
	$defaults = array(
		'theme_location' => '',
		'type'           => 'pages',
		'sort_column'    => 'menu_order, post_title',
		'menu_id'        => false,
		'menu_class'     => 'nav',
		'echo'           => true,
		'link_before'    => '',
		'link_after'     => '',
	);

	$defaults = apply_filters( 'genesis_nav_default_args', $defaults );
	$args     = wp_parse_args( $args, $defaults );

	// Allow child theme to short-circuit this function.
	$pre = apply_filters( 'genesis_pre_nav', false, $args );
	if ( $pre ) {
		return $pre;
	}

	$menu = '';

	$list_args = $args;

	// Show Home in the menu (mostly copied from WP source).
	if ( isset( $args['show_home'] ) && ! empty( $args['show_home'] ) ) {
		if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] ) {
			$text = apply_filters( 'genesis_nav_home_text', __( 'Home', 'genesis' ), $args );
		} else {
			$text = $args['show_home'];
		}

		if ( is_front_page() && ! is_paged() ) {
			$class = 'class="home current_page_item"';
		} else {
			$class = 'class="home"';
		}

		$home = '<li ' . $class . '><a href="' . trailingslashit( home_url() ) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';

		$menu .= genesis_get_seo_option( 'nofollow_home_link' ) ? genesis_rel_nofollow( $home ) : $home;

		// If the front page is a page, add it to the exclude list.
		if ( 'pages' === $args['type'] && 'page' === get_option( 'show_on_front' ) ) {
			$list_args['exclude'] .= $list_args['exclude'] ? ',' : '';

			$list_args['exclude'] .= get_option( 'page_on_front' );
		}
	}

	$list_args['echo']     = false;
	$list_args['title_li'] = '';

	// Add menu items.
	if ( 'pages' === $args['type'] ) {
		$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages( $list_args ) );
	} elseif ( 'categories' === $args['type'] ) {
		$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_categories( $list_args ) );
	}

	// Apply filters to the nav items.
	$menu = apply_filters( 'genesis_nav_items', $menu, $args );

	$menu_class = $args['menu_class'] ? ' class="' . esc_attr( $args['menu_class'] ) . '"' : '';
	$menu_id    = $args['menu_id'] ? ' id="' . esc_attr( $args['menu_id'] ) . '"' : '';

	if ( $menu ) {
		$menu = '<ul' . $menu_id . $menu_class . '>' . $menu . '</ul>';
	}

	// Apply filters to the final nav output.
	$menu = apply_filters( 'genesis_nav', $menu, $args );

	if ( $args['echo'] ) {
		echo $menu;

		return null;
	} else {
		return $menu;
	}

}

/**
 * Deprecated. Wraps the page title in a `title` element.
 *
 * Only applies, if not currently in admin, or for a feed.
 *
 * @since 1.3.0
 * @deprecated 2.1.0
 *
 * @param string $title Page title.
 *  @return string Plain text title if feed or WP admin, or title in HTML markup.
 */
function genesis_doctitle_wrap( $title ) {

	_deprecated_function( __FUNCTION__, '2.1.0' );

	return is_feed() || is_admin() ? $title : sprintf( "<title>%s</title>\n", $title );

}

/**
 * Deprecated. Push individual setting (or group of setting) into an options db entry stored as an array.
 *
 * @since 1.7.0
 * @deprecated 2.1.0
 *
 * @param string|array $new     New settings. Can be a string, or an array.
 * @param string       $setting Optional. Settings field name. Default is GENESIS_SETTINGS_FIELD.
 */
function _genesis_update_settings( $new, $setting = null ) {

	_deprecated_function( __FUNCTION__, '2.1.0', 'genesis_update_setting' );

	genesis_update_settings( $new, $setting );

}

/**
 * Deprecated. Used to output archive pagination in older/newer format.
 *
 * Should now use `genesis_prev_next_posts_nav()` instead.
 *
 * @since 1.0.0
 * @deprecated 2.0.0
 */
function genesis_older_newer_posts_nav() {

	_deprecated_function( __FUNCTION__, '2.0.0', 'genesis_prev_next_posts_nav' );

	genesis_prev_next_posts_nav();

}

/**
 * Deprecated. Show Parent and Child information in the document head if specified by the user.
 *
 * This can be helpful for diagnosing problems with the theme, because you can easily determine if anything is out of
 * date, needs to be updated.
 *
 * @since 1.0.0
 * @deprecated 2.0.0
 *
 * @global string $wp_version WordPress version string.
 *
 * @return void Return early if `show_info` setting is falsy, or not a child theme.
 */
function genesis_show_theme_info_in_head() {

	_deprecated_function( __FUNCTION__, '2.0.0', __( 'data in style sheet files', 'genesis' ) );

	if ( ! genesis_get_option( 'show_info' ) ) {
		return;
	}

	// Show Parent Info.
	echo "\n" . '<!-- Theme Information -->' . "\n";
	echo '<meta name="wp_template" content="' . esc_attr( PARENT_THEME_NAME ) . ' ' . esc_attr( PARENT_THEME_VERSION ) . '" />' . "\n";

	// If there is no child theme, don't continue.
	if ( ! is_child_theme() ) {
		return;
	}

	global $wp_version;

	// Show Child Info.
	$child_info = wp_get_theme();
	echo '<meta name="wp_theme" content="' . esc_attr( $child_info['Name'] ) . ' ' . esc_attr( $child_info['Version'] ) . '" />' . "\n";

}

/**
 * Deprecated. Helper function for dealing with entities.
 *
 * It passes text through the g_ent filter so that entities can be converted on-the-fly.
 *
 * @since 1.5.0
 * @deprecated 2.0.0
 *
 * @param string $text Optional string containing an entity.
 * @return mixed Return a string by default, but might be filtered to return another type.
 */
function g_ent( $text = '' ) {

	_deprecated_function( __FUNCTION__, '2.0.0', __( 'decimal or hexidecimal entities', 'genesis' ) );

	return apply_filters( 'g_ent', $text );

}

/**
 * Deprecated. Remove the Genesis theme files from the Theme Editor, except when Genesis is the current theme.
 *
 * @since 1.4.0
 * @deprecated 2.0.0
 */
function genesis_theme_files_to_edit() {

	_deprecated_function( __FUNCTION__, '2.0.0' );

}

/**
 * Deprecated. Add links to the contents of a tweet.
 *
 * Takes the content of a tweet, detects @replies, #hashtags, and http:// URLs, and links them appropriately.
 *
 * @since 1.1.0
 * @deprecated 2.0.0
 *
 * @link http://www.snipe.net/2009/09/php-twitter-clickable-links/
 *
 * @param string $text A string representing the content of a tweet.
 * @return string Tweet content with added links.
 */
function genesis_tweet_linkify( $text ) {

	_deprecated_function( __FUNCTION__, '2.0.0' );

	$text = preg_replace( "#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", '\\1<a href="\\2" target="_blank">\\2</a>', $text );
	$text = preg_replace( "#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", '\\1<a href="http://\\2" target="_blank">\\2</a>', $text );
	$text = preg_replace( '/@(\w+)/', '<a href="http://www.twitter.com/\\1" target="_blank">@\\1</a>', $text );
	$text = preg_replace( '/#(\w+)/', '<a href="http://search.twitter.com/search?q=\\1" target="_blank">#\\1</a>', $text );

	return $text;

}

/**
 * Deprecated. Provide a callback function for the custom header admin page.
 *
 * @since 1.6.0
 * @deprecated 2.0.0
 */
function genesis_custom_header_admin_style() {

	_deprecated_function( __FUNCTION__, '2.0.0' );

}

/**
 * Deprecated. Filter the attributes array in the `wp_get_attachment_image()` function.
 *
 * For some reason, the `wp_get_attachment_image()` function uses the caption field value as the alt text, not the
 * Alternate Text field value. Strange.
 *
 * @since 1.0.0
 * @deprecated 1.8.0
 *
 * @param array    $attr       Associative array of image attributes and values.
 * @param stdClass $attachment Attachment (Post) object.
 */
function genesis_filter_attachment_image_attributes( array $attr, $attachment ) {

	_deprecated_function( __FUNCTION__, '1.8.0' );

}

/**
 * Deprecated. Create a category checklist.
 *
 * @since 1.0.0
 * @deprecated 1.8.0
 *
 * @param string $name     Input name (will be an array) of checkboxes.
 * @param array  $selected Optional. Array of checked inputs. Default is empty array.
 */
function genesis_page_checklist( $name, array $selected = array() ) {

	_deprecated_function( __FUNCTION__, '1.8.0' );

}

/**
 * Deprecated. Create a category checklist.
 *
 * @since 1.0.0
 * @deprecated 1.8.0
 *
 * @param string $name     Input name (will be an array) of checkboxes.
 * @param array  $selected Optional. Array of checked inputs. Default is empty array.
 */
function genesis_category_checklist( $name, array $selected = array() ) {

	_deprecated_function( __FUNCTION__, '1.8.0' );

}

/**
 * Deprecated. Wrapper for `genesis_pre` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_pre() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_pre' )" );

	/** This action is documented in lib/init.php */
	do_action( 'genesis_pre' );

}

/**
 * Deprecated. Wrapper for `genesis_pre_framework` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_pre_framework() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_pre_framework' )" );

	/** This action is documented in lib/init.php */
	do_action( 'genesis_pre_framework' );

}

/**
 * Deprecated. Wrapper for `genesis_init` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_init() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_init' )" );

	/** This action is documented in lib/init.php */
	do_action( 'genesis_init' );

}

/**
 * Deprecated. Wrapper for `genesis_doctype` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_doctype() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_doctype' )" );

	/** This action is documented in header.php */
	do_action( 'genesis_doctype' );

}

/**
 * Deprecated. Wrapper for `genesis_title` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_title() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_title' )" );

	/** This action is documented in header.php */
	do_action( 'genesis_title' );

}

/**
 * Deprecated. Wrapper for `genesis_meta` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_meta() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_meta' )" );

	/** This action is documented in header.php */
	do_action( 'genesis_meta' );

}

/**
 * Deprecated. Wrapper for `genesis_before` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before' )" );

	/** This action is documented in header.php */
	do_action( 'genesis_before' );

}

/**
 * Deprecated. Wrapper for `genesis_after` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after' )" );

	/** This action is documented in footer.php */
	do_action( 'genesis_after' );

}

/**
 * Deprecated. Wrapper for `genesis_before_header` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_header() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_header' )" );

	/** This action is documented in header.php */
	do_action( 'genesis_before_header' );

}

/**
 * Deprecated. Wrapper for `genesis_header` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_header() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_header' )" );

	/** This action is documented in header.php */
	do_action( 'genesis_header' );

}

/**
 * Deprecated. Wrapper for `genesis_header_right` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_header_right() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_header_right' )" );

	/** This action is documented in lib/structure/header.php */
	do_action( 'genesis_header_right' );

}

/**
 * Deprecated. Wrapper for `genesis_after_header` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_header() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_header' )" );

	/** This action is documented in header.php */
	do_action( 'genesis_after_header' );

}

/**
 * Deprecated. Wrapper for `genesis_site_title` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_site_title() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_site_title' )" );

	/** This action is documented in lib/structure/header.php */
	do_action( 'genesis_site_title' );

}

/**
 * Deprecated. Wrapper for `genesis_site_description` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_site_description() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_site_description' )" );

	/** This action is documented in lib/structure/header.php */
	do_action( 'genesis_site_description' );

}

/**
 * Deprecated. Wrapper for `genesis_before_content_sidebar_wrap` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_content_sidebar_wrap() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_content_sidebar_wrap' )" );

	/** This action is documented in framework.php */
	do_action( 'genesis_before_content_sidebar_wrap' );

}

/**
 * Deprecated. Wrapper for `genesis_after_content_sidebar_wrap` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_content_sidebar_wrap() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_content_sidebar_wrap' )" );

	/** This action is documented in framework.php */
	do_action( 'genesis_after_content_sidebar_wrap' );

}

/**
 * Deprecated. Wrapper for `genesis_before_content` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_content() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_content' )" );

	/** This action is documented in framework.php */
	do_action( 'genesis_before_content' );

}

/**
 * Deprecated. Wrapper for `genesis_after_content` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_content() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_content' )" );

	/** This action is documented in framework.php */
	do_action( 'genesis_after_content' );

}

/**
 * Deprecated. Wrapper for `genesis_home` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_home() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_home' )" );

	/**
	 * Fires only in the deprecated function genesis_home().
	 *
	 * @since 1.0.0
	 * @deprecated 1.7.0
	 */
	do_action( 'genesis_home' );

}

/**
 * Deprecated. Wrapper for `genesis_before_loop` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_loop() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_loop' )" );

	/** This action is documented in framework.php */
	do_action( 'genesis_before_loop' );

}

/**
 * Deprecated. Wrapper for `genesis_loop` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_loop() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_loop' )" );

	/** This action is documented in framework.php */
	do_action( 'genesis_loop' );

}

/**
 * Deprecated. Wrapper for `genesis_after_loop` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_loop() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_loop' )" );

	/** This action is documented in framework.php */
	do_action( 'genesis_after_loop' );

}

/**
 * Deprecated. Wrapper for `genesis_before_post` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_post() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_post' )" );

	/** This action is documented in lib/structure/loops.php */
	do_action( 'genesis_before_post' );

}

/**
 * Deprecated. Wrapper for `genesis_after_post` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_post() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_post' )" );

	/** This action is documented in lib/structure/loops.php */
	do_action( 'genesis_after_post' );

}

/**
 * Deprecated. Wrapper for `genesis_before_post_title` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_post_title() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_post_title' )" );

	/** This action is documented in lib/structure/loops.php */
	do_action( 'genesis_before_post_title' );

}

/**
 * Deprecated. Wrapper for `genesis_post_title` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_post_title() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_post_title' )" );

	/** This action is documented in lib/structure/loops.php */
	do_action( 'genesis_post_title' );

}

/**
 * Deprecated. Wrapper for `genesis_after_post_title` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_post_title() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_post_title' )" );

	/** This action is documented in lib/structure/loops.php */
	do_action( 'genesis_after_post_title' );

}

/**
 * Deprecated. Wrapper for `genesis_before_post_content` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_post_content() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_post_content' )" );

	/** This action is documented in lib/structure/loops.php */
	do_action( 'genesis_before_post_content' );

}

/**
 * Deprecated. Wrapper for `genesis_post_content` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_post_content() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_post_content' )" );

	/** This action is documented in lib/structure/loops.php */
	do_action( 'genesis_post_content' );

}

/**
 * Deprecated. Wrapper for `genesis_after_post_content` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_post_content() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_post_content' )" );

	/** This action is documented in lib/structure/loops.php */
	do_action( 'genesis_after_post_content' );

}

/**
 * Deprecated. Wrapper for `genesis_after_endwhile` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_endwhile() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_endwhile' )" );

	/** This action is documented in lib/structure/loops.php */
	do_action( 'genesis_after_endwhile' );

}

/**
 * Deprecated. Wrapper for `genesis_loop_else` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_loop_else() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_loop_else' )" );

	/** This action is documented in lib/structure/loops.php */
	do_action( 'genesis_loop_else' );

}

/**
 * Deprecated. Wrapper for `genesis_before_comments` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_comments() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_comments' )" );

	/** This action is documented in comments.php */
	do_action( 'genesis_before_comments' );

}

/**
 * Deprecated. Wrapper for `genesis_comments` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_comments() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_comments' )" );

	/** This action is documented in comments.php */
	do_action( 'genesis_comments' );

}

/**
 * Deprecated. Wrapper for `genesis_list_comments` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_list_comments() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_list_comments' )" );

	/** This action is documented in lib/structure/comments.php */
	do_action( 'genesis_list_comments' );

}

/**
 * Deprecated. Wrapper for `genesis_after_comments` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_comments() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_comments' )" );

	/** This action is documented in comments.php */
	do_action( 'genesis_after_comments' );

}

/**
 * Deprecated. Wrapper for `genesis_before_pings` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_pings() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_pings' )" );

	/** This action is documented in comments.php */
	do_action( 'genesis_before_pings' );

}

/**
 * Deprecated. Wrapper for `genesis_pings` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_pings() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_pings' )" );

	/** This action is documented in comments.php */
	do_action( 'genesis_pings' );

}

/**
 * Deprecated. Wrapper for `genesis_list_pings` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_list_pings() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_list_pings' )" );

	/** This action is documented in lib/structure/comments.php */
	do_action( 'genesis_list_pings' );

}

/**
 * Deprecated. Wrapper for `genesis_after_pings` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_pings() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_pings' )" );

	/** This action is documented in comments.php */
	do_action( 'genesis_after_pings' );

}

/**
 * Deprecated. Wrapper for `genesis_before_comment` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_comment() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_comment' )" );

	/** This action is documented in lib/structure/comments.php */
	do_action( 'genesis_before_comment' );

}

/**
 * Deprecated. Wrapper for `genesis_after_comment` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_comment() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_comment' )" );

	/** This action is documented in lib/structure/comments.php */
	do_action( 'genesis_after_comment' );

}

/**
 * Deprecated. Wrapper for `genesis_before_comment_form` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_comment_form() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_comment_form' )" );

	/** This action is documented in comments.php */
	do_action( 'genesis_before_comment_form' );

}

/**
 * Deprecated. Wrapper for `genesis_comment_form` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_comment_form() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_comment_form' )" );

	/** This action is documented in comments.php */
	do_action( 'genesis_comment_form' );

}

/**
 * Deprecated. Wrapper for `genesis_after_comment_form` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_comment_form() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_comment_form' )" );

	/** This action is documented in comments.php */
	do_action( 'genesis_after_comment_form' );

}

/**
 * Deprecated. Wrapper for `genesis_before_sidebar_widget_area` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_sidebar_widget_area() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_sidebar_widget_area' )" );

	/** This action is documented in sidebar.php */
	do_action( 'genesis_before_sidebar_widget_area' );

}

/**
 * Deprecated. Wrapper for `genesis_sidebar` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_sidebar() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_sidebar' )" );

	/** This action is documented in sidebar.php */
	do_action( 'genesis_sidebar' );

}

/**
 * Deprecated. Wrapper for `genesis_after_sidebar_widget_area` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_sidebar_widget_area() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_sidebar_widget_area' )" );

	/** This action is documented in sidebar.php */
	do_action( 'genesis_after_sidebar_widget_area' );

}

/**
 * Deprecated. Wrapper for `genesis_before_sidebar_alt_widget_area` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_sidebar_alt_widget_area() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_sidebar_alt_widget_area' )" );

	/** This action is documented in sidebar-alt.php */
	do_action( 'genesis_before_sidebar_alt_widget_area' );

}

/**
 * Deprecated. Wrapper for `genesis_sidebar_alt` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_sidebar_alt() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_sidebar_alt' )" );

	/** This action is documented in sidebar-alt.php */
	do_action( 'genesis_sidebar_alt' );

}

/**
 * Deprecated. Wrapper for `genesis_after_sidebar_alt_widget_area` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_sidebar_alt_widget_area() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_sidebar_alt_widget_area' )" );

	/** This action is documented in sidebar-alt.php */
	do_action( 'genesis_after_sidebar_alt_widget_area' );

}

/**
 * Deprecated. Wrapper for `genesis_before_footer` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_before_footer() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_before_footer' )" );

	/** This action is documented in footer.php */
	do_action( 'genesis_before_footer' );

}

/**
 * Deprecated. Wrapper for `genesis_footer` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_footer() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_footer' )" );

	/** This action is documented in footer.php */
	do_action( 'genesis_footer' );

}

/**
 * Deprecated. Wrapper for `genesis_after_footer` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_after_footer() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_after_footer' )" );

	/** This action is documented in footer.php */
	do_action( 'genesis_after_footer' );

}

/**
 * Deprecated. Wrapper for `genesis_import_export_form` action hook.
 *
 * @since 1.0.0
 * @deprecated 1.7.0
 */
function genesis_import_export_form() {

	_deprecated_function( __FUNCTION__, '1.7.0', "do_action( 'genesis_import_export_form' )" );

	/** This action is documented in lib/views/pages/genesis-admin-import-export.php */
	do_action( 'genesis_import_export_form' );

}

/**
 * Deprecated. Hook this function to `wp_head()` and you'll be able to use many of the new IE8 functionality.
 *
 * Not loaded by default.
 *
 * @since 1.0.0
 * @deprecated 1.6.0
 *
 * @link http://ie7-js.googlecode.com/svn/test/index.html
 */
function genesis_ie8_js() {

	_deprecated_function( __FUNCTION__, '1.6.0' );

}

/**
 * Deprecated. The Genesis-specific post date.
 *
 * @since 1.0.0
 * @deprecated 1.5.0
 *
 * @see genesis_post_date_shortcode()
 *
 * @param string $format Optional. Date format. Default is post date format saved in settings.
 * @param string $label  Optional. Label before date. Default is empty string.
 */
function genesis_post_date( $format = '', $label = '' ) {

	_deprecated_function( __FUNCTION__, '1.5.0', 'genesis_post_date_shortcode()' );

	echo genesis_post_date_shortcode( array(
		'format' => $format,
		'label'  => $label,
	) );

}

/**
 * Deprecated. The Genesis-specific post author link.
 *
 * @since 1.0.0
 * @deprecated 1.5.0
 *
 * @see genesis_post_author_posts_link_shortcode()
 *
 * @param string $label Optional. Label before link. Default is empty string.
 */
function genesis_post_author_posts_link( $label = '' ) {

	_deprecated_function( __FUNCTION__, '1.5.0', 'genesis_post_author_posts_link_shortcode()' );

	echo genesis_post_author_posts_link_shortcode( array(
		'before' => $label,
	) );

}

/**
 * Deprecated. The Genesis-specific post comments link.
 *
 * @since 1.0.0
 * @deprecated 1.5.0
 *
 * @see genesis_post_comments_shortcode()
 *
 * @param string $zero Optional. Text when there are no comments. Default is "Leave a Comment".
 * @param string $one  Optional. Text when there is exactly one comment. Default is "1 Comment".
 * @param string $more Optional. Text when there is more than one comment. Default is "% Comments".
 */
function genesis_post_comments_link( $zero = null, $one = null, $more = null ) {

	_deprecated_function( __FUNCTION__, '1.5.0', 'genesis_post_comments_shortcode()' );

	echo genesis_post_comments_shortcode( array(
		'zero' => $zero,
		'one'  => $one,
		'more' => $more,
	) );

}

/**
 * Deprecated. The Genesis-specific post categories link.
 *
 * @since 1.0.0
 * @deprecated 1.5.0
 *
 * @see genesis_post_categories_shortcode()
 *
 * @param string $sep   Optional. Separator between categories. Default is ", ".
 * @param string $label Optional. Label before first category. Default is empty string.
 */
function genesis_post_categories_link( $sep = ', ', $label = '' ) {

	_deprecated_function( __FUNCTION__, '1.5.0', 'genesis_post_categories_shortcode()' );

	echo genesis_post_categories_shortcode( array(
		'sep'    => $sep,
		'before' => $label,
	) );

}

/**
 * Deprecated. The Genesis-specific post tags link.
 *
 * @since 1.0.0
 * @deprecated 1.5.0
 *
 * @see genesis_post_tags_shortcode()
 *
 * @param string $sep   Optional. Separator between tags. Default is ", ".
 * @param string $label Optional. Label before first tag. Default is empty string.
 */
function genesis_post_tags_link( $sep = ', ', $label = '' ) {

	_deprecated_function( __FUNCTION__, '1.5.0', 'genesis_post_tags_shortcode()' );

	echo genesis_post_tags_shortcode( array(
		'sep'    => $sep,
		'before' => $label,
	) );

}

/**
 * Deprecated. Allow a child theme to add new image sizes.
 *
 * Use `add_image_size()` instead.
 *
 * @since 1.0.0
 * @deprecated 1.2.0
 *
 * @param string $name   Name of the image size.
 * @param int    $width  Width of the image size.
 * @param int    $height Height of the image size.
 * @param bool   $crop   Whether to crop or not.
 */
function genesis_add_image_size( $name, $width = 0, $height = 0, $crop = false ) {

	_deprecated_function( __FUNCTION__, '1.2.0', 'add_image_size()' );

	add_image_size( $name, $width, $height, $crop );

}

/**
 * Deprecated. Filter intermediate sizes for WP 2.8 backward compatibility.
 *
 * @since 1.0.0
 * @deprecated 1.2.0
 *
 * @param array $sizes Array of sizes to add.
 * @return array Empty array.
 */
function genesis_add_intermediate_sizes( array $sizes ) {

	_deprecated_function( __FUNCTION__, '1.2.0' );

	return array();

}

/**
 * Deprecated. Was a wrapper for `genesis_comment` hook, but now calls `genesis_after_comment` action hook instead.
 *
 * @since 1.0.0
 * @deprecated 1.2.0
 */
function genesis_comment() {

	_deprecated_function( __FUNCTION__, '1.2.0', "do_action( 'genesis_after_comment' )" );

	/** This action is documented in lib/structure/comments.php */
	do_action( 'genesis_after_comment' );

}

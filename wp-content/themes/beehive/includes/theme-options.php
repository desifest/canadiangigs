<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = Beehive::get_option_name();

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	// TYPICAL -> Change these values as you need/desire.
	'opt_name'                  => $opt_name,
	// This is where your data is stored in the database and also becomes your global variable name.
	'display_name'              => $theme->get( 'Name' ),
	// Name that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),
	// Version that appears at the top of your panel.
	'menu_type'                 => 'submenu',
	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'allow_sub_menu'            => true,
	// Show the sections below the admin menu item or not.
	'menu_title'                => esc_html__( 'Theme Options', 'beehive' ),
	'page_title'                => esc_html__( 'Beehive Options', 'beehive' ),
	// You will need to generate a Google API key to use this feature.
	// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth.
	'google_api_key'            => 'AIzaSyA0vwIAyiLVCS0HQ6zR4PlC5S7dwfHzoik',
	// Set it you want google fonts to update weekly. A google_api_key value is required.
	'google_update_weekly'      => false,
	// Must be defined to add google fonts to the typography module.
	'async_typography'          => false,
	// Use a asynchronous font on the front end or font string.
	'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader.
	'admin_bar'                 => false,
	// Show the panel pages on the admin bar.
	'admin_bar_icon'            => 'dashicons-portfolio',
	// Choose an icon for the admin bar menu.
	'admin_bar_priority'        => 50,
	// Choose an priority for the admin bar menu.
	'global_variable'           => '',
	// Set a different name for your global variable other than the opt_name.
	'dev_mode'                  => false,
	// Show the time the page took to load, etc.
	'update_notice'             => true,
	// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo.
	'customizer'                => false,
	// Enable basic customizer support.
	// 'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
	// 'disable_save_warn' => true,                    // Disable the save warning when a user changes a field.

	// OPTIONAL -> Give you extra features.
	'page_priority'             => null,
	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_parent'               => 'beehive',
	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_permissions'          => 'manage_options',
	// Permissions needed to access the options panel.
	'menu_icon'                 => '',
	// Specify a custom URL to an icon.
	'last_tab'                  => '',
	// Force your panel to always open to a specific tab (by id).
	'page_icon'                 => 'icon-themes',
	// Icon displayed in the admin panel next to your menu_title.
	'page_slug'                 => 'beehive-options',
	// Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided.
	'save_defaults'             => true,
	// On load save the defaults to DB before user clicks save or not.
	'default_show'              => false,
	// If true, shows the default value next to each field that is not the default value.
	'default_mark'              => '',
	// What to print by the field's title if the value shown is default. Suggested: *.
	'show_import_export'        => true,
	// Shows the Import/Export panel when not used as a field.

	// CAREFUL -> These options are for advanced use only.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,
	'output'                    => true,
	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output_tag'                => true,
	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head.
	// 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	'database'                  => '',
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!.
	'use_cdn'                   => true,
	// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),
);

Redux::setArgs( $opt_name, $args );

/*
 * ---> Option functions
 */
if ( ! function_exists( 'beehive_redux_get_pages' ) ) :
	/**
	 * Get page list in array
	 *
	 * @return array
	 * @since 1.2.0
	 */
	function beehive_redux_get_pages() {
		$pages = get_pages(
			array(
				'post_type'   => 'page',
				'post_status' => 'publish',
			)
		);
		$items = array();
		if ( is_array( $pages ) ) {
			foreach ( $pages as $page ) {
				$items[ $page->ID ] = $page->post_title;
			}
		}
		return $items;
	}
endif;

/*
 * ---> END ARGUMENTS
 */

// -> START GENERAL.
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'General Settings', 'beehive' ),
		'id'     => 'general',
		'desc'   => esc_html__( 'General settings for beehive theme. Update logo and other general settings', 'beehive' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'       => 'logo-vertical',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Social Template Logo: ', 'beehive' ),
				'subtitle' => esc_html__( 'Upload social template logo. This logo is displayed on the menu panel of the social dashboard template.', 'beehive' ),
				'default'  => array(
					'url' => BEEHIVE_URI . '/assets/images/logo-vertical.svg',
				),
			),
			array(
				'id'       => 'logo-icon',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Social Template Icon Logo: ', 'beehive' ),
				'subtitle' => esc_html__( 'Used in the social template page wide view (collapsed menu). If it is not set, social template logo from the above field will be used.', 'beehive' ),
				'default'  => array(
					'url' => BEEHIVE_URI . '/assets/images/logo-icon.svg',
				),
			),
			array(
				'id'       => 'enable-reveal-animation',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Reveal Animation:', 'beehive' ),
				'subtitle' => esc_html__( 'Enable or disable reveal animation on scrolling.', 'beehive' ),
				'default'  => true,
			),
			array(
				'id'       => 'reveal-animation',
				'type'     => 'select',
				'title'    => esc_html__( 'Reveal Animation:', 'beehive' ),
				'subtitle' => esc_html__( 'Select animation for revealing contents.', 'beehive' ),
				'required' => array( 'enable-reveal-animation', '=', '1' ),
				'options'  => array(
					'backInUp'   => esc_html__( 'backInUp', 'beehive' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'beehive' ),
					'fadeIn'     => esc_html__( 'fadeIn', 'beehive' ),
					'fadeInUp'   => esc_html__( 'fadeInUp', 'beehive' ),
					'zoomIn'     => esc_html__( 'zoomIn', 'beehive' ),
					'slideInUp'  => esc_html__( 'slideInUp', 'beehive' ),

				),
				'default'  => 'slideInUp',
			),
			array(
				'id'       => 'preloader',
				'type'     => 'switch',
				'title'    => esc_html__( 'Preloader:', 'beehive' ),
				'subtitle' => esc_html__( 'Enable or disable preloader.', 'beehive' ),
				'default'  => true,
			),
			array(
				'id'       => 'ajax-login',
				'type'     => 'switch',
				'title'    => esc_html__( 'Ajax Login:', 'beehive' ),
				'subtitle' => esc_html__( 'Enable or disable ajax login in all beehive login forms.', 'beehive' ),
				'default'  => false,
			),
			array(
				'id'       => 'remove-adminbar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Remove Admin Bar:', 'beehive' ),
				'subtitle' => esc_html__( 'Remove the admin bar for the non administrator accounts.', 'beehive' ),
				'default'  => false,
			),
		),
	)
);

// -> START NAVBAR
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Navbar Settings', 'beehive' ),
		'id'     => 'navbar',
		'desc'   => esc_html__( 'Theme navbar settings. For typography check typography tab in the left. You can edit/override some other properties in the page meta options.', 'beehive' ),
		'icon'   => 'el el-th-list',
		'fields' => array(
			array(
				'id'       => 'fixed-nav',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fixed at Top: ', 'beehive' ),
				'subtitle' => esc_html__( 'Do you want the navbar to be fixed at top?', 'beehive' ),
				'default'  => true,
				'on'       => esc_html__( 'Yes', 'beehive' ),
				'off'      => esc_html__( 'No', 'beehive' ),
			),
			array(
				'id'       => 'fluid-header',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fluid Navbar: ', 'beehive' ),
				'subtitle' => esc_html__( 'Do you want the navbar to be full width?', 'beehive' ),
				'default'  => false,
				'on'       => esc_html__( 'Yes', 'beehive' ),
				'off'      => esc_html__( 'No', 'beehive' ),
			),
			array(
				'id'       => 'user-nav',
				'type'     => 'switch',
				'title'    => esc_html__( 'User Navigation', 'beehive' ),
				'subtitle' => esc_html__( 'Turn on to display user navbar in the menu header.', 'beehive' ),
				'default'  => false,
				'on'       => esc_html__( 'On', 'beehive' ),
				'off'      => esc_html__( 'Off', 'beehive' ),
			),
			array(
				'id'          => 'popup-avatar',
				'type'        => 'media',
				'url'         => true,
				'title'       => esc_html__( 'Login popup avatar: ', 'beehive' ),
				'subtitle'    => esc_html__( 'Upload a custom avatar for the login form on the popup.', 'beehive' ),
				'description' => esc_html__( 'Use square shaped image.', 'beehive' ),
				'required'    => array( 'user-nav', '=', '1' ),
			),
		),
	)
);

// -> START TYPOGRAPHY
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Typgraphy', 'beehive' ),
		'id'     => 'body-typography',
		'desc'   => esc_html__( 'Choose your theme typography', 'beehive' ),
		'icon'   => 'el el-font',
		'fields' => array(
			array(
				'id'          => 'body-font',
				'type'        => 'typography',
				'title'       => esc_html__( 'Body Typography: ', 'beehive' ),
				'subtitle'    => esc_html__( 'Select the font you like for body texts.', 'beehive' ),
				'compiler'    => true,
				'google'      => true,
				'font-backup' => false,
				'font-style'  => true,
				'font-size'   => true,
				'line-height' => true,
				'color'       => false,
				'text-align'  => false,
				'preview'     => true,
				'all_styles'  => true,
				'units'       => 'px',
				'default'     => array(
					'font-weight' => '400',
					'font-family' => 'Nunito Sans',
					'google'      => true,
					'font-size'   => '14px',
					'line-height' => '26px',
				),
			),
			array(
				'id'          => 'heading-font',
				'type'        => 'typography',
				'title'       => esc_html__( 'Heading Font: ', 'beehive' ),
				'subtitle'    => esc_html__( 'Select heading font styles.', 'beehive' ),
				'compiler'    => true,
				'google'      => true,
				'font-backup' => false,
				'color'       => false,
				'text-align'  => false,
				'font-style'  => false,
				'font-size'   => false,
				'line-height' => false,
				'preview'     => true,
				'all_styles'  => true,
				'units'       => 'rem',
				'default'     => array(
					'font-weight' => '700',
					'font-family' => 'Quicksand',
					'google'      => true,
					'font-size'   => '2rem',
				),
			),
		),
	)
);

// -> START COLORS
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Color Selection', 'beehive' ),
		'id'     => 'colors',
		'desc'   => esc_html__( 'Theme color selection.', 'beehive' ),
		'icon'   => 'el el-brush',
		'fields' => array(
			array(
				'id'          => 'primary',
				'type'        => 'color',
				'title'       => esc_html__( 'Primary Color: ', 'beehive' ),
				'subtitle'    => esc_html__( 'Select primary theme color.', 'beehive' ),
				'compiler'    => true,
				'transparent' => false,
				'default'     => '#5561e2',
				'validate'    => 'color',
			),
			array(
				'id'          => 'secondary',
				'type'        => 'color',
				'title'       => esc_html__( 'Secondary Color: ', 'beehive' ),
				'subtitle'    => esc_html__( 'Select secondary theme color.', 'beehive' ),
				'compiler'    => true,
				'transparent' => false,
				'default'     => '#ff7544',
				'validate'    => 'color',
			),
			array(
				'id'          => 'dash-bg-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Social Panel BG: ', 'beehive' ),
				'subtitle'    => esc_html__( 'Select background color for social dashboard template menu panel.', 'beehive' ),
				'compiler'    => true,
				'transparent' => false,
				'default'     => '#383a45',
				'validate'    => 'color',
			),
			array(
				'id'       => 'info-color-start',
				'type'     => 'section',
				'title'    => esc_html__( 'Info messages colors', 'beehive' ),
				'subtitle' => esc_html__( 'Select info messages colors.', 'beehive' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'          => 'info-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Info color: ', 'beehive' ),
				'subtitle'    => esc_html__( 'Select color for info messages.', 'beehive' ),
				'compiler'    => true,
				'transparent' => false,
				'default'     => '#5561e2',
				'validate'    => 'color',
			),
			array(
				'id'          => 'success-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Success color: ', 'beehive' ),
				'subtitle'    => esc_html__( 'Select color for success messages.', 'beehive' ),
				'compiler'    => true,
				'transparent' => false,
				'default'     => '#2ed573',
				'validate'    => 'color',
			),
			array(
				'id'          => 'warn-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Warning color: ', 'beehive' ),
				'subtitle'    => esc_html__( 'Select color for warning messages.', 'beehive' ),
				'compiler'    => true,
				'transparent' => false,
				'default'     => '#ffa500',
				'validate'    => 'color',
			),
			array(
				'id'          => 'error-color',
				'type'        => 'color',
				'title'       => esc_html__( 'Error color: ', 'beehive' ),
				'subtitle'    => esc_html__( 'Select color for error messages.', 'beehive' ),
				'compiler'    => true,
				'transparent' => false,
				'default'     => '#ff0000',
				'validate'    => 'color',
			),
			array(
				'id'     => 'info-color-end',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		),
	)
);

// -> START SIDEBARS
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Sidebars', 'beehive' ),
		'id'     => 'sidebars',
		'desc'   => esc_html__( 'Manage theme sidebars here', 'beehive' ),
		'icon'   => 'el el-website',
		'fields' => array(
			array(
				'id'         => 'add-sidebars',
				'type'       => 'multi_text',
				'title'      => esc_html__( 'Add/Remove Sidebars', 'beehive' ),
				'subtitle'   => esc_html__( 'Make sure the sidebar name is unique when adding/editing a sidebar', 'beehive' ),
				'show_empty' => false,
				'desc'       => esc_html__( 'Only valid string is allowed.', 'beehive' ),
			),
			array(
				'id'       => 'sticky-sidebar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Sticky Feature', 'beehive' ),
				'subtitle' => esc_html__( 'The last widget within the sidebar will be stuck as user scroll to the bottom of the page.', 'beehive' ),
				'default'  => true,
				'on'       => esc_html__( 'Enable', 'beehive' ),
				'off'      => esc_html__( 'Disable', 'beehive' ),
			),
			array(
				'id'       => 'remove-widget-block-editor',
				'type'     => 'switch',
				'title'    => esc_html__( 'Remove Widget Blocks', 'beehive' ),
				'subtitle' => esc_html__( 'Remove WordPress widget block editor.', 'beehive' ),
				'default'  => false,
				'on'       => esc_html__( 'Yes', 'beehive' ),
				'off'      => esc_html__( 'No', 'beehive' ),
			),
		),
	)
);

// -> START Title Bar
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Title Bar', 'beehive' ),
		'id'     => 'page-title-bar',
		'desc'   => esc_html__( 'Update page title bar settings.', 'beehive' ),
		'icon'   => 'el el-bookmark',
		'fields' => array(
			array(
				'id'       => 'remove-title-bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Remove Title Bar', 'beehive' ),
				'subtitle' => esc_html__( 'Remove title bar at the top of the page.', 'beehive' ),
				'default'  => false,
				'on'       => esc_html__( 'Yes', 'beehive' ),
				'off'      => esc_html__( 'No', 'beehive' ),
			),
		),
	)
);

// -> START 404 PAGE
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Page Settings', 'beehive' ),
		'id'     => 'page-settings',
		'desc'   => esc_html__( 'Update page settings here.', 'beehive' ),
		'icon'   => 'el el-file-edit',
		'fields' => array(
			array(
				'id'       => '404-start',
				'type'     => 'section',
				'title'    => esc_html__( '404 Page', 'beehive' ),
				'subtitle' => esc_html__( '404 error page options.', 'beehive' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'      => 'error-img',
				'type'    => 'media',
				'url'     => true,
				'title'   => esc_html__( '404 Image', 'beehive' ),
				'desc'    => esc_html__( 'Upload your own creative 404 error image.', 'beehive' ),
				'default' => array(
					'url' => BEEHIVE_URI . '/assets/images/404.png',
				),
			),
			array(
				'id'       => 'error-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Error Page Title', 'beehive' ),
				'subtitle' => esc_html__( 'Relace default page title if you want.', 'beehive' ),
				'default'  => '',
			),
			array(
				'id'       => 'error-desc',
				'type'     => 'textarea',
				'title'    => esc_html__( '404 page description', 'beehive' ),
				'subtitle' => esc_html__( 'Write down the text you want to display as description while user is on the 404 error page.', 'beehive' ),
				'desc'     => esc_html__( 'No html please.', 'beehive' ),
				'validate' => 'no_html',
				'default'  => '',
			),
			array(
				'id'       => 'error-search',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search Form', 'beehive' ),
				'subtitle' => esc_html__( 'Display search form to the user who is lost.', 'beehive' ),
				'default'  => true,
				'on'       => esc_html__( 'Yes', 'beehive' ),
				'off'      => esc_html__( 'No', 'beehive' ),
			),
			array(
				'id'     => '404-end',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		),
	)
);

// -> START BLOG
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Blog Settings', 'beehive' ),
		'id'     => 'blog',
		'desc'   => esc_html__( 'Control the blog settings here.', 'beehive' ),
		'icon'   => 'el el-list-alt',
		'fields' => array(
			array(
				'id'       => 'blog-style',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Blog Styles', 'beehive' ),
				'subtitle' => esc_html__( 'Choose between standard listing and grid layout to display your blog.', 'beehive' ),
				'options'  => array(
					'classic' => esc_html__( 'Classic', 'beehive' ),
					'grid'    => esc_html__( 'Grid', 'beehive' ),
				),
				'default'  => 'grid',
			),
			array(
				'id'       => 'display-blog-sidebar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sidebar', 'beehive' ),
				'subtitle' => esc_html__( 'Turn on to display sidebar post archives.', 'beehive' ),
				'default'  => true,
				'on'       => esc_html__( 'On', 'beehive' ),
				'off'      => esc_html__( 'Off', 'beehive' ),
			),
			array(
				'id'       => 'blog-sidebar-alignment',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sidebar Alignment', 'beehive' ),
				'subtitle' => esc_html__( 'Choose between left and right to display the sidebar.', 'beehive' ),
				'required' => array( 'display-blog-sidebar', '=', '1' ),
				'options'  => array(
					'left'  => esc_html__( 'Left', 'beehive' ),
					'right' => esc_html__( 'Right', 'beehive' ),
				),
				'default'  => 'right',
			),
			array(
				'id'       => 'display-post-format',
				'type'     => 'switch',
				'title'    => esc_html__( 'Post Format', 'beehive' ),
				'subtitle' => esc_html__( 'Turn on to display post format flag in the post archives.', 'beehive' ),
				'default'  => false,
				'on'       => esc_html__( 'On', 'beehive' ),
				'off'      => esc_html__( 'Off', 'beehive' ),
			),
			array(
				'id'       => 'post-slider',
				'type'     => 'switch',
				'title'    => esc_html__( 'Post Meta Slider', 'beehive' ),
				'subtitle' => esc_html__( 'Turn on to display the post meta slider on single blog posts.', 'beehive' ),
				'default'  => true,
				'on'       => esc_html__( 'On', 'beehive' ),
				'off'      => esc_html__( 'Off', 'beehive' ),
			),
			array(
				'id'       => 'single-start',
				'type'     => 'section',
				'title'    => esc_html__( 'Blog Single', 'beehive' ),
				'subtitle' => esc_html__( 'Control single blog options.', 'beehive' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'author-link',
				'type'     => 'switch',
				'title'    => esc_html__( 'Author Link', 'beehive' ),
				'subtitle' => esc_html__( 'Choose whether or not display the author link', 'beehive' ),
				'default'  => true,
				'on'       => esc_html__( 'On', 'beehive' ),
				'off'      => esc_html__( 'Off', 'beehive' ),
			),
			array(
				'id'       => 'post-navigation',
				'type'     => 'switch',
				'title'    => esc_html__( 'Post Navigation', 'beehive' ),
				'subtitle' => esc_html__( 'Turn on to display the previous/next post navigation on single blog posts.', 'beehive' ),
				'default'  => true,
				'on'       => esc_html__( 'On', 'beehive' ),
				'off'      => esc_html__( 'Off', 'beehive' ),
			),
			array(
				'id'       => 'related-posts',
				'type'     => 'switch',
				'title'    => esc_html__( 'Related Posts', 'beehive' ),
				'subtitle' => esc_html__( 'Turn on to display related blog posts.', 'beehive' ),
				'default'  => false,
				'on'       => esc_html__( 'On', 'beehive' ),
				'off'      => esc_html__( 'Off', 'beehive' ),
			),
			array(
				'id'     => 'single-end',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		),
	)
);

// -> START FOOTER
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Footer Settings', 'beehive' ),
		'id'     => 'footer-settings',
		'desc'   => esc_html__( 'Control footer settings.', 'beehive' ),
		'icon'   => 'el el-arrow-down',
		'fields' => array(
			array(
				'id'       => 'footer-social-links',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Social Links', 'beehive' ),
				'subtitle' => esc_html__( 'Choose whether or not display the social links listed below.', 'beehive' ),
				'default'  => true,
				'on'       => esc_html__( 'Yes', 'beehive' ),
				'off'      => esc_html__( 'No', 'beehive' ),
			),
			array(
				'id'       => 'colophon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Colophon', 'beehive' ),
				'subtitle' => esc_html__( 'Choose whether or not display copyright text.', 'beehive' ),
				'default'  => true,
				'on'       => esc_html__( 'Yes', 'beehive' ),
				'off'      => esc_html__( 'No', 'beehive' ),
			),
			array(
				'id'       => 'copyright-text',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Copyright Text', 'beehive' ),
				'subtitle' => esc_html__( 'Write copyright texts to be displayed at the bottom of the footer.', 'beehive' ),
				'required' => array( 'colophon', '=', '1' ),
				'default'  => '',
			),
			array(
				'id'       => 'company-menu-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Footer Menu (Company) Title', 'beehive' ),
				'subtitle' => esc_html__( 'Change the default name of the company menu title.', 'beehive' ),
			),
			array(
				'id'       => 'community-menu-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Footer Menu (Community) Title', 'beehive' ),
				'subtitle' => esc_html__( 'Change the default name of the community menu title.', 'beehive' ),
			),
			array(
				'id'       => 'usefull-links-menu-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Footer Menu (Usefull Links) Title', 'beehive' ),
				'subtitle' => esc_html__( 'Change the default name of the usefull links menu title.', 'beehive' ),
			),
			array(
				'id'       => 'legal-menu-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Footer Menu (Legal) Title', 'beehive' ),
				'subtitle' => esc_html__( 'Change the default name of the legal links menu title.', 'beehive' ),
			),
		),
	)
);

// -> START SOCIAL LINKS
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Social Links', 'beehive' ),
		'id'     => 'social-links',
		'desc'   => esc_html__( 'Social links with icons.', 'beehive' ),
		'icon'   => 'el el-share-alt',
		'fields' => array(
			array(
				'id'       => 'facebook',
				'type'     => 'text',
				'title'    => esc_html__( 'Facebook.', 'beehive' ),
				'subtitle' => esc_html__( 'Your Facebook link.', 'beehive' ),
				'validate' => 'url',
			),
			array(
				'id'       => 'twitter',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter.', 'beehive' ),
				'subtitle' => esc_html__( 'Your Twitter link.', 'beehive' ),
				'validate' => 'url',
			),
			array(
				'id'       => 'g-plus',
				'type'     => 'text',
				'title'    => esc_html__( 'Google+.', 'beehive' ),
				'subtitle' => esc_html__( 'Your Google+ link.', 'beehive' ),
				'validate' => 'url',
			),
			array(
				'id'       => 'pinterest',
				'type'     => 'text',
				'title'    => esc_html__( 'Pinterest', 'beehive' ),
				'subtitle' => esc_html__( 'Your Pinterest link.', 'beehive' ),
				'validate' => 'url',
			),
			array(
				'id'       => 'linkedin',
				'type'     => 'text',
				'title'    => esc_html__( 'Linkedin', 'beehive' ),
				'subtitle' => esc_html__( 'Your Linkedin link.', 'beehive' ),
				'validate' => 'url',
			),
			array(
				'id'       => 'instagram',
				'type'     => 'text',
				'title'    => esc_html__( 'Instagram', 'beehive' ),
				'subtitle' => esc_html__( 'Your Instagram link.', 'beehive' ),
				'validate' => 'url',
			),
			array(
				'id'       => 'dribbble',
				'type'     => 'text',
				'title'    => esc_html__( 'Dribbble', 'beehive' ),
				'subtitle' => esc_html__( 'Your Dribbble link.', 'beehive' ),
				'validate' => 'url',
			),
			array(
				'id'       => 'tumblr',
				'type'     => 'text',
				'title'    => esc_html__( 'Tumblr', 'beehive' ),
				'subtitle' => esc_html__( 'Your Tumblr link.', 'beehive' ),
				'validate' => 'url',
			),
			array(
				'id'       => 'github',
				'type'     => 'text',
				'title'    => esc_html__( 'Github', 'beehive' ),
				'subtitle' => esc_html__( 'Your Github link.', 'beehive' ),
				'validate' => 'url',
			),
			array(
				'id'       => 'youtube',
				'type'     => 'text',
				'title'    => esc_html__( 'Youtube', 'beehive' ),
				'subtitle' => esc_html__( 'Your Youtube link.', 'beehive' ),
				'validate' => 'url',
			),
			array(
				'id'       => 'vimeo',
				'type'     => 'text',
				'title'    => esc_html__( 'Vimeo', 'beehive' ),
				'subtitle' => esc_html__( 'Your Vimeo link.', 'beehive' ),
				'validate' => 'url',
			),
		),
	)
);

// -> START BUDDYPRESS
if ( function_exists( 'bp_is_active' ) ) :
	Redux::setSection(
		$opt_name,
		array(
			'title'  => esc_html__( 'Buddypress', 'beehive' ),
			'id'     => 'buddypress',
			'desc'   => esc_html__( 'Additional buddypress options by beehive theme', 'beehive' ),
			'icon'   => 'el el-user',
			'fields' => array(
				array(
					'id'       => 'activity-start',
					'type'     => 'section',
					'title'    => esc_html__( 'Activity Options', 'beehive' ),
					'subtitle' => esc_html__( 'Control additional activity options offered by beehive theme', 'beehive' ),
					'indent'   => true, // Indent all options below until the next 'section' option is set.
				),
				array(
					'id'       => 'activity-filter',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activity Filter', 'beehive' ),
					'subtitle' => esc_html__( 'Turn on to display activity search and filter.', 'beehive' ),
					'default'  => false,
					'on'       => esc_html__( 'On', 'beehive' ),
					'off'      => esc_html__( 'Off', 'beehive' ),
				),
				array(
					'id'       => 'activity-like',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activity Like', 'beehive' ),
					'subtitle' => esc_html__( 'Turn on to enable activity likes.', 'beehive' ),
					'default'  => false,
					'on'       => esc_html__( 'On', 'beehive' ),
					'off'      => esc_html__( 'Off', 'beehive' ),
				),
				array(
					'id'          => 'home-to-activity',
					'type'        => 'switch',
					'title'       => esc_html__( 'Home Redirect', 'beehive' ),
					'subtitle'    => esc_html__( 'Redirect logged in users from homepage to buddypress activity page. Admin users will not be redirected.', 'beehive' ),
					'description' => esc_html__( 'This behaviour can be overridden in the Redirect & Restrict section.', 'beehive' ),
					'default'     => false,
					'on'          => esc_html__( 'Yes', 'beehive' ),
					'off'         => esc_html__( 'No', 'beehive' ),
				),
				array(
					'id'          => 'activity-login-redirect',
					'type'        => 'switch',
					'title'       => esc_html__( 'Login to Activity', 'beehive' ),
					'subtitle'    => esc_html__( 'Redirect users to activity page immediately after login.', 'beehive' ),
					'description' => esc_html__( 'This behaviour can be overridden in the Redirect & Restrict section.', 'beehive' ),
					'default'     => true,
					'on'          => esc_html__( 'Yes', 'beehive' ),
					'off'         => esc_html__( 'No', 'beehive' ),
				),
				array(
					'id'       => 'mini-activities',
					'type'     => 'checkbox',
					'title'    => esc_html__( 'Do not save activity on:', 'beehive' ),
					'subtitle' => esc_html__( 'This option does not remove old items, but it will not save activity in the future for the selected items.', 'beehive' ),
					'options'  => array(
						'updated_profile'    => esc_html__( 'Profile update', 'beehive' ),
						'new_member'         => esc_html__( 'Sign up', 'beehive' ),
						'new_avatar'         => esc_html__( 'Profile photo change', 'beehive' ),
						'friendship_created' => esc_html__( 'Becoming friends', 'beehive' ),
						'joined_group'       => esc_html__( 'Joining group', 'beehive' ),
					),
					'default'  => array(
						'updated_profile'    => '0',
						'new_member'         => '0',
						'new_avatar'         => '0',
						'friendship_created' => '0',
						'joined_group'       => '0',
					),
				),
				array(
					'id'     => 'activity-end',
					'type'   => 'section',
					'indent' => false, // Indent all options below until the next 'section' option is set.
				),
				array(
					'id'       => 'members-start',
					'type'     => 'section',
					'title'    => esc_html__( 'Members Options', 'beehive' ),
					'subtitle' => esc_html__( 'Control additional members options offered by beehive theme', 'beehive' ),
					'indent'   => true, // Indent all options below until the next 'section' option is set.
				),
				array(
					'id'       => 'member-default-avatar',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Default Avatar: ', 'beehive' ),
					'subtitle' => esc_html__( 'Upload default avatar for your members.', 'beehive' ),
				),
				array(
					'id'       => 'change-avatar-icon',
					'type'     => 'switch',
					'title'    => esc_html__( 'Change Avatar Icon', 'beehive' ),
					'subtitle' => esc_html__( 'Add a change avatar link with an icon on the profile photo.', 'beehive' ),
					'default'  => true,
					'on'       => esc_html__( 'Yes', 'beehive' ),
					'off'      => esc_html__( 'No', 'beehive' ),
				),
				array(
					'id'       => 'member-login-modal',
					'type'     => 'switch',
					'title'    => esc_html__( 'Login Modal?', 'beehive' ),
					'subtitle' => esc_html__( 'Fire the login modal when a non-logged-in user visits a member page.', 'beehive' ),
					'default'  => true,
				),
				array(
					'id'     => 'members-end',
					'type'   => 'section',
					'indent' => false, // Indent all options below until the next 'section' option is set.
				),
				array(
					'id'       => 'group-start',
					'type'     => 'section',
					'title'    => esc_html__( 'Groups Options', 'beehive' ),
					'subtitle' => esc_html__( 'Control additional groups options offered by beehive theme', 'beehive' ),
					'indent'   => true, // Indent all options below until the next 'section' option is set.
				),
				array(
					'id'       => 'group-login-modal',
					'type'     => 'switch',
					'title'    => esc_html__( 'Login Modal?', 'beehive' ),
					'subtitle' => esc_html__( 'Fire the login modal when a non-logged-in user visits a group page.', 'beehive' ),
					'default'  => true,
				),
				array(
					'id'     => 'group-end',
					'type'   => 'section',
					'indent' => false, // Indent all options below until the next 'section' option is set.
				),
				array(
					'id'       => 'register-start',
					'type'     => 'section',
					'title'    => esc_html__( 'Registration Options', 'beehive' ),
					'subtitle' => esc_html__( 'Control additional registration page options offered by beehive theme', 'beehive' ),
					'indent'   => true, // Indent all options below until the next 'section' option is set.
				),
				array(
					'id'       => 'hide-visibility-toggles',
					'type'     => 'switch',
					'title'    => esc_html__( 'Hide Visibility Toggles', 'beehive' ),
					'subtitle' => esc_html__( 'Hide buddypress visibility toggles on the registration page.', 'beehive' ),
					'default'  => true,
					'on'       => esc_html__( 'Yes', 'beehive' ),
					'off'      => esc_html__( 'No', 'beehive' ),
				),
				array(
					'id'     => 'register-end',
					'type'   => 'section',
					'indent' => false, // Indent all options below until the next 'section' option is set.
				),
			),
		)
	);
endif;

if ( class_exists( 'RTMedia' ) ) :
	Redux::setSection(
		$opt_name,
		array(
			'title'  => esc_html__( 'RT Media', 'beehive' ),
			'id'     => 'rtmedia',
			'desc'   => esc_html__( 'Additional rt media options by beehive theme', 'beehive' ),
			'icon'   => 'el el-photo',
			'fields' => array(
				array(
					'id'            => 'activity-length',
					'type'          => 'slider',
					'title'         => esc_html__( 'Activity character limit', 'beehive' ),
					'subtitle'      => esc_html__( 'Set character limit for each activity. You do not want people write down a researh paper in the activity, do you?', 'beehive' ),
					'default'       => 3000,
					'min'           => 300,
					'step'          => 50,
					'max'           => 50000,
					'display_value' => 'text',
				),
			),
		)
	);
endif;

// -> START JOB MANAGER
if ( class_exists( 'WP_Job_Manager' ) ) :
	Redux::setSection(
		$opt_name,
		array(
			'title'  => esc_html__( 'Job Manager', 'beehive' ),
			'id'     => 'job-manager',
			'desc'   => esc_html__( 'Additional job manager options by beehive theme', 'beehive' ),
			'icon'   => 'el el-briefcase',
			'fields' => array(
				array(
					'id'     => 'single-job-start',
					'type'   => 'section',
					'title'  => esc_html__( 'Job Single', 'beehive' ),
					'indent' => true, // Indent all options below until the next 'section' option is set.
				),
				array(
					'id'       => 'related-jobs',
					'type'     => 'switch',
					'title'    => esc_html__( 'Related Jobs', 'beehive' ),
					'subtitle' => esc_html__( 'Turn on to display related jobs.', 'beehive' ),
					'default'  => true,
					'on'       => esc_html__( 'On', 'beehive' ),
					'off'      => esc_html__( 'Off', 'beehive' ),
				),
				array(
					'id'     => 'single-job-end',
					'type'   => 'section',
					'indent' => false, // Indent all options below until the next 'section' option is set.
				),
				array(
					'id'     => 'submit-job-start',
					'type'   => 'section',
					'title'  => esc_html__( 'Job Submission', 'beehive' ),
					'indent' => true, // Indent all options below until the next 'section' option is set.
				),
				array(
					'id'       => 'salary-field',
					'type'     => 'switch',
					'title'    => esc_html__( 'Add salary field', 'beehive' ),
					'subtitle' => esc_html__( 'Turn on to add salary field in job submission page.', 'beehive' ),
					'default'  => true,
					'on'       => esc_html__( 'On', 'beehive' ),
					'off'      => esc_html__( 'Off', 'beehive' ),
				),
				array(
					'id'     => 'submit-job-end',
					'type'   => 'section',
					'indent' => false, // Indent all options below until the next 'section' option is set.
				),
			),
		)
	);
endif;

// -> START CLASSIFIED
if ( defined( 'ADVERTS_FILE' ) ) :
	Redux::setSection(
		$opt_name,
		array(
			'title'  => esc_html__( 'Classified', 'beehive' ),
			'id'     => 'classified',
			'desc'   => esc_html__( 'Additional wp adverts options by beehive theme', 'beehive' ),
			'icon'   => 'el el-laptop',
			'fields' => array(
				array(
					'id'       => 'adverts-bpprofile',
					'type'     => 'switch',
					'title'    => esc_html__( 'BP Profile Tab', 'beehive' ),
					'subtitle' => esc_html__( 'Create a buddypress profile tab for users to manage ads from their profile.', 'beehive' ),
					'desc'     => esc_html__( 'This option requires buddypress plugin to be active.', 'beehive' ),
					'default'  => false,
					'on'       => esc_html__( 'On', 'beehive' ),
					'off'      => esc_html__( 'Off', 'beehive' ),
				),
				array(
					'id'       => 'single-advert-start',
					'type'     => 'section',
					'title'    => esc_html__( 'Classified Single', 'beehive' ),
					'subtitle' => esc_html__( 'Control single classified options.', 'beehive' ),
					'indent'   => true, // Indent all options below until the next 'section' option is set.
				),
				array(
					'id'       => 'advert-tips',
					'type'     => 'multi_text',
					'title'    => esc_html__( 'Advert Tips', 'beehive' ),
					'subtitle' => esc_html__( 'Tips for the clients seeing an ad.', 'beehive' ),
					'default'  => array( esc_html__( 'Choose a save place to meet with the seller you are dealing with.', 'beehive' ), esc_html__( 'Read the ad carefully and beware of unrealistic offers.', 'beehive' ), esc_html__( 'Use a secure transaction. Try to avoid cash transactions.', 'beehive' ) ),
				),
				array(
					'id'       => 'related-adverts',
					'type'     => 'switch',
					'title'    => esc_html__( 'Related Adverts', 'beehive' ),
					'subtitle' => esc_html__( 'Turn on to display related ads.', 'beehive' ),
					'default'  => true,
					'on'       => esc_html__( 'On', 'beehive' ),
					'off'      => esc_html__( 'Off', 'beehive' ),
				),
				array(
					'id'     => 'single-advert-end',
					'type'   => 'section',
					'indent' => false, // Indent all options below until the next 'section' option is set.
				),
			),
		)
	);
endif;

if ( class_exists( 'LearnPress' ) ) :
	Redux::setSection(
		$opt_name,
		array(
			'title'  => esc_html__( 'Learnpress', 'beehive' ),
			'id'     => 'learnpress',
			'desc'   => esc_html__( 'Additional learnpress options by the beehive theme', 'beehive' ),
			'icon'   => 'el el-pencil-alt',
			'fields' => array(
				array(
					'id'       => 'related-courses',
					'type'     => 'switch',
					'title'    => esc_html__( 'Related Courses', 'beehive' ),
					'subtitle' => esc_html__( 'Turn on to display related courses.', 'beehive' ),
					'default'  => false,
					'on'       => esc_html__( 'On', 'beehive' ),
					'off'      => esc_html__( 'Off', 'beehive' ),
				),
			),
		)
	);
endif;

// -> Redirect & Restrict
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Redirect & Restrict', 'beehive' ),
		'id'     => 'redirect-restrict',
		'desc'   => esc_html__( 'Redirect and restrict users on various occations.', 'beehive' ),
		'icon'   => 'el el-eye-close',
		'fields' => array(
			array(
				'id'          => 'login-redirect',
				'type'        => 'select',
				'title'       => esc_html__( 'Redirect After the Login:', 'beehive' ),
				'subtitle'    => esc_html__( 'Select a page to redirect the user after login.', 'beehive' ),
				'description' => esc_html__( 'This option works on beehive ajax login form. Make sure you have it turned on in the General Settings section.', 'beehive' ),
				'options'     => beehive_redux_get_pages(),
			),
			array(
				'id'       => 'redirect-to-profile',
				'type'     => 'switch',
				'title'    => esc_html__( 'To Own Profile:', 'beehive' ),
				'subtitle' => esc_html__( 'Redirect the user to own profile after login.', 'beehive' ),
				'required' => array( 'login-redirect', '=', null ),
				'default'  => false,
				'on'       => esc_html__( 'Yes', 'beehive' ),
				'off'      => esc_html__( 'No', 'beehive' ),
			),
			array(
				'id'          => 'home-redirect',
				'type'        => 'select',
				'title'       => esc_html__( 'Home Redirect', 'beehive' ),
				'subtitle'    => esc_html__( 'Select a page to redirect the logged in user if he/she tries access the homepage.', 'beehive' ),
				'description' => esc_html__( 'Please note: administrator account will not be redirected.', 'beehive' ),
				'options'     => beehive_redux_get_pages(),
			),
			array(
				'id'          => 'logout-to-home',
				'type'        => 'switch',
				'title'       => esc_html__( 'Logout Redirect', 'beehive' ),
				'subtitle'    => esc_html__( 'Do you want the user to redirect to home after logout?', 'beehive' ),
				'description' => esc_html__( 'Please note: if you restrict site contents below, this option becomes redundant.', 'beehive' ),
				'default'     => true,
				'on'          => esc_html__( 'Yes', 'beehive' ),
				'off'         => esc_html__( 'No', 'beehive' ),
			),
			array(
				'id'       => 'restrict-start',
				'type'     => 'section',
				'title'    => esc_html__( 'Content Restriction', 'beehive' ),
				'subtitle' => esc_html__( 'Restrict guest users from accessing site contents.', 'beehive' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'          => 'guest-redirect-to',
				'type'        => 'select',
				'title'       => esc_html__( 'Restrict and Redirect to', 'beehive' ),
				'subtitle'    => esc_html__( 'This page will serve as the landing page for guest (logged out) users when they try to access the website.', 'beehive' ),
				'description' => esc_html__( 'Registration and activation pages will not be affected by this setting. Also, you may want your guests to access some pages like about us, FAQs etc. You can do so by turning off redirection in the page meta settings panel.', 'beehive' ),
				'options'     => beehive_redux_get_pages(),
			),
			array(
				'id'       => 'restrict-everything',
				'type'     => 'switch',
				'title'    => esc_html__( 'Restrict Everything', 'beehive' ),
				'subtitle' => esc_html__( 'Restrict everything or choose what to restrict?', 'beehive' ),
				'required' => array( 'guest-redirect-to', '!=', null ),
				'default'  => true,
				'on'       => esc_html__( 'Yes', 'beehive' ),
				'off'      => esc_html__( 'No', 'beehive' ),
			),
			array(
				'id'       => 'restrict-by-feature',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Okay, What to Restrict?', 'beehive' ),
				'subtitle' => esc_html__( 'Check the items that you want to restrict.', 'beehive' ),
				'required' => array( 'restrict-everything', '!=', '1' ),
				'options'  => array_merge(
					array(
						'blog' => esc_html__( 'Blog', 'beehive' ),
					),
					( function_exists( 'bp_is_active' ) ) ? array( 'bp' => esc_html__( 'Buddypress (activity, members and groups)', 'beehive' ) ) : array(),
					( function_exists( 'bp_is_active' ) && class_exists( 'RTMedia' ) ) ? array( 'rtm' => esc_html__( 'rtMedia (photos and videos)', 'beehive' ) ) : array(),
					( class_exists( 'bbPress' ) ) ? array( 'bbp' => esc_html__( 'bbPress (forums)', 'beehive' ) ) : array(),
					( class_exists( 'WooCommerce' ) ) ? array( 'wc' => esc_html__( 'WooCommerce (shop)', 'beehive' ) ) : array(),
					( defined( 'ADVERTS_FILE' ) ) ? array( 'wpad' => esc_html__( 'Wp Adverts (classifieds)', 'beehive' ) ) : array(),
					( class_exists( 'WP_Job_Manager' ) ) ? array( 'wpjm' => esc_html__( 'WP Job Manager (jobs)', 'beehive' ) ) : array(),
					( class_exists( 'LearnPress' ) ) ? array( 'lp' => esc_html__( 'LearnPress (courses)', 'beehive' ) ) : array()
				),
			),
			array(
				'id'     => 'restrict-end',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		),
	)
);

if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
	$section = array(
		'icon'   => 'el el-list-alt',
		'title'  => esc_html__( 'Documentation', 'beehive' ),
		'fields' => array(
			array(
				'id'           => '17',
				'type'         => 'raw',
				'markdown'     => true,
				'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please.
				// 'content' => 'Raw content here',.
			),
		),
	);
	Redux::setSection( $opt_name, $section );
}

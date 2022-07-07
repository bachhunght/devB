<?php

    /**
     * Theme Options Configuration File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "zozo_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get('Name') . ' ' . esc_html__('Options', 'aven'),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'aven' ),
        'page_title'           => esc_html__( 'Theme Options', 'aven' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyAsd03TE8ZfcIrp1Lsr-GDGOk6284M4itY',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => true,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        'disable_google_fonts_link' => false,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
		'forced_dev_mode_off'  => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 62,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'zozo_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        'footer_credit' 		=> '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
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
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'href'  => 'http://docs.zozothemes.com/aven/',
        'title' => esc_html__( 'Documentation', 'aven' ),
    );

    $args['admin_bar_links'][] = array(
        'href'  => 'https://zozothemes.ticksy.com/',
        'title' => esc_html__( 'Support', 'aven' ),
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Aven Theme sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'aven' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'aven' );
    }

    // Add content after the form.
    $args['footer_text'] = '';

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'aven' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'aven' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'aven' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'aven' )
        )
    );
    //Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'aven' );
    //Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START General Settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'General', 'aven' ),
        'id'     => 'general',
        'desc'   => '',
        'icon'   => 'el el-icon-dashboard',
        'fields' => array(
			array(
				'id'		=> 'zozo_disable_page_loader',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Page Loader', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_page_loader_img',
				'type' 		=> 'media',
				'url'		=> false,
				'readonly' 	=> false,
				'title' 	=> esc_html__('Custom Page Loader Image', 'aven'),
				'desc'     	=> esc_html__( "Upload the custom page loader image.", "aven" ),
				'required'  => array('zozo_disable_page_loader', 'equals', false),
			),
			array(
				'id'		=> 'zozo_enable_responsive',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Responsive Design', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_enable_rtl_mode',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable RTL Mode', 'aven'),						
				'subtitle'  => esc_html__( "Enable this mode for right-to-left language mode.", "aven" ),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_enable_breadcrumbs',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Breadcrumbs', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_disable_opengraph',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Open Graph Meta Tags', 'aven'),						
				'subtitle'  => esc_html__( "Disable open graph meta tags which is mainly used when sharing pages on social networking sites like Facebook.", "aven" ),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
        )
    ) );

    // Logo
    Redux::setSection( $opt_name, array(
        'title' 	 => esc_html__('Logo', 'aven'),
        'id'         => 'general-logo',
        'subsection' => true,
        'fields'     => array(
            array(
				'id'		=> 'zozo_logo',
				'type' 		=> 'media',
				'url'		=> false,
				'readonly' 	=> false,
				'title' 	=> esc_html__('Logo', 'aven'),
				'desc'     	=> esc_html__( "Upload your website logo.", "aven" ),
				'default' 	=> array(
					'url' 		=> ZOZOTHEME_URL . '/images/logo.png',
					'width' 	=> '93',
					'height' 	=> '26'
				)
			),
			array(
				'id'		=> 'zozo_retina_logo',
				'type' 		=> 'media',
				'url'		=> false,
				'readonly' 	=> false,
				'title' 	=> esc_html__('Retina Logo', 'aven'),
				'desc'     	=> esc_html__( "Upload the retina version of your logo.", "aven" ),
			),
			array(
				'id'		=> 'zozo_logo_maxheight',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Logo Max Height', 'aven'),
				'subtitle'  => esc_html__('This must be numeric (no px).', 'aven'),
				'desc' 		=> esc_html__('You can set a max height for the logo here, and this will resize it on the front end if your logo image is bigger.', 'aven'),
				'validate'  => 'numeric',
				'default'   => '100',
			),
			array(
				'id'       			=> 'zozo_logo_padding',
				'type'     			=> 'spacing',
				'mode'     			=> 'padding',
				'right'         	=> false,
				'left'          	=> false,
				'units'         	=> array( 'px' ),
				'units_extended'	=> 'false',
				'title'    			=> esc_html__( 'Logo Padding', 'aven' ),
				'subtitle' 			=> esc_html__( 'Choose the spacing for logo.', 'aven' ),
			),
			array(
				'id'			=> 'zozo_sticky_logo',
				'type' 			=> 'media',
				'url'			=> false,
				'readonly' 		=> false,
				'title' 		=> esc_html__('Sticky Header Logo', 'aven'),
				'desc'     		=> esc_html__( "Upload your sticky header logo.", "aven" ),
				'default' 		=> array(
					'url' 		=> ZOZOTHEME_URL . '/images/sticky-logo.png',
					'width' 	=> '93',
					'height' 	=> '26'
				)
			),
			array(
				'id'       			=> 'zozo_sticky_logo_padding',
				'type'     			=> 'spacing',
				'mode'     			=> 'padding',
				'right'         	=> false,
				'left'          	=> false,
				'units'         	=> array( 'px' ),
				'units_extended'	=> 'false',
				'title'    			=> esc_html__( 'Sticky Logo Padding', 'aven' ),
				'subtitle' 			=> esc_html__( 'Choose the spacing for sticky logo.', 'aven' ),
			),
        )
    ) );
	
	// Icons
	if ( ! function_exists( 'wp_site_icon' ) ) {
			
	} else {
		Redux::setSection( $opt_name, array(
			'title' 	 => esc_html__('Icons', 'aven'),
			'id'         => 'general-icons',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'		=> 'icons_info',
					'type' 		=> 'info',
					'title' 	=> esc_html__('Please use "Site Icon" feature for adding favicon and other apple icons in "Appearance > Customize > Site Identity > Site Icon"', 'aven'),
					'notice' 	=> false
				),
			)
		) );
	}
	
	// Mailchimp
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('API Keys', 'aven'),
		'id'         => 'general-apikeys',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_google_map_api',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Google Map API Key', 'aven'),
				'desc' 		=> wp_kses( __( 'Enter your Google Map API key to use google map with your site. Please follow this <a href="https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key" target="_blank">link</a> to get API key.', 'aven' ), aven_zozo_expanded_allowed_tags() ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_mailchimp_api',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Mailchimp API Key', 'aven'),
				'desc' 		=> esc_html__('Enter your Mailchimp API key to get subscribers for your lists.', 'aven'),
				'default' 	=> ""
			),
		)
	) );
	
	// Custom CSS
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Custom CSS', 'aven'),
		'id'         => 'general-customcss',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_custom_css',
				'type' 		=> 'ace_editor',
				'title' 	=> esc_html__('Custom CSS Code', 'aven'),
				'subtitle' 	=> esc_html__('Paste your CSS code here.', 'aven'),
				'mode' 		=> 'css',
				'theme' 	=> 'monokai',
				'default' 	=> ""
			),
		)
	) );
	
	// Maintenance Settings
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Maintenance', 'aven' ),
        'id'     => 'maintenance',
        'desc'   => '',
        'icon'   => 'el el-icon-eye-close',
		'fields' => array(
			array(
				'id'		=> 'zozo_enable_maintenance',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable Maintenance Mode', 'aven'),
				'subtitle' 	=> esc_html__('Enable the themes maintenance mode.', 'aven'),
				'options'  	=> array(
					'0' 	=> esc_html__('Off', 'aven'),
					'1' 	=> esc_html__('On ( Standard )', 'aven'),
					'2' 	=> esc_html__('On ( Custom Page )', 'aven'),
				),
				'default'  => '0'
			),
			array(
				'id'		=> 'zozo_maintenance_mode_page',
				'type' 		=> 'select',
				'data' 		=> 'pages',
				'title' 	=> esc_html__('Custom Maintenance Mode Page', 'aven'),
				'subtitle' 	=> esc_html__('Select the page that is your maintenance page, if you would like to show a custom page instead of the standard page from theme. You should use the Maintenance Page template for this page.', 'aven'),
				'required'  => array('zozo_enable_maintenance', '=', '2'),
				'default' 	=> '',
				'args' 		=> array()
			),
			array(
				'id'		=> 'zozo_enable_coming_soon',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable Coming Soon Mode', 'aven'),
				'subtitle' 	=> esc_html__('Enable the themes coming soon mode.', 'aven'),
				'options'  	=> array(
					'0' 	=> esc_html__('Off', 'aven'),
					'1' 	=> esc_html__('On ( Standard )', 'aven'),
					'2' 	=> esc_html__('On ( Custom Page )', 'aven'),
				),
				'default'  => '0'
			),
			array(
				'id'		=> 'zozo_coming_soon_page',
				'type' 		=> 'select',
				'data' 		=> 'pages',
				'title' 	=> esc_html__('Custom Coming Soon Page', 'aven'),
				'subtitle' 	=> esc_html__('Select the page that is your coming soon page, if you would like to show a custom page instead of the standard page from theme. You should use the Maintenance Page template for this page.', 'aven'),
				'required'  => array('zozo_enable_coming_soon', '=', '2'),
				'default' 	=> '',
				'args' 		=> array()
			),
		)
	) );
	
	// Layout Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Layout', 'aven' ),
        'id'     => 'layout',
        'desc'   => '',
        'icon'   => 'el el-icon-view-mode',
		'fields' => array(
			array(
				'id'		=> 'zozo_theme_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Theme Layout', 'aven'),
				'options' 	=> array(
					'fullwidth' => array('alt' => esc_html__('Full Width', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/full-width.jpg'),
					'boxed' 	=> array('alt' => esc_html__('Boxed', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/boxed.jpg'),
					'wide' 		=> array('alt' => esc_html__('Wide', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/wide.jpg'),
				),
				'default' 	=> 'fullwidth'
			),
			array(
				'id'		=> 'zozo_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Page Layout', 'aven'),
				'options' 	=> array(
					'one-col' 			=> array('alt' => esc_html__('Full width', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/one-col.png'),
					'two-col-right' 	=> array('alt' => esc_html__('Right Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/two-col-right.png'),
					'two-col-left' 		=> array('alt' => esc_html__('Left Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/two-col-left.png'),
					'three-col-middle' 	=> array('alt' => esc_html__('Left and Right Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-middle.png'),
					'three-col-right' 	=> array('alt' => esc_html__('Two Right Sidebars', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-right.png'),
					'three-col-left' 	=> array('alt' => esc_html__('Two Left Sidebars', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-left.png'),
				),
				'default' 	=> 'one-col'
			),
			array(
				'id'            => 'zozo_fullwidth_site_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Container Max Width', 'aven' ),
				'subtitle'      => esc_html__( 'Please choose container maximum width for fullwidth layout', 'aven' ),
				'default'       => 1200,
				'min'           => 1100,
				'step'          => 5,
				'max'           => 1600,
				'required' 		=> array('zozo_theme_layout', 'equals', 'fullwidth'),
				'display_value' => 'text'
			),
			array(
				'id'            => 'zozo_boxed_site_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Container Max Width', 'aven' ),
				'subtitle'      => esc_html__( 'Please choose container maximum width for boxed layout', 'aven' ),
				'default'       => 1200,
				'min'           => 1100,
				'step'          => 5,
				'max'           => 1600,
				'required' 		=> array('zozo_theme_layout', 'equals', 'boxed'),
				'display_value' => 'text'
			),
		)
	) );
	
	// Header Settings
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Header', 'aven' ),
        'id'     => 'header',
        'desc'   => '',
        'icon'   => 'el el-icon-website',
		'fields' => array(
			array(
				'id'		=> 'zozo_header_layout',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Header Layout', 'aven'),
				'options'  	=> array(
					'fullwidth'	=> esc_html__( 'Full Width', 'aven' ),
					'wide'		=> esc_html__( 'Wide', 'aven' ),
					'boxed'		=> esc_html__( 'Boxed', 'aven' ),
				),
				'default' 	=> 'fullwidth'
			),
			array(
				'id'		=> 'zozo_enable_header_top_bar',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Header Top Bar', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_sticky_header',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Sticky Header', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'       => 'enable_sticky_header_hide',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sticky header show/hide', 'aven' ),
				'subtitle' => esc_html__( 'Enable the sticky header to hide once scrolled 800px down the page, and show on scroll up.', 'aven' ),
				'desc'     => '',
				'options'  => array( '1' => 'On', '0' => 'Off' ),
				'required' => array('zozo_sticky_header', 'equals', true),
				'default'  => '0'
			),
		)
	) );
	
	// Header Type
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Header Type', 'aven'),
		'id'         => 'header-headertype',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_header_skin',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Header Skin', 'aven'),
				'options'  	=> array(
					'light'		=> esc_html__( 'Light', 'aven' ),
					'dark'		=> esc_html__( 'Dark', 'aven' ),
				),
				'default' 	=> 'light'
			),
			array(
				'id'		=> 'zozo_header_transparency',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Header Transparency', 'aven'),
				'options'  	=> array(
					'no-transparent'	=> esc_html__( 'No Transparency', 'aven' ),
					'transparent'		=> esc_html__( 'Transparent', 'aven' ),
					'semi-transparent'	=> esc_html__( 'Semi Transparent', 'aven' ),
				),
				'default' 	=> 'no-transparent'
			),
			array(
				'id'		=> 'zozo_header_menu_skin',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Header Menu Skin', 'aven'),
				'options'  	=> array(
					'default'			=> esc_html__( 'Default', 'aven' ),
					'light'				=> esc_html__( 'Light', 'aven' ),
					'dark'				=> esc_html__( 'Dark', 'aven' ),
					'semi-transparent'	=> esc_html__( 'Semi Transparent', 'aven' ),
				),
				'default' 	=> 'default'
			),
			array(
				'id'		=> 'zozo_header_search_type',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Header Search Type', 'aven'),
				'subtitle' 	=> esc_html__('Choose search style mode in header.', 'aven'),
				'options'  	=> array(
					'0' 	=> esc_html__('Standard', 'aven'),
					'1' 	=> esc_html__('Toggle', 'aven'),
					'2' 	=> esc_html__('Fullscreen', 'aven'),
				),
				'default'  => '0'
			),
			array(
				'id'		=> 'zozo_search_placeholder',
				'type'     	=> 'text',
				'title' 	=> __('Search Placeholder', 'advisor'),
				'desc' 		=> __('Enter placeholder text for search box', 'advisor'),
				'default' 	=> __('Search..', 'advisor')
			),
			array(
				'id'		=> 'zozo_header_type',
				'type' 		=> 'image_select',
				'full_width'=> true,
				'title' 	=> esc_html__('Header Type', 'aven'),
				'options' 	=> array(
					'header-1' 			=> array('alt' => esc_html__('Default Header', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/headers/header-01.jpg'),
					'header-2' 			=> array('alt' => esc_html__('Header Right Logo', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/headers/header-02.jpg'),
					'header-3' 			=> array('alt' => esc_html__('Header Center Logo', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/headers/header-03.jpg'),
					'header-4' 			=> array('alt' => esc_html__('Header Fullwidth Menu', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/headers/header-04.jpg'),
					'header-5' 			=> array('alt' => esc_html__('Header Fullwidth Menu 2', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/headers/header-05.jpg'),
					'header-6' 			=> array('alt' => esc_html__('Header Fullwidth Menu 3', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/headers/header-06.jpg'),							
					'header-7' 			=> array('alt' => esc_html__('Header Centered Logo', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/headers/header-07.jpg'),
					'header-8' 			=> array('alt' => esc_html__('Header Centered Logo 2', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/headers/header-08.jpg'),
					'header-11' 		=> array('alt' => esc_html__('Header 11', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/headers/header-11.jpg'),
					'header-12' 		=> array('alt' => esc_html__('Header 12', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/headers/header-12.jpg'),
					'header-justify' 	=> array('alt' => esc_html__('Header Justify', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/headers/header-13.jpg'),
					'header-9' 			=> array('alt' => esc_html__('Toggle Header', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/headers/header-09.jpg'),
					'header-10' 		=> array('alt' => esc_html__('Vertical Header', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/headers/header-10.jpg'),
				),
				'default' 	=> 'header-1'
			),
			// Header 1
			array(
				'id'       => 'zozo_header_1_elements_config',
				'type'     => 'sorter',
				'title'    => 'Header Elements Config',
				'subtitle' => esc_html__( 'Choose the elements for the header area for Header 1. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-1' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
					),
					'disabled' => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_1_elements_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-1' )),
				'default' 	=> esc_html__('Header Text', 'aven'),
			),
			// Header 2
			array(
				'id'       => 'zozo_header_2_elements_config',
				'type'     => 'sorter',
				'title'    => 'Header Elements Config',
				'subtitle' => esc_html__( 'Choose the elements for the header area for Header 2. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-2' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
					),
					'disabled' => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_2_elements_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-2' )),
				'default' 	=> esc_html__('Header Text', 'aven'),
			),
			// Header 3
			array(
				'id'       => 'zozo_header_3_elements_config',
				'type'     => 'sorter',
				'title'    => 'Header Elements Config',
				'subtitle' => esc_html__( 'Choose the elements for the header area for Header 3. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-3' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
					),
					'disabled' => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_3_elements_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-3' )),
				'default' 	=> esc_html__('Header Text', 'aven'),
			),
			// Header 4
			array(
				'id'       => 'zozo_header_4_logo_bar_config',
				'type'     => 'sorter',
				'title'    => 'Header Logo Bar Right Config',
				'subtitle' => esc_html__( 'Choose the elements for the header logo bar right area for Header 4. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-4' )),
				'options'  => array(
					'enabled'  => array(
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
					),
					'disabled' => array(
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_4_logo_bar_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Logo Bar Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Logo Bar Header when you have the config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-4' )),
				'default' 	=> esc_html__('Header Logo Bar Text', 'aven'),
			),
			array(
				'id'       => 'zozo_header_4_left_config',
				'type'     => 'sorter',
				'title'    => 'Header Left Config',
				'subtitle' => esc_html__( 'Choose the elements for the header left area for Header 4. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-4' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
					),
					'disabled' => array(
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_4_left_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Left Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the left config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-4' )),
				'default' 	=> esc_html__('Header Left Text', 'aven'),
			),
			array(
				'id'       => 'zozo_header_4_right_config',
				'type'     => 'sorter',
				'title'    => 'Header Right Config',
				'subtitle' => esc_html__( 'Choose the elements for the header right area for Header 4. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-4' )),
				'options'  => array(
					'enabled'  => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
					),
					'disabled' => array(
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_4_right_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Right Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the right config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-4' )),
				'default' 	=> esc_html__('Header Right Text', 'aven'),
			),
			// Header 5
			array(
				'id'       => 'zozo_header_5_left_config',
				'type'     => 'sorter',
				'title'    => 'Header Left Config',
				'subtitle' => esc_html__( 'Choose the elements for the header left area for Header 5. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-5' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
					),
					'disabled' => array(
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_5_left_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Left Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the left config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-5' )),
				'default' 	=> esc_html__('Header Left Text', 'aven'),
			),
			array(
				'id'       => 'zozo_header_5_right_config',
				'type'     => 'sorter',
				'title'    => 'Header Right Config',
				'subtitle' => esc_html__( 'Choose the elements for the header right area for Header 5. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-5' )),
				'options'  => array(
					'enabled'  => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
					),
					'disabled' => array(
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_5_right_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Right Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the right config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-5' )),
				'default' 	=> esc_html__('Header Right Text', 'aven'),
			),
			// Header 6
			array(
				'id'       => 'zozo_header_6_logo_bar_config',
				'type'     => 'sorter',
				'title'    => 'Header Logo Bar Right Config',
				'subtitle' => esc_html__( 'Choose the elements for the header logo bar right area for Header 6. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-6' )),
				'options'  => array(
					'enabled'  => array(
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
					),
					'disabled' => array(
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_6_logo_bar_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Logo Bar Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Logo Bar Header when you have the config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-6' )),
				'default' 	=> esc_html__('Header Logo Bar Text', 'aven'),
			),
			array(
				'id'       => 'zozo_header_6_left_config',
				'type'     => 'sorter',
				'title'    => 'Header Left Config',
				'subtitle' => esc_html__( 'Choose the elements for the header left area for Header 6. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-6' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
					),
					'disabled' => array(
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_6_left_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Left Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the left config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-6' )),
				'default' 	=> esc_html__('Header Left Text', 'aven'),
			),
			array(
				'id'       => 'zozo_header_6_right_config',
				'type'     => 'sorter',
				'title'    => 'Header Right Config',
				'subtitle' => esc_html__( 'Choose the elements for the header right area for Header 6. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-6' )),
				'options'  => array(
					'enabled'  => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
					),
					'disabled' => array(
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_6_right_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Right Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the right config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-6' )),
				'default' 	=> esc_html__('Header Right Text', 'aven'),
			),
			// Header 8
			array(
				'id'       => 'zozo_header_right_alt_config',
				'type'     => 'sorter',
				'title'    => 'Header Right Config',
				'subtitle' => esc_html__( 'Choose the elements for the header right area if you are using Header 8. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-8' )),
				'options'  => array(
					'enabled'  => array(
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
					),
					'disabled' => array(
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_right_alt_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Right Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the right config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-8' )),
				'default' 	=> esc_html__('Header Right Text', 'aven'),
			),
			// Header 9
			array(
				'id'       => 'zozo_header_9_elements_config',
				'type'     => 'sorter',
				'title'    => 'Header Elements Config',
				'subtitle' => esc_html__( 'Choose the elements for the header area for Header 9. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-9' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
					),
					'disabled' => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_9_elements_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-9' )),
				'default' 	=> esc_html__('Header Text', 'aven'),
			),
			// Header 10
			array(
				'id'       => 'zozo_header_10_elements_config',
				'type'     => 'sorter',
				'title'    => 'Header Elements Config',
				'subtitle' => esc_html__( 'Choose the elements for the header area for Header 10. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-10' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
					),
					'disabled' => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_10_elements_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-10' )),
				'default' 	=> esc_html__('Header Text', 'aven'),
			),
			// Header 11
			array(
				'id'       => 'zozo_header_11_logo_bar_config',
				'type'     => 'sorter',
				'title'    => 'Header Logo Bar Right Config',
				'subtitle' => esc_html__( 'Choose the elements for the header logo bar right area for Header 11. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-11' )),
				'options'  => array(
					'enabled'  => array(
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
					),
					'disabled' => array(
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_11_logo_bar_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Logo Bar Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Logo Bar Header when you have the config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-11' )),
				'default' 	=> esc_html__('Header Logo Bar Text', 'aven'),
			),
			array(
				'id'       => 'zozo_header_11_left_config',
				'type'     => 'sorter',
				'title'    => 'Header Left Config',
				'subtitle' => esc_html__( 'Choose the elements for the header left area for Header 11. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-11' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
					),
					'disabled' => array(
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_11_left_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Left Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the left config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-11' )),
				'default' 	=> esc_html__('Header Left Text', 'aven'),
			),
			array(
				'id'       => 'zozo_header_11_right_config',
				'type'     => 'sorter',
				'title'    => 'Header Right Config',
				'subtitle' => esc_html__( 'Choose the elements for the header right area for Header 11. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-11' )),
				'options'  => array(
					'enabled'  => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
					),
					'disabled' => array(
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_11_right_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Right Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the right config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-11' )),
				'default' 	=> esc_html__('Header Right Text', 'aven'),
			),
			// Header 12
			array(
				'id'       => 'zozo_header_12_elements_config',
				'type'     => 'sorter',
				'title'    => 'Header Elements Config',
				'subtitle' => esc_html__( 'Choose the elements for the header area for Header 12. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-12' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
					),
					'disabled' => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_12_elements_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-12' )),
				'default' 	=> esc_html__('Header Text', 'aven'),
			),
			// Header Justify
			array(
				'id'       => 'zozo_header_justify_left_config',
				'type'     => 'sorter',
				'title'    => 'Header Left Config',
				'subtitle' => esc_html__( 'Choose the elements for the header left area for Header Justify. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-justify' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
					),
					'disabled' => array(
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_justify_left_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Left Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the left config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-justify' )),
				'default' 	=> esc_html__('Header Left Text', 'aven'),
			),
			array(
				'id'       => 'zozo_header_justify_right_config',
				'type'     => 'sorter',
				'title'    => 'Header Right Config',
				'subtitle' => esc_html__( 'Choose the elements for the header right area for Header Justify. You can drag the items between enabled/disabled and also order them as you like.', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-justify' )),
				'options'  => array(
					'enabled'  => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
					),
					'disabled' => array(
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'primary-menu'		=> esc_html__( 'Primary Menu', 'aven' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_justify_right_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Right Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the right config above set to Text/Shortcode', 'aven' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-justify' )),
				'default' 	=> esc_html__('Header Right Text', 'aven'),
			),
			array(
				'id'		=> 'zozo_slider_position',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Slider Position', 'aven'),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-1','header-2','header-3','header-4','header-5','header-6','header-7','header-8' )),
				'options'  	=> array(
					'below'		=> esc_html__( 'Below Header', 'aven' ),
					'above'		=> esc_html__( 'Above Header', 'aven' ),
				),
				'default' 	=> 'below'
			),
			array(
				'id'		=> 'zozo_header_toggle_type',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Menu Type', 'aven'),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-9' )),
				'options'  	=> array(
					'toggle'	=> esc_html__( 'Toggle Menu', 'aven' ),
					'overlay'	=> esc_html__( 'Overlay Menu', 'aven' ),
				),
				'default' 	=> 'toggle'
			),
			array(
				'id'		=> 'zozo_header_toggle_position',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Header Position', 'aven'),
				'required' 	=> array('zozo_header_toggle_type', 'equals', array( 'toggle' )),
				'options'  	=> array(
					'left'		=> esc_html__( 'Left', 'aven' ),
					'right'		=> esc_html__( 'Right', 'aven' ),
				),
				'default' 	=> 'left'
			),
			array(
				'id'		=> 'zozo_header_vertical_position',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Header Position', 'aven'),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-10' )),
				'options'  	=> array(
					'left'		=> esc_html__( 'Left', 'aven' ),
					'right'		=> esc_html__( 'Right', 'aven' ),
				),
				'default' 	=> 'left'
			),
			array(
				'id'		=> 'zozo_header_side_width',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Width For Left/Right Position', 'aven'),
				'desc' 		=> esc_html__('Enter width for the left or right side header. In pixels, ex: 280px.', 'aven'),
				'required' 	=> array('zozo_header_type', 'equals', 'header-10'),
				'default' 	=> "280px"
			),
		)
	) );
	
	// Header Top Bar
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Header Top Bar', 'aven'),
		'id'         => 'header-headertopbar',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'zozo_header_top_bar_left',
				'type'     => 'sorter',
				'title'    => 'Header Top Bar Left Config',
				'subtitle' => esc_html__( 'Choose the config for the header top bar left area', 'aven' ),
				'required' => array('zozo_enable_header_top_bar', 'equals', true),
				'options'  => array(
					'enabled'  => array(
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
					),
					'disabled' => array(
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'top-menu'			=> esc_html__( 'Top Menu', 'aven' ),
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'welcome-msg'		=> esc_html__( 'Welcome Message', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_top_bar_left_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Top Bar Left Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Top Bar when you have the left config above set to Text/Shortcode', 'aven' ),
				'default' 	=> esc_html__('Top Bar Left Text', 'aven'),
			),
			array(
				'id'       => 'zozo_header_top_bar_right',
				'type'     => 'sorter',
				'title'    => 'Header Top Bar Right Config',
				'subtitle' => esc_html__( 'Choose the config for the header top bar right area', 'aven' ),
				'required' => array('zozo_enable_header_top_bar', 'equals', true),
				'options'  => array(
					'enabled'  => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'aven' ),
					),
					'disabled' => array(
						'contact-info'		=> esc_html__( 'Contact Info', 'aven' ),
						'search-icon'		=> esc_html__( 'Search', 'aven' ),
						'cart-icon'			=> esc_html__( 'Cart', 'aven' ),
						'top-menu'			=> esc_html__( 'Top Menu', 'aven' ),
						'secondary-menu'	=> esc_html__( 'Secondary Menu', 'aven' ),
						'welcome-msg'		=> esc_html__( 'Welcome Message', 'aven' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'aven' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_top_bar_right_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Top Bar Right Text', 'aven'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Top Bar when you have the right config above set to Text/Shortcode', 'aven' ),
				'default' 	=> esc_html__('Top Bar Right Text', 'aven'),
			),
			array(
				'id'		=> 'zozo_welcome_msg',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Welcome Message', 'aven'),
				'desc' 		=> '',
				'default' 	=> esc_html__("Welcome to Aven", "aven"),
			),
			array(
				'id'		=> 'zozo_header_phone',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Phone Number', 'aven'),
				'desc' 		=> esc_html__('Phone number will display in the contact info section.', 'aven'),
				'default' 	=> "+12 123 456 789"
			),
			array(
				'id'		=> 'zozo_header_email',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Email Address', 'aven'),
				'desc' 		=> esc_html__('Email address will display in the contact info section.', 'aven'),
				'default' 	=> "info@yoursite.com"
			),
			array(
				'id'       => 'zozo_header_address',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Address', 'aven' ),
				'default'  => '<strong>No. 12, Ribon Building, </strong><span>Walse street, Australia.</span>'
			),
			array(
				'id'       => 'zozo_header_business_hours',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Business Hours', 'aven' ),
				'default'  => '<strong>Monday-Friday: 9am to 5pm </strong><span>Saturday / Sunday: Closed</span>'
			),
		)
	) );
	
	// Header Sliding Bar
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Sliding Bar', 'aven'),
		'id'         => 'header-slidingbar',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_enable_sliding_bar',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Sliding Bar', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_disable_sliding_bar',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Sliding Bar on Mobile', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'       	=> 'zozo_sliding_bar_columns',
				'type'     	=> 'select',
				'title'    	=> esc_html__( 'Sliding Bar Columns', 'aven' ),
				'subtitle' 	=> esc_html__( 'Select the number of columns to display in the Sliding Bar.', 'aven' ),
				'options'  	=> array(
					'1'		=> '1',
					'2'		=> '2',
					'3'		=> '3',
					'4'		=> '4',
				),
				'default'  	=> '3'
			),
		)
	) );
	
	// Header Styling Options
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Styling', 'aven'),
		'id'         => 'header-styling',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       			=> 'zozo_header_spacing',
				'type'     			=> 'spacing',
				'mode'     			=> 'padding',
				'units'         	=> array( 'em', 'px', '%' ),
				'units_extended'	=> 'true',
				'title'    			=> esc_html__( 'Header Padding', 'aven' ),
				'subtitle' 			=> esc_html__( 'Choose the spacing for header.', 'aven' ),
			),
		)
	) );
	
	// Header Menu Options
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Main Menu', 'aven'),
		'id'         => 'header-mainmenu',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       	=> 'zozo_menu_type',
				'type'     	=> 'select',
				'title'    	=> esc_html__( 'Menu Type', 'aven' ),
				'subtitle' 	=> esc_html__( 'Please select menu type.', 'aven' ),
				'options'  	=> array(
					'standard'		=> esc_html__( 'Standard Menu', 'aven' ),
					'megamenu'		=> esc_html__( 'Mega Menu', 'aven' ),
				),
				'default'  	=> 'megamenu'
			),
			array(
				'id'		=> 'zozo_menu_separator',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Menu Separator', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'       	=> 'zozo_dropdown_menu_skin',
				'type'     	=> 'select',
				'title'    	=> esc_html__( 'Dropdown Menu Skin', 'aven' ),
				'subtitle' 	=> esc_html__( 'Please select dropdown menu skin type.', 'aven' ),
				'options'  	=> array(
					'light'		=> esc_html__( 'Light', 'aven' ),
					'dark'		=> esc_html__( 'Dark', 'aven' ),
				),
				'default'  	=> 'light'
			),
			array(
				'id'             => 'zozo_dropdown_menu_width',
				'type'           => 'dimensions',
				'units'          => array( 'em', 'px', '%' ),
				'units_extended' => 'true',
				'title'          => esc_html__( 'Dropdown Menu Width ( Only Standard Mode )', 'aven' ),
				'subtitle'       => esc_html__( 'Enter dropdown menu width for standard mode.', 'aven' ),
				'height'         => false,
				'default'        => array(
					'width'  => 200,
					'units'  => 'px',
				)
			),
			array(
				'id'             => 'zozo_menu_height',
				'type'           => 'dimensions',
				'units'          => 'px',
				'units_extended' => 'false',
				'title'          => esc_html__( 'Main Menu Height', 'aven' ),
				'subtitle'       => esc_html__( 'Enter main menu height.', 'aven' ),
				'width'         => false,
				'default'        => array(
					'height'  => 100,
					'units'   => 'px',
				)
			),
			array(
				'id'             => 'zozo_sticky_menu_height',
				'type'           => 'dimensions',
				'units'          => 'px',
				'units_extended' => 'false',
				'title'          => esc_html__( 'Sticky Main Menu Height', 'aven' ),
				'subtitle'       => esc_html__( 'Enter main menu height in sticky.', 'aven' ),
				'width'         => false,
				'default'        => array(
					'height'  => 60,
					'units'   => 'px',
				)
			),
			array(
				'id'		=> 'menu_height',
				'type' 		=> 'info',
				'title' 	=> esc_html__('If Header Type 4, 5, 6, 11', 'aven'),
				'notice' 	=> false
			),
			array(
				'id'             => 'zozo_logo_bar_height',
				'type'           => 'dimensions',
				'units'          => 'px',
				'units_extended' => 'false',
				'title'          => esc_html__( 'Logo Bar Height', 'aven' ),
				'subtitle'       => esc_html__( 'Enter logo bar height.', 'aven' ),
				'width'         => false,
				'default'        => array(
					'height'  => 76,
					'units'   => 'px',
				)
			),
			array(
				'id'             => 'zozo_menu_height_alt',
				'type'           => 'dimensions',
				'units'          => 'px',
				'units_extended' => 'false',
				'title'          => esc_html__( 'Main Menu Height', 'aven' ),
				'subtitle'       => esc_html__( 'Enter main menu height.', 'aven' ),
				'width'         => false,
				'default'        => array(
					'height'  => 60,
					'units'   => 'px',
				)
			),
			array(
				'id'             => 'zozo_sticky_menu_height_alt',
				'type'           => 'dimensions',
				'units'          => 'px',
				'units_extended' => 'false',
				'title'          => esc_html__( 'Sticky Main Menu Height', 'aven' ),
				'subtitle'       => esc_html__( 'Enter main menu height in sticky.', 'aven' ),
				'width'         => false,
				'default'        => array(
					'height'  => 60,
					'units'   => 'px',
				)
			),
		)
	) );
	
	// Header Secondary Menu Options
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Secondary Menu', 'aven'),
		'id'         => 'header-secondarymenu',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_enable_secondary_menu',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Secondary Menu', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'       	=> 'zozo_secondary_menu_position',
				'type'     	=> 'select',
				'title'    	=> esc_html__( 'Secondary Menu Position', 'aven' ),
				'subtitle' 	=> esc_html__( 'Choose secondary menu position.', 'aven' ),
				'required' 	=> array('zozo_enable_secondary_menu', 'equals', true),
				'options'  	=> array(
					'left'		=> esc_html__( 'Left', 'aven' ),
					'right'		=> esc_html__( 'Right', 'aven' ),
				),
				'default'  	=> 'right'
			),
		)
	) );
	
	// Mobile Header Settings
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Mobile Header', 'aven' ),
        'id'     => 'mobile-header',
        'desc'   => '',
        'icon'   => 'el el-icon-iphone-home',
		'fields' => array(
			array(
				'id'		=> 'mobile_logo',
				'type' 		=> 'media',
				'url'		=> false,
				'readonly' 	=> false,
				'title' 	=> esc_html__('Mobile Logo', 'aven'),
				'desc'     	=> esc_html__( "Upload an image or insert an image url to use for the mobile logo.", "aven" ),
				'default' 	=> array(
					'url' 		=> '',
					'width' 	=> '',
					'height' 	=> ''
				)
			),
			array(
				'id' 		=> 'mobile_header_visible',
				'type' 		=> 'select',
				'title' 	=> esc_html__('Mobile Header Visiblity', 'aven'),
				'subtitle' 	=> esc_html__('Select at what screen size the main header is replaced by the mobile header.', 'aven'),
				'options' 	=> array(
					'tablet-land'	=> 'Tablet (Landscape)',
					'tablet-port'	=> 'Tablet (Portrait)',
					'mobile'  		=> 'Mobile',
				),
				'default' 	=> 'tablet-land'
			),
			array(
				'id'		=> 'sticky_mobile_header',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Mobile Sticky Header', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'       	=> 'mobile_header_layout',
				'type'     	=> 'select',
				'title'    	=> esc_html__( 'Mobile Header Layout', 'aven' ),
				'subtitle' 	=> esc_html__( 'Choose the config for the layout of the mobile header.', 'aven' ),
				'options'  	=> array(
					'left-logo'			=> esc_html__( 'Left Logo', 'aven' ),
					'right-logo'		=> esc_html__( 'Right Logo', 'aven' ),
					'center-logo'  		=> esc_html__( 'Center Logo (Menu Left, Cart Right)', 'aven' ),
					'center-logo-alt'  	=> esc_html__( 'Center Logo (Cart Left, Menu Right)', 'aven' ),
				),
				'default'  	=> 'left-logo'
			),
			array(
				'id'		=> 'mobile_top_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Mobile Top Bar Text', 'aven'),
				'subtitle' 	=> esc_html__( 'You can use any shortcodes or text to show above mobile header', 'aven' ),
				'desc' 		=> esc_html__( 'Leave blank to hide.', 'aven' ),
				'default' 	=> '',
			),
			array(
				'id'		=> 'mobile_show_search',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable search box', 'aven'),
				'subtitle' 	=> esc_html__('Check this to show the search box in the mobile header.', 'aven'),
				'options'  	=> array(
					'1' 	=> esc_html__('On', 'aven'),
					'0' 	=> esc_html__('Off', 'aven'),
				),
				'default'  => '0'
			),
			array(
				'id'		=> 'mobile_show_translation',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable translation options', 'aven'),
				'subtitle' 	=> esc_html__('Check this to show the translation options in the mobile header. NOTE: WPML plugin is required for this.', 'aven'),
				'options'  	=> array(
					'1' 	=> esc_html__('On', 'aven'),
					'0' 	=> esc_html__('Off', 'aven'),
				),
				'default'  => '0'
			),
			array(
				'id'		=> 'mobile_show_cart',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable cart icon', 'aven'),
				'subtitle' 	=> esc_html__('Check this to show the cart icon in the mobile header.', 'aven'),
				'options'  	=> array(
					'1' 	=> esc_html__('On', 'aven'),
					'0' 	=> esc_html__('Off', 'aven'),
				),
				'default'  => '0'
			),
		)
	) );
	
	// Footer Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer', 'aven' ),
        'id'     => 'footer',
        'desc'   => '',
        'icon'   => 'el el-icon-website',
		'fields' => array(
			array(
				'id'		=> 'zozo_copyright_bar_enable',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Copyright Bar', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'       => 'zozo_copyright_text',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Copyright Text', 'aven' ),
				'desc'     => esc_html__( 'Enter an copyright text to show on footer. Use [year] shortcode to display current year.', 'aven' ),
				'default'  => esc_html__('&copy; Copyright [year]. All Rights Reserved.', 'aven')
			),
			array(
				'id'		=> 'zozo_footer_widgets_enable',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Footer Widgets', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_enable_back_to_top',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Back To Top', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'       	=> 'zozo_back_to_top_position',
				'type'     	=> 'select',
				'title'    	=> esc_html__( 'Back To Top Position', 'aven' ),
				'subtitle' 	=> esc_html__( 'Choose Back To Top position in footer.', 'aven' ),
				'required' 	=> array('zozo_enable_back_to_top', 'equals', true),
				'options'  	=> array(
					'floating_bar'		=> esc_html__( 'Floating Style', 'aven' ),
					'footer_top'		=> esc_html__( 'In Footer Top', 'aven' ),
				),
				'default'  	=> 'floating_bar'
			),
			array(
				'id'		=> 'zozo_enable_footer_menu',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Footer Menu', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
		)
	) );
	
	// Footer Type
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Footer Type', 'aven'),
		'id'         => 'footer-footertype',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_footer_copyright_align',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Footer Copyright Bar Align', 'aven'),
				'options'  	=> array(
					'left'		=> esc_html__( 'Left', 'aven' ),
					'center'	=> esc_html__( 'Center', 'aven' ),
				),
				'default' 	=> 'left'
			),
			array(
				'id'		=> 'zozo_footer_skin',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Footer Skin', 'aven'),
				'options'  	=> array(
					'light'		=> esc_html__( 'Light', 'aven' ),
					'dark'		=> esc_html__( 'Dark', 'aven' ),
				),
				'default' 	=> 'light'
			),
			array(
				'id'		=> 'zozo_footer_style',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Footer Style', 'aven'),
				'options'  	=> array(
					'default'	=> esc_html__( 'Normal', 'aven' ),
					'sticky'	=> esc_html__( 'Sticky', 'aven' ),
					'hidden'	=> esc_html__( 'Hidden', 'aven' ),
				),
				'default' 	=> 'default'
			),
			array(
				'id'		=> 'zozo_footer_type',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Footer Type', 'aven'),
				'options' 	=> array(
					'footer-1' 			=> array('alt' => esc_html__('Default Footer', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/footers/footer-01.jpg'),
					'footer-2' 			=> array('alt' => esc_html__('Footer 3 Column', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/footers/footer-02.jpg'),
					'footer-3' 			=> array('alt' => esc_html__('Footer 3 Column Centered', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/footers/footer-03.jpg'),
					'footer-8' 			=> array('alt' => esc_html__('Footer 3 Column Alt', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/footers/footer-08.jpg'),
					'footer-4' 			=> array('alt' => esc_html__('Footer 2 Column', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/footers/footer-04.jpg'),
					'footer-5' 			=> array('alt' => esc_html__('Footer 2 Column Large', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/footers/footer-05.jpg'),
					'footer-6' 			=> array('alt' => esc_html__('Footer 2 Column Large', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/footers/footer-06.jpg'),							
					'footer-7' 			=> array('alt' => esc_html__('Footer One Column', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/footers/footer-07.jpg'),
				),
				'default' 	=> 'footer-1'
			),
		)
	) );
	
	// Footer Styling Options
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Styling', 'aven'),
		'id'         => 'footer-styling',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       			=> 'zozo_footer_spacing',
				'type'     			=> 'spacing',
				'mode'     			=> 'padding',
				'units'         	=> array( 'em', 'px', '%' ),
				'units_extended'	=> 'true',
				'title'    			=> esc_html__( 'Footer Widgets Padding', 'aven' ),
				'subtitle' 			=> esc_html__( 'Choose the spacing for footer widgets section.', 'aven' ),
			),
			array(
				'id'       			=> 'zozo_footer_copyright_spacing',
				'type'     			=> 'spacing',
				'mode'     			=> 'padding',
				'units'         	=> array( 'em', 'px', '%' ),
				'units_extended'	=> 'true',
				'title'    			=> esc_html__( 'Footer Copyright Bar Padding', 'aven' ),
				'subtitle' 			=> esc_html__( 'Choose the spacing for footer copyright bar.', 'aven' ),
			),
		)
	) );
	
	// Typography Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'aven' ),
        'id'     => 'typography',
        'desc'   => '',
        'icon'   => 'el el-icon-text-height',
		'fields' => array(
			array(
				'id'       		=> 'zozo_body_font',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Body Font', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the body font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'font-weight'  	=> true,
				'font-style'  	=> false,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '15px',
					'font-family' => 'Hind',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
					'line-height' => '28px',
				),
			),
			array(
				'id'       		=> 'zozo_h1_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'H1 Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the H1 font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '35px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '600',
					'font-style'  => '',
					'line-height' => '42px',
				),
			),
			array(
				'id'       		=> 'zozo_h2_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'H2 Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the H2 font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '29px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '600',
					'font-style'  => '',
					'line-height' => '35px',
				),
			),
			array(
				'id'       		=> 'zozo_h3_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'H3 Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the H3 font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '24px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '600',
					'font-style'  => '',
					'line-height' => '29px',
				),
			),
			array(
				'id'       		=> 'zozo_h4_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'H4 Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the H4 font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '20px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '600',
					'font-style'  => '',
					'line-height' => '24px',
				),
			),
			array(
				'id'       		=> 'zozo_h5_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'H5 Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the H5 font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '17px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '600',
					'font-style'  => '',
					'line-height' => '20px',
				),
			),
			array(
				'id'       		=> 'zozo_h6_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'H6 Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the H6 font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '14px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '600',
					'font-style'  => '',
					'line-height' => '17px',
				),
			),
		)
	) );
	
	// Menu Typography
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Menu', 'aven'),
		'id'         => 'typography-menu',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       		=> 'zozo_top_menu_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Top Menu Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the Top menu font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '12px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '500',
					'font-style'  => '',
					'line-height' => '12px',
				),
			),
			array(
				'id'       		=> 'zozo_menu_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Main Menu Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the Main menu font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'line-height'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '13px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '500',
					'font-style'  => '',
				),
			),
			array(
				'id'       		=> 'zozo_submenu_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Sub Menu Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the Sub menu font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '12px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '500',
					'font-style'  => '',
					'line-height' => '20px',
				),
			),
		)
	) );
	
	// Title Typography
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Page/Post', 'aven'),
		'id'         => 'typography-title',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       		=> 'zozo_single_post_title_fonts',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Page/Post Title Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the Page/Post font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '32px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '700',
					'font-style'  => '',
					'line-height' => '35px',
				),
			),
			array(
				'id'       		=> 'zozo_post_title_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Blog Archive Title Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the Blog Archive Title font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '20px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '600',
					'font-style'  => '',
					'line-height' => '24px',
				),
			),
		)
	) );
	
	// Widgets Typography
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Widgets', 'aven'),
		'id'         => 'typography-widgets',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       		=> 'zozo_widget_title_fonts',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Widget Title Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the Widget Title font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '17px',
					'line-height' => '20px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '600',
					'font-style'  => '',
				),
			),
			array(
				'id'       		=> 'zozo_widget_text_fonts',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Widget Text Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the Widget Text font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '15px',
					'line-height' => '28px',
					'font-family' => 'Hind',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
				),
			),
			array(
				'id'       		=> 'zozo_footer_widget_title_fonts',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Footer Widget Title Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the Footer Widget Title font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '17px',
					'line-height' => '20px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '600',
					'font-style'  => '',
				),
			),
			array(
				'id'       		=> 'zozo_footer_widget_text_fonts',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Footer Widget Text Font Style', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the Footer Widget Text font properties.', 'aven' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '15px',
					'line-height' => '28px',
					'font-family' => 'Hind',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
				),
			),
		)
	) );
	
	// Skin Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Skin', 'aven' ),
        'id'     => 'skin',
        'desc'   => '',
        'icon'   => 'el el-icon-broom',
		'fields' => array(
			array(
				'id'		=> 'zozo_color_scheme',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Default Color Scheme', 'aven'),
				'options' 	=> array(
					'blue.css' 			=> array('alt' => esc_html__('Blue', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/skins/blue.jpg'),
					'yellow.css' 		=> array('alt' => esc_html__('Yellow', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/skins/yellow.jpg'),
					'green.css' 		=> array('alt' => esc_html__('Green', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/skins/green.jpg'),
					'pink.css' 			=> array('alt' => esc_html__('Pink', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/skins/pink.jpg'),
					'light-blue.css' 	=> array('alt' => esc_html__('Light Blue', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/skins/light-blue.jpg'),
					'light-green.css' 	=> array('alt' => esc_html__('Light Green', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/skins/light-green.jpg'),
					'light-yellow.css' 	=> array('alt' => esc_html__('Light Yellow', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/skins/light-yellow.jpg'),
					'orange.css' 		=> array('alt' => esc_html__('Orange', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/skins/orange.jpg'),
					'red.css' 			=> array('alt' => esc_html__('Red', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/skins/red.jpg'),
					'brown.css' 		=> array('alt' => esc_html__('Brown', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/skins/brown.jpg'),
					'violet.css' 		=> array('alt' => esc_html__('Violet', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/skins/violet.jpg'),
				),
				'default' 	=> 'blue.css'
			),
			array(
				'id'		=> 'zozo_theme_skin',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Theme Skin', 'aven'),
				'options'  	=> array(
					'light'		=> esc_html__( 'Light', 'aven' ),
					'dark'		=> esc_html__( 'Dark', 'aven' ),
				),
				'default' 	=> 'light'
			),
			array(
				'id'       		=> 'zozo_custom_scheme_color',
				'type'     		=> 'color',
				'title'    		=> esc_html__( 'Custom Color Scheme', 'aven' ),
				'validate' 		=> 'color',
				'transparent' 	=> false
			),
			array(
				'id'       		=> 'zozo_custom_color_skin',
				'type'     		=> 'link_color',
				'title'    		=> esc_html__( 'Custom Color Skin', 'aven' ),
				'subtitle' 		=> esc_html__( 'Specify the Color when Custom Color Scheme works as background color.', 'aven' ),
				'active'   		=> false,
				'default'  		=> array(
					'regular' 	=> '',
					'hover'   	=> '',							
				)
			),
			array(
				'id'       => 'zozo_link_color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Link Color', 'aven' ),
				'subtitle' => esc_html__( 'Choose link color.', 'aven' ),
				'active'   => false,
				'default'  => array(
					'regular' => '',
					'hover'   => '',
				)
			),
		)
	) );
	
	// Body/Page Background
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Body/Page', 'aven'),
		'id'         => 'skin-bodypage',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       	=> 'zozo_body_bg_image',
				'type'     	=> 'background',
				'title'    	=> esc_html__( 'Body Background', 'aven' ),
				'subtitle' 	=> esc_html__( 'Body background with image, color, etc.', 'aven' ),
			),
			array(
				'id'       	=> 'zozo_page_bg_image',
				'type'     	=> 'background',
				'title'    	=> esc_html__( 'Page Background', 'aven' ),
				'subtitle' 	=> esc_html__( 'Page background with image, color, etc.', 'aven' ),
			),
		)
	) );
	
	// Header Background
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Header', 'aven'),
		'id'         => 'skin-header',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       	=> 'zozo_header_bg_image',
				'type'     	=> 'background',
				'title'    	=> esc_html__( 'Header Background', 'aven' ),
				'subtitle' 	=> esc_html__( 'Header background with image, color, etc.', 'aven' ),
				'default' 	=> ''
			),
			array(
				'id'       	=> 'zozo_sticky_bg_image',
				'type'     	=> 'background',
				'title'    	=> esc_html__( 'Sticky Background', 'aven' ),
				'subtitle' 	=> esc_html__( 'Sticky background with image, color, etc.', 'aven' ),
				'default' 	=> ''
			),
			array(
				'id'       => 'zozo_header_top_background_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Header Top Background Color', 'aven' ),
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'zozo_sliding_background_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Sliding Bar Background Color', 'aven' ),
				'default'  => '',
				'validate' => 'color',
			),
		)
	) );
	
	// Menu Background
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Menu', 'aven'),
		'id'         => 'skin-menu',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'menu_hover',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Menu Hover Colors', 'aven'),
				'notice' 	=> false
			),
			array(
				'id'       => 'zozo_top_menu_hcolor',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Top Menu Link Color', 'aven' ),
				'subtitle' => esc_html__( 'Choose Top Menu link hover color.', 'aven' ),
				'regular'   => false,
				'active'   => false,
				'default'  => array(
					'hover'   => '',							
				)
			),
			array(
				'id'       => 'zozo_main_menu_hcolor',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Main Menu Link Color', 'aven' ),
				'subtitle' => esc_html__( 'Choose Main Menu link hover color.', 'aven' ),
				'regular'   => false,
				'active'   => false,
				'default'  => array(
					'hover'   => '',							
				)
			),
			array(
				'id'		=> 'submenu_hover',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Menu Dropdown', 'aven'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_submenu_show_border',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Border', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id' 		=> 'zozo_main_submenu_border',
				'type' 		=> 'border',
				'all' 		=> false,
				'title' 	=> esc_html__( 'Dropdown Menu Border', 'aven' ),
				'subtitle' 	=> esc_html__( 'Enter border for menu dropdown.', 'aven' ),
				'required' 	=> array('zozo_submenu_show_border', 'equals', true),
				'default' 	=> array(
					'border-color'  => '',
					'border-style'  => 'solid',
					'border-top'    => '3px',
					'border-right'  => '0px',
					'border-bottom' => '0px',
					'border-left'   => '0px'
				)
			),
			array(
				'id'       => 'zozo_submenu_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background Color', 'aven' ),
				'default'  => '#ffffff',
				'validate' => 'color',
			),
			array(
				'id'       => 'zozo_sub_menu_hcolor',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Sub Menu Link Color', 'aven' ),
				'subtitle' => esc_html__( 'Choose Sub Menu link hover color.', 'aven' ),
				'regular'   => false,
				'active'   => false,
				'default'  => array(
					'hover'   => '',							
				)
			),
			array(
				'id'       => 'zozo_submenu_hbg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Link Hover Background Color', 'aven' ),
				'default'  => '',
				'validate' => 'color',
			),
		)
	) );
	
	// Footer Background
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Footer', 'aven'),
		'id'         => 'skin-footer',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       	=> 'zozo_footer_bg_image',
				'type'     	=> 'background',
				'title'    	=> esc_html__( 'Footer Background', 'aven' ),
				'subtitle' 	=> esc_html__( 'Footer background with image, color, etc.', 'aven' ),
			),
			array(
				'id'       	=> 'zozo_footer_copy_bg_image',
				'type'     	=> 'background',
				'title'    	=> esc_html__( 'Footer Copyright Background', 'aven' ),
				'subtitle' 	=> esc_html__( 'Footer copyright bar background with image, color, etc.', 'aven' ),
			),
		)
	) );
	
	// Social Colors
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Social', 'aven'),
		'id'         => 'skin-social',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'zozo_social_bg_color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Social Icon Background Color', 'aven' ),
				'subtitle' => esc_html__( 'Choose Social Icon Background color and hover color.', 'aven' ),
				'active'   => false,
				'default'  => array(
					'regular' => '',
					'hover'   => '',							
				)
			),
			array(
				'id'       => 'zozo_social_icon_color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Social Icon Color', 'aven' ),
				'subtitle' => esc_html__( 'Choose Social Icon color and hover color.', 'aven' ),
				'active'   => false,
				'default'  => array(
					'regular' => '',
					'hover'   => '',							
				)
			),
		)
	) );
	
	// Social Icons
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social', 'aven' ),
        'id'     => 'social',
        'desc'   => '',
        'icon'   => 'el el-icon-link',
		'fields' => array(
			array(
					'id'       	=> 'zozo_social_icon_window',
					'type'     	=> 'select',
					'title'    	=> __( 'Target Window', 'aven' ),
					'subtitle' 	=> __( 'Select the target window open into same window or blank window.', 'aven' ),
					'options'  	=> array(
						'_self'		=> __('Self', 'aven'),
						'_blank'	=> __('Blank', 'aven'),
						'_parent'	=> __('Parent', 'aven')
					),
					'default'  	=> '_self'
				),
			array(
				'id'		=> 'zozo_social_icon_type',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Icon Type', 'aven'),
				'options' 	=> array(
					'circle' 		=> array('alt' => esc_html__('Circle', 'aven'), 'img' => ZOZO_ADMIN_ASSETS . 'images/layouts/circle-icon.jpg'),
					'flat' 			=> array('alt' => esc_html__('Square', 'aven'), 'img' => ZOZO_ADMIN_ASSETS . 'images/layouts/flat-icon.jpg'),
					'rounded' 		=> array('alt' => esc_html__('Rounded', 'aven'), 'img' => ZOZO_ADMIN_ASSETS . 'images/layouts/rounded-icon.jpg'),
					'transparent' 	=> array('alt' => esc_html__('Transparent', 'aven'), 'img' => ZOZO_ADMIN_ASSETS . 'images/layouts/transparent-icon.jpg'),
				),
				'default' 	=> 'transparent'
			),
			array(
				'id'		=> 'zozo_facebook_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Facebook', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Facebook icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_twitter_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Twitter', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Twitter icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_linkedin_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('LinkedIn', 'aven'),
				'desc' 		=> esc_html__('Enter the link for LinkedIn icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_pinterest_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Pinterest', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Pinterest icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_youtube_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Youtube', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Youtube icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_rss_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('RSS', 'aven'),
				'desc' 		=> esc_html__('Enter the link for RSS icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_tumblr_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Tumblr', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Tumblr icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_reddit_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Reddit', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Reddit icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_dribbble_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Dribbble', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Dribbble icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_digg_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Digg', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Digg icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_flickr_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Flickr', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Flickr icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_instagram_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Instagram', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Instagram icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_vimeo_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Vimeo', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Vimeo icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_skype_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Skype', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Skype icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_blogger_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Blogger', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Blogger icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_yahoo_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Yahoo', 'aven'),
				'desc' 		=> esc_html__('Enter the link for Yahoo icon to appear. To remove it, just leave it blank.', 'aven'),
				'default' 	=> ""
			),
		)
	) );
	
	// Portfolio
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Portfolio', 'aven' ),
        'id'     => 'portfolio',
        'desc'   => '',
        'icon'   => 'el el-icon-picture',
		'fields' => array(
			array(
				'id'		=> 'zozo_portfolio_archive_count',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Number of Portfolio Items Per Page', 'aven'),
				'desc' 		=> esc_html__('Enter the number of posts to display per page in archive/category.', 'aven'),
				'default' 	=> "10"
			),
			array(
				'id'		=> 'zozo_portfolio_archive_layout',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Portfolio Archive/Category Layout', 'aven'),
				'options'  	=> array(
					'grid'		=> esc_html__( 'Grid', 'aven' ),
					'classic'	=> esc_html__( 'Classic', 'aven' ),
				),
				'default' 	=> 'grid'
			),
			array(
				'id'		=> 'zozo_portfolio_archive_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Portfolio Columns', 'aven'),
				'options'  	=> array(
					'2' 		=> esc_html__('2 Columns', 'aven'),
					'3' 		=> esc_html__('3 Columns', 'aven'),
					'4' 		=> esc_html__('4 Columns', 'aven')
				),
				'default' 	=> '4'
			),
			array(
				'id'		=> 'zozo_portfolio_archive_gutter',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Portfolio Items Spacing', 'aven'),
				'desc' 		=> esc_html__('Enter gap size between portfolio items. Only enter number Ex: 10', 'aven'),
				'default' 	=> "30"
			),
			array(
				'id'		=> 'portfolio_details_text',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Portfolio Details', 'aven'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_portfolio_category_label',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Category Label', 'aven'),
				'desc' 		=> esc_html__('Change Category label to show in portfolio details.', 'aven'),
				'default' 	=> esc_html__('Category:', 'aven')
			),
			array(
				'id'		=> 'zozo_portfolio_tag_label',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Tag Label', 'aven'),
				'desc' 		=> esc_html__('Change Tag label to show in portfolio details.', 'aven'),
				'default' 	=> esc_html__('Tags:', 'aven')
			),
			array(
				'id'		=> 'zozo_portfolio_client_label',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Client Label', 'aven'),
				'desc' 		=> esc_html__('Change Client label to show in portfolio details.', 'aven'),
				'default' 	=> esc_html__('Client:', 'aven')
			),
			array(
				'id'		=> 'zozo_portfolio_date_label',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Date Label', 'aven'),
				'desc' 		=> esc_html__('Change Date label to show in portfolio details.', 'aven'),
				'default' 	=> esc_html__('Date:', 'aven')
			),
			array(
				'id'		=> 'zozo_portfolio_estimation_label',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Estimation Label', 'aven'),
				'desc' 		=> esc_html__('Change Estimation label to show in portfolio details.', 'aven'),
				'default' 	=> esc_html__('Estimation:', 'aven')
			),
			array(
				'id'		=> 'zozo_portfolio_duration_label',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Duration Label', 'aven'),
				'desc' 		=> esc_html__('Change Duration label to show in portfolio details.', 'aven'),
				'default' 	=> esc_html__('Duration:', 'aven')
			),
			array(
				'id'		=> 'zozo_portfolio_prev_next',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Post Navigation', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_portfolio_related_slider',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Related Works Slider', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_portfolio_related_title',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Related Works Slider Title', 'aven'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_portfolio_citems',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Display', 'aven'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_portfolio_citems_scroll',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Scrollby', 'aven'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_portfolio_ctablet',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Tablet', 'aven'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_portfolio_cmobile_land',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Landscape', 'aven'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_portfolio_cmobile',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Portrait', 'aven'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_portfolio_cmargin',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Margin ( Items Spacing )', 'aven'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> "20"
			),
			array(
				'id'		=> 'zozo_portfolio_cautoplay',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Autoplay', 'aven'),
				'default' 	=> true,
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_portfolio_ctimeout',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Timeout Duration (in milliseconds)', 'aven'),
				'required' 	=> array('zozo_portfolio_cautoplay', 'equals', true),
				'default' 	=> "5000"
			),
			array(
				'id'		=> 'zozo_portfolio_cloop',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Infinite Loop', 'aven'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_portfolio_cpagination',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Pagination', 'aven'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_portfolio_cnavigation',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Navigation', 'aven'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
		)
	) );
	
	// Services
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Services', 'aven' ),
        'id'     => 'services',
        'desc'   => '',
        'icon'   => 'el el-icon-star-empty',
		'fields' => array(
			array(
				'id'		=> 'zozo_service_archive_count',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Number of Service Items Per Page', 'aven'),
				'desc' 		=> esc_html__('Enter the number of posts to display per page in archive/category.', 'aven'),
				'default' 	=> "10"
			),
			array(
				'id'		=> 'zozo_service_archive_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Service Columns', 'aven'),
				'options'  	=> array(
					'2' 		=> esc_html__('2 Columns', 'aven'),
					'3' 		=> esc_html__('3 Columns', 'aven'),
					'4' 		=> esc_html__('4 Columns', 'aven')
				),
				'default' 	=> '4'
			),
			array(
				'id'		=> 'icons_service_info',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Services Slider Configuration', 'aven'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_service_citems',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Display', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_service_citems_scroll',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Scrollby', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_service_ctablet',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Tablet', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_service_cmobile_land',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Landscape', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_service_cmobile',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Portrait', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_service_cmargin',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Margin ( Items Spacing )', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_service_cautoplay',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Autoplay', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_service_ctimeout',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Timeout Duration (in milliseconds)', 'aven'),
				'default' 	=> "5000"
			),
			array(
				'id'		=> 'zozo_service_cloop',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Infinite Loop', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_service_cpagination',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Pagination', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_service_cnavigation',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Navigation', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
		)
	) );
	
	// Post
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Post', 'aven' ),
        'id'     => 'post',
        'desc'   => '',
        'icon'   => 'el el-icon-file',
		'fields' => array(
			array(
				'id'		=> 'zozo_disable_blog_pagination',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Infinite Scroll', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_blog_read_more_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Read More Button Text', 'aven'),
				'desc' 		=> esc_html__('Enter the custom read more button text.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'blog_excerpt_length',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Excerpt Length', 'aven'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_blog_excerpt_length_large',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Large Layout', 'aven'),
				'desc' 		=> esc_html__('Enter the excerpt length for blog style large.', 'aven'),
				'default' 	=> "80"
			),
			array(
				'id'		=> 'zozo_blog_excerpt_length_grid',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Grid Layout', 'aven'),
				'desc' 		=> esc_html__('Enter the excerpt length for blog style grid.', 'aven'),
				'default' 	=> "10"
			),
			array(
				'id'		=> 'zozo_blog_excerpt_length_list',
				'type'     	=> 'text',
				'title' 	=> esc_html__('List Layout', 'aven'),
				'desc' 		=> esc_html__('Enter the excerpt length for blog style list.', 'aven'),
				'default' 	=> "30"
			),
			array(
				'id'		=> 'gallery_slider',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Blog Gallery Slider', 'aven'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_blog_slideshow_autoplay',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Autoplay for Gallery Slider', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_blog_slideshow_timeout',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Timeout Duration (in milliseconds)', 'aven'),
				'required' 	=> array('zozo_blog_slideshow_autoplay', 'equals', true),
				'default' 	=> "5000"
			),
			array(
				'id'		=> 'post_meta',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Blog Post Meta', 'aven'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_blog_date_format',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Post Meta Date Format', 'aven'),
				"desc" 		=> "Enter post meta date format. Refer formats from <a href='http://codex.wordpress.org/Formatting_Date_and_Time'>Formatting Date and Time</a>",
				'default' 	=> "d.m.Y"
			),
			array(
				'id'		=> 'zozo_blog_post_featured_image',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Post Featured Image', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_blog_post_meta_author',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Post Meta Author', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_blog_post_meta_date',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Post Meta Date', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_blog_post_meta_categories',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Post Meta Categories', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_blog_post_meta_comments',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Post Meta Comments', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_blog_read_more',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Read More Link', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
		)
	) );
	
	// Blog Archive
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Blog Archive', 'aven'),
		'id'         => 'post-blogarchive',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_blog_archive_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Archive Layout', 'aven'),
				'options' 	=> array(
					'one-col' 			=> array('alt' => esc_html__('Full width', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/one-col.png'),
					'two-col-right' 	=> array('alt' => esc_html__('Right Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/two-col-right.png'),
					'two-col-left' 		=> array('alt' => esc_html__('Left Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/two-col-left.png'),
					'three-col-middle' 	=> array('alt' => esc_html__('Left and Right Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-middle.png'),
					'three-col-right' 	=> array('alt' => esc_html__('Two Right Sidebars', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-right.png'),
					'three-col-left' 	=> array('alt' => esc_html__('Two Left Sidebars', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-left.png'),
				),
				'default' 	=> 'one-col'
			),
			array(
				'id'		=> 'zozo_archive_blog_type',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Post Layout', 'aven'),
				'options' 	=> array(
					'large' 	=> array('alt' => esc_html__('Large Layout', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/blog-large.jpg'),
					'list' 		=> array('alt' => esc_html__('List Layout', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/blog-list.jpg'),
					'grid' 		=> array('alt' => esc_html__('Grid Layout', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/blog-grid.jpg'),
					'metro'		=> array('alt' => esc_html__('Metro Layout', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/blog-metro.jpg'),
				),
				'default' 	=> 'large'
			),
			array(
				'id'		=> 'zozo_archive_blog_grid_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Grid Columns', 'aven'),
				'required' 	=> array('zozo_archive_blog_type', 'equals', 'grid'),
				'options'  	=> array(
					'two' 		=> esc_html__('2 Columns', 'aven'),
					'three' 	=> esc_html__('3 Columns', 'aven'),
					'four' 		=> esc_html__('4 Columns', 'aven')
				),
				'default' 	=> 'two'
			),
			array(
				'id'		=> 'zozo_archive_blog_metro_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Metro Columns', 'aven'),
				'required' 	=> array('zozo_archive_blog_type', 'equals', 'metro'),
				'options'  	=> array(
					'two' 		=> esc_html__('2 Columns', 'aven'),
					'three' 	=> esc_html__('3 Columns', 'aven'),
					'four' 		=> esc_html__('4 Columns', 'aven')
				),
				'default' 	=> 'three'
			),
			array(
				'id'		=> 'zozo_archive_metro_gutter',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Metro Gutter Spacing', 'aven'),
				'desc' 		=> esc_html__('Enter gap size between items. Only enter number Ex: 10', 'aven'),
				'required' 	=> array('zozo_archive_blog_type', 'equals', 'metro'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_show_archive_featured_slider',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Featured Post Slider', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
		)
	) );
	
	// Blog
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Blog', 'aven'),
		'id'         => 'post-blog',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_blog_page_title_bar',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Page title bar for Blog', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_blog_title',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Blog Page Title', 'aven'),	
				'desc' 		=> esc_html__('Blog Page Title for the main blog page.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_blog_slogan',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Blog Page Slogan', 'aven'),	
				'desc' 		=> esc_html__('Blog Page Slogan for the main blog page.', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_blog_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Blog Layout', 'aven'),
				'options' 	=> array(
					'one-col' 			=> array('alt' => esc_html__('Full width', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/one-col.png'),
					'two-col-right' 	=> array('alt' => esc_html__('Right Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/two-col-right.png'),
					'two-col-left' 		=> array('alt' => esc_html__('Left Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/two-col-left.png'),
					'three-col-middle' 	=> array('alt' => esc_html__('Left and Right Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-middle.png'),
					'three-col-right' 	=> array('alt' => esc_html__('Two Right Sidebars', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-right.png'),
					'three-col-left' 	=> array('alt' => esc_html__('Two Left Sidebars', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-left.png'),
				),
				'default' 	=> 'one-col'
			),
			array(
				'id'		=> 'zozo_blog_type',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Post Layout', 'aven'),
				'options' 	=> array(
					'large' 	=> array('alt' => esc_html__('Large Layout', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/blog-large.jpg'),
					'list' 		=> array('alt' => esc_html__('List Layout', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/blog-list.jpg'),
					'grid' 		=> array('alt' => esc_html__('Grid Layout', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/blog-grid.jpg'),
					'metro'		=> array('alt' => esc_html__('Metro Layout', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/blog-metro.jpg'),
				),
				'default' 	=> 'large'
			),
			array(
				'id'		=> 'zozo_blog_grid_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Grid Columns', 'aven'),
				'required' 	=> array('zozo_blog_type', 'equals', 'grid'),
				'options'  	=> array(
					'two' 		=> esc_html__('2 Columns', 'aven'),
					'three' 	=> esc_html__('3 Columns', 'aven'),
					'four' 		=> esc_html__('4 Columns', 'aven')
				),
				'default' 	=> 'two'
			),
			array(
				'id'		=> 'zozo_blog_metro_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Metro Columns', 'aven'),
				'required' 	=> array('zozo_blog_type', 'equals', 'metro'),
				'options'  	=> array(
					'two' 		=> esc_html__('2 Columns', 'aven'),
					'three' 	=> esc_html__('3 Columns', 'aven'),
					'four' 		=> esc_html__('4 Columns', 'aven')
				),
				'default' 	=> 'three'
			),
			array(
				'id'		=> 'zozo_blog_metro_gutter',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Metro Gutter Spacing', 'aven'),
				'desc' 		=> esc_html__('Enter gap size between items. Only enter number Ex: 10', 'aven'),
				'required' 	=> array('zozo_blog_type', 'equals', 'metro'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_show_blog_featured_slider',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Featured Post Slider', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
		)
	) );
	
	// Single Post Layout
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Single Post', 'aven'),
		'id'         => 'post-single',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_single_post_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Single Post Layout', 'aven'),
				'options' 	=> array(
					'one-col' 			=> array('alt' => esc_html__('Full width', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/one-col.png'),
					'two-col-right' 	=> array('alt' => esc_html__('Right Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/two-col-right.png'),
					'two-col-left' 		=> array('alt' => esc_html__('Left Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/two-col-left.png'),
					'three-col-middle' 	=> array('alt' => esc_html__('Left and Right Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-middle.png'),
					'three-col-right' 	=> array('alt' => esc_html__('Two Right Sidebars', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-right.png'),
					'three-col-left' 	=> array('alt' => esc_html__('Two Left Sidebars', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-left.png'),
				),
				'default' 	=> 'one-col'
			),
			array(
				'id'		=> 'zozo_blog_social_sharing',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Social Sharing', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_blog_author_info',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Author Info', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_blog_comments',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Comments', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'related_post_slider',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Related Posts Slider', 'aven'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_show_related_posts',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Related Posts', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_related_blog_items',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Display', 'aven'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "3"
			),
			array(
				'id'		=> 'zozo_related_blog_items_scroll',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Scrollby', 'aven'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_related_blog_autoplay',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Auto Play', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
			),
			array(
				'id'		=> 'zozo_related_blog_timeout',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Timeout Duration (in milliseconds)', 'aven'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "5000"
			),
			array(
				'id'		=> 'zozo_related_blog_loop',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Infinite Loop', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
			),
			array(
				'id'		=> 'zozo_related_blog_margin',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Margin ( Items Spacing )', 'aven'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "30"
			),
			array(
				'id'		=> 'zozo_related_blog_tablet',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Tablet', 'aven'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "3"
			),
			array(
				'id'		=> 'zozo_related_blog_landscape',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Landscape', 'aven'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "2"
			),
			array(
				'id'		=> 'zozo_related_blog_portrait',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Portrait', 'aven'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_related_blog_dots',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Pagination', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
			),
			array(
				'id'		=> 'zozo_related_blog_nav',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Navigation', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
			),
			array(
				'id'		=> 'zozo_blog_prev_next',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Post Navigation', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'gallery_slider',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Blog Gallery Slider', 'aven'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_single_blog_carousel',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Gallery Slider as Carousel globally ?', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_single_blog_citems',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Display', 'aven'),
				'default' 	=> "3"
			),
			array(
				'id'		=> 'zozo_single_blog_citems_scroll',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Scrollby', 'aven'),
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_single_blog_cautoplay',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Auto Play', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_single_blog_ctimeout',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Timeout Duration (in milliseconds)', 'aven'),
				'default' 	=> "5000"
			),
			array(
				'id'		=> 'zozo_single_blog_cloop',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Infinite Loop', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_single_blog_cmargin',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Margin ( Items Spacing )', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_single_blog_ctablet',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Tablet', 'aven'),
				'default' 	=> "3"
			),
			array(
				'id'		=> 'zozo_single_blog_cmlandscape',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Landscape', 'aven'),
				'default' 	=> "2"
			),
			array(
				'id'		=> 'zozo_single_blog_cmportrait',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Portrait', 'aven'),
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_single_blog_cdots',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Pagination', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_single_blog_cnav',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Navigation', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
		)
	) );
	
	// Featured Post Slider
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Featured Post Slider', 'aven'),
		'id'         => 'post-featuredpostslider',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_featured_slider_type',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Featured Post Slider Display', 'aven'),
				'options'  	=> array(
					'below_header' 		=> esc_html__('Below Header', 'aven'),
					'above_content' 	=> esc_html__('Above Content', 'aven'),
					'above_footer' 		=> esc_html__('Above Footer', 'aven')
				),
				'default' 	=> 'below_header'
			),
			array(
				'id'		=> 'zozo_featured_posts_limit',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Featured Posts Limit', 'aven'),						
				'default' 	=> "6"
			),
			array(
				'id'		=> 'zozo_featured_slider_citems',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Display', 'aven'),						
				'default' 	=> "3"
			),
			array(
				'id'		=> 'zozo_featured_slider_citems_scroll',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Scrollby', 'aven'),						
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_featured_slider_cautoplay',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Auto Play', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_featured_slider_ctimeout',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Timeout Duration (in milliseconds)', 'aven'),
				'default' 	=> "5000"
			),
			array(
				'id'		=> 'zozo_featured_slider_cloop',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Infinite Loop', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_featured_slider_cmargin',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Margin ( Items Spacing )', 'aven'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_featured_slider_ctablet',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Tablet', 'aven'),
				'default' 	=> "3"
			),
			array(
				'id'		=> 'zozo_featured_slider_cmlandscape',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Landscape', 'aven'),
				'default' 	=> "2"
			),
			array(
				'id'		=> 'zozo_featured_slider_cmportrait',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Portrait', 'aven'),
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_featured_slider_cdots',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Pagination', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_featured_slider_cnav',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Navigation', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
		)
	) );
	
	// Search Page
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Search Page', 'aven' ),
        'id'     => 'search',
        'desc'   => '',
        'icon'   => 'el el-icon-search',
		'fields' => array(
			array(
				'id'		=> 'zozo_search_page_type',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Search Results Layout', 'aven'),
				'options' 	=> array(
					'large' 	=> array('alt' => esc_html__('Large Layout', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/blog-large.jpg'),
					'list' 		=> array('alt' => esc_html__('List Layout', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/blog-list.jpg'),
					'grid' 		=> array('alt' => esc_html__('Grid Layout', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/blog-grid.jpg'),
					'metro'		=> array('alt' => esc_html__('Metro Layout', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/blog-metro.jpg'),
				),
				'default' 	=> 'grid'
			),
			array(
				'id'		=> 'zozo_search_grid_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Grid Columns', 'aven'),
				'required' 	=> array('zozo_search_page_type', 'equals', 'grid'),
				'options'  	=> array(
					'two' 		=> esc_html__('2 Columns', 'aven'),
					'three' 	=> esc_html__('3 Columns', 'aven'),
					'four' 		=> esc_html__('4 Columns', 'aven')
				),
				'default' 	=> 'two'
			),
			array(
				'id'		=> 'zozo_search_metro_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Metro Columns', 'aven'),
				'required' 	=> array('zozo_search_page_type', 'equals', 'metro'),
				'options'  	=> array(
					'two' 		=> esc_html__('2 Columns', 'aven'),
					'three' 	=> esc_html__('3 Columns', 'aven'),
					'four' 		=> esc_html__('4 Columns', 'aven')
				),
				'default' 	=> 'three'
			),
			array(
				'id'		=> 'zozo_search_metro_gutter',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Metro Gutter Spacing', 'aven'),
				'desc' 		=> esc_html__('Enter gap size between items. Only enter number Ex: 10', 'aven'),
				'required' 	=> array('zozo_search_page_type', 'equals', 'metro'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_search_results_content',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Search Results Content', 'aven'),
				'options'  	=> array(
					'both' 			=> esc_html__('Posts and Pages', 'aven'),
					'only_posts' 	=> esc_html__('Only Posts', 'aven'),
					'only_pages' 	=> esc_html__('Only Pages', 'aven'),
				),
				'default' 	=> 'both'
			),
		)
	) );
	
	// Social Sharing Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social Share', 'aven' ),
        'id'     => 'socialshare',
        'desc'   => '',
        'icon'   => 'el el-icon-share-alt',
		'fields' => array(
			array(
				'id'		=> 'zozo_sharing_facebook',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Facebook Share', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_sharing_twitter',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Twitter Share', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_sharing_linkedin',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable LinkedIn Share', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_sharing_pinterest',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Pinterest Share', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_sharing_tumblr',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Tumblr Share', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_sharing_reddit',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Reddit Share', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_sharing_digg',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Digg Share', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_sharing_email',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Email Share', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
		)
	) );
	
	// Contact Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Contact', 'aven' ),
        'id'     => 'contact',
        'desc'   => '',
        'icon'   => 'el el-icon-envelope',
		'fields' => array(
			array(
				'id'		=> 'zozo_contact_form_success',
				'type'     	=> 'textarea',
				'title' 	=> esc_html__('Contact Form Success Message', 'aven'),
				'default' 	=> esc_html__("Thank you {name}. Your Email was successfully sent!", 'aven'),
				'desc' 		=> esc_html__('Enter Contact form success message. {name} it will be name of user who submits form. You need this text to show submitted user name in message.', 'aven'),
			),
			array(
				'id'		=> 'zozo_contact_form_error',
				'type'     	=> 'textarea',
				'title' 	=> esc_html__('Contact Form Error Message', 'aven'),
				'default' 	=> esc_html__("Sorry {name}. Your Email was not sent. Resubmit form again Please..", 'aven'),
				'desc' 		=> esc_html__('Enter Contact form error message. {name} it will be name of user who submits form. You need this text to show submitted user name in message.', 'aven'),
			),
		)
	) );
	
	// Custom Post Type Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Custom Post Types', 'aven' ),
        'id'     => 'customposttypes',
        'desc'   => '',
        'icon'   => 'el el-icon-adjust-alt',
		'fields' => array(
			array(
				'id' 		=> 'cpt_disable',
				'type' 		=> 'checkbox',
				'title' 	=> esc_html__('Disable Custom Post Types', 'aven'),
				'subtitle' 	=> esc_html__('You can disable the custom post types used within the theme here, by checking the corresponding box.', 'aven'),
				'options' 	=> array(
					'zozo_portfolio' 	=> 'Portfolio',
					'zozo_services' 	=> 'Services',
					'zozo_testimonial' 	=> 'Testimonials',
					'zozo_team_member' 	=> 'Team Member',
				),
				'default' 	=> array(
					'zozo_portfolio' 	=> '0',
					'zozo_services' 	=> '0',
					'zozo_testimonial' 	=> '0',
					'zozo_team_member' 	=> '0',
				)
			),
			array(
				'id'		=> 'portfolio_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Portfolio Slug', 'aven'),
				'subtitle' 	=> esc_html__('The slug name cannot be the same name as your portfolio page or the layout will break. This option changes the permalink when you use the permalink type as %postname%.', 'aven'),
				'desc' 		=> "<strong>Make sure to regenerate permalinks.</strong>",
				'default' 	=> "portfolio"
			),
			array(
				'id'		=> 'portfolio_categories_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Portfolio Categories Slug', 'aven'),
				'subtitle' 	=> esc_html__('This option changes the permalink when you use the permalink type as %postname%.', 'aven'),
				'desc' 		=> "<strong>Make sure to regenerate permalinks.</strong>",
				'default' 	=> "portfolio-categories"
			),
			array(
				'id'		=> 'portfolio_tags_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Portfolio Tags Slug', 'aven'),
				'subtitle' 	=> esc_html__('This option changes the permalink when you use the permalink type as %postname%.', 'aven'),
				'desc' 		=> "<strong>Make sure to regenerate permalinks.</strong>",
				'default' 	=> "portfolio-tags"
			),
			array(
				'id'		=> 'services_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Services Slug', 'aven'),
				'subtitle' 	=> esc_html__('The slug name cannot be the same name as your services page or the layout will break. This option changes the permalink when you use the permalink type as %postname%.', 'aven'),
				'desc' 		=> "<strong>Make sure to regenerate permalinks.</strong>",
				'default' 	=> "services"
			),
			array(
				'id'		=> 'service_categories_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Service Categories Slug', 'aven'),
				'subtitle' 	=> esc_html__('This option changes the permalink when you use the permalink type as %postname%.', 'aven'),
				'desc' 		=> "<strong>Make sure to regenerate permalinks.</strong>",
				'default' 	=> "service-categories"
			),
		)
	) );
	
	// Woocommerce Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Woocommerce', 'aven' ),
        'id'     => 'woocommerce',
        'desc'   => '',
        'icon'   => 'el el-icon-shopping-cart',
		'fields' => array(
			array(
				'id'		=> 'zozo_woo_enable_catalog_mode',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Catalog Mode', 'aven'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
				'desc' 		=> esc_html__('Enable this setting to set the products into catalog mode, with no cart or checkout process.', 'aven'),
			),
			array(
				'id'		=> 'zozo_woo_archive_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Product Archive Layout', 'aven'),
				'options' 	=> array(
					'one-col' 			=> array('alt' => esc_html__('Full width', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/one-col.png'),
					'two-col-right' 	=> array('alt' => esc_html__('Right Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/two-col-right.png'),
					'two-col-left' 		=> array('alt' => esc_html__('Left Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/two-col-left.png'),
					'three-col-middle' 	=> array('alt' => esc_html__('Left and Right Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-middle.png'),
					'three-col-right' 	=> array('alt' => esc_html__('Two Right Sidebars', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-right.png'),
					'three-col-left' 	=> array('alt' => esc_html__('Two Left Sidebars', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-left.png'),
				),
				'default' 	=> 'one-col'
			),
			array(
				'id'		=> 'zozo_woo_single_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Single Product Layout', 'aven'),
				'options' 	=> array(
					'one-col' 			=> array('alt' => esc_html__('Full width', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/one-col.png'),
					'two-col-right' 	=> array('alt' => esc_html__('Right Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/two-col-right.png'),
					'two-col-left' 		=> array('alt' => esc_html__('Left Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/two-col-left.png'),
					'three-col-middle' 	=> array('alt' => esc_html__('Left and Right Sidebar', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-middle.png'),
					'three-col-right' 	=> array('alt' => esc_html__('Two Right Sidebars', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-right.png'),
					'three-col-left' 	=> array('alt' => esc_html__('Two Left Sidebars', 'aven'), 'img' => ZOZO_ADMIN_ASSETS.'images/layouts/three-col-left.png'),
				),
				'default' 	=> 'two-col-right'
			),
			array(
				'id'		=> 'zozo_loop_products_per_page',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Products Per Page', 'aven'),
				'default' 	=> "12"
			),
			array(
				'id'		=> 'zozo_loop_shop_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Product Columns', 'aven'),
				'options'  	=> array(
					'2' 		=> esc_html__('2 Columns', 'aven'),
					'3' 		=> esc_html__('3 Columns', 'aven'),
					'4' 		=> esc_html__('4 Columns', 'aven'),
					'5' 		=> esc_html__('5 Columns', 'aven')
				),
				'default' 	=> '4'
			),
			array(
				'id'		=> 'zozo_related_products_count',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Related Products Count', 'aven'),
				'options'  	=> array(
					'2' 		=> esc_html__('2 Products', 'aven'),
					'3' 		=> esc_html__('3 Products', 'aven'),
					'4' 		=> esc_html__('4 Products', 'aven'),
					'5' 		=> esc_html__('5 Products', 'aven')
				),
				'default' 	=> '3'
			),
			array(
				'id'		=> 'zozo_woo_shop_ordering',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Shop Page Ordering', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
			array(
				'id'		=> 'zozo_woo_social_sharing',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Woocommerce Social Sharing', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
			),
		)
	) );
	
	// Miscellaneous Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Miscellaneous', 'aven' ),
        'id'     => 'miscellaneous',
        'desc'   => '',
        'icon'   => 'el el-icon-wrench',
		'fields' => array(
			array(
				'id'		=> 'zozo_remove_scripts_version',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Remove Version Parameter From JS & CSS Files', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
				'subtitle' 	=> esc_html__('Most scripts and style-sheets includes query string to identifying the version. This can cause issues with caching and such, which will result in less than optimal load times. You can enable this setting on to remove the query string from such strings.', 'aven'),
			),
			array(
				'id'		=> 'zozo_minify_css',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Minify CSS', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
				'subtitle' 	=> esc_html__('This theme makes use of a lot of css styles, use this function to load a single minified file with all the required styles. Disable for testing purposes.', 'aven'),
			),
			array(
				'id'		=> 'zozo_minify_js',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Minify JS', 'aven'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'aven'),
				'off' 		=> esc_html__('No', 'aven'),
				'subtitle' 	=> esc_html__('This theme makes use of a lot of js scripts, use this function to load a single minified file with all the required code. Disable for testing purposes.', 'aven'),
			),
		)
	) );

    /*
     * <--- END SECTIONS
     */
<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if( !class_exists( 'ReduxFramework' ) ) {
        if (file_exists( WP_PLUGIN_DIR. '/beautheme-danlet/libs/ReduxCore/framework.php')) {
            if(function_exists('beau_theme_plugin_init')){
                require_once( WP_PLUGIN_DIR. '/beautheme-danlet/libs/ReduxCore/framework.php' );
            }
        }
    }
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    $archive_page = $mailchimp_list = $custom_header = $custom_footer ="";

    //Columns
    $beau_column = array(
        'default'   =>  esc_html__('Default','danlet'),
        '1'   => '1',
        '2'   => '2',
        '3'   => '3',
        '4'   => '4',
        '6'   => '6',
        );
    $custom_header = array(
        'default'      => 'Default',
        'fullwidth'    => 'Full width',
        'twonav'    => 'Menu two nav',
    );

    //Beau perpage
    $beau_perpage = array('-1'=>'Show all');
    for($i=1; $i<=50; $i++){
        $beau_perpage[$i] = $i;
    }

    // Social list
    $social_list = array(
        'facebook'      => 'Facebook',
        'twitter'       => 'Twitter',
        'google-plus'   => 'Google Plus',
        'pinterest'     => 'Pinterest',
    );

    //Custom footer
    $custom_footer = array(
        'default'   => esc_html__( 'Standard footer 4 column', 'danlet' ),
        'border'    => esc_html__( 'Footer 3 column', 'danlet' ),
    );
    //Detail Product option
    $archive_product = array(
        'product-default' =>  esc_html__('Archive product default','danlet'),
        'product-sidebar' => esc_html__('Archive product have sidebar','danlet'),
        'product-mansony' => esc_html__('Archive product mansony','danlet'),
        'product-fullwidth' =>  esc_html__('Archive product full width','danlet'),
        );
    $product_detail = array(
        'single-product'   => esc_html__('Single Default','danlet'),
        'single-product2'  => esc_html__('Single Product style2','danlet'),
        'single-product3'  => esc_html__('Single Product style3','danlet'),
    );
    //Get all page
    $allPage = array();
    $args = array(
        'sort_order' => 'asc',
        'sort_column' => 'post_title',
        'post_type' => 'page',
        'post_status' => 'publish'
    );
    $pages = get_pages($args);
    wp_reset_postdata();
    foreach ($pages as $page) {
        $allPage[$page->post_name] = $page->post_title;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "danlet_option";


    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'danlet' ),
        'page_title'           => esc_html__( 'Theme Options', 'danlet' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
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
        'page_slug'            => 'beau-theme-options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
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
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
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
        )
    );



    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
    } else {
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( 'Thanks for used our theme Beau Theme','danlet' );

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
            'title'   => esc_html__( 'Theme Information 1','danlet' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.','danlet' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2','danlet' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.','danlet' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.','danlet' );
    Redux::setHelpSidebar( $opt_name, $content );



    // -> START General option
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General setting','danlet' ),
        'id'               => 'general',
        'desc'             => esc_html__( 'These are something setting for all page!','danlet' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-cogs',
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General options','danlet' ),
        'id'               => 'general-options',
        'subsection'       => true,
        'customizer_width' => '300px',
        'fields'           => array(
            array(
                'id'       => 'danlet-logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload logo', 'danlet' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload any image using the WordPress native uploader', 'danlet' ),
            ),
            array(
                'id'       => 'danlet-logo-mobile',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload mobile logo', 'danlet' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload any image using the WordPress native uploader', 'danlet' ),
            ),
            array(
                'id'       => 'danlet-logo-fixed',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload fixed header logo', 'danlet' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload any image using the WordPress native uploader', 'danlet' ),
            ),
            array(
                'id'       => 'enable-animation',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable Animation','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '0',
                'subtitle' => esc_html__( 'Some shortcode have animation effect, Do you want to enable ?', 'danlet' ),
            ),
            array(
                'id'       => 'enable-smooth-scroll',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable Smooth Scroll?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '0'
            ),
            array(
                'id'       => 'enable-go-top',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable go to top?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),
            array(
                'id'       => 'enable-main-nav',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Show main navigation?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),
        )
    ) );
         Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'API Key','danlet' ),
        'id'               => 'api-key',
        'subsection'       => true,
        'icon'             => 'el el-graph',
        'customizer_width' => '250px',
        'fields'           => array(
            array(
                'id'       => 'jw_player_key',
                'type'     => 'text',
                'title'    => esc_html__( 'JW Player Key', 'danlet' ),
            ),
            array(
                'id'            => 'google_map_api',
                'type'          => 'text',
                'title'         => esc_html__( 'Google map api Key', 'danlet' ),
                'description'   => esc_html__('You can get it on developer google page','danlet')
            ),
        )
    ) );
     Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'External', 'danlet' ),
        'id'               => 'external-options',
        'subsection'       => true,
        'customizer_width' => '250px',
        'icon'             => 'fa fa-exchange',
        'fields'           => array(
            array(
                'id'       => 'set-users-page',
                'type'     => 'select',
                'multi'    => false,
                'data'     => 'pages',
                'title'    => esc_html__( 'Users Page', 'danlet' ),

            ),
        ),
    ) );
    // Your header and footer custom
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header & footer','danlet' ),
        'id'               => 'headerfooter',
        'customizer_width' => '500px',
        'icon'             => 'el el-magic',
    ) );

    // -> START Custom header option
    Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Custom header','danlet' ),
        'id'                => 'headerfooter-header',
        'subsection'        => true,
        'customizer_width'  => '450px',
        'fields'            => array(
            array(
                'id'       => 'enable-fixed',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable header fixed','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'header_ab',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable Header Absolute','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '0'
            ),
            array(
                'id'       => 'enable-header-clarity',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable Header White','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '0'
            ),
            array(
                'id'       => 'enable-search',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable search on header','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),
            array(
                'id'       => 'enable-cart-calender',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable cart (calender)','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'
            ),

            array(
                'id'        => 'header_svg_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Header svg background Color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output'   => array( '.slider-image .svg-header' ),
                'mode'      => 'fill',
            ),

            array(
                'id'       => 'height_svg_header',
                'type'     => 'text',
                'title'    => esc_html__( 'Set height svg on header', 'danlet' ),
            ),

            array(
                'id'       => 'diagonal_svg_header',
                'type'     => 'text',
                'title'    => esc_html__( 'Set slope of diagonal on header', 'danlet' ),
            ),

            array(
                'id'        => 'header-bg',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Header background Color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output' => array(
                    'header','header .header_desktop'
                ),
                'mode'      => 'background',
            ),

            array(
                'id'        => 'header-sticky-bg',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Header sticky background Color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output' => array(
                    'header.f-nav', 'header.f-nav .header_desktop'
                ),
                'mode'      => 'background',
            ),

            array(
                'id'        => 'header-icon-color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Header icon color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output' => array(
                    '.acd-cls > ul.acd_ucs.acd_ucs_white > li i',
                ),
                'mode'      => 'color',
            ),

            array(
                'id'        => 'header-sticky-icon-color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Header sticky icon color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output' => array(
                    'header.f-nav .acd-cls > ul.acd_ucs.acd_ucs_white > li i'
                ),
                'mode'      => 'color',
            ),

            array(
                'id'        => 'header-sticky-text-color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Header sticky link color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output' => array(
                    'header.f-nav nav .acd-menu-white a'
                ),
                'mode'      => 'color',
            ),

            array(
                'id'        => 'header-sticky-text-link-color-hover',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Header sticky link color hover','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output' => array(
                    'header.f-nav nav .acd-menu-white a:hover'
                ),
                'mode'      => 'color',
            ),
        )
    ) );

    // -> START Custom footer option
    Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Custom footer','danlet' ),
        'id'                => 'headerfooter-footer',
        'subsection'        => true,
        'customizer_width'  => '450px',
        'fields'            => array(

            array(
                'id'        => 'footer_style',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Footer style', 'danlet' ),
                'options'   => array(
                    'default' => array( 'title' => esc_html__( 'Default', 'danlet' ),       'img' => get_template_directory_uri().'/asset/images/admin/layout_a.png' ),
                    'custom' => array( 'title' => esc_html__( 'Custom Columns', 'danlet' ),       'img' =>  get_template_directory_uri().'/asset/images/admin/layout_a.png' ),
                ),
                'default'   => 'default',
            ),

            array(
                'id'       => 'footer-widget-number',
                'type'     => 'select',
                'title'    => esc_html__( 'Chose footer columns','danlet' ),
                'subtitle' => esc_html__( 'Chose your custom widget number you want to show','danlet' ),
                'options'  => $beau_column,
                'default'  => 'default',
                'required' => array(
                    array('footer_style','!=','default')
                ),
            ),
            array(
                'id'       => 'enable_svg_footer',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable SVG','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '0'
            ),
            array(
                'id'        => 'footer_svg_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer svg background Color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output'   => array( 'footer .acd_white' ),
                'mode'      => 'fill',
            ),

            array(
                'id'       => 'height_svg_footer',
                'type'     => 'text',
                'title'    => esc_html__( 'Set height svg on footer', 'danlet' ),
            ),

            array(
                'id'       => 'diagonal_svg_footer',
                'type'     => 'text',
                'title'    => esc_html__( 'Set slope of diagonal on footer', 'danlet' ),
            ),

            array(
                'id'        => 'footer-text',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer Text Color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output'   => array(
                    '.acd_footer_bottom_content', 'footer'
                ),
                'mode'      => 'color',
            ),
            array(
                'id'        => 'footer-link',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer link Color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output'   => array(
                    '.acd_footer_bottom_content a', 'footer a'
                ),
                'mode'      => 'color',
            ),
            array(
                'id'        => 'footer-link-hover',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer text Color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output'   => array(
                    '.acd_footer_bottom_content a:hover', 'footer a:hover'
                ),
                'mode'      => 'color',
            ),
            array(
                'id'        => 'footer-bg',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer background Color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output'   => array( '.acd_footer.acd_footer_home1' ),
                'mode'      => 'background',
            ),
            array(
                'id'       => 'text-copyright',
                'type'     => 'editor',
                'title'    => esc_html__( 'Your copyright', 'danlet' ),
                'default'  => 'danlet. Ltd',
                'subtitle' => esc_html__( 'Use any of the features of WordPress editor inside your panel!','danlet' ),
            ),
        )
    ) );

    // -> START Main menu option
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Main menu setting','danlet' ),
        'id'               => 'main-menu',
        'desc'             => esc_html__( 'These are something setting for main menu!','danlet' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-cogs',
        'fields'           => array(
            array(
                'id'       => 'title-menu-text',
                'type'     => 'typography',
                'title'    => esc_html__( 'Title menu typography','danlet' ),
                'output' => array(
                    'nav .acd-main-menu li a'
                ),
                'subtitle' => esc_html__( 'Specify the body font properties.','danlet' ),
                'google'   => true,
            ),

            array(
                'id'        => 'title-menu-text-hover',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Title menu hover color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output' => array(
                    'nav .acd-main-menu li a:hover',
                ),
                'mode'      => 'color',
            ),

            array(
                'id'        => 'main-navigation-sub-color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Menu dropdowns BG Color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output' => array(
                    'nav .acd-main-menu li .sub-menu li'
                ),
                'mode'      => 'background',
            ),

            array(
                'id'       => 'title-submenu-text',
                'type'     => 'typography',
                'title'    => esc_html__( 'Title submenu typography','danlet' ),
                'output' => array(
                    'nav .acd-main-menu li .sub-menu li a'
                ),
                'subtitle' => esc_html__( 'Specify the body font properties.','danlet' ),
                'header .position-menu .main-menu ul li.menu-item-has-children .sub-menu li',
                'google'   => true,
            ),

            array(
                'id'        => 'title-submenu-text-hover',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Title submenu hover color','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output' => array(
                    'nav .acd-main-menu li .sub-menu li a:hover'
                ),
                'mode'      => 'color',
            ),

            array(
                'id'        => 'main-navigation-sub-color-hover',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Menu dropdowns BG Color hover','danlet' ),
                'subtitle'  => esc_html__( 'Gives you the RGBA color.','danlet' ),
                'output' => array(
                    'nav .acd-main-menu li .sub-menu li:hover'
                ),
                'mode'      => 'background',
            ),
        )
    ) );

    // -> START Styling option
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Styling options','danlet' ),
        'id'               => 'styling',
        'desc'             => esc_html__( 'These are something setting for Styling options!','danlet' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-cogs',
        'fields'            => array(
            array(
                'id'       => 'background-body',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Background body color','danlet' ),
                'output'   => array('body'),
                'mode'      => 'background',
                'subtitle' => esc_html__( 'Specify the body color.','danlet' ),
                'google'   => true,
                'default'   => 'f7f7f7',
            ),
        )
    ) );

    // -> START Custom header option
    Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Theme style setting','danlet' ),
        'id'                => 'theme-color',
        'subsection'        => true,
        'customizer_width'  => '450px',
        'fields'            => array(
            array(
                'id'       => 'text-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Text body setting','danlet' ),
                'output'   => array('body'),
                'subtitle' => esc_html__( 'Specify the body font properties.','danlet' ),
                'google'   => true,
            ),
            array(
                'id'       => 'link-body-full',
                'type'     => 'typography',
                'title'    => esc_html__( 'Link body setting','danlet' ),
                'output'   => array('a'),
                'subtitle' => esc_html__( 'Specify the body font properties.','danlet' ),
                'google'   => true,
            ),
            array(
                'id'       => 'link-body-full-hover',
                'type'     => 'typography',
                'title'    => esc_html__( 'Link body hover setting','danlet' ),
                'output'   => array('a:hover'),
                'subtitle' => esc_html__( 'Specify the body font properties.','danlet' ),
                'google'   => true,
            ),
            array(
                'id'       => 'title-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Title body color','danlet' ),
                'output'   => array('.danlet-title'),
                'subtitle' => esc_html__( 'Specify the body font properties.','danlet' ),
                'google'   => true,
            ),
        )
    ) );

    // -> START Custom header option
    Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Button color','danlet' ),
        'id'                => 'button-color',
        'subsection'        => true,
        'customizer_width'  => '450px',
        'fields'            => array(
            array(
                'id'       => 'text-button',
                'type'     => 'typography',
                'title'    => esc_html__( 'Text button color','danlet' ),
                'output'   => array('.danlet-button-o'),
                'subtitle' => esc_html__( 'Specify the button font properties.','danlet' ),
                'google'   => true,
            ),
            array(
                'id'       => 'text-button-hover',
                'type'     => 'typography',
                'title'    => esc_html__( 'Text button color hover','danlet' ),
                'output'   => array('.danlet-button-o:hover'),
                'subtitle' => esc_html__( 'Specify the button font properties.','danlet' ),
                'google'   => true,
            ),
            array(
                'id'       => 'background-button',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Background button color','danlet' ),
                'output'   => array('.danlet-button-o'),
                'mode'      => 'background',
                'google'   => true,
            ),
            array(
                'id'       => 'background-button-hover',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Background button color hover','danlet' ),
                'output'   => array('.danlet-button-o:hover'),
                'mode'      => 'background',
                'google'   => true,
            ),
            array(
                'id'       => 'border-button',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Border button color','danlet' ),
                'output'   => array('.danlet-button-o'),
                'google'   => true,
            ),
            array(
                'id'       => 'border-button-hover',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Border button color hover','danlet' ),
                'output'   => array('.danlet-button-o:hover'),
                'google'   => true,
            ),
        )
    ) );

    // -> START shop option
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social setting','danlet' ),
        'id'               => 'social',
        'customizer_width' => '500px',
        'icon'             => 'el el-thumbs-up',
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social to show','danlet' ),
        'id'               => 'social-link-show',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'show-social-link',
                'type'     => 'select',
                'multi'    => true,
                'title'    => esc_html__( 'Social to show','danlet' ),
                'subtitle' => esc_html__( 'Select your social link you want to show','danlet' ),
                'desc'     => esc_html__( 'Chose your social you want to show in your website.','danlet' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'facebook'      => 'Facebook',
                    'twitter'       => 'Twitter',
                    'google-plus'   => 'Google Plus',
                    'pinterest'     => 'Pinterest',
                    'linkedin'      => 'Linked in',
                    'instagram'     => 'Instagram',
                    'github'        => 'GitHub',
                    'behance'       => 'Behance',
                    'tumblr'        => 'Tumblr',
                    'soundcloud'    => 'Sound cloud',
                    'dribbble'      => 'Dribbble',
                    'rss'           => 'Rss',
                ),
                'default'  => array( 'facebook', 'twitter','google-plus' )
            ),

        )
    ) );

     Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social link','danlet' ),
        'id'               => 'social-link',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'beau-facebook',
                'type'     => 'text',
                'title'    => esc_html__( 'Your facebook url', 'danlet' ),
            ),
            array(
                'id'       => 'beau-twitter',
                'type'     => 'text',
                'title'    => esc_html__( 'Your twitter url', 'danlet' ),
            ),
            array(
                'id'       => 'beau-linkedin',
                'type'     => 'text',
                'title'    => esc_html__( 'Your linkedin url', 'danlet' ),
            ),
            array(
                'id'       => 'beau-youtube',
                'type'     => 'text',
                'title'    => esc_html__( 'Your youtube url', 'danlet' ),
            ),
            array(
                'id'       => 'beau-google-plus',
                'type'     => 'text',
                'title'    => esc_html__( 'Your google plus url', 'danlet' ),
            ),
            array(
                'id'       => 'beau-pinterest',
                'type'     => 'text',
                'title'    => esc_html__( 'Your pinterest url', 'danlet' ),
            ),
            array(
                'id'       => 'beau-linkedin',
                'type'     => 'text',
                'title'    => esc_html__( 'Your linkedin url', 'danlet' ),
            ),
            array(
                'id'       => 'beau-instagram',
                'type'     => 'text',
                'title'    => esc_html__( 'Your instagram url', 'danlet' ),
            ),
            array(
                'id'       => 'beau-github',
                'type'     => 'text',
                'title'    => esc_html__( 'Your github url', 'danlet' ),
            ),
            array(
                'id'       => 'beau-behance',
                'type'     => 'text',
                'title'    => esc_html__( 'Your behance url', 'danlet' ),
            ),
            array(
                'id'       => 'beau-tumblr',
                'type'     => 'text',
                'title'    => esc_html__( 'Your tumblr url', 'danlet' ),
            ),
            array(
                'id'       => 'beau-soundcloud',
                'type'     => 'text',
                'title'    => esc_html__( 'Your soundcloud url', 'danlet' ),
            ),
            array(
                'id'       => 'beau-dribbble',
                'type'     => 'text',
                'title'    => esc_html__( 'Your dribbble url', 'danlet' ),
            ),
            array(
                'id'       => 'beau-rss',
                'type'     => 'text',
                'title'    => esc_html__( 'Your rss url', 'danlet' ),
            ),

        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Mailchimp API','danlet' ),
        'id'               => 'social-mailchimp',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'mailchimp-api',
                'type'     => 'text',
                'title'    => esc_html__( 'Your mailchimp API','danlet' ),
                'subtitle' => esc_html__( 'Grab an API Key from http://admin.mailchimp.com/account/api/','danlet' ),
            ),

             array(
                'id'        => 'mailchimp-groupid',
                'type'      => 'text',
                'title'     => esc_html__( 'Your group id','danlet' ),
                'subtitle'  => esc_html__( 'Grab your List\'s Unique Id by going http://admin.mailchimp.com/lists/ . Click the "settings" link for the list - the Unique Id is at the bottom of that page.','danlet' ),
            ),

        )
    ) );


    // Your Typo setting
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Typography setting','danlet' ),
        'id'               => 'typography',
        'customizer_width' => '500px',
        'icon'             => 'el el-font',
        'fields'           => array(
            array(
                'id'       => 'h1-element',
                'type'     => 'typography',
                'title'    => esc_html__( 'H1 element','danlet' ),
                'subtitle' => esc_html__( 'Specify the h1 font properties.','danlet' ),
                'output'    => array('h1'),
                'google'   => true,
            ),
            array(
                'id'       => 'h2-element',
                'type'     => 'typography',
                'title'    => esc_html__( 'H2 element','danlet' ),
                'subtitle' => esc_html__( 'Specify the h2 font properties.','danlet' ),
                'output' => array('h2'),
                'google'   => true,
            ),
            array(
                'id'       => 'h3-element',
                'type'     => 'typography',
                'title'    => esc_html__( 'H3 element','danlet' ),
                'subtitle' => esc_html__( 'Specify the h3 font properties.','danlet' ),
                'output' => array('h3'),
                'google'   => true,
            ),
            array(
                'id'       => 'h4-element',
                'type'     => 'typography',
                'title'    => esc_html__( 'H4 element','danlet' ),
                'subtitle' => esc_html__( 'Specify the h4 font properties.','danlet' ),
                'output'   => array('h4'),
                'google'   => true,
            ),
            array(
                'id'       => 'h5-element',
                'type'     => 'typography',
                'title'    => esc_html__( 'H5 element','danlet' ),
                'subtitle' => esc_html__( 'Specify the h5 font properties.','danlet' ),
                'output'   => array('h5'),
                'google'   => true,
            ),
            array(
                'id'       => 'h6-element',
                'type'     => 'typography',
                'title'    => esc_html__( 'H6 element','danlet' ),
                'subtitle' => esc_html__( 'Specify the h6 font properties.','danlet' ),
                'output' => array('h6'),
                'google'   => true,
            ),
        )
    ) );

    //-> Start product
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Product setting','danlet' ),
        'id'               => 'product',
        'customizer_width' => '500px',
        'icon'             => 'el el-shopping-cart-sign',
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Archive Product option','danlet' ),
        'id'               => 'product-archive',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'danlet-cover-shop',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Cover Shop', 'danlet' ),
                'compiler' => 'true',
            ),
            array(
                'id'       => 'product-archive-style',
                'type'     => 'select',
                'title'    => esc_html__( 'Display style archives', 'danlet' ),
                'options'   =>  $archive_product,
            ),
            array(
                'id'       => 'product-archive-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Display style archives', 'danlet' ),
                'default'  =>  'Our Store',
                'subtitle' => esc_html__('Feature display title archive','danlet')
            ),
        )
    ));
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Detail Product option','danlet' ),
        'id'               => 'product-detail',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'product-style',
                'type'     => 'select',
                'title'    => esc_html__( 'Display style archives', 'danlet' ),
                'options'   =>  $product_detail,
            ),
             array(
                'id'       => 'product-detail-ex',
                'type'     => 'editor',
                'title'    => esc_html__( 'Display style archives', 'danlet' ),
                'default'  =>  'This item is in stock Expected delivery by: 12h',
                'subtitle' => esc_html__('Feature display title short text product','danlet')
            ),
            array(
                'id'       => 'enable-product-subscriber',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Show Subscriber Form ?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '0',
            ),
        )
    ));
    // -> START Blog option
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog options','danlet' ),
        'id'               => 'blog',
        'desc'             => esc_html__( 'These are something setting for Styling options!','danlet' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-cogs',
    ) );

    // -> START Custom header option
    Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Blog archive option','danlet' ),
        'id'                => 'blog-archive',
        'subsection'        => true,
        'customizer_width'  => '450px',
        'fields'            => array(
            array(
                'id'       => 'danlet-cover-blog-arc',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Cover Blog', 'danlet' ),
                'compiler' => 'true',
            ),
            array(
                'id'       => 'enable-date-archive-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable date time?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),

            array(
                'id'       => 'enable-title-archive-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable title?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),
            array(
                'id'       => 'enable-excerpt-archive-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable excerpt?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'
            ),

            array(
                'id'       => 'enable-tags-archive-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable tags?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),

            array(
                'id'       => 'enable-category-archive-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable category time?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),

            array(
                'id'       => 'enable-readmore-archive-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable readmore?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),

            array(
                'id'       => 'enable-thumbnail-archive-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable thumbnail?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),
        )
    ) );

    // -> START Custom header option
    Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Blog single option','danlet' ),
        'id'                => 'blog-single',
        'subsection'        => true,
        'customizer_width'  => '450px',
        'fields'            => array(
            array(
                'id'       => 'enable-breadcrumb-single-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable breadcrumb?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),
            array(
                'id'       => 'enable-cover-image-single-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable cover image?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),
            array(
                'id'       => 'enable-title-single-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable title?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),


            array(
                'id'       => 'enable-date-single-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable datetime post?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),

            array(
                'id'       => 'enable-author-single-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable author?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),

            array(
                'id'       => 'enable-number-comment-single-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable number comment?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),

            array(
                'id'       => 'enable-tags-single-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable tags?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),

            array(
                'id'       => 'enable-social-single-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable social?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),
            array(
                'id'       => 'enable-next-single-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable next post?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'

            ),
            array(
                'id'       => 'enable-profile-author-single-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable profile author?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'enable-comment-single-blog',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable comment?','danlet' ),
                'options'  => array(
                    '1'    => 'Yes',
                    '0'    => 'No',
                ),
                'default'  => '1'
            ),
        )
    ) );

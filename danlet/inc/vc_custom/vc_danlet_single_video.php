<?php
/**
 * single video
 */
if (!class_exists('WPBakeryShortCode_danlet_single_video')) {
    add_action( 'vc_before_init', 'danlet_single_video', 999999);
    function danlet_single_video() {
      vc_map( array(
            "name" => esc_html__( "Single Video","danlet" ),
            "base" => "danlet_single_video",
            'weight' => 100,
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            "params" => array(

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Options', 'danlet'),
                'param_name' => 'option',
                'value' => array(
                    esc_html__('Select','danlet') => '',
                    esc_html__('No video','danlet') => 'novideo',
                    esc_html__('Width video','danlet') => 'video',
                ),
                'admin_label' => true,
                'group' => esc_html__('General', 'danlet'),
            ),

            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title element', 'danlet' ),
                'param_name' => 'title_element',
                'value' => '',
                'admin_label' => true,
                'description' => esc_html__( 'The title of element.', 'danlet' ),
                'group' => esc_html__('General', 'danlet'),
            ),

            array(
                'type' => 'vc_link',
                'heading' => esc_html__( 'Link button', 'danlet' ),
                'param_name' => 'link_button',
                'value' => '',
                'description' => esc_html__( 'Link button of banner.', 'danlet' ),
                'group' => esc_html__('General', 'danlet'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Url video youtube or vimeo', 'danlet' ),
                'param_name' => 'url_video',
                'value' => '',
                'admin_label' => true,
                'description' => esc_html__( 'Ex: https://www.youtube.com/embed/ZCg81dvVM3U or https://player.vimeo.com/video/180222262', 'danlet' ),
                'group' => esc_html__('General', 'danlet'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'danlet' ),
                'param_name' => 'icon_openiconic',
                'settings' => array(
                    'emptyIcon' => false, // default true, display an "EMPTY" icon?
                    'type' => 'openiconic',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
                ),
                'group' => esc_html__('General', 'danlet'),
            ),

            //Custom style color
            array(
                "type"          => "colorpicker",
                "class"         => "",
                "heading"       => esc_html__( "Title color", "danlet" ),
                "param_name"    => "textcolor",
                "value"         => '',
                "description"   => esc_html__( "Color for title on shortcode", "danlet" ),
                'group' => esc_html__('Color Settings','danlet'),
            ),
            // Setting SVG
            array(
                  'type' => 'checkbox',
                  'heading' => esc_html__( 'Enable 3th SVG Bottom', 'danlet' ),
                  'param_name' => 'enable_svg_3th',
                  'value' => array(esc_html__('Yes','danlet') => 'yes'),
                    'group' => esc_html__('SVG','danlet'),
                    'admin_label' => true,
                    'std'   =>  '',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( '3th SVG Bottom Color', 'danlet' ),
                'param_name' => 'color_enable_svg_3th',
                'group' => esc_html__('SVG','danlet'),
                 'dependency'  => array(
                        'element'     => 'enable_svg_3th',
                        'value'      => array( 'yes'),
                            ),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Set height for create triangle svg top', 'danlet' ),
                'param_name' => 'acd_svg_location_top',
                'value' => array(
                    esc_html__('Select ...','danlet') =>  '',
                    esc_html__('SVG top triangle left','danlet')       => 'svgtopleft',
                    esc_html__('SVG top triangle right','danlet')      => 'svgtopright',
                ),
                'description' => esc_html__( 'Setting height triangle svg', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Set height for create triangle svg', 'danlet' ),
                'param_name' => 'acd_svg_location_bottom',
                'value' => array(
                    esc_html__('Select ...','danlet') =>  '',
                    esc_html__('SVG bottom triangle left','danlet')    => 'svgbottomleft',
                    esc_html__('SVG bottom triangle right','danlet')   => 'svgbottomright',
                ),
                'description' => esc_html__( 'Setting height triangle svg', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Set height for create triangle svg', 'danlet' ),
                'param_name' => 'acd_svg_height_number',
                'value' => 175,
                'description' => esc_html__( 'Setting height triangle svg', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Background svg top', 'danlet' ),
                'param_name' => 'acd_svg_bg_top',
                'description' => esc_html__( 'Setting background SVG top', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Background svg bottom', 'danlet' ),
                'param_name' => 'acd_svg_bg_bottom',
                'description' => esc_html__( 'Setting background SVG bottom', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Prioritize location top svg as "z-index" of css ex: (z-index:3;) ', 'danlet' ),
                'param_name' => 'acd_svg_prio_top',
                'value' => 3,
                'description' => esc_html__( 'Setting Prioritize location svg number', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Prioritize location bottom svg as "z-index" of css ex: (z-index:3;) ', 'danlet' ),
                'param_name' => 'acd_svg_prio_bottom',
                'value' => 3,
                'description' => esc_html__( 'Setting Prioritize location svg number', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
            ),
            //Example make css editor for shortcode

            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'danlet' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'danlet' ),
            ),
            array(
                'type'        => 'hidden',
                'heading'     => esc_html__( 'Short code id', 'danlet' ),
                'param_name'  => '_shortcode_id',
                'value'       => '_sc_id_'.time(),
            ),
          ),
       )
      );
    }

    class WPBakeryShortCode_danlet_single_video extends WPBakeryShortCode {};
}
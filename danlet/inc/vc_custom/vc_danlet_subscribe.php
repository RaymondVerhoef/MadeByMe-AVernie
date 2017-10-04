<?php
/**
 * @author  shadow
 * subcribe
 */
if (!class_exists('WPBakeryShortCode_danlet_subcrible')) {
    add_action( 'vc_before_init', 'danlet_subcrible', 999999);
    function danlet_subcrible() {
        vc_map( array(
            "name" => esc_html__( "Subscribe ","danlet" ),
            "base" => "danlet_subcrible",
            'weight' => 60,
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            "params" => array(
              //General setting
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title  ', 'danlet' ),
                    'param_name' => 'acd_subcribe_title',
                    'admin_label'   => true,
                    'description' => esc_html__( 'The title for subcribe.', 'danlet' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Text placeholder for subcrible', 'danlet' ),
                    'param_name' => 'acd_subcribe_placedolder',
                    'description' => esc_html__( 'The title for subcribe.', 'danlet' ),
                    'admin_label'   => true,
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon', 'danlet' ),
                    'param_name' => 'icon_fontawesome',
                    'value' => 'fa fa-paper-plane',
                    'settings' => array(
                        'emptyIcon' => false,
                        'iconsPerPage' => 100,
                    ),
                    'admin_label'   => true,
                ),
              //color subcrible setting
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Color title Subcrible', 'danlet' ),
                    'param_name' => 'acd_subcribe_color_title',
                    'description' => esc_html__( 'Setting color title subcrible', 'danlet' ),
                    'group' => esc_html__('Color setting','danlet'),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Color placeholder text-input subcrible', 'danlet' ),
                    'param_name' => 'acd_subcribe_color_placeholder',
                    'description' => esc_html__( 'Setting color placeholder', 'danlet' ),
                    'group' => esc_html__('Color setting','danlet'),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Color icon button', 'danlet' ),
                    'param_name' => 'acd_subcribe_color_icon_button',
                    'description' => esc_html__( 'Setting color icon button', 'danlet' ),
                    'group' => esc_html__('Color setting','danlet'),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Background setting input text', 'danlet' ),
                    'param_name' => 'acd_subcribe_bg_input',
                    'description' => esc_html__( 'Setting color icon button', 'danlet' ),
                    'group' => esc_html__('Color setting','danlet'),
                ),
                  // Setting SVG
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Set height for create triangle svg top', 'danlet' ),
                    'param_name' => 'acd_svg_location_top',
                    'value' => array(
                        'none'                        => 'Choose SVG top',
                        'SVG top triangle left'       => 'svgtopleft',
                        'SVG top triangle right'      => 'svgtopright',
                    ),
                    'description' => esc_html__( 'Setting height triangle svg', 'danlet' ),
                    'group' => esc_html__('SVG','danlet'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Set height for create triangle svg', 'danlet' ),
                    'param_name' => 'acd_svg_location_bottom',
                    'value' => array(
                        'none'                        => 'Choose SVG top',
                        'SVG bottom triangle left'    => 'svgbottomleft',
                        'SVG bottom triangle right'   => 'svgbottomright',
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
                    'heading' => esc_html__( 'Prioritize location top svg as "z-index" of css ex: (z-index:0;) ', 'danlet' ),
                    'param_name' => 'acd_svg_prio_top',
                    'description' => esc_html__( 'Setting Prioritize location svg number', 'danlet' ),
                    'group' => esc_html__('SVG','danlet'),
                  ),
                  array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Prioritize location bottom svg as "z-index" of css ex: (z-index:0;) ', 'danlet' ),
                    'param_name' => 'acd_svg_prio_bottom',
                    'description' => esc_html__( 'Setting Prioritize location svg number', 'danlet' ),
                    'group' => esc_html__('SVG','danlet'),
                  ),
                  // insert field
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html('Background search', 'danlet'),
                    'param_name' => 'acd_background_search',
                    'description' => esc_html__( 'Setting the backgorund', 'danlet' ),
                    'group' => esc_html__('SVG', 'danlet'),
                ),

                array(
                    'type'          => 'textfield',
                    'heading'       => esc_html__('Extra class name', 'danlet'),
                    'param_name'    => 'extra_class',
                    'group'         => esc_html__('Design options', 'danlet'),
                ),

                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('Css', 'danlet'),
                    'param_name' => 'css',
                    'group' => esc_html__('Design options', 'danlet'),
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
    class WPBakeryShortCode_danlet_subcrible extends WPBakeryShortCode {};
}
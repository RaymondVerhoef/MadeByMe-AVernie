<?php
/**
 * Maps
 */
if (!class_exists('WPBakeryShortCode_danlet_map')) {
    add_action( 'vc_before_init', 'danlet_map', 999999);
    function danlet_map() {
        vc_map( array(
            "name" => esc_html__( "Google Map","danlet" ),
            "base" => "danlet_map",
            'weight' => 100,
            'icon'      => 'vc_beautheme',

            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            "params" => array(
              //General setting
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Coordinates map', 'danlet' ),
                'param_name' => 'acd_coordinate',
                'description' => esc_html__( 'ex: 40.653555, -73.859024', 'danlet' ),
              ),
              array(
                'type' => 'textarea_raw_html',
                'heading' => esc_html__( 'Style ', 'danlet' ),
                'param_name' => 'acd_style',
                'description' => esc_html__( 'Choose in https://snazzymaps.com/', 'danlet' ),
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
                'value' => 0,
                'description' => esc_html__( 'Setting Prioritize location svg number', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
              ),
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Prioritize location bottom svg as "z-index" of css ex: (z-index:0;) ', 'danlet' ),
                'param_name' => 'acd_svg_prio_bottom',
                'value' => 0,
                'description' => esc_html__( 'Setting Prioritize location svg number', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
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
    class WPBakeryShortCode_danlet_map extends WPBakeryShortCode {};
}
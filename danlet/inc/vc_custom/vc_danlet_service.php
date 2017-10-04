<?php
/**
 * service
 */
if (!class_exists('WPBakeryShortCode_danlet_service')) {
    add_action( 'vc_before_init', 'danlet_service', 999999);
    function danlet_service() {
        vc_map( array(
            "name" => esc_html__( "Service ","danlet" ),
            "base" => "danlet_service",
            'weight' => 100,
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Title service", "danlet"),
                    "param_name" => "title",
                    "value" => '',
                    "description" => esc_html__( "General", 'danlet' ),
                     'group' => esc_html__('General', 'danlet'),
                ),

                // setting color
                array(
                    'type'      => 'colorpicker',
                    'heading'   =>  esc_html__('Color text name', 'danlet'),
                    'param_name'=> 'text_color',
                    'description'    => esc_html__('Setting color title', 'danlet'),
                     'group' => esc_html__('General', 'danlet'),
                ),
                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__('Vertical position', 'danlet'),
                    'param_name' => 'vertical',
                    'value' => array(esc_html__('Yes','danlet') => 'yes'),
                    'group' => esc_html__('General', 'danlet'),


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
    class WPBakeryShortCode_danlet_service extends WPBakeryShortCode {};
}
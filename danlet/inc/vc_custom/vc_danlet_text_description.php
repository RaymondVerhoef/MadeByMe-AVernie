<?php
/**
 * @author Shadow
 * @edit VNMilky 06/12/2016
 * text_description
 */
if (!class_exists('WPBakeryShortCode_danlet_text_description')) {
    add_action( 'vc_before_init', 'danlet_text_description', 999999);
    function danlet_text_description() {
        vc_map( array(
            "name" => esc_html__( "Text Description","danlet" ),
            "base" => "danlet_text_description",
            'weight' => 100,
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            'params' => array(
                // General
                array(
                    'type' => 'textfield',
                    'heading'=> esc_html__('Title Element', 'danlet'),
                    'param_name' => 'text_title',
                    'admin_label'   =>  true,
                ),
                array(
                    'type' => 'textarea',
                    'heading'=> esc_html__('Description', 'danlet'),
                    'param_name' => 'text_description',
                    'admin_label'   =>  true,
                ),
                // Setting color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Title Element', 'danlet' ),
                    'param_name' => 'color_text_title',
                    'group' => esc_html__('Color Settings','danlet'),
                ),

                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Description', 'danlet' ),
                    'param_name' => 'color_text_description',
                    'group' => esc_html__('Color Settings','danlet'),
                ),
                // Css
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
    class WPBakeryShortCode_danlet_text_description extends WPBakeryShortCode {}
}
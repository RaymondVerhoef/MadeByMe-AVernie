<?php
/**
 * @author Shadow
 * @edit VNMilky 06/12/2016
 * about_level
 */
if (!class_exists('WPBakeryShortCode_danlet_about_level')) {
    add_action( 'vc_before_init', 'danlet_about_level', 999999);
    function danlet_about_level() {
        vc_map( array(
            "name" => esc_html__( "About Level","danlet" ),
            "base" => "danlet_about_level",
            'weight' => 130,
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            'params' => array(
                // General
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Option','danlet'),
                    'param_name' => 'option',
                    'admin_label'   => true,
                    'edit_field_class'  => 'vc_col-xs-6',
                    'value' => array(
                        esc_html__('Select', 'danlet') => '',
                        esc_html__('Left', 'danlet') => 'left',
                        esc_html__('Right', 'danlet') => 'right',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Social','danlet'),
                    'param_name' => 'social',
                    'admin_label'   => true,
                    'edit_field_class'  => 'vc_col-xs-6 vc_rs_pdt',
                    'value' => array(
                        esc_html__('Select', 'danlet') => '',
                        esc_html__('Enable', 'danlet') => 'enable',
                        esc_html__('Disable', 'danlet') => 'disable',
                    ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description level', 'danlet'),
                    'param_name' => 'desc_level',
                    'admin_label'   => true,
                ),

                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'danlet'),
                    'param_name' => 'content_level',
                    'admin_label'   => true,
                ),

                array( // img big
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Big Image', 'danlet' ),
                    'param_name' => 'big_image',
                    'edit_field_class'  => 'vc_col-xs-6',
                    'admin_label'   => true,
                ),

                array( // img small
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Small Image', 'danlet' ),
                    'param_name' => 'small_image',
                    'edit_field_class'  => 'vc_col-xs-6',
                    'admin_label'   => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Facebook', 'danlet'),
                    'param_name' => 'link_face',
                    'group' => esc_html__('Social Settings', 'danlet'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Google Plus', 'danlet'),
                    'param_name' => 'link_google',
                    'group' => esc_html__('Social Settings', 'danlet'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Twitter', 'danlet'),
                    'param_name' => 'link_twitter',
                    'group' => esc_html__('Social Settings', 'danlet'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Youtube', 'danlet'),
                    'param_name' => 'link_youtube',
                    'group' => esc_html__('Social Settings', 'danlet'),
                ),

                // Setting color

                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Description', 'danlet' ),
                    'param_name' => 'desccolor',
                    'group' => esc_html__('Color Settings','danlet'),
                ),

                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Content', 'danlet' ),
                    'param_name' => 'contcolor',
                    'group' => esc_html__('Color Settings','danlet'),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Social', 'danlet' ),
                    'param_name' => 'social_color',
                    'group' => esc_html__('Color Settings','danlet'),
                ),

                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Background', 'danlet' ),
                    'param_name' => 'bgcolor',
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
    class WPBakeryShortCode_danlet_about_level extends WPBakeryShortCode {}
}
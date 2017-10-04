<?php
/**
 * User
 */
if (!class_exists('WPBakeryShortCode_danlet_user')) {
    add_action( 'vc_before_init', 'danlet_user', 999999);
    function danlet_user() {
        vc_map( array(
            "name" => esc_html__( "User","danlet" ),
            "base" => "danlet_user",
            'weight' => 50,
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            'params' => array(
                // General
                array(
                    'type' => 'textfield',
                    'heading'=> esc_html__('Title infomation user', 'danlet'),
                    'param_name' => 'info_user',
                    'group' => esc_html__('General', 'danlet'),
                ),

                    array(
                    'type' => 'textfield',
                    'heading'=> esc_html__('Description infomation user', 'danlet'),
                    'param_name' => 'desc_user',
                    'group' => esc_html__('General', 'danlet'),
                ),

                // Color setting
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Color title ', 'danlet' ),
                    'param_name' => 'titlecolor',
                    'group' => esc_html__('Setting color','danlet'),
                ),

                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Color title ', 'danlet' ),
                    'param_name' => 'titlecolor',
                    'group' => esc_html__('Setting color','danlet'),
                ),


                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Color description ', 'danlet' ),
                    'param_name' => 'desccolor',
                    'group' => esc_html__('Setting color','danlet'),
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
    class WPBakeryShortCode_danlet_user extends WPBakeryShortCode {}
}
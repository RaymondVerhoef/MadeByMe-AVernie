<?php
/**
 * info_text_about
 */
if (!class_exists('WPBakeryShortCode_danlet_info_text_about')) {
    add_action( 'vc_before_init', 'danlet_info_text_about', 999999);
    function danlet_info_text_about() {
        vc_map( array(
            "name" => esc_html__( "Text About","danlet" ),
            "base" => "danlet_info_text_about",
            'weight' => 130,
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            "params" => array(
              //General setting
              array(
                  'type' => 'checkbox',
                  'heading' => esc_html__( 'View More', 'danlet' ),
                  'param_name' => 'acd_vm',
                  'edit_field_class'  => 'vc_col-xs-3',
                  'value' => array(esc_html__('Yes','danlet') => 'yes'),
                ),
              array(
                    'type'          =>  'vc_link',
                    'heading'       =>  esc_html__('Link','danlet'),
                    'param_name'    =>  'sh_link',
                    'admin_label'       =>  true,
                    'edit_field_class'  => 'vc_col-xs-9 vc_rs_pdt'
                ),
              array(
                'type' => 'textarea_html',
                'heading' => esc_html__( 'Content Info', 'danlet' ),
                'param_name' => 'content',
                'description' => esc_html__( 'Input your content Info', 'danlet' ),
              ),
             // Shadow

            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Color link', 'danlet'),
                'param_name' => 'color_link',
                'description' => esc_html__('Setting color link', 'danlet'),
                'group' => esc_html__('Setting color', 'danlet'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Color background', 'danlet'),
                'param_name' => 'color_bg',
                'description' => esc_html__('Setting color link', 'danlet'),
                'group' => esc_html__('Setting color', 'danlet'),
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
    class WPBakeryShortCode_danlet_info_text_about extends WPBakeryShortCode {};
}

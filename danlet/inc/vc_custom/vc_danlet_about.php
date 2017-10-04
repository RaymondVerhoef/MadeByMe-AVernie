<?php
/**
 * @author Shadow
 * @edit VNMilky 06/12/2016
 * about
 */
if (!class_exists('WPBakeryShortCode_danlet_about')) {
    add_action( 'vc_before_init', 'danlet_about', 999999);
    function danlet_about() {
        vc_map( array(
            "name" => esc_html__( "About ","danlet" ),
            "base" => "danlet_about",
            'weight' => 130,
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            "params" => array(
              //General setting
              array( // name
                'type' => 'textfield',
                'heading' => esc_html__( 'Title About ', 'danlet' ),
                'param_name' => 'acd_title',
                'edit_field_class'  => 'vc_col-xs-9'
              ),
              array(
                  'type' => 'checkbox',
                  'heading' => esc_html__( 'Float:Left', 'danlet' ),
                  'param_name' => 'acd_absolute',
                  'value' => array(esc_html__('Yes','danlet') => 'yes'),
                  'edit_field_class'  => 'vc_col-xs-3'
                ),
              array( // desc
                'type' => 'textarea',
                'heading' => esc_html__( 'Description About', 'danlet' ),
                'param_name' => 'acd_desc',
                'description' => esc_html__( 'Input your description about', 'danlet' ),
              ),
              array( // content
                'type' => 'textarea_html',
                'heading' => esc_html__( 'Content About', 'danlet' ),
                'param_name' => 'content',
                'description' => esc_html__( 'Input your content about', 'danlet' ),
              ),
                array(
                  'type' => 'checkbox',
                  'heading' => esc_html__( 'View More', 'danlet' ),
                  'param_name' => 'acd_vm',
                  'value' => array(esc_html__('Yes','danlet') => 'yes'),
                  'edit_field_class'  => 'vc_col-xs-3'

                ),
                array(
                    'type'          =>  'vc_link',
                    'heading'       =>  esc_html__('Link','danlet'),
                    'param_name'    =>  'sh_link',
                    'edit_field_class'  => 'vc_col-xs-9',
                    'admin_label'       =>  true,
                ),
               array( // img big
                'type' => 'attach_images',
                'heading' => esc_html__( 'Big Image', 'danlet' ),
                'param_name' => 'big_image',
                'description' => esc_html__( 'Input big image', 'danlet' ),
                'edit_field_class'  => 'vc_col-xs-6'
              ),
              array( // img small
                'type' => 'attach_images',
                'heading' => esc_html__( 'Small Image', 'danlet' ),
                'param_name' => 'small_image',
                'description' => esc_html__( 'Input small image', 'danlet' ),
                'edit_field_class'  => 'vc_col-xs-6'
              ),
              //Setting color
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color title about', 'danlet' ),
                'param_name' => 'acd_color_title',
                'description' => esc_html__( 'Setting color title about', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color description about', 'danlet' ),
                'param_name' => 'acd_color_desc',
                'description' => esc_html__( 'Setting color placeholder', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color content about', 'danlet' ),
                'param_name' => 'acd_color_content',
                'description' => esc_html__( 'Setting color icon button', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color link about', 'danlet' ),
                'param_name' => 'acd_color_link',
                'description' => esc_html__( 'Setting color link about', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
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
    class WPBakeryShortCode_danlet_about extends WPBakeryShortCode {};
}
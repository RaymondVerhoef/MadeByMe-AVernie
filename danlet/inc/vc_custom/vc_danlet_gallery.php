<?php
/**
 * @author Shadow
 * @edit VNMilky 06/12/2016
 * gallery
 */
if(!class_exists('WPBakeryShortCode_danlet_gallery')) {
    add_action('vc_before_init', 'danlet_gallery', 999999);
    function danlet_gallery() {
        vc_map( array(
            'name' => esc_html__('Gallery' , 'danlet'),
            'base' => 'danlet_gallery',
            'weight' => 180,
            'category' => esc_html__('BeauTheme', 'danlet'),
            'icon' => 'vc_beautheme',
            'params' => array(
                // General

                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Option', 'danlet'),
                    'param_name' => 'option',
                    'value' => array(
                        esc_html__('Select', 'danlet') => '',
                        esc_html__('Full Image', 'danlet') => 'full',
                        esc_html__('Slide', 'danlet') => 'slide',
                    ),
                    'admin_label' => true,
                    'group' => esc_html__('General', 'danlet'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title ', 'danlet'),
                    'param_name' => 'title_element',
                    'group' => esc_html__('General', 'danlet'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Description ', 'danlet'),
                    'param_name' => 'desc_element',
                    'group' => esc_html__('General' , 'danlet'),
                    'dependency' => array(
                        'element'     => 'option',
                        'value'      => array( 'full'),
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Show munber view ', 'danlet'),
                    'param_name' => 'view',
                    'group' => esc_html__('General', 'danlet'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Show munber loadmore ', 'danlet'),
                    'param_name' => 'pages',
                    'group' => esc_html__('General', 'danlet'),
                ),
                // data setting
                array(
                   'type'          => 'autocomplete',
                   'heading'       => esc_html__( 'Select gallery show ', 'danlet' ),
                   'param_name'    => 'post_id',
                   'group'     => esc_html__('Data Settings','danlet'),
                    'settings'      => array(
                        'multiple'      => false,
                        'sortable'      => true,
                        'max_length'      => 1,
                        'no_hide'       => true,
                        'groups'        => true,
                        'unique_values'     => true,
                        'display_inline'    => true,
                        'values'        => danlet_get_single_post('gallery')
                      ),
                   'group'     => esc_html__('Data Settings','danlet'),
                ),
                // color setting
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Color title', 'danlet'),
                    'param_name' => 'titlecolor',
                    'group' => esc_html__('Style color', 'danlet'),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Color description', 'danlet'),
                    'param_name' => 'desccolor',
                    'group' => esc_html__('Style color', 'danlet'),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Color link', 'danlet'),
                    'param_name' => 'linkcolor',
                    'group' => esc_html__('Style color', 'danlet'),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Color background', 'danlet'),
                    'param_name' => 'bgcolor',
                    'group' => esc_html__('Style color', 'danlet'),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Color background link', 'danlet'),
                    'param_name' => 'bglinkcolor',
                    'group' => esc_html__('Style color', 'danlet'),
                ),
                // other
                array(
                    'type'      =>  'dropdown',
                    'heading'   =>  esc_html__('Navigation','danlet' ),
                    'param_name'  =>  'option_nav',
                    'group'     => esc_html__('Design options','danlet'),
                    'value'     =>  array(
                      esc_html__('Select ...','danlet') =>  '',
                      esc_html__('Enable','danlet')   =>  'enable',
                      esc_html__('Disable','danlet')  =>  'disable'
                    ),
                ),
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
    class WPBakeryShortCode_danlet_gallery extends WPBakeryShortCode {};
}
<?php
/**
 * @see Shortcode Classes
 * @author VNMilky
 * VC_Custom
 * classes
 */
if (!class_exists('WPBakeryShortCode_danlet_classes')) {
    add_action( 'vc_before_init', 'danlet_classes', 999999);
    function danlet_classes() {
    vc_map( array(
        "name"          => esc_html__( "Class","danlet" ),
        "base"          => "danlet_classes",
        'weight'        => 200,
        'category'      => esc_html__( 'BeauTheme', 'danlet' ),
        'icon'      => 'vc_beautheme',
        "params"        => array(
            //Option Style
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Title Element', 'danlet' ),
              'param_name' => 'sh_title_element',
              'value' => '',
              'edit_field_class'  => 'vc_col-xs-9',
              'admin_label' => true,

            ),
            //Data Option
            //Single_ID

            array(
                'type'          =>  'dropdown',
                'heading'       =>  esc_html__('Position','danlet' ),
                'param_name'    =>  'option_position',
                'edit_field_class'  => 'vc_col-xs-3 vc_rs_pdt',
                'admin_label'   => true,
                'value'         =>  array(
                    esc_html__('Select ...','danlet')      =>  '',
                    esc_html__('Right ','danlet')          =>  'right',
                    esc_html__('Left ','danlet')           =>  'left',
                ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Name Advanced', 'danlet' ),
              'param_name' => 'advanded_name',
              'value' => '',
              'admin_label' => true,
            ),
            array(
              'type' => 'textarea',
              'heading' => esc_html__( 'Description Advanced', 'danlet' ),
              'param_name' => 'advanded_desc',
              'value' => '',
              'admin_label' => true,
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'View more text', 'danlet' ),
              'param_name' => 'view_more',
              'std' => esc_html__('View more' , 'danlet'),
              'description' => esc_html__('For example : See full detail' , 'danlet'),
              'admin_label' => true,
            ),
            array(
              'type' => 'attach_image',
              'heading' => esc_html__( 'Image Advanced', 'danlet' ),
              'param_name' => 'advanded_image',
              'edit_field_class'  => 'vc_col-xs-6',
              'value' => '',
              'admin_label' => true,
            ),
            array(
              'type' => 'attach_image',
              'heading' => esc_html__( 'Image 2 Advanced', 'danlet' ),
              'param_name' => 'advanded_image_2',
              'edit_field_class'  => 'vc_col-xs-6',
              'value' => '',
              'admin_label' => true,
            ),
            //Single ID
            array(
                'type'          => 'autocomplete',
                'heading'       => esc_html__( 'Advanced Level', 'danlet' ),
                'param_name'    => 'single_id',
                'group'     => esc_html__('Data Settings','danlet'),
                'settings'      => array(
                    'multiple'      => false,
                    'sortable'      => true,
                    'max_length'      => 1,
                    'no_hide'       => true, // In UI after select doesn't hide an select list
                    'groups'        => true, // In UI show results grouped by groups
                    'unique_values'     => true, // In UI show results except selected. NB! You should manually check values in backend
                    'display_inline'    => true, // In UI show results inline view
                    'values'        => danlet_get_single_post('level')
                ),
                'group'     => esc_html__('Data Settings','danlet'),
            ),
          //Color Settings
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title', 'danlet' ),
                'param_name' => 'color_title',
                'group' => esc_html__('Color Settings','danlet'),
                'dependency'  => array(
                    'element'       => 'option',
                    'value'      => array('single-big'),
                ),
            ),

            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Name Level Course', 'danlet' ),
                'param_name' => 'color_name_level',
                'group' => esc_html__('Color Settings','danlet'),

            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Name Level Course Hover', 'danlet' ),
                'param_name' => 'color_name_level_hover',
                'group' => esc_html__('Color Settings','danlet'),

            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Description', 'danlet' ),
                'param_name' => 'color_description',
                'group' => esc_html__('Color Settings','danlet'),
                'dependency'  => array(
                    'element'       => 'option',
                    'value'      => array( 'single-small','single-big'),
                    ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Teacher Label', 'danlet' ),
                'param_name' => 'color_teacher_label',
                'group' => esc_html__('Color Settings','danlet'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Button', 'danlet' ),
                'param_name' => 'color_button',
                'group' => esc_html__('Color Settings','danlet'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Teacher', 'danlet' ),
                'param_name' => 'color_teacher',
                'group' => esc_html__('Color Settings','danlet'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Teacher Hover', 'danlet' ),
                'param_name' => 'color_teacher_hover',
                'group' => esc_html__('Color Settings','danlet'),
            ),

            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Background Color', 'danlet' ),
                'param_name' => 'background_color',
                'group' => esc_html__('Color Settings','danlet'),
            ),
            //Example make css editor for shortcode
            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'danlet' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design Options', 'danlet' ),
            ),
            //End VC_map
            array(
              'type'        => 'hidden',
              'heading'     => esc_html__( 'Short code id', 'danlet' ),
              'param_name'  => '_shortcode_id',
              'value'       => '_sc_id_'.time(),
            ),
        ),));
    }
    class WPBakeryShortCode_danlet_classes extends WPBakeryShortCode {}
}

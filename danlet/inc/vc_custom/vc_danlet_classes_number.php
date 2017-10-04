<?php
/**
 * @see Shortcode Classes
 * @author VNMilky
 * VC_Custom
 * class_number
 */
if (!class_exists('WPBakeryShortCode_danlet_classes_number')) {
    add_action( 'vc_before_init', 'danlet_classes_number', 999999);
    function danlet_classes_number() {
    vc_map( array(
        "name"          => esc_html__( "Class (Number)","danlet" ),
        "base"          => "danlet_classes_number",
        'weight'        => 200,
        'category'      => esc_html__( 'BeauTheme', 'danlet' ),
        'icon'      => 'vc_beautheme',
        "params"        => array(
             array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Title Element', 'danlet' ),
              'param_name' => 'sh_title_element',
              'value' => '',
              'admin_label' => true,
            ),
            array(
                'type'          =>  'dropdown',
                'heading'       =>  esc_html__('Position','danlet' ),
                'param_name'    =>  'option_position',
                'admin_label'   => true,
                'value'         =>  array(
                    esc_html__('Select ...','danlet')      =>  '',
                    esc_html__('Right ','danlet')          =>  'right',
                    esc_html__('Left ','danlet')           =>  'left',

                ),
            ),
            //Option Style
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
              'value' => '',
              'admin_label' => true,
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Number Advanced', 'danlet' ),
              'param_name' => 'advanded_number',
              'value' => '',
              'admin_label' => true,
            ),
            array(
              'type' => 'attach_image',
              'heading' => esc_html__( 'Image Advanced', 'danlet' ),
              'param_name' => 'advanded_image',
              'value' => '',
              'admin_label' => true,

            ),
           array(
                'type'          => 'autocomplete',
                'heading'       => esc_html__( 'Single ID', 'danlet' ),
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
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Description', 'danlet' ),
                'param_name' => 'color_description',
                'group' => esc_html__('Color Settings','danlet'),
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
                'heading' => esc_html__( 'Number', 'danlet' ),
                'param_name' => 'color_number',
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
    class WPBakeryShortCode_danlet_classes_number extends WPBakeryShortCode {}
}

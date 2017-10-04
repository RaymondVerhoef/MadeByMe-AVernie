<?php
/**
 * @see Shortcode Classes
 * @author VNMilky
 * VC_Custom
 * class_list
 */
if (!class_exists('WPBakeryShortCode_danlet_classes_list')) {
    add_action( 'vc_before_init', 'danlet_classes_list', 999999);
    function danlet_classes_list() {
    vc_map( array(
        "name"          => esc_html__( "Class List","danlet" ),
        "base"          => "danlet_classes_list",
        'weight'        => 200,
        'category'      => esc_html__( 'BeauTheme', 'danlet' ),
        'icon'      => 'vc_beautheme',
        "params"        => array(
            array(
                'type'      =>  'dropdown',
                'heading'   =>  esc_html__('Tabs','danlet' ),
                'param_name'  =>  'option_tabs',
                'value'     =>  array(
                    esc_html__('Select ...','danlet') =>  '',
                    esc_html__('Enable','danlet')   =>  'enable',
                    esc_html__('Disable','danlet')  =>  'disable'
                ),
                'admin_label'   =>  true,
            ),
            //Data Full
            array(
                'type'          =>  'dropdown',
                'heading'       =>  esc_html__('Option Data','danlet' ),
                'param_name'    =>  'option_data',
                'admin_label'   =>  true,
                'group'         => esc_html__('Data Settings','danlet'),
                'value'         =>  array(
                    esc_html__('Select ...','danlet')  =>  '',
                    esc_html__('InID','danlet')        =>  'inid',
                    esc_html__('InCategory','danlet')  =>  'incategory'
                ),
            ),
            array(
                'type'          => 'autocomplete',
                'heading'       => esc_html__( 'In ID', 'danlet' ),
                'param_name'    => 'post_id',
                'admin_label'   =>  true,
                'group'         => esc_html__('Data Settings','danlet'),
                'dependency'    => array(
                    'element'       => 'option_data',
                    'value'         => array( 'inid' ),
                ),
                'settings'          => array(
                    'multiple'      => true,
                    'sortable'      => true,
                    'min_length'      => 1,
                    'no_hide'       => true, // In UI after select doesn't hide an select list
                    'groups'        => true, // In UI show results grouped by groups
                    'unique_values'     => true, // In UI show results except selected. NB! You should manually check values in backend
                    'display_inline'    => true, // In UI show results inline view
                    'values'        => danlet_get_single_post('level')
                ),
            'group'     => esc_html__('Data Settings','danlet'),
            ),
            array(
                    'type'          => 'autocomplete',
                    'heading'       => esc_html__( 'In Category', 'danlet' ),
                    'param_name'    => 'id_category',
                    'admin_label'   =>  true,
                    'group'         => esc_html__('Data Settings','danlet'),
                    'settings'      => array(
                      'multiple'        => true,
                      'sortable'        => true,
                      'min_length'      => 1,
                      'no_hide'         => true, // In UI after select doesn't hide an select list
                      'groups'          => true, // In UI show results grouped by groups
                      'unique_values'   => true, // In UI show results except selected. NB! You should manually check values in backend
                      'display_inline'  => true, // In UI show results inline view
                      'values'          => danlet_get_list_taxonomy_by_name('course_level'),
                    ),
                    'dependency' => array(
                      'element'         => 'option_data',
                       'value'          => array( 'incategory' ),
                    ),
                    ),
                array(
                    'type'      => 'dropdown',
                    'heading'     => esc_html__( 'Order By ', 'danlet' ),
                    'param_name'  => 'order_by',
                    'admin_label'   =>  true,
                    'value'     =>  array(
                        esc_html__('Select ...','danlet') =>  '',
                        esc_html__('ID','danlet')  =>  'id',
                        esc_html__('Name','danlet') =>  'name',
                        esc_html__('Random','danlet') =>  'rand',


                    ),
                    'group'     => esc_html__('Data Settings','danlet'),
                    'dependency'  => array(
                        'element'     => 'option_data',
                        'value'      => array( 'incategory'),
                        ),
                ),
                array(
                    'type'      => 'dropdown',
                    'heading'     => esc_html__( 'Order', 'danlet' ),
                    'param_name'  => 'order',
                    'admin_label'   =>  true,
                    'value'     =>  array(
                        esc_html__('Select ...','danlet') =>  '',
                        esc_html__('ASC','danlet') =>  'ASC',
                        esc_html__('DESC','danlet')  =>  'DESC',
                    ),
                    'group'     => esc_html__('Data Settings','danlet'),
                    'dependency'  => array(
                        'element'     => 'option_data',
                        'value'      => array( 'incategory'),
                    ),
                ),
                array(
                    'type'      => 'textfield',
                    'heading'     => esc_html__( 'Total Items ', 'danlet' ),
                    'param_name'  => 'max_items',
                    'value'     => '',
                    'admin_label'   =>  true,
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
                    'value'      => array( 'list','single-big'),
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Name Category', 'danlet' ),
                'param_name' => 'color_name',
                'group' => esc_html__('Color Settings','danlet'),
                'dependency'  => array(
                    'element'       => 'option',
                    'value'      => array('full','single-small'),
                ),

            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Name Category Hover', 'danlet' ),
                'param_name' => 'color_name_hover',
                'group' => esc_html__('Color Settings','danlet'),
                 'dependency'  => array(
                    'element'       => 'option',
                    'value'      => array('full','single-small'),
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
                'heading' => esc_html__( 'Tabs', 'danlet' ),
                'param_name' => 'color_tabs',
                'group' => esc_html__('Color Settings','danlet'),
                'dependency'  => array(
                    'element'       => 'option',
                    'value'      => array( 'single-small' ),
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Tabs Hover', 'danlet' ),
                'param_name' => 'color_tabs_hover',
                'group' => esc_html__('Color Settings','danlet'),
                'dependency'  => array(
                    'element'       => 'option',
                    'value'      => array( 'single-small' ),
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Number', 'danlet' ),
                'param_name' => 'color_number',
                'group' => esc_html__('Color Settings','danlet'),
                'dependency'  => array(
                    'element'       => 'option',
                    'value'      => array( 'list' ),
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Slash', 'danlet' ),
                'param_name' => 'color_slash',
                'group' => esc_html__('Color Settings','danlet'),
                'dependency'  => array(
                    'element'       => 'option',
                    'value'      => array('' ,'full' ),
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Line', 'danlet' ),
                'param_name' => 'color_line',
                'group' => esc_html__('Color Settings','danlet'),
                'dependency'  => array(
                    'element'       => 'option',
                    'value'      => array('' ,'full' ),
                    'element'       => 'option_tabs',

                ),
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
    class WPBakeryShortCode_danlet_classes_list extends WPBakeryShortCode {}
}
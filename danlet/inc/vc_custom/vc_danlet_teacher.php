<?php
/**
 * @see Shortcode Teacher
 * @author VNMilky
 * VC_Custom
 * teacher
 */
if (!class_exists('WPBakeryShortCode_danlet_teacher')) {
    add_action( 'vc_before_init', 'danlet_teacher', 999999);
    function danlet_teacher() {
      vc_map( array(
          "name" => esc_html__( "Teacher","danlet" ),
          "base" => "danlet_teacher",
          'weight' => 200,
          'category' => esc_html__( 'BeauTheme', 'danlet' ),
          'icon'      => 'vc_beautheme',
          "params" => array(
            //Option Style
           array(
            'type'      =>  'dropdown',
            'heading'   =>  esc_html__('Option','danlet' ),
            'param_name'  =>  'option',
            'edit_field_class'  => 'vc_col-xs-9',
            'admin_label' => true,
            'value'     =>  array(
                esc_html__('Select ...','danlet')    =>  '',
                esc_html__('Single','danlet')            =>  'single',
                esc_html__('List','danlet')              =>  'list',
                esc_html__('Table','danlet')         =>  'table',
              ),
            ),
           array(
                'type'      =>  'dropdown',
                'heading'   =>  esc_html__('View All','danlet' ),
                'param_name'  =>  'option_viewall',
                'edit_field_class'  => 'vc_col-xs-3 vc_rs_pdt',
                'value'     =>  array(
                    esc_html__('Select ...','danlet') =>  '',
                    esc_html__('Enable','danlet')   =>  'enable',
                    esc_html__('Disable','danlet')  =>  'disable'
                ),
                'admin_label'   =>  true,
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array( '','single'),
                            ),
            ),
           array(
                'type'      =>  'dropdown',
                'heading'   =>  esc_html__('Tabs','danlet' ),
                'param_name'  =>  'option_tabs',
                'edit_field_class'  => 'vc_col-xs-3 vc_rs_pdt',

                'value'     =>  array(
                    esc_html__('Select ...','danlet') =>  '',
                    esc_html__('Enable','danlet')   =>  'enable',
                    esc_html__('Disable','danlet')  =>  'disable'
                ),
                'admin_label'   =>  true,
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array( 'list','table'),
                            ),
            ),
            array(
              'type'      =>  'dropdown',
              'heading'   =>  esc_html__('Social','danlet' ),
              'param_name'  =>  'social',
              'edit_field_class'  => 'vc_col-xs-3 vc_rs_pdt',
              'dependency'  => array(
                    'element'     => 'option',
                    'value'      => array( 'list','table'),
                ),
                'value'     =>  array(
                      esc_html__('Select ...','danlet') =>  '',
                      esc_html__('Enable','danlet')  =>  'enable',
                      esc_html__('Disable','danlet') =>  'disable'
                ),
            ),

           //
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Title Element', 'danlet' ),
              'param_name' => 'teacher_title_element',
              'value' => '',
              'admin_label' => true,
            ),
            array(
                'type'          =>  'vc_link',
                'heading'       =>  esc_html__('Link','danlet'),
                'param_name'    =>  'sh_link',
                'admin_label'       =>  true,
                'edit_field_class'  => 'vc_col-xs-9',
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array( 'list'),
                            ),
            ),

            //Ava
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Name Advanced', 'danlet' ),
              'param_name' => 'advanded_name',
              'value' => '',
              'dependency'  => array(
                    'element'     => 'option',
                    'value'      => array( '','single'),
                ),
              'admin_label' => true,
            ),
            array(
              'type' => 'textarea',
              'heading' => esc_html__( 'Description Advanced', 'danlet' ),
              'param_name' => 'advanded_desc',
              'value' => '',
              'dependency'  => array(
                    'element'     => 'option',
                    'value'      => array( '','single'),
                ),
              'admin_label' => true,
            ),
            array(
              'type' => 'attach_image',
              'heading' => esc_html__( 'Image Advanced', 'danlet' ),
              'param_name' => 'advanded_image',
              'edit_field_class'  => 'vc_col-xs-6',
              'value' => '',
              'dependency'  => array(
                    'element'     => 'option',
                    'value'      => array( '','single'),
                ),
              'admin_label' => true,
            ),

            //Data Option
            array(
                'type'      =>  'dropdown',
                'heading'   =>  esc_html__('Option Data','danlet' ),
                'param_name'  =>  'option_data',
                'group'     => esc_html__('Data Settings','danlet'),
                'value'     =>  array(
                      esc_html__('Select ...','danlet') =>  '',
                      esc_html__('InID','danlet')  =>  'inid',
                      esc_html__('InCategory','danlet') =>  'incategory'
                ),
                'dependency' => array(
                    'element'     => 'option',
                    'value'      => array( 'list' ,'table'),
                ),

            ),
            //Data
            array(
                'type'          => 'autocomplete',
                'heading'       => esc_html__( 'Select Teacher', 'danlet' ),
                'param_name'    => 'single_id',
                'group'     => esc_html__('Data Settings','danlet'),
                'dependency' => array(
                    'element'     => 'option',
                    'value'      => array( '','single' ),
                ),
                'settings'      => array(
                    'multiple'      => false,
                    'sortable'      => true,
                    'max_length'      => 1,
                    'no_hide'       => true, // In UI after select doesn't hide an select list
                    'groups'        => true, // In UI show results grouped by groups
                    'unique_values'     => true, // In UI show results except selected. NB! You should manually check values in backend
                    'display_inline'    => true, // In UI show results inline view
                    'values'        => danlet_get_single_post('teacher')
                ),
                'group'     => esc_html__('Data Settings','danlet'),
            ),
             array(
                  'type'          => 'autocomplete',
                  'heading'       => esc_html__( 'Select Teachers', 'danlet' ),
                  'param_name'    => 'post_id',
                  'group'     => esc_html__('Data Settings','danlet'),
                  'dependency' => array(
                        'element'     =>  'option_data',
                        'value'       => array('inid'),
                    ),
                        'settings'      => array(
                              'multiple'      => true,
                              'sortable'      => true,
                              'min_length'      => 1,
                              'no_hide'       => true, // In UI after select doesn't hide an select list
                              'groups'        => true, // In UI show results grouped by groups
                              'unique_values'     => true, // In UI show results except selected. NB! You should manually check values in backend
                              'display_inline'    => true, // In UI show results inline view
                              'values'        => danlet_get_single_post('teacher')
                          ),
                  'group'     => esc_html__('Data Settings','danlet'),
                ),
                array(
                    'type'          => 'autocomplete',
                    'heading'       => esc_html__( 'Select category ', 'danlet' ),
                    'param_name'    => 'id_category',
                    'group'         => esc_html__('Data Settings','danlet'),
                    'settings'      => array(
                      'multiple'        => true,
                      'sortable'        => true,
                      'min_length'      => 1,
                      'no_hide'         => true, // In UI after select doesn't hide an select list
                      'groups'          => true, // In UI show results grouped by groups
                      'unique_values'   => true, // In UI show results except selected. NB! You should manually check values in backend
                      'display_inline'  => true, // In UI show results inline view
                      'values'          => danlet_get_list_taxonomy_by_name('course_teacher'),
                    ),
                    'dependency' => array(
                        'element'     => 'option_data',
                        'value'      => array( 'incategory' ),
                        ),
                    ),
                array(
                    'type'      => 'dropdown',
                    'heading'     => esc_html__( 'Order By ', 'danlet' ),
                    'param_name'  => 'order_by',
                    'value'     =>  array(
                        esc_html__('Select ...','danlet') =>  '',
                        esc_html__('ID','danlet')  =>  'id',
                        esc_html__('Name','danlet') =>  'name',
                        esc_html__('Random','danlet') =>  'rand',


                    ),
                    'group'     => esc_html__('Data Settings','danlet'),
                    'dependency' => array(
                        'element'     => 'option_data',
                        'value'      => array( 'incategory' ),
                        ),
                ),
                array(
                    'type'      => 'dropdown',
                    'heading'     => esc_html__( 'Order', 'danlet' ),
                    'param_name'  => 'order',
                    'value'     =>  array(
                      esc_html__('Select ...','danlet') =>  '',
                      esc_html__('ASC','danlet') =>  'ASC',
                      esc_html__('DESC','danlet')  =>  'DESC',
                     ),
                    'group'     => esc_html__('Data Settings','danlet'),
                    'dependency' => array(
                        'element'     => 'option_data',
                        'value'      => array( 'incategory' ),
                        ),
                ),
                array(
                    'type'      => 'textfield',
                    'heading'     => esc_html__( 'Total Items ', 'danlet' ),
                    'param_name'  => 'max_items',
                    'value'     => '',
                    'group'     => esc_html__('Data Settings','danlet'),
                    'dependency' => array(
                        'element'     => 'option_data',
                        'value'      => array( 'inid','incategory' ),
                        ),
                ),
          //Color Settings
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title Element', 'danlet' ),
                'param_name' => 'color_title_element',
                'group' => esc_html__('Color Settings','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title Teacher', 'danlet' ),
                'param_name' => 'color_title_teacher',
                'group' => esc_html__('Color Settings','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title Teacher Hover ', 'danlet' ),
                'param_name' => 'color_title_teacher_hover',
                'group' => esc_html__('Color Settings','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Label Course', 'danlet' ),
                'param_name' => 'color_label_course',
                'group' => esc_html__('Color Settings','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Course Name', 'danlet' ),
                'param_name' => 'color_course',
                'group' => esc_html__('Color Settings','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Course Name Hover', 'danlet' ),
                'param_name' => 'color_course_hover',
                'group' => esc_html__('Color Settings','danlet'),
              ),
              array(
                  'type' => 'radio',
                  'heading' => esc_html__( 'Op Color Button', 'danlet' ),
                  'param_name' => 'acd_op_button',
                  'admin_label' => true,
                  'value' => array(
                    esc_html__('Yes','danlet') => 'yes',
                    esc_html__('No','danlet') => 'no',
                    ),
                  'edit_field_class'  => 'vc_col-xs-6',
                  // 'std' => 'no',
                  'group' => esc_html__('Color Settings','danlet'),
                ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Description', 'danlet' ),
                'param_name' => 'color_description',
                'group' => esc_html__('Color Settings','danlet'),
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array('','single'),
                        ),
              ),

              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Button', 'danlet' ),
                'param_name' => 'color_social_hover',
                'dependency'  => array(
                        'element'     => 'acd_op_button',
                        'value'       => array('no'),
                ),
                'group' => esc_html__('Color Settings','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Button OP', 'danlet' ),
                'param_name' => 'color_social_op',
                'dependency'  => array(
                        'element'     => 'acd_op_button',
                        'value'      => array('yes'),
                ),
                'group' => esc_html__('Color Settings','danlet'),
              ),
               array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Detail Link', 'danlet' ),
                'param_name' => 'color_link_detail',
                'group' => esc_html__('Color Settings','danlet'),
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array( '','single'),
                        ),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Text More', 'danlet' ),
                'param_name' => 'color_teacher_textmore',
                'group' => esc_html__('Color Settings','danlet'),
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array( 'list'),
                        ),
              ),
               array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Text More Hover', 'danlet' ),
                'param_name' => 'color_teacher_textmore_hover',
                'group' => esc_html__('Color Settings','danlet'),
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array( 'list'),
                        ),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Background Color', 'danlet' ),
                'param_name' => 'background_color',
                'group' => esc_html__('Color Settings','danlet'),
              ),
             // Setting SVG
              array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Set height for create triangle svg top', 'danlet' ),
                'param_name' => 'acd_svg_location_top',
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array('' ,'single'),
                        ),
                'value' => array(
                    esc_html__('Select ...','danlet') =>  '',
                    esc_html__('SVG top triangle left','danlet')       => 'svgtopleft',
                    esc_html__('SVG top triangle right','danlet')      => 'svgtopright',
                ),
                'description' => esc_html__( 'Setting height triangle svg', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
              ),
              array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Set height for create triangle svg', 'danlet' ),
                'param_name' => 'acd_svg_location_bottom',
                'value' => array(
                    esc_html__('Select ...','danlet') =>  '',
                    esc_html__('SVG bottom triangle left','danlet')    => 'svgbottomleft',
                    esc_html__('SVG bottom triangle right','danlet')   => 'svgbottomright',
                ),
                'description' => esc_html__( 'Setting height triangle svg', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array('' ,'single'),
                        ),
              ),
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Set height for create triangle svg', 'danlet' ),
                'param_name' => 'acd_svg_height_number',
                'value' => 175,
                'description' => esc_html__( 'Setting height triangle svg', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array('' ,'single'),
                        ),
              ),
                          array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Background svg top', 'danlet' ),
                'param_name' => 'acd_svg_bg_top',
                'description' => esc_html__( 'Setting background SVG top', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array('' ,'single'),
                        ),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Background svg bottom', 'danlet' ),
                'param_name' => 'acd_svg_bg_bottom',
                'description' => esc_html__( 'Setting background SVG bottom', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array('' ,'single'),
                        ),
              ),
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Prioritize location top svg as "z-index" of css ex: (z-index:0;) ', 'danlet' ),
                'param_name' => 'acd_svg_prio_top',
                'value' => 0,
                'description' => esc_html__( 'Setting Prioritize location svg number', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array('' ,'single'),
                        ),
              ),
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Prioritize location bottom svg as "z-index" of css ex: (z-index:0;) ', 'danlet' ),
                'param_name' => 'acd_svg_prio_bottom',
                'value' => 0,
                'description' => esc_html__( 'Setting Prioritize location svg number', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array('' ,'single'),
                        ),
              ),
            //Example make css editor for shortcode
            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'danlet' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design Options', 'danlet' ),
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
    class WPBakeryShortCode_danlet_teacher extends WPBakeryShortCode {}
}
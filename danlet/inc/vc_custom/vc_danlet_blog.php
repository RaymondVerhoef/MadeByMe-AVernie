<?php
/**
 * Blog
 */
if (!class_exists('WPBakeryShortCode_danlet_blog')) {
    add_action( 'vc_before_init', 'danlet_blog', 999999);
    function danlet_blog() {
        if (function_exists('danlet_get_category_by_taxonomy')) {
            $list_cat = danlet_get_category_by_taxonomy('post');
          }
        vc_map( array(
            "name" => esc_html__( "Blog","danlet" ),
            "base" => "danlet_blog",
            'weight' => 160,
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            "params" => array(
              //General setting
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title Element ', 'danlet' ),
                'param_name' => 'acd_title',
                'admin_label'   => true,
              ),
               array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Option', 'danlet' ),
                'param_name' => 'acd_style_blog',
                'admin_label'   => true,
                'value'     => array(
                    esc_html__('Select','danlet')      => '',
                    esc_html__('No Image','danlet')    => 'noimg',
                    esc_html__('Big Image','danlet') =>'bigimg',
                ),
              ),

              array(
                  'type' => 'checkbox',
                  'heading' => esc_html__( 'Link View More', 'danlet' ),
                  'param_name' => 'acd_vm',
                  'value' => array(esc_html__('Yes','danlet') => 'yes'),
                  'edit_field_class'  => 'vc_col-xs-3',
                    'admin_label'       =>  true,
                ),
              array(
                'type'          =>  'vc_link',
                'heading'       =>  esc_html__('Link','danlet'),
                'param_name'    =>  'sh_link',
                'edit_field_class'  => 'vc_col-xs-9',
                'admin_label'       =>  true,
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
            ),
             array(
                'type'          => 'autocomplete',
                'heading'       => esc_html__( 'Select post ', 'danlet' ),
                'param_name'    => 'post_id',
                'group'     => esc_html__('Data Settings','danlet'),
                'dependency' => array(
                    'element'     => 'option_data',
                    'value'      => array( 'inid' ),
                    ),
                    'settings'      => array(
                        'multiple'      => true,
                        'sortable'      => true,
                        'min_length'      => 1,
                        'no_hide'       => true, // In UI after select doesn't hide an select list
                        'groups'        => true, // In UI show results grouped by groups
                        'unique_values'     => true, // In UI show results except selected. NB! You should manually check values in backend
                        'display_inline'    => true, // In UI show results inline view
                        'values'        => danlet_get_single_post('post')
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
                    'values'          => danlet_get_list_taxonomy_by_name('category'),
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
                'group'     => esc_html__('Data Settings','danlet'),
                'dependency'  => array(
                    'element'     => 'option_data',
                    'value'      => array( 'incategory','inid'),
                ),
            ),
              //Setting color
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title Element', 'danlet' ),
                'param_name' => 'acd_color_title',
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Category', 'danlet' ),
                'param_name' => 'acd_color_category',
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Comment Count', 'danlet' ),
                'param_name' => 'acd_color_by',
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Date', 'danlet' ),
                'param_name' => 'acd_color_date',
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Name', 'danlet' ),
                'param_name' => 'acd_color_name',
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Name Hover', 'danlet' ),
                'param_name' => 'acd_color_link',
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'View More', 'danlet' ),
                'param_name' => 'acd_color_viewmore',
                'group' => esc_html__('Setting color','danlet'),
              ),
            // shadows
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
    class WPBakeryShortCode_danlet_blog extends WPBakeryShortCode {};
}

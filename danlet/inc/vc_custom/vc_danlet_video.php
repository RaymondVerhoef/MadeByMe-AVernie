<?php
/**
 * video
 */
if (!class_exists('WPBakeryShortCode_danlet_video')) {
    add_action( 'vc_before_init', 'danlet_video', 999999);
    function danlet_video() {
      vc_map( array(
          "name" => esc_html__( "Video","danlet" ),
          "base" => "danlet_video",
          'weight' => 180,
          'category' => esc_html__( 'BeauTheme', 'danlet' ),
          'icon'      => 'vc_beautheme',
          "params" => array(
            //Option Style
           array(
            'type'      =>  'dropdown',
            'heading'   =>  esc_html__('Option','danlet' ),
            'param_name'  =>  'option',
            'admin_label' => true,
            'value'     =>  array(
                esc_html__('Select ...','danlet')    =>  '',
                esc_html__('Small Slider','danlet')  =>  'small',
                esc_html__('Big Slider','danlet')    =>  'big'
              ),
            ),
           //
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Title Element', 'danlet' ),
              'param_name' => 'video_title_element',
              'value' => '',
              'admin_label' => true,
            ),
            array(
              'type' => 'vc_link',
              'heading' => esc_html__( 'Link', 'danlet' ),
              'param_name' => 'sh_link',
               'admin_label' => true,
              'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array( 'small'),
                        ),
            ),
            //Data Option
            array(
              'type'      =>  'dropdown',
              'heading'   =>  esc_html__('Filter by','danlet' ),
              'param_name'  =>  'option_data',
              'group'     => esc_html__('Data Settings','danlet'),
              'value'     =>  array(
                  esc_html__('Select ...','danlet') =>  '',
                  esc_html__('ID','danlet')  =>  'inid',
                  esc_html__('Category','danlet') =>  'incategory',
                ),
            ),
             array(
                  'type'          => 'autocomplete',
                  'heading'       => esc_html__( 'Select Video ', 'danlet' ),
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
                              'values'        => danlet_get_single_post('video')
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
                      'values'          => danlet_get_list_taxonomy_by_name('genre'),
                    ),
                    'dependency' => array(
                      'element'         => 'option_data',
                       'value'          => array( 'incategory' ),
                    ),
                    ),
                    array(
                        'type'          => 'autocomplete',
                        'heading'       => esc_html__( 'Select Tags ', 'danlet' ),
                        'param_name'    => 'tag_choose',
                        'group'         => esc_html__('Data Settings','danlet'),
                        'settings'      => array(
                          'multiple'        => true,
                          'sortable'        => true,
                          'min_length'      => 1,
                          'no_hide'         => true, // In UI after select doesn't hide an select list
                          'groups'          => true, // In UI show results grouped by groups
                          'unique_values'   => true, // In UI show results except selected. NB! You should manually check values in backend
                          'display_inline'  => true, // In UI show results inline view
                          'values'          => danlet_get_list_taxonomy_by_name('tagvideo'),
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
                'heading' => esc_html__( 'Color title element', 'danlet' ),
                'param_name' => 'color_title_element',
                'description' => esc_html__( 'Setting color title element', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color title element hover', 'danlet' ),
                'param_name' => 'color_title_element_hover',
                'description' => esc_html__( 'Setting color title element hover', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color title video', 'danlet' ),
                'param_name' => 'color_title_video',
                'description' => esc_html__( 'Setting color title video', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color title video hover ', 'danlet' ),
                'param_name' => 'color_title_video_hover',
                'description' => esc_html__( 'Setting color title video hover', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color view video', 'danlet' ),
                'param_name' => 'color_view_video',
                'description' => esc_html__( 'Setting color view video', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color like video', 'danlet' ),
                'param_name' => 'color_like_video',
                'description' => esc_html__( 'Setting color like video', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color text more', 'danlet' ),
                'param_name' => 'color_text_more',
                'description' => esc_html__( 'Setting color text more', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array( 'small'),
                        ),
              ),
               array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color text more hover', 'danlet' ),
                'param_name' => 'color_text_more_hover',
                'description' => esc_html__( 'Setting color text more hover', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array( 'small'),
                        ),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Background Color', 'danlet' ),
                'param_name' => 'background_color',
                'description' => esc_html__( 'Setting color background', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),

             // Setting SVG
              array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Set height for create triangle svg top', 'danlet' ),
                'param_name' => 'acd_svg_location_top',
                'dependency'  => array(
                        'element'     => 'option',
                        'value'      => array( '','small'),
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
                        'value'      => array( '','small'),
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
                        'value'      => array( '','small'),
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
                        'value'      => array( '','small'),
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
                        'value'      => array( '','small'),
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
                        'value'      => array( '','small'),
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
                        'value'      => array( '','small'),
                        ),
              ),
            //Example make css editor for shortcode
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
    class WPBakeryShortCode_danlet_video extends WPBakeryShortCode {}
}

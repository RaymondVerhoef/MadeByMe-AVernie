<?php
/**
 * List_video
 */
if (!class_exists('WPBakeryShortCode_danlet_list_video')) {
    add_action( 'vc_before_init', 'danlet_list_video', 999999);
    function danlet_list_video() {

        vc_map( array(
            "name" => esc_html__( "List Video","danlet" ),
            "base" => "danlet_list_video",
            'weight' => 180,
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            "params" => array(
              //General setting
              array(
                'type' => 'textfield',
                'heading' => esc_html__('Title Element', 'danlet'),
                'param_name' => 'title_video',
                'admin_label'   =>  true,
              ),
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
            //Data Option
            array(
               'type'          => 'autocomplete',
               'heading'       => esc_html__( 'Select list video show ', 'danlet' ),
               'param_name'    => 'post_id',
               'group'     => esc_html__('Data Settings','danlet'),
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
                'type' => 'textfield',
                'heading' => esc_html__('Number show list video', 'danlet'),
                'param_name' => 'max_items',
                'group' =>  esc_html__('Data Settings','danlet'),
            ),

            // Setting color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Color title', 'danlet'),
                'param_name' => 'titlecolor',
                'group' => esc_html__('Setting color', 'danlet'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Color title video', 'danlet'),
                'param_name' => 'title_video',
                'group' => esc_html__('Setting color', 'danlet'),
            ),
             array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background color', 'danlet'),
                'param_name' => 'bgcolor',
                'group' => esc_html__('Setting color', 'danlet'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Color like', 'danlet'),
                'param_name' => 'likecolor',
                'group' => esc_html__('Setting color', 'danlet'),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__('Css', 'danlet'),
                'param_name' => 'css',
                'group' => esc_html__('Design options', 'danlet'),
              ),
           ),
            array(
                'type'        => 'hidden',
                'heading'     => esc_html__( 'Short code id', 'danlet' ),
                'param_name'  => '_shortcode_id',
                'value'       => '_sc_id_'.time(),
            ),
        )
      );
    }
    class WPBakeryShortCode_danlet_list_video extends WPBakeryShortCode {};
}

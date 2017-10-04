<?php

/**
 * @edit VNMilky 06/12/2016
 * icon
 */
//Add more option for Vituarcomposer row
add_action( 'vc_before_init', 'danlet_icon', 999999);
function danlet_icon(){
  if(function_exists('vc_add_param')){
    vc_add_param('vc_icon',
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Title icon', 'danlet' ),
          'param_name' => 'icon_title',
          'value' => '',
          'icon'      => 'vc_beautheme',
          'description' => esc_html__( 'The title of icon.', 'danlet' ),
          'group'         => esc_html__( 'Title and description', 'danlet' ),
        )
    );

    vc_add_param('vc_icon',
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Description icon', 'danlet' ),
          'param_name' => 'icon_description',
          'value' => '',
          'description' => esc_html__( 'The description of icon.', 'danlet' ),
          'group'         => esc_html__( 'Title and description', 'danlet' ),
        )
    );
    vc_add_param('vc_icon',
      array(
        'type'      =>  'dropdown',
        'heading'   =>  esc_html__('Fix Icon','danlet' ),
        'param_name'  =>  'fix_icon',
        'edit_field_class' => 'vc_col-xs-4',
        'admin_label' => true,
        'value'     =>  array(
          esc_html__('Select ...','danlet')     =>  '',
          esc_html__('Disable','danlet')        =>  'disable',
          esc_html__('Enable','danlet')         =>  'enable',

        ),
        'group'         => esc_html__( 'Title and description', 'danlet' ),
      )
    );
    vc_add_param('vc_icon',
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Icon', 'danlet' ),
          'param_name' => 'fix_icon_danlet',
          'admin_label' => true,
          'edit_field_class' => 'vc_col-xs-8',
          'dependency'  => array(
            'element'     => 'fix_icon',
            'value'      => array( 'enable'),
            ),
          'value'     =>  array(
            esc_html__('Select ...','danlet')     =>  '',
            esc_html__('Home 1','danlet')        =>  'beau beau-home-1',
            esc_html__('Home 2','danlet')        =>  'beau beau-home-2',
            esc_html__('Home 3','danlet')        =>  'beau beau-home-3',
            esc_html__('Hiphop 1','danlet')        =>  'beau beau-hiphop-1',
            esc_html__('Hiphop 2','danlet')        =>  'beau beau-hiphop-2',
            esc_html__('Hiphop 3','danlet')        =>  'beau beau-hiphop-3',
            esc_html__('Model 1','danlet')        =>  'beau beau-model-1',
            esc_html__('Model 2','danlet')        =>  'beau beau-model-2',
            esc_html__('Model 3','danlet')        =>  'beau beau-model-3',
            esc_html__('Music 1','danlet')        =>  'beau beau-music-1',
            esc_html__('Music 2','danlet')        =>  'beau beau-music-2',
            esc_html__('Music 3','danlet')        =>  'beau beau-music-3',
            esc_html__('Art 1','danlet')        =>  'beau beau-art-1',
            esc_html__('Art 2','danlet')        =>  'beau beau-art-2',
            esc_html__('Art 3','danlet')        =>  'beau beau-art-3',
          ),
          'group'         => esc_html__( 'Title and description', 'danlet' ),
        )
    );
  }
}


/**
 * @edit VNMilky 06/12/2016
 * row
 */
//Add more option for Vituarcomposer row
add_action( 'vc_before_init', 'danlet_containerCenter', 999999);
function danlet_containerCenter(){
  if(function_exists('vc_add_param')){
    vc_add_param('vc_row',array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Row stretch', 'danlet' ),
        'param_name' => 'full_width',
        'value' => array(
          esc_html__( 'Default', 'danlet' ) => '',
          esc_html__( 'Stretch row', 'danlet' ) => 'stretch_row',
          esc_html__( 'Stretch row and content', 'danlet' ) => 'stretch_row_content',
          esc_html__( 'Stretch row and content (no paddings)', 'danlet' ) => 'stretch_row_content_no_spaces',
          esc_html__( 'Stretch row and content (no paddings content in center)', 'danlet' ) => 'stretch_row_content_no_spaces_content',
        ),
        'description' => esc_html__( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'danlet' )
        // "group" => esc_html__( 'Design options', 'danlet' ),
      )
    );

  }
}
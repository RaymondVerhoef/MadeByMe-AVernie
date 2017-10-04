<?php
/**
 * Contact
 */
if (!class_exists('WPBakeryShortCode_danlet_contact')) {
    add_action( 'vc_before_init', 'danlet_contact', 999999);
    function danlet_contact() {
        $link_contact = array( );
        $args = array('post_type' => 'wpcf7_contact_form');
        $cf7Forms = get_posts( $args );
        if( $cf7Forms ){
             foreach($cf7Forms as $cf7Form){
               $link_contact[ $cf7Form->post_title ] = $cf7Form->ID;
            }
        }
        vc_map( array(
            "name" => esc_html__( "Contact","danlet" ),
            "base" => "danlet_contact",
            'weight' => 50,
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            "params" => array(
              //General setting
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title Contact ', 'danlet' ),
                'param_name' => 'acd_title',
                'group' => esc_html__('General','danlet'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Description Contact', 'danlet'),
                'param_name' => 'acd_desc',
                'group' => esc_html__('General','danlet'),
            ),

            array(
                'type' => 'textfield',
                'heading' => esc_html__('Form Contact', 'danlet'),
                'param_name' => 'acd_form',
                'group' => esc_html__('General','danlet'),
            ),

              array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Choose form', 'danlet' ),
                'param_name' => 'acd_contact_type',
                'value' => $link_contact,
                'group' => esc_html__('General' , 'danlet')
              ),
               array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Address Contact', 'danlet' ),
                'param_name' => 'acd_address',
                'group' => esc_html__('General','danlet'),
              ),
              array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Set Image cover contact', 'danlet' ),
                'param_name' => 'acd_img',
                'group' => esc_html__('General','danlet'),
              ),

              //Setting color
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color title contact', 'danlet' ),
                'param_name' => 'acd_color_title',
                'description' => esc_html__( 'Setting color title contact', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color Address contact', 'danlet' ),
                'param_name' => 'acd_color_add',
                'description' => esc_html__( 'Setting color placeholder', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color placeholder input form', 'danlet' ),
                'param_name' => 'acd_color_input',
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color submit form', 'danlet' ),
                'param_name' => 'acd_color_submit',
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'background submit form', 'danlet' ),
                'param_name' => 'acd_bg_submit',
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
    class WPBakeryShortCode_danlet_contact extends WPBakeryShortCode {};
}
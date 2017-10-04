<?php
/**
 * Counter
 */
if(!class_exists('WPBakeryShortCode_danlet_counter')) {
    add_action('vc_before_init','danlet_counter',999999);
    function danlet_counter(){
        vc_map(array(
            'name'          =>  esc_html__('Counter' ,'danlet'),
            'base'          =>  'danlet_counter',
            'weight'        =>  60,
            'category'      =>  esc_html__('BeauTheme','danlet'),
            'icon'      => 'vc_beautheme',
            'params'        =>  array(
                    array(
                        'type'          =>  'textfield',
                        'heading'       =>  esc_html__('Title','danlet' ),
                        'param_name'    => 'counter_title',
                        'value'         =>  '',
                        'admin_label' => true,
                    ),
                    array(
                        'type'          =>  'textfield',
                        'heading'       =>  esc_html__('Number','danlet' ),
                        'param_name'    => 'counter_number',
                        'value'         =>  '',
                        'admin_label' => true,
                    ),
                    array(
                        'type'          =>  'textfield',
                        'heading'       =>  esc_html__('Speed','danlet' ),
                        'param_name'    => 'counter_speed',
                        'value'         =>  '',
                        'description'   =>  esc_html__('Defaul : 1000 (millisecond)' ,'danlet'),
                        'admin_label' => true,
                    ),
                    //Style
                    array(
                        "type"          => "colorpicker",
                        "class"         => "",
                        "heading"       => esc_html__( "Color Counter Title ", "danlet" ),
                        "param_name"    => "counter_title_color",
                        "value"         => '',
                        "group"         => esc_html__("Setting color","danlet"),
                    ),
                    array(
                        "type"          => "colorpicker",
                        "class"         => "",
                        "heading"       => esc_html__( "Color Counter Slash ", "danlet" ),
                        "param_name"    => "counter_slash_color",
                        "value"         => '',
                        "group"         => esc_html__("Setting color","danlet"),
                    ),
                    array(
                        "type"          => "colorpicker",
                        "class"         => "",
                        "heading"       => esc_html__( "Color Counter Number  ", "danlet" ),
                        "param_name"    => "counter_number_color",
                        "value"         => '',
                        "group"         => esc_html__("Setting color","danlet"),
                    ),
                    array(
                      'type'            => 'css_editor',
                      'heading'         => esc_html__( 'Css', 'danlet' ),
                      'param_name'      => 'css',
                      'group'           => esc_html__( 'Design options', 'danlet' ),
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
    class WPBakeryShortCode_danlet_counter extends WPBakeryShortCode{}
}

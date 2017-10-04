<?php
/**
 * @author VNMilky
 * @see Empty Space
 * @date 2017/03/15
 * @modify
 */
if (!class_exists('WPBakeryShortCode_danlet_clearfix')) {
    add_action( 'vc_before_init', 'danlet_clearfix', 999999);
    function danlet_clearfix() {
        vc_map( array(
            "name"      => esc_html__( "Empty Space", 'danlet' ),
            "base"      => "danlet_clearfix",
            'weight'    => 9999999999999999,
            'category'  => esc_html__( 'Beau Theme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            "params"    => array(
             	array(
                    'type'          =>  'textfield',
                    'heading'       =>  esc_html__('Extra large ( >= 1640px)', 'danlet'),
                    'param_name'    =>  'beau_xxl',
                    'value'         =>  '',
                    'description'   =>  esc_html__('Use : px , em or rem', 'danlet'),
                    'admin_label'   => true,
                    'edit_field_class'  =>  'vc_col-xs-6',
                ),
                array(
                    'type'          =>  'textfield',
                    'heading'       =>  esc_html__('Extra large ( >= 1200px)', 'danlet'),
                    'param_name'    =>  'beau_xl',
                    'value'         =>  '',
                    'description'   =>  esc_html__('Use : px , em or rem', 'danlet'),
                    'admin_label'   => true,
                    'edit_field_class'  =>  'vc_col-xs-6 vc_rs_pdt',
                ),
                array(
                    'type'          =>  'textfield',
                    'heading'       =>  esc_html__('Large ( >= 992px)', 'danlet'),
                    'param_name'    =>  'beau_lg',
                    'value'         =>  '',
                    'description'   =>  esc_html__('Use : px , em or rem', 'danlet'),
                    'admin_label'   => true,
                    'edit_field_class'  =>  'vc_col-xs-6',
                ),
                array(
                    'type'          =>  'textfield',
                    'heading'       =>  esc_html__('Medium ( >= 768px)', 'danlet'),
                    'param_name'    =>  'beau_md',
                    'value'         =>  '',
                    'description'   =>  esc_html__('Use : px , em or rem', 'danlet'),
                    'admin_label'   => true,
                    'edit_field_class'  =>  'vc_col-xs-6',
                ),
                array(
                    'type'          =>  'textfield',
                    'heading'       =>  esc_html__('Small ( >= 576px)', 'danlet'),
                    'param_name'    =>  'beau_sm',
                    'value'         =>  '',
                    'description'   =>  esc_html__('Use : px , em or rem', 'danlet'),
                    'admin_label'   => true,
                    'edit_field_class'  =>  'vc_col-xs-6',
                ),
                array(
                    'type'          =>  'textfield',
                    'heading'       =>  esc_html__('Extra small ( < 576px)', 'danlet'),
                    'param_name'    =>  'beau_xs',
                    'value'         =>  '',
                    'description'   =>  esc_html__('Use : px , em or rem', 'danlet'),
                    'admin_label'   => true,
                    'edit_field_class'  =>  'vc_col-xs-6',
                ),
                //Design
                array(
                    'type'          => 'css_editor',
                    'heading'       => esc_html__('Css', 'danlet'),
                    'param_name'    => 'css',
                    'group'         => esc_html__('Design options', 'danlet'),
                ),
            ),
        ));
    }
    class WPBakeryShortCode_danlet_clearfix extends WPBakeryShortCode {}
}

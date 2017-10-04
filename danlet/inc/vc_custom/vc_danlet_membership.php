<?php
/**
 * membership
 */
if (!class_exists('WPBakeryShortCode_danlet_membership')) {
    add_action( 'vc_before_init', 'danlet_membership', 999999);


    function danlet_membership() {
        vc_map( array(
            "name" => esc_html__( "Membership","danlet" ),
            "base" => "danlet_membership",
            'weight' => 50,
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            "params" => array(

            // general
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title membership', 'danlet' ),
                'param_name' => 'title_element',
                'value' => '',
                'group' => esc_html__('General', 'danlet'),
            ),

            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Description membership', 'danlet' ),
                'param_name' => 'desc_element',
                'value' => '',
                'group' => esc_html__('General', 'danlet'),
            ),

            array(
                'type' => 'textfield',
                'heading' => esc_html__('Name submit','danlet'),
                'param_name' => 'name_submit',
                'group' => esc_html__('General', 'danlet'),
            ),

            // data
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Number show membership','danlet'),
                'param_name' => 'page',
                'value' => 6,
                'group' => esc_html__('Data option', 'danlet'),
            ),

            array(
                'type'        => 'autocomplete',
                'heading'     => esc_html__( 'Select name show', 'danlet' ),
                'param_name'  => 'membership_id',
                'settings'    => array(
                    'multiple' => true,
                    'sortable' => true,
                    'min_length' => 1,
                    'no_hide' => true, // In UI after select doesn't hide an select list
                    'groups' => true, // In UI show results grouped by groups
                    'unique_values' => true, // In UI show results except selected. NB! You should manually check values in backend
                    'display_inline' => true, // In UI show results inline view
                    'values'   => danlet_get_single_post('membership')
              ),
                'group' => esc_html__('Data option', 'danlet'),
            ),

            // color
            array(
                "type"          => "colorpicker",
                "class"         => "",
                "heading"       => esc_html__( "Title color", "danlet" ),
                "param_name"    => "textcolor",
                "value"         => '',
                'group'         => esc_html__( 'Style color', 'danlet' ),
            ),

            array(
                "type"          => "colorpicker",
                "class"         => "",
                "heading"       => esc_html__( "Description color", "danlet" ),
                "param_name"    => "desccolor",
                "value"         => '',
                'group'         => esc_html__( 'Style color', 'danlet' ),
            ),

            array(
                "type"          => "colorpicker",
                "class"         => "",
                "heading"       => esc_html__( "Name color", "danlet" ),
                "param_name"    => "namecolor",
                "value"         => '',
                'group'         => esc_html__( 'Style color', 'danlet' ),
            ),

            array(
                "type"          => "colorpicker",
                "class"         => "",
                "heading"       => esc_html__( "Price color", "danlet" ),
                "param_name"    => "pricecolor",
                "value"         => '',
                'group'         => esc_html__( 'Style color', 'danlet' ),
            ),

             array(
                "type"          => "colorpicker",
                "class"         => "",
                "heading"       => esc_html__( "Feature color", "danlet" ),
                "param_name"    => "featurecolor",
                "value"         => '',
                'group'         => esc_html__( 'Style color', 'danlet' ),
            ),

            array(
                "type"          => "colorpicker",
                "class"         => "",
                "heading"       => esc_html__( "Background color", "danlet" ),
                "param_name"    => "bgcolor",
                "value"         => '',
                'group'         => esc_html__( 'Style color', 'danlet' ),
            ),

            array(
                "type"          => "colorpicker",
                "class"         => "",
                "heading"       => esc_html__( "Link color", "danlet" ),
                "param_name"    => "linkcolor",
                "value"         => '',
                'group'         => esc_html__( 'Style color', 'danlet' ),
            ),

            array(
                "type"          => "colorpicker",
                "class"         => "",
                "heading"       => esc_html__( "Link color hover", "danlet" ),
                "param_name"    => "linkhover",
                "value"         => '',
                'group'         => esc_html__( 'Style color', 'danlet' ),
            ),
            array(
                "type"          => "colorpicker",
                "class"         => "",
                "heading"       => esc_html__( "Back ground link color", "danlet" ),
                "param_name"    => "bglink",
                "value"         => '',
                'group'         => esc_html__( 'Style color', 'danlet' ),
            ),
            array(
                "type"          => "colorpicker",
                "class"         => "",
                "heading"       => esc_html__( "Back ground link color hover", "danlet" ),
                "param_name"    => "bglinkhover",
                "value"         => '',
                'group'         => esc_html__( 'Style color', 'danlet' ),
            ),

            //CSS
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
    class WPBakeryShortCode_danlet_membership extends WPBakeryShortCode {}
}
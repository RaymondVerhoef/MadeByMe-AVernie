<?php
/**
 * @author shadow <[<email address>]>
 * testimonial
 */
if (!class_exists('WPBakeryShortCode_danlet_testimonial')) {
    add_action( 'vc_before_init', 'danlet_testimonial', 999999);
    function danlet_testimonial() {

        vc_map( array(
            "name" => esc_html__( "Testimonial ","danlet" ),
            "base" => "danlet_testimonial",
            'weight' => 100,
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            'icon'      => 'vc_beautheme',
            "params" => array(
              //General setting
              array(
                'type' => 'textfield',
                'heading' => esc_html__('Title Testimonial', 'danlet'),
                'param_name' => 'acd_title',
              ),
            array(
              'type' => 'attach_image',
              'heading' => esc_html__( 'Quote Image', 'danlet' ),
              'param_name' => 'quote_image',
              'edit_field_class'  => 'vc_col-xs-6',
              'value' => '',
              'admin_label' => true,
            ),
            //Data Option

            array(
               'type'          => 'autocomplete',
               'heading'       => esc_html__( 'Select testimonial show ', 'danlet' ),
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
                    'values'        => danlet_get_single_post('testimonial')
                  ),
               'group'     => esc_html__('Data Settings','danlet'),
            ),

            array(
                'type'      => 'textfield',
                'heading'     => esc_html__( 'Total Items ', 'danlet' ),
                'param_name'  => 'max_items',
                'value'     => '',
                'group'     => esc_html__('Data Settings','danlet'),
            ),
              //Setting color
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color content Testimonial', 'danlet' ),
                'param_name' => 'acd_color_content',
                'description' => esc_html__( 'Setting color content testimonial', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Background Testimonial', 'danlet' ),
                'param_name' => 'background_color',
                'description' => esc_html__( 'Setting background testimonial', 'danlet' ),
                'group' => esc_html__('Setting color','danlet'),
              ),
              // Setting SVG
              array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Set height for create triangle svg top', 'danlet' ),
                'param_name' => 'acd_svg_location_top',
                'value' => array(
                  'none'                        => 'Choose SVG top',
                  'SVG top triangle left'       => 'svgtopleft',
                  'SVG top triangle right'      => 'svgtopright',
                ),
                'description' => esc_html__( 'Setting height triangle svg', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
              ),
              array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Set height for create triangle svg', 'danlet' ),
                'param_name' => 'acd_svg_location_bottom',
                'value' => array(
                  'none'                        => 'Choose SVG top',
                  'SVG bottom triangle left'    => 'svgbottomleft',
                  'SVG bottom triangle right'   => 'svgbottomright',
                ),
                'description' => esc_html__( 'Setting height triangle svg', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
              ),
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Set height for create triangle svg', 'danlet' ),
                'param_name' => 'acd_svg_height_number',
                'value' => 175,
                'description' => esc_html__( 'Setting height triangle svg', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Background svg top', 'danlet' ),
                'param_name' => 'acd_svg_bg_top',
                'description' => esc_html__( 'Setting background SVG top', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
              ),
              array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Background svg bottom', 'danlet' ),
                'param_name' => 'acd_svg_bg_bottom',
                'description' => esc_html__( 'Setting background SVG bottom', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
              ),
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Prioritize location top svg as "z-index" of css ex: (z-index:0;) ', 'danlet' ),
                'param_name' => 'acd_svg_prio_top',
                'description' => esc_html__( 'Setting Prioritize location svg number', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
              ),
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Prioritize location bottom svg as "z-index" of css ex: (z-index:0;) ', 'danlet' ),
                'param_name' => 'acd_svg_prio_bottom',
                'description' => esc_html__( 'Setting Prioritize location svg number', 'danlet' ),
                'group' => esc_html__('SVG','danlet'),
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
    class WPBakeryShortCode_danlet_testimonial extends WPBakeryShortCode {};
}
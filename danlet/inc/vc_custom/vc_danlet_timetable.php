<?php
/**
 * timetable
 */
if (!class_exists('WPBakeryShortCode_danlet_timetable')) {
    add_action( 'vc_before_init', 'danlet_timetable', 999999);
    function danlet_timetable() {
        vc_map( array(
            "name" => esc_html__( "Timetable","danlet" ),
            "base" => "danlet_timetable",
            'weight' => 210,
            'icon'      => 'vc_beautheme',
            'category' => esc_html__( 'BeauTheme', 'danlet' ),
            "params" => array(
              //General setting
              array(
                  'type' => 'checkbox',
                  'heading' => esc_html__( 'Enable Filter', 'danlet' ),
                  'param_name' => 'enable_filter',
                  'value' => array(esc_html__('Yes','danlet') => 'yes'),
                  'group' => esc_html__('General', 'danlet'),
                ),
                 array(
                  'type' => 'checkbox',
                  'heading' => esc_html__( 'Show Prev, Next day ?', 'danlet' ),
                  'param_name' => 'enable_day_control',
                  'value' => array(esc_html__('Yes','danlet') => 'yes'),
                  'group' => esc_html__('General', 'danlet'),
                ),
                 array(
                  'type' => 'checkbox',
                  'heading' => esc_html__( 'Show Only Available Class', 'danlet' ),
                  'param_name' => 'show_current_class',
                  'value' => array(esc_html__('Yes','danlet') => 'yes'),
                      'description' => esc_html__('If enable, all out-date and future class will be hided', 'danlet' ),
                  'group' => esc_html__('General', 'danlet'),
                ),
                array(
                  'type' => 'checkbox',
                  'heading' => esc_html__( 'Display Time end ?', 'danlet' ),
                  'param_name' => 'display_end_time',
                  'value' => array(esc_html__('Yes','danlet') => 'yes'),
                  'group' => esc_html__('General', 'danlet'),
                ),
                array(
                  'type' => 'colorpicker',
                  'heading' => esc_html__( 'Table Color', 'danlet' ),
                  'param_name' => 'color_table',
                  'group' => esc_html__('General', 'danlet'),
                ),
                array(
                  'type' => 'colorpicker',
                  'heading' => esc_html__( 'Table Color Header', 'danlet' ),
                  'param_name' => 'color_table_header',
                  'group' => esc_html__('General', 'danlet'),
                ),
                array(
                  'type'        => 'hidden',
                  'heading'     => esc_html__( 'Short code id', 'danlet' ),
                  'param_name'  => '_shortcode_id',
                  'value'       => '_sc_id_'.time(),
                ),
                array(
                    'type'        => 'hidden',
                    'heading'     => esc_html__( 'Short code id', 'danlet' ),
                    'param_name'  => '_shortcode_id',
                    'value'       => '_sc_id_'.time(),
                ),

           )
        )
      );
    }
    class WPBakeryShortCode_danlet_timetable extends WPBakeryShortCode {};
}
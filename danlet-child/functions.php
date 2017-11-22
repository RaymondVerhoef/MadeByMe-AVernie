<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

/*if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap','swipper','animate','masterslider' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );*/

// END ENQUEUE PARENT ACTION

// BEGIN ENQUEUE PARENT ACTION - AVERNIE CUSTOMIZED

function enqueue_parent_theme_style() {
wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );
function enqueue_child_theme_style() {
wp_enqueue_style( 'child-style', get_stylesheet_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_style', 100 );

// END ENQUEUE PARENT ACTION - AVERNIE CUSTOMIZED

// START Disable related products function

remove_action( 'woocommerce_output_related_products_args', 'danlet_related_products_args', 20 );

// END Disable related products function
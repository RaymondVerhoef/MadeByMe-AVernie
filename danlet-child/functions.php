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

// BEGIN HIDE SUBCATEGORIES FORM SHOP PAGE - AVERNIE CUSTOMIZED

add_filter( 'woocommerce_product_categories_widget_args', 'organicweb_exclude_widget_category' );

function organicweb_exclude_widget_category( $args ) {

    // Create an array that will hold the ids that need to be excluded
    $exclude_terms = array();

    // Push the default term that you need to hide 
    array_push( $exclude_terms, 74 );

    // Find all the children of that term
    $termchildren = get_term_children( 74, 'product_cat' );

    // Iterate over the terms found and add it to the array which holds the IDs to exclude
    foreach( $termchildren as $child ) {
        $term = get_term_by( 'id', $child, 'product_cat' );     
        array_push( $exclude_terms, $term->term_id );
    }

    // Finally pass the array
    $args['exclude'] = $exclude_terms;

    return $args;
}

// END HIDE SUBCATEGORIES FORM SHOP PAGE - AVERNIE CUSTOMIZED

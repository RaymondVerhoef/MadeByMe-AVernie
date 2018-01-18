<?php
/*
Plugin Name: Beau Contact Widget
Plugin URI: http://beautheme.com
Description: Contact widget
Author: VNMilky
Version: 1.0.1
Author URI: http://google.com

*/
/**
*
*/
class danlet_image_widget extends WP_Widget
{

     /**
     * Setup widget: Name, base ID
     */
    function __construct() {
        $tpwidget_options = array(
            'classname' => 'Beau Image Widget', //ID widget
        );
        parent::__construct('danlet_image_widget', 'Beau Image Widget', $tpwidget_options);
    }
    /**
     * Create option for widget
     */
    function form( $instance ) {
        $default = array();

        $instance = wp_parse_args( (array) $instance, $default);
    }

    /**
     * save widget form
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        return $instance;
    }
    /**
     * Show widget
     */

    function widget( $args, $instance ) {

        extract( $args );
        $text      = get_field('title','widget_' . $args['widget_id']);
        $link      = get_field('url','widget_' . $args['widget_id']);
        $image_url = '';
        $image = get_field('image','widget_' . $args['widget_id']);
        if($image != NULL){
            $image_url = $image['url'];
        }
        echo $before_widget;
?>
<div class="acd_footer_image">
    <h6 class="acd_footer_store">
        <a href="<?php echo esc_url($link) ?>" title=""><?php echo esc_html($text) ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
    </h6>
    <div class="fixed">
        <img src="<?php echo esc_url($image_url);?>" alt="">
    </div>
</div>


<?php
        echo $after_widget;
    }
}

/*
 * Create widget item
 */
add_action( 'widgets_init', 'danlet_reg_image_widget' );
function danlet_reg_image_widget() {
    register_widget('danlet_image_widget');
}

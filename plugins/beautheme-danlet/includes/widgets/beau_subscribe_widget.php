<?php
/*
Plugin Name: Beau Contact Widget
Plugin URI: http://beautheme.com
Description: Contact widget
Author: VNMilky
Version: 1.0
Author URI: http://google.com

*/
/**
*
*/
class danlet_sub_widget extends WP_Widget
{

     /**
     * Setup widget: Name, base ID
     */
    function __construct() {
        $tpwidget_options = array(
            'classname' => 'Beau Subscribe Widget', //ID widget
        );
        parent::__construct('danlet_sub_widget', 'Beau Subscribe Widget', $tpwidget_options);
    }
    /**
     * Create option for widget
     */
    function form( $instance ) {

        $default = array(
            'title' => '',
        );

        $instance = wp_parse_args( (array) $instance, $default);

        $title      =   esc_attr( $instance['title'] );

?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title','danlet'); ?> :</label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

<?php
    }

    /**
     * save widget form
     */

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);

        return $instance;
    }
/**
     * Show widget
     */

    function widget( $args, $instance ) {

        extract( $args );
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Join the Vip list!','danlet' ) : $instance['title'], $instance, $this->id_base );
        echo $before_widget;
        $class = '';
        if(function_exists('danlet_check_option_theme')){
            $footer_setting = danlet_check_option_theme('footer_style');
            if($footer_setting == '' || $footer_setting == 'custom') {
                $class = ' acd_ft_pd';
            }
        }
?>
<div class="acd_footer_search">
    <h3 class="sh_search_title sh_search_title_el <?php echo esc_attr($class);?>">
        <?php  echo esc_html($title); ?>
    </h3>
    <div class="sh_search_box sh_search_box_bg_bl">
        <form method="get" id="beau-subcribe">
            <input type="text" name="email" class="bt-text" id="email" placeholder="Enter your email..">
            <button type="submit" name="book-btn-subcribe" class="bt-submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </form>
    </div>
    <div class="subcribe-message-title">
        <span class="subcribe-title"></span>
        <span class="subcribe-message"></span>
    </div><!--Subcribe message-->
</div>
<?php
        echo $after_widget;
    }
}

/*
 * Create widget item
 */
add_action( 'widgets_init', 'danlet_reg_sub_widget' );
function danlet_reg_sub_widget() {
    register_widget('danlet_sub_widget');
}

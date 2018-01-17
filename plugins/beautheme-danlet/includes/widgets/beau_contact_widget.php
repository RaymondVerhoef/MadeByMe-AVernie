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

class danlet_contact_widget extends WP_Widget

{

     /**
     * Setup widget: Name, base ID
     */
    function __construct() {
        $tpwidget_options = array(
            'classname' => 'Beau Contact Widget', //ID widget
            'description' => esc_html__('This widget show your contact ','danlet')
        );
        parent::__construct('danlet_contact_widget', 'Beau Contact Widget', $tpwidget_options);
    }
    /**
     * Create option for widget
     */
    function form( $instance ) {

        $default = array(

            'title' => esc_html__('Contact','danlet'),
            'address'   =>  '',
            'phone'     =>  '',
            'email'     =>  '',
            'kvk'     =>  '',
        );

        $instance = wp_parse_args( (array) $instance, $default);

        $title      =   esc_attr( $instance['title'] );
        $address    =   esc_attr($instance['address']);
        $phone      =   esc_attr($instance['phone']);
        $email      =   esc_attr($instance['email']);
        $kvk      =   esc_attr($instance['kvk']);


?>

        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title','danlet'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('address'); ?>"><?php echo esc_html__('Address','danlet'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo esc_attr($address); ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('phone'); ?>"><?php echo esc_html__('Phone','danlet'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr($phone); ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('email'); ?>"><?php echo esc_html__('Email','danlet'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr($email); ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('kvk'); ?>"><?php echo esc_html__('KvK-nummer','danlet'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('kvk'); ?>" name="<?php echo $this->get_field_name('kvk'); ?>" type="text" value="<?php echo esc_attr($kvk); ?>" /></p>
<?php
    }

    /**
     * save widget form
     */

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['address'] = strip_tags($new_instance['address']);
        $instance['phone'] = strip_tags($new_instance['phone']);
        $instance['email'] = strip_tags($new_instance['email']);
        $instance['kvk'] = strip_tags($new_instance['kvk']);
        return $instance;
    }
/**
     * Show widget
     */

    function widget( $args, $instance ) {

        extract($args);
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Contact','danlet' ) : $instance['title'], $instance, $this->id_base );
        $address    = $instance['address'] ;
        $phone      = $instance['phone'] ;
        $email      = $instance['email'] ;
        $kvk      = $instance['kvk'] ;
        $class = '';
        if(function_exists('danlet_check_option_theme')){
            $footer_setting = danlet_check_option_theme('footer_style');
            if($footer_setting == '' || $footer_setting == 'custom') {
                $class = ' acd_ft_pd';
            }
        }
       
        echo $before_widget;
?>
    <div class="acd_footer_content<?php echo esc_attr($class);?>">
        <h3 class="acd_footer_title">
            <?php echo esc_html($title);?>
        </h3>
        <table class="acd_address">
            <tr>
                <td><?php echo esc_html__('Adres','danlet') ?>:</td>
                <td><?php echo esc_html($address);?>
                </td>
            </tr>
            <tr>
                <td><?php echo esc_html__('Telefoon','danlet') ?>:</td>
                <td><?php echo esc_html($phone);?></td>
            </tr>
            <tr>
                <td><?php echo esc_html__('Email','danlet') ?>:</td>
                <td><?php echo esc_html($email);?></td>
            </tr>
            <tr>
                <td><?php echo esc_html__('KvK','danlet') ?>:</td>
                <td><?php echo esc_html($kvk);?></td>
            </tr>
        </table>
        <?php if (function_exists('danlet_GetOption')): ?>
        <ul class="acd_footer_social">
            <?php if(danlet_GetOption('beau-facebook') != NULL) : ?>
            <li><a href="<?php print(danlet_GetOption('beau-facebook'))?>" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <?php endif; if(danlet_GetOption('beau-twitter') != NULL) : ?>
            <li><a href="<?php print(danlet_GetOption('beau-twitter'))?>" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <?php  endif; if(danlet_GetOption('beau-google-plus') != NULL) : ?>
            <li><a href="<?php print(danlet_GetOption('beau-google-plus'))?>" title="Google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <?php endif; if(danlet_GetOption('beau-youtube') != NULL) : ?>
            <li><a href="<?php print(danlet_GetOption('beau-youtube'))?>" title="youtube"><i class="fa fa-youtube-play" aria-hidden="true" title="Youtube"></i></a></li>
                <?php endif; ?>
        </ul>
        <?php endif; ?>
    </div>
<?php
echo $after_widget;

    }
}

/*
 * Create widget item
 */
add_action( 'widgets_init', 'danlet_reg_contact_widget' );
function danlet_reg_contact_widget() {
    register_widget('danlet_contact_widget');
}

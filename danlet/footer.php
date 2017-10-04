<?php
if (!is_404()) :
$svg_clearfix = '<div class="clearfix"></div>';
echo apply_filters('danlet_svg_clearfix',$svg_clearfix)
?>
<!-- Footer -->
<?php

        $footer_setting = danlet_check_option_theme('footer_style');
        if ($footer_setting == '') {
            $footer_setting = "default";   
        }
        danlet_get_template('templates/footer/footer', $footer_setting);
?>
<!-- End footer -->
<?php
endif;
do_action("additional_js_hook");
?>
</body>
<?php wp_footer(); ?>
</html>

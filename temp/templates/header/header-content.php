<?php
	$post_unit = '';
	if (!function_exists('beau_theme_plugin_init')) {
		$post_unit = 'post_unit';
	}
    $enable_clarity =  danlet_check_option_theme('enable-header-clarity');
    $header_ab =  danlet_check_option_theme('header_ab');
  	$enable_clarity_class = $eheader_ab = '';
    if(is_search() != false) {
         $class_header = ' black-menu';
    }
    if($enable_clarity != 1) {
        $enable_clarity_class = ' black-menu';
    }
    if($header_ab != false) {
    	$eheader_ab =  ' header-ab';
    }
?>
<header class="main_menu_header <?php echo esc_attr($post_unit) ?><?php echo esc_attr($eheader_ab)?>">

	<!-- menu Desktop -->
	<div class="header_desktop<?php echo esc_attr($enable_clarity_class)?>">
		<div class="row">

			<div class="acd-logo col-md-3 col-lg-3">
				<div class="danlet-logo">
                    <?php do_action('danlet_main_logo','main_logo');?>
					<?php do_action('danlet_main_logo','header_fixed_logo');?>
                </div>
                <div class="logo-mobile">
                    <?php do_action('danlet_main_logo','mobile_logo');?>
                </div>
			</div>
			<div class="acd-menu col-md-9 col-lg-9 row">
				<div class="col-lg-8 col-md-8 ">
				<?php
					if (danlet_check_option_theme('enable-main-nav') != '0') {
						danlet_main_menu('main-menu');
					}
				?>
				</div>
				<div class="col-lg-4 col-md-4 acd-cls acd-border-cls-white">
					<ul class="acd_ucs acd_ucs_white">
                     <?php if (!is_user_logged_in()): ?>
							<li>
							<a href="#" id="popup_login"  data-toggle="modal" data-target="#header-popup" title="<?php esc_html_e("Login",'danlet') ?>"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                         <?php if (is_user_logged_in()): ?>
                         	<li><a title="<?php esc_html_e("Users Page",'danlet') ?>" href="<?php echo get_permalink(danlet_check_option_theme('set-users-page'))?>"><i class="fa fa-tasks" aria-hidden="true"></i></a></li>
                            <li><a title="<?php esc_html_e("Logout",'danlet') ?>" href="<?php echo wp_logout_url(get_permalink()); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                        <?php endif ?>
						<?php
							if (danlet_check_option_theme('enable-cart-calender') != '0'):
								if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						?>
							<li class="acd-cart">
                                <?php
                                /**
                                 * @hooked danlet_woocommerce_header_cart() - 10
                                 */
                                do_action('danlet_woocommerce_header_cart_hook');?>
							</li>
						<?php
						}
						endif ?>
						<?php if (danlet_check_option_theme('enable-search') != '0'): ?>
							<li><a href="#" data-toggle="modal" data-target="#danletSearch"><i class="fa fa-search"></i></a></li>
						<?php endif ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="postion-menu-sticker"></div>

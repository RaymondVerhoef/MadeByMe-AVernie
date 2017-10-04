 <?php if (!is_user_logged_in()): ?>
<!-- SECTION POPUP -->
<div class="acd_header_popup modal fade" id="header-popup" role="dialog">
	<div class="container">
		<div class="acd_header_model_content">
			<button type="button" class="btn btn-default acd_header_model_close" data-dismiss="modal"><?php esc_html_e('X','danlet')?></button>
			<nav class="menu_model_tab">
				<ul data-tabs="login_header" class="acd_model_tab">
					<li class="display"  data-filter="login"><?php esc_html_e('Login','danlet')?></li>
					 <?php if (get_option( 'users_can_register' )): ?>
					<li data-filter="sign-up"><?php esc_html_e('Create an account','danlet')?></li>
				<?php endif;?>
				</ul>
			</nav>
			<div class="acd_tabs_header_content">
                 <?php if (get_option( 'users_can_register' )): ?>
				<div data-tabs-item="login_header" data-item="sign-up" class="acd_tab_header_box">
					<div class="acd_header_form">
                    <?php do_action('danlet_login_popup_header_hook');?>
					</div>
				</div>
                <?php endif;?>
				<div data-tabs-item="login_header" data-item="login" class="acd_tab_header_box display">
					<div class="acd_header_form">
                        <?php $args = array(
                                'remember' => false,
                                'label_log_in' => 'Submit',
                        );
                        wp_login_form( $args );
                        ?>

					</div>
				</div>
			</div>
             <?php do_action('danlet_js_login_header_hook');?>
		</div>
	</div>
</div>
<?php endif;
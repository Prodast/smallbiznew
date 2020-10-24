<?php
 		   /*
 * Copyright 2016 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */

osc_enqueue_script('jquery');
osc_enqueue_script('jquery-ui');
osc_enqueue_script('global');
osc_enqueue_script('main');
osc_enqueue_script('plugins');
osc_enqueue_script('select2');
osc_enqueue_script('date');
osc_enqueue_script('jquery-validate');
?>
<!DOCTYPE html>
<html lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
        <?php UserForm::js_validation(); ?>
        <?php osc_current_web_theme_path('header.php'); ?>
                <div class="container content">
		<div class="forcemessages-inline">
    <?php osc_show_flash_message(); ?>
</div>
                    <!-- content -->
                    <div class="authentication">
                        <div class="container">
                            <div class="authentication__form">
                                <div class="authentication__title">
                                    <p class="title__text"><?php _e('Register an account for free', 'bello'); ?></p>
                                </div>
                                <form name="register" id="register" action="<?php echo osc_base_url(true); ?>" method="post" class="form">
                                    <input type="hidden" name="page" value="register" />
                                    <input type="hidden" name="action" value="register_post" />
                                    <div class="form-group">
                                        <div class="fa fa-user"></div>
                                        <input id="s_name" type="text" name="s_name" value="" placeholder="<?php echo osc_esc_html(__('Name *', 'bello')); ?>" class="form-control form-control__big">
                                    </div>
                                    <div class="form-group">
                                        <div class="fa fa-lock"></div>
                                        <input id="s_password" type="password" name="s_password" value="" placeholder="<?php echo osc_esc_html(__('Password *', 'bello')); ?>" class="form-control form-control__big">
                                    </div>
                                    <div class="form-group">
                                        <div class="fa fa-lock"></div>
                                        <input id="s_password2" type="password" name="s_password2" value="" placeholder="<?php echo osc_esc_html(__('Re-type password *', 'bello')); ?>" class="form-control form-control__big">
                                    </div>
                                    <p id="password-error" style="display:none;">
                                        <?php _e('Passwords don\'t match', 'bello'); ?>.
                                    </p>
                                    <div class="form-group">
                                        <div class="fa fa-envelope"></div>
                                        <input id="s_email" type="text" name="s_email" value="" placeholder="<?php echo osc_esc_html(__('E-mail *', 'bello')); ?>" class="form-control form-control__big">
										</div>
										<div class="form-group">
                                        <div class="fa fa-phone"></div>
                                        <input id="s_phone_mobile" type="text" name="s_phone_mobile" value="" placeholder="<?php echo osc_esc_html(__('Mobile Phone', 'bello')); ?>" class="form-control form-control__big">
										</div>
									<div class="form-group">
<div class="fa fa-user-plus"></div>
                                                        <select name="b_company" id="b_company" class="form-control form-control__big">						
								<option value="0"><?php _e('User','bello'); ?></option>
								<option value="1"><?php _e('Company','bello'); ?></option>
								<select>

                                                </div>
												<div class="form-group">
												<p><?php _e('* This field is required', 'bello'); ?></p>
												</div>
                                        <?php osc_run_hook('user_register_form'); ?>
										<script type="text/javascript">
                                                            var RecaptchaOptions = {
                                                                theme : 'clean'
                                                            };
                                                        </script>
										<div class="form-group" style="align:center">
                                        <?php osc_show_recaptcha('register'); ?>
                                    </div>
															<?php if( function_exists( "MyHoneyPot" )) { ?>		
			<?php MyHoneyPot(); ?>		
		<?php } ?>  
                                    <button class="btn btn-primary" type="submit" style="width: 200px"><?php _e('Create', 'bello'); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- content -->

                </div><div style="clear:both"></div>
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
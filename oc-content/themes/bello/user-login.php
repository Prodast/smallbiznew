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
osc_enqueue_script('jquery-validate');;
?>
<!DOCTYPE html>
<html lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
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
                            <p class="title__text"><?php _e('Access to your account', 'bello'); ?></p>
                        </div>
                        <form action="<?php echo osc_base_url(true); ?>" method="post" class="form">
                            <input type="hidden" name="page" value="login" />
                            <input type="hidden" name="action" value="login_post" />
                            <div class="form-group">
                                <div class="fa fa-envelope"></div>
                                <input type="email" name="email" id="email" placeholder="<?php echo osc_esc_html(__('E-mail', 'bello')); ?>" class="form-control form-control__big">
                            </div>
                            <div class="form-group">
                                <div class="fa fa-lock"></div>
                                <input type="password" name="password" id="password" placeholder="<?php echo osc_esc_html(__('Password', 'bello')); ?>" class="form-control form-control__big">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="remember" type="checkbox" name="remember" value="1" />
                                    <label for="remember">
                                        <?php _e('Remember me', 'bello'); ?>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit"><?php _e("Log in", 'bello');?></button>
                            <div class="authentication__help">
                                <a href="<?php echo osc_register_account_url(); ?>" class="help__link">
                                    <?php _e("Register for a free account", 'bello'); ?>
                                </a>
                                <a href="<?php echo osc_recover_user_password_url(); ?>" class="help__link">
                                    <?php _e("Forgot password?", 'bello'); ?>
                                </a>
                            </div>
                        </form>
                    </div>
					
                </div>
            </div>
			<div class="authentication-2">
					</div>
            <!-- content -->
        </div>
        <div style="clear:both"></div>
        <div style="clear:both">
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
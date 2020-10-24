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
                            <p class="title__text"><?php _e('Recover your password', 'bello'); ?></p>
                        </div>
                        <form id="register" action="<?php echo osc_base_url(true); ?>" method="post" class="form">
                            <input type="hidden" name="page" value="login" />
                            <input type="hidden" name="action" value="recover_post" />
                            <div class="form-group">
                                <div class="fa fa-envelope"></div>
                                <input id="s_email" type="text" name="s_email" value="" placeholder="E-mail" class="form-control ">
                            </div>
							<div class="inp-captcha" style="text-align:center;">
                                        <?php osc_show_recaptcha('register'); ?>
                                    </div>
                            <button class="btn-primary btn" type="submit" style="width: 270px"><?php _e('Send me a new password', 'bello'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- content -->

        </div><div style="clear:both"></div>
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
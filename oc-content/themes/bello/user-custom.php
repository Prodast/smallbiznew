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
			  <div class="personal__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            <div class="sidebar">
                                <div class="sidebar__personal">
								<div class="personal__avatar">
                                       
                                        <div class="avatar__name">
                                            <p class="name__text"><?php _e('User account manager', 'bello')?></p>
                                            <p class="name__text"><?php echo osc_logged_user_name()?></p>
                                        </div>
                                    </div>
                                    <div class="personal__nav">
                                        <?php echo osc_private_user_menu(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
            <div class="col-md-9 col-lg-9">
                <?php osc_render_file(); ?>
            </div></div>
        </div></div></div><div style="clear:both"></div>	
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
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
                            <div class="personal__tabs">
                                <div class="tab-content">

                                    <div role="tabpanel" class="tab-pane fade" id="alerts">
                                        alerts
                                    </div>
                                    <div role="tabpanel" class="" id="profile">
                                        <div class="tab__title">
                                            <p class="title__text">
                                                <?php _e('Change your password', 'bello'); ?>
                                            </p>
                                        </div>
                                        <div class="personal__form">
                                            <form action="<?php echo osc_base_url(true); ?>" method="post" class="form">
                                                <input type="hidden" name="page" value="user" />
                                                <input type="hidden" name="action" value="change_password_post" />
                                                <div class="form-group">
                                                    <p class="group__title" style="width: 200px"><?php _e('Current password', 'bello'); ?> <span>*</span></p>
                                                    <div class="group__content">
                                                        <input type="password" name="password" id="password" value="" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p class="group__title" style="width: 200px"><?php _e('New password', 'bello'); ?> <span>*</span></p>
                                                    <div class="group__content">
                                                        <input type="password" name="new_password" id="new_password" value="" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p class="group__title" style="width: 200px"><?php _e('Repeat new password', 'bello'); ?> <span>*</span></p>
                                                    <div class="group__content">
                                                        <input type="password" name="new_password2" id="new_password2" value="" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="group__content">
                                                        <button class="btn btn-primary" type="submit">
                                                            <?php _e('Update', 'bello'); ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content -->


        </div><div style="clear:both"></div>
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
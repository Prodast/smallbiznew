<?php
 		   /*
 * Copyright 2016 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */

    $locales   = __get('locales');
    $user = osc_user();

osc_enqueue_script('jquery');
osc_enqueue_script('jquery-ui');
osc_enqueue_script('global');
osc_enqueue_script('fineuploader');
osc_enqueue_script('main');
osc_enqueue_script('plugins');
osc_enqueue_script('select2');
osc_enqueue_script('tabber');
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
                                                <?php _e('Update your profile', 'bello'); ?>
                                            </p>
                                        </div>
										<?php UserForm::location_javascript(); ?>
                                        <div class="personal__form">
                                            <script type="text/javascript">
                                                $(document).ready(function(){
                                                    $("#delete_account").click(function(){
                                                        if (confirm("<?php _e('All your listings and alerts will be removed, this action can not be undone.', 'bello');?>")) {
                                                            window.location = '<?php echo osc_base_url(true).'?page=user&action=delete&id='.osc_user_id().'&secret='.$user['s_secret']; ?>';
                                                        }
                                                        else {
                                                            return false;
                                                        }
                                                    });

                                                });
                                            </script>
                                            <form action="<?php echo osc_base_url(true); ?>" method="post" class="form">
                                                <input type="hidden" name="page" value="user" />
                                                <input type="hidden" name="action" value="profile_post" />
                                                <div class="form-group">
                                                    <p class="group__title"><?php _e('Name', 'bello'); ?></p>
                                                    <div class="group__content">
                                                        <?php UserForm::name_text(osc_user()); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p class="group__title"><?php _e('E-mail', 'bello'); ?></p>
                                                    <div class="group__content">
                                                        <input id="s_email" type="text" name="s_email" class="form-control" placeholder="<?php echo osc_esc_html(osc_user_email());?>">
                                                    </div>
                                                    <div class="group__action">
                                                        <a href="<?php echo osc_change_user_email_url(); ?>" class="action">
                                                            <?php _e('Modify e-mail', 'bello'); ?>
                                                        </a>
                                                        <a href="<?php echo osc_change_user_password_url(); ?>" class="action">
                                                            <?php _e('Modify password', 'bello'); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p class="group__title"><?php _e('User type', 'bello'); ?></p>
                                                    <div class="group__content">
                                                        <div class="select">
                                                            <?php UserForm::is_company_select(osc_user()); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p class="group__title"><?php _e('Cell phone', 'bello'); ?></p>
                                                    <div class="group__content">
                                                        <?php UserForm::mobile_text(osc_user()); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p class="group__title"><?php _e('Phone', 'bello'); ?></p>
                                                    <div class="group__content">
                                                        <?php UserForm::phone_land_text(osc_user()); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p class="group__title"><?php _e('Country', 'bello'); ?> <span>*</span></p>
                                                    <div class="group__content">
                                                        <div class="select">
                                                            <?php UserForm::country_select(osc_get_countries(), osc_user()); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p class="group__title"><?php _e('Region', 'bello'); ?> <span>*</span></p>
                                                    <div class="group__content">
                                                        <div class="select">
                                                            <?php UserForm::region_select(osc_get_regions(), osc_user()); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p class="group__title"><?php _e('City', 'bello'); ?> <span>*</span></p>
                                                    <div class="group__content">
                                                        <div class="select">
                                                            <?php UserForm::city_select(osc_get_cities(), osc_user()); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p class="group__title"><?php _e('Address', 'bello'); ?></p>
                                                    <div class="group__content">
                                                        <?php UserForm::address_text(osc_user()); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p class="group__title"><?php _e('Website', 'bello'); ?></p>
                                                    <div class="group__content">
                                                        <?php UserForm::website_text(osc_user()); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p class="group__title"><?php _e('User Description', 'bello'); ?></p>
                                                    <div class="group__content">
                                                        <?php UserForm::multilanguage_info($locales, osc_user()); ?>
														<?php osc_run_hook('user_profile_form', osc_user()); ?>
                                                        <button class="btn btn-primary" type="submit">
                                                            <?php _e('Update', 'bello'); ?>
                                                        </button>
                                                        <button class="btn btn-transparent" id="delete_account" type="button">
                                                            <i class="fa fa-close"></i>
                                                            <?php _e('Delete my account', 'bello'); ?>
                                                        </button>
                                                    </div>
                                                    <?php osc_run_hook('user_form'); ?>
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
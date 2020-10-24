<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2012 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
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
        <script type="text/javascript">
            $(document).ready(function() {
                $('form#change-email').validate({
                    rules: {
                        new_email: {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        new_email: {
                            required: '<?php echo osc_esc_js(__("Email: this field is required", "bello")); ?>.',
                            email: '<?php echo osc_esc_js(__("Invalid email address", "bello")); ?>.'
                        }
                    },
                    errorLabelContainer: "#error_list",
                    wrapper: "li",
                    invalidHandler: function(form, validator) {
                        $('html,body').animate({ scrollTop: $('#error_list').offset().top }, { duration: 250, easing: 'swing'});
                    },
                    submitHandler: function(form){
                        $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                        form.submit();
                    }
                });
            });
        </script>
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
                                                <?php _e('Change your e-mail', 'bello'); ?>
                                            </p>
                                        </div>
                                        <div id="error_list"></div>
                                        <div class="personal__form">
                                            <form id="change-email" action="<?php echo osc_base_url(true); ?>" method="post" class="form">
                                                <input type="hidden" name="page" value="user" />
                                                <input type="hidden" name="action" value="change_email_post" />
                                                <div class="form-group">

                                                    <p class="group__title" style="width: 150px"><?php _e('Current e-mail', 'bello'); ?>:
                                                    </p> <div class="group__content" style="margin-top: 10px"><?php echo osc_logged_user_email(); ?></div>

                                                    </div>


                                                <div class="form-group">
                                                    <p class="group__title" style="width: 150px"><?php _e('New e-mail', 'bello'); ?> <span>*</span></p>
                                                    <div class="group__content">
                                                        <input type="text" name="new_email" id="new_email" value="" class="form-control" />
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
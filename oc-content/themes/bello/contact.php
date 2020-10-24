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
                                 <p class="title__text"><?php _e('Contact us', 'bello'); ?></p>
                             </div>
                             <ul id="error_list"></ul><h1></h1>
                             <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact" class="form">
                                 <input type="hidden" name="page" value="contact" />
                                 <input type="hidden" name="action" value="contact_post" />
                                 <div class="form-group">
                                     <div class="fa fa-pencil"></div>
                                     <input id="subject" type="text" name="subject" value=""  placeholder="<?php echo osc_esc_html(__('Subject', 'bello')); ?>" class="form-control form-control__big">
                                 </div>
                                 <div class="form-group">
                                     <div class="fa fa-message"></div>
                                     <textarea id="message" name="message" rows="10" placeholder="<?php echo osc_esc_html(__('Message', 'bello')); ?>" class="form-control form-control__big" style="height: 150px"></textarea>
                                 </div>
                                 <div class="form-group">
                                     <div class="fa fa-user"></div>
                                     <input id="yourName" type="text" name="yourName" value="" placeholder="<?php echo osc_esc_html(__('Your name', 'bello')); ?>" class="form-control form-control__big">
                                 </div>
                                 <div class="form-group">
                                     <div class="fa fa-envelope"></div>
                                     <input id="yourEmail" type="text" name="yourEmail" value="" placeholder="<?php echo osc_esc_html(__('Your e-mail address', 'bello')); ?>" class="form-control form-control__big">
                                 </div>
								 <?php osc_show_recaptcha(); ?>
                                 <button class="btn btn-primary" type="submit"><?php _e('Send', 'bello'); ?></button>
                                 <?php osc_run_hook('admin_contact_form'); ?>
								 
                             </form>
                             <?php ContactForm::js_validation(); ?>
                         </div>
                     </div>
                 </div>
                 <!-- content -->

             </div><div style="clear:both"></div
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
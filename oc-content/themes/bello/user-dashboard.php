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
                                               <ul class="nav__list" role="tablist">
                                                   <?php echo osc_private_user_menu(); ?>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               
                               <div class="col-md-9 col-lg-9">
                                   <div class="personal__tabs">
                                       <div class="tab-content">
                                           <div role="tabpanel" class="tab-pane fade  in  active" id="dashboard">
                                               <div class="tab__title">
                                                   <p class="title__text">
                                                       <?php echo sprintf(__('Listings from %s', 'bello') ,osc_logged_user_name()); ?>
                                                   </p>
                                               </div>
                                               <div class="listings">
                                                   <?php if(osc_count_items() == 0) { ?>
                                                       <p class="title__text"><?php _e('No listings have been added yet', 'bello'); ?></p>
                                                   <?php } else { ?>
                                                   <?php while(osc_has_items()) { ?>
                                                   <div class="list__item">
                                                       <div class="item__title">
                                                           <p class="title__text"><?php echo osc_item_title(osc_locale_code()); ?></p>
                                                           <p>
                                                               <?php if(strlen(osc_item_description()) > 431){ echo strip_tags( mb_substr(osc_item_description(), 0, 430,'UTF-8').'...'); } else { echo strip_tags (osc_item_description()); } ?>
                                                           </p>
                                                       </div>
                                                       <div class="item__price">
                                                           <p class="price__text">
                                                               <?php echo osc_item_formated_price() ; ?>
                                                           </p>
                                                       </div>
                                                       <div class="item__publication">
                                                           <p class="publication__text">
                                                               <span><?php _e('Publication date', 'bello'); ?>: </span>
                                                               <?php echo osc_format_date(osc_item_pub_date()); ?>
                                                                   <?php echo osc_item_category(); ?>
                                                           </p>
                                                       </div>
                                                       <div class="item__actions">
                                                           <a href="<?php echo osc_item_edit_url(); ?>" class="action__edit">
                                                               <i class="fa fa-pencil-square-o"></i>
                                                               <span><?php _e('Edit', 'bello'); ?></span>
                                                           </a>
                                                           <a href="<?php echo osc_item_delete_url(); ?>" class="action__delete">
                                                               <i class="fa fa-trash-o"></i>
                                                           </a>
                                                       </div>
                                                   </div>
                                                   <?php } ?>
                                                   <?php } ?>
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

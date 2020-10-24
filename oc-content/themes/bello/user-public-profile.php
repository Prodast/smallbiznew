<?php
 		   /*
 * Copyright 2016 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
     $address = '';
    if(osc_user_address()!='') {
        if(osc_user_city_area()!='') {
            $address = osc_user_address().", ".osc_user_city_area();
        } else {
            $address = osc_user_address();
        }
    } else {
        $address = osc_user_city_area();
    }
    $location_array = array();
    if(trim(osc_user_city()." ".osc_user_zip())!='') {
        $location_array[] = trim(osc_user_city()." ".osc_user_zip());
    }
    if(osc_user_region()!='') {
        $location_array[] = osc_user_region();
    }
    if(osc_user_country()!='') {
        $location_array[] = osc_user_country();
    }
    $location = implode(", ", $location_array);
    unset($location_array);
	$user_keep = osc_user();
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
<?php View::newInstance()->_exportVariableToView('user', $user_keep); ?>
        <?php osc_current_web_theme_path('header.php'); ?>
		        <div class="container content">
		<div class="forcemessages-inline">
    <?php osc_show_flash_message(); ?>
</div>

                    <!-- content -->
                    <div class="public__profile">
                        <div class="container">
                            <div class="row m30">
                                <div class="col-lg-9 col-md-9">
                                    <div class="profile__person">
                                        
                                        <div class="person__info">
                                            <div class="person__name">
                                                <p class="name__text">
                                                    <?php echo sprintf(__('%s\'s profile', 'bello'), osc_user_name()); ?>
                                                </p>
                                                <div class="name__info">
                                                </div>
                                            </div>
                                            <p class="person__register">
                                                <?php echo _e('Register date', 'bello').': '.osc_format_date(osc_user()['dt_reg_date']); ?>
                                            </p>
                                            <p class="person__adress"><?php echo $location; ?></p>
											<p class="person__adress"><?php echo $address; ?></p>

                                            <div class="person__social">
                               					<br />
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-535d5a6132ffb0f3" async="async"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_sharing_toolbox"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile__contacts">
                                        <?php if(osc_user_phone() !=''){?>
                                        <div class="contact">
                                            <i class="fa fa-phone"  aria-hidden="true"></i>
                                            <p class="contact__text">
                                                <?php echo osc_user_phone(); ?>
                                            </p>
                                        </div>
                                        <?php } ?>
                                        <?php if(osc_user_phone_mobile() !=''){?>
                                        <div class="contact">
                                            <i class="fa fa-phone"  aria-hidden="true"></i>
                                            <p class="contact__text">
                                                <?php echo osc_user_phone_mobile(); ?>
                                            </p>
                                        </div>
                                        <?php } ?>
 
                                        <?php if(osc_user_website() !=''){?>
                                        <div class="contact">
                                            <i class="fa fa-globe"  aria-hidden="true"></i>
                                            <p class="contact__text"><?php echo osc_user_website(); ?>
                                        </p>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="profile__title">
                                        <p class="title__text"><?php _e('User Description', 'bello'); ?></p>
                                    </div>
                                    <div class="profile___about">
                                        <p class="about__text"><?php echo osc_user_info(); ?></p>
                                    </div>
                                    <div id="sidebar_move-2"></div>
                                    <div class="search__products">

                                        <div class="row">
                                            <div class="products__list">
                                                <?php while ( osc_has_items() ) { ?>
                                                <div class="col-md-12 col-sm-4 col-xs-6">
                                                    <div class="product product--list">
                                                        <div class="product__img">
                                                            <a href="<?php echo osc_item_url(osc_locale_code())?>" class="img__wrap">
                                                            <?php if( osc_count_item_resources() ) { ?><img src="<?php echo osc_resource_thumbnail_url(); ?>"  alt="<?php echo osc_esc_html(osc_item_title()); ?>" class="img"/><?php } else { ?>
                                                                <img src="<?php echo osc_current_web_theme_url('img/no_photo.gif'); ?>" style="width:auto;" class="img"/>
                                                            <?php } ?>
                                                            </a>
                                                        </div>
                                                        <div class="product__content">
                                                            <div class="content__block">
                                                                <div class="product__title">
                                                                    <a href="<?php echo osc_item_url(osc_locale_code())?>" class="title__text"><?php if(strlen(osc_item_title()) > 21){ echo mb_substr(osc_item_title(), 0, 20,'UTF-8').'...'; } else { echo osc_item_title(); } ?></a>
                                                                </div>
                                                                <div class="product__info">
                                                                    <div class="info__content">
                                                                        <p class="content__text">
                                                                            <?php echo osc_item_description(osc_locale_code())?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="info__block">
                                                                        <b class="info__icon info__icon--place"></b>
                                                                        <span><?php echo osc_item_city()?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product__price">
                                                                <div class="price__text"><?php echo osc_item_formated_price(); ?></div>
                                                                <div class="product__info">
                                                                    <div class="info__block">
                                                                        <?php if( osc_get_preference('item-icon', 'bello') == 'enable') {?>
                                                                        <b class="info__icon"><img src="<?php echo osc_current_web_theme_url('img/').bello_category_root(osc_item_category_id()).'.png'; ?>"></b>
                                                                        <?php } ?>
                                                                        <span><?php echo bello_category_root_name(osc_item_category_id())?></span>

                                                                    </div>
                                                                </div>
                                                                <a href="<?php echo osc_item_url(osc_locale_code())?>" class="btn btn-primary"><?php _e('Read more', 'bello')?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <!--  -->

                                    <?php if(osc_list_total_pages() > 1){?>
                                        <div class="pagination">
                                            <?php echo osc_pagination_items(); ?>
                                        </div>
                                        <?php } ?>
                                        <!--  -->
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3" id="sidebar">
                                    <?php if(osc_logged_user_id()!=  osc_user_id()) { ?>
                                    <?php if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?>
                                    <div class="sidebar sidebar_move-2">
                                        <div class="sidebar__form sidebar__form--enquire">
                                            <form action="<?php echo osc_base_url(true); ?>"  role="form" method="post" name="contact_form"  class="form">
                                                <input type="hidden" name="action" value="contact_post" />
                                                <input type="hidden" name="page" value="user" />
                                                <input type="hidden" name="id" value="<?php echo osc_user_id();?>" />
                                                <div class="form-group">
                                                    <div class="center">
                                                        <p class="group__title"><?php _e("Contact publisher", 'bello'); ?></p>
                                                    </div>
                                                    <div class="row center">
                                                        <div class="inputs">
                                                            <input class="form-control" type="text" name="yourName" id="yourName" placeholder="<?php echo osc_esc_html(__('Your name', 'bello')); ?>">
                                                            <input class="form-control" type="text" id="yourEmail" name="yourEmail" placeholder="<?php echo osc_esc_html(__('Your e-mail address', 'bello')); ?>">
                                                            <input class="form-control" type="text" id="phoneNumber" name="phoneNumber" placeholder="<?php echo osc_esc_html(__('Phone number', 'bello')); ?> (<?php echo osc_esc_html(__('optional', 'bello')); ?>)">
                                                        </div>
                                                        <textarea class="textarea" id="message" name="message" placeholder="<?php echo osc_esc_html(__('Message', 'bello')); ?>"></textarea>
														<?php if( osc_item_attachment() ) { ?>
														<div class="attach">
                                            <label for="contact-attachment"><?php _e('Attachment', 'bello'); ?> (<?php _e('optional', 'bello'); ?>)</label>
                                            <?php ContactForm::your_attachment() ; ?>
											</div>

                                        <?php } ?>
                                                    </div>
                                                    <?php osc_run_hook('item_contact_form', osc_item_id()); ?>
                                                </div>

                                                <div class="captch" style="margin: 0 auto;max-width: 235px;">
                                                    <?php if( osc_recaptcha_public_key() ) { ?>
                                                        <script type="text/javascript">
                                                            var RecaptchaOptions = {
                                                                theme : 'custom',
                                                                custom_theme_widget: 'recaptcha_widget'
                                                            };
                                                        </script>
                                                        <style type="text/css"> .g-recaptcha {transform:scale(0.77);transform-origin:0 0;} </style>
                                                    <?php } ?>
                                                    <?php osc_show_recaptcha(); ?>
                                                </div>

                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn btn-primary"><?php _e('Send', 'bello'); ?></button>
                                                </div>
                                            </form>
                                            <?php ContactForm::js_validation(); ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content -->
        </div><div style="clear:both"></div>	
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
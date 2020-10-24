<?php
 		   /*
 * Copyright 2017 osclass-pro.com and osclass-pro.ru
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
$user_keep = osc_user();
osc_enqueue_script('jquery');
osc_enqueue_script('jquery-ui');
osc_enqueue_script('global');
osc_enqueue_script('main');
osc_enqueue_script('plugins');
osc_enqueue_script('select2');
osc_enqueue_script('date');
osc_enqueue_script('jquery-validate');
osc_enqueue_script('lightbox');
?>
<!DOCTYPE html>
<html lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>

        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <div class="container content">
        <div class="forcemessages-inline">
            <?php osc_show_flash_message(); ?>
        </div>
                    <!-- content -->
                    <div class="ad_page">
                        <div class="container">
                            <div class="row m30">


                                <div class="col-md-3 item_col_md" id="col_right" style="float: right;">

                                    <div class="sidebar__form sidebar_move" >
                                        <div class="form-group">
                                            <div class="row center mobile_block" >
                                                <?php if(osc_is_web_user_logged_in() && osc_logged_user_id()==osc_item_user_id()) { ?>

                                                    <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow" class="btn2"><?php _e('Edit item', 'bello'); ?></a>


                                                <?php } else { ?>
                                                    <?php if( osc_get_preference('mark-as', 'bello') == 'enable') {?>

                                                        <form action="<?php echo osc_base_url(true); ?>" method="post" name="mask_as_form" id="mask_as_form">
                                                            <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                                                            <input type="hidden" name="as" value="spam" />
                                                            <input type="hidden" name="action" value="mark" />
                                                            <input type="hidden" name="page" value="item" />

                                                                <select name="as" id="as" class="form-control" style="width: 100%">
                                                                    <option> <?php _e("Mark as...", 'bello'); ?></option>
                                                                    <option value="spam"><?php _e("Mark as spam", 'bello'); ?></option>
                                                                    <option value="badcat"><?php _e("Mark as misclassified", 'bello'); ?></option>
                                                                    <option value="repeated"><?php _e("Mark as duplicated", 'bello'); ?></option>
                                                                    <option value="expired"><?php _e("Mark as expired", 'bello'); ?></option>
                                                                    <option value="offensive"><?php _e("Mark as offensive", 'bello'); ?></option>
                                                                </select>

                                                        </form>

                                                    <?php } ?>

                                                <?php } ?>
                                            </div>
                                            <div class="btn_filter_mobile">
                                                <a type="button" class="btn btn-filter">
                                                    <?php _e("Filter", 'bello') ; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="clear: both"></div>

                                    <div class="sidebar " id="search_module" >

                                        						                    <?php if( osc_get_preference('ssidebar', 'bello') == 'select') {
osc_current_web_theme_path('search_module2.php') ; 
 } else{
osc_current_web_theme_path('search_module.php') ; 	 
 }?>
                                    </div>
                                </div>

                                <div class="col-lg-9 col-md-9" >
                                    <div class="ad__object">
                                        <div id="mobile__categories"></div>

                                        <div style="clear: both"></div>
                                        <div class="ad__header" >
											<script text="text/javascript">
                                                $(document).ready(function(){
                                                    $(function()
                                                    {
                                                        $('.photos a').lightbox();
                                                    });
                                                });
                                            </script>
                                            <?php if( osc_images_enabled_at_items() ) { ?>
                                                <?php if( osc_count_item_resources() > 0 ) { ?>
                                             <div class="ad__images photos" id="listing-gallery">
                                                <div class="images__big">
                                                    <div class="big__wrap">
                                                        <a href="<?php echo osc_resource_url(); ?>" rel="lightbox">
                                                            <img src="<?php echo osc_resource_preview_url();?>" id="bigImg" alt="<?php echo osc_esc_html(osc_item_title()); ?>">
                                                        </a>
                                                    </div>
                                                </div>

                                                    <?php if( osc_count_item_resources() > 1 ) { ?>
                                                <div class="images__sml owl-carousel">
                                                    <?php for ( $i = 1; osc_has_item_resources(); $i++ ) { ?>
                                                    <div class="sml__block">
                                                        <a href="<?php echo osc_resource_url(); ?>" class="sml__item" rel="lightbox">
                                                            <img src="<?php echo osc_resource_thumbnail_url(); ?>" alt="<?php echo osc_esc_html(osc_item_title()); ?>" class="sml__img">
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                    <?php } ?>
                                            </div>
                                                <?php } else {?>
												 <div class="ad__images">
                                                <div class="images__big">
                                                    <div class="big__wrap">
                                                        <img src="<?php echo osc_current_web_theme_url('img/no_photo.png');?>" style="height:auto;" id="bigImg" alt="<?php echo osc_esc_html(osc_item_title()); ?>">
                                                    </div>
                                                </div>
												</div>
												<?php } ?>
                                            <?php } ?>


                                            <div class="ad__info">
                                                <div class="info__title">
                                                    <p class="title__text">
                                                        <?php echo osc_item_title(); ?>
                                                    </p></div>
												<div class="info__title-2">
                                                    <p class="title__date"><?php if ( osc_item_pub_date() != "" ) { ?> <span><?php _e("Published date", 'bello') ; ?>:</span>
                                                        <?php echo osc_format_date( osc_item_pub_date() );?><?php } ?></p>
													
														<?php if ( osc_item_mod_date() != "" ) { ?>
														<p class="title__date">
														<span><?php _e("Modified date", 'bello') ; ?>:</span>
														<?php echo osc_format_date( osc_item_mod_date() ); ?></p><?php } ?>
														<p class="title__date">
                                                        <a href="<?php echo osc_search_url(array('sCategory' => osc_item_category_id()))?>" class="date__link">
                                                            <?php echo osc_item_category(); ?>
                                                        </a>
														</p>
														<p class="title__date">
            <?php
              $location_array = array(osc_item_country(), osc_item_region(), osc_item_city());
              $location_array = array_filter($location_array);
              $item_loc = implode(', ', $location_array);
            ?>
            <?php if($item_loc <> '') { ?>
<?php echo $item_loc; ?>
            <?php } ?>
                                                    </p>
													<?php if ( osc_item_address() != "" ) { ?>
													<p class="title__date">
								<?php echo osc_item_address(); ?>  </p>

							<?php } ?>
							<p class="title__date">
							<span><?php _e("Views", 'bello') ; ?>:</span> <?php echo osc_item_views(); ?>
							</p>
                                                </div>
                                                <div class="info__price">
                                                    <i  class="fa fa-tags" aria-hidden="true"></i>
                                                    <p class="price__text">
                                                        <?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { echo osc_item_formated_price(); } ?>
                                                    </p>
                                                </div>
                                                <div class="ad__person">
                                                    <div class="person__info">
                                                        <div class="person__img">
                                                            <img src="<?php echo osc_current_web_theme_url('img/person.png');?>" class="img">
                                                        </div>
                                                        <div class="person__name">
                                                     <?php if(osc_item_user_id() != null){ ?>
                                                            <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" class="name__text">
                                                                <?php echo osc_item_contact_name(); ?>
                                                            </a>
                                                            <?php }else{ ?>
                                                            <?php echo osc_item_contact_name(); ?>
                                                            <?php } ?>
															<?php if(osc_item_user_id() <> 0) { ?>
                <?php $user = User::newInstance()->findByPrimaryKey( osc_item_user_id() ); ?>
                <?php if($user['b_company'] == 1) { ?>
                  <p class="person__register"><?php _e('Company', 'bello'); ?></p>
                <?php } else { ?>
                  <p class="person__register"><?php _e('User', 'bello'); ?></p>
                <?php } ?>
            <?php } ?>
                                                              <?php if(osc_item_user_id() != null){ ?>
															  <p class="person__register">
                                                                <?php if(isset($user['dt_reg_date'])){ echo _e('Register date', 'bello').': '.osc_format_date($user['dt_reg_date']);} ?>
                                                            </p>
																<?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="person__contacts">
													<?php if(osc_item_user_id() != null){ ?>
                                                        <?php if($user['s_phone_mobile'] != ''){?>
                                                        <div class="contact">
                                                            <i class="fa fa-phone"  aria-hidden="true"></i>
                                                            <p class="contact__text">
                                                                <?php echo $user['s_phone_mobile']; ?>
                                                            </p>
                                                        </div>
                                                        <?php } if($user['s_phone_land'] != ''){?>
                                                        <div class="contact">
                                                            <i class="fa fa-phone"  aria-hidden="true"></i>
                                                            <p class="contact__text">
                                                                <?php echo $user['s_phone_land']; ?>
                                                            </p>
                                                        </div>
													<?php } ?><?php } ?>
                                                        <?php if(osc_item_show_email() ){?>
                                                        <div class="contact">
                                                            <i class="fa fa-envelope"  aria-hidden="true"></i>
                                                            <p class="contact__text">
                                                                <?php echo osc_item_contact_email(); ?>
                                                            </p>
                                                        </div>
														<?php } ?>
														<?php if(osc_item_show_mobile() && osc_item_contact_mobile() != null){?>
                                                        <div class="contact">
                                                            <i class="fa fa-phone" style='margin-left: 3px; top:45%;' aria-hidden="true"></i>
                                                            <p id='mobile-phone' class="contact__text">
																<?php echo substr(osc_item_contact_mobile(), 0, 9); ?><button onclick='showMobile();' style='width: 90px; height: 18px; font-size: 8px; padding: 0;'>Показать</button>
															</p>
                                                        </div>
														<script>
															function showMobile()
															{
																document.getElementById('mobile-phone').innerHTML = '<?php echo osc_item_contact_mobile(); ?>';
															}
														</script>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="info__social">
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57aa643257923194"></script>
<div class="addthis_sharing_toolbox"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ad__title">
                                            <p class="title__text"><?php echo __('Description', 'bello')?></p>
                                        </div>
                                        <div class="ad__description">
                                            <p class="description__text">
                                                <?php echo osc_item_description(); ?>
                                            </p>
                                        </div>
																   <?php if( osc_count_item_meta() >= 1 ) { ?>
                            <br />
                            <div class="meta_list">
                                <?php while ( osc_has_item_meta() ) { ?>
                                    <?php if(osc_item_meta_value()!='') { ?>
                                        <div class="meta">
                                            <strong><?php echo osc_item_meta_name(); ?>:</strong> <?php echo osc_item_meta_value(); ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
										   <?php osc_run_hook('item_detail', osc_item() ); ?>
                   									    <?php if( osc_get_preference('item-bellorevo_desc', 'bello') != '') {?>
                                        <div class="clearfix"></div>
                                        <div class="ads">
                                                <div class="row">
                                                <?php echo osc_get_preference('item-bellorevo_desc', 'bello'); ?>
                                                </div>
                                        </div>
                                            <div class="clearfix"></div>
                                        <?php } ?>
                    <br />
<?php osc_run_hook('location'); ?>

                                        <?php if( osc_get_preference('useful', 'bello') == 'enable') {?>
                                            <div id="useful_info">
                                                <h2><?php _e('Useful information', 'bello'); ?></h2>
                                                <ul>
                                                    <li><?php _e('Avoid scams by acting locally or paying with PayPal', 'bello'); ?></li>
                                                    <li><?php _e('Never pay with Western Union, Moneygram or other anonymous payment services', 'bello'); ?></li>
                                                    <li><?php _e('Don\'t buy or sell outside of your country. Don\'t accept cashier cheques from outside your country', 'bello'); ?></li>
                                                    <li><?php _e('This site is never involved in any transaction, and does not handle payments, shipping, guarantee transactions, provide escrow services, or offer "buyer protection" or "seller certification"', 'bello'); ?></li>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php if( osc_comments_enabled() ) { ?>
                                    <?php if( osc_reg_user_post_comments () && osc_is_web_user_logged_in() || !osc_reg_user_post_comments() ) { ?>
                                    <div class="comments">
                                        <div class="comments__title">
                                            <p class="title__text"><?php _e('Comments', 'bello'); ?></p>
                                            <span class="comments__count"><?php echo osc_count_item_comments()?>&nbsp;<?php _e('Comments', 'bello'); ?></span>
                                        </div>
                                        <div class="comment__post">
                                            <div class="comment__img">
                                                <div class="img__wrap">
                                                    <img src="<?php echo osc_current_web_theme_url('img/default__comment.jpg'); ?>" alt="" class="img">
                                                </div>
                                            </div>
                                            <div class="comment__content">
                                                <div class="comment__form">
                                                    <ul id="comment_error_list"></ul>

                                                    <?php CommentForm::js_validation(); ?>
                                                    <form action="<?php echo osc_base_url(true); ?>" method="post" name="comment_form" id="comment_form">
                                                        <input type="hidden" name="action" value="add_comment" />
                                                        <input type="hidden" name="page" value="item" />
                                                        <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                                                        <?php if(osc_is_web_user_logged_in()) { ?>
                                                            <input type="hidden" name="authorName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                                                            <input type="hidden" name="authorEmail" value="<?php echo osc_esc_html( osc_logged_user_email() );?>" />
                                                        <?php } else { ?>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input class="form-control" type="text" name="authorName" id="authorName" placeholder="<?php echo osc_esc_html( __('Your name', 'bello') ); ?>" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="authorEmail" id="authorEmail" placeholder="<?php echo osc_esc_html( __('Your e-mail', 'bello') ); ?>" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <?php }; ?>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="title" id="title" placeholder="<?php echo osc_esc_html( __('Title', 'bello') ); ?>" >
                                                    </div>
                                                    <textarea class="textarea" id="body" name="body" rows="10" placeholder="<?php echo osc_esc_html( __('Comment', 'bello') ); ?>"></textarea>
                                                    <div class="button-post">
                                                        <button type="submit" id="comment_send" class="btn btn-primary btn-sm"><?php echo osc_esc_html( __('Send', 'bello') ); ?></button>
                                                    </div>
                                                        </form>

                                                </div>
                                            </div>
                                        </div>
                                        <?php if(osc_count_item_comments() >= 1){ ?>
                                        <?php while(osc_has_item_comments()){ ?>
                                        <div class="comments__item">
                                            <div class="comment__img">
                                                <div class="img__wrap">
                                                    <img src="<?php echo osc_current_web_theme_url('img/default__comment.jpg'); ?>" class="img">
                                                </div>
                                            </div>
                                            <div class="comment__content">
                                                <div class="comment_preson">
                                                    <p class="person__name">
                                                        <?php echo osc_comment_author_name(); ?>
                                                    </p>
                                                </div>
                                                <div class="comment__text">
                                                    <p class="text"><?php echo nl2br( osc_comment_body() ); ?></p>
                                                </div>
                                                <div class="comment__date">
                                                    <p class="date__text">
                                                        <?php echo osc_format_date(osc_comment_pub_date()); ?>
                                                    </p>
                                                </div>
                                                <?php if ( osc_comment_user_id() && (osc_comment_user_id() == osc_logged_user_id()) ) { ?>
                                                    <p>
                                                        <a rel="nofollow" href="<?php echo osc_delete_comment_url(); ?>" title="<?php _e('Delete your comment', 'bello'); ?>"><?php _e('Delete', 'bello'); ?></a>
                                                    </p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="paginate" style="text-align: right;">
                                            <?php echo osc_comments_pagination(); ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <?php } ?>
                                    <?php } ?>
                                    <div id="sidebar_move-2"></div>
                          <!-- Related items -->
                                    <?php if (function_exists('related_bello_start')) {related_bello_start();} ?>
                                </div>
                                <!--  -->
                                <div class="col-lg-3 col-md-3" id="sidebar">

                                        <?php if(osc_get_preference('item-bellorevo_image', 'bello') != ''){?>
                                    <div class="sidebar__form ">
                                        <?php echo osc_get_preference('item-bellorevo_image', 'bello')?>
                                    </div>
                                    <?php } ?>
    
                                    <div class="sidebar">
									    <?php if(osc_logged_user_id()!=  osc_user_id()&& osc_logged_user_id() != 0 ) { ?>
										 <p>
                            <?php _e("It's your own listing, you can't contact the publisher.", 'bello'); ?>
                        </p>
						  <?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
						  <p>
                            <?php _e("You must log in or register a new account in order to contact the publisher", 'bello'); ?>
                        </p>
						  <p class="contact_button">
                            <strong><a href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'bello'); ?></a></strong>
                            <strong><a href="<?php echo osc_register_account_url(); ?>"><?php _e('Register for a free account', 'bello'); ?></a></strong>
                        </p>
                                   <?php } else { ?>
                                        <div class="sidebar__form sidebar__form--enquire">
                                            <ul id="error_list"></ul><h1></h1>
                                            <?php ContactForm::js_validation(); ?>
                                            <form  class="form" action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form" >
                                                <div class="form-group">
                                                    <div class="center">
                                                        <p class="group__title"><?php _e("Contact publisher", 'bello'); ?></p>
                                                    </div>
                                                    <div class="row center">
                                                        <div class="inputs">
                                                            <?php osc_prepare_user_info(); ?>
                                                            <input type="text" class="form-control" name="yourName" id="yourName" placeholder="<?php echo osc_esc_html( __('Your name', 'bello') ); ?>">
                                                            <input type="text" class="form-control" id="yourEmail" name="yourEmail" placeholder="<?php echo osc_esc_html( __('Your e-mail address', 'bello') ); ?>">
                                                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="<?php echo osc_esc_html( __('Phone number', 'bello') ); ?>">
                                                            <?php osc_run_hook('item_contact_form', osc_item_id()); ?>
                                                        </div>
                                                        <textarea class="textarea" id="message" name="message" placeholder="<?php echo osc_esc_html( __('Message', 'bello') ); ?>"></textarea>
																			<div class="attach">
														<?php if( osc_item_attachment() ) { ?>
                                            <label for="contact-attachment"><?php _e('Attachment', 'bello'); ?> (<?php _e('optional', 'bello'); ?>)</label>
                                            <?php ContactForm::your_attachment() ; ?>

                                        <?php } ?></div>
                                                        <input type="hidden" name="action" value="contact_post" />
                                                        <input type="hidden" name="page" value="item" />
                                                        <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                                                    </div>
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
                                                <div class="button-post text-center">
                                                    <button type="submit" class="btn btn-primary"><?php _e('Send', 'bello'); ?></button>
                                                </div>
                                                <br>
                                            </form>
                                        </div>
											<?php } ?>
										<?php if(osc_get_preference('map-bello', 'bello') == 'enable'){?>
										<div class="sidebar__form sidebar__form--location">
                                            <p class="group__title"><?php _e('Location', 'bello'); ?></p>
                                            <?php osc_current_web_theme_path('google_map_module.php'); ?>
                                        </div>
										<?php } ?>
                                    </div>

                                    <!-- Search Module -->

                                </div>
                                <!--  -->

                        </div>
                    </div>
                    </div>
                    <!-- content -->


		</div><!-- end iNEW! -->

        <?php if (function_exists('related_bello_start')) {related_bello_start();} ?>
			
        <div style="clear:both"></div>	
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>

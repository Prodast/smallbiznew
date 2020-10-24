<?php
/*
* Copyright 2017 osclass-pro.com
*
* You shall not distribute this theme and any its files (except third-party libraries) to third parties.
* Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
*/
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

    <!-- only item-post.php -->
    <?php ItemForm::location_javascript(); ?>
    <?php
    if(osc_images_enabled_at_items() && !bello_is_fineuploader()) {
        ItemForm::photos_javascript();
    }
    ?>
    <script type="text/javascript">

        function uniform_input_file(){
            photos_div = $('div.photos');
            $('div',photos_div).each(
                function(){
                    if( $(this).find('div.uploader').length == 0  ){
                        divid = $(this).attr('id');
                        if(divid != 'photos'){
                            divclass = $(this).hasClass('box');
                            if( !$(this).hasClass('box') & !$(this).hasClass('uploader') & !$(this).hasClass('row')){
                                $("div#"+$(this).attr('id')+" input:file").uniform({fileDefaultText: fileDefaultText,fileBtnText: fileBtnText});
                            }
                        }
                    }
                }
            );
        }

        <?php if(osc_locale_thousands_sep()!='' || osc_locale_dec_point() != '') { ?>
        $().ready(function(){
            $("#price").blur(function(event) {
                var price = $("#price").prop("value");
                <?php if(osc_locale_thousands_sep()!='') { ?>
                while(price.indexOf('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>')!=-1) {
                    price = price.replace('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>', '');
                }
                <?php }; ?>
                <?php if(osc_locale_dec_point()!='') { ?>
                var tmp = price.split('<?php echo osc_esc_js(osc_locale_dec_point())?>');
                if(tmp.length>2) {
                    price = tmp[0]+'<?php echo osc_esc_js(osc_locale_dec_point())?>'+tmp[1];
                }
                <?php }; ?>
                $("#price").prop("value", price);
            });
        });
        <?php }; ?>
    </script>
    <!-- end only item-post.php -->
</head>
<body>
<?php osc_current_web_theme_path('header.php'); ?>

<div class="container content">
    <div class="forcemessages-inline">
        <?php osc_show_flash_message(); ?>
    </div>
    <!-- content -->
    <div class="post_adf">
        <div class="container">
            <div class="post__form">
                <form name="item" action="<?php echo osc_base_url(true);?>" class="form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="item_edit_post" />
                    <input type="hidden" name="page" value="item" />
                    <input type="hidden" name="id" value="<?php echo osc_item_id();?>" />
                    <input type="hidden" name="secret" value="<?php echo osc_esc_html( osc_item_secret());?>" />
                    <div class="form__title">
                        <p class="title__text"><?php _e('Update your listing', 'bello'); ?></p>
                    </div>
                    <div class="form-group form-control__dbl">
                        <p class="group__title"><?php _e('Select a category', 'bello')?> <span>*</span></p>
                        <div class="dbl__row">
                            <div class="dbl__item">
                                <div class="select_box">
                                    <?php ItemForm::category_multiple_selects(null, null, __('Select a category', 'bello')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(osc_get_preference('custom-fileds', 'bello') == 'top'){ ?>
					<div class="form-group">
                        <div class="box">
                            <?php ItemForm::plugin_edit_item(); ?>
                        </div></div>
                    <?php } ?>
                           <div class="form-group">
               <?php ItemForm::multilanguage_title_description(); ?>
                    </div>
                    <?php if( osc_images_enabled_at_items() ) { ?>
                        <div class="form__title">
                            <p class="title__text"><?php _e('Add images','bello')?></p>
							<span class="text_upload"><?php _e('You can upload up to', 'bello'); ?> <?php echo osc_max_images_per_item(); ?> <?php _e('pictures per listing', 'bello'); ?></span>
                        </div>
                        <div class="form-group form-group__price">
                            <p class="group__title"><?php _e('Images', 'bello'); ?><span></span></p>
                            <?php if(osc_images_enabled_at_items()) {
                                if(bello_is_fineuploader()) {
                                    ItemForm::ajax_photos();
                                }
                            } else { ?>
                            <h2><?php _e('Photos', 'bello'); ?></h2>
                            <?php ItemForm::photos(); ?>
                            <div id="photos">
                                <?php if(osc_max_images_per_item()==0 || (osc_max_images_per_item()!=0 && osc_count_item_resources()<  osc_max_images_per_item())) { ?>
                                    <div class="row">
                                        <input type="file" name="photos[]" />
                                    </div>
                                <?php }; ?>
                            </div>
                            <a href="#" onclick="addNewPhoto(); uniform_input_file(); return false;"><?php _e('Add new photo', 'bello'); ?></a>
                        </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <!--  -->
                    <?php if( osc_price_enabled_at_items() ) { ?>
                    <div class="form__title">
                        <p class="title__text"><?php _e('Price', 'bello'); ?></p>
                    </div>
                    <div class="form-group form-group__price">
                        <p class="group__title"><?php _e('Price', 'bello'); ?> <span>*</span></p>
                        <div class="form-group-sm" style="float: left">
                        <?php ItemForm::price_input_text(); ?>
                            </div>
                        <div class="select_currency">
                            <?php ItemForm::currency_select(); ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form__title">
                        <p class="title__text"><?php _e('Listing Location', 'bello'); ?></p>
                    </div>
            <?php if(osc_get_preference('item-post', 'bello') == 'countries'){ ?>
                    <div class="form-group">
                        <p class="group__title"><?php _e('Country', 'bello'); ?> <span>*</span></p>
                        <div class="select">
                           <?php ItemForm::country_select() ; ?>
                        </div>
                    </div>
            <?php } ?>
                    <div class="form-group">
                        <p class="group__title"><?php _e('Region', 'bello'); ?> <span>*</span></p>
                        <div class="select">
                            <?php ItemForm::region_select(osc_get_regions(osc_item_country_code()), osc_item()); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="group__title"><?php _e('City', 'bello'); ?> <span>*</span></p>
                        <div class="select">
                            <?php ItemForm::city_select(null, osc_item()); ?>
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <p class="group__title"><?php _e('City Area', 'bello'); ?> <span></span></p>
                        <?php ItemForm::city_area_text(); ?>
                    </div>
                    <div class="form-group form-group-sm">
                        <p class="group__title"><?php _e('Address', 'bello'); ?> <span></span></p>
                        <?php ItemForm::address_text(); ?>
                    </div>

                    <?php if(osc_get_preference('custom-fileds', 'bello') == 'bottom'){ ?>
					<div class="form-group">
                        <div class="box">
                            <?php ItemForm::plugin_edit_item(); ?>
                        </div></div>
                    <?php } ?>
					                    <?php if(!osc_is_web_user_logged_in() ) { ?>
                    <div class="form__title">
                        <p class="title__text"><?php _e("Seller's information", 'bello'); ?></p>
                    </div>
                    <div class="form-group form-group-sm">
                        <p class="group__title"><?php _e('Name', 'bello'); ?> <span></span></p>
                        <?php ItemForm::contact_name_text(); ?>
                    </div>
                    <div class="form-group form-group-sm">
                        <p class="group__title"><?php _e('E-mail', 'bello'); ?> <span>*</span></p>
                        <?php ItemForm::contact_email_text(); ?>
                    </div>
                    <?php } ?>
					                    <div class="form-group">
                        <div class="checkbox">
                            <input type="checkbox" name="showEmail" id="showEmail">
                            <label for="showEmail"><?php _e('Show e-mail on the listing page', 'bello'); ?></label>
                        </div>
                    </div>
                    <?php if( osc_recaptcha_items_enabled() ) {?>
					<script type="text/javascript">
                                                            var RecaptchaOptions = {
                                                                theme : 'clean'
                                                            };
                                                        </script>
					<div class="form-group">
                        <div class="box">
                            <div class="row">
                                <?php osc_show_recaptcha(); ?>
                            </div>
                        </div></div>
                    <?php }?>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <?php _e('Update', 'bello'); ?>
                        </button>
                    </div>
                </form>
            <div class="form-group">
                <button class="btn btn-transparent" onclick="javascript:history.back(-1)">
                    <i class="fa fa-backward"></i>
                    <?php _e('Cancel', 'bello'); ?>
                </button>
            </div>
            </div>
        </div>
    </div>
    <!-- content -->

</div>
<div class="clearfix"></div>
<?php osc_current_web_theme_path('footer.php'); ?>
</body>
</html>
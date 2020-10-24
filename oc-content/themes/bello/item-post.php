<?php
/*
* Copyright 2015 osclass-pro.com
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
	<?php $locale = osc_get_current_user_locale(); ?>
    <script type="text/javascript">
var belloLocale = '<?php echo osc_esc_js($locale['s_name']); ?>';
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
                    <input type="hidden" name="action" value="item_add_post" />
                    <input type="hidden" name="page" value="item" />
                    <div class="form__title">
                        <p class="title__text"><?php _e('Publish a listing', 'bello'); ?></p>
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
					<div class="form-group bellotab">
                        <div class="box">
                            <?php ItemForm::plugin_post_item(); ?>
                        </div> </div>
                    <?php } ?>
					<div class="form-group bellotab">
               <?php ItemForm::multilanguage_title_description(); ?>
                    </div>
                    <?php if( osc_images_enabled_at_items() ) { ?>
                    <div class="form__title">
                        <p class="title__text"><?php _e('Add images','bello')?></p>
						<span class="text_upload"><?php _e('You can upload up to', 'bello'); ?> <?php echo osc_max_images_per_item(); ?> <?php _e('pictures per listing', 'bello'); ?></span>
                    </div>
                    <div class="form-group form-group__price">
                        <p class="group__title"><?php _e('Images', 'bello'); ?> <span></span></p>
                        <?php if(osc_images_enabled_at_items()) {
                            if(bello_is_fineuploader()) {
                                ItemForm::ajax_photos();
                            }
                        } else { ?>
                            <div id="photos" class="upload-images">
                                <div class="row">
                                    <input type="file" name="photos[]" />
                                </div>
                            </div>
                            <a href="#" onclick="addNewPhoto(); uniform_input_file(); return false;"><?php _e('Add new photo', 'bello'); ?></a>

                        <?php } ?>
                    </div>
                    <?php } ?>
                    <!--  -->
                    <?php if( osc_price_enabled_at_items() ) { ?>
                    <div class="form__title">
                        <p class="title__text"><?php _e('Price', 'bello'); ?></p>
                    </div>
                    <div class="form-group form-group__price" >
                        <p class="group__title"><?php _e('Price', 'bello'); ?> <span></span></p>
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
                            <?php ItemForm::country_select(osc_get_countries(), osc_user()); ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <p class="group__title"><?php _e('Region', 'bello'); ?> <span></span></p>
                        <div class="select">
                            <?php ItemForm::region_select(osc_get_regions(), osc_user()) ; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="group__title"><?php _e('City', 'bello'); ?> <span></span></p>
                        <div class="select">
                            <?php ItemForm::city_select(osc_get_cities(osc_user_region()), osc_user()) ; ?>
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <p class="group__title"><?php _e('Phone', 'bello'); ?> <span></span></p>
                        <?php UserForm::mobile_text(osc_user()); ?>
                    </div>
                    <div class="form-group form-group-sm">
                        <p class="group__title"><?php _e('Address', 'bello'); ?> <span></span></p>
                        <?php ItemForm::address_text(osc_user()); ?>
                    </div>
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
						<div class="checkbox">
                            <input type="checkbox" name="showMobile" id="showMobile">
                            <label for="showMobile"><?php _e('Показывать телефон в объявлениях', 'bello'); ?></label>
                        </div>
                    </div>
                    <?php if(osc_get_preference('custom-fileds', 'bello') == 'bottom'){ ?>
					<div class="form-group">
                        <div class="box">
                            <?php ItemForm::plugin_post_item(); ?>
                        </div>
						</div>
                    <?php } ?>
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
											<?php if( function_exists( "MyHoneyPot" )) { ?>		
			<?php MyHoneyPot(); ?>		
		<?php } ?>  
					
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <?php _e('Publish', 'bello'); ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- content -->

</div>
<div class="clearfix"></div>
<script type="text/javascript">
    $(document).ready(function(){

      var post_timer = setInterval(bello_lang, 250);

      function bello_lang() {
        if($('.tabbertab').length > 1 && $('.tabbertab.tabbertabhide').length) {
          var l_active = belloLocale;
          l_active = l_active.trim();

          $('.tabbernav > li > a:contains("' + l_active + '")').click();

          clearInterval(post_timer);
          return;
        }
      }

    });
</script>



<script src="https://atuin.ru/demo/masked/jquery.maskedinput.js"></script>


<script>

$(document).ready(function() {
	document.getElementById('s_phone_mobile').value='+7';
    $("#s_phone_mobile").mask("+7 (999) 999-99-99");
});
</script>
<?php osc_current_web_theme_path('footer.php'); ?>
</body>
</html>
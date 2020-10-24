<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<h2 class="render-title"><b><i class="fa fa-file-text"></i> <?php _e('Help', 'bello'); ?></b></h2>
<div id="form-horizontal">

    <ul>
	<strong><?php _e('Show regions or cities at main page', 'bello'); ?></strong>
	<li><?php _e('The panel of the administrator - Tools - Locations stats -Calculate Locations stats.', 'bello'); ?></li>
	    <br />	
    <strong><?php _e('Control of the size of images', 'bello'); ?></strong>
    <li><?php _e('The panel of the administrator - Settings - Media:', 'bello'); ?></li>
     <li> <?php _e('The miniature size - 216x150', 'bello'); ?></li>
	 <li><?php _e('The preview size - 522x362', 'bello'); ?></li>
	 <li><?php _e('The normal size - 640x480( For normal size you can setup bigger size. This is image used in item page in Lightbox)', 'bello'); ?></li>
	 <li><?php _e('Disable - Force image aspect. No white background will be added to keep the size.', 'bello'); ?></li>
	 <li><?php _e('Enable - Use ImageMagick instead of GD library', 'bello'); ?></li>
    <br />
    
    <br />
    <strong><?php _e('Ads management', 'bello'); ?></strong>
	<li><?php _e('Manage advertising platform, such as Google Adsense', 'bello'); ?> </li>
	<li><?php _e('Homepage and search middle of latest listings work only for list view', 'bello'); ?></li>
	<li><?php _e('Default - Middle calculated that on page 10 listing and show after 5 listing', 'bello'); ?></li>
	<li><?php _e('You can change this in Ads tab.', 'bello'); ?></li>
	 <br />
	<strong><?php _e('Pictures for categories', 'bello'); ?></strong>
    <li><?php _e('If you change standart Osclass categories (or add new), it is necessary for you to make the pictures for the changed categories.', 'bello'); ?></li>
	 <li><?php _e('The size of images should be 20x16 px in PNG file with transparent background', 'bello'); ?></li>
	 <li><?php _e('Images, for example, can be taken here:http://www.flaticon.com/free-icon/black-car_16301', 'bello'); ?></li>
	 <li><?php _e('Go to Category icons tab and ulpoad or replace icons.', 'bello'); ?></li>
     <br />
	 <strong><?php _e('Search Max-Min price edit', 'bello'); ?></strong>
	<li><?php _e('Open bello/js/main.js in 161 line min = 0; min price to select.', 'bello'); ?></li>
	<li><?php _e('In 162 line max = 1000000; max price.', 'bello'); ?></li>
	<li><?php _e('In 169 line from = 0; start to select price.', 'bello'); ?></li>
	<li><?php _e('In 170 line step: 10000; step to select price.', 'bello'); ?></li>
	    <br />	
		 <strong><?php _e('Old search background images', 'bello'); ?></strong>
		 <li><?php _e('In folder oc-content/themes/bello/img/main_other/', 'bello'); ?></li>
		 <br />	
	<strong><?php _e('Google Map keys', 'bello'); ?></strong>
	<li><?php _e('Enable Google Maps and Places Api', 'bello'); ?></li>
	<img src="<?php echo osc_base_url();?>oc-content/themes/bello/admin/img/QIP Shot - Screen 1410.jpg" />
	<br />
	<li><?php _e('Unfortunately Google not allow limit access to Google Map Api for domain and IP together', 'bello'); ?></li>
	<li><?php _e('In this one, you can either restrict access by domain, or by IP', 'bello'); ?></li>
	<li><?php _e('Google Maps JavaScript Api work with URLS and in can be restricted by domain name', 'bello'); ?></li>
	<li><?php _e('But Google Geocoding Api Key send request to API from server IP and in can be restricted by IP only', 'bello'); ?></li>
	<li><?php _e('That is why we recommend creating two keys. First key for Google Maps JavaScript Api and restrict it by your domain name', 'bello'); ?></li>
	<img src="<?php echo osc_base_url();?>oc-content/themes/bello/admin/img/QIP Shot - Screen 1278.jpg" />
	<br />
	<li><strong><?php _e('Second key for Google Geocoding Api and restrict it by your server IP', 'bello'); ?></strong></li>
	<br />
    <img src="<?php echo osc_base_url();?>oc-content/themes/bello/admin/img/QIP Shot - Screen 1279.jpg" />
		 <br />
		 <br />
</ul>

  <br /><br />
</div>

         

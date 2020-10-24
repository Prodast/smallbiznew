<?php 
 		   /*
 * Copyright 2017 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
?>

<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>

<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/bello/admin/settings.php');?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="items_bello" />
   <fieldset>
   <h2 class="render-title"><b><i class="fa fa-cog"></i> <?php _e('Item-post options', 'bello'); ?></b></h2>
   <div class="form-horizontal">
   <div class="form-row">
                <div class="form-label"><b><?php _e('Location option:', 'bello'); ?></b></div>

<div class="form-controls">
                    <select name="item-post">
                        <option value="countries" <?php if(osc_get_preference('item-post', 'bello') == 'countries'){ echo 'selected="selected"' ; } ?>><?php _e('With Countries','bello'); ?></option>
                        <option value="default" <?php if(osc_get_preference('item-post', 'bello') == 'default'){ echo 'selected="selected"' ; } ?>><?php _e('Without Countries','bello'); ?></option>
</select>
                </div>
</br>				
				<div class="form-label"><b><?php _e('Custom fileds postion:', 'bello'); ?></b></div>
				<div class="form-controls">
                    <select name="custom-fileds">
                        <option value="top" <?php if(osc_get_preference('custom-fileds', 'bello') == 'top'){ echo 'selected="selected"' ; } ?>><?php _e('After categories','bello'); ?></option>
                        <option value="bottom" <?php if(osc_get_preference('custom-fileds', 'bello') == 'bottom'){ echo 'selected="selected"' ; } ?>><?php _e('Bottom','bello'); ?></option>
</select>
                </div>
            </div>
</div>
<div style="clear:both;"></div>
<h2 class="render-title"><b><i class="fa fa-cog"></i> <?php _e('Item page', 'bello'); ?></b></h2>
<p><b><?php _e('Custom setting for item page.', 'bello'); ?></b></p>
   <div class="form-horizontal">
									<div class="form-row">
                <div class="form-label"><b><?php _e('Mark as in item page:', 'bello'); ?></b></div>

<div class="form-controls">
                    <select name="mark-as">
                        <option value="enable" <?php if(osc_get_preference('mark-as', 'bello') == 'enable'){ echo 'selected="selected"' ; } ?>><?php _e('Enable','bello'); ?></option>
                        <option value="disable" <?php if(osc_get_preference('mark-as', 'bello') == 'disable'){ echo 'selected="selected"' ; } ?>><?php _e('Disable','bello'); ?></option>
</select>
                </div>
            </div>
			<br>
												<div class="form-row">
                <div class="form-label"><b><?php _e('Show useful info in item page:', 'bello'); ?></b></div>

<div class="form-controls">
                    <select name="useful">
                        <option value="enable" <?php if(osc_get_preference('useful', 'bello') == 'enable'){ echo 'selected="selected"' ; } ?>><?php _e('Enable','bello'); ?></option>
                        <option value="disable" <?php if(osc_get_preference('useful', 'bello') == 'disable'){ echo 'selected="selected"' ; } ?>><?php _e('Disable','bello'); ?></option>
</select>
                </div>
            </div>
			<br>
																		<div class="form-row">
                <div class="form-label"><b><?php _e('Google Maps JavaScript API key:', 'bello'); ?></b></div>

<div class="form-controls">
                    <textarea style="height: 18px; width: 500px;" name="map-key"><?php echo osc_esc_html( osc_get_preference('map-key', 'bello') ); ?></textarea>
                   <br>
                    <div class="help-box"><?php _e('Get Google Maps JavaScript API key:', 'bello'); ?></div><a href="https://developers.google.com/maps/documentation/javascript/get-api-key?hl=en" target="_blank">https://developers.google.com/maps/documentation/javascript/get-api-key?hl=en</a>
                </div>
            </div>
									<div class="form-row">
                <div class="form-label"><b><?php _e('Google Geocoding Api Key:', 'bello'); ?></b></div>
                <div class="form-controls">
					<textarea style="height: 18px; width: 500px;" name="map-key"><?php echo osc_esc_html( osc_get_preference('map-key-geo', 'bello') ); ?></textarea>
					   <br>
                </div>
				<div class="help-box"><?php _e('Read Help about keys:', 'bello'); ?><a target="_blank" href="<?php echo osc_base_url();?>oc-admin/index.php?page=appearance&action=render&file=oc-content/themes/bello/admin/settings.php#help"><?php _e('Help', 'eva'); ?></a></div>
            </div>
			<div class="form-row">
                <div class="form-label"><b><?php _e('Show Google Map in item page:', 'bello'); ?></b></div>

<div class="form-controls">
                    <select name="map-bello">
                        <option value="enable" <?php if(osc_get_preference('map-bello', 'bello') == 'enable'){ echo 'selected="selected"' ; } ?>><?php _e('Enable','bello'); ?></option>
                        <option value="disable" <?php if(osc_get_preference('map-bello', 'bello') == 'disable'){ echo 'selected="selected"' ; } ?>><?php _e('Disable','bello'); ?></option>
</select>
                </div>
            </div>
</div>
</fieldset>
			<div class="form-actions">
				<input id="button" type="submit" value="<?php echo osc_esc_html(__('Save changes', 'bello')); ?>" class="btn btn-submit">
			</div>
	
	
</form>
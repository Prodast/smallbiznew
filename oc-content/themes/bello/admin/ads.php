<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2014 OSCLASS
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
?>

<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<h2 class="render-title"><b><i class="fa fa-money"></i> <?php _e('Ads management', 'bello'); ?></b></h2>
	<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/bello/admin/settings.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="ads_bello" />
	 <fieldset>
	
    <div class="form-row">
        <div class="form-label"></div>
        <div class="form-controls">
            <p><?php _e('In this section you can configure your site to display ads and start generating revenue.', 'bello'); ?><br/><?php _e('If you are using an online advertising platform, such as Google Adsense, copy and paste here the provided code for ads.', 'bello'); ?><br/><?php _e('Important! Google Adsense allows you to place only three blocks in page ', 'bello'); ?></p>
        </div>
    </div>
	
   
        <div class="form-horizontal">
		     <div class="form-row">
                <div class="form-label"><?php _e('Main page under categories', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;"name="cat-bellorevo"><?php echo osc_esc_html( osc_get_preference('cat-bellorevo', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the Main page under categories. Note that the  ad will be Responsive.', 'bello'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Homepage top of  latest listings', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;"name="main-bellorevo-top"><?php echo osc_esc_html( osc_get_preference('main-bellorevo-top', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the top of your latest listings in main page. Note that the  ad will be Responsive.', 'bello'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Homepage under of latest listings', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="main-bellorevo-under"><?php echo osc_esc_html( osc_get_preference('main-bellorevo-under', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on the main page under of your latest listings. Note that the  ad will be Responsive.', 'bello'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Homepage middle of latest listings(only list view).Read Help', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="main-bellorevo-middle"><?php echo osc_esc_html( osc_get_preference('main-bellorevo-middle', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on the main page middle of your latest listings. Note that the  ad will be Responsive.', 'bello'); ?></div>
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><b><?php _e('No. of item after Show - Homepage middle:', 'bello'); ?></b></div>
                <div class="form-controls">
					<input type="text" class="input-small" name="main-middle" value="<?php echo osc_esc_html( osc_get_preference('main-middle', 'bello') ); ?>" />
                </div>
            </div>
			<div style="clear:both;"></div>
            <div class="form-row">
                <div class="form-label"><?php _e('Search results top', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="search-bellorevo-top"><?php echo osc_esc_html( osc_get_preference('search-bellorevo-top', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the top search results of your site. Note that the  ad will be Responsive.', 'bello'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Search results middle(only list view).Read Help', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="search-bellorevo_middle"><?php echo osc_esc_html( osc_get_preference('search-bellorevo_middle', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at middle of search results of your website. Note that the  ad will be Responsive.', 'bello'); ?></div>
                </div>
            </div>
			<div class="form-row" >
                <div class="form-label"><b><?php _e('No. of item after Show - Search results middle:', 'bello'); ?></b></div>
                <div class="form-controls">
					<input type="text" class="input-small" name="search-middle" value="<?php echo osc_esc_html( osc_get_preference('search-middle', 'bello') ); ?>" />
                </div>
            </div>
			<div style="clear:both;"></div>
			<div class="form-row">
                <div class="form-label"><?php _e('Search under of listings', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="search-bellorevo_under"><?php echo osc_esc_html( osc_get_preference('search-bellorevo_under', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on the search page under of your listings. Note that the  ad will be Responsive.', 'bello'); ?></div>
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><?php _e('Item under of listing description', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="item-bellorevo_desc"><?php echo osc_esc_html( osc_get_preference('item-bellorevo_desc', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on the item page under of listing description. Note that the  ad will be Responsive.', 'bello'); ?></div>
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><?php _e('Item sidebar', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="item-bellorevo_image"><?php echo osc_esc_html( osc_get_preference('item-bellorevo_image', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on the item page sidebar. Note that the  ad will be Responsive.', 'bello'); ?></div>
                </div>
            </div>
			<div class="form-actions">
                <input type="submit" value="<?php echo osc_esc_html( __('Save changes', 'bello') ); ?>" class="btn btn-submit">
            </div>
        </div>
    </fieldset>
</form>









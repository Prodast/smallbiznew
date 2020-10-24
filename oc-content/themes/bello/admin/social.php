<?php 
 		   /*
 * Copyright 2016 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
?>

<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>

<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/bello/admin/settings.php');?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="social_bello" />
   <fieldset>
   <div class="form-horizontal">
   
       <h2 class="render-title"><b><i class="fa fa-info-circle"></i> <?php _e('Contact Information', 'bello'); ?></b></h2>

       <div class="form-row">
           <div class="form-label"><?php _e('Your location', 'bello'); ?></div>
           <div class="form-controls">
               <input maxlength="80" class="input_contact" name="contact-locate" value="<?php echo osc_esc_html( osc_get_preference('contact-locate', 'bello') ); ?>">
               <br/><br/>
               <div class="help-box"><?php _e('This text will be displayed in the footer of the page  in section Contacts.', 'bello'); ?></div>
           </div>
       </div>
       <div class="form-row">
           <div class="form-label"><?php _e('Your phones', 'bello'); ?></div>
           <div class="form-controls">
               <input maxlength="80" class="input_contact" name="contact-phone" value="<?php echo osc_esc_html( osc_get_preference('contact-phone', 'bello') ); ?>">
               <br/><br/>
               <div class="help-box"><?php _e('This text will be displayed in the footer of the page  in section Contacts.', 'bello'); ?></div>
           </div>
       </div>
       <div class="form-row">
           <div class="form-label"><?php _e('Your email', 'bello'); ?></div>
           <div class="form-controls">
               <input maxlength="80" class="input_contact" name="contact-email" value="<?php echo osc_esc_html( osc_get_preference('contact-email', 'bello') ); ?>">
               <br/><br/>
               <div class="help-box"><?php _e('This text will be displayed in the footer of the page  in section Contacts.', 'bello'); ?></div>
           </div>
       </div>
<h2 class="render-title"><b><i class="fa fa-cog"></i> <?php _e('Social links in footer', 'bello'); ?></b></h2>
		     <div class="form-row">
                <div class="form-label"><?php _e('Facebook', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 18px; width: 500px;" name="facebook-bellorevo"><?php echo osc_esc_html( osc_get_preference('facebook-bellorevo', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This link to you Facebook page will be shown in footer.', 'bello'); ?></div>
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><?php _e('Twitter', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 18px; width: 500px;" name="twitter-bellorevo"><?php echo osc_esc_html( osc_get_preference('twitter-bellorevo', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This link to you Twitter page will be shown in footer.', 'bello'); ?></div>
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><?php _e('Google+', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 18px; width: 500px;" name="google-bellorevo"><?php echo osc_esc_html( osc_get_preference('google-bellorevo', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This link to you Google+ page will be shown in footer.', 'bello'); ?></div>
                </div>
            </div>
       <div class="form-row">
           <div class="form-label"><?php _e('LinkedIn', 'bello'); ?></div>
           <div class="form-controls">
               <textarea style="height: 18px; width: 500px;" name="in-bellorevo"><?php echo osc_esc_html( osc_get_preference('in-bellorevo', 'bello') ); ?></textarea>
               <br/><br/>
               <div class="help-box"><?php _e('This link to you LinkedIn page will be shown in footer.', 'bello'); ?></div>
           </div>
       </div>
       <div class="form-row">
           <div class="form-label"><?php _e('Pinterest', 'bello'); ?></div>
           <div class="form-controls">
               <textarea style="height: 18px; width: 500px;" name="pinterest-bellorevo"><?php echo osc_esc_html( osc_get_preference('pinterest-bellorevo', 'bello') ); ?></textarea>
               <br/><br/>
               <div class="help-box"><?php _e('This link to you Pinterest page will be shown in footer.', 'bello'); ?></div>
           </div>
       </div>
	   <div class="form-row">
           <div class="form-label"><?php _e('Vkontakte', 'bello'); ?></div>
           <div class="form-controls">
               <textarea style="height: 18px; width: 500px;" name="vk-bellorevo"><?php echo osc_esc_html( osc_get_preference('vk-bellorevo', 'bello') ); ?></textarea>
               <br/><br/>
               <div class="help-box"><?php _e('This link to you Vkontakte page will be shown in footer.', 'bello'); ?></div>
           </div>
       </div>
       <div class="form-row">
           <div class="form-label"><?php _e('Odnoklassniki', 'bello'); ?></div>
           <div class="form-controls">
               <textarea style="height: 18px; width: 500px;" name="odnoklassniki-bellorevo"><?php echo osc_esc_html( osc_get_preference('odnoklassniki-bellorevo', 'bello') ); ?></textarea>
               <br/><br/>
               <div class="help-box"><?php _e('This link to you Odnoklassniki page will be shown in footer.', 'bello'); ?></div>
           </div>
       </div>
	   <h2 class="render-title"><b><i class="fa fa-picture-o"></i> <?php _e('Footer Background Color', 'bello'); ?></b></h2>
	<div class="form-row">
                        <div class="form-label"><?php _e('Background color', 'bello'); ?></div>
                        <div class="form-controls">
                            <input class="jscolor" type="text" class="xlarge" name="color-footer" value="<?php echo osc_esc_html(osc_get_preference('color-footer', 'bello')); ?>" style="background-color:<?php echo osc_esc_html(osc_get_preference('color-footer', 'bello')); ?>;"/><span>
			    
                        </div>
                    </div>
			</div>

			<div class="form-actions">
				<input id="button" type="submit" value="<?php echo osc_esc_html( __('Save changes', 'bello') ); ?>" class="btn btn-submit">
			</div>
	
	</fieldset>
</form>
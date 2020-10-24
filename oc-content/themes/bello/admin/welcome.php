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

  <h2 class="render-title"><b><i class="fa fa-file-text"></i> <?php _e('Main Welcome Text and Search Background Image', 'bello'); ?></b></h2>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/bello/admin/settings.php');?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="welcome_bello" />
   <fieldset>
   <div class="form-horizontal">
		     <div class="form-row">
                <div class="form-label"><?php _e('Main page H1 Welcome Text ', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 59px; width: 500px;" name="mainh1-bellorevo"><?php echo osc_esc_html( osc_get_preference('mainh1-bellorevo', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This  H1 Welcome Text be shown at the Main page.', 'bello'); ?></div>
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><?php _e('Main page under H1 Welcome Text ', 'bello'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="maintext-bellorevo"><?php echo osc_esc_html( osc_get_preference('maintext-bellorevo', 'bello') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This Welcome Text under H1 be shown at the Main page.', 'bello'); ?></div>
                </div>
            </div>
			</div>
    

			<div class="form-actions">
				<input id="button" type="submit" value="<?php echo osc_esc_html( __('Save changes') ); ?>" class="btn btn-submit">
			</div>
	
	</fieldset>
</form>
<h2 class="render-title"><b><i class="fa fa-picture-o"></i> <?php _e('Main Search Background Image', 'bello'); ?></b></h2>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/bello/admin/settings.php');?>" method="post" enctype="multipart/form-data" class="nocsrf">
    <input type="hidden" name="action_specific" value="upload_main_image" />
	<?php 
$image_dir = osc_base_path().'oc-content/themes/bello/img/main/*';
$images = glob($image_dir); ?>
  <?php if($images){ ?>
<h2 class="render-title"><?php _e('Loaded image', 'bello'); ?></h2>
  <table style="width:100%">
    <tr>
      <?php $i=0; foreach($images as $image) { if($i%5===0){echo '</tr><tr><td>&nbsp;</td></tr><tr>';} ?>
      <td style="width:20%; padding:5px;"><img style="max-width:400px; max-height:200px;background-color:#474749;" src="<?php echo osc_base_url().'oc-content/themes/bello/img/main/'.basename($image); ?>"/><br />
        <strong><?php echo basename($image); ?></strong>&nbsp;&nbsp;&nbsp;<a href="<?php echo osc_admin_render_theme_url('oc-content/themes/bello/admin/settings.php'); ?>&action_specific=remove_main_image&main_name=<?php echo basename($image); ?>">
        <?php _e('Delete', 'bello'); ?>
        </a></td>
      <?php $i++; }  ?>
   </tr>
   <br/>             
  </table>
  <?php } ?>
			   <div class="help-box"><?php _e('Recommended image size - 1920x456px.', 'bello'); ?></div>
			   <div class="help-box"><?php _e('IMPORTANT!Before downloading new pictures - delete the old.', 'bello'); ?></div>
  <input type="file" name="main_image" id="main_image" accept="image/*"  />
   			<div class="form-actions">
				<input id="button" type="submit" value="<?php echo osc_esc_html(__('Upload','bello')); ?>" class="btn btn-submit">
			</div>
	
	</form>
<h2 class="render-title"><b><i class="fa fa-picture-o"></i> <?php _e('Main Search Background Color', 'bello'); ?></b></h2>
<div class="help-box"><?php _e('You can select background color for image with transparent background.', 'bello'); ?></div>
<div class="help-box"><?php _e('Or you can just select color and not upload image.', 'bello'); ?></div>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/bello/admin/settings.php');?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="main_image_color" />
	<div class="form-row">
                        <div class="form-label"><?php _e('Background color', 'bello'); ?></div>
                        <div class="form-controls">
                            <input class="jscolor" type="text" class="xlarge" name="color-mainimage" value="<?php echo osc_esc_html(osc_get_preference('color-mainimage', 'bello')); ?>" style="background:<?php echo osc_esc_html(osc_get_preference('color-mainimage', 'bello')); ?>;"/><span>
			    
                        </div>
                    </div>
			<div class="form-actions">
				<input id="button" type="submit" value="<?php echo osc_esc_html( __('Save changes', 'bello') ); ?>" class="btn btn-submit">
			</div>
	
	</fieldset>
</form>
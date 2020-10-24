<?php
 		   /*
 * Copyright 2016 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */

?>

<div class="header-form">
	<form class="form nocsrf" action="<?php echo osc_base_url(true); ?>" method="post">
		<input type="hidden" name="page" value="search"/>
		<div class="input-block">
			<input class="search-input"  type="text" name="sPattern" id="query" value="" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'bello'), 'bello')); ?>">
		</div>
		<div class="input-block" id="countryChoose">
			<select name="sCategory" id="sCategory" class="form-select-2">
				<option><?php echo __('Select a category', 'bello')?></option>
				<?php foreach (Category::newInstance()->toTree() as $category){ ?>
					<option value="<?php echo $category['pk_i_id']?>"><?php echo $category['s_name']?></option>
				<?php } ?>
			</select>
		</div>
		<div class="input-block" id="regionChoose">
			<?php bello_region_select_items('form-select-2') ; ?>
		</div>
		<div class="input-block">
			<button class="btn btn-sm btn-primary" type="submit"><?php _e("Search", 'bello');?></button>
		</div>
	</form>
</div>



<?php
 		   /*
 * Copyright 2016 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */

?>
<div class="container-fluid search-block">
			<div class="container">
					<div class="title">
						<h1 class="text-top"><?php if( osc_get_preference('mainh1-bellorevo', 'bello') != '') {?>
                    <?php echo osc_get_preference('mainh1-bellorevo', 'bello'); ?>
                <?php } ?>  </h1>
						<p class="text-bot"><?php if( osc_get_preference('maintext-bellorevo', 'bello') != '') {?>
                    <?php echo osc_get_preference('maintext-bellorevo', 'bello'); ?>
                <?php } ?></p>
					</div>
					<form action="<?php echo osc_base_url(true); ?>" method="get" class="search-form nocsrf" <?php /* onsubmit="javascript:return doSearch();"*/ ?>>
						 <input type="hidden" name="page" value="search"/>
						<input class="search-input" type="text" name="sPattern" id="query" value="" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'bello'), 'bello')); ?>">

							<?php osc_categories_select('sCategory', null, __('Select a category', 'bello')) ; ?>

						<button class="btn btn-default" type="submit"><img src="<?php echo osc_current_web_theme_url('img/search-icon.png');?>" alt=""><?php _e("Search", 'bello');?></button>
					</form>
			</div>
		</div>
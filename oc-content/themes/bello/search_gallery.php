<?php
/*
* Copyright 2016 osclass-pro.com
*
* You shall not distribute this theme and any its files (except third-party libraries) to third parties.
* Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
*/

osc_get_premiums(20);
if(osc_count_premiums() > 0) {
	?>
	<?php while(osc_has_premiums()) { ?>
		<?php  $index = 0;

		?>

		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
			<div class="product product--block" id="<?php if(function_exists('ppaypal_premium_get_class_color')){echo ppaypal_premium_get_class_color(osc_premium_id());}?>">
				<div class="product__favorites">
					<b class="favorites__icon"></b>
				</div>
				<div class="product__img">
					<?php if( osc_images_enabled_at_items() ) { ?>
					<a href="<?php echo osc_premium_url(); ?>" class="img__wrap">
							<?php if( osc_count_premium_resources() ) { ?>
						<img src="<?php echo osc_resource_thumbnail_url(); ?>"  alt="<?php echo osc_esc_html(osc_premium_title()); ?>" class="img" /><?php } else { ?>
								<img src="<?php echo osc_current_web_theme_url('img/no_photo.gif'); ?>" class="img" />
							<?php } ?>
					</a>
					<?php } ?>
				</div>
				<div class="product__content">
					<div class="product__title">
						<a href="<?php echo osc_premium_url(); ?>" class="title__text"><?php echo osc_premium_title(); ?></a>
					</div>
					<div class="product__info">
						<div class="info__block">
						<?php if( osc_get_preference('item-icon', 'bello') == 'enable') {?>
							<b class="info__icon"><img src="<?php echo osc_current_web_theme_url('img/') . bello_category_root(osc_premium_category_id()) . '.png' ?>"></b>
						<?php } ?>
							<span><?php echo bello_category_root_name(osc_premium_category_id())?></span>
						</div>
						<div class="info__block">
							<b class="info__icon info__icon--place"></b>
							<span><?php echo osc_premium_city()?></span>
						</div>
					</div>
					<div class="product__price">
						<div class="price__text"><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled(osc_premium_category_id()) ) {echo osc_premium_formated_price() ;} ?></div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$index++;
		if($index == 20){
			break;
		}
	}
	?>

<?php } ?>

<?php while(osc_has_items()) { ?>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" >
		<div class="product product--block" id="<?php if(function_exists('ppaypal_get_class_color')){echo ppaypal_get_class_color(osc_item_id());}?>">
			<div class="product__img">
				<?php if( osc_images_enabled_at_items() ) { ?>
				<a href="<?php echo osc_item_url(); ?>" class="img__wrap">
						<?php if( osc_count_item_resources() ) { ?>
						<img src="<?php echo osc_resource_thumbnail_url(); ?>"  alt="<?php echo osc_esc_html(osc_item_title()); ?>" class="img" /><?php } else { ?>
							<img src="<?php echo osc_current_web_theme_url('img/no_photo.gif'); ?>" class="img" />
						<?php } ?>
				</a>
				<?php } ?>
			</div>
			<div class="product__content">
				<div class="product__title">
					<a href="<?php echo osc_item_url(); ?>" class="title__text"><?php echo osc_item_title();  ?></a>
				</div>
				<div class="product__info">
					<div class="info__block">
					<?php if( osc_get_preference('item-icon', 'bello') == 'enable') {?>
						<b class="info__icon"><img src="<?php echo osc_current_web_theme_url('img/') . bello_category_root(osc_item_category_id()) . '.png' ?>" ></b>
					<?php } ?>
						<span><?php echo bello_category_root_name(osc_item_category_id())?></span>
					</div>
					<div class="info__block">
						<b class="info__icon info__icon--place"></b>
						<span><?php echo osc_item_city()?></span>
					</div>
				</div>
				<div class="product__price">
					<div class="price__text"><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { echo osc_item_formated_price(); }?></div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<div class="related">
<div class="related_title">
	<?php if( osc_count_items() == 0) { ?>
		<?php } else { ?>
	
		<p class="title__text"><?php _e('Related Ads', 'bello'); ?></p>
		<div class="slider__nav">
			<a href="/" class="nav__button nav__button--left"><b class="icon icon__arrow--left"></b></a>
			<a href="/" class="nav__button nav__button--right"><b class="icon icon__arrow--right"></b></a>
		</div>
	</div>
	<div class="slider__slides slider__related owl-carousel">
		<?php while ( osc_has_items() ) { ?>
		<div class="slider__slide">
			<div class="product product--block">
				<?php if(osc_item_is_premium()){?>
				<div class="product__favorites">
					<b class="favorites__icon"></b>
				</div>
				<?php } ?>
				<div class="product__img">
			<?php if( osc_images_enabled_at_items() ) { ?>
					<a href="<?php echo osc_item_url(); ?>" class="img__wrap">
						<?php if( osc_count_item_resources() ) { ?><img src="<?php echo osc_resource_thumbnail_url(); ?>"  alt="<?php echo osc_esc_html(osc_item_title()); ?>" class="img" /><?php } else { ?>
							<img src="<?php echo osc_current_web_theme_url('img/no_photo.gif'); ?>" class="img" />
						<?php } ?>
					</a >
			<?php } ?>
				</div>
				<div class="product__content">
					<div class="product__title">
						<a href="<?php echo osc_item_url(); ?>" class="title__text"><?php if(strlen(osc_item_title()) > 21){ echo mb_substr(osc_item_title(), 0, 20,'UTF-8').'...'; } else { echo osc_item_title(); } ?></a>
					</div>
					<div class="product__info">
						<div class="info__block">
							<?php if( osc_get_preference('item-icon', 'bello') == 'enable') {?>
							<b class="info__icon"><img src="<?php echo osc_current_web_theme_url('img/') . bello_category_root(osc_item_category_id()) . '.png' ?>" alt=""></b>
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
		<?php } ?>
	</div>
</div>

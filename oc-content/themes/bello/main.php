<?php
/*
* Copyright 2017 osclass-pro.com
*
* You shall not distribute this theme and any its files (except third-party libraries) to third parties.
* Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
*/
osc_enqueue_script('jquery');
osc_enqueue_script('jquery-ui');
osc_enqueue_script('global');
osc_enqueue_script('main');
osc_enqueue_script('plugins');
osc_enqueue_script('select2');
osc_enqueue_script('date');
osc_enqueue_script('jquery-validate');
?>
<!DOCTYPE html>
<html lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
	<?php osc_current_web_theme_path('head.php'); ?>
	<meta name="robots" content="index, follow" />
	<meta name="googlebot" content="index, follow" />
</head>
<body>
<?php osc_current_web_theme_path('header.php'); ?>
<div style="clear:both"></div>
<?php 
$image_dir = osc_base_path().'oc-content/themes/bello/img/main/*';
$images = glob($image_dir);
foreach($images as $image){$img = basename($image);} 
?>
<div class="header" style="<?php if( $img != '') {?>background:url(<?php echo osc_base_url(); ?>oc-content/themes/bello/img/main/<?php echo $img; ?>) center no-repeat;<?php } ?><?php if( osc_get_preference('color-mainimage', 'bello') != '') {?>background-color:#<?php echo osc_get_preference('color-mainimage', 'bello'); ?>!important;<?php } ?>">
	<div class="container">
		<div class="row">
			<?php
			osc_current_web_theme_path('inc.main.slogan.php');
			if(bello_regcity_as() == 'inc.search'){osc_current_web_theme_path('inc.search.php');
			} elseif(bello_regcity_as() == 'inc.search.items'){osc_current_web_theme_path('inc.search.items.php');
			} elseif(bello_regcity_as() == 'inc.search.city.items'){osc_current_web_theme_path('inc.search.cityitems.php');
			} elseif(bello_regcity_as() == 'inc.search.city'){osc_current_web_theme_path('inc.search.city.php');
			} elseif(bello_regcity_as() == 'inc.search.countries'){osc_current_web_theme_path('inc.search.countries.php');
			} else{echo '<div style="height:150px"></div>';
			}
			?>
		</div>
	</div>
</div>
<div class="clear"></div>
<!-- Content -->
<?php osc_current_web_theme_path('inc.main.category.php') ; ?>
<div class="forcemessages-inline">
	<?php osc_show_flash_message(); ?>
</div>
<?php if( osc_get_preference('cat-bellorevo', 'bello') != '') {?>
<div class="ads">
	<div class="container">
		<div class="row">
		<?php echo osc_get_preference('cat-bellorevo', 'bello'); ?>
		</div>
	</div>
</div>
	<div class="clearfix"></div>
	<!-- /cat ad Adaptive-->
<?php } ?>

<?php if( osc_get_preference('main-carousel', 'bello') == 'premium'){?>
	<?php $num_ads = bello_carousel_num_ads() ; ?>
	<?php osc_get_premiums($num_ads); ?>
	<?php if( osc_count_premiums() == 0) { ?>
		<br>
	<?php }else{ ?>

		<div class="fad">
			<div class="container">
				<div class="fad__title text-center">
					<h2><?php _e('Premium listings', 'bello'); ?></h2>
				</div>
				<div class="row">
					<div class="fad__slider">
						<div class="slider__nav">
							<a href="#" class="nav__button nav__button--left"><b class="icon icon__arrow--left"></b></a>
							<a href="#" class="nav__button nav__button--right"><b class="icon icon__arrow--right"></b></a>
						</div>
						<div class="slider__slides slider__fad owl-carousel">

							<?php $index = 0; while(osc_has_premiums()){?>
								<div class="slider__slide">
									<div class="product product--block" id="<?php if(function_exists('ppaypal_premium_get_class_color')){echo ppaypal_premium_get_class_color(osc_premium_id());}?>">
										<div class="product__favorites">
											<b class="favorites__icon"></b>
										</div>
										<div class="product__img">
											<a href="<?php echo osc_premium_url() ; ?>" class="img__wrap">
												<?php if( osc_images_enabled_at_items() ) { ?>
													<?php if( osc_count_premium_resources() ) { ?>
														<img src="<?php echo osc_resource_thumbnail_url(); ?>" class="img" />
													<?php } else { ?>
														<img src="<?php echo osc_current_web_theme_url('img/no_photo.gif') ; ?>" class="img" />
													<?php } ?>
												<?php } ?>
											</a >
										</div>
										<div class="product__content">
											<div class="product__title">
												<a href="<?php echo osc_premium_url() ; ?>" class="title__text"><?php echo osc_premium_title(); ?></a>
											</div>
											<div class="product__info">
												<div class="info__block">
													<?php if( osc_get_preference('item-icon', 'bello') == 'enable') {?>
													<b class="info__icon"><img src="<?php echo osc_current_web_theme_url('img/').bello_category_root(osc_premium_category_id()).'.png'; ?>"></b>
													<?php } ?>
													<span><?php echo bello_category_root_name(osc_premium_category_id());?></span>
												</div>
												<div class="info__block">
													<b class="info__icon info__icon--place"></b>
													<span><?php echo osc_premium_city(); ?></span>
												</div>
											</div>
											<div class="product__price">
												<div class="price__text"><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled(osc_premium_category_id()) ) { echo osc_premium_formated_price() ; } ?></div>
											</div>
										</div>
									</div>
								</div>
								<?php
								$index++;
								if($index == $num_ads){
									break;
								}
								?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

<?php }elseif(osc_get_preference('main-carousel', 'bello') == 'popular'){?>
	<?php $num_ads = bello_carousel_num_ads() ; ?>
	<?php bello_popular_ads_start();?>
	<?php if( osc_count_custom_items() == 0) { ?>
		<p class="empty"></p>
	<?php } else { ?>
		<div class="fad">
			<div class="container">
				<div class="fad__title text-center">
					<h2><?php _e('Most popular listings', 'bello'); ?></h2>
				</div>
				<div class="row">
					<div class="fad__slider">
						<div class="slider__nav">
							<a href="#" class="nav__button nav__button--left"><b class="icon icon__arrow--left"></b></a>
							<a href="#" class="nav__button nav__button--right"><b class="icon icon__arrow--right"></b></a>
						</div>
						<div class="slider__slides slider__fad owl-carousel">

							<?php $index = 0; while(osc_has_custom_items()){?>
								<div class="slider__slide">
									<div class="product product--block">
										<div class="product__favorites">
											<b class="favorites__icon"></b>
										</div>
										<div class="product__img">
											<a href="<?php echo osc_item_url() ; ?>" class="img__wrap">
												<?php if( osc_images_enabled_at_items() ) { ?>
													<?php if( osc_count_item_resources() ) { ?>
														<img src="<?php echo osc_resource_thumbnail_url(); ?>" class="img" />
													<?php } else { ?>
														<img src="<?php echo osc_current_web_theme_url('img/no_photo.gif') ; ?>" class="img" />
													<?php } ?>
												<?php } ?>
											</a >
										</div>
										<div class="product__content">
											<div class="product__title">
												<a href="<?php echo osc_item_url() ; ?>" class="title__text"><?php echo osc_item_field('s_title'); ?></a>
											</div>
											<div class="product__info">
												<div class="info__block">
													<?php if( osc_get_preference('item-icon', 'bello') == 'enable') {?>
													<b class="info__icon"><img src="<?php echo osc_current_web_theme_url('img/').bello_category_root(osc_item_field('fk_i_category_id')).'.png'; ?>"></b>
													<?php } ?>
													<span><?php  echo bello_category_root_name(osc_item_field('fk_i_category_id'))?></span>
												</div>
												<div class="info__block">
													<b class="info__icon info__icon--place"></b>
													<span><?php echo osc_item_field('s_city'); ?></span>
												</div>
											</div>
											<div class="product__price">
												<div class="price__text"><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { echo osc_item_formated_price(); } ?></div>
											</div>
										</div>
									</div>
								</div>
								<?php
								$index++;
								if($index == $num_ads){
									break;
								}
								?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

<?php } ?>

<?php if( osc_get_preference('main-bellorevo-top', 'bello') != '') {?>
<div class="ads">
	<div class="container">
		<div class="row">
			<?php echo osc_get_preference('main-bellorevo-top', 'bello'); ?>
		</div>
	</div>
</div>
	<div class="clearfix"></div>
<?php } ?>

<div class="products">
	<div class="container">
		<div class="products__title">
			<h2><?php _e('Latest Listings', 'bello'); ?></h2>
		</div>
		<div class="products__change">
			<a href="<?php echo osc_base_url(true); ?>?sShowAs=gallery" class="change__button change__button--blocks <?php if(bello_show_as() == 'gallery'){ echo 'change__button--active';} ?>"><b class="icon"></b></a>
			<a href="<?php echo osc_base_url(true); ?>?sShowAs=list" class="change__button change__button--list <?php if(bello_show_as() == 'list'){ echo 'change__button--active';} ?>"><b class="icon"></b></a>
		</div>
		<?php osc_reset_latest_items(); ?>
		<?php if(osc_count_latest_items() == 0){ ?>
			<p class="empty"><?php _e('No Latest Listings', 'bello'); ?></p>
			<div style="min-height: 100px;"></div>
		<?php }else{ ?>
			<?php if(bello_show_as() == 'gallery'){?>
				<div class="row">
					<?php while(osc_has_latest_items()){?>
						<div class="col-lg-15 col-md-3 col-sm-4 col-xs-6" >
							<div class="product product--block" id="<?php if(function_exists('ppaypal_get_class_color')){echo ppaypal_get_class_color(osc_item_id());}?>">
								<div class="product__img">
									<?php if(osc_images_enabled_at_items()){ ?>
										<a href="<?php echo osc_item_url(); ?>" class="img__wrap">
											<?php if( osc_count_item_resources()){ ?><img src="<?php echo osc_resource_thumbnail_url(); ?>"  alt="<?php echo osc_esc_html(osc_item_title()); ?>" class="img"/><?php }else{ ?>
												<img src="<?php echo osc_current_web_theme_url('img/no_photo.gif'); ?>" class="img" />
											<?php } ?>
										</a>
									<?php } ?>
								</div>
								<div class="product__content">
									<div class="product__title">
										<a href="<?php echo osc_item_url(); ?>" class="title__text"><?php echo osc_item_title(); ?></a>
									</div>
									<div class="product__info">
										<div class="info__block">
											<?php if( osc_get_preference('item-icon', 'bello') == 'enable') {?>
											<b class="info__icon"><img src="<?php echo osc_current_web_theme_url('img/').bello_category_root(osc_item_category_id()).'.png'; ?>"></b>
						        			<?php } ?>
											<span><?php echo bello_category_root_name(osc_item_category_id()); ?></span>
										</div>
										<div class="info__block">
											<b class="info__icon info__icon--place"></b>
											<span><?php echo osc_item_city(); ?></span>
										</div>
									</div>
									<div class="product__price">
										<div class="price__text"><?php if(osc_price_enabled_at_items() && osc_item_category_price_enabled()) {echo osc_item_formated_price(); } ?></div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php }else{ ?>
				<div class="products__list">
					<?php $index1 = 0;  while(osc_has_latest_items()) { $index1++; ?>
						<div class="col-md-12 col-sm-4 col-xs-6">
							<div class="product product--list">
								<div class="product__img">
									<?php if(osc_images_enabled_at_items()){ ?>
										<a href="<?php echo osc_item_url(); ?>" class="img__wrap">
											<?php if( osc_count_item_resources()){ ?><img src="<?php echo osc_resource_thumbnail_url(); ?>"  alt="<?php echo osc_esc_html(osc_item_title()); ?>" class="img"/><?php }else{ ?>
												<img src="<?php echo osc_current_web_theme_url('img/no_photo.gif'); ?>" class="img" />
											<?php } ?>
										</a>
									<?php } ?>
								</div>
								<div class="product__content" id="<?php if(function_exists('ppaypal_get_class_color')){echo ppaypal_get_class_color(osc_item_id());}?>">
									<div class="content__block">
										<div class="product__title">
											<a href="<?php echo osc_item_url(); ?>" class="title__text"><?php echo osc_highlight( osc_item_title() ); ?></a>
										</div>
										<div class="product__info">
											<div class="info__content">
												<p class="content__text"><?php echo osc_highlight(osc_item_description()); ?></p>
											</div>
											<div class="info__block">
												<b class="info__icon info__icon--place"></b>
												<span><?php echo osc_item_city(); ?></span>
											</div>
										</div>
									</div>
									<div class="product__price">
										<div class="price__text"><?php if(osc_price_enabled_at_items() && osc_item_category_price_enabled()) {echo osc_item_formated_price(); } ?></div>
										<div class="product__info">
											<div class="info__block">
												<?php if( osc_get_preference('item-icon', 'bello') == 'enable') {?>
												<b class="info__icon"><img src="<?php echo osc_current_web_theme_url('img/').bello_category_root(osc_item_category_id()).'.png'; ?>"></b>
												<?php } ?>
												<span><?php echo bello_category_root_name(osc_item_category_id())?></span>
											</div>
										</div>
										<a href="<?php echo osc_item_url()?>" class="btn btn-primary"><?php _e('Read more', 'bello')?></a>

									</div>
								</div>
							</div>
						</div>
						<?php if($index1 == osc_get_preference('main-middle', 'bello') && osc_get_preference('search-middle', 'bello') !== '' ) { ?>
						<div class="clearfix"></div>
						<div class="main-anonce">
							<div class="container">
								<div class="row">
								<?php osc_run_hook('main_middle'); ?>
								</div>
							</div>
						</div>
							<div class="clearfix"></div>
						<?php } ?>
					<?php } ?>
				</div>

			<?php } ?>
		<?php } ?>
		<a href="<?php echo osc_search_show_all_url();?>" class="products__all">
			<span><?php _e("All offers", 'bello'); ?></span>
		</a>
	</div>
</div>
<div class="clearfix"></div>
<?php if( osc_get_preference('main-bellorevo-under', 'bello') != '') {?>
	<div class="ads">
		<div class="container">
			<div class="row">
				<?php echo osc_get_preference('main-bellorevo-under', 'bello'); ?>
			</div>
		</div>
	</div>
<?php } ?>

<!-- /container -->
<div style="clear:both"></div>
			<?php if(osc_get_preference('main-regcity', 'bello') == 'regions') {?>
			<div id="next_main_region">
	<div class="region-main">
		<div class="container_reg">
				<ul class="menu">
					<?php View::newInstance()->_exportVariableToView('list_regions', Search::newInstance()->listRegions('%%%%', '>=','region_name ASC') ) ; ?>
					<?php if(osc_count_list_regions() > 0) {?>
						<?php while(osc_has_list_regions()) { ?>
							<li><a href="<?php echo osc_list_region_url(); ?>"><i class="fa fa-map-marker-i fa-lm2"></i>&nbsp;<?php echo osc_list_region_name();?></a> </li>
						<?php } ?>

					<?php } ?>

				</ul>
						</div>
	</div>
</div>
			<?php } elseif(osc_get_preference('main-regcity', 'bello') == 'regionsitems') {?>
			<div id="next_main_region">
	<div class="region-main">
		<div class="container_reg">
				<ul class="menu">
					<?php if(osc_count_list_regions() > 0) {?>
						<?php while(osc_has_list_regions()) { ?>
							<li><a href="<?php echo osc_list_region_url(); ?>"><i class="fa fa-map-marker-i fa-lm2"></i>&nbsp;<?php echo osc_list_region_name();?></a> </li>
						<?php } ?>

					<?php } ?>

				</ul>
						</div>
	</div>
</div>
			<?php } elseif(osc_get_preference('main-regcity', 'bello') == 'cities'){?>
			<div id="next_main_region">
	<div class="region-main">
		<div class="container_reg">
				<ul class="menu">
					<?php View::newInstance()->_exportVariableToView('list_cities', Search::newInstance()->listCities('%%%%', '>=','city_name ASC') ) ; ?>
					<?php if(osc_count_list_cities() > 0) {?>
						<?php while(osc_has_list_cities()) { ?>
							<li><a href="<?php echo osc_list_city_url(); ?>"><i class="fa fa-map-marker-i fa-lm2"></i>&nbsp;<?php echo osc_list_city_name();?></a> </li>
						<?php } ?>

					<?php } ?>

				</ul>
						</div>
	</div>
</div>
			<?php } elseif(osc_get_preference('main-regcity', 'bello') == 'citiesitems'){?>
			<div id="next_main_region">
	<div class="region-main">
		<div class="container_reg">
				<ul class="menu">
					<?php if(osc_count_list_cities() > 0) {?>
						<?php while(osc_has_list_cities()) { ?>
							<li><a href="<?php echo osc_list_city_url(); ?>"><i class="fa fa-map-marker-i fa-lm2"></i>&nbsp;<?php echo osc_list_city_name();?></a> </li>
						<?php } ?>

					<?php } ?>

				</ul>
						</div>
	</div>
</div>
			<?php } elseif(osc_get_preference('main-regcity', 'bello') == 'countries'){?>
			<div id="next_main_region">
	<div class="region-main">
		<div class="container_reg">
				<ul class="menu">
					<?php if(osc_count_list_countries() > 0) {?>
						<?php while(osc_has_list_countries()) { ?>
							<li><a href="<?php echo osc_list_country_url(); ?>"><i class="fa fa-map-marker-i fa-lm2"></i>&nbsp;<?php echo osc_list_country_name();?></a> </li>
						<?php } ?>

					<?php } ?>

				</ul>
						</div>
	</div>
</div>
			<?php } ?>

<div class="clearfix"></div>
<?php osc_current_web_theme_path('footer.php'); ?>
</body>
</html>
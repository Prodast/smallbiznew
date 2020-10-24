<?php
		   /*
 * Copyright 2016 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */

osc_goto_first_category();
?>

<!-- footer -->
	<div class="footer" style="<?php if( osc_get_preference('color-footer', 'bello') != '') {?>background-color:#<?php echo osc_get_preference('color-footer', 'bello'); ?>!important;<?php } ?>">
		<div class="container">
			<div class="row">
				<div class="footer__lst footer__categories">
					<div class="footer__title">
						<p class="title__text"><?php _e('Categories', 'bello')?></p>
					</div>
					<ul class="footer_list">
						<?php $n = 1; while(osc_has_categories()){ ?>
						<li class="list__item"><a href="<?php echo osc_search_category_url(); ?>" class="item__link"><?php if(strlen(osc_category_name()) > 25){ echo mb_substr(osc_category_name(), 0, 23,'UTF-8').'...'; } else { echo osc_category_name(); } ?></a></li>
							<?php $n++; if($n == 5){?>
					</ul>
					<ul class="footer_list" style="margin-left: 15px;">
						<?php } ?>
						<?php } ?>
					</ul>
				</div>
				<?php if(osc_count_static_pages() > 0){?>
				<div class="footer__lst footer__information">
					<div class="footer__title">
						<p class="title__text"><?php _e('Information', 'bello')?></p>
					</div>
					<ul class="footer_list">
									<?php osc_reset_static_pages() ; ?>
						 <?php while( osc_has_static_pages() ) { ?>
						<li class="list__item"><a href="<?php echo osc_static_page_url()?>" class="item__link"><?php echo osc_static_page_title()?></a></li>
						<?php } ?>
					</ul>
				</div>
				<?php } ?>
				<div class="footer__lst footer__contacts">
					<div class="footer__title">
						<p class="title__text"><?php _e('Contacts', 'bello')?></p>
					</div>
					<?php if(osc_get_preference('contact-locate', 'bello') != ''){?>
					<div class="footer__contact">
						<b class="icon icon--place"></b>
						<p class="contace__text"><?php echo osc_get_preference('contact-locate', 'bello')?></p>
					</div>
					<?php } if(osc_get_preference('contact-phone', 'bello')){?>
					<div class="footer__contact">
						<b class="icon icon--tell"></b>
						<p class="contace__text"><?php echo osc_get_preference('contact-phone', 'bello')?></p>
					</div>
					<?php } if(osc_get_preference('contact-email', 'bello')){?>
					<div class="footer__contact">
						<b class="icon icon--mail"></b>
						<p class="contace__text"><?php echo osc_get_preference('contact-email', 'bello')?></p>
					</div>
					<?php } ?>
					<div class="footer__contact">
						<b class="fa fa-globe" style="float: left;width: 1px;margin-top: 3px;"></b>
						<p class="contace__text" style="margin-top: 3px;"><?php echo osc_base_url(); ?></p>
					</div>
				</div>
				<div class="footer__lst footer__share">
					<div class="footer__title">
						<p class="title__text"><?php _e('Follow us', 'bello')?></p>
					</div>
					<ul class="share__list">
						<?php if( osc_get_preference('facebook-bellorevo', 'bello') != '') {?>
						<li class="list__item"><a href="<?php echo osc_get_preference('facebook-bellorevo', 'bello'); ?>" class="item__link"><b class="icon icon--fb"></b></a></li>
						<?php } if( osc_get_preference('google-bellorevo', 'bello') != '') {?>
						<li class="list__item"><a href="<?php echo osc_get_preference('google-bellorevo', 'bello'); ?>" class="item__link"><b class="icon icon--g"></b></a></li>
						<?php } if( osc_get_preference('twitter-bellorevo', 'bello') != '') {?>
						<li class="list__item"><a href="<?php echo osc_get_preference('twitter-bellorevo', 'bello'); ?>" class="item__link"><b class="icon icon--tw"></b></a></li>
						<?php } if( osc_get_preference('in-bellorevo', 'bello') != '') {?>
						<li class="list__item"><a href="<?php echo osc_get_preference('in-bellorevo', 'bello'); ?>" class="item__link"><b class="icon icon--in"></b></a></li>
						<?php } if( osc_get_preference('pinterest-bellorevo', 'bello') != '') {?>
						<li class="list__item"><a href="<?php echo osc_get_preference('pinterest-bellorevo', 'bello'); ?>" class="item__link"><b class="icon icon--p"></b></a></li>
						<?php } if( osc_get_preference('vk-bellorevo', 'bello') != '') {?>
						<li class="list__item"><a href="<?php echo osc_get_preference('vk-bellorevo', 'bello'); ?>" class="item__link"><b class="icon icon--vk"></b></a></li>
						<?php } if( osc_get_preference('odnoklassniki-bellorevo', 'bello') != '') {?>
						<li class="list__item"><a href="<?php echo osc_get_preference('odnoklassniki-bellorevo', 'bello'); ?>" class="item__link"><b class="icon icon--od"></b></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
						<div class="container">
	<div class="col-sm-4">
	<?php osc_show_widgets('footer1') ; ?>
	</div>
	<div class="col-sm-4">
	<?php osc_show_widgets('footer2') ; ?>
	</div>
	<div class="col-sm-4">
	<?php osc_show_widgets('footer3') ; ?>
	</div>
    <?php if(osc_get_preference('footer_link', 'bello')){?>
						<div style="clear: both"></div>
						<div class="container">
				<p class="copyright"><?php echo _e('We using', 'bello')?> <a title="<?php echo _e('Osclass Premium Themes', 'bello')?>" href="https://<?php _e('osclass-pro.com', 'bello'); ?>"><?php echo _e('Osclass Theme', 'bello')?></a> Bello</p>
				<?php } ?>	
	</div></div>
	</div>
	<?php osc_run_hook('footer'); ?>
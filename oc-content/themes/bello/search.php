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
$sCategoryArray = osc_search_category_id(); 

$sCategory=false;

if($sCategoryArray){

$sCategory = $sCategoryArray['0'];

}
?>
<!DOCTYPE html>
<html lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
    <?php osc_current_web_theme_path('head.php'); ?>
    <?php if( osc_count_items() == 0 || Params::getParam('iPage') > 0 )  { ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    <?php } else { ?>
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
    <?php } ?>

</head>
<body>
<?php osc_current_web_theme_path('header.php'); ?>
<div class="container content">

    <div class="forcemessages-inline">
        <?php osc_show_flash_message(); ?>
    </div>

    <!-- content -->
    <div class="search__products">
        <div class="container">
            <div class="row m30">
                <div class="col-lg-9 col-md-9">
                    <div class="page__title text-center">
                        <h2><?php echo search_title(); ?></h2>
                    </div>

                    <div class="search__filter" >
                        <div class="search__mobile">

                            <div class="search__block search__block--dropdown" >
                                <a type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    <?php $orders = osc_list_orders();
                                    foreach($orders as $label => $params) {
                                        $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
                                        <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
                                            <?php echo $label; ?>
                                        <?php } ?>
                                    <?php } ?>
                                    <span class="caret">
								    	<i class=""></i>
								    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php foreach($orders as $label => $params) {?>
                                        <li><a href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
                                    <?php  } ?>
                                </ul>
                            </div>
                            <div class="search__block ">
                                <a type="button" class="btn btn-filter">
                                    <?php _e('Filter', 'bello'); ?>
                                </a>
                            </div>
                        </div>

                        <div class="search__price">
						
                            <div class="search__block search__block--dropdown" >
                                <a type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    <?php $orders = osc_list_orders();
                                    foreach($orders as $label => $params) {
                                        $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
                                        <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
                                            <?php echo $label; ?>
                                        <?php } ?>
                                    <?php } ?>
                                    <span class="caret">
								    	<i class=""></i>
								    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php foreach($orders as $label => $params) {?>
                                        <li><a href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
                                    <?php  } ?>
                                </ul>
                            </div>
                        </div>
					
                        <div class="search__view">
																	<div class="user-company-change">
						<div class="all <?php if(Params::getParam('sCompany') == '' or Params::getParam('sCompany') == null) { ?>active<?php } ?>"><span><?php _e('All', 'bello'); ?></span></div>
						<div class="individual <?php if(Params::getParam('sCompany') == '0') { ?>active<?php } ?>"><span><?php _e('Users', 'bello'); ?></span></div>
						<div class="company <?php if(Params::getParam('sCompany') == '1') { ?>active<?php } ?>"><span><?php _e('Company', 'bello'); ?></span></div>
					</div>
                            <?php $params1['sShowAs'] = 'gallery'; ?><a href="<?php echo osc_update_search_url($params1) ; ?>" class="change__button change__button--blocks <?php if(Params::getParam('sShowAs') == null || Params::getParam('sShowAs') == 'gallery'){ echo 'change__button--active';} ?>"><b class="fa fa-th" aria-hidden="true"></b></a>
                            <?php $params1['sShowAs'] = 'list'; ?><a href="<?php echo osc_update_search_url($params1) ; ?>" class="change__button change__button--list <?php if(Params::getParam('sShowAs') == 'list'){ echo 'change__button--active';} ?>"><b class="fa fa-list" aria-hidden="true"></b></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m30">


                <div class="col-md-3 item_col_md col_search_top"  style="float: right;">

                    <div class="sidebar sidebar--border" id="search_module">
                        <!-- Module Search -->
						                    <?php if( osc_get_preference('ssidebar', 'bello') == 'select') {
osc_current_web_theme_path('search_module2.php') ; 
 } else{
osc_current_web_theme_path('search_module.php') ; 	 
 }?>
                        <?php if( osc_get_preference('gocategory', 'bello') == 'enable') { ?>
                        <div class="sidebar__categories">
                            <p class="group__title"><?php echo __('Categories', 'bello')?></p>
                            <ul class="categories__list">
                                <?php osc_goto_first_category(); while(osc_has_categories()) { ?>
                                    <li class="categories__item">
                                        <a href="projects" class="categoreis__link" >
                                            <b class="icon icon-1">
                                                <?php if( osc_get_preference('item-icon', 'bello') == 'enable') {?>
                                                    <img src="<?php echo osc_current_web_theme_url('img/'.osc_category_id(osc_locale_code()).'.png')?>" alt="">
                                                <?php } ?>
                                            </b>
									<span>
									<?php echo osc_category_name(osc_locale_code()); ?>
                                        <span class="count">(<?php echo osc_category_total_items()?>)</span>
									</span>
                                        </a>
                                        <?php if(osc_count_subcategories() > 0) { ?>
                                            <ul class="search_submenu">
                                                <?php while(osc_has_subcategories()) { ?>
                                                    <li>
                                                        <a href="<?php echo osc_search_category_url(); ?>"><?php echo osc_category_name(); ?></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
						<?php } ?>
                    </div>

                </div>
                <div class="col-lg-9 col-md-9">
                    <div id="mobile__categories"></div>
                    <?php if( osc_get_preference('search-bellorevo-top', 'bello') != '') {?>
                    <div class="ads">
                        <?php echo osc_get_preference('search-bellorevo-top', 'bello'); ?>
                    </div>
                    <?php } ?>
					<?php if(osc_count_items() == 0) { ?>
					<div class="row">
                        <p class="empty"><?php echo __('There are no results matching', 'bello'); ?>:<?php echo osc_search_pattern(); ?></p>
					</div>
                    <?php } else { ?>
                    <div class="row">
                        <?php require(bello_show_as() == 'list' ? 'search_list.php' : 'search_gallery.php'); ?>
                    </div>
                    <!--  -->
                    <?php if(osc_search_total_pages() > 1){?>
                        <div style="clear: both"></div>
                    <div class="pagination">
                        <?php echo osc_search_pagination(); ?>
                    </div>
                        <div style="clear: both"></div>
                    <?php } ?>
                    <?php if( osc_get_preference('search-bellorevo_under', 'bello') != '') {?>
                        <div class="ads">
                            <?php echo osc_get_preference('search-bellorevo_under', 'bello'); ?>
                        </div>
                    <?php } ?>
					<?php } ?>
                </div>
                <!--  -->

                <!--  -->
            </div>
        </div>
    </div>
     <?php osc_alert_form(); ?>

    <!-- content -->

</div>
<div style="clear:both"></div>
<?php osc_current_web_theme_path('footer.php'); ?>
							<script>
        $(document).ready(function() {
			$('.user-company-change .all').click(function() {		
				$('[name=sCompany]').val('');
				document.getElementById('searchformblock').submit();

			});
			$('.user-company-change .individual').click(function() {
				$('[name=sCompany]').val('0');
				document.getElementById('searchformblock').submit();
			});
			$('.user-company-change .company').click(function() {
				$('[name=sCompany]').val('1');
				document.getElementById('searchformblock').submit();
			});
        });
        </script>	
</body>
</html>

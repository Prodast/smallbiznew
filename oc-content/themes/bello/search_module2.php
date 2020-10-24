<?php
/*
* Copyright 2016 osclass-pro.com and osclass-pro.ru
*
* You shall not distribute this theme and any its files (except third-party libraries) to third parties.
* Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
*/
$sCategoryArray = osc_search_category_id(); 

$sCategory=false;

if($sCategoryArray){

$sCategory = $sCategoryArray['0'];

}
?>
<div class="sidebar__form">
    <form action="<?php echo osc_base_url(true); ?>" method="get" onsubmit="return doSearch()" class="form-horizontal search-page-form nocsrf" id="searchformblock" role="form" >
        <input type="hidden" name="page" value="search" />
		<?php if( osc_is_search_page() ) { ?>
        <input type="hidden" name="sOrder" value="<?php echo osc_esc_html(osc_search_order()); ?>" />
        <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting(); echo osc_esc_html($allowedTypesForSorting[osc_search_order_type()]); ?>" />

        <?php foreach(osc_search_user() as $userId) { ?>
            <input type="hidden" name="sUser[]" value="<?php echo osc_esc_html($userId); ?>" />
        <?php } ?>
		<input type="hidden" name="sCompany" value="<?php echo Params::getParam('sCompany'); ?>">
		<?php } ?>
		<input type="hidden" id="sRegion" name="sRegion" value="" />
        <div class="form-group">
            <div class="center">
                <p class="group__title"><?php _e('search', 'bello'); ?></p>
            </div>
            <div class="row center">
                <input type="text" class="form-control" name="sPattern" id="query" placeholder="<?php echo osc_esc_html(__('Your search', 'bello')); ?>" value="<?php echo osc_esc_html( osc_search_pattern() ); ?>">
                <input type="text" class="form-control flt" id="sCity" name="sCity" placeholder="<?php echo osc_esc_html(__('city', 'bello')); ?>" value="<?php echo osc_esc_html( osc_search_city() ); ?>">
            </div>
        
            <div class="row center">
							<?php 
							if(isset($sCategory)) {

    $category = array("pk_i_id" => $sCategory);

	} else {

		if(osc_is_search_page()){

	$category = 'null';

		} else {$category = array("pk_i_id" => '0');}

	}
							bello_categories_select('sCategory', $category , __('Categories', 'bello')) ; ?>
            </div>
			</div>
        <div class="mob-2">
            <?php if( osc_price_enabled_at_items() ) { ?>
                <div class="form-group">
                    <div class="center">
                        <p class="group__title"><?php _e('Price', 'bello'); ?></p>
                        <div class="input__double">
                            <input type="text" class="form-control form-control-left js-input" id="priceMin" name="sPriceMin" placeholder="<?php echo osc_esc_html(__('Min', 'bello') ); ?>" value="">
                            <b class="line"></b>
                            <input type="text" class="form-control form-control-right js-input-to" id="priceMax" name="sPriceMax" placeholder="<?php echo osc_esc_html(__('Max', 'bello') ) ; ?>" value="">
                        </div>
                        <div class="range">
                    <input type="range" class="js-range-slider" data-prefix="" data-from='<?php echo osc_esc_html(osc_search_price_min()); ?>' data-to="<?php echo osc_esc_html(osc_search_price_max()); ?>">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
		<div class="form-group">
		<div class="row center">
		<?php if(osc_search_category_id()) {
                                osc_run_hook('search_form', osc_search_category_id());
                            } else {
                                osc_run_hook('search_form');
                            }?>
							</div>
							</div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><?php _e('SEARCH', 'bello'); ?></button>
        </div>
    </form>
		<script type="text/javascript">
                $(function() {
                    function log( message ) {
                        $( "<div/>" ).text( message ).prependTo( "#log" );
                        $( "#log" ).attr( "scrollTop", 0 );
                    }

                    $( "#sCity" ).autocomplete({
                        source: "<?php echo osc_base_url(true); ?>?page=ajax&action=location",
                        minLength: 2,
                        select: function( event, ui ) {
                            $("#sRegion").attr("value", ui.item.region);
                            log( ui.item ?
                                "<?php _e('Selected', 'bello'); ?>: " + ui.item.value + " aka " + ui.item.id :
                                "<?php _e('Nothing selected, input was', 'bello'); ?> " + this.value );
                        }
                    });
                });

                function checkEmptyCategories() {
                    var n = $("input[id*=cat]:checked").length;
                    if(n>0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>
					
</div>

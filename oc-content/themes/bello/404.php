<?php
		   /*
 * Copyright 2016 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
osc_enqueue_script('jquery');
osc_enqueue_script('global');
osc_enqueue_script('main');
osc_enqueue_script('plugins');
osc_enqueue_script('select2');

?>
<!DOCTYPE html>
<html lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <div class="container content">
		<div class="col-md-6 col-md-offset-3">
            <h1 class="block-title publish account" style="text-align:center;font-size: 28px;padding-top:40px;"><?php _e('Page not found', 'bello'); ?></h1>
        </div>
		<div class="col-md-6 col-md-offset-3 page-404" style="padding-top:40px;padding-bottom:40px;">
    <p><?php _e("Let us help you, we have got a few tips for you to find it.", 'bello') ; ?></p>
 </br>
            <?php _e("<strong>Search</strong> for it:", 'bello') ; ?>
			 </br>
            <form action="<?php echo osc_base_url(true) ; ?>" method="get" class="search">
                <input type="hidden" name="page" value="search" />
                <fieldset class="main">
                    <input type="text" name="sPattern"  id="query" value="" />
                    <button type="submit" class="ui-button ui-button-middle"><?php _e('Search', 'bello') ; ?></button>
                </fieldset>
            </form>
 </br>
       <?php _e("<strong>Look</strong> for it in the most popular categories.", 'bello') ; ?>
 </br>
                <?php osc_goto_first_category() ; ?>
                <?php while ( osc_has_categories() ) { ?>
				<ul class="categoryside">
                        <li class="subcatside"><a class="<?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?> <span class="views">(<?php echo osc_category_total_items() ; ?>)</span></a></li>
                        <?php if ( osc_count_subcategories() > 0 ) { ?>
                            <?php while ( osc_has_subcategories() ) { ?>
                                <?php if( osc_category_total_items() > 0 ) { ?>
                                    <li class="subcatside"><a class="<?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?> <span class="views">(<?php echo osc_category_total_items() ; ?>)</span></a></li>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
						</ul>
                <?php } ?>
           
           <div class="clear"></div>
  
</div>
		</div><div style="clear:both"></div>	
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
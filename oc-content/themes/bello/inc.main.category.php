<?php
		   /*
 * Copyright 2017 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
?>

<div class="categories">
    <div class="container">
        <div class="row">
            <ul class="categories__list">
                <?php $i = 1; while(osc_has_categories()){?>
                <li class="categories__item menu_list categories__item-<?php echo $i?>">
                    <a href="#dropdownMenu<?php echo $i; ?>" class="categoreis__link categoreis__link_menu">
                        <b class="icon icon-1"><img src="<?php echo osc_current_web_theme_url('img/').osc_category_id().'.png'; ?>" alt=""></b>
                        <span><?php if(strlen(osc_category_name()) > 25){ echo mb_substr(osc_category_name(), 0, 23,'UTF-8').'...'; } else { echo osc_category_name(); } ?></span>
                    </a>
                    <?php if(osc_count_subcategories()){?>
                    <ul class="dropdown-menu dropdown__list" style="z-index: 100">
                        <?php while(osc_has_subcategories()){?>
                            <li class="dropdown__item">
                                <a href="<?php echo osc_search_category_url()?>"><?php if(strlen(osc_category_name()) > 31){ echo mb_substr(osc_category_name(), 0, 30,'UTF-8').'...'; } else { echo osc_category_name(); } ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </li>
                <?php $i++; } ?>
            </ul>
        </div>
    </div>
</div>



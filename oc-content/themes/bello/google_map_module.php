<?php
/*
 * Copyright 2016 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
?>
<?php if(osc_item_city() ==''){?>
<div class="location__map" style="border: solid 1px #D8D8D8" id="map">
    <p style="text-align: center;margin-top: 110px"><?php _e('City not specified', 'bello'); ?></p></div>

<?php }else{ ?>
<script src="https://maps.google.com/maps/api/js?sensor=false&amp;key=<?php if( osc_get_preference('map-key', 'bello') != '') { echo osc_get_preference('map-key', 'bello'); } ?>" type="text/javascript"></script>
<div class="location__map" style="border: solid 1px #D8D8D8" id="map"></div>

   <script type="text/javascript">
	<?php { 
	if(osc_item_latitude() != 0){
	$lat = osc_item_latitude();
    $long = osc_item_longitude();	
	}else{
	$coord = bello_search_location(osc_item_country(), osc_item_region(), osc_item_city(), osc_item_address());
	$lat = $coord['lat'];
    $long = $coord['lng'];	
	}?>	
	<?php } ?>
	<?php if($lat != ''){?>
        var latlng = new google.maps.LatLng(<?php echo $lat; ?>,  <?php echo $long; ?>);
        var myOptions = {
            zoom: 6,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        map = new google.maps.Map(document.getElementById("map"), myOptions);
        var marker = new google.maps.Marker({
            map: map,
            position: latlng
        });
		<?php } ?>
    </script>
<?php } ?>
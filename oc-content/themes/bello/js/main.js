$(document).ready(function() {
	 	function dropdownUpdate (	) {
	 		 var row = $('.categories').find('.row').innerWidth();
			  	$('.categories').find('.dropdown-menu ').css({
			  			width:  row + 'px'
			  	});
	 	}
	  dropdownUpdate();
	  $(window).resize(dropdownUpdate);
	  function moveSidebar () {
	  		//if ($(window).width() >= 981) {
	  		//	  	$('.sidebar_move').removeAttr('style');
	  		//	  	$('.sidebar_move').appendTo('#sidebar');
  			 // }	  else {
	  		//	  	$('.sidebar_move').removeAttr('style');
	  		//	  	$('.sidebar_move').prependTo('#mobile__categories');
  			//  }
		  if ($(window).width() >= 1000) {
			  $('#search_module').show();
		  }
	  }

	  moveSidebar();
	  $(window).resize(moveSidebar);
	  function moveSidebar2 () {
	  		if ($(window).width() >= 981) {
	  			  	$('.sidebar_move-2').appendTo('#sidebar');
  			  }	  else {
	  			  	$('.sidebar_move-2').prependTo('#sidebar_move-2');
  			  }
	  }
	  moveSidebar2();
	  $('.ad__header').on('click', '.sml__item', function(event) {
	  	event.preventDefault();
	  	var link = $(this).attr('href');
	  	$('#bigImg').attr('src', link);
	  });
	  $(window).resize(moveSidebar2);
	  //$('.btn-filter').click(function(event) {
	  //	event.preventDefault();
	  //	$('#mobile__categories').find('.sidebar').stop().slideToggle();
	  //	$(this).toggleClass('open');
	 // });

	$('.btn-filter').click(function() {
		$('#search_module').toggle();
	});



	  $('.slider__fad').owlCarousel({
		  	items: 5,
		  	autoplay: true,
		  	autoplayTimeout: 3000,
		  	autoplayHoverPause: true,
		  	loop:true,
				margin:30,
				responsive:{
		        0:{
		            items:1
		        },
		        540:{
		            items:2
		        },
		        768:{
		            items:3
		        },
		        991:{
		            items:4
		        },
		        1200:{
		        	items: 5
		        }
		    }
	  });
	  $('.slider__related').owlCarousel({
		  	autoplay: true,
		  	autoplayTimeout: 3000,
		  	autoplayHoverPause: true,
		  	loop:true,
				margin:30,
				responsive:{
		        0:{
		            items:1
		        },
		        540:{
		            items:2
		        },
		        768:{
		            items:2
		        },
		        991:{
		            items:3
		        },
		        1200:{
		        	items: 4
		        }
		    }
	  });

	  $('.images__sml').owlCarousel({
		  	autoplay: true,
		  	autoplayTimeout: 3000,
		  	autoplayHoverPause: true,
		  	loop:true,
			margin:7,
				responsive:{
		        0:{
		            items:2
		        },
		        450: {
		        	items: 3
		        },
		        /*640:{
		            items:3
		        },*/
		        640:{
		            items:4
		        }
		    }
	  });
	  $('.nav__button--left').click(function(event) {
	  	event.preventDefault();
	  	var owl = $(this).parents('.fad').find('.owl-carousel');
	  	owl.trigger('prev.owl.carousel');
	  });
	  $('.nav__button--right').click(function(event) {
	  	event.preventDefault();
	  	var owl = $(this).parents('.fad').find('.owl-carousel');
	  	owl.trigger('next.owl.carousel');
	  });
	  $('.nav__button--left').click(function(event) {
	  	event.preventDefault();
	  	var owl = $(this).parents('.related').find('.owl-carousel');
	  	owl.trigger('prev.owl.carousel');
	  });
	  $('.nav__button--right').click(function(event) {
	  	event.preventDefault();
	  	var owl = $(this).parents('.related').find('.owl-carousel');
	  	owl.trigger('next.owl.carousel');
	  });
	$('.form-select-1').select2({
	  	 placeholder: "Country",
	  	 minimumResultsForSearch: Infinity,
	  	 dropdownParent: $('#countryChoose')
	  });
	  $('.form-select-2').select2({
	  	 //placeholder: "Region",
	  	 minimumResultsForSearch: Infinity,
	  	 dropdownParent: $('#regionChoose')
	  });
	  $('#select-country').select2({
	  	 minimumResultsForSearch: 7,
	  	 dropdownParent: $('#select-country__wrap')
	  });
	   // range
 var $range = $(".js-range-slider"),
	    $input = $(".js-input"),
	    $inputTo = $(".js-input-to"),
	    instance,
	    min = 0,
	    max = 1000000;
		vl = '';

$range.ionRangeSlider({
    type: "double",
    min: min,
    max: max,
	from: 0,
    step: 10000,
    hide_min_max: true,
    hide_from_to: true,
    onStart: function (data) {
        $input.prop("value", data.from + vl);
        $inputTo.prop("value", data.to + vl);
    },
    onChange: function (data) {
        $input.prop("value", data.from + vl);
        $inputTo.prop("value", data.to + vl);
    }
});

instance = $range.data("ionRangeSlider");
$input.on("change keyup", function () {
    var value = $(this).prop("value"),
    		val = parseInt(value);
    if (val < min) {
        val = min;
    } else if (val > max) {
        val = max;
    }
    instance.update({
        from: val
    });
});
$inputTo.on("change keyup", function () {
    var value = $(this).prop("value"),
    		val = parseInt(value);
    if (val < min) {
        val = min;
    } else if (val > max) {
        val = max;
    }
    instance.update({
        to: val
    });
});

	$(document).on('change', '[name="select_language"]', function(e){
		$('[name="select_language"]').submit();
	});

	$('.categories__item').click(function(){
		if($(this).children('ul.search_submenu').css('display') == 'none') {
			$('.categories__item').children('ul.search_submenu').animate({height: "hide"}, 500);
			$(this).children('ul.search_submenu').animate({height: "show"}, 500);
		}else{
			$(this).children('ul.search_submenu').animate({height: "hide"}, 500);
		}

	});


	$('.categories__item .categoreis__link_menu').click(function(){
		$('ul.dropdown-menu').not($(this).next('ul')).hide();
		$(this).next('ul').toggle();

	});


	$('div.form-group div.row div.checkbox span.plus').click(function(){
		$(this).parent().next('div.search_subcategory').animate({height: "toggle"}, 500);
	});

	//$('div.row').on('click', 'div.search_subcategory', function(){
	//	$(this).prev().children('input').prop("checked", true);
	//});

	//$('div.radio').on("click", 'label', function(){
	//	$('.radio label').css({'background-image':'url(oc-content/themes/bello/img/radio.png)'});
	//	if($(this).children('input').prop("checked")) {
	//		$(this).css({'background-image':'url(oc-content/themes/bello/img/radio_ch.png)'});
	//	}
	//});


});

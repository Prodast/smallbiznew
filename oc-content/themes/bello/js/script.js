$(document).ready(function(){

//scroll
	$(window).scroll(function () {
		if ( $(this).scrollTop() > $(this).height()){
			$('#vverh').css({'display':'block'});
		} else if($(this).scrollTop() <= $(this).height()) {
        $('#vverh').css({'display':'none'});
      }
	});
	$( '#vverh' ).click(function(){
		$('html, body').animate({scrollTop: 0}, 1000);
		return false;
	})


	$('.captch input').css({
		'width':$('.captch').width() - $('.captch-task').width() -5
	});

//some
	$(window).resize(function(){
		if($(window).width()<=430){
			$('.search-result').removeClass('col-xs-6')
		}else if($(window).width()>430){
			$('.search-result').addClass('col-xs-6')
		}
		if($(window).width()<=430){
			$('.contact-fld').find('.wrap-item-block').addClass('col-sm-3')
		}else if($(window).width()>430){
			$('.contact-fld').find('.wrap-item-block').removeClass('col-sm-3')
		}
	});
	$('.flashmessage .ico-close').click(function(){
        $(this).parents('.flashmessage').remove();
    });
    $('#mask_as_form select').on('change',function(){
        $('#mask_as_form').submit();
        $('#mask_as_form').submit();
    });

});
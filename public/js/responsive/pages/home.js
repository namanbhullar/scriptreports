(function($){
	$(document).ready(function(e) {
		
		$("#rt-offcanvas").click(function(){
				var hegight	=	$(window).outerHeight(),
					width  = $(window).outerWidth();
			$("body").css({'position':'fixed','height':hegight,'width':width }).animate({
					'margin-left':270
					});
					
			$(".uk-offcanvas-bar.uk-offcanvas-bar-show").css('left',-270);
			$("#offcanvas").show();
			$(".uk-offcanvas-bar.uk-offcanvas-bar-show").animate({'left':0});
			
			$("#offcanvas").click(function(event){
				if(event.pageX <= 270) return;
				$("body").animate({
					'margin-left':0
					}).removeClass('uk-offcanvas-page').attr('style','');
				$("#offcanvas").hide();
			});
			
		});
		
        if($(window).outerWidth() < 680) $(".bg-light-gray").find(".container").attr('class','container-fluid');
				
		$(window).resize(function(e) {
			if($(window).outerWidth() < 680) $(".bg-light-gray").find(".container").attr('class','container-fluid');
			else $(".bg-light-gray").find(".container-fluid").attr('class','container');
			
			
        });
    });
})(jQuery)
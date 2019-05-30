// JavaScript Document
(function($){
	$(document).ready(function(e) {
        $("ul.profile-menu li.parent i").click(function(){
			$(this).parent().find("ul").slideToggle();
			if($(this).hasClass('fa-plus')){
				$(this).removeClass('fa-plus');
				$(this).addClass('fa-minus');
			}else{
				$(this).addClass('fa-plus');
				$(this).removeClass('fa-minus');
			}
		});
		
		$("#mobile-menu").click(function(){
			if($("#mobile-menu").data('running') == 'yes') return;
			var hegight	=	$(window).outerHeight(),
					width  = $(window).outerWidth();
			$("body").css({'position':'fixed','height':hegight,'width':width }).animate({
					'margin-left':270
					});
			$(this).data('running','yes');
					
			$("#menu-container").css({'left':-270,'width':'100%'});
			$("#menu-container").show();
			$("#menu-container").animate({'left':0});
			
			var BodyClose = function(event){
				if(event.pageX <= 270) return;
				$("body").animate({
					'margin-left':0
					}).attr('style','');
				$("#menu-container").animate({'left':-270,'width':'270px'});
				$("#mobile-menu").data('running','no');
				$("body").unbind('click',BodyClose);
			}
			
			$("body").bind('click',BodyClose);
		});
    });
})(jQuery);
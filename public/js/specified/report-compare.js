// JavaScript Document
(function($){
	$(document).ready(function(e) {
       $(".right_side_menu ul li a").click(function() {
		  var target = $(this).attr('href'),
		  	  divOffset = $(target).offset().top,
			  newoffset = (divOffset - 190);
			 
		$(".right_side_menu ul li").removeClass('active');
		  $(this).parent().addClass('active');
		  $("html, body").delay(100).animate({
			scrollTop: newoffset
		  }, 1000);
		  
		  return false;
		});
		
		$(".sdocs_folder > li > a").click(function(){
			var $this	=	$(this);
			
			var $subFiles	=	$this.parent().find("ul.docs_menu");
			
			if($subFiles.css('display') == 'block')
			{
				$subFiles.slideToggle();
			}
			else
			{
				$("ul.docs_menu").delay().slideUp();
				$subFiles.slideToggle();
			}
			
			return false;
		});
		
		$("#saveReport").click(function(){
			$.fancybox.open({'type':'inline',href:'#create-report',padding:0})
		})
    });
})(jQuery)

(function($){
	var 	selectedDocs	=	[];
	$(document).ready(function(){
		$(".ul-checkbox").click(function(){
			var $this	=	$(this);
			var id	=	$this.data('id');
			
			if(selectedDocs.length == 0)
			{
				$("#select-doc").fadeIn( 300 );
			}
			
			if($this.hasClass('fa-check-square-o'))
			{
				
										
				$index	=	selectedDocs.indexOf(id);
				selectedDocs.splice($index,1);
				$this.removeClass('fa-check-square-o');
				$this.addClass('fa-square-o').css("color","#dfdfdf");
			}
			else
			{
				selectedDocs.push(id);
				$this.addClass('fa-check-square-o');
				$this.removeClass('fa-square-o').css("color","#000");
			}
			
			$("#select-doc span").html("&nbsp;(" + selectedDocs.length + ")");
			
			if(selectedDocs.length == 0)
			{
				$("#select-doc").fadeOut( 300 );
			}
			
			
		});
		
		
		
		$("#select-doc").click(function(){	
		var searche	=	location.search,
		id	=	searche.substr(searche.indexOf('&') + 1),
		script_id	=	id.substr(id.indexOf('=')+1);	
			if(selectedDocs.length != 0)
			{
				$.ajax({
					url:BASEURL + '/myaccount/script-manager/scripts/addDocument',
					data:'script_id='+ script_id + "&document="+  selectedDocs.join(','),
					method:'post',
					headers:{'X-CSRF-TOKEN':TOKEN},
					error:function(){parent.FlashMessage('Error In requesst.',false)},
					beforeSend:function(){ $('body').addClass("loadinganimation").addClass("animating"); },
					complete:function(){ parent.location.reload()},
					success:function(){ parent.window.reload },
				});
				
			}
			
			
		});
	});
})(jQuery);
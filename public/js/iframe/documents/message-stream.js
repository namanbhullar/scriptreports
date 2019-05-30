(function($){
	var selectedDocs	=	[];
	var fullValue = parent.$("#document_idReply").val();
	if(fullValue != 'undefined' && fullValue != "" && fullValue != '0')
	{
		var oldDocs	=	fullValue.split(',');
		oldDocs	= oldDocs.map(function (a){ return parseInt(a)});
	}
	else
	{
		var oldDocs	=	[];
	}
	
	
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
					
			if(selectedDocs.length != 0)
			{
				
				selectedDocs	=	selectedDocs.concat(oldDocs);
				selectedDocs.concat(oldDocs);
				selectedDocs	=	selectedDocs.reduce(function(p, c) {
        								if (p.indexOf(c) < 0) p.push(c);
        								return p;
    									}, []);
				var $input	=	parent.$("#document_idReply");
				$input.val(selectedDocs.join(','));
				
				
				
				parent.$("#slected-docs").html("");			
				
				selectedDocs.forEach(function(val){
					
					var $target		=	parent.$("#slected-docs"),
					$SeleWr		=	$("<div></div>").addClass("msg_btm btm_50 pull-right mrgbt5 bck_grey"),
					$cancelBtn1	=	$("<div></div>").addClass("pull-right").append('<img src="' + BASEURL + '/public/images/icons/cross.png" alt="Cancel" />').attr('data-id',val),
					$iconWr		=	$("<div></div>").addClass("pull-left"),
					$title		=	$("<h3></h3>"),
					$icon		=	$("<img />").attr("src",BASEURL + "/public/images/icons/folder-b.png");
			
			
					$title.html(DcoTitle[val])
					$iconWr.append($icon).append($title).appendTo($SeleWr);
					
						
					$cancelBtn1.click(function(){
						
							$SeleWr.remove();
							var Value = $input.val().split(',');
							Value 	= Value.map(function (a){ return parseInt(a)});
							
							Value.splice(Value.indexOf(val),1);
							
							$input.val(Value.join(','));
					}).appendTo($SeleWr);
					
					 $target.append($SeleWr)
				});
				
				
				parent.$(".fancybox-close").trigger('click');
			}
			else
			{
				parent.$("#document_idReply").val("");
			}
			
			
		});
	});
})(jQuery);
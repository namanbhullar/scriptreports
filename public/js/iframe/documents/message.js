(function($){
	var selectedDocs	=	[];
	var fullValue = parent.$("input[name='document_id']").val();
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
				parent.$("input[name='document_id']").val(selectedDocs.join(','));
				
					parent.$("#add-my-docs ul").html("");			
				selectedDocs.forEach(function(val){
					$li	=	$("<li></li>").html(DcoTitle[val]).attr('data-id',val);
					parent.$("#add-my-docs ul").append($li)
				});
				
				parent.$(".fancybox-close").trigger('click');
			}
			else
			{
				parent.$("input[name='document_id']").val("");
			}
			
			parent.$("#add-my-docs").trigger('cselect');
		});
	});
})(jQuery);
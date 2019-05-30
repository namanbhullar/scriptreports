// JavaScript Document
(function(){
	var dfor	=	location.hash,
	searche	=	location.search,
	Varname	=	searche.substr(searche.indexOf('&') + 1),
	name	=	Varname.substr(Varname.indexOf('=')+1),
	$input	=	parent.$(location.hash),
	$inputName	=	parent.$("#"+name);
	
	
	//var fullValue = $input.val();
//	
//	if(fullValue != 'undefined' && fullValue != "" && fullValue != '0')
//	{
//		var oldDocs	=	fullValue.split(',');
//		oldDocs	= oldDocs.map(function (a){ return parseInt(a)});
//	}
//	else
//	{
//		var oldDocs	=	[];
//	}
//	
	
	$(document).ready(function(e) {
		$(".ul-checkbox").click(function(){
			var $this	=	$(this),
			   id	=	$this.data('id');
			$input.val(id);
			$inputName.val(DcoTitle[id]);
			
			parent.$(".fancybox-close").trigger('click');
		});
        
    });
})(jQuery)
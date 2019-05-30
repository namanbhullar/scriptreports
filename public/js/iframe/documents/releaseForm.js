// JavaScript Document
(function(){
	$(document).ready(function(e) {
		$(".ul-checkbox").click(function(){
			var $this	=	$(this),
			   id	=	$this.data('id');
			
			
			console.log(DcoTitle[id]);
			parent.jQuery("#release_form_status").val("document");
			parent.jQuery("#deleteReleaseForm").show();
			parent.jQuery("#release_form_value").val(id);
			parent.jQuery("#release-url").html('('+DcoTitle[id]+')').attr('href',DocLink[id]);				
			
			parent.jQuery(".fancybox-close").trigger('click');
		});
        
    });
})(jQuery)
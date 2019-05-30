(function($){
	$(document).ready(function(){
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
		
		
		
		$("#pvt-not-save-btn").click(function(){
			var notes	=	$("#pvt-not-text").val();
			$.ajax({
				 url:BASEURL + "/myaccount/script-manager/scripts/save-pvt-notes",
				 data:"script_id=" + script_id + "&notes=" + notes + "&track_id=" + track_id,
				 headers:{"X-CSRF-TOKEN":TOKEN},
				 method:'post',
				 beforeSend:function(){
					$("#private-notes .private-notes").addClass("loadinganimation").addClass("animating"); 
				 },
				 complete:function(){
					 $("#private-notes .private-notes").removeClass('loadinganimation').removeClass('animating');
				 },
				 success:function(data){
					 if(data.status == 'ok')
					 {
						 FlashMessage(data.msg,true);
					 }
					 else
					 {
						 FlashMessage(data.msg,false);
					 }
				 }
			});
		});
		
		$("#sfeedbackIcon li a").click(function(){
			var $a,$this,	feedback, id, token;
			$this	=	$(this);
			feedback	=	$this.data('feedback');
			
			if(!$this.hasClass('active')){
				$("#sfeedbackIcon a").removeClass('active');
				$this.addClass('active');
				$.ajax({
					url:BASEURL + '/myaccount/script-manager/scripts/feedback-icon',
					data:'script_id=' + script_id + '&track_id='+ track_id + '&feedback=' + feedback,
					method:'post',
					headers:{'X-CSRF-TOKEN':TOKEN},
					beforeSend:function(){
						$("#sfeedbackIcon").addClass("loadinganimation").addClass("animating"); 
					},
					complete:function(){
						$("#sfeedbackIcon").removeClass('loadinganimation').removeClass('animating');
					},
					success:function(data){
						 if(data.status == 'ok')
						 {
							 FlashMessage(data.msg,true);
						 }
						 else
						 {
							 FlashMessage(data.msg,false);
						 }
					 }
				});
			}
			
		});
		
		$("#send-feedbak-btn").click(function(){
			var feedback	=	$("#send-feedbak").val();
			var token	=	$('input[name="_token"]').val();
			var id	=	$("#script_id").val();
			$.ajax({
				 url:BASEURL + "/myaccount/script-manager/scripts/send-feedback",
				 data:"id=" + id + "&feedback=" + feedback,
				 headers:{"X-CSRF-TOKEN":token},
				 method:'post',
				 beforeSend:function(){
					$("#feedback-section .private-notes").addClass("loadinganimation").addClass("animating"); 
				 },
				 complete:function(){
					 $("#feedback-section .private-notes").removeClass('loadinganimation').removeClass('animating');
				 },
				 success:function(data){
					 if(data.status == 'ok')
					 {
						 FlashMessage(data.msg,true);
						 $("#send-feedbak").val("");
					 }
					 else
					 {
						 FlashMessage(data.msg,false);
					 }
				 }
			});		
		});
		
		$("#showInfo").AnimateSlideUp({div:"#writerInfo" + script_id}); 
		
		$("#addFile").click(function(){ 
			$.fancybox.open({
				'type':'iframe',
				'href':BASEURL + '/myaccount/script-manager/my-documents/iframe?script=ScriptUpload.js&id=' + script_id,
				'padding':0,
				minHeight:500
			});
		})
			
		$("#sendMessageToOwner").click(function(){
			var form	=	document.getElementById('mesaagetoownerform');
			form.reset();
			$.fancybox.open({
				'type':'inline',
				'href':'#sendMessageToScriptOwner',
				padding:0
			});
		});
			
	})
})(jQuery);
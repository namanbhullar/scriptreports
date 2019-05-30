(function($){
	$(document).ready(function(e) {	
	tinymce.init({
			selector: 'textarea#guideline_desc', 
			width: parseInt($("textarea").parent().width()),
			height: 200,
			toolbar: 'bold italic | fontsizeselect | spellchecker ',
			plugins: 'spellchecker,placeholder',
			menubar:false,
			statusbar:true,
			browser_spellcheck: true,
			spellchecker_rpc_url:'spellchecker.php',
			resize:true,
			setup: function(ed) {
				$('input[type="reset"]').click(function(){
					$("#add_docs  span.delete_btn").trigger('click');
					$("span.checkbox.fa-check-square-o").trigger('click');
					$("input[type='checkbox']").attr("checked",false);
					$("input[type='radio']").attr("checked",false);
					$("#deleteReleaseForm").trigger('click');
					tinymce.get('guideline_desc').setContent('',{format:'row'});
					return false;
				})
			}
		});	
		
		$("#deleteReleaseForm").click(function(){
				$("#release_form_value").val("");
			  $("#release-url").html("( No File Selected. )");
			  $("#release_form_status").val("no_select");
			  $("#release-url").attr("href", "javascript:void(0)");
			  $(this).hide();
		});
		
		$("#addReleaseForm").click(function(){
			$.fancybox.open({
				'type':'iframe',
				'href':BASEURL + '/myaccount/script-manager/my-documents/iframe?script=releaseForm.js',
				'padding':0,
				minHeight:500
			})
		});
		
		
		$("#addReader").click(function(){
			$.fancybox.open({
				'type':'iframe',
				'href':BASEURL + '/myaccount/script-manager/submission-guidleines/member-directory',
				'padding':0,
				minHeight:500
			})
		});
		
		$("#add_docsBtn").click(function(){
			var $wrp,$checkbox,$checkboxWrp,$chlbl,$input,$inputWrp,$dlbtn
			
			$checkbox	=	$('<input type="checkbox" value="fg" name="additional_docs[]" checked="checked">').hide();
			$input	=	$('<input type="text" class="otherinput" />');
			$dlbtn	=	$('<span class="delete_btn mrg10"><i class="fa fa-trash"></i></span>');
			$chlbl	=	$("<span></span>").addClass("checkbox fa fa-check-square-o").css('color','#000');
			
			$checkboxWrp	=	$("<div></div>").addClass('left').append($checkbox).append($chlbl);
			
			$inputWrp	=	$("<div></div>").addClass('col-10-12 mrglft15').append($input);
			
			$wrp	=	$("<div></div>").addClass("col-1-1 mrgtp10 Box pul10 relative").append($dlbtn).append($checkboxWrp).append($inputWrp);
			
			
			$input.on('keyup',function(){
				$checkbox.val($input.val());
			})
			
			$chlbl.click(function(){
				if($chlbl.hasClass('fa-square-o')){
					$chlbl.removeClass('fa-square-o')
						.addClass('fa-check-square-o')
						.css({color:'#000'});
				}
				else
				{
					$chlbl.removeClass('fa-check-square-o')
					.addClass('fa-square-o')
					.css({color:'#D9D9D9'});
				}
				$checkbox.trigger('click');
			})
			
			$dlbtn.click(function() {
				$wrp.remove();
			})
			
			$("#add_docs").append($wrp);			
		})
		
		$(".jsdelete-reader").each(function(index, element) {
            $(element).click(function(){
				$.ajax({
					url:BASEURL+'/myaccount/script-manager/submission-guidelines/remove-reader',
					method:'post',
					headers: {'X-CSRF-TOKEN': TOKEN},
					data:'id=' + $(element).data('id'),
					 beforeSend:function(){
						$(element).parent().addClass("loadinganimation").addClass("animating"); 
					 },
					 complete:function(){
						$(element).parent().removeClass('loadinganimation').removeClass('animating');
					 },
					 error:function(){
						 FlashMessage('Error in request, Please try again letter');
					 },
					success:function(data){
						if(data.status == 'ok')
						{
							$(element).parent().remove();
							FlashMessage(data.msg,true);
						}
						else
						{
							FlashMessage(data.msg,false);
						}						
					},
				});
			})
        });
		
	});
	
	
	
	
	
})(jQuery)	

function selectReleaseform(e){
	$("#release-url").html('(&nbsp;' + e.target.files[0].name + '&nbsp;)');
	$("#release-url").attr("href","javascript:void(0)");
	$("#release_form_status").val("uploaded");
	$("#deleteReleaseForm").show();
}
// JavaScript Document
(function($){
	$.fn.ToggaleFunctionMsgReplay	=	function(options){
		var $ulWr,orgHeight = false;
		var settings	=	$.extend({
			div:'.docs-list',
			heigthDiv:'.docs-list'
							},options);
		$ulWr	=	$(this);
		var Open	=	function(){
			var $list	=	$(settings.div);
			$list.css({'top':'0px','height':'0px','overflow':'hidden'}).show();
			orgHeight	=	$(settings.heigthDiv).outerHeight();
			console.log(orgHeight);
			$list.animate({'top':'-' + orgHeight + 'px','height':orgHeight + 'px'});
			$ulWr.unbind('click',Open);
			$ulWr.bind('click',Close);
		};
			
		var Close	=	function(){
			var $list	=	$(settings.div);
			$list.animate({'top':'0px','height':'0px'});
			
			$ulWr.bind('click',Open);
			$ulWr.unbind('click',Close);
		};
		
		$ulWr.bind('click',Open);
		
	}
	
	$.fn.SelectLi	=	function(options){
		
		var settings	=	$.extend({
			target:'#slected-script',
			inputName:'script_id',
			icon	:'script.png',
							},options);
							
		var $input		=	$(settings.inputName),
			$target		=	$(settings.target),
			$SeleWr		=	$("<div></div>").addClass("msg_btm pull-right mrgbt5 bck_grey"),
			$cancelBtn	=	$("<i></i>").addClass("fa fa-times closeBtn"),
			$cancelBtn1	=	$("<div></div>").addClass("pull-right").append('<img src="' + BASEURL + '/public/images/icons/cross.png" alt="Cancel" />'),
			$iconWr		=	$("<div></div>").addClass("pull-left"),
			$title		=	$("<h3></h3>"),
			$icon		=	$("<img />").attr("src",BASEURL + "/public/images/icons/" + settings.icon),
			$seletedli	= false;
		
		var Liselect	=	function(){
			var $this	=	$(this);
			$this.css({'background-color':'#6DBCDB','color':'#fff'});
			
			if($seletedli)
			{
				$seletedli.trigger('click');
				$seletedli	=	$(this);
			}
			else
			{
				$seletedli	=	$(this);
			}
			
			$title.html($this.data('title'));
			
			$iconWr.append($icon).append($title).appendTo($SeleWr);
			
			$cancelBtn1.click(function(){ $seletedli.trigger('click'); }).appendTo($SeleWr);
						
			$target.append($SeleWr);
			
			$input.val($(this).data('id'));
			
			$(this).append($cancelBtn);
			$(this).unbind('click',Liselect);
			$(this).bind('click',LiDeselect);
			
		}
		
		var LiDeselect	=	function(){
			$(this).css({'background-color':'#D9D9D9','color':'#233649'});
			$cancelBtn.remove();
			
			$seletedli	=	false;
			$('input[name="' + settings.inputName +'"]').val("");
			$(this).bind('click',Liselect);
			$(this).unbind('click',LiDeselect);
			
			$SeleWr.remove();
		}
		
		
		$(this).find("li").each(function(index, element) {
            $(this).bind('click',Liselect);
        });
		
	}
		
	$(document).ready(function(e) {
		$("#add-script-reply").ToggaleFunctionMsgReplay({ div:".user-scripts",heigthDiv:".script-list" });
		$("#add-template-reply").ToggaleFunctionMsgReplay({ div:".user-templates",heigthDiv:".template-list" });
		$(".script-list").SelectLi({target:'#slected-script',inputName:'#script_idReply','icon':'scripts.png'});
		$(".template-list").SelectLi({target:'#slected-template',inputName:'#template_idReply','icon':'template.png'});
		$("#add-my-docs").fancybox({'type':'iframe','href':BASEURL + '/myaccount/script-manager/my-documents/iframe?script=message-stream.js','padding':0,minHeight:500,});
		$("#upload-docs").data('count',1);
		
		$("#upload-docs").click(function(){
			$("#fileBtn" + $(this).data('count')).trigger("click");
		});
		
		$("#pv-notes-save").click(function(){
			var notes	=	$("#mes-pv-notes").val(),
				form	=	$("#msg-notes-form"),
				url	=	form.attr('action'),
				token	=	$('input[name="_token"]').val();
				console.log(token);
				$.ajax({
					data:'notes=' + notes,
					method:'post',
					url:url,
					headers:{'X-CSRF-TOKEN':token},
					beforeSend:function(){
						$(".private-notes").addClass("loadinganimation").addClass("animating"); 
					},
					complete:function(){
						$(".private-notes").removeClass('loadinganimation').removeClass('animating');
					},
					error:function(){
						FlashMessage('Error In ajax',false);
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
				})
				
				return false;
			
		});
		
		if(typeof request_id !== 'undefined')
		{
			$("#declineRequest").setRequestResult({request_id:request_id,result:'declined'});
			$("#acceptRequest").setRequestResult({request_id:request_id,result:'accepted'});
		}
		
    });
})(jQuery)


//File Select Function
	function fileSelected(ev){
		var $target		=	$("#uploaded-docs"),
			$btn		=	$("#upload-docs"),
			count		=	parseInt($btn.data('count')),
			$Input		=	$("#filebtn" + count ),
			$newInput	=	$('<input type="file" name="attach_file[]" accept="application/pdf" onchange="fileSelected(event)" id="fileBtn' + ( count + 1 ) + '" >'),
			$SeleWr		=	$("<div></div>").addClass("msg_btm btm_50 pull-right mrgbt5 bck_grey"),
			$cancelBtn1	=	$("<div></div>").addClass("pull-right").append('<img src="' + BASEURL + '/public/images/icons/cross.png" alt="Cancel" />'),
			$iconWr		=	$("<div></div>").addClass("pull-left"),
			$title		=	$("<h3></h3>"),
			$icon		=	$("<img />").attr("src",BASEURL + "/public/images/icons/clip.png");
	
	
			$title.html(ev.target.files[0].name)
			$iconWr.append($icon).append($title).appendTo($SeleWr);
			
				
			$cancelBtn1.click(function(){
				
					$SeleWr.remove();
					ev.target.remove();
					
					
			}).appendTo($SeleWr);
			
			$("#FilesDiv").append($newInput);
			$btn.data('count',(count + 1));
			 $target.append($SeleWr);
	}
	
// JavaScript Document
//Gloabla Variables
var ActiveTab	=	"my-script";

var $liPriority, $liUnarchived, $liArchived, $liDefault, $ul, $checkbox, $id, $item, $newTab;
//

(function($){
	$(document).ready(function(){	
		
		$('li[data-task="priority"]').click(function(){
			CommanLiTask(this);
			$liPriority.hide();
			$liArchived.show();
			$liDefault.show();
			chagestauts(3,function(data){
					(data.allcount>0) ? $("#scripts_sub_unread").html(data.allcount) : $("#scripts_sub_unread").remove();
					(data.newcount>0) ? $("#script_unread").html(data.newcount) : $("#script_unread").remove();
					(data.prtcount>0) ? $("#script_priority_unread").html(data.prtcount) : $("#script_priority_unread").remove();
					(data.othercount>0) ? $("#script_other_unread").html(data.othercount) : $("#script_other_unread").remove();
				checkforitems();
			});
			
		});
		
		
		$('li[data-task="archived"]').click(function(){
			CommanLiTask(this);
			$liPriority.show();
			//$liUnarchived.show();
			$liArchived.hide();
			$liDefault.show();
			chagestauts(0,function(data){
				checkforitems();
				if(data.status == 'ok')
				{
					(data.allcount>0) ? $("#scripts_sub_unread").html(data.allcount) : $("#scripts_sub_unread").remove();
					(data.newcount>0) ? $("#script_unread").html(data.newcount) : $("#script_unread").remove();
					(data.prtcount>0) ? $("#script_priority_unread").html(data.prtcount) : $("#script_priority_unread").remove();
					(data.othercount>0) ? $("#script_other_unread").html(data.othercount) : $("#script_other_unread").remove();
					FlashMessage('Script was successfully moved to archive',true);
				}
				else
				{
					FlashMessage(data.msg,false);
				}
			});
		});
		
		$('li[data-task="default"]').click(function(){
			CommanLiTask(this);
			$liPriority.show();
			//$liUnarchived.hide();
			$liArchived.show();
			$liDefault.hide();
			chagestauts(1,function(data){
				if(data.status == 'ok')
				{
					(data.allcount>0) ? $("#scripts_sub_unread").html(data.allcount) : $("#scripts_sub_unread").remove();
					(data.newcount>0) ? $("#script_unread").html(data.newcount) : $("#script_unread").remove();
					(data.prtcount>0) ? $("#script_priority_unread").html(data.prtcount) : $("#script_priority_unread").remove();
					(data.othercount>0) ? $("#script_other_unread").html(data.othercount) : $("#script_other_unread").remove();
					FlashMessage('Script was successfully moved',true);
				}
				else
				{
					FlashMessage(data.msg,false);
				}
				
				var is_auther	=	data.is_author;
				if(is_auther == 1) $item.attr("data-tab",'my-script');
				else	$item.attr("data-tab",'read');
				
				checkforitems();
				
			});
		});
		
		$('li[data-task="delete"]').click(function(){
			CommanLiTask(this);
			chagestauts(-99,function(data){
				checkforitems();
				if(data.status == 'ok')
				{
					(data.allcount>0) ? $("#scripts_sub_unread").html(data.allcount) : $("#scripts_sub_unread").remove();
					(data.newcount>0) ? $("#script_unread").html(data.newcount) : $("#script_unread").remove();
					(data.prtcount>0) ? $("#script_priority_unread").html(data.prtcount) : $("#script_priority_unread").remove();
					(data.othercount>0) ? $("#script_other_unread").html(data.othercount) : $("#script_other_unread").remove();
					
					$item.remove();
					FlashMessage('Script was successfully deleted',true);
				}
				else
				{
					FlashMessage(data.msg,false);
				}
			});
		});
		
		$('.top-tabs li').click(function(){
			
			ActiveTab	=	$(this).data('tab');
			$(".top-tabs li").removeClass('active');
			$(this).addClass('active');
			checkforitems();
		});
		
		$("li.sdeeper-tab").hover(function(){
			$(".sub-tab-nav").addClass('show');
		
			},function(){
			$(".sub-tab-nav").removeClass('show');
		})
		
		$("#SaveNoteBtn").click(function(){
			var form 	=	document.getElementById('privateNoteForm');
			$.ajax({
				url:BASEURL+'/myaccount/set-pv-notes',
				method:'post',
				headers: {'X-CSRF-TOKEN': TOKEN},
				data:'item_id=' + form.script_id.value + '&type=script&note=' + form.pvnotes.value,
				 beforeSend:function(){
					$("#private-notes").addClass("loadinganimation").addClass("animating"); 
				 },
				 complete:function(){
					$("#private-notes").removeClass('loadinganimation').removeClass('animating');
					$.fancybox.close()	
				 },
				 error:function(){
					 FlashMessage('Server Error',false);
				 },
				success:function(data){
					if(data.status == 'ok')
					{
						FlashMessage(data.msg,true)
					}
					else
					{
						FlashMessage(data.msg,false)
					}
					form.reset();
				},
			});
		});
		
		$('.scriptFeedbackselect').click(function(){
			if($(this).hasClass('open')) return  ;
			$(this).addClass('open');
			var $this	=	$(this),
			$ul	=	$(this).find('ul'),
			height	=	$this.find('ul').outerHeight(),
			width	=	$this.find('ul').outerWidth(),
			count	=	1;
			
			var WindowBind	=	function(event){
				if(count == 1){ count++; return; } 
				var position = $ul.offset(),
					left = event.pageX - position.left,
				   top = event.pageY - position.top;
				   				   
				   if(left < 0 || left > width || top < 0 || top > height){
					    $this.removeClass('open');
					    $( document ).unbind( "click",WindowBind );
				   }
			}
			
			$(document).bind('click',WindowBind)
		});
		
		
		$(".scriptFeedbackselect li").click(function(){
			var $this	= $(this),
				$ul		= $(this).parent(),
				feedback= $this.data('feedback'),
				script_id=$ul.data('id'),
				track_id =$ul.data('tid'),
				$item	=	$("#scripts" + track_id);
				
			
			if(!$this.hasClass('active')){
				$ul.find('li').removeClass('active');
				$this.addClass('active');
				$.ajax({
					url:BASEURL + '/myaccount/script-manager/scripts/feedback-icon',
					data:'script_id=' + script_id + '&track_id='+ track_id + '&feedback=' + feedback,
					method:'post',
					headers:{'X-CSRF-TOKEN':TOKEN},
					beforeSend:function(){
						$ul.addClass("loadinganimation").addClass("animating"); 
						$item.addClass("loadinganimation").addClass("animating"); 
						
					},
					complete:function(){
						console.log($item)
						$ul.removeClass('loadinganimation').removeClass('animating');
						$item.attr('data-tab',feedback);
						$item.removeClass("loadinganimation").removeClass("animating"); 
						checkforitems();
					},
					success:function(data){
						 if(data.status == 'ok')
						 {
							(data.allcount>0) ? $("#scripts_sub_unread").html(data.allcount) : $("#scripts_sub_unread").remove();
							(data.newcount>0) ? $("#script_unread").html(data.newcount) : $("#script_unread").remove();
							(data.prtcount>0) ? $("#script_priority_unread").html(data.prtcount) : $("#script_priority_unread").remove();
							(data.othercount>0) ? $("#script_other_unread").html(data.othercount) : $("#script_other_unread").remove();
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
		
		$(".share_script").each(function (index,ele){
			$(this).PopUp({			
		   	boxDivId:'send-message',
		  	 beforeOpen:function(ele){	
			   var form	=	document.getElementById("mesaage-sending-form");
			  form.script_id.value	=	ele.data('id');
			  var scriptName	=	ele.parent().parent().parent().parent().find("h3.item-head.script a").text();
			  $("#sendMesageHeading").text("Share Script \"" + scriptName + "\"");
		   },
		   }); 
		});
		
		$(".sendmessageso").click(function(){
			var form	=	document.getElementById('mesaagetoownerform');
			form.reset();
			form.script_id.value=	$(this).data('id');
			$.fancybox.open({
				'type':'inline',
				'href':'#sendMessageToScriptOwner',
				padding:0
			});
		});
		
		$(".scriptinfo").each(function(index, element) {
           $(this).AnimateSlideUp({div:$(this).data('id')}); 
        });
		$(".writerInfo").each(function(index, element) {
           $(this).AnimateSlideUp({div:$(this).data('id')}); 
        });
		
		$("li.deeper-nav .sub-tab-nav li").click(function (){
			var classes	=	$(this).attr('class') + ' indicater',
				text = 	$(this).text(),
				$li	=	$("li.deeper-nav");
				classes	=	classes.replace('active','');
			$li.find("li").show();
			$(this).hide();
			$li.find(".ltext").text(text);
			$li.addClass('active');
			$li.find('.indicater').attr('class',classes);
			$li.data('tab',$(this).attr('data-tab'));
			$(this).parent().removeClass('show');
		});
		
	});	
})(jQuery);

function setTaskVariables(object){
	$this	=	$(object);
	$newTab	=	$this.data("task");
	$ul	=	$this.parent();
	$checkbox	=	$ul.parent().parent().find("span.ul-checkbox");
	$id	=	$ul.data('id');
	$item	=	$("#scripts"+$id);	
	$liPriority	=	$ul.find('li[data-task="priority"]');
	//$liUnarchived	=	$ul.find('li[data-task="unarchived"]');
	$liArchived	=	$ul.find('li[data-task="archived"]');
	$liDefault	=	$ul.find('li[data-task="default"]');
}

function CommanLiTask(object){
	setTaskVariables(object);
	$checkbox.trigger('click');
	$item.attr("data-tab",$newTab)//.hide();
	
}

function checkforitems(){
	var lenth	=	parseInt($('div.scripts[data-tab="'+ActiveTab+'"]').length);
	if(lenth < 1){
		$('div.item-box').hide();
		$(".no-records").show();
	}else{
		$(".no-records").hide();
		ShowItems();
	}
}
function ShowItems(){	
	$('div.scripts[data-tab="'+ActiveTab+'"]').show();
	
	if(ActiveTab != 'my-script'){
		$('div.scripts[data-tab="my-script"]').hide();
	}
	
	if(ActiveTab != 'priority'){
		$('div.scripts[data-tab="priority"]').hide();
	}
	
	if(ActiveTab != 'read'){
		$('div.scripts[data-tab="read"]').hide();
	}
	
	if(ActiveTab != 'archived'){
		$('div.scripts[data-tab="archived"]').hide();
	}	
	
	if(ActiveTab != 'Priority'){
		$('div.scripts[data-tab="Priority"]').hide();
	}	
	if(ActiveTab != 'Rejected'){
		$('div.scripts[data-tab="Rejected"]').hide();
	}	
	if(ActiveTab != 'Considered'){
		$('div.scripts[data-tab="Considered"]').hide();
	}	
	if(ActiveTab != 'Recommended'){
		$('div.scripts[data-tab="Recommended"]').hide();
	}	
	if(ActiveTab != 'buy'){
		$('div.scripts[data-tab="buy"]').hide();
	}	
	if(ActiveTab != 'recomd-writer'){
		$('div.scripts[data-tab="recomd-writer"]').hide();
	}	
	if(ActiveTab != 'new'){
		$('div.scripts[data-tab="new"]').hide();
	}	
}

function chagestauts(stauts,onsuccess){
	//console.log(stauts);
	var token	=	$('input[name="_token"]').val();
	$.ajax({
			url:BASEURL+'/myaccount/script-manager/scripts/change-status',
			method:'post',
			headers: {'X-CSRF-TOKEN': token},
			data:'id=' + $id + '&status=' + stauts,
			 beforeSend:function(){
				$item.addClass("loadinganimation").addClass("animating"); 
			 },
			 complete:function(){
				$item.removeClass('loadinganimation').removeClass('animating');
			 },
			success:onsuccess,
		});
}


function showPrivateNotes(id)
{	
var form 	=	document.getElementById('privateNoteForm');
	form.script_id.value	=	id;
	
	$.ajax({
		url:BASEURL+'/myaccount/get-pv-notes',
		method:'post',
		headers: {'X-CSRF-TOKEN': TOKEN},
		data:'id=' + id + '&type=script',
		 beforeSend:function(){
			$("#private-notes").addClass("loadinganimation").addClass("animating"); 
		 },
		 complete:function(){
			$("#private-notes").removeClass('loadinganimation').removeClass('animating');
		 },
		success:function(data){
			form.pvnotes.value = data.note;
		},
	});
	
	$.fancybox.open({'type':'inline','href':'#private-notes','padding':'0px'})		
}
		
	
	
function PostScript(id){
	//var $item	=	$("#scripts"+id);
	var $btn	=	$("#postUnpostScript"+id);
		
	var $i	= $('<i class="fa fa-spin fa-spinner fa-pulse"></i>').css({
							'font-size': '15px',
							'left': '19px',
							'position': 'absolute',
							'top': '9px'
						})
	$.ajax({
		method:'get',
		url:BASEURL+'/myaccount/script-manager/scripts/' + id + '/post-unpost-script',
		headers:{'X-CSRF-TOKEN':TOKEN},
		data:'id=' + id + '&status=post',
		beforeSend:function(){						
			$btn.removeClass('fa-user').addClass('disabled').append($i);
		},
		complete:function(){
			$i.remove();
			$btn.addClass('bg-user-times').addClass('pdlft35').removeClass('disabled').text('Unpost from profile').attr('onclick','UnpostScript('+ id +')')
			
		},
		success:function(data){
			console.log(data);
			
			if(data.status == 'ok')
			{			
				FlashMessage(data.msg,true);
				if(ActiveTab == 'archived')
				{
					//$item.attr('data-tab','my-scripts');
					//ShowItems()
				}
			}
			else
			{
				FlashMessage(data.msg,false);
			}
			
			
		},
		error:function(){
			
			FlashMessage('Error in Request try again letter',false);
		}
	});
}

function UnpostScript(id){
	//var $item	=	$("#scripts"+id);
	var $btn	=	$("#postUnpostScript"+id);
		
	var $i	= $('<i class="fa fa-spin fa-spinner fa-pulse"></i>').css({
							'font-size': '15px',
							'left': '19px',
							'position': 'absolute',
							'top': '9px'
						})
	$.ajax({
		url:BASEURL+'/myaccount/script-manager/scripts/' + id + '/post-unpost-script',
		method:'get',
		headers: {'X-CSRF-TOKEN': TOKEN},
		data:'id=' + id + '&status=unpost',
		beforeSend:function(){						
			$btn.removeClass('bg-user-times').addClass('disabled').css({
				'position':'relative',
				'line-height':'20px'
			}).append($i);
		},
		complete:function(){
			$i.remove();
			$btn.addClass('fa-user').removeClass('disabled').removeClass('pdlft35').text('Post to profile').attr('onclick','PostScript('+ id +')')
		},
		success:function(data){
			console.log(data);
			
			if(data.status == 'ok')
			{			
				FlashMessage(data.msg,true);
			}
			else
			{
				FlashMessage(data.msg,false);
			}
			
			
		},
		error:function(){
			
			FlashMessage('Error in Request try again letter',false);
		}
	});
}
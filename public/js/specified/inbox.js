// JavaScript Document
//Gloabla Variables
var ActiveTab	=	"messages";

var $liUnarchived, $liArchived, $liRead,$liUnread, $ul, $checkbox, $id, $item, $newTab;
//

(function($){
	$(document).ready(function(){		
		$('li[data-task="read"]').click(function(){
			setTaskVariables(this);
			$liRead.hide();
			$liUnread.show();
			chagestauts('read',function(data){				
				if(data.status == 'ok')
				{	
					console.log(data);
					$item.removeClass('bglightSky');
					$item.addClass('read');
					
					if(data.inunread > 0)
						$("#in-unread").html(data.inunread);
					else
						$("#in-unread").remove();
						
					if(data.outunread > 0)
						$("#out-unread").html(data.outunread);
					else
						$("#out-unread").remove();	
					
					if(data.ttunread > 0)
						$("#message_unread").html(data.ttunread);
					else
						$("#message_unread").remove();		
						
					FlashMessage(data.msg,true);
				}
				else
				{
					FlashMessage(data.msg,false);
				}
			});
		});
		
		$('li[data-task="unread"]').click(function(){
			setTaskVariables(this);
			$liRead.show();
			$liUnread.hide();
			chagestauts('unread',function(data){
				if(data.status == 'ok')
				{	console.log(data);				
					$item.removeClass('read');
					$item.addClass('bglightSky');
					
					if(data.inunread > 0)
						$("#in-unread").html(data.inunread);
					else
						$("#in-unread").remove();
						
					if(data.outunread > 0)
						$("#out-unread").html(data.outunread);
					else
						$("#out-unread").remove();	
					
					if(data.ttunread > 0)
						$("#message_unread").html(data.ttunread);
					else
						$("#message_unread").remove();		
						
					FlashMessage(data.msg,true);
				}
				else
				{
					FlashMessage(data.msg,false);
				}
			});
		});
		
		$('li[data-task="unarchived"]').click(function(){
			setTaskVariables(this);
			$liUnarchived.hide();
			$liArchived.show();
			
			chagestauts('unarchived',function(data){		
				$item.removeClass('archived');
				if(data.status == 'ok')
				{
					if(data.is_message)
					{
						$item.addClass('messages');
					}
					else
					{
						$item.addClass('sent');
					}
					FlashMessage(data.msg,true);
					$item.fadeOut( 100 );
					checkforitems();
				}
				else
				{
					FlashMessage(data.msg,false);
				}
			});
		});
		
		$('li[data-task="archived"]').click(function(){
			setTaskVariables(this);
			$liUnarchived.show();
			$liArchived.hide();
			chagestauts('archived',function(data){
				if(data.status == 'ok')
				 {
					$item.removeClass('sent');
					$item.removeClass('messages');
					$item.addClass('archived');
					FlashMessage(data.msg,true);
					$item.fadeOut( 100 );
					checkforitems();
				 }
				 else
				 {
					 FlashMessage(data.msg,false);
				 }
			});
		});
		
		
		
		$('li[data-task="delete"]').click(function(){
			setTaskVariables(this);
			chagestauts('delete',function(data){	
				if(data.status == 'ok')
				{
					$item.fadeOut( 100 ).remove();
					checkforitems();
					if(data.inunread > 0)
						$("#in-unread").html(data.inunread);
					else
						$("#in-unread").remove();
						
					if(data.outunread > 0)
						$("#out-unread").html(data.outunread);
					else
						$("#out-unread").remove();	
					
					if(data.ttunread > 0)
						$("#message_unread").html(data.ttunread);
					else
						$("#message_unread").remove();		
						
					FlashMessage(data.msg,true);
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
			ShowItems();
			checkforitems();
			
		});
		
		$('.span-starred').click(function(){
			$id	=	$(this).data('id');
			$item	=	$("#inbox"+$id);
			if($(this).hasClass('fa-star-o'))
			{
				chagestauts("favorite",function(data){
					if(data.status == 'ok')
					{
						$item.find('.span-starred').removeClass('fa-star-o')
						$item.find('.span-starred').addClass('fa-star').addClass('act');
						$item.addClass('starred');
						FlashMessage(data.msg,true);
					}
					else
					{
						FlashMessage(data.msg,false);
					}
				});
			}
			else
			{
				chagestauts("unfavorite",function(data){
					if(data.status == 'ok')
					{
						$item.removeClass('starred');
						$item.find('.span-starred').removeClass('fa-star').removeClass('act');
						$item.find('.span-starred').addClass('fa-star-o')
						FlashMessage(data.msg,true);
					}
					else
					{
						FlashMessage(data.msg,false);
					}
				});
			}
			
		});
		
	});
})(jQuery);

function setTaskVariables(object){
	$this	=	$(object);
	$newTab	=	$this.data("task");
	$ul	=	$this.parent();
	$checkbox	=	$ul.parent().parent().find("span.ul-checkbox");
	$id	=	$ul.data('id');
	$item	=	$("#inbox"+$id);	
	$liUnarchived	=	$ul.find('li[data-task="unarchived"]');
	$liArchived	=	$ul.find('li[data-task="archived"]');
	$liRead	=	$ul.find('li[data-task="read"]');
	$liUnread	=	$ul.find('li[data-task="unread"]');
	
	$checkbox.trigger('click');
}

function checkforitems(){
	var length	=	parseInt($(".item-box."+ActiveTab).length);
	
	console.log(length);
	if(length == 0){
		$(".item-box").hide();
		$(".item-box.no-records").show();		
	}else{
		$(".item-box.no-records").hide();
		
	}
}


function ShowItems(){	
	$(".item-box").each(function(index, element) {
        if($(this).hasClass(ActiveTab)){
			$(this).show();	
		}else{
			$(this).hide();	
		}
    });
}

function chagestauts(stauts,onsuccess){
	var token	=	$('input[name="_token"]').val();
	$.ajax({
			url:BASEURL+'/myaccount/message/change-status',
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
var ActiveTab	=	'sended',$ul, $checkbox, $id, $item
(function($){
	
	$(document).ready(function(){
		$('.top-tabs li').click(function(){
			ActiveTab	=	$(this).data('tab');
			
			$(".top-tabs li").removeClass('active');
			$(this).addClass('active');
			
			if(parseInt($('.item-box[data-tab="' + ActiveTab + '"]').length) == 0)
			{
				$('.item-box').hide();
				$('.item-box.no-records').show();
			}
			else
			{
				$('.item-box[data-tab="' + ActiveTab + '"]').show();
								
				$('.item-box.no-records').hide();
				
				if(ActiveTab != "sent") $('.item-box[data-tab="members"]').hide();
				
				if(ActiveTab != "accept") $('.item-box[data-tab="guests"]').hide();		
			}
		});
		
		
		
		$('li[data-task="delete"]').click(function(){
			setTaskVariables(this);
			chagestauts('delete',function(data){
				if(data.status == 'ok'){
					FlashMessage(data.msg,true);
					$item.remove();
					ShowItems();
				}
				else{
					FlashMessage(data.msg,false);
				}
			});
		});
		
		
	});
	
})(jQuery)

function setTaskVariables(object){	
	$thisli	=	$(object);
	$ul	=	$thisli.parent();
	$checkbox	=	$ul.parent().parent().find("span.ul-checkbox");
	$id	=	$ul.data('id');
	$item	=	$("#invite"+$id);	
	$checkbox.trigger('click');
}


function ShowItems(){	

	$('div[data-tab="'+ActiveTab+'"]').show();
	
	if(ActiveTab != 'sent'){
		$('div[data-tab="sent"]').hide();
	}
	
	if(ActiveTab != 'accept'){
		$('div[data-tab="accept"]').hide();
	}
	var lenth	=	parseInt($('div[data-tab="'+ActiveTab+'"]').length);
	if(lenth < 1){
		$(".no-records").show();
	}else{
		$(".no-records").hide();		
	}
}

function chagestauts(stauts,onsuccess){
	$.ajax({
			url:BASEURL+'/myaccount/invite-friends/delete',
			method:'post',
			headers: {'X-CSRF-TOKEN': TOKEN},
			data:'id=' + $id ,
			 beforeSend:function(){
				 
				$item.addClass("loadinganimation").addClass("animating"); 
			 },
			 complete:function(){
				$item.removeClass('loadinganimation').removeClass('animating');
				ShowItems();
			 },
			 error:function(){
				 FlashMessage('Error in Request Please Try Again Later.')
			 },
			success:onsuccess
		});
}
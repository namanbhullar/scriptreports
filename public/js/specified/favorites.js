var ActiveTab	=	'member',$ul, $checkbox, $id, $item,$liUnArchived, $liArchived;
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
				
				if(ActiveTab != "member") $('.item-box[data-tab="member"]').hide();
				
				if(ActiveTab != "template") $('.item-box[data-tab="template"]').hide();
				
				if(ActiveTab != "script") $('.item-box[data-tab="script"]').hide();
				
				if(ActiveTab != "archived") $('.item-box[data-tab="archived"]').hide();				
			}
		});
		
		
		
		$('li[data-task="archived"]').click(function(){
			setTaskVariables(this);
			$liArchived.hide();
			$liUnArchived.show();			
			chagestauts('archived',function(data){
				if(data.status == 'ok')
				{
					FlashMessage(data.msg,true);
				}
				else
				{
					FlashMessage(data.msg,false);
				}
				$item.attr('data-tab','archived');
				ShowItems();
			});
		});
		
		$('li[data-task="unarchived"]').click(function(){
			setTaskVariables(this);
			$liArchived.show();
			$liUnArchived.hide();
			chagestauts('other',function(data){
				if(data.status == 'ok')
				{
					switch(data.tab){
						case 'Script':
							$item.attr('data-tab','script');
						break;
						
						case 'User':
							$item.attr('data-tab','member');
							data.msg	=	"It was successfully Moved To Members";
						break;
						
						case 'Template':
							$item.attr('data-tab','template');
						break;
					}
					FlashMessage(data.msg,true);
				}
				else
				{
					FlashMessage(data.msg,false);
				}
				ShowItems();
			});
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
		
		$(".send-message").each(function (index,ele){
			var id	=	$(this).data('id');
			$(this).PopUp({
			
			boxDivId:'send-message',
			 beforeOpen:function(ele){	
			   var form	=	document.getElementById("mesaage-sending-form");
			  form.member.value	=	ele.data('id');
		   },
		   }); 		   
		});
		
		$(".add-contact").each(function(index, element) {
			
            $(this).contact({id:$(this).data('id')});
        });
		
	});
	
})(jQuery)

function setTaskVariables(object){	
	$thisli	=	$(object);
	$ul	=	$thisli.parent();
	$checkbox	=	$ul.parent().parent().find("span.ul-checkbox");
	$id	=	$ul.data('id');
	$item	=	$("#favorite"+$id);	
	$liArchived	=	$ul.find('li[data-task="archived"]');
	$liUnArchived	=	$ul.find('li[data-task="unarchived"]');
	$checkbox.trigger('click');
}


function ShowItems(){	

	$('div[data-tab="'+ActiveTab+'"]').show();
	
	if(ActiveTab != 'member'){
		$('div[data-tab="member"]').hide();
	}
	
	if(ActiveTab != 'template'){
		$('div[data-tab="template"]').hide();
	}
	
	if(ActiveTab != 'script'){
		$('div[data-tab="script"]').hide();
	}
	
	if(ActiveTab != 'archived'){
		$('div[data-tab="archived"]').hide();
	}	
	
	var lenth	=	parseInt($('div[data-tab="'+ActiveTab+'"]').length);
	if(lenth < 1){
		$(".no-records").show();
	}else{
		$(".no-records").hide();		
	}
}

function chagestauts(stauts,onsuccess){
	var token	=	$('input[name="_token"]').val();
	$.ajax({
			url:BASEURL+'/myaccount/favorites/change-status',
			method:'post',
			headers: {'X-CSRF-TOKEN': token},
			data:'id=' + $id + '&status=' + stauts,
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
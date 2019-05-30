var ActiveTab	=	'my-templates',$ul, $checkbox, $id, $item,$liUnArchived, $liArchived;
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
				
				if(ActiveTab != "my-templates") $('.item-box[data-tab="my-templates"]').hide();
				
				if(ActiveTab != "favorites") $('.item-box[data-tab="favorites"]').hide();
				
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
					$item.find("#postUnpostTempalte")
						.text("Post Template")
						.removeClass('bg-user-times')
						.addClass('fa-user')
						.attr('onclick','PostTempalte('+ $id +')');
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
			chagestauts('unarchived',function(data){
				if(data.status == 'ok')
				{
					$item.attr('data-tab','my-templates');
					$item.find("#postUnpostTempalte")
						.text("Unpost Template")
						.addClass('bg-user-times')
						.removeClass('fa-user')
						.attr('onclick','UnpostTempalte('+ $id +')');
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
		
		$(".send-template").each(function (index,ele){
			var id	=	$(this).data('id');
			$(this).PopUp({
			
		   	boxDivId:'send-message',
		  	 beforeOpen:function(ele){	
			   var form	=	document.getElementById("mesaage-sending-form");
			  form.template_id.value	=	ele.data('id');
		   },
		   }); 
		});
		
		$(".template-tracking").each(function(index, element) {
           $(this).AnimateSlideUp({div:$(this).data('id')}); 
        });
		
	});
	
})(jQuery)

function setTaskVariables(object){	
	$thisli	=	$(object);
	$ul	=	$thisli.parent();
	$checkbox	=	$ul.parent().parent().find("span.ul-checkbox");
	$id	=	$ul.data('id');
	$item	=	$("#template"+$id);	
	$liArchived	=	$ul.find('li[data-task="archived"]');
	$liUnArchived	=	$ul.find('li[data-task="unarchived"]');
	$checkbox.trigger('click');
}


function ShowItems(){	

	$('div[data-tab="'+ActiveTab+'"]').show();
	
	if(ActiveTab != "my-templates") $('.item-box[data-tab="my-templates"]').hide();
				
	if(ActiveTab != "favorites") $('.item-box[data-tab="favorites"]').hide();
	
	if(ActiveTab != "archived") $('.item-box[data-tab="archived"]').hide();	
	
	var lenth	=	parseInt($('div[data-tab="'+ActiveTab+'"]').length);
	if(lenth < 1){
		$(".no-records").show();
	}else{
		$(".no-records").hide();		
	}
}

function chagestauts(stauts,onsuccess){
	$.ajax({
			url:BASEURL+'/myaccount/report-template/change-status',
			method:'post',
			headers: {'X-CSRF-TOKEN': TOKEN},
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

function PostTempalte(id){
	var $item	=	$("#template"+id);
	var $btn	=	$item.find("#postUnpostTempalte")
		
	var $i	= $('<i class="fa fa-spin fa-spinner fa-pulse"></i>').css({
							'font-size': '15px',
							'left': '19px',
							'position': 'absolute',
							'top': '9px'
						})
	$.ajax({
		method:'get',
		url:BASEURL+'/myaccount/report-template/' + id + '/posttemplate',
		headers:{'X-CSRF-TOKEN':TOKEN},
		beforeSend:function(){						
			$btn.removeClass('fa-user').addClass('disabled').append($i);
		},
		complete:function(){
			$i.remove();
			$btn.addClass('bg-user-times').removeClass('disabled').text('Unpost Template').attr('onclick','UnpostTempalte('+ id +')')
			
		},
		success:function(data){
			console.log(data);
			
			if(data.status == 'ok')
			{			
				FlashMessage(data.msg,true);
				if(ActiveTab == 'archived')
				{
					$item.attr('data-tab','my-templates');
					ShowItems()
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

function UnpostTempalte(id){
	var $item	=	$("#template"+id);
	var $btn	=	$item.find("#postUnpostTempalte")
		
	var $i	= $('<i class="fa fa-spin fa-spinner fa-pulse"></i>').css({
							'font-size': '15px',
							'left': '19px',
							'position': 'absolute',
							'top': '9px'
						})
	$.ajax({
		url:BASEURL+'/myaccount/report-template/change-status',
		method:'post',
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
			$btn.addClass('fa-user').removeClass('disabled').text('Post Template').attr('onclick','PostTempalte('+ id +')')
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
var ActiveTab	=	'scripts',$thisli,$liScript, $liCoverage, $liLegal, $liOther, $ul, $checkbox, $id, $item,$newTab;
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
				$('.item-box[data-tab="' + ActiveTab + '"]').show()
				
				$('.item-box.no-records').hide();
				
				if(ActiveTab != "legal") $('.item-box[data-tab="legal"]').hide();
				
				if(ActiveTab != "other") $('.item-box[data-tab="other"]').hide();
				
				if(ActiveTab != "coverage") $('.item-box[data-tab="coverage"]').hide();
				
				if(ActiveTab != "scripts") $('.item-box[data-tab="scripts"]').hide();
				
				if(ActiveTab != "story") $('.item-box[data-tab="story"]').hide();
				 
				
			}
		});
		
		$('li[data-task="scripts"]').click(function(){
			CommanLiTask(this);
			$liScript.hide();
			$liLegal.show();
			$liOther.hide();
			$liCoverage.show();
			chagestauts('scripts',function(data){
				if(data.status == 'ok')
					FlashMessage(data.msg,true);
				else
					FlashMessage(data.msg,false);
			});
		});
		
		$('li[data-task="coverage"]').click(function(){
			CommanLiTask(this);
			$liScript.hide();
			$liLegal.show();
			$liOther.show();
			$liCoverage.hide();
			chagestauts('coverage',function(data){
				if(data.status == 'ok')
					FlashMessage(data.msg,true);
				else
					FlashMessage(data.msg,false);
			});
		});
		
		$('li[data-task="legal"]').click(function(){
			CommanLiTask(this);
			$liScript.show();
			$liLegal.hide();
			$liOther.show();
			$liCoverage.show();
			chagestauts('legal',function(data){
				if(data.status == 'ok')
					FlashMessage(data.msg,true);
				else
					FlashMessage(data.msg,false);
			});
		});
		
		$('li[data-task="other"]').click(function(){
			CommanLiTask(this);
			$liScript.show();
			$liLegal.show();
			$liOther.hide();
			$liCoverage.show();
			chagestauts('other',function(data){
				if(data.status == 'ok')
					FlashMessage(data.msg,true);
				else
					FlashMessage(data.msg,false);
			});
		});
		
		$('li[data-task="delete"]').click(function(){
			CommanLiTask(this);
			chagestauts('delete',function(data){
				if(data.status == 'ok'){
					FlashMessage(data.msg,true);
					$item.remove();
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
	$newTab	=	$thisli.data("task");
	$ul	=	$thisli.parent();
	$checkbox	=	$ul.parent().parent().find("span.ul-checkbox");
	$id	=	$ul.data('id');
	$item	=	$("#dox"+$id);	
	$liScript	=	$ul.find('li[data-task="scripts"]');
	$liLegal	=	$ul.find('li[data-task="legal"]');
	$liOther	=	$ul.find('li[data-task="other"]');
	$liCoverage	=	$ul.find('li[data-task="coverage"]');
}

function CommanLiTask(object){
	setTaskVariables(object);
	$checkbox.trigger('click');
	$item.attr("data-tab",$newTab);
	checkforitems();
}

function checkforitems(){
	var lenth	=	parseInt($('div[data-tab="'+ActiveTab+'"]').length);
	if(lenth < 1){
		$('div.item-box').hide();
		$(".no-records").show();
	}else{
		$(".no-records").hide();		
	}
}
function ShowItems(){	
	$('div[data-tab="'+ActiveTab+'"]').show();
	
	if(ActiveTab != 'scripts'){
		$('div[data-tab="scripts"]').hide();
	}
	
	if(ActiveTab != 'coverage'){
		$('div[data-tab="coverage"]').hide();
	}
	
	if(ActiveTab != 'legal'){
		$('div[data-tab="legal"]').hide();
	}
	
	if(ActiveTab != 'other'){
		$('div[data-tab="other"]').hide();
	}	
}

function chagestauts(stauts,onsuccess){
	console.log(stauts);
	var token	=	$('input[name="_token"]').val();
	$.ajax({
			url:BASEURL+'/myaccount/script-manager/my-documents/change-status',
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
			success:onsuccess
		});
}
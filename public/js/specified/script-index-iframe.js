// JavaScript Document
//Gloabla Variables
var ActiveTab	=	"my-script";

(function($){
	
	$(document).ready(function(){		
		$('.top-tabs li').click(function(){
			ActiveTab	=	$(this).data('tab');
			$(".top-tabs li").removeClass('active');
			$(this).addClass('active');
			checkforitems();
		});
		
		$(".ul-checkbox").click(function(){
			var $this	=	$(this);
			var id	=	$this.data('id');
			
			
			if($this.hasClass('fa-check-square-o'))
			{
				$index	=	selectedScript.indexOf(id);
				selectedScript.splice($index,1);
				$this.removeClass('fa-check-square-o');
				$this.addClass('fa-square-o').css("color","#dfdfdf");
			}
			else
			{
				selectedScript.push(id);
				$this.addClass('fa-check-square-o');
				$this.removeClass('fa-square-o').css("color","#000");
			}
			
			$("#select-script span").html("&nbsp;(" + selectedScript.length + ")");
			
			if(selectedScript.length == 0)
			{
				$("#select-script").fadeOut( 300 );
			}else
			{
				$("#select-script").fadeIn( 300 );
			}
		});
		
		$("#select-script").click(function(){			
			data	=	"status=AddProfile&id=" + selectedScript.join(',');
			
			
			$.ajax({
				url:BASEURL + "/myaccount/script-manager/scripts/ScriptToProfile",
				method:'post',
				headers:{'X-CSRF-TOKEN':token},
				data:data,
				beforeSend:function(){					
					$("html").removeClass("faded").addClass("loadinganimation").addClass("animating"); 
				},
				complete:function(){
					$("html").removeClass('loadinganimation').removeClass('animating');
				},
				error:function(){
					parent.FlashMessage("Error in Request. Please Try After Some Time");
				},
				success:function(data){
					if(data.status == 'ok')
					{
						selectedScript.forEach(function(value, index){
							var $head	=	$("#scripts" + value).find(".item-head").clone(),
							$detail	=	$("#scripts" + value).find(".item-detail ").clone(),
							$target	=	parent.$("#profile-scriptpac-part"),
							$wr	=	$("<div></div>").addClass('col-1-1 Box pul10 mrgbt20').attr('id','selectedScriptPac' + value),
							$htmlwr	=	$("<div></div>").addClass('pull-left'),
							$dlWr	=	$("<div></div>").addClass('pull-left mrgrt20'),
							$dlBtn	=	$("<spna></span>").addClass('pull-left scriptPac_delete').html('<i class="fa fa-trash"></i>').css({'color':'#6dbcdb','font-size':'35px','cursor':'pointer'}).attr('data-id',value);
							
							
							$dlWr.append($dlBtn).appendTo($wr);
							$htmlwr.append($head).append($detail).appendTo($wr);
							
							$target.append($wr)
						});
						
						parent.$(".fancybox-close").trigger('click');
						parent.FlashMessage(data.msg,true);
						parent.applydeleteScriptfunction();
						
						
					}
					else
					{
						parent.FlashMessage(data.msg,false)
					}
				}
			});
		})
		
		$(".faded-delete").click(function(){
			var id	=	$(this).data('id'),
			$item	=	$("#scripts" + id),
			$dbtn	=	$item.find(".faded-delete");
			
			$.ajax({
				url:BASEURL + "/myaccount/script-manager/scripts/ScriptToProfile",
				method:'post',
				headers:{'X-CSRF-TOKEN':token},
				data:"id="+ id + "&status=removeProfile",
				beforeSend:function(){					
					$dbtn.hide();
					$item.removeClass("faded").addClass("loadinganimation").addClass("animating"); 
				},
				complete:function(){
					$("#scripts" + id).removeClass('loadinganimation').removeClass('animating');
				},
				error:function(){
					parent.FlashMessage("Error in Request. Please Try After Some Time");
					$dbtn.show();
					$item.addClass("faded")
				},
				success:function(data){
					if(data.status == 'ok')
					{
						parent.FlashMessage(data.msg,true);
						$dbtn.remove();
						parent.$("#selectedScriptPac" + id).remove();
					}
					else
					{
						parent.FlashMessage(data.msg,false);
						$dbtn.show();
						$item.addClass("faded");
					}
				}
			});
		});
		
	});
})(jQuery);


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
	
	if(ActiveTab != 'archived'){
		$('div.scripts[data-tab="archived"]').hide();
	}	
}

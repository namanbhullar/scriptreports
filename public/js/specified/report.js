// JavaScript Document

var ActiveTab	=	"completed";
var SortBy		=	"sort-by";

var $liUnarchived, $liArchived, $ul, $checkbox, $id, $item, $newTab;
(function($){
	$(document).ready(function(){	
		
		$('li[data-task="archived"]').click(function(){
			CommanLiTask(this);
			$liArchived.hide();
			$liUnarchived.show();
			chagestauts(0,function(data){
				if(data.status == 'ok')
				{
					FlashMessage('Script was successfully moved',true);
				}
				else
				{
					FlashMessage(data.msg,false);
				}
				$item.attr("data-tab",'archived');
				checkforitems();
				
			});
		});
		
		$('li[data-task="unarchived"]').click(function(){
			CommanLiTask(this);
			$liArchived.show();
			$liUnarchived.hide();
			chagestauts(1,function(data){
				if(data.status == 'ok')
				{
					FlashMessage('Report was successfully moved',true);
				}
				else
				{
					FlashMessage(data.msg,false);
				}
				
				if(data.old_staus == 1) $item.attr("data-tab",'progress');
				else	$item.attr("data-tab",'completed');
				
				checkforitems();
				
			});
		});
		
		$('li[data-task="mydocs"]').click(function(){
			CommanLiTask(this);
			chagestauts(999,function(data){
				checkforitems();
				if(data.status == 'ok')
				{
					FlashMessage('Report was successfully saved to My Documents',true);
				}
				else
				{
					FlashMessage(data.msg,false);
				}
			});
		});
		
		$('li[data-task="delete"]').click(function(){
			CommanLiTask(this);
			chagestauts(-99,function(data){
				checkforitems();
				if(data.status == 'ok')
				{
					
					$item.remove();
					FlashMessage('Report was successfully deleted',true);
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
		
		$("#SaveNoteBtn").click(function(){
			var form 	=	document.getElementById('privateNoteForm');
			$.ajax({
				url:BASEURL+'/myaccount/set-pv-notes',
				method:'post',
				headers: {'X-CSRF-TOKEN': TOKEN},
				data:'item_id=' + form.report_id.value + '&type=report&note=' + form.pvnotes.value,
				 beforeSend:function(){
					$("#private-notes").addClass("loadinganimation").addClass("animating"); 
				 },
				 complete:function(){
					$("#private-notes").removeClass('loadinganimation').removeClass('animating');
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
					$.fancybox.close();
				},
			});
		});
		
		$("#ReportCompareBtn").click(function(){
			$('#CompareReports').width(600)
			$.fancybox.open({
				type:'inline',
				href:'#CompareReports',
				padding:0,
				width:600,
			});
		});
		
		
		
		$(".send-report-back").click(function(){
			var id	=	$(this).data('id'),
				$this	=	$(this),
				$item	=	$("#reports" + id);
				
			if(id == "") return FlashMessage('Report is Empty',false);
			if($(this).data('again') == 'yes')
			{
				if(!window.confirm('This report was sent.  Would you like to resend?')) return;
			}
			else
			{
				if(!window.confirm('Do you want to send report back to client')) return;
			}
			
			
			$.ajax({
				url:BASEURL+'/myaccount/script-reports/' + id + '/sent-report-back',
				method:'post',
				headers: {'X-CSRF-TOKEN': TOKEN},
				 beforeSend:function(){
					$item.addClass("loadinganimation").addClass("animating"); 
				 },
				 complete:function(){
					$item.removeClass('loadinganimation').removeClass('animating');
				 },
				success:function(data){
					if(data.status == 'ok')
					{
						$item.attr("data-tab","completed");
						checkforitems();
						FlashMessage(data.msg,true);
						$this.attr('data-again',"yes");
					}
					else
					{
						FlashMessage(data.msg,true);
					}
				},
			});
		})
		
		
		//share completed reports goes here
		$(".report-share").each(function (index,ele){
			$(this).PopUp({			
		   	boxDivId:'send-message',
		  	 beforeOpen:function(ele){	
			   var form	=	document.getElementById("mesaage-sending-form");
			  form.report_id.value	=	ele.data('id');
		   },
		   }); 
		});
		
		$("#CompareReportsForm").checkFormvalidation();
	});
	
	$.fn.checkFormvalidation	=	function(){
		
		var $form	=	$(this),
			form	=	this,
			$saveBtn	=	$("#SaveReportBtn"),
							
							
			chaeckForm	=	function()
							{
								
								if(this.title.value ==	'')
								{
									this.title.focus();
									FlashMessage('Please Enter A Valid Script Title');
									return false;
								}
								
								
								
								if(this.template.value == 0)
								{
									this.template.focus();
									FlashMessage('Please Select A Template');
									return false;
								}
								
								if($('select[name="script"]').val() ==	'0')
								{
									$('select[name="script"]').focus();
									FlashMessage('Please Select A Script');
									return false;
								}
								
								if($form.find('input[type="checkbox"]:checked').length < 2)
								{
									FlashMessage('Please select at least two Reports to Compare');
									return false;
								}
								
								if($form.find('input[type="checkbox"]:checked').length > 5)
								{
									FlashMessage('Please select only 5 Reports to Compare');
									return false;
								}
								return true;
							};
			
			$("#template").bind('change',function(){
				
				if($(this).val() != 0)
				{
				$.ajax({
					type:"post",
					data:"template_id=" + $(this).val(),
					url:BASEURL + "/myaccount/script-reports/" + $(this).val() + "/getReportForCompare",
					headers:{'X-CSRF-TOKEN':TOKEN},
					beforeSend:function()
					{
						$("#reportForComapre").html("").animate({
							'min-height':'250px'
						},200).addClass("loadinganimation").addClass("animating"); 
					},
					complete:function()
					{
						$("#reportForComapre").animate({
							'min-height':'10px'
						},200).removeClass("loadinganimation").removeClass("animating"); 
					},
					success:function(data)
					{
						$("#reportForComapre").html(data);
						$("#reportForComapre").find('input[type="checkbox"]').each(function(index, element) {
                            $(this).convertCheckBox();
                        });
					},
					error:function()
					{
						FlashMessage('Error in Request. Please Try Again Letter.');
					}
				});
				}
				else
				{
					$("#reportForComapre").html('<div class="Box pul10"><h4>Please Select a Template first.</h4></div>');
				}
			})
			
			$form.submit(function(event){
				
				if(chaeckForm())
				{
					return;
				}
				else
				{
				  event.preventDefault();
				}
				
			});
		
	}
	
	
})(jQuery);

function setTaskVariables(object){
	$this	=	$(object);
	$newTab	=	$this.data("task");
	$ul	=	$this.parent();
	$checkbox	=	$ul.parent().parent().find("span.ul-checkbox");
	$id	=	$ul.data('id');
	$item	=	$("#reports"+$id);	
	$liUnarchived	=	$ul.find('li[data-task="unarchived"]');
	$liArchived	=	$ul.find('li[data-task="archived"]');
}

function CommanLiTask(object){
	setTaskVariables(object);
	$checkbox.trigger('click');
	
}

function checkforitems(){
	var lenth	=	parseInt($('div.reports[data-tab="'+ActiveTab+'"]').length);
	if(lenth < 1){
		$('div.item-box').hide();
		$(".no-records").show();
	}else{
		$(".no-records").hide();
		ShowItems();
	}
}
function ShowItems(){	
	var CssClass;
	switch(SortBy)
	{
		case 'reader':
		CssClass	=	'reader';
		break;
		
		case 'client':
		CssClass	=	'client';
		break;
		
		case 'all':		
		case 'sort-by':
		default:
		CssClass	=	'reports';
		break;
	}
		
	$('div.' + CssClass + '[data-tab="'+ActiveTab+'"]').show();
	
	if(ActiveTab != 'completed'){
		$('div.reports[data-tab="completed"]').hide();
	}
	
	if(ActiveTab != 'progress'){
		$('div.reports[data-tab="progress"]').hide();
	}
		
	if(ActiveTab != 'archived'){
		$('div.reports[data-tab="archived"]').hide();
	}
	if($('div.' + CssClass + '[data-tab="'+ActiveTab+'"]').length == 0){
		$(".no-records").hide();
	}
}

function chagestauts(stauts,onsuccess){
	$.ajax({
			url:BASEURL+'/myaccount/script-reports/change-status',
			method:'post',
			headers: {'X-CSRF-TOKEN': TOKEN},
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


function SortByFun(value)
{
	SortBy	=	value;
	switch(SortBy)
	{
		case 'reader':
			$('div.client[data-tab="'+ActiveTab+'"]').hide();
		break;
		
		case 'client':
			$('div.reports[data-tab="'+ActiveTab+'"]').hide();
			$('div.reports[data-tab="'+ActiveTab+'"]').hide();
		break;
		
		case 'all':		
		case 'sort-by':
		default:
		CssClass	=	'reports';
		break;
	}
	ShowItems();
}


function showPrivateNotes(id)
{	
var form 	=	document.getElementById('privateNoteForm');
	form.report_id.value	=	id;
	
	$.ajax({
		url:BASEURL+'/myaccount/get-pv-notes',
		method:'post',
		headers: {'X-CSRF-TOKEN': TOKEN},
		data:'id=' + id + '&type=report',
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


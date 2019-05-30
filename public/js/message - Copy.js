// JavaScript Document
(function($){
		var $messageBox,
			$overlayer,
			$button,
			$popUp;
			
	$.fn.sendMessagePopUp	=	function(options){
		
		
		var setting	=	$.extend({
			width:980,
			height:500,
			wWidth:parseInt($(window).width()),
			wHeight:parseInt($(window).height()),
			overlayerMarkup:"<div></div>",
			overlayerId:"message-overlayer",
			oberLayerDefaultCss:{'height':'0px',
															'width':'0px',
															'opecity':0,
															'background-color':'rgba(35, 54, 73, 0.5)',
															'position': 'fixed',
															'z-index': 100,},
			clicker:"send-message-btn",
			speed:300,
			beforeOpen:function(){ return; },
			},options);
		
			$overlayer	=	$(setting.overlayerMarkup).attr('id',setting.overlayerId).appendTo('body')
			.css(setting.oberLayerDefaultCss)
														.css({
															
															'left':Math.ceil(setting.wWidth / 2) + 'px',
															'top':Math.ceil(setting.wHeight / 2) + 'px',
														});
			$messageBox	=	$(this);
			
			
			
			$messageBox.css({
				
					'position':'fixed',
					'left':Math.ceil((setting.wWidth - setting.width) / 2 ) + 'px',
					'top':Math.ceil((setting.wHeight - setting.height) / 2) + 'px',
					//'bottom':'20px',
					'z-index':150,
					'width':setting.width + 'px',
			})
							
			$button	=	$("#" + setting.clicker);		
			
			//binding events		
			$button.click(function(){
				setting.beforeOpen();
				$('body').css('overflow','hidden');
				setting.wWidth	=	$(window).width();
				setting.wHeight	=	$(window).height();
				
				$overlayer.show().animate({
					'height':setting.wHeight + 'px',
					'width':setting.wWidth + 'px',
					'left':'0px',
					'top':'0px',
					'opacity':1
				},setting.speed);
				
				$messageBox.addClass('activate').fadeIn( setting.speed )
				
				
			})
			
			$overlayer.click(function(){
				$overlayer.animate({
					'left':Math.ceil(setting.wWidth / 2) + 'px',
					'top':Math.ceil(setting.wHeight / 2) + 'px',
					'width':'0px',
					'height':'0px',
				},setting.speed)
				$messageBox.fadeOut( setting.speed );
				$('body').css('overflow','auto');
			});
			
			$(window).resize(function(){
				setting.wWidth	=	$(window).width();
				setting.wHeight	=	$(window).height();
			});
			
			
			
			
	}
	
})(jQuery);


(function($){
	
	
	$.fn.templateList	=	function(options){
		
		var settings	=	$.extend({
								title:'Template',
								liclass:'.user-templates',
								inputName:'template_id',
								bgClass:'bg-add-template',
							},options);
		
		var $addTemplate,templateH = false, $seletedli = false;
		
		$addTemplate	=	$(this).find(".btn");
		
		var openTemplates	=	function(){
			var $list	=	$(this).parent().find(settings.liclass);
			templateH	=	(!templateH) ? $list.outerHeight() : templateH; 
			
			$list.css({'top':'0px','height':'0px','overflow':'hidden'}).show().animate({'top':'-' + templateH + 'px','height':templateH + 'px'});
			$addTemplate.unbind('click',openTemplates);
			$addTemplate.bind('click',CloseTemplates);
		};
			
		var CloseTemplates	=	function(){
			var $list	=	$(this).parent().find(settings.liclass);
			$list.animate({'top':'0px','height':'0px'});
			
			$addTemplate.bind('click',openTemplates);
			$addTemplate.unbind('click',CloseTemplates);
		};
		
		
		
		
		
		var $crossBtn	=	$("<i></i>").addClass("fa fa-times closeBtn");
		var $close2	=	$("<i></i>").addClass("fa fa-times closeBtn");
		
		var Liselect	=	function(){
			$(this).css({'background-color':'#6DBCDB','color':'#fff'});
			
			if($seletedli)
			{
				$seletedli.trigger('click');
				$seletedli	=	$(this);
			}
			else
			{
				$seletedli	=	$(this);
			}
			
			var span	=	$("<span></span>").html($(this).data('title')).css({'display':'block','float':'left'});
			
			$('input[name="' + settings.inputName +'"]').val($(this).data('id'));
			
			$(this).append($crossBtn);
			$(this).unbind('click',Liselect);
			$(this).bind('click',LiDeselect);
			$addTemplate.html("").append(span).css({ 'color':'#fff','background-color':'#6DBCDB','width':'100%' })
			.removeClass(settings.bgClass)
			.addClass(settings.bgClass + '-wh');
			
			$close2.appendTo($addTemplate).click(function(){
				$seletedli.trigger('click');
			})
			$addTemplate.trigger('click');
		}
		
		var LiDeselect	=	function(){
			$(this).css({'background-color':'#D9D9D9','color':'#233649'});
			$crossBtn.remove();
			
			$seletedli	=	false;
			$('input[name="' + settings.inputName +'"]').val("");
			$(this).bind('click',Liselect);
			$(this).unbind('click',LiDeselect);
			$addTemplate.html(settings.title).css({ 'color':'#233649','background-color':'#fff','width':'auto' }).addClass(settings.bgClass)
			.removeClass(settings.bgClass + '-wh');;
			$close2.remove();
		}
		
		$addTemplate.bind('click',openTemplates);
		
		$(this).find("li").each(function(index, element) {
            $(this).bind('click',Liselect);
        });
		
	};
	
	$.fn.ToggaleFunction	=	function(options){
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
	
	$.fn.cancelSelction	=	function(options){
		var $closeBtn, $li,$ul, id, $input, val,$mainWr, values	=	[];
		var settings	=	$.extend({
			name:'document_id',
			counter:'doc-count',
			Defaultclass:'bg-add-docs'
							},options);
		$closeBtn	=	$(this);
		$li			=	$closeBtn.parent();
		$ul			=	$li.parent();
		$mainWr		=	$ul.parent().parent();
		id			=	parseInt($li.data('id'));
		$input		=	$('input[name="' + settings.name + '"]')
		val			=	$input.val();
		values		=	val.split(',');
		
		values	=	values.map(function(a){ return parseInt(a); });
		
		var changeValue	=	function(){
			var index	=	values.indexOf(id);
			values.splice(index,1);
			
			if(values.length > 0)
			{
				$input.val(values.join(','))
			}
			else
			{
				$input.val('');
			}
			
			$li.remove();
			
			var lenght	=	parseInt($ul.find("li").length);
			if(lenght != 0)
			{			
				$("#" + settings.counter).html("<i class=\"fa fa-arrow-up\"></i>(" + lenght + ")");
			}
			else
			{
				$mainWr.attr('style','')
				$mainWr.find(".btn").removeClass(settings.Defaultclass + "-wh").addClass(settings.Defaultclass);
				$("#" + settings.counter).trigger('click').remove();
			}
				
		}
		
		$closeBtn.bind('click',changeValue);
	}
	
})(jQuery);


$(document).ready(function(e) {
	$("#send-message").sendMessagePopUp();
	$("#add-template").templateList();
	$("#add-script").templateList({title:'scriptPac',
								liclass:'.user-scripts',
								inputName:'script_id',
								bgClass:'bg-add-script',});
	$("#add-my-docs .btn").fancybox({'type':'iframe','href':BASEURL + '/myaccount/script-manager/my-documents/iframe?script=message.js','padding':0,minHeight:500,});
	
	$("#add-my-docs").bind("cselect",DocsSelected);
});

function DocsSelected(){
	
	
	var $btnWr	=	$("#add-my-docs");
	
	if($btnWr.find("#doc-count").length == 0){
	
		var $tgbtn	=	$("<div></div>").attr('id','doc-count').addClass('right').css({"background-color":"#fff","margin":"3px","padding":'3px 5px','border-radius':'5px','cursor':'pointer','color':'#6DBCDB','font-weight':'bold'});
		
		$btnWr.css({'background-color':'#6DBCDB','border-radius':'5px','color':'#fff'})
		
		$btnWr.find(".btn").removeClass("bg-add-docs").addClass('bg-add-docs-wh');
	}
	else
	{
		var $tgbtn	=	$btnWr.find("#doc-count");
	}
	var li	=	$btnWr.find("li").length;
	
	
	$tgbtn.html("<i class=\"fa fa-arrow-up\"></i>(" + li + ")");
	
	$btnWr.append($tgbtn);
	
	$tgbtn.ToggaleFunction({div:'.documents-list',heigthDiv:'.docs-list'});
	
	first	=	false;
	
	$btnWr.find("li").each(function(index, element) {
       var $crsbtn	=	$("<i></i>").addClass("fa fa-times closeBtn");
	   
	   $(this).append($crsbtn)
	   
	   $crsbtn.cancelSelction({name:'document_id',counter:'doc-count',Defaultclass:'bg-add-docs'});
    });
	
	
}

var UploadCount	=	1;
function attachfileSelect(e){
	$li	=	$("<li></li>").append(e.target.files[0].name).attr('data-id',UploadCount);
	$(".uploaded-list").append($li);
	
	
	
	var $btnWr	=	$("#upload-docs");
	
	var $btn	=	$btnWr.find(".btn");
	
	
	if($btnWr.find("#upload-count").length == 0){
	
		var $tgbtn	=	$("<div></div>").attr('id','upload-count').addClass('right').css({"background-color":"#fff","margin":"3px","padding":'3px 5px','border-radius':'5px','cursor':'pointer','color':'#6DBCDB','font-weight':'bold'});
		
		$btnWr.css({'background-color':'#6DBCDB','border-radius':'5px','color':'#fff'})
		
		$btnWr.find(".btn").removeClass("bg-clip").addClass('bg-clip-wh');
	}
	else
	{
		var $tgbtn	=	$btnWr.find("#upload-count");
	}
	
	UploadCount	= UploadCount + 1;	
	
	
	$("#FilesDiv").append("<input type=\"file\" name=\"attach_file[]\" onchange=\"attachfileSelect(event)\" id=\"fileBtn"+UploadCount+"\" accept=\"application/pdf\" class=\"uploadbutton\">");
	
	$btnWr.find(".btn").attr("onclick","javascript:$('#fileBtn" + UploadCount + "').trigger('click')");
	
	var li	=	$btnWr.find("li").length;
	$tgbtn.html("<i class=\"fa fa-arrow-up\"></i>(" + li + ")");
	
	$btnWr.append($tgbtn);
	
	$tgbtn.ToggaleFunction({div:'.upload-list',heigthDiv:'.uploaded-list'});
	
	 var $crsbtn	=	$("<i></i>").addClass("fa fa-times closeBtn");
	   
	 $li.append($crsbtn)
	 
	$crsbtn.click(function(){
		var $liO, $InPut, LiId,$ulO, liLenght;
		LiId 	=	$(this).data('id');
		$liO	=	$(this).parent();
		$ulO	=	$liO.parent();
		$liO.remove();
		$InPut	=	$("#fileBtn"+ LiId).remove();
		liLenght	=	parseInt($ulO.find("li").length);
		if(liLenght == 0)
		{
			$("#upload-count").trigger('click');
			$("#upload-count").remove();
			$("#upload-docs").attr('style','');
			$("#upload-docs").find('.btn').removeClass('bg-clip-wh').addClass('bg-clip');
		}
		else
		{
			$("#upload-count").html("<i class=\"fa fa-arrow-up\"></i>(" +  + ")");
		}
		
	})
	
}
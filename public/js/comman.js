// JavaScript Document

(function($){
	$(document).ready(function(){
		
	$(window).scroll(function(){
		if ($(this).scrollTop() > 200) {
			$('.scrollToTop').fadeIn('slow');
		} else {
			$('.scrollToTop').fadeOut('slow');
		}
	});	
		//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
		
		//if($("body").width() > 786) $(".dash-profile").css({'height':($("body").height() - $('#footer-con').outerHeight())});
		
		$("ul.right-icon li.sprofilepop").click(function(){
			$("#sprofile-popup").slideToggle()
			return false;
		});
		
		$(".filebutton-label").click(function(){
			$(this).parent().find(".filebutton").trigger('click');
		});
		
		//fancybox
		$(".fancybox-inline").fancybox({
			padding:0,
		});
		
				
		$(".ul-checkbox").click(function(){
			$this	=	$(this);
			$taskdiv	=	$this.parent().find(".task-div");
			
			if($this.hasClass('fa-square-o')){
				$this.removeClass('fa-square-o')
					.addClass('fa-check-square-o')
					.css({color:'#000'});
				
				$taskdiv.show( 500 ).css({'z-index':99999});
				
			}else{
				$this.removeClass('fa-check-square-o')
					.addClass('fa-square-o')
					.css({color:'#D9D9D9'});
					
				$taskdiv.hide( 500 );
			}
			
			
		});
		
		
		$("input[type=\"checkbox\"]").each(function(index,ele){
			var $lbl	=	$("<span></span>").addClass('checkbox fa');
			var $ch	=	$(this);
			
			$(this).hide();
			
			if($(this).is(':checked'))
			{
				$lbl.addClass('fa-check-square-o').insertBefore($(this)).css({'color':'#000'});
			}
			else
			{
				$lbl.addClass('fa-square-o').insertBefore($(this));
			}
			
			$lbl.click(function(){
				var $this	=	$(this);
					
				if($this.hasClass('fa-square-o'))
				{
					$this.removeClass('fa-square-o')
						.addClass('fa-check-square-o')
						.css({color:'#000'});				
					
				}
				else
				{
					$this.removeClass('fa-check-square-o')
						.addClass('fa-square-o')
						.css({color:'#D9D9D9'});
				}
				
				$ch.trigger('click');			
			});
		});
		
		
		

		$("input[type=\"reset\"]").click(function() { 
			$('#add-template-form').resetForm()
		});
		
		
	});
	
	$.fn.notificationPopUp		=	function(options)
	{
		var settings	=	$.extend({div:'#srequestnotification-popup',ids:'0',count:0},options);
		var $div	=	$(settings.div),
		$this	=	$(this),
		ajaxRun	=	true,
		show	=	function(){
						$div.addClass('show');
						 count = 1;
						 $(window).bind('click',clickF);
						 $this.unbind('click',show);
						 
						 if(settings.count > 0 && ajaxRun)
						 {
							 $.ajax({
								 method:'post',
								 url:BASEURL + '/myaccount/read-notification',
								 headers:{'X-CSRF-TOKEN':TOKEN},
								 data:'ids='+settings.ids,
								 success:function(){
									 $this.find("span").fadeOut( 300 );
									 ajaxRun	=	false;									 
								 }
							 });
						 }else
						 {
							 $div.find(".unread").removeClass("unread");
						 }
					 },
		count = 1,
		clickF	=	function(event){
											if(count == 1){ count++; return false;}
											var divPos	= $div.offset(),
												left = event.pageX - divPos.left,
							 	   				top = event.pageY - divPos.top;
												
												 if(left < 0 || left > $div.outerWidth() || top < 0 || top > $div.outerHeight()){
													   $div.removeClass('show');
														$(window).unbind('click',clickF);
														$this.bind('click',show);
														
														return false;
												  }
												  
										 };
										 
		
		$this.bind('click',show);
	}
	
	
	$.fn.convertCheckBox	=	function(){
		var $lbl	=	$("<span></span>").addClass('checkbox fa');
		var $ch	=	$(this);
		$ch.hide();
		if($(this).is(':checked'))
		{
			$lbl.addClass('fa-check-square-o').insertBefore($(this)).css({'color':'#000'});
		}
		else
		{
			$lbl.addClass('fa-square-o').insertBefore($(this));
		}
		
		$lbl.click(function(){
			var $this	=	$(this);
				
			if($this.hasClass('fa-square-o'))
			{
				$this.removeClass('fa-square-o')
					.addClass('fa-check-square-o')
					.css({color:'#000'});				
				
			}
			else
			{
				$this.removeClass('fa-check-square-o')
					.addClass('fa-square-o')
					.css({color:'#D9D9D9'});
			}
			
			$ch.trigger('click');			
		});
	}
	
	$.fn.AnimateSlideUp	=	function(options)
	{
		var settings	=	$.extend({
									div:'',
									on:'click',
									align:'right',
									width:300,
									},options);
									
									
		var $btn	=	$(this);
		var	$div	=	$(settings.div);
		var	position	= $btn.offset();
		var count	=	1;
		
		
		$div.css({ 
			position:'fixed',
			width:settings.width,
			'z-index':9999,
			'background-color':'#ffffff',
			})
		
		
		var setPosition	=	function(){
			if(settings.align == 'left')
			{
				if((position.left - settings.width - 5) > 0)
					$div.css('left',(position.left - settings.width - 5));
				else
					$div.css('left',(position.left + $btn.outerWidth() + 5 ))			
			}
			else
			{			
				if((position.left + $btn.outerWidth() + settings.width + 5) < $(window).outerWidth())
					$div.css('left',(position.left + $btn.outerWidth() + 5 ))
				else
					$div.css('left',(position.left - settings.width - 5));
			}
			
			setTop();
		};
		
		var setTop	=	function(){ 
				$div.css('top',position.top - ($div.outerHeight()/3) - $(window).scrollTop()) 			
		}
		
		var Onclick	=	function( event ) {
				if(count == 1){ count++; return; } 
				var divPos	= $div.offset(); 
				var left = event.pageX - divPos.left,
				   top = event.pageY - divPos.top;
				   				   
				   if(left < 0 || left > settings.width || top < 0 || top > $div.outerHeight()){
					   $div.removeClass('show');
					    $( document ).unbind( "click",Onclick );
				   }				   
			};
	
				
		$btn.click(function(){
			position	= $btn.offset();			
			setPosition();
			
			$div.addClass('show');
			count = 1;
			$( document ).bind( "click",Onclick );
		})
		
		$(window).scroll(function(){
			setTop();
		});
	}
	
	
	$.fn.ShowUpClick	=	function(options)
	{
		var settings	=	$.extend({
									div:'',
									},options);
									
									
		var $btn	=	$(this);
		var	$div	=	$(settings.div);
		var	position	= $btn.offset();
		var count	=	1;
		
		var Onclick	=	function( event ) {
				if(count == 1){ count++; return; } 
				var divPos	= $div.offset(); 
				var left = event.pageX - divPos.left,
				   top = event.pageY - divPos.top;
				   				   
				   if(left < 0 || left > $div.outerWidth() || top < 0 || top > $div.outerHeight()){
					   $div.removeClass('show');
					    $( document ).unbind( "click",Onclick );
				   }				   
			};
				
		$btn.click(function(){
			position	= $btn.offset();
			$div.addClass('show');
			count = 1;
			$( document ).bind( "click",Onclick );
		})
	}
		
	$.fn.favorite	=	function(options){
		var settings	=	$.extend({
							id:false,
							type:false,
							},options);
							
		var $btn	=	$(this),		
			$i	= $('<i class="fa fa-spin fa-spinner fa-pulse"></i>').css({
						'font-size': '15px',
						'left': '19px',
						'position': 'absolute',
						'top': '9px'
					})
		$btn.bind('click',function(){
			
			if(!settings.id || !settings.type) return false;
			
			$.ajax({
				method:'post',
				url:BASEURL+'/myaccount/favorites/create',
				data:'type='+ settings.type +'&id=' + settings.id,
				headers:{'X-CSRF-TOKEN':TOKEN},
				beforeSend:function(){						
					$btn.removeClass('bg-favorite').addClass('btn disabled').css({
						'position':'relative',
						'line-height':'20px'
					}).append($i);
				},
				complete:function(){
					$i.remove();
					$btn.addClass('bg-favorite').removeClass('btn disabled').css({
						'line-height':'32px'
					})
				},
				success:function(data){
					
					if(data.status == 'ok')
					{
						var $check	= $('<i class="fa fa-check"></i>').css({'font-size':'20px','position':'absolute','top':'9px','right':'10px'});
						$btn.addClass("relative").append($check);
						FlashMessage(data.msg,true);
					}
					else if(data.status == 'remove')
					{
						$btn.find('.fa-check').remove();
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
		});
	};
	
	
	$.fn.contact	=	function(options){
		var settings	=	$.extend({
							id:false,
							},options);
							
		var $btn	=	$(this),		
			$i	= $('<i class="fa fa-spin fa-spinner fa-pulse"></i>').css({
						'font-size': '15px',
						'left': '19px',
						'position': 'absolute',
						'top': '9px'
					})
		$btn.bind('click',function(){
			
			if(!settings.id) return false;
			
			$.ajax({
				method:'post',
				url:BASEURL+'/myaccount/contacts/'+ settings.id + '/add/' + userId,
				headers:{'X-CSRF-TOKEN':TOKEN},
				beforeSend:function(){				
					$btn.removeClass('fa-user-plus').addClass('btn disabled').css({
						'position':'relative',
						'line-height':'20px'
					}).append($i);
				},
				complete:function(){
					$i.remove();
					$btn.addClass('fa-user').removeClass('btn disabled').css({
						'line-height':'32px'
					})
				},
				success:function(data){
					console.log(data);
					
					if(data.status == 'ok')
					{
						var $check	= $('<i class="fa fa-check"></i>').css({'font-size':'16px','position':'absolute','top':'8px','right':'7px'});
						$btn.addClass("relative").append($check);
						FlashMessage(data.msg,true);
						settings.id	=	false;
						var count=1;
						$btn.bind('click',function(){
							if(count == 1){ count++; return; }
							FlashMessage('Contact request already sent')
						})
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
		});
	};
	
	
	$.fn.setRequestResult	=	function(options){
		var settings	=	$.extend({
							request_id:false,
							decline:false,
							result:false,
							position:'middle',
							},options);
		
		var $btn	=	$(this),
			$dBtn	=	$("#"+ settings.decline),
			$i	= $('<i class="fa fa-spin fa-spinner fa-pulse"></i>').css({
						'font-size': '15px',
						'left': '19px',
						'position': 'absolute',
						'top': '9px'
					})
		$btn.bind('click',function(){ 
			console.log(settings);				
			if(!settings.request_id) return false;
			
			$.ajax({
				method:'post',
				url:BASEURL+'/myaccount/message/setRequestReqsult',
				data:'request_id=' + settings.request_id + '&result=' + settings.result,
				headers:{'X-CSRF-TOKEN':TOKEN},
				beforeSend:function(){						
					$btn.addClass('disabled').css({
						'position':'relative',
						'line-height':'20px'
					}).append($i);
				},
				complete:function(){
					$i.remove();
				},
				success:function(data){
					console.log(data);
					
					if(data.status == 'ok')
					{
						if(settings.result=='accepted'){
							if(settings.position=='top'){
								$("#declineRequest_"+settings.request_id).remove();
								$("#acceptRequest_"+settings.request_id).html('Accepted');
							}else{
								$("#declineRequest").remove();
								$("#acceptRequest").html('Accepted');
							}
						}else{
							if(settings.position=='top'){
								$("#acceptRequest_"+settings.request_id).remove();
								$("#declineRequest_"+settings.request_id).html('Declined');	
							}else{
								$("#acceptRequest").remove();
								$("#declineRequest").html('Declined');
							}
						}
						
						
						//var $check	= $('<i class="fa fa-check"></i>').css({'font-size':'16px','position':'absolute','top':'8px','left':'7px'});
						$btn.addClass("fa-check");
						FlashMessage(data.msg,true);
						settings.id	=	false;
						var count=1;
						$btn.bind('click',function(){
							if(count == 1){ count++; return; }
							FlashMessage('Contact request already sent')
						})
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
		});
	};
	
})(jQuery);


function FlashMessage(msg,type){
	var bgcolor, iconclass, $msgDiv , halfWidth , selftHalfWidth;
	
	iconclass	=	(type) ? 'flashMsg fa-check-circle-o' : 'flashMsg fa-times-circle';
	
	bgcolor	=	(type) ? '#3c763d' : '#a94442';
	
	halfWidth	=	parseInt($("body").width()) / 2;
	
	if($(".flashMsg").length == 0)
	{
		$msgDiv	=	$("<div></div>")
						.html(msg)
						.hide()
						.appendTo('body')
						.addClass(iconclass);
		
		selftHalfWidth	=	parseInt($msgDiv.width()) / 2;
		
		$msgDiv.css({
			'background-color':bgcolor,
			'left': (halfWidth - selftHalfWidth)
		})
		
	}
	else
	{
		$msgDiv	=	$(".flashMsg");
		$msgDiv.html(msg);
		
		selftHalfWidth	=	parseInt($msgDiv.width()) / 2;
		
		$msgDiv.css({
			'background-color':bgcolor,
			'left': (halfWidth - selftHalfWidth)
		})
	}
	
	$msgDiv.fadeIn( 500 ).delay( 4000 ).fadeOut( 300 );
}

function fileSelect(id, e){
	$("#"+id).val(e.target.files[0].name);
	$("#"+id).trigger('change');
}

function fileSelectPdf(id, event){
	if(event.target.files[0].type	==	"application/pdf")
	{
		$("#"+id).val(event.target.files[0].name);
	}
	else
	{
		FlashMessage('File Not Valid. Please choose a Pdf File.',false)
	}
}

function IsNumeric(evt) {
	var theEvent = evt || window.event;
	
	var key = theEvent.keyCode || theEvent.which;
	
	key = String.fromCharCode(key);
	
	if (key.length == 0) return;
	
	var regex = /^[0-9.\b]+$/;
	if (!regex.test(key)) {
		theEvent.returnValue = false;
		if (theEvent.preventDefault) theEvent.preventDefault();
	}
}

function FormList(){

	return	[
			'Select Form',		
			'Book',
			'Branded Entertainment',
			'Feature Film',
			'New Media',
			'Play',
			'Short',
			'TV',
			'TV Series',
			'TV Pilot',
			'Video Game',
			'Webisode',
			'Other'
		];
}



function getFormSelectInput(name,attr){
	var options	=	FormList();
	var input	=	"<select name=\""+name+"\""  + attr + " >";
	options.forEach(function (value,index){
		if(value == 'Select Form'){
			input	+=	"<option value=\"0\" >" + value + "</option>";
		}else{
			input	+=	"<option value=\"" + value + "\" >" + value + "</option>";
		}
		
	});
	
	input	+=	"</select " + attr + " >";
	
	return input;
}


function checkOhter(event)
{ 
	var $target	=	$(event.target);
		name	=	$target.attr('name');
		newName	=	name.substr(0,(name.length - 3));
		type	=	"form";
		
		
		if(name.includes("form"))
			type	=	"Form";
		else if(name.includes("subgenre"))
			type	=	"Subgenre";
		else if(name.includes("genre"))
			type	=	"Genre";		
		else if(name.includes("category"))
			type	=	"Category"
		
		//console.log($("select[name='"+name+"']").val());
		if($("select[name='"+name+"']").val() == "Other")
		{ 
			
			$("select[name='"+name+"']").parent().append('<input type="text"  name="' + newName + '[1]" placeholder="Please enter your '+ type +' title here" class="text textInput it mrgtp8 ' + type.toLowerCase() + '">');
		}
		else
		{
			if($("select[name='"+name+"']").parent().find("."+type.toLowerCase()).length)
			{
				$("select[name='"+name+"']").parent().find("."+type.toLowerCase()).remove();
			}
		}
}


// JavaScript Document
(function($){
	$.fn.PasswordHint	=	function(options){
		var settings	=	$.extend(options,{
				msg1	:	" Use at least 9 characters.",
				msg2	:	" A numeric value",
				msg3	:	" A Capital Letter",
			});
		var 
			$Wr			=	$("<div></div>").addClass('hint-wrapper'),
			
			$result		=	$("<span></span>"),
			$p			=	$("<p></p>").appendTo($Wr),
			$strong			=	$("<strong></strong>").html("Password Strength :" ).append($result).appendTo($p),
			
			$bar		=	$("<div></div>").addClass('bar'),			
			$barWr		=	$("<div></div>").addClass('progress-bar').append($bar).appendTo($Wr),
			
			$lstatus	=	$("<i></i>").addClass("fa fa-times"),
			$Cstatus	=	$("<i></i>").addClass("fa fa-times"),
			$Nstatus	=	$("<i></i>").addClass("fa fa-times"),
			
			$ul			=	$("<ul></ul>").appendTo($Wr),
			$plength	=	$("<li></li>").append($lstatus).append(settings.msg1).appendTo($ul),
			$oneNumeric	=	$("<li></li>").append($Nstatus).append(settings.msg2).appendTo($ul),
			$oneCapital	=	$("<li></li>").append($Cstatus).append(settings.msg3).appendTo($ul),
			
			position	=	$(this).position(),
			height		=	$(this).outerHeight();
			
			$Wr.appendTo($(this).parent()).css({
					'top':position.top + height + 10,
					'left':position.left + 30,
					});
			
			
			
			var checkStrength 	=	function (password){
				var strength = 0
				strength		=	parseInt(password.length);
				
				if (password.length >= 9) {		
					$lstatus.removeClass('fa-times').addClass('fa-check');
					$plength.css('color','rgb(90,180,90)');
				}
								
				if (password.match(/([A-Z])/)){
					strength += 4;
					$Cstatus.removeClass('fa-times').addClass('fa-check');
					$oneCapital.css('color','rgb(90,180,90)');
				}else{
					$Cstatus.addClass('fa-times').removeClass('fa-check');
					$oneCapital.css('color','red');
				}
				
				if (password.match(/([0-9])/)) {
					strength += 4 ;
					$Nstatus.removeClass('fa-times').addClass('fa-check');
					$oneNumeric.css('color','rgb(90,180,90)');
				}else{
					$Nstatus.addClass('fa-times').removeClass('fa-check');
					$oneNumeric.css('color','red');
				}
				
				
				//if it has one special character, increase strength value
				if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 2
				
				//if it has two special characters, increase strength value
				if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 2
				
				//now we have calculated strength value, we can return messages
				
				if (password.length < 9){
					$lstatus.addClass('fa-times').removeClass('fa-check');
					$plength.css('color','red');
					return Passresult('Too short', strength) ;
				}
				
				
				if(!password.match(/([0-9])/) && !password.match(/([A-Z])/)){
					return Passresult('Poor', strength) ;
				}
				
				if (strength < 10 )
				{
					return Passresult('Weak', strength);			
				}
				else if (strength == 13 )
				{
					
					return Passresult('Good', strength) ;
				}
				else
				{var width	=	(5 * strength);	
				red	=	90;
					gr	=	180;
					bl	=	90;
					$bar.css({'width':width+'%','background':'rgb('+red+','+gr+','+bl+')'});
					return 'Strong';
				}
				
				
			}
			
			var Passresult	=	function (msg, strength){
				var width	=	(5 * strength);
					var red	=	260 - (13 * strength);
				var gr	=	(13 * strength);
				var bl	=	0;
				$bar.css({'width':width+'%','background':'rgb('+red+','+gr+','+bl+')'});
				return msg;
			}
			
			
			$(this).bind('focus',function(event){	
				$result.html(checkStrength(event.target.value));
				$Wr.addClass('show');
			});
			
			$(this).bind('keyup',function(event){
				$result.html(checkStrength(event.target.value));
			});
			
			$(this).bind('blur',function(event){
				$Wr.removeClass('show');
				$result.html(checkStrength(event.target.value));
			});
			
	}
	
	$.fn.sameInputValue	=	function(options){
		var settings	=	$.extend(options,{
				Inputname	:	"password",
				name	:	"Passwoed",
				msg		:	" It must match with " ,
			}),
		$input	=	$('input[name="'+ settings.Inputname +'"]');
		
		$Wr			=	$("<div></div>").addClass('hint-wrapper'),
			
		$result		=	$("<span></span>"),
		$p			=	$("<p></p>").appendTo($Wr),
		$strong			=	$("<strong></strong>").html("Password :" ).append($result).appendTo($p),
		
		
		$status	=	$("<i></i>").addClass("fa fa-times"),
		
		$ul			=	$("<ul></ul>").appendTo($Wr),
		$li	=	$("<li></li>").append($status).append(settings.msg + " " + settings.name).appendTo($ul),
		
		position	=	$(this).position(),
		height		=	$(this).outerHeight(),
		$submit		=	$('input[type="submit"]');
		
		$Wr.appendTo($(this).parent()).css({
				'top':position.top + height + 10,
				'left':position.left + 30,
				});
				
		var checkValue	=	function(password){
			if($input.val() == "" ) return "First Fill Password";
			
			if($input.val() == password ) {
				$status.removeClass('fa-times').addClass('fa-check');
				$li.css('color','rgb(90,180,90)');
				
				return "match";
				$submit.trigger();
			}
			else
			{
				$status.addClass('fa-times').removeClass('fa-check');
				$li.css('color','red');
				return "Did not Match";
				//return $input.val() + " == " + password;
			}
			
		}
				
		$(this).bind('focus',function(event){	
			$result.html(checkValue(event.target.value));
			$Wr.addClass('show');
		});
		
		$(this).bind('keyup',function(event){
			$result.html(checkValue(event.target.value));
		});
		
		$(this).bind('blur',function(event){
			$Wr.removeClass('show');
			$result.html(checkValue(event.target.value));
		});
	}
	
	$.fn.checkEmail	=	function( options ){
		var settings	=	$.extend(options,{
			}),
		$Wr			=	$("<div></div>").addClass('hint-wrapper'),
		$p			=	$("<p></p>").appendTo($Wr).css({'margin-bottom':'10px'}),
		$strong			=	$("<strong></strong>").appendTo($p),
		old_value	=	$(this).val(),
		$profileWr	=	$("<div></div>").appendTo($Wr),
		$submit		=	$('input[type="submit"]'),
		
		position	=	$(this).position(),
		height		=	$(this).outerHeight();
		
		$Wr.appendTo($(this).parent()).css({
				'top':position.top + height + 10,
				'left':position.left + 30,
				});
		
		$(this).bind('keyup',function(event){
			if(old_value != event.target.value) checkEmail(event.target.value);		
		});
		
		$(this).bind('past',function(event){
				if(old_value != event.target.value) checkEmail(event.target.value);		
		});
		
		$(this).bind('change',function(event){
				if(old_value != event.target.value) checkEmail(event.target.value);	
		});
		
		function checkEmail(value)
		{
			old_value	=	value;
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(!regex.test(value)){
				$strong.html('Please Enter A Valid Email Address').css('color','red');
				$Wr.addClass('show');
				$profileWr.html("");
				return;	
			}
			else
			{
				$Wr.removeClass('show');
				$.ajax({
					type:'post',
					headers:{'X-CSRF-TOKEN':TOKEN},
					method:'post',
					url:BASEURL+'/user/search',
					data:'email='+value,
					error:function(){
						return {"status":"fail","type":"error","msg":"Error In Request"}
					},
					success:function(data){
						if(data.status == "ok")
						{
							if(data.user)
							{
								if(!data.isSelf)
								{	
									
									var html	= "<div class=\"col-1-4 thumbnail small70 mrgrt15\">" + data.img + "</div>" + 
													"<div class=\"left\"><a href=\""+ data.link +"\"><h5>" + data.name + "</h5></a></ br>"+
													"<p style=\"text-align:left;font-size:13px\">Please Try Diffrent One</p></div>";
									$strong.html("This Email is Already Taken By").css('color','black');
									$profileWr.html(html)
									$Wr.addClass('show');
									
								}
								else
								{
									$Wr.removeClass('show');
									$profileWr.html("");
								}	
							}
							else
							{
								$Wr.removeClass('show');
								$profileWr.html("");
							}
						}
						else
						{
							$strong.html(data.msg).css('color','red');
							$Wr.addClass('show');
							$profileWr.html("");
						}
					}
				});
			}
		}
		
	}
	

})(jQuery)




$(document).ready(function(e) {
    $('input[name="password"]').PasswordHint();
	$('input[name="confirm_password"]').sameInputValue();
	$('input[name="email"]').checkEmail();
	
});
// JavaScript Document
(function($){
	$(document).ready(function(){
		tinymce.init({
			selector: 'textarea.SimpletinyText', 
			toolbar: 'bold italic | fontsizeselect | spellchecker ',
			plugins: 'spellchecker,autoresize',
			menubar:false,
			statusbar:false,
			browser_spellcheck: true,
			spellchecker_rpc_url:'spellchecker.php',
		});
		
		
		$("#add_barBtn").click(function(){
			var $wrp,$checkbox,$checkboxWrp,$chlbl,$input,$inputWrp,$dlbtn
			
			$checkbox	=	$('<input type="checkbox" value="" name="bar_graphs[other][]" checked="checked">').hide();
			$input	=	$('<input type="text" class="otherinput" />');
			$dlbtn	=	$('<span class="delete_btn mrg10"><i class="fa fa-trash"></i></span>');
			$chlbl	=	$("<span></span>").addClass("checkbox fa fa-check-square-o").css('color','#000');
			$checkboxWrp	=	$("<div></div>").addClass('left').append($checkbox).append($chlbl);
			$inputWrp	=	$("<div></div>").addClass('col-10-12 mrglft15').append($input);
			$wrp	=	$("<div></div>").addClass("col-1-1 mrgtp10 Box pul10 relative").append($dlbtn).append($checkboxWrp).append($inputWrp);			
			
			$input.on('keyup',function(){
				$checkbox.val($input.val());
			})
			$chlbl.click(function(){
				if($chlbl.hasClass('fa-square-o')){
					$chlbl.removeClass('fa-square-o')
						.addClass('fa-check-square-o')
						.css({color:'#000'});
				}
				else
				{
					$chlbl.removeClass('fa-check-square-o')
					.addClass('fa-square-o')
					.css({color:'#D9D9D9'});
				}
				$checkbox.trigger('click');
			})
			
			$dlbtn.click(function() {
				$wrp.remove();
			})
			
			$("#other_barGraph").append($wrp);			
		})
		
		
		$(".add_scriptInfoBtn").click(function(){
			var $wrp,$checkbox,$checkboxWrp,$chlbl,$input,$inputWrp,$dlbtn,$cntdiv
			
			$cntdiv		=	$(this).attr('data-id');
			$checkbox	=	$('<input type="checkbox" value="" name="script_info['+$cntdiv+'][]" checked="checked">').hide();
			$input	=	$('<input type="text" class="otherinput" />');
			$dlbtn	=	$('<span class="delete_btn mrg10"><i class="fa fa-trash"></i></span>');
			$chlbl	=	$("<span></span>").addClass("checkbox fa fa-check-square-o").css('color','#000');
			$checkboxWrp	=	$("<div></div>").addClass('left').append($checkbox).append($chlbl);
			$inputWrp	=	$("<div></div>").addClass('col-10-12 mrglft15').append($input);
			$wrp	=	$("<div></div>").addClass("col-1-1 mrgtp10 Box pul10 relative").append($dlbtn).append($checkboxWrp).append($inputWrp);			
			
			$input.on('keyup',function(){
				$checkbox.val($input.val());
			})
			$chlbl.click(function(){
				if($chlbl.hasClass('fa-square-o')){
					$chlbl.removeClass('fa-square-o')
						.addClass('fa-check-square-o')
						.css({color:'#000'});
				}
				else
				{
					$chlbl.removeClass('fa-check-square-o')
					.addClass('fa-square-o')
					.css({color:'#D9D9D9'});
				}
				$checkbox.trigger('click');
			})
			
			$dlbtn.click(function() {
				$wrp.remove();
			})
			
			$("#other-script_info_"+$cntdiv).append($wrp);			
		})
		
		///Ading Notes
		$("#add_notesBtn").click(function(){
			
			var $wrp,$checkbox,$checkboxWrp,$chlbl,$input,$inputWrp,$dlbtn, count = parseInt($(this).data('count'));
			
			$checkbox	=	$('<input type="checkbox" value="" name="notes[other]['+ count + '][]" checked="checked">').hide();
			$input	=	$('<input type="text" class="otherinput" />');
			$dlbtn	=	$('<span class="delete_btn mrg10"><i class="fa fa-trash"></i></span>');
			$chlbl	=	$("<span></span>").addClass("checkbox fa fa-check-square-o").css('color','#000');
			$checkboxWrp	=	$("<div></div>").addClass('left').append($checkbox).append($chlbl);
			$inputWrp	=	$("<div></div>").addClass('col-10-12 mrglft15').append($input);
			$wrp	=	$("<div></div>").addClass("col-1-1 mrgtp10 Box pul10 relative").append($dlbtn).append($checkboxWrp).append($inputWrp);			
			
			$textarea	=	$("<div class=\"right mrgrt5 mrgtp10\">").append('<textarea name="notes[other]['+count+'][]" placeholder="Reader Instructions" rows="7" cols="65" class="it textInput col-1-1"></textarea>').appendTo($wrp);
			
			$input.on('keyup',function(){
				$checkbox.val($input.val());
			})
			$chlbl.click(function(){
				if($chlbl.hasClass('fa-square-o')){
					$chlbl.removeClass('fa-square-o')
						.addClass('fa-check-square-o')
						.css({color:'#000'});
				}
				else
				{
					$chlbl.removeClass('fa-check-square-o')
					.addClass('fa-square-o')
					.css({color:'#D9D9D9'});
				}
				$checkbox.trigger('click');
			})
			
			$dlbtn.click(function() {
				$wrp.remove();
			})
			
			$("#other-notes").append($wrp);		
			
			$(this).data('count',count + 1);	
		})
		
		$('input[type="reset"]').click(function(){
			$(".delete_btn").click();
			$("span.checkbox").removeClass('fa-check-square-o')
					.addClass('fa-square-o')
					.css({color:'#D9D9D9'});
		})
		
		
		$("#add_notesBtn").data('count',1);
	});
})(jQuery)
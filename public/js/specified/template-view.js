(function($){
	$(document).ready(function(e) {
		tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		
		editor_selector : "editers",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks,spellchecker",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,fontsizeselect,spellchecker",
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : true,
		gecko_spellcheck : true,

		// Example content CSS (should be your site CSS)
		content_css : BASEURL + "/public/css/style.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
		
	});
		
		
		 $("#sortingtemplate a").click(function(){
			var divclass = $(this).attr('data-class');
			$(".template-div").hide('slow');
			$("."+divclass).show('slow');
			
			$("#sortingtemplate li").removeClass('active');
			$("li#"+divclass).addClass('active');	
			$("#temp-tab-head").text($(this).text());	 
		});  
		
			$(".temp-nav").click(function(){
				var n, type	=	$(this).data('type') ;
				$("#sortingtemplate li").each(function(index,ele){
					if($(this).hasClass('active')){
						if(type == 'next')
							n	=	index + 1;
						else
							n =   index - 1;
						console.log(index)
					}
				})
				$("#sortingtemplate li").eq(n).find('a').trigger('click');
			}); 
			
		$(window).scroll(function(){
			if ($(this).scrollTop() > 100) {
				$('.bottomNextPre').fadeIn('slow');
			} else {
				$('.bottomNextPre').fadeOut('slow');
			}
		});
		
		$(".templ-note h5").click(function(){
			var id	=	$(this).data('id');
			$("#"+ id).slideToggle();
		})
		$(".templ-suggs h5").click(function(){
			var id	=	$(this).data('id');
			$("#"+ id).slideToggle();
		})
		
		
		$("#cancelreport").click(function(){
			$.fancybox.close();
		})
		
		$(".textareaInfo").hover(function(){
			$(this).find(".info.slideAnimate").addClass('show');
		},function(){
			$(this).find(".info.slideAnimate").removeClass('show');
		});
		
		$(".mainquestion").each(function(index, element) {
            var score = $(this).find("input").val()
			if(score == "") score = 0;
			
			$(this).find('li[data-score="'+ score +'"]').addClass('active');
        });
		
		$(".grid_delete").click(function(){
			var id		=	$(this).attr('data-id');
			var type	=	$(this).attr('data-type');
			var val		=	$(this).attr('data-value');
			var col		=	$(this).attr('data-col');
			
			
			$item	=	$("."+id);
			
			// update column
			var order = 'temp_id=' + template_id + '&type='+type+'&val='+val+'&col='+col; 
			
			$.ajax({
				url:BASEURL + '/myaccount/report-template/UpdateTemplateOrder',
				data:order,
				method:'post',
				headers:{'X-CSRF-TOKEN':TOKEN},
				beforeSend:function(){
					$item.addClass("loadinganimation").addClass("animating"); 
				},
				complete:function(){
					$item.removeClass('loadinganimation').removeClass('animating');
				},
				success:function(data){
					 if(data.status == 'ok')
					 {
						 FlashMessage(data.msg,true);
						 $item.remove();
					 }
					 else
					 {
						 FlashMessage(data.msg,false);
					 }
				 }
			});
		});
		
		
		$("#template-info").AnimateSlideUp({div:"#templateInfo" + template_id});
		
		$("#template-favorite").favorite({id:template_id,type:'template'});
    });
})(jQuery)


function deleteQuestion(catId,Id, divid){
	$question	=	$("#"+divid);
	var data = 'temp_id='+template_id+'&type=question&catid='+catId+"&id="+Id; 
	
	$.ajax({
		url:BASEURL + '/myaccount/report-template/UpdateTemplateOrder',
		data:data,
		method:'post',
		headers:{'X-CSRF-TOKEN':TOKEN},
		beforeSend:function(){
			$question.addClass("loadinganimation").addClass("animating"); 
		},
		complete:function(){
			$question.removeClass('loadinganimation').removeClass('animating');
		},
		success:function(data){
			 if(data.status == 'ok')
			 {
				 FlashMessage(data.msg,true);
				 $question.remove();
			 }
			 else
			 {
				 FlashMessage(data.msg,false);
			 }
		 }
	});
}
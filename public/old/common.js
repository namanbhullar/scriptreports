$(document).ready(function(){
	/*$("body").append('<div id="loader"></div>');
	*/
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();
		
		if($('#bar-graph').length && $('#scorechart').length && $('#questions').length && $('#notes').length){
				if (scroll > 180) {
					$("#compare-heading").addClass("fixedheader");
					$("#comparemenu").addClass("fixedmenu");
					$("#compareright").addClass("fixedright");
					$("#compare-menu .scroll-2").removeClass('active');
					
					var barOffset 	=	 $('#bar-graph').offset().top;
					var newbaroffset	=	(barOffset-150);
					
					var scoreOffset 	=	 $('#scorechart').offset().top;
					var newscoreoffset	=	(scoreOffset-240);
					
					var qstOffset 		=	 $('#questions').offset().top;
					var newqstoffset	=	(qstOffset-240);
					
					var notesOffset 	=	 $('#notes').offset().top;
					var newnotesoffset	=	(notesOffset-240); 
					
					
					//alert(newnotesoffset);
					
					if(scroll >=newscoreoffset && scroll < newqstoffset){
						$("#compare-menu .scroll-1").removeClass('active');
						$('#li-scorechart').addClass('active');	
					}else if(scroll >=newqstoffset && scroll < newnotesoffset){
						$("#compare-menu .scroll-1").removeClass('active');
						$('#li-questions').addClass('active');	
					}else if(scroll >=newnotesoffset){
						$("#compare-menu .scroll-1").removeClass('active');
						$('#li-notes').addClass('active');	
					}else{
						$("#compare-menu .scroll-1").removeClass('active');
						$('#li-bar-graph').addClass('active');	
					}
				}else{
					$("#compare-heading").removeClass("fixedheader");
					$("#comparemenu").removeClass("fixedmenu");
					$("#compareright").removeClass("fixedright");
				}
		}
	});
	

	
	$("#compare-menu .scroll-1 .first").click(function(){
		var div	=	$(this).attr('data-id');
		var divOffset 	=	 $('#'+div).offset().top;
		var newoffset	=	(divOffset-190);
		$("#compare-menu .scroll-1").removeClass('active');
		$(this).addClass('active');
		$("html, body").delay(100).animate({scrollTop: newoffset }, 1000);
		 
	});
	
	$("#compare-menu .scroll-2").click(function(){
		var div	=	$(this).attr('data-id');
		var divOffset 	=	 $('#'+div).offset().top;
		var newoffset	=	(divOffset-190);
		$("#compare-menu .scroll-2").removeClass('active');
		$(this).addClass('active');
		$("html, body").delay(100).animate({scrollTop: newoffset }, 1000);
		 
	});
	// Tooltip for text
	$('.masterTooltip').hover(function(){
			// Hover over code
			var title = $(this).attr('title');
			$(this).data('tipText', title).removeAttr('title');
			$('<div class="popup-tooltip"></div>')
			.html(title)
			.appendTo('body')
			.fadeIn('slow');
	}, function() {
			// Hover out code
			$(this).attr('title', $(this).data('tipText'));
			$('.popup-tooltip').remove();
	}).mousemove(function(e) {
			var mousex = e.pageX + 20; //Get X coordinates
			var mousey = e.pageY + 10; //Get Y coordinates
			$('.popup-tooltip')
			.css({ top: mousey, left: mousex })
	});
	
	$('.masterTooltip2').hover(function(){
			// Hover over code
			var title = $(this).attr('title');
			$(this).data('tipText', title).removeAttr('title');
			$('<div class="popup-tooltip2"></div>')
			.text(title)
			.appendTo('body')
			.fadeIn('slow');
	}, function() {
			// Hover out code
			$(this).attr('title', $(this).data('tipText'));
			$('.popup-tooltip2').remove();
	}).mousemove(function(e) {
			var mousex = e.pageX + 20; //Get X coordinates
			var mousey = e.pageY + 10; //Get Y coordinates
			$('.popup-tooltip2')
			.css({ top: mousey, left: mousex })
	});
	
	$(".flip").click(function(){
	  var div =  $(this).attr("data-id");
	  $("#"+div).slideToggle(function(){
		  	    var check=$(this).is(":hidden"); 
				if(check)
					$("."+div).children('p.selector').removeClass('active');				
				else
					$("."+div).children('p.selector').addClass('active');
		 });
	 
  });
  
 $("ul.scoring li").click(function(){
		
		var score		=	$(this).attr('data-score');
		var q			=	$(this).attr('data-q');
		var dataset		=	$(this).attr('data-set');
		var next		=	parseInt(dataset)+parseInt(1);
		$("#score_"+q).val(score);
		
		$("#ul-"+q+" li").removeClass('active');
		$(this).addClass('active');
		
		$("html, body").animate({ scrollTop: $("#mq_"+next).offset().top}, 600);
		

	});
	

	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
	$("#create_report-link").click(function(){
		
		var check = true;
		$('.left_mid_view input').each(function(){
				if($(this).val()=='' || $(this).val()=='undefined'){
					alert('You need to answer all questions.');
					check	=	false;
					return false;	
				}
		});
		
		
		if(check){
			var top1 = parseInt($(document).scrollTop())+parseInt(100);
			$("#create-report").css({top:top1});
			$("#create-report").show();
			$("#fade").show();
		}
	});
	
	
	$("#cancelreport").click(function(){
		$("#create-report").hide();
		$("#fade").hide();
	});
	
	$("#cancel_report").click(function(){
		$("#light").hide();
		$("#fade").hide();
	});
	
	$("#Create_Report_Form").submit(function(){
		
		var report = $("#report_name").val(); 
		if(report==''){
			alert('Please enter report name');
			$("#report_name").focus();
			return false	
		}else{
			$("#create-report").hide();
			$("#fade").hide();
		}
	});

	$('.template-list li').click(function(){
			var id = $(this).attr("data-id");
			var text	=	$(this).html();
			
			$(".template-list li").removeClass('active');
			$(this).addClass('active');
			var title	=	$(this).attr("data-title");
			$("#attach_template").hide();
			$("#select_template").html("<i class=\"fa fa-times close-template\"></i>&nbsp;"+title);
			$("#select_template").show();
			$(".user-templates").hide('slow');
			$("#template_id").val(id);
			
			$("#select_template .close-template").hover(function(){
				$(this).removeClass("fa-times");
				$(this).addClass("fa-times-circle");
			},function(){
				$(this).addClass("fa-times");
				$(this).removeClass("fa-times-circle");
			}
			);
			
			$("#select_template .close-template").click(function(){
				$(".template-list li").removeClass('active');
				$("#select_template").hide()
				$("#attach_template").show()
				$("#template_id").val("");
			});
			
	});
	
	$('.script-list li').click(function(){
			var id = $(this).attr("data-id");
			var text	=	$(this).html();
			
			$(".script-list li").removeClass('active');
			$(this).addClass('active');
			var title	=	$(this).attr("data-title");
			$("#attach_script").hide();
			$("#select_script").html("<i class=\"fa fa-times close-script\"></i>&nbsp;"+title);
			$("#select_script").show();
			$(".user-scripts").hide('slow');
			$("#script_id").val(id);
			
			$("#select_script .close-script").hover(function(){
				$(this).removeClass("fa-times");
				$(this).addClass("fa-times-circle");
			},function(){
				$(this).addClass("fa-times");
				$(this).removeClass("fa-times-circle");
			}
			);
			
			$("#select_script .close-script").click(function(){
				$(".script-list li").removeClass('active');
				$("#select_script").hide();
				$("#attach_script").show();
				$("#script_id").val("");
			});
			
	});
	
	
	
	$('.user-delete').click(function(){
			var uid	=	$("#user_id").val();
			$("#user_id").val('0');
			$("#selected_user  .data").html('');
			$("#selected_user").hide('slow');
			$("#list-"+uid).removeClass('active');
	});
	
	$("#attach_template").click(function(){
		var position	=	$("#attach_template").position();
		var height	=	$(".user-templates").height();
		height	=	(height + 10);
		$(".user-templates").css({'left':position.left,'margin-top':'-'+height+'px'});
		$(".user-templates").toggle('slow');
	});
	$("#attach_script").click(function(){
		var position	=	$("#attach_script").position();
		var height	=	$(".user-scripts").height();
		height	=	(height + 10);
		$(".user-scripts").css({'left':position.left,'margin-top':'-'+height+'px'});
		$(".user-scripts").toggle('slow');
	});
	
	
	$("#select_user").click(function(){
		$(".users-list").toggle('slow');
		$("#selected_user_error").hide('slow');
	});
	
	$('#ClosePopup').click(function(){
		var PopupId	=	$(this).attr('data-PopupId');
		$('#'+PopupId).hide();
	});
	$('#ClosePopup2').click(function(){
		var PopupId	=	$(this).attr('data-PopupId');
		$('#'+PopupId).hide();
	});
	
	$("#closepopup").click(function(){
			$("#light").hide();
			$("#fade").hide();
			$(".white_contentview").hide();
			//$(".template-list").hide();
	});
	
	$(".closepopup").click(function(){
			$("#sentTemplate").hide();
			$("#SentScriptPopup").hide();
			$("#SendScriptFeedback").hide();
			$("#fade").hide();
			//$(".template-list").hide();
	});
	$(".closepopup.sec").click(function(){
		var id	=	$(this).attr('data-PopupId')
			$("#"+id).hide();
			$("#fade").hide();
			//$(".template-list").hide();
	});
	$("#closepopup3").click(function(){
			$("#reportcompare").hide();
			$("#SentScriptPopup2").hide();
			$("#fade").hide();
			//$(".template-list").hide();
	});
	
	$("#closedocumentpopup").click(function(){
			$("#addDocuments-container").hide();
			$("#fade").hide();
			//$(".template-list").hide();
	});
	$("#sent-report-template_form").submit(function(){
		var uid		=	$("#member").val();
		var email	=	$("#guest_email").val();
		
		if(uid==0 && email==''){
			//alert('Please select user or enter email to send tempalte');
			$("#member").addClass('errors');
			$("#guest_email").removeClass('errors');	
			return false;	
		}
		
		if(uid==0 && email!=''){ 
				$("#member").removeClass('errors');
				var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  				if(!regex.test(email)){
					//alert('Please enter valid email');
					//$("#guest_email").addClass('errors');
					//return false;
				}else{
					$("#guest_email").removeClass('errors');	
				}
		}	
	});
	
	$("#otherbox").click(function(){ 
			
			if($("#otherbox").is(":checked")){ 
				$("#othersub").show(1);
			}else{
				$("#othersub").hide(1);	
			}
	});
	$("#stand_script_pack").click(function(){ 
			
			if($("#stand_script_pack").is(":checked")){ 
				$("#btn_div").css({"opacity": 1});
				$("#btn_div").html('<a class="add-document" href="#"><div class="signup-b" style="float:right;">View</div></a>');
			}else{				
				$("#btn_div").html('<div class="signup-b" style="float:right">View</div>');
				$("#btn_div").css({"opacity": 0.4});
			}
	});
	
	$("#otherbox2").click(function(){ 
			if($("#otherbox2").is(":checked")){ 
				$("#othersub2").show(1);
			}else{
				$("#othersub2").hide(1);	
			}
	});
	
		 
	 $("#sorting a").click(function(){
		 var divclass = $(this).attr('data-class');
			var paging	=	$('#sorting').attr('data-paging');
			if(paging	== 'true'){
				pagingWithSorting(divclass);
				return;
			}
			$(".messageDetail").hide('slow');
			$(".myscriptdetails").hide('slow');
			$("."+divclass).show('slow');
			//alert($("."+divclass).length);
			
			if($("."+divclass).length==0){ 
				$(".no-records").show('slow');
			}else{
				$(".no-records").hide('slow');
			}
			$("#sorting li").removeClass('active');
			$("li#"+divclass).addClass('active');
		
			
			 
		});
		
	



	
	$(".editcat").click(function(){
			
			var id		=	$(this).attr("data-id"); 
			var text	=	$("#hid_cattext_"+id).val();
			
			$("#category_id").val(id);
			$("#edit_cat").val(text);
			
			var topp = parseInt($(document).scrollTop())+parseInt(130);
			$("#editCategory").css({top:topp+'px'})
			$("#fade").show();
			$("#editCategory").show();
	});
	
	$("#trashbutton").click(function(){
		
		if($('.checkfield:checked').length==0){
			alert('Please select at least one record');	
		}else{
			$("#IndexForm").submit();
		}
	});
	
	$("#sub-com-report").click(function(){
		
		if($('.incfld:checked').length==0){
			alert('Please select at least one Category for PDF');	
		}else{
			$("#Create_CompareReport_Form").submit();	
		}
	});
	
	
	$("#incfldall").click(function(){
			
			if($("#incfldall:checked").length==1){
				$('.incfld').prop('checked',true);
				$('.incfld').attr('disabled', true);
			}else{
				$('.incfld').prop('checked',false);
				$('.incfld').attr('disabled', false);
			}	
	});
	
	$("#maintaskul li a").click(function(){
		
		if($('.checkfield:checked').length==0){
			alert('Please select at least one record');	
		}else{
			var type = $(this).attr("data-type");
			$("#task").val(type);
			$("#IndexForm").submit();	
		}
	});
	
	$(".show-template-users").click(function(){
			var id 		= 	$(this).attr('data-id');
			var type	=	$(this).attr('data-show');	
			$(".template-users").hide('slow');
			
			if(type=='close'){
				var pos	=	$(this).position();
				//alert(pos.left);
				$(".templatelist-"+id).css({'top':'-'+pos.left,})
				$(".templatelist-"+id).show('slow');
				$(this).attr('data-show','open');
					
			}else{
				$(".templatelist-"+id).hide('slow');
				$(this).attr('data-show','close');
			}
			
	});
	
	$(".template-users .close").click(function(){
		$(".template-users").hide('slow');
	});
	
	
	$(".cannotsendtemplate").click(function(){
			alert('You can not submit report to yourself');
	});
	
	$("#selecttemplate").change(function(){ 
		var tmpid	=	$(this).val();
		$('.rcompare').hide('slow');
		$('.rdiv-'+tmpid).show('slow');	
	})	
	
	$(".add_servicesother").click(function(){
		
		var count	=	$("#servicesother_count").val();
		
		 html = '<div class="text textInput it checkbox" style="position:relative"><span class="delete_btn top-right" style="margin-top:3px;"><i class="fa fa-trash"></i></span><input id="servicesother_'+count+'" type="checkbox" value="" name="additional_skills[other][]"><input type="text" value="" class="otherinput" onKeyUp="UpdateSrOtherValue(this.value,\''+count+'\')"></div>';
		 $("#services_offered").append(html);	
		 $("#servicesother_count").val(parseInt(count)+1);
		 delete_other();
	});
	
	$(".add_other").click(function(){
		var div		=	$(this).attr('data-div');
		var count	=	$("#other_count").val();
		 //alert(''+div+''+count);
		 if(div=='left_writer_add'){
			 var count	=	parseInt($(this).attr("data-count")) + 1;
			html 	=	'<div class="col-1-1 data relative" data-div="left_writer_add"><div class="col-20-24 mrgbt15"><label class="it" for="general_info">Writer '+count+'</label><input class="text textInput it" name="general_info[left][Writer]['+count+']" type="text" value=""><span class="delete_btn mrgtp25 mrgrt70" style="display:block;"><i class="fa fa-trash"></i></span></div></div>';
			 $(html).insertBefore($(this));
			 $(this).attr("data-count",count);
		 }
		 if(div == 'left_storyby_add'){
			  var count	=	parseInt($(this).attr("data-count")) + 1;
			html 	=	'<div class="col-1-1 data relative" data-div="left_storyby_add"><div class="col-20-24 mrgbt15"><label class="it" for="general_info">Story By '+count+'</label><input class="text textInput it" name="general_info[left][Story By]['+count+']" type="text" value=""><span class="delete_btn mrgtp25 mrgrt70" style="display:block;"><i class="fa fa-trash"></i></span></div></div>';
			 $(html).insertBefore($(this));
			 $(this).attr("data-count",count);
		 }
		if(div=='left_div'){
			 html = '<div class="text textInput it checkbox"><input id="other_'+count+'" type="checkbox" value="" name="script_info[left_other][]"><input type="text" value="" class="otherinput" onKeyUp="UpdateOtherValue(this.value,\''+count+'\')"></div>';
			 $("#"+div).append(html);	
			 $("#other_count").val(parseInt(count)+1);		
		}
		
		if(div=='right_div'){
			var html = '<div class="text textInput it checkbox"><input id="other_'+count+'" type="checkbox" value="" name="script_info[right_other][]"><input type="text" value="" class="otherinput" onKeyUp="UpdateOtherValue(this.value,\''+count+'\')"></div>';
			$("#"+div).append(html);	
			$("#other_count").val(parseInt(count)+1);		
		}
		
		if(div=='notes_div'){
			var html = '<div class="content"><div class="text textInput it checkbox logline"><input id="other_'+count+'" type="checkbox" value="" name="notes[other]['+count+'][]"><input type="text" value="" class="otherinput" onKeyUp="UpdateOtherValue(this.value,\''+count+'\')"></div><textarea cols="50" name="notes[other]['+count+'][]" placeholder="Reader Instructions" rows="2" class="text it loglinetext"></textarea></div>';
			$("#"+div).append(html);	
			$("#other_count").val(parseInt(count)+1);
		}
		
		if(div=='graph_bars'){
			html = '<div class="content"><div class="text textInput it checkbox  logline"><input id="other_'+count+'" type="checkbox" value="" name="bar_graphs[other][]"><input type="text" value="" class="otherinput" onKeyUp="UpdateOtherValue(this.value,\''+count+'\')"></div></div>';
			 $("#"+div).append(html);	
			 $("#other_count").val(parseInt(count)+1);		
		}
		if(div=='add_docs'){
			
			html = '<div class="text textInput it checkbox relative"><input id="other_'+count+'" type="checkbox" value="" name="additional_docs[]"><input type="text" value="" class="otherinput" onKeyUp="UpdateOtherValue(this.value,\''+count+'\')"><span class="delete_btn top-right "><i class="fa fa-trash"></i></span></div>';
			 $("#"+div).append(html);	
			 $("#other_count").val(parseInt(count)+1);
			 
		}
		if(div=='include_docs'){
			html = '<div class="text textInput it checkbox"><input id="other_'+count+'" type="checkbox" value="" name="include_docs[other][]"><input type="text" value="" class="otherinput" onKeyUp="UpdateOtherValue(this.value,\''+count+'\')"></div>';
			 $("#"+div).append(html);	
			 $("#other_count").val(parseInt(count)+1);
		}
	
		if(div=='script_writer'){
			html	=	'<div class="full bmargin10"><span class="delete_btn top-right rmargin40"><i class="fa fa-trash"></i></span><div class="content"><label for="other[writer][writer_'+count+'][name]" class="it">Script Writer Name</label><input type="text" name="other[writer][writer_'+count+'][name]" class="text textInput it" placeholder="Script Writer Name"></div><div class="content"><label for="other[writer][writer_'+count+'][link]" class="it">Link</label><input type="text" name="other[writer][writer_'+count+'][link]" class="text textInput it" placeholder="Link"></div><div class="content"><label for="other[writer][writer_'+count+'][phone]" class="it">Phone no</label><input type="text" name="other[writer][writer_'+count+'][phone]" class="text textInput it" placeholder="Phone no"></div></div>'
			 $("#"+div).append(html);
			$("#other_count").val(parseInt(count)+1);
		}
		if(div=='stroy_by'){
			var	len	=	$("#stroy_by_title").length;
			if(len 	==	0){$("#stroy_by_container").append('<div class="title left" id="stroy_by_title" >Story By</div><div class="clear"></div><div id="stroy_by" class="full">        </div>')}
			html	=	'<div class="full bmargin10"><span class="delete_btn top-right rmargin40"><i class="fa fa-trash"></i></span><div class="content"><label for="other[story][story_'+count+'][name]" class="it">Story Writer Name</label><input type="text" name="other[story][story_'+count+'][name]" class="text textInput it" placeholder="Story Writer  Name"></div><div class="content"><label for="other[story][story_'+count+'][link]" class="it">Link</label><input type="text" name="other[story][story_'+count+'][link]" class="text textInput it" placeholder="Link"></div><div class="content"><label for="other[story][story_'+count+'][phone]" class="it">Phone no</label><input type="text" name="other[story][story_'+count+'][phone]" class="text textInput it" placeholder="Phone no"></div></div>'
			 $("#"+div).append(html);
			$("#other_count").val(parseInt(count)+1);
		}
		if(div=='source_material'){
			var	len	=	$("#source_material_title").length;
			if(len 	==	0){$("#source_material_container").append('<div class="title left" id="source_material_title" >Source Material</div><div class="clear"></div><div id="source_material" class="full"></div>')}
			html	=	'<div class="full bmargin10"><span class="delete_btn top-right rmargin40"><i class="fa fa-trash"></i></span><div class="content"><label for="other[source][source_'+count+'][title]" class="it">Title</label><input type="text" name="other[source][source_'+count+'][title]" class="text textInput it" placeholder="Title"><label for="other[source][source_'+count+'][form]" class="it">Form</label><select name="other[source][source_'+count+'][form]" class="select_full margin10"><option selected="selected" value="0">Select Form</option><option value="Book">Book</option><option value="Branded Entertainment">Branded Entertainment</option><option value="Feature Film">Feature Film</option><option value="New Media">New Media</option><option value="Play">Play</option><option value="Short">Short</option><option value="Video Game">Video Game</option><option value="Webisode">Webisode</option><option value="Other">Other</option></select></div><div class="content"><label for="other[source][source_'+count+'][author]" class="it">Author</label><input type="text" name="other[source][source_'+count+'][author]" class="text textInput it" placeholder="Author"><label for="other[source][source_'+count+'][phone]" class="it">Phone no</label><input type="text" name="other[source][source_'+count+'][phone]" class="text textInput it" placeholder="Phone no"></div></div>'
			 $("#"+div).append(html);
			$("#other_count").val(parseInt(count)+1);
		}
		if(div=='agent_btn'){
			var	len	=	$("#agent_btn_title").length;parseInt(len);
			if(!len){$("#agent_btn_container").append('<div class="title left" id="agent_btn_title" >Agent</div><div class="clear"></div><div id="agent_btn" class="full"></div>')}
			html	=	'<div class="full bmargin10"><span class="delete_btn top-right rmargin40"><i class="fa fa-trash"></i></span><div class="content"><label for="other[agent][agent_'+count+'][name]" class="it">Agent Name</label><input type="text" name="other[agent][agent_'+count+'][name]" class="text textInput it" placeholder="Agent Name"><label for="other[agent][agent_'+count+'][company]" class="it">Company Name</label><input type="text" name="other[agent][agent_'+count+'][company]" class="text textInput it" placeholder="Company Name"/><label for="other[agent][agent_'+count+'][phone]" class="it">Phone no</label><input type="text" name="other[agent][agent_'+count+'][phone]" class="text textInput it" placeholder="Phone no"><label for="other[agent][agent_'+count+'][member_link]" class="it">ScriptReports Member Link</label><input type="text" name="other[agent][agent_'+count+'][member_link]" class="text textInput it" placeholder="ScriptReports Member Link"></div><div class="content"><label for="other[agent][agent_'+count+'][address][street]" class="it">Address</label><input type="text" name="other[agent][agent_'+count+'][address][street]" class="text textInput it" placeholder="Street Name or No."/><label for="other[agent][agent_'+count+'][address][city]" class="it">&nbsp;</label><input type="text" name="other[agent][agent_'+count+'][address][city]" class="text textInput it" placeholder="City"/><label for="other[agent][agent_'+count+'][address][state]" class="it">&nbsp;</label><input type="text" name="other[agent][agent_'+count+'][address][state]" class="text textInput it" placeholder="State"/><label for="other[agent][agent_'+count+'][address][zip]" class="it">&nbsp;</label><input type="text" name="other[agent][agent_'+count+'][address][zip]" class="text textInput it" placeholder="Zip Code"/><label for="other[agent][agent_'+count+'][address][country]" class="it">&nbsp;</label><input type="text" name="other[agent][agent_'+count+'][address][country]" class="text textInput it" placeholder="Country"/></div></div>'
			 $("#"+div).append(html);
			$("#other_count").val(parseInt(count)+1);
			$(this).hide();
		}
		if(div=='manager_btn'){
			var	len	=	$("#manager_btn_title").length;
			if(len 	==	0){$("#manager_btn_container").append('<div class="title left" id="manager_btn_title">Manager</div><div class="clear"></div><div id="manager_btn" class="full"></div>')}
			html	=	'<div class="full bmargin10"><span class="delete_btn top-right rmargin40"><i class="fa fa-trash"></i></span><div class="content"><label for="other[manager][manager_'+count+'][name]" class="it">Manager Name</label><input type="text" name="other[manager][manager_'+count+'][name]" class="text textInput it" placeholder="Manager Name"><label for="other[manager][manager_'+count+'][company]" class="it">Company Name</label><input type="text" name="other[manager][manager_'+count+'][company]" class="text textInput it" placeholder="Company Name"/><label for="other[manager][manager_'+count+'][phone]" class="it">Phone no</label><input type="text" name="other[manager][manager_'+count+'][phone]" class="text textInput it" placeholder="Phone no"><label for="other[manager][manager_'+count+'][member_link]" class="it">Link</label><input type="text" name="other[manager][manager_'+count+'][member_link]" class="text textInput it" placeholder="Link"></div><div class="content"><label for="other[manager][manager_'+count+'][address][street]" class="it">Address</label><input type="text" name="other[manager][manager_'+count+'][address][street]" class="text textInput it" placeholder="Street Name or No."/><label for="other[manager][manager_'+count+'][city]" class="it">&nbsp;</label><input type="text" name="other[manager][manager_'+count+'][address][city]" class="text textInput it" placeholder="City"/><label for="other[manager][manager_'+count+'][state]" class="it">&nbsp;</label><input type="text" name="other[manager][manager_'+count+'][address][state]" class="text textInput it" placeholder="State"/><label for="other[manager][manager_'+count+'][zip]" class="it">&nbsp;</label><input type="text" name="other[manager][manager_'+count+'][address][zip]" class="text textInput it" placeholder="Zip Code"/><label for="other[manager][manager_'+count+'][country]" class="it">&nbsp;</label><input type="text" name="other[manager][manager_'+count+'][address][country]" class="text textInput it" placeholder="Country"/></div></div>'
			 $("#"+div).append(html);
			$("#other_count").val(parseInt(count)+1);
			$(this).hide();
		}
		if(div=='breakdown-changes'){
			html	=	'<divclass="content"><label for="other_category['+count+'][name]" class="it">New Category</label><input type="text" name="other_category['+count+'][name]" class="text textInput it" placeholder="Category Name"><input type="text" name="other_category['+count+'][title]" class="text textInput it" placeholder="Category Title"></div>';
			$("#"+div).append(html);
			$("#other_count").val(parseInt(count)+1);
		}
		if(div=='add_category_top11'){
			var	len	=	$("#agent_btn_container").length;
			if(len 	==	0){$("#script_othre_container").append('<div class="title left">Agent</div><div class="clear"></div>')}
			html	=	'<div class="full bmargin10"><span class="delete_btn top-right rmargin40" title="Delete this Category" ><i class="fa fa-trash"></i></span><div class="content"><label for="other[category][category_'+count+'][name]" class="it">New Category</label><input type="text" name="other[category][category_'+count+'][name]" class="text textInput it" placeholder="Category Name"></div><div class="content"><label for="other[category][category_'+count+'][name]" class="it">&nbsp;</label><input type="text" name="other[category][category_'+count+'][title]" class="text textInput it" placeholder="Category Title"></div></div>';
			$("#"+div).append(html);
			$("#other_count").val(parseInt(count)+1);
		}
		if(div=='add_upload_docs'){
			var docs_count	=	$('#docs_count').val();
			var fun =  "fileSelect('file_"+docs_count+"_name_value',event);";
			var clickon	=	"uploadDocs('file_"+docs_count+"_name')";
			html	= '<div class="content"><label for="other_docs['+docs_count+']" class="it">New Document</label><input type="text" name="other_docs['+docs_count+']" class="text textInput it" placeholder="Document title" required="required"><input type="text" id="file_'+docs_count+'_name_value" name="file_'+docs_count+'_name" class="browse textInput it left" placeholder="Upload Document" readonly="readonly"> <div class="button browse-button btn_to_upload"><i class="fa fa-upload"></i><input type="file" name="other_file_'+docs_count+'" id="docs_file_'+docs_count+'_name" class="filebutton" onchange="'+fun+'"></div><div href="'+BASEURL+'/myaccount/mydocuments/iframe?page=SelectForScriptPack&for=file_'+docs_count+'_name" class="button browse-button btn_to_upload iframe2"><i class="fa fa-plus"></i><input type="hidden" id="add_file_'+docs_count+'_name" name="add_file_'+docs_count+'_name" /></div><div class="button browse-button btn_to_upload delete_btn" ><i class="fa fa-trash"></i></div>';
			
			$("#"+div).append(html);
			$(".iframe2").colorbox({iframe:true, width:"80%", height:"80%"});
			$("#docs_count").val(parseInt(docs_count)+1);
		}
		delete_other();
	});
	

	
	$(".cloaseinfo").click(function(){
		var id 	=	$(this).attr("data-id"); 
		$(".linkhover").attr('data-status','0');
		$("#"+id).hide('slow');
		
	});
	
	$(".trashicon .checkfield").click(function(){
		
		var id	=	$(this).val();
		if($(this).is(":checked")){
				$(".taskul").hide("fast"); 
				$("#taskul_"+id).show('fast');
			}else{
				$("#taskul_"+id).hide('fast');	
			}
	});
	
	$(".trashcheckbox").click(function(){
		
		var id	=	$(this).val();
		if($(this).is(":checked")){
				$("#maintaskul").show('fast');
			}else{
				$("#maintaskul").hide('slow');	
			}
	});
	
	
	
	$("#address-info").hover(function(){
		$('.tinytooltip2').css({visibility:'visible'});
	},
	function(){
		$('.tinytooltip2').css({visibility:'hidden'});
	}
	)
	
	$(".myscriptinfo-tools").hover(function(){
		var spanid = $(this).attr('data-id');
		$('#'+spanid).css({visibility:'visible'});
	},
	function(){
		var spanid = $(this).attr('data-id');
		$('#'+spanid).css({visibility:'hidden'});
	}
	)
	
	$(".templateinfo-part").hover(function(){
		var idd	=	$(this).attr("data-id");
		$('.tmpinfo-'+idd).css({visibility:'visible'});
	},
	function(){
		var idd	=	$(this).attr("data-id");
		$('.tmpinfo-'+idd).css({visibility:'hidden'});
	}
	)
	
	$(".docs").hover(function(){
			var div	=	$(this).attr("data-id");
			$("#"+div).show();
		},function(){
			var div	=	$(this).attr("data-id");
			$("#"+div).hide();
		}
	)
	
	$(".viewtemplate").click(function(){
		var tempid	=	$(this).attr("data-id");
		$(".producerviewtemplate-"+tempid).show('fast');	
	});
		
	$("#producerviewtemplate .close").click(function(){
		var tempid	=	$(this).attr("data-id");
		$(".producerviewtemplate-"+tempid).hide('fast');	
	});
	
	$('#comparebutton').click(function(){
		
		var selectval	=	$("#selecttemplate").val(); 
		if(selectval==0){
			alert('Please select template');	
			return false;
		}
		
		if($('.reportchck:checked').length<=1){
			alert('Please select at least 2 reports to compare');	
			return false;
		}else if($('.reportchck:checked').length>5){
			alert('You can only select upto 5 reports');	
			return false;
		}else{
			$("#reportcompare_form").submit();	
		}
			
	});
	
	//$("#selectprofileimg").click(function(){
		//$("#profile_image_selector").trigger('click');
	//});
			
	$('#profile_image_selector').change(function(){
		//alert($(this).val());	
	})
	
	$("#sample_coverage_button").click(function(){
		$("#sample_coverageimg").trigger('click');	
	})
	
	$("#filebutton2").change(function(){
		$("#delete_file").val(1);
		$("#attachedfile_name .data").html($(this).val());
		$("#attachedfile_name").show();
		
	});
	$("#attachedfile_name .file-delete").click(function(){
		$("#delete_file").val(0);
		$("#attachedfile_name").hide();
	});
	$("#filebutton").change(function(){
		
		$("#attachedfile_name").html($(this).val());
		
	});
	$(".myscriptdetails").hover(
			function(){
				var div	=	$(this).attr("data-script")	
				$('#feedback-div_'+div).show();
				},
			function(){
				var div	=	$(this).attr("data-script")
				$('#feedback-div_'+div).hide();
				}
		);
	$("#search_btn").click(function(){
		$("#search_ul").toggle('fade');
		if($("#close_btn").hasClass("fa-times-circle")){
			$("#close_btn").removeClass("fa-times-circle"); 			
			resetsortscript();
		}else{
			$("#close_btn").addClass("fa-times-circle");
		}
		});
	$("#test").click(function(){
		if($("#up_down_angle").hasClass("fa-angle-down")){
			$("#up_down_angle").removeClass("fa-angle-down");
			$("#up_down_angle").addClass("fa-angle-up");
		}else{
			$("#up_down_angle").removeClass("fa-angle-up");
			$("#up_down_angle").addClass("fa-angle-down");
		}
		$("#holder").slideToggle('slow');
	});
	$("#fade").click(function(){
		$("#fade").hide();
		$(".white_contentview").hide();
	});
	$(".MySearch_close").click(function(){
		$("#search_result").hide();
		$(".MySearch_close").delay( 800 ).hide();
		$("#submit-search").delay( 800 ).show();
	});
	
	$("#logout").click(function(){
		$(".lgt-ul").slideToggle( 500 );
	});
	
	


	jQuery("#docs_select").parent().hover(function(){
		var position	=	jQuery("#docs_select").position();
		var height	=	jQuery("#attchDocs").height();
		height	=	(height + 10);
		jQuery("#attchDocs").css({'left':position.left,'margin-top':'-'+height+'px'});
		jQuery("#attchDocs").show('slow');
	},function(){
		$("#attchDocs").hide('slow');
	});
});

function submitform(id){
		$("#fade").show();
			
	switch(id){
		case 'change_script_header':
			$("#header_script_edit").show('fast');
		break;
		
		case'chang-synopsis':
			$("#synopsis-edit").show('fast');
		break;
		
		case 'change-breakdown':
			$("#script-breakdown-edit").show('fast');
		break;
	}

	
}
function resetsortscript(){
	$("#sortscritform").trigger("reset");
	SortScript();
}

function sortingscript(divclass){
	$("#sortingScript li").removeClass('active');
		$(".myscriptdetails").hide('slow');
		if( divclass == 'rejected' || divclass == 'consider' || divclass == 'recommend' || divclass == 'buy' || divclass == 'archived' || divclass == ''){
				$("#holder").slideToggle('slow');
				switch(divclass){
					case 'recommend':
					$("#test").html('&nbsp;<i class="fa fa-thumbs-up"></i>&nbsp;&nbsp;Recommend');
					$(".my_ul li").removeClass('act');
					$(".my_ul li#"+divclass).addClass('act');
					$("#sortingScript li.active").attr('data-id','recommend');
					$("#up_down_angle").removeClass("fa-angle-up");
					$("#up_down_angle").addClass("fa-angle-down");
					break;
					
					case 'consider':
					$("#test").html('&nbsp;<i class="fa fa-question"></i>&nbsp;&nbsp;Consider');
					$(".my_ul li").removeClass('act');
					$(".my_ul li#"+divclass).addClass('act');
					$("#sortingScript li.active").attr('data-id','consider');
					$("#up_down_angle").removeClass("fa-angle-up");
					$("#up_down_angle").addClass("fa-angle-down");
					break;
					
					case 'rejected':
					$("#test").html('&nbsp;<i class="fa fa-thumbs-down"></i>&nbsp;&nbsp;Pass');
					$(".my_ul li").removeClass('act');
					$(".my_ul li#"+divclass).addClass('act');
					$("#sortingScript li.active").attr('data-id','rejected');
					$("#up_down_angle").removeClass("fa-angle-up");
					$("#up_down_angle").addClass("fa-angle-down");
					break;
					
					case 'buy':
					$("#test").html('&nbsp;<i class="fa fa-usd"></i>&nbsp;&nbsp;Buy');
					$(".my_ul li").removeClass('act');
					$(".my_ul li#"+divclass).addClass('act');
					$("#sortingScript li.active").attr('data-id','buy');
					$("#up_down_angle").removeClass("fa-angle-up");
					$("#up_down_angle").addClass("fa-angle-down");
					break;
					
					case 'archived':
					$("#test").html('&nbsp;<i class="fa fa-suitcase"></i></i>&nbsp;&nbsp;Archived');
					$(".my_ul li").removeClass('act');
					$(".my_ul li#"+divclass).addClass('act');
					$("#sortingScript li.active").attr('data-id','archived');
					$("#up_down_angle").removeClass("fa-angle-up");
					$("#up_down_angle").addClass("fa-angle-down");
					break;					
					
				}
				$("li#lastli").addClass('active');
				$("li#lastli").attr('data-id',divclass);
			}else{
				$("li#"+divclass).addClass('active');
				$('.sortReportSelect').trigger('reset');
			}	
		resetsortscript();	
		 
}

function ShowUploadscript(id){
	$("#writing_script_"+id).trigger('click');	
}

function ShowFilmUploadImage(id){
	$("#film_image_"+id).trigger('click');	
}
function UpdateOtherValue(val,id){ //alert(val);

	$("#other_"+id).val(val);	
}
function UpdateSrOtherValue(val,id){ //alert(val);

	$("#servicesother_"+id).val(val);	
}
function addWriting(){
	
	var count	=	$("#writing_count").val();
	
	var htmll = '<div id="Writingdiv_'+count+'" class="maindiv"><div class="content"><label class="it" for="script_title_'+count+'">Title</label><input type="text" id="script_title_'+count+'" value="" name="script_title_'+count+'" placeholder="Title" class="text textInput it"></div><div class="content"><label class="it" for="script_status_'+count+'">Script Status</label><select name="script_status_'+count+'" id="script_status_'+count+'" class="full"><option value="Available">Available</option><option value="Optioned">Optioned</option><option  value="Sold">Sold</option><option value="Produced">Produced</option></select></div><div class="content"><div id="ScriptForm_container_'+count+'"><label class="it" for="script_form_'+count+'">Form</label><select name="script_form_'+count+'[0]" onchange="CheckOptions3(this.value,\'form\',\''+count+'\')" class="full"><option  value="">Select Form</option><option value="Book">Book</option><option value="Branded Entertainment">Branded Entertainment</option><option value="Feature Film">Feature Film</option><option value="New Media">New Media</option><option value="Play">Play</option><option value="Other">Other</option></select></div><label class="it" for="script_logline_'+count+'">Logline</label><textarea id="script_logline_'+count+'" rows="10" cols="50" name="script_logline_'+count+'" placeholder="Logline" class="text textArea it editers"></textarea></div><div class="content"><div id="ScriptGenre_container_'+count+'"><label class="it" for="script_genre_'+count+'">Genre</label><select name="script_genre_'+count+'[0]" onchange="CheckOptions3(this.value,&quot;genre&quot;,&quot;'+count+'&quot;)" class="full"><option  value="">Select Genre</option><option value="Action">Action</option><option value="Adventure">Adventure</option><option value="Animation">Animation</option><option value="Biographical">Biographical</option><option value="Comedy">Comedy</option><option value="Drama">Drama</option><option value="Dramedy">Dramedy</option><option value="Erotic">Erotic</option><option value="Fantasy">Fantasy</option><option value="Historical">Historical</option><option value="Horror">Horror</option><option value="Musical">Musical</option><option value="Mystery">Mystery</option><option value="Non-Fiction">Non-Fiction</option><option value="Science Fiction/Fanatasy">Science Fiction/Fanatasy</option><option value="Sports">Sports</option><option value="Thriller">Thriller</option><option value="Urban">Urban</option><option value="War">War</option><option value="Western">Western</option><option value="Other">Other</option></select></div><div id="ScriptSubgenre_container_'+count+'"><label class="it" for="script_subgenre_'+count+'">Sub Genre</label><select name="script_subgenre_'+count+'[0]" onchange="CheckOptions3(this.value,&quot;subgenre&quot;,&quot;'+count+'&quot;)" class="full"><option  value="">Select Sub Genre</option><option value="Afro-American">Afro-American</option><option value="Airplane">Airplane</option><option value="Allegory/Fable">Allegory/Fable</option><option value="Animal">Animal</option><option value="Autobiographical">Autobiographical</option><option value="Biblical">Biblical</option><option value="Biker">Biker</option><option value="Bittersweet">Bittersweet</option><option value="Black Comedy">Black Comedy</option><option value="British Flavor">British Flavor</option><option value="Broad Comedy">Broad Comedy</option><option value="Buddy Picture">Buddy Picture</option><option value="Caper">Caper</option><option value="Character Study">Character Study</option><option value="Chase">Chase</option><option value="Children\'s">Children\'s</option><option value="Christain">Christain</option><option value="Circus">Circus</option><option value="Coming of Age">Coming of Age</option><option value="College">College</option><option value="Comeback Story">Comeback Story</option><option value="Comic Book">Comic Book</option><option value="Cop">Cop</option><option value="Corporate">Corporate</option><option value="Courtroom">Courtroom</option><option value="Criminal">Criminal</option><option value="Dance">Dance</option><option value="Detective">Detective</option><option value="Disaster">Disaster</option><option value="Docudrama">Docudrama</option><option value="Domestic/Family">Domestic/Family</option><option value="Drag Queen">Drag Queen</option><option value="Drug">Drug</option><option value="Eccentric Characters">Eccentric Characters</option><option value="Ensemble">Ensemble</option><option value="Epic">Epic</option><option value="Erotic/Sexual">Erotic/Sexual</option><option value="Escape">Escape</option><option value="Espionage/Intrigue">Espionage/Intrigue</option><option value="Family">Family</option><option value="Farce">Farce</option><option value="Film Noir">Film Noir</option><option value="Foreign">Foreign</option><option value="Fish Out of Water">Fish Out of Water</option><option value="Gamble">Gamble</option><option value="Gang">Gang</option><option value="Gangster">Gangster</option><option value="Ghost">Ghost</option><option value="Gigolo">Gigolo</option><option value="Historical">Historical</option><option value="Holocaust">Holocaust</option><option value="Interracial">Interracial</option><option value="Jazz">Jazz</option><option value="Jeopardy">Jeopardy</option><option value="Kidnap">Kidnap</option><option value="Love Story">Love Story</option><option value="LGBT">LGBT</option><option value="Martial Arts">Martial Arts</option><option value="Medical">Medical</option><option value="Melodrama">Melodrama</option><option value="Military">Military</option><option value="Murder">Murder</option><option value="Mystery">Mystery</option><option value="Nautical">Nautical</option><option value="New Age">New Age</option><option value="Noir">Noir</option><option value="Occult">Occult</option><option value="Opera">Opera</option><option value="Period">Period</option><option value="Political">Political</option><option value="Post Apocalyptic">Post Apocalyptic</option><option value="Prison">Prison</option><option value="Psychological">Psychological</option><option value="Racism">Racism</option><option value="Refugee">Refugee</option><option value="Relationship">Relationship</option><option value="Road Picture">Road Picture</option><option value="Robbery">Robbery</option><option value="Robot">Robot</option><option value="Rock and Roll">Rock and Roll</option><option value="Romantic">Romantic</option><option value="Romantic Comedy">Romantic Comedy</option><option value="Saga">Saga</option><option value="Satire">Satire</option><option value="Science Fiction">Science Fiction</option><option value="Screwball Comedy">Screwball Comedy</option><option value="Show Business">Show Business</option><option value="Slapstick">Slapstick</option><option value="Spiritual">Spiritual</option><option value="Spoof">Spoof</option><option value="Sports">Sports</option><option value="Superhero">Superhero</option><option value="Supernatural">Supernatural</option><option value="Survival">Survival</option><option value="Suspense">Suspense</option><option value="Swashbuckler">Swashbuckler</option><option value="Terrorist">Terrorist</option><option value="Vietnam">Vietnam</option><option value="War">War</option><option value="World War One">World War One</option><option value="World War Two">World War Two</option><option value="Youth">Youth</option><option value="Other">Other</option></select></div><label class="it" for="script_pages_'+count+'">Pages</label><input type="text" id="script_pages_'+count+'" value="" name="script_pages_'+count+'" placeholder="Pages" class="text textInput it"><label class="it" for="script_permissions_'+count+'">Viewer Permissions</label><select name="script_permissions_'+count+'" id="script_permissions_'+count+'" class="full"><option  value="1">Request</option><option value="2">View</option></select><label class="it" for="script_scriptname_'+count+'">Upload Script</label><input type="text" id="script_scriptname_'+count+'" value="" name="script_scriptname_'+count+'" readonly="readonly" placeholder="Upload Script" class="browse textInput it width40"><div class="button browse-button">Browse...<input type="file" name="script_script_'+count+'" accept="application/pdf" class="filebutton" onchange="fileSelect(\'script_scriptname_'+count+'\',event);" ></div><span class="valid-files">PDF file only</span><input type="hidden" value="0" name="writing_delete_'+count+'" id="writing_delete_'+count+'"><br><button type="button" class="removebtn" onclick="DeleteWritingProject(\''+count+'\')">Delete</button></div></div>';
	
	$("#writingproject").append(htmll);
	$("#writing_count").val(parseInt(count)+1);	
}

function addFilm(){
	
	var count	=	$("#film_count").val();
	
	var htmll = '<div id="Filmdiv_'+count+'"><label class="it" for="film_title_'+count+'">Title</label><input type="text" name="film_title_'+count+'" placeholder="Title" class="text textInput it"><label class="it" for="film_credit_'+count+'">Credit</label><select name="film_credit_'+count+'"><option value="1">Writer</option><option value="2">Director</option><option value="3">Producer</option><option value="4">Writer/Director</option><option value="5">Writer/Producer</option><option value="6">Director/Producer</option><option value="7">Writer/Director/Producer</option></select><label class="it" for="film_url_'+count+'">URL</label><input type="text" name="film_url_'+count+'" placeholder="URL" class="text textInput it"><label class="it" for="film_type_'+count+'">Film Type</label><select name="film_type_'+count+'"><option value="1">Student Film</option><option value="2">Short Film</option><option value="3">Webisode</option><option value="4">TV Show</option><option value="5">Documentary Film</option><option value="6">Feature Film</option><option value="7">Other</option></select><input id="film_image_'+count+'" class="hidden" type="file" name="film_image_'+count+'"><div class="button uploadscript" onclick="ShowFilmUploadImage(\''+count+'\');">Upload Image (215 X 250)</div><button type="button" class="removebtn" onclick="DeleteFimlProjects(\''+count+'\')">Delete</button></div>';
	
	$("#filmproject").append(htmll);
	$("#film_count").val(parseInt(count)+1);	
		
}


function DeleteWritingProject(id){
		
		$("#writing_delete_"+id).val('1');
		$('#Writingdiv_'+id).hide();
}

function DeleteFimlProjects(id){
		
		$("#film_delete_"+id).val('1');
		$('#Filmdiv_'+id).hide();
}

function checkAllFields(){
	
	var check	=	$("#checkall").val();
	
	if(check==0){
		
		$('.checkfield').prop('checked',true);
		$("#checkall").val('1');
	}else{
			$('.checkfield').prop('checked',false);
			$("#checkall").val('0');
	}
		
}

function SortReport(val){
	$(".messageDetail").hide('slow');
	$("."+val).show('show');		
}
function SortScript(){
	$(".myscriptdetails").hide('slow');
	$(".no-records").hide('slow');
	var Aclass		=	$("#sortingScript .active").attr("data-id");
	var len	= $(".myscriptdetails."+Aclass).length;
	var lengh	=	parseInt(len);
	var ids	=	[];
	var i = 0;
	$(".myscriptdetails."+Aclass).each(function(){
		ids[i]	=	$(this).attr('id');
		i++;
	});
	var count	=	0;
		var valueform	= $("#sortbyform").val(); 
		var valuegenre = $("#sortbygemre").val();
		var valuedate = $("#sortscript_date").val();
		var formresult;
		var genreresult;
		var archived;
		for(i=0;i<lengh;i++){
			formresult = false;
			genreresult = false;
			archived	=	false;
			var divid	=	ids[i];
			
			if( valueform !== 'Select Form'){
			var form	=	$("#"+divid).find("span.form").text();
				if(form.search(valueform) !== -1){
					formresult = true;	
				}	
			}else{ formresult = true;}
			if( valuegenre !== 'Select Genre'){
				var genre	=	$("#"+divid).find("span.genre").text();
				if(genre.search(valuegenre) !== -1){
					genreresult = true;
				}
			}else{ genreresult = true;}
			
			if(Aclass !== 'archived'){
				var classes = $("#"+divid).attr('class');
				if(classes.search('archived') !== -1){
					archived = true;
				}
			}else{ archived = false;}
						
			if(formresult && genreresult && !archived){
				$("#"+divid).show('slow');
				count++;
			}
		}
		
		if(count==0){
			$(".no-records").show('slow');	
		}
}
function SortScript2(){
	
}
function addfeatured(){
	
	var count	=	$("#featured_count").val();
	var newval	=	parseInt(count)+1;
	
	var html	=	'<div id="Featured_'+newval+'"><hr /><div class="content"><label class="it"for="featured_title_'+newval+'">Title</label><input type="text"id="featured_title_'+newval+'"name="featured_title_'+newval+'"placeholder="Title"class="text textInput it"></div><div class="content" id="Form_container_'+newval+'"><label class="it"for="featured_form_'+newval+'">Form</label><select name="featured_form_'+newval+'" class="full" onchange="CheckOptions(this.value,\'form\',\''+newval+'\')"><option value="">Select Form</option><option value="Book">Book</option><option value="Branded Entertainment">Branded Entertainment</option><option value="Feature Film">Feature Film</option><option value="New Media">New Media</option><option value="Play">Play</option><option value="Other">Other</option></select></div><div class="content"><label class="it"for="featured_rdate_'+newval+'">Release Date</label><input type="text"id="featured_rdate_'+newval+'"name="featured_rdate_'+newval+'"placeholder="Release Date"class="text textInput it"></div><div class="content"><label class="it"for="featured_min_'+newval+'">Minutes</label><input type="text"id="featured_min_'+newval+'"name="featured_min_'+newval+'"placeholder="Minutes"class="text textInput it"></div><div class="content"><label class="it"for="featured_rating_'+newval+'">Rating</label><input type="text"id="featured_rating_'+newval+'"name="featured_rating_'+newval+'"placeholder="Rating"class="text textInput it"></div><div class="content" id="Genre_container_'+newval+'"><label class="it"for="featured_genre_'+newval+'">Genre</label><select name="featured_genre_'+newval+'"class="full" onchange="CheckOptions(this.value,\'genre\',\''+newval+'\')"><option  value="">Select Genre</option><option value="Action">Action</option><option value="Adventure">Adventure</option><option value="Animation">Animation</option><option value="Biographical">Biographical</option><option value="Comedy">Comedy</option><option value="Drama">Drama</option><option value="Dramedy">Dramedy</option><option value="Erotic">Erotic</option><option value="Fantasy">Fantasy</option><option value="Historical">Historical</option><option value="Horror">Horror</option><option value="Musical">Musical</option><option value="Mystery">Mystery</option><option value="Non-Fiction">Non-Fiction</option><option value="Science Fiction/Fanatasy">Science Fiction/Fanatasy</option><option value="Sports">Sports</option><option value="Thriller">Thriller</option><option value="Urban">Urban</option><option value="War">War</option><option value="Western">Western</option><option value="Other">Other</option></select></div><div class="content"><label class="it" for="featured_poster_'+newval+'">Upload Poster (215 X 250)</label><input type="text" id="featured_poster_'+newval+'" value="" name="featured_poster_'+newval+'" readonly="readonly" placeholder="Upload Poster" class="browse textInput it width40"><div class="button browse-button">Browse...<input type="file" accept="image/gif, image/jpeg, image/png" name="featured_poster_file_'+newval+'" onchange="fileSelect(\'featured_poster_'+newval+'\',event);" class="filebutton"></div><span class="valid-files">jpeg,	png, jpg file only</span><label class="it"for="featured_brief_'+newval+'">Brief Description</label><textarea id="featured_brief_'+newval+'"rows="10"cols="50"name="featured_brief_'+newval+'"placeholder="Brief Description"class="text textArea it editers"></textarea></div><div class="content"><div id="Subgenre_container_'+newval+'"><label class="it"for="featured_subgenre_'+newval+'">Sub Genre</label><select name="featured_subgenre_'+newval+'" class="full" onchange="CheckOptions(this.value,\'subgenre\',\''+newval+'\')"><option value="">Select Sub Genre</option><option value="Afro-American">Afro-American</option><option value="Airplane">Airplane</option><option value="Allegory/Fable">Allegory/Fable</option><option value="Animal">Animal</option><option value="Autobiographical">Autobiographical</option><option value="Biblical">Biblical</option><option value="Biker">Biker</option><option value="Bittersweet">Bittersweet</option><option value="Black Comedy">Black Comedy</option><option value="British Flavor">British Flavor</option><option value="Broad Comedy">Broad Comedy</option><option value="Buddy Picture">Buddy Picture</option><option value="Caper">Caper</option><option value="Character Study">Character Study</option><option value="Chase">Chase</option><option value="Children\'s">Children\'s</option> <option value="Christain">Christain</option> <option value="Circus">Circus</option> <option value="Coming of Age">Coming of Age</option> <option value="College">College</option> <option value="Comeback Story">Comeback Story</option> <option value="Comic Book">Comic Book</option> <option value="Cop">Cop</option> <option value="Corporate">Corporate</option> <option value="Courtroom">Courtroom</option> <option value="Criminal">Criminal</option> <option value="Dance">Dance</option> <option value="Detective">Detective</option> <option value="Disaster">Disaster</option> <option value="Docudrama">Docudrama</option> <option value="Domestic/Family">Domestic/Family</option> <option value="Drag Queen">Drag Queen</option> <option value="Drug">Drug</option> <option value="Eccentric Characters">Eccentric Characters</option> <option value="Ensemble">Ensemble</option> <option value="Epic">Epic</option> <option value="Erotic/Sexual">Erotic/Sexual</option> <option value="Escape">Escape</option> <option value="Espionage/Intrigue">Espionage/Intrigue</option> <option value="Family">Family</option> <option value="Farce">Farce</option> <option value="Film Noir">Film Noir</option> <option value="Foreign">Foreign</option> <option value="Fish Out of Water">Fish Out of Water</option> <option value="Gamble">Gamble</option> <option value="Gang">Gang</option> <option value="Gangster">Gangster</option> <option value="Ghost">Ghost</option> <option value="Gigolo">Gigolo</option> <option value="Historical">Historical</option> <option value="Holocaust">Holocaust</option> <option value="Interracial">Interracial</option> <option value="Jazz">Jazz</option> <option value="Jeopardy">Jeopardy</option> <option value="Kidnap">Kidnap</option> <option value="Love Story">Love Story</option> <option value="LGBT">LGBT</option> <option value="Martial Arts">Martial Arts</option> <option value="Medical">Medical</option> <option value="Melodrama">Melodrama</option> <option value="Military">Military</option> <option value="Murder">Murder</option> <option value="Mystery">Mystery</option> <option value="Nautical">Nautical</option> <option value="New Age">New Age</option> <option value="Noir">Noir</option> <option value="Occult">Occult</option> <option value="Opera">Opera</option> <option value="Period">Period</option> <option value="Political">Political</option> <option value="Post Apocalyptic">Post Apocalyptic</option> <option value="Prison">Prison</option> <option value="Psychological">Psychological</option> <option value="Racism">Racism</option> <option value="Refugee">Refugee</option> <option value="Relationship">Relationship</option> <option value="Road Picture">Road Picture</option> <option value="Robbery">Robbery</option> <option value="Robot">Robot</option> <option value="Rock and Roll">Rock and Roll</option> <option value="Romantic">Romantic</option> <option value="Romantic Comedy">Romantic Comedy</option> <option value="Saga">Saga</option> <option value="Satire">Satire</option> <option value="Science Fiction">Science Fiction</option> <option value="Screwball Comedy">Screwball Comedy</option> <option value="Show Business">Show Business</option> <option value="Slapstick">Slapstick</option> <option value="Spiritual">Spiritual</option> <option value="Spoof">Spoof</option> <option value="Sports">Sports</option> <option value="Superhero">Superhero</option> <option value="Supernatural">Supernatural</option> <option value="Survival">Survival</option> <option value="Suspense">Suspense</option> <option value="Swashbuckler">Swashbuckler</option> <option value="Terrorist">Terrorist</option> <option value="Vietnam">Vietnam</option> <option value="War">War</option> <option value="World War One">World War One</option> <option value="World War Two">World War Two</option> <option value="Youth">Youth</option><option value="Other">Other</option></select></div><label class="it" for="featured_script_'+newval+'">Upload Script</label> <input type="text" id="featured_script_'+newval+'" name="featured_script_'+newval+'" readonly="readonly" placeholder="Upload Script" class="browse textInput it"><div class="button browse-button">Browse...<input type="file" name="featured_script_file_'+newval+'" accept="application/pdf" onchange="fileSelect(\'featured_script_'+newval+'\',event);" class="filebutton"></div><span class="valid-files">PDF file only</span><label class="it" for="featured_link_'+newval+'">Link for more info</label> <input type="text" id="featured_link_'+newval+'" name="featured_link_'+newval+'" placeholder="Link for more info" class="text textInput it"> <a onclick="DeleteFeaturedProject(\''+newval+'\')" class="deletelink">Delete</a></div><input type="hidden" value="0" name="featured_delete_'+newval+'" id="featured_delete_'+newval+'"></div>';
	
	
	$("#featuredproject").append(html);
	$("#featured_count").val(newval);	
		
}


function addClasses(){
	
	var count	=	$("#classes_count").val();
	var newval	=	parseInt(count)+1;
	
	var html	=	'<div id="Classes_'+newval+'"><hr /><div class="content"><label class="it" for="classes_title_'+newval+'">Title</label> <input type="text" id="classes_title_'+newval+'" value="" name="classes_title_'+newval+'" placeholder="Title" class="text textInput it"> </div> <div id="Category_container_'+newval+'" class="content"> <label class="it" for="classes_category1">Category</label> <select name="featured_form_'+newval+'" id="featured_form_'+newval+'" class="full" onchange="CheckOptions(this.value,\'classes\',\''+newval+'\')"> <option value="Live Event">Live Event</option> <option value="Live Workshop">Live Workshop</option> <option value="Online Workshop">Online Workshop</option> <option value="Webinar">Webinar</option> <option value="Recorded Webinar">Recorded Webinar</option><option value="Other">Other</option></select> </div> <div class="content"> <label class="it" for="classes_dates_'+newval+'">Classes Date</label> <input type="text" id="classes_dates_'+newval+'" value="" name="classes_dates_'+newval+'" placeholder="Classes Date" class="text textInput it"> </div> <div class="content"> <label class="it" for="classes_location_'+newval+'">Location</label> <input type="text" id="classes_location_'+newval+'" value="" name="classes_location_'+newval+'" placeholder="Location" class="text textInput it"> </div> <div class="content"> <label class="it" for="classes_image_'+newval+'">Upload Image (215 X 250)</label> <input type="text" id="classes_image_'+newval+'" name="classes_image_'+newval+'" readonly="readonly" placeholder="Upload Image" class="browse textInput it width40"><div class="button browse-button">Browse...<input type="file" name="classes_image_file_'+newval+'" accept="image/gif, image/jpeg, image/png" onchange="fileSelect(\'classes_image_'+newval+'\',event);" class="filebutton"></div><span class="valid-files">jpeg, png, jpg file only</span></div><div class="content"> <label class="it" for="featured_link_'+newval+'">Link for more info</label> <input type="text" id="featured_link_'+newval+'" value="" name="featured_link_'+newval+'" placeholder="Link for more info" class="text textInput it"> </div> <div class="content"> <label class="it" for="classes_description_'+newval+'">Full Description</label> <textarea id="classes_description_'+newval+'" rows="10" cols="50" name="classes_description_'+newval+'" placeholder="Full Description" class="text textArea it editers"></textarea> </div> <div class="content"> <label class="it bullutes" for="classes_bullet1_'+newval+'">At a Glance :</label> &nbsp;<small class="titleSmall"><i>bullet points for quick read</i></small> <input type="text" id="classes_bullet1_'+newval+'" value="" name="classes_bullet1_'+newval+'" placeholder="Bullet 1" class="text textInput it"> <input type="text" value="" name="classes_bullet2_'+newval+'" placeholder="Bullet 2" class="text textInput it"> <input type="text" value="" name="classes_bullet3_'+newval+'" placeholder="Bullet 3" class="text textInput it"><a onclick="DeleteClasses(\''+newval+'\')" class="deletelink">Delete</a> </div> <input type="hidden" value="0" name="featured_delete_'+newval+'" id="featured_delete_'+newval+'"><input type="hidden" value="0" name="classes_id_'+newval+'" id="classes_id_'+newval+'"><input type="hidden" value="0" name="classes_delete_'+newval+'" id="classes_delete_'+newval+'"></div>';
	
	
	$("#classesDiv").append(html);
	$("#classes_count").val(newval);	
		
}


function addContest(){
	
	var count	=	$("#contest_count").val();
	var newval	=	parseInt(count)+1;
	
	var html	=	'<div id="Contest_'+newval+'"><hr /><div class="content"><label class="it" for="contest_title_'+newval+'">Title</label><input type="text" id="contest_title_'+newval+'" name="contest_title_'+newval+'" placeholder="Title" class="text textInput it"><label class="it" for="entry_deadline_'+newval+'">Entry Deadline</label><input type="text" id="entry_deadline_'+newval+'" name="entry_deadline_'+newval+'" placeholder="Entry Deadline" class="text textInput it"><label class="it" for="contest_description_'+newval+'">Full Description</label><textarea id="contest_description_'+newval+'" rows="10" cols="50" name="contest_description_'+newval+'" placeholder="Full Description" class="text textArea it editers"></textarea></div><div class="content"><label class="it" for="contest_date_'+newval+'">Date of Event</label><input type="text" id="contest_date_'+newval+'" name="contest_date_'+newval+'" placeholder="Location" class="text textInput it"><label class="it" for="entry_fee_'+newval+'">Entry Fee</label><input type="text" id="entry_fee_'+newval+'" name="entry_fee_'+newval+'" placeholder="Entry Fee" class="text textInput it"><label class="it" for="contest_image_'+newval+'">Upload Image (215 X 250)</label><input type="text" id="contest_image_'+newval+'" name="contest_image_'+newval+'" readonly="readonly" placeholder="Upload Image" class="browse textInput it width40"><div class="button browse-button">Browse...<input type="file" name="contest_image_file_'+newval+'" onchange="fileSelect(\'contest_image_'+newval+'\',event);" accept="image/gif, image/jpeg, image/png" class="filebutton"></div><span class="valid-files">jpeg, png, jpg file only</span><label class="it" for="contest_link_'+newval+'">Link for more info</label><input type="text" id="contest_link_'+newval+'" name="contest_link_'+newval+'" placeholder="Link for more info" class="text textInput it"><a onclick="DeleteContest(\''+newval+'\')" class="deletelink">Delete</a></div><input type="hidden" value="0" name="contest_id_'+newval+'" id="contest_id_'+newval+'"><input type="hidden" value="0" name="contest_delete_'+newval+'" id="contest_delete_'+newval+'"></div>';
	
	
	$("#contestDiv").append(html);
	$("#contest_count").val(newval);	
		
}


function ShowUploadScript(id){
	$("#featured_script_file_"+id).trigger('click');	
}

function ShowUploadPoster(id){
	$("#featured_poster_file_"+id).trigger('click');	
}

function ShowUploadClassesImage(id){
	$("#classes_image_file_"+id).trigger('click');	
}
function ShowUploadContestmage(id){
	$("#contest_image_file_"+id).trigger('click');	
}

function DeleteFeaturedProject(id){
	$("#Featured_"+id).hide('slow');
	$("#featured_delete_"+id).val('1');
		
}

function DeleteClasses(id){
	$("#Classes_"+id).hide('slow');
	$("#classes_delete_"+id).val('1');
}

function DeleteContest(id){
	$("#Contest_"+id).hide('slow');
	$("#contest_delete_"+id).val('1');
}

function SetUserValue(obj){
	
		var id 		=	$(obj).attr('data-id');
		var name	=	$(obj).attr("data-name");
		
		$("#user_id").val(id);	
		$("#user_list").val(name);
		$("#users-listview").hide('slow');	
	
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
		
function checkvalue(val){ 
	
	if(val=="Other"){
		var inphtml	=	'<input type="text" id="title-other" name="title[1]" placeholder="Please enter your title" class="text textInput it" required="required">';
		$("#producer-title-box").append(inphtml);
	}else{
		$("#title-other").remove();	
	}
}

function CheckOptions(val,elm,cnt){
	
	if(elm=='form'){
		if(val=="Other"){
			var inphtml	=	'<input type="text" id="featured_form_'+cnt+'" name="featured_form_'+cnt+'[1]" placeholder="Please enter your Form title here" class="text textInput it" required="required">';
			$("#Form_container_"+cnt).append(inphtml);
		}else{
			$("#featured_form_"+cnt).remove();	
		}
	}
	
	if(elm=='genre'){
		if(val=="Other"){
			var inphtml	=	'<input type="text" id="featured_genre_'+cnt+'" name="featured_genre_'+cnt+'[1]" placeholder="Please enter your Genre title here" class="text textInput it" required="required">';
			$("#Genre_container_"+cnt).append(inphtml);
		}else{
			$("#featured_genre_"+cnt).remove();	
		}
	}
	
	if(elm=='subgenre'){
		if(val=="Other"){
			var inphtml	=	'<input type="text" id="featured_subgenre_'+cnt+'" name="featured_subgenre_'+cnt+'[1]" placeholder="Please enter your Sub Genre title here" class="text textInput it" required="required">';
			$("#Subgenre_container_"+cnt).append(inphtml);
		}else{
			$("#featured_subgenre_"+cnt).remove();	
		}
	}
	
	if(elm=='classes'){
		if(val=="Other"){
			var inphtml	=	'<input type="text" id="classes_category_'+cnt+'" name="classes_category_'+cnt+'[1]" placeholder="Please enter your Category title here" class="text textInput it" required="required">';
			$("#Category_container_"+cnt).append(inphtml);
		}else{
			$("#classes_category_"+cnt).remove();	
		}
	}
}


function CheckOptions3(val,elm,cnt){
	
	if(elm=='form'){
		if(val=="Other"){
			var inphtml	=	'<input type="text" id="script_form_'+cnt+'" name="script_form_'+cnt+'[1]" placeholder="Please enter your Form title here" class="text textInput it" required="required">';
			$("#ScriptForm_container_"+cnt).append(inphtml);
		}else{
			$("#script_form_"+cnt).remove();	
		}
	}
	
	if(elm=='genre'){
		if(val=="Other"){
			var inphtml	=	'<input type="text" id="script_genre_'+cnt+'" name="script_genre_'+cnt+'[1]" placeholder="Please enter your Genre title here" class="text textInput it" required="required">';
			$("#ScriptGenre_container_"+cnt).append(inphtml);
		}else{
			$("#script_genre_"+cnt).remove();	
		}
	}
	
	if(elm=='subgenre'){
		if(val=="Other"){
			var inphtml	=	'<input type="text" id="script_subgenre_'+cnt+'" name="script_subgenre_'+cnt+'[1]" placeholder="Please enter your Sub Genre title here" class="text textInput it" required="required">';
			$("#ScriptSubgenre_container_"+cnt).append(inphtml);
		}else{
			$("#script_subgenre_"+cnt).remove();
		}
	}
	
	if(elm=='classes'){
		if(val=="Other"){
			var inphtml	=	'<input type="text" id="classes_category_'+cnt+'" name="classes_category_'+cnt+'[1]" placeholder="Please enter your Category title here" class="text textInput it" required="required">';
			$("#Category_container_"+cnt).append(inphtml);
		}else{
			$("#classes_category_"+cnt).remove();	
		}
	}
}


function CheckOptions2(val,elm){
	
	if(elm=='form'){
		if(val=="Other"){
			var inphtml	=	'<input type="text" id="form_other" name="form[1]" placeholder="Please enter your Form title here" style="font-family:\'Open Sans\';background: #fff;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.4);color: #000;display: inline-block;font-size: 13px;font-weight: 400;line-height: 18px;margin: 10px;padding: 5px 15px;text-align: left;transition: all 0.2s ease 0s;vertical-align: top;width: 90%;font-style: normal;font-weight: 600;border: medium none;min-height: 13px;" required="required">';
			$("#Formdiv").append(inphtml);
			
		}else{
			$("#form_other").remove();	
		}
	}
	
	if(elm=='genre'){
		if(val=="Other"){
			var inphtml	=	'<input type="text" id="genre_other" name="genre[1]" placeholder="Please enter your Genre title here" style="font-family:\'Open Sans\';background: #fff;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.4);color: #000;display: inline-block;font-size: 13px;font-weight: 400;line-height: 18px;margin: 10px;padding: 5px 15px;text-align: left;transition: all 0.2s ease 0s;vertical-align: top;width: 90%;font-style: normal;font-weight: 600;border: medium none;min-height: 13px;" required="required">';
			$("#Genrediv").append(inphtml);
		}else{
			$("#genre_other").remove();	
		}
	}
	
	if(elm=='subgenre'){
		if(val=="Other"){
			var inphtml	=	'<input type="text" id="subgenre_other" name="subgenre[1]" placeholder="Please enter your Sub Genre title here" style="font-family:\'Open Sans\';background: #fff;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.4);color: #000;display: inline-block;font-size: 13px;font-weight: 400;line-height: 18px;margin: 10px;padding: 5px 15px;text-align: left;transition: all 0.2s ease 0s;vertical-align: top;width: 90%;font-style: normal;font-weight: 600;border: medium none;min-height: 13px;" required="required">';
			$("#Subgenrediv").append(inphtml);
		}else{
			$("#subgenre_other").remove();	
		}
	}
	
}

function countChar(val) {
        var len = val.value.length;
        if (len >= 20) {
          val.value = val.value.substring(0, 20);
        } else {
          $('#charNum').text(20 - len);
        }
      };
	  
function fileSelect(id, e){
	$("#"+id).val(e.target.files[0].name);
	$("#"+id).trigger('change');
}

function attachfileSelect(e){
	var count	=	parseInt($("#attachfiles").attr("data-file"));
	var linum	=	 parseInt($(".uploads_list li").length);
	$("#attachfiles").html("<i class=\"fa fa-plus\"></i>&nbsp;Selected ("+(linum + 1)+")");
	$(".uploads_list").append("<li>&nbsp;"+e.target.files[0].name+" <i data-id=\"filebutton"+count+"\" class=\"fa fa-times\"></i></li>");
	$("#filebutton"+count).removeClass("uploadbutton");
	$("#filebutton"+count).hide();
	$("#attachfiles").parent().append("<input type=\"file\" name=\"attach_file[]\" onchange=\"attachfileSelect(event)\" id=\"filebutton"+(count + 1)+"\" accept=\"application/pdf\" class=\"uploadbutton\">");
	$("#attachfiles").attr("data-file",(count + 1));
	var height	=	$("#uploadFile").height();
	$("#attachfiles").parent().css({"margin-top":"-"+height+"px","padding-top":height+"px"});
	uploadfilesHover();
		
	$(".uploads_list li i.fa").click(function(){
		$("#"+$(this).attr('data-id')).remove();;
		$(this).parent().remove();
		$(this).addClass("fa-times-circle");
		$("#attachfiles").html("<i class=\"fa fa-plus\"></i>&nbsp;Selected ("+$(".uploads_list li").length+")");
	});
}


function uploadfilesHover(){
	$("#attachfiles").parent().hover(function(){
		var position	=	$("#attachfiles").position();
		var height	=	$("#uploadFile").height();
		height	=	(height + 10);
		$("#uploadFile").css({'left':position.left,'margin-top':'-'+height+'px'});
		$("#uploadFile").show('slow');
	},function(){
		$("#uploadFile").hide('slow');
	});
}

function fileSelecttop(id, e){
	$("#"+id).html(e.target.files[0].name);
}
function ClearSearchForm(){
	$("#add_language").val('');
	$("#location").val('');	
	$("input[type='checkbox']").attr('checked',false);
	$("#members_form").submit();
}
function cancelopration(url){
	window.location.href	=	BASEURL+'/myaccount/'+url;	
}

function SScriptFeedback(id, title, feedback, createdby){
	var login_user	=	$('#login_user').val();
	if(feedback=='buy'){
		var subject	=	login_user+" wants to "+feedback+" your Script '"+title;
	}else{
		if(feedback=='Priority'){
			var subject	=	"Script '"+title+"' will Priarity for "+login_user;
		}else{
			var subject	=	"Your Script '"+title+"' is "+feedback+" by "+login_user;
		}
	}
	$('#feedbackSubject').val(subject);
	$('#script_id1').val(id);
	$('#scriptwriter').val(createdby);
	$('#feedback1').val(feedback);
	$('#sentmsgByAjax_form33').submit();
}



function changeStatus(val){ 
	if(val == ''){
		$('#coverageStatus').val('0');
		var html=	'Sample Coverage ';
		$('#lbl_samplecoverage').html(html);
	}else{
		$('#coverageStatus').val('1');
		var html	=	'Sample Coverage <a href="javascript:void(0)" onclick="deletecovrage()" style="float:right;color:#BA3032; margin-right:20px" >Delete Coverage</a>';
		$('#lbl_samplecoverage').html(html);
	} 
 
}
function deletecovrage(){
	$("#samplecoverage").val('');
	$("#samplecoverage").trigger('change');
}
function delete_other(){
	$(".delete_btn").click(function(){ 
		if($(this).parent().parent().attr('id') == 'manager_btn'){
			$(".add_other[data-div=manager_btn]").show();
		}else if($(this).parent().parent().attr('id') == 'agent_btn'  ){
			$(".add_other[data-div=agent_btn]").show();
		}
		
		if($(this).parent().parent().attr('data-div') == 'left_writer_add' || $(this).parent().parent().attr('data-div') == 'left_storyby_add'){
			$(".add_other[data-div="+$(this).parent().parent().attr('data-div')+"]").attr('data-count',parseInt($(".add_other[data-div="+$(this).parent().parent().attr('data-div')+"]").attr('data-count')-1));	
		}
		
		//$(this).parent().parent().find(".add_other").attr('data-count',parseInt($(this).parent().parent().find(".add_other").attr('data-count')-1));
		$(this).parent().fadeOut( 500 )
		$(this).parent().delay( "slow" ).remove();
	});
}

function close_docs(ele,id){
	$("#"+id).remove();
	$(ele).parent().remove();
}


function PreviewImage(input) {
	if (input.files && input.files[0]) {
		
		if (/^image/.test( input.files[0].type)){
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#profile_avt').attr('src', e.target.result);
			}
			
			reader.readAsDataURL(input.files[0]);
		}else{
			alert('Please upload valid image file');	
		}
	}
}



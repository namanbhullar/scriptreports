/* ====================================================================
 * bootstrap-ajax.js v0.6.0
 * ====================================================================
 * Copyright (c) 2014, Paras software 
 * All rights reserved.
 * 
 
 
 /*global Spinner:true*/
 
 
 $(document).ready(function(){
	 $("#email_verify").on('keyup',function(eve){
		 var email_regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		 var email		=	eve.currentTarget.value;
		 if(email_regex.test(email)){
			 $.ajax({
			type:'post',
			url:BASEURL+'/myaccount/invite_friends/search',
			data:'email='+email,
			success:function(data){
				if(data != 'fail'){
					var position	=	 $("#email_verify").position();
					var height	=	$("#email_verify").outerHeight(true);
					var html = "<div class=\"addition_msg\"><img alt=\"\" class=\"left_arrow\" src=\""+BASEURL+"\/myaccount\/public\/images\/left_arrow.png\"><div id=\"Inner_addition_msg\">"+data+"</div></div>";
					
					if($(".addition_msg").length > 0){
						$(".addition_msg").remove();
					}
					
					$("#email_verify").parent().append(html);
					$(".addition_msg").css({top:(position.top + 40),left:(position.left+10)});
					$(".addition_msg").fadeIn('fast');
					$(".insubmit.right").attr("type","button").css({"background-color":"rgba(186, 48, 50,0.5)"});
				}else{
					$(".addition_msg").fadeOut('fast');
					$(".insubmit.right").attr("type","submit").css({"background-color":"rgba(186, 48, 50,1)"});
				}
			}
		})	
		 }else{
			 $(".insubmit.right").attr("type","button");
			 $(".insubmit.right").css({"background-color":"rgba(186, 48, 50,0.5)"})
			 if(eve.currentTarget.value == ""){
				 $(".insubmit.right").attr("type","submit").css({"background-color": "rgba(186, 48, 50,1)"});
			 }
		 }
	 });
	 
	$('a.fav-star').click(function(){ 
		
		var inboxid = $(this).attr('data-inboxid');
		var id = $(this).attr('data-id');
		var activecls	=	$("#sorting li.active").attr('id');
		
		if(id==0){
						
					$("#favstar-"+inboxid).attr('data-id','1');
					$("#favli-"+inboxid).addClass('favSelected');
					$("#favli-"+inboxid).removeClass('fav');
					$("#message-"+inboxid).addClass('favorite');
				}else{
					$("#favstar-"+inboxid).attr('data-id','0');
					$("#favli-"+inboxid).removeClass('favSelected');
					$("#favli-"+inboxid).addClass('fav');
					$("#message-"+inboxid).removeClass('favorite');	
				}
		
					
		$.ajax({
			type:'post',
			url:BASEURL+'/myaccount/inbox/'+inboxid+'/updatefav',
			data:'fav='+id,
			success:function(data){
				
			}	
		})	
		return false;
	}); 
	 
	 
	 
	 $(".messagetaskul li").click(function(){
		
			var id		=	$(this).parent().attr("data-id");
			var type	=	$(this).attr("data-type");
			var model	=	$("#model").val();
			
			var activecls	=	$("#sorting li.active").attr('id');
			if(type=='trash'){
				$("#message-"+id).remove();
			}
			
			if(type=='archive'){
				$("#message-"+id).hide();
				$("#message-"+id).addClass('archived');
				$("#message-").removeClass('messages');
				$("#message-").removeClass('sent');
				$(this).parent().find("li[data-type='unarchive']").show();
			}
			if(type=='unarchive'){
				$("#message-"+id).hide();
				var classss	=	$(this).attr("data-class");
				$("#message-"+id).addClass(classss);
				$(this).parent().find("li[data-type='archive']").show();
			}
			if(type=='read'){
				$("#message-"+id).removeClass('unread');
				$("#message-"+id).addClass('read');
				$(this).parent().find("li[data-type='unread']").show();
			}
			if(type=='unread'){
				$("#message-"+id).addClass('unread');	
				$("#message-"+id).removeClass('read');			
				$(this).parent().find("li[data-type='read']").show();
			}
			
			
			$(this).hide();
			$(".messagetaskul").hide("slow"); 
			$("#message-"+id+" input[type='checkbox']").attr('checked',false);
			
			if($("."+activecls).length==0){
				$(".no-records").show('slow');
			}
			
			
			$.ajax({ 
						type:'post',
						url:BASEURL+'/myaccount/inbox/dopopuptask',
						data:'id='+id+'&type='+type,
						success:function(data){
							
						}
					});	
		}); 
	 
	 
	$(".deleteqst").click(function(){
			
			var id	=	$(this).attr("data-id"); 
			
			$.ajax({ 
						type:'post',
						url:BASEURL+'/myaccount/report-template/DeleteCustomQuestion',
						data:'id='+id,
						beforeSend:function(){
							$('#loading_'+id).show();
						},
						success:function(data){
							$('#loading_'+id).hide();
							$("#arrayorder_"+id).hide('slow');
						}
					});
	});
	
	$(".deletecat").click(function(){
			
			var id	=	$(this).attr("data-id"); 
			
			$.ajax({ 
						type:'post',
						url:BASEURL+'/myaccount/report-template/DeleteCustomCategory',
						data:'id='+id,
						beforeSend:function(){
							//$('#loading_'+id).show();
						},
						success:function(data){
							//$('#loading_'+id).hide();
							$("#catli-"+id).hide('slow');
						}
					});
	});
	$("#sentmessageforscript").submit(function(){
		var form = $("#sentmessageforscript").serialize();
		$.ajax({
				type:'post',
				url:BASEURL+'/myaccount/script-manager/sendmessageforscript',
				data:form,
				beforeSend:function(data){
						},
				success:function(data){
				}
			});
		$("#SentScriptPopup").delay(800).hide();		
		alert('Your message was sent');
		return false;
	});
	
	$("#sentmsgByAjax_form").submit(function(){
		var form	=	$("#sentmsgByAjax_form").serialize(); 
			$.ajax({ 
						type:'post',
						url:BASEURL+'/myaccount/inbox/SendMessageByAjax',
						data:form,
						beforeSend:function(data){
							$('#editloading').show();
						},
						success:function(data){ 
							var dataObj = JSON.parse(data);
							if(dataObj.status=='ok'){
							$('#editloading').hide();
							$("#SendScriptFeedback").hide();
							$("#SentScriptPopup").hide();	
							alert(dataObj.msg);
							
							setTimeout(function(){
								$("#sentTemplate").hide();
								$("#light").hide();
								$("#fade").hide();
								$("#messagebox").hide();
								$("#sentmsgByAjax_form input[type=text],#sentmsgByAjax_form input[type=email], #sentmsgByAjax_form textarea").val("");
								},2000);
							
							}else{
								$('#editloading').hide();		
								$("#messagebox").html(dataObj.msg);
								$("#SendScriptFeedback").hide();
								$("#messagebox").show();
								$("#messagebox").removeClass('success')
								$("#messagebox").addClass('alert')
							}
						}
					});
			
			return false;	
	});
	
	
	
$(".sendtemplate").click(function(){
		
		var status 	= 	$(this).attr("data-status");
		var msg 	=	(status==2) ? "You have already sent report to client. Do you wish to send again ?." : "Do you want to submit report back to client ?";
		if(window.confirm(msg)){
			var id		=	$(this).attr("data-id");
			var owner	=	$(this).attr("data-owner");
			
			$(this).attr("data-status",'2');
			$.getJSON( BASEURL+'/myaccount/script-reports/SentTemplate', { id: id, owner: owner } )
					.done(function( json ) {
						alert(json.msg);
					})
					.fail(function( jqxhr, textStatus, error ) {
					var err = textStatus + ", " + error;
					console.log( "Request Failed: " + err );
				});
		}
	});	
	
	$(".tempatearchived").click(function(){
		
		if(window.confirm('Do you really want to archive the template ?')){	
			var id		=	$(this).attr("data-id");
			$.getJSON( BASEURL+'/myaccount/script-reports/ArchiveTemplate', { id: id} )
					.done(function( json ) {
						alert(json.msg);
					})
					.fail(function( jqxhr, textStatus, error ) {
					var err = textStatus + ", " + error;
					console.log( "Request Failed: " + err );
				});
		}
	}); 
	
	
	$(".AddToFavorite").click(function(){
		
			var id		=	$(this).attr("data-id");
			var type	=	$(this).attr("data-type");
			var status	=	$(this).attr("data-status");
			
			
			if(status=='active'){
				
				if(window.confirm('This '+type+' already added in your favorites, Do you want to remove it ?' )){
					$(this).attr("data-status","inactive");
					$.ajax({
						type:'post',
						url:BASEURL+'/myaccount/RemoveItemFromFav',
						data:'id='+id+'&type='+type,
						beforeSend:function(data){
							$('#AddToFavorite-'+id+' #favstatus').removeClass('fa-check');
							$('#AddToFavorite-'+id+' #favstatus').addClass('fa-spinner');
							$('#AddToFavorite-'+id+' #favstatus').addClass('fa-spin'); 
						},
						success:function(data){
							var dataObj = JSON.parse(data);
							$('#AddToFavorite-'+id+' #favstatus').removeClass('fa-check');
							$('#AddToFavorite-'+id+' #favstatus').removeClass('fa-spinner');
							$('#AddToFavorite-'+id+' #favstatus').removeClass('fa-spin'); 
							
							alert(dataObj.msg);
						},
						failure:function( jqxhr, textStatus, error ) {
							var err = textStatus + ", " + error;
							console.log( "Request Failed: " + err );
						}
					});
				}
			}else{
					$(this).attr("data-status","active");
					$.ajax({
						type:'post',
						url:BASEURL+'/myaccount/AddItemToFav',
						data:'id='+id+'&type='+type,
						beforeSend:function(data){
							$('#AddToFavorite-'+id+' #favstatus').removeClass('fa fa-check');
							$('#AddToFavorite-'+id+' #favstatus').addClass('fa fa-spinner');
							$('#AddToFavorite-'+id+' #favstatus').addClass('fa fa-spin'); 
						},
						success:function(data){
							var dataObj = JSON.parse(data);
							$('#AddToFavorite-'+id+' #favstatus').removeClass('fa fa-spinner');
							$('#AddToFavorite-'+id+' #favstatus').removeClass('fa fa-spin'); 							
							$('#AddToFavorite-'+id+' #favstatus').addClass('fa fa-check');
							alert(dataObj.msg);
						},
						failure:function( jqxhr, textStatus, error ) {
							var err = textStatus + ", " + error;
							console.log( "Request Failed: " + err );
						}
					});
			}
			/*$.getJSON( BASEURL+'/myaccount/AddItemToFav', { id: id,type:type} )
					.done(function( json ) {
						alert(json.msg);
					})
					.fail(function( jqxhr, textStatus, error ) {
					var err = textStatus + ", " + error;
					console.log( "Request Failed: " + err );
				});*/
		
	});
	
	$(".draft-headings ul li a").click(function(){
		
		var id			=	$(this).attr("data-id");
		var type		=	$(this).attr("data-type");
		var val			=	$(this).attr("data-value");
		var draft		=	$(this).attr("data-draft");
		
			$.ajax({ 
					type:'post',
					url:BASEURL+'/myaccount/mydocuments/delete-draft',
					data:'id='+id+'&type='+val+'&draft='+draft,
					success:function(data){
						//var draft		=	$(this).attr("data-draft");
						
						$("#"+draft+'ul').html(data);
						$("#"+draft).val('0');
					}
				});
	});
	
	$(".taskul li a").click(function(){
		var rel_id	=	'';
		var id			=	$(this).attr("data-id");
		var type		=	$(this).attr("data-type");
		var model		=	$("#model").val();
		rel_id			=	$(this).attr("data-rel_id");
		if(model == 'myscript_writer'){
			return;
		}
		if(model=='MyScript'){
			var activecls	=	$("#sortingScript li.active").attr('data-id');
		}else{
			var activecls	=	$("#sorting li.active").attr('id');
		}
		if(type=='download'){ 
			$(".taskul").hide("slow");
			$("#maindiv_"+id+" input[type='checkbox']").attr('checked',false);
			return;	
		}
		
		if(type=='setdraft'){
			$(".taskul").hide("slow");
			$("#maindiv_"+id+" input[type='checkbox']").attr('checked',false);
			return ;
		}
		
		if(type=='trash' && model == 'Requestall'){
			$("#maindiv_R_"+id).remove();
		}		
		else if(type=='trash'){
			$("#maindiv_"+id).remove();
		}
		
		if(type == 'select'){
			return;
		}
		
		if(type=='archive'){
			$("#maindiv_"+id).addClass('archived');
			
			if(model=='MyScript'){
				$(this).parent().parent().find("a[data-type='archive']").parent().hide();
				$(this).parent().parent().find("a[data-type='unarchive']").parent().show();
				$("#maindiv_"+id).removeClass('MyScriptPac');
			}
			
			if(model=='ScriptReport'){
				$("#unarchive"+id+"li").css("display","inline-block");
				$("#archive"+id+"li").css("display","none");
				$("#maindiv_"+id).removeClass('progress');	
				$("#maindiv_"+id).removeClass('completed');	
			}
			
			if(model=='Templates'){
				$("#maindiv_"+id).removeClass('draft');	
				$("#maindiv_"+id).removeClass('posted');	
			}
			
			if(model=='Favorites'){
				$("#maindiv_"+id).removeClass('user');	
				$("#maindiv_"+id).removeClass('template');	
				$("#maindiv_"+id).removeClass('inboxmsg');	
			}
			
			if(model=='Contacts'){
				$("#maindiv_"+id).removeClass('siteuser');	
				$("#maindiv_"+id).removeClass('guest');
				$(this).parent().parent().find("li[data-type='archive']").hide();
				$(this).parent().parent().find("li[data-type='unarchive']").show();
				
			}
			if(model=='Requestall'){
				$("#maindiv_R_"+id).hide();
				$("#maindiv_R_"+id).removeClass('reader');
				$("#maindiv_R_"+id).addClass('archived');
				$(this).parent().parent().find("li[data-type='archive']").hide();
				$(this).parent().parent().find("li[data-type='unarchive']").show();
			}
		}
		if(type=='unarchive' ){			
			$("#maindiv_"+id).removeClass('archived');
			
			if(model=='ScriptReport'){
				$("#archive"+id+"li").css("display","inline-block");
				$("#unarchive"+id+"li").css("display","none");
				$("#maindiv_"+id).addClass('progress');	
			}
						
			if(model=='Templates'){
				var draft	=	$(this).attr("data-class");
				
				if(draft==1)
					$("#maindiv_"+id).addClass('draft');
				else
					$("#maindiv_"+id).addClass('posted');		
			}
			
			if(model=='Favorites'){
				var tcls	=	$(this).attr("data-class");
				if(tcls=='message')
					$("#maindiv_"+id).addClass('inboxmsg');
				else
					$("#maindiv_"+id).addClass(tcls);		
			}
			
			if(model=='Contacts'){
				var cls	=	$(this).attr("data-class");
				if(cls == 1)
					$("#maindiv_"+id).addClass('siteuser');
				if(cls == 2)
					$("#maindiv_"+id).addClass('guest');
				if(cls == 3){
					$("#maindiv_R_"+id).removeClass('archived');
					$("#maindiv_R_"+id).hide();
					$("#maindiv_R_"+id).addClass('reader');
				}
				$(this).parent().parent().find("li[data-type='archive']").show();
				$(this).parent().parent().find("li[data-type='unarchive']").hide();
			}
			
			if(model=='MyScript'){
				if($("#maindiv_"+id).attr('data-owner') == '1'){
					$("#maindiv_"+id).addClass('MyScriptPac');
				}else{
					$("#maindiv_"+id).addClass('new');
				}
				
				$(this).parent().parent().find("a[data-type='archive']").parent().show();
				$(this).parent().parent().find("a[data-type='unarchive']").parent().hide();
			}
			
		}
		
		$(".taskul").hide("slow");
		$("#maindiv_"+id+" input[type='checkbox']").attr('checked',false);		 
		 if(activecls!='undefined'){
			$("#maindiv_"+id).hide('slow');
			if($("."+activecls).length==0){
				$(".no-records").show('slow');
			}else{
				$(".no-records").hide('slow');
					$("." +activecls).show('slow');
			}
			
		 }
		
		
		$.ajax({ 
					type:'post',
					url:BASEURL+'/myaccount/indextaskajax',
					data:'id='+id+'&type='+type+'&model='+model+'&rel_id='+rel_id,
					success:function(data){
						
					}
				});	
	});
	
	//function for sending message for a script 
	$("#my-script_scri .send-message a").click(function(){
		var url = BASEURL+'/myaccount/inbox/SendMessageByAjax';
		var form	=	$("#sentmsgByAjax_form").serialize();
	});	//function for sending feedback for script
	$("#TxtFdbScr").click(function(){
		var url = BASEURL+'/myaccount/inbox/SendMessageByAjax';
		var form	=	$("#sentmsgByAjax_form").serialize();
		$.ajax({
				type:'post',
				url:url,
				data:form,
				success:function(data){
						var dataObj = JSON.parse(data);
						if(dataObj.status=='ok'){
							alert(dataObj.msg);
						}
					}
				});
		
	});
	
	$(".rmv_scrpt_prf").click(function(){
		if($(".rmv_scrpt_prf").attr('data-remove') == 'true'){
			var script_id	=	$(this).attr('data-id');
			 $.ajax({
				url:BASEURL+'/myaccount/script-manager/remove-script-profile',
				method:'post',
				data:'id='+script_id,
				success:function(data){
					alert('Successfully Delete frome profile');
					$("#rmv_scrpt_prf_"+script_id).html('<i class="fa fa-user-plus"></i>');
					$("#rmv_scrpt_prf_"+script_id).attr('href',BASEURL+'/myaccount/script-manager/add-script-profile/'+script_id);
					$("#rmv_scrpt_prf_"+script_id).attr('title','Add to profile');
					$("#rmv_scrpt_prf_"+script_id).attr('data-remove','false');
					$("#rmv_scrpt_prf_"+script_id).colorbox({iframe:true, width:"80%", height:"80%"});
					$("#cboxOverlay").trigger('click');
				}
			});
		}
	});
	$("#email_verifieddd").blur(function(){ //alert('asddf');
		$("#submit").attr('data-submit','false');
		$("#send_script_request").attr('data-submit','false');
		/*---------For Script Request page------*/
		var value	=	$(this).val();
		//if(value.match(/^(([a-zA-Z]|[0-9])|([-]|[_]|[.]))+[@](([a-zA-Z0-9])|([-])){2,63}[.](([a-zA-Z0-9]){2,63})+$/)){
			var matching = value.match(/^(([a-zA-Z]|[0-9])|([-]|[_]|[.]))+[@](([a-zA-Z0-9])|([-])){2,63}[.](([a-zA-Z0-9]){2,63})+$/);
			$.ajax({
				type:'post',
				url:BASEURL+'/myaccount/invite_friends/search',
				data:'email='+matching[0],
				success:function(data){
					if(data != 'fail'){
						var position	=	 $("#email_verified").position();
						var height	=	$("#email_verified").outerHeight(true);
						var html = "<div class=\"addition_msg\"><img alt=\"\" class=\"left_arrow\" src=\""+BASEURL+"\/myaccount\/public\/images\/left_arrow.png\"><div id=\"Inner_addition_msg\">"+data+"</div></div>";
						if($(".addition_msg").length > 0){
							$(".addition_msg").remove();
						}
						$("#email_verified").parent().append(html);						
						$(".addition_msg").css({top:(position.top + height),left:(position.left)});
						$(".addition_msg").fadeIn('fast');
					}else{
						$(".addition_msg").fadeOut('fast');
						$("#submit").attr('data-submit','true');
						$("#send_script_request").attr('data-submit','true');
					}
				}
			});
		//}else{
		//	$("#submit").attr('data-submit','true');
		//}
	});
	
	$(".textInput").focus(function(){
		RemoveEmailDiv();	
	});
	
	$(".notification").click(function(){
		$(".notify-ul").slideToggle( 'slow' );
		/*$(".notify-count").html("0");
		notification	=	$("#notification_id").val();
		if(notification != "" || notification != 'undefined'){
			$.ajax({
					type:'post',
					data:'ids=' + notification,
					url:BASEURL + '/myaccount/notifications/seen',
					success:function(){
							$("#notification_id").val("");
						}
			});
		}*/
	});
})

function MessageByAjax(url, data){
	var result =	false;
	$.ajax({
				type:'post',
				url:url,
				data:data,
				success:function(data){
					result	=	 data;
				}
			});
	return	false;
}

function AddQuestion(){
	
		var form	=	$("#Addquestion_form").serialize();
		//alert(form);
		$.ajax({ 
						type:'post',
						url:BASEURL+'/myaccount/report-template/AddCustomQuestion',
						data:form,
						beforeSend:function(data){
							$('#loading').show('slow');
						},
						success:function(data){
							var dataObj = JSON.parse(data);
				
							if(dataObj.status=='ok'){
								$("#light").hide('slow');
								$("#fade").hide('slow');
								$("#questions-div").append(dataObj.html);
								$('#loading').hide('slow');
								$("#add_q").val('');
								form.reset();
							}else{
								 alert('Sorry, we are not able to process your request. ' + " This question is already in list please try diffrent one");		
								$('#loading').hide('slow');
								form.reset();
							}
								
						}
					});
}


function AddCategory(){
	
		var form	=	$("#Addcategory_form").serialize();
		//alert(form);
		$.ajax({ 
						type:'post',
						url:BASEURL+'/myaccount/report-template/AddCustomCategory',
						data:form,
						dataType: "text",
						beforeSend:function(data){
							$('#catloading').show('slow');
						},
						success:function(data){
							var dataObj = JSON.parse(data);
				
							if(dataObj.status=='ok'){ 
								//$("#addcategory").hide('slow');
								//$("#fade").hide('slow');
								hidePOPups("addcategory");
								hidePOPups("catloading");
								$("#template-cat").append(dataObj.html);
								//$('#catloading').hide('slow');
								$("#add_cat").val('');
								form.reset();
							}else{
								 alert('Sorry, we are not able to process your request, please try again');		
							}
								
						}
					});
}

function UPdateQuestion(){
	
		var form	=	$("#Editquestion_form").serialize();
		
		$.ajax({ 
						type:'post',
						url:BASEURL+'/myaccount/report-template/UpdateCustomQuestion',
						data:form,
						beforeSend:function(data){
							$('#editloading').show();
						},
						success:function(data){ 
							var dataObj = JSON.parse(data);
							$("#title_"+dataObj.id).html(dataObj.text);
							$("#editQuetions").hide();
							$("#fade").hide();
							$('#editloading').hide();
								
						}
					});
}


function UPdateCategory(){
	
		var form	=	$("#Editcategory_form").serialize();
		
		$.ajax({ 
						type:'post',
						url:BASEURL+'/myaccount/report-template/UpdateCustomCategory',
						data:form,
						beforeSend:function(data){
							$('#editcatloading').show();
						},
						success:function(data){ 
							var dataObj = JSON.parse(data);
							$("#cat_title_"+dataObj.id).html(dataObj.text);
							$("#hid_cattext_"+dataObj.id).val(dataObj.fulltext)
							hidePOPups("editCategory");
							hidePOPups("editCategory");
							//$("#editCategory").hide('slow');
							//$("#fade").hide('slow');
							//$('#editcatloading').hide('slow');
								
						}
					});
}



function FilterUser(val){
	
	$.ajax({ 
			type:'post',
			url:BASEURL+'/myaccount/report-template/filteruser',
			data:form,
			beforeSend:function(data){
				//$('#editloading').show();
			},
			success:function(data){ alert(data);
				//var dataObj = JSON.parse(data);
				
					
			}
		});
}

function hidePOPups(id){
		document.getElementById(id).style.display='none';
		document.getElementById("fade").style.display='none';		
}
function SentScriptRequest(id){
	
	$.ajax({ 
			type:'post',
			url:BASEURL+'/myaccount/profile/sendscriptrequest',
			data:'sid='+id,
			beforeSend:function(data){
				$('.loading-'+id).addClass('fa-spinner');
				$('.loading-'+id).addClass('fa-spin'); 
				$('.loading-'+id).show();
			},
			success:function(data){ 
				console.log(data);
				$('.loading-'+id).removeClass('fa-spinner');
				$('.loading-'+id).removeClass('fa-spin'); 
				$('.loading-'+id).hide();
				alert(data.msg);
			}
		});
}
function SentProfileRequest(id){ 
	var msg	=	"'Request already sent. You cannot sent another Request.'";
	$.ajax({ 
			type:'post',
			url:BASEURL+'/myaccount/profile/SentAddProfileRequest',
			data:'sid='+id,
			beforeSend:function(data){
				$('.loading').html('<i class="fa fa-spinner fa-2 fa-spin"></i>');
				$('.loading').show();
			},
			success:function(data){ 
				console.log(data);
				$('.loading').html('<a class="Add_profile_btn" onclick="alert('+msg+')">Request Sent</a>');
				alert(data.msg);
			}
		});
}

function SetRequestResult(id, result){
	var msg = "'sent mssage'"
	var resion	=	'';
	if(result=='decline'){
		resion=prompt("Please Give A Resion For Rejection", "");
		$.ajax({
			type:'post',
			url:BASEURL+'/myaccount/profile/SendRequestResultMail/'+id,
			data:'comment='+resion,
			
		});
	}
	$.ajax({
		type:'post',
		url:BASEURL+'/myaccount/profile/'+id+'/SetRequestResult',
		data: 'result='+result,
		beforeSend:function(data){
			$('.request').html('<i class="fa fa-spinner fa-2 fa-spin"></i>');
		},
		success:function(data){ 
			console.log(data);
			$('.request').html('<a class="Add_profile_btn" onclick="alert('+msg+')"> '+data.msg+'</a>');
		}
	});
	
}
function delet_docs(docs_id,script_id,type,id){
	$("#"+id).hide('slow');
	$.ajax({
		type:'post',
		url:BASEURL+'/myaccount/script-manager/my-script/delete_docs',
		data: "docs_id="+docs_id+"&type="+type+"&script_id="+script_id,
		success:function(data){
		console.log(data);
		alert("document deleted successfully");
		}
	});
	
}
//send text feedback to sender of script
function reply_fdb(id){
	var message	=	$("#TxtAFdb").val();
	$.ajax({
		type:'post',
		url:BASEURL+'/myaccount/script-manager/my-script/txtfeedback',
		data:'id='+id+'&message='+message,
		beforeSend:function(){
			$("#TxtAFdbloading").addClass('animating');
		},
		success:function(data){
			$("#TxtAFdbloading").removeClass('animating');
			alert('Your feedback has been sent');			
		}
		});
}

function SendScriptFeedback(id, feedback, track_id){
	var check	=	$("#maindiv_"+id);
	if(check.hasClass("myscriptdetails")){
		$("#maindiv_"+id+" .ared-border-a").removeClass('active');
		$("#maindiv_"+id+" .ared-border-a").addClass('faded');
		$("#maindiv_"+id+" #"+feedback).addClass('active');
		$("#maindiv_"+id+" #"+feedback).removeClass('faded');
		$("#maindiv_"+id+" .sub-feedback other").removeClass('faded');
		
	}else{
		$(".ared-border-a").removeClass('active');
		$(".feedback .ared-border-a").addClass('faded');
		$("#"+feedback).addClass('active');
		$("#"+feedback).removeClass('faded');
		$(".ared-border-a.fedbacksubA").removeClass('faded');
	}
	var route	=	BASEURL+'/myaccount/script-manager/my-script/feedback';
	$.ajax({ 
						type:'post',
						url:route,
						data:"script_id="+id+"&feedback="+feedback,
						success:function(data){ 
								if(!$(".myscriptdetails").hasClass("script-view")){
									var Aclass		=	$("#sortingScript .active").attr("data-id");
									switch(feedback){
										case 'buy':
											$("#maindiv_"+id).attr("class","myscriptdetails all buy");
											if(!$("#maindiv_"+id).hasClass(Aclass)) $("#maindiv_"+id).hide('slow');
										break;
											
										case 'Priority':
											$("#maindiv_"+id).attr("class","myscriptdetails all priority");
											if(!$("#maindiv_"+id).hasClass(Aclass)) $("#maindiv_"+id).hide('slow');
										break;
											
										case 'Rejected':
											$("#maindiv_"+id).attr("class","myscriptdetails all rejected");
											if(!$("#maindiv_"+id).hasClass(Aclass)) $("#maindiv_"+id).hide('slow');
										break;
											
										case 'Considered':
											$("#maindiv_"+id).attr("class","myscriptdetails all consider");
											if(!$("#maindiv_"+id).hasClass(Aclass)) $("#maindiv_"+id).hide('slow');
										break;
										
										case 'Recommended':
											$("#maindiv_"+id).attr("class","myscriptdetails all recommend");
											if(!$("#maindiv_"+id).hasClass(Aclass)) $("#maindiv_"+id).hide('slow');
										break;
									}								
									if($("."+Aclass).length==0)	$(".no-records").show('slow');									
									
								}	
							
						}
					});

}
function ajax_script_search(SearchScript){
	 $.ajax({
		url:BASEURL+'/myaccount/script-manager/my-script/script_ajax_search',
		method:'post' ,
		data:'SearchScript='+SearchScript,
		success:function(data){
			$("#submit-search").hide();
			$(".MySearch_close").show();
			 $("#search_result").show();
			 $("#search_result").html(data);			
		}
	});
 }


function IsEmaiExists(val){
	 //alert('asddf');
		$("#submit").attr('data-submit','false');
		$("#send_script_request").attr('data-submit','false');
		
		//var IsValid	=	false;
		/*---------For Script Request page------*/
		var value	=	val;
		//if(value.match(/^(([a-zA-Z]|[0-9])|([-]|[_]|[.]))+[@](([a-zA-Z0-9])|([-])){2,63}[.](([a-zA-Z0-9]){2,63})+$/)){
			//var matching = value.match(/^(([a-zA-Z]|[0-9])|([-]|[_]|[.]))+[@](([a-zA-Z0-9])|([-])){2,63}[.](([a-zA-Z0-9]){2,63})+$/);
			$.ajax({
				type:'post',
				url:BASEURL+'/myaccount/invite_friends/search',
				data:'email='+val,
				success:function(data){
					if(data != 'fail'){
						var position	=	 $(".tagedit-list").position();
						var height	=	$("#email_verified").outerHeight(true);
						var html = "<div class=\"addition_msg\"><img alt=\"\" class=\"left_arrow\" src=\""+BASEURL+"\/myaccount\/public\/images\/left_arrow.png\"><div id=\"Inner_addition_msg\">"+data+"</div></div>";
						if($(".addition_msg").length > 0){
							$(".addition_msg").remove();
						}
						$(".tagedit-list").parent().append(html);						
						$(".addition_msg").css({top:(position.top + 70),left:(position.left+10)});
						$(".addition_msg").fadeIn('fast');
						var lnt	=	$('.tagedit-listelement').length-1;
						$( "ul .tagedit-listelement:nth-child("+lnt+")").remove();
					}else{
						$(".addition_msg").fadeOut('fast');
						$("#submit").attr('data-submit','true');
						$("#send_script_request").attr('data-submit','true');
					}
				}
			});
		return true;
}
function addContact(to,sender){
	$.ajax({
		type:'get',
		url:BASEURL+'/myaccount/contacts/'+to+'/add/'+sender,
		data:'to='+to,
		success:function(data){
			alert(data);			
		}
		})
}
function RemoveEmailDiv(){
	$(".addition_msg").remove();	
}

// JavaScript Document
(function($){
	$(document).ready(function(){
		$("#AddQuestionBtn").click(function(){
			var form	=	document.getElementById("Addquestion_form");
			$.ajax({
				method:'post',
				headers:{'X-CSRF-TOKEN':TOKEN},
				url:form.action,
				data:'title=' + form.title.value + '&post_cat_id=' + form.post_cat_id.value,
				beforeSend:function(){
					$("#addQuestion").addClass('loadinganimation').addClass('animating')
				},
				complete:function(){
					$("#addQuestion").removeClass('loadinganimation').removeClass('animating')
				},
				error:function(){
					FlashMessage('Error in Request. PLease Try Again later',false);
				},
				success:function(data){
					if(data.status == 'fail')
					{
						FlashMessage(data.msg,false);
						
					}
					else
					{
						FlashMessage('Question Added Successfully',true);
						var $html	=	$(data);
						var chbx	=	$html.find('input[type="checkbox"]')
						console.log(chbx)
						chbx.convertCheckBox();
						chbx.click(function(){$(this).remove()})
						$html.appendTo("#questions-div");
						
						//$('input[name="questions[''][]"]')
						
					}
					form.reset();
					$.fancybox.close();
				}
			});
		});
		
		
		//upsate Question
		$("#UPdateQuestion").click(function(){
			var form	=	document.getElementById("Editquestion_form");
			$.ajax({
				method:'post',
				headers:{'X-CSRF-TOKEN':TOKEN},
				url:form.action,
				data:'updated_title=' + form.updated_title.value + '&question_id=' + form.question_id.value,
				beforeSend:function(){
					$("#editQuetions").addClass('loadinganimation').addClass('animating')
				},
				complete:function(){
					$("#editQuetions").removeClass('loadinganimation').removeClass('animating')
				},
				error:function(){
					FlashMessage('Error in Request. PLease Try Again later',false);
				},
				success:function(data){
					if(data.status == 'ok')
					{
						FlashMessage(data.msg,true);
						$("#title_" + form.question_id.value).html(form.updated_title.value);
						$("#hid_text_" + form.question_id.value).val(form.updated_title.value);
					}
					else
					{
						FlashMessage(data.msg,false);
					}
					form.reset();
					$.fancybox.close();
				}
			});
		});
		
		$("#QDeleteCancel").click(function(){
			var form	=	document.getElementById("deleteQuestion");
			form.question_id.value=	"";
			form.reset();
			$.fancybox.close();
		})
		
		$("#QDeleteConfirm").click(function(){
			var form	=	document.getElementById("deleteQuestion");
			$.ajax({
				method:'post',
				headers:{'X-CSRF-TOKEN':TOKEN},
				url:form.action,
				data:'id=' + form.question_id.value,
				beforeSend:function(){
					$("#DeleteQuetions").addClass('loadinganimation').addClass('animating')
				},
				complete:function(){
					$("#DeleteQuetions").removeClass('loadinganimation').removeClass('animating')
				},
				error:function(){
					FlashMessage('Error in Request. PLease Try Again later',false);
				},
				success:function(data){
					if(data.status == 'ok')
					{
						FlashMessage(data.msg,true);
						$("#arrayorder_" + form.question_id.value).remove();
					}
					else
					{
						FlashMessage(data.msg,false);
					}
					form.reset();
					$.fancybox.close();
				}
			});
		});
		
		//CustomCategory PopUp
		$("#AddCustomCate").click(function(){
			$.fancybox.open({type:'inline',padding:0,href:"#addCategory",})			
		});
		
		
		$("#AddCategoryBtn").click(function(){
			var form	=	document.getElementById("addCategoryForm");
			$.ajax({
				method:'post',
				headers:{'X-CSRF-TOKEN':TOKEN},
				url:form.action,
				data:'title=' + form.title.value,
				beforeSend:function(){
					$("#addCategory").addClass('loadinganimation').addClass('animating')
				},
				complete:function(){
					$("#addCategory").removeClass('loadinganimation').removeClass('animating')
				},
				error:function(){
					FlashMessage('Error in Request. PLease Try Again later',false);
				},
				success:function(data){
					if(data.status == 'ok')
					{
						FlashMessage(data.msg,true);
						$("#template-cat").append(data.html);
					}
					else
					{
						FlashMessage(data.msg,false);
					}
					form.reset();
					$.fancybox.close();
				}
			});
		});
		
		$("#UpdateCategoryBtn").click(function(){
			var form	=	document.getElementById("editCategoryForm");
			$.ajax({
				method:'post',
				headers:{'X-CSRF-TOKEN':TOKEN},
				url:form.action,
				data:'updated_title=' + form.updated_title.value + '&category_id=' + form.category_id.value,
				beforeSend:function(){
					$("#editCategory").addClass('loadinganimation').addClass('animating')
				},
				complete:function(){
					$("#editCategory").removeClass('loadinganimation').removeClass('animating')
				},
				error:function(){
					FlashMessage('Error in Request. PLease Try Again later',false);
				},
				success:function(data){
					if(data.status == 'ok')
					{
						FlashMessage(data.msg,true);
						$("#hid_cattext_"+ form.category_id.value).val(form.updated_title.value);
						$("#cat_title_" + form.category_id.value).html(form.updated_title.value);
					}
					else
					{
						FlashMessage(data.msg,false);
					}
					form.reset();
					$.fancybox.close();
				}
			});
		});
		
		
		$("#CatDeleteCancel").click(function(){
			var form	=	document.getElementById("deleteCategory");
			form.category_id.value=	"";
			form.reset();
			$.fancybox.close();
		})
		
		$("#CatDeleteConfirm").click(function(){
			var form	=	document.getElementById("deleteCategory");
			$.ajax({
				method:'post',
				headers:{'X-CSRF-TOKEN':TOKEN},
				url:form.action,
				data:'id=' + form.category_id.value,
				beforeSend:function(){
					$("#DeleteCaTpop").addClass('loadinganimation').addClass('animating')
				},
				complete:function(){
					$("#DeleteCaTpop").removeClass('loadinganimation').removeClass('animating')
				},
				error:function(){
					FlashMessage('Error in Request. PLease Try Again later',false);
				},
				success:function(data){
					if(data.status == 'ok')
					{
						FlashMessage(data.msg,true);
						$("#cat_title_" + form.category_id.value).parent().remove();
					}
					else
					{
						FlashMessage(data.msg,false);
					}
					form.reset();
					$.fancybox.close();
				}
			});
		});
	});
})(jQuery)


function editqst(id){
	var form	=	document.getElementById("Editquestion_form");
	var text	=	$("#hid_text_"+id).val();
	
	form.question_id.value	=	id;
	form.updated_title.value	=	text;
	
	$.fancybox.open({
		type:'inline',
		padding:0,
		href:"#editQuetions",
	})
}

function deleteqst(id) {
	var form	=	document.getElementById("deleteQuestion");
	var text	=	$("#hid_text_"+id).val();
	
	form.question_id.value	=	id;
	$("#question_delete_text span").html(text);
	
	$.fancybox.open({
		type:'inline',
		padding:0,
		href:"#DeleteQuetions",
	})
}

function ShowInst(obj,id){
	if($(obj).is(':checked')){ 
		$("#int_"+id).show(1);
	}else{
		$("#int_"+id).hide(1);	
	}
}

function AddQuestionPopup(){
		$.fancybox.open({
			type:'inline',
			padding:0,
			href:"#addQuestion",
		})
}

function editcat(id){
	var form	=	document.getElementById("editCategoryForm");
	form.category_id.value	=	id;
	form.updated_title.value	=	$("#hid_cattext_"+ id).val();
	$.fancybox.open({
			type:'inline',
			padding:0,
			href:"#editCategory",
		})
}


function deletecat(id) {
	var form	=	document.getElementById("deleteCategory");
	var text	=	$("#hid_cattext_"+id).val();
	
	form.category_id.value	=	id;
	$("#category_delete_text").html(text);
	
	$.fancybox.open({
		type:'inline',
		padding:0,
		href:"#DeleteCaTpop",
	})
}

function PreviewTempalte(id){
		$("#post_template").val('0');
		var form	=	$("#Next_form").serialize();
		window.open(BASEURL+'/myaccount/report-template/'+id+'/savepreview?'+form, '_blank');

}

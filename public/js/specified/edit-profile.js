// JavaScript Document
(function($){
	$(document).ready(function(e) {
        $("#proflepic").bind('change',function(event){
				if (event.target.files && event.target.files[0]) {
		
					if (/^image/.test( event.target.files[0].type)){
						var reader = new FileReader();
						reader.onload = function (e) {
							$('#edit-profile-image').find("img").attr('src', e.target.result);
						}
						
						reader.readAsDataURL(event.target.files[0]);
					}else{
						FlashMessage('Please Choose valid image file',false);	
					}
				}
		});
		
		tinymce.init({
			selector: 'textarea#brief_boi', 
			width: parseInt($("textarea").parent().width()),
			height: 40,
			toolbar: 'bold italic | fontsizeselect | spellchecker ',
			plugins: 'spellchecker,wordcount',
			wordcount_countregex: /[\w\u2019\x27\-\u00C0-\u1FFF]+/g,
			wordcount_limit: 50,
			menubar:false,
			statusbar:true,
			browser_spellcheck: true,
			spellchecker_rpc_url:'spellchecker.php',
			resize:false,
			
		});
		
		tinymce.init({
			selector: 'textarea#about_me', 
			width: parseInt($("textarea").parent().width()),
			height: 200,
			toolbar: 'bold italic | fontsizeselect | spellchecker ',
			plugins: 'spellchecker',
			menubar:false,
			statusbar:true,
			browser_spellcheck: true,
			spellchecker_rpc_url:'spellchecker.php',
			resize:true,
		});
		
		
		$("#add-skill-btn").click(function(){
			var $wrp,$checkbox,$checkboxWrp,$chlbl,$input,$inputWrp,$dlbtn
			
			$checkbox	=	$('<input type="checkbox" value="fg" name="additional_skills[other][]" checked="checked">').hide();
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
			
			$("#add-profile-services").append($wrp);
			
			
		});
		
		$("#sample_coverageimg").bind('change',function(event){
			if (event.target.files && event.target.files[0]) {
				console.log(event.target.files[0].type)
				if (/^image/.test( event.target.files[0].type))
				{
					$('#samplecoverage').val(event.target.files[0].name);
					$("#delete_sampleCoverage").show();
					$("#coverageStatus").val("selected");
				}
				else if(event.target.files[0].type == "application/pdf")
				{					
					$('#samplecoverage').val(event.target.files[0].name);					
					$("#delete_sampleCoverage").show();
					$("#coverageStatus").val("selected");
				}
				else
				{
					FlashMessage('Please Choose valid file',false);	
				}
			}
			
		});
		
		$("#delete_sampleCoverage").click(function(){
			$('#samplecoverage').val(" ");
			$("#coverageStatus").val("no-select");
			$("#delete_sampleCoverage").hide();
		})
		
		$("#add-script-to-profile").click(function(){
			count	=	parseInt($(this).data('count'));
			var token	=	$('input[name="_token"]').val();
			var $Wrapper	=	$("<div></div>").addClass('col-1-1 pul15 Box relative mrgbt20').attr('id','profileScript' + count);
			$.ajax({
				headers:{'X-CSRF-TOKEN':token},
				method:'post',
				data:'count=' + count,
				url:BASEURL + '/myaccount/profile/edit/addScript',
				beforeSend:function(){
					console.log($Wrapper);
					$("#profile-scripts-part").append($Wrapper);
					$Wrapper.css({'min-height':'500px'}).addClass("loadinganimation").addClass("animating"); 
				},
				complete:function(){
					$Wrapper.delay( 500 ).removeClass("loadinganimation").removeClass("animating"); 
				},
				error:function(){
					FlashMessage("Inernal Server Error, Please Try Again Later",false);
				},
				success:function(data){
					$Wrapper.append(data);
					$("#add-script-to-profile").data('count',(count + 1));
				}
			})
		});
		
		$("#add-classes-to-profile").click(function(){
			count	=	parseInt($(this).data('count'));
			var $Wrapper	=	$("<div></div>").addClass('col-1-1 pul15 Box relative mrgbt20').attr('id','profileClasses' + count);
			$.ajax({
				headers:{'X-CSRF-TOKEN':TOKEN},
				method:'post',
				data:'count=' + count,
				url:BASEURL + '/myaccount/profile/edit/addClasses',
				beforeSend:function(){
					console.log($Wrapper);
					$("#profile-classes-part").append($Wrapper);
					$Wrapper.css({'min-height':'500px'}).addClass("loadinganimation").addClass("animating"); 
				},
				complete:function(){
					$Wrapper.delay( 500 ).removeClass("loadinganimation").removeClass("animating"); 
				},
				error:function(){
					FlashMessage("Inernal Server Error, Please Try Again Later",false);
				},
				success:function(data){
					$Wrapper.append(data);
					$("#add-classes-to-profile").data('count',(count + 1));
				}
			})
		});
		
		$("#add-contest-to-profile").click(function(){
			count	=	parseInt($(this).data('count'));
			var $Wrapper	=	$("<div></div>").addClass('col-1-1 pul15 Box relative mrgbt20').attr('id','profileContest' + count);
			$.ajax({
				headers:{'X-CSRF-TOKEN':TOKEN},
				method:'post',
				data:'count=' + count,
				url:BASEURL + '/myaccount/profile/edit/addContest',
				beforeSend:function(){
					console.log($Wrapper);
					$("#profile-contest-part").append($Wrapper);
					$Wrapper.css({'min-height':'500px'}).addClass("loadinganimation").addClass("animating"); 
				},
				complete:function(){
					$Wrapper.delay( 500 ).removeClass("loadinganimation").removeClass("animating"); 
				},
				error:function(){
					FlashMessage("Inernal Server Error, Please Try Again Later",false);
				},
				success:function(data){
					$Wrapper.append(data);
					$("#add-contest-to-profile").data('count',(count + 1));
				}
			})
		});
		
		
		
		$("#add-project-to-profile").click(function(){
			count	=	parseInt($(this).data('count'));
			var token	=	$('input[name="_token"]').val();
			var $Wrapper	=	$("<div></div>").addClass('col-1-1 pul15 Box relative mrgbt20').attr('id','profileProject' + count);
			$.ajax({
				headers:{'X-CSRF-TOKEN':token},
				method:'post',
				data:'count=' + count,
				url:BASEURL + '/myaccount/profile/edit/addProject',
				beforeSend:function(){
					console.log($Wrapper);
					$("#profile-project-part").append($Wrapper);
					$Wrapper.css({'min-height':'500px'}).addClass("loadinganimation").addClass("animating"); 
				},
				complete:function(){
					$Wrapper.delay( 500 ).removeClass("loadinganimation").removeClass("animating"); 
				},
				error:function(){
					FlashMessage("Inernal Server Error, Please Try Again Later",false);
				},
				success:function(data){
					$Wrapper.append(data);
					$("#add-project-to-profile").data('count',(count + 1));
				}
			})
		})
		
		$("#add-scriptpac-to-profile").click(function(){
			$.fancybox.open({
				href:BASEURL + "/myaccount/script-manager/scripts/iframe-index",
				type:"iframe",
				padding:"0px",
				minHeight:'80%',
			})
		});
		
		applydeleteScriptfunction();
		
		
    });
	
	
	
		
		
	$.fn.deleteScriptPac	=	function(){
		var id	=	$(this).data('id');
		
		$(this).click(function(){
			$item	=	$("#selectedScriptPac" + id),
			
			$.ajax({
				url:BASEURL + "/myaccount/script-manager/scripts/ScriptToProfile",
				method:'post',
				headers:{'X-CSRF-TOKEN':csrfToken},
				data:"id="+ id + "&status=removeProfile",
				beforeSend:function(){	
					$item.addClass("loadinganimation").addClass("animating"); 
				},
				complete:function(){
					$item.removeClass('loadinganimation').removeClass('animating');
				},
				error:function(){
					FlashMessage("Error in Request. Please Try After Some Time");
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
	}
	
})(jQuery)

function checkScript(id,event){
	if(event.target.files[0].type	==	"application/pdf")
	{
		$("#scriptname" + id).val(event.target.files[0].name);
		$("#file_" + id + "_status").val("change");
	}
	else
	{
		FlashMessage("File Not valid",false);
	}
}

function checkProjectPoster(id,event){
	if(/^image/.test(event.target.files[0].type))
	{
		$("#projectPoster" + id).val(event.target.files[0].name);
		$("#profject_image" + id + "_status").val("change");
	}
	else
	{
		FlashMessage("File Not valid",false);
	}
}

function checkClassesImage(id,event){
	if(/^image/.test(event.target.files[0].type))
	{
		$("#clasesImage" + id).val(event.target.files[0].name);
		$("#classes_image" + id + "_status").val("change");
	}
	else
	{
		FlashMessage("File Not valid",false);
	}
}

function checkContestImage(id,event){
	if(/^image/.test(event.target.files[0].type))
	{
		$("#conrestImage" + id).val(event.target.files[0].name);
		$("#cantest_image" + id + "_status").val("change");
	}
	else
	{
		FlashMessage("File Not valid",false);
	}
}

function checkProjectScript(id,event){
	if(event.target.files[0].type	==	"application/pdf")
	{
		$("#pojectscriptname" + id).val(event.target.files[0].name);
		$("#profject_script" + id + "_status").val("change");
	}
	else
	{
		FlashMessage("File Not valid",false);
	}
}

function applydeleteScriptfunction(){
	if(parseInt($(".scriptPac_delete").length) > 0){
		$(".scriptPac_delete").each(function(ele,index){
			if($(this).data('init') != 'true'){					
				$(this).deleteScriptPac()
				$(this).data('init','true');
			}
		})
	}
}
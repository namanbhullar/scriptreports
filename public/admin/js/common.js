
$(document).ready(function(){

<!-- Menu flytout function  -->	
	$("#menu .level-1").hover(function(){
		
			$("#menu .level-1 ul").hide();
			var sid = $(this).attr('data-id');
			$("#"+sid).show();	
			
		},
	
		function(){
			$("#menu .parrent ul").hide();	
		}
	
	);

$("#menu .level-2").hover(function(){
		
			$("#menu .level-2 ul").hide();
			var off	=	$(this).offset();
			//alert(off.top);
			var topmarging	=	parseInt(off.top)-parseInt('85.15');
			
			var sid = $(this).attr('data-id');
			
			$("#"+sid).css({
				top:topmarging+"px"	
			});	
			
			$("#"+sid).show();	
			
		},
	
		function(){
			//$("#menu .parrent ul").hide();	
		}
	
	);

	
<!-- Reset function for search form -->	
	$(".reset").click(function(){
		
		$("#search").val('');
		$("#searchform").submit();
	})
	
	
	
	
})


function submitForm(){
	$("#submitebutton").trigger('click');
	//$('#adminForm').submit();	
}

function setToolbarRoute(controller,task){ 
	
	if(task=='add' || task=='new'){
		window.location.href = ADMINURL+'/'+controller+'/'+task;	
	}
	
	if(task=='cancel' ){
		window.location.href = ADMINURL+'/'+controller;	
	}
	
	if(task=='cancel' ){
		window.location.href = ADMINURL+'/'+controller;	
	}
	
	if(task=='delete' || task=='activate' || task=='block' ){
		
		if($('.checkfield:checked').length==0){
			alert('Please select at least one record');	
		}else{
			$("#task").val(task);	
			$("#adminForm").submit();	
		}
	}
		
}

function AddNewWritingProjects(){
	
	var count	=	$("#writing_count").val();
	
	var htmll = '<div class="form-group group-2 writingdiv_'+count+'"><label for="writing_title_'+count+'">Title</label><input type="text" id="writing_title_'+count+'" value="" name="writing_title_'+count+'" placeholder="Title" class="text textInput it"></div><div class="form-group writingdiv_'+count+'"><label for="script_status_'+count+'">Script Status</label><select name="script_status_'+count+'" id="script_status_'+count+'"><option value="0">Script Status</option><option value="1">Script Written</option><option>Script Optioned</option><option value="3">Script Produced</option><option value="4">Published Book</option></select><input class="removebtn" type="button" name="addnew" value="Delete" onclick="DeleteWritingProjects(\''+count+'\');" /><input type="hidden" name="writing_delete_'+count+'" id="writing_delete_'+count+'" value="0" /></div>';
	
	$("#WritingProjects").append(htmll);
	$("#writing_count").val(parseInt(count)+1);	
}

function AddNewFilmProjects(){
	
	var count	=	$("#film_count").val();
	
	var htmll = '<div class="form-group group-2 filmdiv_'+count+'"><label for="film_title_'+count+'">Title</label><input type="text" id="film_title_'+count+'" value="" name="film_title_'+count+'" placeholder="Title" class="text textInput it"></div><div class="form-group filmdiv_'+count+'"><label for="film_credit_'+count+'">Film Credit</label><select name="film_credit_'+count+'" id="film_credit_'+count+'"><option value="0">Credit</option><option value="1">Writer</option><option value="2">Director</option><option value="3">Producer</option><option value="4">Writer/Director</option><option selected="selected" value="5">Writer/Producer</option><option value="6">Director/Producer</option><option value="7">Writer/Director/Producer</option></select></div><div class="form-group filmdiv_'+count+'"><label for="film_url_'+count+'">URL</label><input type="text" id="film_url_'+count+'" value="" name="film_url_'+count+'" placeholder="URL" class="text textInput it"></div><div class="form-group filmdiv_'+count+'"><label for="film_type_'+count+'">Film Type</label><select name="film_type_'+count+'" id="film_type_'+count+'"><option value="0">Film Type</option><option value="1">Student Film</option><option value="2">Short Film</option><option value="3">Webisode</option><option value="4">TV Show</option><option value="5">Documentary Film</option><option value="6">Feature Film</option><option value="7">Other</option></select><input class="removebtn" type="button" name="addnew" value="Delete" onclick="DeleteFimlProjects(\''+count+'\');" /><input type="hidden" name="film_delete_'+count+'" id="film_delete_'+count+'" value="0" /></div>'
	
	$("#FilmProjects").append(htmll);
	$("#film_count").val(parseInt(count)+1);	
		
}


function DeleteWritingProjects(id){
		
		$("#writing_delete_"+id).val('1');
		$('.writingdiv_'+id).hide();
}

function DeleteFimlProjects(id){
		
		$("#film_delete_"+id).val('1');
		$('.filmdiv_'+id).hide();
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
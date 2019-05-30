// JavaScript Document
(function($){
	$(document).ready(function(e) {		
		tinymce.init({
			selector: 'textarea#synopsis', 
			width: parseInt($("textarea").parent().width()),
			height: 200,
			toolbar: 'bold italic | fontsizeselect | spellchecker ',
			plugins: 'spellchecker,wordcount',
			wordcount_countregex: /[\w\u2019\x27\-\u00C0-\u1FFF]+/g,
			wordcount_limit: 800,
			menubar:false,
			statusbar:true,
			browser_spellcheck: true,
			spellchecker_rpc_url:'spellchecker.php',
			resize:true,
		});
		
		///Adding New Category
		$("#add_cat").click(function(){
			var cat_count	=	parseInt($(this).data('count')) + 1;
			var dlbtn	=	$("<span></span>").append("<i class=\"fa fa-trash\"></i>").addClass("delete_btn").attr("title","Delete this Category");
			var wrp		=	$("<div></div>").addClass('col-1-1 mrgbt20 relative');
			var input	=	
				"<label for=\"other\" class=\"it mrgbt5\">New Category</label> " +
				"<input type=\"text\" name=\"script_info[" + cat_count + "][name]\" placeholder=\"Category Name" + cat_count + "\" class=\"text textInput mrgbt5 it\" />" +
				"<input type=\"text\" name=\"script_info[" + cat_count + "][title]\" placeholder=\"Category Title" + cat_count + "\" class=\"text textInput mrgbt5 it\" />";
			wrp.append(input).append(dlbtn).appendTo("#other_category");
			
			dlbtn.css({'top':'-5px','right':'0%'});
			
			dlbtn.click(function(){ wrp.remove() });
			
			$(this).data('count',cat_count)
		})
		///Adding New Category
		
		
		
		///Adding New Writer
		$("#add_writer").click(function(){
			var input, wrp, dlbtn, count;
			count	=	parseInt($(this).data('count')) + 1;
			
			wrp	=	$("<div></div>").addClass('col-1-1 relative ymrg15');
			
			dlbtn	=	$("<span></span>").append("<i class=\"fa fa-trash\"></i>").addClass("delete_btn").attr("title","Delete this Category");
			
			input	=	
			"<div class=\"col-1-1 mrgbt10\">" +
				"<label class=\"it mrgbt5\" for=\"writer[" + count + "][name]\">Script Writer " + count + "</label> " +
				"<input type=\"text\" name=\"writer[" + count + "][name]\" placeholder=\"Script Writer Name\" class=\"text textInput it\"> " +
			 "</div>" +		 
			 "<div class=\"col-1-1 mrgbt10\"> " +
				"<label class=\"it mrgbt5\" for=\"writer[" + count + "][phone]\">Phone Number " + count + "</label> " +
				"<input type=\"text\"  name=\"writer[" + count + "][phone]\" placeholder=\"Script Writer Number\" class=\"text textInput it\"> " +
			 "</div> " +		 
			 "<div class=\"col-1-1 mrgbt10\"> " +
				"<label class=\"it mrgbt5\" for=\"writer[" + count + "][link]\">Member Link " + count + "</label> " +
				"<input type=\"text\" name=\"writer[" + count + "][link]\" placeholder=\"Member Link\" class=\"text textInput it\"> " +
			 "</div>";
			 
			 wrp.append(input).append(dlbtn).appendTo("#other_writer");
			 
			 dlbtn.css({'top':'-5px','right':'0%'});
			 
			 dlbtn.click(function() { wrp.remove(); $("#add_writer").data('count',parseInt($("#add_writer").data('count')) - 1); } )
			 $(this).data('count',count)
		})
		///Adding New Writer
		
		
		///Adding New Story	
		$("#add_story").click(function(){
			var input, wrp, dlbtn, count;
			count	=	parseInt($(this).data('count')) + 1;
			
			if($("#other_story").find("h4").length == 0) $("#other_story").append("<h4 class=\"BlueRadialHead mrgbt10\">Story By</h4>");
			
			wrp	=	$("<div></div>").addClass('col-1-1 relative ymrg15');
			
			dlbtn	=	$("<span></span>").append("<i class=\"fa fa-trash\"></i>").addClass("delete_btn").attr("title","Delete this Category");
			
			input	=	
				"<div class=\"col-1-1 mrgbt10\">" +
					"<label class=\"it mrgbt5\" for=\"story[" + count + "][name]\">Story Writer Name " + count + "</label> " +
					"<input type=\"text\" name=\"story[" + count + "][name]\" placeholder=\"Story Writer Name\" class=\"text textInput it\"> " +
				 "</div>" +		 
				 "<div class=\"col-1-1 mrgbt10\"> " +
					"<label class=\"it mrgbt5\" for=\"story[" + count + "][phone]\">Phone Number " + count + "</label> " +
					"<input type=\"text\" name=\"story[" + count + "][phone]\" placeholder=\"Story Writer Number\" class=\"text textInput it\"> " +
				 "</div> " +		 
				 "<div class=\"col-1-1 mrgbt10\"> " +
					"<label class=\"it mrgbt5\" for=\"story[" + count + "][link]\">Member Link " + count + "</label> " +
					"<input type=\"text\"  name=\"story[" + count + "][link]\" placeholder=\"Member Link\" class=\"text textInput it\"> " +
				 "</div>";
				
			 
			 wrp.append(input).append(dlbtn).appendTo("#other_story");
			 
			 dlbtn.css({'top':'-5px','right':'0%'});
			 
			 dlbtn.click(function() { wrp.remove(); $("#add_story").data('count',parseInt($("#add_story").data('count')) - 1); } )
			 $(this).data('count',count)
		})
		///Adding New Story
		
		
		
		///Adding New Source
		$("#add_source").click(function(){
			var input, wrp, dlbtn, count;
			count	=	parseInt($(this).data('count')) + 1;
			
			if($("#source_material").find("h4").length == 0) $("#source_material").append("<h4 class=\"BlueRadialHead mrgbt10\">Source Material</h4>");
			
			wrp	=	$("<div></div>").addClass('col-1-1 relative ymrg15');
			
			dlbtn	=	$("<span></span>").append("<i class=\"fa fa-trash\"></i>").addClass("delete_btn").attr("title","Delete this Category");
			input	=	
				"<div class=\"col-1-1 mrgbt10\">" +
					"<label class=\"it mrgbt5\" for=\"source][" + count + "][title]\">Title " + count + "</label> " +
					"<input type=\"text\" name=\"source[" + count + "][title]\" placeholder=\"Title\" class=\"text textInput it\"> " +
				 "</div>" +		 
				 "<div class=\"col-1-1 mrgbt10\"> " +
					"<label class=\"it mrgbt5\" for=\"source[" + count + "][form]\">Form " + count + "</label> " +
					getFormSelectInput("source[" + count + "][form][0]",'class="col-1-1" onchange="checkOhter(event)"') +
				 "</div> " +		 
				 "<div class=\"col-1-1 mrgbt10\"> " +
					"<label class=\"it mrgbt5\" for=\"source[" + count + "][author]\">Author " + count + "</label> " +
					"<input type=\"text\" name=\"source[" + count + "][author]\" placeholder=\"Author\" class=\"text textInput it\"> " +
				 "</div>" +
				 "<div class=\"col-1-1 mrgbt10\"> " +
					"<label class=\"it mrgbt5\" for=\"source[" + count + "][phone]\">Phone no" + count + "</label> " +
					"<input type=\"text\" name=\"source[" + count + "][phone]\" placeholder=\"Phone no\" class=\"text textInput it\"> " +
				 "</div>";
				
			 
			 wrp.append(input).append(dlbtn).appendTo("#source_material");
			 
			 dlbtn.css({'top':'-5px','right':'0%'});
			 
			 dlbtn.click(function() { wrp.remove(); $("#add_source").data('count',parseInt($("#add_source").data('count')) - 1); } )
			 $(this).data('count',count)
		})
		///Adding New Source
		
		
		///Adding New Agent
		$("#add_agent").click(function(){
			var input, wrp, dlbtn, $btn	=	$(this);
			
			
			
			wrp	=	$("<div></div>").addClass('col-1-1 relative ymrg15');
			
			dlbtn	=	$("<span></span>").append("<i class=\"fa fa-trash\"></i>").addClass("delete_btn").attr("title","Delete this Category");
			
			input	=	
				"<h4 class=\"BlueRadialHead mrgbt10\">Agent</h4>" +
				"<div class=\"col-1-1 mrgbt10\">" +
					"<label class=\"it mrgbt5\" for=\"agent[name]\">Agent Name</label> " +
					"<input type=\"text\" name=\"agent[name]\" placeholder=\"Agent Name\" class=\"text textInput it\"> " +
				 "</div>" +		 
				 "<div class=\"col-1-1 mrgbt10\"> " +
					"<label class=\"it mrgbt5\" for=\"agent[company]\">Company Name</label> " +
					"<input type=\"text\" name=\"agent[company]\" placeholder=\"Company Name\" class=\"text textInput it\"> " +
				 "</div> " +		 
				 "<div class=\"col-1-1 mrgbt10\"> " +
					"<label class=\"it mrgbt5\" for=\"agent[phone]\">Phone no</label> " +
					"<input type=\"text\"  name=\"agent[phone]\" placeholder=\"Phone no\" class=\"text textInput it\"> " +
				 "</div>" +
				 "<div class=\"col-1-1 mrgbt10\"> " +
					"<label class=\"it mrgbt5\" for=\"agent[link]\">ScriptReports Member Link</label> " +
					"<input type=\"text\" name=\"agent[link]\" placeholder=\"ScriptReports Member Link\" class=\"text textInput it\"> " +
				 "</div> " +
				 "<div class=\"col-1-1 mrgbt10\"> " +
					"<label class=\"it mrgbt5\" for=\"agent[address][street]\">Address</label> " +
					"<div class=\"col-1-1 mrgbt5\"><input type=\"text\" name=\"agent[address][street]\" placeholder=\"Street Name or No.\" class=\"text textInput it\"> </div>" +
					"<div class=\"col-1-1 mrgbt5\"><input type=\"text\" name=\"agent[address][street]\" placeholder=\"City\" class=\"text textInput it\"> </div>" +
					"<div class=\"col-1-1 mrgbt5\"><input type=\"text\" name=\"agent[address][state]\" placeholder=\"State\" class=\"text textInput it\"> </div>" +
					"<div class=\"col-1-1 mrgbt5\"><input type=\"text\" name=\"agent[address][zip]\" placeholder=\"Zip Code\" class=\"text textInput it\"> </div>" +
					"<div class=\"col-1-1 mrgbt5\"><input type=\"text\" name=\"agent[address][country]\" placeholder=\"Country\" class=\"text textInput it\"> </div>" +
					"<div class=\"clearfix\"></div>" +
				 "</div> ";
				
			 
			 wrp.append(input).append(dlbtn).appendTo("#agent");
			 
			 dlbtn.css({'top':'8px','right':'7px'});
			 
			  dlbtn.click(function() { wrp.remove(); $btn.show() } )
			 
			 $(this).hide();
		})
		///Adding New Agent
		
		
		///Adding New Manager
		$("#add_manager").click(function(){
			
			var input, wrp, dlbtn, $btn	=	$(this);
						
			wrp	=	$("<div></div>").addClass('col-1-1 relative ymrg15');
			
			dlbtn	=	$("<span></span>").append("<i class=\"fa fa-trash\"></i>").addClass("delete_btn").attr("title","Delete this Category");
			
			input	=	
				"<h4 class=\"BlueRadialHead mrgbt10\">Manager</h4>" +
				"<div class=\"col-1-1 mrgbt10\">" +
					"<label class=\"it mrgbt5\" for=\"manager[name]\">Manager Name</label> " +
					"<input type=\"text\" name=\"manager[name]\" placeholder=\"Manager Name\" class=\"text textInput it\"> " +
				 "</div>" +		 
				 "<div class=\"col-1-1 mrgbt10\"> " +
					"<label class=\"it mrgbt5\" for=\"manager[company]\">Company Name</label> " +
					"<input type=\"text\" name=\"manager[company]\" placeholder=\"Company Name\" class=\"text textInput it\"> " +
				 "</div> " +		 
				 "<div class=\"col-1-1 mrgbt10\"> " +
					"<label class=\"it mrgbt5\" for=\"manager[phone]\">Phone no</label> " +
					"<input type=\"text\"  name=\"manager[phone]\" placeholder=\"Phone no\" class=\"text textInput it\"> " +
				 "</div>" +
				 "<div class=\"col-1-1 mrgbt10\"> " +
					"<label class=\"it mrgbt5\" for=\"manager[link]\">ScriptReports Member Link</label> " +
					"<input type=\"text\" name=\"manager[link]\" placeholder=\"ScriptReports Member Link\" class=\"text textInput it\"> " +
				 "</div> " +
				 "<div class=\"col-1-1 mrgbt10\"> " +
					"<label class=\"it mrgbt5\" for=\"manager[address][street]\">Address</label> " +
					"<div class=\"col-1-1 mrgbt5\"><input type=\"text\" name=\"manager[address][street]\" placeholder=\"Street Name or No.\" class=\"text textInput it\"> </div>" +
					"<div class=\"col-1-1 mrgbt5\"><input type=\"text\" name=\"manager[address][street]\" placeholder=\"City\" class=\"text textInput it\"> </div>" +
					"<div class=\"col-1-1 mrgbt5\"><input type=\"text\" name=\"manager[address][state]\" placeholder=\"State\" class=\"text textInput it\"> </div>" +
					"<div class=\"col-1-1 mrgbt5\"><input type=\"text\" name=\"manager[address][zip]\" placeholder=\"Zip Code\" class=\"text textInput it\"> </div>" +
					"<div class=\"col-1-1 mrgbt5\"><input type=\"text\" name=\"manager[address][country]\" placeholder=\"Country\" class=\"text textInput it\"> </div>" +
					"<div class=\"clearfix\"></div>" +
				 "</div> ";
				
			 
			 wrp.append(input).append(dlbtn).appendTo("#manager");
			 
			 dlbtn.css({'top':'8px','right':'7px'});
			 
			 dlbtn.click(function() { wrp.remove(); $btn.show() } )
			 
			 $(this).hide();
		})
		///Adding New Manager
		
		
		
		//Ading New Documetns
		$("#add_docs").click(function(){
			var $wrp,$dlbtn, html,
			$this	=	$(this),
			count	=	parseInt($(this).data('count')) + 1;
			
			html	=	
			'<div id="other_docs_container_' + count + '" class="col-1-1 mrgbt20">' +
				'<label class="it mrgbt5" for="other_docs[' + count + ']">New Document ' + count + '</label>' +
				'<div class="col-1-1 mrgbt5">' +
					'<input type="text" name="other_docs[' + count + '][name]" placeholder="Documetn Name" class="text it">' +
				'</div>' +
				'<div class="col-2-3">' +
					'<input type="text" name="other_file_name_' + count + '" readonly="readonly" placeholder="Upload Document" class="text it" id="other_file_name_' + count + '">' +
				'</div>' +
				'<div class="col-1-3">' +
					'<div class="col-1-3 addScript-add-docs">' +
						'<i title="Uplaod File" onclick="javascript:$(\'#other_docs_file_' + count + '\').trigger(\'click\')" class="fa fa-upload"></i>' +
						'<input type="file" name="other_docs[' + count + '][file]" id="other_docs_file_' + count + '" onchange="fileSelect(\'other_file_name_' + count + '\',event); " accept="application/pdf" class="filebutton">' +
					'</div>' +
					'<div href="' + BASEURL + '/myaccount/script-manager/my-documents/iframe?script=addScript.js&name=other_file_name_' + count + '#other_docs_value_' + count + '" class="col-1-3 addScript-add-docs iframe-fancybox">' +
						'<i class="fa fa-plus"></i>' +
						'<input type="hidden" name="other_docs[' + count + '][document]" id="other_docs_value_' + count + '">' +
					'</div>' +
					'<div onclick="javascript:$(\'#other_docs_container_' + count + '\').remove()" class="col-1-3 addScript-add-docs"><i class="fa fa-trash"></i></div>' +
				'</div>' +
			'</div>';
			
			$("#other_docs").append(html);	
			enableDocIframe();
			$this.data('count',count);
		});
		//Adding New Documents
		
	});
})(jQuery)	

function enableDocIframe(){
	$(".iframe-fancybox").click(function(){
		var href	=	$(this).attr('href');
			$.fancybox.open({'type':'iframe','href':href,'padding':0,minHeight:500,});
	});
}
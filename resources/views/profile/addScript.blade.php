<?php
if(!isset($profileScript)){
	$count	=	request()->get('count');
	$profileScript	=	new stdClass();
	$profileScript->id	=	0;
	$profileScript->title	=	NULL;
	$profileScript->status	=	NULL;
	$profileScript->form	=	NULL;
	$profileScript->genre	=	NULL;
	$profileScript->subgenre	=	NULL;
	$profileScript->pages	=	NULL;
	$profileScript->script	=	NULL;
	$profileScript->document_name	=	NULL;
	$profileScript->document_id	=	NULL;
	$profileScript->permissions	=	NULL;
	
}else{
	$profileScript->load('scriptFile');	
}

 ?>
 

    <div class="col-1-1 mrgbt10">
        <div class="pull-left">
            <h4>Script {{ $count }}</h4>
        </div>
        <div class="pull-right ">
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#profileScript{{$count}}').remove()"><i class="fa fa-trash"></i></span>
        </div>
    </div>
    
    <div class="col-1-1 mrgbt15">
        <div class="col-1-1">
        	<?php $status	=	($profileScript->id != 0) ? "no_change" : "no-select";?>
            {!! Form::label("script[$count][script]",'Upload Script',['class'=>'it mrgbt5']) !!}
            {!! Form::hidden("script[$count][script_file_status]",$status,['id'=>"file_".$count."_status"]) !!}
        </div>
        <div class="col-1-1 relative">
            <div class="col-3-6 pulrt20">
                <input type="text" value="{{$profileScript->scriptFile->file_name}}" name="script[{{ $count }}][script]" placeholder="Upload Script" id="scriptname{{$count}}" class="browse text textInput it" required>
            </div>
            <div class="col-1-6  filebutton-div">
                <div class="col-1-1 pul10 filebutton-label">Browse...</div>
                <input type="file" accept="application/pdf" name="scriptFile[{{ $count }}]" class="filebutton" id="sample_coverageimg" onChange="checkScript({{$count}},event)">
                
            </div>
            <div class="col-7-24 pull-left pullft10">
                <i>pdf file Only</i>
            </div>       
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#file_{{$count}}_status').val('no-select');$('#scriptname{{$count}}').val('')">
            <i class="fa fa-trash"></i>
            </span>                  
            <div class="clearfix"></div>                       
        </div>
        <div class="clearfix"></div>                       
    </div>
    
    <div class="col-1-1 mrgbt15">
        {{ Form::label("script[$count][title]",'Title',['class'=>'it mrgbt5 required']) }}
        {{ Form::text("script[$count][title]",$profileScript->title,array('class'=>'text textInput it','placeholder'=>"Title",'required')) }}
    </div>
   
    
    @if($profileScript->id == 0)
    
    	<div class="col-1-1 mrgbt15" id="Formdiv">
			<?php $formlist	=	FormList(); ?>
            {{Form::label("script[$count][form][0]",trans('lang.form'),array('class'=>'it mrgbt5 required'))}}
            {{Form::select("script[$count][form][0]",$formlist,$profileScript->form,['class'=>'col-1-1','onchange'=>'checkOhter(event)','required'])}}
        </div>
        
        <div class="col-1-1 mrgbt15" id="Genrediv">
            <?php $genrelist	=	GenreList(); ?>
            {{Form::label("script[$count][genre][0]",trans('lang.genre'),array('class'=>'it mrgbt5 required'))}}
            {{Form::select("script[$count][genre][0]",$genrelist,$profileScript->genre,['class'=>'col-1-1','onchange'=>'checkOhter(event)','required'])}}
        </div>
        
        <div class="col-1-1 mrgbt15" id="Subgenrediv">
            <?php $subgenrelist	=	SubGenreList(); ?>
            {{Form::label("script[$count][subgenre][0]",trans('lang.sub-genre'),array('class'=>'it mrgbt5 required'))}}
            {{Form::select("script[$count][subgenre][0]",$subgenrelist,$profileScript->subgenre,['class'=>'col-1-1','onchange'=>'checkOhter(event)','required'])}}
        </div>
    	
    @else
    
    	<div class="col-1-1 mrgbt15" id="Formdiv">
			<?php $formlist	=	FormList();$formValue	=	$profileScript->form; ?>
            
            {{Form::label("script[$count][form][0]",trans('lang.form'),array('class'=>'it mrgbt5 required'))}}
            {{Form::select("script[$count][form][0]",$formlist,$formValue[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])}}
            
            @if(strtolower($formValue[0]) == 'other')
            	{{ Form::text("script[$count][form][1]",$formValue[1],["class"=>"text textInput it mrgtp8 form","placeholder"=>trans('lang.custom-form-placehlder')]) }}
            @endif
        </div>
        
        <div class="col-1-1 mrgbt15" id="Genrediv">
            <?php $genrelist	=	GenreList(); $genreValue	=	$profileScript->genre; ?>
           
            {{Form::label("script[$count][genre][0]",trans('lang.genre'),array('class'=>'it mrgbt5 required'))}}
            {{Form::select("script[$count][genre][0]",$genrelist,$genreValue[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)','required'])}}
            
             @if(strtolower($genreValue[0]) == 'other')
            	{{ Form::text("script[$count][genre][1]",$genreValue[1],["class"=>"text textInput it mrgtp8 genre","placeholder"=>trans('lang.custom-genre-placehlder')]) }}
            @endif
        </div>
        
        <div class="col-1-1 mrgbt15" id="Subgenrediv">
            <?php $subgenrelist	=	SubGenreList(); $subgenreValue	=	$profileScript->subgenre; ?>
            {{Form::label("script[$count][subgenre][0]",trans('lang.sub-genre'),array('class'=>'it mrgbt5 '))}}
            {{Form::select("script[$count][subgenre][0]",$subgenrelist,$subgenreValue[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])}}
            
            @if(strtolower($subgenreValue[0]) == 'other')
            	{{ Form::text("script[$count][subgenre][1]",$subgenreValue[1],["class"=>"text textInput it mrgtp8 subgenre","placeholder"=>trans('lang.custom-subgenre-placehlder')]) }}
            @endif
        </div>
    	
    @endif
    
     <div class="col-1-1 mrgbt15">
        {{ Form::label("script[$count][pages]",Pages,['class'=>'it mrgbt5 required']) }}
        {{ Form::text("script[$count][pages]",$profileScript->pages,array('class'=>'text textInput it','placeholder'=>"Pages",'required')) }}
    </div>
     
    
    
     <div class="col-1-1 mrgbt15">
        {{ Form::label("script[$count][logline]",Logline,['class'=>'it mrgbt5 required']) }}
        {{ Form::textarea("script[$count][logline]",$profileScript->logline,array('class'=>'text textInput it','placeholder'=>"Logline",'required')) }}
        
    </div>
   
    
    
   <div class="col-1-1 mrgbt15">
        {{ Form::label("script[$count][status]",'Script Status',['class'=>'it mrgbt5']) }}
        {{ Form::select("script[$count][status]",[
                                    "Available"=>"Available",
                                    "Optioned"=>"Optioned",
                                    "Sold"=>"Sold",
                                    "Produced"=>"Produced"
                                ],$profileScript->status,array('class'=>'text textInput it')) }}
    </div>
    
    <div class="col-1-1 mrgbt15">
        {{ Form::label("script[$count][permissions]",'Permissions',['class'=>'it mrgbt5']) }}
        {{ Form::select("script[$count][permissions]",[
                                    "View"=>"View",
                                    "Request"=>"Request"
                                ],$profileScript->permissions,array('class'=>'text textInput it')) }}
    </div>
    
    
    
    
    {{ Form::hidden("script[$count][id]",$profileScript->id) }}
    
   
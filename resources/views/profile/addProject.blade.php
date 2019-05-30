<?php

if(!isset($project)){
	$count	=	request()->get('count');
	$project	=	new stdClass();
	$project->id	=	0;
	$project->title	=	NULL;
	$project->status	=	NULL;
	$project->form	=	NULL;
	$project->genre	=	NULL;
	$project->subgenre	=	NULL;
	$project->pages	=	NULL;
	$project->script	=	NULL;
	$project->document_name	=	NULL;
	$project->document_id	=	NULL;
	$project->permissions	=	NULL;
	
}
else
{
	$project->load('scriptFile');
}

 ?>

    <div class="col-1-1 mrgbt10">
        <div class="pull-left">
            <h5>{{trans('lang.project')}} {{ $count }}</h5>
        </div>
        <div class="pull-right ">
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#profileProject{{$count}}').remove()"><i class="fa fa-trash"></i></span>
        </div>
    </div>
    <div class="col-1-1 mrgbt15">
        {{ Form::label("project[$count][title]",trans('lang.title'),['class'=>'it mrgbt5']) }}
        {{ Form::text("project[$count][title]",$project->title,array('class'=>'text textInput it','placeholder'=>trans('lang.title'))) }}
    </div>
    
    @if($project->id == 0)
    
        <div class="col-1-1 mrgbt15" id="Formdiv">
            <?php $formlist	=	FormList(); ?>
            {{Form::label("project[$count][form][0]",trans('lang.form'),array('class'=>'it mrgbt5'))}}
            {{Form::select("project[$count][form][0]",$formlist,$project->form,['class'=>'col-1-1','onchange'=>'checkOhter(event)'])}}
        </div>
        
        <div class="col-1-1 mrgbt15" id="Genrediv">
            <?php $genrelist	=	GenreList(); ?>
            {{Form::label("project[$count][genre][0]",trans('lang.genre'),array('class'=>'it mrgbt5'))}}
            {{Form::select("project[$count][genre][0]",$genrelist,$project->genre,['class'=>'col-1-1','onchange'=>'checkOhter(event)'])}}
        </div>
        
        <div class="col-1-1 mrgbt15" id="Subgenrediv">
            <?php $subgenrelist	=	SubGenreList(); ?>
            {{Form::label("project[$count][subgenre][0]",trans('lang.sub-genre'),array('class'=>'it mrgbt5'))}}
            {{Form::select("project[$count][subgenre][0]",$subgenrelist,$project->subgenre,['class'=>'col-1-1','onchange'=>'checkOhter(event)'])}}
        </div>
    
    @else
    
        <div class="col-1-1 mrgbt15" id="Formdiv">
            <?php $formlist	=	FormList();$formValue	=	$project->form; ?>
            
            {{Form::label("project[$count][form][0]",trans('lang.form'),array('class'=>'it mrgbt5'))}}
            {{Form::select("project[$count][form][0]",$formlist,$formValue[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])}}
            
            @if(strtolower($formValue[0]) == 'other')
                {{ Form::text("project[$count][form][1]",$formValue[1],["class"=>"text textInput it mrgtp8 form","placeholder"=>trans('lang.custom-form-placehlder')]) }}
            @endif
        </div>
        
        <div class="col-1-1 mrgbt15" id="Genrediv">
            <?php $genrelist	=	GenreList(); $genreValue	=	$project->genre; ?>
           
            {{Form::label("project[$count][genre][0]",trans('lang.genre'),array('class'=>'it mrgbt5'))}}
            {{Form::select("project[$count][genre][0]",$genrelist,$genreValue[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])}}
            
             @if(strtolower($genreValue[0]) == 'other')
                {{ Form::text("project[$count][genre][1]",$genreValue[1],["class"=>"text textInput it mrgtp8 genre","placeholder"=>trans('lang.custom-genre-placehlder')]) }}
            @endif
        </div>
        
        <div class="col-1-1 mrgbt15" id="Subgenrediv">
            <?php $subgenrelist	=	SubGenreList(); $subgenreValue	=	$project->subgenre; ?>
            {{Form::label("project[$count][subgenre][0]",trans('lang.sub-genre'),array('class'=>'it mrgbt5'))}}
            {{Form::select("project[$count][subgenre][0]",$subgenrelist,$subgenreValue[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])}}
            
            @if(strtolower($subgenreValue[0]) == 'other')
                {{ Form::text("project[$count][subgenre][1]",$subgenreValue[1],["class"=>"text textInput it mrgtp8 subgenre","placeholder"=>trans('lang.custom-subgenre-placehlder')]) }}
            @endif
        </div>
            
    @endif
    
    
    
     <div class="col-1-1 mrgbt15">
        {{ Form::label("project[$count][minutes]",trans('lang.minutes'),['class'=>'it mrgbt5']) }}
        {{ Form::text("project[$count][minutes]",$project->minutes,array('class'=>'text textInput it','placeholder'=>trans('lang.minutes'))) }}
    </div>
    
     <div class="col-1-1 mrgbt15">
        {{ Form::label("project[$count][rating]",trans('lang.rating'),['class'=>'it mrgbt5']) }}
        {{ Form::text("project[$count][rating]",$project->rating,array('class'=>'text textInput it','placeholder'=>trans('lang.rating'))) }}
    </div>
    
    <div class="col-1-1 mrgbt15">
        {{ Form::label("project[$count][release_date]",trans('lang.release-date'),['class'=>'it mrgbt5']) }}
        {{ Form::text("project[$count][release_date]",$profileScript->release_date,array('class'=>'text textInput it','placeholder'=>trans('lang.release-date'))) }}
    </div>
    
     <div class="col-1-1 mrgbt15">
        {{ Form::label("project[$count][link]",trans('lang.link-more-info'),['class'=>'it mrgbt5']) }}
        {{ Form::text("project[$count][link]",$project->link,array('class'=>'text textInput it','placeholder'=>trans('lang.link-more-info'))) }}
    </div>
    
    <div class="col-1-1 mrgbt15">
        {{ Form::label("project[$count][brief]",trans('lang.brief-description'),['class'=>'it mrgbt5']) }}
        {{ Form::textarea("project[$count][brief]",$project->brief,array('class'=>'text textInput it','placeholder'=>trans('lang.brief-description'))) }}
    </div>
    
    <div class="col-1-1 mrgbt15">
        <div class="col-1-1">
        	<?php $status	=	($project->id != 0) ? "no_change" : "no-select";?>
            {!! Form::label("project[$count][poster]",'Upload Poster',['class'=>'it mrgbt5']) !!}
            {!! Form::hidden("project[$count][poster_file_status]",$status,['id'=>"profject_image".$count."_status"]) !!}
        </div>
        <div class="col-1-1 relative">
            <div class="col-3-6 pulrt20">
                <input type="text" value="{{$project->poster}}" name="project[{{ $count }}][poster]" placeholder="Upload Poster" id="projectPoster{{$count}}" class="browse text textInput it">
            </div>
            <div class="col-1-6  filebutton-div">
                <div class="col-1-1 pul10 filebutton-label">Browse...</div>
                <input type="file" name="projectPoster[{{ $count }}]" class="filebutton" id="sample_coverageimg{{$count}}" onchange="checkProjectPoster({{$count}},event)">
            </div>
            <div class="col-7-24 pull-left pullft10">
                <i>{{ trans('lang.image-file-only') }}</i>
            </div>  
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#profject_image{{$count}}_status').val('no-select');$('#projectPoster{{$count}}').val('')">
            <i class="fa fa-trash"></i>
            </span>                        
            <div class="clearfix"></div>                       
        </div>
                         
        <div class="clearfix"></div>     
    </div>
    
    <div class="col-1-1 mrgbt15">
        <div class="col-1-1">
	        <?php $status	=	($project->id != 0) ? "no_change" : "no-select";?>
            {!! Form::label("project[$count][script]",'Upload Script',['class'=>'it mrgbt5']) !!}
            {!! Form::hidden("project[$count][script_file_status]",$status,['id'=>"profject_script".$count."_status"]) !!}
        </div>
        <div class="col-1-1 relative">
            <div class="col-3-6 pulrt20">
                <input type="text" value="{{$project->scriptFile->file_name}}" name="project[{{ $count }}][script]" placeholder="Upload Script" id="pojectscriptname{{$count}}" class="browse text textInput it">
            </div>
            <div class="col-1-6  filebutton-div">
                <div class="col-1-1 pul10 filebutton-label">Browse...</div>
                <input type="file" accept="application/pdf" name="projectScript[{{ $count }}]" class="filebutton" id="sample_coverageimg" onchange="checkProjectScript({{$count}},event)">
            </div>
            <div class="col-7-24 pull-left pullft10">
                <i>pdf file Only</i>
            </div>
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#profject_script{{$count}}_status').val('no-select');$('#pojectscriptname{{$count}}').val('')">
            <i class="fa fa-trash"></i>
            </span>                       
            <div class="clearfix"></div>                       
        </div>
        <div class="clearfix"></div>                       
    </div>
    
    
   
    
    
    {{ Form::hidden("project[$count][id]",$project->id) }}
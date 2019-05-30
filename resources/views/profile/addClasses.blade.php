<?php

if(!isset($classes)){
	$count	=	request()->get('count');
	$classes	=	new stdClass();
	$classes->id	=	0;
	$classes->title	=	NULL;
	$classes->class_dates	=	NULL;
	$classes->location	=	NULL;
	$classes->category	=	[];
	$classes->image	=	NULL;
	$classes->description	=	NULL;
	$classes->bullet1	=	NULL;
	$classes->bullet2	=	NULL;
	$classes->bullet3	=	NULL;
	$classes->link	=	NULL;
	
}

 ?>

    <div class="col-1-1 mrgbt10">
        <div class="pull-left">
            <h5>{{trans('lang.class')}} {{ $count }}</h5>
        </div>
        <div class="pull-right ">
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#profileClasses{{$count}}').remove()"><i class="fa fa-trash"></i></span>
        </div>
    </div>
    <div class="col-1-1 mrgbt15">
        {{ Form::label("classes[$count][title]",trans('lang.title'),['class'=>'it mrgbt5']) }}
        {{ Form::text("classes[$count][title]",$classes->title,array('class'=>'text textInput it','placeholder'=>trans('lang.title'))) }}
    </div>
    
    @if($classes->id == 0)
        
        <div class="col-1-1 mrgbt15">
             <?php $categorylist	=	ClassesCategories(); ?>
            {{Form::label("classes[$count][category][0]",trans('lang.category'),array('class'=>'it mrgbt5'))}}
            {{Form::select("classes[$count][category][0]",$categorylist,$classes->subgenre,['class'=>'col-1-1','onchange'=>'checkOhter(event)'])}}
        </div>
    
    @else
    
        <div class="col-1-1 mrgbt15" id="Formdiv">
            <?php $categorylist	=	ClassesCategories();$category	=	$classes->category;  ?>
            
            {{Form::label("classes[$count][category][0]",trans('lang.form'),array('class'=>'it mrgbt5'))}}
            {{Form::select("classes[$count][category][0]",$categorylist,$category[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])}}
            
            @if(strtolower($category[0]) == 'other')
                {{ Form::text("classes[$count][category][1]",$category[1],["class"=>"text textInput it mrgtp8 category","placeholder"=>trans('lang.custom-category-placehlder')]) }}
            @endif
        </div>       
            
    @endif
    
    
    
     <div class="col-1-1 mrgbt15">
        {{ Form::label("classes[$count][date]",trans('lang.date'),['class'=>'it mrgbt5']) }}
        {{ Form::text("classes[$count][date]",$classes->class_dates,array('class'=>'text textInput it','placeholder'=>trans('lang.date'))) }}
    </div>
    
     <div class="col-1-1 mrgbt15">
        {{ Form::label("classes[$count][location]",trans('lang.location'),['class'=>'it mrgbt5']) }}
        {{ Form::text("classes[$count][location]",$classes->location,array('class'=>'text textInput it','placeholder'=>trans('lang.location'))) }}
    </div>
    
    <div class="col-1-1 mrgbt15">
    	<label class="it mrgbt5" for="classes[{{$count}}][bullet1]" >{!! trans('lang.at-a-glance') !!} <i>: bullet points for quick read</i></label>
        {{ Form::text("classes[$count][bullet1]",$classes->bullet1,array('class'=>'text textInput it','placeholder'=>trans('lang.bullet')." 1")) }}
        {{ Form::text("classes[$count][bullet2]",$classes->bullet2,array('class'=>'text mrgtp5 textInput it','placeholder'=>trans('lang.bullet')." 2")) }}
        {{ Form::text("classes[$count][bullet3]",$classes->bullet3,array('class'=>'text mrgtp5 textInput it','placeholder'=>trans('lang.bullet')." 3")) }}
    </div>
        
    <div class="col-1-1 mrgbt15">
        {{ Form::label("classes[$count][description]",trans('lang.description'),['class'=>'it mrgbt5']) }}
        {{ Form::textarea("classes[$count][description]",$classes->description,array('class'=>'text textInput it','placeholder'=>trans('lang.description'))) }}
    </div>
    
    <div class="col-1-1 mrgbt15">
        {{ Form::label("classes[$count][link]",trans('lang.website'),['class'=>'it mrgbt5']) }}
        {{ Form::text("classes[$count][link]",$classes->link,array('class'=>'text textInput it','placeholder'=>trans('lang.website'))) }}
    </div>
    
    <div class="col-1-1 mrgbt15 ">
        <div class="col-1-1">
        	<?php $status	=	($classes->id != 0) ? "no_change" : "no-select";?>
            {!! Form::label("project[$count][script]",'Upload Image',['class'=>'it mrgbt5']) !!}
            {!! Form::hidden("classes[$count][images_status]",$status,['id'=>"classes_image".$count."_status"]) !!}
        </div>
        <div class="col-1-1 relative">
            <div class="col-3-6 pulrt20">
                <input type="text" value="{{$classes->image}}" name="classes[{{ $count }}][image]" placeholder="Upload Image" id="clasesImage{{$count}}" class="browse text textInput it">
            </div>
            <div class="col-1-6  filebutton-div">
                <div class="col-1-1 pul10 filebutton-label">Browse...</div>
                <input type="file" name="classesImage[{{ $count }}]" class="filebutton" onchange="checkClassesImage({{$count}},event)">
            </div>
            <div class="col-7-24 pull-left pullft10">
                <i>{{ trans('lang.image-file-only') }}</i>
            </div>   
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#classes_image{{$count}}_status').val('no-select');$('#clasesImage{{$count}}').val('')">
            <i class="fa fa-trash"></i>
            </span>                         
            <div class="clearfix"></div>                       
        </div>
        <div class="clearfix"></div>                       
    </div>
    
    
   
    
    
    {{ Form::hidden("classes[$count][id]",$classes->id) }}
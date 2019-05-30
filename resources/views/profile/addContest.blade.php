<?php

if(!isset($contest)){
	$count	=	request()->get('count');
	$contest	=	new stdClass();
	$contest->id	=	0;
	$contest->title	=	NULL;
	$contest->date	=	NULL;
	$contest->entry_deadline	=	NULL;
	$contest->entry_fee	=	NULL;
	$contest->description	=	NULL;
	$contest->image	=	NULL;
	$contest->link	=	NULL;
	
}

 ?>

    <div class="col-1-1 mrgbt10">
        <div class="pull-left">
            <h5>{{trans('lang.contest')}} {{ $count }}</h5>
        </div>
        <div class="pull-right ">
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#profileContest{{$count}}').remove()"><i class="fa fa-trash"></i></span>
        </div>
    </div>
    <div class="col-1-1 mrgbt15">
        {{ Form::label("contest[$count][title]",trans('lang.title'),['class'=>'it mrgbt5']) }}
        {{ Form::text("contest[$count][title]",$contest->title,array('class'=>'text textInput it','placeholder'=>trans('lang.title'))) }}
    </div>
    
     <div class="col-1-1 mrgbt15">
        {{ Form::label("contest[$count][date]",trans('lang.event-date'),['class'=>'it mrgbt5']) }}
        {{ Form::text("contest[$count][date]",$contest->date,array('class'=>'text textInput it','placeholder'=>trans('lang.event-date'))) }}
    </div>
    
     <div class="col-1-1 mrgbt15">
        {{ Form::label("contest[$count][entry_fee]",trans('lang.entry-fee'),['class'=>'it mrgbt5']) }}
        {{ Form::text("contest[$count][entry_fee]",$contest->entry_fee,array('class'=>'text textInput it','placeholder'=>trans('lang.entry-fee'))) }}
    </div>
    
    <div class="col-1-1 mrgbt15">
        {{ Form::label("contest[$count][entry_deadline]",trans('lang.entry-deadline'),['class'=>'it mrgbt5']) }}
        {{ Form::text("contest[$count][entry_deadline]",$contest->entry_deadline,array('class'=>'text textInput it','placeholder'=>trans('lang.entry-deadline'))) }}
    </div>
    
    <div class="col-1-1 mrgbt15">
        {{ Form::label("contest[$count][description]",trans('lang.full-desc'),['class'=>'it mrgbt5']) }}
        {{ Form::textarea("contest[$count][description]",$contest->description,array('class'=>'text textInput it','placeholder'=>trans('lang.full-desc'))) }}
    </div>
    
    <div class="col-1-1 mrgbt15">
        {{ Form::label("contest[$count][link]",trans('lang.link-more-info'),['class'=>'it mrgbt5']) }}
        {{ Form::text("contest[$count][link]",$contest->link,array('class'=>'text textInput it','placeholder'=>trans('lang.link-more-info'))) }}
    </div>
    
    
    <div class="col-1-1 mrgbt15">
        <div class="col-1-1">
        	<?php $status	=	($contest->id != 0) ? "no_change" : "no-select";?>
            {!! Form::label("contest[$count][script]",'Upload Image',['class'=>'it mrgbt5']) !!}
            {!! Form::hidden("contest[$count][images_status]",$status,['id'=>"cantest_image".$count."_status"]) !!}
        </div>
        <div class="col-1-1 relative">
            <div class="col-3-6 pulrt20">
                <input type="text" value="{{$contest->image}}" name="contest[{{ $count }}][image]" placeholder="Upload Image" id="conrestImage{{$count}}" class="browse text textInput it">
            </div>
            <div class="col-1-6  filebutton-div">
                <div class="col-1-1 pul10 filebutton-label">Browse...</div>
                <input type="file" name="contestImage[{{ $count }}]" class="filebutton" onchange="checkContestImage({{$count}},event)">
            </div>
            <div class="col-7-24 pull-left pullft10">
                <i>{{ trans('lang.image-file-only') }}</i>
            </div>   
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#cantest_image{{$count}}_status').val('no-select');$('#conrestImage{{$count}}').val('')">
            <i class="fa fa-trash"></i>
            </span>                       
            <div class="clearfix"></div>                       
        </div>
        <div class="clearfix"></div>                       
    </div>
    
    
   
    
    
    {{ Form::hidden("contest[$count][id]",$contest->id) }}
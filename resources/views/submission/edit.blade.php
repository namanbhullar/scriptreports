@extends('layouts.myaccount')

@section('content')
	<h1 class="heading_tital">{{ trans('lang.submission-page-head') }}</h1>
    {!! Form::open(['url'=>route('submission.update'),'files'=>true]) !!}
    	<div class="col-2-3">
        	<div class="col-1-1 mrgbt50">
                <h4 class="BlueRadialHead mrgbt10">{{ strtoupper(trans('lang.script-desc')) }}</h4>
                <div class="col-1-1 mrgbt20">
                    {{Form::textarea('guideline_desc',$submission->description,array('class' => 'textArea it','id'=>'guideline_desc','placeholder' => trans('lang.script-desc-placeholder')))}}
                </div>
                
                
                <div class="clearfix"></div>    
            </div>
            
            <!-- Release Form Upload And Select Section --->            
            <div class="col-1-1">
            	<h4 class="BlueRadialHead mrgbt10">{{ strtoupper(trans('lang.submission-head2')) }}</h4>
                <div class="col-1-1 mrgtp10 Box pul20">
                    <div class="col-1-2">    
	                    {{ Form::label('release_form_value',trans('lang.release-form'),['class'=>'it']) }}
						<?php $restatus = (!empty($submission->release_form)) ? "unchanged" : "no_select"; ?>
                        {{ Form::hidden('release_form_value',$submission->release_form,array('id'=>'release_form_value')) }}
                        {{ Form::hidden('release_form_status',$restatus,['id'=>'release_form_status']) }}
						
                        <a href="{!!
                        	(!empty($submission->release_form)) ?
                             $submission->rfdoc->link :
                             "javascript:void(0)"
                            
                        !!}" id="release-url">  {!! 
                        	(!empty($submission->release_form)) ? 
                            "(&nbsp;".$submission->rfdoc->file_name."&nbsp;)" :
                            "No File Selected";
                         !!} </a>
                    </div>
                    <div class="col-1-2">
                        <div class="col-1-3 addScript-add-docs">
                        	<i class="fa fa-upload" onClick="javascript:$('#release_form').trigger('click')" title="Uplaod File"></i>
                        	{{Form::file('release_form',array('onchange'=>'selectReleaseform(event);','class' => 'filebutton','accept'=>'application/pdf','id'=>'release_form'))}}
                        </div>
                        <div class="col-1-3 addScript-add-docs" id="addReleaseForm">
                        	 <i class="fa fa-plus"></i>
                        </div>
                        <div class="col-1-3 addScript-add-docs" id="deleteReleaseForm" {!! (empty($submission->release_form)) ? "style=\"display:none\"" : "" !!}>
                        	<i class="fa fa-trash"></i>
                        </div>
                    	<div class="clearfix"></div>       
                    </div>
                	<div class="clearfix"></div>    
                </div>
                
            </div>            
            <!-- Release Form Upload And Select Section --->
            
            <div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">        
                	{{Form::checkbox('script','1',$submission->script)}}
                </div>
                <div class="left mrglft15">
                    {{Form::label('script',trans('lang.script'),['class'=>'it ymrg2'])}}
                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">        
                	{{Form::checkbox('logline','1',$submission->logline)}}
                </div>
                <div class="left mrglft15">
                    {{Form::label('logline',trans('lang.logline'),['class'=>'it ymrg2'])}}
                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">        
                	{{Form::checkbox('synopsis','1',$submission->synopsis)}}
                </div>
                <div class="left mrglft15">
                    {{Form::label('synopsis',trans('lang.synopsis'),['class'=>'it ymrg2'])}}
                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">        
                	{{Form::checkbox('coverage','1',$submission->coverage)}}
                </div>
                <div class="left mrglft15">
                    {{Form::label('coverage',trans('lang.coverage-report'),['class'=>'it ymrg2'])}}
                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">        
                	{{Form::checkbox('treatment','1',$submission->coverage)}}
                </div>
                <div class="left mrglft15">
                    {{Form::label('treatment',trans('lang.treatment'),['class'=>'it ymrg2'])}}
                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">        
                	{{Form::checkbox('character_break','1',$submission->coverage)}}
                </div>
                <div class="left mrglft15">
                    {{Form::label('character_break',trans('lang.character-breakdown'),['class'=>'it ymrg2'])}}
                </div>
                <div class="clearfix"></div>    
            </div>
            
            <!--- User Custom Files -->
            <?php 
				$additional	=	is_null($submission->add_docs) ? array() : unserialize($submission->add_docs);
				$count		=	1;
				
			?>
            <div class="col-1-1" id="add_docs">
            	 @foreach($additional as $key=>$other)
                    <div class="col-1-1 mrgtp10 Box pul10 relative" id="other{{ $count }}">
                    	<span class="delete_btn mrg10" onclick="javascript:$('#other{{ $count }}').remove()"><i class="fa fa-trash"></i></span>
                        <div class="left">        
	                        {{Form::checkbox('additional_docs[]',$key,true)}}
                        </div>
                        <div class="left mrglft15">
    	                    {{Form::label($key,$key,['class'=>'it ymrg2'])}}
                        </div>
                        <div class="clearfix"></div>    
                    </div>
                    <div class="clearfix"></div>
                  @endforeach
            </div>
            <!--- User Custom Files -->
            <div class="btn btn-primary btn-icon fa-plus ymrg20" id="add_docsBtn">{{ trans('lang.add-docs') }}</div>
            
             <!--- CheckFor Submission --->
            <div class="col-1-1 Box ymrg20 pul15">
                <div class="col-1-2"><h4>{{ trans('lang.select-1-of-folowing') }}</h4></div>
                <div class="col-1-1 mrgtp20">
                    <div class="left">
                        <label class="it ymrg2">
                        {{Form::radio('accept_submissions','0',($submission->accept_submissions == 0))}}
                        &nbsp;&nbsp;{{trans('lang.submission-term-no')}}
                        </label>
                    </div>
                </div>     
                <div class="col-1-1 mrgtp20">
                    <div class="left">
                    	<label class="it ymrg2">
                        {{Form::radio('accept_submissions','1',($submission->accept_submissions == 1))}}
                        &nbsp;&nbsp;{{ trans('lang.submission-term-yes') }}
                         </label>
                    </div>
                </div>                                     
            </div>
            <!--- CheckFor Submission --->
            
            
            
           
            <!-- Select Approved Reader ----->
            <div class="col-1-1 Box ymrg20 pul15">
            	<div class="left"><label for="addReader" class="it pultop5" >{{ trans('lang.submission-head3') }}</label></div>
                <div class="right">
                	<div class="btn btn-primary btn-icon fa-plus" id="addReader">Add Reader</div>
                </div>
            </div>
            <!-- Select Approved Reader ----->
            
            <!-- Approved Reader List----->
            <div class="col-1-1">
	            <?php $submission->load('reader.user.profile'); ?>
                @foreach($submission->reader as $reader)
                	<div class="col-1-1 Box pul10 mrgbt10 relative">
                        <div class="left ymrg15 mrgrt15">
                        	{!! Form::checkbox('reader[]',$reader->id,$reader->status) !!}
                        </div>
                    	<div class="left tumbnail-vsm">
                            @if($reader->user->profile->profile_img) 
                                {{ Html::image("public/uploads/profiles/users/".$reader->reader_id."/".$reader->user->profile->profile_img, "Profile Avtar") }}
                            @else
                                 {{ Html::image("public/images/no-image.png", "Profile Avtar") }}
                            @endif
                        </div>
                        <div class="left mrglft15">
                        	<h4 class="item-head">{{ $reader->user->profile->full_name }}</h4>
                            <h5 class="item-sub-head">{{ $reader->user->profile->company_name }}</h5>
                        </div>
                        <span class="delete_btn mrg20 jsdelete-reader" data-id="{{ $reader->id }}"><i class="fa fa-trash"></i></span>
                    </div>
                @endforeach
            </div>
            <!-- Approved Reader List----->
            
            <!-- Save And Reset Button -->
            <div class="col-1-1 ymrg20 pul15">
            	{!! Form::submit('SUBMIT',['class'=>'btn btn-primary xpul15 ypul7 right']) !!}
                {!! Form::reset('RESET',['class'=>'btn btn-primary xpul15 ypul7 right mrgrt20']) !!}
            </div><!-- Save And Reset Button -->
            
            <div class="clearfix"></div>
        </div>
    {!! Form::close() !!}
    
    @push('script')
    	{!! Html::script('public/js/specified/submission-edit.js') !!}
         {!! Html::Script("public/plugins/tinymce/tinymce.min.js") !!}
    @endpush
@stop
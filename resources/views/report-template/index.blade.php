@extends('layouts.myaccount')

@section('content') 
    <div class="col-1-1 heading_tital">
        <h1 class="left">{{ trans('menu.report-template') }}</h1>
        <div class="right">
            <div class="itemSearch">
                {{Form::open(array('route'=>'template.index','method'=>'get'))}}
                {{Form::text('search',request()->get('search'),['placeholder'=>'Search By Title'])}}
                {{Form::submit('Search')}}
                {{Form::close()}}
              </div>
        </div>
    </div>     
    <!--- Top Tabs Navigation Start -->
    <div class="row">
    	<div class="col-md-12">
        	<div class="pull-left">
                <ul class="top-tabs scripts" id="tabs">
                    <li class="active bg-script" data-tab="my-templates" style="width:160px;">{{ trans('lang.my-templates') }}</li>
                    <li class="bg-suitcase" data-tab="archived">{{ trans('lang.archived') }}</li>
                    <li class="bg-hart" data-tab="favorites">{{ trans('lang.favorites')}}</li>
                </ul>
            </div>
            <div class="pull-right">
            	<a class="btn btn-primary btn-icon fa-plus hiddenmob" href="{{ URL::to('myaccount/report-template/add') }}">{{ trans('lang.create-new-template') }}</a>
            </div>
        </div>
    </div>
    <!--- Top Tabs Navigation Over -->
    
    <div class="row mrgtp20">
    	<?php $shownoRecord	=	true;?>
    	@foreach($templates as $template)
        <?php
			
			$tab		=	"my-templates";
			$userId		=	auth()->user()->id;	
			$isAuthor	=	$template->user_id == $userId;
			
			if($isAuthor && $template->status == 0) $tab	=	'archived';
			if($isAuthor && $template->status > 0) $tab	=	'my-templates';
			if(!$isAuthor) $tab	=	'favorites';
			
			if($tab == 'my-templates') $shownoRecord	=	false;
			$class	=	($isAuthor && $template->draft == 1) ? "posted" : "";
		 ?>
            <div class="item-box pul0 mrgbt20 " data-tab="{{ $tab }}" id="template{{$template->id}}">
            	<div class="col-1-1 xpul15 pultop15 mrgbt10">
                <div class="col-1-24" style="position:relative;">
                    <span class="ul-checkbox fa fa-square-o"></span>
                    <div class="task-div">
                        <ul class="task-ul" data-id="{{$template->id}}">
                       	 @if($isAuthor)
                            <li data-task="unarchived" {{ ($tab == 'archived') ? "style=display:block" : "style=display:none" }} >
                                {{ trans('lang.unarchived') }}
                            </li>
                            <li data-task="archived" {{ ($tab != 'archived') ? "style=display:block" : "style=display:none" }} >
                                {{ trans('lang.archive') }}
                            </li>
                            <li data-task="delete">
                                {{ trans('lang.delete') }}
                            </li>
                         @else
                            <li data-task="delete">
                                {{ trans('lang.remove-favorites') }}
                            </li>
                         @endif
                        </ul>
                    </div>
                </div>
                <div class="col-23-24">
                    <div class="col-3-6">
                        <h3 class="item-head script">
                            <a href="{{ ($isAuthor) ? URL::route('template.edit',['id'=>$template->id]) : $template->link }}">
                                {{str_limit($template->title,40)}}
                            </a>
                        </h3>   
                        <span>{{ date('F d, Y',strtotime($template->created_at)) }} </span>                   
                    </div>
                    <div class="col-3-6 item-right-main script">  
                    	<div class="item-template-form">
                        <?php 
							$form	=	checkForOther($template->form);
							$genre	=	checkForOther($template->genre);
							$subgenre	=	checkForOther($template->subgenre);
						 ?>
                        	@if(!empty($form))<h4>{{ $form }}</h4>@endif
                            
                            @if($genre || $subgenre)
                                <span>
                                    {{ $genre }}
                                    {{ (!empty($genre) && !empty($subgenre)) ? "-" : "" }}
                                    {{ $subgenre }}
                                </span>
                            @endif                           
                        </div>                      
                    </div>
                    <div class="clearfix"></div>
                </div>
                </div>
                <div class="h-line ymrg10">
                	
                </div>
                <div class="col-1-1 pulbotm2">
                	@if($isAuthor)
                	<div class="col-1-4 pul5">
                    	<a href="javascript:void(0)" class="btn btn-icon {{ ($template->status == 1) ? "bg-user-times" : "fa-user"}}" id="postUnpostTempalte" @if($template->status == 1) onclick="UnpostTempalte({{$template->id}})"> Unpost {{trans('lang.template') }} @else onclick="PostTempalte({{$template->id}})"> Post {{trans('lang.template') }} @endif </a>
                    </div>
                    @endif
                    <div class="col-1-4 pul5">
                    	<a href="{{ $template->link }}" target="_blank" class="btn btn-icon bg-template">View Template</a>
                    </div>
                    <div class="col-1-4 pul5">
                    	<a href="javascript:void(0)" data-id="{{ $template->id }}" class="btn btn-icon bg-msg send-template">Send Template</a>
                    </div>
                    <div class="col-1-4 pul5">
                    	<a href="javascript:void(0)" class="btn btn-icon bg-track template-tracking" data-id="#templateShare{{$template->id}}">Track Template</a>
                    </div>
                </div>
            </div>
            @push('shretemplate')
            	<?php $template->load('sharelist.receiver.profile');?>
                
            	<div class="col-1-1 slideAnimate" id="templateShare{{$template->id}}">
                	<div class="col-1-1 BorderBox">
                    	<div class="col-1-1  bgBlue">
                            <h5 class="headonBlue">{{ $template->title }}</h5>
                        </div>
                        <div class="col-1-1 CustomScrollbar" style="max-height:450px">
                        @if(count($template->sharelist))
                          @foreach($template->sharelist as $list)
                              <div class="col-1-1 xpul10 ypul7	">
                               <p class="tip-description mrg0">{{ str_limit($list->receiver->profile->full_name) }}</p>
                               <span class="date">{{ date('F j, Y',strtotime($list->created_at)) }}</span>
                              </div>
                              <div class="h-line"></div>
                          @endforeach
                        @else
                              <div class="col-1-1 pul5">
                               <p class="tip-description mrg0">No Record Found</p>
                              </div>
                        @endif
                        </div>
                    </div>
                </div>
            @endpush
        @endforeach
    </div>
    <div style="display: {{ ($shownoRecord) ? 'block' : 'none' }};" class="item-box no-records"> No records found</div>
    
    
    {!! view('message.message')->with(['contact'=>true,'email'=>true,'MSGtemplates'=>false,'redirect_url'=>'template-share']) !!}
    

@stack('shretemplate')


@push('css')
	<style>
		.task-div{
			width:185px;
		}
		div[data-tab='favorites'],
		div[data-tab='archived']{
			display:none;
		}
	</style>
@endpush

@push('script')
	{!! Html::script('public/js/specified/template-index.js') !!}
@endpush

@stop
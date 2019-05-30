@extends('layouts.myaccount')

@section('content')
<?php 
	$incount	=	auth()->user()->MessageReceivedByMe()->where('r_status',1)->count() ;
	$outcount	=	auth()->user()->MessageSendedByMe()->where('s_status',1)->count() ;
 ?>
	<h1 class="heading_tital">{{ trans('menu.message') }}</h1>
    <div class="row">
    	<div class="col-md-9">
        	<ul class="top-tabs message" id="tabs">
            	<li class="active messages" data-tab="messages">
                {{ trans('lang.messages') }}
                	@if($incount)
                    	<span id="in-unread" class="un-read">{{$incount}}</span>
                    @endif    
                </li>
                <li class="bg-star" data-tab="starred">{{ trans('lang.starred') }}</li>
                <li class="bg-suitcase" data-tab="archived">{{ trans('lang.archive') }}</li>
                <li class="sent" data-tab="sent">
                	{{ trans('lang.sent') }}
                	@if($outcount)
                    	<span id="out-unread" class="un-read">{{$outcount}}</span>
                    @endif     
                </li>
            </ul>
        </div>
        <div class="col-md-3">
        	<div class="btn btn-primary right">
            	<a id="send-message-btn">
            	{{ trans('lang.send-new-message') }}
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row mrgtp20">
    <?php $count= 1 ; $show_norecords	=	true;?>
    
    	@foreach($messages as $inbox)
        <?php
			$userId	=	auth()->user()->id;
			$sender	=	$userId == $inbox->sender_id;
			
			$msgUser	=	($sender) ? $inbox->receiver : $inbox->sender;
			
			if(is_null($msgUser) ) continue;
			if(($sender && $inbox->s_status == -1) || (!$sender && $inbox->r_status == -1)) continue;
			
			$class	=	[];
			
			if(($sender && $inbox->s_status == 1) || (!$sender && $inbox->r_status == 1 ))	$class[]	= 'bglightSky';
			else																			$class[]	 = 'read';
			
			if(($sender && $inbox->s_favorite==1) || (!$sender && $inbox->r_favorite==1))	$class[] 	= 'starred';			
			
			if($sender && $inbox->s_archived != 1)											$class[] = 'sent';
			
			if(!$sender && $inbox->r_archived != 1 )										$class[] = 'messages';
			
			if(($sender && $inbox->s_archived == 1) || (!$sender && $inbox->r_archived == 1))$class[] = 'archived';
			
			if(in_array('messages',$class)) $show_norecords	=	false;
			
			//dump($inbox);
		?>
            <div class="item-box mrgbt20 {{implode(' ',$class)}}" data-tab="{{ $tab }}" id="inbox{{$inbox->id}}">
                <div class="col-1-24" style="position:relative;">
                	<div class="col-1-1">
                    	<span class="ul-checkbox fa fa-square-o"></span>
                        <div class="task-div">
                            <ul class="task-ul" data-id="{{$inbox->id}}">
                                <li data-task="unread" {{ (!in_array('bglightSky',$class)) ?"style=display:block" : "style=display:none" }} >
                                    {{ trans('lang.mark-as') }} {{ trans('lang.unread') }}
                                </li>
                                <li data-task="read" {{ (!in_array('read',$class)) ? "style=display:block"  : "style=display:none" }} >
                                    {{ trans('lang.mark-as') }} {{ trans('lang.read') }}
                                </li>
                                <li data-task="unarchived" {{ (in_array('archived',$class)) ? "style=display:block" : "style=display:none" }} >
                                    {{ trans('lang.unarchived') }}
                                </li>
                                <li data-task="archived" {{ (!in_array('archived',$class)) ? "style=display:block" : "style=display:none" }} >
                                    {{ trans('lang.archive') }}
                                </li>
                                <li data-task="delete">
                                    {{ trans('lang.delete') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-1-1">
                    	<span class="span-starred fa {{ (in_array('starred',$class)) ? "fa-star act" : "fa-star-o" }}" data-id="{{ $inbox->id }}"></span>
                    </div>
                    <div class="clearfix"></div>                    
                </div>
                <div class="col-23-24">
                    <div class="col-2-3">
                    	<div class="col-2-14 inbox-thumnail">
                        	<?php $thumbnail	= $msgUser->profile->profile_img; ?>
                           @if($thumbnail)
                                {{ Html::image("public/uploads/profiles/users/$msgUser->id/$thumbnail") }}
                            @else
                                {{ Html::image("public/images/no-image.png") }}
                            @endif	    
                        </div>
                    	<div class="col-7-14">
                        	<h3 class="item-head">
                                <a href="{{ URL::to('/myaccount/message/'.$inbox->id.'/view') }}">
                                    {{str_limit($msgUser->profile->full_name,20)}}
                                </a>                            
                            </h3>
                            <div class="item-detail">                        	
                                <span class="date">{!! date('F j, Y',strtotime($inbox->created_at)) !!}</span>
                            </div>
                        </div>
                        <div class="col-5-14">
                        	<b>{{ $inbox->subject }}</b>
                        </div>                        
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="col-1-3">
                    	{!! str_limit(strip_tags($inbox->inboxdetail[0]->message)) !!}
                    </div>          
                    <div class="clearfix"></div>
                </div>
            </div>
        @endforeach
        
        <div class="item-box no-records row" {{ ($show_norecords) ?  "style=display:block" : "style=display:none" }}>
        	<p>{{ trans('lang.no-record') }}</p>
        </div>
    </div>    
    
    {!! view('message.message')->with(['permission'=>false,'email'=>false]) !!}
    
@push('script')
	{!! Html::script('public/js/specified/inbox.js') !!}
    <script>
		$(document).ready(function(e) {
           $("#send-message").sendMessagePopUp(); 
        });
	
	</script>
@endpush

@push('css')
	<style type="text/css">
		.item-box.sent,.item-box.archived{ display:none; }
    </style>
@endpush

@stop
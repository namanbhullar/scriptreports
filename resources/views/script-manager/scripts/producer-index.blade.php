@extends('layouts.myaccount')

@section('content')  
    <div class="col-1-1 heading_tital">
        <h1 class="left">{{ trans('menu.script-manager.scripts') }}</h1>
        <div class="right">
            <div class="itemSearch">
                {{Form::open(array('route'=>'scripts.index','method'=>'get'))}}
                {{Form::text('search_script',request()->get('search_script'),['placeholder'=>'Search By Title'])}}
                {{Form::submit('Search')}}
                {{ Form::hidden('form',request()->get('form'))}}
                {{ Form::hidden('genre',request()->get('genre'))}}
                {{Form::close()}}
              </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
        	<ul class="top-tabs scripts-producer left" id="tabs">
            	<li class="active" data-tab="new">New</li>
                <li class="bg-star" data-tab="Priority">{{ trans('lang.priority') }}</li>              
                <li class="bg-suitcase deeper-nav bg-angle-down" data-tab="archived">
                	<span class="indicater li-suitcase"></span>
                    <span class="ltext">Recommended</span>
                	
                    <ul class="sub-tab-nav slideAnimate">
                    	<li class="li-suitcase" data-tab="archived">{{ trans('lang.archive') }}</li>
                        <li class="li-pass" data-tab="Rejected">Pass</li>
                        <li class="li-consider" data-tab="Considered">Consider</li>
                        <li class="li-recommend" data-tab="Recommended">Recommended</li>
                        <li class="li-recommend-writer" data-tab="recomd-writer">Recommend Writer</li>
                        <li class="li-buy" data-tab="buy">Buy</li>
                    </ul>
                </li>
                <li class="bg-script" data-tab="my-script">{{ trans('lang.my-scrip') }}</li>
            </ul>
            <div class="sortReports search right">
            <form id="sortscritform" action="{{ route('scripts.index') }}" method="get" style="float:left">
            		{!! Form::select('form',FormList(),request()->get('form'),['style'=>'width:100px;','class'=>'pul5 mrglft10' ,'onchange'=>'this.form.submit()']) !!}
                    {!! Form::select('genre',GenreList(),request()->get('genre'),['style'=>'width:100px;','class'=>'pul5 mrglft10' ,'onchange'=>'this.form.submit()']) !!}
                    {{ Form::hidden('search_script',request()->get('search_script'))}}
               </form>
          </div>
        </div>
    </div>
    <div class="row mrgtp20">
    <?php $show_norecords = true; ?>
    	@foreach($AllData as $data)
        <?php
			$user_id	=	auth()->user()->id;
			$tracker	=	$data;
			$script		=	$data->script;
			$scriptauthor	=	$user_id == $script->created_by;
			$show_norecords	=	true;
			$script->load('agent.address','manager.address');
			
			$liPriority	=	true;
			$liArchived	=	true;
			$liDefault	=	true;
			
			if($scriptauthor){
				
				switch($tracker->status){
					case 0:
						$tab	=	'archived';
						$liArchived	=	false;
					break;
										
					case 1:
						$tab	=	'my-script';
					break;
										
					default:
						$tab	=	'my-script';
					break;					
				}
				
				
			}else{
				
				
			}
			
			$pvtnotes	=	$data->notes;
			//dump($script)
		?>
            <div class="item-box pul0 scripts mrgbt20 {{ ($data->is_seen == 0 ) ? "bglightSky" : "" }}" data-tab="{{ $tab }}" id="scripts{{$data->id}}">
               <div class="col-1-1 xpul15 pultop15 mrgbt15">
                <div class="col-1-24" style="position:relative;">
                    <span class="ul-checkbox fa fa-square-o"></span>
                    <div class="task-div">
                    	<ul class="task-ul" data-id="{{$data->id}}">                        	
                            <li data-task="default" {{ ($liDefault) ? "style=display:block"  : "style=display:none" }} >
                            	{{ trans('lang.unarchived') }}
                            </li>
                            <li data-task="archived" {{ ($liArchived) ? "style=display:block" : "style=display:none" }} >
                            	{{ trans('lang.archive') }}
                            </li>
                            <li data-task="delete">
                            	{{ trans('lang.delete') }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-23-24">
                    <div class="col-4-5">
                        <h3 class="item-head script">
                        	<a href="{{ url('/myaccount/script-manager/scripts/'.$script->id.'/view') }}">
                            	{{str_limit($script->title,20)}}
                            </a>
                            @if(!empty($script->draft_number))
                                <span>&nbsp;-&nbsp;Draft {{ $script->draft_number }}</span>
                            @endif
                            
                        </h3>
                        @if(!empty($script->created_date))
                        <div class="item-detail mrgbt10">
                        	{!! ShortScriptInfo($script) !!}&nbsp;&nbsp;&nbsp;
                            <span class="date script">{!! date('F j, Y',strtotime($script->created_date)) !!}</span>
                        </div>
                        @endif
                        <div class="item-desc col-4-5 ">
                            <p class="mrg0">
	                                {{str_limit($script->logline,200)}}
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-1-5 item-right-main script">
                        <div class="item-right-item mrgbt5 bg-info scriptinfo" data-id="#scrriptInfo{{ $script->id }}">{{ trans('lang.script-info') }}</div>
                        <div class="item-right-item mrgbt5 bg-pencil  writerInfo" data-id="#writerInfo{{ $script->id }}">{{ trans('lang.writer-info') }}</div>
                        @if(auth()->user()->id != $script->created_by)
                        	<div class="item-right-item bg-chat sendmessageso" data-id="{{ $script->id }}">{{ trans('lang.send-message') }}</div>
                        @else
                        	<div class="item-right-item bg-chat" onclick="FlashMessage('You can\'t send message to yourself')">{{ trans('lang.send-message') }}</div>
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
               </div>
               <div class="h-line"></div>
               <div class="xpul15 ypul10 ">
               	@if(auth()->user()->id != $script->created_by)
               	  <div class="col-1-2">
                  	<div class="scriptFeedbackselect">
                    	<div class="fbdk-head"> Assign script to folder </div>
                        <ul data-id="{{ $script->id }}" data-tid="{{ $tracker->id }}" class="">
                        	<li data-feedback="Priority" class="li-priroity {{ ($tracker->feedback_icon == 'Priority') ? "active" : "" }}" >{{ trans('lang.priority') }}</li>
                            <li data-feedback="Rejected" class="li-pass {{ ($tracker->feedback_icon == 'Rejected') ? "active" : "" }}">Pass</li>
                            <li data-feedback="Considered" class="li-consider {{ ($tracker->feedback_icon == 'Considered') ? "active" : "" }}">Consider</li>
                            <li data-feedback="Recommended" class="li-recommend {{ ($tracker->feedback_icon == 'Recommended') ? "active" : "" }}">Recommend</li>
                            <li data-feedback="buy" class="li-buy {{ ($tracker->feedback_icon == 'buy') ? "active" : "" }}">Buy</li>
                            <li data-feedback="recomd-writer" class="li-recommend-writer {{ ($tracker->feedback_icon == 'recomd-writer') ? "active" : "" }}">Recommend Writer</li>
                        </ul>
                    </div>
                  </div>
                  @endif
                  <div class="col-1-2 right">
                        <div class="col-1-3">
                            <div class="left btn btn-icon bg-notes" onclick="showPrivateNotes({{ $tracker->id }})">Private Notes</div>
                        </div>
                        <div class="col-1-3">
                            <div class="left btn btn-icon bg-share share_script" data-id="{{$script->id}}">Share Script</div>
                        </div>
                        <div class="col-1-3">
                            <a class="left btn btn-icon bg-track" href="{{ URL::route('script.track',['id'=>$script->id]) }}" >Track Script</a>
                        </div>
                  </div>
                  <div class="clearfix"></div>
               </div>
               <div class="clearfix"></div>
            </div>
            {!! view('script-manager.scripts.script-info')->with(['script'=>$script]) !!}
            {!! view('script-manager.scripts.writer-info')->with(['script'=>$script]) !!}
        @endforeach
        
        <div class="item-box no-records row" {{ ($show_norecords) ?  "style=display:block" : "style=display:none" }}>
        	<p>{{ trans('lang.no-record') }}</p>
        </div>
    </div>
    
    {!! csrf_field() !!}
    	
{!! view('message.message')->with(['contact'=>true,'email'=>false,'MSGtemplates'=>ture,'MSGscripts'=>false]) !!}

<div style="display:none">  
  
    <!-- Private Notes-->
<div id="private-notes" class="col-1-1">
    <h3 class="blue-head mrg0">Private Notes</h3>
    {{ Form::open(array('url' =>URL::to('myaccount/set-pv-notes'),'id'=>'privateNoteForm')) }}
    <div class="col-1-1 pul20 ">
        <div class="col-1-1 margtp15">
            {{Form::textarea('pvnotes',null,array('class' => 'text textArea it', 'placeholder' => 'Type Your Private Note',required,'rows'=>'3'))}}
        </div>
        <div class="col-1-1 ymrg5">
            {{Form::button('Save Notes',array('class'=>'btn btn-icon btn-primary fa-save right','id'=>'SaveNoteBtn'))}}
        </div>
    </div>
    {{Form::hidden('item_id',"")}}
    {{Form::hidden('script_id',"")}}
    {{ Form::close() }}
</div>
<!-- Private Notes-->

    <!-- Private Notes-->
<div id="sendMessageToScriptOwner" class="col-1-1">
    <h3 class="blue-head mrg0">Send Message To Script Owner</h3>
    {{ Form::open(array('route'=>'MsgToScptOwnr','method'=>'post','id'=>'mesaagetoownerform')) }}
    <div class="col-1-1 pul20 ">
    	 <div class="col-1-1">
            <div class="col-1-1">
                <label class="pop-up-label it ymrg5">Subject</label>
            </div>            
            <div class="col-1-1">
                <input type="text"  name="subject" class="text textInput it ymrg5"/>
            </div>
        </div>
        <div class="col-1-1 margtp15">
            {{Form::textarea('message',null,array('class' => 'text textArea it', 'placeholder' => 'Type Your Message',required,'rows'=>'3'))}}
        </div>
        <div class="col-1-1 ymrg5">
            {{Form::button('SEND',array('class'=>'btn btn-icon btn-primary fa-save right',))}}
        </div>
    </div>
    {{Form::hidden('script_id',"")}}
    {{ Form::close() }}
</div>
<!-- Private Notes-->
</div>


@push('script')
	{{ Html::script('public/js/specified/scripts.js') }}    
@endpush

@stop
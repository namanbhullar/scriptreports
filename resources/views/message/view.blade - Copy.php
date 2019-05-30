@extends('layouts.myaccount')

@section('content')

<?php $isSender	=	($inbox->sender_id == auth()->user()->id); ?>
    <div class="col-md-12">
        <div class="innar_box top_massage">
        	<h2>{{ $inbox->subject }}</h2>        
        		<?php /*?><a class="pull-right btn btn-primary mrgtp20" href="#" id="send-message-btn">
            		{{ trans('lang.send-new-message') }}
               	</a><?php */?>
        	<div class="clearfix"></div>        
        </div>
    </div>
                 
    <div class="col-md-9 pulrt15">
    <?php 
		$inbox->load('sender.profile','receiver.profile');
		$topProfile	=	(!$isSender) ? $inbox->sender : $inbox->receiver ; 
	?>
        <div class="Box innar_box msg_stream">
            <div class="pull-left">
                <div class="img-box">
               		{!! $topProfile->profile->Image !!}
                </div>
                <div class="pull-left">
                    <h2><a href="{{ $topProfile->link }}">{!! ucwords($topProfile->profile->full_name) !!}</a></h2>
                    <h4>{{ $topProfile->profile->company_name }}</h4>
                </div>
            </div>
            <div class="pull-right">
            	@if(!is_null($inbox->next))
                	<a class="p-left" href="{{ URL::route('message.view',['id'=>$inbox->next]) }}">Previous</a>
                @else
                	<a class="p-left btn disabled" href="javascript:void(0)">Previous</a>
                @endif
                
                
                
                @if(!is_null($inbox->previous))
                	<a class="p-right" href="{{ URL::route('message.view',['id'=>$inbox->previous]) }}">Next</a>
                @else
	                <a class="p-right btn disabled" href="javascript:void(0)">Next</a>
                @endif
            </div>
        	<div class="clearfix"></div>
        </div>
        
        <div class="clearfix"></div>
        
        
       <?php /*?> Load message Form Inboxdetail<?php */?>
        <?php 
		$inbox->load('inboxdetail');
		
		?>
        <div class="msg_left">
        	@foreach($inbox->inboxdetail as $message)
            <?php  $sender	=	($message->sent_by == $inbox->sender->id) ? $inbox->sender : $inbox->receiver; ?>
                <div class="col-1-1 mrgbt20 messagedetail" id="message{{ $message->id}}">
                    <div class="pull-left msg_left1 mrgbt15">
                        <div class="img-box">
                            {!! $sender->profile->image !!}
                        </div>
                        <span>{!! date("M d Y",strtotime($message->created_at)) !!}</span>
                    </div>
                     <div class="pull-right msg_cmnt">
                        <div class="arrow-left"> {!! Html::image("public/images/icons/arrow-left.png","Arrow Image") !!}</div>
                        <p>{!! nl2br($message->message) !!}</p>
                    </div>
                    @if(count($message->attachments))
					<?php $templates	=	$message->attachments->filter(function($value,$key){ return $value->item_type	==	'template'; }) ?>
                    <?php $scripts		=	$message->attachments->filter(function($value,$key){ return $value->item_type	==	'script'; }) ?>
                    <?php $documents	=	$message->attachments->filter(function($value,$key){ return $value->item_type	==	'document'; }) ?>
                    <?php $attachments	=	$message->attachments->filter(function($value,$key){ return $value->item_type	==	'attachment'; }) ?>
                    <?php $reports		=	$message->attachments->filter(function($value,$key){ return $value->item_type	==	'report'; }) ?>
                    <?php $requests		=	$message->attachments->filter(function($value,$key){ return $value->item_type	==	'request'; });  ?>
                    	<!-- Check For Report --->
                     
                        @if(!$requests->isEmpty())
                        	@foreach($requests as $request)
                            <?php $request->load('request');?>                     	
                                <div class="col-12-13 right pul10 Box ymrg10">
                                	<h4 class="left">Request Status</h4>
                                    @if($request->request->request_status == 'pending')
                                        <button id="declineRequest" class="btn btn-primary right btn-icon xpul40">Decline</button>
                                        <button id="acceptRequest" class="btn btn-primary right mrgrt20 btn-icon xpul40">Accept</button>
                                    @else
                                        <button class="btn btn-primary disabled right mrgrt20 btn-icon fa-check xpul40">Request {{ ucfirst($request->request->request_status) }}</button>
                                    @endif
                                </div>
                                @push('script')
                                	<script> var request_id	= {{ $request->request->id }};</script>
                                @endpush
                            @endforeach
                        @endif                        
                        <!-- Check for Report End here -->
                    	
                        <!-- Check For Report --->
                        @if(!$reports->isEmpty())
                        	@foreach($reports as $report)
                            	<?php $report->load('report'); if(is_null($report->report)) continue; ?>
                                <div class="msg_btm mrgtp5  pull-right">
                                    <div class="pull-left">
                                        {!! Html::image("public/images/icons/report.png","Report",['class'=>'mrgtp2','title'=>'Report']) !!}
                                        <h3> 
                                        <a target="_blank" href="{{ route('report.view',['id'=>$report->report->id]) }}@if(!$isSender)?_token={{md5('script-reports/'.$report->report->id.'/view-pdf')}}@endif" >	
                                            {{ $report->report->title }}
                                        </a>
                                        </h3>
                                    </div>
                                    <div class="pull-right">
                                        <a target="_blank" href="{{ route('report.view',['id'=>$report->report->id]) }}@if(!$isSender)?_token={{md5('script-reports/'.$report->report->id.'/view-pdf')}}@endif" title="View Report" class="view-attach">
                                            <i aria-hidden="true" class="fa fa-link"></i>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            @endforeach
                        @endif                        
                        <!-- Check for Report End here -->
                        
                        <!--- Template part Comes Here ---->
                        @if(!$templates->isEmpty())
                          @foreach($templates as $template)
                        <?php $template->load('template'); ?>
                            <div class="msg_btm mrgtp5  pull-right">
                                <div class="pull-left">
                                    {!! Html::image("public/images/icons/template.png","Template",['class'=>'mrgtp2','title'=>'Template']) !!}
                                    <h3> 
                                    <a target="_blank" href="{{ $template->template->link }}@if(!$isSender)?_token={{md5('report-template/'.$template->template->id.'/view')}}@endif" >	
                                    	{{ $template->template->title }}
                                    </a>
                                    </h3>
                                </div>
                                <div class="pull-right">
                                	<a target="_blank" href="{{ $template->template->link }}@if(!$isSender)?_token={{md5('report-template/'.$template->template->id.'/view')}} @endif" title="View Tempalte" class="view-attach">
                                    	<i aria-hidden="true" class="fa fa-link"></i>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                          @endforeach
                        @endif
                        <!--- Template part Ends Here ---->
                        
                        <!--- Attachments Of Script Starts Here ---->
                        @if(!$scripts->isEmpty)
                        @foreach($scripts as $script)
                        <?php $script->load('script'); ?>
                            <div class="msg_btm mrgtp5  pull-right">
                                <div class="pull-left">
                                    {!! Html::image("public/images/icons/scripts.png","Script",['class'=>'xmrg5 mrgtp3','title'=>'Script']) !!}
                                    <h3><a href="{{ $script->script->link }}">{{ $script->script->title }}</a></h3>
                                </div>
                                <div class="pull-right">
                                	<a href="{{ $script->script->link }}" title="View Script" class="view-attach">
                                    	<i aria-hidden="true" class="fa fa-link"></i>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endforeach
                        @endif             
                        <!--- Attachments Of Script Ends Here ---->
                        
                        <?php $docCount	=	1; ?>
                        <!--- Attachments Of Documents Starts Here ---->
                        @if(!$documents->isEmpty())
                        @foreach($documents as $document)
                        <?php $document->load('document'); ?>
                            <div class="msg_btm mrgtp5  pull-right {!! ($docCount%2) ? "btm_50 mrg" : "btm_50" !!}">
                                <div class="pull-left">
                                    {!! Html::image("public/images/icons/folder-b.png","Document",["title"=>"Document"]) !!}
                                      <h3><a target="_new" href="{{ $document->document->link}}" >{{ $document->document->title }}</a></h3>
                                </div>
                                <div class="pull-right">
                                    <a target="_new" href="{{ $document->document->dlink }}" >
                                    	{!! Html::image("public/images/icons/downlod.png","Downlod") !!}
                                     </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php $docCount++; ?>
                        @endforeach
                        @endif
                        <!--- Attachments Of Documents Ends Here ---->
                        
                        <!--- Attachments Of Uploaded Docs Start Here ---->
                        @if(!$attachments->isEmpty())
                        @foreach($attachments as $document)
                        <?php $document->load('document'); ?>
                            <div class="msg_btm mrgtp5  pull-right {!! ($docCount%2) ? "btm_50 mrg" : "btm_50" !!}">
                                <div class="pull-left">
                                    {!! Html::image("public/images/icons/clip.png","Attachment",["title"=>"Attachment"]) !!}
                                    <h3><a target="_new" href="{{ $document->document->link}}" >{{ $document->document->title }}</a></h3>
                                </div>
                                <div class="pull-right">
                                     <a target="_new" href="{{ $document->document->dlink }}" >
                                    	{!! Html::image("public/images/icons/downlod.png","Downlod") !!}
                                     </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php $docCount++; ?>
                        @endforeach
                        @endif
                        <!--- Attachments Of Uploaded Docs Ends Here ---->
                        
                    @endif                
                    <div class="clearfix"></div>
                </div>
            @endforeach
            <div class="clearfix"></div>
            
            
<!--- Replay Function --> 
			{!! Form::open( [ 'url'=>route( 'message.reply',['id'=>$inbox->id] ),files=>true ] ) !!}
            
            <div class="pull-left msg_left1">
                <div class="img-box">
                	@if($isSender)
                    	{!! $inbox->sender->profile->image !!}
                    @else
                    	{!! $inbox->receiver->profile->image !!}
                    @endif
                </div>
          		<span>{!! date('F d Y') !!}</span>
            </div>
            <div class="pull-right cmnt_box mrgbt5">
                <div class="arrow-left">{!! Html::image("public/images/icons/grey_left.png","Arrow",['class'=>'mrg0']) !!}</div>
                <textarea class="msg_cmnt" name="message" placeholder="Click here to reply"></textarea>
            </div>
            <div class="clearfix"></div>
            <div class="col-1-1" id="slected-template"></div>
            <div class="col-1-1" id="slected-script"></div>
            <div class="pul-right" id="slected-docs"></div>
            <div class="pul-right" id="uploaded-docs">
            	<div id="FilesDiv" style="display:none">
                	<input type="file" name="attach_file[]" accept="application/pdf" onchange="fileSelected(event)" id="fileBtn1">
                </div>
            </div>

            <div class="clearfix"></div>
            
            <!---- Script, Template, And File Uploading Button start Here ---->
            <div class="btm_links innar_box">
                <ul>
                    <li>
                    	<?php if(count($MSGscripts)){ ?>
                            <div id="script-div-{{count($MSGscripts)}}" class="user-scripts">
                                <ul class="script-list">
                                    <?php $count	=	1;
                                        foreach($MSGscripts as $script) : ?>
                                        <li title="{{$script->title}}" id="list-{{$script->id}}" class="in-active" data-id="{{$script->id}}" data-title="{{ str_limit($script->title,15) }}">
                                            {{$count}}.&nbsp;{{str_limit($script->title,40)}}
                                        </li>
                                    <?php $count++; endforeach; ?>
                                </ul>
                            </div>
                        <?php }else{ ?>
                            <div id="no-script" class="user-scripts"><p>No ScriptPacs found</p></div>
                        <?php } ?>
                        
                    	<a href="javascript:void(0)" class="btn" id="add-script-reply" >
                            {!! Html::image("public/images/icons/addScript.png","Script") !!}
                            <h3>ScriptPac</h3>
                        </a>
                    </li>
                    <li>
                    	<?php if(is_array($MSGtemplates) && count($MSGtemplates)){ ?>
                            <div id="template-div-{{count($templates)}}" class="user-templates">
                                <ul class="template-list">
                                    <?php $count	=	1;
                                        foreach($MSGtemplates as $template) : ?>
                                        <li title="{{$template->title}}" class="in-active" data-id="{{$template->id}}" data-title="{{ str_limit($template->title,12) }}">
                                            {{$count}}.&nbsp;{{str_limit($template->title,26)}}
                                        </li>
                                    <?php $count++; endforeach; ?>
                                </ul>
                            </div>
                        <?php }else{ ?>
                            <div id="no-templtes" class="user-templates"><p>{{ trans('lang.no-template') }}</p></div>
                        <?php } ?>
                    	<a href="javascript:void(0)" class="btn" id="add-template-reply" >
                            {!! Html::image("public/images/icons/addTemplate.png" ,"Template")!!}
                            <h3>Template</h3>
                        </a>
                    </li>
                    <li>
	                    <a href="javascript:void(0)" class="btn" id="add-my-docs" >
    	                	{!! Html::image("public/images/icons/addDocs.png","Mydocs") !!}
        	                <h3>My Docs</h3>
                        </a>
                    </li>
                    <li>
                    	<a href="javascript:void(0)" class="btn" id="upload-docs" >
                            {!! Html::image("public/images/icons/clip.png",'Upload') !!}
                            <h3>Upload</h3>
                         </a>
                    </li>
                    <li class="last">
                    	{{ Form::submit("Send",["class"=>"right btn btn-primary"]) }}
                    </li>
                    <div class="clearfix"></div>
                </ul>
            </div>
            <!---- Script, Template, And File Uploading Button start Here ---->
            
                       
            <div class="clearfix"></div>
            
            {!! Form::hidden("script_id","",["id"=>"script_idReply"]) !!}
            {!! Form::hidden("template_id","",["id"=>"template_idReply"]) !!}
            {!! Form::hidden("document_id","",["id"=>"document_idReply"]) !!}
            
			{!! Form::close() !!}
<!--- Replay Function --> 
            
        </div>
    </div>


    <div class="col-md-3 pullft15">
        <div class="col-1-1 BorderBox mrgbt20">
	        <div class="col-1-1  bgBlue">
    	    	<h4 class="headonBlue">Private Notes</h4>
            </div>
            <div class="col-1-1 pul15 private-notes">
            <?php
				$notes	=		$inbox->privatenotes()->where('user_id',auth()->user()->id)->where('status',1)->first();
						
			 ?>
             
            {!! Form::open(['url'=>route('message.pv-notes',['id'=>$inbox->id]),'id'=>'msg-notes-form']) !!}
                <textarea id="mes-pv-notes">@if(!is_null($notes)){{$notes->note}}@endif</textarea>
                <a class="save" id="pv-notes-save" href="#">Save</a>
            	<div class="clearfix"></div>
                
             {!! Form::close() !!}
            </div>
        </div>
    </div>
    
@push('css')
	{!! Html::style('public/css/message-stream.css') !!}
    <style>
		#add-template,
		#add-script,
		#add-my-docs,
		#upload-docs{
			position:relative;
		}
		
		.user-templates,
		.user-scripts{
			background-color: #D9D9D9;
			border-radius: 5px;
			color: #233649;
			display: block;
			position: absolute;
			top: -77px;
			width: 285px;
			display:none;
			float:left;
		}
		
		.user-templates ul,
		.user-scripts ul{ 
			padding: 10px;
			float:left;
			width:100%;
		 }
		 
		.user-templates li ,
		.user-scripts li{
			cursor:pointer;
			border-radius: 5px;
			font-family: Raleway;
			font-size: 14px;
			font-weight: 600;
			line-height: 19px;
			margin-bottom: 5px;
			padding: 7px;
			width: 100% !important;
			float:left;
			z-index: 505;
		}
		
		.user-templates li:hover,
		.user-scripts li:hover{
			color:#fff;
			background-color: #6DBCDB;
		}
		
		.user-templates li:last-child,
		.user-scripts li:last-child{
			margin-bottom:0px;
		}
		i.closeBtn{
			background-color:#6DBCDB ;
			border-radius: 50%;
			color:#2A4764;
			float: right;
			font-size: 16px;
			height: 20px;
			line-height: 19px;
			padding-left: 1px;
			text-align: center;
			width: 20px;
		}
		i.closeBtn:hover{
			background-color:#2A4764;
			color:#6DBCDB;
		}
	</style>
@endpush

@push('script')
	{!! Html::script('public/js/specified/message-stream.js') !!}
@endpush
   
@stop
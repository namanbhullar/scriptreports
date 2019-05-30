{!! Form::open(['route'=>'send-message','method'=>'post','files'=>'true','id'=>'mesaage-sending-form']) !!}

<div id="send-message" class="pop-up">
    <div class="col-1-1 relative">
        <h3 class="blue-head mrg0" id="sendMesageHeading">{{ trans('menu.message') }}</h3>
        {!! Html::image("public/images/icons/cancel.png","Close This Dilog Box",["onclick"=>"javascript:$(\"#message-overlayer\").trigger('click')","class"=>"closeMessageBox"]) !!}
    </div>
    <div class="col-1-1 pul20">
    	@if($email)
        <div class="col-1-1">
            <div class="col-1-1">
            <label class="pop-up-label it ymrg5">Email</label>
            </div>
            <div class="col-5-7">
                <input type="text"  name="email" class="text textInput it ymrg5"/>
            </div>
        </div>
        @endif
        
        @if($contact)
        <?php $exitsarray	=	array(); ?>
            @if($MSGcontacts)
                <div class="col-1-1">
                    <div class="col-1-1">
                    <label class="pop-up-label it ymrg5"> {{ trans('menu.contacts') }}</label>
                    </div>
                    <div class="col-5-7">
                     <select name="member" id="member">
                            <option value="0">Select Member</option>
                            <?php foreach($MSGcontacts as $member){ 
								$exitsarray[] = $member->contact_userid;
							?>
                             <option value="{{$member->contact_userid}}">{{$member->contactUser->profile->full_name}}</option>
                            <?php } ?>
                            
                            @if($MSGreaders)
                            	@foreach($MSGreaders as $reader)
                            		@if(!in_array($reader->reader_id,$exitsarray))
                             			<option value="{{$reader->reader_id}}">{{$reader->user->profile->full_name}}</option>
                             		@endif
                            	@endforeach
                            @endif
                        </select>
                    </div>
                </div>
            @endif
        @endif
        
        @if($ScriptPermission)
        	<div class="col-1-1">
                <div class="col-1-1">
                    <label class="pop-up-label it ymrg5">{{ trans('lang.permission') }}</label>
                </div>            
                <div class="col-5-7">
                    <select name="permission" id="permission">
                        <option value="0">Select {{ trans('lang.permission') }}</option>
                         <option value="view">View only</option>
                         <option value="edit">Edit</option>
                    </select>
                </div>
            </div>
        @endif
        
        <div class="col-1-1">
            <div class="col-1-1">
                <label class="pop-up-label it ymrg5">Subject</label>
            </div>            
            <div class="col-1-1">
                <input type="text"  name="subject" class="text textInput it ymrg5"/>
            </div>
        </div>
        
        <div class="col-1-1">
            <div class="col-1-1">
                <label class="pop-up-label it ymr5">Message</label>
            </div>
            <div class="col-1-1 mrgbt10">
                {!! Form::textarea('message',null,array('class' => 'textArea ymrg5', 'placeholder' => 'Type Your Message here',required)) !!}
            </div>
        </div>    
        <div class="col-1-1 ">
        	@if($MSGscripts)
            <div class="col-1-5 pulrt2" id="add-script">
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
                <div class="btn btn-icon bg-add-script" >{{ trans("lang.script-pac") }}</div>
            </div>
            @endif
            
            @if($MSGtemplates)
            <div class="col-1-5 xpul2" id="add-template">
            
            	<?php if(is_array($MSGtemplates) && count($MSGtemplates)){ ?>
                    <div id="template-div-{{count($templates)}}" class="user-templates" id="MSGUserTemplates">
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
                    <div id="no-templtes" class="user-templates" id="MSGUserTemplates">
                    	<ul class="template-list">
                        	<p>{{ trans('lang.no-template') }}</p>
                        </ul>
                    </div>
                <?php } ?>
                
                <div class="btn btn-icon bg-add-template" >{{ trans("lang.template") }}</div>
            </div>
            @endif
            
            <div class="col-1-5 xmrg2" id="add-my-docs">
                <div class="documents-list">
                    <ul class="docs-list">                   
                    </ul>
                </div>
                <div class="btn btn-icon bg-add-docs" >{{ trans("lang.my-docs") }}</div>
            </div>
            <div class="col-1-5 mrglft2" id="upload-docs">
            	<div class="upload-list">
                	<ul class="uploaded-list">
                    </ul>
                </div>
                <div style="display:none" id="FilesDiv">
                	{!! Form::file('attach_file[]',["id"=>"MSGfileBtn1","onchange"=>"attachfileSelect(event)","accept"=>"application/pdf"]) !!}
                </div>
                <div class="btn btn-icon bg-clip" onclick="javascript:$('#MSGfileBtn1').trigger('click')" >{{ trans("lang.upload") }}</div>
            </div>
            <div class="col-1-6 right">
            	{!! Form::submit(trans("lang.send"),['class'=>'btn btn-primary right xpul30']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

@if(!$contact)
	{!! Form::hidden('member','') !!}
@endif

{!! Form::hidden('script_id','',['id'=>'MSGScriptId']) !!}
{!! Form::hidden('template_id','',['id'=>'MSGTemplateId']) !!}
{!! Form::hidden('document_id','',['id'=>'MSGDocumentId']) !!}
{!! Form::hidden('redirect_url',$redirect_url,['id'=>'MSGDocumentId']) !!}
@if($report)
 {!! Form::hidden('report_id',null) !!}
@endif
{!! Form::close() !!}

@push('script')
	
    {!! Html::script("public/js/message.js") !!}
	
@endpush

@push('css')
	<style>
		body.message-lock{
			overflow:hidden;
		}
		#add-template,
		#add-script,
		#add-my-docs,
		#upload-docs{
			position:relative;
		}
		
		.user-templates,
		.user-scripts,
		.documents-list,
		.upload-list {
			background-color: #D9D9D9;
			border-radius: 5px;
			color: #233649;
			display: block;
			position: absolute;
			top: -77px;
			width: 285px;
			display:none;
		}
		
		.user-templates ul,
		.user-scripts ul,
		.documents-list ul,
		.upload-list ul{ 
			padding: 10px;
		 }
		 
		.user-templates li ,
		.user-scripts li,
		.documents-list li,
		.upload-list li{
			cursor:pointer;
			border-radius: 5px;
			font-family: Raleway;
			font-size: 14px;
			font-weight: 600;
			line-height: 19px;
			margin-bottom: 5px;
			padding: 7px;
			width: 100%;
			z-index: 505;
		}
		
		.user-templates li:hover,
		.user-scripts li:hover,
		.documents-list li:hover,
		.upload-list li:hover{
			color:#fff;
			background-color: #6DBCDB;
		}
		
		.user-templates li:last-child,
		.user-scripts li:last-child,
		.documents-list li:last-child,
		.upload-list li:last-child{
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

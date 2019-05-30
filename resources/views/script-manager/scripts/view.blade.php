@extends('layouts.myaccount')

@section('content')
<div class="scrip-pac-view">
	<div class="col-5-7">
    	<div class="xpul10">
        	<div class="item-box row script-view mrgbt20">
                <div class="col-3-4">
                    <h3 class="item-head script">
                    
	                    {{str_limit($script->title,20)}}
                        
                        @if(isset($script->draft_number) && !empty($script->draft_number))
                            <span>&nbsp;-&nbsp;Draft {{ $script->draft_number }}</span>
                        @endif
                        
                    </h3>
                    <div class="item-detail mrgbt10">
                        {!! ShortScriptInfo($script) !!}&nbsp;&nbsp;&nbsp;
                        <span class="date script">{!! date('F j, Y',strtotime($script->created_at)) !!}</span>
                    </div>
                    <div class="item-desc col-23-24 ">
                        <p class="mrg0">
                                {{$script->logline}}
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-1-4 item-right-main script">
                   	<a class="btn btn-icon btn-gray mrgbt5 fa-user" href="{{ $script->user->link }}">{{ trans('lang.view-profile') }}</a>
                    <div class="item-right-item mrgbt5 bg-pencil" id="showInfo">{{ trans('lang.writer-info') }}</div>
                    @if(auth()->user()->id != $script->created_by)
                        	<div class="item-right-item bg-chat" id="sendMessageToOwner" data-id="{{ $script->id }}">{{ trans('lang.send-message') }}</div>
                    @else
                        <a href="{{ route('script.edit',['id'=>$script->id]) }}" class="col-1-1 btn btn-white btn-icon fa-edit">{{ trans('lang.edit-scriptpac') }}</a>
                    @endif
                   </div> 
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
           {!! view('script-manager.scripts.writer-info')->with(['script'=>$script,'id'=>$script->id]) !!}
            
                        
            <div id="script-info-section" class="col-1-1 BorderBox mrgbt30">
                <div class="col-1-1 bgBlue">
                	<h5 class="headonBlue">{{ trans('lang.script-info') }}</h5>
                </div>
                <div class="col-1-1 pul15 script-info-table">                
                	<div class="col-1-2">
                    
                    	<div class="col-1-1 pulrt15 mrgbt5">
                            <div class="col-1-2">
                                <b>{{ trans('lang.date-submited') }}</b>
                            </div>
                            <div class="col-1-2">
                                {{ date('F j, Y',strtotime($script->created_date)) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @if(!empty($script->submitted_by))
                            <div class="col-1-1 pulrt15 mrgbt5">
                                <div class="col-1-2">
                                    <b>{{ trans('lang.submitted-by') }}</b>
                                </div>
                                <div class="col-1-2">
                                    {{ $script->submitted_by }}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endif
                        
                        @if(!empty($script->draft_date))
                            <div class="col-1-1 pulrt15 mrgbt5">
                                <div class="col-1-2">
                                    <b>{{ trans('lang.draft-date') }}</b>
                                </div>
                                <div class="col-1-2">
                                    {{ $script->draft_date }}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                    	@endif
                        
                        @if(!empty($script->pages))
                            <div class="col-1-1 pulrt15 mrgbt5">
                                <div class="col-1-2">
                                    <b>{{ trans('lang.pages') }}</b>
                                </div>
                                <div class="col-1-2">
                                    {{ $script->pages }}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                    	@endif
                        
                        @if(!empty($script->location))
                            <div class="col-1-1 pulrt15 mrgbt5">
                                <div class="col-1-2">
                                    <b>{{ trans('lang.location') }}</b>
                                </div>
                                <div class="col-1-2">
                                    {{ $script->location }}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                    	@endif
                        
                        @if(!empty($script->setting))
                            <div class="col-1-1 pulrt15 mrgbt5">
                                <div class="col-1-2">
                                    <b>{{ trans('lang.settings') }}</b>
                                </div>
                                <div class="col-1-2">
                                    {{ $script->setting }}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                    	@endif
                        
                        
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="col-1-2">
                    	@if(!empty($script->period))
                            <div class="col-1-1 pullft15 mrgbt5">
                                <div class="col-1-2">
                                    <b>{{ trans('lang.period') }}</b>
                                </div>
                                <div class="col-1-2">
                                    {{ $script->period }}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                    	@endif
                        
                   		@if(!empty($script->budget_from) || !empty($script->budget_to))
                        <div class="col-1-1 pullft15 mrgbt5">
                            <div class="col-1-2">
                                <b>{{ trans('lang.budget') }}</b>
                            </div>
                            <div class="col-1-2">
                                {{ $script->budget_from }}{{ budget_type($script->budget_type) }}
                                @if(!empty($script->budget_from) && !empty($script->budget_to)) to  @endif
                                {{ $script->budget_to }}{{ budget_type($script->budget_type) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        
                        @if(!empty($script->rating))
                        <div class="col-1-1 pullft15 mrgbt5">
                            <div class="col-1-2">
                                <b>{{ trans('lang.rating') }}</b>
                            </div>
                            <div class="col-1-2">
                                {{ $script->rating }}                                
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        
                        @if(!empty($script->target_audience))
                        <div class="col-1-1 pullft15 mrgbt5">
                            <div class="col-1-2">
                                <b>{{ trans('lang.target-audience') }}</b>
                            </div>
                            <div class="col-1-2">
                                {{ $script->target_audience }}                                
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        
                        @if(!empty($script->comparisons))
                        <div class="col-1-1 pullft15 mrgbt5">
                            <div class="col-1-2">
                                <b>{{ trans('lang.comparisons') }}</b>
                            </div>
                            <div class="col-1-2">
                                {{ $script->comparisons }}                                
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endif
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="col-1-1">
                    	@if(is_array($script->script_info))
                         @foreach($script->script_info as $info)
                        	<div class="col-1-2 pulrt15 mrgbt5">
                                <div class="col-1-2">
                                    <b>{{ $info[name] }}</b>
                                </div>
                                <div class="col-1-2">
                                    {{ $info[title] }}
                                </div>
                            </div>
                         @endforeach
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>
            </div><!-- scruipt Info Ends-->
            
            <div id="synopsis-section" class="col-1-1 BorderBox mrgbt20">
                <div class="col-1-1  bgBlue">
                	<h5 class="headonBlue">{{ trans("lang.synopsis") }}</h5>
                </div>
                <div class="col-1-1 pul15">
                	 {!! $script->synopsis !!}
                </div>
                <div class="clearfix"></div>
            </div><!-- synopsis Ends-->
            <div class="clearfix"></div>
        </div>
    
    <div class="col-2-7">
    	<div class="xpul10">
        	<div id="private-notes" class="col-1-1 BorderBox mrgbt20">
                <div class="col-1-1  bgBlue">
                	<h5 class="headonBlue">{!! trans("lang.private-notes") !!}</h5>
                </div>
                <div class="col-1-1 pul15 private-notes">
                	 <textarea id="pvt-not-text">{{ ($track->notes) ? $track->notes->note : "" }}</textarea>
                     <a class="save" href="#"  id="pvt-not-save-btn">Save</a>
                </div>
                <div class="clearfix"></div>
            </div>
            
            @if($script->created_by != auth()->user()->id)
            <div id="feedback-section" class="col-1-1 BorderBox mrgbt20">
                <div class="col-1-1  bgBlue">
                	<h5 class="headonBlue">{{ trans('lang.feedback-head') }}</h5>
                </div>
                <div class="col-1-1 bgblueLg">
                    <ul class="like_icons" id="sfeedbackIcon">
                        <li>
                        	<a href="javascript:void(0)" title="Pass" data-feedback="Rejected" class="like {{ ($track->feedback_icon == 'Rejected') ? "active" : "" }}"></a>
                        </li>
                        <li><a href="javascript:void(0)" title="Consider" class="qw {{ ($track->feedback_icon == 'Considered') ? "active" : "" }}" data-feedback="Considered"></a></li>
                        <li><a href="javascript:void(0)" title="Recommend" class="like1 {{ ($track->feedback_icon == 'Recommended') ? "active" : "" }}" data-feedback="Recommended"></a></li>
                        <li><a href="javascript:void(0)" title="Priority" class="star {{ ($track->feedback_icon == 'Priority') ? "active" : "" }}" data-feedback="Priority"></a></li>
                        <li><a href="javascript:void(0)" title="Buy" class="dollr {{ ($track->feedback_icon == 'buy') ? "active" : "" }}" data-feedback="buy"></a></li>
                        <li><a href="javascript:void(0)" title="Recommend Writer" class="pen {{ ($track->feedback_icon == 'recomd-writer') ? "active" : "" }}" data-feedback="recomd-writer"></a></li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="col-1-1 pul15 private-notes">
                	 <textarea id="send-feedbak" placeholder="{{ trans("form.send-feedbak-placeholder") }}"></textarea>
                     <a class="save" id="send-feedbak-btn">Send</a>
                </div>
                <div class="clearfix"></div>
            </div>
            @endif
            
            <div id="docs-section" class="col-1-1 BorderBox">
                <div class="col-1-1  bgBlue">
                	<h5 class="headonBlue">{{ trans('lang.documents') }}</h5>
                </div>
                @if($track->permissions=='edit')
                    <div class="col-1-1 bgblueLg pul10 add-docs-script">
                        <a href="#uploadfilePopUp" class="upload fancybox-inline" id="uploadFile">{!! Html::image("public/images/icons/up.png","Upolad") !!}</a>
                        <a href="javascript:void(0)" class="add" id="addFile">{!! Html::image("public/images/icons/plus.png","Add") !!}</a>
                    </div>
                @endif
                
                <?php // docs section starts here ?>
                <div class="col-1-1 add-docs-script">
                	<ul class="folder_menu sdocs_folder">
                    	@if($script->documents)
                            @foreach($script->documents as $key=>$docs)
                            	<li>
                                    <a href="#">{!! Html::image("public/images/icons/folder.png","Folder Image") !!} {{ $key }}</a>
                                    <ul class="docs_menu">
                                    @if(is_array($docs))
                                        @foreach($docs as $doc)
                                        	<?php  $dox	=	App\Models\Documents::find($doc); ?>
                                            <li><a target="_new" href="{{ $dox->link }}">{{ $dox->file_name }}</a></li>
                                        @endforeach
                                    @else
                                       <?php  $dox	=	App\Models\Documents::find($docs); ?>
                                       <li><a target="_new" href="{{ $dox->link }}">{{ $dox->file_name }}</a></li>
                                    @endif
                                    </ul>
                                </li>
                            @endforeach
                        @endif                    	
                    </ul>
                </div>
                <?php // docs section ends  here ?>
                
                <div class="clearfix"></div>
            </div>
            
            <div class="clearfix"></div>
        </div>
    </div>
   {!! csrf_field() !!} 
   {!! Form::hidden("script_id",$script->id,["id"=>"script_id"]) !!}
   
   
   <div style="display:none" >
       <div id="uploadfilePopUp" style="width:500px;">
            {{Form::open(array('url'=>route('script.uploadDocs',['id'=>$script->id]),'files'=>true, 'id'=>'UploadDocsForScript'))}}
            <div class="col-1-1">
                <h3 class="blue-head mrg0">Upload File</h3>
            </div>
            <div class="col-1-1 pul20">
                                
                <div class="col-1-1 ymrg10">
                    <div class="col-1-1">
                        <label class="pop-up-label it">{{ trans('form.new_doc') }}</label>
                    </div>            
                    <div class="col-1-1">
                        <input type="text"  name="docs_title" class="text textInput it" palceholder="{{ trans('form.new_doc_palceholder') }}" />
                    </div>
                </div>
                                
                <div class="col-1-1">
                    <div class="col-1-1">
                        <label class="pop-up-label it">{{ trans('form.upload-file') }}</label>
                    </div>
                    <div class="col-1-1">
                    	<div class="col-2-3">
                        	{{Form::text('other_docs','',array('class' => 'browse text textInput it','id'=>'other_docs', 'placeholder' => 'Upload Outline'))}}
                        </div>
                        <div class="col-1-5 filebutton-div mrglft15">
                        	<div class="col-1-1 pul10 filebutton-label">{{ trans('form.filebutton-label') }}</div>
                        	{{Form::file('other_docs',array('id'=>'fileUpload','class' => 'filebutton','onchange'=>'fileSelectPdf("other_docs",event);'))}}
                        </div> 
                        <div class="clearfix"></div>                       
                    </div>
                </div> 
                
                <div class="col-1-1 mrgtp15">
                	<div class="right">
                    	{{ Form::submit(trans('form.save'),['class'=>'btn btn-primary'])}}
                    </div>
                </div>
                <div class="clearfix"></div>     
            </div>
            <div class="clearfix"></div>
            {{Form::hidden('id',$script->id)}}
                    {{Form::hidden('count',$count)}}
            {{Form::close()}}
       </div>
       
       <div id="addFilePopUp">
      		<h3 class="blue-head mrg0">Add File</h3>
            <div class="col-1-1 pul20">
            	Design of Mydocmuments isn't ready.
            </div>       		
       </div>
   </div>
   
 <div style="display:none" >
@if(auth()->user()->id != $script->created_by)   
       <!-- Send Message To Script Owner -->
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
            {{Form::submit('SEND',array('class'=>'btn btn-icon btn-primary fa-save right',))}}
        </div>
    </div>
    {{Form::hidden('script_id',$script->id)}}
    {{ Form::close() }}
</div>
<!-- Send Message To Script Owner -->
@endif
</div>
</div>
@push('script')
	{!! Html::script("public/js/specified/scripts-view.js") !!}
    <script type="text/javascript">
		var script_id	=	{{ $script->id }};
		var track_id	=	{{ $track->id }};
	</script>
@endpush

@stop
<?php $layout	= (auth()->check())  ?  'layouts.myaccount' : 'layouts.guest'; ?>
	
@extends($layout)
@section('content')
<?php 
	$profile = $user->profile;
	$submission = $user->submission;
	$submission->load('rfdoc');
	$readers	=	$submission->reader()->where('status',1)->get();
	
	$isSelf	=	auth()->check() && auth()->user()->id == $user->id;
?>
	<div class="item-box pul20 profile">
    	<div class="col-1-8 user-thumbline">
			
            {!!	$profile->image !!}
        </div>        
        <div class="col-11-16 xpul10">
        	<div class="col-1-1">
            	<div class="col-1-1">
                	<div class="@if($isSelf)col-6-8 @else col-1-1 @endif">
                    	<h1 class="item-head {!! (strlen($profile->company_name) > 20) ? 'hasTooltip" title="'.$profile->company_name.'"' : '"'!!}>
                            {!! str_limit($user->profile->company_name,20) !!}                	
                        </h1>
                    </div>
                    @if($isSelf)
                    	<div class="col-1-4">
                    		<a class="col-1-1 btn btn-icon btn-white fa-edit" href="{{ url('myaccount/script-manager/submission-guidelines') }}">{{ trans('lang.edit-submission') }}</a>
                    	</div>
                    @endif                    
                </div>
                
                @if(!empty($profile->company_name))
                <h3 class="item-sub-head left {!! (strlen($profile->full_name) > 20) ? 'hasTooltip" title="'.$profile->full_name.'"' : '"'!!}>
                	{!! str_limit($profile->full_name,20) !!}
                </h3>
                @endif
                
                @if(!empty($profile->full_name) && !empty($profile->title))
                <h3 class="item-sub-head left">&nbsp;|&nbsp;</h3>
                @endif
                
                @if(!empty($profile->title))
                <h3 class="item-sub-head left {!! (strlen($profile->title) > 20) ? 'hasTooltip" title="'.$profile->title.'"' : '"'!!}>
                	{{ str_limit($profile->title) }}
                </h3>
                @endif
                
                <div class="col-1-1 mrgtp10">
                	<ul class="profile-social-link">
                    	@if(!empty($profile->website))
                        	<li class="bg-glob"><a class="hasTooltip" title="Go to Website" href="{{ ext_link($profile->website) }}"></a></li> 
                        @endif
                        
                        @if(!empty($profile->facebook))
                        	<li class="bg-facebook"><a class="hasTooltip" title="View On Facebook" href="{{ ext_link($profile->facebook) }}"></a></li>
                        @endif
                        
                        @if(!empty($profile->imdb))
                        	<li class="bg-imdb"><a class="hasTooltip" title="View On IMBD" href="{{ ext_link($profile->imdb) }}"></a></li>
                        @endif       
                                         
                        @if(!empty($profile->twitter))
                       		<li class="bg-twiter"><a class="hasTooltip" title="View On Twitter" href="{{ ext_link($profile->twitter) }}"></a></li>
                        @endif
                        
                        @if(!empty($profile->linkedin))
                        	<li class="bg-linkdin"><a class="hasTooltip" title="View On Linkedin" href="{{ ext_link($profile->linkedin) }}"></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-3-16 item-right-main right">
        <div class="item-right-item  bg-info mrgbt5 relative" id="contact-info" >
        	{{ trans('lang.contact') }}
         	<div id="ueer-contact-info" class="slideAnimate">
            {{ Html::image('public/images/icons/grey_right.png','Gray Right',['class'=>'right-info-image']) }}
            @if(!is_null($profile->address))
            	{{$profile->company_name }}<br/>
                <?php 
                if(!empty($profile->address->street))	echo $profile->address->street."<br/>";				
				if(!empty($profile->address->city))		echo $profile->address->city.",&nbsp&nbsp;";
				if(!empty($profile->address->state))	echo $profile->address->state."&nbsp;&nbsp";
				if(!empty($profile->address->zip))	echo $profile->address->zip."<br />";
				if(!empty($profile->address->phone))	echo $profile->address->phone."<br />";
				if(!empty($profile->address->country))	echo $profile->address->country;
				
			?>
            @else
            	{{ trans('lang.no-info') }}
            @endif
            </div>  
        </div>
        
         @if(auth()->check() && auth()->user()->id != $user->id)   
               <?php  $checkfav	=	auth()->user()->favorites()->where('item_type','user')->where('item_id',$user->id)->count(); ?>
                @if(!$checkfav)
                	<div class="item-right-item  bg-favorite mrgbt5" id="user-favorite" >{{ trans('lang.favorites') }}</div>
                @else
                	<div class="item-right-item disabled  relative bg-favorite mrgbt5" id="user-favorite" >{{ trans('lang.favorites') }} <i class="fa fa-check absolute t9 r10"></i></div>
                @endif
         @elseif(auth()->check() && auth()->user()->id == $user->id)                           
              	<div class="item-right-item  bg-favorite mrgbt5" onclick="javascript:FlashMessage('You Can\'t add yourself to favorites')">
                	{{ trans('lang.favorites') }}
                </div>
         @else
              	<div class="item-right-item  bg-favorite mrgbt5" onclick="FlashMessage('Please Login First')">
                	{{ trans('lang.favorites') }}
                </div>
         @endif
            
            <?php $templates	=	 $user->templates()->where('status',1)->get(); ?>
            <div class="relative btn btn-primary btn-icon bg-template-wh" id="all-template">
            	{{trans('lang.evaluation-templates')}}
                
                <div class="col-1-1 slideAnimate BorderBox" id="template-show">
                	<div class="col-1-1">
                    	<div class="col-1-1  bgBlue">
                            <h5 class="headonBlue">{{trans('lang.evaluation-templates')}}</h5>
                        </div>
                        <div class="col-1-1 CustomScrollbar" style="max-height:275px">
                        @if(count($templates))
                        <?php $count= 1 ?>
                        	<ul>
                              @foreach($templates as $template)
                              
                                    <li>
                                        <a href="{{ $template->link }}" target="_blank">
                                            {{ $count}}.&nbsp;{{ $template->title }}
                                        </a>
                                    </li>
                                    <div class="h-line"></div>
                                    <?php $count++; ?>
                              @endforeach                          
                          	</ul>
                        @else
                              <div class="col-1-1 pul5">
                               <p class="tip-description mrg0">{{ trans('lang.no-template') }}</p>
                              </div>
                        @endif
                        </div>
                    </div>
                </div>                
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-1-1 ymrg20"> 
       
      <div class="col-5-7">
      	@if(!is_null($submission->accept_submissions) && $submission->accept_submissions  == 0)
        	<div class="col-1-1 item-box mrgbt20">
            	<h4>{{ trans('lang.no-submission-accept') }}</h4>
            </div>
        @else
          <div class="col-1-1 item-box mrgbt20">
                <div class="covrage_stamp left"></div>
                <div class="col-7-10 right">
                    @if(!empty($submission->description))
                        {!! $submission->description !!}
                    @else
                        <h4 style="color:#6DBCDB;">{{ trans('lang.no-desc') }}</h4>
                    @endif
                </div>
          </div>
        @endif
            <br/>
            <br/>
           
            @if(!$readers->isEmpty())
             <div class="col-1-1">
            	<h4 class="BlueRadialHead mrgbt10">{!! trans('lang.approved-readers') !!}</h4>
            </div>
            	@foreach($readers as $reader)
                <?php 
					$reader->load('user.profile');
					$member	=	$reader->user->profile;
					$extrafld 	= 	(!empty($member->extra_fields)) ? $member->extra_fields : array();
				 ?>
                <div class="item-box row mrgbt20 pul15">
                    	<div class="left">
                            <div class="col-1-1 thumbnail small70">
                                <a href="{{ $reader->user->link  }}">
                                    @if($member->profile_img) 
                                        {{ Html::image("public/uploads/profiles/users/$member->user_id/$member->profile_img", "Profile Avtar") }}
                                    @else
                                         {{ Html::image("public/images/no-image.png", "Profile Avtar") }}
                                    @endif
                                </a>
                            </div>                        	
                        </div>
                        
                        <div class="col-5-8 pullft10">
                        	<h3 class="item-head blue member-directory">
                                <a href="{{ $reader->user->link  }}">
                                    {{str_limit($member->full_name,45)}}
                                </a>
                               
                                @if(in_array('WGA Member',$extrafld)) <small>{{ trans("form.wga_member") }}</small> @endif
                               
                            </h3>
                            <div class="item-desc col-1-1 ">
                                        {{ str_limit(strip_tags($member->brief_boi),100) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        
                        
                        <div class="col-3-11 right item-right-main pullft15">
                        	<div class="item-right-item mrgbt5 bg-profile"><a href="{{ $reader->user->link }}" target="_blank">{{ trans('lang.view-profile') }}</a></div>
                            
                            @if(auth()->check())    
                                @if(auth()->user()->id == $member->user_id)      
                                    <div class="item-right-item bg-chat " onclick="FlashMessage('You Can\'t send message to youself')">
                                        {{ trans('lang.send-message') }}
                                    </div>
                                @else
                                    
                                    <div class="item-right-item bg-chat send-message" data-id="{{ $member->user_id }}">
                                        {{ trans('lang.send-message') }}
                                    </div>
                                @endif
                            @else                                
                                <div class="item-right-item  bg-chat mrgbt5" onclick="FlashMessage('Please Login First')">
                                	{{ trans('lang.send-message') }}
                                </div>
                            @endif
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach           
            @endif
            <div class="clearfix"></div>
        </div>
        
        <div class="col-2-8 pullft20 right">
        
        @if($submission->treatment || $submission->coverage || $submission->character_break || !is_null($submission->add_docs) || $submission->release_form || $submission->script || $submission->logline || $submission->synopsis)
            <div class="col-1-1 BorderBox mrgbt20">
                <div class="col-1-1  bgBlue">
                    <h5 class="headonBlue">Requirements</h5>
                </div>
                
                <div class="col-1-1 pul15 submission-req">  
                    @if(!is_null($submission->rfdoc))
                        <div class="col-1-1 pul3 text-center">                                
                             <a href="{{ $submission->rfdoc->dlink }}" target="_blank"> Release Form&nbsp;&nbsp;<i class="fa fa-download"></i> </a>
                         </div>
                    @endif 
                                    
                     @if($submission->script)
                     <div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left">{{ trans('lang.script') }}</div>
                     </div>
                     @endif
                     
                     @if($submission->logline)
                     <div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left">{{ trans('lang.logline') }}</div>
                     </div>
                     @endif
                     
                     @if($submission->synopsis)
                     <div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left">{{ trans('lang.synopsis') }}</div>
                     </div>                           
                    @endif 
                    
                    @if($submission->character_break)
                     <div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left">{{ trans('lang.character-list') }}</div>
                     </div>
                    @endif
                    @if($submission->coverage)
                      <div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left">{{ trans('lang.coverage-report') }}</div>
                     </div>
                    @endif
                    @if($submission->treatment)
                    <div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left">{{ trans('lang.treatment') }}</div>
                     </div>
                   @endif
                   <?php $additional	=	(!is_null($submission->add_docs)) ? unserialize($submission->add_docs) : array() ; ?>
                   @foreach( $additional as $key=>$other)
                   	<div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left">{{$key}}</div>
                     </div>
                   @endforeach                   
                </div>
                <div class="clearfix"></div>
            </div>
        @endif
        </div>        
        <div class="clearfix"></div>
    </div>
    
    
    @if(auth()->check())
    {!! view('message.message')->with(['contact'=>false,'email'=>false]) !!}
    @endif
    
    @push('script')
    
    @if(!auth()->check() || auth()->user()->id == $user->id)
    	{!! Html::script('public/js/message.js') !!}
    @endif    
    
    <script>
        $(document).ready(function(e) {
			$("#contact-info").hover(function(){
				$("#ueer-contact-info").addClass('show');
			},
			function(){
				$("#ueer-contact-info").removeClass('show');
			})
			
			
			$("#all-template").ShowUpClick({div:"#template-show"});
			   
		$("#template-btn").ToggaleFunction({
			div:'.profile-template',
			heigthDiv:'.profile-template-list'
			});
			
		@if(auth()->check() && auth()->user()->id != $user->id)
		$("#user-favorite").favorite({id:{{$user->id}},type:'user'});
		@endif
		
		@if(auth()->check())
			$(".send-message").each(function (index,ele){
				var id	=	$(this).data('id');
				$(this).PopUp({
				
				boxDivId:'send-message',
				 beforeOpen:function(ele){	
				   var form	=	document.getElementById("mesaage-sending-form");
				  form.member.value	=	ele.data('id');
			   },
			   }); 
			   
			});
			
			$(".user-favorite").each(function(index,ele){
				$(this).favorite({type:'user',id:$(this).data('id')});
			});
		@endif
      });
	
		
    
    </script>
    @endpush
@stop
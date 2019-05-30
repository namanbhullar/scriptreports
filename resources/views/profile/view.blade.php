<?php $layout	= (auth()->check())  ?  'layouts.myaccount' : 'layouts.guest'; ?>
	
@extends($layout)

@section('content')

<?php
	$profile	=	$user->profile;
	$addskil 		=	(!empty($user->profile->additional_skills)) ? $user->profile->additional_skills : array();
	$ohterskil		=	isset($addskil['other']) ? $addskil['other'] : array();
	
	$extrafldarray 	= 	(!empty($user->profile->extra_fields)) ? $user->profile->extra_fields : array();
	
	
?>
	<div id="readers">
    <div class="item-box pul20 profile">
    	<div class="col-1-8 user-thumbline">
			<?php $thumbnail	= $user->profile->profile_img; ?>
            @if($thumbnail)
                {!! $user->profile->image !!}
            @else
                {!! noImage() !!}
            @endif	
        </div>
        <div class="col-11-16 xpul10">
        	<div class="col-5-8">
               <h1 class="item-head {!! (strlen($profile->full_name) > 20) ? 'hasTooltip" title="'.$profile->full_name.'"' : '"'!!}>
                	{!! str_limit($user->profile->full_name,20) !!}
                    
                	@if(in_array("WGA Member",$extrafldarray))
	                	<small>{{ trans("lang.wga-member") }}</small>
                        <?php unset($extrafldarray[array_search("WGA Member",$extrafldarray)]) ?>
                    @endif
                </h1>
                
                @if(!empty($profile->company_name))
                <h3 class="item-sub-head left {!! (strlen($profile->company_name) > 20) ? 'hasTooltip" title="'.$profile->company_name.'"' : '"'!!}>
                	{!! $profile->company_name !!}
                </h3>
                @endif
                
                @if(!empty($profile->company_name) && !empty($profile->location))
                <h3 class="item-sub-head left">&nbsp;|&nbsp;</h3>
                @endif
                
                @if(!empty($profile->location))
                <h3 class="item-sub-head left {!! (strlen($profile->location) > 20) ? 'hasTooltip" title="'.$profile->location.'"' : '"'!!}>
                	{{ str_limit($profile->location) }}
                </h3>
                @endif
                
                <div class="col-1-1 mrgtp10">
                	<ul class="profile-social-link">
                    	@if(!empty($profile->website))
                        	<li class="bg-glob"><a class="hasTooltip" title="Go to Website" href="{{ext_link($profile->website)}}"></a></li> 
                        @endif
                        
                        @if(!empty($profile->facebook))
                        	<li class="bg-facebook"><a class="hasTooltip" title="View On Facebook" href="{{ext_link($profile->facebook)}}"></a></li>
                        @endif
                        
                        @if(!empty($profile->imdb))
                        	<li class="bg-imdb"><a class="hasTooltip" title="View On IMBD" href="{{ext_link($profile->imdb)}}"></a></li>
                        @endif       
                                         
                        @if(!empty($profile->twitter))
                       		<li class="bg-twiter"><a class="hasTooltip" title="View On Twitter" href="{{ext_link($profile->twitter)}}"></a></li>
                        @endif
                        
                        @if(!empty($profile->linkedin))
                        	<li class="bg-linkdin"><a class="hasTooltip" title="View On Linkedin" href="{{ext_link($profile->linkedin)}}"></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-2-6 right">     
             @if(auth()->check() && auth()->user()->user_group == 4 && auth()->user()->id != $user->id)						
			<?php		$send_request	=	App\Models\RequestsAll::where('sender_id','=',auth()->user()->id)
                                                ->where('receiver_id','=',$user->id)
                                                ->where('request_type','=','AddProfile')
                                                ->orderBy('id', 'desc')->first();
												
                    if(!is_null($send_request)){							
                        isset($send_request->request_status) || $send_request->request_status	=	NULL;
                ?>
                        @if($send_request->request_status=='declined')                    
                            <a class="btn btn-primary btn-icon bg-glasses-wh" style="background-position:7px center;" onclick="FlashMessage('Your Request has been Decline. You cannot sent another Request.',false)">Request Decline</a>                    
                        @elseif($send_request->request_status=='pending')							
                            <a class="btn btn-primary btn-icon bg-glasses-wh" style="background-position:7px center;" onclick="FlashMessage('Request already sent. You cannot sent another Request.',false)">Request Pending</a>								
                        @elseif($send_request->request_status=='accepted')							
                            <a class="btn btn-primary btn-icon bg-glasses-wh" style="background-position:7px center;" onclick="FlashMessage('{{ $user->profile->full_name }} is already in your submission profile.',true)">Request Accepted</a>							
                        @else							
                            <a class="btn btn-primary btn-icon bg-glasses-wh " style="background-position:7px center;" chang="true" onclick="SentAddProfileRequest(this,{{$user->id}})">Invite Reader</a>
                        @endif
                    <?php }else{?>
                            <a class="btn btn-primary btn-icon bg-glasses-wh" style="background-position:7px center;" chang="true" onclick="SentAddProfileRequest(this,{{$user->id}})">Invite Reader</a>                    	
                    <?php } ?>
            @endif          
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-3-16 item-right-main right">
         @if(auth()->check() && auth()->user()->id != $user->id)
                <div class="item-right-item bg-chat mrgbt5" id="message-send">{{ trans('lang.send-message') }}</div>
                <?php  $checkfav	=	auth()->user()->favorites()->where('item_type','user')->where('item_id',$user->id)->count(); ?>
                @if(!$checkfav)
                	<div class="item-right-item  bg-favorite" id="user-favorite" >{{ trans('lang.favorites') }}</div>
                @else
                	<div class="item-right-item disabled  relative bg-favorite" id="user-favorite" >
                    	{{ trans('lang.favorites') }} <i class="fa fa-check absolute t9 r10"></i>
                    </div>
                @endif
         @elseif(auth()->check() && auth()->user()->id == $user->id)
         	 <div class="item-right-item bg-chat mrgbt5" onclick="FlashMessage('You can\'t Send Message to yourself')">
                {{ trans('lang.send-message') }}
            </div>            
            <div class="item-right-item  bg-favorite mrgbt5" onclick="javascript:FlashMessage('You Can\'t add yourself to favorites')">
                {{ trans('lang.favorites') }}
            </div>
         @else
         	<div class="item-right-item bg-chat mrgbt5" onclick="FlashMessage('Please Login First')">
                {{ trans('lang.send-message') }}
            </div>            
            <div class="item-right-item  bg-favorite mrgbt5" onclick="FlashMessage('Please Login First')">
                {{ trans('lang.favorites') }}
            </div>
         @endif
         @if(auth()->check() && auth()->user()->id == $user->id)
            <div class="col-1-1 mrgtp5 "><a class="col-1-1 btn btn-white" href="{{URL::route('profile.edit') }}">Edit profile</a></div>
        @endif
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    
    <div class="col-1-1 ypul20 relative">
    	<div class="col-2-10 btn btn-primary btn-icon bg-template-wh" id="template-btn">Evaluation Templates</div>
        
         {{--- Removed as par Ann Notes in correction file May 25
        @if(!empty($user->next))
        <div class="right col-3-20 mrglft15">
        	<a class="col-1-1 btn btn-gray fa-chevron-right btn-icon-right  xpul50" href="{{ url('/profile/'.$user->next[0].'/view') }}">{{ trans('lang.next') }}</a>
        </div>
        @endif
        
        @if(!empty($user->previous))
        <div class="right col-3-20"><a class="col-1-1 btn btn-gray fa-chevron-left btn-icon mrgrt15 xpul50 " href="{{ url('/profile/'.$user->previous[0].'/view') }}">{{ trans('lang.previous') }}</a></div>
        @endif
        
        ---}}
        
        <div class="clearfix"></div>
        <?php $templates	=	 $user->templates()->where('status',1)->get(); ?>
        <div class="profile-template" id="profile-template">        	
            <ul class="profile-template-list pul10">
            	@if(count($templates))
                    @foreach($templates as $template)
                        <li class="">
                            <a href="{{ $template->link }}" target="_blank">
                                {{ $template->title }}
                            </a>
                        </li>
                    @endforeach
                @else
                	<li>
                    	<a href="javascript:void(0)">
                        	{{ trans('lang.no-template') }}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    
    <!-- About Me -->
    <div class="col-1-1 mrgbt20">
    	<h4 class="BlueRadialHead">About</h4>
        <div class="col-1-1 pul8 RadialBoxBottom">
        	<div class="col-1-3 xpul10">
                @if($user->profile->additional_skills)
                <div class="col-1-1 mrgbt30">
                    <h3 class="underline mrgbt10"><u>Services Offered</u></h3>
                    <ul class="profile-service-offered ">                
                        @foreach($addskil as $key => $profileskill)
                            @if(is_numeric($key))
                            <li><b>{{$profileskill}}</b></li>
                            @endif
                        @endforeach
                        
                        @foreach($ohterskil as $profileskill)
                            <li>{{$profileskill}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(!empty($extrafldarray) || !empty($user->profile->script_speciality) || !empty($user->profile->industry_experience) || !empty($user->profile->education) || !empty($user->profile->awards) || !empty($user->profile->languages))
                <div class="col-1-1 mrgbt30">
                	<h3 class="underline mrgbt10"><u>Qualifications</u></h3>
                    <ul class="profile-qualification">
                    @if(count($extrafldarray)!=0 && !empty(implode(',',$extrafldarray)))             
                        <li> <strong>Skills:&nbsp;</strong>{{implode('&nbsp;,&nbsp;',$extrafldarray)}}</li>
                    @endif
                    @if($user->profile->script_speciality!='')             
                        <li> <strong>Script Speciality:&nbsp;</strong>{{$user->profile->script_speciality}}</li>
                    @endif
                    @if($user->profile->industry_experience!='')
                        <li> <strong>Industry Experience:&nbsp;</strong>{{$user->profile->industry_experience}}</li>
                    @endif
                    @if($user->profile->education !='')
                        <li><strong>Education:</strong>&nbsp;{{$user->profile->education}}</li>
                    @endif
                    @if($user->profile->awards !='')
                        <li><strong>Awards:</strong>&nbsp;{{$user->profile->awards}}</li>
                    @endif
                    @if($user->profile->languages!='')
                        <li><strong>Languages:&nbsp;</strong>{{$user->profile->languages}}</li>
                    @endif
                    </ul>
                </div>
                @endif
                <!-- Sample Coverage section -->
                <?php 
					$filename = "/uploads/profiles/users/".$user->profile->user_id."/".$user->profile->sample_coverage;
					$fullpath	=	public_path().$filename;
				?>
                @if($user->profile->sample_coverage && file_exists($fullpath))
                    <div class="col-1-1 mrgbt10">
                        <div class="btn btn-primary btn-icon bg-file-wh">
                        	<a target="_blank" href="{{$user->profile->coveragelink}}">Sample Coverage</a>
                        </div>
                    </div>
                @endif
                <!--- Sample Coverage section -->
                
                <div class="clearfix"></div>
            </div>
            <div class="col-2-3 right xpul20">
           		{!! $user->profile->about_me !!}
			</div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- About Me -->
    
    <!-- Scripts -->
    <?php 
		$profileScripts		=	 $user->profile->WrittingProjects()->get();  
		$profileScriptsPacs	=	 $user->scripts()->where('isposted',1)->get();  
	 ?>
    @if(!$profileScripts->isEmpty() || !$profileScriptsPacs->isEmpty())
    <div class="col-1-1 mrgbt20">
	    <h4 class="BlueRadialHead mrgbt10">{{ strtoupper(Scripts) }}</h4>
        <div class="col-1-1">
        	@foreach($profileScripts as $profileScript)        	
                <div class="col-1-4 pulrt10">
                    <div class="profile-script">
                        <h2>{{ $profileScript->title }}</h2>
                        <h5>{{ $profileScript->status }}</h5>
                        <h3>{!! (strtolower($profileScript->form[0]) == 'other') ? $profileScript->form[1] : $profileScript->form[0] !!}</h3>
                        <div class="profile-script-info">
                            <span class="gnr">
                            	<?php 
								$genre		=	checkForOther($profileScript->genre);
								$subgenre	=	checkForOther($profileScript->subgenre);
									
									if(!empty($genre))	echo $genre;
									if(!empty($genre) && !empty($subgenre))	echo "&nbsp;/&nbsp;";
									if(!empty($subgenre))	echo $subgenre;
								?>
                            </span>
                            @if(!empty($profileScript->pages))
	                            <span class="page">pages {{$profileScript->pages}}</span>
                            @endif
                        </div>
                        <div class="col-1-1 profile-script-logline">{{ str_limit($profileScript->logline,150) }}</div>
                        <div class="col-1-1 mrgbt15">
                        
                         <?php		$exist_rqst	=	App\Models\RequestsAll::where('sender_id','=',auth()->user()->id)
                                                ->where('receiver_id','=',$user->id)
                                                ->where('request_type','=','ScritView')
												->where('item_id','=',$profileScript->id)
                                                ->orderBy('id', 'desc')->first();
                				?>
                                
                        	@if($profileScript->permissions || $exist_rqst->request_status=='accept')
                            	<div class="col-2-3" style="margin:0 auto; display:block">
                                	<a class="btn btn-primary xpul40 " style="margin:0 auto; display:block" target="_blank" href="{{ $profileScript->scriptFile->link }}">
                                		View
                                	</a>
                                </div>
                            @elseif(auth()->check())
                            	
                                @if($exist_rqst->request_status=='pending')
                                <a class="btn btn-primary col-2-3" style="margin:0 auto; display:block;" onclick="FlashMessage('Request already sent, cannot send another request',false)">
                                Request Pending
                                </a>
                                @elseif($exist_rqst->request_status=='decline')
                                
                                <a class="btn btn-primary col-2-3" style="margin:0 auto; display:block;" onclick="FlashMessage('Your request has been declined',false)">
                                Request Declined
                                </a>
                                @else
                                
                                    @if($user->id==auth()->user()->id)
                                    	<a class="btn btn-primary col-2-3" style="margin:0 auto; display:block; position:relative" onclick="FlashMessage('You can\'t send request to yourself');">Request</a>
                                    @else
                                    <a id="sendViewRrequest" class="btn btn-primary col-2-3" style="margin:0 auto; display:block; position:relative" onclick="sendViewRrequest('{{$profileScript->id}}','{{$profileScript->title}}')">Request</a>
                                    @endif
                                    
                                @endif
                                
                             @else
                             <a class="btn btn-primary xpul40 col-2-3" style="margin:0 auto; display:block" onclick="FlashMessage('Please login first');">
                                	Request
                                </a>
                                
                            @endif
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @endforeach
            
            @foreach($profileScriptsPacs as $profileScript)        	
                <div class="col-1-4 pulrt10">
                    <div class="profile-script">
                        <h2>{{ $profileScript->title }}</h2>
                        <h5>Available</h5>
                        <h3>{!! (strtolower($profileScript->form[0]) == 'other') ? $profileScript->form[1] : $profileScript->form[0] !!}</h3>
                        <div class="profile-script-info">
                            <span class="gnr">
                            	<?php 
								$genre		=	checkForOther($profileScript->genre);
								$subgenre	=	checkForOther($profileScript->subgenre);
									
									if(!empty($genre))	echo $genre;
									if(!empty($genre) && !empty($subgenre))	echo "&nbsp;/&nbsp;";
									if(!empty($subgenre))	echo $subgenre;
								?>
                            </span>
                            @if(!empty($profileScript->pages))
	                            <span class="page">pages {{$profileScript->pages}}</span>
                            @endif
                        </div>
                        <div class="col-1-1 profile-script-logline">{{ str_limit($profileScript->logline,150) }}</div>
                        <div class="col-1-1 mrgbt15">
                        
                         <?php		$exist_rqst	=	App\Models\RequestsAll::where('sender_id','=',auth()->user()->id)
                                                ->where('receiver_id','=',$user->id)
                                                ->where('request_type','=','ScritView')
												->where('item_id','=',$profileScript->id)
                                                ->orderBy('id', 'desc')->first();
                				?>
                                
                        	@if($profileScript->permissions || $exist_rqst->request_status=='accept')
                            	<div class="col-2-3" style="margin:0 auto; display:block">
                                	<a class="btn btn-primary xpul40 " style="margin:0 auto; display:block" target="_blank" href="{{ $profileScript->scriptFile->link }}">
                                		View
                                	</a>
                                </div>
                            @elseif(auth()->check())
                            	
                                @if($exist_rqst->request_status=='pending')
                                <a class="btn btn-primary col-2-3" style="margin:0 auto; display:block;" onclick="FlashMessage('Request already sent, cannot send another request',false)">
                                Request Pending
                                </a>
                                @elseif($exist_rqst->request_status=='decline')
                                
                                <a class="btn btn-primary col-2-3" style="margin:0 auto; display:block;" onclick="FlashMessage('Your request has been declined',false)">
                                Request Declined
                                </a>
                                @else
                                
                                    @if($user->id==auth()->user()->id)
                                    	<a class="btn btn-primary col-2-3" style="margin:0 auto; display:block; position:relative" onclick="FlashMessage('You can\'t send request to yourself');">Request</a>
                                    @else
                                    <a id="sendViewRrequest" class="btn btn-primary col-2-3" style="margin:0 auto; display:block; position:relative" onclick="sendViewRrequest('{{$profileScript->id}}','{{$profileScript->title}}')">Request</a>
                                    @endif
                                    
                                @endif
                                
                             @else
                             <a class="btn btn-primary xpul40 col-2-3" style="margin:0 auto; display:block" onclick="FlashMessage('Please login first');">
                                	Request
                                </a>
                                
                            @endif
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @endforeach
        	<div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    @endif
    <!-- Scripts -->
    
	<!-- Featured project-->    
    <?php $profileProjects	=	 $user->profile->FeatureProjects()->get();?>
    
    @if(!$profileProjects->isEmpty())
    <div class="col-1-1">
	    <h4 class="BlueRadialHead mrgbt10">{{ strtoupper(trans('lang.featured-projects')) }}</h4>
        <div class="col-1-1">        	
        @foreach($profileProjects as $profileProject)
        <?php $profileProject->load('scriptFile'); ?>
            <div class="col-1-4 pulrt10">
            	<div class="profile-fproject" data-id="#fprojectdesc{{ $profileProject->id}}">
                	@if(!empty($profileProject->poster))
                    	{!! Html::image("public/uploads/profiles/users/$user->id/projects/$profileProject->id/$profileProject->poster","Project Poster",['class'=>"topBorderRadius"]) !!}
                    @else
                    	{!! noImage() !!}
                    @endif
                    <div class="clearfix"></div>
                    <div class="col-1-1 RadialBoxBottom pul10">
                    	<h2> {{ $profileProject->title }}</h2>
                        <h5>{!! (strtolower($profileProject->form[0]) == 'other') ? $profileProject->form[1] : $profileProject->form[0] !!}</h5>
                        
                    </div>
                    <div class="col-1-1 slideAnimate" id="fprojectdesc{{$profileProject->id}}">
                        <div class="col-1-1 BorderBox">
                            <div class="col-1-1  bgBlue">
                                <h5 class="headonBlue">{{ $profileProject->title }}</h5>
                            </div>
                            <div class="col-1-1 pul15">
                                <div class="col-1-1 mrgbt5">
                                    <b>{!! ShortScriptInfo($profileProject) !!}</b>
                                </div>
                                <div class="col-1-1 mrgbt5">
                                     <b>{!! $profileProject->release_date !!}</b>
                                </div>
                                <div class="col-1-1 mrgbt5">
                                     <b>{!! ($profileProject->minutes) ? $profileProject->minutes."&nbsp;Minutes" : "" !!}</b>
                                </div>
                                <div class="col-1-1 mrgbt5">
                                     <b>{!! ($profileProject->rating) ? $profileProject->rating."" : "" !!}</b>
                                </div>
                                <div class="col-1-1 pul15 scriptInfoDetail CustomScrollbar">
                                	{!! ($profileProject->brief) ? $profileProject->brief : "" !!}
                                </div>
                                <div class="col-1-1 ymrg5">
                                	 @if($profileProject->link)
                                     	<a class="btn btn-icon fa-link" href="{{ $profileProject->link }}" target="_blank">&nbsp;More Info</a>
                                     @endif
                                     @if($profileProject->scriptFile->link)
                                     	<a class="btn btn-icon bg-script" href="{{ $profileProject->scriptFile->link }}" target="_blank">&nbsp;Script</a>
                                     @endif
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>                
            </div>
            
        @endforeach
        	<div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    @endif
    <!-- Featured project-->    
    <div class="clearfix"></div>
   </div>
	
    @if(auth()->check() && auth()->user()->id != $user->id)
    {!! view('message.message')->with(['contact'=>false,'email'=>false]) !!}
    @endif
    
    @push('script')
    
    @if(!auth()->check() || auth()->user()->id == $user->id)
    	{!! Html::script('public/js/message.js') !!}
    @endif    
    
    <script>
        $(document).ready(function(e) {
		$(".profile-fproject").each(function(index, element) {
			var $this = $(this);
			var $div	=	$($(this).data('id'));
			
			var top	=	function(){ $div.css({
							'top':( $this.offset().top - $div.height() - $(window).scrollTop()),
						}) }
			
			
			
			$div.css({
						'position':'fixed',
						'width':'400',
						'background-color':'#ffffff',
						'top':( $this.offset().top - $div.height() - $(window).scrollTop()),
					});
					
			$(window).scroll(function(){
				top();
			})
					
           $(this).hover(function(){					
					$div.addClass('show');					
			   	},function(){
					$div.removeClass('show');
				}
			); 
        });
		
           $("#send-message").sendMessagePopUp({
			   'clicker':'message-send',
			   beforeOpen:function(){
				   var form	=	document.getElementById("mesaage-sending-form");
				   	form.member.value	=	{{ $user->id }};
			   		},
			   }); 
			   
		$("#template-btn").ToggaleFunction({
			div:'.profile-template',
			heigthDiv:'.profile-template-list'
			});
			
			@if(auth()->check() && auth()->user()->id != $user->id)
			$("#user-favorite").favorite({id:{{$user->id}},type:'user'});
			@endif
		
		
		
		
			
        });
		
		function SentAddProfileRequest(ele,id){
		$aLink		=	$(ele),
		$i	= $('<i class="fa fa-spin fa-spinner fa-pulse"></i>').css({
						'font-size': '15px',
						'left': '19px',
						'position': 'absolute',
						'top': '9px'
					});
					
		$.ajax({
			method:'post',
			headers:{'X-CSRF-TOKEN':TOKEN},
			url:BASEURL + '/myaccount/script-manager/submission-guidelines/add-request',
			data:'id=' + id,
			beforeSend:function(){
				$aLink.removeClass('bg-glasses-wh').css({
						'position':'relative',
					}).append($i);
			},
			complete:function(){
				$aLink.addClass('bg-glasses-wh')
				$i.remove();
			},
			error:function(){ FlashMessage('Fail To Send Request. Please Try Again Letter',false)},
			success:function(data){
				
				if(data.status == 'ok')
				{
					$aLink.attr('onclick',"FlashMessage('Request already sent, cannot send another request',false)").html("Request Pending");
					FlashMessage(data.msg,true);
				}
				else
				{
					FlashMessage(data.msg,false);
				}
			}
		})
	}
		
	
	
	 function sendViewRrequest(id,name){
			
		$this		=	$("#sendViewRrequest");
		$i	= $('<i class="fa fa-spin fa-spinner fa-pulse"></i>').css({
						'font-size': '15px',
						'left': '19px',
						'position': 'absolute',
						'top': '9px'
					});
					
		$.ajax({
			method:'post',
			headers:{'X-CSRF-TOKEN':TOKEN},
			url:BASEURL + '/profile/script-view-request',
			data:'id='+id+'&name=' + name +'&rid={{$user->id}}',
			beforeSend:function(){
				$this.append($i);
			},
			complete:function(){
				//$aLink.addClass('bg-glasses-wh')
				$i.remove();
			},
			error:function(){ FlashMessage('Fail To Send Request. Please Try Again Letter',false)},
			success:function(data){
				
				if(data.status == 'ok')
				{
					$this.attr('onclick',"FlashMessage('Request already sent, cannot send another request',false)").html("Request Pending");
					FlashMessage(data.msg,true);
				}
				else
				{
					FlashMessage(data.msg,false);
				}
			}
		})
	
				
		}	
		
    
    </script>
    @endpush
 	<style>
		.profile-template{
			background-color: #d9d9d9;
			border-radius: 5px;
			color: #233649;
			display: none;
			position: absolute;
			top: -77px;
			width: 285px;
		}
		.profile-template li{
			width:100%;border-radius: 5px;
		}
		.profile-template li a{
			display:block;
			border-radius: 5px;
			cursor: pointer;
			font-family: Raleway;
			font-size: 14px;
			font-weight: 600;
			line-height: 19px;
			margin-bottom: 5px;
			padding: 7px;
			width: 100%;
			z-index: 505;
		}
		.profile-template li a:hover,
		.profile-template li:hover a,
		.profile-template li:hover{
			 background-color: #6dbcdb;
			   color: #fff;
		}
	</style>
@stop
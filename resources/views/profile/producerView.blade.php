<?php $layout	= (auth()->check())  ?  'layouts.myaccount' : 'layouts.guest'; ?>
	
@extends($layout)

@section('content')

<?php
	$profile	=	$user->profile;
	$addskil 		=	(!empty($user->profile->additional_skills)) ? $user->profile->additional_skills : array();
	$ohterskil		=	isset($addskil['other']) ? $addskil['other'] : array();
	
	$extrafldarray 	= 	(!empty($user->profile->extra_fields)) ? $user->profile->extra_fields : array();
	
	$isSelf	=	auth()->check() && auth()->user()->id == $user->id;
	
	//dump($profile);
	
?>
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
        	<div class="col-1-1">
            	
            	<div class="col-1-1">
                    <div class="{{ ($isSelf) ? "col-5-8" : "col-1-1" }}">
                        <h1 class="item-head {!! (strlen($profile->company_name) > 20) ? 'hasTooltip" title="'.$profile->company_name.'"' : '"'!!}>
                            {!! $user->profile->company_name !!}                            
                        </h1>
                    </div>
                    
                    @if($isSelf)
                        <div class="col-2-8 right">
                            <div class="mrgbt5"><a class="btn btn-white" href="{{URL::route('profile.edit') }}">Edit profile</a></div>
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
            <a class="item-right-item bg-check-circle btn ypul0" href="{{ URL::route('user.submission',['id'=>$user->id]) }}">{{ trans('lang.submissions') }}</a>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    
    {{--- Removed as par Ann Notes in correction file May 25
    <div class="col-1-1 ypul20 relative">
        @if(!empty($user->next))
        <div class="right col-3-20 mrglft15">
        	<a class="col-1-1 btn btn-gray fa-chevron-right btn-icon-right  xpul50" href="{{ URL::to('/profile/'.$user->next[0].'/view') }}">{{ trans('lang.next') }}</a>
        </div>
        @endif
        
        @if(!empty($user->previous))
        <div class="right col-3-20"><a class="col-1-1 btn btn-gray fa-chevron-left btn-icon mrgrt15 xpul50 " href="{{ URL::to('/profile/'.$user->previous[0].'/view') }}">{{ trans('lang.previous') }}</a></div>
        @endif
        
        <div class="clearfix"></div>
       
    </div>
    ---}}
    
    <!-- About Me -->
    <div class="col-1-1 ymrg20">
    	<h4 class="BlueRadialHead">About</h4>
        <div class="col-1-1 pul8 RadialBoxBottom">
            <div class="col-3-3 xpul20">
           		{!! $user->profile->about_me !!}
			</div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- About Me -->
    
    <!-- Scripts -->
    <?php $profileScripts	=	 $user->profile->WrittingProjects()->get();   ?>
    @if(!$profileScripts->isEmpty())
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
								$genre	=	checkForOther($profileScript->genre);
								$subgenre	=	checkForOther($profileScript->subgenre);
									
									if(!empty($genre))	echo $genre;
									if(!empty($genre) && !empty($subgenre))	echo "&nbsp;/&nbsp;";
									if(!empty($subgenre))	echo $subgenre;
								?>
                            </span>
                            @if(!empty($profileScript->pages))
	                            <span class="page">page {{$profileScript->pages}}</span>
                            @endif
                        </div>
                        <div class="col-1-1 profile-script-logline">{{$profileScript->logline}}</div>
                        <div class="col-1-1 mrgbt15">
                        	@if($profileScript->permissions)
                            	<div class=" col-2-3" style="margin:0 auto; display:block">
                                	<a class="btn btn-primary xpul40 " style="margin:0 auto; display:block" target="_blank" href="{{ $profileScript->scriptFile->link }}">
                                		View
                                	</a>
                                </div>
                            @elseif(auth()->check())
	                            <div class="btn btn-primary xpul40 col-2-3" style="margin:0 auto; display:block" id="sendViewRrequest">
                                	Request
                                </div>
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
    <?php $profileProjects	=	 $user->profile->FeatureProjects()->get();  ?>
    @if(!$profileProjects->isEmpty())
    <div class="col-1-1">
	    <h4 class="BlueRadialHead mrgbt10">{{ strtoupper(trans('lang.featured-projects')) }}</h4>
        <div class="col-1-1">        	
        @foreach($profileProjects as $profileProject)
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
                        <h5>{!! checkForOther($profileProject->form) !!}</h5>
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
                                	@if(!is_null($profileProject->scriptFile))
                                     <a class="btn btn-icon bg-script" href="{{ $profileProject->scriptFile->link }}" target="_blank">&nbsp;Script</a>
                                     @endif
                                    @if(!empty($profileProject->link))
                                     <a class="btn btn-icon fa-link" href="{{ ext_link($profileProject->link) }}" target="_blank">&nbsp;More Info</a>
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
    
    
    <!-- Clases-->  
    <?php $Classes	=	 $user->profile->Classes()->get(); ?>
    @if(!$Classes->isEmpty())
    <div class="col-1-1 mrgtp20">
	    <h4 class="BlueRadialHead mrgbt10">{{ strtoupper(trans('lang.classes')) }}</h4>
        <div class="col-1-1">        	
        @foreach($Classes as $Class)
            <div class="col-1-4 pulrt10">
            	<div class="profile-fproject" data-id="#classes{{ $Class->id}}">
                	@if(!empty($Class->image))
                    	{!! Html::image("public/uploads/profiles/users/$user->id/classes/$Class->id/$Class->image","Project Poster",['class'=>"topBorderRadius"]) !!}
                    @else
                    	{!! noImage() !!}
                    @endif
                    <div class="clearfix"></div>
                    <div class="col-1-1 RadialBoxBottom pul10">
                    	<h2> {{ $Class->title }}</h2>
                        <h5>{!! checkForOther($Class->form) !!}</h5>
                    </div>
                    <div class="col-1-1 slideAnimate" id="classes{{$Class->id}}">
                        <div class="col-1-1 BorderBox">
                            <div class="col-1-1  bgBlue">
                                <h5 class="headonBlue">{{ $Class->title }}</h5>
                            </div>
                            <div class="col-1-1 pul15">
                                <div class="col-1-1 mrgbt5">
                                    <b>{!! checkForOther($Class->category) !!}</b>
                                </div>
                                <div class="col-1-1 mrgbt5">
                                     <b>{!! $Class->class_dates !!}</b>
                                </div>
                                <div class="col-1-1 mrgbt5">
                                     <b>{!! ($Class->location) !!}</b>
                                </div>
                                
                                <div class="col-1-1 pul15 scriptInfoDetail CustomScrollbar">
                                <div class="col-1-1 mrgbt5">
                                     <h4>At a Glance</h4>
                                     <p class="bullet-point">{!! $Class->bullet1 !!}</p>
                                     <p class="bullet-point">{!! $Class->bullet2 !!}</p>
                                     <p class="bullet-point">{!! $Class->bullet3 !!}</p>
                                </div>
                                	{!! ($Class->description) ? $Class->description : "" !!}
                                </div>
                                @if(!empty($Class->link))
                                <div class="col-1-1 ymrg5">
                                     <a class="btn btn-icon fa-link" href="{{ $Class->link }}" target="_blank">&nbsp;More Info</a>
                                </div>
                               	@endif
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
    <!-- Clases-->  
    
    
    <!--- Contest --->
   	<?php $Contests	=	 $user->profile->Contests()->get(); //dump($Contests); ?>
    @if(!$Contests->isEmpty())
    <div class="col-1-1 mrgtp20">
    	<h4 class="BlueRadialHead mrgbt10">{{ strtoupper(trans('lang.contest')) }}</h4>
        <div class="col-1-1">        	
        @foreach($Contests as $Contest)
            <div class="col-1-4 pulrt10">
            	<div class="profile-fproject" data-id="#contest{{ $Contest->id}}">
                	@if(!empty($Contest->image))
                    	{!! Html::image("public/uploads/profiles/users/$user->id/contest/$Contest->id/$Contest->image","Project Poster",['class'=>"topBorderRadius"]) !!}
                    @else
                    	{!! noImage() !!}
                    @endif
                    <div class="clearfix"></div>
                    <div class="col-1-1 RadialBoxBottom pul10">
                    	<h2> {{ $Contest->title }}</h2>
                        <h5>{!! checkForOther($Contest->form) !!}</h5>
                    </div>
                    <div class="col-1-1 slideAnimate" id="contest{{$Contest->id}}">
                        <div class="col-1-1 BorderBox">
                            <div class="col-1-1  bgBlue">
                                <h5 class="headonBlue">{{ $Contest->title }}</h5>
                            </div>
                            <div class="col-1-1 pul15">
                            	@if(!empty($Contest->date))
                                <div class="col-1-1 mrgbt5">
                                    <b>Event&nbsp;:</b>&nbsp;{!! $Contest->date !!}
                                </div>
                                @endif
                                
                                @if(!empty($Contest->entry_deadline))
                                <div class="col-1-1 mrgbt5">
                                     <b>Entry Deadline&nbsp;:</b>&nbsp;{!! $Contest->entry_deadline !!}
                                </div>
                                @endif
                                
                                @if(!empty($Contest->entry_fee))
                                <div class="col-1-1 mrgbt5">
                                     <b>Entry Fee:&nbsp;:</b>&nbsp;{!! $Contest->entry_fee !!}
                                </div>
                                @endif
                                <div class="col-1-1 pul15 scriptInfoDetail CustomScrollbar">
                                
                                	{!! ($Contest->description) ? $Contest->description : "" !!}
                                </div>
                                @if(!empty($Contest->link))
                                <div class="col-1-1 ymrg5">
                                     <a class="btn btn-icon fa-link" href="{{ $Contest->link }}" target="_blank">&nbsp;More Info</a>
                                </div>
                                @endif
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
    <!--- Contest --->
    
    <div class="clearfix"></div>
	
    @if(auth()->check() && auth()->user()->id != $user->id)
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
			
			$(".profile-fproject").each(function(index, element) {
			var $this = $(this);
			var top	=	function(){ $div.css({
							'top':( $this.offset().top - $div.height() - $(window).scrollTop()),
						}) }
			
			var $div	=	$($(this).data('id'));
			
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
        })
		
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
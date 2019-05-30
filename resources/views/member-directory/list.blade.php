<?php $layout	= (auth()->check())  ?  'layouts.myaccount' : 'layouts.guest'; ?>
	
@extends($layout)

@section('content')
<?php $data || $data = array();
		$data['filter'] || $data['filter'] = []; ?>
  
  
  
    <h1 class="heading_tital">{{ trans('menu.reader-directory') }}</h1>
    <div class="row mrgtp20">
        <div class="col-17-24">
        	<div class="col-1-1">
                @foreach($members as $member)
                	<?php $user	=	App\Models\User::find($member->user_id); ?>
                    <?php  //dump($member) ?>
                    <?php $extrafld	=	($member->extra_fields!='') ? unserialize($member->extra_fields) : array(); ?>
                    
                    <div class="item-box row mrgbt20 pul15">
                    	<div class="col-2-11">
                            <div class="col-1-1 profile-thumnail">
                                <a href="{{ URL::to('profile/$user->link/view')  }}">
                                    @if($member->profile_img) 
                                        {{ Html::image("public/uploads/profiles/users/$member->user_id/$member->profile_img", "Profile Avtar") }}
                                    @else
                                         {{ Html::image("public/images/no-image.png", "Profile Avtar") }}
                                    @endif
                                </a>
                            </div>                        	
                        </div>
                        
                        <div class="col-6-11 pullft10">
                        	<h3 class="item-head member-directory">
                                <a href="{{ URL::to("profile/".$user->id."/view")  }}">
                                    {{str_limit($member->full_name,45)}}
                                </a>
                               
                                @if(is_array($extrafld) && in_array('WGA Member',$extrafld)) <small>{{ trans("form.wga_member") }}</small> @endif
                               
                            </h3>
                            <div class="item-desc col-1-1 ">
                                        {{ str_limit(strip_tags($member->brief_boi),210) }}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        
                        
                        <div class="col-3-11 item-right-main pullft15">
                            <div class="item-right-item mrgbt5 bg-profile"><a href="{{ $user->link }}" target="_blank">{{ trans('lang.view-profile') }}</a></div>
                            @if(auth()->check())    
                                @if(auth()->user()->id == $user->id)                            	
                                    <div class="item-right-item  bg-favorite mrgbt5" onclick="FlashMessage('You Can\'t add youself to favorites')" >
                                        {{ trans('lang.favorites') }}
                                    </div>                                
                                    <div class="item-right-item bg-chat " onclick="FlashMessage('You Can\'t send message to youself')">
                                        {{ trans('lang.send-message') }}
                                    </div>
                                @else
									<?php $checkfav	=	auth()->user()->favorites()->where('item_type','user')->where('item_id',$user->id)->count(); ?>
                                    @if(!$checkfav)
                                        <div class="item-right-item  bg-favorite mrgbt5 user-favorite" data-id="{{ $user->id }}" >
                                            {{ trans('lang.favorites') }}
                                        </div>
                                    @else
                                        <div class="item-right-item  relative bg-favorite mrgbt5 user-favorite" data-id="{{ $user->id }}" >
                                            {{ trans('lang.favorites') }}
                                            <i class="fa fa-check absolute t9 r10 f20"></i>
                                        </div>                                        
                                    @endif
                                    <div class="item-right-item bg-chat send-message" data-id="{{ $user->id }}">
                                       {{ trans('lang.send-message') }}
                                    </div>
                                @endif
                            @else
                                <div class="item-right-item  bg-favorite mrgbt5" onclick="FlashMessage('Please Login First')" >
                                    {{ trans('lang.favorites') }}
                                </div>
                                <div class="item-right-item  bg-chat mrgbt5" onclick="FlashMessage('Please Login First')">
                                	{{ trans('lang.send-message') }}
                                </div>
                            @endif
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
        {{ Form::model($data,['url' => URL::to('reader-directory'),'id'=>'members_form','method'=>'GET']) }}
        <div class="col-7-24 pullft40" id="member-filter">
        	<div class="col-1-1 mrgbt25 bgGray xpul15 ypul15 BorderBox">
            	<div class="col-2-9">
                	Show
                </div>
                <div class="col-4-9">
                	<?php  $perpage	=	isset($data['per_page']) ? $data['per_page'] : '9'; ?>
                    {!!
                            Form::select('per_page',array(
                                '3' => '3',
                                '6' => '6',
                                '9' => '9',
                                '12' => '12',
                                '15' => '15',
                                '30' => '30',
                                '50' => '50',
                                '100' => '100'
                                ),$perpage,['class'=>'noeffect','onchange'=>'this.form.submit();']	
                            )
                        !!}
                </div>
                <div class="col-3-9">
                	per page 
                </div>
                
            	<div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-1-1">
            	{!! $members->appends($data)->links() !!}
            </div>
            <div class="col-1-1 BorderBox" id="member-filter-items">
            	<h4 class="headonBlue">{{ trans('lang.filter-member-by') }}</h4>
                <div class="col-1-1 pul10">
                <?php 
					$field	=	array("script_consultant"=>"Script Consultant",
										"script_coverage"=>"Script Coverage",
										"dev_notes"=>"Development Notes",
										"script_writing"=>"Script Writing",
										"ghost_writing"=>"Ghost Writing",
										"rewrite_assis"=>"Rewrite Assistance",
										"instructor"=>"Instructor",
										"wga_member"=>"WGA Member",
										"proffNformat"=>"Proofreading & Formatting",
										"templates"=>"Templates",
										);
				?>
                	@foreach($field as $key=>$value)
                	<div class="col-1-1 pullft5 ymrg3">
                    	<div class="left mrgrt15">
                        {!! Form::checkbox('filter[]',$value,in_array($value,$data['filter']),array('onclick'=>'this.form.submit()')) !!}</div>
                        <div class="left">{{ trans("form.$key") }}</div>
                    </div>
                    @endforeach
                                          
                    <div class="col-1-1 ymrg5">
                 	{!! Form::text("location",NULL,["placeholder"=>trans('form.location'),"id"=>"location","class"=>"text textInput it"]) !!}
                    </div>
                    <div class="col-1-1 ymrg5">
                        {!! Form::text("add_language",NULL,["placeholder"=>trans('form.aditinl-lang'),"id"=>"add_language","class"=>"text textInput it"]) !!}
                    </div>
                    <div class="col-1-1 mrgtp10">
                    	<input type="reset" class="col-1-3 btn btn-primary left" id="clear-member-filter" value="CLEAR" />
                        <input type="submit" class="col-1-3 btn btn-primary right" id="serach-member-filter" value="SEARCH" />                       
                    </div>
                    <div class="clearfix"></div>
                </div>                
            </div>
             <div class="clearfix"></div>
        </div>
        {{ Form::close() }}
        <div class="clearfix"></div>
    </div>
	@if(auth()->check())
    {!! view('message.message')->with(['contact'=>false,'email'=>false]) !!}
    @endif
    
@push('script')
    @if(!auth()->check())
        {!! Html::script('public/js/message.js') !!}
    @endif 
	<script>
	(function($){
		$(document).ready(function(e) {
            $('input[type="reset"]').click(function(){
				window.location = '{{ URL::to('/reader-directory') }}';
			});
			
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
		
	})(jQuery)
    </script>
@endpush

@stop



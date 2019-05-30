<div class="top-left hidden-sm hidden-xs">                
    <ul>
        <li><a href="{{ url('/directory') }}">Directory</a></li>
        <li><a href="{{ url('/submission-directory') }}">Submissions</a></li>
        <li><a href="{{ url('/contact-us') }}">Contact</a></li>
        
        <div class="clearfix"></div>
        
    </ul>
</div>
<div class="dash-top-right">        
    <ul class="right-icon">
        {{--- <li class="notificaton" id="notifyBtnPopup">
            <a href="#">
                {!! Html::image("public/images/icons/bell.png","bell.png") !!}
                @if(!$notifications->isEmpty() && $notifications->where('is_seen',0)->count())
	                <span>{{ $notifications->where('is_seen',0)->count() }}</span>
                @endif
            </a>
        </li> --}}
        <li class="massage" id="msgBtnPopup">
        
        	<a href="#">
                {!! Html::image("public/images/icons/bell.png","bell.png") !!}
                @if(!$message->isEmpty() && $message->where('is_seen',0)->count())                	
               		<span>{{ $message->where('is_seen',0)->count() }}</span>
                @endif
            </a>
        </li>
        {{-- <li id="srequestnotification" class="request">
        	<a href="#">
        		{!! Html::image("public/images/dash-top-right-icon2.png","dash-top-right-icon2.png") !!}
        	</a>
            @if(!$request->isEmpty() && $request->where('is_seen',0)->count())
    	        <span>{{ $request->where('is_seen',0)->count() }}</span>
            @endif
        </li> --}}
        <li class="profile-box sprofilepop"><a href="#">{!! auth()->user()->profile->image !!}</a></li>
        <li class="name sprofilepop"><a href="#">{!! auth()->user()->first_name !!}</a></li>
        <li class="logout sprofilepop"><a href="#">{!! Html::image("public/images/dash-top-right-logout.png" ,"dash-top-right-logout.png") !!}</a></li>
        
        <div class="clearfix"></div>
    </ul>    
    {{-- <div class="top-notifications BorderBox slideAnimate" id="srequestnotification-popup">
        <div class="col-1-1">
            <div class="col-1-1  bgBlue">
                <h5 class="headonBlue">{{ trans('notification.requests') }}</h5>
            </div>            
    
            @if(!$request->isEmpty())        
                @foreach($request as $notification)
                    <div class="col-1-1 pul8 notification {{ (!$notification->is_seen) ? "unread" : "" }}">
                        <div class="left">
                            {{ Html::image("public/images/icons/$notification->icon") }}
                        </div>
                        <div class="left mrglft15">
                            <a class="tip-description mrg0" href="{{ $notification->link }}">{{ $notification->message }}</a>
                            <span class="date" style="font-size:12px;display:block">{{ date('F d, Y',strtotime($notification->created_at)) }}</span>
                        </div>
                    </div>
                    <div class="h-line"></div>
                @endforeach
            @else
                <div class="col-1-1 pul8">                    
                    <div class="left mrglft15">
                    	<p class="tip-description mrg0">No Record Found</p>
                    </div>
                </div>
           	@endif
        </div> 
        <div class="clearfix"></div>
    </div> --}}
    
    <div class="top-notifications BorderBox slideAnimate" id="msg-notify-popup">
        <div class="col-1-1">
            <div class="col-1-1  bgBlue">
                <h5 class="headonBlue">{{ trans('notification.notifications') }}</h5>
            </div>
             @if(!$message->isEmpty())
             <div class="clearfix"></div>
             <div class="CustomScrollbar" style="max-height:300px">     	
                @foreach($message as $notification)
                	
                    @if($notification->notification_type==2)
                    	<?php $notification->load('request'); ?>
                        <div class="col-1-1 pul8 notification {{ (!$notification->is_seen) ? "unread" : "" }}">
                                
                                <div class="left user-image">
                                    {!! $notification->sender->profile->image !!}
                                </div>
                                    
                                <div class="left mrglft10 {{($notification->type == 'invite-friend') ? 'col-md-7' : 'col-md-10'}}">
                                    <?php echo $notification->message ;?>
                                    <span class="date" style="font-size:12px;display:block">{{ date('F d, Y',strtotime($notification->created_at)) }}</span>	
                                </div>
                                <div class="col-md-4">
                                	
                                    @if($notification->type == 'invite-friend')
                                        @if($notification->request->request_status == 'pending')
                                            <button id="declineRequest_{{$notification->request->id}}" class="btn btn-primary right btn-icon xpul40 top-btn">
                                            	Decline
                                            </button>
                                            <button id="acceptRequest_{{$notification->request->id}}" class="btn btn-primary right mrgrt10 btn-icon xpul40 top-btn">
                                            	Accept
                                             </button>
                                            @push('scriptFooter')
                                            	<script type="text/javascript">
													$("#declineRequest_{{$notification->request->id}}").setRequestResult({request_id:'{{$notification->request->id}}',result:'declined',position:'top'});
													$("#acceptRequest_{{$notification->request->id}}").setRequestResult({request_id:'{{$notification->request->id}}',result:'accepted',position:'top'});
												</script>
                                            @endpush
                                        @else
                                            <button class="btn btn-primary disabled right mrgrt10 btn-icon fa-check xpul40">
                                                {{ ucfirst($notification->request->request_status) }}
                                            </button>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="h-line"></div>
                    
                    @else
                        @if(!$notification->deleted)
                            <div class="col-1-1 pul8 notification {{ (!$notification->is_seen) ? "unread" : "" }}">
                                <div class="left">
                                    {{ Html::image("public/images/icons/$notification->icon") }}
                                </div>
                                <div class="left mrglft15">
                                    @if($notification->type=='contect-request-decline')
                                        <a class="tip-description mrg0" href="#"><?php echo $notification->message ;?></a>
                                    @else
                                        <a class="tip-description mrg0" href="{{ $notification->link }}"><?php echo $notification->message ;?></a>
                                    @endif    
                                    <span class="date" style="font-size:12px;display:block">{{ date('F d, Y',strtotime($notification->created_at)) }}</span>
                                </div>
                            </div>
                            <div class="h-line"></div>
                        @endif
                        
                    @endif      
                    
                @endforeach
              </div>                  
            @else
                <div class="col-1-1 pul8">                    
                    <div class="left mrglft15">
                    	<p class="tip-description mrg0">No Record Found</p>
                    </div>
                </div>
           	@endif
            
            
        </div> 
        <div class="clearfix"></div>
    </div>
    {{-- 
    <div class="top-notifications BorderBox slideAnimate" id="notification-popup">
        <div class="col-1-1">
            <div class="col-1-1  bgBlue">
                <h5 class="headonBlue">{{ trans('notification.notifications') }}</h5>
            </div>
            
           @if(!$notifications->isEmpty())  
                @foreach($notifications as $notification)
                    <div class="col-1-1 pul8 notification {!! (!$notification->is_seen) ? "unread" : "" !!}">
                        <div class="left">
                            {{ Html::image("public/images/icons/$notification->icon") }}
                        </div>
                        <div class="left mrglft15">
                            <a class="tip-description mrg0" href="{{ $notification->link }}">{{ $notification->message }}</a>
                            <span class="date" style="font-size:12px;display:block">{{ date('F d, Y',strtotime($notification->created_at)) }}</span>
                        </div>
                    </div>
                    <div class="h-line"></div>
                @endforeach
            @else
                <div class="col-1-1 pul8">                    
                    <div class="left mrglft15">
                    	<p class="tip-description mrg0">No Record Found</p>
                    </div>
                </div>
           	@endif
        </div> 
        <div class="clearfix"></div>
    </div>
    --}}
    
    <div class="top-profile-popup" id="sprofile-popup">
    	<div class="col-1-4">
        	<div class="profile-box">
	            <a href="{!! App\Models\User::UserprofileLink(auth()->user()->id) !!}">{!! auth()->user()->profile->image !!}</a>
            </div>
        </div>
        <div class="col-3-4">
        	<h4 class="name">{!! auth()->user()->profile->full_name !!}</h4>
        	<ul class="prfile-links">
            	<li><a href="{{ URL::to('myaccount/profile/edit') }}">Edit Profile</a></li>
                <li><a href="{{ URL::to('myaccount/accounts-settings') }}">Settings</a></li>
                <li class="logout"><a href="{{ URL::to('/logout') }}">Log Out</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>  

@push('scriptFooter')
<script>
	(function($){
		$(document).ready(function(e) {
			
           {{-- $("#srequestnotification").notificationPopUp({
					div:'#srequestnotification-popup',
					ids:'{!! $request->where('is_seen',0)->pluck('id')->toJson() !!}',
					count:{{ $request->where('is_seen',0)->count() }}
					});			
			--}}
					
			$("#msgBtnPopup").notificationPopUp({
						div:'#msg-notify-popup',
						ids:'{!! $message->where('is_seen',0)->pluck('id')->toJson() !!}',
						count:{{ $message->where('is_seen',0)->count() }}
					});			
			{{--$("#notifyBtnPopup").notificationPopUp({
						div:'#notification-popup',
						ids:'{!! $notifications->where('is_seen',0)->pluck('id')->toJson() !!}',
						count:{{ $notifications->where('is_seen',0)->count() }}
					}); --}}
        });
	})(jQuery)
</script>
@endpush
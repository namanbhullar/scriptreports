@extends('layouts.iframe')

@section('content')
	<h3 class="blue-head mrg0 ">{{ trans('lang.member-directory') }}</h3>
    <div class="col-1-1 pul20">
    	@if(count($readers))
            @foreach($readers as $reader)
                <div class="col-1-1 item-box pul10 mrgbt10" id="item{{ $reader->user_id }}">
                    <div class="left mrgrt20">
                        <div class="inbox-thumnail iframe-member-dir">
                            @if($reader->profile_img) 
                                {{ Html::image("public/uploads/profiles/users/$reader->user_id/$reader->profile_img", "Profile Avtar") }}
                            @else
                                 {{ Html::image("public/images/no-image.png", "Profile Avtar") }}
                            @endif
                        </div>
                    </div>
                    <div class="col-7-14">         
                       <?php $extrafld	=	(!empty($reader->extra_fields)) ? $reader->extra_fields : array(); ?>
                        @if($reader->user_group==4)   
                            <h3 class="item-head"> {{ $reader->company_name }} </h3>
                            <h4 class="item-sub-head">
                                {!! str_limit($reader->full_name,30) !!}&nbsp;&nbsp;&nbsp;&nbsp;{!! str_limit($reader->title,25) !!}
                            </h4>
                        @else
                            <h3 class="item-head">
                                {!! str_limit($reader->full_name,45) !!}
                             {{--    @if(in_array('WGA Member',$extrafld)) 
                                    <small> {{ trans('lang.wga-member') }} </small>
                                @endif   --}}
                            </h3>
                        @endif
                    </div>
                    <div class="col-5-14 right">
                    @if(auth()->user()->id != $reader->user_id)										
                    <?php		$send_request	=	App\Models\RequestsAll::where('sender_id','=',auth()->user()->id)
                                                        ->where('receiver_id','=',$reader->user_id)
                                                        ->where('request_type','=','AddProfile')
                                                        ->orderBy('id', 'desc')->first();
                            if(!is_null($send_request)){							
                                isset($send_request->request_status) || $send_request->request_status	=	NULL;
                        ?>
                                @if($send_request->request_status=='decline')                    
                                    <a class="btn btn-primary right mrgtp20" onclick="FlashMessage('Your Request has been Decline. You cannot sent another Request.',false)">Request Sent</a>                    
                                @elseif($send_request->request_status=='pending')							
                                    <a class="btn btn-primary right mrgtp20" onclick="FlashMessage('Request already sent. You cannot sent another Request.',false)">Request Pending</a>								
                                @elseif($send_request->request_status=='accept')							
                                    <a class="btn btn-primary right mrgtp20" onclick="FlashMessage('{{ $user->profile->full_name }} is already in your submission profile.',true)">Request Accepted</a>							
                                @else							
                                    <a class="btn btn-primary right mrgtp20" chang="true" onclick="SentAddProfileRequest(this,{{$reader->user_id}})">Add to Profile</a>
                                @endif
                            <?php }else{?>
                                    <a class="btn btn-primary right mrgtp20" chang="true" onclick="SentAddProfileRequest(this,{{$reader->user_id}})">Add to Profile</a>                    	
                            <?php } ?>
                    @endif
                        <div class="right">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endforeach
        @else
        	<div class="col-1-1 item-box pul10 mrgbt10">
            	<h4>{{ trans('lang.no-user-in-contact') }}</h4>
                <h5 class="mrgtp10">{{ trans('lang.no-user-in-contact-msg') }}</h5>
            </div>
        @endif
        
        {!! csrf_field() !!}
        <div class="clearfix"></div>
    </div>
    
@push('script')

	<script type="text/javascript">
	function SentAddProfileRequest(ele,id){
		var $item	=	$("#item" + id),
		$aLink		=	$(ele);
		$.ajax({
			method:'post',
			headers:{'X-CSRF-TOKEN':TOKEN},
			url:BASEURL + '/myaccount/script-manager/submission-guidelines/add-request',
			data:'id=' + id,
			beforeSend:function(){
				$item.addClass("loadinganimation").addClass("animating"); 
			},
			complete:function(){
				$item.removeClass('loadinganimation').removeClass('animating');
			},
			error:function(){ parent.FlashMessage('Fail To Send Request. Please Try Again Letter',false)},
			success:function(data){
				
				if(data.status == 'ok')
				{
					$aLink.attr('onclick',"parent.FlashMessage('Request already sent, cannot send another request',false)").html("Request Pending");
					parent.FlashMessage(data.msg,true);
				}
				else
				{
					parent.FlashMessage(data.msg,false);
				}
			}
		})
		
		
	}
    </script>    
@endpush
	
@stop
<?php 
	//$contact	=	auth()->user()->submission->reader()->where('reader_id','1')->first();
	//dd($contact);
	auth()->user()->load('submission.reader.user.profile');	
	if(!is_null(auth()->user()->submission))	$readers		=	auth()->user()->submission->reader;	
	else $readers = null;
?>
@if(is_object($readers) && !$readers->isEmpty())
@foreach($readers as $reader)
<?php $profile	=	 $reader->user->profile; 
//dump($contact->contactUser->link);
?>
<div class="col-1-1 item-box pul10 mrgbt10" data-tab="readers" id="contact{{$reader->id}}">    
	<div class="col-1-24">
        <span class="ul-checkbox fa fa-square-o"></span>
        <div class="task-div">
            <ul class="task-ul" data-id="{{$reader->id}}" data-type="reader-delete">
                <li data-task="delete">
                    {{ trans('lang.delete') }}
                </li>
            </ul>
        </div>                
    </div>
    <div class="left mrgrt20">
        <div class="inbox-thumnail ">     
	        {!! $profile->image !!}
        </div>
    </div>
    <div class="col-8-24">
         <h4 class="item-head">
            <a href="javascript:FlashMessage('You can\'t edit a reader',false);" >{{str_limit($profile->full_name,40)}}</a>
         </h4>
         <div class="item-detail">
            <span class="date" >{{ date('F j, Y',strtotime($contact->created_at)) }}</span>
         </div>
    </div>            
    <div class="col-8-24">
         <div class="item-detail">
            {{str_limit($profile->company_name, 80)}}
         </div>
    </div>
    <div class="col-4-24 right">
        <div class="item-right-main">
            <div class="item-right-item mrgbt5 fa-user"><a href="{!! $reader->user->link !!}">{{ trans('lang.view-profile') }}</a></div>
            <div class="item-right-item bg-chat send-message" data-id="{{ $reader->user->id }}">{{ trans('lang.send-message') }}</div>
        </div>
    </div>
    
    <div class="clearfix"></div>
</div>
@endforeach
@endif
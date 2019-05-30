@if(!is_null($invite->invtUser))
<?php $profile	=	 $invite->invtUser->profile; 

?>
<div class="col-1-1 item-box pul10 mrgbt10" data-tab="accept" id="invite{{$invite->id}}">
    <div class="col-1-24">
        <span class="ul-checkbox fa fa-square-o"></span>
        <div class="task-div">
            <ul class="task-ul" data-id="{{$invite->id}}">                 
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
            {{str_limit($profile->full_name,40)}}
         </h4>
         <div class="item-detail">
            <span class="date" >{{ date('F j, Y',strtotime($invite->created_at)) }}</span>
         </div>
    </div>            
    <div class="col-8-24">
         <div class="item-detail">
            {{str_limit($profile->company_name, 80)}}
         </div>
    </div>
    <div class="col-4-24 right">
        <div class="item-right-main">
            <div class="item-right-item mrgbt5 fa-user"><a href="{!! $invite->invtUser->link !!}">{{ trans('lang.view-profile') }}</a></div>
            <div class="item-right-item bg-chat send-message" data-id="{{ $invite->invtUser->id }}">{{ trans('lang.send-message') }}</div>
        </div>
    </div>
    
    <div class="clearfix"></div>
</div>
@endif
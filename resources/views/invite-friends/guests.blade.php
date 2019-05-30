<div class="col-1-1 item-box pul10 mrgbt10 contacts" data-tab="sent" id="invite{{$invite->id}}">
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
        <div class="inbox-thumnail">     
	        {!! noImage() !!}
        </div>
    </div>
    <div class="col-6-24">
         <h4 class="item-head">
            {{str_limit($invite->name,40)}}
         </h4>
         <div class="item-detail">
         	<span>{{ $invite->email }}</span><br/>
            <span class="date" >{{ date('F j, Y',strtotime($invite->created_at)) }}</span>
         </div>
    </div>            
    <div class="col-8-24">
         <div class="item-detail text-center">
            {{str_limit($invite->subject, 80)}}
            <br/>
            
         </div>
    </div>
    
    <div class="clearfix"></div>
</div>
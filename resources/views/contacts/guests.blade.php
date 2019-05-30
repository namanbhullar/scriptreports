<div class="col-1-1 item-box pul10 mrgbt10 contacts" data-tab="{{$tab}}" id="contact{{$contact->id}}">
    <div class="col-1-24">
        <span class="ul-checkbox fa fa-square-o"></span>
        <div class="task-div">
            <ul class="task-ul" data-id="{{$contact->id}}"  data-type="contact-delete">
                <li data-task="archived" {!! ($tab == 'archived') ? 'style="display:none;"' : ""!!}>
                    {{ trans('lang.archive') }}
                </li>
                <li data-task="unarchived" {!! ($tab == 'archived') ? "" : 'style="display:none;"' !!}>
                    {{ trans('lang.unarchived') }}
                </li>
                <li data-task="delete">
                    {{ trans('lang.delete') }}
                </li>
            </ul>
        </div>                
    </div>
    <div class="left mrgrt20">
        <div class="inbox-thumnail">     
	        {!! Html::image('/public/images/no-image.png') !!}
        </div>
    </div>
    <div class="col-6-24">
         <h4 class="item-head">
            <a href="{{ URL::route("contacts.edit",$contact->id) }}" >{{str_limit($contact->fullname,40)}}</a>
         </h4>
         <div class="item-detail">
         	@if(!empty($contact->company))<span>{{ $contact->company }}</span><br/>@endif
            <span class="date" >{{ date('F j, Y',strtotime($contact->created_at)) }}</span>
         </div>
    </div>            
    <div class="col-8-24">
         <div class="item-detail">
            {{str_limit($contact->email, 80)}}
            <br/>
            
         </div>
    </div>
    <div class="col-5-24 right">
        <div class="item-right-main">
        	@if(!empty($contact->cellphone))
            	{{ trans("lang.cell-phone") }} : <span class="date">{{ $contact->cellphone }}</span><br/>	
            @endif
            
            @if(!empty($contact->busiphone))
				{{ trans("lang.business-phone") }} : <span class="date">{{ $contact->busiphone }}</span>
            @endif
           
        </div>
    </div>
    
    <div class="clearfix"></div>
</div>
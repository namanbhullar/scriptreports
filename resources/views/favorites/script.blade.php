<?php 
	$favorite->load('script.user.profile');
	
	$script	=	$favorite->script;
	//dump($script);
	
	$form		=	(strtolower($script->form[0]) == 'other') ? $script->form[1] : $script->form[0];
	$genre		=	(strtolower($script->genre[0]) == 'other') ? $script->genre[1] : $script->genre[0];
	$subgenre	=	(strtolower($script->subgenre[0]) == 'other') ? $script->subgenre[1] : $script->subgenre[0];
	
	$arcived	=	(bool) $favorite->status;
?>
<div class="col-1-1 item-box pul10 mrgbt10" data-tab="{{ ($arcived) ? "script" : "archived" }}" id="favorite{{$favorite->id}}">
    <div class="col-1-24">
        <span class="ul-checkbox fa fa-square-o"></span>
        <div class="task-div">
            <ul class="task-ul" data-id="{{$favorite->id}}">
                 <li data-task="archived" {!! (!$arcived) ? 'style="display:none;"' : ""!!}>
                    {{ trans('lang.archive') }}
                </li>
                <li data-task="unarchived" {!! (!$arcived) ? "" : 'style="display:none;"' !!}>
                    {{ trans('lang.unarchived') }}
                </li>
                <li data-task="delete">
                    {{ trans('lang.delete') }}
                </li>
            </ul>
        </div>                
    </div>
    <div class="left mrgrt20">
        <div class="inbox-thumnail ">   
        	@if(!is_null($script->user))  
	        	{!! $script->user->profile->image !!}
            @else
            	{!! noImage() !!}
            @endif
        </div>
    </div>
    <div class="col-8-24">
         <h4 class="item-head">
            {{str_limit($script->script_title,40)}}
         </h4>
         <div class="item-detail">
            <span class="date" >{{ date('F j, Y',strtotime($favorite->created_at)) }}</span>
         </div>
    </div>            
    <div class="col-8-24">
         <div class="item-detail text-center">
            @if(!empty($form)) {{ str_limit($form,25) }} <br/> @endif
            <span class="date col-1-1">
            	<?php 
					if(!empty($genre)) echo $genre;
					if(!empty($genre) &&  !empty($subgenre)) echo "&nbsp;/&nbsp;";
					if(!empty($subgenre)) echo $subgenre;
				?>
                
            </span>
         </div>
    </div>
    <div class="col-4-24 right">
        <div class="item-right-main">
            <div class="item-right-item mrgbt5 bg-script mrgtp20"><a href="{!! $script->link !!}">{{ trans('lang.view-script') }}</a></div>
        </div>
    </div>
    
    <div class="clearfix"></div>
</div>
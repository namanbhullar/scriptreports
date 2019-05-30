@extends('layouts.iframe')

@section('content') 
    <h3 class="blue-head mrg0 mrgbt20">{{ trans('menu.script-manager.scripts') }}</h3>
    <div class="row xpul20">
    	<div class="col-md-12">
        	<ul class="top-tabs scripts" id="tabs">
            	<li class="active bg-script" data-tab="my-script">{{ trans('lang.my-scripts') }}</li>
                <li class="bg-star" data-tab="priority">{{ trans('lang.priority') }}</li>
                <li class="bg-suitcase" data-tab="archived">{{ trans('lang.archive') }}</li>
            </ul>
        </div>
        <div class="col-1-12 pull-right">
        	<div class="btn btn-primary right" id="select-script" style="display:none;">
            	Insert Selected <span>0</span>
            </div>
        </div>
    </div>
    
    <div class="col-1-1 xpul20 mrgtp20">
    
    <?php 
	$AllScript	=	auth()->user()->scripts()->get(); //dd($AllScript)
	$selectedScript	=	$AllScript->filter(function($value,$index){
		return $value->isposted;
	});	
	
	$selectedScript	=	$selectedScript->map(function($value,$index){
		return	$value->id;
	})->toArray();	
	
	
	//dump($selectedScript);
	//dump($AllScript);
			$show_norecords	=	true;
	 ?>
    
    	@foreach($AllScript as $script)
        <?php
		
			
			switch($script->status){
				case 0:
					$tab	=	'archived';
					$liArchived	=	false;
				break;
				
				case 3:
					$tab	=	'priority';
					$liPriority	=	false;
				break;
									
				case 1:
					$tab	=	'my-script';
					$show_norecords = false;
				break;
									
				default:
					$tab	=	'my-script';
					$show_norecords = false;
					$show_norecords = false;
				break;					
			}
			
			$isSelected	=	in_array($script->id,$selectedScript);
		
		?>
            <div class="item-box scripts mrgbt20 {{ ($isSelected) ? "faded" : "" }}" data-tab="{{ $tab }}" id="scripts{{$script->id}}">
            @if($isSelected)
            	<span class="faded-delete" data-id="{{$script->id}}"><i class="fa fa-trash"></i></span>
            @endif
                <div class="col-1-24" style="position:relative;">              
                	<span class="ul-checkbox fa fa-square-o" data-id="{{$script->id}}"></span>
                </div>
                <div class="col-23-24">
                    <div class="col-1-2">
                        <h3 class="item-head script">
                        	<a href="{{ URL::to('/myaccount/script-manager/scripts/'.$script->id.'/view') }}">
                            	{{str_limit($script->title,20)}}
                            </a>
                            @if(isset($script_info[script_draft]) && !empty($script_info[script_draft]))
                                <span>&nbsp;-&nbsp;Draft {{ $script_info[script_draft] }}</span>
                            @endif
                            
                        </h3>
                        <div class="item-detail ">
                        	{!! ShortScriptInfo($script) !!}&nbsp;&nbsp;&nbsp;
                            <span class="date script">{!! date('F j, Y',strtotime($script->created_at)) !!}</span>
                        </div>
                    </div>
                    <div class="col-1-2">
                        <div class="item-desc col-1-1 ">
                            <p class="mrg0">
	                                {{str_limit($script->logline,200)}}
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>                    
                    <div class="clearfix"></div>
                </div>
            </div>
        @endforeach
        
        <div class="item-box no-records row" {{ ($show_norecords) ?  "style=display:block" : "style=display:none" }}>
        	<p>{{ trans('lang.no-record') }}</p>
        </div>
    </div>
    
@push('script')
	{{ Html::script('public/js/specified/script-index-iframe.js') }}    
    <script>
	var token	=	'{{ csrf_token() }}';
	var selectedScript	=	[];
	<?php $count = 0 ?>
	
	
	</script>
@endpush

@stop
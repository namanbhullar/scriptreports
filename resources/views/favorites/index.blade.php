@extends('layouts.myaccount')

@section('content')
<?php
	$favorites	=	auth()->user()->favorites()->where('status','>',-1)->get();
//dump($favorites);
 ?>


<h1 class="heading_tital">{{ trans('menu.favorites') }}</h1>
    <div class="row mrgbt10">
    	<div class="col-11-12">
        	<ul class="top-tabs scripts" id="tabs">
            	<li class="active" data-tab="member">{{ trans('lang.members') }}</li>
                <li class="" data-tab="template">{{ trans('lang.templates') }}</li>
                <li class="" data-tab="script">{{ trans('lang.scripts') }}</li>
                <li class="" data-tab="archived">{{ trans('lang.archive') }}</li>
            </ul>
        </div>
    </div>
    <div class="col-1-1 favorites">
    <?php 
	
		$hide_norecord	=	false; 
		
		foreach($favorites as $favorite)
		{
			switch($favorite->item_type){
				case 'user':
					echo view('favorites.member')->with('favorite',$favorite);
					if($favorite->status) $hide_norecord = true;
				break;
				
				case 'script':
					echo view('favorites.script')->with('favorite',$favorite);;
				break;
				
				case 'template':
					echo view('favorites.template')->with('favorite',$favorite);;
				break;
			}
		}
	?>
   
   
    
    <div class="item-box no-records row" {{ ($hide_norecord) ?  "style=display:none" : "style=display:block" }}>
        	<p>{{ trans('lang.no-record') }}</p>
        </div>
    </div>
   {!! csrf_field() !!} 
   
   {!! view('message.message')->with(['contact'=>false,'email'=>false]) !!}

@push('script')
	{!! Html::script("public/js/specified/favorites.js") !!}
    <script>
		var userId = {{ auth()->user()->id }};
	</script>
@endpush

@push('css')
	<style type="text/css" >
		div[data-tab="member"]{ display:block }
		div[data-tab="script"],
		div[data-tab="template"],
		div[data-tab="archived"]
		{ display:none }
		
	</style>
@endpush


@stop
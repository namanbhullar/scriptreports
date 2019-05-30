@extends('layouts.iframe')

@section('content')
	<h3 class="blue-head mrg0 mrgbt20">{{ trans('menu.script-manager.my-documents') }}</h3>
    <div class="row mrgbt10 xpul20">
    	<div class="col-11-12">
        	<ul class="top-tabs scripts" id="tabs">
            	<li class="active bg-script" data-tab="scripts">{{ trans('lang.script') }}</li>
                <li class="" data-tab="coverage">{{ trans('lang.coverage') }}</li>
                <li class="" data-tab="legal">{{ trans('lang.legal') }}</li>
                <li class="" data-tab="other">{{ trans('lang.other') }}</li>
            </ul>
        </div>
        <div class="col-1-12">
        	<div class="btn btn-primary right" id="select-doc">
            	Insert Selected <span>0</span>
            </div>
        </div>
    </div>
    <div class="col-1-1 xpul20" style="overflow:scroll; height:380px;">
    <?php  $show_norecords	=	true; ?>
    @foreach( $documetns as $dox)
    <?php
		
                
				$tempcls	=	str_replace(" ",'_',strtolower($dox->type));
				switch($tempcls){
					case 'scripts':
					case 'script':
					$tab	=	'scripts';
					$show_norecords	=	false;
					break;
					
					case 'coverage':
					case	'script_coverage';
					$tab	=	'coverage';
					break;
					
					case 'story':
					$tab	=	'story';
					break;
					
					case 'legal':
					$tab	=	'legal';
					break;
					
					default :
					$tab	=	'other';
					break;
				}
	?>
    
    	<div class="col-1-1 item-box row pul10 mrgbt10" data-tab="{{$tab}}" id="dox{{$dox->id}}">
        	<div class="col-1-24">
            	<span class="ul-checkbox fa fa-square-o" data-id="{{$dox->id}}"></span>
            </div>
            <div class="col-23-24">
            	 <h4 class="item-head script">
                 	{{str_limit($dox->title,40)}}
                 </h4>
            </div>
            <div class="clearfix"></div>
        </div>
    	
    @endforeach
    <div class="item-box no-records row" {{ ($show_norecords) ?  "style=display:block" : "style=display:none" }}>
        	<p>{{ trans('lang.no-record') }}</p>
        </div>
    </div>
    
    
 <script>
 	var DcoTitle	=	[];
	var DocLink		=	[];
	@foreach($documetns as $doc)
		DcoTitle[{{$doc->id}}]	=	'{{ str_limit($doc->title,20)}}';
		DocLink[{{ $doc->id }}]	=	'{{ $doc->link }}';
	@endforeach
 </script>   
@push('script')
	{!! Html::script("public/js/specified/documents.js") !!}
	{!! Html::script("public/js/iframe/documents/$jscript") !!}
@endpush
@push('css')
	<style type="text/css" >
		div[data-tab="scripts"]{ display:block }
		div[data-tab="coverage"],
		div[data-tab="story"],
		div[data-tab="legal"],
		div[data-tab="other"],
		div#select-doc
		{ display:none }
		
	</style>
@endpush


@stop
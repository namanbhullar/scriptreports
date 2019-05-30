@extends('layouts.myaccount')

@section('content')
<?php
	$documetns	=	auth()->user()->documents()->where('status','>',-1)->get();
 ?>


<h1 class="heading_tital">{{ trans('menu.script-manager.my-documents') }}</h1>
    <div class="row mrgbt10">
    	<div class="col-11-12">
        	<ul class="top-tabs" id="tabs">
            	<li class="active bg-script " data-tab="scripts">{{ trans('lang.script') }}</li>
                <li class="no-icon" data-tab="story">{{ trans('lang.story') }}</li>
                <li class="no-icon" data-tab="coverage">{{ trans('lang.coverage') }}</li>
                <li class="no-icon" data-tab="legal">{{ ucfirst(trans('lang.legal')) }}</li>
                <li class="no-icon" data-tab="other">{{ trans('lang.other') }}</li>
            </ul>
        </div>
        <div class="col-1-12">
        	<div class="btn btn-primary right btn-icon fa-plus">
            	<a href="{{ URL::to('myaccount/script-manager/my-documents/add') }}">Add New Document</a>
            </div>
        </div>
    </div>
    <div class="col-1-1">
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
    
    	<div class="col-1-1 item-box pul10 mrgbt10" data-tab="{{$tab}}" id="dox{{$dox->id}}">
        	<div class="col-1-24">
            	<span class="ul-checkbox fa fa-square-o"></span>
                <div class="task-div">
                    <ul class="task-ul" data-id="{{$dox->id}}">
                    	<?php /*?><li data-task="scripts" {{ ($tab != 'scripts') ? "style=display:block" : "style=display:none" }}>
                        	{{ trans('lang.mark-as') }} {{ trans_choice('lang.script',1) }}
                        </li>
                        <li data-task="coverage" {{ ($tab != 'coverage') ? "style=display:block" : "style=display:none" }}>
                        	{{ trans('lang.mark-as') }} {{ trans('lang.coverage') }}
                        </li>
                        <li data-task="legal" {{ ($tab != 'legal') ? "style=display:block" : "style=display:none" }}>
                        	{{ trans('lang.mark-as') }} {{ trans('lang.legal') }}
                        </li>
                        <li data-task="other" {{ ($tab != 'other') ? "style=display:block" : "style=display:none" }}>
                        	{{ trans('lang.mark-as') }} {{ trans('lang.other') }}
                        </li><?php */?>
                        <li data-task="download">
                        	<a href="{{ $dox->dlink }}" >
                            {{ trans('lang.download') }}
                            </a>
                        </li>
                        <li data-task="delete">
                            {{ trans('lang.delete') }}
                        </li>
                    </ul>
                </div>                
            </div>
            <div class="col-8-24">
            	 <h4 class="item-head">
                 	<a href="{{ URL::to("myaccount/script-manager/my-documents/$dox->id/edit") }}" >{{str_limit($dox->title,40)}}</a>
                     @if(!empty($dox->draft)) <small>DRAFT {{$dox->draft}}</small>	@endif
                 </h4>
                 <div class="item-detail">
                 	<span class="date" >{{ date('F j, Y',strtotime($dox->created_at)) }}</span>
                 </div>
            </div>            
            <div class="col-10-24">            	 
                 <div class="item-mid-desc">
                 	{{str_limit($dox->description, 80)}}
                 </div>
            </div>
            <div class="col-2-24 right">
            	<div class="item-right-info">
                    @if($dox->file_name != null)
                    <a href="{!! URL::to("/public/uploads/profiles/users/".auth()->user()->id."/mydocuments/".$dox->id."/".$dox->file_name) !!} "  target="_new">
                        <?php $ext	=	end(explode('.',$dox->file_name)); ?>
                            <?php if(strtolower($ext)=='pdf'){ ?>
                                <i class="fa fa-file-pdf-o xpul8 ypul10" ></i>
                            <?php }elseif(strtolower($ext)=='docx' || strtolower($ext)=='doc'){ ?>
                                    <i class="fa fa-file-word-o xpul8 ypul10"></i>
                                    
                             <?php }elseif(strtolower($ext)=='xls' || strtolower($ext)=='xlsx'){ ?>
                                    <i class="fa fa-file-excel-o xpul8 ypul10"></i>       
                            <?php }else{ ?>
                                    <i class="fa fa-file xpul8 ypul10"></i>
                            <?php } ?>
                   </a>
                  @endif
                </div>
            </div>
            
            <div class="clearfix"></div>
        </div>
    	
    @endforeach
    <div class="item-box no-records row" {{ ($show_norecords) ?  "style=display:block" : "style=display:none" }}>
        	<p>{{ trans('lang.no-record') }}</p>
        </div>
    </div>
   {!! csrf_field() !!} 

@push('script')
	{!! Html::script("public/js/specified/documents.js") !!}
   
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
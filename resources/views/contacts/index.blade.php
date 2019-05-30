@extends('layouts.myaccount')

@section('content')
<?php
	$contacts	=	auth()->user()->contacts()->where('status','>',-1)->with('contactUser')->get();
 ?>

<div class="col-1-1 heading_tital">
	<h1>{{ trans('menu.contacts') }}</h1>
</div>

    <div class="row mrgbt10">
    	<div class="col-11-12">
        	<ul class="top-tabs scripts" id="tabs">
            	<li class="active" data-tab="members">{{ trans('lang.members') }}</li>
                <li class="" data-tab="guests">{{ trans('lang.guests') }}</li>
                <li class="" data-tab="readers">{{ trans('lang.readers') }}</li>
                <li class="" data-tab="archived">{{ trans('lang.archive') }}</li>
            </ul>
        </div>
        <div class="col-1-12">
        	<div class="btn btn-primary right btn-icon fa-plus">
            	<a href="{{ URL::to('myaccount/contacts/add') }}">Add New Contact</a>
            </div>
        </div>
    </div>
    <div class="col-1-1 contacts">
    <?php  $show_norecords	=	true; ?>
 @if(!$contacts->isEmpty())
    @foreach( $contacts as $contact)
    <?php
    			
				if($contact->status==0){
					$tab 	= 'archived';		
				}else{
			
					if($contact->type==1){
						$tab 	= 'members';
						$show_norecords	=	false;
					}
					
					if($contact->type==2){
						$tab 	= 'guests';
					}
					if($contact->type==3){
						$tab 	= 'readers';
					}
			}
			
			
	?>
    	@if($contact->type==2)
    		{!! view('contacts.guests')->with(['contact'=>$contact,'tab'=>$tab]) !!}
        @else
	        {!! view('contacts.member')->with(['contact'=>$contact,'tab'=>$tab]) !!}
        @endif
    	
    
    @endforeach
    @endif
    
    {!! view('contacts.reader') !!}
    
    
    <div class="item-box no-records row" {{ ($show_norecords) ?  "style=display:block" : "style=display:none" }}>
        	<p>{{ trans('lang.no-record') }}</p>
        </div>
    </div>
    
    {!! view('message.message')->with(['contact'=>false,'email'=>false]) !!}
    
   {!! csrf_field() !!} 

@push('script')
	{!! Html::script("public/js/specified/contact.js") !!}
@endpush

@push('css')
	<style type="text/css" >
		div[data-tab="members"]{ display:block }
		div[data-tab="guests"],
		div[data-tab="readers"],
		div[data-tab="archived"]
		{ display:none }
		
	</style>
@endpush


@stop
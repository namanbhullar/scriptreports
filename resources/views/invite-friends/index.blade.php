@extends('layouts.myaccount')

@section('content')    
    	<h1 class="heading_tital">Invite Friends</h1>
        <div class="row mrgbt10">
    	<div class="col-11-12">
        	<ul class="top-tabs" id="tabs">
            	<li class="active no-icon" data-tab="sent">Sent</li>
                <li class="no-icon" data-tab="accept">Accepted</li>
            </ul>
        </div>
        <div class="col-1-12">
        	<div class="btn btn-primary right btn-icon fa-plus">
            	<a href="{{ URL::to('myaccount/invite-friends/add') }}">Invite Friends</a>
            </div>
        </div>
    </div>
    
    <?php 	$show_norecords	=	true;
			$isSended		=	false;
			$isAccepted	=	false; 
			
			$invites	=	auth()->user()->invites()->get();
			
	?>
    
    @foreach($invites	as $ref)
    <?php
	
		if($ref->accepted){
			echo view('invite-friends.member')->with(['invite'=>$ref]);
		}else{
			echo view('invite-friends.guests')->with(['invite'=>$ref]);
			$show_norecords	= false;
		}
    ?>
			
            
    @endforeach
   
     <div class="item-box no-records row" {{ ($show_norecords) ?  "style=display:block" : "style=display:none" }}>
        	<p>{{ trans('lang.no-record') }}</p>
        </div>
    </div>
    
   {!! view('message.message')->with(['contact'=>false,'email'=>false]) !!}
   
   
    @push('css')
    	
    	<style>
			div[data-tab="accept"]{
				display:none;
			}
        </style>
    @endpush
    
    @push('script')
    	{!! Html::Script('public/js/specified/invites.js') !!}
    	<script type="text/javascript">
			$(document).ready(function(e) {
                $(".send-message").each(function (index,ele){
					var id	=	$(this).data('id');
					$(this).PopUp({
					
					boxDivId:'send-message',
					 beforeOpen:function(ele){	
					   var form	=	document.getElementById("mesaage-sending-form");
					  form.member.value	=	ele.data('id');
				   },
				   }); 		   
				});
            });
        </script>
    @endpush
     
@stop
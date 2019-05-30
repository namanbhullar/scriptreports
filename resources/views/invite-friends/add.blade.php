@extends('layouts.myaccount')

@section('content')
<?php $user	=	auth()->user(); ?>
<h1 class="heading_tital">Invite Friends</h1>
    {{ Form::open(array('route' => 'invite.save')) }}
    	<div class="col-2-3">
            <div class="col-1-1 mrgbt15">
            	{{Form::label('link','Your referral link',['class'=>' textInput mrgbt5 it'])}}
		        {{ Form::text('link',URL::to('/myaccount/subscribes/4/'.$user->invition_token), ['class'=>'text textInput it','readonly'=>'readonly','required']) }}
            </div>
            
            <div class="col-1-1 mrgbt15">
            	{{Form::label('ProfilLink','Your profile link',['class'=>' textInput mrgbt5 it'])}}
        		{{ Form::text('ProfilLink',auth()->user()->link, ['class'=>'text textInput it','readonly'=>'readonly','required']) }}
            </div>
            
            <div class="col-1-1 mrgbt15">	
            	{{Form::label('email','Emails (Please put comma after or between email addresses)',['class'=>' textInput it'])}}
                <input type="text" name="tag[]" value="" class="tag" id="email_verified"/>
                <div class="hint-wrapper"></div>
            </div>
            
            <div class="col-1-1 mrgbt15">	
            	{{Form::label('subject','Subject',['class'=>' textInput it'])}}
        		{{ Form::text('subject','', ['class'=>'text textInput it','required']) }}
            </div>
            
            <div class="col-1-1 mrgbt30">	
                {{Form::label('message','Message',['class'=>' textInput it'])}}
                {{ Form::textArea('message','', ['class'=>'text textInput it','required']) }}	
            </div>
            
            {{Form::submit('SEND',['class'=>'btn btn-primary right','id'=>'submit', 'data-submit'=>'true'])}}
        </div>
    {{Form::close()}}
    
    
@push('script')
    {{ Html::script('public/js/jquery.autoGrowInput.js') }} 
    {{ Html::script('public/js/jquery.tagedit.js') }} 
    
    <script type="text/javascript">
	$(function() {
		
		// Fullexample
		$('input.tag').tagedit({
			//autocompleteURL: BASEURL+'/myaccount/invite-friends/autocomplete',
          
		});
		
		$(document).ready(function(){
			$("#IndexForm").submit(function(){ 
				if($('input[name="tag[]"]').length<=1){
					alert('Please enter at least one email address');
					return false;
				}else{
					return true;
				}
			})
			
		});
		
	});
function RemoveEmailDiv(){
$(".hint-wrapper").removeClass('show');	
}

var userId = {{ auth()->user()->id }};
	</script>
    
    
@endpush

@push('css')
	{{ HTML::style('public/css/jquery.tagedit.css')}}
@endpush

@stop
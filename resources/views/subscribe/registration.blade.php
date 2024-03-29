@extends('layouts.front')

@section('content')
    @push('css')
    	{!! Html::style("public/css/front/style.css") !!}
        {!! Html::style("public/css/style.css") !!}
        {!! Html::style("public/css/template.css") !!}
        {!! Html::style("public/css/fonts.css") !!}
        {!! Html::style("public/css/profileform.css") !!}
        {!! Html::style("public/old/style.css") !!}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    @endpush
   
    
@if (count($errors) > 0)
    <div class="alert alert-danger">
    	<ol>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
@endif

@if (session('success'))
    <div class="alert success">
    	<ol>
                <li>{{ session('success') }}</li>
        </ol>
    </div>
@endif
 	<h2 class="subscribe_title" style="margin-bottom:0px">Create {{ $plan->plan_title }} Account <?php if(!empty($plan->plan_price)){ echo '($'.$plan->plan_price.'/'.$plan->plan_type.')'; }?></h2>
    <p class="subscribe_pera"> If already a member please login </p>
    
 	<div id="subscription">
			    {{ Form::open(['url' => route('user.registration',['plan'=>$plan->id])],['id'=>'subscribeForm']) }}
				<div class="input">
                    {{ Form::label('full_name', 'Full Name') }}
                    {{ Form::text('full_name', null, ['required']) }}
				</div>
				<div class="input">
                	{{ Form::label('email', 'Email') }}
                    {{ Form::email('email', $email, ['required']) }}
				</div>
				<div class="input">
                	{{ Form::label('password', 'Password') }}                    
                    {{ Form::password('password',array('id'=>'password','required')) }}
				</div>
				<div class="input">
                    {{ Form::label('confirm_password', 'Confirm') }}
                    {{ Form::password('confirm_password',['required']) }}
				</div>
                
                @if($plan->plan_price > 0 )
                    <div class="input">
                        {{ Form::label('promocode', 'Promo Code') }}
                        {{ Form::text('promocode',null,['placeholder'=>'Enter Your Promo Code']) }}
                    </div>
                @endif
                <div class="input">
                 @if($plan->plan_price > 0)
                    	{{ Form::radio('renewal_type', '1',true) }}
                    	{{ Form::label('renewal_type', 'Auto Renewal',
                    	['title'=> 'For your convenience your credit card will be charged each year.  You will be notified prior to renewal if you wish to unsubscribe.']) }}
                    	<div style="clear:both"></div>
                    	{{ Form::radio('renewal_type', '2') }}
                    	{{ Form::label('renewal_type', 'Year to Year',['title'=> 'Your subscription will be close at end of the year if you don\'t renew the subscription.']) }}
					@endif
                </div>
				<div style="text-align:left;" class="checkbox"> 
                	<div class="col-1-1">
                        <div class="left mrgrt15 mrgbt10">
                            {{ Form::checkbox('terms', 'terms',null,['id'=>'terms']) }}
                        </div>               	                    				  	
                        <div class="left">
                            {{ Form::label('terms', 'I Agree to the') }} <a class="tnc" href="http://scriptreports.com/beta/terms-of-use/">Terms and Conditions</a>
                        </div>
                    </div>
                    <div class="col-1-1">
                        <div class="left mrgrt15 mrgbt10">
                            {{ Form::checkbox('privacy', 'privacy','',['id'=>'privacy']) }}
                        </div>
                        <div class="left">
                            {{ Form::label('privacy', 'I Agree to the') }} <a class="tnc" href="http://scriptreports.com/beta/privacy-policy/">Privacy Policy</a>
                        </div>
                    </div>
                    <div class="col-1-1">
                        <div class="left mrgrt15 mrgbt10">
                            {{ Form::checkbox('subscribe', '1') }}
                        </div>
                        <div class="left">
                            {{ Form::label('subscribe', 'Keep me informed about updates, seminars and specials') }}
                        </div>
                    </div>
                    
				</div>
                <div style="clear:both" ></div>
                <div style=" float:left;"> 
                	
                </div>
				<div style=" float:right;"> 
					{{ Form::submit('REGISTER', ['class' => 'btn btn-info','id'=>'submitebutton','onclick'=>'return checkForm();']) }} 
                </div>
				<div class="clear"></div>
			</div>
            
            
            <div class="hint-wrapper">
                <p><strong>Password strength:&nbsp;<span id="result"></span></strong></p>
                <div class="progress">
                <div class="bar" style="width: 0%;"></div>
                </div>
                <ul>
                <li id="first"> <span ><i class="fa fa-times"></i></span>&nbsp;Use at least 9 characters. </li>
                <li  id="second"><span><i class="fa fa-times"></i></span>&nbsp;A numeric value</li>
                <li id="third"><span ><i class="fa fa-times"></i></span>&nbsp;A Capital Letter</li>
                </ul>
            </div>
            
         <script type="text/javascript">
		 
		 	function checkForm(){
				//var terms	=	$("#terms");
				
				if(!$("#terms:checked").length>0){
					alert('Please Agree with our Terms and Conditions');
					return false;	
				}
				
				if(!$("#privacy:checked").length>0){
					alert('Please Agree with our Privacy Policy');
					return false;	
				}
			 	
			}	
		 </script>   
         <style>
		 .checkbox.fa.fa-check-square-o{
			 color:#fff !important;
		 }
		 </style>
         
         {!! Html::script('public/js/specified/subscribe.js') !!}
@stop
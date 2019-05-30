@extends('layouts.front')
@section('content')
    @push('css')
    	{!! Html::style("public/css/front/style.css") !!}
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

<div id="content-box">
    <div class="terms-policy">
    	{!! Form::open(['route' => 'contact-form','method'=>"post"]) !!}
    	<div class="contact-form">
                <div class="msg">
                	<h2> {{ trans("front.CONTACT.CONTACT_US") }} </h2>
                </div>			
				<div class="input">
					<label for="name"> {{ trans("form.FULL_NAME_LABEL") }} </label>
					<input type="text" class="in" value="{{ old('name') }}" id="name" name="name" placeholder="{{ trans("form.FULL_NAME_PLACEHOLDER") }}" >
				</div>
				<div class="input">
					<label for="Email">{{ trans("form.EMAIL_LABEL") }}</label>
					<input type="text" class="in" value="{{ old('email') }}" id="Email" name="email" placeholder="{{ trans("form.EMAIL_PLACEHOLDER") }}">
				</div>
				<div class="input">
					<label for="Subject">{{ trans("form.SUBJECT_LABEL") }}</label>
					<input type="Subject" class="in" value="{{ old('subject') }}" id="Subject" name="subject" placeholder="{{ trans("form.SUBJECT_PLACEHOLDER") }}">
				</div>
				<div class="area">
					<label for="confirm">{{ trans("form.MESSAGE_LABEL") }}</label>
					<textarea class="in" value="" id="Message" name="message">{{ old('message') }}</textarea>
				</div>
                				
				<input type="submit" value="{{ trans("form.SEND") }}" id="signups-b" name="btnreguser">	
        </div>
        {!! Form::close() !!}
        <div class="quick-contact">
            <div class="contact-img" style="margin-top:200px;">
            	{!! Html::image('public/images/logo.png') !!}
                <p>ScriptReports is a cloud-based platform that connects writers, script consultants, and entertainment professionals with tools to better manage, evaluate, and share scripts. </p>
            </div>
        </div>
        
        <div class="clear"></div>
    </div>
</div>

@stop
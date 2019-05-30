@extends('layouts.front')
@section('content')
    @push('css')
    	{!! Html::style("public/css/front/style.css") !!}
        {!! Html::style("public/css/template.css") !!}
        {!! Html::style("public/css/fonts.css") !!}
        {!! Html::style("public/css/profileform.css") !!}
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
 
<div id="logincontainer" class="ymrg100 col-4-11">
    <div class='pul20'>     
        <h1 class="pullft20"><i class='fa fa-lock'></i>@if(isset($verify)) {{ $verify }} @else {{ trans('form.USER_LOGIN') }} @endif </h1>     
        {{ Form::open(['role' => 'form']) }}
     		<input type="text" name="fake_username" style="position:absolute;top:-1000px;"/>
        	<input type="password" name="fake_pass" style="position:absolute;top:-1000px;"/>
        <div class='mrg5 pul5'>
            {{ Form::label('username',  trans('form.EMAIL_LABEL')) }}
            {{ Form::text('username', null, ['placeholder' => trans('form.EMAIL_PLACEHOLDER'), 'class' => 'form-control',required]) }}
        </div>
     
        <div class='mrg5 pul5'>
            {{ Form::label('password', trans('form.PASSWORD_LABEL')) }}
            {{ Form::password('password', ['placeholder' => trans('form.PASSWORD_PLACEHOLDER') , 'class' => 'form-control',required]) }}
        </div>
     
        <div class='mrg5 pul5'>
            {{ Form::submit('Login', ['class' => 'btn btn-primary']) }} <a href="{{ url('/password/reset') }}" style="float:right" class='btn btn-primary'> {{ trans('form.forget_pass') }}</a>
        </div>
     
        {{ Form::close() }}
     
    </div>
 </div>
@stop
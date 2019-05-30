@extends('admin.layouts.master')

@section('content')

<style type="text/css">
	#system-message{
		margin-top:10px;	
	}
</style>
<div id="loginbox">
    <div class='' style="float:none;">
     
        <h1><i class='fa fa-lock'></i> Admin Login</h1>
     
        {{ Form::open(['role' => 'form']) }}
     
        <div class='form-group'>
            {{ Form::label('username', 'Username') }}
            {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) }}
        </div>
     
        <div class='form-group'>
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
        </div>
     
        <div class='form-group'>
            {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
        </div>
     
        {{ Form::close() }}
     
    </div>
 </div>
@stop
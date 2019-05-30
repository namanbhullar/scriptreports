@extends('layouts.myaccount')

@section('content')
<?php $user	=	auth()->user();?>
	<h1 class="heading_tital">{{ trans('lang.accounts-settings') }}</h1>
	{{ Form::open(array('url' => URL::to('myaccount/accounts-settings'), 'id'=>'account-settings-form')) }}
    <div class="col-2-3">
    	<h3>{{ trans('lang.personal-info') }}</h3>
    	 <div class="col-1-1 mrgbt15">
            {{ Form::label('f_name',trans('lang.first-name'),['class'=>'it mrgbt5 required']) }}
            {{ Form::text('f_name',$user->first_name,array('class'=>'text textInput it','placeholder'=>trans('lang.first-name'))) }}
        </div>
       
        <div class="col-1-1 mrgbt15">
            {{ Form::label('l_name',trans('lang.last-name'),['class'=>'it mrgbt5']) }}
            {{ Form::text('l_name',$user->last_name,array('class'=>'text textInput it','placeholder'=>trans('lang.last-name'))) }}
        </div>
        
        <div class="col-1-1 mrgbt15">
            {{ Form::label('email',trans('lang.email-id'),['class'=>'it mrgbt5 required']) }}
            {{ Form::text('email',$user->email,array('class'=>'text textInput it','placeholder'=>trans('lang.email-id'))) }}
        </div>
        
        <div class="h-line ymrg30"></div>
        
        <h3>{{ trans('lang.change-password') }}</h3>
        
        <div style="display:none">
        	{{ Form::password('hiddenpassword') }}
        </div>
        
        <div class="col-1-1 mrgbt15">
            {{ Form::label('old_password',trans('lang.old-password'),['class'=>'it mrgbt5']) }}
            {{ Form::password('old_password',array('class'=>'text textInput it','placeholder'=>trans('lang.old-password'))) }}
        </div>
       
        <div class="col-1-1 mrgbt15">
            {{ Form::label('new_password',trans('lang.new-password'),['class'=>'it mrgbt5']) }}
            {{ Form::password('new_password',array('class'=>'text textInput it','placeholder'=>trans('lang.new-password'))) }}
        </div>
        
        <div class="col-1-1 mrgbt15">
            {{ Form::label('conf_password',trans('lang.retype-password'),['class'=>'it mrgbt5']) }}
            {{ Form::password('conf_password',array('class'=>'text textInput it','placeholder'=>trans('lang.retype-password'))) }}
        </div>
        
        <div class="h-line ymrg30"></div>

        <!-- Save And Clear Buttons -->
        <div class="col-1-1">
            {!! Form::submit("Save",['class'=>"btn btn-primary right xpul20 mrglft20",'id'=>"savBtn"]) !!}
        </div>
        <!-- Save And Clear Buttons -->
    </div>
    
    {{ Form::close() }}
    <?php /*?><div class="hint-wrapper" id="password-hints">
        <p><strong>Password strength:&nbsp;<span id="result"></span></strong></p>
        <div class="progress-bar">
        <div class="bar" style="width: 0%;"></div>
        </div>
        <ul>
        <li id="first"> <span ><i class="fa fa-times"></i></span>&nbsp;Use at least 9 characters. </li>
        <li  id="second"><span><i class="fa fa-times"></i></span>&nbsp;A numeric value</li>
        <li id="third"><span ><i class="fa fa-times"></i></span>&nbsp;A Capital Letter</li>
        </ul>
    </div><?php */?>
    
@push('script')    
	{!! Html::script('public/js/specified/account-settings.js') !!}
@endpush

@stop
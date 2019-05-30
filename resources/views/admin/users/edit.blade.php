@extends('admin.layouts.master')

@section('content')

	<div class='width-50 flt'>
 		<fieldset class="adminForm">
        	<legend>Edit User Detail</legend>
              {{ Form::model($user, array('route' => array('admin.users.update',$user->id), 'files' => true)) }}
            <div class='form-group'>
                {{ Form::label('first_name', 'First Name') }}
                {{ Form::text('first_name', null, ['placeholder' => 'First Name','required']) }}
            </div>
         
            <div class='form-group'>
                {{ Form::label('last_name', 'Last Name') }}
                {{ Form::text('last_name', null, ['placeholder' => 'Last Name']) }}
            </div>
         	<div class='form-group'>
                {{ Form::label('user_plan', 'Select Plan') }}
                {{ Form::select('user_plan', array('1' => 'Free', '2' => 'Basic', '3' => 'Pro Producer','4'=>'Pro Reader')) }}
            </div>
            <div class='form-group'>
                {{ Form::label('username', 'Username') }}
                {{ Form::text('username', null, ['placeholder' => 'Username','readonly']) }}
            </div>
         
            <div class='form-group'>
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', null, ['placeholder' => 'Email','required']) }}
            </div>
         
            <div class='form-group'>
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['placeholder' => 'Password']) }}
            </div>
         
            <div class='form-group'>
                {{ Form::label('confirm_password', 'Confirm Password') }}
                {{ Form::password('confirm_password', ['placeholder' => 'Confirm Password']) }}
            </div>
            <div class='form-group'>
                {{ Form::label('featured', 'Featured Member') }}
                {{Form::checkbox('featured',1)}}
            </div>
            <div class='form-group'>
                {{ Form::label('status', 'User Status') }}
                {{Form::radio('status',0,true)}}Active&nbsp;&nbsp;&nbsp;
                {{Form::radio('status',1)}}Block
            </div>
            
            
            <div class='form-group'>
                {{ Form::label('user_group', 'User Group') }}
                <span class="">
                    @foreach($usergroups as $groups)
                        {{Form::radio('user_group',$groups->id,true)}}{{$groups->title}}
                    @endforeach
                 </span>
            </div>
     		 <div class='form-button'>
            	{{ Form::submit('Update', ['class' => 'btn btn-primary','id'=>'submitebutton']) }} 
                {{ Form::button('Cancel', ['class' => 'btn btn-primary','id'=>'cancelbutton', 'onclick'=>'setToolbarRoute("users","cancel")']) }}           
            </div>      
         
            {{ Form::close() }}
     </fieldset>    
	</div>
    
@stop
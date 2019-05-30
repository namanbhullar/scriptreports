@section('content')


    <div class='width-50 flt'>
 		<fieldset class="adminForm">
        	<legend>Account Details</legend>
            {{ Form::model(['route' => 'amdin/users/add'],['id'=>'adminForm']) }}
            <div class='form-group'>
                {{ Form::label('first_name', 'First Name') }}
                {{ Form::text('first_name', null, ['placeholder' => 'First Name','required']) }}
            </div>
         
            <div class='form-group'>
                {{ Form::label('last_name', 'Last Name') }}
                {{ Form::text('last_name', null, ['placeholder' => 'Last Name']) }}
            </div>
         
            <div class='form-group'>
                {{ Form::label('username', 'Username') }}
                {{ Form::text('username', null, ['placeholder' => 'Username','required']) }}
            </div>
         
            <div class='form-group'>
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', null, ['placeholder' => 'Email','required']) }}
            </div>
         
            <div class='form-group'>
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['placeholder' => 'Password','required']) }}
            </div>
         
            <div class='form-group'>
                {{ Form::label('confirm_password', 'Confirm Password') }}
                {{ Form::password('confirm_password', ['placeholder' => 'Confirm Password','required']) }}
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
            	{{ Form::submit('submit', ['class' => 'btn btn-primary','id'=>'submitebutton']) }} 
                {{ Form::button('Cancel', ['class' => 'btn btn-primary','id'=>'cancelbutton', 'onclick'=>'setToolbarRoute("profiles","cancel")']) }}           
            </div>
     		
         
            {{ Form::close() }}
     </fieldset>    
	</div>

@stop
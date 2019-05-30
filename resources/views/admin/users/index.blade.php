@extends('admin.layouts.master')

@section('content')
	<div id="filter-bar">
    		{{ Form::model(array('route' => 'admin/users'), ['id'=>'searchform']) }}
            	<div id="filter-search">
                    {{ Form::label('search', 'Search Users') }}
                    {{ Form::text('search', request()->get('search'), ['placeholder' => 'Search user', 'id' => 'search']) }}
                    {{ Form::submit('Search', ['class' => 'btn btn-primary']) }}
                    {{ Form::button('Reset', ['class' => 'btn btn-primary reset']) }}
                </div>
                <div id="filter-select">
                	{{ Form::label('ft_plan', 'Filter Users by plan') }}
                    {{Form::select('ft_plan',
                    		array(
                            	''=>'Select Plan',
                                '1'=>'Free',
                                '2'=>'Basic',
                                '3'=>'Pro Producer',
                                '4'=>'Pro Reader',
                                ),request()->get('ft_plan'),['onchange'=>'this.form.submit();'])}}
        		</div>    
            {{Form::close()}}
    </div>
    <div class="clear"></div>
    <div class="table-responsive">
    	{{ Form::open(array('route' => 'users.dotask','id'=>'adminForm')) }}
        <table class="admin-table">
 			<thead>
                <tr>
                	<th>#&nbsp;&nbsp;<input type="checkbox" name="checkall" id="checkall" value="0" onclick="checkAllFields();" /></th>
                    <th style="text-align:left; padding-left:10px;">Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>User Plan</th>
                    <th>Status</th>
                    <th>Registration Date</th>
                    <th>ID</th>
                </tr>
            </thead>
 			<tbody>
            	<?php $count=1; ?>
                @foreach ($users as $user)
                <tr class="{{($count%2==0) ? 'even' : 'odd'}}">
                	<td>{{ $count }}&nbsp <input type="checkbox" name="checkfl[]" value="{{$user->id}}" class="checkfield" /></td>
                    <td style="text-align:left;padding-left:10px;">
                        <a href="{{URL::to('admin')}}/users/{{$user->id}}/edit">
                            {{ $user->profile->full_name }}
                        </a>
                    </td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    	@if($user->user_plan==4)
                        	Pro Reader                            
                    	@elseif($user->user_plan==3)
                        	Pro Producer
                        @elseif($user->user_plan==2)
                        	Basic
                        @else
                        	Free
                        @endif            
                    </td>
                    <td>
                    	@if($user->status==0)
                    		{{ Html::image("public/images/admin/icons/icon-16/tick.png", "Activated") }}
                        @else
                        	{{ Html::image("public/images/admin/icons/icon-16/publish_x.png", "De-activated")}}
                        @endif
                        </td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->id }}</td>
                </tr>
                <?php $count++; ?>
                @endforeach
            </tbody>
 		</table>
        {{ Form::hidden('task','', ['id' => 'task']) }}
        {{ Form::hidden('_model','User', ['id' => 'model']) }}   	   	
        {{Form::close()}}
    </div>
 
@stop
@extends('admin.layouts.master')
@section('content')
	<div id="filter-bar">
    		{{ Form::model(array('route' => 'admin/profile'), ['id'=>'searchform']) }}
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
                                '3'=>'Pro'),request()->get('ft_plan'),['onchange'=>'this.form.submit();'])}}
        		</div>    
            {{Form::close()}}
    </div>
    <div class="clear"></div>
    <div class="table-responsive">
        <table class="admin-table">
 			<thead>
                <tr>
                	<th width="2%">#</th>
                    <th width="10%" style="text-align:left; padding-left:10px;">Name</th>
                    <th width="10%">Location</th>
                    <th width="10%">Company Name</th>
                    <th width="30%">Brief Bio</th>
                    <th width="15%">Additional Skills</th>
                    <th width="8%">User Plan</th>
                    <th width="8%">Created Date</th>
                    <th width="5%">Profile ID</th>
                </tr>
            </thead>
 			<tbody>
            	<?php $count=1; ?>
                @foreach ($profiles as $profile)
                <tr class="{{($count%2==0) ? 'even' : 'odd'}}">
                	<td>{{ $count }}</td>
                    <td style="text-align:left;padding-left:10px;">
                    <a href="{{ URL::to('admin') }}/profiles/{{$profile->id}}/edit">{{ $profile->full_name }}</a></td>
                    <td>{{ $profile->location }}</td>
                    <td>{{ $profile->company_name }}</td>
                    <td>
                    	@if($profile->brief_boi)
                    		{{ substr($profile->brief_boi,0,100) }}.....
                        @endif
                    </td>
                    <td>{{ serialize($profile->additional_skills) }}</td>
                    <td>
                    	@if($profile->user->user_plan==3)
                        	Pro
                        @elseif($profile->user->user_plan==2)
                        	Basic
                        @else
                        	Free
                        @endif     
                    </td>
                    <td>{{ date('m-d-Y',strtotime($profile->created_at)) }}</td>
                    <td>{{ $profile->id }}</td>
                </tr>
                <?php $count++; ?>
                @endforeach
            </tbody>
 		</table>
    </div>
 
@stop
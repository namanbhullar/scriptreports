@extends('admin.layouts.master')

@section('content')

@push('title') One Time Links @endpush

    <div class='width-50 flt'>
 		<fieldset class="adminForm">
        	<legend>Add One Time Link</legend>
            {{ Form::model(['route' => 'admin/otlinks/add'],['id'=>'adminForm']) }}
            <div class='form-group'>
                {{ Form::label('plan_id', 'Select Plan') }}
                {{ Form::select('plan_id', array(
                                '1'=>'Free',
                                '2'=>'Basic',
                                '3'=>'Pro Producer',
                                '4'=>'Pro Reader',)) }}
            </div>
            <div class='form-group'>
                {{ Form::label('usergroups_id', 'Select User Type') }}
                {{ Form::select('usergroups_id', array('5' => 'Reader/Writer', '4' => 'Producer'))}}
            </div>
            <div class='form-group'>
                {{ Form::label('status', 'Status') }}
                {{Form::radio('status',0,true)}}Active&nbsp;&nbsp;&nbsp;
                {{Form::radio('status',1)}}In-Active
            </div>

            
            <div class='form-button'>
            	{{ Form::submit('submit', ['class' => 'btn btn-primary','id'=>'submitebutton']) }} 
                {{ Form::button('Cancel', ['class' => 'btn btn-primary','id'=>'cancelbutton', 'onclick'=>'setToolbarRoute("otlinks","cancel")']) }}           
            </div>
     		
         
            {{ Form::close() }}
     </fieldset>    
	</div>
@stop
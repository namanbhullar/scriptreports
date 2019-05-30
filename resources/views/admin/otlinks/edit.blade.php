@extends('admin.layouts.master')

@section('content')

@push('title') Edit One Time Link @endpush


    <div class='width-50 flt'>
 		<fieldset class="adminForm">
        	<legend>Edit One Time Link</legend>
            {{ Form::model($otlink,['route' => ['update.otlink',$otlink->id]],['id'=>'adminForm']) }}
            <div class='form-group'>
                {{ Form::label('plan_id', 'Select Plan') }}
                {{ Form::select('plan_id', array(
                                                '1'=>'Free',
                                                '2'=>'Basic',
                                                '3'=>'Pro Producer',
                                                '4'=>'Pro Reader',
				                                ),$otlink->plan_id) }}
            </div>
             <div class='form-group'>
                {{ Form::label('usergroups_id', 'Select User Type') }}
                {{ Form::select('usergroups_id', array('5' => 'Reader/Writer', '4' => 'Producer'),$otlink->usergroups_id) }}
            </div>
            <div class='form-group'>
                {{ Form::label('status', 'Status') }}
                {{Form::radio('status',0)}}Active&nbsp;&nbsp;&nbsp;
                {{Form::radio('status',1)}}In-Active
            </div>

            
            <div class='form-button'>
            	{{ Form::submit('Update', ['class' => 'btn btn-primary','id'=>'submitebutton']) }} 
                {{ Form::button('Cancel', ['class' => 'btn btn-primary','id'=>'cancelbutton', 'onclick'=>'setToolbarRoute("otlinks","cancel")']) }}           
            </div>
     		
         
            {{ Form::close() }}
     </fieldset>    
	</div>

@stop
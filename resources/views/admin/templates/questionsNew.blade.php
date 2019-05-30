@extends('admin.layouts.master')

@section('content')

@push('title') Add New Question @endpush


    <div class='width-50 flt'>
 		<fieldset class="adminForm">
        	<legend>Add New Questions</legend>
            {{ Form::model(['route' => 'admin/questions/add'],['id'=>'adminForm']) }}
            <div class='form-group'>
            	<?php 
					$catoptions[0] = 'Select Category';	
					foreach($categories as $category)
							$catoptions[$category->id] = $category->title;
				?>
                {{ Form::label('category_id', 'Select Category') }}
                {{ Form::select('category_id',$catoptions,['required'])}}
            </div>
            <div class='form-group'>
                {{ Form::label('title', 'Question Title') }}
                {{ Form::textarea('title','',['required','placeholder'=>'Question Title','rows'=>'4']) }}
            </div>
            <div class='form-group'>
                {{ Form::label('status', 'Status') }}
                {{Form::radio('status',0,true)}}Active&nbsp;&nbsp;&nbsp;
                {{Form::radio('status',1)}}In-Active
            </div>

            
            <div class='form-button'>
            	{{ Form::submit('submit', ['class' => 'btn btn-primary','id'=>'submitebutton']) }} 
                {{ Form::button('Cancel', ['class' => 'btn btn-primary','id'=>'cancelbutton', 'onclick'=>'setToolbarRoute("categories","cancel")']) }}           
            </div>
     		
         
            {{ Form::close() }}
     </fieldset>    
	</div>
@stop
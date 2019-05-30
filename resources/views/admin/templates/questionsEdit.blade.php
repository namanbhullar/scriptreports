@extends('admin.layouts.master')

@section('content')

@push('title') Edit Questions  @endpush

    <div class='width-50 flt'>
 		<fieldset class="adminForm">
        	<legend>Edit Question</legend>
            {{ Form::model($question,['route' => ['update.questions',$question->id]],['id'=>'adminForm']) }}
            <div class='form-group'>
            	<?php 
					$catoptions[0] = 'Select Category';	
					foreach($categories as $category)
							$catoptions[$category->id] = $category->title;
				?>
                {{ Form::label('category_id', 'Select Category') }}
                {{ Form::select('category_id',$catoptions,$question->category_id)}}
            </div>
            <div class='form-group'>
                {{ Form::label('title', 'Question Title') }}
                {{ Form::textarea('title',$question->title,['required','placeholder'=>'Question Title','rows'=>'4'])}}
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
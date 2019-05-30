@extends('admin.layouts.master')

@section('content')

@push('title') Edit Template Category @endpush

    <div class='width-50 flt'>
 		<fieldset class="adminForm">
        	<legend>Edit Category</legend>
            {{ Form::model($category,['route' => ['update.category',$category->id]],['id'=>'adminForm']) }}
            <div class='form-group'>
                {{ Form::label('title', 'Category Title') }}
                {{ Form::text('title',$category->title,['required','placeholder'=>'Category Title']) }}
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
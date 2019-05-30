@extends('admin.layouts.master')

@section('content')

@push('title') Category Questions  @endpush

	<div id="filter-bar">
    		<?php 
				$options[0]	=	'All';
				foreach($categories as $category)
						$options[$category->id] = $category->title;
			?>
    		{{ Form::model(array('route' => 'admin/questions'), ['id'=>'searchform']) }}
            	  {{Form::label('filter','Filter by Category')}}
                  {{Form::select('filter',$options,request()->get('filter'),['onchange'=>'this.form.submit();'])}} 	
            {{Form::close()}}
    </div>
    <div class="clear"></div>
    <div class="table-responsive">
    	{{ Form::open(array('route' => 'questions.dotask','id'=>'adminForm')) }}
        <table class="admin-table">
 			<thead>
                <tr>
                	<th width="5%">
                    	#&nbsp;&nbsp;<input type="checkbox" name="checkall" id="checkall" value="0" onclick="checkAllFields();" />
                    </th>
                    <th width="50%" style="text-align:left; padding-left:10px;">Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Created Date</th>
                </tr>
            </thead>
 			<tbody>
            	@if(count($questions)>0)
                  
                    <?php $count=1; ?>
                    @foreach ($questions as $question)
                    <tr class="{{($count%2==0) ? 'even' : 'odd'}}">
                        <td>{{ $count }}&nbsp <input type="checkbox" name="checkfl[]" value="{{$question->id}}" class="checkfield" /></td>
                        <td style="text-align:left;padding-left:10px;">
                        	<a href="{{URL::to('admin')}}/questions/{{$question->id}}/edit">{{$question->title}}</a>
                        </td>
						<td>{{$question->category->title}}</td>
                        <td>
                        	@if($question->status==0)
                            	{{ Html::image("public/images/admin/icons/icon-16/tick.png", "Activated") }}
                            @else
                            	{{ Html::image("public/images/admin/icons/icon-16/publish_x.png", "De-activated")}}
                            @endif       
                        </td>
                        <td>{{$question->created_at}}</td>
                    </tr>
                    <?php $count++; ?>
                    @endforeach
                       
                @else
                    
            	 	<tr>
                    	<td colspan="5" style="text-align:left; padding:10px;">
                        	No records found
                        </td>
                	</tr>
              
              @endif
                
            </tbody>
 		</table>
     	{{ Form::hidden('task','', ['id' => 'task']) }}
        {{ Form::hidden('_model','Questions', ['id' => 'model']) }}   	   	
        {{Form::close()}}
    </div>
 
@stop
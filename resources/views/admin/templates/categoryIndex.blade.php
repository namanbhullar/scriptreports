@extends('admin.layouts.master')

@section('content')

@push('title')Template Categories  @endpush

	<div id="filter-bar">
    		{{ Form::model(array('route' => 'admin/otlinks'), ['id'=>'searchform']) }}
            	   
            {{Form::close()}}
    </div>
    <div class="clear"></div>
    <div class="table-responsive">
    	{{ Form::open(array('route' => 'categories.dotask','id'=>'adminForm')) }}
        <table class="admin-table">
 			<thead>
                <tr>
                	<th width="5%">
                    #&nbsp;&nbsp;<input type="checkbox" name="checkall" id="checkall" value="0" onclick="checkAllFields();" />
                    </th>
                    <th width="50%" style="text-align:left; padding-left:10px;">Title</th>
                    <th>Status</th>
                    <th>Created Date</th>
                </tr>
            </thead>
 			<tbody>
            	@if(count($categories)>0)
                  
                    <?php $count=1; ?>
                    @foreach ($categories as $category)
                    <tr class="{{($count%2==0) ? 'even' : 'odd'}}">
                        <td>{{ $count }}&nbsp <input type="checkbox" name="checkfl[]" value="{{$category->id}}" class="checkfield" /></td>
                        <td style="text-align:left;padding-left:10px;">
                        	<a href="{{URL::to('admin')}}/categories/{{$category->id}}/edit">{{$category->title}}</a>
                        </td>

                        <td>
                        	@if($category->status==0)
                            	{{ Html::image("public/images/admin/icons/icon-16/tick.png", "Activated") }}
                            @else
                            	{{ Html::image("public/images/admin/icons/icon-16/publish_x.png", "De-activated")}}
                            @endif       
                        </td>
                        <td>{{$category->created_at}}</td>
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
        {{ Form::hidden('_model','Categories', ['id' => 'model']) }}   	   	
        {{Form::close()}}
    </div>
 
@stop
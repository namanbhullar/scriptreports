@extends('admin.layouts.master')

@section('content')

@push('title') Templates @endpush

@section('content')
	<div id="filter-bar">
    		{{ Form::model(array('route' => 'admin/otlinks'), ['id'=>'searchform']) }}
            	   
            {{Form::close()}}
    </div>
    <div class="clear"></div>
    <div class="table-responsive">
    	{{ Form::open(array('route' => 'templates.dotask','id'=>'adminForm')) }}
        <table class="admin-table">
 			<thead>
                <tr>
                	<th width="5%">
                    #&nbsp;&nbsp;<input type="checkbox" name="checkall" id="checkall" value="0" onclick="checkAllFields();" />
                    </th>
                    <th style="text-align:left; padding-left:10px;">Template Name</th>
                    <th width="40%" >Description</th>
                    <th width="20%" >Genre</th>
                    <th>Created By</th>
                    <th>Status</th>
                    <th>Created Date</th>
                </tr>
            </thead>
 			<tbody>
            	@if(count($templates)>0)
                  
                    <?php $count=1; ?>
                    @foreach ($templates as $template)
                    <tr class="{{($count%2==0) ? 'even' : 'odd'}}">
                        <td>{{ $count }}&nbsp <input type="checkbox" name="checkfl[]" value="{{$template->id}}" class="checkfield" /></td>
                        <td style="text-align:left;padding-left:10px;">
                        	<?php /*?><a href="{{ADMINURL}}/templates/{{$template->id}}/edit">{{$template->title}}</a><?php */?>
                            {{$template->title}}
                        </td>
						<td>{{$template->description}}</td>
                        <td>{{ (strtolower($template->genre[0]) == 'other') ? $template->genre[1] :  $template->genre[0] }}</td>
                        <td>
                        	<?php $user = App\Models\User::find($template->submited_by); ?>
                        {{$user->first_name.' '.$user->last_name }}</td>
                        <td>
                        	@if($template->status==1)
                            	{{ Html::image("public/images/admin/icons/icon-16/tick.png", "Activated") }}
                            @else
                            	{{ Html::image("public/images/admin/icons/icon-16/publish_x.png", "De-activated")}}
                            @endif       
                        </td>
                        <td>{{$template->created_at}}</td>
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
        {{ Form::hidden('_model','Templates', ['id' => 'model']) }}   	   	
        {{Form::close()}}
    </div>
 
@stop
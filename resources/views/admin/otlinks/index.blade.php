@extends('admin.layouts.master')

@section('content')

@push('title') One Time Links @endpush

	<div id="filter-bar">
    		{{ Form::model(array('route' => 'admin/otlinks'), ['id'=>'searchform']) }}
            	<div id="filter-select" style="margin-left:0px !important;">
                	{{ Form::label('ft_plan', 'Filter Links by plan') }}
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
    	{{ Form::open(array('route' => 'otlinks.dotask','id'=>'adminForm')) }}
        <table class="admin-table">
 			<thead>
                <tr>
                	<th>
                    #&nbsp;&nbsp;<input type="checkbox" name="checkall" id="checkall" value="0" onclick="checkAllFields();" />
                    </th>
                    <th width="50%" style="text-align:left; padding-left:10px;">Link</th>
                    <th>Plan</th>
                    <th>Status</th>
                    <th>Created Date</th>
                </tr>
            </thead>
 			<tbody>
            	@if(count($otlinks)>0)
                  
                    <?php $count=1; ?>
                    @foreach ($otlinks as $otlink)
                    <?php $otlink->load('plan'); ?>
                    <tr class="{{($count%2==0) ? 'even' : 'odd'}}">
                        <td>{{ $count }}&nbsp <input type="checkbox" name="checkfl[]" value="{{$otlink->id}}" class="checkfield" /></td>
                        <td style="text-align:left;padding-left:10px;">
                        	<a href="{{URL::to('admin')}}/otlinks/{{$otlink->id}}/edit">{{URL::to('/')}}/subscribes/ot/{{ $otlink->link }}</a>
                        </td>
                        <td>
                        	{{ $otlink->plan->plan_title }}
                        </td>
                        <td>
                        	@if($otlink->status==0)
                            	{{ Html::image("public/images/admin/icons/icon-16/tick.png", "Activated") }}
                            @else
                            	{{ Html::image("public/images/admin/icons/icon-16/publish_x.png", "De-activated")}}
                            @endif       
                        </td>
                        <td>{{$otlink->created_at}}</td>
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
        {{ Form::hidden('_model','OtLinks', ['id' => 'model']) }}   	   	
        {{Form::close()}}
    </div>
 
@stop
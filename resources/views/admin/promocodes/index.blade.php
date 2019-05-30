@extends('admin.layouts.master')

@section('content')
		<div id="filter-bar">
    		{{ Form::model(array('route' => 'admin/promocode'), ['id'=>'searchform']) }}
            	<div id="filter-select" style="margin-left:0px !important;">
                	{{ Form::label('ft_plan', 'Filter Promocode by plan') }}
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
    	{{ Form::open(array('route' => 'promocode.dotask','id'=>'adminForm')) }}
        <table class="admin-table">
 			<thead>
                <tr>
                	<th>#&nbsp;&nbsp;<input type="checkbox" name="checkall" id="checkall" value="0" onclick="checkAllFields();" /></th>
                    <th width="15%" style="text-align:left; padding-left:10px;">Title</th>
                    <th>Promo Code</th>
                    <th>Plan</th>
                    <th>Discount Amount</th>
                    <th>Discount Type</th>
                    <th>Number of Uses</th>
                    <th>Used</th>
                    <th>Status</th>
                    <th>Created Date</th>
                </tr>
            </thead>
 			<tbody>
            	<?php $count=1; ?>
                @foreach ($promocodes as $promocode)
                <tr class="{{($count%2==0) ? 'even' : 'odd'}}">
                	<td>{{ $count }}&nbsp <input type="checkbox" name="checkfl[]" value="{{$promocode->id}}" class="checkfield" /></td>
                    <td style="text-align:left;padding-left:10px;"><a href="{{URL::to('admin')}}/promocode/{{$promocode->id}}/edit">{{ $promocode->title }}</a></td>
                    <td>{{ $promocode->promo_code }}</td>
                    <td>
                    	@if($promocode->plan_id==3)
                        	Pro
                        @elseif($promocode->plan_id==2)
                        	Basic
                        @else
                        	Free
                        @endif     
                    </td>
                    <td>
                    	@if($promocode->discount_type==1)
                        	{{ $promocode->discount }}%
                        @elseif($promocode->discount_type==2)
                        	${{ $promocode->discount }}
                    	@else
                        	Full Amount
                        @endif    
                    
                    </td>
                    <td>
                    	@if($promocode->discount_type==1)
                        	Percentage
                        @elseif($promocode->discount_type==2)
                        	Fixed    
                    	@else
                        	Full Amount
                        @endif    
                    </td>
                    <td>
                        @if($promocode->counts==0)
                            Unlimited
                        @else
                            {{ $promocode->counts }}
                        @endif    	   
                    </td>
                    <td>{{ $promocode->used }}</td>
                    <td>
                    	@if($promocode->status==0)
                    		{{ Html::image("public/images/admin/icons/icon-16/tick.png", "Activated") }}
                        @else
                        	{{ Html::image("public/images/admin/icons/icon-16/publish_x.png", "De-activated")}}
                        @endif
                        </td>
                    <td>{{ $promocode->created_at }}</td>
                </tr>
                <?php $count++; ?>
                @endforeach
            </tbody>
 		</table>
        {{ Form::hidden('task','', ['id' => 'task']) }}
        {{ Form::hidden('_model','PromoCodes', ['id' => 'model']) }}   	   	
        {{Form::close()}}
    </div>
 
@stop
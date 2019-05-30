@extends('admin.layouts.master')

@section('content')


    <div class='width-50 flt'>
 		<fieldset class="adminForm">
        	<legend>Add Promo Code</legend>
            {{ Form::model(['route' => 'amdin/promocode/add'],['id'=>'adminForm']) }}
            <div class='form-group'>
                {{ Form::label('title', 'Promo Code Title') }}
                {{ Form::text('title', null, ['placeholder' => 'Promo Code Title','required']) }}
            </div>
         
            <div class='form-group'>
                {{ Form::label('promo_code', 'Promo Code') }}
                {{ Form::text('promo_code', null, ['placeholder' => 'Promo Code','required','id'=>'promo_code']) }}&nbsp;&nbsp;
                {{ Form::button('Genrate Code',['onclick' => 'GenratePromoCode();','class'=>'btn btn-primary']) }}
            </div>
         	<div class='form-group'>
                {{ Form::label('expire', 'Expire') }}
                {{ Form::text('expire', null, ['class' => 'datepicker','required', 'readonly','data-date-format'=>'yyyy-mm-dd']) }}

            </div>
            
            <div class='form-group'>
                {{ Form::label('plan_id', 'Select Plan') }}
                {{ Form::select('plan_id', array('2' => 'Basic', '3' => 'Pro')) }}
            </div>
            
            <div class='form-group'>
                {{ Form::label('counts', 'Number of Uses') }}
                {{ Form::text('counts', null, ['placeholder' => 'Number of Uses']) }}&nbsp;&nbsp;(<small><i>Leave blank for unlimited use</i></small>)
            </div>
            
            <div class='form-group'>
                {{ Form::label('discount', 'Discount') }}
                {{ Form::text('discount', null, ['placeholder' => 'Discount']) }}
            </div>
         
            <div class='form-group'>
                {{ Form::label('discount_type', 'Discount Type') }}
                {{ Form::radio('discount_type', 1) }}&nbsp;Percentage&nbsp;&nbsp;&nbsp;&nbsp;
                {{ Form::radio('discount_type', 2,true) }}&nbsp;Fixed&nbsp;&nbsp;&nbsp;&nbsp;
                {{ Form::radio('discount_type', 3) }}&nbsp;Full Discount
            </div>
         
            <div class='form-group'>
                {{ Form::label('status', 'Status') }}
                {{Form::radio('status',0,true)}}Active&nbsp;&nbsp;&nbsp;
                {{Form::radio('status',1)}}In-Active
            </div>

            
            <div class='form-button'>
            	{{ Form::submit('submit', ['class' => 'btn btn-primary','id'=>'submitebutton']) }} 
                {{ Form::button('Cancel', ['class' => 'btn btn-primary','id'=>'cancelbutton', 'onclick'=>'setToolbarRoute("promocode","cancel")']) }}           
            </div>
     		
         
            {{ Form::close() }}
     </fieldset>    
	</div>
<script type="text/javascript">
	function GenratePromoCode(){
		
		var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
		var string_length = 15;
		var randomstring = '';
		
		for(var i=0; i<string_length; i++) {
			var rnum = Math.floor(Math.random() * chars.length);
			randomstring += chars.substring(rnum,rnum+1);
		}
		
		$("#promo_code").val(randomstring);	
	}
</script>
@stop
@extends('layouts.front');
 @push('css')
    	{!! Html::style("public/css/front/style.css") !!}
        {!! Html::style("public/css/style.css") !!}
        {!! Html::style("public/css/template.css") !!}
        {!! Html::style("public/css/fonts.css") !!}
        {!! Html::style("public/css/profileform.css") !!}
        {!! Html::style("public/old/style.css") !!}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    @endpush
    
    
@section('content')
 
<div id="verifybox">
	<h2>You are redirecting to Paypal...</h2>
 </div>
 
 <?php $array =   json_encode(array('user_id'=>$userid,'period'=>$rtype)); ?>
<form name="recurring" id="recurring" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <input type="hidden" name="business" value="info@scriptreaderonline.com">
    <input type="hidden" name="item_name" value="{{$planname}}">
    <input type="hidden" name="cancel_return" value="{{BASEURL}}/myaccount/user/{{$userid}}/subscribe/cancel">
    <input type="hidden" name="notify_url" value="{{BASEURL}}/myaccount/paypalnotifications">
    <input type="hidden" name="return" value="{{BASEURL}}/myaccount/user/{{$userid}}/subscribe/success">
    <input type="hidden" name="rm" value="2">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="a3" value="{{$price}}">
    <input type="hidden" name="p3" value="1">
    <input type="hidden" name="t3" value="{{$rtype}}">
    <input type="hidden" name="src" value="1">
    <input type="hidden" name="sra" value="1">
    <input type="hidden" name="custom" value='{{$array}}'>
</form>
 
 <script type="text/javascript">
	jQuery(document).ready(function(){
		setTimeout(jQuery('#recurring').submit(),3000);	
	})
	
</script>
@stop
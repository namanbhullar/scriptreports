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
	<h2>{{ trans('verify.almost_finished') }}</h2>
    <div class='verifybox-inner'>
    	<p class="alert-box success"><i class="fa fa-check-circle"></i>{{ trans('verify.account_success_created') }}</p>
        <p class="alert-box success"><i class="fa fa-check-circle"></i>{{ trans('verify.verify_first') }}</p>
        <p class="alert-box success"><i class="fa fa-check-circle"></i>{{ trans('verify.check_span_folder') }}</p>
     </div>
 </div>
@stop